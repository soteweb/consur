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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre descriptivo u original del archivo');
            $table->string('file_name')->comment('Nombre físico del archivo en disco');
            $table->string('mime_type')->index();
            $table->string('disk')->default('public');
            $table->string('path')->comment('Ruta relativa en public o storage');
            $table->string('url')->comment('URL pública para acceder al archivo');
            $table->unsignedBigInteger('size')->default(0)->comment('Tamaño en bytes');
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->string('alt')->nullable()->comment('Texto alternativo / descripción');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index('created_at');
        });

        // Auto-indexar medios existentes en public/images/
        try {
            (new \App\Livewire\Admin\MediaManager())->syncExistingMedia();
        } catch (\Throwable $e) {
            // Silencioso en caso de entorno sin archivos previos
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
