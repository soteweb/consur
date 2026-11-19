<?php

namespace App\Livewire\Frontend;

use App\Models\Brand;
use App\Models\Lead;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class BrandShowcase extends Component
{
    public Brand $brand;
    public string $selectedCategory = 'all';

    // Formulario de Cotización Rápida
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $city = '';
    public string $vehicleInterest = '';
    public string $message = '';
    public bool $sentSuccess = false;

    protected $rules = [
        'name' => 'required|min:3|max:100',
        'phone' => 'required|min:6|max:25',
        'email' => 'nullable|email',
        'city' => 'nullable|string',
        'vehicleInterest' => 'nullable|string',
        'message' => 'nullable|string|max:1000',
    ];

    public function mount(string $slug)
    {
        // Si es Toyota, redirige directamente a la vitrina oficial de 0KM en Home
        if ($slug === 'toyota') {
            return redirect()->to(url('/#destacados-0km'));
        }

        if ($slug === 'seguros') {
            return redirect()->route('seguros');
        }

        $this->brand = Brand::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        if (!empty($this->brand->custom_url)) {
            return redirect()->to($this->brand->custom_url);
        }

        $this->vehicleInterest = $this->brand->name;
    }

    public function selectCategory(string $categorySlug)
    {
        $this->selectedCategory = $categorySlug;
    }

    public function submitQuotation()
    {
        $this->validate();

        $interest = $this->vehicleInterest ?: $this->brand->name;
        $fullMessage = "Solicitud desde vitrina oficial {$this->brand->name}. Interés: {$interest}. Mensaje: " . ($this->message ?: 'Solicitud de cotización y asesoramiento.');

        Lead::create([
            'type' => 'cotizacion',
            'full_name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'message' => $fullMessage,
            'status' => 'nuevo',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset(['name', 'phone', 'email', 'city', 'message']);
        $this->vehicleInterest = $this->brand->name;
        $this->sentSuccess = true;

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => "¡Gracias por contactar a {$this->brand->name}! Un asesor oficial de Consur S.A. se comunicará contigo a la brevedad.",
        ]);
    }

    public function render()
    {
        $vehiclesQuery = Vehicle::with(['brand', 'category', 'images'])
            ->where('brand_id', $this->brand->id)
            ->where('status', 'disponible');

        if ($this->selectedCategory !== 'all') {
            $vehiclesQuery->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        $vehicles = $vehiclesQuery->orderBy('sort_order', 'asc')->get();

        // Categorías representadas en los vehículos de esta marca
        $categoryIds = Vehicle::where('brand_id', $this->brand->id)
            ->where('status', 'disponible')
            ->pluck('vehicle_category_id')
            ->unique()
            ->filter();

        $categories = VehicleCategory::whereIn('id', $categoryIds)
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Modelos de referencia por marca cuando aún no hay vehículos cargados en base de datos
        $fallbackShowcase = $this->getFallbackShowcase();

        return view('livewire.frontend.brand-showcase', [
            'vehicles' => $vehicles,
            'categories' => $categories,
            'fallbackShowcase' => $fallbackShowcase,
        ])->layoutData([
            'title' => "{$this->brand->name} | Concesionaria Oficial Consur S.A.",
            'description' => $this->brand->tagline ?: "Descubrí la línea completa de {$this->brand->name} en Consur S.A. Modelos 0 Km, cotizaciones online y garantía oficial.",
        ]);
    }

    /**
     * Catálogo referencial de modelos/servicios de alta gama para cada marca oficial
     * de Consur S.A. mientras se cargan vehículos desde el dashboard.
     */
    protected function getFallbackShowcase(): array
    {
        $slug = $this->brand->slug;

        return match ($slug) {
            'omoda-jaecoo' => [
                [
                    'name' => 'JAECOO J7',
                    'tagline' => 'Lujo y Aventura en Perfecto Equilibrio',
                    'category' => 'SUV Híbrido Enchufable (PHEV)',
                    'image' => '/images/omoda-jaecoo/j7-hero.jpg',
                    'badge' => '288 HP &bull; PHEV',
                    'features' => ['Potencia combinada 288,32 HP', 'Pantalla vertical 14.8" HD', 'Audio Sony® 8 parlantes', 'Cámaras 540° chasis transparente'],
                ],
                [
                    'name' => 'JAECOO J5',
                    'tagline' => 'Híbrido sin Enchufe. Libertad Total.',
                    'category' => 'SUV Híbrido Autorecargable (SHEV)',
                    'image' => '/images/omoda-jaecoo/j5-hero.jpg',
                    'badge' => 'SHEV &bull; SIN ENCHUFE',
                    'features' => ['Motor 1.5 TGDI + eléctrico 150 kW', 'Potencia combinada 165 kW', 'Pantalla táctil 13.2"', 'Suspensión trasera Multilink'],
                ],
            ],
            'hino' => [
                [
                    'name' => 'HINO Serie 200',
                    'tagline' => 'El Camión Ligero Urbano de Alta Eficiencia',
                    'category' => 'Camiones Ligeros (2.2 Toneladas)',
                    'image' => '/images/hino/hino200.jpg',
                    'badge' => 'GRUPO TOYOTA',
                    'features' => ['Modelo 410 de 2.200 Kg', 'Eje simple (4.300 Kg trasero)', 'Bajas emisiones y bajo consumo', 'Ideal espacios reducidos y fletes'],
                ],
                [
                    'name' => 'HINO Serie 300',
                    'tagline' => 'Versatilidad, Seguridad y Máxima Eficiencia',
                    'category' => 'Camiones Livianos y Medianos (2.5T a 6T)',
                    'image' => '/images/hino/hino300-814.jpg',
                    'badge' => 'TOTAL SUPPORT',
                    'features' => ['Modelos 512, 711 y 814', 'Carga de 2.500 Kg a 6.000 Kg', 'Cabina ergonómica y preventiva', 'Chasis japonés reforzado'],
                ],
                [
                    'name' => 'HINO Serie 500',
                    'tagline' => 'Capacidad Mediana y Semipesada para Faenas Exigentes',
                    'category' => 'Camiones Medianos (8.5 Toneladas)',
                    'image' => '/images/hino/hino500-1018.jpg',
                    'badge' => 'ALTO RENDIMIENTO',
                    'features' => ['Modelo 1018 de 8.500 Kg', 'Eje dual reforzado', 'Gran torque y autonomía en ruta', 'Bajo costo operativo por km'],
                ],
            ],
            'sea-doo' => [
                [
                    'name' => 'Sea-Doo Spark',
                    'tagline' => 'Diversión Pura, Ágil y Económica',
                    'category' => 'Recreación Acuática',
                    'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'LINEA OFICIAL',
                    'features' => ['Motor Rotax 900 ACE', 'Casco Polytec ligero y resistente', 'Sistema de frenado y reversa iBR', 'Capacidad 2-3 personas'],
                ],
                [
                    'name' => 'Sea-Doo GTX Limited',
                    'tagline' => 'El Estándar de Oro en Lujo y Rendimiento',
                    'category' => 'Turismo de Alta Gama',
                    'image' => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'TOP DE GAMA',
                    'features' => ['Motor Rotax 300 HP Turbo', 'Pantalla panorámica a color de 7.8"', 'Sistema de audio Bluetooth BRP', 'Asiento Ergolock escalonado'],
                ],
                [
                    'name' => 'Sea-Doo FishPro Trophy',
                    'tagline' => 'La Moto Acuática de Pesca Deportiva Definitiva',
                    'category' => 'Pesca y Aventura',
                    'image' => 'https://images.unsplash.com/photo-1544551763-77ef2d0cfc6c?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'PESCA DEPORTIVA',
                    'features' => ['Sonda Garmin táctil 7"', 'Nevera LinQ con vivero', 'Asiento giratorio de pesca', 'Batería dual con alternador'],
                ],
            ],
            'can-am' => [
                [
                    'name' => 'Can-Am Maverick R',
                    'tagline' => 'La Máquina Off-Road Más Poderosa del Planeta',
                    'category' => 'Side-by-Side (SxS) Deportivo',
                    'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=800&q=80',
                    'badge' => '240 HP TURBO',
                    'features' => ['Motor Rotax 999T 240 HP', 'Transmisión de doble embrague DCT 7 vel.', 'Suspensión Smart-Shox Fox', 'Pantalla táctil 10.25"'],
                ],
                [
                    'name' => 'Can-Am Defender HD10',
                    'tagline' => 'Trabajo Pesado y Máxima Productividad Rural',
                    'category' => 'SxS Utilitario',
                    'image' => 'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'TRABAJO RURAL',
                    'features' => ['Capacidad de remolque 1.134 kg', 'Caja de carga basculante', 'Motor Rotax V-Twin 82 HP', 'Tracción Pro-Torq con Turf Mode'],
                ],
                [
                    'name' => 'Can-Am Outlander Max XT-P',
                    'tagline' => 'El ATV Biplaza Más Confortable y Capaz',
                    'category' => 'Cuadriciclo / ATV Premium',
                    'image' => 'https://images.unsplash.com/photo-1520340356584-f9917d1eea6f?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'TODO TERRENO',
                    'features' => ['Dirección asistida dinámica DPS', 'Cabrestante Warn de 3.500 lb', 'Amortiguadores Fox 1.5 Podium QS3', 'Defensas reforzadas delantera y trasera'],
                ],
            ],
            'consur-bike' => [
                [
                    'name' => 'Mountain Bike Profesional',
                    'tagline' => 'Rendimiento Superior en Senderos y Desafíos',
                    'category' => 'MTB Cross-Country',
                    'image' => 'https://images.unsplash.com/photo-1485965120184-e220f721d03e?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'ALTA GAMA',
                    'features' => ['Cuadro de carbono ultraliviano', 'Transmisión 1x12 Shimano Deore / XT', 'Horquilla de aire con bloqueo remoto', 'Frenos a disco hidráulicos'],
                ],
                [
                    'name' => 'E-Bike (Bicicleta Eléctrica)',
                    'tagline' => 'Movilidad Sustentable con Asistencia al Pedaleo',
                    'category' => 'Movilidad Urbana & Aventura',
                    'image' => 'https://images.unsplash.com/photo-1571068316344-75bc76f77890?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'ELECTROMOVILIDAD',
                    'features' => ['Motor central asistido de alto torque', 'Batería integrada de larga autonomía (hasta 90 km)', 'Display digital con velocímetro y modos de potencia', 'Luces LED conectadas a batería central'],
                ],
                [
                    'name' => 'Bicicletas de Ruta / Gravel',
                    'tagline' => 'Velocidad, Resistencia y Versatilidad de Terreno',
                    'category' => 'Ruta y Grava',
                    'image' => 'https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?auto=format&fit=crop&w=800&q=80',
                    'badge' => 'VELOCIDAD Y RESISTENCIA',
                    'features' => ['Geometría aerodinámica y confortable', 'Ruedas tubeless ready con cubiertas de gran agarre', 'Frenos de disco flat mount', 'Compatibilidad con bikepacking y accesorios'],
                ],
            ],
            default => [],
        };
    }
}
