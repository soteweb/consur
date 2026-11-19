<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable(); // e.g. "NUEVO LANZAMIENTO", "ATENCIÓN PERSONALIZADA"
            $table->string('title'); // e.g. "TU AUTO, TU ESTILO"
            $table->text('description')->nullable();
            $table->string('button_text')->nullable(); // e.g. "Ver detalles de Agya"
            $table->string('button_url')->nullable();
            $table->string('button_secondary_text')->nullable();
            $table->string('button_secondary_url')->nullable();
            $table->string('image_desktop');
            $table->string('image_mobile')->nullable();
            $table->string('content_position')->default('left'); // left, center, right
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('vehicle_model')->nullable();
            $table->string('city')->nullable();
            $table->text('comment');
            $table->integer('rating')->default(5);
            $table->string('avatar_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->string('episode_number')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('spotify_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('duration')->nullable();
            $table->date('published_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('podcasts');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('sliders');
    }
};
