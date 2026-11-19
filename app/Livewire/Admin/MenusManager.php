<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\MenuItem;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class MenusManager extends BaseCrudComponent
{
    public ?int $parent_id = null;
    public string $location = 'header';
    public string $title = '';
    public string $url = '';
    public string $target = '_self';
    public string $icon = '';
    public string $badge_text = '';
    public string $badge_color = 'red';
    public bool $is_active = true;
    public int $sort_order = 0;

    protected function resetInputFields(): void
    {
        $this->parent_id = null;
        $this->location = 'header';
        $this->title = '';
        $this->url = '';
        $this->target = '_self';
        $this->icon = '';
        $this->badge_text = '';
        $this->badge_color = 'red';
        $this->is_active = true;
        $this->sort_order = MenuItem::max('sort_order') + 1;
        $this->selectedId = null;
    }

    public function edit(int $id)
    {
        $this->resetInputFields();
        $item = MenuItem::findOrFail($id);
        $this->selectedId = $item->id;
        $this->parent_id = $item->parent_id;
        $this->location = $item->location;
        $this->title = $item->title;
        $this->url = $item->url;
        $this->target = $item->target;
        $this->icon = $item->icon ?? '';
        $this->badge_text = $item->badge_text ?? '';
        $this->badge_color = $item->badge_color ?? 'red';
        $this->is_active = (bool) $item->is_active;
        $this->sort_order = $item->sort_order;
        $this->isOpen = true;
    }

    public function setQuickUrl(string $url)
    {
        $this->url = $url;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|min:2|max:100',
            'url' => 'required|min:1|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'sort_order' => 'required|integer',
        ]);

        $data = [
            'parent_id' => $this->parent_id,
            'location' => $this->location,
            'title' => $this->title,
            'url' => $this->url,
            'target' => $this->target,
            'icon' => $this->icon,
            'badge_text' => $this->badge_text,
            'badge_color' => $this->badge_color,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        if ($this->selectedId) {
            // Evitar que un ítem sea padre de sí mismo
            if ($this->selectedId === $this->parent_id) {
                $this->notify('Un ítem no puede ser submenú de sí mismo.', 'danger');
                return;
            }
            $item = MenuItem::findOrFail($this->selectedId);
            $item->update($data);
            $msg = 'Ítem de menú actualizado.';
        } else {
            $item = MenuItem::create($data);
            $msg = 'Ítem de menú creado.';
        }

        ActivityLog::log('menu_manage', "Gestión de menú: {$item->title} ({$item->url})", $item);

        $this->closeModal();
        $this->notify($msg);
    }

    public function toggleActive(int $id)
    {
        $item = MenuItem::findOrFail($id);
        $item->update(['is_active' => !$item->is_active]);
        $this->notify('Estado de menú actualizado.');
    }

    public function delete(int $id)
    {
        $item = MenuItem::findOrFail($id);
        $title = $item->title;
        $item->delete();

        ActivityLog::log('deleted_menu_item', "Eliminó el ítem de menú {$title} (#{$id})");
        $this->notify("Ítem '{$title}' eliminado del menú.", 'warning');
    }

    public function render()
    {
        // Traer ítems de nivel superior con sus hijos ordenados
        $rootItems = MenuItem::whereNull('parent_id')
            ->where('location', 'header')
            ->with(['children' => function($q) {
                $q->orderBy('sort_order', 'asc');
            }])
            ->orderBy('sort_order', 'asc')
            ->get();

        $potentialParents = MenuItem::whereNull('parent_id')
            ->when($this->selectedId, fn($q) => $q->where('id', '!=', $this->selectedId))
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('livewire.admin.menus-manager', compact('rootItems', 'potentialParents'));
    }
}
