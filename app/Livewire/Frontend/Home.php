<?php

namespace App\Livewire\Frontend;

use App\Models\Branch;
use App\Models\Lead;
use App\Models\Podcast;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Home extends Component
{
    public string $selectedCategory = 'indestructibles';

    // Formulario de Cotización Rápida
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $city = '';
    public string $vehicleInterest = '';
    public string $message = '';
    public string $turnstileToken = '';
    public bool $sentSuccess = false;

    protected function rules(): array
    {
        $rules = [
            'name' => 'required|min:3|max:100',
            'phone' => 'required|min:6|max:25',
            'email' => 'nullable|email',
            'city' => 'nullable|string',
            'vehicleInterest' => 'nullable|string',
            'message' => 'nullable|string|max:1000',
        ];

        if (config('services.turnstile.secret')) {
            $rules['turnstileToken'] = ['required', new \App\Rules\TurnstileRule()];
        }

        return $rules;
    }

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
            'message' => 'Interés en: ' . ($this->vehicleInterest ?: 'General') . ' | Mensaje: ' . $this->message,
            'status' => 'nuevo',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset(['name', 'phone', 'email', 'city', 'vehicleInterest', 'message', 'turnstileToken']);
        $this->sentSuccess = true;

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => $formConfig->success_message ?: '¡Tu solicitud fue enviada con éxito! Un asesor de CONSUR S.A. te contactará en breve.',
        ]);
    }

    public function render()
    {
        $sliders = Slider::group('home')->where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $categories = VehicleCategory::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        
        $vehiclesQuery = Vehicle::with(['brand', 'category', 'images'])
            ->available()
            ->newVehicles()
            ->whereHas('brand', function ($q) {
                $q->where('slug', 'toyota');
            });

        if ($this->selectedCategory === 'hibridos') {
            $vehiclesQuery->where(function ($q) {
                $q->where('is_hybrid', true)
                  ->orWhereIn('slug', ['corolla-cross', 'rav4', 'yaris-cross', 'corolla']);
            });
        } elseif ($this->selectedCategory === 'urbanos') {
            $vehiclesQuery->whereIn('slug', ['agya', 'raize', 'rush', 'corolla']);
        } elseif ($this->selectedCategory === 'utilitarios') {
            $vehiclesQuery->whereIn('slug', ['hiace']);
        } else {
            // Default: 'indestructibles'
            $vehiclesQuery->whereIn('slug', ['hilux', 'hilux-cabina-simple', 'fortuner', 'land-cruiser-prado', 'land-cruiser-300']);
        }

        $featured0km = $vehiclesQuery->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();
        $featuredUsados = Vehicle::with(['brand', 'category', 'images'])
            ->available()
            ->usedVehicles()
            ->featured()
            ->take(4)
            ->get();

        $podcasts = Podcast::where('is_active', true)->orderBy('sort_order', 'asc')->take(3)->get();
        $branches = Branch::where('is_active', true)->orderBy('sort_order', 'asc')->get();

        return view('livewire.frontend.home', compact(
            'sliders',
            'categories',
            'featured0km',
            'featuredUsados',
            'podcasts',
            'branches'
        ));
    }
}
