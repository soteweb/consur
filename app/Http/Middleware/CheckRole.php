<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Maneja la verificación de roles y permisos.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Verificar si el usuario está activo
        if (!$user->is_active) {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error', 'Tu cuenta ha sido desactivada por el administrador.');
        }

        // Si no se pasaron roles específicos, permitir paso
        if (empty($roles)) {
            return $next($request);
        }

        // Parsear roles si vienen separados por coma ej: "admin,gestor"
        $allowedRoles = [];
        foreach ($roles as $role) {
            foreach (explode(',', $role) as $r) {
                $trimmed = trim($r);
                if ($trimmed !== '') {
                    $allowedRoles[] = $trimmed;
                }
            }
        }

        if ($user->hasRole($allowedRoles)) {
            return $next($request);
        }

        // Manejo si el usuario no tiene permisos
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'No tienes permisos suficientes para realizar esta acción.',
            ], 403);
        }

        // Redirección amigable según el rol del usuario
        if ($user->isVendedor()) {
            return redirect()->route('admin.leads')->with('warning', 'Acceso denegado: Esa sección no está permitida para el rol Vendedor.');
        }

        if ($user->isGestor()) {
            return redirect()->route('admin.dashboard')->with('warning', 'Acceso denegado: Esta función avanzada es exclusiva para Administradores.');
        }

        abort(403, 'No tienes permisos para acceder a esta sección.');
    }
}
