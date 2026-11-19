<?php

use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Ajustar categorías para la gama 0 Km CONSUR
        // Categoría SUV
        VehicleCategory::where('slug', 'suv')->update([
            'name' => 'SUV',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // Categoría Pick-Up
        VehicleCategory::where('slug', 'pick-up')->update([
            'name' => 'Pick-Up',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        // Categoría Sedán
        VehicleCategory::where('slug', 'sedan')->update([
            'name' => 'Sedán',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // Categoría Hatchback
        VehicleCategory::where('slug', 'hatchback')->update([
            'name' => 'Hatchback',
            'is_active' => true,
            'sort_order' => 4,
        ]);

        // Categoría Utilitario / Comercial
        VehicleCategory::where('slug', 'utilitario')->update([
            'name' => 'Comercial / Utilitario',
            'is_active' => true,
            'sort_order' => 5,
        ]);

        // Categoría Electrificados
        VehicleCategory::where('slug', 'electrificados')->update([
            'name' => 'Electrificados / Híbridos',
            'is_active' => true,
            'sort_order' => 6,
        ]);

        // Desactivar categorías redundantes o vacías
        VehicleCategory::whereIn('slug', ['camioneta', 'comercial', 'deportivos', 'hibridos'])->update([
            'is_active' => false,
        ]);

        // 2. Asociar vehículos 0km a sus categorías activas correspondientes
        $pickUpCat = VehicleCategory::where('slug', 'pick-up')->first();
        if ($pickUpCat) {
            Vehicle::where('condition', '0km')
                ->whereIn('model', ['Hilux', 'Hilux Cabina Simple'])
                ->update(['vehicle_category_id' => $pickUpCat->id]);
        }

        $hatchCat = VehicleCategory::where('slug', 'hatchback')->first();
        if ($hatchCat) {
            Vehicle::where('condition', '0km')
                ->where('model', 'Agya')
                ->update(['vehicle_category_id' => $hatchCat->id]);
        }

        $utilCat = VehicleCategory::where('slug', 'utilitario')->first();
        if ($utilCat) {
            Vehicle::where('condition', '0km')
                ->where('model', 'Hiace')
                ->update(['vehicle_category_id' => $utilCat->id]);
        }

        // 3. Asignar orden de presentación destacado (bestsellers al frente)
        $orders = [
            'Hilux' => 1,
            'Corolla Cross' => 2,
            'RAV4' => 3,
            'Yaris Cross' => 4,
            'Corolla' => 5,
            'Agya' => 6,
            'Hilux Cabina Simple' => 7,
            'Fortuner' => 8,
            'Land Cruiser Prado' => 9,
            'Raize' => 10,
            'Rush' => 11,
            'Land Cruiser 300' => 12,
            'Hiace' => 13,
        ];

        foreach ($orders as $model => $order) {
            Vehicle::where('condition', '0km')
                ->where('model', $model)
                ->update(['sort_order' => $order]);
        }
    }

    public function down(): void
    {
        // No destructivo
    }
};

