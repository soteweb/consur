<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Cache;

class InstagramFeedService
{
    public static function getPosts(int $limit = 12): array
    {
        $posts = Cache::remember('consur_instagram_feed_v1', now()->addHours(6), function () {
            $fetched = self::syncFromSource();
            if (!empty($fetched)) {
                return $fetched;
            }
            return self::loadFallbackJson();
        });

        return array_slice($posts, 0, $limit);
    }

    public static function syncFromSource(): array
    {
        $targetDir = public_path('images/instagram');
        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0775, true);
        }

        $ctx = stream_context_create([
            'http' => [
                'timeout' => 12,
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
            'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
        ]);

        // 1. Si hay un Access Token de Instagram Graph API configurado, usarlo primero
        $token = config('services.instagram.access_token') ?: env('INSTAGRAM_ACCESS_TOKEN');
        if (!empty($token)) {
            $graphUrl = "https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,thumbnail_url,permalink,timestamp&limit=12&access_token=" . urlencode($token);
            $json = @file_get_contents($graphUrl, false, $ctx);
            if ($json) {
                $data = json_decode($json, true);
                if (!empty($data['data']) && is_array($data['data'])) {
                    $items = [];
                    foreach ($data['data'] as $row) {
                        $id = 'sbi_' . $row['id'];
                        $rawImg = ($row['media_type'] === 'VIDEO' ? ($row['thumbnail_url'] ?? $row['media_url'] ?? '') : ($row['media_url'] ?? ''));
                        $localImg = self::cacheImageLocally($id, $rawImg, $targetDir, $ctx);
                        $ts = isset($row['timestamp']) ? strtotime($row['timestamp']) : time();

                        $items[] = [
                            'id' => $id,
                            'username' => 'consur_toyota',
                            'avatar' => '/images/instagram/avatar.jpg',
                            'date_label' => date('M j', $ts),
                            'timestamp' => $ts,
                            'type' => strtolower($row['media_type'] ?? 'image'),
                            'url' => $row['permalink'] ?? 'https://www.instagram.com/consur_toyota/',
                            'image' => $localImg ?: $rawImg,
                            'caption' => $row['caption'] ?? '',
                            'likes' => 0,
                            'comments' => 0,
                        ];
                    }
                    if (!empty($items)) {
                        self::saveFallbackJson($items);
                        return $items;
                    }
                }
            }
        }

        // 2. Sincronizar desde el feed oficial activo en consur.com.py (#sb_instagram)
        $html = @file_get_contents('https://consur.com.py/', false, $ctx);
        if (!$html || !str_contains($html, 'sbi_images')) {
            return self::loadFallbackJson();
        }

        $dom = new DOMDocument();
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        $xpath = new DOMXPath($dom);

        $nodes = $xpath->query('//div[@id="sbi_images"]/div[contains(@class, "sbi_item")]');
        if (!$nodes || $nodes->length === 0) {
            return self::loadFallbackJson();
        }

        $items = [];
        $avatarSaved = file_exists($targetDir . '/avatar.jpg') && filesize($targetDir . '/avatar.jpg') > 500;

        foreach ($nodes as $node) {
            $id = $node->getAttribute('id') ?: ('sbi_' . uniqid());
            $timestamp = (int) $node->getAttribute('data-date');
            $commentsCount = (int) $node->getAttribute('data-numcomments');
            $classes = $node->getAttribute('class');

            if (!$avatarSaved) {
                $avatarNode = $xpath->query('.//img[contains(@class, "sbi-feedtheme-avatar")]', $node)->item(0);
                $avatarUrl = $avatarNode ? html_entity_decode($avatarNode->getAttribute('src')) : '';
                if ($avatarUrl) {
                    $avBin = @file_get_contents($avatarUrl, false, $ctx);
                    if ($avBin && strlen($avBin) > 500) {
                        file_put_contents($targetDir . '/avatar.jpg', $avBin);
                        $avatarSaved = true;
                    }
                }
            }

            $dateNode = $xpath->query('.//div[contains(@class, "sbi-user-info-inner")]/span', $node)->item(0);
            $dateStr = $dateNode ? trim($dateNode->textContent) : '';

            $captionNode = $xpath->query('.//span[contains(@class, "sbi_caption")]', $node)->item(0);
            $caption = $captionNode ? trim($captionNode->textContent) : '';

            $lbNode = $xpath->query('.//a[contains(@class, "sbi_lb-link")]', $node)->item(0);
            $postUrl = $lbNode ? $lbNode->getAttribute('data-url') : '';
            $mediaType = $lbNode ? $lbNode->getAttribute('data-media-type') : '';
            if (!$mediaType) {
                $mediaType = str_contains($classes, 'sbi_type_video') ? 'reels' : (str_contains($classes, 'sbi_type_carousel') ? 'carousel' : 'image');
            }

            $photoNode = $xpath->query('.//a[contains(@class, "sbi_photo")]', $node)->item(0);
            $fullRes = $photoNode ? html_entity_decode($photoNode->getAttribute('data-full-res')) : '';
            if (!$postUrl && $photoNode) {
                $postUrl = $photoNode->getAttribute('href');
            }

            $likesNode = $xpath->query('.//span[contains(@class, "sbi_likes")]', $node)->item(0);
            $likesCount = $likesNode ? (int) preg_replace('/\D/', '', $likesNode->textContent) : 0;

            $localImg = self::cacheImageLocally($id, $fullRes, $targetDir, $ctx);

            $items[] = [
                'id' => $id,
                'username' => 'consur_toyota',
                'avatar' => $avatarSaved ? '/images/instagram/avatar.jpg' : '/images/logoconsurweb.png',
                'date_label' => $dateStr,
                'timestamp' => $timestamp,
                'type' => $mediaType,
                'url' => $postUrl ?: 'https://www.instagram.com/consur_toyota/',
                'image' => $localImg ?: $fullRes,
                'caption' => $caption,
                'likes' => $likesCount,
                'comments' => $commentsCount,
            ];
        }

        if (!empty($items)) {
            self::saveFallbackJson($items);
        }

        return $items;
    }

    protected static function cacheImageLocally(string $id, string $remoteUrl, string $targetDir, $ctx): ?string
    {
        $safeId = preg_replace('/[^a-zA-Z0-9_-]/', '', $id);
        $localFile = $targetDir . '/' . $safeId . '.jpg';

        if (!file_exists($localFile) || filesize($localFile) < 1000) {
            if (!empty($remoteUrl)) {
                $bin = @file_get_contents($remoteUrl, false, $ctx);
                if ($bin && strlen($bin) > 1000) {
                    file_put_contents($localFile, $bin);
                }
            }
        }

        if (file_exists($localFile) && filesize($localFile) > 1000) {
            return '/images/instagram/' . $safeId . '.jpg';
        }

        return null;
    }

    protected static function saveFallbackJson(array $items): void
    {
        $path = storage_path('app/instagram_feed.json');
        @file_put_contents($path, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    protected static function loadFallbackJson(): array
    {
        $path = storage_path('app/instagram_feed.json');
        if (file_exists($path)) {
            $data = json_decode(file_get_contents($path), true);
            if (is_array($data)) {
                return $data;
            }
        }
        return [];
    }
}

