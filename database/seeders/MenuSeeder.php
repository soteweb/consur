<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Identidad Corporativa y Logos
        Setting::set('site_logo_type', 'text', 'branding', 'Tipo de Logotipo (text o image)');
        Setting::set('site_logo_text_prefix', 'CONSUR', 'branding', 'Prefijo de Texto del Logo');
        Setting::set('site_logo_text_suffix', '.', 'branding', 'Sufijo de Texto del Logo');
        Setting::set('site_logo_badge', 'TOYOTA', 'branding', 'Etiqueta del Logo');
        Setting::set('site_logo_url', 'https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png', 'branding', 'URL de Imagen del Logo');
        Setting::set('site_favicon_url', '', 'branding', 'URL de Favicon');

        // Menú de Cabecera (Header)
        if (MenuItem::count() === 0) {
            $vehiculos = MenuItem::create([
                'location' => 'header',
                'title' => 'Vehículos',
                'url' => '#',
                'sort_order' => 1,
            ]);

            MenuItem::create([
                'parent_id' => $vehiculos->id,
                'location' => 'header',
                'title' => 'Vehículos 0 Km',
                'url' => '/#destacados-0km',
                'badge_text' => 'Nuevos',
                'badge_color' => 'red',
                'sort_order' => 1,
            ]);

            MenuItem::create([
                'parent_id' => $vehiculos->id,
                'location' => 'header',
                'title' => 'Usados Certificados',
                'url' => '/usados',
                'badge_text' => 'Garantía',
                'badge_color' => 'emerald',
                'sort_order' => 2,
            ]);

            MenuItem::create([
                'parent_id' => $vehiculos->id,
                'location' => 'header',
                'title' => 'Catálogo Digital',
                'url' => 'https://consur.com.py/catalogo-consur-s-a/',
                'target' => '_blank',
                'sort_order' => 3,
            ]);

            MenuItem::create([
                'location' => 'header',
                'title' => 'Posventa & Taller',
                'url' => '/#taller-movil',
                'sort_order' => 2,
            ]);

            MenuItem::create([
                'location' => 'header',
                'title' => 'Servicios',
                'url' => '/#servicios',
                'sort_order' => 3,
            ]);

            MenuItem::create([
                'location' => 'header',
                'title' => 'Podcast',
                'url' => '/#podcast',
                'icon' => 'fas fa-podcast',
                'sort_order' => 4,
            ]);

            MenuItem::create([
                'location' => 'header',
                'title' => 'Sucursales',
                'url' => '/#sucursales',
                'sort_order' => 5,
            ]);
        }
    }
}
