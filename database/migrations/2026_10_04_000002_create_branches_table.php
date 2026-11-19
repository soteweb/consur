<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. Casa Central Encarnación, Sucursal Colonias Unidas, etc.
            $table->string('city');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('schedule_weekdays')->nullable(); // e.g. 7:00 a 12:00 - 14:00 a 17:30
            $table->string('schedule_saturday')->nullable(); // e.g. 7:30 a 12:00
            $table->string('google_maps_url')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('has_workshop')->default(true);
            $table->boolean('has_mobile_workshop')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
