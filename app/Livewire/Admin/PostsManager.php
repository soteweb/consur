<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class PostsManager extends BaseCrudComponent
{
    use WithFileUploads;

    public string $filterStatus = '';

    public string $title = '';
    public string $slug = '';
    public string $excerpt = '';
    public string $content = '';
    public string $featured_image = '';
    public string $published_date = '';
    public bool $is_published = true;
    public array $gallery = [];

    public $featuredUpload = null;
    public $inlineUpload = null;
    public $galleryUploads = [];

    protected function resetInputFields(): void
    {
        $this->title = '';
        $this->slug = '';
        $this->excerpt = '';
        $this->content = '';
        $this->featured_image = '';
        $this->published_date = now()->format('Y-m-d');
        $this->is_published = true;
        $this->gallery = [];
        $this->featuredUpload = null;
        $this->inlineUpload = null;
        $this->galleryUploads = [];
        $this->selectedId = null;
    }

    public function updatedTitle($value): void
    {
        if (!$this->selectedId) {
            $this->slug = Post::createSlug($value);
        }
    }

    public function updatedFeaturedUpload(): void
    {
        $this->validate([
            'featuredUpload' => 'image|max:6144',
        ]);

        $targetDir = public_path('images/novedades');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        $ext = $this->featuredUpload->getClientOriginalExtension() ?: 'jpg';
        $baseSlug = Str::slug($this->slug ?: $this->title ?: 'novedad');
        $filename = $baseSlug . '-' . time() . '.' . strtolower($ext);

        $this->featuredUpload->storeAs('', $filename, [
            'disk' => 'local',
        ]);
        // Copy from temporary path directly to public/images/novedades
        copy($this->featuredUpload->getRealPath(), $targetDir . DIRECTORY_SEPARATOR . $filename);

        $this->featured_image = '/images/novedades/' . $filename;
        $this->featuredUpload = null;
        $this->notify('Imagen destacada subida correctamente.');
    }

    public function updatedInlineUpload(): void
    {
        $this->validate([
            'inlineUpload' => 'image|max:6144',
        ]);

        $targetDir = public_path('images/novedades');
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        $ext = $this->inlineUpload->getClientOriginalExtension() ?: 'jpg';
        $baseSlug = Str::slug($this->slug ?: $this->title ?: 'novedad');
        $filename = $baseSlug . '-img-' . time() . '.' . strtolower($ext);

        copy($this->inlineUpload->getRealPath(), $targetDir . DIRECTORY_SEPARATOR . $filename);

        $url = '/images/novedades/' . $filename;
        $this->content .= "\n<p><img src=\"{$url}\" alt=\"" . e($this->title ?: 'Imagen Novedad') . "\" /></p>";
        $this->inlineUpload = null;
        $this->notify('Imagen insertada al final del contenido.');
    }

    public function updatedGalleryUploads(): void
    {
        $this->validate([
            'galleryUploads.*' => 'image|max:12288',
        ]);

        $prefix = Str::slug($this->slug ?: $this->title ?: 'novedad');

        foreach ($this->galleryUploads as $upload) {
            $storedUrl = \App\Services\ImageOptimizer::optimizeAndStore(
                $upload,
                'images/novedades/gallery',
                $prefix,
                1600,
                1200,
                82
            );
            $this->gallery[] = $storedUrl;
        }

        $this->galleryUploads = [];
        $this->notify('Fotos optimizadas y agregadas a la galería.');
    }

    public function removeGalleryImage(int $index): void
    {
        if (isset($this->gallery[$index])) {
            $path = public_path(ltrim($this->gallery[$index], '/'));
            if (file_exists($path)) {
                @unlink($path);
            }
            unset($this->gallery[$index]);
            $this->gallery = array_values($this->gallery);
            $this->notify('Foto eliminada de la galería.', 'warning');
        }
    }

    public function edit(int $id): void
    {
        $this->resetInputFields();
        $post = Post::findOrFail($id);

        $this->selectedId = $post->id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->excerpt = $post->excerpt ?? '';
        $this->content = $post->content;
        $this->featured_image = $post->featured_image ?? '';
        $this->gallery = is_array($post->gallery) ? $post->gallery : [];
        $this->published_date = ($post->published_at ?? $post->created_at ?? now())->format('Y-m-d');
        $this->is_published = (bool) $post->is_published;
        $this->isOpen = true;
    }

    public function save(): void
    {
        $this->validate([
            'title' => 'required|min:3|max:250',
            'slug' => 'required|min:2|max:250|unique:posts,slug,' . ($this->selectedId ?? 'NULL'),
            'content' => 'required|min:10',
            'published_date' => 'required|date',
        ]);

        $plainExcerpt = $this->excerpt
            ?: Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($this->content))), 220);

        $data = [
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'category' => 'Novedades',
            'excerpt' => $plainExcerpt,
            'content' => $this->content,
            'featured_image' => $this->featured_image ?: null,
            'gallery' => !empty($this->gallery) ? array_values($this->gallery) : null,
            'published_at' => $this->published_date . ' 12:00:00',
            'is_published' => $this->is_published,
            'meta_title' => $this->title,
            'meta_description' => Str::limit($plainExcerpt, 160),
        ];

        if ($this->selectedId) {
            $post = Post::findOrFail($this->selectedId);
            $post->update($data);
            $msg = 'Entrada de Novedades actualizada exitosamente.';
        } else {
            $post = Post::create($data);
            $msg = 'Nueva entrada publicada en Novedades.';
        }

        ActivityLog::log('manage_post', "Gestión de Novedad: {$post->title} (/novedades/{$post->slug})", $post);

        $this->closeModal();
        $this->notify($msg);
    }

    public function togglePublished(int $id): void
    {
        $post = Post::findOrFail($id);
        $post->update(['is_published' => !$post->is_published]);
        $this->notify('Estado de la novedad actualizado.');
    }

    public function delete(int $id): void
    {
        $post = Post::findOrFail($id);
        $title = $post->title;
        $post->delete();

        ActivityLog::log('deleted_post', "Eliminó la novedad '{$title}' (#{$id})");
        $this->notify("Novedad '{$title}' eliminada.", 'warning');
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->search, function ($q) {
                $q->where(function ($sub) {
                    $sub->where('title', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%")
                        ->orWhere('excerpt', 'like', "%{$this->search}%");
                });
            })
            ->when($this->filterStatus !== '', function ($q) {
                $q->where('is_published', $this->filterStatus === '1');
            })
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(12);

        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();

        return view('livewire.admin.posts-manager', compact('posts', 'totalPosts', 'publishedPosts'))
            ->layoutData(['header' => 'Gestor de Novedades (Entradas)']);
    }
}

