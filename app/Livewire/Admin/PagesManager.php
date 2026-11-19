<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Page;
use App\Services\ImageOptimizer;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class PagesManager extends BaseCrudComponent
{
    use WithFileUploads;

    public string $title = '';
    public string $slug = '';
    public string $subtitle = '';
    public string $banner_image = '';
    public string $content = '';
    public string $meta_title = '';
    public string $meta_description = '';
    public bool $is_published = true;
    public int $sort_order = 0;

    // Subida directa de archivos (Desktop y Mobile)
    public $bannerUpload = null;
    public $contentUpload = null;
    public $segurosSlide1Upload = null;
    public $segurosSlide1MobileUpload = null;
    public $segurosSlide2Upload = null;
    public $segurosSlide2MobileUpload = null;
    public ?string $lastUploadedUrl = null;

    // Pestaña activa del editor de carrusel (slide1 o slide2)
    public string $activeSlideTab = 'slide1';

    protected function resetInputFields(): void
    {
        $this->title = '';
        $this->slug = '';
        $this->subtitle = '';
        $this->banner_image = '';
        $this->content = '';
        $this->meta_title = '';
        $this->meta_description = '';
        $this->is_published = true;
        $this->sort_order = (int) Page::max('sort_order') + 1;
        $this->selectedId = null;
        $this->bannerUpload = null;
        $this->contentUpload = null;
        $this->segurosSlide1Upload = null;
        $this->segurosSlide1MobileUpload = null;
        $this->segurosSlide2Upload = null;
        $this->segurosSlide2MobileUpload = null;
        $this->lastUploadedUrl = null;
        $this->activeSlideTab = 'slide1';
    }

    public function updatedTitle($value): void
    {
        if (!$this->selectedId) {
            $this->slug = Str::slug($value);
        }
    }

    public function updatedBannerUpload(): void
    {
        $this->validate([
            'bannerUpload' => 'image|max:8192',
        ]);

        $prefix = 'banner-' . ($this->slug ?: 'page');
        $storedUrl = ImageOptimizer::optimizeAndStore(
            $this->bannerUpload,
            'images/pages',
            $prefix,
            1920,
            1080,
            85
        );

        $this->banner_image = $storedUrl;
        $this->bannerUpload = null;
        $this->notify('Imagen de cabecera (Banner Hero) subida y optimizada exitosamente.');
    }

    public function removeBannerImage(): void
    {
        $this->banner_image = '';
        $this->bannerUpload = null;
        $this->notify('Imagen de cabecera removida.');
    }

    public function updatedContentUpload(): void
    {
        $this->validate([
            'contentUpload' => 'image|max:8192',
        ]);

        $prefix = 'page-' . ($this->slug ?: 'content');
        $storedUrl = ImageOptimizer::optimizeAndStore(
            $this->contentUpload,
            'images/pages',
            $prefix,
            1600,
            1200,
            82
        );

        $this->lastUploadedUrl = $storedUrl;
        $this->contentUpload = null;
        $this->notify('Imagen subida exitosamente. Podés copiar la URL o insertarla en el contenido.');
    }

    public function insertUploadedImage(): void
    {
        if (!$this->lastUploadedUrl) {
            return;
        }

        $alt = e($this->title ?: 'Imagen');
        $html = "\n<div class=\"my-8 text-center\">\n    <img src=\"{$this->lastUploadedUrl}\" alt=\"{$alt}\" class=\"w-full max-w-4xl mx-auto rounded-2xl shadow-lg object-cover\" />\n</div>\n";
        $this->content .= $html;
        $this->notify('Imagen insertada exitosamente al final del contenido.');
    }

    // ==========================================
    // MÉTODOS DE DIAPOSITIVA 1 (DESKTOP & MOBILE)
    // ==========================================
    public function getSlide1DesktopImage(): string
    {
        if (preg_match('/<!--\s*SLIDE 1:.*?<img[^>]+src=["\']([^"\']+)["\']/s', $this->content, $matches)) {
            return $matches[1];
        }
        return '/images/pages/seguros-promo-rio.jpeg';
    }

    public function getSlide1MobileImage(): ?string
    {
        if (preg_match('/<!--\s*SLIDE 1:.*?<source[^>]+srcset=["\']([^"\']+)["\']/s', $this->content, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public function updatedSegurosSlide1Upload(): void
    {
        $this->validate([
            'segurosSlide1Upload' => 'image|max:8192',
        ]);

        $storedUrl = ImageOptimizer::optimizeAndStore(
            $this->segurosSlide1Upload,
            'images/pages',
            'seguros-slide-1-desktop',
            1920,
            1080,
            85
        );

        $current = $this->getSlide1DesktopImage();
        if ($current && str_contains($this->content, $current)) {
            $this->content = str_replace($current, $storedUrl, $this->content);
        } else {
            $this->content = preg_replace(
                '/(<!--\s*SLIDE 1:.*?<img[^>]+src=["\'])[^"\']+(["\'])/s',
                '${1}' . $storedUrl . '${2}',
                $this->content,
                1
            );
        }

        $this->segurosSlide1Upload = null;
        $this->notify('Diapositiva 1 (Versión Computadora) actualizada correctamente.');
    }

    public function updatedSegurosSlide1MobileUpload(): void
    {
        $this->validate([
            'segurosSlide1MobileUpload' => 'image|max:8192',
        ]);

        $storedUrl = ImageOptimizer::optimizeAndStore(
            $this->segurosSlide1MobileUpload,
            'images/pages',
            'seguros-slide-1-mobile',
            800,
            1200,
            85
        );

        $currentMobile = $this->getSlide1MobileImage();
        if ($currentMobile && str_contains($this->content, $currentMobile)) {
            $this->content = str_replace($currentMobile, $storedUrl, $this->content);
        } else {
            // Envolver <img ...> dentro de <picture> con <source>
            $this->content = preg_replace(
                '/(<!--\s*SLIDE 1:.*?)(<img[^>]+>)/s',
                "$1<picture class=\"w-full h-full block\">\n        <source media=\"(max-width: 640px)\" srcset=\"{$storedUrl}\">\n        $2\n    </picture>",
                $this->content,
                1
            );
        }

        $this->segurosSlide1MobileUpload = null;
        $this->notify('Diapositiva 1 (Versión Celular / Móvil) actualizada correctamente.');
    }

    public function removeSegurosSlide1Mobile(): void
    {
        // Quitar etiqueta <source>
        $this->content = preg_replace(
            '/(<!--\s*SLIDE 1:.*?)<source[^>]+media=["\'][^"\']*640px[^"\']*["\'][^>]*>\s*/s',
            '$1',
            $this->content,
            1
        );
        // Desenvolver <picture> si queda solo el <img>
        $this->content = preg_replace(
            '/(<!--\s*SLIDE 1:.*?)<picture[^>]*>\s*(<img[^>]+>)\s*<\/picture>/s',
            '$1$2',
            $this->content,
            1
        );
        $this->notify('Imagen para móviles de Diapositiva 1 removida. Se usará la versión de escritorio.');
    }

    // ==========================================
    // MÉTODOS DE DIAPOSITIVA 2 (DESKTOP & MOBILE)
    // ==========================================
    public function getSlide2DesktopImage(): string
    {
        if (preg_match('/<!--\s*SLIDE 2:.*?<img[^>]+src=["\']([^"\']+)["\']/s', $this->content, $matches)) {
            return $matches[1];
        }
        return '/images/pages/seguros-slider.jpg';
    }

    public function getSlide2MobileImage(): ?string
    {
        if (preg_match('/<!--\s*SLIDE 2:.*?<source[^>]+srcset=["\']([^"\']+)["\']/s', $this->content, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public function updatedSegurosSlide2Upload(): void
    {
        $this->validate([
            'segurosSlide2Upload' => 'image|max:8192',
        ]);

        $storedUrl = ImageOptimizer::optimizeAndStore(
            $this->segurosSlide2Upload,
            'images/pages',
            'seguros-slide-2-desktop',
            1920,
            1080,
            85
        );

        $current = $this->getSlide2DesktopImage();
        if ($current && str_contains($this->content, $current)) {
            $this->content = str_replace($current, $storedUrl, $this->content);
        } else {
            $this->content = preg_replace(
                '/(<!--\s*SLIDE 2:.*?<img[^>]+src=["\'])[^"\']+(["\'])/s',
                '${1}' . $storedUrl . '${2}',
                $this->content,
                1
            );
        }

        $this->segurosSlide2Upload = null;
        $this->notify('Diapositiva 2 (Versión Computadora) actualizada correctamente.');
    }

    public function updatedSegurosSlide2MobileUpload(): void
    {
        $this->validate([
            'segurosSlide2MobileUpload' => 'image|max:8192',
        ]);

        $storedUrl = ImageOptimizer::optimizeAndStore(
            $this->segurosSlide2MobileUpload,
            'images/pages',
            'seguros-slide-2-mobile',
            800,
            1200,
            85
        );

        $currentMobile = $this->getSlide2MobileImage();
        if ($currentMobile && str_contains($this->content, $currentMobile)) {
            $this->content = str_replace($currentMobile, $storedUrl, $this->content);
        } else {
            $this->content = preg_replace(
                '/(<!--\s*SLIDE 2:.*?)(<img[^>]+>)/s',
                "$1<picture class=\"w-full h-full block\">\n        <source media=\"(max-width: 640px)\" srcset=\"{$storedUrl}\">\n        $2\n    </picture>",
                $this->content,
                1
            );
        }

        $this->segurosSlide2MobileUpload = null;
        $this->notify('Diapositiva 2 (Versión Celular / Móvil) actualizada correctamente.');
    }

    public function removeSegurosSlide2Mobile(): void
    {
        $this->content = preg_replace(
            '/(<!--\s*SLIDE 2:.*?)<source[^>]+media=["\'][^"\']*640px[^"\']*["\'][^>]*>\s*/s',
            '$1',
            $this->content,
            1
        );
        $this->content = preg_replace(
            '/(<!--\s*SLIDE 2:.*?)<picture[^>]*>\s*(<img[^>]+>)\s*<\/picture>/s',
            '$1$2',
            $this->content,
            1
        );
        $this->notify('Imagen para móviles de Diapositiva 2 removida. Se usará la versión de escritorio.');
    }

    public function getAvailablePageImagesProperty(): array
    {
        $dir = public_path('images/pages');
        if (!is_dir($dir)) {
            return [];
        }
        $files = scandir($dir);
        $images = [];
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'svg'])) {
                $images[] = [
                    'name' => $file,
                    'url' => '/images/pages/' . $file,
                    'size' => round(filesize($dir . '/' . $file) / 1024, 1) . ' KB',
                ];
            }
        }
        return array_slice($images, 0, 16);
    }

    public function edit(int $id): void
    {
        $this->resetInputFields();
        $page = Page::findOrFail($id);
        $this->selectedId = $page->id;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->subtitle = $page->subtitle ?? '';
        $this->banner_image = $page->banner_image ?? '';
        $this->content = $page->content;
        $this->meta_title = $page->meta_title ?? '';
        $this->meta_description = $page->meta_description ?? '';
        $this->is_published = (bool) $page->is_published;
        $this->sort_order = $page->sort_order;
        $this->isOpen = true;
    }

    public function save(): void
    {
        $this->validate([
            'title' => 'required|min:3|max:200',
            'slug' => 'required|min:2|max:200|unique:pages,slug,' . ($this->selectedId ?? 'NULL'),
            'content' => 'required|min:10',
            'banner_image' => 'nullable|string|max:500',
        ]);

        $data = [
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'subtitle' => $this->subtitle,
            'banner_image' => $this->banner_image,
            'content' => $this->content,
            'meta_title' => $this->meta_title ?: $this->title,
            'meta_description' => $this->meta_description ?: Str::limit(strip_tags($this->content), 150),
            'is_published' => $this->is_published,
            'sort_order' => $this->sort_order,
        ];

        if ($this->selectedId) {
            $page = Page::findOrFail($this->selectedId);
            $page->update($data);
            $msg = 'Página CMS actualizada exitosamente.';
        } else {
            $page = Page::create($data);
            $msg = 'Página CMS creada exitosamente.';
        }

        ActivityLog::log('manage_page', "Gestión de página CMS: {$page->title} (/{$page->slug})", $page);

        $this->closeModal();
        $this->notify($msg);
    }

    public function togglePublished(int $id): void
    {
        $page = Page::findOrFail($id);
        $page->update(['is_published' => !$page->is_published]);
        $this->notify('Estado de publicación actualizado.');
    }

    public function delete(int $id): void
    {
        $page = Page::findOrFail($id);
        $title = $page->title;
        $page->delete();

        ActivityLog::log('deleted_page', "Eliminó la página CMS {$title} (#{$id})");
        $this->notify("Página '{$title}' eliminada.", 'warning');
    }

    public function render()
    {
        $pages = Page::query()
            ->when($this->search, function ($q) {
                $q->where('title', 'like', "%{$this->search}%")
                  ->orWhere('slug', 'like', "%{$this->search}%");
            })
            ->orderBy('sort_order', 'asc')
            ->paginate(12);

        return view('livewire.admin.pages-manager', [
            'pages' => $pages,
            'availablePageImages' => $this->availablePageImages,
        ]);
    }
}
