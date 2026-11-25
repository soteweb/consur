<?php

use App\Models\Branch;
use App\Models\Page;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Eliminar la sucursal de San Pedro del Paraná de la tabla branches
        Branch::where('city', 'like', '%San Pedro%')
            ->orWhere('name', 'like', '%San Pedro%')
            ->delete();

        // 2. Eliminar la tarjeta de San Pedro de la página 'la-empresa' en la base de datos
        $laEmpresa = Page::where('slug', 'la-empresa')->first();
        if ($laEmpresa) {
            $content = $laEmpresa->content;

            // Eliminar bloque de San Pedro
            $pattern = '/<!--\s*Sucursal 4:\s*San Pedro del Paran[áa]\s*-->.*?<\/div>\s*<\/div>\s*(?=\s*<\/div>\s*<\/div>\s*<\/section>)/s';
            if (preg_match($pattern, $content)) {
                $content = preg_replace($pattern, '', $content);
            } else {
                // Alternativa de recorte directo por texto
                $cardStart = strpos($content, '<!-- Sucursal 4: San Pedro del Paraná -->');
                if ($cardStart !== false) {
                    $closingDiv = strpos($content, '<!-- LIGHTBOX MODAL', $cardStart);
                    if ($closingDiv !== false) {
                        // Buscar el cierre antes del lightbox
                        $sub = substr($content, $cardStart, $closingDiv - $cardStart);
                        $lastDivs = strrpos($sub, '</div>');
                        if ($lastDivs !== false) {
                            $before = substr($content, 0, $cardStart);
                            $after = substr($content, $cardStart + $lastDivs + 6);
                            $content = rtrim($before) . "\n" . ltrim($after);
                        }
                    }
                }
            }

            // Ajustar el contenedor de grilla para 3 sucursales
            $content = str_replace('grid grid-cols-1 md:grid-cols-2 gap-8', 'grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8', $content);
            $content = str_replace('Grilla de 4 Sucursales del Interior', 'Grilla de Sucursales del Interior', $content);

            $laEmpresa->content = $content;
            $laEmpresa->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No destructivo
    }
};
