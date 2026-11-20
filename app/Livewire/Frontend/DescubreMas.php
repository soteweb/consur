<?php

namespace App\Livewire\Frontend;

use App\Models\Branch;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Centro de Información – CONSUR S.A.')]
class DescubreMas extends Component
{
    /** @var Collection<int, Branch> */
    public Collection $branches;

    public int $selectedBranchId = 1;

    public function mount(): void
    {
        $this->branches = Branch::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $defaultBranch = $this->branches->firstWhere('name', 'Casa Matriz') ?? $this->branches->first();
        if ($defaultBranch) {
            $this->selectedBranchId = (int) $defaultBranch->id;
        }
    }

    public function selectBranch(int $id): void
    {
        $this->selectedBranchId = $id;
    }

    public function getSelectedBranchProperty(): ?Branch
    {
        return $this->branches->firstWhere('id', $this->selectedBranchId) ?? $this->branches->first();
    }

    public function render(): View
    {
        $whatsappNumber = Setting::get('contact_whatsapp', '595985204106');
        $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsappNumber);

        return view('livewire.frontend.descubremas', [
            'branches' => $this->branches,
            'selectedBranch' => $this->selectedBranch,
            'whatsappNumber' => $cleanWhatsapp,
            'displayWhatsapp' => '+595 985 204 106',
        ])->layoutData([
            'title' => 'Centro de Información – CONSUR S.A.',
            'description' => '¡Gracias por elegir CONSUR! Información sobre garantía Toyota de 3 años o 100.000 kms, mantenimientos programados, taller móvil y red de atención oficial.',
            'ogImage' => asset('images/descubremas/tallermovilmejorado.jpg'),
        ]);
    }
}
