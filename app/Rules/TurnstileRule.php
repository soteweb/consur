<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TurnstileRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secret = config('services.turnstile.secret');

        // Si no está configurada la clave en el entorno, permitir paso para no romper desarrollo local
        if (empty($secret)) {
            return;
        }

        if (empty($value)) {
            $fail('Por favor complete la verificación de seguridad anti-spam.');
            return;
        }

        try {
            $response = Http::asForm()
                ->timeout(5)
                ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => $secret,
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

            if (!$response->successful() || !$response->json('success')) {
                Log::warning('Fallo de verificación Cloudflare Turnstile', [
                    'ip' => request()->ip(),
                    'error_codes' => $response->json('error-codes', []),
                ]);
                $fail('La verificación de seguridad de Cloudflare ha fallado. Intente nuevamente.');
            }
        } catch (\Throwable $e) {
            Log::error('Error de conexión con Cloudflare Turnstile: ' . $e->getMessage());
            // Si hay timeout de Cloudflare y está en producción, decidir según política; por resiliencia se registra error
            $fail('Error al verificar la seguridad anti-spam. Intente nuevamente.');
        }
    }
}

