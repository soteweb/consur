<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->text('google_maps_url')->nullable()->change();
            $table->text('image_url')->nullable()->change();
            $table->text('address')->change();
        });

        Schema::table('vehicle_images', function (Blueprint $table) {
            $table->text('image_path')->change();
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->text('image_desktop')->change();
            $table->text('image_mobile')->nullable()->change();
            $table->text('button_url')->nullable()->change();
            $table->text('button_secondary_url')->nullable()->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->text('avatar_url')->nullable()->change();
        });

        Schema::table('podcasts', function (Blueprint $table) {
            $table->text('spotify_url')->nullable()->change();
            $table->text('youtube_url')->nullable()->change();
            $table->text('cover_image')->nullable()->change();
        });
    }

    public function down(): void
    {
        // No revertir para no truncar datos en producción
    }
};
