<?php

use App\Models\Branch;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $unifiedSchedule = 'Lunes a Viernes: 7:00 a 12:00 • 14:00 a 17:00 | Sábados: 7:30 a 12:00';

        // 1. Setting global schedule_info
        Setting::set('schedule_info', $unifiedSchedule, 'general');

        // 2. Actualizar todas las sucursales
        Branch::query()->update([
            'schedule_weekdays' => 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:00 Hs.',
            'schedule_saturday' => 'Sábados: de 07:30 a 12:00 Hs.',
        ]);

        // 3. Actualizar página posventa en base de datos
        $posventa = Page::where('slug', 'posventa')->first();
        if ($posventa) {
            $content = $posventa->content;

            // Reemplazo en tarjetas de sedes
            $content = str_replace('Lun a Vie 07:00 a 17:30 Hs', 'Lun a Vie: 07:00 a 12:00 y 14:00 a 17:00 Hs', $content);
            $content = str_replace('07:00 a 17:30', '07:00 a 17:00', $content);
            $content = str_replace('14:00 a 17:30', '14:00 a 17:00', $content);
            $content = str_replace(
                'Lun a Vie: 07:00 a 12:00 y 14:00 a 17:00 &bull; Sáb: 07:30 a 12:00',
                $unifiedSchedule,
                $content
            );

            $posventa->content = $content;
            $posventa->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No destructivo
    }
};
