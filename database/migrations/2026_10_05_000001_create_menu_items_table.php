<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->cascadeOnDelete();
            $table->string('location')->default('header'); // header, footer_col_1, footer_col_2, footer_col_3
            $table->string('title');
            $table->string('url')->default('#');
            $table->string('route_name')->nullable();
            $table->string('target')->default('_self'); // _self, _blank
            $table->string('icon')->nullable(); // fa icon class
            $table->string('badge_text')->nullable(); // e.g. "Nuevos", "Stock", "Garantía"
            $table->string('badge_color')->default('red'); // red, emerald, slate, amber, sky
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['location', 'is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
