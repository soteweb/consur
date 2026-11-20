<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_vehicle_detail_renders_sticky_navigation(): void
    {
        $brand = Brand::create([
            'name' => 'Toyota',
            'slug' => 'toyota',
            'is_active' => true,
        ]);

        $category = VehicleCategory::create([
            'brand_id' => $brand->id,
            'name' => 'SUVs',
            'slug' => 'suvs',
            'is_active' => true,
        ]);

        $vehicle = Vehicle::create([
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'model' => 'Corolla Cross',
            'slug' => 'corolla-cross',
            'year' => 2026,
            'condition' => '0km',
            'status' => 'disponible',
            'custom_html' => '<div id="diseno">Sección Diseño</div><div id="video">Sección Video</div>',
        ]);

        $response = $this->get('/vehiculos/' . $vehicle->slug);
        $response->assertStatus(200);
        $response->assertSee('sticky top-0');
        $response->assertSee('Corolla Cross');
    }
}
