<?php

namespace App\Livewire\Frontend;

use App\Models\Brand;
use App\Models\Lead;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class SeadooShowcase extends Component
{
    public string $activeCategory = 'all';
    public ?string $selectedModelKey = null;

    // Formulario de Cotización
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $city = '';
    public string $vehicleInterest = 'Spark Trixx';
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

        $brand = Brand::where('slug', 'sea-doo')->first();

        Lead::create([
            'brand_id' => $brand?->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email ?: null,
            'city' => $this->city ?: null,
            'vehicle_model' => $this->vehicleInterest,
            'type' => 'cotizacion',
            'status' => 'nuevo',
            'notes' => "Cotización solicitada desde landing Sea-Doo Consur S.A." . ($this->message ? "\n\nMensaje: " . $this->message : ""),
            'source' => 'web_seadoo',
        ]);

        $this->sentSuccess = true;
        $this->reset(['name', 'phone', 'email', 'city', 'message']);
    }

    public function getModels(): array
    {
        return [
            'spark-trixx' => [
                'name' => 'Spark Trixx',
                'category' => 'rec-lite',
                'category_label' => 'Recreativo Ligero / Piruetas',
                'badge' => 'ROTAX 900 ACE • VTS EXTENDIDO',
                'tagline' => 'Ideal para hacer piruetas, saltos y trucos en el agua. Diversión accesible y ultra ágil.',
                'image' => asset('images/seadoo/seadoo-spark-trixx.png'),
                'pdf' => asset('fichas/seadoo/seadoo-spark-trixx.pdf'),
                'color' => 'Gulfstream Blue y Orange Crush',
                'highlights' => [
                    'Motor Rotax® 900 ACE™ de 90 HP ágil y de bajísimo consumo',
                    'Sistema VTS™ de trim variable extendido para piruetas',
                    'Apoyapiés con cuñas traseras ergonómicas para equilibrio',
                    'Manillar con columna de dirección de altura regulable',
                    'Casco liviano y resistente Polytec™ fácil de transportar',
                    'Freno y Marcha Atrás Inteligente iBR® exclusivo',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 900 ACE™ de 899 cc y 90 HP de 3 cilindros refrigerado por circuito cerrado (CLCS)',
                    'Casco' => 'Polytec™ Spark ligero, reciclable y de alta resistencia a impactos',
                    'Sistema Trim' => 'VTS™ de rango extendido exclusivo para elevar la proa con facilidad',
                    'Manillar' => 'Ajustable en altura para conducción sentado o de pie con soporte central',
                    'Capacidad Pasajeros' => '1 a 2 personas (opción 3up disponible)',
                    'Frenado y Reversa' => 'iBR® (Freno y Marcha Atrás Inteligente) para atraque seguro',
                    'Tanque de Combustible' => '30 Litros (7.9 gal)',
                    'Peso en Seco' => '194 kg – Extremadamente liviana para remolcar con cualquier vehículo',
                ],
            ],
            'gti-130' => [
                'name' => 'GTI 130',
                'category' => 'recreacion',
                'category_label' => 'Recreación Familiar & Paseo',
                'badge' => '130 HP • CASCO GTI POLYTEX GEN II',
                'tagline' => 'Estilo, estabilidad insuperable y diversión garantizada para toda la familia.',
                'image' => asset('images/seadoo/seadoo-gti-130.png'),
                'pdf' => asset('fichas/seadoo/seadoo-gti-130.pdf'),
                'color' => 'Bright White y Neo Mint',
                'highlights' => [
                    'Motor Rotax® 1630 ACE™ de 130 HP de aspiración natural',
                    'Casco GTI™ de estabilidad predecible y suave navegación',
                    'Plataforma trasera amplia con puntos de anclaje LinQ®',
                    'Guantera estanca para smartphone con almohadilla de protección',
                    'Gran capacidad de almacenamiento delantero de 152 litros',
                    'Sistema iBR® y llave codificada de seguridad RF D.E.S.S.™',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 1630 ACE™ de 1,630 cc tricilíndrico de 130 HP de funcionamiento sereno',
                    'Casco' => 'Polytec™ Gen II con refuerzo de fibra de vidrio para mayor rigidez',
                    'Plataforma de Baño' => 'Grande y plana con sistema de sujeción LinQ® para accesorios',
                    'Capacidad de Carga' => 'Almacenamiento total de 160.8 Litros (incluye maletero frontal de 152 L)',
                    'Pasajeros' => '3 plazas con asiento biplaza de diseño cómodo y asideros',
                    'Modos de Conducción' => 'Modo ECO® y Modo Sport para ajustar la entrega de potencia',
                    'Tanque de Combustible' => '60 Litros (15.9 gal) para largas jornadas en el agua',
                    'Freno' => 'iBR® electrónico de tercera generación con retroceso rápido',
                ],
            ],
            'wake-170' => [
                'name' => 'Wake 170',
                'category' => 'arrastre',
                'category_label' => 'Deportes Náuticos / Wakeboard',
                'badge' => '170 HP • MODO SKI • MÁSTIL RETRÁCTIL',
                'tagline' => 'Hecha para aprovechar al máximo cada ola. Mástil de esquí LinQ, portatablas y modo Ski incluidos.',
                'image' => asset('images/seadoo/seadoo-wake-170.png'),
                'pdf' => asset('fichas/seadoo/seadoo-wake-170.pdf'),
                'color' => 'Sand y Dazzling Blue',
                'highlights' => [
                    'Motor Rotax® 1630 ACE™ de 170 HP de respuesta inmediata',
                    'Modo Ski exclusivo con curvas de aceleración programadas para wake',
                    'Mástil de esquí retráctil LinQ® con asideros para el observador',
                    'Portatabla de wakeboard extraíble de fácil acceso lateral',
                    'Escalera de reembarque de aguas profundas plegable',
                    'Asiento Ergolock™ para 3 personas con sujeción lateral',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 1630 ACE™ de 170 HP atmosférico con inyección de alta eficiencia',
                    'Equipamiento Wake' => 'Mástil LinQ retráctil, soporte para tabla de wakeboard, modo de aceleración Ski y escalera de baño',
                    'Modo Ski' => 'Control de crucero específico para tiradas consistentes a velocidad fija',
                    'Casco' => 'GTI™ en V moderada para maniobrabilidad ágil y despegue de estela limpia',
                    'Capacidad' => '3 plazas (272 kg)',
                    'Capacidad de Carga' => '160.8 Litros totales con compartimento estanco para teléfono',
                    'Tanque' => '60 Litros (15.9 gal)',
                ],
            ],
            'wake-pro-230' => [
                'name' => 'Wake Pro 230',
                'category' => 'arrastre',
                'category_label' => 'Deportes Náuticos & Touring Pro',
                'badge' => '230 HP SUPERCHARGED • AUDIO BRP 100W',
                'tagline' => 'Estabilidad, potencia sobrealimentada de 230 HP y música de 100W para deslizarse con estilo supremo.',
                'image' => asset('images/seadoo/seadoo-wake-pro-230.png'),
                'pdf' => asset('fichas/seadoo/seadoo-wake-pro-230.pdf'),
                'color' => 'Sand y Dazzling Blue',
                'highlights' => [
                    'Motor Rotax® 1630 ACE™ Supercharged de 230 HP con intercooler',
                    'Sistema de Audio BRP Premium de 100W impermeable con Bluetooth',
                    'Casco ST3™ en V profunda de máxima estabilidad en agua picada',
                    'Maletero delantero de acceso directo levantando el manillar',
                    'Paquete Wake Pro completo: mástil retráctil LinQ, soporte y modo Ski',
                    'Pantalla digital de 7.6 plg. con teclado retroiluminado',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 1630 ACE™ Supercharged de 230 HP refrigerado por líquido (CLCS)',
                    'Casco' => 'ST3 Hull™ de fibra de vidrio para estabilidad líder de la industria y corte de olas',
                    'Audio' => 'Sistema BRP Audio-Premium de 100 vatios resistente al agua marina y Bluetooth',
                    'Almacenamiento Frontal' => 'Acceso directo de 96 L sin moverse del asiento + guantera de 2.9 L',
                    'Capacidad' => '3 pasajeros en asiento Ergolock™ escalonado de 2 piezas',
                    'Mástil de Arrastre' => 'LinQ retráctil de 3 posiciones con empuñaduras ergonómicas',
                    'Tanque' => '70 Litros (18.5 gal)',
                ],
            ],
            'gtx-limited-325' => [
                'name' => 'GTX Limited 325',
                'category' => 'touring',
                'category_label' => 'Paseo, Lujo & Gran Turismo',
                'badge' => '325 HP • EL ESTÁNDAR DEL LUJO MUNDIAL',
                'tagline' => 'El pináculo del rendimiento y la distinción náutica. 325 HP, pantalla color de 7.8" y equipamiento Limited.',
                'image' => asset('images/seadoo/seadoo-gtx-limited-325.png'),
                'pdf' => asset('fichas/seadoo/seadoo-gtx-limited-325.pdf'),
                'color' => 'White Pearl Premium',
                'highlights' => [
                    'Motor Rotax® 1630 ACE™ Supercharged de 325 HP – El más potente del mundo',
                    'Pantalla panorámica a color de 7.8 pulgadas con Bluetooth y GPS',
                    'Sistema de Audio BRP Premium integrado de 100 vatios',
                    'Paquete Limited: funda protectora, bolsa estanca, organizador y sensor de profundidad',
                    'Casco ST3™ insuperable para fondeo, picnic y travesías oceánicas',
                    'Asiento escalonado Ergolock™ con soporte lumbar para 3 personas',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 1630 ACE™ Supercharged con supercargador de alta velocidad que entrega 325 HP a 8,250 RPM',
                    'Pantalla' => 'Panorámica de 7.8 plg. a todo color con conectividad de aplicaciones BRP Connect y mapas',
                    'Casco' => 'ST3 Hull™ de fibra de vidrio con acabado Premium White Pearl',
                    'Paquete Limited' => 'Funda a medida, organizador LinQ, bolsa impermeable, medidor de temperatura y profundidad',
                    'Asiento' => 'Ergolock™ escalonado bi-tono con respaldo lumbar para travesías de larga distancia',
                    'Tanque de Combustible' => '70 Litros (18.5 gal)',
                    'Frenos' => 'iBR® de última generación y sistema de refrigeración por circuito cerrado (CLCS)',
                ],
            ],
            'rxp-x-325' => [
                'name' => 'RXP-X 325',
                'category' => 'performance',
                'category_label' => 'Alto Rendimiento / Circuito & Boyas',
                'badge' => '325 HP • 0 A 100 EN < 3.4s',
                'tagline' => 'La moto acuática de competición definitiva. Rediseñada con casco T3-R para una mordida y virajes que desafían la gravedad.',
                'image' => asset('images/seadoo/seadoo-rxp-x-325.png'),
                'pdf' => asset('fichas/seadoo/seadoo-rxp-x-325.pdf'),
                'color' => 'Gulfstream Blue Premium',
                'highlights' => [
                    'Motor Rotax® 1630 ACE™ de 325 HP – Potencia récord en la industria',
                    'Aceleración de 0 a 100 km/h en menos de 3.4 segundos',
                    'Casco T3-R™ de competición con quillas laterales tiburón "Shark Gill"',
                    'Asiento Ergolock-R™ ajustable con cuña para trancar las rodillas',
                    'Amortiguador de dirección hidráulico para control total en turbulencia',
                    'Control de largada Launch Control y alerones de viraje X',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 1630 ACE™ Supercharged de 325 HP y 8,250 RPM con intercooler de flujo optimizado',
                    'Aceleración' => '0 a 100 km/h en ~3.4 segundos (la más rápida de la historia náutica)',
                    'Casco' => 'T3-R Hull™ con diseño en V profunda y canaletas de agarre para virajes cerrados',
                    'Asiento' => 'Asiento de competición Ergolock-R™ mono-plaza con respaldo ajustable (opción biplaza disponible)',
                    'Dirección' => 'Manillar de carreras con columna ajustable y amortiguador hidráulico de dirección con 3 posiciones',
                    'Sistemas' => 'Launch Control asistido por trim, VTS™ de respuesta rápida, modo Sport, iBR® y refrigeración CLCS',
                    'Tanque' => '70 Litros (18.5 gal)',
                ],
            ],
            'rxt-x-325' => [
                'name' => 'RXT-X 325',
                'category' => 'performance',
                'category_label' => 'Alto Rendimiento / Offshore & Olas Grandes',
                'badge' => '325 HP • CASCO ST3 OFFSHORE',
                'tagline' => 'La combinación perfecta de 325 HP de potencia bruta con la estabilidad offshore del casco ST3.',
                'image' => asset('images/seadoo/seadoo-rxt-x-325.png'),
                'pdf' => asset('fichas/seadoo/seadoo-rxt-x-325.pdf'),
                'color' => 'Mód. RXT-X 325 Alto Rendimiento',
                'highlights' => [
                    'Motor Rotax® 1630 ACE™ Supercharged de 325 HP',
                    'Casco ST3™ en V profunda para dominación en aguas abiertas y oleaje',
                    'Aletas estabilizadoras X angulares de competición regulables',
                    'Asiento de carreras Ergolock™ de 2 plazas convertible para solárium',
                    'Pantalla digital de 7.6 plg. con tacómetro de competición y fuerza G',
                    'Sistema de Audio BRP Premium de 100W disponible',
                ],
                'specs' => [
                    'Motor' => 'Rotax® 1630 ACE™ de 325 HP sobrealimentado con intercooler externo',
                    'Casco' => 'ST3 Hull™ diseñado para cortar olas sin perder trayectoria a alta velocidad',
                    'Capacidad' => 'Hasta 2 o 3 pasajeros con asiento convertible y gran plataforma trasera',
                    'Alerones' => 'Sponsons de competición X con ángulo de inclinación graduable',
                    'Acceso a Maletero' => 'Acceso frontal directo de 96 Litros que se abre desde el puesto de mando',
                    'Instrumentación' => 'Display de 7.6 plg. con cronómetro de vuelta, acelerómetro y medidor de impulso',
                    'Tanque' => '70 Litros (18.5 gal)',
                ],
            ],
            'switch-sport-21' => [
                'name' => 'Switch Sport 21\' – 230 HP',
                'category' => 'pontones',
                'category_label' => 'Pontón Modular Deportivo',
                'badge' => '21 PIES • 230 HP ROTAX • 10 PASAJEROS',
                'tagline' => 'El pontón revolucionario que se conduce como una moto de agua: cubierta LinQ® 100% modular y propulsión jet ultra segura.',
                'image' => asset('images/seadoo/seadoo-switch-sport-21.png'),
                'pdf' => asset('fichas/seadoo/seadoo-switch-sport-21-230hp.pdf'),
                'color' => 'Bright White & Coral Reef',
                'highlights' => [
                    'Eslora de 21 pies (6.4 m) con capacidad para hasta 10 personas a bordo',
                    'Piso modular con baldosas LinQ® para mover o quitar asientos en segundos',
                    'Conducción intuitiva con manillar idéntico a moto de agua',
                    'Motor Rotax® 1630 ACE™ Jet de 230 HP sin hélice exterior expuesta',
                    'Mástil de esquí retráctil LinQ® y plataforma de baño con escalera',
                    'Techo Bimini plegable de alta calidad incluido de serie',
                ],
                'specs' => [
                    'Eslora / Manga' => '6.4 metros (21 pies) / 2.4 metros (7.8 pies)',
                    'Capacidad' => 'Hasta 10 pasajeros (carga máxima total: 675 kg)',
                    'Motor' => 'Rotax® 1630 ACE™ Supercharged de 230 HP con propulsión por turbina Jet Drive interna',
                    'Seguridad' => 'Sin hélice expuesta debajo del agua: 100% seguro para niños, nadadores y fauna acuática',
                    'Piso Modular LinQ' => 'La disposición de asientos, mesas y conservadoras se reorganiza en minutos sin herramientas',
                    'Casco Tri-Casco' => 'Diseño trimarán de Polytec™ que ofrece estabilidad lateral absoluta tanto en marcha como fondeado',
                    'Equipamiento' => 'Techo Bimini, estéreo Garmin de 7 plg. con GPS / sonda de pesca, mástil de esquí y escalera de baño',
                    'Tanque de Combustible' => '110 Litros (29 gal) para navegar todo el fin de semana',
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

        return view('livewire.frontend.seadoo-showcase', [
            'models' => $filteredModels,
            'whatsappNumber' => Setting::get('contact_whatsapp', '595985204106'),
        ])->layoutData([
            'title' => 'Sea-Doo Paraguay | Motos Acuáticas y Pontones Switch en Consur S.A.',
            'description' => 'Descubrí la gama completa de Motos Acuáticas Sea-Doo (Spark, GTI, Wake, GTX, RXP-X) y Pontones Switch en Consur S.A. Concesionario oficial en Encarnación e Itapúa.',
        ]);
    }
}

