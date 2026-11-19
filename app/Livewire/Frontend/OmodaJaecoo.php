<?php

namespace App\Livewire\Frontend;

use App\Models\Brand;
use App\Models\Lead;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class OmodaJaecoo extends Component
{
    public ?string $modelSlug = null;

    // Formulario de Cotización
    public string $name = '';
    public string $phone = '';
    public string $email = '';
    public string $city = '';
    public string $vehicleInterest = 'JAECOO J7';
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

    public function mount(?string $model = null): void
    {
        if ($model && array_key_exists($model, $this->getModelsCatalog())) {
            $this->modelSlug = $model;
            $catalog = $this->getModelsCatalog();
            $this->vehicleInterest = $catalog[$model]['name'];
        }
    }

    public function submitQuotation(): void
    {
        $this->validate();

        Lead::create([
            'type' => 'cotizacion',
            'full_name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'message' => 'Interés en Omoda | Jaecoo: ' . $this->vehicleInterest . ($this->message ? ' | Mensaje: ' . $this->message : ''),
            'status' => 'nuevo',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset(['name', 'phone', 'email', 'city', 'message']);
        $this->sentSuccess = true;

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => '¡Tu solicitud fue enviada con éxito! Un asesor oficial de CONSUR S.A. te contactará en breve.',
        ]);
    }

    public function getModelsCatalog(): array
    {
        return [
            'omoda-c5' => [
                'slug' => 'omoda-c5',
                'name' => 'OMODA C5',
                'title' => 'OMODA C5 en Paraguay — CONSUR S.A. | Concesionario Oficial',
                'catalog_pdf' => '/catalogos/omoda-jaecoo/omoda-c5.pdf',
                'hero' => [
                    'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/hero-exterior.jpg',
                    'eyebrow' => 'ART IN MOTION',
                    'lines' => ['UNA SILUETA', 'QUE SE IMPONE'],
                    'description' => 'Parrilla frontal en X y raíles de techo integrados: cada línea suma a un perfil deportivo pensado para destacar en cualquier calle.',
                    'whatsapp_text' => 'Hola CONSUR, quiero información sobre el OMODA C5',
                ],
                'configurator' => [
                    'heading' => 'Elegí tu color favorito',
                    'colors' => [
                        ['name' => 'Blanco Perlado', 'hex' => '#eef0ee', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-c5/color-blanco-perlado.png'],
                        ['name' => 'Negro Ópalo', 'hex' => '#17181b', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-c5/color-negro-opalo.png'],
                        ['name' => 'Gris Platinum', 'hex' => '#6d7074', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-c5/color-gris-platinum.png'],
                        ['name' => 'Verde Menta', 'hex' => '#b9d6b0', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-c5/color-verde-menta.png'],
                        ['name' => 'Rojo Intense', 'hex' => '#7c1a22', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-c5/color-rojo-intense.png'],
                        ['name' => 'Plata Titanio', 'hex' => '#b4aea3', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-c5/color-plata-titanio.png'],
                    ],
                    'specs' => [
                        ['label' => 'Potencia máxima', 'value' => '112,85', 'unit' => 'HP'],
                        ['label' => 'Motor', 'value' => '1.5L', 'unit' => 'DVVT'],
                        ['label' => 'Consumo combinado', 'value' => '7,3', 'unit' => 'l/100km'],
                        ['label' => 'Llantas', 'value' => '17', 'unit' => '"'],
                    ],
                    'dimensions' => [
                        ['label' => 'Longitud', 'value' => '4400', 'unit' => 'mm'],
                        ['label' => 'Ancho', 'value' => '1830', 'unit' => 'mm'],
                        ['label' => 'Altura', 'value' => '1588', 'unit' => 'mm'],
                        ['label' => 'Entre ejes', 'value' => '2630', 'unit' => 'mm'],
                    ],
                ],
                'viewer_3d' => [
                    'title' => 'Explorá el OMODA C5 en 3D',
                    'description' => 'Interactuá en tiempo real: arrastrá para girar 360°, hacé zoom en cada detalle exterior e interior y tocá los puntos interactivos.',
                    'iframe_url' => 'https://www.omodajaecoo.com/global/OMODAweb-360-new/index.html',
                    'iframe_title' => 'Configurador y Visor 3D del OMODA C5',
                ],
                'features' => [
                    [
                        'eyebrow' => 'Art in Motion',
                        'title' => 'Diseño que magnetiza',
                        'description' => 'Parrilla frontal con patrón en X, antena aleta de tiburón y raíles de techo integrados componen un perfil deportivo pensado para destacar en cualquier calle. Sensores de estacionamiento traseros y cámara de retroceso con guías dinámicas suman precisión a cada maniobra.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/diseno-exterior.jpg',
                    ],
                    [
                        'eyebrow' => 'Cabina inteligente',
                        'title' => 'Pantalla digital, control total',
                        'description' => 'Cuadro de instrumentos digital LCD de 10,25", compatible con Apple CarPlay y Android Auto: toda la información al alcance de la vista.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/cabina-tecnologia.jpg',
                    ],
                    [
                        'eyebrow' => 'Máximo confort',
                        'title' => 'Confort en cada trayecto',
                        'description' => 'Asientos delanteros en tapizado combinado tela/cuero, con ajuste manual de 6 vías para el conductor y 4 vías para el acompañante. Volante multifunción revestido en símil cuero y luneta trasera calefactada para visibilidad clara en cualquier clima.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/confort-asientos.jpg',
                    ],
                    [
                        'eyebrow' => 'Manos libres',
                        'title' => 'Manejalo con la voz',
                        'description' => 'El asistente de voz inteligente y la conexión Bluetooth te acompañan sin soltar el volante. Sumale carga rápida Type-C, tomas 12V delanteras y en el baúl, y cámara de retroceso con guías dinámicas para maniobrar con total seguridad.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/voz-inteligente.jpg',
                    ],
                ],
                'security' => [
                    'eyebrow' => 'Seguridad de vanguardia',
                    'heading' => 'Sistemas de seguridad activa que cuidan cada trayecto',
                    'items' => [
                        [
                            'title' => 'ABS, EBD y BAS',
                            'description' => 'Antibloqueo de frenos, distribución electrónica de frenado y asistencia de frenado de serie.',
                            'icon' => 'fa-solid fa-car-burst',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/seguridad-frenado.jpg',
                        ],
                        [
                            'title' => 'Control de velocidad crucero',
                            'description' => 'Mantené una velocidad constante en ruta sin usar el acelerador.',
                            'icon' => 'fa-solid fa-gauge-high',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/seguridad-crucero.jpg',
                        ],
                        [
                            'title' => 'ESP — Control electrónico de estabilidad',
                            'description' => 'Corrige la trayectoria del auto ante pérdida de adherencia.',
                            'icon' => 'fa-solid fa-route',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/seguridad-carril.jpg',
                        ],
                        [
                            'title' => 'TPMS — Monitor de presión de neumáticos',
                            'description' => 'Monitoreo directo de la presión de cada neumático en tiempo real.',
                            'icon' => 'fa-solid fa-triangle-exclamation',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/seguridad-colision.jpg',
                        ],
                        [
                            'title' => 'Aviso de límite de velocidad',
                            'description' => 'Te alerta cuando superás el límite de velocidad vigente.',
                            'icon' => 'fa-solid fa-gauge-high',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/seguridad-punto-ciego.jpg',
                        ],
                        [
                            'title' => 'Bloqueo automático de puertas',
                            'description' => 'Bloquea las puertas automáticamente al alcanzar velocidad de marcha.',
                            'icon' => 'fa-solid fa-lock',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/seguridad-adas.jpg',
                        ],
                    ],
                ],
                'gallery' => [
                    ['caption' => 'Diseño exterior', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/hero-exterior.jpg', 'category' => 'exterior'],
                    ['caption' => 'Perfil deportivo', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/diseno-exterior.jpg', 'category' => 'exterior'],
                    ['caption' => 'Vista trasera', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/vista-trasera.jpg', 'category' => 'exterior'],
                    ['caption' => 'Cabina digital', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/hero-interior.jpg', 'category' => 'interior'],
                    ['caption' => 'Confort premium', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/confort-asientos.jpg', 'category' => 'interior'],
                    ['caption' => 'Control por voz', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/voz-inteligente.jpg', 'category' => 'interior'],
                    ['caption' => 'Carga rápida Type-C', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/carga-wireless.jpg', 'category' => 'interior'],
                    ['caption' => 'Seguridad integral', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/airbags.jpg', 'category' => 'interior'],
                ],
                'test_drive' => [
                    'image' => 'https://omodajaecoo.com.py/modelos/omoda-c5/diseno-exterior.jpg',
                    'line1' => 'El OMODA C5 te espera',
                    'line2' => 'para un test drive',
                ],
            ],

            'omoda-e5' => [
                'slug' => 'omoda-e5',
                'name' => 'OMODA E5',
                'title' => 'OMODA E5 100% Eléctrico en Paraguay — CONSUR S.A. | Concesionario Oficial',
                'catalog_pdf' => '/catalogos/omoda-jaecoo/omoda-e5.pdf',
                'hero' => [
                    'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/hero-exterior.jpg',
                    'eyebrow' => 'ESTILO X-FUTURE',
                    'lines' => ['ELÉCTRICO CON', 'PERSONALIDAD'],
                    'description' => 'Líneas aerodinámicas fastback y una estética vanguardista que define el futuro de la movilidad 100% eléctrica.',
                    'whatsapp_text' => 'Hola CONSUR, quiero información sobre el OMODA E5',
                ],
                'configurator' => [
                    'heading' => 'Conocé el OMODA E5 LUX',
                    'colors' => [
                        ['name' => 'Negro Crystal', 'hex' => '#17181b', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-carbon-crystal-black.png'],
                        ['name' => 'Blanco Khaki', 'hex' => '#eef0ee', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-khaki-white.png'],
                        ['name' => 'Gris Phantom', 'hex' => '#6d7074', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-phantom-gray.png'],
                        ['name' => 'Rojo Bloodstone', 'hex' => '#7c1a22', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-bloodstone-red.png'],
                        ['name' => 'Plata Aviation', 'hex' => '#9aa0a3', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-aviation-silver.png'],
                        ['name' => 'Azul Lake', 'hex' => '#2f5f8a', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-lake-blue.png'],
                        ['name' => 'Plata Bitono', 'style' => 'background:linear-gradient(90deg, #9aa0a3 50%, #17181b 50%)', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-aviation-silver-bitono.png'],
                        ['name' => 'Rojo Bitono', 'style' => 'background:linear-gradient(90deg, #7c1a22 50%, #17181b 50%)', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-bloodstone-red-bitono.png'],
                        ['name' => 'Blanco Bitono', 'style' => 'background:linear-gradient(90deg, #eef0ee 50%, #17181b 50%)', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-khaki-white-bitono.png'],
                        ['name' => 'Verde Bitono', 'style' => 'background:linear-gradient(90deg, #5c9a86 50%, #17181b 50%)', 'img' => 'https://omodajaecoo.com.py/modelos/omoda-e5/color-aqua-green-bitono.png'],
                    ],
                    'specs' => [
                        ['label' => 'Potencia máxima', 'value' => '210,74', 'unit' => 'HP'],
                        ['label' => 'Aceleración 0–100 km/h', 'value' => '7,2', 'unit' => 'seg'],
                        ['label' => 'Par máximo', 'value' => '288', 'unit' => 'Nm'],
                        ['label' => 'Autonomía NEDC', 'value' => '422', 'unit' => 'km'],
                    ],
                    'dimensions' => [
                        ['label' => 'Longitud', 'value' => '4545', 'unit' => 'mm'],
                        ['label' => 'Ancho', 'value' => '1830', 'unit' => 'mm'],
                        ['label' => 'Altura', 'value' => '1588', 'unit' => 'mm'],
                        ['label' => 'Entre ejes', 'value' => '2630', 'unit' => 'mm'],
                    ],
                ],
                'viewer_3d' => [
                    'title' => 'Explorá el OMODA E5 en 3D',
                    'description' => 'Descubrí el SUV 100% eléctrico: rotá 360°, inspeccioná el diseño aerodinámico futurista, su interior tecnológico y todos sus ángulos.',
                    'iframe_url' => 'https://www.omodajaecoo.com/global/e5360/index.html',
                    'iframe_title' => 'Configurador y Visor 3D del OMODA E5',
                ],
                'features' => [
                    [
                        'eyebrow' => 'Light of Movement',
                        'title' => 'Diseño que corta el viento',
                        'description' => 'Una imponente grilla frontal cerrada y una silueta aerodinámica reducen la resistencia al viento, aportando eficiencia a la autonomía y una sensación de conducción inigualable.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/diseno-exterior.jpg',
                    ],
                    [
                        'eyebrow' => 'Cabina inteligente',
                        'title' => 'Doble pantalla, control total',
                        'description' => 'Pantalla táctil de 15,6" y clúster digital de 8,88", con Apple CarPlay y Android Auto y sistema de audio de 6 altavoces: todo a la vista, siempre conectado.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/hero-interior.jpg',
                    ],
                    [
                        'eyebrow' => 'Máximo confort',
                        'title' => 'Confort en cada trayecto',
                        'description' => 'Asiento del conductor con ajuste eléctrico de 6 vías, masaje, calefacción y ventilación; el copiloto suma ajuste eléctrico de 6 vías con calefacción y ventilación. Sumale el frunk delantero para almacenamiento extra, en un habitáculo silencioso gracias a su propulsión 100% eléctrica.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/hero-exterior.jpg',
                    ],
                    [
                        'eyebrow' => 'E-Performance',
                        'title' => 'Cargate de energía',
                        'description' => 'Batería LFP de 49,5 kWh con 422 km de autonomía bajo ciclo NEDC. Con carga rápida DC de hasta 110 kW, pasás del 30% al 80% de batería en solo 16 minutos.',
                        'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/recarga.jpg',
                    ],
                ],
                'security' => [
                    'eyebrow' => 'Seguridad de vanguardia',
                    'heading' => 'Tecnología eléctrica que cuida cada trayecto',
                    'items' => [
                        [
                            'title' => 'Mayor autonomía',
                            'description' => 'Batería LFP de 49,5 kWh con hasta 422 km de autonomía bajo ciclo NEDC.',
                            'icon' => 'fa-solid fa-bolt',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/autonomia.jpg',
                        ],
                        [
                            'title' => 'Potencia',
                            'description' => '288 Nm de torque y 210,74 HP: acelera de 0 a 100 km/h en solo 7,2 segundos.',
                            'icon' => 'fa-solid fa-bolt-lightning',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/hero-exterior.jpg',
                        ],
                        [
                            'title' => 'Carga rápida',
                            'description' => 'Hasta 110 kW de potencia de carga DC: del 30% al 80% en solo 16 minutos.',
                            'icon' => 'fa-solid fa-charging-station',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/recarga.jpg',
                        ],
                        [
                            'title' => 'Batería protegida',
                            'description' => 'Sistema de gestión térmica por refrigeración líquida y garantía de batería de 8 años / 160.000 km.',
                            'icon' => 'fa-solid fa-bolt',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/seguridad-bateria.jpg',
                        ],
                        [
                            'title' => 'Visión 540°',
                            'description' => 'Cámara de visión panorámica 540°, detector de punto ciego (BSD), alerta de tráfico cruzado trasero (RCTA) y 2 sensores delanteros + 4 traseros.',
                            'icon' => 'fa-solid fa-camera-rotate',
                            'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/diseno-exterior.jpg',
                        ],
                    ],
                ],
                'gallery' => [
                    ['caption' => 'Diseño exterior', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/hero-exterior.jpg', 'category' => 'exterior'],
                    ['caption' => 'Silueta aerodinámica', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/diseno-exterior.jpg', 'category' => 'exterior'],
                    ['caption' => 'Carga rápida DC', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/recarga.jpg', 'category' => 'exterior'],
                    ['caption' => 'Cabina digital inteligente', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/hero-interior.jpg', 'category' => 'interior'],
                    ['caption' => 'Batería LFP Blade', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/autonomia.jpg', 'category' => 'interior'],
                    ['caption' => 'Protección y refrigeración líquida', 'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/seguridad-bateria.jpg', 'category' => 'interior'],
                ],
                'test_drive' => [
                    'image' => 'https://omodajaecoo.com.py/modelos/omoda-e5/diseno-exterior.jpg',
                    'line1' => 'El OMODA E5 te espera',
                    'line2' => 'para un test drive',
                ],
            ],

            'jaecoo-j5' => [
                'slug' => 'jaecoo-j5',
                'name' => 'JAECOO J5',
                'title' => 'JAECOO J5 SHEV Híbrido en Paraguay — CONSUR S.A. | Concesionario Oficial',
                'catalog_pdf' => '/catalogos/omoda-jaecoo/jaecoo-j5.pdf',
                'hero' => [
                    'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/on-road-bosque.jpg',
                    'eyebrow' => 'FILOSOFÍA JAECOO',
                    'lines' => ['HÍBRIDO SIN ENCHUFE.', 'LIBERTAD TOTAL.'],
                    'description' => 'Tecnología SHEV inteligente que recarga la batería durante la marcha: la máxima eficiencia sin cables ni demoras.',
                    'whatsapp_text' => 'Hola CONSUR, quiero información sobre el JAECOO J5',
                ],
                'configurator' => [
                    'heading' => 'Conocé el JAECOO J5',
                    'colors' => [
                        ['name' => 'Mountain Green', 'hex' => '#3f6a4f', 'img' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/color-mountain-green.png'],
                        ['name' => 'Mountain Green Bitono', 'style' => 'background:linear-gradient(90deg, #3f6a4f 50%, #1c1d20 50%)', 'img' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/color-mountain-green-techo-negro.png'],
                        ['name' => 'Canyon Black', 'hex' => '#1c1d20', 'img' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/color-canyon-black.png'],
                        ['name' => 'Glacier Blue', 'hex' => '#4f7fa6', 'img' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/color-glacier-blue.png'],
                        ['name' => 'Limestone Gray', 'hex' => '#7a7d80', 'img' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/color-limestone-gray.png'],
                        ['name' => 'Snowfield White', 'hex' => '#eef0ee', 'img' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/color-snowfield-white.png'],
                        ['name' => 'Snowfield White Bitono', 'style' => 'background:linear-gradient(90deg, #eef0ee 50%, #1c1d20 50%)', 'img' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/color-snowfield-white-techo-negro.png'],
                    ],
                    'specs' => [
                        ['label' => 'Potencia combinada', 'value' => '165', 'unit' => 'kW'],
                        ['label' => 'Aceleración 0–100 km/h', 'value' => '7,9', 'unit' => 'seg'],
                        ['label' => 'Consumo combinado', 'value' => '5,6', 'unit' => 'l/100km'],
                        ['label' => 'Torque motor eléctrico', 'value' => '310', 'unit' => 'Nm'],
                    ],
                    'dimensions' => [
                        ['label' => 'Longitud', 'value' => '4380', 'unit' => 'mm'],
                        ['label' => 'Ancho', 'value' => '1860', 'unit' => 'mm'],
                        ['label' => 'Altura', 'value' => '1650', 'unit' => 'mm'],
                        ['label' => 'Entre ejes', 'value' => '2620', 'unit' => 'mm'],
                    ],
                ],
                'viewer_3d' => [
                    'title' => 'Explorá el JAECOO J5 en 3D',
                    'description' => 'Conocé el nuevo SUV compacto prémium: rotá 360°, explorá su diseño exterior contemporáneo, su habitáculo y detalles interactivos.',
                    'iframe_url' => 'https://www.omodajaecoo.com/global/JAECOO5web-360/',
                    'iframe_title' => 'Configurador y Visor 3D del JAECOO 5',
                ],
                'features' => [
                    [
                        'eyebrow' => 'From Classic, Beyond Classic',
                        'title' => 'Diseño que impone respeto',
                        'description' => 'Suspensión McPherson delantera y Multilink trasera, frenos a disco en las 4 ruedas y llantas de aluminio bicolor de 18" (235/55 R18): estabilidad y control en cada trayecto.',
                        'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/perfil-lateral.jpg',
                    ],
                    [
                        'eyebrow' => 'SHEV · Sin enchufe',
                        'title' => 'Híbrido que se autorecarga',
                        'description' => 'Motor 1.5 TGDI + motor eléctrico de 150 kW: potencia combinada de 165 kW, transmisión DHT150 y modos de manejo ECO/Sport. No necesita enchufe: se recarga solo con la frenada y el motor a combustión.',
                        'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/vista-trasera.jpg',
                    ],
                    [
                        'eyebrow' => 'Cabina inteligente',
                        'title' => 'Tecnología pensada para vos',
                        'description' => 'Pantalla táctil de hasta 13,2" y clúster digital de 8", con Apple CarPlay y Android Auto y audio de hasta 8 parlantes en la versión Premium. Sumale climatizador bizona automático y techo panorámico de vidrio fijo, también en Premium.',
                        'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/techo-panoramico.jpg',
                    ],
                ],
                'security' => [
                    'eyebrow' => 'Tu seguridad es nuestro compromiso',
                    'heading' => 'Diseñado para las máximas exigencias globales',
                    'items' => [
                        [
                            'title' => 'Seguridad activa de serie',
                            'description' => 'ABS, EBD, BAS, control de tracción (TCS), control anti-vuelco (RSC) y asistencia en subidas y bajadas (HAC/HDC) en ambas versiones.',
                            'icon' => 'fa-solid fa-shield-halved',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/hero-exterior.jpg',
                        ],
                        [
                            'title' => 'Híbrido autorecargable (SHEV)',
                            'description' => 'Motor 1.5 TGDI + eléctrico de 150 kW: potencia combinada de 165 kW y consumo combinado de 5,6 L/100 km, sin necesidad de enchufe.',
                            'icon' => 'fa-solid fa-charging-station',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/on-road-bosque.jpg',
                        ],
                        [
                            'title' => 'ADAS en versión Premium',
                            'description' => 'Frenado autónomo de emergencia, crucero adaptativo, mantenimiento de carril y visión panorámica 540° HD, disponibles en la versión Premium.',
                            'icon' => 'fa-solid fa-shield-halved',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/hero-interior.jpg',
                        ],
                        [
                            'title' => 'Seguridad pasiva completa',
                            'description' => 'Airbags de conductor, copiloto y laterales delanteros de serie, con cortinas de aire en la versión Premium y anclajes ISOFIX en ambas.',
                            'icon' => 'fa-solid fa-shield-halved',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/vista-trasera.jpg',
                        ],
                    ],
                ],
                'gallery' => [
                    ['caption' => 'Diseño exterior', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/hero-exterior.jpg', 'category' => 'exterior'],
                    ['caption' => 'Perfil lateral', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/perfil-lateral.jpg', 'category' => 'exterior'],
                    ['caption' => 'Vista trasera', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/vista-trasera.jpg', 'category' => 'exterior'],
                    ['caption' => 'Listo para la aventura', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/on-road-bosque.jpg', 'category' => 'exterior'],
                    ['caption' => 'Cabina inteligente', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/hero-interior.jpg', 'category' => 'interior'],
                    ['caption' => 'Techo panorámico', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/techo-panoramico.jpg', 'category' => 'interior'],
                ],
                'test_drive' => [
                    'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j5/hero-exterior.jpg',
                    'line1' => 'El JAECOO J5 te espera',
                    'line2' => 'para un test drive',
                ],
            ],

            'jaecoo-j7' => [
                'slug' => 'jaecoo-j7',
                'name' => 'JAECOO J7',
                'title' => 'JAECOO J7 PHEV Híbrido Enchufable en Paraguay — CONSUR S.A. | Concesionario Oficial',
                'catalog_pdf' => '/catalogos/omoda-jaecoo/jaecoo-j7.pdf',
                'hero' => [
                    'image' => '/images/omoda-jaecoo/jaecoo-j7-hero.jpg',
                    'eyebrow' => 'ELEGANCIA TODOTERRENO',
                    'lines' => ['LUJO Y AVENTURA.', 'EN PERFECTO EQUILIBRIO.'],
                    'description' => 'Parrilla vertical icónica estilo cascada, 288 HP de potencia combinada PHEV y tracción inteligente para cualquier terreno.',
                    'whatsapp_text' => 'Hola CONSUR, quiero información sobre el JAECOO J7',
                ],
                'configurator' => [
                    'heading' => 'Elegí tu color favorito',
                    'colors' => [
                        ['name' => 'Blanco', 'hex' => '#eef0ee', 'img' => '/images/omoda-jaecoo/j7-blanco.png?v=4'],
                        ['name' => 'Azul con techo negro', 'style' => 'background:linear-gradient(90deg, #9ccbd1 50%, #1a2229 50%)', 'img' => '/images/omoda-jaecoo/j7-azul-techo-negro.png?v=4'],
                        ['name' => 'Plata con techo negro', 'style' => 'background:linear-gradient(90deg, #7a7b80 50%, #1a2229 50%)', 'img' => '/images/omoda-jaecoo/j7-plata-techo-negro.png?v=4'],
                        ['name' => 'Verde con techo negro', 'style' => 'background:linear-gradient(90deg, #b4c6ae 50%, #1a2229 50%)', 'img' => '/images/omoda-jaecoo/j7-verde-techo-negro.png?v=4'],
                        ['name' => 'Negro', 'hex' => '#1b1d20', 'img' => '/images/omoda-jaecoo/j7-negro.png?v=4'],
                    ],
                    'specs' => [
                        ['label' => 'Potencia combinada', 'value' => '288,32', 'unit' => 'HP'],
                        ['label' => 'Aceleración 0–100 km/h', 'value' => '7,9', 'unit' => 'seg'],
                        ['label' => 'Autonomía eléctrica WLTP', 'value' => '100', 'unit' => 'km'],
                        ['label' => 'Consumo combinado', 'value' => '1,3', 'unit' => 'l/100km'],
                    ],
                    'dimensions' => [
                        ['label' => 'Longitud', 'value' => '4500', 'unit' => 'mm'],
                        ['label' => 'Ancho', 'value' => '1865', 'unit' => 'mm'],
                        ['label' => 'Altura', 'value' => '1680', 'unit' => 'mm'],
                        ['label' => 'Entre ejes', 'value' => '2672', 'unit' => 'mm'],
                    ],
                ],
                'viewer_3d' => [
                    'title' => 'Explorá el JAECOO J7 en 3D',
                    'description' => 'Descubrí su diseño todoterreno prémium: rotá 360°, apreciá su imponente parrilla estilo cascada, detalles interiores y líneas robustas.',
                    'iframe_url' => 'https://www.omodajaecoo.com/global/JAECOO7web-360/',
                    'iframe_title' => 'Configurador y Visor 3D del JAECOO 7',
                ],
                'features' => [
                    [
                        'eyebrow' => 'From Classic, Beyond Classic',
                        'title' => 'Diseño que impone respeto',
                        'description' => 'Una parrilla vertical icónica y una silueta robusta expresan la mezcla de lujo y aventura que define al JAECOO 7, listo para destacar tanto en la ciudad como en el camino más exigente.',
                        'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/hero-exterior.jpg',
                    ],
                    [
                        'eyebrow' => 'Conectividad total',
                        'title' => 'Pantalla que lo controla todo',
                        'description' => 'Pantalla táctil de 14,8" y clúster digital de 10,25", con Apple CarPlay y Android Auto inalámbricos y sistema de audio de hasta 8 parlantes Sony® en la versión Premium.',
                        'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/hero-interior.jpg',
                    ],
                    [
                        'eyebrow' => 'Máximo confort',
                        'title' => 'Amplitud en cada asiento',
                        'description' => 'Climatizador bizona automático de serie y techo panorámico eléctrico en la versión Premium: el interior del JAECOO 7 acompaña con confort cada trayecto.',
                        'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/confort-sunroof.jpg',
                    ],
                    [
                        'eyebrow' => 'ECO · Normal · Sport',
                        'title' => 'Manejalo a tu manera',
                        'description' => 'Transmisión 1DHT dedicada al sistema híbrido, con 3 modos de manejo (ECO, Normal y Sport) con memoria, arranque inteligente start-stop y acelerador electrónico. Suspensión McPherson delantera y Multilink trasera, con llantas de 19" y neumáticos Kumho.',
                        'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/transmision.jpg',
                    ],
                ],
                'security' => [
                    'eyebrow' => 'Tu seguridad es nuestro compromiso',
                    'heading' => 'Diseñado para las máximas exigencias globales',
                    'items' => [
                        [
                            'title' => 'Chasis y rodado',
                            'description' => 'Suspensión McPherson delantera y Multilink trasera, con llantas de 19" y neumáticos Kumho.',
                            'icon' => 'fa-solid fa-car-side',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/chasis.jpg',
                        ],
                        [
                            'title' => 'Híbrido enchufable (PHEV)',
                            'description' => 'Motor 1.5 TGDI + motor eléctrico de 150 kW: potencia combinada de 288,32 hp con arranque inteligente start-stop.',
                            'icon' => 'fa-solid fa-bolt-lightning',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/motor.jpg',
                        ],
                        [
                            'title' => 'Autonomía 100% eléctrica',
                            'description' => 'Batería de 18,4 kWh con hasta 100 km de autonomía WLTP en modo eléctrico y consumo combinado de 1,3 L/100 km.',
                            'icon' => 'fa-solid fa-bolt',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/transmision.jpg',
                        ],
                        [
                            'title' => 'ADAS en versión Premium',
                            'description' => 'Frenado autónomo de emergencia, crucero adaptativo, mantenimiento de carril y visión panorámica 540° HD, disponibles en la versión Premium.',
                            'icon' => 'fa-solid fa-shield-halved',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/monitoreo-360.jpg',
                        ],
                        [
                            'title' => 'Seguridad pasiva completa',
                            'description' => 'Airbags frontales, laterales, cortinas de aire y airbag de rodilla del conductor, con anclajes ISOFIX en ambas versiones.',
                            'icon' => 'fa-solid fa-shield-halved',
                            'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/airbags.jpg',
                        ],
                    ],
                ],
                'gallery' => [
                    ['caption' => 'Diseño exterior y parrilla cascada', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/hero-exterior.jpg', 'category' => 'exterior'],
                    ['caption' => 'Chasis todoterreno y suspensión Multilink', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/chasis.jpg', 'category' => 'exterior'],
                    ['caption' => 'Motor híbrido enchufable PHEV', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/motor.jpg', 'category' => 'exterior'],
                    ['caption' => 'Cabina inteligente con pantalla 14,8"', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/hero-interior.jpg', 'category' => 'interior'],
                    ['caption' => 'Techo panorámico eléctrico', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/confort-sunroof.jpg', 'category' => 'interior'],
                    ['caption' => 'Visión panorámica 540° HD', 'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/monitoreo-360.jpg', 'category' => 'interior'],
                ],
                'test_drive' => [
                    'image' => 'https://omodajaecoo.com.py/modelos/jaecoo-j7/hero-exterior.jpg',
                    'line1' => 'El JAECOO J7 te espera',
                    'line2' => 'para un test drive',
                ],
            ],
        ];
    }

    public function render()
    {
        $brand = Brand::where('slug', 'omoda-jaecoo')->first();
        $catalog = $this->getModelsCatalog();

        if ($this->modelSlug && isset($catalog[$this->modelSlug])) {
            $modelData = $catalog[$this->modelSlug];
            $otherModels = collect($catalog)->except($this->modelSlug)->values()->all();

            return view('livewire.frontend.omoda-jaecoo-model', [
                'brand' => $brand,
                'modelData' => $modelData,
                'otherModels' => $otherModels,
            ])->layoutData([
                'title' => $modelData['title'],
                'description' => $modelData['hero']['description'],
            ]);
        }

        return view('livewire.frontend.omoda-jaecoo', [
            'brand' => $brand,
        ])->layoutData([
            'title' => 'OMODA & JAECOO Paraguay — CONSUR S.A. | Concesionario Oficial',
            'description' => 'Descubrí los SUV OMODA C5, OMODA E5, JAECOO J5 y JAECOO J7 en Paraguay. CONSUR S.A. es el concesionario oficial OMODA & JAECOO en Encarnación. SUV eléctrico, híbrido enchufable y más.',
        ]);
    }
}
