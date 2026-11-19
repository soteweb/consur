<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class NewsIndex extends Component
{
    use WithPagination;

    #[Url(except: '')]
    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::published()
            ->when($this->search, function ($q) {
                $q->where(function ($sub) {
                    $sub->where('title', 'like', "%{$this->search}%")
                        ->orWhere('excerpt', 'like', "%{$this->search}%")
                        ->orWhere('content', 'like', "%{$this->search}%");
                });
            })
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(9);

        return view('livewire.frontend.news-index', compact('posts'))
            ->layoutData([
                'title' => 'Novedades & Noticias | Consur S.A. Toyota',
                'description' => 'Conocé todas las novedades, lanzamientos, eventos deportivos e inauguraciones de Consur S.A. en Paraguay.',
            ]);
    }
}

