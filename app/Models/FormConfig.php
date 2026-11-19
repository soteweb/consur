<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_key',
        'name',
        'title',
        'subtitle',
        'button_text',
        'success_message',
        'notification_emails',
        'whatsapp_template',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static mixed $memoryConfigs = null;

    protected static function boot()
    {
        parent::boot();
        static::saved(fn () => static::$memoryConfigs = null);
        static::deleted(fn () => static::$memoryConfigs = null);
    }

    public static function getByKey(string $formKey, array $defaults = [])
    {
        if (static::$memoryConfigs === null) {
            static::$memoryConfigs = static::all()->keyBy('form_key');
        }

        $config = static::$memoryConfigs->get($formKey);

        if (!$config) {
            return (object) array_merge([
                'form_key' => $formKey,
                'name' => $defaults['name'] ?? 'Formulario',
                'title' => $defaults['title'] ?? 'Formulario de Contacto',
                'subtitle' => $defaults['subtitle'] ?? '',
                'button_text' => $defaults['button_text'] ?? 'Enviar Solicitud',
                'success_message' => $defaults['success_message'] ?? '¡Solicitud enviada con éxito! Nos comunicaremos contigo en breve.',
                'notification_emails' => $defaults['notification_emails'] ?? 'contacto@consur.com.py',
                'whatsapp_template' => $defaults['whatsapp_template'] ?? 'Hola Consur S.A., quisiera recibir asesoramiento comercial.',
                'is_active' => true,
            ], $defaults);
        }

        return $config;
    }
}
