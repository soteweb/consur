<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'featured_image',
        'gallery',
        'published_at',
        'is_published',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'gallery' => 'array',
    ];

    public function getGalleryImagesAttribute(): array
    {
        if (empty($this->gallery) || !is_array($this->gallery)) {
            return [];
        }

        return array_map(function ($item) {
            $path = is_array($item) ? ($item['url'] ?? '') : $item;
            if (empty($path)) return '';
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            return asset(ltrim($path, '/'));
        }, $this->gallery);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        if (empty($this->featured_image)) {
            return asset('images/logoconsurweb.png');
        }

        if (str_starts_with($this->featured_image, 'http://') || str_starts_with($this->featured_image, 'https://')) {
            return $this->featured_image;
        }

        return asset(ltrim($this->featured_image, '/'));
    }

    public function getFormattedDateAttribute(): string
    {
        $date = $this->published_at ?? $this->created_at;
        return $date ? $date->format('d/m/Y') : '';
    }

    public static function createSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $query = static::where('slug', 'LIKE', "{$slug}%");
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }
        $count = $query->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}

