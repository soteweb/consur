<?php

namespace App\Livewire\Frontend;

use App\Models\Brand;
use App\Models\Lead;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CanamShowcase extends Component
{
    public string $activeCategory = 'all'; // 'all', 'ssv', 'atv'
    public ?string $selectedModelKey = null;

    // Formulario de Cotización / Test Drive
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $city = '';
    public string $vehicleInterest = 'Maverick X3 DS Turbo';
    public string $message = '';
    public bool $sentSuccess = false;

    protected $rules = [
        'name' => 'required|min:2|max:100',
        'phone' => 'required|min:6|max:25',
        'email' => 'nullable|email',
        'city' => 'nullable|string|max:100',
        'vehicleInterest' => 'required|string',
        'message' => 'nullable|string|max:1000',
    ];

    public function selectModel(?string $key): void
    {
        $this->selectedModelKey = $key;
        if ($key && isset($this->getModels()[$key])) {
            $this->vehicleInterest = $this->getModels()[$key]['name'];
        }
    }

    public function closeModal(): void
    {
        $this->selectedModelKey = null;
    }

    public function submitLead(): void
    {
        $this->validate();

        $brand = Brand::where('slug', 'can-am')->first();

        Lead::create([
            'brand_id' => $brand?->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email ?: null,
            'city' => $this->city ?: null,
            'vehicle_model' => $this->vehicleInterest,
            'type' => 'cotizacion',
            'status' => 'nuevo',
            'notes' => "Cotización solicitada desde landing Can-Am Consur S.A." . ($this->message ? "\n\nMensaje: " . $this->message : ""),
            'source' => 'web_canam',
        ]);

        $this->sentSuccess = true;
        $this->reset(['name', 'phone', 'email', 'city', 'message']);
    }

    public function getModels(): array
    {
        return [
            'maverick-ds' => [
                'name' => 'Maverick X3 DS Turbo',
                'category' => 'ssv',
                'category_label' => 'SSV Deportivo',
                'badge' => '135 HP • TURBO',
                'tagline' => 'Adrenalina pura, tracción Smart-Lok™ y suspensión SHOWA HPG para devorar cualquier terreno.',
                'image' => asset('images/canam/maverick-ds.png'),
                'pdf' => asset('fichas/canam/canam-maverick-x3-ds-turbo.pdf'),
                'color' => 'Scandi Blue & Orange Crush',
                'highlights' => [
                    'Motor Rotax® ACE Turbo 900 cc de 135 HP con intercooler',
                    'Diferencial delantero Smart-Lok™ con bloqueo 100%',
                    'Amortiguadores SHOWA HPG piggyback de 2.5 plg.',
                    'Dirección asistida dinámica (DPS™) de alto torque',
                    'Neumáticos XPS Trac Force de 30 plg. y rines de 14 plg.',
                    'Pantalla digital multifunción de 4.5 plg. con teclado',
                ],
                'specs' => [
                    'Motor' => 'Rotax® ACE de 900 cc turboalimentado tricilíndrico, 135 HP refrigerado por líquido',
                    'Alimentación' => 'Control de Aceleración Inteligente (iTC™) con Inyección Electrónica de Combustible (EFI)',
                    'Transmisión' => 'CVT con Sistema de Respuesta Rápida X (QRS-X) de alto flujo de aire, L / H / N / R / P',
                    'Tracción' => 'Diferencial delantero bloqueable con tecnología Smart-Lok™ (modos 2WD / 4WD con bloqueo)',
                    'Suspensión Delantera' => 'Doble brazo en A con barra estabilizadora / 45.7 cm (18 plg.) de recorrido',
                    'Suspensión Trasera' => 'Brazo oscilante torsional de 4 eslabones X (TTX) con barra estabilizadora / 45.7 cm de recorrido',
                    'Amortiguadores' => 'SHOWA HPG piggyback de 2.5 plg. con ajuste deportivo',
                    'Frenos' => 'Discos dobles delanteros de 244 mm con pinzas de 2 pistones / Discos traseros dobles',
                    'Neumáticos' => 'XPS Trac Force 30 x 10 x 14 plg. sobre llantas de aluminio fundido de 14 plg.',
                    'Capacidad Combustible' => '40 L (10.5 galones)',
                    'Chasis' => 'Acero 980 de doble fase ultra resistente con jaula de perfil completo',
                ],
            ],
            'maverick-rs' => [
                'name' => 'Maverick X3 RS Turbo',
                'category' => 'ssv',
                'category_label' => 'SSV Deportivo Ancho 72"',
                'badge' => '135 HP • 72" WIDE',
                'tagline' => 'Ancho colosal de 72 pulgadas para una estabilidad insuperable a altas velocidades.',
                'image' => asset('images/canam/maverick-rs.png'),
                'pdf' => asset('fichas/canam/canam-maverick-x3-rs-turbo.pdf'),
                'color' => 'Scandi Blue & Orange Crush',
                'highlights' => [
                    'Chasis ancho de 72 pulgadas (182.9 cm) para estabilidad extrema',
                    'Motor Rotax® ACE Turbo 900 cc y 135 HP',
                    'Diferencial delantero Smart-Lok™ con modos específicos',
                    'Amortiguadores de competición SHOWA HPG de 2.5 plg.',
                    'Magneto de alto rendimiento de 850 W',
                    'Sistema de monitoreo y protección de la correa CVT',
                ],
                'specs' => [
                    'Motor' => 'Rotax® ACE Turbo 900 cc de 135 HP, 3 cilindros en línea refrigerado por líquido',
                    'Ancho' => '72 plg. (182.9 cm) para el mayor balance dinámico en curvas y dunas',
                    'Transmisión' => 'CVT QRS-X de alto flujo de aire con sistema de protección de correa',
                    'Tren Motriz' => 'Smart-Lok™ con bloqueo de diferencial total y modos 2WD / 4WD',
                    'Suspensión Delantera' => 'Brazo en A doble troquelado con 50.8 cm (20 plg.) de recorrido',
                    'Suspensión Trasera' => 'TTX de 4 eslabones con 55.9 cm (22 plg.) de recorrido extremo',
                    'Dirección' => 'Asistida Dinámica (DPS™) de alto torque calibrada para 72"',
                    'Neumáticos' => 'XPS Trac Force 30 x 10 x 14 plg. con llantas de aluminio fundido de 14 plg.',
                    'Protección' => 'Protector de chasis integral de HMWPE, parachoques y gancho de remolque',
                    'Tanque' => '40 L (10.5 gal)',
                ],
            ],
            'defender-hd7-hd9' => [
                'name' => 'Defender HD7 / HD9',
                'category' => 'ssv',
                'category_label' => 'SSV Utilitario & Trabajo',
                'badge' => 'ROTAX HD • HASTA 680 KG CARGA',
                'tagline' => 'La máquina de trabajo más confiable y resistente para el campo, estancias y labores pesadas.',
                'image' => asset('images/canam/defender-hd7-hd9.png'),
                'pdf' => asset('fichas/canam/canam-defender-hd7-hd9.pdf'),
                'color' => 'Compass Green',
                'highlights' => [
                    'Motor Rotax® HD7 (52 HP) u HD9 (65 HP / 976 cc)',
                    'Capacidad de remolque de 1,134 kg (2,500 lb)',
                    'Caja de carga basculante para 454 kg (1,000 lb)',
                    'Tracción 2WD / 4WD con diferencial Visco-Lok† y modo césped Turf',
                    'Banco VERSA-PRO para 3 pasajeros con asientos abatibles',
                    'Suspensión independiente con amortiguadores de gas bitubo',
                ],
                'specs' => [
                    'Motor' => 'Rotax® HD7 (52 HP / 650 cc) / HD9 (65 HP / 976 cc V-Twin) refrigerado por líquido',
                    'Transmisión' => 'PRO-TORQ CVT con sistema de respuesta rápida (QRS), ventilación de alto flujo y freno de motor electrónico',
                    'Tracción' => 'Tracción 4WD con modo Turf (protege el pasto) / 2WD / 4WD con Visco-Lok†',
                    'Capacidad de Carga' => 'Caja de 454 kg con compuerta reforzada y elevación basculante',
                    'Capacidad de Remolque' => '1,134 kg (2,500 lb) con receptor de enganche de 2 plg.',
                    'Suspensión' => 'Delantera de doble brazo en A / Trasera TTA con 25.4 cm de recorrido',
                    'Neumáticos' => 'XPS de 27 plg. sobre llantas de acero reforzadas de 14 plg.',
                    'Asientos' => 'Banco VERSA-PRO de 3 plazas con compartimento estanco de 6 L y soporte central abatible',
                    'Tanque de Combustible' => '40 Litros (10.6 gal)',
                ],
            ],
            'defender-max-dps' => [
                'name' => 'Defender MAX DPS HD9',
                'category' => 'ssv',
                'category_label' => 'SSV Utilitario 6 Pasajeros',
                'badge' => '6 PLAZAS • DPS™',
                'tagline' => 'Transportá a toda la cuadrilla o a tu familia con el confort de la dirección asistida DPS.',
                'image' => asset('images/canam/defender-max-dps.png'),
                'pdf' => asset('fichas/canam/canam-defender-max-dps-hd9.pdf'),
                'color' => 'Fiery Red',
                'highlights' => [
                    'Capacidad para 6 pasajeros adultos con máxima comodidad',
                    'Dirección Asistida Dinámica (DPS™) con 3 modos de asistencia',
                    'Motor Rotax® HD9 bicilíndrico en V de 65 HP',
                    'Llantas de aluminio fundido de 14 plg. y neumáticos de 27 plg.',
                    'Capacidad de arrastre de 1,134 kg y carga total de 794 kg',
                    'Compartimentos modulares bajo los asientos de ambas filas',
                ],
                'specs' => [
                    'Motor' => 'Rotax® HD9 bicilíndrico en V de 976 cc y 65 HP con catalizador',
                    'Asientos' => 'Doble banco VERSA-PRO para 6 pasajeros con respaldos perfilados y apoyacabezas',
                    'Dirección' => 'Asistida Dinámica (DPS™) que reduce drásticamente el esfuerzo al volante',
                    'Transmisión' => 'PRO-TORQ CVT con marcha baja extra reducida para trabajo pesado',
                    'Tracción' => 'Modo Turf / 2WD / 4WD con diferencial delantero Visco-Lok† QE',
                    'Capacidad de Caja' => '454 kg con ranuras divisorias y compuerta con soporte de peso',
                    'Remolque' => '1,134 kg (2,500 lb)',
                    'Llantas' => 'Aluminio fundido mecanizado de 14 plg.',
                    'Tanque' => '40 Litros',
                ],
            ],
            'defender-max-xt' => [
                'name' => 'Defender MAX XT',
                'category' => 'ssv',
                'category_label' => 'SSV Utilitario 6 Plazas XT',
                'badge' => 'PAQUETE XT • WINCH 4,500 LB',
                'tagline' => 'El buque insignia utilitario: cabrestante de 4,500 lb, techo rígido y defensa delantera XT de serie.',
                'image' => asset('images/canam/defender-max-xt.png'),
                'pdf' => asset('fichas/canam/canam-defender-max-xt.pdf'),
                'color' => 'Dusty Navy',
                'highlights' => [
                    'Cabrestante Can-Am de 2,014 kg (4,500 lb) con cable sintético / acero',
                    'Techo rígido completo de fábrica y parachoques XT frontal reforzado',
                    'Asientos VERSA-PRO tapizados en material XT resistente con ajuste longitudinal',
                    'Brazos en A dobles arqueados de alto despeje (33 cm distancia al suelo)',
                    'Neumáticos XPS Trail King de 27 plg. sobre llantas de aluminio de 14 plg.',
                    'Protector integral de chasis de alta densidad HMWPE',
                ],
                'specs' => [
                    'Motor' => 'Rotax® HD10 de 976 cc y 82 HP / 69 lb-pie de torque V-Twin',
                    'Equipamiento XT' => 'Cabrestante 4,500 lb, techo rígido integral, paragolpes XT y placa protectora HMWPE',
                    'Despeje al Suelo' => '33 cm (13 plg.) con suspensión de brazos en A arqueados',
                    'Capacidad' => '6 adultos en asientos con tapizado premium XT resistente a rasgaduras',
                    'Freno' => 'Mecanismo de freno de mano y retención integrado',
                    'Transmisión' => 'PRO-TORQ CVT QRS con protección electrónica de correa',
                    'Iluminación' => 'Faros delanteros de 140 W e iluminación trasera LED signature',
                    'Capacidad Remolque' => '1,134 kg (2,500 lb)',
                ],
            ],
            'outlander-pro' => [
                'name' => '2026 Outlander PRO (HD5 / HD7)',
                'category' => 'atv',
                'category_label' => 'Cuadriciclo (ATV) Utilitario',
                'badge' => 'NUEVO CHASIS • CALIBRACIÓN TRABAJO',
                'tagline' => 'El cuadriciclo de trabajo más moderno y resistente: chasis renovado, limitador de velocidad y tracción implacable.',
                'image' => asset('images/canam/outlander-pro.png'),
                'pdf' => asset('fichas/canam/canam-outlander-pro-hd5-hd7.pdf'),
                'color' => 'Desert Tan',
                'highlights' => [
                    'Motor Rotax® ACE HD5 (40 HP) u HD7 (50 HP) calibrado para torque',
                    'Transmisión pDrive CVT con marcha de trabajo ultracorta',
                    'Limitador de velocidad de trabajo para tareas agrícolas y fumigación',
                    'Defensas delantera y trasera reforzadas y placa de protección integral',
                    'Neumáticos de 26 plg. con clasificación de 6 capas reforzadas',
                    'Compartimento frontal sellado con puerto USB integrado',
                ],
                'specs' => [
                    'Motor' => 'Rotax® ACE monocilíndrico de 650 cc (HD7: 50 HP / HD5: 40 HP) refrigerado por líquido',
                    'Transmisión' => 'CVT primaria pDrive con calibración específica para trabajo pesado y freno de motor iEB',
                    'Tracción' => 'Tracción 2WD / 4WD seleccionable con diferencial delantero autoblocante Visco-Lok†',
                    'Capacidad de Portabultos' => 'Delantero: 54.4 kg / Trasero: 109 kg con anclajes LinQ® integrados',
                    'Capacidad de Remolque' => '830 kg (1,830 lb)',
                    'Despeje' => '30.5 cm (12 plg.) de distancia libre al suelo',
                    'Tanque de Combustible' => '19.5 Litros (5.1 gal)',
                    'Instrumentación' => 'Pantalla digital de 4.5 plg. con velocidad, horómetro, odómetro y modos de velocidad',
                ],
            ],
            'outlander-max' => [
                'name' => 'Outlander MAX XT 700',
                'category' => 'atv',
                'category_label' => 'Cuadriciclo (ATV) Biplaza Touring',
                'badge' => 'BIPLAZA • WINCH 3,500 LB',
                'tagline' => 'El equilibrio perfecto entre comodidad biplaza para dos ocupantes, potencia Rotax y equipamiento XT.',
                'image' => asset('images/canam/outlander-max.png'),
                'pdf' => asset('fichas/canam/canam-outlander-max-xt-700.pdf'),
                'color' => 'Platinum Satin',
                'highlights' => [
                    'Sistema convertible MAX para dos personas con asiento y respaldo ergonómico',
                    'Cabrestante Can-Am de 1,588 kg (3,500 lb) instalado de serie',
                    'Dirección Asistida Dinámica Tri-Modo (DPS™)',
                    'Freno de Motor Inteligente (iEB™) con 3 niveles seleccionables',
                    'Neumáticos XPS Trail Force de 26 plg. y rines de aluminio de 14 plg.',
                    'Guantera con soporte magnético para celular y cargador USB',
                ],
                'specs' => [
                    'Motor' => 'Rotax® ACE 700 monocilíndrico de 650 cc y 50 HP con inyección electrónica EFI',
                    'Configuración' => 'Biplaza MAX con respaldo, apoyabrazos y apoyapiés exclusivos para el pasajero',
                    'Cabrestante' => 'Winch de 3,500 lb (1,588 kg) con mando en el manillar',
                    'Dirección' => 'DPS™ Tri-Modo (Mínima, Media, Máxima asistencia seleccionable)',
                    'Diferencial' => 'Diferencial delantero Visco-Lok† QE con acoplamiento ultra rápido',
                    'Parachoques' => 'Defensas delanteras y traseras de alta resistencia XT y cubrecárter integral',
                    'Capacidad de Carga' => 'Parrilla delantera 54.4 kg / Parrilla trasera 109 kg',
                    'Capacidad de Remolque' => '830 kg (1,830 lb)',
                ],
            ],
            'outlander-mxt' => [
                'name' => 'Outlander MAX XT-P 1000R con Smart-Shox',
                'category' => 'atv',
                'category_label' => 'Cuadriciclo (ATV) Flagship Alta Gama',
                'badge' => '101 HP • SMART-SHOX • FOX QS3',
                'tagline' => 'El cuadriciclo biplaza más potente del planeta: 101 HP V-Twin, suspensión activa Smart-Shox y pantalla táctil de 10.25".',
                'image' => asset('images/canam/outlander-mxt.png'),
                'pdf' => asset('fichas/canam/canam-outlander-max-xt-p-1000r.pdf'),
                'color' => 'Mineral Grey & Orange Crush',
                'highlights' => [
                    'Motor Rotax® 1000R V-Twin de 101 HP (el más potente del mercado)',
                    'Suspensión semi-activa FOX† 1.5 PODIUM QS3 con tecnología Smart-Shox',
                    'Diferencial delantero Visco-4Lok† con bloqueo total 100% manual',
                    'Pantalla táctil de 10.25 plg. con navegación y BRP GO!®',
                    'Rines de aluminio de 14 plg. con aros Beadlock retenedores de talón',
                    'Neumáticos XPS Trail King 2 de 27 plg. y frenos hidráulicos de 4 discos',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 1000R V-Twin de 976 cc y 101 HP, 8 válvulas refrigerado por líquido',
                    'Suspensión Activa' => 'Smart-Shox con amortiguadores FOX† 1.5 PODIUM QS3 con ajuste electrónico continuo',
                    'Pantalla' => 'Táctil a color de 10.25 plg. con integración para mapas, audio y diagnósticos',
                    'Diferencial' => 'Visco-4Lok con botón de bloqueo manual 100% para trepadas extremas',
                    'Llantas / Neumáticos' => 'Llantas de aluminio fundido de 14 plg. con aros beadlock y neumáticos XPS Trail King 2 de 27"',
                    'Cabrestante' => 'Winch de 1,588 kg (3,500 lb) de serie',
                    'Modos de Conducción' => 'Modos Sport, Normal y Trabajo + Freno de motor inteligente iEB',
                    'Iluminación' => 'Faros Full LED de ultra alto alcance con firma Can-Am',
                ],
            ],
        ];
    }

    public function render()
    {
        $allModels = $this->getModels();
        $filteredModels = $this->activeCategory === 'all'
            ? $allModels
            : array_filter($allModels, fn ($m) => $m['category'] === $this->activeCategory);

        return view('livewire.frontend.canam-showcase', [
            'models' => $filteredModels,
            'whatsappNumber' => Setting::get('contact_whatsapp', '595985204106'),
        ])->layoutData([
            'title' => 'Can-Am Paraguay | Modelos Oficiales SSV y ATV en Consur S.A.',
            'description' => 'Descubrí la gama completa de Side-by-Side (Maverick X3, Defender) y Cuadriciclos ATV (Outlander) en Consur S.A. Concesionario oficial Can-Am en Encarnación e Itapúa.',
        ]);
    }
}

