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

        // 1. Reemplazar el botón de agendamiento en Turnos365 por "Agendá tu turno" con WhatsApp +595985204106
        $newButton = '<div class="text-center" data-aos="fade-up">
                <a href="https://wa.me/595985204106?text=Hola%20CONSUR%2C%20quisiera%20agendar%20un%20turno%20para%20el%20Servicio%20T%C3%A9cnico%20Toyota."
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-10 py-4 transition-all shadow-xl shadow-red-600/30">
                    <i class="fab fa-whatsapp text-base"></i>
                    <span>Agendá tu turno</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>';

        $oldButtonPattern = '/<div class="text-center"[^>]*>\s*<a href="http[s]?:\/\/www\.turnos365\.com[^"]*"[^>]*>.*?Turnos365.*?<\/a>\s*<\/div>/isu';

        if (preg_match($oldButtonPattern, $content)) {
            $content = preg_replace($oldButtonPattern, $newButton, $content);
        }

        // 2. Reemplazar la presentación de Toyota 10: incorporar toyota10consur.jpg en lugar de badge-toyota-10.webp
        $oldToyota10Pattern = '/<!--\s*1\.\s*ENCABEZADO Y PRESENTACI[ÓO]N PRINCIPAL.*?-->\s*<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">.*?badge-toyota-10\.webp.*?<\/div>\s*<\/div>\s*<\/div>/s';
        
        $newToyota10Presentation = '<!-- Banner Oficial Toyota 10 Consur -->
            <div class="relative overflow-hidden rounded-2xl shadow-xl border border-slate-200 dark:border-neutral-800" data-aos="fade-up">
                <img src="/images/pages/toyota10/toyota10consur.jpg"
                     alt="Toyota 10 Consur: Garantía extendida hasta 10 años o 200.000 km"
                     class="w-full h-auto object-cover max-h-[480px]">
            </div>

            <!-- 1. ENCABEZADO Y PRESENTACIÓN PRINCIPAL -->
            <div class="space-y-6" data-aos="fade-up">
                <div class="space-y-2">
                    <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3 py-1 rounded-sm tracking-wider">
                        <i class="fas fa-shield-alt text-[10px]"></i>
                        <span>Garantía Extendida Oficial &bull; Toyota 10</span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-normal leading-tight">
                        Nos mueve tu <span class="font-normal text-[#eb0a1e]">tranquilidad</span>
                    </h2>
                </div>

                <p class="text-base sm:text-lg text-slate-600 dark:text-neutral-300 leading-relaxed font-light max-w-4xl">
                    Conscientes de la calidad y durabilidad que definen a cada vehículo de la marca, te presentamos <strong class="text-slate-900 dark:text-white font-semibold">Toyota 10</strong>: una cobertura extendida de <strong class="text-slate-900 dark:text-white font-semibold">hasta 10 años o 200.000 km</strong> que se renueva automáticamente con tus mantenimientos oficiales, sin trámites extras ni costos adicionales.
                </p>

                <!-- Tarjeta Informativa: ¿Cómo funciona? -->
                <div class="bg-slate-50 dark:bg-neutral-800/70 border-l-4 border-[#eb0a1e] p-6 rounded-r-xl space-y-2 max-w-4xl">
                    <h3 class="text-sm sm:text-base font-bold text-slate-900 dark:text-white font-heading uppercase tracking-wider flex items-center gap-2">
                        <i class="fas fa-sync-alt text-[#eb0a1e] text-sm"></i>
                        ¿Cómo funciona la renovación?
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                        Con cada servicio de mantenimiento periódico realizado en nuestros talleres oficiales CONSUR, renovás la garantía por <strong class="text-slate-900 dark:text-white font-medium">1 año o 5.000 km</strong> (lo que ocurra primero), hasta completar un período máximo de <strong class="text-slate-900 dark:text-white font-medium">10 años o 200.000 km</strong>.
                    </p>
                </div>
            </div>';

        if (preg_match($oldToyota10Pattern, $content)) {
            $content = preg_replace($oldToyota10Pattern, $newToyota10Presentation, $content);
        } else {
            // Reemplazo directo en caso de badge aislado
            $content = str_replace(
                '/images/pages/toyota10/badge-toyota-10.webp',
                '/images/pages/toyota10/toyota10consur.jpg',
                $content
            );
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
