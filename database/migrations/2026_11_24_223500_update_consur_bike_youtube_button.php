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
        $bikePage = Page::where('slug', 'consur-bike')->first();
        if (! $bikePage) {
            return;
        }

        $content = $bikePage->content;

        // Reemplazar el botón de suscribirse a YouTube para que tenga solo el ícono de YouTube
        $pattern = '/<a\s+href="https:\/\/www\.youtube\.com\/@RACEPARAGUAY\?sub_confirmation=1"[^>]*>.*?<\/a>/s';
        
        $newButton = '<a href="https://www.youtube.com/@RACEPARAGUAY?sub_confirmation=1"' . "\n" .
                     '                       target="_blank" rel="noopener noreferrer"' . "\n" .
                     '                       title="Suscribirse en YouTube"' . "\n" .
                     '                       class="w-12 h-12 sm:w-14 sm:h-14 inline-flex items-center justify-center bg-[#eb0a1e] hover:bg-red-700 text-white transition-all duration-300 shadow-lg shadow-red-600/25">' . "\n" .
                     '                        <i class="fab fa-youtube text-2xl"></i>' . "\n" .
                     '                    </a>';

        if (preg_match($pattern, $content)) {
            $content = preg_replace($pattern, $newButton, $content);
        } else {
            // Reemplazo directo alternativo
            $oldButton = '<a href="https://www.youtube.com/@RACEPARAGUAY?sub_confirmation=1"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2.5 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-7 py-4 transition-all duration-300 shadow-lg shadow-red-600/25">
                        <i class="fab fa-youtube text-base"></i>
                        <span>Suscribirse a YouTube</span>
                        <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>';
            $content = str_replace($oldButton, $newButton, $content);
        }

        $bikePage->content = $content;
        $bikePage->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No destructivo
    }
};
