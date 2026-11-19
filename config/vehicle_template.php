<?php

/*
|--------------------------------------------------------------------------
| Plantilla estandarizada de Vehículos 0 Km
|--------------------------------------------------------------------------
|
| Fuente única de verdad para:
|  - Los grupos y campos de la Ficha Técnica (columna JSONB `specs`).
|  - El catálogo de sistemas de seguridad (columna JSONB `safety`).
|  - El equipamiento rápido (checklist que alimenta `features`).
|  - Presets por marca (paleta de colores, seguridad y equipamiento base).
|
| Para sumar una nueva marca (Omoda, Hino, Sea-Doo...), basta con agregar
| su entrada en `brand_presets` usando el slug de la marca como clave.
|
*/

return [

    // Grupos de la ficha técnica => [clave => [etiqueta, unidad/placeholder]]
    'spec_groups' => [
        'motor' => [
            'label' => 'Motor y Desempeño',
            'icon' => 'fa-gears',
            'fields' => [
                'engine_code' => ['Código de motor', 'Ej: 1GD-FTV, 2ZR-FXE'],
                'displacement' => ['Cilindrada', 'Ej: 2.755 cc'],
                'cylinders' => ['Cilindros / Válvulas', 'Ej: 4 en línea, 16V DOHC'],
                'power' => ['Potencia máxima', 'Ej: 201 CV @ 3.400 rpm'],
                'torque' => ['Torque máximo', 'Ej: 500 Nm @ 1.600 rpm'],
                'hybrid_system' => ['Sistema híbrido', 'Ej: Motor eléctrico 72 kW + batería Ni-MH'],
                'fuel_consumption' => ['Consumo combinado', 'Ej: 22 km/l'],
                'fuel_tank' => ['Tanque de combustible', 'Ej: 80 L'],
            ],
        ],
        'transmision' => [
            'label' => 'Transmisión y Chasis',
            'icon' => 'fa-gear',
            'fields' => [
                'gearbox' => ['Caja de cambios', 'Ej: Automática 6 vel. secuencial'],
                'drive_modes' => ['Modos de conducción', 'Ej: Eco / Normal / Power / EV'],
                'suspension_front' => ['Suspensión delantera', 'Ej: Independiente doble horquilla'],
                'suspension_rear' => ['Suspensión trasera', 'Ej: Eje rígido con elásticos'],
                'brakes' => ['Frenos (del. / tras.)', 'Ej: Discos ventilados / Tambor'],
                'tires' => ['Neumáticos / Llantas', 'Ej: 265/60 R18 aleación'],
            ],
        ],
        'dimensiones' => [
            'label' => 'Dimensiones y Capacidades',
            'icon' => 'fa-ruler-combined',
            'fields' => [
                'length' => ['Largo', 'Ej: 5.325 mm'],
                'width' => ['Ancho', 'Ej: 1.900 mm'],
                'height' => ['Alto', 'Ej: 1.815 mm'],
                'wheelbase' => ['Distancia entre ejes', 'Ej: 3.085 mm'],
                'ground_clearance' => ['Despeje del suelo', 'Ej: 286 mm'],
                'trunk' => ['Baúl / Caja de carga', 'Ej: 440 L / 1.000 kg'],
                'seats' => ['Plazas', 'Ej: 5'],
                'weight' => ['Peso en orden de marcha', 'Ej: 2.100 kg'],
            ],
        ],
        'garantia' => [
            'label' => 'Garantía y Servicio',
            'icon' => 'fa-shield-halved',
            'fields' => [
                'warranty' => ['Garantía de fábrica', 'Ej: 5 años o 150.000 km'],
                'hybrid_warranty' => ['Garantía batería híbrida', 'Ej: 8 años'],
                'service_interval' => ['Intervalo de servicio', 'Ej: Cada 10.000 km'],
            ],
        ],
    ],

    // Catálogo de seguridad => [etiqueta, descripción corta, ícono, grupo]
    'safety_catalog' => [
        'tss' => ['Toyota Safety Sense', 'Paquete de seguridad activa Toyota', 'fa-shield-halved', 'adas'],
        'pcs' => ['Sistema Pre-Colisión (PCS)', 'Detecta vehículos y peatones y frena', 'fa-car-burst', 'adas'],
        'acc' => ['Crucero Adaptativo (ACC)', 'Mantiene distancia con el vehículo de adelante', 'fa-gauge-high', 'adas'],
        'lda' => ['Alerta de Cambio de Carril (LDA/LTA)', 'Avisa y corrige la trayectoria', 'fa-road', 'adas'],
        'ahb' => ['Luces Altas Automáticas (AHB)', 'Cambia de luces según el tránsito', 'fa-lightbulb', 'adas'],
        'bsm' => ['Monitor de Punto Ciego (BSM)', 'Alerta vehículos en el ángulo muerto', 'fa-eye', 'adas'],
        'rcta' => ['Alerta de Tráfico Cruzado (RCTA)', 'Advierte al salir marcha atrás', 'fa-arrows-left-right', 'adas'],
        'vsc' => ['Control de Estabilidad (VSC)', 'Evita derrapes en curvas', 'fa-arrows-spin', 'activa'],
        'trc' => ['Control de Tracción (TRC)', 'Evita el patinamiento de ruedas', 'fa-circle-nodes', 'activa'],
        'hac' => ['Asistente de Arranque en Pendiente (HAC)', 'Evita que el vehículo retroceda', 'fa-mountain', 'activa'],
        'dac' => ['Control de Descenso (DAC)', 'Baja pendientes a velocidad controlada', 'fa-person-hiking', 'activa'],
        'abs' => ['ABS + EBD + BA', 'Frenado antibloqueo con distribución y asistencia', 'fa-circle-stop', 'activa'],
        'tsc' => ['Control de Balanceo de Tráiler (TSC)', 'Estabiliza al remolcar', 'fa-trailer', 'activa'],
        'camera' => ['Cámara de Retroceso / 360°', 'Visión asistida para maniobras', 'fa-video', 'activa'],
        'parking' => ['Sensores de Estacionamiento', 'Delanteros y/o traseros', 'fa-square-parking', 'activa'],
        'isofix' => ['Anclajes ISOFIX', 'Sujeción segura de sillas infantiles', 'fa-baby', 'pasiva'],
    ],

    // Equipamiento rápido (checklist): se guarda como texto dentro de `features`
    'quick_features' => [
        'Android Auto & Apple CarPlay',
        'Conectividad inalámbrica',
        'Pantalla táctil multimedia',
        'Panel de instrumentos digital',
        'Climatizador automático digital',
        'Climatizador bi-zona',
        'Salidas de A/C traseras',
        'Arranque sin llave (Smart Entry)',
        'Cargador inalámbrico',
        'Tapizado de cuero',
        'Asiento del conductor eléctrico',
        'Techo solar',
        'Portón trasero eléctrico',
        'Faros Full LED',
        'Faros antiniebla',
        'Llantas de aleación',
        'Estribos laterales',
        'Bloqueo de diferencial trasero',
        'Tracción 4x4 con reductora',
        'Control de velocidad crucero',
    ],

    // Presets por slug de marca
    'brand_presets' => [
        'toyota' => [
            'accent' => '#EB0A1E',
            'colors' => [
                ['name' => 'Super Blanco', 'hex' => '#F5F5F5', 'image' => ''],
                ['name' => 'Blanco Perlado', 'hex' => '#EDEBE4', 'image' => ''],
                ['name' => 'Gris Plata Metalizado', 'hex' => '#B9BCBF', 'image' => ''],
                ['name' => 'Gris Oscuro Metalizado', 'hex' => '#55585C', 'image' => ''],
                ['name' => 'Negro Mica', 'hex' => '#141414', 'image' => ''],
                ['name' => 'Rojo Mica Metalizado', 'hex' => '#9E1B22', 'image' => ''],
            ],
            'safety' => ['vsc', 'trc', 'hac', 'abs', 'isofix'],
            'airbags' => 7,
            'features' => ['Android Auto & Apple CarPlay', 'Pantalla táctil multimedia'],
            'specs' => [
                'garantia' => [
                    'warranty' => '5 años o 150.000 km',
                    'service_interval' => 'Cada 10.000 km',
                ],
            ],
            'price_note' => 'Precio de lista sujeto a cambios. Consultá planes de financiación Consur.',
        ],
    ],
];
