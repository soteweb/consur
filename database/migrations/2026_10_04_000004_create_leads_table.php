<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('cotizacion'); // cotizacion, test_drive, usado_interes, taller_turno, contacto_general
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->nullOnDelete();
            
            // Datos del cliente
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('city')->nullable();
            
            // Detalles de la consulta
            $table->text('message')->nullable();
            $table->string('financing_plan')->nullable(); // Plan Cuotas, Entrega + Saldo, Contado
            $table->string('trade_in_vehicle')->nullable(); // Vehículo usado ofrecido como parte de pago
            $table->date('preferred_date')->nullable(); // para test drive o turnos
            $table->string('preferred_time')->nullable();
            
            // Gestión comercial
            $table->string('status')->default('nuevo'); // nuevo, en_gestion, contactado, cerrado_ganado, cerrado_perdido
            $table->text('internal_notes')->nullable();
            $table->timestamp('last_contacted_at')->nullable();
            
            // Metadata
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_campaign')->nullable();
            
            $table->timestamps();
            
            $table->index(['type', 'status']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
