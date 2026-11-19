<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'La Empresa – Consur S.A.',
                'slug' => 'la-empresa',
                'subtitle' => 'Concesionaria Oficial de Toyota en Paraguay con más de 25 años de trayectoria y liderazgo en el sur del país.',
                'banner_image' => 'https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&q=80&w=1600',
                'content' => '<h2>Nuestra Historia</h2>
<p>Consur S.A. nació con el firme compromiso de brindar a las familias y empresas del Paraguay el acceso a los vehículos más confiables, seguros y duraderos del mundo: <strong>Toyota</strong>.</p>
<p>Desde nuestra Casa Central en Encarnación y sucursales estratégicas, combinamos una atención humana personalizada con los estándares internacionales más rigurosos de Toyota Motor Corporation.</p>
<h2>Misión</h2>
<p>Proveer soluciones integrales de movilidad a través de la comercialización de vehículos 0 Km, usados garantizados, repuestos genuinos y servicios técnicos de posventa, superando siempre las expectativas de nuestros clientes con honestidad, calidez y excelencia.</p>
<h2>Visión</h2>
<p>Ser reconocidos como la concesionaria modelo y preferida de Toyota en la región, distinguiéndonos por la innovación continua, la satisfacción del cliente y el compromiso social con nuestra comunidad.</p>
<h2>Valores Corporativos</h2>
<ul>
    <li><strong>Calidad Innegable:</strong> Compromiso estricto con los estándares de fábrica Toyota.</li>
    <li><strong>Integridad:</strong> Transparencia total en cada tasación, venta y servicio.</li>
    <li><strong>Servicio Posventa Cercano:</strong> Acompañamos a nuestros clientes durante todo el ciclo de vida de su vehículo.</li>
</ul>',
                'meta_title' => 'La Empresa | Consur S.A. Toyota Paraguay',
                'meta_description' => 'Conozca la historia, misión y valores de Consur S.A., concesionaria oficial Toyota en Paraguay.',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Garantía Oficial Toyota & Seguros',
                'slug' => 'garantia-y-seguros',
                'subtitle' => 'Tu inversión protegida con el respaldo absoluto de fábrica y alianzas con las principales aseguradoras.',
                'banner_image' => 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?auto=format&fit=crop&q=80&w=1600',
                'content' => '<h2>Garantía de Fábrica Toyota</h2>
<p>Cada vehículo Toyota 0 Km adquirido en Consur S.A. cuenta con una cobertura integral de fábrica respaldada por una red global de servicio técnico especializado y repuestos 100% legítimos.</p>
<h2>Garantía en Usados Certificados</h2>
<p>Nuestros vehículos seminuevos y usados pasan por una rigurosa inspección técnica de más de 120 puntos críticos antes de salir al showroom, ofreciendo certificación documentada y garantía de tranquilidad.</p>
<h2>Convenios y Asesoría en Seguros</h2>
<p>Te facilitamos la contratación directa de pólizas contra todo riesgo con las aseguradoras líderes del mercado paraguayo, gestionando coberturas completas de forma inmediata al momento del retiro de tu unidad.</p>',
                'meta_title' => 'Garantía Oficial y Seguros | Consur S.A.',
                'meta_description' => 'Conocé las coberturas de garantía oficial Toyota y los beneficios en seguros que ofrece Consur S.A.',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Términos, Condiciones y Privacidad',
                'slug' => 'terminos-y-condiciones',
                'subtitle' => 'Transparencia y seguridad en el tratamiento de tus datos y cotizaciones en línea.',
                'banner_image' => 'https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&q=80&w=1600',
                'content' => '<h2>Uso del Sitio Web</h2>
<p>El acceso y navegación en el portal web de Consur S.A. implica la aceptación plena de las presentes condiciones generales de uso. Toda información comercial sobre modelos, precios y planes de financiación es referencial y está sujeta a confirmación con un asesor.</p>
<h2>Tratamiento de Datos Personales</h2>
<p>Los datos consignados en los formularios de cotización, turnos y test drive son tratados con estricta confidencialidad por el equipo comercial de Consur S.A. y no son transferidos a terceros.</p>',
                'meta_title' => 'Términos y Condiciones | Consur S.A.',
                'meta_description' => 'Políticas de privacidad y términos de uso del sitio web oficial de Consur S.A.',
                'is_published' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
