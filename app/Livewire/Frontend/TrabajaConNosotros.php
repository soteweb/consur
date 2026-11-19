<?php

namespace App\Livewire\Frontend;

use App\Models\Lead;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class TrabajaConNosotros extends Component
{
    use WithFileUploads;

    // Datos Personales
    public string $nombres = '';
    public string $apellidos = '';
    public string $correo = '';
    public string $ciudad = '';
    public string $cedula = '';
    public string $celular = '';
    public string $lineabaja = '';
    public string $cargo = '';

    // Archivos
    public $fotoactual = null;
    public $curriculum = null;

    // Área de Interés (hasta 2 opciones)
    public array $areainteres = [];

    // Observaciones
    public string $observaciones = '';
    public string $turnstileToken = '';

    // Estado de envío
    public bool $sentSuccess = false;

    public array $availableAreas = [
        'Administración',
        'Ventas',
        'Chapería',
        'Chofer',
        'Contabilidad',
        'RRHH',
        'Pintura',
        'Recepción',
        'Mecánica',
        'Marketing',
        'Sistemas Informáticos',
        'Depósitos',
        'Otro',
    ];

    public function toggleArea(string $area)
    {
        if (in_array($area, $this->areainteres)) {
            $this->areainteres = array_values(array_diff($this->areainteres, [$area]));
        } else {
            if (count($this->areainteres) >= 2) {
                $this->addError('areainteres', 'Puedes marcar hasta 2 opciones como máximo.');
                return;
            }
            $this->resetErrorBag('areainteres');
            $this->areainteres[] = $area;
        }
    }

    public function submitApplication()
    {
        $rules = [
            'nombres' => 'required|string|min:2|max:100',
            'apellidos' => 'required|string|min:2|max:100',
            'correo' => 'required|email|max:150',
            'ciudad' => 'nullable|string|max:100',
            'cedula' => 'required|string|min:4|max:30',
            'celular' => 'required|string|min:6|max:30',
            'lineabaja' => 'nullable|string|max:30',
            'cargo' => 'nullable|string|max:100',
            'fotoactual' => 'nullable|image|max:5120',
            'areainteres' => 'nullable|array|max:2',
            'areainteres.*' => 'string|max:50',
            'observaciones' => 'nullable|string|max:2000',
            'curriculum' => 'nullable|file|mimes:pdf|max:10240',
        ];

        if (config('services.turnstile.secret')) {
            $rules['turnstileToken'] = ['required', new \App\Rules\TurnstileRule()];
        }

        $this->validate($rules, [
            'nombres.required' => 'El campo Nombres es obligatorio.',
            'apellidos.required' => 'El campo Apellidos es obligatorio.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Por favor introduce un correo electrónico válido.',
            'cedula.required' => 'El número de CI es obligatorio.',
            'celular.required' => 'El número de celular es obligatorio.',
            'areainteres.max' => 'Puedes seleccionar hasta 2 áreas de interés como máximo.',
            'curriculum.mimes' => 'El currículum debe ser un archivo en formato .PDF.',
            'fotoactual.image' => 'La foto debe ser un archivo de imagen válido (.jpg, .jpeg, .png).',
        ]);

        $fotoPath = null;
        if ($this->fotoactual) {
            $fotoPath = $this->fotoactual->store('rrhh/photos', 'public');
        }

        $cvPath = null;
        if ($this->curriculum) {
            $cvPath = $this->curriculum->store('rrhh/cvs', 'public');
        }

        $areasString = !empty($this->areainteres) ? implode(', ', $this->areainteres) : 'No especificado';

        $compiledMessage = "POSTULACIÓN RRHH - TALENTO HUMANO CONSUR S.A.\n"
            . "--------------------------------------------------\n"
            . "Postulante: " . trim("{$this->nombres} {$this->apellidos}") . "\n"
            . "C.I. N°: {$this->cedula}\n"
            . "Correo: {$this->correo}\n"
            . "Celular: {$this->celular}\n"
            . "Línea baja: " . ($this->lineabaja ?: '-') . "\n"
            . "Ciudad: " . ($this->ciudad ?: '-') . "\n"
            . "Cargo al que se postula: " . ($this->cargo ?: 'General') . "\n"
            . "Áreas de interés: {$areasString}\n"
            . "Observaciones / Estudios: " . ($this->observaciones ?: '-') . "\n"
            . "Foto adjunta: " . ($fotoPath ? asset('storage/' . $fotoPath) : 'No adjunta') . "\n"
            . "Currículum PDF: " . ($cvPath ? asset('storage/' . $cvPath) : 'No adjunto');

        Lead::create([
            'type' => 'rrhh',
            'full_name' => trim("{$this->nombres} {$this->apellidos}"),
            'email' => $this->correo,
            'phone' => $this->celular,
            'city' => $this->ciudad,
            'message' => $compiledMessage,
            'financing_plan' => 'Postulación: ' . ($this->cargo ?: $areasString),
            'trade_in_vehicle' => $areasString,
            'status' => 'nuevo',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset([
            'nombres',
            'apellidos',
            'correo',
            'ciudad',
            'cedula',
            'celular',
            'lineabaja',
            'cargo',
            'fotoactual',
            'areainteres',
            'observaciones',
            'curriculum',
            'turnstileToken',
        ]);

        $this->sentSuccess = true;
    }

    public function render()
    {
        return view('livewire.frontend.trabaja-con-nosotros')
            ->title('Trabaja con nosotros – Consur S.A.');
    }
}

