<?php

namespace App\Livewire\Frontend;

use App\Models\Branch;
use App\Models\FormConfig;
use App\Models\Lead;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Contacto & Sucursales – CONSUR S.A.')]
class ContactPage extends Component
{
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $city = '';
    public string $department = 'ventas';
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
            'department' => 'required|string',
            'vehicleInterest' => 'nullable|string',
            'message' => 'nullable|string|max:1000',
        ];

        if (config('services.turnstile.secret')) {
            $rules['turnstileToken'] = ['required', new \App\Rules\TurnstileRule()];
        }

        return $rules;
    }

    public function submitContact(): void
    {
        $this->validate();

        $formConfig = FormConfig::getByKey('contacto_principal');

        Lead::create([
            'type' => $this->department === 'posventa' ? 'servicio' : 'cotizacion',
            'full_name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'message' => "[Área: {$this->department}] " . ($this->vehicleInterest ? "Interés: {$this->vehicleInterest} | " : '') . $this->message,
            'status' => 'nuevo',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset(['name', 'phone', 'email', 'city', 'department', 'vehicleInterest', 'message', 'turnstileToken']);
        $this->sentSuccess = true;

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => $formConfig->success_message ?: '¡Tu mensaje fue enviado con éxito! Un representante oficial de CONSUR S.A. te contactará a la brevedad.',
        ]);
    }

    public function render()
    {
        $branches = Branch::where('is_active', true)->orderBy('sort_order', 'asc')->get();

        return view('livewire.frontend.contact-page', [
            'branches' => $branches,
            'companyPhone' => Setting::get('contact_phone', '+595 71 204 106'),
            'companyWhatsapp' => Setting::get('contact_whatsapp', '595985804106'),
            'companyEmail' => Setting::get('contact_email', 'contacto@consur.com.py'),
            'scheduleInfo' => Setting::get('schedule_info', 'Lun a Vie: 7:00 a 12:00 • 14:00 a 17:30 | Sáb: 7:30 a 12:00'),
        ]);
    }
}
