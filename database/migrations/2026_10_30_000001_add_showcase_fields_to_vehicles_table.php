<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Campos de la plantilla "Showcase 0 Km" (Toyota como marca base, escalable a las demás).
 *
 * - monthly_fee_usd : Cuota orientativa "Cuotas desde US$ X".
 * - brochure_url    : Ficha técnica / brochure oficial en PDF (subido o URL externa).
 * - video_url       : Video oficial (YouTube).
 * - airbags         : Cantidad de airbags (dato destacado de seguridad).
 * - colors          : [{name, hex, image}] Paleta exterior con render por color.
 * - versions        : [{name, engine, transmission, traction, price_usd, monthly_fee_usd, brochure_url, features[]}]
 * - safety          : [clave] Sistemas de seguridad activos (catálogo en config/vehicle_template.php).
 * - highlights      : [{title, subtitle, text, image}] Bloques de storytelling (Diseño exterior, interior, etc.).
 *
 * La ficha técnica estandarizada se guarda en la columna JSONB existente `specs`.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->decimal('monthly_fee_usd', 10, 2)->nullable()->after('price_note');
            $table->string('brochure_url')->nullable()->after('description');
            $table->string('video_url')->nullable()->after('brochure_url');
            $table->unsignedTinyInteger('airbags')->nullable()->after('doors');
            $table->jsonb('colors')->nullable()->after('features');
            $table->jsonb('versions')->nullable()->after('colors');
            $table->jsonb('safety')->nullable()->after('versions');
            $table->jsonb('highlights')->nullable()->after('safety');
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn([
                'monthly_fee_usd',
                'brochure_url',
                'video_url',
                'airbags',
                'colors',
                'versions',
                'safety',
                'highlights',
            ]);
        });
    }
};
