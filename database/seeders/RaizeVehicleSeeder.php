<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class RaizeVehicleSeeder extends Seeder
{
    public function run(): void
    {
        $brand = Brand::firstOrCreate(
            ['slug' => 'toyota'],
            ['name' => 'Toyota', 'is_active' => true, 'is_featured_menu' => true]
        );

        $category = VehicleCategory::where('slug', 'suv')->first()
            ?? VehicleCategory::first();

        $branch = Branch::first();

        $htmlMedia = [
            ['name' => 'Hero Slide Raize', 'path' => 'images/vehicles/raize/slide_raizehome.jpg'],
            ['name' => 'Faros y Estilo Raize', 'path' => 'images/vehicles/raize/farosraize.jpg'],
            ['name' => 'Diseño Externo Raize Blanca', 'path' => 'images/vehicles/raize/raizeblanca.jpg'],
            ['name' => 'Llantas de Aleación 16"', 'path' => 'images/vehicles/raize/llantas.png'],
            ['name' => 'Faros Delanteros Full LED', 'path' => 'images/vehicles/raize/faros-delanteros.png'],
            ['name' => 'Faros Traseros LED', 'path' => 'images/vehicles/raize/faros-traseros.png'],
            ['name' => 'Interior y Capacidad de Equipaje', 'path' => 'images/vehicles/raize/interiorraize.jpg'],
            ['name' => 'Volante Multifunción', 'path' => 'images/vehicles/raize/volanteraize.jpg'],
            ['name' => 'Sistema de Audio 8"', 'path' => 'images/vehicles/raize/audioraize.jpg'],
            ['name' => 'Pantalla Táctil 8"', 'path' => 'images/vehicles/raize/pantalla.png'],
            ['name' => 'Tablero de Información Múltiple', 'path' => 'images/vehicles/raize/tablero.png'],
            ['name' => 'Espejos Retrovisores', 'path' => 'images/vehicles/raize/espejo.png'],
            ['name' => 'Smart Door Lock / Puertas', 'path' => 'images/vehicles/raize/puertas.png'],
            ['name' => 'Manejo Seguro Raize Roja', 'path' => 'images/vehicles/raize/raizeroja.jpg'],
            ['name' => 'Desempeño Raize', 'path' => 'images/vehicles/raize/desempeno.jpg'],
            ['name' => 'Estabilidad Plataforma', 'path' => 'images/vehicles/raize/estabilidadtoyotaraize.jpg'],
            ['name' => 'Motor 1.2L', 'path' => 'images/vehicles/raize/raizeblanca1.jpg'],
            ['name' => 'Estacionamiento Asistido', 'path' => 'images/vehicles/raize/estacionamientoraize.jpg'],
            ['name' => 'Seguridad Pasiva Airbags', 'path' => 'images/vehicles/raize/seguridad.jpg'],
            ['name' => 'Galería Raize 1', 'path' => 'images/vehicles/raize/raize1.jpg'],
            ['name' => 'Galería Raize 2', 'path' => 'images/vehicles/raize/raize2.jpg'],
            ['name' => 'Galería Raize 3', 'path' => 'images/vehicles/raize/raize3.jpg'],
            ['name' => 'Galería Raize 4', 'path' => 'images/vehicles/raize/raize4.jpg'],
            ['name' => 'Galería Raize 5', 'path' => 'images/vehicles/raize/raize5.jpg'],
            ['name' => 'Galería Raize 6', 'path' => 'images/vehicles/raize/raize6.jpg'],
            ['name' => 'Dimensiones y Especificaciones', 'path' => 'images/vehicles/raize/especificaciones.jpg'],
            ['name' => 'Modelo Raize Urbana', 'path' => 'images/vehicles/raize/modelourbano.jpg'],
            ['name' => 'Modelo Raize Sport', 'path' => 'images/vehicles/raize/modelosport.jpg'],
        ];

        $lexusGallery = Vehicle::renderLexusGallery('Toyota Raize', 'raize', [
            ['image' => '/images/vehicles/raize/raize1.jpg', 'category' => 'exterior'],
            ['image' => '/images/vehicles/raize/raize3.jpg', 'category' => 'exterior'],
            ['image' => '/images/vehicles/raize/raize6.jpg', 'category' => 'exterior'],
            ['image' => '/images/vehicles/raize/raize2.jpg', 'category' => 'interior'],
            ['image' => '/images/vehicles/raize/raize4.jpg', 'category' => 'interior'],
            ['image' => '/images/vehicles/raize/raize5.jpg', 'category' => 'interior'],
        ]);

        $customHtml = <<<HTML
<!-- ================= 1. ESTILO DISTINTIVO & DISEÑO EXTERNO ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        <!-- Bloque 1: Estilo distintivo y diseño dinámico -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/raize/farosraize.jpg" alt="Estilo distintivo y diseño dinámico Toyota Raize" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    ADN SUV Compacto
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Estilo distintivo y diseño dinámico
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva <strong>RAIZE</strong> tiene una cabina espaciosa para equipaje y facilidad de conducción gracias a su plataforma con excelente visibilidad y estabilidad.
                </p>
            </div>
        </div>

        <!-- Bloque 2: Diseño Externo -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Presencia Exterior
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Diseño Externo
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Tiene una cabina deportiva con perfil bajo que crea una apariencia ágil que inspira confianza y solidez.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-white p-4">
                    <img src="/images/vehicles/raize/raizeblanca.jpg" alt="Diseño Externo Toyota Raize" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ================= 2. FRANJA ROJA DE EQUIPAMIENTO EXTERIOR ================= -->
<section class="py-14 bg-gradient-to-r from-[#9e1920] via-[#b31f26] to-[#9e1920] text-white shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/raize/llantas.png" alt="Llantas de aleación 16 pulgadas" class="w-full h-full object-cover">
                </div>
                <p class="text-base sm:text-lg text-white">
                    <strong>Llantas de aleación</strong> 16″ – 205/65R16
                </p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/raize/faros-delanteros.png" alt="Faros delanteros full LED" class="w-full h-full object-cover">
                </div>
                <p class="text-base sm:text-lg text-white">
                    <strong>Faros delanteros full LED</strong>
                </p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/raize/faros-traseros.png" alt="Faros traseros de freno LED" class="w-full h-full object-cover">
                </div>
                <p class="text-base sm:text-lg text-white">
                    <strong>Faros traseros de freno LED</strong>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÑO INTERIOR & CAPACIDAD DE EQUIPAJE ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Confort & Habitabilidad</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                Diseño Interior
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El interior cuenta con excelente visibilidad, una cabina que proporciona una atmósfera divertida para mayor placer de conducción.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200/80">
            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden shadow-md">
                    <img src="/images/vehicles/raize/interiorraize.jpg" alt="Capacidad de Equipaje Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">
                    Espacio Inteligente
                </span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Capacidad de Equipaje
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva <strong>RAIZE</strong> tiene una capacidad de equipaje líder en su clase, con varios espacios de almacenamiento y un espacio de carga de primera clase de <strong>369 L (m³)</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. TECNOLOGÍA & CONECTIVIDAD ================= -->
<section id="tecnologia" class="py-16 md:py-24 bg-white space-y-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Innovación a Bordo</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                Tecnología
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva RAIZE cuenta con un panel de instrumentos optimizados que proporcionan una excelente usabilidad y una forma atractiva, ya que el área de control de audio y clima están orientados hacia el asiento del conductor para mejorar la operatividad.
            </p>
        </div>

        <!-- Volante -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Volante
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Los controles montados en el volante permiten al conductor operar funciones como el sistema de audio, la pantalla de información múltiple y el modo de potencia mientras mantiene ambas manos en el volante.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/volanteraize.jpg" alt="Volante Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Sistema de Audio -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/audioraize.jpg" alt="Sistema de audio Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Sistema de audio
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Pantalla de 8" garantizando excelente visibilidad, sistema con conectividad <strong>Apple CarPlay y Android Auto</strong> y una entrada externa de USB que permite la conectividad con dispositivos externos.
                </p>
            </div>
        </div>

        <!-- 4 Tarjetas de Equipamiento Tecnológico -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-4">
            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/pantalla.png" alt="Pantalla táctil de 8 pulgadas" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Sistema de audio con <strong>pantalla táctil de 8″</strong> con <strong>Bluetooth</strong> y entrada <strong>USB</strong>. Conectividad <strong>Android Auto &amp; Apple CarPlay</strong>
                </p>
            </div>

            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/tablero.png" alt="Sistema de información múltiple en tablero" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Sistema de <strong>información múltiple en tablero</strong>
                </p>
            </div>

            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/espejo.png" alt="Espejos retrovisores" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Espejo <strong>retrovisor interno</strong> para día/noche. Espejo <strong>retrovisor externo ajustable eléctricamente</strong>
                </p>
            </div>

            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/puertas.png" alt="Wireless Smart Door Lock" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Sistema de <strong>cierre de puertas sin llave</strong> (Wireless Smart Door Lock). Sistema <strong>Anti-robo con inmovilizador</strong>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video Catálogo Raize" src="https://www.youtube.com/embed/l3HTqjEjxrE?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 6. MANEJO, DESEMPEÑO, ESTABILIDAD Y MOTOR ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        <!-- Manejo seguro y divertido -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/raizeroja.jpg" alt="La Raize promete un manejo seguro y divertido" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading leading-tight">
                    La Raize promete un manejo seguro y divertido
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Su motor hace toda la diferencia, ofreciendo con su manejo una experiencia muy diferente al de otras SUVS. Y además, con la tranquilidad que da el equipamiento de seguridad que define a Toyota.
                </p>
            </div>
        </div>

        <!-- Desempeño -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Desempeño
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La optimización precisa del motor y los componentes relacionados de la nueva RAIZE permiten un vehículo silencioso, compacto y ligero.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/desempeno.jpg" alt="Desempeño Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Estabilidad -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/estabilidadtoyotaraize.jpg" alt="Estabilidad Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Estabilidad
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Plataforma recientemente desarrollada con aceros de alta resistencia que simplifican la estructura y mejoran su rigidez tanto en carretera como en ciudad.
                </p>
            </div>
        </div>

        <!-- Motor -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Motor
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva RAIZE, con su motor <strong>1.2L de 3 cilindros en línea</strong> de nuevo desarrollo, proporciona un equilibrio óptimo entre la eficiencia del combustible y el rendimiento de la aceleración.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/raizeblanca1.jpg" alt="Motor 1.2L Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ================= 7. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-slate-50 border-t border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Protección Integral Toyota</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                Seguridad
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva RAIZE cuenta con un sistema de seguridad de frenos antibloqueo (ABS), control de estabilidad del vehículo (VSC) y un asistente de control de partida (HAC), asegurando la estabilidad de conducción.
            </p>
        </div>

        <!-- Estacionamiento -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-xs border border-slate-200/80">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Estacionamiento
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Los controles montados en el volante y asistencias de maniobra permiten al conductor operar funciones clave del sistema de audio, pantalla de información múltiple y sensores mientras mantiene el control seguro en todo momento.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-2xl overflow-hidden shadow-md">
                    <img src="/images/vehicles/raize/estacionamientoraize.jpg" alt="Estacionamiento Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Seguridad Pasiva -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-xs border border-slate-200/80">
            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden shadow-md">
                    <img src="/images/vehicles/raize/seguridad.jpg" alt="Seguridad Pasiva Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Seguridad Pasiva
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva RAIZE cuenta con <strong>2 bolsas de aire</strong> y todos los asientos están equipados con cinturones de seguridad ELR de 3 puntos que contribuyen a la protección de los ocupantes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 8. GALERÍA FOTOGRÁFICA ================= -->
{$lexusGallery}

<!-- ================= 9. ESPECIFICACIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-slate-50 border-t border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-12 shadow-sm border border-slate-200/80">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/raize/especificaciones.jpg" alt="Especificaciones Toyota Raize" class="w-full h-auto rounded-2xl object-contain mx-auto">
            </div>
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">Dimensiones y Capacidades</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Especificaciones
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Longitud</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">4.030 mm</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Ancho</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">1.710 mm</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Capacidad de carga</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">369 L (m³)</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Depósito de combustible</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">36 Litros</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 10. MODELOS (RAIZE URBANA & RAIZE SPORT) ================= -->
<section id="modelos" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Oficiales</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Raize Urbana -->
            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Raize Urbana
                    </h3>
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/raize/modelourbano.jpg" alt="Toyota Raize Urbana" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/asset/pdf/download-brochures/catalogo_raize.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- Raize Sport -->
            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Raize Sport
                    </h3>
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/raize/modelosport.jpg" alt="Toyota Raize Sport" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/asset/pdf/download-brochures/catalogo_raize.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>

        <div class="text-center pt-4">
            <span class="text-xs text-slate-400 font-mono">
                CONSUR S.A. Concesionario Oficial
            </span>
        </div>
    </div>
</section>
HTML;

        $vehicle = Vehicle::updateOrCreate(
            ['slug' => 'raize'],
            [
                'condition' => '0km',
                'brand_id' => $brand->id,
                'vehicle_category_id' => $category?->id,
                'branch_id' => $branch?->id,
                'model' => 'Raize',
                'version' => 'Urbana / Sport 1.2L',
                'year' => 2026,
                'show_price' => false,
                'mileage_km' => 0,
                'fuel_type' => 'Nafta',
                'transmission' => 'Automática',
                'traction' => '4x2',
                'engine' => '1.2L 3 cilindros en línea',
                'doors' => 5,
                'airbags' => 2,
                'tagline' => 'Estilo distintivo y diseño dinámico',
                'description' => 'La nueva RAIZE tiene una cabina espaciosa para equipaje y facilidad de conducción gracias a su plataforma con excelente visibilidad y estabilidad.',
                'brochure_url' => 'https://www.toyota.com.py/asset/pdf/download-brochures/catalogo_raize.pdf',
                'video_url' => 'https://www.youtube.com/watch?v=l3HTqjEjxrE',
                'is_featured' => true,
                'status' => 'disponible',
                'hero_banners' => [
                    'images/vehicles/raize/slide_raizehome.jpg',
                ],
                'custom_html' => $customHtml,
                'html_media' => $htmlMedia,
            ]
        );

        // Asegurar imagen de portada y galería base para las tarjetas del catálogo
        $vehicle->images()->delete();
        $vehicle->images()->createMany([
            ['image_path' => 'images/vehicles/raize/raizeblanca.jpg', 'is_main' => true, 'sort_order' => 1],
            ['image_path' => 'images/vehicles/raize/slide_raizehome.jpg', 'is_main' => false, 'sort_order' => 2],
            ['image_path' => 'images/vehicles/raize/raize1.jpg', 'is_main' => false, 'sort_order' => 3],
            ['image_path' => 'images/vehicles/raize/raize2.jpg', 'is_main' => false, 'sort_order' => 4],
            ['image_path' => 'images/vehicles/raize/raize3.jpg', 'is_main' => false, 'sort_order' => 5],
        ]);
    }
}

