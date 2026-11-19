<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\FormConfig;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class FormsManager extends Component
{
    public string $selectedFormKey = 'home_cotizacion';

    public ?int $selectedId = null;
    public string $name = '';
    public string $title = '';
    public string $subtitle = '';
    public string $button_text = '';
    public string $success_message = '';
    public string $notification_emails = '';
    public string $whatsapp_template = '';
    public bool $is_active = true;

    public function mount()
    {
        $this->selectForm('home_cotizacion');
    }

    public function selectForm(string $key)
    {
        $this->selectedFormKey = $key;
        $config = FormConfig::where('form_key', $key)->first();

        if ($config) {
            $this->selectedId = $config->id;
            $this->name = $config->name;
            $this->title = $config->title ?? '';
            $this->subtitle = $config->subtitle ?? '';
            $this->button_text = $config->button_text ?? 'Enviar Solicitud';
            $this->success_message = $config->success_message ?? '';
            $this->notification_emails = $config->notification_emails ?? '';
            $this->whatsapp_template = $config->whatsapp_template ?? '';
            $this->is_active = (bool) $config->is_active;
        }
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2|max:100',
            'title' => 'required|min:2|max:200',
            'button_text' => 'required|min:2|max:100',
            'success_message' => 'required|min:5|max:500',
        ]);

        $config = FormConfig::where('form_key', $this->selectedFormKey)->firstOrFail();
        $config->update([
            'name' => $this->name,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'button_text' => $this->button_text,
            'success_message' => $this->success_message,
            'notification_emails' => $this->notification_emails,
            'whatsapp_template' => $this->whatsapp_template,
            'is_active' => $this->is_active,
        ]);

        ActivityLog::log('update_form_config', "Actualizó la configuración del formulario: {$config->name}", $config);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => '¡Configuración del formulario guardada exitosamente!',
        ]);
    }

    public function render()
    {
        $forms = FormConfig::orderBy('id', 'asc')->get();
        return view('livewire.admin.forms-manager', compact('forms'));
    }
}
