<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('tagline')->nullable()->after('name');
            $table->string('custom_url')->nullable()->after('logo_url');
            $table->text('description')->nullable()->after('custom_url');
            $table->string('banner_image')->nullable()->after('description');
            $table->boolean('is_featured_menu')->default(true)->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn(['tagline', 'custom_url', 'description', 'banner_image', 'is_featured_menu']);
        });
    }
};
