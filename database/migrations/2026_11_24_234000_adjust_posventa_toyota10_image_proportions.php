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

        // Reemplazar la columna del afiche: sin texto debajo, proporcional a la derecha y con enlace al PDF
        $start = strpos($content, '<div class="lg:col-span-5');
        $end = strpos($content, '<!-- Columna Derecha:', $start);

        $replacement = '<!-- Columna Izquierda: Afiche Oficial Toyota 10 Proporcional con Enlace a PDF -->
                <div class="lg:col-span-5 flex flex-col items-center justify-center" data-aos="fade-right">
                    <a href="/images/pages/toyota10/toyota10-terminos-y-condiciones.pdf"
                       target="_blank" rel="noopener noreferrer"
                       class="group relative block w-full max-w-[320px] sm:max-w-[340px] overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl border border-slate-200 dark:border-neutral-800 transition-all duration-300 transform hover:-translate-y-1"
                       title="Ver Bases y Condiciones Toyota 10 (PDF)">
                        <img src="/images/pages/toyota10/toyota10.jpg"
                             alt="Toyota 10: hasta 10 años de garantía o 200.000 km - CONSUR S.A."
                             class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors pointer-events-none"></div>
                    </a>
                </div>
                ';

        if ($start !== false && $end !== false) {
            $content = substr($content, 0, $start) . $replacement . substr($content, $end);
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
