<?php

namespace App\Console\Commands;

use App\Models\Brand;
use App\Models\Branch;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleImage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportUsadosFromConsur extends Command
{
    protected $signature = 'import:usados-consur {--force : Reimport and update existing vehicles}';
    protected $description = 'Importa todos los vehículos usados publicados en el año 2026 desde consur.com.py/buscador/';

    public function handle(): int
    {
        $this->info('Iniciando importación de vehículos usados publicados en 2026 desde Consur S.A....');

        // Asegurar existencia de marcas
        $brandToyota = Brand::firstOrCreate(['slug' => 'toyota'], ['name' => 'Toyota', 'is_active' => true, 'sort_order' => 1]);
        $brandHyundai = Brand::firstOrCreate(['slug' => 'hyundai'], ['name' => 'Hyundai', 'is_active' => true, 'sort_order' => 5]);
        $brandVw = Brand::firstOrCreate(['slug' => 'volkswagen'], ['name' => 'Volkswagen', 'is_active' => true, 'sort_order' => 6]);

        // Categorías
        $catSuv = VehicleCategory::firstOrCreate(['slug' => 'suv'], ['name' => 'SUV', 'is_active' => true, 'sort_order' => 2]);
        $catSedan = VehicleCategory::firstOrCreate(['slug' => 'sedan'], ['name' => 'Sedán', 'is_active' => true, 'sort_order' => 1]);
        $catHatchback = VehicleCategory::firstOrCreate(['slug' => 'hatchback'], ['name' => 'Hatchback', 'is_active' => true, 'sort_order' => 4]);

        // Sucursal por defecto (Casa Central Encarnación)
        $branch = Branch::first() ?? Branch::create([
            'name' => 'Consur S.A. – Casa Central Encarnación',
            'city' => 'Encarnación',
            'address' => 'Ruta 1 Km 2.5',
            'is_active' => true,
        ]);

        // Cargar datos de catálogo importado
        $jsonPath = base_path('scratch/scraped_usados.json');
        if (!file_exists($jsonPath)) {
            $this->error('No se encontró el archivo de datos para importar.');
            return Command::FAILURE;
        }

        $items = json_decode(file_get_contents($jsonPath), true);
        if (empty($items)) {
            $this->error('El archivo de datos está vacío.');
            return Command::FAILURE;
        }

        $this->info("Se procesarán " . count($items) . " vehículos detectados...");

        $exchangeRate = 7850; // Tipo de cambio estimado Gs por USD
        $importedCount = 0;

        foreach ($items as $index => $item) {
            $title = $item['title'];
            $dateStr = $item['date'] ?? ''; // e.g. 24/10/2026
            
            // Validar publicación año 2026
            if (!str_contains($dateStr, '2026')) {
                $this->warn("Vehículo {$title} omitido por no ser del año 2026 ({$dateStr}).");
                continue;
            }

            try {
                $createdAt = Carbon::createFromFormat('d/m/Y', $dateStr)->setTime(10, 0, 0);
            } catch (\Exception $e) {
                $createdAt = Carbon::now();
            }

            $shortFeat = $item['shortFeatures'] ?? [];
            $keyFeat = $item['keyFeatures'] ?? [];

            // Determinar Marca
            $brandId = $brandToyota->id;
            if (stripos($title, 'Volkswagen') !== false || stripos($title, 'T-Cross') !== false) {
                $brandId = $brandVw->id;
            } elseif (stripos($title, 'Hyundai') !== false || stripos($title, 'Tucson') !== false) {
                $brandId = $brandHyundai->id;
            }

            // Normalizar Modelo y Versión
            $model = 'Modelo';
            $version = 'Estándar';
            $slugBase = '';

            if (stripos($title, 'Fortuner') !== false) {
                $model = 'Fortuner';
                $color = $shortFeat['Color'] ?? 'Blanco';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2018);
                $version = '2.8 Turbo Diesel Automática 4x4';
                $slugBase = "toyota-fortuner-{$year}-" . Str::slug($color) . "-4x4-aut";
            } elseif (stripos($title, 'Rav4') !== false || stripos($title, 'RAV4') !== false) {
                $model = 'RAV4';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2024);
                $version = '2.5 HV Híbrida Automática 4x2';
                $slugBase = "toyota-rav4-hv-{$year}-hibrida-aut";
            } elseif (stripos($title, 'T-Cross') !== false) {
                $model = 'T-Cross';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2021);
                $version = '1.0 TSI Turbo Automática';
                $slugBase = "volkswagen-t-cross-{$year}-tsi-aut";
            } elseif (stripos($title, 'Etios') !== false) {
                $model = 'Etios';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2017);
                $version = '1.5 Nafta Automática';
                $slugBase = "toyota-etios-{$year}-aut";
            } elseif (stripos($title, 'Allion') !== false) {
                $model = 'Allion';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2008);
                $version = '2.0 Nafta Automática';
                $slugBase = "toyota-allion-{$year}-sedan-aut";
            } elseif (stripos($title, 'Tucson') !== false) {
                $model = 'Tucson';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2016);
                $version = '2.0 Nafta Automática 4x2';
                $slugBase = "hyundai-tucson-{$year}-aut";
            } elseif (stripos($title, 'Corona Premio') !== false) {
                $model = 'Corona Premio';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2011);
                $version = '1.8 Nafta Automática';
                $slugBase = "toyota-corona-premio-{$year}-bordo-aut";
            } elseif (stripos($title, 'Auris') !== false) {
                $model = 'Auris';
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2009);
                $version = '1.8 Nafta Automática';
                $slugBase = "toyota-auris-{$year}-blanco-aut";
            } else {
                $model = trim(str_ireplace(['T.', 'Toyota', 'Volkswagen', 'Hyundai'], '', $title));
                $year = (int) ($shortFeat['Año'] ?? $keyFeat['Año'] ?? 2020);
                $version = 'Automática';
                $slugBase = Str::slug($title . '-' . $year);
            }

            // Categoría
            $tipoRaw = strtolower($shortFeat['Tipo'] ?? $keyFeat['Tipo'] ?? '');
            if (str_contains($tipoRaw, 'suv') || in_array($model, ['Fortuner', 'RAV4', 'T-Cross', 'Tucson'])) {
                $categoryId = $catSuv->id;
            } elseif (str_contains($tipoRaw, 'hatchback') || in_array($model, ['Etios', 'Auris'])) {
                $categoryId = $catHatchback->id;
            } elseif (str_contains($tipoRaw, 'sedán') || str_contains($tipoRaw, 'sedan') || in_array($model, ['Allion', 'Corona Premio'])) {
                $categoryId = $catSedan->id;
            } else {
                $categoryId = $catSuv->id;
            }

            // Precios
            $priceUsd = null;
            $priceGs = null;
            $showPrice = false;

            $rawPrice = $item['priceRaw'] ?? '';
            $rawPriceGs = $shortFeat['Precio Gs.'] ?? '';

            if (!empty($rawPrice) && preg_match('/[\d,.]+/', $rawPrice, $m)) {
                $num = (float) str_replace([',', '.'], '', $m[0]);
                if ($num > 0) {
                    $priceUsd = $num;
                    $priceGs = $num * $exchangeRate;
                    $showPrice = true;
                }
            } elseif (!empty($rawPriceGs) && preg_match('/[\d,.]+/', $rawPriceGs, $m)) {
                $numGs = (float) str_replace(['.', ','], '', $m[0]);
                if ($numGs > 0) {
                    $priceGs = $numGs;
                    $priceUsd = round($numGs / $exchangeRate, 2);
                    $showPrice = true;
                }
            }

            // Kilometraje
            $km = 0;
            if (isset($shortFeat['Kilometraje'])) {
                $km = (int) preg_replace('/\D/', '', $shortFeat['Kilometraje']);
            } elseif (isset($keyFeat['Kilometraje'])) {
                $km = (int) preg_replace('/\D/', '', $keyFeat['Kilometraje']);
            }

            // Combustible
            $fuelType = $shortFeat['Combustible'] ?? $keyFeat['Tipo Combustible'] ?? 'Nafta';
            if (str_contains(strtolower($fuelType), 'diesel') || str_contains(strtolower($fuelType), 'diésel')) {
                $fuelType = 'Diesel';
            } elseif (str_contains(strtolower($fuelType), 'hibrid') || str_contains(strtolower($fuelType), 'híbrid')) {
                $fuelType = 'Híbrido';
            } else {
                $fuelType = 'Nafta';
            }

            $isHybrid = ($fuelType === 'Híbrido');

            // Transmisión
            $transmission = $shortFeat['Transmisión'] ?? $keyFeat['Tipo Transmisión'] ?? 'Automática';
            if (str_contains(strtolower($transmission), 'auto')) {
                $transmission = 'Automática';
            } else {
                $transmission = 'Manual';
            }

            // Tracción
            $traction = $shortFeat['Traccion'] ?? $shortFeat['Tracción'] ?? '4x2';

            // Motor
            $motor = $shortFeat['Motor'] ?? $keyFeat['Engine Capacity'] ?? '';
            $engineStr = !empty($motor) ? "{$motor}L {$fuelType}" : "{$fuelType}";

            // Color
            $colorExt = $shortFeat['Color'] ?? $keyFeat['Color'] ?? 'Blanco';

            // Equipamiento / Specs
            $specs = [
                'Año' => $year,
                'Kilometraje' => number_format($km, 0, ',', '.') . ' Km',
                'Combustible' => $fuelType,
                'Transmisión' => $transmission,
                'Tracción' => $traction,
                'Motor' => $engineStr,
                'Color' => $colorExt,
                'Estado' => $shortFeat['Estado'] ?? 'Excelente',
                'Garantía' => 'Inspección técnica oficial Consur S.A.',
                'Ubicación' => 'Casa Matriz Encarnación',
            ];

            if (!empty($shortFeat['Volante'])) {
                $specs['Volante'] = $shortFeat['Volante'];
            }

            $carFeatures = $item['carFeatures'] ?? [
                'Bloqueo Central',
                'Dirección Hidráulica',
                'Frenos ABS',
                'Stereo',
                'Vidrios Eléctricos'
            ];

            $description = "{$title} año {$year} en excelente estado general y mecánica certificada. " .
                "Equipado con motor {$engineStr}, transmisión {$transmission} y tracción {$traction}. " .
                "Cuenta con " . implode(', ', array_slice($carFeatures, 0, 4)) . ". " .
                "Vehículo usado seleccionado e inspeccionado minuciosamente por el equipo técnico de Consur S.A.";

            // Verificar o crear registro Vehicle
            $vehicle = Vehicle::where('slug', $slugBase)->first();
            if (!$vehicle) {
                $vehicle = new Vehicle();
                $vehicle->uuid = (string) Str::uuid();
                $vehicle->slug = $slugBase;
            }

            $vehicle->condition = 'usado';
            $vehicle->brand_id = $brandId;
            $vehicle->vehicle_category_id = $categoryId;
            $vehicle->branch_id = $branch->id;
            $vehicle->model = $model;
            $vehicle->version = $version;
            $vehicle->year = $year;
            $vehicle->price_usd = $priceUsd;
            $vehicle->price_gs = $priceGs;
            $vehicle->show_price = $showPrice;
            $vehicle->price_note = 'Consulte planes de entrega y financiación propia';
            $vehicle->mileage_km = $km;
            $vehicle->fuel_type = $fuelType;
            $vehicle->transmission = $transmission;
            $vehicle->traction = $traction;
            $vehicle->engine = $engineStr;
            $vehicle->doors = in_array($model, ['Allion', 'Corona Premio']) ? 4 : 5;
            $vehicle->color_exterior = $colorExt;
            $vehicle->color_interior = 'Cuero / Tela de alta calidad';
            $vehicle->tagline = 'Vehículo usado inspeccionado y garantizado por Consur S.A.';
            $vehicle->description = $description;
            $vehicle->specs = $specs;
            $vehicle->features = $carFeatures;
            $vehicle->is_certified = true;
            $vehicle->is_featured = ($index < 4);
            $vehicle->is_hybrid = $isHybrid;
            $vehicle->status = 'disponible';
            $vehicle->sort_order = $index + 1;
            $vehicle->created_at = $createdAt;
            $vehicle->updated_at = Carbon::now();
            $vehicle->save();

            // Extraer y guardar las imágenes completas de cada vehículo
            $fullImages = !empty($item['images']) ? $item['images'] : $this->scrapeGalleryImages($item['url']);

            // Directorio local para este vehículo
            $slugDir = storage_path("app/public/vehicles/usados/{$vehicle->slug}");
            if (!\Illuminate\Support\Facades\File::isDirectory($slugDir)) {
                \Illuminate\Support\Facades\File::makeDirectory($slugDir, 0755, true, true);
            }

            // Eliminar imágenes previas si reimportando
            $vehicle->images()->delete();

            $ctx = stream_context_create([
                'http' => ['timeout' => 20, 'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'],
                'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
            ]);

            foreach ($fullImages as $imgIdx => $imgPath) {
                $finalPath = $imgPath;

                // Si es URL remota, guardar copia local
                if (str_starts_with($imgPath, 'http')) {
                    $ext = pathinfo(parse_url($imgPath, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpeg';
                    $filename = sprintf("foto_%02d.%s", $imgIdx + 1, $ext);
                    $localPath = $slugDir . DIRECTORY_SEPARATOR . $filename;
                    $relativePath = "vehicles/usados/{$vehicle->slug}/{$filename}";

                    if (!file_exists($localPath) || filesize($localPath) < 500) {
                        $data = @file_get_contents($imgPath, false, $ctx);
                        if ($data !== false && strlen($data) > 500) {
                            file_put_contents($localPath, $data);
                            $finalPath = $relativePath;
                        }
                    } else {
                        $finalPath = $relativePath;
                    }
                }

                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'image_path' => $finalPath,
                    'caption' => "{$vehicle->full_name} - Foto " . ($imgIdx + 1),
                    'is_main' => ($imgIdx === 0),
                    'sort_order' => $imgIdx + 1,
                ]);
            }

            $this->line(" [<info>OK</info>] Importado: #{$vehicle->id} {$vehicle->model} {$vehicle->year} ({$vehicle->slug}) con " . count($fullImages) . " fotos locales.");
            $importedCount++;
        }

        $this->info("¡Importación finalizada con éxito! {$importedCount} vehículos usados registrados.");
        return Command::SUCCESS;
    }

    private function scrapeGalleryImages(string $url): array
    {
        $ctx = stream_context_create([
            'http' => [
                'timeout' => 15,
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ]);

        $html = @file_get_contents($url, false, $ctx);
        if (!$html) {
            return [];
        }

        $images = [];
        if (preg_match('/<div id="single-slider"[^>]*>.*?<ul class="slides">(.*?)<\/ul>/si', $html, $mSlider)) {
            preg_match_all('/<a[^>]+href="([^"]+)"[^>]*data-fancybox/si', $mSlider[1], $mImgs);
            $images = array_unique($mImgs[1] ?? []);
            if (empty($images)) {
                preg_match_all('/<img[^>]+src="([^"]+)"/si', $mSlider[1], $mImgs2);
                $images = array_unique($mImgs2[1] ?? []);
            }
        }

        return array_values($images);
    }
}
