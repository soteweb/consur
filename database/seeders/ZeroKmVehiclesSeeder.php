<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class ZeroKmVehiclesSeeder extends Seeder
{
    public function run(): void
    {
        $brand = Brand::firstOrCreate(
            ['slug' => 'toyota'],
            ['name' => 'Toyota', 'is_active' => true, 'is_featured_menu' => true]
        );

        $catSuv = VehicleCategory::firstOrCreate(
            ['slug' => 'suv'],
            ['name' => 'SUV', 'icon' => 'fa-shuttle-van', 'sort_order' => 2]
        );
        $catSedan = VehicleCategory::firstOrCreate(
            ['slug' => 'sedan'],
            ['name' => 'Sedán', 'icon' => 'fa-car-side', 'sort_order' => 1]
        );
        $catCamioneta = VehicleCategory::firstOrCreate(
            ['slug' => 'camioneta'],
            ['name' => 'Camioneta', 'icon' => 'fa-truck-pickup', 'sort_order' => 3]
        );
        $catHatchback = VehicleCategory::firstOrCreate(
            ['slug' => 'hatchback'],
            ['name' => 'Hatchback', 'icon' => 'fa-car', 'sort_order' => 4]
        );
        $catUtil = VehicleCategory::firstOrCreate(
            ['slug' => 'utilitario'],
            ['name' => 'Utilitario / Van', 'icon' => 'fa-van-shuttle', 'sort_order' => 6]
        );

        $branch = Branch::first();

        // Eliminar los 4 registros mock iniciales de 0Km si existen con slugs antiguos para evitar duplicados
        Vehicle::where('condition', '0km')
            ->whereIn('slug', [
                'toyota-agya-0km-2025',
                'toyota-hilux-srv-4x4-2025',
                'toyota-corolla-cross-xre-2025',
                'toyota-rav4-hybrid-limited-2025',
            ])
            ->each(function (Vehicle $v) {
                $v->images()->delete();
                $v->delete();
            });

        $this->seedRush($brand, $catSuv, $branch);
        $this->seedCorolla($brand, $catSedan, $branch);
        $this->seedCorollaCross($brand, $catSuv, $branch);
        $this->seedAgya($brand, $catHatchback, $branch);
        $this->seedRav4($brand, $catSuv, $branch);
        $this->seedYarisCross($brand, $catSuv, $branch);
        $this->seedLandCruiser300($brand, $catSuv, $branch);
        $this->seedHiluxCabinaSimple($brand, $catCamioneta, $branch);
        $this->seedLandCruiserPrado($brand, $catSuv, $branch);
        $this->seedHiace($brand, $catUtil, $branch);
        $this->seedFortuner($brand, $catSuv, $branch);
        $this->seedHilux($brand, $catCamioneta, $branch);
    }

    private function upsertZeroKm(array $data, array $galleryPaths): void
    {
        $slug = $data['slug'];
        unset($data['slug']);

        $fillable = array_flip((new Vehicle())->getFillable());
        $data = array_intersect_key($data, $fillable);

        $vehicle = Vehicle::updateOrCreate(
            ['slug' => $slug],
            $data
        );

        $vehicle->images()->delete();
        $imagesPayload = [];
        foreach ($galleryPaths as $idx => $path) {
            $imagesPayload[] = [
                'image_path' => $path,
                'is_main' => $idx === 0,
                'sort_order' => $idx + 1,
            ];
        }
        if (!empty($imagesPayload)) {
            $vehicle->images()->createMany($imagesPayload);
        }
    }

    private function seedRush($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Rush', 'path' => 'images/vehicles/rush/slider_rush.jpg'],
            ['name' => 'Portada Catálogo Rush', 'path' => 'images/vehicles/rush/home_rush.jpg'],
            ['name' => 'Estilo Único Rush 1', 'path' => 'images/vehicles/rush/rush1.jpg'],
            ['name' => 'Confort e Interior Rush 2', 'path' => 'images/vehicles/rush/rush2.jpg'],
            ['name' => 'Seguridad Rush 3', 'path' => 'images/vehicles/rush/rush3.jpg'],
            ['name' => 'Modelo Rush 1.5', 'path' => 'images/vehicles/rush/rush-mec.jpg'],
            ['name' => 'Galería Rush 1', 'path' => 'images/vehicles/rush/rush-1.jpg'],
            ['name' => 'Galería Rush 2', 'path' => 'images/vehicles/rush/rush-2.jpg'],
            ['name' => 'Galería Rush 3', 'path' => 'images/vehicles/rush/rush-3.jpg'],
            ['name' => 'Galería Rush 4', 'path' => 'images/vehicles/rush/rush-4.jpg'],
            ['name' => 'Galería Rush 5', 'path' => 'images/vehicles/rush/rush-5.jpg'],
            ['name' => 'Galería Rush 6', 'path' => 'images/vehicles/rush/rush-6.jpg'],
            ['name' => 'Galería Rush 7', 'path' => 'images/vehicles/rush/rush-7.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. ESTILO ÚNICO Y SOFISTICADO ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/rush/rush1.jpg" alt="Estilo Único y Sofisticado Toyota Rush" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    SUV para 7 Pasajeros
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Estilo Único y Sofisticado
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La <strong>Toyota Rush</strong> está preparada para llevarte por cualquier camino. Ofrece a sus usuarios configuraciones de <strong>7 pasajeros</strong>, asientos abatibles para mayor carga, potente sistema de frenos ABS y asistencia electrónica completa.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Viene equipada con cierre eléctrico automático de sus 5 puertas cuando el vehículo alcanza una velocidad de 20 km/h, además de un diseño innovador y moderno que combina una sensación de estabilidad y estilo. Diseño frontal aventurero sin dejar de lado lo más importante: la seguridad, uno de los pilares fundamentales de la marca.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. DESEMPEÑO Y CONFORT INTERIOR ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Rendimiento &amp; Confort
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Motor 1.5 Dual VVT-i y Confort para Todos
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Su económico motor de <strong>1.5L Dual VVT-i</strong> presenta un sistema que optimiza continuamente el tiempo de operación de la válvula de admisión y escape de acuerdo con las condiciones de manejo para proporcionar un alto rendimiento. La disposición de <strong>tracción trasera</strong> le permite a la Toyota Rush tener un desempeño mejorado en las subidas, disponible en dos versiones: mecánica y automática.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En confort encontramos múltiples tomas de 12V para mantener los celulares con carga en cualquier momento, una amplia guantera, mandos al volante, botón <strong>Push to Start</strong> y acondicionador de aire independiente para los 7 pasajeros.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-white">
                    <img src="/images/vehicles/rush/rush2.jpg" alt="Confort e Interior Toyota Rush" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden shadow-lg">
                    <img src="/images/vehicles/rush/rush3.jpg" alt="Seguridad Toyota Rush" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-5">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Protección Integral
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Seguridad Completa y Versátil
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En cuanto a seguridad, <strong>sonar trasero y cámara de retroceso</strong>, control de estabilidad (<strong>VSC</strong>), frenos <strong>ABS</strong>, asistente de arranque en pendientes (<strong>HAC</strong>) y <strong>6 bolsas de aire</strong> hacen de esta SUV la más completa y versátil de su categoría.
                </p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
                    <div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 text-center">
                        <strong class="block text-xl font-semibold text-[#b31f26]">6 Airbags</strong>
                        <span class="text-xs text-slate-500">Protección total</span>
                    </div>
                    <div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 text-center">
                        <strong class="block text-xl font-semibold text-[#b31f26]">VSC + HAC</strong>
                        <span class="text-xs text-slate-500">Estabilidad activa</span>
                    </div>
                    <div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 text-center col-span-2 sm:col-span-1">
                        <strong class="block text-xl font-semibold text-[#b31f26]">Cámara + Sonar</strong>
                        <span class="text-xs text-slate-500">Retroceso seguro</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video Toyota Rush" src="https://www.youtube.com/embed/lGx3T3CycLU?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 5. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Disponibles</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Rush Mec. 1.5 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/rush/rush-mec.jpg" alt="Toyota Rush Mec. 1.5" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">
                        Rush Mec. 1.5
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>DIS</strong> (Direct Ignition System)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>SFI</strong> (Sequential Fuel Injection)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Transmisión <strong>Mecánica de 5 velocidades</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>Motor 2NR-VE</strong> 1.5L Dual VVT-i</span></li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/rush.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- Rush Automática -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/rush/rush-mec.jpg" alt="Toyota Rush Automática" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">
                        Rush Automática
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>DIS</strong> (Direct Ignition System)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>SFI</strong> (Sequential Fuel Injection)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Transmisión <strong>Automática (4 velocidades)</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Combustible <strong>Gasolina / Nafta</strong></span></li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/rush.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_rush = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/rush/rush-1.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-2.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-3.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-7.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-4.jpg","category":"interior"},{"image":"/images/vehicles/rush/rush-5.jpg","category":"interior"},{"image":"/images/vehicles/rush/rush-6.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_rush_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_rush()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_rush_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Rush · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'rush',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Rush',
            'version' => '1.5 Dual VVT-i (Mecánica / Automática)',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Nafta',
            'transmission' => 'Automática / Mecánica',
            'traction' => '4x2 Trasera',
            'engine' => '1.5L Dual VVT-i (2NR-VE)',
            'doors' => 5,
            'seats' => 7,
            'airbags' => 6,
            'tagline' => 'Estilo Único y Sofisticado',
            'description' => 'La Toyota Rush está preparada para llevarte por cualquier camino con capacidad para 7 pasajeros, tracción trasera y 6 bolsas de aire.',
            'brochure_url' => 'https://toyota.com.py/pdf/rush.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=lGx3T3CycLU',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 2,
            'hero_banners' => ['images/vehicles/rush/slider_rush.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/rush/home_rush.jpg',
            'images/vehicles/rush/slider_rush.jpg',
            'images/vehicles/rush/rush-1.jpg',
            'images/vehicles/rush/rush-2.jpg',
            'images/vehicles/rush/rush-3.jpg',
        ]);
    }

    private function seedCorolla($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Corolla', 'path' => 'images/vehicles/corolla/slider_corolla.jpg'],
            ['name' => 'Portada Catálogo Corolla', 'path' => 'images/vehicles/corolla/corolla.png'],
            ['name' => 'Frente Corolla', 'path' => 'images/vehicles/corolla/frente-corolla.jpg'],
            ['name' => 'Interior Corolla', 'path' => 'images/vehicles/corolla/interior-corolla.jpg'],
            ['name' => 'Modelo Corolla GLi', 'path' => 'images/vehicles/corolla/corollagris.png'],
            ['name' => 'Modelo Corolla Altis Hybrid', 'path' => 'images/vehicles/corolla/corolla-cobalto.png'],
            ['name' => 'Galería Corolla 1', 'path' => 'images/vehicles/corolla/gli1.jpg'],
            ['name' => 'Galería Corolla 2', 'path' => 'images/vehicles/corolla/gli2.jpg'],
            ['name' => 'Galería Corolla 3', 'path' => 'images/vehicles/corolla/gli3.jpg'],
            ['name' => 'Galería Corolla 4', 'path' => 'images/vehicles/corolla/gli4.jpg'],
            ['name' => 'Galería Corolla 5', 'path' => 'images/vehicles/corolla/gli5.jpg'],
            ['name' => 'Galería Corolla 6', 'path' => 'images/vehicles/corolla/gli6.jpg'],
            ['name' => 'Galería Corolla 7', 'path' => 'images/vehicles/corolla/gli7.jpg'],
            ['name' => 'Galería Corolla 8', 'path' => 'images/vehicles/corolla/gli8.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. DISEÑO FANTÁSTICO & TECNOLOGÍA HÍBRIDA ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    El Sedán Más Vendido del Mundo
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Fantástico en cada detalle
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El mundo avanza y Toyota lo sabe, por eso ahora nuestro vehículo más vendido en todo el mundo también está disponible en versión híbrida. El diseño, dinamismo, confort y calidad de <strong>Corolla</strong> se fusionan perfectamente con la tecnología híbrida de Toyota, que te dará mayor desempeño y eficiencia al manejar. Este Corolla es un automóvil completamente renovado desde su estructura, electrónica y chasis, hasta su acabado, equipamiento estándar y motorización.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El <strong>Nuevo Corolla GLi</strong>, con su dinámico, moderno y sofisticado diseño, crea esa sensación de alta calidad y continúa ganándose el corazón y la mente del mundo entero.
                </p>
            </div>
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla/frente-corolla.jpg" alt="Frente Toyota Corolla" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

        <!-- Bloque 2: Motor y Confort Interior -->
        <div id="interior" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla/interior-corolla.jpg" alt="Interior Toyota Corolla" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Eficiencia &amp; Habitáculo
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Potencia Híbrida y Confort Superior
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    No es solo en diseño que el Corolla brilla: su versión híbrida está compuesta por un motor de combustión de <strong>1.8 litros</strong> (101 HP en etanol y 98 HP en gasolina) y dos motores eléctricos de 72 HP. Acoplados a una transmisión automática CVT y frenos regenerativos que recargan automáticamente la batería, entregan una potencia combinada de <strong>122 HP</strong> con una extraordinaria autonomía por tanque.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En su décima segunda generación, el nuevo Toyota Corolla eleva todo lo que siempre te ha encantado de este emblemático modelo: diseño, dinamismo, confort, calidad y ahora más seguro que nunca.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. VIDEOS OFICIALES ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla GLi</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla GLi" src="https://www.youtube.com/embed/932UCVgdWGY?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla Hybrid</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla Hybrid" src="https://www.youtube.com/embed/d9_I0sVBClo?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_corolla = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/corolla/gli1.jpg","category":"exterior"},{"image":"/images/vehicles/corolla/gli2.jpg","category":"exterior"},{"image":"/images/vehicles/corolla/gli3.jpg","category":"exterior"},{"image":"/images/vehicles/corolla/gli4.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli5.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli6.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli7.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli8.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_corolla_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_corolla()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_corolla_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Corolla Sedán · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 4. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Oficiales</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Corolla GLi -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla/corollagris.png" alt="Toyota Corolla GLi" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Corolla GLi
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Transmisión automática con <strong>Direct Shift CVT de 10 velocidades</strong>.</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tapizado en <strong>cuero sintético</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Pantalla de información de <strong>4,2 pulgadas</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Espejo rebatible manual</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Llantas <strong>205/55R16 Alloy</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Faros Halógenos</span></li>
                    </ul>
                </div>
                <a href="https://www.toyota.com.py/pdf/corolla.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- Corolla Altis Hybrid -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla/corolla-cobalto.png" alt="Toyota Corolla Altis Hybrid" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Corolla Altis Hybrid
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Transmisión automática <strong>Hybrid Transaxle CVT</strong> con 4 modos de conducción: Normal, Eco, Power y EV (Eléctrico).</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tapizado en <strong>cuero genuino</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Pantalla de información de <strong>7″</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Espejo rebatible electrónico</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Llantas <strong>225/45R17 Alloy</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Faros <strong>Full LED</strong> y <strong>Techo Solar</strong></span></li>
                    </ul>
                </div>
                <a href="https://www.toyota.com.py/pdf/corolla.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'corolla',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Corolla',
            'version' => 'GLi / Altis Hybrid',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Híbrido',
            'transmission' => 'Automática CVT',
            'traction' => '4x2',
            'engine' => '2.0L Dynamic Force / 1.8L Hybrid',
            'doors' => 4,
            'seats' => 5,
            'airbags' => 7,
            'is_hybrid' => true,
            'tagline' => 'El sedán más vendido del mundo, también en versión Híbrida',
            'description' => 'El diseño, dinamismo, confort y calidad de Corolla se fusionan perfectamente con la tecnología de Toyota para darte mayor desempeño y eficiencia al manejar.',
            'brochure_url' => 'https://www.toyota.com.py/pdf/corolla.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=932UCVgdWGY',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 3,
            'hero_banners' => ['images/vehicles/corolla/slider_corolla.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/corolla/corolla.png',
            'images/vehicles/corolla/slider_corolla.jpg',
            'images/vehicles/corolla/gli1.jpg',
            'images/vehicles/corolla/gli2.jpg',
            'images/vehicles/corolla/gli3.jpg',
        ]);
    }

    private function seedCorollaCross($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Corolla Cross 2025', 'path' => 'images/vehicles/corolla-cross/slidecorollacross2025_1.jpg'],
            ['name' => 'Modelo Naftero 2.0', 'path' => 'images/vehicles/corolla-cross/4936238e-16de-4d37-a078-27ac872bff1a.png'],
            ['name' => 'Modelo Híbrido 1.8', 'path' => 'images/vehicles/corolla-cross/Corolla-Cross-SEG_plata-1.png'],
            ['name' => 'Diseño Corolla Cross', 'path' => 'images/vehicles/corolla-cross/2024_05_22_10_57_IMG_1915.jpg'],
            ['name' => 'Motor Corolla Cross', 'path' => 'images/vehicles/corolla-cross/motorcross.jpg'],
            ['name' => 'Confort y Seguridad', 'path' => 'images/vehicles/corolla-cross/confort.png'],
            ['name' => 'Interior 1', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-33.jpg'],
            ['name' => 'Interior 2', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-35.jpg'],
            ['name' => 'Interior 3', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-36.jpg'],
            ['name' => 'Interior 4', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-41.jpg'],
            ['name' => 'Interior 5', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-42.jpg'],
            ['name' => 'Interior 6', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-43.jpg'],
            ['name' => 'Interior 7', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-44.jpg'],
            ['name' => 'Interior 8', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-45.jpg'],
            ['name' => 'Interior 9', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-50.jpg'],
            ['name' => 'Interior 10', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-51.jpg'],
            ['name' => 'Interior 11', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-52.jpg'],
            ['name' => 'Interior 12', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-58.jpg'],
            ['name' => 'Exterior 1', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-20.jpg'],
            ['name' => 'Exterior 2', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-23.jpg'],
            ['name' => 'Exterior 3', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-24.jpg'],
            ['name' => 'Exterior 4', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-25.jpg'],
            ['name' => 'Exterior 5', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-26.jpg'],
            ['name' => 'Exterior 6', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-28.jpg'],
            ['name' => 'Exterior 7', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-29.jpg'],
            ['name' => 'Exterior 8', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-30.jpg'],
            ['name' => 'Exterior 9', 'path' => 'images/vehicles/corolla-cross/CorollaCrossHybrid-31.jpg'],
            ['name' => 'Exterior 10', 'path' => 'images/vehicles/corolla-cross/CorollaCross-25.jpg'],
            ['name' => 'Exterior 11', 'path' => 'images/vehicles/corolla-cross/CorollaCross-26.jpg'],
            ['name' => 'Exterior 12', 'path' => 'images/vehicles/corolla-cross/CorollaCross-27.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Motorizaciones Disponibles</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading uppercase">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Naftero 2.0 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <span class="inline-block text-xs font-medium uppercase tracking-widest text-slate-600 bg-slate-100 px-3 py-1 rounded-full">Dynamic Force 177 HP</span>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Naftero 2.0
                    </h3>
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla-cross/4936238e-16de-4d37-a078-27ac872bff1a.png" alt="Toyota Corolla Cross Naftero 2.0" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/vehiculo/new-corolla-cross/brochure/Catalogo_digital_Corolla_Cross_2025_240624_.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- Híbrido 1.8 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <span class="inline-block text-xs font-medium uppercase tracking-widest text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">Hybrid Synergy Drive</span>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Híbrido 1.8
                    </h3>
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla-cross/Corolla-Cross-SEG_plata-1.png" alt="Toyota Corolla Cross Híbrido 1.8" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/vehiculo/new-corolla-cross/brochure/Catalogo_digital_Corolla_Cross_2025_240624_.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. DISEÑO ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla-cross/2024_05_22_10_57_IMG_1915.jpg" alt="Diseño Toyota Corolla Cross" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Postura Imponente
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading uppercase tracking-tight leading-tight">
                    Diseño
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La parrilla delantera trapezoidal se combina armoniosamente con los faros LED con luces de circulación diurna (DRL), que confieren al SUV una fuerte identidad y robustez. Las líneas laterales continuas conectan el frontal con las luces traseras LED de forma fluida, dando dinamismo. Las formas sólidas de los guardabarros se fusionan con el vehículo, que tiene una cintura alta y ancha, expresando una postura imponente.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El Corolla Cross está diseñado para manejar con facilidad las carreteras urbanas en mal estado. Con un <strong>ángulo de aproximación de 21°</strong>, los usuarios pueden esperar una mayor capacidad y la consiguiente confianza en caminos irregulares, grandes baches o cunetas pronunciadas en comparación con un sedán.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. MOTOR & DESEMPEÑO ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-5 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-400 bg-red-950/60 px-3 py-1 rounded-full border border-red-800/60">
                    Eficiencia &amp; Potencia
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-white font-heading uppercase tracking-tight">
                    Motor
                </h2>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    <strong>Hybrid Flex System</strong> con 101 caballos de fuerza en el motor de combustión y 72 HP en el motor eléctrico, con un par de 14,5 Kgf.m en el motor de combustión y 16,6 Kgf.m en el eléctrico.
                </p>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    El excelente manejo del Corolla Cross está garantizado por sus motorizaciones: la tecnología híbrida garantiza la máxima eficiencia de combustible y, para la versión a combustión, el nuevo motor <strong>2.0L Dynamic Force que produce 177 caballos de fuerza</strong> ofrece un desempeño superior.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-slate-800">
                    <img src="/images/vehicles/corolla-cross/motorcross.jpg" alt="Motor Toyota Corolla Cross" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. CONFORT Y SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla-cross/confort.png" alt="Confort y Seguridad Corolla Cross" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Toyota Safety Sense (TSS)
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading uppercase tracking-tight leading-tight">
                    Confort y Seguridad
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo Corolla Cross fue diseñado para ofrecer el máximo confort a sus ocupantes y facilitar sus actividades diarias. Con un amplio espacio interno en la cabina y un <strong>maletero de 440 litros</strong>, no tendrá que preocuparse por nada.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo Corolla Cross Hybrid viene equipado con el paquete de seguridad <strong>Toyota Safety Sense (TSS)</strong>: asistente de pre-colisión, control de velocidad crucero adaptativo, sistema de asistencia de carril y luces altas automáticas que brindan tranquilidad a todos a bordo. Además, su conjunto de <strong>7 airbags</strong> (2 delanteros, 2 laterales, 2 de cortina y 1 de rodilla para el conductor), sumado a la carrocería con deformación progresiva, alerta de tráfico cruzado trasero y monitor de punto ciego, protege integralmente a los ocupantes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. VIDEOS ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla Cross Híbrido</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla Cross Híbrido" src="https://www.youtube.com/embed/X1R9sMmLxck?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla Cross XLI</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla Cross XLI" src="https://www.youtube.com/embed/J4WoMlykF-8?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÍA INTERIOR ================= -->
<!-- ================= 7. GALERÍA EXTERIOR ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_corolla_cross = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-20.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-23.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-24.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-25.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-26.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCross-25.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCross-26.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-33.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-35.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-36.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-41.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-42.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-43.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCross-27.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_corolla_cross_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_corolla_cross()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_corolla_cross_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Corolla Cross · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'corolla-cross',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Corolla Cross',
            'version' => 'Naftero 2.0 / Híbrido 1.8',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Híbrido',
            'transmission' => 'Automática CVT',
            'traction' => '4x2',
            'engine' => '2.0L 177 HP / 1.8L Hybrid Flex',
            'doors' => 5,
            'seats' => 5,
            'airbags' => 7,
            'is_hybrid' => true,
            'tagline' => 'Fuerte identidad, robustez y eficiencia híbrida',
            'description' => 'El nuevo Corolla Cross ofrece el máximo confort con maletero de 440L, paquete de seguridad Toyota Safety Sense con 7 airbags y versiones 2.0L o Híbrida 1.8L.',
            'brochure_url' => 'https://www.toyota.com.py/vehiculo/new-corolla-cross/brochure/Catalogo_digital_Corolla_Cross_2025_240624_.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=X1R9sMmLxck',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 4,
            'hero_banners' => ['images/vehicles/corolla-cross/slidecorollacross2025_1.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/corolla-cross/Corolla-Cross-SEG_plata-1.png',
            'images/vehicles/corolla-cross/slidecorollacross2025_1.jpg',
            'images/vehicles/corolla-cross/CorollaCrossHybrid-20.jpg',
            'images/vehicles/corolla-cross/CorollaCrossHybrid-33.jpg',
            'images/vehicles/corolla-cross/CorollaCross-25.jpg',
        ]);
    }

    private function seedAgya($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Agya', 'path' => 'images/vehicles/agya/agyaslide3.jpg'],
            ['name' => 'Portada Catálogo Agya', 'path' => 'images/vehicles/agya/agya.png'],
            ['name' => 'Diseño Exterior Agya', 'path' => 'images/vehicles/agya/agya1.jpg'],
            ['name' => 'Parrilla Frontal Agya', 'path' => 'images/vehicles/agya/agya2.jpg'],
            ['name' => 'Presencia Agya', 'path' => 'images/vehicles/agya/agya3.jpg'],
            ['name' => 'Llantas Agya', 'path' => 'images/vehicles/agya/agyallantas.jpg'],
            ['name' => 'Luces Delanteras', 'path' => 'images/vehicles/agya/agyaluces.jpg'],
            ['name' => 'Luces Traseras', 'path' => 'images/vehicles/agya/agyaluces1.jpg'],
            ['name' => 'Interior Agya 1', 'path' => 'images/vehicles/agya/agya-interior-01.jpg'],
            ['name' => 'Interior Agya 2', 'path' => 'images/vehicles/agya/agya-interior-02.jpg'],
            ['name' => 'Tablero Agya', 'path' => 'images/vehicles/agya/agya-tablero.jpg'],
            ['name' => 'Seguridad Agya', 'path' => 'images/vehicles/agya/agya-seguridad.jpg'],
            ['name' => 'Especificaciones Agya', 'path' => 'images/vehicles/agya/agyaespecificaciones.png'],
            ['name' => 'Color Gris Plata', 'path' => 'images/vehicles/agya/agyagrisplata.png'],
            ['name' => 'Color Naranja', 'path' => 'images/vehicles/agya/agyanaranja.png'],
            ['name' => 'Color Rojo', 'path' => 'images/vehicles/agya/agyarojo.png'],
            ['name' => 'Color Negro', 'path' => 'images/vehicles/agya/agyanegro.png'],
            ['name' => 'Color Gris Oscuro', 'path' => 'images/vehicles/agya/agyagris.png'],
            ['name' => 'Color Blanco', 'path' => 'images/vehicles/agya/agyablanco.png'],
            ['name' => 'Galería Agya 1', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-23.jpg'],
            ['name' => 'Galería Agya 2', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-22.jpg'],
            ['name' => 'Galería Agya 3', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-29.jpg'],
            ['name' => 'Galería Agya 4', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-30.jpg'],
            ['name' => 'Galería Agya 5', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-31.jpg'],
            ['name' => 'Galería Agya 6', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-3.jpg'],
            ['name' => 'Galería Agya 7', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-16.jpg'],
            ['name' => 'Galería Agya 8', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-26.jpg'],
            ['name' => 'Galería Agya 9', 'path' => 'images/vehicles/agya/TOYOTA-AGYA-43.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. DISEÑO EXTERIOR ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Diseño Exterior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/agya/agya1.jpg" alt="Diseño Exterior Toyota Agya" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Moderno · Urbano · Eficiente
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Diseño Exterior
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Diseño moderno y dinámico que combina funcionalidad y estilo. Su estética vanguardista está pensada para la vida urbana, destacando por sus líneas aerodinámicas que no solo le dan una apariencia deportiva, sino que también mejoran la eficiencia.
                </p>
            </div>
        </div>

        <!-- Parrilla Frontal y Presencia -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/9]">
                    <img src="/images/vehicles/agya/agya2.jpg" alt="Parrilla Frontal Toyota Agya" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Parrilla Frontal</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    La parrilla frontal robusta, junto con los faros LED afilados, le otorgan una mirada distintiva y audaz.
                </p>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/9]">
                    <img src="/images/vehicles/agya/agya3.jpg" alt="Presencia Toyota Agya" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Presencia</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    Además, los detalles como las llantas de aleación y los espejos retrovisores con luces direccionales integradas elevan su presencia en la carretera.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. FRANJA OSCURA DE DETALLES EXTERIORES ================= -->
<section class="py-14 bg-[#1e232e] text-white shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/agya/agyallantas.jpg" alt="Llantas Toyota Agya" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Llantas de Aleación</p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/agya/agyaluces.jpg" alt="Luces delanteras Toyota Agya" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Luces delanteras LED</p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/agya/agyaluces1.jpg" alt="Luces traseras Toyota Agya" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Luces traseras</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÑO INTERIOR & TABLERO ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Comodidad Superior</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                Diseño Interior
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El Agya te sorprenderá con un interior espacioso y bien pensado. El espacio ha sido maximizado para ofrecer una comodidad superior tanto para el conductor como para los pasajeros.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/agya/agya-interior-01.jpg" alt="Espacio Interior Toyota Agya" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-600 leading-relaxed">
                    Amplitud optimizada en ambas filas de asientos para disfrutar cada recorrido por la ciudad con total confort.
                </p>
            </div>
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/agya/agya-interior-02.jpg" alt="Asientos Ergonómicos Toyota Agya" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-600 leading-relaxed">
                    Los asientos, con un diseño ergonómico, brindan un soporte excelente para los trayectos diarios.
                </p>
            </div>
        </div>

        <!-- Tablero -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-xs border border-slate-200/80">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/agya/agya-tablero.jpg" alt="Tablero Toyota Agya" class="w-full h-full object-cover rounded-2xl shadow-md">
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Conectividad Intuitiva</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Tablero y Multimedia
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El tablero de instrumentos, moderno y fácil de leer, está complementado por una pantalla táctil de infoentretenimiento que te mantiene conectado y entretenido. Los materiales utilizados, robustos y con un acabado agradable al tacto, junto con la disposición intuitiva de los controles, hacen que cada viaje sea una experiencia placentera y sin complicaciones.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-5 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Tranquilidad en Todo Momento
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Seguridad
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En el Toyota Agya, tu seguridad y la de tus acompañantes es una prioridad. Viene equipado con un conjunto de características de seguridad activa y pasiva diseñadas para protegerte en todo momento:
                </p>
                <ul class="space-y-3 text-sm sm:text-base text-slate-600">
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Cinturones de seguridad de 3 puntos</strong> para todos los ocupantes.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Doble airbag frontal</strong> para conductor y pasajero.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Sistema de anclaje ISOFIX</strong> para la instalación segura de sillas para niños.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>EBD (Distribución Electrónica de la Fuerza de Frenado)</strong> que optimiza la fuerza de frenado en cada rueda.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Frenos ABS (Sistema de Frenos Antibloqueo)</strong> que evitan el bloqueo de las ruedas durante una frenada de emergencia, permitiendo mantener el control.</span></li>
                </ul>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100">
                    <img src="/images/vehicles/agya/agya-seguridad.jpg" alt="Seguridad Toyota Agya" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. COLORES Y GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_agya = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/agya/TOYOTA-AGYA-23.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-22.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-29.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-30.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-31.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-3.jpg","category":"interior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-16.jpg","category":"interior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-26.jpg","category":"interior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-43.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_agya_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_agya()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_agya_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Agya · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 6. ESPECIFICACIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/agya/agyaespecificaciones.png" alt="Especificaciones Toyota Agya" class="w-full h-auto rounded-2xl object-contain mx-auto">
            </div>
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">Especificaciones Técnicas</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Eficiencia y equilibrio
                    </h2>
                    <p class="text-base text-slate-600 leading-relaxed">
                        El corazón del Toyota Agya es su motor, diseñado para ser eficiente y confiable. El motor de 1.0 litro ofrece el equilibrio perfecto entre rendimiento y economía de combustible, ideal para la movilidad urbana.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Motor</span>
                        <strong class="text-base font-semibold text-slate-900">1.0L 3 cilindros en línea DOHC</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Potencia y Torque</span>
                        <strong class="text-base font-semibold text-slate-900">66 CV / 89 Nm a 4.400 rpm</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Transmisión</span>
                        <strong class="text-base font-semibold text-slate-900">Automática CVT / Manual</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Dirección</span>
                        <strong class="text-base font-semibold text-slate-900">Asistida electrónicamente</strong>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="https://consur.com.py/wp-content/uploads/2025/10/Agya_brochure.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'agya',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Agya',
            'version' => '1.0L CVT / MT',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Nafta',
            'transmission' => 'Automática CVT',
            'traction' => '4x2',
            'engine' => '1.0L 3 cilindros en línea DOHC',
            'doors' => 5,
            'seats' => 5,
            'airbags' => 2,
            'tagline' => 'Moderno, urbano y eficiente: todo lo que soñás para tu primer 0 Km',
            'description' => 'Diseño moderno y dinámico que combina funcionalidad, pantalla táctil de infoentretenimiento y máxima eficiencia de combustible.',
            'brochure_url' => 'https://consur.com.py/wp-content/uploads/2025/10/Agya_brochure.pdf',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 5,
            'hero_banners' => ['images/vehicles/agya/agyaslide3.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/agya/agya.png',
            'images/vehicles/agya/agyaslide3.jpg',
            'images/vehicles/agya/TOYOTA-AGYA-23.jpg',
            'images/vehicles/agya/TOYOTA-AGYA-22.jpg',
            'images/vehicles/agya/TOYOTA-AGYA-29.jpg',
        ]);
    }

    private function seedRav4($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero RAV4 Limited', 'path' => 'images/vehicles/rav4/Toyota-RAV4-TEASER-1.jpg'],
            ['name' => 'Portada Catálogo RAV4', 'path' => 'images/vehicles/rav4/rav4limited.png'],
            ['name' => 'Diseño RAV4 1', 'path' => 'images/vehicles/rav4/rav4-1.png'],
            ['name' => 'Tecnología RAV4 2', 'path' => 'images/vehicles/rav4/rav4-2.png'],
            ['name' => 'PCS Alerta Pre-Colisión', 'path' => 'images/vehicles/rav4/rav4-seguridad-1.png'],
            ['name' => '7 Airbags', 'path' => 'images/vehicles/rav4/rav4-seguridad-2.png'],
            ['name' => 'ABS con EBD / BSM', 'path' => 'images/vehicles/rav4/rav4-seguridad-3.png'],
            ['name' => 'LDA Alerta Cambio Carril', 'path' => 'images/vehicles/rav4/rav4-seguridad-5.png'],
            ['name' => 'AHB Luces Altas Adaptativas', 'path' => 'images/vehicles/rav4/rav4-seguridad-6.png'],
            ['name' => 'Performance 1', 'path' => 'images/vehicles/rav4/rav4-performance-1.png'],
            ['name' => 'Performance 2', 'path' => 'images/vehicles/rav4/rav4-performance-2.png'],
            ['name' => 'Especificaciones RAV4', 'path' => 'images/vehicles/rav4/especificaciones.png'],
            ['name' => 'Exterior RAV4 1', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-13.jpg'],
            ['name' => 'Exterior RAV4 2', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-14.jpg'],
            ['name' => 'Exterior RAV4 3', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-15.jpg'],
            ['name' => 'Exterior RAV4 4', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-16.jpg'],
            ['name' => 'Exterior RAV4 5', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-17.jpg'],
            ['name' => 'Exterior RAV4 6', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-18.jpg'],
            ['name' => 'Interior RAV4 1', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-35.jpg'],
            ['name' => 'Interior RAV4 2', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-36.jpg'],
            ['name' => 'Interior RAV4 3', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-37.jpg'],
            ['name' => 'Interior RAV4 4', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-38.jpg'],
            ['name' => 'Interior RAV4 5', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-39.jpg'],
            ['name' => 'Interior RAV4 6', 'path' => 'images/vehicles/rav4/TOYOTA-RAV4-40.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. LA SUV QUE TE IMPULSA A DESCUBRIR MÁS & TECNOLOGÍA ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Nueva Generación 2026
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    La SUV que te impulsa a descubrir más
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva <strong>Toyota RAV4</strong> combina diseño sofisticado, tecnología inteligente y un desempeño excepcional para acompañarte en cada desafío.
                </p>
            </div>
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/rav4/rav4-1.png" alt="Toyota RAV4 Limited" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

        <!-- Bloque 2: Tecnología -->
        <div id="tecnologia" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/rav4/rav4-2.png" alt="Tecnología Toyota RAV4" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Conectividad Inteligente
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Tecnología que simplifica cada viaje
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La experiencia a bordo incorpora avanzadas soluciones de conectividad y entretenimiento, permitiendo mantenerte siempre conectado. Su intuitivo sistema multimedia de <strong>12,9″</strong> con Apple CarPlay® y Android Auto® inalámbricos, junto con múltiples asistencias al conductor, hacen que cada recorrido sea más cómodo y placentero.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. DISEÑO EXTERIOR & INTERIOR ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_rav4 = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/rav4/TOYOTA-RAV4-13.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-14.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-15.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-16.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-17.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-18.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-35.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-36.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-37.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-38.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-39.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-40.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_rav4_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_rav4()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_rav4_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota RAV4 Limited Hybrid · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 3. SEGURIDAD TOYOTA SAFETY SENSE ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Toyota Safety Sense</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Seguridad
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Toyota Safety Sense asiste a la conducción de modo a prevenir o mitigar los peligros aún en situaciones de visibilidad complicada.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-1.png" alt="PCS Alerta de prevención de colisión" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">PCS: Alerta de prevención de colisión</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-2.png" alt="7 Airbags" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">7 Airbags</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-3.png" alt="ABS con EBD" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">ABS con EBD</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-3.png" alt="BSM Monitor de punto ciego" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">BSM: Monitor de punto ciego</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-5.png" alt="LDA Alerta de cambio de carril" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">LDA: Alerta de cambio de carril</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-6.png" alt="AHB Luces altas adaptativas" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">AHB: Luces altas adaptativas</h3>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. PERFORMANCE & VIDEO ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Potencia Híbrida 236 HP</span>
            <h2 class="text-3xl sm:text-4xl font-light text-white font-heading">
                Performance
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-slate-800/80 rounded-3xl p-6 sm:p-8 border border-slate-700 space-y-5">
                <img src="/images/vehicles/rav4/rav4-performance-1.png" alt="Performance Toyota RAV4" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-300 leading-relaxed">
                    <strong>Performance preparado para cualquier desafío.</strong> La nueva Toyota RAV4 2026 combina potencia, eficiencia y respuesta inmediata para ofrecer una conducción ágil y segura en todo tipo de caminos.
                </p>
            </div>
            <div class="bg-slate-800/80 rounded-3xl p-6 sm:p-8 border border-slate-700 space-y-5">
                <img src="/images/vehicles/rav4/rav4-performance-2.png" alt="Motor 2.5L 236 HP RAV4" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-300 leading-relaxed">
                    Su motor <strong>2.5 litros de 4 cilindros entrega 236 HP</strong>, proporcionando una aceleración contundente y una excelente capacidad de respuesta tanto en ciudad como en ruta. Potencia inteligente para llegar más lejos, con la eficiencia y calidad que distinguen a Toyota.
                </p>
            </div>
        </div>

        <div id="video" class="max-w-5xl mx-auto pt-4 space-y-6 text-center">
            <h3 class="text-2xl font-medium uppercase font-heading text-white">Video Oficial</h3>
            <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-black">
                <iframe loading="lazy" title="Video Toyota RAV4 2026" src="https://www.youtube.com/embed/E2t_HL0UgGQ" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. ESPECIFICACIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">Ficha Destacada</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Especificaciones RAV4 2026
                    </h2>
                </div>

                <ul class="space-y-3 text-sm sm:text-base text-slate-700">
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Motor 2.5L de 236 HP</strong> con transmisión automática eCVT.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Modos de conducción: <strong>NORMAL, ECO, SPORT, SNOW, TRAIL y EV</strong>.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Pantalla multimedia de <strong>12,9″</strong> con Apple CarPlay® y Android Auto® inalámbricos.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Tablero digital de <strong>12,3″</strong> y climatizador automático bi-zona.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Faros delanteros y traseros <strong>Full LED</strong> de nuevo diseño.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Sensores de estacionamiento delanteros y traseros.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Apertura eléctrica de baulera con <strong>Kick Sensor</strong>.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Plataforma <strong>TNGA</strong> para mayor estabilidad, confort y eficiencia.</span></li>
                </ul>

                <div class="pt-2">
                    <a href="https://consur.com.py/wp-content/uploads/2026/07/Rav4-2026-CONSUR2026.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-6">
                <img src="/images/vehicles/rav4/especificaciones.png" alt="Dimensiones y Especificaciones RAV4" class="w-full h-auto rounded-2xl object-contain mx-auto bg-white p-4 border border-slate-200/80 shadow-xs">
            </div>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'rav4',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'RAV4',
            'version' => 'Limited 2.5L Hybrid 236 HP',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Híbrido',
            'transmission' => 'Automática eCVT',
            'traction' => 'AWD',
            'engine' => '2.5L 4 cilindros (236 HP)',
            'doors' => 5,
            'seats' => 5,
            'airbags' => 7,
            'is_hybrid' => true,
            'tagline' => 'La SUV que te impulsa a descubrir más',
            'description' => 'La nueva Toyota RAV4 combina diseño sofisticado, pantalla multimedia de 12,9", Toyota Safety Sense y un motor 2.5L de 236 HP.',
            'brochure_url' => 'https://consur.com.py/wp-content/uploads/2026/07/Rav4-2026-CONSUR2026.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=E2t_HL0UgGQ',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 6,
            'hero_banners' => [
                'images/vehicles/rav4/Toyota-RAV4-TEASER-1.jpg',
                'images/vehicles/rav4/TOYOTA-RAV4-13.jpg',
            ],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/rav4/rav4limited.png',
            'images/vehicles/rav4/Toyota-RAV4-TEASER-1.jpg',
            'images/vehicles/rav4/TOYOTA-RAV4-13.jpg',
            'images/vehicles/rav4/TOYOTA-RAV4-35.jpg',
            'images/vehicles/rav4/rav4-1.png',
        ]);
    }

    private function seedYarisCross($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Yaris Cross', 'path' => 'images/vehicles/yaris-cross/SlideYariscross.jpg'],
            ['name' => 'Portada Catálogo Yaris Cross', 'path' => 'images/vehicles/yaris-cross/yariscross.png'],
            ['name' => 'Diseño Exterior 1', 'path' => 'images/vehicles/yaris-cross/yariscross-01.jpg'],
            ['name' => 'Diseño Exterior 2', 'path' => 'images/vehicles/yaris-cross/yariscross-04.jpg'],
            ['name' => 'Diseño Exterior 3', 'path' => 'images/vehicles/yaris-cross/yariscross-02.jpg'],
            ['name' => 'Diseño Trasero', 'path' => 'images/vehicles/yaris-cross/disenotraseroyaris.jpg'],
            ['name' => 'Diseño Lateral', 'path' => 'images/vehicles/yaris-cross/disenolateralyaris.jpg'],
            ['name' => 'Llantas 17"', 'path' => 'images/vehicles/yaris-cross/franjallantas.jpg'],
            ['name' => 'Faros Delanteros', 'path' => 'images/vehicles/yaris-cross/franjafaros.jpg'],
            ['name' => 'Faros Traseros', 'path' => 'images/vehicles/yaris-cross/franjatraseros.jpg'],
            ['name' => 'Interior 1', 'path' => 'images/vehicles/yaris-cross/interioryaris1.jpg'],
            ['name' => 'Interior 2', 'path' => 'images/vehicles/yaris-cross/interioryaris2.jpg'],
            ['name' => 'Interior 3', 'path' => 'images/vehicles/yaris-cross/interioryaris3.jpg'],
            ['name' => 'Interior 4', 'path' => 'images/vehicles/yaris-cross/interioryaris4.jpg'],
            ['name' => 'Capacidad de Equipaje', 'path' => 'images/vehicles/yaris-cross/equipajeyaris.jpg'],
            ['name' => 'Pantalla 10.1"', 'path' => 'images/vehicles/yaris-cross/pantallayaris.jpg'],
            ['name' => 'Seguridad Activa', 'path' => 'images/vehicles/yaris-cross/seguridadyaris1.jpg'],
            ['name' => 'Seguridad Pasiva', 'path' => 'images/vehicles/yaris-cross/seguridadyaris2.jpg'],
            ['name' => 'Estacionamiento', 'path' => 'images/vehicles/yaris-cross/seguridadyaris3.jpg'],
            ['name' => 'Desempeño Híbrido', 'path' => 'images/vehicles/yaris-cross/desempenoyaris1.jpg'],
            ['name' => 'Motor y Transeje', 'path' => 'images/vehicles/yaris-cross/motor-02.jpg'],
            ['name' => 'Especificaciones Yaris Cross', 'path' => 'images/vehicles/yaris-cross/especificacionesyaris1.jpg'],
            ['name' => 'Yaris Cross Hybrid 1.5L', 'path' => 'images/vehicles/yaris-cross/yarishybrid1.5.jpg'],
            ['name' => 'Galería CVT 1', 'path' => 'images/vehicles/yaris-cross/cvt1.jpg'],
            ['name' => 'Galería CVT 2', 'path' => 'images/vehicles/yaris-cross/cvt2.jpg'],
            ['name' => 'Galería CVT 3', 'path' => 'images/vehicles/yaris-cross/cvt3.jpg'],
            ['name' => 'Galería CVT 4', 'path' => 'images/vehicles/yaris-cross/cvt4.jpg'],
            ['name' => 'Galería Hybrid 1', 'path' => 'images/vehicles/yaris-cross/hybrid1.jpg'],
            ['name' => 'Galería Hybrid 2', 'path' => 'images/vehicles/yaris-cross/hybrid2.jpg'],
            ['name' => 'Galería Hybrid 3', 'path' => 'images/vehicles/yaris-cross/hybrid3.jpg'],
            ['name' => 'Galería Hybrid 4', 'path' => 'images/vehicles/yaris-cross/hybrid4.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. DISEÑO EXTERIOR ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/yaris-cross/yariscross-01.jpg" alt="Diseño imponente Toyota Yaris Cross" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Diseño Exterior
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Diseño imponente que destaca
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El diseño del nuevo <strong>Toyota Yaris Cross</strong> cautivará todas las miradas. Los viajes se convertirán en una experiencia sensorial y única, con sus faros LED que resaltarán aún más su gran silueta.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Las rejillas trapezoidales superior e inferior de diferentes tamaños expresan una postura deportiva y sólida.
                </p>
            </div>
        </div>

        <!-- Proporciones y Formas tridimensionales -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/yariscross-04.jpg" alt="Proporciones Toyota Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Proporciones potentes que evocan un estilo de vida</h3>
                <ul class="space-y-2 text-slate-600">
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Techo con mayor altura, mucho más estilizado.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Cuerpo elegante con un interior largo.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Altura total voluminosa.</span></li>
                </ul>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/yariscross-02.jpg" alt="Formas tridimensionales Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Formas tridimensionales dinámicas y grandes superficies</h3>
                <ul class="space-y-2 text-slate-600">
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Parachoques con un mayor ángulo de ataque.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Altura al piso elevada.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Neumáticos de gran diámetro.</span></li>
                </ul>
            </div>
        </div>

        <!-- Diseño Trasero y Lateral -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/disenotraseroyaris.jpg" alt="Diseño Trasero Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Diseño Trasero</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    La cabina inclinada, combinada con los guardabarros ensanchados, expresa una silueta sólida y estable. El gráfico de las luces traseras combinadas atrae la atención hacia afuera para enfatizar el ancho.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/disenolateralyaris.jpg" alt="Diseño Lateral Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Diseño Lateral</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    La combinación de un cuerpo voluminoso con líneas de carácter distintivas expresa un movimiento nítido y una impresión sólida, elegante y sofisticada.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. FRANJA OSCURA DE DETALLES EXTERIORES ================= -->
<section class="py-14 bg-[#1e232e] text-white shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/yaris-cross/franjallantas.jpg" alt="Llantas de aleación 17 pulgadas" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Llantas de aleación 17″ 215/60R17</p>
            </div>
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/yaris-cross/franjafaros.jpg" alt="Faros Delanteros" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Faros Delanteros LED</p>
            </div>
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/yaris-cross/franjatraseros.jpg" alt="Faros Traseros" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Faros Traseros LED</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÑO INTERIOR, EQUIPAJE & TECNOLOGÍA ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Confort &amp; Sofisticación</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">Diseño Interior</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris1.jpg" alt="Panel de instrumentos Yaris Cross" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">El panel de instrumentos delgado y ancho con acolchado suave crea una sensación de continuidad con el revestimiento de la puerta, expresando amplitud SUV.</p>
            </div>
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris2.jpg" alt="Cabina orientada al conductor" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">La cabina orientada al conductor otorga una imagen mucho más deportiva y elegante.</p>
            </div>
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris3.jpg" alt="Superficies suaves al tacto" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">Superficies suaves al tacto están disponibles para darle a todo el interior una sensación de alta calidad.</p>
            </div>
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris4.jpg" alt="Ornamentación de cabina" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">La ornamentación brillante y sedosa en el área de la cabina genera una atmósfera avanzada y de alta calidad.</p>
            </div>
        </div>

        <!-- Capacidad de Equipaje -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/yaris-cross/equipajeyaris.jpg" alt="Capacidad de Equipaje Yaris Cross" class="w-full h-full object-cover rounded-2xl shadow-md">
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Capacidad de Equipaje</h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo Yaris Cross tiene un excelente espacio para equipaje sin sacrificar la comodidad de los pasajeros traseros. Fue diseñado con el objetivo de equilibrar la usabilidad y la comodidad.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Yaris Cross HV (Híbrido)</span>
                        <strong class="text-2xl font-semibold text-[#b31f26]">466 Litros</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Yaris Cross CVT</span>
                        <strong class="text-2xl font-semibold text-[#b31f26]">471 Litros</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pantalla 10.1" -->
        <div id="tecnologia" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Multimedia HD</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Pantalla 10.1″</h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Gran pantalla de alta definición para una fácil visualización y conectividad total:
                </p>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-sm sm:text-base text-slate-700">
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Apple CarPlay &amp; Android Auto</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Control por voz</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Presión de neumáticos</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Ángulo de inclinación</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Información de viaje (HEV)</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Historial de consumo y Flujo HEV</span></li>
                </ul>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <img src="/images/vehicles/yaris-cross/pantallayaris.jpg" alt="Pantalla 10.1 pulgadas Yaris Cross" class="w-full h-full object-cover rounded-2xl shadow-md">
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Protección Activa y Pasiva</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">Seguridad</h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El nuevo Toyota Yaris Cross viene equipado con tecnología de seguridad que te permitirá tener el control del vehículo en situaciones de riesgo, pensando en tu seguridad, en la de los ocupantes y peatones.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4">
                <img src="/images/vehicles/yaris-cross/seguridadyaris1.jpg" alt="Seguridad Activa Yaris Cross" class="w-full h-48 object-cover rounded-2xl">
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Activa</h3>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li>• <strong>ABS:</strong> Sistema de Frenos Antibloqueo.</li>
                    <li>• <strong>VSC + TRC:</strong> Control de Estabilidad del Vehículo + Control de Tracción.</li>
                </ul>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4">
                <img src="/images/vehicles/yaris-cross/seguridadyaris2.jpg" alt="Seguridad Pasiva Yaris Cross" class="w-full h-48 object-cover rounded-2xl">
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Pasiva</h3>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li>• <strong>6 Airbags:</strong> Frontales (2), laterales (2) y de cortina (2).</li>
                    <li>• <strong>Cinturones de Seguridad:</strong> De tres puntos con ELR para todos los ocupantes.</li>
                </ul>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4">
                <img src="/images/vehicles/yaris-cross/seguridadyaris3.jpg" alt="Estacionamiento Yaris Cross" class="w-full h-48 object-cover rounded-2xl">
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Estacionamiento</h3>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li>• <strong>Monitor trasero</strong> de asistencia visual.</li>
                    <li>• <strong>2 Sonares de Proximidad Traseros</strong>.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. DESEMPEÑO & VIDEOS ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-400">Rendimiento Híbrido &amp; Naftero</span>
            <h2 class="text-3xl sm:text-4xl font-light text-white font-heading">Desempeño</h2>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                El nuevo Toyota Yaris Cross también está disponible en su versión híbrida, para un mejor rendimiento de combustible, mayor performance sin perder su potencia y emitiendo menos CO₂.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-slate-800/80 rounded-3xl p-6 border border-slate-700 space-y-4 text-center">
                <img src="/images/vehicles/yaris-cross/desempenoyaris1.jpg" alt="Motor 2NR-VEX y transeje P910" class="w-full h-60 object-cover rounded-2xl">
                <p class="text-base font-bold text-white">Primera combinación del motor 2NR-VEX y del transeje P910.</p>
            </div>
            <div class="bg-slate-800/80 rounded-3xl p-6 border border-slate-700 space-y-4 text-center">
                <img src="/images/vehicles/yaris-cross/motor-02.jpg" alt="Menores emisiones de CO2" class="w-full h-60 object-cover rounded-2xl">
                <p class="text-base font-bold text-white">Menores emisiones de CO₂ en el segmento.</p>
            </div>
        </div>

        <div id="video" class="space-y-8 pt-4">
            <h3 class="text-2xl sm:text-3xl font-medium uppercase font-heading text-center text-white">Videos Oficiales</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-3">
                    <h4 class="text-lg font-medium text-slate-200 text-center">Yaris Cross CVT</h4>
                    <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-black">
                        <iframe loading="lazy" title="Video Yaris Cross CVT" src="https://www.youtube.com/embed/ODxlpU0y7yc?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="space-y-3">
                    <h4 class="text-lg font-medium text-slate-200 text-center">Yaris Cross Hybrid</h4>
                    <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-black">
                        <iframe loading="lazy" title="Video Yaris Cross Hybrid" src="https://www.youtube.com/embed/0FGeE8Y2z14?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_yaris_cross = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/yaris-cross/cvt1.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/cvt2.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/cvt3.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/hybrid1.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/hybrid2.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/hybrid3.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/cvt4.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/cvt5.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/cvt6.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/hybrid4.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/hybrid5.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/hybrid6.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_yaris_cross_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_yaris_cross()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_yaris_cross_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Yaris Cross · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 7. ESPECIFICACIONES & VERSIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-slate-50 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Especificaciones -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-12 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6 space-y-6">
                <img src="/images/vehicles/yaris-cross/especificacionesyaris1.jpg" alt="Especificaciones Yaris Cross" class="w-full h-auto rounded-2xl object-contain mx-auto">
                <div class="text-center">
                    <a href="https://www.toyota.com.py/asset/pdf/download-brochures/catalogo-yaris-cross.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-6 space-y-6">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">Especificaciones</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200/80 space-y-3">
                        <h3 class="text-lg font-medium text-[#b31f26] uppercase">Generales</h3>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <li>• <strong>Longitud:</strong> 4.310 mm</li>
                            <li>• <strong>Ancho:</strong> 1.770 mm</li>
                            <li>• <strong>Altura:</strong> 1.615 mm</li>
                        </ul>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200/80 space-y-3">
                        <h3 class="text-lg font-medium text-[#b31f26] uppercase">Motor</h3>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <li>• <strong>Cilindros:</strong> 4 en línea</li>
                            <li>• <strong>Válvulas:</strong> 16 válvulas con DOHC y Dual-VVT-i</li>
                            <li>• <strong>Cilindrada:</strong> 1.5L (Nafta / Híbrido HEV)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Versiones -->
        <div id="modelos" class="space-y-10">
            <div class="text-center space-y-2">
                <span class="text-xs font-medium uppercase tracking-widest text-red-600">Configuraciones</span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">Versiones</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- CVT 1.5L -->
                <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs space-y-6">
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/yaris-cross/especificacionesyaris1.jpg" alt="Yaris Cross CVT 1.5L" class="max-h-full max-w-full object-contain rounded-xl">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">CVT 1.5L</h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Ventilador y acoplamiento de motor de 160 W con dos velocidades de refrigeración</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Motor de <strong>1.500 cc</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tanque de combustible de <strong>42 L</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Transmisión <strong>CVT D88C</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Diferencial delantero 5.105 (CVT)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Aire acondicionado manual</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Pantalla multi-información de <strong>4.2″ TFT</strong></span></li>
                    </ul>
                </div>

                <!-- Hybrid 1.5L -->
                <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs space-y-6">
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/yaris-cross/yarishybrid1.5.jpg" alt="Yaris Cross Hybrid 1.5L" class="max-h-full max-w-full object-contain rounded-xl">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Hybrid 1.5L</h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Ventilador y acoplamiento de motor de 160 W con Modulación por Ancho de Pulso</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Motor de <strong>1.500 cc Híbrido</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tanque de combustible de <strong>36 L</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Transmisión <strong>CVT P910 HEV</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Modos de conducción (<strong>Eco, Normal y Power</strong>)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Diferencial delantero 4.222 (HEV) y <strong>Freno regenerativo (HEV)</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Aire acondicionado digital y Pantalla multi-información de <strong>7″ TFT</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Aviso de aproximación de vehículo</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'yaris-cross',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Yaris Cross',
            'version' => 'CVT 1.5L / Hybrid 1.5L',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Híbrido',
            'transmission' => 'Automática CVT',
            'traction' => '4x2',
            'engine' => '1.5L 16v DOHC Dual-VVT-i (Nafta / HEV)',
            'doors' => 5,
            'seats' => 5,
            'airbags' => 6,
            'is_hybrid' => true,
            'tagline' => 'Diseño imponente que destaca, también en versión Híbrida',
            'description' => 'El diseño del nuevo Toyota Yaris Cross cautiva todas las miradas con faros LED, pantalla HD de 10.1", 6 airbags y opciones 1.5L CVT o Híbrida.',
            'brochure_url' => 'https://www.toyota.com.py/asset/pdf/download-brochures/catalogo-yaris-cross.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=ODxlpU0y7yc',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 7,
            'hero_banners' => ['images/vehicles/yaris-cross/SlideYariscross.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/yaris-cross/yariscross.png',
            'images/vehicles/yaris-cross/SlideYariscross.jpg',
            'images/vehicles/yaris-cross/cvt1.jpg',
            'images/vehicles/yaris-cross/hybrid1.jpg',
            'images/vehicles/yaris-cross/yariscross-01.jpg',
        ]);
    }

    private function seedLandCruiser300($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Land Cruiser 300', 'path' => 'images/vehicles/land-cruiser-300/slide_vx300.jpg'],
            ['name' => 'Interior Land Cruiser 300', 'path' => 'images/vehicles/land-cruiser-300/VX300interior.png'],
            ['name' => 'Exterior Land Cruiser 300', 'path' => 'images/vehicles/land-cruiser-300/VX300exterior.png'],
            ['name' => 'Logo Toyota Safety Sense', 'path' => 'images/vehicles/land-cruiser-300/logo-safety.png'],
            ['name' => 'PCS Pre-Colisión', 'path' => 'images/vehicles/land-cruiser-300/safety-circle-01.png'],
            ['name' => 'LDA Cambio de Carril', 'path' => 'images/vehicles/land-cruiser-300/ida.png'],
            ['name' => 'LTA Mantenimiento de Carril', 'path' => 'images/vehicles/land-cruiser-300/ida-1.png'],
            ['name' => 'ACC Velocidad Crucero', 'path' => 'images/vehicles/land-cruiser-300/veloc-crucero.png'],
            ['name' => 'AHB Luces Altas Automáticas', 'path' => 'images/vehicles/land-cruiser-300/ahb.png'],
            ['name' => 'TSC Control Balanceo Tráiler', 'path' => 'images/vehicles/land-cruiser-300/safety-sq-01.jpg'],
            ['name' => 'Crawl Control System', 'path' => 'images/vehicles/land-cruiser-300/neg.jpg'],
            ['name' => 'VSC Control de Estabilidad', 'path' => 'images/vehicles/land-cruiser-300/vsc.jpg'],
            ['name' => 'BSM Alerta Punto Ciego', 'path' => 'images/vehicles/land-cruiser-300/gr.jpg'],
            ['name' => 'Modelo Land Cruiser 300', 'path' => 'images/vehicles/land-cruiser-300/landcruiservx300.png'],
            ['name' => 'Galería LC300 1', 'path' => 'images/vehicles/land-cruiser-300/1.jpg'],
            ['name' => 'Galería LC300 2', 'path' => 'images/vehicles/land-cruiser-300/2.jpg'],
            ['name' => 'Galería LC300 3', 'path' => 'images/vehicles/land-cruiser-300/3.jpg'],
            ['name' => 'Galería LC300 4', 'path' => 'images/vehicles/land-cruiser-300/4.jpg'],
            ['name' => 'Galería LC300 5', 'path' => 'images/vehicles/land-cruiser-300/5.jpg'],
            ['name' => 'Galería LC300 6', 'path' => 'images/vehicles/land-cruiser-300/6.jpg'],
            ['name' => 'Galería LC300 7', 'path' => 'images/vehicles/land-cruiser-300/7.jpg'],
            ['name' => 'Galería LC300 8', 'path' => 'images/vehicles/land-cruiser-300/8.jpg'],
            ['name' => 'Galería LC300 9', 'path' => 'images/vehicles/land-cruiser-300/9.jpg'],
            ['name' => 'Galería LC300 10', 'path' => 'images/vehicles/land-cruiser-300/10.jpg'],
            ['name' => 'Galería LC300 11', 'path' => 'images/vehicles/land-cruiser-300/11.jpg'],
            ['name' => 'Galería LC300 12', 'path' => 'images/vehicles/land-cruiser-300/12.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. UNA LEYENDA SOBRE RUEDAS ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                Conducí el verdadero lujo de Toyota todos los días
            </span>
            <h2 class="text-3xl sm:text-5xl font-light text-[#b31f26] font-heading uppercase tracking-tight">
                Una Leyenda Sobre Ruedas
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El <strong>Land Cruiser VX 300</strong> con su nuevo diseño supera todas las expectativas. Su mayor confort y maniobrabilidad lo convierten en el número uno en capacidad y distinción, consolidando su estatus de leyenda.
            </p>
        </div>

        <!-- Diseño Interior -->
        <div id="interior" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-300/VX300interior.png" alt="Diseño Interior Land Cruiser 300" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Lujo &amp; Versatilidad</span>
                <h3 class="text-3xl sm:text-4xl font-medium text-[#b31f26] font-heading uppercase">
                    Diseño Interior
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Elegante y acogedor, con materiales de la más alta calidad, el nuevo Land Cruiser ofrece mayor comodidad gracias a sus versátiles configuraciones de asientos.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Viaje con estilo y lujo con hasta <strong>7 pasajeros</strong> y todo su equipaje.
                </p>
            </div>
        </div>

        <!-- Diseño Exterior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Robustez Superior</span>
                <h3 class="text-3xl sm:text-4xl font-medium text-[#b31f26] font-heading uppercase">
                    Diseño Exterior
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Cuenta con un sofisticado diseño exterior que representa robustez y durabilidad en un nivel superior.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Los faros delanteros <strong>Full LED</strong> y la parrilla se han elevado estratégicamente para reducir el riesgo de posibles daños en el manejo off-road.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-300/VX300exterior.png" alt="Diseño Exterior Land Cruiser 300" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. MEJOR PERFORMANCE & VIDEOS ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">V6 Twin Turbo Diesel · 301 HP</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Mejor Performance
            </h2>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                La nueva Land Cruiser 300 viene completamente renovada, con mejoras destinadas a optimizar por completo la performance de la camioneta logrando <strong>301 caballos de fuerza con un motor de 3.300 cc V6 Twin Turbo</strong>, optimizando su relación peso/potencia de manera extraordinaria.
            </p>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                El nombre «Crucero en Tierra» no le fue dado en vano: en capacidades off-road cuenta con diferenciales delantero y trasero de tipo <strong>TORSEN</strong> tiempo completo, bloqueo de diferencial delantero, central y trasero, asistente de descenso en pendientes (<strong>DAC</strong>), <strong>Crawl Control System</strong>, Selector Multi-Terreno y <strong>Monitor Multi-Terreno 3D</strong>.
            </p>
        </div>

        <div id="video" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                <iframe loading="lazy" title="Performance Land Cruiser 300" src="https://www.youtube.com/embed/Yna6mvIb_J0?start=1&feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                <iframe loading="lazy" title="Off-Road Land Cruiser 300" src="https://www.youtube.com/embed/9BNmgbR819o?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. TOYOTA SAFETY SENSE ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <img src="/images/vehicles/land-cruiser-300/logo-safety.png" alt="Toyota Safety Sense" class="h-14 mx-auto object-contain">
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Toyota Safety Sense
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Es un paquete de seguridad activa que incorpora un radar de ondas milimétricas y una cámara monocular, capaz de detectar una variedad de peligros y alertar al conductor para evitar o mitigar accidentes.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/safety-circle-01.png" alt="PCS Pre-Colisión" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Sistema Pre-Colisión Frontal (PCS)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Detecta la posibilidad de una colisión con un vehículo y alerta al conductor con una alarma. Si el conductor no aplica los frenos, el sistema ayuda a evitar o mitigar los daños aplicando un frenado de emergencia.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/ida.png" alt="LDA Alerta de Cambio de Carril" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Alerta de Cambio de Carril (LDA)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Detecta las líneas del carril para determinar la posición del vehículo. Si el conductor intenta dejar un carril sin activar la señal de giro, se emite una advertencia y brinda soporte en la corrección de la dirección.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/ida-1.png" alt="Asistencia de Mantenimiento de Carril" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Asistencia de Mantenimiento de Carril (LTA)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Asiste activamente al volante para mantener el vehículo centrado dentro de su carril durante la conducción en ruta con el control crucero activo.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/veloc-crucero.png" alt="Control de Velocidad Crucero Adaptativo" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Control de Velocidad Crucero Adaptativo (ACC)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Mantiene automáticamente una distancia segura entre los vehículos para alivianar la carga al conducir durante largos periodos en la ruta.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4 md:col-span-2 lg:col-span-2">
                <img src="/images/vehicles/land-cruiser-300/ahb.png" alt="Sistema de Luces Altas Automáticas" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Sistema de Luces Altas Automáticas (AHB)</h3>
                <p class="text-sm text-slate-600 leading-relaxed max-w-xl mx-auto">La cámara de lente único detecta la luz circundante durante la conducción nocturna y cambia automáticamente entre luces altas y bajas.</p>
            </div>
        </div>

        <!-- 4 Sistemas Adicionales -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-4">
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/safety-sq-01.jpg" alt="Control de balanceo de tráiler" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Control de balanceo de tráiler (TSC)</strong></div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/neg.jpg" alt="Crawl Control System" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Crawl Control System con asistencia de giro</strong></div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/vsc.jpg" alt="Control de estabilidad VSC" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Control de estabilidad (VSC)</strong></div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/gr.jpg" alt="Alerta de punto ciego BSM" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Alerta de punto ciego (BSM) (Versión GR-S)</strong></div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. ESPECIFICACIONES LAND CRUISER 300 ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-5 text-center space-y-6">
                <h2 class="text-3xl font-light text-[#b31f26] font-heading uppercase">Land Cruiser 300</h2>
                <img src="/images/vehicles/land-cruiser-300/landcruiservx300.png" alt="Toyota Land Cruiser 300" class="w-full max-w-md mx-auto object-contain">
                <a href="https://www.toyota.com.py/pdf/vx-300.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 space-y-3">
                    <h3 class="text-lg font-medium text-[#b31f26] uppercase">Motor</h3>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li>• <strong>Cilindrada:</strong> 3.346 cm³</li>
                        <li>• <strong>Configuración:</strong> V6 Twin Turbo Diesel</li>
                        <li>• <strong>Distribución:</strong> 24 válvulas DOHC</li>
                        <li>• <strong>Potencia:</strong> 301 HP</li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 space-y-3">
                    <h3 class="text-lg font-medium text-[#b31f26] uppercase">Transmisión</h3>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li>• <strong>Caja:</strong> Automática de 10 velocidades</li>
                        <li>• <strong>Tracción:</strong> 4WD Permanente con triple bloqueo de diferencial</li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 space-y-3 sm:col-span-2">
                    <h3 class="text-lg font-medium text-[#b31f26] uppercase">Dimensiones y Capacidades</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm text-slate-700">
                        <div><span class="text-xs text-slate-400 block">Largo</span><strong>4.950 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Ancho</span><strong>1.980 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Alto</span><strong>1.900 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Distancia entre ejes</span><strong>2.850 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Ángulo Ataque / Salida</span><strong>32° / 26.5°</strong></div>
                        <div><span class="text-xs text-slate-400 block">Tanque Combustible</span><strong>80 L + 30 L subtanque</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_land_cruiser_300 = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/land-cruiser-300/1.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/2.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/3.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/4.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/5.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/6.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/7.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/8.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/9.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/10.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/11.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/12.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_land_cruiser_300_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_land_cruiser_300()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_land_cruiser_300_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Land Cruiser 300 · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'land-cruiser-300',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Land Cruiser 300',
            'version' => 'VX / GR-S 3.3L V6 Twin Turbo',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Diesel',
            'transmission' => 'Automática 10 velocidades',
            'traction' => '4x4 Permanente TORSEN',
            'engine' => '3.3L V6 Twin Turbo Diesel (301 HP)',
            'doors' => 5,
            'seats' => 7,
            'airbags' => 10,
            'tagline' => 'Una leyenda sobre ruedas: conducí el verdadero lujo de Toyota todos los días',
            'description' => 'El Land Cruiser VX 300 supera todas las expectativas con su motor V6 Twin Turbo de 301 HP, transmisión de 10 velocidades y paquete Toyota Safety Sense.',
            'brochure_url' => 'https://www.toyota.com.py/pdf/vx-300.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=Yna6mvIb_J0',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 8,
            'hero_banners' => ['images/vehicles/land-cruiser-300/slide_vx300.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/land-cruiser-300/landcruiservx300.png',
            'images/vehicles/land-cruiser-300/slide_vx300.jpg',
            'images/vehicles/land-cruiser-300/1.jpg',
            'images/vehicles/land-cruiser-300/2.jpg',
            'images/vehicles/land-cruiser-300/3.jpg',
        ]);
    }

    private function seedHiluxCabinaSimple($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Hilux Cabina Simple', 'path' => 'images/vehicles/hilux-cabina-simple/slide_hiluxcabsimple.jpg'],
            ['name' => 'Portada Catálogo Hilux Simple', 'path' => 'images/vehicles/hilux-cabina-simple/hiluxsimple.png'],
            ['name' => 'Destacado Hilux Cabina Simple', 'path' => 'images/vehicles/hilux-cabina-simple/dest_hiluxsimple.jpg'],
            ['name' => 'Galería Hilux Simple 1', 'path' => 'images/vehicles/hilux-cabina-simple/hiluxsimple.jpg'],
            ['name' => 'Galería Hilux Simple 2', 'path' => 'images/vehicles/hilux-cabina-simple/simple1.jpg'],
            ['name' => 'Galería Hilux Simple 3', 'path' => 'images/vehicles/hilux-cabina-simple/simple2.jpg'],
            ['name' => 'Galería Hilux Simple 4', 'path' => 'images/vehicles/hilux-cabina-simple/simple3.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. CARACTERÍSTICAS & ESPECIFICACIONES ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/hilux-cabina-simple/dest_hiluxsimple.jpg" alt="Toyota Hilux Cabina Simple" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div id="especificaciones" class="lg:col-span-6 space-y-6">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Fuerza Indestructible para el Trabajo
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Características
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Le presentamos la 8va. generación de la Pick Up emblema de la marca. Esta nueva versión tiene un aspecto totalmente renovado y más moderno, mayor rendimiento y gran confort, para todo tipo de uso, tanto para la ciudad como para el trabajo pesado y uso Off-Road.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Motor</span>
                        <strong class="text-lg font-semibold text-slate-900">2.4 Diesel</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Tipo CC</span>
                        <strong class="text-lg font-semibold text-slate-900">4 Cil. Twin Cam 16v</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Potencia Máxima</span>
                        <strong class="text-lg font-semibold text-slate-900">110 kW (147 HP) / 3400</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_hilux_cabina_simple = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/hilux-cabina-simple/hiluxsimple.jpg","category":"exterior"},{"image":"/images/vehicles/hilux-cabina-simple/simple1.jpg","category":"exterior"},{"image":"/images/vehicles/hilux-cabina-simple/simple3.jpg","category":"exterior"},{"image":"/images/vehicles/hilux-cabina-simple/simple2.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_hilux_cabina_simple_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_hilux_cabina_simple()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_hilux_cabina_simple_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Hilux Cabina Simple · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'hilux-cabina-simple',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Hilux Cabina Simple',
            'version' => '2.4L Diesel 4x4 / 4x2',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Diesel',
            'transmission' => 'Mecánica 6 velocidades',
            'traction' => '4x4',
            'engine' => '2.4L Diesel 4 Cilindros Twin Cam 16v (147 HP)',
            'doors' => 2,
            'seats' => 2,
            'airbags' => 3,
            'tagline' => 'La Pick Up emblema de Toyota para el trabajo más exigente',
            'description' => 'La 8va. generación de la Pick Up emblema de la marca con motor 2.4 Diesel de 147 HP, máximo rendimiento y capacidad de carga.',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 9,
            'hero_banners' => ['images/vehicles/hilux-cabina-simple/slide_hiluxcabsimple.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/hilux-cabina-simple/hiluxsimple.png',
            'images/vehicles/hilux-cabina-simple/slide_hiluxcabsimple.jpg',
            'images/vehicles/hilux-cabina-simple/dest_hiluxsimple.jpg',
            'images/vehicles/hilux-cabina-simple/hiluxsimple.jpg',
            'images/vehicles/hilux-cabina-simple/simple1.jpg',
        ]);
    }

    private function seedLandCruiserPrado($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Land Cruiser Prado 2025', 'path' => 'images/vehicles/land-cruiser-prado/slideprado2025_1.jpg'],
            ['name' => 'Portada Catálogo Prado', 'path' => 'images/vehicles/land-cruiser-prado/landcruiserprado.png'],
            ['name' => 'Leyenda Prado Exterior', 'path' => 'images/vehicles/land-cruiser-prado/prado02.jpg'],
            ['name' => 'Diseño Interior Prado', 'path' => 'images/vehicles/land-cruiser-prado/prado03.jpg'],
            ['name' => 'Seguridad Prado', 'path' => 'images/vehicles/land-cruiser-prado/prado3.jpg'],
            ['name' => 'Land Cruiser Prado Luxury', 'path' => 'images/vehicles/land-cruiser-prado/landcruisser2025.jpg'],
            ['name' => 'Interior Prado 1', 'path' => 'images/vehicles/land-cruiser-prado/BBY1100.jpg'],
            ['name' => 'Interior Prado 2', 'path' => 'images/vehicles/land-cruiser-prado/BBY1110.jpg'],
            ['name' => 'Interior Prado 3', 'path' => 'images/vehicles/land-cruiser-prado/BBY1117.jpg'],
            ['name' => 'Interior Prado 4', 'path' => 'images/vehicles/land-cruiser-prado/BBY1123.jpg'],
            ['name' => 'Interior Prado 5', 'path' => 'images/vehicles/land-cruiser-prado/BBY1130.jpg'],
            ['name' => 'Interior Prado 6', 'path' => 'images/vehicles/land-cruiser-prado/BBY1132.jpg'],
            ['name' => 'Interior Prado 7', 'path' => 'images/vehicles/land-cruiser-prado/BBY1145.jpg'],
            ['name' => 'Interior Prado 8', 'path' => 'images/vehicles/land-cruiser-prado/BBY1147.jpg'],
            ['name' => 'Interior Prado 9', 'path' => 'images/vehicles/land-cruiser-prado/BBY1159.jpg'],
            ['name' => 'Exterior Prado 1', 'path' => 'images/vehicles/land-cruiser-prado/BBY0830.jpg'],
            ['name' => 'Exterior Prado 2', 'path' => 'images/vehicles/land-cruiser-prado/BBY0850.jpg'],
            ['name' => 'Exterior Prado 3', 'path' => 'images/vehicles/land-cruiser-prado/BBY0865.jpg'],
            ['name' => 'Exterior Prado 4', 'path' => 'images/vehicles/land-cruiser-prado/BBY0868.jpg'],
            ['name' => 'Exterior Prado 5', 'path' => 'images/vehicles/land-cruiser-prado/BBY0872.jpg'],
            ['name' => 'Exterior Prado 6', 'path' => 'images/vehicles/land-cruiser-prado/BBY0880.jpg'],
            ['name' => 'Exterior Prado 7', 'path' => 'images/vehicles/land-cruiser-prado/BBY0891.jpg'],
            ['name' => 'Exterior Prado 8', 'path' => 'images/vehicles/land-cruiser-prado/BBY0908.jpg'],
            ['name' => 'Exterior Prado 9', 'path' => 'images/vehicles/land-cruiser-prado/BBY0931.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. REGRESO AL ORIGEN, INTERIOR Y SEGURIDAD ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1: Leyenda 4x4 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-prado/prado02.jpg" alt="Land Cruiser Prado Regreso al Origen" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Regreso al Origen
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Una leyenda que dio la vuelta al mundo
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Cada lugar tiene su propia leyenda, pero solo hay una leyenda que ha dado vuelta al mundo entero: <strong>Land Cruiser Prado</strong>. Hoy su espíritu está más vivo que nunca en su nueva generación.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Su diseño moderno logra traer al presente todo su encanto retro y actitud robusta, consolidando su esencia 4×4. Una prueba viviente de que una verdadera leyenda no se estanca en el tiempo. Equipada con <strong>llantas de aleación de 20″</strong>, luces altas automáticas y adaptativas, y ópticas con tecnología Full LED.
                </p>
            </div>
        </div>

        <!-- Bloque 2: Diseño Interior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Confort Excepcional
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Diseño Interior Totalmente Renovado
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Con un diseño interior totalmente renovado, la nueva Land Cruiser Prado transmite una fuerte sensación de estabilidad, solidez y maniobrabilidad mientras mantiene un estilo elegante y versátil.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Adaptando tecnologías de vanguardia en su funcionalidad y con un diseño pensado para quienes usan el vehículo constantemente en su día a día, la nueva generación ofrece tanto al conductor como a los pasajeros un confort excepcional en todo momento.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-prado/prado03.jpg" alt="Interior Land Cruiser Prado" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

        <!-- Bloque 3: Seguridad -->
        <div id="seguridad" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-prado/prado3.jpg" alt="Seguridad Land Cruiser Prado" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Toyota Safety Sense + 8 Airbags
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Seguridad de Vanguardia
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En cuanto a seguridad, la Land Cruiser Prado está equipada con el nuevo paquete de seguridad <strong>Toyota Safety Sense</strong>:
                </p>
                <ul class="space-y-2.5 text-sm sm:text-base text-slate-700">
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Asistente de pre-colisión frontal</strong> y control de crucero adaptativo.</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Sistema de asistencia al mantenimiento de carril</strong> con corrección activa de dirección.</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Luces altas automáticas y adaptativas</strong>.</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Conjunto de <strong>8 airbags de serie</strong> sumados a la carrocería con deformación progresiva.</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video Land Cruiser Prado" src="https://www.youtube.com/embed/XKLlP9gtScY?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 3. MODELO LAND CRUISER PRADO LUXURY ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-12 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6 text-center space-y-6">
                <img src="/images/vehicles/land-cruiser-prado/landcruisser2025.jpg" alt="Land Cruiser Prado Luxury" class="w-full h-auto rounded-2xl object-contain mx-auto">
                <a href="https://www.toyota.com.py/vehiculo/new-land-cruiser-prado/assets/brochure-new-land-cruiser-prado.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versión Oficial</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Land Cruiser PRADO Luxury
                    </h2>
                </div>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm sm:text-base text-slate-700">
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Motor 2.8L Turbo Diesel</strong> – Automático</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Potencia <strong>201 HP / 500 Nm</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Capacidad para <strong>7 pasajeros</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Aire acondicionado digital <strong>bi-zona</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Sistema de infoentretenimiento de <strong>12.3″</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>8 airbags</strong> de serie</span></li>
                    <li class="flex items-start gap-2.5 sm:col-span-2"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Modos de conducción: <strong>SPORT S+ | SPORT S | NORMAL | CONFORT | ECO | A MEDIDA</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Velocidad crucero adaptativo y Pre-colisión frontal</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Controles <strong>VSC / DAC / CRAWL</strong> y Cargador inalámbrico</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. GALERÍA INTERIOR & EXTERIOR ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_land_cruiser_prado = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/land-cruiser-prado/BBY0830.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0850.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0865.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0868.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0872.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0880.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0891.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0908.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0931.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1100.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1110.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1117.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1123.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1130.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1132.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1145.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1147.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1159.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_land_cruiser_prado_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_land_cruiser_prado()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_land_cruiser_prado_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Land Cruiser Prado · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'land-cruiser-prado',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Land Cruiser Prado',
            'version' => 'Luxury 2.8L Automática 4x4',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Diesel',
            'transmission' => 'Automática',
            'traction' => '4x4',
            'engine' => '2.8L Turbo Diesel (201 HP / 500 Nm)',
            'doors' => 5,
            'seats' => 7,
            'airbags' => 8,
            'tagline' => 'Regreso al origen: una leyenda 4x4 más viva que nunca',
            'description' => 'La nueva Land Cruiser Prado combina todo su encanto retro y actitud robusta 4x4 con pantalla de 12.3", Toyota Safety Sense y 8 airbags.',
            'brochure_url' => 'https://www.toyota.com.py/vehiculo/new-land-cruiser-prado/assets/brochure-new-land-cruiser-prado.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=XKLlP9gtScY',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 10,
            'hero_banners' => ['images/vehicles/land-cruiser-prado/slideprado2025_1.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/land-cruiser-prado/landcruiserprado.png',
            'images/vehicles/land-cruiser-prado/slideprado2025_1.jpg',
            'images/vehicles/land-cruiser-prado/BBY0830.jpg',
            'images/vehicles/land-cruiser-prado/BBY1100.jpg',
            'images/vehicles/land-cruiser-prado/prado02.jpg',
        ]);
    }

    private function seedHiace($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Hiace', 'path' => 'images/vehicles/hiace/slider_hiace.jpg'],
            ['name' => 'Portada Catálogo Hiace', 'path' => 'images/vehicles/hiace/hiace.png'],
            ['name' => 'Destacado Hiace', 'path' => 'images/vehicles/hiace/hiace1.png'],
            ['name' => 'Modelo Hiace Blanco', 'path' => 'images/vehicles/hiace/hiaceblanco.png'],
            ['name' => 'Galería Hiace 1', 'path' => 'images/vehicles/hiace/hiace-1.jpg'],
            ['name' => 'Galería Hiace 2', 'path' => 'images/vehicles/hiace/hiace-2.jpg'],
            ['name' => 'Galería Hiace 3', 'path' => 'images/vehicles/hiace/hiace-3.jpg'],
            ['name' => 'Galería Hiace 4', 'path' => 'images/vehicles/hiace/hiace-4.jpg'],
            ['name' => 'Galería Hiace 5', 'path' => 'images/vehicles/hiace/hiace-5.jpg'],
            ['name' => 'Galería Hiace 6', 'path' => 'images/vehicles/hiace/hiace-6.jpg'],
            ['name' => 'Galería Hiace 7', 'path' => 'images/vehicles/hiace/hiace-7.jpg'],
            ['name' => 'Galería Hiace 8', 'path' => 'images/vehicles/hiace/hiace-8.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. EL MEJOR ALIADO PARA EVOLUCIONAR ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-6 flex items-center justify-center">
                    <img src="/images/vehicles/hiace/hiace1.png" alt="Toyota Hiace El mejor aliado para evolucionar" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Potenciá tu Negocio
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    El mejor aliado para evolucionar
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo <strong>Toyota Hiace</strong> es un vehículo amplio, sumamente versátil y de una alta funcionalidad. Diseñado para emprendedores y empresas que necesitan una máquina de transporte confiable, perfecta para alcanzar los objetivos de su negocio.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versión Disponible</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/90 shadow-xs">
            <div class="lg:col-span-6 bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center">
                <img src="/images/vehicles/hiace/hiaceblanco.png" alt="Toyota Hiace Automático" class="w-full max-w-md object-contain">
            </div>
            <div class="lg:col-span-6 space-y-5">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Hiace Automático
                </h3>
                <ul class="space-y-3 text-base text-slate-700">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Motor de <strong>4 cilindros en línea</strong></span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Combustible <strong>Diesel</strong> de alto rendimiento</span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Frenos a <strong>disco ventilado delantero</strong></span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>Suspensión MacPherson delantera</strong> para máximo confort de marcha</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_hiace = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/hiace/hiace-1.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-2.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-3.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-4.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-5.jpg","category":"interior"},{"image":"/images/vehicles/hiace/hiace-6.jpg","category":"interior"},{"image":"/images/vehicles/hiace/hiace-7.jpg","category":"interior"},{"image":"/images/vehicles/hiace/hiace-8.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_hiace_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_hiace()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_hiace_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Hiace · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'hiace',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Hiace',
            'version' => 'Automático Diesel',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Diesel',
            'transmission' => 'Automática',
            'traction' => '4x2',
            'engine' => 'Diesel 4 cilindros en línea',
            'doors' => 5,
            'tagline' => 'El mejor aliado para evolucionar tu negocio',
            'description' => 'El nuevo Toyota Hiace es un vehículo amplio, sumamente versátil y de una alta funcionalidad diseñado para emprendedores.',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 11,
            'hero_banners' => ['images/vehicles/hiace/slider_hiace.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/hiace/hiace.png',
            'images/vehicles/hiace/slider_hiace.jpg',
            'images/vehicles/hiace/hiace-1.jpg',
            'images/vehicles/hiace/hiace-2.jpg',
            'images/vehicles/hiace/hiace-3.jpg',
        ]);
    }

    private function seedFortuner($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Fortuner', 'path' => 'images/vehicles/fortuner/slider_fortuner.jpg'],
            ['name' => 'Portada Catálogo Fortuner', 'path' => 'images/vehicles/fortuner/fortuner.png'],
            ['name' => 'Interior Fortuner', 'path' => 'images/vehicles/fortuner/interiorfortuner.png'],
            ['name' => 'Climatizador Automático Digital', 'path' => 'images/vehicles/fortuner/linefortuner-1.png'],
            ['name' => 'Audio Pantalla Táctil 8"', 'path' => 'images/vehicles/fortuner/linefortuner2.png'],
            ['name' => 'Exterior Fortuner', 'path' => 'images/vehicles/fortuner/exteriorfortuner.png'],
            ['name' => 'Llantas de aleación 18"', 'path' => 'images/vehicles/fortuner/perf-1.jpg'],
            ['name' => 'Faros traseros LED', 'path' => 'images/vehicles/fortuner/perf-2.jpg'],
            ['name' => 'Faros delanteros Bi-LED', 'path' => 'images/vehicles/fortuner/perf-3.jpg'],
            ['name' => 'Motor 2.8L 204 CV / 500 Nm', 'path' => 'images/vehicles/fortuner/perf-4.jpg'],
            ['name' => '7 Airbags', 'path' => 'images/vehicles/fortuner/seguridad-1.png'],
            ['name' => 'Control de estabilidad VSC', 'path' => 'images/vehicles/fortuner/seguridad-2.png'],
            ['name' => 'Control de tracción activo A-TRC', 'path' => 'images/vehicles/fortuner/seguridad-3.png'],
            ['name' => '5 Estrellas Protección', 'path' => 'images/vehicles/fortuner/seguridad-4.png'],
            ['name' => 'Modelo Fortuner SRV', 'path' => 'images/vehicles/fortuner/fortunericon.jpg'],
            ['name' => 'Galería Fortuner 1', 'path' => 'images/vehicles/fortuner/fortuner1.jpg'],
            ['name' => 'Galería Fortuner 2', 'path' => 'images/vehicles/fortuner/fortuner2.jpg'],
            ['name' => 'Galería Fortuner 3', 'path' => 'images/vehicles/fortuner/fortuner3.jpg'],
            ['name' => 'Galería Fortuner 4', 'path' => 'images/vehicles/fortuner/fortuner4.jpg'],
            ['name' => 'Galería Fortuner 5', 'path' => 'images/vehicles/fortuner/fortuner5.jpg'],
            ['name' => 'Galería Fortuner 6', 'path' => 'images/vehicles/fortuner/fortuner6.jpg'],
            ['name' => 'Galería Fortuner 7', 'path' => 'images/vehicles/fortuner/fortuner7.jpg'],
            ['name' => 'Galería Fortuner 8', 'path' => 'images/vehicles/fortuner/fortuner8.jpg'],
            ['name' => 'Galería Fortuner 9', 'path' => 'images/vehicles/fortuner/fortuner9.jpg'],
            ['name' => 'Galería Fortuner 10', 'path' => 'images/vehicles/fortuner/fortuner10.jpg'],
            ['name' => 'Galería Fortuner 11', 'path' => 'images/vehicles/fortuner/fortuner11.jpg'],
            ['name' => 'Galería Fortuner 12', 'path' => 'images/vehicles/fortuner/fortuner12.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. PRESENCIA IMPONENTE & CONFORT INTERIOR ================= -->
<section id="interior" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Confort y Tecnología</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Presencia Imponente
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva <strong>Fortuner</strong> ofrece una imagen exterior e interior más lujosa, y un diseño más elaborado con acabados superiores y mejor esculpidos.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Diseño Interior</h3>
                    <p class="text-base text-slate-600 leading-relaxed">
                        El habitáculo de la Fortuner ofrece a todos sus pasajeros el placer de disfrutar del viaje sin importar las distancias mediante sus <strong>tres hileras de asientos</strong> con distintos modos de configuración acordes a las necesidades.
                    </p>
                </div>
                <div class="space-y-2">
                    <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Display de información</h3>
                    <p class="text-base text-slate-600 leading-relaxed">
                        El display de información múltiple incorpora 3 funciones adicionales: el indicador de velocidad digital, el estado del filtro DPF e indicador de posición de las ruedas delanteras.
                    </p>
                </div>
                <div class="space-y-2">
                    <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Conectividad</h3>
                    <p class="text-base text-slate-600 leading-relaxed">
                        Todas las versiones de Fortuner tienen un equipo de audio con <strong>pantalla táctil de 8″</strong> y conectividad <strong>Android Auto® y Apple CarPlay®</strong>.
                    </p>
                </div>
            </div>
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/fortuner/interiorfortuner.png" alt="Interior Toyota Fortuner" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. FRANJA ROJA EQUIPAMIENTO INTERIOR ================= -->
<section class="py-14 bg-[#b31f26] text-white shadow-inner">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10">
                    <img src="/images/vehicles/fortuner/linefortuner-1.png" alt="Climatizador automático digital" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Climatizador automático digital</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10">
                    <img src="/images/vehicles/fortuner/linefortuner2.png" alt="Audio con pantalla táctil de 8 pulgadas" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Audio con pantalla táctil de 8″ y conectividad Android Auto® y Apple CarPlay®</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÑO EXTERIOR & MAYOR PERFORMANCE ================= -->
<section id="diseno" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Diseño y Performance</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Exclusividad, Lujo y Potencia
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Completamente renovada por dentro y por fuera, la Fortuner es sinónimo de exclusividad y lujo, que ahora vienen acompañados de más comodidad, más espacio y más equipamiento.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/fortuner/exteriorfortuner.png" alt="Nuevo diseño exterior Fortuner" class="w-full h-full object-cover rounded-2xl">
            </div>
            <div id="desempeno" class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Nuevo diseño exterior</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    Nuevo frente con <strong>faros Bi-LED</strong> y nuevo diseño de paragolpes, que le otorgan una figura más sofisticada y armónica. Su diseño de <strong>llantas de aleación de 18″</strong>, disponible en versiones SRV, le otorga más dinamismo a la figura lateral, mientras que los faros LED traseros completan un estilo más moderno.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    Apertura de puerta trasera eléctrica regulable en altura, espejos retrovisores LED retráctiles y Smart Key.
                </p>
                <div class="pt-2 border-t border-slate-100">
                    <h4 class="text-xl font-medium text-[#b31f26] font-heading">Mayor Performance</h4>
                    <p class="text-base text-slate-600 leading-relaxed mt-1">
                        Ahora el motor <strong>2.8L entrega 204 CV</strong> y, en las versiones con transmisión automática, <strong>500 Nm de torque máximo</strong>.
                    </p>
                </div>
            </div>
        </div>

        <!-- 4 Tarjetas de Performance -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-1.jpg" alt="Llantas de aleación 18 pulgadas" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Llantas de aleación de 18″</strong></div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-2.jpg" alt="Faros traseros LED" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Faros traseros de LED</strong></div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-3.jpg" alt="Faros delanteros Bi-LED" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Faros delanteros Bi-LED</strong></div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-4.jpg" alt="Motor 2.8L 204 CV" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Motor 2.8L de 204 CV y 500 Nm de torque</strong></div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 bg-[#b31f26] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center">
            <h2 class="text-3xl sm:text-4xl font-light font-heading text-white uppercase">Seguridad</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-1.png" alt="7 Airbags" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">7 airbags: frontales (x2), de rodilla (conductor), laterales (x2) y de cortina (x2)</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-2.png" alt="Control de estabilidad VSC" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">Control de estabilidad (VSC)</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-3.png" alt="Control de tracción activo A-TRC" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">Control de tracción activo (A-TRC)</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-4.png" alt="5 Estrellas Latin NCAP" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">Fortuner obtuvo 5 estrellas en protección para adultos y niños</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">Video</h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video Toyota Fortuner" src="https://www.youtube.com/embed/HKFSuY4NYGU?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 6. MODELO & GALERÍA ================= -->
<section id="modelos" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Modelo -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center bg-slate-50 rounded-3xl p-8 sm:p-12 border border-slate-200/80 max-w-5xl mx-auto">
            <div class="lg:col-span-6 bg-white rounded-2xl p-6 border border-slate-100 flex items-center justify-center">
                <img src="/images/vehicles/fortuner/fortunericon.jpg" alt="Fortuner Aut. 2.8 SRV" class="w-full max-w-md object-contain">
            </div>
            <div class="lg:col-span-6 space-y-5">
                <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versión Destacada</span>
                <h2 class="text-2xl sm:text-3xl font-light text-[#b31f26] font-heading">
                    FORTUNER AUT. 2.8 SRV
                </h2>
                <ul class="space-y-2.5 text-base text-slate-700">
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Transmisión automática de 6 velocidades</span></li>
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Control de Velocidad Crucero</span></li>
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Climatizador automático digital</span></li>
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Android Auto® y Apple CarPlay®</span></li>
                </ul>
                <div class="pt-2">
                    <a href="https://toyota.com.py/pdf/fortuner-2021.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
        </div>

        </div>
</section>

<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_fortuner = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/fortuner/fortuner1.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner2.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner3.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner4.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner5.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner6.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner7.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner8.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner9.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner10.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner11.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner12.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_fortuner_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_fortuner()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_fortuner_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Fortuner SRV · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'fortuner',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Fortuner',
            'version' => 'SRV 2.8L Turbo Diesel 4x4',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Diesel',
            'transmission' => 'Automática 6 velocidades',
            'traction' => '4x4',
            'engine' => '2.8L Turbo Diesel (204 CV / 500 Nm)',
            'doors' => 5,
            'seats' => 7,
            'airbags' => 7,
            'tagline' => 'Presencia imponente, exclusividad y lujo para 7 pasajeros',
            'description' => 'La nueva Fortuner ofrece tres hileras de asientos, motor 2.8L de 204 CV y 500 Nm de torque, faros Bi-LED y 7 airbags con calificación de 5 estrellas.',
            'brochure_url' => 'https://toyota.com.py/pdf/fortuner-2021.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=HKFSuY4NYGU',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 12,
            'hero_banners' => ['images/vehicles/fortuner/slider_fortuner.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/fortuner/fortuner.png',
            'images/vehicles/fortuner/slider_fortuner.jpg',
            'images/vehicles/fortuner/fortuner1.jpg',
            'images/vehicles/fortuner/fortuner2.jpg',
            'images/vehicles/fortuner/fortuner3.jpg',
        ]);
    }

    private function seedHilux($brand, $category, $branch): void
    {
        $htmlMedia = [
            ['name' => 'Hero Slide Hilux', 'path' => 'images/vehicles/hilux/slider_hilux.jpg'],
            ['name' => 'Portada Catálogo Hilux', 'path' => 'images/vehicles/hilux/hilux.png'],
            ['name' => 'Novedades Exterior Hilux', 'path' => 'images/vehicles/hilux/Swash-03.png'],
            ['name' => 'Diseño Interior Hilux', 'path' => 'images/vehicles/hilux/Swash-04.png'],
            ['name' => 'Sistema de Audio 8"', 'path' => 'images/vehicles/hilux/Swash-01.png'],
            ['name' => 'Equipamiento y Display TFT', 'path' => 'images/vehicles/hilux/Swash-02.png'],
            ['name' => 'Performance Motor 2.8L / 2.4L', 'path' => 'images/vehicles/hilux/Swash-07.png'],
            ['name' => 'Seguridad 7 Airbags', 'path' => 'images/vehicles/hilux/Swash-06.jpg'],
            ['name' => 'Modelo Hilux DX', 'path' => 'images/vehicles/hilux/DXBlanca.png'],
            ['name' => 'Modelo Hilux SR', 'path' => 'images/vehicles/hilux/model_sr.png'],
            ['name' => 'Modelo Hilux SRV', 'path' => 'images/vehicles/hilux/model_srv.png'],
            ['name' => 'Galería Hilux 1', 'path' => 'images/vehicles/hilux/hilux-1.jpg'],
            ['name' => 'Galería Hilux 2', 'path' => 'images/vehicles/hilux/hilux-2.jpg'],
            ['name' => 'Galería Hilux 3', 'path' => 'images/vehicles/hilux/hilux-3.jpg'],
            ['name' => 'Galería Hilux 4', 'path' => 'images/vehicles/hilux/hilux-4.jpg'],
            ['name' => 'Galería Hilux 5', 'path' => 'images/vehicles/hilux/hilux-5.jpg'],
            ['name' => 'Galería Hilux 6', 'path' => 'images/vehicles/hilux/hilux-6.jpg'],
            ['name' => 'Galería Hilux 7', 'path' => 'images/vehicles/hilux/hilux-7.jpg'],
        ];

        $customHtml = <<<'HTML'
<!-- ================= 1. LA EXPECTATIVA HECHA REALIDAD & NOVEDADES ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Líder Indiscutida en Pick Ups</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                La expectativa hecha realidad
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva <strong>Hilux</strong> con un diseño renovado, mayor confort, más tecnología, mejor performance y más seguridad, ha llegado a Paraguay para ofrecerte lo mejor en el mundo pick up.
            </p>
        </div>

        <!-- Qué novedades nos presenta -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-4">
                    <img src="/images/vehicles/hilux/Swash-03.png" alt="Qué novedades nos presenta Toyota Hilux" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Fortaleza y Robustez
                </span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Qué novedades nos presenta
                </h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    En las versiones <strong>SRV y SR</strong> se presenta un nuevo diseño frontal más moderno, con cambios en sus ópticas, parrilla y paragolpes, que en su conjunto le otorgan una imagen de fortaleza y robustez. La versión SRV suma además <strong>faros Bi-LED</strong>, que le dan una mayor impronta visual y tecnológica.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    Con respecto a la vista lateral se destacan las nuevas llantas de aleación para las versiones SRV automática (<strong>265/60R18″</strong>), SRV y SR mecánica (<strong>265/65R17″</strong>). En la vista trasera, la Hilux SRV incorpora los nuevos faros con luces LED de moderno diseño interno.
                </p>
            </div>
        </div>

        <!-- Diseño Interior -->
        <div id="interior" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Cabina Renovada
                </span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Diseño Interior
                </h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    En su interior, la nueva Hilux combina dinamismo y modernidad, integrándose el equipo de audio de manera más fluida al panel de instrumentos. El nuevo diseño y combinación de colores de los relojes de velocímetro y tacómetro, donde predomina el gris, negro y blanco, contribuyen a renovar la atmósfera interior.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-4">
                    <img src="/images/vehicles/hilux/Swash-04.png" alt="Diseño Interior Toyota Hilux" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. TECNOLOGÍA, AUDIO Y EQUIPAMIENTO ================= -->
<section id="tecnologia" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Audio -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 bg-white p-4">
                    <img src="/images/vehicles/hilux/Swash-01.png" alt="Audio Toyota Hilux" class="w-full h-full object-contain">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Conectividad Total</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Audio
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Las versiones SRV y SR de la nueva Hilux están equipadas con un sistema de audio con <strong>pantalla táctil de 8″</strong> con conectividad <strong>Android Auto® &amp; Apple CarPlay®</strong>, manteniendo además la función de Bluetooth®.
                </p>
            </div>
        </div>

        <!-- Equipamiento -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Asistencias al Conductor</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Equipamiento
                </h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    Las versiones SRV Automática y 4×2 incorporan además <strong>sensores de estacionamiento delanteros y traseros</strong> que facilitan las maniobras en espacios reducidos y contribuyen a la seguridad del entorno.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    El display de información múltiple de <strong>4,2″ con pantalla a color TFT</strong> (versiones SRV y SR) incorpora dos funciones adicionales: el indicador de velocidad digital y el indicador de posición de las ruedas delanteras con 3 ángulos distintos.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 bg-white p-4">
                    <img src="/images/vehicles/hilux/Swash-02.png" alt="Equipamiento Toyota Hilux" class="w-full h-full object-contain">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. PERFORMANCE & SEGURIDAD ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Performance -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-4">
                    <img src="/images/vehicles/hilux/Swash-07.png" alt="Performance Toyota Hilux" class="w-full h-full object-contain">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Motores 1GD 2.8L &amp; 2GD 2.4L</span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Performance
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    Las versiones de Hilux con motor <strong>1GD (2.8L) entregan 201 CV</strong>, incrementando su potencia en un 15%. Las versiones con este motor y transmisión automática alcanzan <strong>500 Nm de torque</strong> (y 420 Nm entre 1.400 y 3.400 rpm en transmisión manual), gracias a un turbo con aspas un 25% mayores.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    Además, incorpora una electroválvula en la dirección que permite una asistencia más liviana a baja velocidad y más firme al incrementarse la marcha. El motor <strong>2GD (2.4L) con 150 CV y 400 Nm de torque</strong> mantiene su característico balance entre performance y economía de combustible.
                </p>
            </div>
        </div>

        <!-- Seguridad -->
        <div id="seguridad" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">7 Airbags de Serie</span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Seguridad
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    Hilux se destaca por ofrecer <strong>bloqueo de diferencial trasero</strong> como estándar en todas las versiones con tracción 4×4, y respecto al equipamiento de seguridad pasiva, <strong>todas las versiones de Hilux cuentan con 7 airbags</strong>.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    Cuenta además con Control de Estabilidad (<strong>VSC</strong>), Asistente de arranque en pendientes (<strong>HAC</strong>), Control de balanceo de tráiler (<strong>TSC</strong>), frenos <strong>ABS</strong> con Distribución Electrónica de la Fuerza de Frenado (<strong>EBD</strong>), Asistente de frenado de emergencia (<strong>BA</strong>), Luces de frenado de emergencia (<strong>EBS</strong>), cinturones de 3 puntos en todas las plazas y anclajes <strong>ISOFIX</strong>.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/hilux/Swash-06.jpg" alt="Seguridad Toyota Hilux" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. VIDEOS OFICIALES ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Hilux SRV</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Hilux SRV" src="https://www.youtube.com/embed/84y1TC0Cq7M?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Hilux Limited SRV</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Hilux Limited SRV" src="https://www.youtube.com/embed/UTxy2Uleuec?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. MODELOS (DX, SR, SRV) ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Doble Cabina</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- DX -->
            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/hilux/DXBlanca.png" alt="Toyota Hilux DX" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">DX</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>• <strong>Motor 2,4 litros</strong> 4 cilindros 16v con 147 CV. Manual de 6 velocidades.</li>
                        <li>• Audio con pantalla táctil de 8″, Bluetooth®, Android Auto® y Apple CarPlay®</li>
                        <li>• <strong>7 airbags</strong>: frontales (x2), rodilla (conductor), laterales (x2) y cortina (x2)</li>
                        <li>• Control de estabilidad (VSC) y Control de tracción (TRC)</li>
                        <li>• Asistente de arranque en pendientes (HAC) y Control de balanceo de tráiler (TSC)</li>
                        <li>• Protector de cárter «Heavy Duty» y de tanque de combustible</li>
                        <li>• Cierre centralizado a distancia, levantacristales y espejos eléctricos</li>
                        <li>• Volante regulable en altura y profundidad e inmovilizador de motor</li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/Toyota-Hilux-DX-Diptico.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure DX</span>
                </a>
            </div>

            <!-- SR -->
            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/hilux/model_sr.png" alt="Toyota Hilux SR" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">SR</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>• <strong>Motor 2,4 litros</strong> 4 cilindros 16v con 147 CV. Manual de 6 velocidades.</li>
                        <li>• Guardabarros extendidos</li>
                        <li>• <strong>Llantas de aleación 17″</strong> con neumáticos 265/65 R17 AT</li>
                        <li>• Faros antiniebla delanteros</li>
                        <li>• Display de información múltiple con pantalla a color de <strong>4,2″ (TFT)</strong></li>
                        <li>• Volante forrado en cuero natural</li>
                        <li>• Paragolpes trasero cromado y manijas color carrocería</li>
                        <li>• Modos de conducción <strong>ECO y Power Mode</strong></li>
                        <li>• Sistema de alarma antirrobo</li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/Toyota-Hilux-SR-Diptico.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure SR</span>
                </a>
            </div>

            <!-- SRV -->
            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/hilux/model_srv.png" alt="Toyota Hilux SRV" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">SRV</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>• <strong>Motor 2,8 litros</strong> 4 cilindros 16v con <strong>201 CV</strong> de potencia máxima. Automático de 6 velocidades.</li>
                        <li>• <strong>Faros delanteros Bi-LED</strong></li>
                        <li>• <strong>Faros traseros de LED</strong></li>
                        <li>• Sensores de estacionamiento delanteros (x2) y traseros (x4)</li>
                        <li>• Estribos laterales</li>
                        <li>• Aire acondicionado con <strong>climatizador automático digital</strong> y salidas para plazas traseras</li>
                        <li>• Control de velocidad crucero</li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/Hilux-srv-Limited.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure SRV</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÍA ================= -->
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_hilux = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/hilux/hilux-1.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-2.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-6.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-7.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-3.jpg","category":"interior"},{"image":"/images/vehicles/hilux/hilux-4.jpg","category":"interior"},{"image":"/images/vehicles/hilux/hilux-5.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_hilux_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_hilux()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_hilux_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Hilux Doble Cabina · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;

        $this->upsertZeroKm([
            'slug' => 'hilux',
            'condition' => '0km',
            'brand_id' => $brand->id,
            'vehicle_category_id' => $category?->id,
            'branch_id' => $branch?->id,
            'model' => 'Hilux',
            'version' => 'Doble Cabina DX / SR / SRV',
            'year' => 2026,
            'show_price' => false,
            'mileage_km' => 0,
            'fuel_type' => 'Diesel',
            'transmission' => 'Automática / Mecánica 6 vel.',
            'traction' => '4x4',
            'engine' => '2.8L 1GD (201 CV / 500 Nm) & 2.4L 2GD (150 CV)',
            'doors' => 4,
            'seats' => 5,
            'airbags' => 7,
            'tagline' => 'La expectativa hecha realidad: lo mejor en el mundo Pick Up',
            'description' => 'La nueva Hilux Doble Cabina con diseño renovado, motores 2.8L (201 CV / 500 Nm) y 2.4L (150 CV), pantalla de 8" con CarPlay/Android Auto y 7 airbags de serie.',
            'brochure_url' => 'https://toyota.com.py/pdf/Hilux-srv-Limited.pdf',
            'video_url' => 'https://www.youtube.com/watch?v=84y1TC0Cq7M',
            'is_featured' => true,
            'status' => 'disponible',
            'sort_order' => 13,
            'hero_banners' => ['images/vehicles/hilux/slider_hilux.jpg'],
            'custom_html' => $customHtml,
            'html_media' => $htmlMedia,
        ], [
            'images/vehicles/hilux/hilux.png',
            'images/vehicles/hilux/slider_hilux.jpg',
            'images/vehicles/hilux/hilux-1.jpg',
            'images/vehicles/hilux/hilux-2.jpg',
            'images/vehicles/hilux/hilux-3.jpg',
        ]);
    }
}
