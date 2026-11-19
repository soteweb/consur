<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('condition')->default('0km'); // '0km' or 'usado'
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('vehicle_category_id')->nullable()->constrained('vehicle_categories')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            
            $table->string('model'); // e.g. Hilux, RAV4, Corolla Cross, Agya, Yaris Cross
            $table->string('version')->nullable(); // e.g. SRV 4x4, Limited Hybrid, XLS, etc.
            $table->string('slug')->unique();
            $table->integer('year');
            
            // Precios
            $table->decimal('price_usd', 12, 2)->nullable();
            $table->decimal('price_gs', 15, 0)->nullable();
            $table->boolean('show_price')->default(true);
            $table->text('price_note')->nullable(); // e.g. "Consulte plan de financiación"
            
            // Especificaciones técnicas principales
            $table->integer('mileage_km')->default(0);
            $table->string('fuel_type')->default('Nafta'); // Nafta, Diesel, Híbrido, Eléctrico, Flex
            $table->string('transmission')->default('Automática'); // Automática, Manual, CVT, e-CVT
            $table->string('traction')->nullable(); // 4x2, 4x4, AWD
            $table->string('engine')->nullable(); // 2.8L Turbo Diesel, 2.5L Hybrid, 1.0L Dual VVT-i
            $table->integer('doors')->default(4);
            $table->string('color_exterior')->nullable();
            $table->string('color_interior')->nullable();
            $table->string('chassis_vin')->nullable();
            
            // Textos y Contenido
            $table->string('tagline')->nullable(); // "Tu auto, tu estilo", "Insuperable en todo terreno"
            $table->text('description')->nullable();
            
            // JSONB para especificaciones detalladas, equipamiento de confort, seguridad y conectividad
            $table->jsonb('specs')->nullable();
            $table->jsonb('features')->nullable(); // lista de equipamiento destacado
            
            // Indicadores de estado y visibilidad
            $table->boolean('is_certified')->default(false); // Usado Certificado Consur
            $table->boolean('is_featured')->default(false); // Destacado en Inicio
            $table->boolean('is_hybrid')->default(false);
            $table->string('status')->default('disponible'); // disponible, reservado, vendido, oculto
            $table->integer('sort_order')->default(0);
            
            $table->timestamps();
            $table->softDeletes();
            
            // Índices optimizados
            $table->index(['condition', 'status']);
            $table->index(['brand_id', 'vehicle_category_id']);
            $table->index(['price_usd', 'year']);
            $table->index('slug');
        });

        Schema::create('vehicle_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->boolean('is_main')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index(['vehicle_id', 'is_main']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_images');
        Schema::dropIfExists('vehicles');
    }
};
