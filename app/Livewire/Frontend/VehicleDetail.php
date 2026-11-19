<?php

namespace App\Livewire\Frontend;

use App\Models\Lead;
use App\Models\Vehicle;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class VehicleDetail extends Component
{
    public Vehicle $vehicle;
    public int $activeImage = 0;

    // Simulador financiero
    public int $downPaymentPercent = 30; // Porcentaje de entrega inicial
    public int $months = 36; // Plazo en meses

    // Formulario de Consulta / Test Drive
    public string $clientName = '';
    public string $clientPhone = '';
    public string $clientEmail = '';
    public string $clientCity = '';
    public string $consultationType = 'cotizacion'; // cotizacion | test_drive | usado_entrega
    public string $clientMessage = '';
    public ?string $tradeInModel = '';
    public string $turnstileToken = '';
    public bool $sentSuccess = false;

    protected function rules(): array
    {
        $rules = [
            'clientName' => 'required|min:3|max:100',
            'clientPhone' => 'required|min:6|max:25',
            'clientEmail' => 'nullable|email',
            'clientCity' => 'nullable|string',
            'consultationType' => 'required|in:cotizacion,test_drive,usado_entrega',
            'clientMessage' => 'nullable|string|max:1000',
            'tradeInModel' => 'nullable|string|max:100',
        ];

        if (config('services.turnstile.secret')) {
            $rules['turnstileToken'] = ['required', new \App\Rules\TurnstileRule()];
        }

        return $rules;
    }

    public function mount(string $slug)
    {
        $this->vehicle = Vehicle::with(['brand', 'category', 'branch', 'images'])
            ->where('slug', $slug)
            ->first()
            ?? Vehicle::with(['brand', 'category', 'branch', 'images'])
                ->whereRaw('LOWER(model) = ?', [strtolower($slug)])
                ->orderByRaw("CASE WHEN condition = '0km' THEN 0 ELSE 1 END")
                ->firstOrFail();
    }

    public function calculateFinancing(): array
    {
        $price = (float) ($this->vehicle->price_usd ?? 0);
        $downPayment = ($price * $this->downPaymentPercent) / 100;
        $balance = $price - $downPayment;
        
        // Tasa de interés anual estimada ~ 10%
        $annualRate = 0.10;
        $monthlyRate = $annualRate / 12;
        
        if ($this->months > 0 && $monthlyRate > 0) {
            $monthlyInstallment = ($balance * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$this->months));
        } else {
            $monthlyInstallment = $this->months > 0 ? $balance / $this->months : 0;
        }

        return [
            'down_payment' => round($downPayment),
            'balance' => round($balance),
            'monthly_installment' => round($monthlyInstallment),
        ];
    }

    public function submitLead()
    {
        $this->validate();

        $formConfig = \App\Models\FormConfig::getByKey('vehicle_detail');

        Lead::create([
            'type' => $this->consultationType,
            'vehicle_id' => $this->vehicle->id,
            'branch_id' => $this->vehicle->branch_id,
            'full_name' => $this->clientName,
            'phone' => $this->clientPhone,
            'email' => $this->clientEmail,
            'city' => $this->clientCity,
            'financing_plan' => "Entrega {$this->downPaymentPercent}% + {$this->months} cuotas",
            'trade_in_vehicle' => $this->tradeInModel,
            'message' => $this->clientMessage,
            'status' => 'nuevo',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset(['clientName', 'clientPhone', 'clientEmail', 'clientCity', 'clientMessage', 'tradeInModel', 'turnstileToken']);
        $this->sentSuccess = true;

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => $formConfig->success_message ?: '¡Solicitud enviada! Nuestro equipo comercial te contactará inmediatamente.',
        ]);
    }

    public function render()
    {
        $similarVehicles = Vehicle::with(['brand', 'images'])
            ->available()
            ->where('id', '!=', $this->vehicle->id)
            ->where(function ($q) {
                $q->where('vehicle_category_id', $this->vehicle->vehicle_category_id)
                  ->orWhere('condition', $this->vehicle->condition);
            })
            ->take(3)
            ->get();

        $financing = $this->calculateFinancing();

        return view('livewire.frontend.vehicle-detail', compact('similarVehicles', 'financing'));
    }
}
