<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class AuditManager extends Component
{
    use WithPagination;

    public string $search = '';
    public string $filterAction = '';

    public function updatingSearch() { $this->resetPage(); }
    public function updatingFilterAction() { $this->resetPage(); }

    public function render()
    {
        $query = ActivityLog::with('user');

        if (!empty(trim($this->search))) {
            $term = '%' . trim($this->search) . '%';
            $query->where(function($q) use ($term) {
                $q->where('description', 'LIKE', $term)
                  ->orWhere('ip_address', 'LIKE', $term)
                  ->orWhereHas('user', function($u) use ($term) {
                      $u->where('name', 'LIKE', $term)->orWhere('email', 'LIKE', $term);
                  });
            });
        }

        if ($this->filterAction) {
            $query->where('action', $this->filterAction);
        }

        $logs = $query->latest()->paginate(15);

        return view('livewire.admin.audit-manager', compact('logs'));
    }
}
