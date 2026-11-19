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
        Schema::table('posts', function (Blueprint $table) {
            $table->index(['is_published', 'published_at'], 'posts_published_index');
        });

        Schema::table('leads', function (Blueprint $table) {
            $table->index(['status', 'created_at'], 'leads_status_created_index');
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->index(['group', 'is_active', 'sort_order'], 'sliders_group_active_order_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_published_index');
        });

        Schema::table('leads', function (Blueprint $table) {
            $table->dropIndex('leads_status_created_index');
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->dropIndex('sliders_group_active_order_index');
        });
    }
};

