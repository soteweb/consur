<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Media;
use App\Services\ImageOptimizer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class MediaManager extends BaseCrudComponent
{
    use WithFileUploads;

    public string $viewMode = 'grid'; // 'grid' o 'list'
    public string $filterType = 'all'; // 'all', 'images', 'documents', 'videos'
    public string $filterMonth = ''; // formato Y-m
    public int $perPage = 30;

    /**
     * Archivos que se están subiendo vía Livewire
     */
    public array $uploads = [];

    /**
     * Medios seleccionados para ver detalle en modal lateral/drawer
     */
    public ?Media $activeMedia = null;
    public string $editName = '';
    public string $editAlt = '';
    public bool $showDetailModal = false;

    protected function resetInputFields(): void
    {
        $this->activeMedia = null;
        $this->editName = '';
        $this->editAlt = '';
        $this->showDetailModal = false;
        $this->uploads = [];
    }

    public function updatedUploads(): void
    {
        $this->validate([
            'uploads.*' => 'file|max:25600', // Máx 25 MB por archivo
        ]);

        $uploadedCount = 0;
        $dateFolder = now()->format('Y/m');
        $targetDir = public_path("images/uploads/{$dateFolder}");

        if (!File::isDirectory($targetDir)) {
            File::makeDirectory($targetDir, 0755, true, true);
        }

        foreach ($this->uploads as $file) {
            try {
                $origName = $file->getClientOriginalName();
                $origExt = strtolower($file->getClientOriginalExtension());
                $mimeType = $file->getMimeType() ?: 'application/octet-stream';
                $slugBase = Str::slug(pathinfo($origName, PATHINFO_FILENAME));

                $isImage = str_starts_with($mimeType, 'image/') && in_array($origExt, ['jpg', 'jpeg', 'png', 'webp', 'gif']);

                if ($isImage && in_array($origExt, ['jpg', 'jpeg', 'png', 'webp'])) {
                    // Optimizar y convertir a WebP
                    $relativeUrl = ImageOptimizer::optimizeAndStore(
                        $file,
                        "images/uploads/{$dateFolder}",
                        $slugBase ?: 'media',
                        2560,
                        2000,
                        86
                    );

                    $physicalPath = public_path(ltrim($relativeUrl, '/'));
                    $fileSize = File::exists($physicalPath) ? File::size($physicalPath) : $file->getSize();
                    $dimensions = @getimagesize($physicalPath);
                    $width = $dimensions ? $dimensions[0] : null;
                    $height = $dimensions ? $dimensions[1] : null;
                    $storedMime = 'image/webp';
                    $fileName = basename($relativeUrl);
                } else {
                    // Documentos (PDF, DOCX, etc.), videos o SVG
                    $fileName = ($slugBase ?: 'archivo') . '-' . time() . '-' . Str::random(5) . '.' . $origExt;
                    $fullDest = $targetDir . DIRECTORY_SEPARATOR . $fileName;
                    File::copy($file->getRealPath(), $fullDest);

                    $relativeUrl = "/images/uploads/{$dateFolder}/{$fileName}";
                    $fileSize = File::exists($fullDest) ? File::size($fullDest) : $file->getSize();
                    $width = null;
                    $height = null;
                    $storedMime = $mimeType;
                }

                $media = Media::create([
                    'name' => pathinfo($origName, PATHINFO_FILENAME),
                    'file_name' => $fileName,
                    'mime_type' => $storedMime,
                    'disk' => 'public',
                    'path' => ltrim($relativeUrl, '/'),
                    'url' => $relativeUrl,
                    'size' => $fileSize,
                    'width' => $width,
                    'height' => $height,
                    'alt' => str_replace(['-', '_'], ' ', pathinfo($origName, PATHINFO_FILENAME)),
                    'user_id' => Auth::id(),
                ]);

                ActivityLog::log('upload_media', "Subió medio: {$media->name} ({$media->file_name})", $media);
                $uploadedCount++;
            } catch (\Throwable $e) {
                logger()->error("Error subiendo medio {$origName}: " . $e->getMessage());
            }
        }

        $this->uploads = [];
        $this->notify("Se subieron y optimizaron {$uploadedCount} archivo(s) correctamente.");
    }

    public function openDetail(int $id): void
    {
        $media = Media::find($id);
        if (!$media) {
            return;
        }

        $this->activeMedia = $media;
        $this->editName = $media->name;
        $this->editAlt = $media->alt ?? '';
        $this->showDetailModal = true;
    }

    public function closeDetail(): void
    {
        $this->showDetailModal = false;
        $this->activeMedia = null;
    }

    public function saveDetails(): void
    {
        if (!$this->activeMedia) {
            return;
        }

        $this->validate([
            'editName' => 'required|string|max:255',
            'editAlt' => 'nullable|string|max:255',
        ]);

        $this->activeMedia->update([
            'name' => $this->editName,
            'alt' => $this->editAlt,
        ]);

        ActivityLog::log('update_media', "Actualizó metadatos del medio: {$this->activeMedia->name}", $this->activeMedia);
        $this->notify('Metadatos guardados con éxito.');
    }

    public function deleteSingle(int $id): void
    {
        $media = Media::find($id);
        if (!$media) {
            return;
        }

        $name = $media->name;
        $physicalPath = public_path($media->path);

        // Si el archivo está dentro de uploads, eliminarlo del disco
        if (str_starts_with($media->path, 'images/uploads/') && File::exists($physicalPath)) {
            File::delete($physicalPath);
        }

        $media->delete();

        if ($this->activeMedia?->id === $id) {
            $this->closeDetail();
        }

        ActivityLog::log('delete_media', "Eliminó el medio: {$name} (#{$id})");
        $this->notify("Archivo '{$name}' eliminado correctamente.");
    }

    public function deleteSelected(): void
    {
        if (empty($this->selected)) {
            $this->notify('No seleccionaste ningún archivo.', 'warning');
            return;
        }

        $count = 0;
        $medias = Media::whereIn('id', $this->selected)->get();

        foreach ($medias as $media) {
            $physicalPath = public_path($media->path);
            if (str_starts_with($media->path, 'images/uploads/') && File::exists($physicalPath)) {
                File::delete($physicalPath);
            }
            $media->delete();
            $count++;
        }

        $this->selected = [];
        $this->selectAll = false;

        if ($this->activeMedia && in_array($this->activeMedia->id, $this->selected)) {
            $this->closeDetail();
        }

        ActivityLog::log('bulk_delete_media', "Eliminó en lote {$count} archivos de medios.");
        $this->notify("Se eliminaron {$count} archivo(s) correctamente.");
    }

    /**
     * Escanea e indexa imágenes existentes en public/images/ para poblar la biblioteca inicial
     */
    public function syncExistingMedia(): void
    {
        $dirsToScan = [
            'images/pages',
            'images/hino',
            'images/novedades',
            'images/sliders',
            'images/toyota',
            'images/usados',
        ];

        $imported = 0;

        foreach ($dirsToScan as $relDir) {
            $dir = public_path($relDir);
            if (!File::isDirectory($dir)) {
                continue;
            }

            $files = File::allFiles($dir);
            foreach ($files as $file) {
                $ext = strtolower($file->getExtension());
                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'pdf', 'svg'])) {
                    continue;
                }

                $relPath = str_replace(DIRECTORY_SEPARATOR, '/', str_replace(public_path() . DIRECTORY_SEPARATOR, '', $file->getRealPath()));
                $url = '/' . ltrim($relPath, '/');

                // Verificar si ya está registrado
                if (Media::where('path', $relPath)->orWhere('url', $url)->exists()) {
                    continue;
                }

                $filename = $file->getFilename();
                $name = pathinfo($filename, PATHINFO_FILENAME);
                $mime = File::mimeType($file->getRealPath()) ?: 'image/jpeg';
                $dimensions = @getimagesize($file->getRealPath());

                Media::create([
                    'name' => ucwords(str_replace(['-', '_'], ' ', $name)),
                    'file_name' => $filename,
                    'mime_type' => $mime,
                    'disk' => 'public',
                    'path' => $relPath,
                    'url' => $url,
                    'size' => $file->getSize(),
                    'width' => $dimensions ? $dimensions[0] : null,
                    'height' => $dimensions ? $dimensions[1] : null,
                    'alt' => ucwords(str_replace(['-', '_'], ' ', $name)),
                    'user_id' => Auth::id(),
                ]);

                $imported++;
            }
        }

        ActivityLog::log('sync_existing_media', "Sincronizó e indexó {$imported} archivos existentes en la biblioteca de medios.");
        $this->notify("Se indexaron {$imported} archivo(s) existentes en la biblioteca.");
    }

    public function setViewMode(string $mode): void
    {
        $this->viewMode = in_array($mode, ['grid', 'list']) ? $mode : 'grid';
    }

    public function setFilterType(string $type): void
    {
        $this->filterType = $type;
        $this->resetPage();
    }

    public function getQuery()
    {
        $query = Media::query()->latest('created_at');

        if ($this->filterType === 'images') {
            $query->where('mime_type', 'like', 'image/%');
        } elseif ($this->filterType === 'documents') {
            $query->where('mime_type', 'not like', 'image/%')->where('mime_type', 'not like', 'video/%');
        } elseif ($this->filterType === 'videos') {
            $query->where('mime_type', 'like', 'video/%');
        }

        if (!empty($this->filterMonth)) {
            $parts = explode('-', $this->filterMonth);
            if (count($parts) === 2) {
                $query->whereYear('created_at', $parts[0])
                      ->whereMonth('created_at', $parts[1]);
            }
        }

        if (!empty($this->search)) {
            $search = '%' . trim($this->search) . '%';
            $likeOp = \Illuminate\Support\Facades\DB::getDriverName() === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($search, $likeOp) {
                $q->where('name', $likeOp, $search)
                  ->orWhere('file_name', $likeOp, $search)
                  ->orWhere('alt', $likeOp, $search);
            });
        }

        return $query;
    }

    public function render()
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('media')) {
            return view('livewire.admin.media-manager', [
                'mediaItems' => new \Illuminate\Pagination\LengthAwarePaginator([], 0, $this->perPage),
                'availableMonths' => collect([]),
                'totalCount' => 0,
                'imagesCount' => 0,
                'docsCount' => 0,
                'humanTotalSize' => '0 B',
                'filterType' => $this->filterType,
                'viewMode' => $this->viewMode,
                'selected' => [],
                'selectAll' => false,
                'showDetailModal' => false,
                'activeMedia' => null,
                'needsMigration' => true,
            ]);
        }

        $mediaQuery = $this->getQuery();
        $mediaItems = $mediaQuery->paginate($this->perPage);

        // Agrupar meses disponibles para el filtro (100% agnóstico de base de datos MySQL/PostgreSQL)
        $availableMonths = Media::select('created_at')
            ->orderBy('created_at', 'desc')
            ->pluck('created_at')
            ->filter()
            ->mapWithKeys(function ($date) {
                return [$date->format('Y-m') => ucfirst($date->translatedFormat('F Y'))];
            });

        $totalCount = Media::count();
        $imagesCount = Media::where('mime_type', 'like', 'image/%')->count();
        $docsCount = Media::where('mime_type', 'not like', 'image/%')->count();
        $totalBytes = Media::sum('size');
        $humanTotalSize = (new Media(['size' => $totalBytes]))->human_size;

        return view('livewire.admin.media-manager', [
            'mediaItems' => $mediaItems,
            'availableMonths' => $availableMonths,
            'totalCount' => $totalCount,
            'imagesCount' => $imagesCount,
            'docsCount' => $docsCount,
            'humanTotalSize' => $humanTotalSize,
            'filterType' => $this->filterType,
            'viewMode' => $this->viewMode,
            'selected' => $this->selected,
            'selectAll' => $this->selectAll,
            'showDetailModal' => $this->showDetailModal,
            'activeMedia' => $this->activeMedia,
        ]);
    }
}
