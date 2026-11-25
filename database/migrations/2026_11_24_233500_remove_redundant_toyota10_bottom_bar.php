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

        // 1. Reubicar la información legal debajo de los botones de acción en "¿Cómo funciona la renovación?"
        $oldActionsPattern = '/<!--\s*Enlaces R[áa]pidos de Acci[óo]n\s*-->\s*<div class="pt-2 flex flex-wrap items-center gap-4">.*?<\/div>/su';
        
        $newActionsWithInfo = '<!-- Enlaces Rápidos de Acción con Información de Validez -->
                    <div class="pt-2 space-y-3">
                        <div class="flex flex-wrap items-center gap-4">
                            <a href="https://wa.me/595985204106?text=Hola%20CONSUR%2C%20quiero%20agendar%20mi%20turno%20de%20mantenimiento%20Toyota%20para%20mantener%20mi%20Garant%C3%ADa%20Toyota%2010."
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition duration-200 shadow-md shadow-red-600/20">
                                <i class="fab fa-whatsapp text-sm"></i>
                                <span>Agendá tu turno</span>
                                <i class="fas fa-arrow-right text-[10px]"></i>
                            </a>
                            <a href="/images/pages/toyota10/toyota10-terminos-y-condiciones.pdf"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 px-5 py-3.5 bg-white dark:bg-neutral-800 hover:bg-slate-100 dark:hover:bg-neutral-700 text-slate-800 dark:text-white border border-slate-300 dark:border-neutral-600 rounded-xl font-semibold text-xs uppercase tracking-wider transition">
                                <i class="far fa-file-pdf text-[#eb0a1e] text-sm"></i>
                                <span>Bases y Condiciones (PDF)</span>
                            </a>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light">
                            <span class="font-medium text-slate-700 dark:text-neutral-300">Válido para vehículos comercializados desde noviembre de 2023.</span>
                            &bull; Sujeto a cumplimiento del plan de mantenimiento oficial.
                        </p>
                    </div>';

        if (preg_match($oldActionsPattern, $content)) {
            $content = preg_replace($oldActionsPattern, $newActionsWithInfo, $content);
        }

        // 2. Eliminar la barra inferior redundante (punto 4) de la sección Toyota 10
        $redundantBarPattern = '/<!--\s*4\.\s*BARRA DE ACCI[ÓO]N Y CONTACTO.*?-->\s*<div class="pt-6 border-t border-slate-200 dark:border-neutral-800 flex flex-col sm:flex-row items-center justify-between gap-4">.*?<\/div>\s*<\/div>/su';

        if (preg_match($redundantBarPattern, $content)) {
            $content = preg_replace($redundantBarPattern, '', $content);
        }

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
