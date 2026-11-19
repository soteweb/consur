<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // quick_value_bar, featured_0km, usados_banner, posventa_taller_movil, podcast_section, branches_section
            $table->string('name');
            $table->boolean('is_visible')->default(true);
            $table->integer('sort_order')->default(0);
            $table->jsonb('content'); // Atributos variables, textos, URLs de imágenes, íconos
            $table->timestamps();

            $table->index(['key', 'is_visible']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_sections');
    }
};
