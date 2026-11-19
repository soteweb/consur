<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->jsonb('hero_banners')->nullable()->after('highlights');
            $table->longText('custom_html')->nullable()->after('hero_banners');
            $table->jsonb('html_media')->nullable()->after('custom_html');
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn(['hero_banners', 'custom_html', 'html_media']);
        });
    }
};

