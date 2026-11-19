<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\SiteSection;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class SectionsManager extends Component
{
    public string $activeSectionKey = 'quick_value_bar';
    public array $content = [];
    public bool $is_visible = true;

    public function mount()
    {
        $this->loadSection($this->activeSectionKey);
    }

    public function selectSection(string $key)
    {
        $this->activeSectionKey = $key;
        $this->loadSection($key);
    }

    public function loadSection(string $key)
    {
        $sec = SiteSection::where('key', $key)->first();
        if ($sec) {
            $this->content = $sec->content ?? [];
            $this->is_visible = (bool) $sec->is_visible;
        } else {
            $this->content = [];
            $this->is_visible = true;
        }
    }

    public function save()
    {
        $sec = SiteSection::where('key', $this->activeSectionKey)->firstOrFail();
        $sec->update([
            'content' => $this->content,
            'is_visible' => $this->is_visible,
        ]);

        ActivityLog::log('section_customize', "Personalizó la sección de portada: {$sec->name}", $sec);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => "¡Sección '{$sec->name}' actualizada correctamente!",
        ]);
    }

    public function toggleVisibility(string $key)
    {
        $sec = SiteSection::where('key', $key)->firstOrFail();
        $sec->update(['is_visible' => !$sec->is_visible]);

        if ($this->activeSectionKey === $key) {
            $this->is_visible = $sec->is_visible;
        }

        $status = $sec->is_visible ? 'visible' : 'oculta';
        $this->dispatch('notify', [
            'type' => 'info',
            'message' => "Sección '{$sec->name}' ahora está {$status} en la web.",
        ]);
    }

    public function render()
    {
        $sections = SiteSection::orderBy('sort_order', 'asc')->get();
        $currentSection = $sections->firstWhere('key', $this->activeSectionKey);

        return view('livewire.admin.sections-manager', compact('sections', 'currentSection'));
    }
}
