<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        // Configuraciones de Footer
        Setting::set('footer_about_text', 'Concesionaria Oficial de Toyota en Paraguay. Excelencia, garantía y servicio de posventa especializado para tu tranquilidad y confianza.', 'footer');
        Setting::set('footer_show_facebook', '1', 'footer');
        Setting::set('footer_show_instagram', '1', 'footer');
        Setting::set('footer_show_tiktok', '1', 'footer');
        Setting::set('footer_show_spotify', '1', 'footer');
        Setting::set('footer_show_linkedin', '0', 'footer');
        Setting::set('footer_show_youtube', '0', 'footer');
        Setting::set('linkedin_url', 'https://www.linkedin.com/company/consur-toyota', 'social');
        Setting::set('youtube_url', 'https://www.youtube.com', 'social');

        Setting::set('footer_col2_title', 'Gama de Modelos', 'footer');
        Setting::set('footer_col3_title', 'Servicios Posventa', 'footer');
        Setting::set('footer_col4_title', 'Casa Central', 'footer');
        Setting::set('footer_address', 'Ruta 1 Km 2.5, Encarnación - Paraguay', 'footer');
        Setting::set('footer_phone', '+595 71 204 106', 'footer');
        Setting::set('footer_whatsapp', '+595 985 804 106', 'footer');
        Setting::set('footer_email', 'contacto@consur.com.py', 'footer');
        Setting::set('footer_show_internal_link', '1', 'footer');
        Setting::set('footer_copyright', '© {year} Consur S.A. Todos los derechos reservados. Concesionaria Oficial Toyota Paraguay.', 'footer');
        Setting::set('footer_credits', 'Powered by Soteweb', 'footer');

        // Menú Footer Columna 1
        if (MenuItem::where('location', 'footer_col_1')->count() === 0) {
            $col1Items = [
                ['title' => 'Toyota Agya (0 Km)', 'url' => '/#destacados-0km', 'sort_order' => 1],
                ['title' => 'Toyota Hilux SRV / GR (0 Km)', 'url' => '/#destacados-0km', 'sort_order' => 2],
                ['title' => 'Toyota RAV4 Hybrid (0 Km)', 'url' => '/#destacados-0km', 'sort_order' => 3],
                ['title' => 'Toyota Corolla Cross', 'url' => '/#destacados-0km', 'sort_order' => 4],
                ['title' => 'Usados Certificados con Garantía', 'url' => '/usados', 'badge_text' => 'Garantía', 'badge_color' => 'red', 'sort_order' => 5],
            ];

            foreach ($col1Items as $item) {
                MenuItem::create(array_merge($item, ['location' => 'footer_col_1', 'is_active' => true]));
            }
        }

        // Menú Footer Columna 2
        if (MenuItem::where('location', 'footer_col_2')->count() === 0) {
            $col2Items = [
                ['title' => 'Taller Móvil a Domicilio', 'url' => '/#taller-movil', 'sort_order' => 1],
                ['title' => 'Agendamiento de Turnos 365', 'url' => 'http://www.turnos365.com/turnos.aspx?con=131', 'target' => '_blank', 'sort_order' => 2],
                ['title' => 'Repuestos Genuinos Toyota', 'url' => '/#servicios', 'sort_order' => 3],
                ['title' => 'Mantenimiento Periódico Programado', 'url' => '/#servicios', 'sort_order' => 4],
            ];

            foreach ($col2Items as $item) {
                MenuItem::create(array_merge($item, ['location' => 'footer_col_2', 'is_active' => true]));
            }
        }
    }
}
