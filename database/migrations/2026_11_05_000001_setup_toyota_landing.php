<?php

use App\Models\Brand;
use App\Models\Page;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Sincronizar Marca Toyota con su landing exclusiva
        Brand::where('slug', 'toyota')->update([
            'custom_url' => '/toyota',
            'is_active' => true,
            'is_featured_menu' => true,
        ]);

        // 2. Registro en tabla pages para compatibilidad de gestor CMS
        Page::updateOrCreate(
            ['slug' => 'toyota'],
            [
                'title' => 'Toyota Paraguay – Gama 0 Km',
                'subtitle' => 'Concesionaria Oficial Consur S.A. Catálogo completo de vehículos 0 Km, Principios Toyota, servicio técnico especializado y red de sucursales.',
                'banner_image' => '/images/home/home_toyota_bg.jpg',
                'content' => '<!-- Landing exclusiva gestionada via App\Livewire\Frontend\ToyotaLanding -->',
                'meta_title' => 'Toyota Paraguay • Modelos 0 Km | Consur S.A. Concesionario Oficial',
                'meta_description' => 'Descubrí todos los modelos 0 Km de Toyota en Consur S.A.: Hilux, Corolla Cross, RAV4, Fortuner, Land Cruiser Prado y más. Servicio técnico oficial y sucursales en Paraguay.',
                'is_published' => true,
                'sort_order' => 1,
            ]
        );
    }

    public function down(): void
    {
        // No destructivo
    }
};

