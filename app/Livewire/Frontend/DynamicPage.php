<?php

namespace App\Livewire\Frontend;

use App\Models\Page;
use App\Models\Slider;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class DynamicPage extends Component
{
    public Page $page;

    public function mount(?string $slug = null)
    {
        if (empty($slug)) {
            $path = trim(request()->path(), '/');
            $slug = match ($path) {
                'la-empresa' => 'la-empresa',
                'seguros' => 'seguros',
                'consur-bike', 'consurbike' => 'consur-bike',
                'novedades' => 'novedades',
                'posventa' => 'posventa',
                'hino' => 'hino',
                default => $path ?: 'posventa',
            };
        }

        $this->page = Page::published()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getParsedContentProperty(): string
    {
        $content = $this->page->content;

        // Parser de shortcode dinámico [slider:grupo] para banners hero
        $content = preg_replace_callback('/\[slider:([a-zA-Z0-9_-]+)\]/', function ($matches) {
            $group = $matches[1];
            $sliders = Slider::group($group)
                ->where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->get();

            if ($sliders->isEmpty()) {
                return '';
            }

            return view('components.frontend.hero-slider', [
                'sliders' => $sliders,
                'group' => $group,
            ])->render();
        }, $content);

        return $content;
    }

    public function render()
    {
        return view('livewire.frontend.dynamic-page')
            ->layoutData([
                'title' => ($this->page->meta_title ?: $this->page->title) . ' | CONSUR S.A.',
                'description' => $this->page->meta_description ?: $this->page->subtitle,
            ]);
    }
}
