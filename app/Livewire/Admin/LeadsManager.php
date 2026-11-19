<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class LeadsManager extends BaseCrudComponent
{
    // Filtros Comerciales
    public string $filterCategory = 'todos'; // 'todos' | '0km' | 'usados' | 'taller'
    public string $filterAssignment = 'todos'; // 'todos' | 'mis_leads' | 'sin_asignar'
    public string $filterStatus = '';
    public string $filterType = '';
    public ?int $filterAssignedUser = null;

    // Panel de Gestión Inline (NO modal)
    public ?Lead $activeLead = null;
    public string $status = 'nuevo';
    public ?int $assigned_to_user_id = null;
    public string $internal_notes = '';

    public function mount()
    {
        // Si el usuario es vendedor, por conveniencia puede ver todos o sus leads
        if (Auth::user()?->isVendedor()) {
            // Inicializar en todos para visibilidad de oportunidades
            $this->filterAssignment = 'todos';
        }
    }

    protected function resetInputFields(): void
    {
        $this->activeLead = null;
        $this->status = 'nuevo';
        $this->assigned_to_user_id = null;
        $this->internal_notes = '';
        $this->selectedId = null;
        $this->isOpen = false;
    }

    public function viewLead(int $id)
    {
        $this->activeLead = Lead::with(['vehicle.brand', 'branch', 'assignedTo'])->findOrFail($id);
        $this->selectedId = $this->activeLead->id;
        $this->status = $this->activeLead->status;
        $this->assigned_to_user_id = $this->activeLead->assigned_to_user_id;
        $this->internal_notes = $this->activeLead->internal_notes ?? '';
        $this->isOpen = true;
    }

    public function closeLeadPanel()
    {
        $this->resetInputFields();
    }

    public function updateLead()
    {
        if (!$this->activeLead) return;

        $previousStatus = $this->activeLead->status;

        $this->activeLead->update([
            'status' => $this->status,
            'assigned_to_user_id' => $this->assigned_to_user_id,
            'internal_notes' => $this->internal_notes,
            'last_contacted_at' => now(),
        ]);

        ActivityLog::log(
            'crm_update',
            "Actualizó lead #{$this->activeLead->id} ({$this->activeLead->full_name}) de '{$previousStatus}' a '{$this->status}'",
            $this->activeLead
        );

        $this->closeLeadPanel();
        $this->notify('Seguimiento comercial guardado correctamente.');
    }

    /**
     * Auto-asignar lead al vendedor conectado
     */
    public function claimLead(int $id)
    {
        $lead = Lead::findOrFail($id);
        $currentUser = Auth::user();

        $updateData = [
            'assigned_to_user_id' => $currentUser->id,
            'last_contacted_at' => now(),
        ];

        // Si estaba nuevo, cambiar a en_gestion automáticamente
        if ($lead->status === 'nuevo') {
            $updateData['status'] = 'en_gestion';
        }

        $lead->update($updateData);

        ActivityLog::log(
            'crm_claim',
            "{$currentUser->name} tomó el lead #{$lead->id} ({$lead->full_name})",
            $lead
        );

        // Si estaba abierto en el panel inline, refrescar
        if ($this->activeLead && $this->activeLead->id === $id) {
            $this->viewLead($id);
        }

        $this->notify('¡Lead asignado a ti exitosamente!');
    }

    public function quickStatus(int $id, string $newStatus)
    {
        $lead = Lead::findOrFail($id);
        $lead->update([
            'status' => $newStatus,
            'last_contacted_at' => now()
        ]);

        ActivityLog::log(
            'crm_status',
            "Cambio rápido de estado para lead #{$id} a '{$newStatus}'",
            $lead
        );

        if ($this->activeLead && $this->activeLead->id === $id) {
            $this->status = $newStatus;
        }

        $this->notify('Estado comercial actualizado.');
    }

    public function delete(int $id)
    {
        $currentUser = Auth::user();
        if (!$currentUser || !$currentUser->isAdmin()) {
            $this->notify('Solo los administradores pueden eliminar registros de leads.', 'error');
            return;
        }

        $lead = Lead::findOrFail($id);
        $leadName = $lead->full_name;
        $lead->delete();

        ActivityLog::log('deleted_lead', "Eliminó lead #{$id} de {$leadName}");

        if ($this->activeLead && $this->activeLead->id === $id) {
            $this->closeLeadPanel();
        }

        $this->notify("Lead de {$leadName} eliminado correctamente.", 'warning');
    }

    public function setCategory(string $category)
    {
        $this->filterCategory = $category;
        $this->resetPage();
    }

    public function setAssignment(string $assignment)
    {
        $this->filterAssignment = $assignment;
        $this->resetPage();
    }

    public function render()
    {
        $currentUser = Auth::user();
        $users = User::where('is_active', true)->orderBy('name')->get();

        // Conteos para KPIs de gestión comercial
        $kpiTotal = Lead::count();
        $kpi0km = Lead::whereHas('vehicle', fn($q) => $q->where('condition', '0km'))->count();
        $kpiUsados = Lead::where(function($q) {
            $q->whereHas('vehicle', fn($vq) => $vq->where('condition', 'usado'))
              ->orWhere('type', 'usado_entrega')
              ->orWhereNotNull('trade_in_vehicle');
        })->count();
        $kpiMisLeads = $currentUser ? Lead::where('assigned_to_user_id', $currentUser->id)->count() : 0;
        $kpiSinAsignar = Lead::whereNull('assigned_to_user_id')->count();
        $kpiGanados = Lead::where('status', 'cerrado_ganado')->count();

        // Consulta de leads
        $query = Lead::with(['vehicle.brand', 'branch', 'assignedTo']);

        // Filtro por Categoría de Vehículo (0km vs Usados vs Taller)
        if ($this->filterCategory === '0km') {
            $query->whereHas('vehicle', function($q) {
                $q->where('condition', '0km');
            });
        } elseif ($this->filterCategory === 'usados') {
            $query->where(function($q) {
                $q->whereHas('vehicle', fn($vq) => $vq->where('condition', 'usado'))
                  ->orWhere('type', 'usado_entrega')
                  ->orWhereNotNull('trade_in_vehicle');
            });
        } elseif ($this->filterCategory === 'taller') {
            $query->where('type', 'taller_turno');
        }

        // Filtro por Asignación
        if ($this->filterAssignment === 'mis_leads' && $currentUser) {
            $query->where('assigned_to_user_id', $currentUser->id);
        } elseif ($this->filterAssignment === 'sin_asignar') {
            $query->whereNull('assigned_to_user_id');
        }

        // Filtro por Asesor asignado específico (Admin)
        if ($this->filterAssignedUser) {
            $query->where('assigned_to_user_id', $this->filterAssignedUser);
        }

        // Búsqueda de texto
        if (!empty(trim($this->search))) {
            $term = '%' . trim($this->search) . '%';
            $query->where(function($q) use ($term) {
                $q->where('full_name', 'LIKE', $term)
                  ->orWhere('phone', 'LIKE', $term)
                  ->orWhere('email', 'LIKE', $term)
                  ->orWhere('city', 'LIKE', $term)
                  ->orWhere('trade_in_vehicle', 'LIKE', $term);
            });
        }

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterType) {
            $query->where('type', $this->filterType);
        }

        $leads = $query->latest()->paginate($this->perPage);

        return view('livewire.admin.leads-manager', compact(
            'leads',
            'users',
            'kpiTotal',
            'kpi0km',
            'kpiUsados',
            'kpiMisLeads',
            'kpiSinAsignar',
            'kpiGanados'
        ));
    }
}
