<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Branch;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsadosVehiclesSeeder extends Seeder
{
    public function run(): void
    {
        $branchEncarnacion = Branch::where('name', 'like', '%Central%')->orWhere('name', 'like', '%Encarnación%')->first()
            ?? Branch::first();

        $catSuv = VehicleCategory::where('slug', 'suv')->first();
        $catSedan = VehicleCategory::where('slug', 'sedan')->first();
        $catHatchback = VehicleCategory::where('slug', 'hatchback')->first();

        $data = array (
  0 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'Fortuner',
    'version' => '2.8 Turbo Diesel Automática 4x4',
    'slug' => 'toyota-fortuner-2018-plata-4x4-aut',
    'year' => 2018,
    'price_usd' => '41500.00',
    'price_gs' => '325775000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '865.00',
    'mileage_km' => 96200,
    'fuel_type' => 'Diesel',
    'transmission' => 'Automática',
    'traction' => '4x4',
    'engine' => '2.8',
    'doors' => 5,
    'color_exterior' => 'Plata',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Fortuner Aut 2018 año 2018 en excelente estado general y mecánica certificada. Equipado con motor 2.8L Diesel, transmisión Automática y tracción 4x4. Cuenta con Asientos Eléctricos, Bloqueo Central, Dirección Hidráulica, Frenos ABS. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2018',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Plata',
      'Marca' => 'Toyota',
      'Motor' => '2.8',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x4',
      'Combustible' => 'Diesel',
      'Kilometraje' => '96.200 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'SUV',
    ),
    'features' => 
    array (
      0 => 'Asientos Eléctricos',
      1 => 'Bloqueo Central',
      2 => 'Dirección Hidráulica',
      3 => 'Frenos ABS',
      4 => 'Stereo',
      5 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => true,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 1,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_01.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_02.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_03.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_04.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_05.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_06.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_07.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_08.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_09.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_10.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_11.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_12.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_13.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
      13 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_14.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 14',
        'is_main' => false,
        'sort_order' => 14,
      ),
      14 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_15.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 15',
        'is_main' => false,
        'sort_order' => 15,
      ),
      15 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_16.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 16',
        'is_main' => false,
        'sort_order' => 16,
      ),
    ),
  ),
  1 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'RAV4',
    'version' => '2.5 HV Híbrida Automática 4x2',
    'slug' => 'toyota-rav4-hv-2020-hibrida-aut',
    'year' => 2020,
    'price_usd' => '30500.00',
    'price_gs' => '239425000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '635.00',
    'mileage_km' => 160000,
    'fuel_type' => 'Híbrido',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '2.5',
    'doors' => 5,
    'color_exterior' => 'Blanco',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Rav4 HV 2020 año 2020 en excelente estado general y mecánica certificada. Equipado con motor 2.5L Híbrido, transmisión Automática y tracción 4x2. Cuenta con Asientos Eléctricos, Bloqueo Central, Dirección Hidráulica, Frenos ABS. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2020',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Blanco',
      'Marca' => 'Toyota',
      'Motor' => '2.5',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x2',
      'Combustible' => 'Híbrido',
      'Kilometraje' => '160.000 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'SUV',
    ),
    'features' => 
    array (
      0 => 'Asientos Eléctricos',
      1 => 'Bloqueo Central',
      2 => 'Dirección Hidráulica',
      3 => 'Frenos ABS',
      4 => 'Stereo',
      5 => 'Techo Corredizo',
      6 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => true,
    'status' => 'disponible',
    'sort_order' => 5,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_01.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_02.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_03.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_04.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_05.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_06.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_07.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_08.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_09.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_10.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_11.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_12.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_13.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2020 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
    ),
  ),
  2 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Volkswagen',
    'model' => 'T-Cross',
    'version' => '1.0 TSI Turbo Automática',
    'slug' => 'volkswagen-t-cross-2021-tsi-aut',
    'year' => 2021,
    'price_usd' => '16000.00',
    'price_gs' => '125600000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '333.00',
    'mileage_km' => 147000,
    'fuel_type' => 'Naftero',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '1.0',
    'doors' => 5,
    'color_exterior' => 'Gris',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'Volkswagen T-Cross año 2021 en excelente estado general y mecánica certificada. Equipado con motor 1.0L Nafta, transmisión Automática y tracción 4x2. Cuenta con Bloqueo Central, Dirección Hidráulica, Frenos ABS, Stereo. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2021',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Gris',
      'Marca' => 'Volkswagen',
      'Motor' => '1.0',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x2',
      'Combustible' => 'Naftero',
      'Kilometraje' => '147.000 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'SUV',
    ),
    'features' => 
    array (
      0 => 'Bloqueo Central',
      1 => 'Dirección Hidráulica',
      2 => 'Frenos ABS',
      3 => 'Stereo',
      4 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 6,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_01.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_02.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_03.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_04.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_05.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_06.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_07.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_08.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_09.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_10.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_11.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_12.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_13.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
      13 => 
      array (
        'image_path' => 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_14.jpeg',
        'caption' => 'Volkswagen T-Cross 1.0 TSI Turbo Automática 2021 - Foto 14',
        'is_main' => false,
        'sort_order' => 14,
      ),
    ),
  ),
  3 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'Etios',
    'version' => '1.5 Nafta Automática',
    'slug' => 'toyota-etios-2017-aut',
    'year' => 2017,
    'price_usd' => '12000.00',
    'price_gs' => '94200000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '250.00',
    'mileage_km' => 231500,
    'fuel_type' => 'Naftero',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '1.5',
    'doors' => 5,
    'color_exterior' => 'Rojo',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Etios Aut año 2017 en excelente estado general y mecánica certificada. Equipado con motor 1.5L Nafta, transmisión Automática y tracción 4x2. Cuenta con Bloqueo Central, Dirección Hidráulica, Frenos ABS, Stereo. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2017',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Rojo',
      'Marca' => 'Toyota',
      'Motor' => '1.5',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x2',
      'Combustible' => 'Naftero',
      'Kilometraje' => '231.500 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'Hatchback',
    ),
    'features' => 
    array (
      0 => 'Bloqueo Central',
      1 => 'Dirección Hidráulica',
      2 => 'Frenos ABS',
      3 => 'Stereo',
      4 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 7,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_01.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_02.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_03.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_04.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_05.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_06.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_07.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_08.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_09.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_10.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_11.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_12.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_13.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
      13 => 
      array (
        'image_path' => 'vehicles/usados/toyota-etios-2017-aut/foto_14.jpeg',
        'caption' => 'Toyota Etios 1.5 Nafta Automática 2017 - Foto 14',
        'is_main' => false,
        'sort_order' => 14,
      ),
    ),
  ),
  4 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'Allion',
    'version' => '2.0 Nafta Automática',
    'slug' => 'toyota-allion-2008-sedan-aut',
    'year' => 2008,
    'price_usd' => '8471.34',
    'price_gs' => '66500000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '176.00',
    'mileage_km' => 88200,
    'fuel_type' => 'Naftero',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '2.0',
    'doors' => 4,
    'color_exterior' => 'Azul',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Allion año 2008 en excelente estado general y mecánica certificada. Equipado con motor 2.0L Nafta, transmisión Automática y tracción 4x2. Cuenta con Bloqueo Central, Dirección Hidráulica, Frenos ABS, Stereo. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2008',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Azul',
      'Marca' => 'Toyota',
      'Motor' => '2.0',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x2',
      'Combustible' => 'Naftero',
      'Kilometraje' => '88.200 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'Sedán',
    ),
    'features' => 
    array (
      0 => 'Bloqueo Central',
      1 => 'Dirección Hidráulica',
      2 => 'Frenos ABS',
      3 => 'Stereo',
      4 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 8,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_01.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_02.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_03.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_04.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_05.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_06.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_07.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_08.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_09.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_10.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_11.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_12.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_13.jpeg',
        'caption' => 'Toyota Allion 2.0 Nafta Automática 2008 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
    ),
  ),
  5 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Hyundai',
    'model' => 'Tucson',
    'version' => '2.0 Nafta Automática 4x2',
    'slug' => 'hyundai-tucson-2016-aut',
    'year' => 2016,
    'price_usd' => '16500.00',
    'price_gs' => '129525000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '344.00',
    'mileage_km' => 85000,
    'fuel_type' => 'Naftero',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '2.0',
    'doors' => 5,
    'color_exterior' => 'Negro',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'Hyundai Tucson año 2016 en excelente estado general y mecánica certificada. Equipado con motor 2.0L Nafta, transmisión Automática y tracción 4x2. Cuenta con Asientos Eléctricos, Bloqueo Central, Dirección Hidráulica, Frenos ABS. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2016',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Negro',
      'Marca' => 'Hyundai',
      'Motor' => '2.0',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x2',
      'Combustible' => 'Naftero',
      'Kilometraje' => '85.000 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'SUV',
    ),
    'features' => 
    array (
      0 => 'Asientos Eléctricos',
      1 => 'Bloqueo Central',
      2 => 'Dirección Hidráulica',
      3 => 'Frenos ABS',
      4 => 'Stereo',
      5 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 9,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_01.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_02.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_03.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_04.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_05.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_06.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_07.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_08.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_09.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_10.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_11.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_12.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_13.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
      13 => 
      array (
        'image_path' => 'vehicles/usados/hyundai-tucson-2016-aut/foto_14.jpeg',
        'caption' => 'Hyundai Tucson 2.0 Nafta Automática 4x2 2016 - Foto 14',
        'is_main' => false,
        'sort_order' => 14,
      ),
    ),
  ),
  6 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'Fortuner',
    'version' => '2.8 Turbo Diesel Automática 4x4',
    'slug' => 'toyota-fortuner-2018-bordo-4x4-aut',
    'year' => 2018,
    'price_usd' => '40000.00',
    'price_gs' => '314000000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '833.00',
    'mileage_km' => 234200,
    'fuel_type' => 'Diesel',
    'transmission' => 'Automática',
    'traction' => '4x4',
    'engine' => '2.8',
    'doors' => 5,
    'color_exterior' => 'Bordo',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Fortuner Aut 2018 año 2018 en excelente estado general y mecánica certificada. Equipado con motor 2.8L Diesel, transmisión Automática y tracción 4x4. Cuenta con Asientos Eléctricos, Bloqueo Central, Dirección Hidráulica, Frenos ABS. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2018',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Bordo',
      'Marca' => 'Toyota',
      'Motor' => '2.8',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x4',
      'Combustible' => 'Diesel',
      'Kilometraje' => '234.200 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'SUV',
    ),
    'features' => 
    array (
      0 => 'Asientos Eléctricos',
      1 => 'Bloqueo Central',
      2 => 'Dirección Hidráulica',
      3 => 'Frenos ABS',
      4 => 'Stereo',
      5 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 10,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_01.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_02.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_03.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_04.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_05.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_06.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_07.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_08.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_09.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_10.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_11.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_12.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_13.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
      13 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_14.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 14',
        'is_main' => false,
        'sort_order' => 14,
      ),
      14 => 
      array (
        'image_path' => 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_15.jpeg',
        'caption' => 'Toyota Fortuner 2.8 Turbo Diesel Automática 4x4 2018 - Foto 15',
        'is_main' => false,
        'sort_order' => 15,
      ),
    ),
  ),
  7 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'Corona Premio',
    'version' => '1.8 Nafta Automática',
    'slug' => 'toyota-corona-premio-2011-bordo-aut',
    'year' => 2011,
    'price_usd' => '9936.31',
    'price_gs' => '78000000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '207.00',
    'mileage_km' => 72000,
    'fuel_type' => 'Naftero',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '1.8',
    'doors' => 4,
    'color_exterior' => 'Bordo',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Corona Premio Bordo año 2011 en excelente estado general y mecánica certificada. Equipado con motor 1.8L Nafta, transmisión Automática y tracción 4x2. Cuenta con Bloqueo Central, Dirección Hidráulica, Frenos ABS, Stereo. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2011',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Bordo',
      'Marca' => 'Toyota',
      'Motor' => '1.8',
      'Estado' => 'Excelente',
      'Volante' => 'Vía chile',
      'Tracción' => '4x2',
      'Combustible' => 'Naftero',
      'Kilometraje' => '72.000 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'Sedán',
    ),
    'features' => 
    array (
      0 => 'Bloqueo Central',
      1 => 'Dirección Hidráulica',
      2 => 'Frenos ABS',
      3 => 'Stereo',
      4 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 11,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_01.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_02.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_03.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_04.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_05.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_06.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_07.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_08.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_09.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_10.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_11.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_12.jpeg',
        'caption' => 'Toyota Corona Premio 1.8 Nafta Automática 2011 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
    ),
  ),
  8 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'Auris',
    'version' => '1.8 Nafta Automática',
    'slug' => 'toyota-auris-2009-blanco-aut',
    'year' => 2009,
    'price_usd' => '8152.87',
    'price_gs' => '64000000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '170.00',
    'mileage_km' => 97700,
    'fuel_type' => 'Naftero',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '1.8',
    'doors' => 5,
    'color_exterior' => 'Blanco',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Auris 2009 año 2009 en excelente estado general y mecánica certificada. Equipado con motor 1.8L Nafta, transmisión Automática y tracción 4x2. Cuenta con Bloqueo Central, Dirección Hidráulica, Frenos ABS, Stereo. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2009',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Blanco',
      'Marca' => 'Toyota',
      'Motor' => '1.8',
      'Estado' => 'Excelente',
      'Volante' => 'Vía chile',
      'Tracción' => '4x2',
      'Combustible' => 'Naftero',
      'Kilometraje' => '97.700 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'Hatchback',
    ),
    'features' => 
    array (
      0 => 'Bloqueo Central',
      1 => 'Dirección Hidráulica',
      2 => 'Frenos ABS',
      3 => 'Stereo',
      4 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => false,
    'is_hybrid' => false,
    'status' => 'disponible',
    'sort_order' => 12,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_01.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_02.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_03.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_04.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_05.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_06.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_07.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_08.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_09.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_10.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_11.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_12.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_13.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
      13 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_14.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 14',
        'is_main' => false,
        'sort_order' => 14,
      ),
      14 => 
      array (
        'image_path' => 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_15.jpeg',
        'caption' => 'Toyota Auris 1.8 Nafta Automática 2009 - Foto 15',
        'is_main' => false,
        'sort_order' => 15,
      ),
    ),
  ),
  9 => 
  array (
    'condition' => 'usado',
    'brand_name' => 'Toyota',
    'model' => 'RAV4',
    'version' => '2.5 HV Híbrida Automática 4x2',
    'slug' => 'toyota-rav4-hv-2024-hibrida-aut',
    'year' => 2024,
    'price_usd' => '41500.00',
    'price_gs' => '325775000',
    'show_price' => true,
    'price_note' => 'Consulte planes de entrega y financiación propia',
    'monthly_fee_usd' => '865.00',
    'mileage_km' => 51000,
    'fuel_type' => 'Híbrido',
    'transmission' => 'Automática',
    'traction' => '4x2',
    'engine' => '2.5',
    'doors' => 5,
    'color_exterior' => 'Gris',
    'color_interior' => 'Cuero / Tela de alta calidad',
    'tagline' => 'Vehículo usado inspeccionado y garantizado por Consur S.A.',
    'description' => 'T. Rav4 HV 2024 año 2024 en excelente estado general y mecánica certificada. Equipado con motor 2.5L Híbrido, transmisión Automática y tracción 4x2. Cuenta con Asientos Eléctricos, Bloqueo Central, Dirección Hidráulica, Frenos ABS. Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.',
    'specs' => 
    array (
      'Año' => '2024',
      'Sede' => 'Casa Central - Encarnación',
      'Color' => 'Gris',
      'Marca' => 'Toyota',
      'Motor' => '2.5',
      'Estado' => 'Excelente',
      'Volante' => 'Original',
      'Tracción' => '4x2',
      'Combustible' => 'Híbrido',
      'Kilometraje' => '51.000 km',
      'Transmisión' => 'Automática',
      'Disponibilidad' => 'Inmediata',
      'Tipo de vehículo' => 'SUV',
    ),
    'features' => 
    array (
      0 => 'Asientos Eléctricos',
      1 => 'Bloqueo Central',
      2 => 'Dirección Hidráulica',
      3 => 'Frenos ABS',
      4 => 'Stereo',
      5 => 'Techo Corredizo',
      6 => 'Vidrios Eléctricos',
    ),
    'is_certified' => true,
    'is_featured' => true,
    'is_hybrid' => true,
    'status' => 'disponible',
    'sort_order' => 4,
    'images' => 
    array (
      0 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_01.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 1',
        'is_main' => true,
        'sort_order' => 1,
      ),
      1 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_02.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 2',
        'is_main' => false,
        'sort_order' => 2,
      ),
      2 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_03.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 3',
        'is_main' => false,
        'sort_order' => 3,
      ),
      3 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_04.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 4',
        'is_main' => false,
        'sort_order' => 4,
      ),
      4 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_05.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 5',
        'is_main' => false,
        'sort_order' => 5,
      ),
      5 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_06.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 6',
        'is_main' => false,
        'sort_order' => 6,
      ),
      6 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_07.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 7',
        'is_main' => false,
        'sort_order' => 7,
      ),
      7 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_08.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 8',
        'is_main' => false,
        'sort_order' => 8,
      ),
      8 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_09.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 9',
        'is_main' => false,
        'sort_order' => 9,
      ),
      9 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_10.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 10',
        'is_main' => false,
        'sort_order' => 10,
      ),
      10 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_11.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 11',
        'is_main' => false,
        'sort_order' => 11,
      ),
      11 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_12.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 12',
        'is_main' => false,
        'sort_order' => 12,
      ),
      12 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_13.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 13',
        'is_main' => false,
        'sort_order' => 13,
      ),
      13 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_14.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 14',
        'is_main' => false,
        'sort_order' => 14,
      ),
      14 => 
      array (
        'image_path' => 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_15.jpeg',
        'caption' => 'Toyota RAV4 2.5 HV Híbrida Automática 4x2 2024 - Foto 15',
        'is_main' => false,
        'sort_order' => 15,
      ),
    ),
  ),
);

        foreach ($data as $item) {
            $brand = Brand::firstOrCreate(
                ['slug' => Str::slug($item['brand_name'])],
                ['name' => $item['brand_name'], 'is_active' => true]
            );

            $category = $catSuv;
            $m = strtolower($item['model']);
            if (str_contains($m, 'allion') || str_contains($m, 'corona')) {
                $category = $catSedan ?? $catSuv;
            } elseif (str_contains($m, 'etios') || str_contains($m, 'auris')) {
                $category = $catHatchback ?? $catSuv;
            }

            $images = $item['images'];
            unset($item['brand_name'], $item['images']);

            $item['brand_id'] = $brand->id;
            $item['branch_id'] = $branchEncarnacion?->id;
            $item['vehicle_category_id'] = $category?->id;

            $vehicle = Vehicle::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );

            VehicleImage::where('vehicle_id', $vehicle->id)->delete();
            foreach ($images as $img) {
                $vehicle->images()->create($img);
            }
        }
    }
}