<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class NewsDetail extends Component
{
    public Post $post;

    public function mount(string $slug)
    {
        $this->post = Post::published()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        $recentPosts = Post::published()
            ->where('id', '!=', $this->post->id)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('livewire.frontend.news-detail', compact('recentPosts'))
            ->layoutData([
                'title' => ($this->post->meta_title ?: $this->post->title) . ' | Novedades Consur S.A.',
                'description' => $this->post->meta_description ?: $this->post->excerpt,
            ]);
    }
}

