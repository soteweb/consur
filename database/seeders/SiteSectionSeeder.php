<?php

namespace Database\Seeders;

use App\Models\SiteSection;
use Illuminate\Database\Seeder;

class SiteSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'key' => 'quick_value_bar',
                'name' => 'Barra de Valores Rápidos (4 Bloques)',
                'sort_order' => 1,
                'is_visible' => true,
                'content' => [
                    'item_1' => [
                        'icon' => 'fas fa-certificate',
                        'title' => 'Concesionaria Oficial',
                        'desc' => 'Garantía y respaldo Toyota'
                    ],
                    'item_2' => [
                        'icon' => 'fas fa-truck-pickup',
                        'title' => 'Taller Móvil',
                        'desc' => 'Asistencia técnica en tu campo'
                    ],
                    'item_3' => [
                        'icon' => 'fas fa-shield-alt',
                        'title' => 'Usados Certificados',
                        'desc' => '150 puntos de inspección'
                    ],
                    'item_4' => [
                        'icon' => 'fas fa-hand-holding-usd',
                        'title' => 'Financiación Propia',
                        'desc' => 'Planes en Guaraníes o Dólares'
                    ],
                ]
            ],
            [
                'key' => 'featured_0km',
                'name' => 'Sección Vehículos 0 Km Destacados',
                'sort_order' => 2,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Línea de Modelos 0 Km',
                    'title' => 'Descubrí la Gama Toyota',
                ]
            ],
            [
                'key' => 'usados_banner',
                'name' => 'Banner de Usados Certificados',
                'sort_order' => 3,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Consur Usados Certificados',
                    'title' => 'Vehículos con Experiencia y Respaldo Oficial',
                    'desc' => 'Accedé a autos y camionetas seleccionadas con historial verificado, revisión técnica integral en talleres Consur y planes de financiación directa.',
                    'button_text' => 'Ver Todo el Stock de Usados',
                    'button_url' => '/usados',
                    'background_image' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920',
                ]
            ],
            [
                'key' => 'posventa_taller_movil',
                'name' => 'Sección Posventa & Taller Móvil',
                'sort_order' => 4,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Servicio de Posventa Exclusivo',
                    'title' => 'Taller Móvil Consur Toyota',
                    'desc' => 'Entendemos que tu tiempo y tu trabajo no se detienen. Por eso, nuestro equipo de técnicos certificados se traslada con vehículos equipados con herramientas de diagnóstico de última generación.',
                    'main_image' => 'https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=1200',
                    'highlight_badge_title' => '100% OFICIAL',
                    'highlight_badge_desc' => 'Mantenimiento con repuestos legítimos en la comodidad de tu hogar o establecimiento rural.',
                    'feature_1_icon' => 'fas fa-tools',
                    'feature_1_title' => 'Service Programado',
                    'feature_1_desc' => 'Mantenimiento de 5.000 a 100.000 km manteniendo la garantía de fábrica.',
                    'feature_2_icon' => 'fas fa-oil-can',
                    'feature_2_title' => 'Repuestos Genuinos',
                    'feature_2_desc' => 'Filtros, lubricantes originales Toyota TGMO y pastillas de freno.',
                    'button_1_text' => 'Agendar Turno Online',
                    'button_1_url' => 'http://www.turnos365.com/turnos.aspx?con=131',
                    'button_2_text' => 'Pedir Taller Móvil',
                    'button_2_msg' => 'Hola Consur, solicito el servicio de Taller Móvil',
                ]
            ],
            [
                'key' => 'podcast_section',
                'name' => 'Sección Podcast & Testimonios',
                'sort_order' => 5,
                'is_visible' => true,
                'content' => [
                    'podcast_badge' => 'Espacio de Audio',
                    'podcast_title' => 'Podcast "Ruta Consur"',
                    'podcast_desc' => 'Novedades automotrices, tecnología híbrida y consejos para el cuidado de tu vehículo.',
                    'testimonials_badge' => 'Experiencias Reales',
                    'testimonials_title' => 'Lo que dicen nuestros clientes',
                ]
            ],
            [
                'key' => 'branches_section',
                'name' => 'Sección Red de Sucursales',
                'sort_order' => 6,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Red de Atención',
                    'title' => 'Nuestras Sucursales',
                    'desc' => 'Visitanos en nuestras salas de exhibición y talleres autorizados en el sur del país.',
                ]
            ],
            [
                'key' => 'quotation_section',
                'name' => 'Sección Formulario de Cotización',
                'sort_order' => 7,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Asesoramiento Personalizado',
                    'title' => 'Cotizá tu Próximo Toyota',
                    'desc' => 'Completá el formulario y un asesor comercial de Consur S.A. se comunicará contigo con las mejores opciones de pago.',
                    'button_text' => 'Enviar Solicitud de Cotización',
                ]
            ]
        ];

        foreach ($sections as $sec) {
            SiteSection::updateOrCreate(
                ['key' => $sec['key']],
                $sec
            );
        }
    }
}
