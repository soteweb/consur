<?php

namespace App\Livewire\Frontend;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Lead;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ToyotaLanding extends Component
{
    public string $selectedCategory = 'all';

    // Formulario de Cotización Rápida
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $city = '';
    public string $vehicleInterest = 'Toyota Hilux';
    public string $message = '';
    public bool $sentSuccess = false;

    protected $rules = [
        'name' => 'required|min:3|max:100',
        'phone' => 'required|min:6|max:25',
        'email' => 'nullable|email',
        'city' => 'nullable|string|max:100',
        'vehicleInterest' => 'required|string',
        'message' => 'nullable|string|max:1000',
    ];

    public function selectCategory(string $categorySlug)
    {
        $this->selectedCategory = $categorySlug;
    }

    public function submitQuotation()
    {
        $this->validate();

        $formConfig = \App\Models\FormConfig::getByKey('home_cotizacion');

        Lead::create([
            'type' => 'cotizacion',
            'full_name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'message' => 'Interés en Toyota 0 Km: ' . $this->vehicleInterest . ($this->message ? ' | Mensaje: ' . $this->message : ''),
            'status' => 'nuevo',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset(['name', 'phone', 'email', 'city', 'message']);
        $this->sentSuccess = true;

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => '¡Tu solicitud fue enviada con éxito! Un asesor oficial de CONSUR S.A. te contactará en breve.',
        ]);
    }

    public function render()
    {
        $brand = Brand::where('slug', 'toyota')->first();

        $categories = VehicleCategory::where('is_active', true)
            ->whereHas('vehicles', fn($v) => $v->where('condition', '0km')->where('status', 'disponible'))
            ->orderBy('sort_order', 'asc')
            ->get();

        $vehiclesQuery = Vehicle::with(['brand', 'category', 'images'])
            ->available()
            ->newVehicles();

        if ($this->selectedCategory !== 'all') {
            if ($this->selectedCategory === 'electrificados' || $this->selectedCategory === 'hibridos') {
                $vehiclesQuery->where(function ($q) {
                    $q->where('is_hybrid', true)
                      ->orWhereHas('category', fn($c) => $c->whereIn('slug', ['electrificados', 'hibridos']));
                });
            } elseif ($this->selectedCategory === 'pick-up' || $this->selectedCategory === 'camioneta') {
                $vehiclesQuery->whereHas('category', fn($c) => $c->whereIn('slug', ['pick-up', 'camioneta']));
            } elseif ($this->selectedCategory === 'utilitario' || $this->selectedCategory === 'comercial') {
                $vehiclesQuery->whereHas('category', fn($c) => $c->whereIn('slug', ['utilitario', 'comercial']));
            } else {
                $vehiclesQuery->whereHas('category', function ($q) {
                    $q->where('slug', $this->selectedCategory);
                });
            }
        }

        $vehicles = $vehiclesQuery->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();
        $branches = Branch::where('is_active', true)->orderBy('sort_order', 'asc')->get();

        return view('livewire.frontend.toyota-landing', [
            'brand' => $brand,
            'categories' => $categories,
            'vehicles' => $vehicles,
            'branches' => $branches,
        ])->layoutData([
            'title' => 'Toyota Paraguay • Modelos 0 Km | CONSUR S.A. Concesionario Oficial',
            'description' => 'Descubrí todos los modelos 0 Km de Toyota en CONSUR S.A.: Hilux, Corolla Cross, RAV4, Fortuner, Land Cruiser Prado y más. Servicio técnico oficial y sucursales en Paraguay.',
        ]);
    }
}

