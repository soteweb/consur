<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Branch;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class BranchesManager extends BaseCrudComponent
{
    public string $name = '';
    public string $city = '';
    public string $address = '';
    public string $phone = '';
    public string $whatsapp = '';
    public string $email = '';
    public string $schedule_weekdays = '';
    public string $schedule_saturday = '';
    public string $google_maps_url = '';
    public int $sort_order = 0;
    public bool $has_workshop = true;
    public bool $has_mobile_workshop = false;
    public bool $is_active = true;

    protected function resetInputFields(): void
    {
        $this->name = '';
        $this->city = '';
        $this->address = '';
        $this->phone = '';
        $this->whatsapp = '+595 985 204 106';
        $this->email = '';
        $this->schedule_weekdays = 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:00 Hs.';
        $this->schedule_saturday = 'Sábados de 07:30 a 12:00 Hs.';
        $this->google_maps_url = '';
        $this->sort_order = Branch::max('sort_order') + 1;
        $this->has_workshop = true;
        $this->has_mobile_workshop = false;
        $this->is_active = true;
        $this->selectedId = null;
    }

    public function edit(int $id)
    {
        $this->resetInputFields();
        $b = Branch::findOrFail($id);
        $this->selectedId = $b->id;
        $this->name = $b->name;
        $this->city = $b->city;
        $this->address = $b->address;
        $this->phone = $b->phone ?? '';
        $this->whatsapp = $b->whatsapp ?? '';
        $this->email = $b->email ?? '';
        $this->schedule_weekdays = $b->schedule_weekdays ?? '';
        $this->schedule_saturday = $b->schedule_saturday ?? '';
        $this->google_maps_url = $b->google_maps_url ?? '';
        $this->sort_order = (int) ($b->sort_order ?? 0);
        $this->has_workshop = (bool) $b->has_workshop;
        $this->has_mobile_workshop = (bool) $b->has_mobile_workshop;
        $this->is_active = (bool) $b->is_active;
        $this->isOpen = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:100',
            'city' => 'required|min:2|max:60',
            'address' => 'required|min:4|max:200',
        ]);

        // Si el usuario pegó un <iframe src="..."> completo, extraemos el src limpio
        $mapUrl = trim($this->google_maps_url);
        if (preg_match('/src=["\']([^"\']+)["\']/i', $mapUrl, $m)) {
            $mapUrl = $m[1];
        }

        $data = [
            'name' => $this->name,
            'city' => $this->city,
            'address' => $this->address,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'schedule_weekdays' => $this->schedule_weekdays,
            'schedule_saturday' => $this->schedule_saturday,
            'google_maps_url' => $mapUrl ?: null,
            'sort_order' => (int) $this->sort_order,
            'has_workshop' => $this->has_workshop,
            'has_mobile_workshop' => $this->has_mobile_workshop,
            'is_active' => $this->is_active,
        ];

        if ($this->selectedId) {
            $b = Branch::findOrFail($this->selectedId);
            $b->update($data);
            $msg = 'Sucursal actualizada.';
        } else {
            $b = Branch::create($data);
            $msg = 'Sucursal creada.';
        }

        ActivityLog::log('branch_manage', "Gestión de sucursal: {$b->name}", $b);
        $this->closeModal();
        $this->notify($msg);
    }

    public function delete(int $id)
    {
        $b = Branch::findOrFail($id);
        $b->delete();
        $this->notify('Sucursal eliminada.', 'warning');
    }

    public function render()
    {
        $branches = Branch::withCount('vehicles')->orderBy('sort_order', 'asc')->get();
        return view('livewire.admin.branches-manager', compact('branches'));
    }
}
