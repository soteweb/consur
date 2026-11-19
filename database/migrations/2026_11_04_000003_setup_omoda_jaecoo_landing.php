<?php

use App\Models\Brand;
use App\Models\Page;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Sincronizar Marca OMODA | JAECOO
        Brand::where('slug', 'omoda-jaecoo')->update([
            'logo_url' => '/images/marcas/omoda-jaecoo.svg',
            'banner_image' => '/images/omoda-jaecoo/banner-hero.jpg',
            'custom_url' => '/omoda-jaecoo',
            'tagline' => 'De lo Clásico Más Allá de lo Clásico',
            'description' => 'SUVs híbridos de lujo y aventura JAECOO J5 y JAECOO J7. Innovación, tecnología inteligente y respaldo oficial Consur S.A.',
            'is_active' => true,
            'is_featured_menu' => true,
        ]);

        // 2. Registro en tabla pages para compatibilidad de gestor CMS
        Page::updateOrCreate(
            ['slug' => 'omoda-jaecoo'],
            [
                'title' => 'OMODA & JAECOO – Modelos J5 y J7',
                'subtitle' => 'De lo Clásico Más Allá de lo Clásico. SUVs híbridos de vanguardia, lujo inteligente y espíritu off-road en Consur S.A.',
                'banner_image' => '/images/omoda-jaecoo/banner-hero.jpg',
                'content' => '<!-- Landing exclusiva oscura gestionada via App\Livewire\Frontend\OmodaJaecoo -->',
                'meta_title' => 'OMODA & JAECOO Paraguay | Modelos J5 y J7 en Consur S.A.',
                'meta_description' => 'De lo clásico más allá de lo clásico. Descubrí los SUVs híbridos de lujo y aventura JAECOO J5 y JAECOO J7 con el respaldo oficial de Consur S.A.',
                'is_published' => true,
                'sort_order' => 5,
            ]
        );
    }

    public function down(): void
    {
        // No destructivo
    }
};

