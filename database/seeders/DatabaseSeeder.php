<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Lead;
use App\Models\Podcast;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuarios del Sistema
        $admin = User::firstOrCreate(
            ['email' => 'admin@consur.com.py'],
            [
                'name' => 'Administrador General Consur',
                'phone' => '+595 985 804 106',
                'role' => 'super_admin',
                'is_active' => true,
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        $salesUser = User::firstOrCreate(
            ['email' => 'ventas@consur.com.py'],
            [
                'name' => 'Asesor de Ventas 0KM & Usados',
                'phone' => '+595 985 204 106',
                'role' => 'ventas',
                'is_active' => true,
                'password' => Hash::make('ventas123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Marcas
        $toyota = Brand::create(['name' => 'Toyota', 'slug' => 'toyota', 'sort_order' => 1]);
        $lexus = Brand::create(['name' => 'Lexus', 'slug' => 'lexus', 'sort_order' => 2]);
        $jeep = Brand::create(['name' => 'Jeep', 'slug' => 'jeep', 'sort_order' => 3]);
        $kia = Brand::create(['name' => 'Kia', 'slug' => 'kia', 'sort_order' => 4]);
        $hyundai = Brand::create(['name' => 'Hyundai', 'slug' => 'hyundai', 'sort_order' => 5]);

        // 3. Categorías de Carrocería
        $catSedan = VehicleCategory::create(['name' => 'Sedán', 'slug' => 'sedan', 'icon' => 'fa-car-side', 'sort_order' => 1]);
        $catSuv = VehicleCategory::create(['name' => 'SUV', 'slug' => 'suv', 'icon' => 'fa-shuttle-van', 'sort_order' => 2]);
        $catCamioneta = VehicleCategory::create(['name' => 'Camioneta', 'slug' => 'camioneta', 'icon' => 'fa-truck-pickup', 'sort_order' => 3]);
        $catHatchback = VehicleCategory::create(['name' => 'Hatchback', 'slug' => 'hatchback', 'icon' => 'fa-car', 'sort_order' => 4]);
        $catHibrido = VehicleCategory::create(['name' => 'Híbridos', 'slug' => 'hibridos', 'icon' => 'fa-leaf', 'sort_order' => 5]);

        // 4. Sucursales de Consur S.A.
        $branchEncarnacion = Branch::create([
            'name' => 'Consur S.A. – Casa Central Encarnación',
            'city' => 'Encarnación',
            'address' => 'Ruta 1 Km 2.5 y Avda. San Roque González',
            'phone' => '+595 71 204 106',
            'whatsapp' => '+595985804106',
            'email' => 'ventas@consur.com.py',
            'schedule_weekdays' => 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:00 Hs.',
            'schedule_saturday' => 'Sábados: de 07:30 a 12:00 Hs.',
            'google_maps_url' => 'https://maps.google.com/?q=Consur+SA+Toyota+Encarnacion',
            'has_workshop' => true,
            'has_mobile_workshop' => true,
            'sort_order' => 1,
        ]);

        $branchColonias = Branch::create([
            'name' => 'Consur S.A. – Sucursal Colonias Unidas',
            'city' => 'Hohenau',
            'address' => 'Avda. Osvaldo Tischler c/ Ruta 6',
            'phone' => '+595 775 232 400',
            'whatsapp' => '+595985204106',
            'email' => 'colonias@consur.com.py',
            'schedule_weekdays' => 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:00 Hs.',
            'schedule_saturday' => 'Sábados: de 07:30 a 12:00 Hs.',
            'has_workshop' => true,
            'has_mobile_workshop' => true,
            'sort_order' => 2,
        ]);

        // 5. Sliders de Portada
        Slider::create([
            'tag' => 'NUEVO LANZAMIENTO',
            'title' => 'TU AUTO, TU ESTILO',
            'description' => 'Todo lo que buscás en tu primer auto, con el respaldo y la solidez que solo Toyota y Consur te pueden dar.',
            'button_text' => 'Ver detalles de Agya',
            'button_url' => '/#destacados-0km',
            'button_secondary_text' => 'Cotizar Ahora',
            'button_secondary_url' => '#contacto',
            'image_desktop' => 'https://consur.com.py/wp-content/uploads/2025/10/agya-slider.jpg',
            'content_position' => 'left',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Slider::create([
            'tag' => 'LÍDERES EN POSVENTA',
            'title' => 'TALLER MÓVIL EN TU CAMPO',
            'description' => 'Llevamos el servicio técnico oficial y repuestos genuinos directo donde tu producción no se detiene.',
            'button_text' => 'Solicitar Taller Móvil',
            'button_url' => '#taller-movil',
            'image_desktop' => 'https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=1920',
            'content_position' => 'left',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Slider::create([
            'tag' => 'CONSUR USADOS CERTIFICADOS',
            'title' => 'CALIDAD CON GARANTÍA',
            'description' => 'Vehículos con chequeo riguroso de 150 puntos y financiación propia flexible.',
            'button_text' => 'Ver Stock de Usados',
            'button_url' => '/usados',
            'image_desktop' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920',
            'content_position' => 'left',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // 6. Vehículos 0 KM Destacados
        $v0km_1 = Vehicle::create([
            'condition' => '0km',
            'brand_id' => $toyota->id,
            'vehicle_category_id' => $catHatchback->id,
            'branch_id' => $branchEncarnacion->id,
            'model' => 'Agya',
            'version' => '1.0 MT / AT',
            'slug' => 'toyota-agya-0km-2025',
            'year' => 2025,
            'price_usd' => 14900,
            'price_gs' => 116965000,
            'show_price' => true,
            'price_note' => 'Financiación en cuotas corridas en guaraníes o dólares',
            'mileage_km' => 0,
            'fuel_type' => 'Nafta',
            'transmission' => 'Automática / Mecánica',
            'traction' => '4x2 Delantera',
            'engine' => '1.0L 3 Cilindros Dual VVT-i',
            'doors' => 5,
            'color_exterior' => 'Rojo Metalizado, Blanco, Gris Plata',
            'tagline' => 'Tu auto, tu estilo',
            'description' => 'El Toyota Agya es el compacto ideal para moverte por la ciudad con máxima eficiencia de combustible, maniobrabilidad y tecnología con pantalla táctil compatible con Apple CarPlay y Android Auto.',
            'specs' => [
                'Potencia' => '67 HP @ 6000 RPM',
                'Torque' => '89 Nm @ 4400 RPM',
                'Tanque' => '33 Litros',
                'Frenos' => 'ABS + EBD',
                'Airbags' => '2 Frontales + Control de Estabilidad VSC',
                'Consumo Promedio' => '4.8 L / 100 Km'
            ],
            'features' => ['Pantalla Táctil 7"', 'Cámara de Retroceso', 'Apple CarPlay & Android Auto', 'Alarma e Inmovilizador', 'Dirección Asistida Eléctrica'],
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 1,
        ]);

        $v0km_2 = Vehicle::create([
            'condition' => '0km',
            'brand_id' => $toyota->id,
            'vehicle_category_id' => $catCamioneta->id,
            'branch_id' => $branchEncarnacion->id,
            'model' => 'Hilux',
            'version' => 'SRV 4x4 Automática 2.8 Diesel',
            'slug' => 'toyota-hilux-srv-4x4-2025',
            'year' => 2025,
            'price_usd' => 58500,
            'price_gs' => 459225000,
            'show_price' => true,
            'mileage_km' => 0,
            'fuel_type' => 'Diesel',
            'transmission' => 'Automática de 6 Velocidades',
            'traction' => '4x4 con Bloqueo de Diferencial',
            'engine' => '2.8L Turbo Diesel Intercooler 1GD-FTV',
            'doors' => 4,
            'color_exterior' => 'Blanco Perlado, Gris Oscuro, Negro',
            'tagline' => 'La leyenda que nunca se detiene',
            'description' => 'La pickup número uno de Paraguay. Conquistá cualquier terreno con sus 204 HP, chasis reforzado, sistema de seguridad Toyota Safety Sense y máxima capacidad de arrastre.',
            'specs' => [
                'Potencia' => '204 HP @ 3400 RPM',
                'Torque' => '500 Nm @ 1600-2800 RPM',
                'Carga Útil' => '1.000 Kg',
                'Capacidad de Arrastre' => '3.500 Kg con frenos',
                'Seguridad' => '7 Airbags + Toyota Safety Sense (PCS, LDA, ACC)'
            ],
            'features' => ['Toyota Safety Sense', 'Asientos de Cuero con Regulación Eléctrica', 'Audio Premium JBL', 'Bloqueo Diferencial Trasero', 'Climatizador Bi-zona'],
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 2,
        ]);

        $v0km_3 = Vehicle::create([
            'condition' => '0km',
            'brand_id' => $toyota->id,
            'vehicle_category_id' => $catSuv->id,
            'branch_id' => $branchEncarnacion->id,
            'model' => 'Corolla Cross',
            'version' => 'XRE 2.0 Direct Shift CVT',
            'slug' => 'toyota-corolla-cross-xre-2025',
            'year' => 2025,
            'price_usd' => 33900,
            'price_gs' => 266115000,
            'show_price' => true,
            'mileage_km' => 0,
            'fuel_type' => 'Nafta',
            'transmission' => 'CVT de 10 Marchas Simuladas',
            'traction' => '4x2 Delantera',
            'engine' => '2.0L Dynamic Force Dual VVT-iE',
            'doors' => 5,
            'color_exterior' => 'Rojo Granate, Plata Metalizado, Blanco',
            'tagline' => 'El SUV que redefine tu viaje familiar',
            'description' => 'El Corolla hecho SUV. Espacio generoso, baúl de 440 litros, techo solar, climatizador automático y la máxima suavidad de marcha.',
            'specs' => [
                'Potencia' => '170 HP @ 6600 RPM',
                'Torque' => '200 Nm @ 4400-4800 RPM',
                'Baúl' => '440 Litros',
                'Seguridad' => '7 Airbags + Frenos a Disco en las 4 Ruedas + VSC'
            ],
            'features' => ['Techo Solar Eléctrico', 'Pantalla Multimedia 9"', 'Sensor de Estacionamiento Delantero y Trasero', 'Llantas 18" Diamantadas'],
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 3,
        ]);

        $v0km_4 = Vehicle::create([
            'condition' => '0km',
            'brand_id' => $toyota->id,
            'vehicle_category_id' => $catSuv->id,
            'branch_id' => $branchEncarnacion->id,
            'model' => 'RAV4',
            'version' => 'Limited AWD Hybrid',
            'slug' => 'toyota-rav4-hybrid-limited-2025',
            'year' => 2025,
            'price_usd' => 52900,
            'price_gs' => 415265000,
            'show_price' => true,
            'mileage_km' => 0,
            'fuel_type' => 'Híbrido',
            'transmission' => 'e-CVT Eléctrica Continua',
            'traction' => 'AWD Eléctrico Inteligente E-Four',
            'engine' => '2.5L 4 Cilindros + 3 Motores Eléctricos (222 HP)',
            'doors' => 5,
            'color_exterior' => 'Gris Grafito, Blanco Nieve, Azul Cósmico',
            'tagline' => 'Pionero en tecnología híbrida y elegancia',
            'description' => 'Potencia combinada de 222 HP con tracción integral electrónica, cargador inalámbrico de celular, portón trasero eléctrico manos libres y un consumo increíble de más de 800 km por tanque.',
            'specs' => [
                'Potencia Combinada' => '222 HP',
                'Tracción' => 'AWD E-Four Eléctrica',
                'Consumo Urbano' => '4.2 L / 100 Km',
                'Garantía Batería' => '8 años o 160.000 Km oficial Toyota'
            ],
            'features' => ['Toyota Safety Sense 2.0', 'Cargador Inalámbrico', 'Portón Eléctrico con Sensor de Pie', 'Techo Panorámico', 'Asientos Ventilados'],
            'is_hybrid' => true,
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 4,
        ]);

        // 7. Vehículos Usados Certificados Oficiales de Consur S.A.
        $this->call(UsadosVehiclesSeeder::class);

        // 8. Fotos de Galería para los vehículos 0km
        $imagesData = [
            $v0km_1->id => [
                'https://consur.com.py/wp-content/uploads/2025/10/agya-slider.jpg',
                'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1200',
                'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1200',
            ],
            $v0km_2->id => [
                'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1200',
                'https://images.unsplash.com/photo-1594502184342-2e12f877aa73?auto=format&fit=crop&q=80&w=1200',
            ],
            $v0km_3->id => [
                'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1200',
                'https://images.unsplash.com/photo-1550346046-d2ebaa11ba47?auto=format&fit=crop&q=80&w=1200',
            ],
            $v0km_4->id => [
                'https://images.unsplash.com/photo-1594502184342-2e12f877aa73?auto=format&fit=crop&q=80&w=1200',
                'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1200',
            ],
        ];

        foreach ($imagesData as $vId => $imgs) {
            foreach ($imgs as $idx => $img) {
                VehicleImage::create([
                    'vehicle_id' => $vId,
                    'image_path' => $img,
                    'is_main' => ($idx === 0),
                    'sort_order' => $idx + 1,
                ]);
            }
        }

        // 9. Leads de prueba iniciales
        Lead::create([
            'type' => 'cotizacion',
            'vehicle_id' => $v0km_1->id,
            'branch_id' => $branchEncarnacion->id,
            'full_name' => 'Carlos Benítez',
            'email' => 'carlos.benitez@gmail.com',
            'phone' => '+595 981 555 123',
            'city' => 'Encarnación',
            'message' => 'Hola, me gustaría saber planes de financiación para el nuevo Agya con entrega inicial de 3.000 USD.',
            'financing_plan' => 'Entrega inicial + 36 cuotas',
            'status' => 'nuevo',
            'ip_address' => '127.0.0.1',
        ]);

        Lead::create([
            'type' => 'usado_interes',
            'vehicle_id' => $vUsado_1->id,
            'branch_id' => $branchEncarnacion->id,
            'full_name' => 'María Elena Ortiz',
            'email' => 'maria.ortiz@hotmail.com',
            'phone' => '+595 975 444 888',
            'city' => 'Posadas / Encarnación',
            'message' => 'Buenas tardes, quiero probar la RAV4 Híbrida 2021 este sábado por la mañana.',
            'preferred_date' => now()->addDays(3)->format('Y-m-d'),
            'preferred_time' => '10:00',
            'status' => 'en_gestion',
            'internal_notes' => 'Se le agendó llamada para confirmar disponibilidad de vehículo.',
            'ip_address' => '127.0.0.1',
        ]);

        // 10. Testimonios
        Testimonial::create([
            'client_name' => 'Ing. Fernando Gamarra',
            'vehicle_model' => 'Toyota Hilux SRV 4x4',
            'city' => 'Itapúa',
            'comment' => 'El servicio de Taller Móvil de Consur es invaluable para los que trabajamos en el campo. Vinieron a mi estancia para el service oficial sin perder un solo día de trabajo.',
            'rating' => 5,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Testimonial::create([
            'client_name' => 'Dra. Patricia Villalba',
            'vehicle_model' => 'Toyota Corolla Cross Hybrid',
            'city' => 'Encarnación',
            'comment' => 'Compré mi vehículo usado con certificación de Consur y la tranquilidad que te dan es total. El consumo de combustible es mínimo y la atención posventa impecable.',
            'rating' => 5,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // 11. Podcast
        Podcast::create([
            'episode_number' => 'Episodio 12',
            'title' => 'Tecnología Híbrida Toyota: Mitos, Realidades y Ahorro en Paraguay',
            'description' => 'Conversamos con ingenieros de Toyota y especialistas sobre cómo funciona el sistema híbrido autorrecargable y su rendimiento en rutas de nuestro país.',
            'guest_name' => 'Equipo Técnico Oficial Consur',
            'spotify_url' => 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2',
            'youtube_url' => 'https://youtube.com',
            'cover_image' => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?auto=format&fit=crop&q=80&w=600',
            'duration' => '42 min',
            'published_date' => now()->subDays(10),
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // 12. Configuraciones Generales
        Setting::set('company_name', 'Consur S.A. – Concesionaria Oficial Toyota', 'general', 'Nombre de Empresa');
        Setting::set('contact_phone', '+595 985 804 106', 'contact', 'Teléfono de Contact Center');
        Setting::set('contact_whatsapp', '595985204106', 'contact', 'WhatsApp Principal (sin +)');
        Setting::set('contact_email', 'contacto@consur.com.py', 'contact', 'Email de Contacto');
        Setting::set('usd_to_pyg_rate', '7850', 'finance', 'Tipo de Cambio USD a Guaraníes (₲)');
        Setting::set('schedule_info', 'Lunes a Viernes: 7:00 a 12:00 • 14:00 a 17:00 | Sábados: 7:30 a 12:00', 'general', 'Horarios de Atención');
        Setting::set('turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131', 'general', 'Enlace de Turnos Online');
        Setting::set('facebook_url', 'https://www.facebook.com/ConsurToyota/', 'social', 'Facebook URL');
        Setting::set('instagram_url', 'https://www.instagram.com/consur_toyota/', 'social', 'Instagram URL');
        Setting::set('tiktok_url', 'https://www.tiktok.com/@consurtoyota', 'social', 'TikTok URL');
        Setting::set('spotify_url', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2', 'social', 'Spotify URL');

        // Log inicial de sistema
        ActivityLog::create([
            'user_id' => $admin->id,
            'action' => 'system_init',
            'description' => 'Inicialización de datos del sistema, vehículos mock y configuraciones maestras.',
            'ip_address' => '127.0.0.1',
        ]);

        // Vehículos 0 Km con diseño HTML personalizado (Raize + catálogo completo 0 Km)
        $this->call([
            RaizeVehicleSeeder::class,
            ZeroKmVehiclesSeeder::class,
        ]);
    }
}
