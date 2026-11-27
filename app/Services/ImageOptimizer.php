<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageOptimizer
{
    /**
     * Optimiza y redimensiona una imagen subida, guardándola en formato WebP comprimido.
     *
     * @param mixed $uploadedFile Archivo temporal o instancia de UploadedFile
     * @param string $relativeDir Directorio relativo a public_path() (ej: 'images/novedades/gallery')
     * @param string $prefix Prefijo del nombre de archivo (ej: slug de la novedad)
     * @param int $maxWidth Ancho máximo permitido en píxeles (default: 1600)
     * @param int $maxHeight Alto máximo permitido en píxeles (default: 1200)
     * @param int $quality Calidad de compresión WebP (default: 82)
     * @return string Ruta relativa pública (ej: '/images/novedades/gallery/novedad-1731111111-a1b2c3.webp')
     */
    public static function optimizeAndStore(
        $uploadedFile,
        string $relativeDir = 'images/novedades/gallery',
        string $prefix = 'gallery',
        int $maxWidth = 1600,
        int $maxHeight = 1200,
        int $quality = 82
    ): string {
        @ini_set('memory_limit', '512M');
        @set_time_limit(180);

        $sourcePath = is_string($uploadedFile) ? $uploadedFile : $uploadedFile->getRealPath();

        $targetDir = public_path($relativeDir);
        $urlPrefix = '/' . trim($relativeDir, '/');

        // Intentar crear/asegurar el directorio en public_path()
        if (!is_dir($targetDir)) {
            try {
                File::ensureDirectoryExists($targetDir, 0775, true);
            } catch (\Throwable $e) {
                // Silenciar para permitir intento con fallback si falla por permisos
            }
        }

        // Si public_path no es escribible, usar fallback a storage/app/public/
        if (!is_dir($targetDir) || !is_writable($targetDir)) {
            $storageTargetDir = storage_path('app/public/' . trim($relativeDir, '/'));
            try {
                if (!is_dir($storageTargetDir)) {
                    File::ensureDirectoryExists($storageTargetDir, 0775, true);
                }
            } catch (\Throwable $e) {
                // Silenciar
            }

            if (is_dir($storageTargetDir) && is_writable($storageTargetDir)) {
                $targetDir = $storageTargetDir;
                $urlPrefix = '/storage/' . trim($relativeDir, '/');
            }
        }

        // Si aún así no se puede escribir, lanzar un mensaje instructivo claro
        if (!is_dir($targetDir) || !is_writable($targetDir)) {
            throw new \RuntimeException(
                "Permiso denegado: El servidor web no tiene permisos de escritura en '{$targetDir}'. " .
                "Por favor ejecuta en tu terminal VPS: sudo chown -R www-data:www-data storage bootstrap/cache public/images && sudo chmod -R 775 storage bootstrap/cache public/images"
            );
        }

        $imageInfo = @getimagesize($sourcePath);
        if (!$imageInfo) {
            // Si no se puede leer como imagen válida, mover directo
            $ext = is_string($uploadedFile) ? pathinfo($uploadedFile, PATHINFO_EXTENSION) : $uploadedFile->getClientOriginalExtension();
            $filename = Str::slug($prefix) . '-' . time() . '-' . Str::random(6) . '.' . strtolower($ext ?: 'jpg');
            copy($sourcePath, $targetDir . DIRECTORY_SEPARATOR . $filename);
            return $urlPrefix . '/' . $filename;
        }

        $origW = $imageInfo[0];
        $origH = $imageInfo[1];
        $mime = $imageInfo['mime'];

        // Cargar según tipo
        switch ($mime) {
            case 'image/jpeg':
            case 'image/pjpeg':
                $src = @imagecreatefromjpeg($sourcePath);
                // Corregir orientación EXIF si está disponible
                if ($src && function_exists('exif_read_data')) {
                    $exif = @exif_read_data($sourcePath);
                    if (!empty($exif['Orientation'])) {
                        switch ($exif['Orientation']) {
                            case 3:
                                $src = imagerotate($src, 180, 0);
                                break;
                            case 6:
                                $src = imagerotate($src, -90, 0);
                                break;
                            case 8:
                                $src = imagerotate($src, 90, 0);
                                break;
                        }
                        $origW = imagesx($src);
                        $origH = imagesy($src);
                    }
                }
                break;
            case 'image/png':
                $src = @imagecreatefrompng($sourcePath);
                break;
            case 'image/webp':
                $src = @imagecreatefromwebp($sourcePath);
                break;
            case 'image/gif':
                $src = @imagecreatefromgif($sourcePath);
                break;
            default:
                $src = null;
        }

        if (!$src) {
            $filename = Str::slug($prefix) . '-' . time() . '-' . Str::random(6) . '.jpg';
            copy($sourcePath, $targetDir . DIRECTORY_SEPARATOR . $filename);
            return $urlPrefix . '/' . $filename;
        }

        // Calcular nuevas dimensiones respetando la relación de aspecto
        $targetW = $origW;
        $targetH = $origH;

        if ($origW > $maxWidth || $origH > $maxHeight) {
            $ratio = min($maxWidth / $origW, $maxHeight / $origH);
            $targetW = max(1, (int) round($origW * $ratio));
            $targetH = max(1, (int) round($origH * $ratio));
        }

        $dst = imagecreatetruecolor($targetW, $targetH);

        // Preservar transparencia para PNG/WebP
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
        $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
        imagefilledrectangle($dst, 0, 0, $targetW, $targetH, $transparent);

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetW, $targetH, $origW, $origH);

        // Guardar preferentemente en formato WebP de alto rendimiento
        $filename = Str::slug($prefix) . '-' . time() . '-' . Str::random(6) . '.webp';
        $fullPath = $targetDir . DIRECTORY_SEPARATOR . $filename;

        if (function_exists('imagewebp')) {
            imagewebp($dst, $fullPath, $quality);
        } else {
            $filename = Str::slug($prefix) . '-' . time() . '-' . Str::random(6) . '.jpg';
            $fullPath = $targetDir . DIRECTORY_SEPARATOR . $filename;
            imagejpeg($dst, $fullPath, $quality);
        }

        imagedestroy($src);
        imagedestroy($dst);

        return $urlPrefix . '/' . $filename;
    }
}

