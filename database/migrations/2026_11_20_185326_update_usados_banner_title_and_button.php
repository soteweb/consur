<?php

use App\Models\SiteSection;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $section = SiteSection::where('key', 'usados_banner')->first();
        if ($section) {
            $content = $section->content ?? [];
            $content['title'] = 'Vehículos con Respaldo Oficial';
            $content['button_text'] = 'VER STOCK DE USADOS';
            $content['facebook_url'] = 'https://www.facebook.com/profile.php?id=100063630099625';
            $section->content = $content;
            $section->save();
        }
    }

    public function down(): void
    {
        $section = SiteSection::where('key', 'usados_banner')->first();
        if ($section) {
            $content = $section->content ?? [];
            $content['title'] = 'Vehículos con Experiencia y Respaldo Oficial';
            $content['button_text'] = 'Ver Todo el Stock de Usados';
            unset($content['facebook_url']);
            $section->content = $content;
            $section->save();
        }
    }
};
