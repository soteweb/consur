<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesUsersSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Administrador General (Gestión total)
        User::updateOrCreate(
            ['email' => 'admin@consur.com.py'],
            [
                'name' => 'Carlos Benítez (Administrador General)',
                'phone' => '+595 985 804 106',
                'role' => 'admin',
                'is_active' => true,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Gestor de Contenidos (Marketing / CMS / Vehículos)
        User::updateOrCreate(
            ['email' => 'gestor@consur.com.py'],
            [
                'name' => 'María Duarte (Gestora de Contenidos)',
                'phone' => '+595 985 304 106',
                'role' => 'gestor',
                'is_active' => true,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 3. Vendedor Comercial (Leads & Cotizaciones 0Km y Usados)
        User::updateOrCreate(
            ['email' => 'vendedor@consur.com.py'],
            [
                'name' => 'Rodrigo Alcaraz (Asesor Comercial)',
                'phone' => '+595 985 204 106',
                'role' => 'vendedor',
                'is_active' => true,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Roles y Usuarios creados exitosamente: admin@, gestor@, vendedor@ (Password: password)');
    }
}
