<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Slider;
use App\Services\ImageOptimizer;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class SlidersManager extends BaseCrudComponent
{
    use WithFileUploads;

    public string $group = 'home';
    public string $activeGroup = 'home';

    public string $tag = '';
    public string $title = '';
    public string $description = '';
    public string $button_text = '';
    public string $button_url = '';
    public string $button_secondary_text = '';
    public string $button_secondary_url = '';
    public string $image_desktop = '';
    public string $image_mobile = '';
    public string $video_url = '';
    public string $content_position = 'left';
    public $uploadedDesktopImage = null;
    public $uploadedMobileImage = null;
    public $uploadedVideo = null;
    public bool $is_active = true;
    public int $sort_order = 0;

    protected function resetInputFields(): void
    {
        $this->group = $this->activeGroup;
        $this->tag = '';
        $this->title = '';
        $this->description = '';
        $this->button_text = '';
        $this->button_url = '';
        $this->button_secondary_text = '';
        $this->button_secondary_url = '';
        $this->image_desktop = '';
        $this->image_mobile = '';
        $this->video_url = '';
        $this->content_position = 'left';
        $this->uploadedDesktopImage = null;
        $this->uploadedMobileImage = null;
        $this->uploadedVideo = null;
        $this->is_active = true;
        $this->sort_order = (int) Slider::where('group', $this->activeGroup)->max('sort_order') + 1;
        $this->selectedId = null;
    }

    public function switchGroup(string $group): void
    {
        $this->activeGroup = in_array($group, ['home', 'seguros']) ? $group : 'home';
        $this->closeModal();
        $this->resetPage();
    }

    public function clearVideo(): void
    {
        $this->video_url = '';
        $this->uploadedVideo = null;
    }

    public function edit(int $id)
    {
        $this->resetInputFields();
        $slider = Slider::findOrFail($id);
        $this->selectedId = $slider->id;
        $this->group = $slider->group ?: 'home';
        $this->tag = $slider->tag ?? '';
        $this->title = $slider->title ?? '';
        $this->description = $slider->description ?? '';
        $this->button_text = $slider->button_text ?? '';
        $this->button_url = $slider->button_url ?? '';
        $this->button_secondary_text = $slider->button_secondary_text ?? '';
        $this->button_secondary_url = $slider->button_secondary_url ?? '';
        $this->image_desktop = $slider->image_desktop;
        $this->image_mobile = $slider->image_mobile ?? '';
        $this->video_url = $slider->video_url ?? '';
        $this->content_position = $slider->content_position ?? 'left';
        $this->is_active = (bool) $slider->is_active;
        $this->sort_order = $slider->sort_order;
        $this->isOpen = true;
    }

    public function save()
    {
        if ($this->uploadedDesktopImage) {
            $this->validate(['uploadedDesktopImage' => 'image|max:25600']);
            $slug = 'slider-' . Str::slug($this->group . '-' . ($this->title ?: 'desktop'));
            $storedUrl = ImageOptimizer::optimizeAndStore(
                $this->uploadedDesktopImage,
                'images/sliders',
                $slug,
                2560,
                1440,
                86
            );
            $this->image_desktop = ltrim($storedUrl, '/');
        }

        if ($this->uploadedMobileImage) {
            $this->validate(['uploadedMobileImage' => 'image|max:25600']);
            $slug = 'slider-' . Str::slug($this->group . '-' . ($this->title ?: 'mobile'));
            $storedUrl = ImageOptimizer::optimizeAndStore(
                $this->uploadedMobileImage,
                'images/sliders',
                $slug,
                960,
                1440,
                86
            );
            $this->image_mobile = ltrim($storedUrl, '/');
        }

        if ($this->uploadedVideo) {
            $this->validate(['uploadedVideo' => 'file|mimes:mp4,webm,ogg,mov|max:51200']);
            $this->video_url = $this->uploadedVideo->store('sliders', 'public');
        }

        $this->validate([
            'group' => 'required|in:home,seguros',
            'title' => 'nullable|max:150',
            'image_desktop' => 'required|string',
            'image_mobile' => 'nullable|string',
            'video_url' => 'nullable|string|max:500',
        ]);

        $data = [
            'group' => $this->group,
            'tag' => $this->tag ?: null,
            'title' => $this->title ?: null,
            'description' => $this->description ?: null,
            'button_text' => $this->button_text ?: null,
            'button_url' => $this->button_url ?: null,
            'button_secondary_text' => $this->button_secondary_text ?: null,
            'button_secondary_url' => $this->button_secondary_url ?: null,
            'image_desktop' => $this->image_desktop,
            'image_mobile' => $this->image_mobile ?: null,
            'video_url' => $this->video_url ?: null,
            'content_position' => in_array($this->content_position, ['left', 'center', 'right']) ? $this->content_position : 'left',
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        if ($this->selectedId) {
            $slider = Slider::findOrFail($this->selectedId);
            $slider->update($data);
            $msg = 'Banner actualizado exitosamente.';
        } else {
            $slider = Slider::create($data);
            $msg = 'Banner creado exitosamente.';
        }

        ActivityLog::log('banner_manage', "Gestión de slider: " . ($slider->title ?: ('Banner #' . $slider->id . ' [' . $slider->group . ']')), $slider);

        $this->closeModal();
        $this->notify($msg);
    }

    public function toggleActive(int $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->update(['is_active' => !$slider->is_active]);
        $this->notify('Estado de banner actualizado.');
    }

    public function delete(int $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        $this->notify('Banner eliminado.', 'warning');
    }

    public function render()
    {
        $sliders = Slider::where('group', $this->activeGroup)
            ->orderBy('sort_order', 'asc')
            ->paginate(12);

        $countHome = Slider::where('group', 'home')->count();
        $countSeguros = Slider::where('group', 'seguros')->count();

        return view('livewire.admin.sliders-manager', compact('sliders', 'countHome', 'countSeguros'));
    }
}
