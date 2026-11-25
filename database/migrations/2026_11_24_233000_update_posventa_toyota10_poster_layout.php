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

        // Reemplazar la presentación inicial de Toyota 10 por el layout destacado con afiche toyota10.jpg
        $pattern = '/<!--\s*1\.\s*ENCABEZADO Y PRESENTACI[ÓO]N PRINCIPAL.*?-->\s*<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">.*?<\/div>\s*<\/div>\s*<\/div>/su';

        $replacement = '<!-- 1. ENCABEZADO Y PRESENTACIÓN PRINCIPAL (2 COLUMNAS EQUILIBRADAS) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Columna Izquierda: Afiche Oficial Toyota 10 -->
                <div class="lg:col-span-5 flex flex-col items-center justify-center" data-aos="fade-right">
                    <div class="relative w-full max-w-[460px] overflow-hidden rounded-2xl shadow-2xl border border-slate-200 dark:border-neutral-800 bg-white dark:bg-neutral-800/80 p-2 sm:p-3 group">
                        <img src="/images/pages/toyota10/toyota10.jpg"
                             alt="Toyota 10: hasta 10 años de garantía o 200.000 km - CONSUR S.A."
                             class="w-full h-auto object-contain rounded-xl transition-transform duration-500 group-hover:scale-[1.02]">
                        <div class="mt-3 px-3 py-2 text-center border-t border-slate-100 dark:border-neutral-700/60">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Programa Oficial Toyota
                            </span>
                            <span class="text-xs text-slate-500 dark:text-neutral-400">
                                Exclusivo en la Red Oficial CONSUR S.A.
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Información Principal y Cómo Funciona -->
                <div class="lg:col-span-7 space-y-6" data-aos="fade-left">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3 py-1 rounded-sm tracking-wider">
                            <i class="fas fa-shield-alt text-[10px]"></i>
                            <span>Garantía Extendida Oficial &bull; Toyota 10</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-normal leading-tight">
                            Nos mueve tu <span class="font-normal text-[#eb0a1e]">tranquilidad</span>
                        </h2>
                    </div>

                    <p class="text-base text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                        Conscientes de la calidad y durabilidad que definen a cada vehículo de la marca, te presentamos <strong class="text-slate-900 dark:text-white font-semibold">Toyota 10</strong>: una cobertura extendida de <strong class="text-slate-900 dark:text-white font-semibold">hasta 10 años o 200.000 km</strong> que se renueva automáticamente con tus mantenimientos oficiales, sin trámites extras ni costos adicionales.
                    </p>

                    <!-- Tarjeta Informativa: ¿Cómo funciona? -->
                    <div class="bg-slate-50 dark:bg-neutral-800/70 border-l-4 border-[#eb0a1e] p-5 sm:p-6 rounded-r-xl space-y-2.5">
                        <h3 class="text-sm sm:text-base font-bold text-slate-900 dark:text-white font-heading uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-sync-alt text-[#eb0a1e] text-sm"></i>
                            ¿Cómo funciona la renovación?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                            Con cada servicio de mantenimiento periódico realizado en nuestros talleres oficiales CONSUR, renovás la garantía por <strong class="text-slate-900 dark:text-white font-medium">1 año o 5.000 km</strong> (lo que ocurra primero), hasta completar un período máximo de <strong class="text-slate-900 dark:text-white font-medium">10 años o 200.000 km</strong>.
                        </p>
                    </div>

                    <!-- Enlaces Rápidos de Acción -->
                    <div class="pt-2 flex flex-wrap items-center gap-4">
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
                </div>
            </div>';

        if (preg_match($pattern, $content)) {
            $content = preg_replace($pattern, $replacement, $content);
        } else {
            // Reemplazo directo en caso de variante previa
            $content = str_replace(
                ['/images/pages/toyota10/toyota10consur.jpg', '/images/pages/toyota10/badge-toyota-10.webp'],
                '/images/pages/toyota10/toyota10.jpg',
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
