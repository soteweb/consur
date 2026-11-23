<?php

use App\Models\Page;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $page = Page::where('slug', 'posventa')->first();
        if (! $page) {
            return;
        }

        $content = $page->content;

        // 1. Remover el bloque destacado de OMODA & JAECOO
        // El bloque comienza con <!-- Destacado Especial: Servicio Técnico Oficial OMODA & JAECOO --> y termina antes de </section>
        $pattern = '/<!--\s*Destacado Especial:\s*Servicio T[ée]cnico Oficial OMODA & JAECOO\s*-->.*?<\/div>\s*<\/div>\s*(?=\s*<\/div>\s*<\/section>)/s';
        if (preg_match($pattern, $content)) {
            $content = preg_replace($pattern, '', $content);
        } else {
            // Alternativa por coincidencia directa de cadenas
            $blockStart = strpos($content, '<!-- Destacado Especial: Servicio Técnico Oficial OMODA & JAECOO -->');
            if ($blockStart !== false) {
                $blockEnd = strpos($content, '</section>', $blockStart);
                if ($blockEnd !== false) {
                    // Tomar la porción antes del bloque y cerrar el div contenedor anterior
                    $before = substr($content, 0, $blockStart);
                    $after = substr($content, $blockEnd);
                    $content = rtrim($before) . "\n        </div>\n    " . $after;
                }
            }
        }

        // 2. Centrar la introducción de Servicios Especializados 100% en Toyota
        $content = str_replace(
            'para vehículos <strong class="text-slate-800 font-semibold">Toyota</strong>, <strong class="text-slate-800 font-semibold">OMODA &amp; JAECOO</strong> y camiones <strong class="text-slate-800 font-semibold">HINO</strong>.',
            'para toda la línea de vehículos <strong class="text-slate-800 font-semibold">Toyota</strong>.',
            $content
        );

        // 3. Ajustar referencia a vehículos comercializados para centrar en Toyota
        $content = str_replace(
            'cuenta con el Servicio Técnico oficial de los vehículos comercializados por la firma, ubicados en las diferentes sucursales, todos en una ubicación estratégica del departamento de Itapúa y Misiones.',
            'cuenta con el Servicio Técnico Oficial Toyota en sus diferentes sucursales, estratégicamente distribuidas en los departamentos de Itapúa y Misiones para brindarle una cobertura total y la mayor tranquilidad.',
            $content
        );

        $page->title = 'Posventa Toyota – Consur S.A.';
        $page->subtitle = 'Mantené tu Toyota como nuevo con técnicos certificados, repuestos 100% legítimos y talleres oficiales en Itapúa y Misiones.';
        $page->meta_title = 'Posventa Toyota | Consur S.A. – Servicio Técnico Oficial y Repuestos Legítimos';
        $page->meta_description = 'Servicio Técnico Oficial Toyota en Paraguay: Mantenimiento preventivo, Box Exprés, Vehículo de Cortesía, Taller Móvil y Garantía Toyota 10 con Consur S.A.';
        $page->content = $content;
        $page->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No destructivo
    }
};
