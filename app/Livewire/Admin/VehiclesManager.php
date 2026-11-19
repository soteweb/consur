<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Lead;
use App\Models\Setting;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleImage;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class VehiclesManager extends BaseCrudComponent
{
    use WithFileUploads;

    // Condición fija del módulo ('0km' o 'usado')
    public string $forcedCondition = '';
    public bool $viewOnly = false; // Modo solo lectura para vendedores en 0km

    // Filtros de tabla y selección de modelos
    public string $filterBrand = '';
    public string $filterStatus = '';
    public string $filterCategory = '';
    public string $filterModel = ''; // '' = Todos los modelos, o ID / nombre de un modelo específico
    public array $selectedModels = []; // IDs seleccionados en tabla o lote
    public bool $selectAllModels = false;

    // Selector en el Editor 0 Km (aplicar a uno, varios o todos los modelos)
    public string $editorModelScope = 'single'; // 'single' | 'multiple' | 'all'
    public array $targetModelIds = [];

    // Campos del Formulario
    public string $condition = '0km';
    public ?int $brand_id = null;
    public ?int $vehicle_category_id = null;
    public ?int $branch_id = null;
    public string $model = '';
    public string $version = '';
    public ?int $year = null;
    public ?float $price_usd = null;
    public ?float $price_gs = null;
    public bool $show_price = true;
    public string $price_note = '';
    public int $mileage_km = 0;
    public string $fuel_type = 'Nafta';
    public string $transmission = 'Automática';
    public string $traction = '4x2';
    public string $engine = '';
    public int $doors = 4;
    public string $color_exterior = '';
    public string $color_interior = '';
    public string $tagline = '';
    public string $description = '';
    public bool $is_certified = false;
    public bool $is_featured = false;
    public bool $is_hybrid = false;
    public string $status = 'disponible';

    // Lista de equipamiento (tags)
    public string $featureInput = '';
    public array $featuresList = [];

    // Galería de fotos (URLs o subidas)
    public string $newImageUrl = '';
    public array $uploadedImages = [];
    public array $existingImages = [];

    // ===== Plantilla Showcase 0 Km =====
    public ?float $monthly_fee_usd = null;
    public ?int $airbags = null;
    public string $video_url = '';
    public string $brochure_url = '';
    public $brochureFile = null;

    public array $specs = [];          // [grupo => [campo => valor]]
    public array $extraSpecs = [];     // [['label' => '', 'value' => '']]
    public array $safety = [];         // [clave del catálogo]
    public array $colors = [];         // [['name','hex','image']]
    public array $colorFiles = [];     // [índice => UploadedFile]
    public array $versions = [];       // [['name','engine','transmission','traction','price_usd','monthly_fee_usd','brochure_url','features_text']]
    public array $highlights = [];     // [['title','subtitle','text','image']]
    public array $highlightFiles = []; // [índice => UploadedFile]

    // ===== Hero & Editor HTML Libre 0 Km =====
    public array $heroBanners = [];         // [string path/url]
    public array $uploadedHeroBanners = []; // [UploadedFile]
    public string $newHeroBannerUrl = '';
    public string $custom_html = '';
    public array $htmlMedia = [];           // [['name' => '', 'path' => '']]
    public array $uploadedHtmlMedia = [];   // [UploadedFile]
    public string $newHtmlMediaUrl = '';

    public function mount(?string $condition = null)
    {
        if ($condition) {
            $this->forcedCondition = $condition;
        } elseif (request()->routeIs('admin.vehicles.0km')) {
            $this->forcedCondition = '0km';
        } elseif (request()->routeIs('admin.vehicles.usados')) {
            $this->forcedCondition = 'usado';
        } else {
            $this->forcedCondition = request()->query('condition', '0km');
        }

        $this->condition = $this->forcedCondition ?: '0km';
        if (request()->has('brand_id')) {
            $this->filterBrand = (string) request()->query('brand_id');
        }
    }

    protected function rules(): array
    {
        return [
            'condition' => 'required|in:0km,usado',
            'brand_id' => 'required|exists:brands,id',
            'vehicle_category_id' => 'nullable|exists:vehicle_categories,id',
            'branch_id' => 'nullable|exists:branches,id',
            'model' => 'required|min:2|max:100',
            'version' => 'nullable|max:100',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'price_usd' => 'nullable|numeric|min:0',
            'price_gs' => 'nullable|numeric|min:0',
            'mileage_km' => 'required|integer|min:0',
            'fuel_type' => 'required|string',
            'transmission' => 'required|string',
            'status' => 'required|in:disponible,reservado,vendido,oculto',
            'monthly_fee_usd' => 'nullable|numeric|min:0',
            'airbags' => 'nullable|integer|min:0|max:12',
            'video_url' => 'nullable|url|max:255',
            'brochure_url' => 'nullable|string|max:255',
            'brochureFile' => 'nullable|file|mimes:pdf|max:20480',
            'colors.*.name' => 'nullable|string|max:60',
            'colors.*.hex' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'colorFiles.*' => 'nullable|image|max:4096',
            'highlightFiles.*' => 'nullable|image|max:4096',
            'uploadedHeroBanners.*' => 'nullable|image|max:8192',
            'uploadedHtmlMedia.*' => 'nullable|image|max:8192',
            'versions.*.name' => 'nullable|string|max:100',
            'versions.*.price_usd' => 'nullable|numeric|min:0',
            'versions.*.monthly_fee_usd' => 'nullable|numeric|min:0',
        ];
    }

    protected function messages(): array
    {
        return [
            'brochureFile.mimes' => 'La ficha técnica debe ser un archivo PDF.',
            'brochureFile.max' => 'El PDF no puede superar los 20 MB.',
            'colors.*.hex.regex' => 'El color debe tener formato HEX (#RRGGBB).',
            'colorFiles.*.image' => 'El render de color debe ser una imagen.',
            'highlightFiles.*.image' => 'La imagen del bloque debe ser una imagen.',
            'video_url.url' => 'Ingresá un enlace válido de YouTube.',
        ];
    }

    /**
     * Estructura vacía de la ficha técnica según config/vehicle_template.php
     */
    protected function emptySpecs(): array
    {
        $specs = [];
        foreach (config('vehicle_template.spec_groups', []) as $groupKey => $group) {
            foreach (array_keys($group['fields']) as $fieldKey) {
                $specs[$groupKey][$fieldKey] = '';
            }
        }
        return $specs;
    }

    /**
     * Construye el payload de especificaciones técnicas para persistir en JSONB.
     */
    protected function buildSpecsPayload(): array
    {
        $payload = [];
        foreach ($this->specs as $groupKey => $fields) {
            $filtered = array_filter($fields, fn($val) => filled($val));
            if (!empty($filtered)) {
                $payload[$groupKey] = $filtered;
            }
        }

        $extra = [];
        foreach ($this->extraSpecs as $item) {
            if (!empty(trim($item['label'] ?? '')) && filled($item['value'] ?? null)) {
                $extra[trim($item['label'])] = trim($item['value']);
            }
        }
        if (!empty($extra)) {
            $payload['extra'] = $extra;
        }

        return $payload;
    }

    protected function resetInputFields(): void
    {
        $this->condition = $this->forcedCondition ?: '0km';
        $this->brand_id = !empty($this->filterBrand) ? (int) $this->filterBrand : Brand::first()?->id;
        $this->vehicle_category_id = VehicleCategory::first()?->id;
        $this->branch_id = Branch::first()?->id;
        $this->model = '';
        $this->version = '';
        $this->year = (int) date('Y');
        $this->price_usd = null;
        $this->price_gs = null;
        $this->show_price = true;
        $this->price_note = '';
        $this->mileage_km = ($this->forcedCondition === 'usado') ? 10000 : 0;
        $this->fuel_type = 'Nafta';
        $this->transmission = 'Automática';
        $this->traction = '4x2';
        $this->engine = '';
        $this->doors = 4;
        $this->color_exterior = '';
        $this->color_interior = '';
        $this->tagline = '';
        $this->description = '';
        $this->is_certified = ($this->forcedCondition === 'usado');
        $this->is_featured = false;
        $this->is_hybrid = false;
        $this->status = 'disponible';
        $this->featuresList = [];
        $this->featureInput = '';
        $this->newImageUrl = '';
        $this->uploadedImages = [];
        $this->existingImages = [];
        $this->monthly_fee_usd = null;
        $this->airbags = null;
        $this->video_url = '';
        $this->brochure_url = '';
        $this->brochureFile = null;
        $this->specs = $this->emptySpecs();
        $this->extraSpecs = [];
        $this->safety = [];
        $this->colors = [];
        $this->colorFiles = [];
        $this->versions = [];
        $this->highlights = [];
        $this->highlightFiles = [];
        $this->heroBanners = [];
        $this->uploadedHeroBanners = [];
        $this->newHeroBannerUrl = '';
        $this->custom_html = '';
        $this->htmlMedia = [];
        $this->uploadedHtmlMedia = [];
        $this->newHtmlMediaUrl = '';
        $this->editorModelScope = 'single';
        $this->targetModelIds = [];
        $this->resetValidation();
        $this->selectedId = null;
        $this->viewOnly = false;
    }

    public function create(): void
    {
        // Validación de rol: Vendedor no puede crear 0km, pero sí usados completamente
        if ($this->forcedCondition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('Los vendedores no pueden registrar vehículos 0 Km. Solo el catálogo de usados.', 'error');
            return;
        }

        $this->resetInputFields();
        $this->viewOnly = false;
        $this->isOpen = true;
    }

    public function edit(int $id)
    {
        $vehicle = Vehicle::with('images')->findOrFail($id);
        $this->resetInputFields();
        $this->selectedId = $vehicle->id;
        $this->editorModelScope = 'single';
        $this->targetModelIds = [$vehicle->id];

        $this->condition = $vehicle->condition;
        $this->brand_id = $vehicle->brand_id;
        $this->vehicle_category_id = $vehicle->vehicle_category_id;
        $this->branch_id = $vehicle->branch_id;
        $this->model = $vehicle->model;
        $this->version = $vehicle->version ?? '';
        $this->year = $vehicle->year;
        $this->price_usd = (float) $vehicle->price_usd;
        $this->price_gs = (float) $vehicle->price_gs;
        $this->show_price = (bool) $vehicle->show_price;
        $this->price_note = $vehicle->price_note ?? '';
        $this->mileage_km = $vehicle->mileage_km;
        $this->fuel_type = $vehicle->fuel_type;
        $this->transmission = $vehicle->transmission;
        $this->traction = $vehicle->traction ?? '4x2';
        $this->engine = $vehicle->engine ?? '';
        $this->doors = $vehicle->doors;
        $this->color_exterior = $vehicle->color_exterior ?? '';
        $this->color_interior = $vehicle->color_interior ?? '';
        $this->tagline = $vehicle->tagline ?? '';
        $this->description = $vehicle->description ?? '';
        $this->is_certified = (bool) $vehicle->is_certified;
        $this->is_featured = (bool) $vehicle->is_featured;
        $this->is_hybrid = (bool) $vehicle->is_hybrid;
        $this->status = $vehicle->status;
        $this->featuresList = $vehicle->features ?: [];

        // Plantilla Showcase 0 Km
        $this->monthly_fee_usd = $vehicle->monthly_fee_usd !== null ? (float) $vehicle->monthly_fee_usd : null;
        $this->airbags = $vehicle->airbags;
        $this->video_url = $vehicle->video_url ?? '';
        $this->brochure_url = $vehicle->brochure_url ?? '';
        $this->safety = $vehicle->safety ?: [];
        $this->colors = collect($vehicle->colors ?: [])->map(fn($c) => [
            'name' => $c['name'] ?? '',
            'hex' => $c['hex'] ?? '#FFFFFF',
            'image' => $c['image'] ?? '',
        ])->values()->all();
        $this->versions = collect($vehicle->versions ?: [])->map(fn($v) => [
            'name' => $v['name'] ?? '',
            'engine' => $v['engine'] ?? '',
            'transmission' => $v['transmission'] ?? '',
            'traction' => $v['traction'] ?? '',
            'price_usd' => $v['price_usd'] ?? null,
            'monthly_fee_usd' => $v['monthly_fee_usd'] ?? null,
            'brochure_url' => $v['brochure_url'] ?? '',
            'features_text' => implode("\n", $v['features'] ?? []),
        ])->values()->all();
        $this->highlights = collect($vehicle->highlights ?: [])->map(fn($h) => [
            'title' => $h['title'] ?? '',
            'subtitle' => $h['subtitle'] ?? '',
            'text' => $h['text'] ?? '',
            'image' => $h['image'] ?? '',
        ])->values()->all();

        $this->heroBanners = collect($vehicle->hero_banners ?: [])->map(function ($b) {
            return is_array($b) ? ($b['path'] ?? $b['image'] ?? '') : (string) $b;
        })->filter()->values()->all();

        $this->custom_html = $vehicle->custom_html ?? '';

        $this->htmlMedia = collect($vehicle->html_media ?: [])->map(function ($m) {
            if (is_array($m)) {
                return [
                    'name' => $m['name'] ?? basename($m['path'] ?? ''),
                    'path' => $m['path'] ?? '',
                ];
            }
            return [
                'name' => basename((string) $m),
                'path' => (string) $m,
            ];
        })->filter(fn($m) => !empty($m['path']))->values()->all();

        // Ficha técnica: grupos estándar + datos libres / heredados
        $storedSpecs = is_array($vehicle->specs) ? $vehicle->specs : [];
        $this->specs = $this->emptySpecs();
        foreach ($this->specs as $groupKey => $fields) {
            foreach (array_keys($fields) as $fieldKey) {
                $this->specs[$groupKey][$fieldKey] = (string) ($storedSpecs[$groupKey][$fieldKey] ?? '');
            }
        }
        $extra = is_array($storedSpecs['extra'] ?? null) ? $storedSpecs['extra'] : [];
        foreach ($storedSpecs as $key => $value) {
            if (!is_array($value) && !isset($this->specs[$key])) {
                $extra[$key] = $value;
            }
        }
        $this->extraSpecs = collect($extra)->map(fn($v, $k) => ['label' => (string) $k, 'value' => (string) $v])->values()->all();

        $this->existingImages = $vehicle->images->map(fn($img) => [
            'id' => $img->id,
            'image_path' => $img->image_path,
            'is_main' => (bool) $img->is_main,
        ])->toArray();

        // Si es 0km y el usuario es vendedor, abrir en modo lectura/ficha
        if ($vehicle->condition === '0km' && !Auth::user()?->canManageContent()) {
            $this->viewOnly = true;
        } else {
            $this->viewOnly = false;
        }

        $this->isOpen = true;
    }

    public function viewDetails(int $id)
    {
        $this->edit($id);
        $this->viewOnly = true;
    }

    public function addFeature()
    {
        if (!empty(trim($this->featureInput))) {
            $this->featuresList[] = trim($this->featureInput);
            $this->featureInput = '';
        }
    }

    public function removeFeature(int $index)
    {
        unset($this->featuresList[$index]);
        $this->featuresList = array_values($this->featuresList);
    }

    /**
     * Activa / desactiva un ítem del checklist de equipamiento rápido.
     */
    public function toggleFeature(string $label)
    {
        if (in_array($label, $this->featuresList, true)) {
            $this->featuresList = array_values(array_filter($this->featuresList, fn($f) => $f !== $label));
        } else {
            $this->featuresList[] = $label;
        }
    }

    // ----- Colores -----
    public function addColor()
    {
        $this->colors[] = ['name' => '', 'hex' => '#FFFFFF', 'image' => ''];
    }

    public function removeColor(int $index)
    {
        unset($this->colors[$index], $this->colorFiles[$index]);
        $this->colors = array_values($this->colors);
        $this->colorFiles = array_values($this->colorFiles);
    }

    // ----- Versiones -----
    public function addVersion()
    {
        $this->versions[] = [
            'name' => '',
            'engine' => $this->engine,
            'transmission' => $this->transmission,
            'traction' => $this->traction,
            'price_usd' => null,
            'monthly_fee_usd' => null,
            'brochure_url' => '',
            'features_text' => '',
        ];
    }

    public function duplicateVersion(int $index)
    {
        if (isset($this->versions[$index])) {
            $copy = $this->versions[$index];
            $copy['name'] = trim($copy['name'] . ' (copia)');
            array_splice($this->versions, $index + 1, 0, [$copy]);
        }
    }

    public function removeVersion(int $index)
    {
        unset($this->versions[$index]);
        $this->versions = array_values($this->versions);
    }

    // ----- Bloques de storytelling -----
    public function addHighlight()
    {
        $this->highlights[] = ['title' => '', 'subtitle' => '', 'text' => '', 'image' => ''];
    }

    public function removeHighlight(int $index)
    {
        unset($this->highlights[$index], $this->highlightFiles[$index]);
        $this->highlights = array_values($this->highlights);
        $this->highlightFiles = array_values($this->highlightFiles);
    }

    // ----- Datos técnicos libres -----
    public function addExtraSpec()
    {
        $this->extraSpecs[] = ['label' => '', 'value' => ''];
    }

    public function removeExtraSpec(int $index)
    {
        unset($this->extraSpecs[$index]);
        $this->extraSpecs = array_values($this->extraSpecs);
    }

    public function removeBrochure()
    {
        $this->brochure_url = '';
        $this->brochureFile = null;
    }

    /**
     * Aplica el preset de la marca seleccionada (config/vehicle_template.php).
     * Solo completa campos vacíos: nunca pisa datos cargados.
     */
    public function applyBrandPreset()
    {
        $brand = Brand::find($this->brand_id);
        $preset = $brand ? config('vehicle_template.brand_presets.' . $brand->slug) : null;

        if (!$preset) {
            $this->notify('La marca seleccionada todavía no tiene un preset configurado.', 'warning');
            return;
        }

        if (empty($this->colors) && !empty($preset['colors'])) {
            $this->colors = $preset['colors'];
        }
        $this->safety = array_values(array_unique(array_merge($this->safety, $preset['safety'] ?? [])));
        if (!$this->airbags && !empty($preset['airbags'])) {
            $this->airbags = $preset['airbags'];
        }
        foreach ($preset['features'] ?? [] as $feat) {
            if (!in_array($feat, $this->featuresList, true)) {
                $this->featuresList[] = $feat;
            }
        }
        foreach ($preset['specs'] ?? [] as $groupKey => $fields) {
            foreach ($fields as $fieldKey => $value) {
                if (isset($this->specs[$groupKey]) && blank($this->specs[$groupKey][$fieldKey] ?? '')) {
                    $this->specs[$groupKey][$fieldKey] = $value;
                }
            }
        }
        if (blank($this->price_note) && !empty($preset['price_note'])) {
            $this->price_note = $preset['price_note'];
        }

        $this->notify("Preset {$brand->name} aplicado: colores, seguridad, garantía y equipamiento base.");
    }

    /**
     * Duplica un vehículo existente como punto de partida (carga ágil de modelos similares).
     */
    public function duplicate(int $id)
    {
        $source = Vehicle::with('images')->findOrFail($id);

        if ($source->condition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('No tienes permisos para duplicar unidades 0 Km.', 'error');
            return;
        }

        $this->edit($id);
        $this->selectedId = null;
        $this->viewOnly = false;
        $this->version = trim($this->version . ' (copia)');
        $this->status = 'oculto';
        // Las fotos se re-vinculan como URLs/rutas nuevas al guardar
        $this->existingImages = collect($this->existingImages)->map(fn($img) => [
            'id' => null,
            'image_path' => $img['image_path'],
            'is_main' => $img['is_main'],
        ])->all();

        $this->notify('Copia lista para editar. Se guardará como "Oculto" hasta que la publiques.', 'info');
    }

    // ----- Hero Banners (0 Km) -----
    public function updatedUploadedHeroBanners()
    {
        foreach ($this->uploadedHeroBanners as $file) {
            $path = $file->store('vehicles/hero', 'public');
            $this->heroBanners[] = $path;
        }
        $this->uploadedHeroBanners = [];
        $this->notify('Imagen(es) del Hero cargadas correctamente.');
    }

    public function addHeroBannerUrl()
    {
        if (!empty(trim($this->newHeroBannerUrl))) {
            $this->heroBanners[] = trim($this->newHeroBannerUrl);
            $this->newHeroBannerUrl = '';
        }
    }

    public function removeHeroBanner(int $index)
    {
        unset($this->heroBanners[$index]);
        $this->heroBanners = array_values($this->heroBanners);
    }

    // ----- Biblioteca de Fotos para Diseño HTML (0 Km) -----
    public function updatedUploadedHtmlMedia()
    {
        foreach ($this->uploadedHtmlMedia as $file) {
            $originalName = $file->getClientOriginalName();
            $path = $file->store('vehicles/html-media', 'public');
            $this->htmlMedia[] = [
                'name' => $originalName,
                'path' => $path,
            ];
        }
        $this->uploadedHtmlMedia = [];
        $this->notify('Fotografías subidas a la biblioteca del vehículo. Ya podés insertarlas en el HTML.');
    }

    public function addHtmlMediaUrl()
    {
        $url = trim($this->newHtmlMediaUrl);
        if (!empty($url)) {
            $this->htmlMedia[] = [
                'name' => basename(parse_url($url, PHP_URL_PATH) ?: $url),
                'path' => $url,
            ];
            $this->newHtmlMediaUrl = '';
        }
    }

    public function removeHtmlMedia(int $index)
    {
        unset($this->htmlMedia[$index]);
        $this->htmlMedia = array_values($this->htmlMedia);
    }

    public function addImageUrl()
    {
        if (!empty(trim($this->newImageUrl))) {
            $this->existingImages[] = [
                'id' => null,
                'image_path' => trim($this->newImageUrl),
                'is_main' => empty($this->existingImages),
            ];
            $this->newImageUrl = '';
        }
    }

    public function setMainImage(int $index)
    {
        foreach ($this->existingImages as $i => &$img) {
            $img['is_main'] = ($i === $index);
        }
    }

    public function removeImage(int $index)
    {
        $img = $this->existingImages[$index] ?? null;
        if ($img && !empty($img['id'])) {
            VehicleImage::destroy($img['id']);
        }
        unset($this->existingImages[$index]);
        $this->existingImages = array_values($this->existingImages);
    }

    public function updatedPriceUsd($value)
    {
        if ($value && is_numeric($value)) {
            $rate = (float) Setting::get('usd_to_pyg_rate', '7850');
            $this->price_gs = round($value * $rate);
        }
    }

    public function save()
    {
        // Validación de permisos de rol:
        if ($this->condition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('Los vendedores no tienen permisos para modificar el catálogo 0 Km.', 'error');
            return;
        }

        if ($this->condition === '0km') {
            $this->year = $this->year ?: (int) date('Y');
            $this->mileage_km = 0;
            $this->fuel_type = $this->fuel_type ?: ($this->is_hybrid ? 'Híbrido' : 'Nafta');
            $this->transmission = $this->transmission ?: 'Automática';
            $this->show_price = false;
        }

        $this->validate();

        // Procesar posibles subidas pendientes de Hero o HTML Media
        if (!empty($this->uploadedHeroBanners)) {
            foreach ($this->uploadedHeroBanners as $file) {
                $this->heroBanners[] = $file->store('vehicles/hero', 'public');
            }
            $this->uploadedHeroBanners = [];
        }

        if (!empty($this->uploadedHtmlMedia)) {
            foreach ($this->uploadedHtmlMedia as $file) {
                $this->htmlMedia[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $file->store('vehicles/html-media', 'public'),
                ];
            }
            $this->uploadedHtmlMedia = [];
        }

        $data = [
            'condition' => $this->condition,
            'brand_id' => $this->brand_id,
            'vehicle_category_id' => $this->vehicle_category_id,
            'branch_id' => $this->branch_id,
            'model' => $this->model,
            'version' => $this->version,
            'year' => $this->year,
            'price_usd' => $this->price_usd,
            'price_gs' => $this->price_gs,
            'show_price' => $this->show_price,
            'price_note' => $this->price_note,
            'mileage_km' => $this->mileage_km,
            'fuel_type' => $this->fuel_type,
            'transmission' => $this->transmission,
            'traction' => $this->traction,
            'engine' => $this->engine,
            'doors' => $this->doors,
            'color_exterior' => $this->color_exterior,
            'color_interior' => $this->color_interior,
            'tagline' => $this->tagline,
            'description' => $this->description,
            'is_certified' => $this->is_certified,
            'is_featured' => $this->is_featured,
            'is_hybrid' => $this->is_hybrid,
            'status' => $this->status,
            'features' => $this->featuresList,
            'monthly_fee_usd' => $this->monthly_fee_usd ?: null,
            'airbags' => $this->airbags ?: null,
            'video_url' => $this->video_url ?: null,
            'safety' => array_values($this->safety),
            'specs' => $this->buildSpecsPayload(),
            'hero_banners' => array_values(array_filter($this->heroBanners)),
            'custom_html' => $this->custom_html ?: null,
            'html_media' => array_values($this->htmlMedia),
        ];

        // Ficha técnica PDF
        if ($this->brochureFile) {
            $this->brochure_url = $this->brochureFile->store('brochures', 'public');
            $this->brochureFile = null;
        }
        $data['brochure_url'] = $this->brochure_url ?: null;

        // Colores (con render subido o por URL)
        $data['colors'] = collect($this->colors)->map(function ($c, $i) {
            if (!empty($this->colorFiles[$i])) {
                $c['image'] = $this->colorFiles[$i]->store('vehicles/colors', 'public');
            }
            return [
                'name' => trim($c['name'] ?? ''),
                'hex' => strtoupper($c['hex'] ?? '#FFFFFF'),
                'image' => trim($c['image'] ?? ''),
            ];
        })->filter(fn($c) => $c['name'] !== '')->values()->all();

        // Versiones (equipamiento: una línea por ítem)
        $data['versions'] = collect($this->versions)->map(fn($v) => [
            'name' => trim($v['name'] ?? ''),
            'engine' => trim($v['engine'] ?? ''),
            'transmission' => trim($v['transmission'] ?? ''),
            'traction' => trim($v['traction'] ?? ''),
            'price_usd' => is_numeric($v['price_usd'] ?? null) ? (float) $v['price_usd'] : null,
            'monthly_fee_usd' => is_numeric($v['monthly_fee_usd'] ?? null) ? (float) $v['monthly_fee_usd'] : null,
            'brochure_url' => trim($v['brochure_url'] ?? ''),
            'features' => collect(preg_split('/\r\n|\r|\n/', (string) ($v['features_text'] ?? '')))
                ->map(fn($l) => trim(ltrim(trim($l), '•-*')))
                ->filter()->values()->all(),
        ])->filter(fn($v) => $v['name'] !== '')->values()->all();

        // Bloques de storytelling
        $data['highlights'] = collect($this->highlights)->map(function ($h, $i) {
            if (!empty($this->highlightFiles[$i])) {
                $h['image'] = $this->highlightFiles[$i]->store('vehicles/highlights', 'public');
            }
            return [
                'title' => trim($h['title'] ?? ''),
                'subtitle' => trim($h['subtitle'] ?? ''),
                'text' => trim($h['text'] ?? ''),
                'image' => trim($h['image'] ?? ''),
            ];
        })->filter(fn($h) => $h['title'] !== '' || $h['image'] !== '')->values()->all();

        if ($this->selectedId) {
            $vehicle = Vehicle::findOrFail($this->selectedId);
            $vehicle->update($data);
            $action = 'updated_vehicle';
            $msg = 'Vehículo actualizado con éxito.';
        } else {
            $vehicle = Vehicle::create($data);
            $action = 'created_vehicle';
            $msg = ($this->condition === '0km') 
                ? 'Vehículo 0 Km registrado en el catálogo oficial.' 
                : 'Vehículo usado registrado exitosamente.';
        }

        // Subida de fotos por archivo
        if (!empty($this->uploadedImages)) {
            foreach ($this->uploadedImages as $file) {
                $path = $file->store('vehicles', 'public');
                $vehicle->images()->create([
                    'image_path' => $path,
                    'is_main' => $vehicle->images()->count() === 0,
                ]);
            }
        }

        // Fotos por URL
        foreach ($this->existingImages as $idx => $img) {
            if (empty($img['id'])) {
                $vehicle->images()->create([
                    'image_path' => $img['image_path'],
                    'is_main' => !empty($img['is_main']),
                    'sort_order' => $idx + 1,
                ]);
            } else {
                VehicleImage::where('id', $img['id'])->update([
                    'is_main' => !empty($img['is_main']),
                    'sort_order' => $idx + 1,
                ]);
            }
        }

        // Si no tiene foto de portada para tarjetas y se cargó un Hero Banner, usar el primero
        if ($vehicle->images()->count() === 0 && !empty($this->heroBanners)) {
            $vehicle->images()->create([
                'image_path' => $this->heroBanners[0],
                'is_main' => true,
                'sort_order' => 1,
            ]);
        }

        // Si en el Editor 0 Km se seleccionaron varios o TODOS los modelos, aplicar diseño HTML
        if ($this->condition === '0km') {
            $otherIds = [];
            if ($this->editorModelScope === 'all') {
                $otherIds = Vehicle::where('condition', '0km')
                    ->where('id', '!=', $vehicle->id)
                    ->pluck('id')
                    ->all();
            } elseif ($this->editorModelScope === 'multiple' && !empty($this->targetModelIds)) {
                $otherIds = array_values(array_filter(
                    array_map('intval', $this->targetModelIds),
                    fn($id) => $id > 0 && $id !== (int) $vehicle->id
                ));
            }

            if (!empty($otherIds)) {
                $sharedPayload = [
                    'custom_html' => $data['custom_html'],
                    'html_media' => $data['html_media'],
                ];
                if (!empty($data['hero_banners'])) {
                    $sharedPayload['hero_banners'] = $data['hero_banners'];
                }
                Vehicle::whereIn('id', $otherIds)->update($sharedPayload);
                $msg = 'Diseño y cambios guardados en ' . (count($otherIds) + 1) . ' modelos 0 Km.';
            }
        }

        ActivityLog::log($action, "Gestión de {$vehicle->condition}: {$vehicle->full_name} (#{$vehicle->id}) por " . Auth::user()?->name, $vehicle);

        $this->closeModal();
        $this->notify($msg);
    }

    /**
     * Cambia el modelo activo en el Editor 0 Km o activa el modo "Todos los modelos".
     */
    public function switchEditorModel(string $value): void
    {
        if ($value === 'all') {
            $this->editorModelScope = 'all';
            $this->targetModelIds = Vehicle::where('condition', '0km')->pluck('id')->all();
            $this->notify('Modo activo: Aplicar diseño a TODOS los modelos 0 Km (' . count($this->targetModelIds) . ' modelos).', 'info');
            return;
        }

        if ($value === 'multiple') {
            $this->editorModelScope = 'multiple';
            if ($this->selectedId && !in_array($this->selectedId, $this->targetModelIds)) {
                $this->targetModelIds[] = $this->selectedId;
            }
            return;
        }

        if (is_numeric($value) && (int) $value > 0) {
            $this->edit((int) $value);
        }
    }

    public function selectAllZeroKmTargetModels(): void
    {
        $this->editorModelScope = 'all';
        $this->targetModelIds = Vehicle::where('condition', '0km')->pluck('id')->all();
    }

    public function selectSingleZeroKmTargetModel(): void
    {
        $this->editorModelScope = 'single';
        $this->targetModelIds = $this->selectedId ? [$this->selectedId] : [];
    }

    public function toggleTargetModel(int $id): void
    {
        $this->editorModelScope = 'multiple';
        if (in_array($id, $this->targetModelIds)) {
            $this->targetModelIds = array_values(array_filter($this->targetModelIds, fn($v) => (int) $v !== $id));
        } else {
            $this->targetModelIds[] = $id;
        }
    }

    public function updatedSelectAllModels($value): void
    {
        if ($value) {
            $query = Vehicle::query();
            if ($this->forcedCondition) {
                $query->where('condition', $this->forcedCondition);
            }
            if ($this->filterBrand) {
                $query->where('brand_id', $this->filterBrand);
            }
            if ($this->filterModel) {
                $query->where('id', (int) $this->filterModel);
            }
            $this->selectedModels = $query->pluck('id')->map(fn($id) => (string) $id)->all();
        } else {
            $this->selectedModels = [];
        }
    }

    public function bulkUpdateStatus(string $newStatus): void
    {
        if (empty($this->selectedModels)) {
            return;
        }
        if ($this->forcedCondition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('No tienes permisos para modificar modelos 0 Km.', 'error');
            return;
        }
        Vehicle::whereIn('id', $this->selectedModels)->update(['status' => $newStatus]);
        $count = count($this->selectedModels);
        $this->selectedModels = [];
        $this->selectAllModels = false;
        $this->notify("Se actualizó el estado a '" . ucfirst($newStatus) . "' en {$count} modelo(s).");
    }

    public function bulkDeleteSelected(): void
    {
        if (empty($this->selectedModels)) {
            return;
        }
        if ($this->forcedCondition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('No tienes permisos para eliminar modelos 0 Km.', 'error');
            return;
        }

        $ids = array_map('intval', $this->selectedModels);
        $count = count($ids);
        Vehicle::whereIn('id', $ids)->delete();

        ActivityLog::log('bulk_deleted_vehicles', "Eliminó en lote {$count} vehículo(s) (" . ($this->forcedCondition ?: 'catálogo') . ")");

        if ($this->selectedId && in_array((int) $this->selectedId, $ids, true)) {
            $this->closeModal();
        }

        $this->selectedModels = [];
        $this->selectAllModels = false;
        $this->notify("Se eliminaron {$count} modelo(s) seleccionado(s).", 'warning');
    }

    public function deleteTargetModels(): void
    {
        if ($this->forcedCondition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('No tienes permisos para eliminar modelos 0 Km.', 'error');
            return;
        }

        $ids = [];
        if ($this->editorModelScope === 'all') {
            $ids = Vehicle::where('condition', '0km')->pluck('id')->all();
        } elseif ($this->editorModelScope === 'multiple') {
            $ids = array_map('intval', $this->targetModelIds);
        } elseif ($this->selectedId) {
            $ids = [(int) $this->selectedId];
        }

        if (empty($ids)) {
            return;
        }

        $count = count($ids);
        Vehicle::whereIn('id', $ids)->delete();

        ActivityLog::log('bulk_deleted_vehicles', "Eliminó {$count} modelo(s) 0 Km desde el editor");

        $this->selectedModels = [];
        $this->selectAllModels = false;
        $this->closeModal();
        $this->notify("Se eliminaron {$count} modelo(s) 0 Km correctamente.", 'warning');
    }

    public function updateStatus(int $id, string $newStatus)
    {
        $vehicle = Vehicle::findOrFail($id);

        if ($vehicle->condition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('Los vendedores no pueden cambiar el estado de vehículos 0 Km.', 'error');
            return;
        }

        $oldStatus = $vehicle->status;
        $vehicle->update(['status' => $newStatus]);

        ActivityLog::log('status_change', "Cambió estado de {$vehicle->full_name} a '{$newStatus}'", $vehicle);
        $this->notify("Estado actualizado a " . ucfirst($newStatus));
    }

    public function delete(int $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        if ($vehicle->condition === '0km' && !Auth::user()?->canManageContent()) {
            $this->notify('No tienes permisos para eliminar unidades del catálogo 0 Km.', 'error');
            return;
        }

        $name = $vehicle->full_name;
        $condition = $vehicle->condition;
        $vehicle->delete();

        ActivityLog::log('deleted_vehicle', "Eliminó {$condition} {$name} (#{$id})");
        $this->notify("Vehículo '{$name}' eliminado del inventario.", 'warning');
    }

    public function render()
    {
        $brands = Brand::where('is_active', true)->orderBy('name')->get();
        $categories = VehicleCategory::where('is_active', true)->orderBy('name')->get();
        $branches = Branch::where('is_active', true)->orderBy('name')->get();

        $query = Vehicle::with(['brand', 'category', 'branch', 'images']);

        // Forzar condición según el módulo seleccionado (0km o usado)
        if ($this->forcedCondition) {
            $query->where('condition', $this->forcedCondition);
        }

        // Búsqueda
        if (!empty(trim($this->search))) {
            $searchTerm = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('model', 'LIKE', $searchTerm)
                  ->orWhere('version', 'LIKE', $searchTerm)
                  ->orWhereHas('brand', function ($b) use ($searchTerm) {
                      $b->where('name', 'LIKE', $searchTerm);
                  });
            });
        }

        if ($this->filterBrand) {
            $query->where('brand_id', $this->filterBrand);
        }

        if ($this->filterCategory) {
            $query->where('vehicle_category_id', $this->filterCategory);
        }

        if ($this->filterStatus) {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterModel) {
            $query->where('id', (int) $this->filterModel);
        }

        $vehicles = $query->latest()->paginate($this->perPage);

        // Contadores KPI específicos según el módulo
        $isZeroKm = ($this->forcedCondition === '0km');
        $kpiTotal = Vehicle::where('condition', $this->forcedCondition)->count();
        $kpiDisponibles = Vehicle::where('condition', $this->forcedCondition)->where('status', 'disponible')->count();
        $kpiReservados = Vehicle::where('condition', $this->forcedCondition)->where('status', 'reservado')->count();
        $kpiHybrids = Vehicle::where('condition', $this->forcedCondition)->where('is_hybrid', true)->count();
        $kpiLeads = Lead::whereHas('vehicle', fn($q) => $q->where('condition', $this->forcedCondition))->count();

        $featuredBrands = Brand::where('is_active', true)->where('is_featured_menu', true)->orderBy('sort_order')->get();
        $allZeroKmModels = Vehicle::with('brand')
            ->where('condition', '0km')
            ->when($this->filterBrand, fn($q) => $q->where('brand_id', $this->filterBrand))
            ->orderBy('model')
            ->get();

        return view('livewire.admin.vehicles-manager', compact(
            'vehicles',
            'brands',
            'featuredBrands',
            'allZeroKmModels',
            'categories',
            'branches',
            'isZeroKm',
            'kpiTotal',
            'kpiDisponibles',
            'kpiReservados',
            'kpiHybrids',
            'kpiLeads'
        ));
    }
}
