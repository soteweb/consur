<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class BaseCrudComponent extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $isOpen = false;
    public array $selected = [];
    public bool $selectAll = false;
    public int $perPage = 10;
    public ?int $selectedId = null;

    /**
     * Limpia los campos del formulario (implementado en cada componente hijo)
     */
    abstract protected function resetInputFields(): void;

    public function create(): void
    {
        $this->resetInputFields();
        $this->selectedId = null;
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function updatingSearch(&$value): void
    {
        // Sanitizar caracteres especiales en la búsqueda
        $value = str_replace(["'", "´", "`", "’", "\"", "\\"], '', (string)$value);
        $this->resetPage();
    }

    public function updatedSelectAll($value): void
    {
        if ($value) {
            $this->selected = $this->getQuery()->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    /**
     * Despacha una notificación Toast con Alpine.js
     */
    protected function notify(string $message, string $type = 'success'): void
    {
        $this->dispatch('notify', [
            'type' => $type,
            'message' => $message,
        ]);
    }
}
