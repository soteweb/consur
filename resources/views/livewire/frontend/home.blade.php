<div>
    <!-- 1. Hero Carrusel Principal (Alpine.js + Sliders DB) -->
    <x-frontend.hero-slider :sliders="$sliders" group="home" />

    <!-- 1.1 Barra Rápida de Acceso a Marcas del Grupo (Solo nombres en MAYÚSCULAS sin logo) -->
    <div class="w-full bg-white dark:bg-neutral-900 border-b border-slate-200/80 dark:border-neutral-800 py-2.5 px-4 sm:px-6 lg:px-8 select-none transition-colors">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4 overflow-x-auto no-scrollbar">
            <div class="flex items-center gap-2 flex-shrink-0 text-xs font-bold text-slate-400 dark:text-neutral-500 uppercase tracking-widest">
                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                <span class="hidden sm:inline">NUESTRAS MARCAS:</span>
            </div>
            
            <div class="flex items-center gap-1 sm:gap-2 flex-shrink-0">
                <a href="{{ url('/toyota') }}" class="px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 hover:text-red-600 hover:bg-slate-100 dark:hover:bg-neutral-800 transition">
                    TOYOTA
                </a>
                <a href="{{ url('/omoda-jaecoo') }}" class="px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 hover:text-red-600 hover:bg-slate-100 dark:hover:bg-neutral-800 transition">
                    OMODA | JAECOO
                </a>
                <a href="{{ url('/hino') }}" class="px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 hover:text-red-600 hover:bg-slate-100 dark:hover:bg-neutral-800 transition">
                    HINO
                </a>
                <a href="{{ url('/canam') }}" class="px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 hover:text-red-600 hover:bg-slate-100 dark:hover:bg-neutral-800 transition">
                    CAN-AM
                </a>
                <a href="{{ url('/seadoo') }}" class="px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 hover:text-red-600 hover:bg-slate-100 dark:hover:bg-neutral-800 transition">
                    SEA-DOO
                </a>
                <a href="{{ url('/consur-bike') }}" class="px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 hover:text-red-600 hover:bg-slate-100 dark:hover:bg-neutral-800 transition">
                    CONSUR BIKE
                </a>
                <a href="{{ url('/seguros') }}" class="px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 hover:text-red-600 hover:bg-slate-100 dark:hover:bg-neutral-800 transition">
                    BROKER DE SEGUROS
                </a>

                <span class="w-px h-3.5 bg-slate-200 dark:bg-neutral-700 mx-1"></span>

                <a href="#marcas-consur" class="inline-flex items-center gap-1 text-xs font-extrabold uppercase tracking-wider text-red-600 hover:text-red-700 transition whitespace-nowrap pl-1">
                    <span>VER TODAS</span>
                    <i class="fas fa-arrow-down text-[10px]"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Vehículos 0 KM Destacados -->
    @php $sec0km = \App\Models\SiteSection::getSection('featured_0km'); @endphp
    @if($sec0km->is_visible)
        <section id="destacados-0km" class="py-16 md:py-24 bg-white dark:bg-slate-950 relative overflow-hidden select-none transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Título Centrado -->
                <div class="text-center mb-8 md:mb-10" data-aos="fade-up">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-neutral-900 dark:text-white tracking-normal font-heading">
                        {{ $sec0km->content['title'] ?? 'Descubrí tu próximo Toyota' }}
                    </h2>
                </div>

                <!-- Tabs de Categorías (Exactamente 4 pestañas: Indestructibles, Híbridos, Urbanos y Utilitarios) -->
                @php
                    $toyotaTabs = [
                        'indestructibles' => 'Indestructibles',
                        'hibridos' => 'Híbridos',
                        'urbanos' => 'Urbanos',
                        'utilitarios' => 'Utilitarios',
                    ];
                @endphp
                <div class="flex items-center justify-center mb-12 md:mb-16" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center gap-6 sm:gap-10 md:gap-12 overflow-x-auto no-scrollbar px-2 pb-1">
                        @foreach($toyotaTabs as $tabKey => $tabLabel)
                            <button wire:click="selectCategory('{{ $tabKey }}')"
                                    type="button"
                                    class="group relative pb-2.5 text-base sm:text-lg tracking-wide transition-all duration-200 whitespace-nowrap {{ $selectedCategory === $tabKey ? 'font-medium text-neutral-900 dark:text-white' : 'font-normal text-neutral-500 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-white' }}">
                                <span>{{ $tabLabel }}</span>
                                @if($selectedCategory === $tabKey)
                                    <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-[#eb0a1e] rounded-full"></span>
                                @else
                                    <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-transparent group-hover:bg-slate-200 dark:group-hover:bg-slate-700 rounded-full transition-all"></span>
                                @endif
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Carrusel de Vehículos 0 Km -->
                <div wire:key="carousel-0km-{{ $selectedCategory }}-{{ $featured0km->count() }}"
                     data-aos="fade-up"
                     data-aos-delay="150"
                     x-data="{
                        currentPage: 0,
                        itemsPerPage: 3,
                        totalItems: {{ $featured0km->count() }},
                        touchStartX: 0,
                        touchEndX: 0,
                        get totalPages() {
                            return Math.ceil(this.totalItems / this.itemsPerPage) || 1;
                        },
                        updateItemsPerPage() {
                            if (window.innerWidth < 640) {
                                this.itemsPerPage = 1;
                            } else if (window.innerWidth < 1024) {
                                this.itemsPerPage = 2;
                            } else {
                                this.itemsPerPage = 3;
                            }
                            if (this.currentPage >= this.totalPages) {
                                this.currentPage = Math.max(0, this.totalPages - 1);
                            }
                        },
                        nextPage() {
                            if (this.currentPage < this.totalPages - 1) {
                                this.currentPage++;
                            }
                        },
                        prevPage() {
                            if (this.currentPage > 0) {
                                this.currentPage--;
                            }
                        },
                        goToPage(index) {
                            this.currentPage = index;
                        },
                        handleTouchStart(e) {
                            this.touchStartX = e.changedTouches[0].screenX;
                        },
                        handleTouchEnd(e) {
                            this.touchEndX = e.changedTouches[0].screenX;
                            if (this.touchStartX - this.touchEndX > 50) this.nextPage();
                            if (this.touchEndX - this.touchStartX > 50) this.prevPage();
                        }
                     }"
                     x-init="updateItemsPerPage();"
                     @resize.window.debounce.100ms="updateItemsPerPage()"
                     @touchstart.passive="handleTouchStart($event)"
                     @touchend.passive="handleTouchEnd($event)"
                     class="relative w-full max-w-6xl mx-auto">

                    <!-- Línea de Suelo Continua Horizontal (100vw Edge-to-Edge detrás de las ruedas) -->
                    <div class="absolute left-1/2 -translate-x-1/2 w-[100vw] top-[126px] h-[2px] bg-[#e4e4e7] dark:bg-slate-800 pointer-events-none z-0"></div>

                    <!-- Botón Navegación Izquierda: Chevron Minimalista Delgado -->
                    <button @click="prevPage()"
                            x-show="currentPage > 0"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-x-2"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-2"
                            type="button"
                            class="absolute -left-6 sm:-left-10 md:-left-14 top-[71px] -translate-y-1/2 z-20 p-2 text-slate-400 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white transition-all hover:scale-110 focus:outline-hidden"
                            aria-label="Anterior">
                        <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <!-- Botón Navegación Derecha: Chevron Minimalista Delgado -->
                    <button @click="nextPage()"
                            x-show="currentPage < totalPages - 1"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-x-2"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 translate-x-2"
                            type="button"
                            class="absolute -right-6 sm:-right-10 md:-right-14 top-[71px] -translate-y-1/2 z-20 p-2 text-slate-400 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white transition-all hover:scale-110 focus:outline-hidden"
                            aria-label="Siguiente">
                        <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <!-- Ventana Deslizable (Overflow Hidden - Sin Barra de Desplazamiento) -->
                    <div class="overflow-hidden w-full relative z-10 py-4">
                        <div class="flex transition-transform duration-500 ease-in-out {{ $featured0km->count() < 3 ? 'justify-center' : '' }}"
                             :style="`transform: translateX(-${currentPage * 100}%);`">
                            @forelse($featured0km as $veh)
                                <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-4 md:px-6 flex flex-col items-center group cursor-pointer">
                                    
                                    <!-- Contenedor del Vehículo Recortado (Transparente sobre la línea a 230x110) -->
                                    <a href="{{ route('vehiculo.detalle', $veh->slug) }}" 
                                       class="relative w-full h-[110px] flex items-end justify-center">
                                        <img src="{{ $veh->primary_image_url }}" 
                                             alt="{{ $veh->full_name }}" 
                                             class="w-[230px] h-[110px] max-w-[230px] max-h-[110px] object-contain filter drop-shadow-sm transition-transform duration-300 group-hover:scale-105 group-hover:-translate-y-1">
                                    </a>

                                    <!-- Nombre del Modelo en Mayúsculas Limpio -->
                                    <div class="mt-8 text-center w-full">
                                        <a href="{{ route('vehiculo.detalle', $veh->slug) }}" class="block">
                                            <h3 class="text-sm md:text-base font-semibold uppercase tracking-wider text-neutral-800 dark:text-neutral-200 group-hover:text-[#eb0a1e] dark:group-hover:text-[#eb0a1e] transition-colors font-heading">
                                                {{ $veh->model }}
                                            </h3>
                                        </a>
                                        @if($veh->is_hybrid)
                                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-[#005cb9] dark:text-[#38bdf8] mt-1">
                                                <i class="fas fa-bolt text-[9px]"></i> Híbrido
                                            </span>
                                        @elseif($veh->version)
                                            <span class="text-xs text-neutral-400 dark:text-neutral-500 block truncate mt-1 max-w-[220px] mx-auto font-light">
                                                {{ Str::limit($veh->version, 26) }}
                                            </span>
                                        @endif
                                    </div>

                                </div>
                            @empty
                                <div class="w-full text-center py-12">
                                    <i class="fas fa-car-side text-slate-300 text-4xl mb-3"></i>
                                    <h4 class="text-base font-bold text-slate-700">No hay vehículos disponibles en esta categoría por el momento</h4>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Indicadores de Paginación Dots / Pill Inferiores (Idéntico a Toyota AR) -->
                    <div x-show="totalPages > 1" class="flex items-center justify-center gap-2.5 mt-8 md:mt-10">
                        <template x-for="p in totalPages" :key="p">
                            <button @click="goToPage(p - 1)"
                                    type="button"
                                    class="transition-all duration-300 focus:outline-hidden"
                                    :class="currentPage === (p - 1) ? 'w-8 h-1.5 bg-[#1a1a1a] dark:bg-white rounded-full' : 'w-2 h-2 bg-[#d1d5db] dark:bg-slate-700 hover:bg-[#9ca3af] dark:hover:bg-slate-600 rounded-full'"
                                    :aria-label="`Página ${p}`">
                            </button>
                        </template>
                    </div>

                </div>

            </div>
        </section>
    @endif

    <!-- 3. Taller Móvil CONSUR (Con Imagen Oficial de la Unidad Móvil y 12 Puntos de Revisión) -->
    @php
        $secTaller = \App\Models\SiteSection::getSection('posventa_taller_movil');
        $tallerImg = $secTaller->content['main_image'] ?? '/images/home/consurmovil.png';
        if (str_contains($tallerImg, 'unsplash.com') || str_contains($tallerImg, 'hometallermovil.png')) {
            $tallerImg = '/images/home/consurmovil.png';
        }
        $tallerChecklist = [
            'Transmisión', 'Manejo', 'Motor', 'Llantas',
            'Luces', 'Interior', 'Suspensión', 'Exterior',
            'Frenos', 'Refrigeración', 'Cubiertas', 'Alineación'
        ];
    @endphp
    @if($secTaller->is_visible)
        <section id="taller-movil" class="py-16 md:py-24 bg-[#f8f9fa] dark:bg-slate-900 border-t border-slate-200/80 dark:border-slate-800 overflow-hidden transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                    
                    <!-- Columna Izquierda: Unidad Taller Móvil CONSUR -->
                    <div class="lg:col-span-6 relative flex flex-col items-center justify-center order-1 lg:order-1" data-aos="fade-right">
                        <picture>
                            <source srcset="{{ asset('images/home/consurmovil.webp') }}" type="image/webp">
                            <img src="{{ asset(ltrim($tallerImg, '/')) }}"
                                 alt="Taller Móvil CONSUR S.A."
                                 class="w-full max-w-[650px] h-auto object-contain drop-shadow-2xl transition-transform duration-500 hover:scale-[1.02]">
                        </picture>
                    </div>

                    <!-- Columna Derecha: Información, 12 Puntos y Agendamiento -->
                    <div class="lg:col-span-6 space-y-6 order-2 lg:order-2" data-aos="fade-left" data-aos-delay="150">
                        <div>
                            <span class="inline-flex items-center gap-1.5 text-xs uppercase font-semibold tracking-widest text-red-600">
                                <i class="fas fa-tools text-[11px]"></i>
                                {{ $secTaller->content['badge'] ?? '¡Una nueva solución para vos!' }}
                            </span>
                            <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-neutral-900 dark:text-white font-heading uppercase tracking-wide mt-1">
                                {{ $secTaller->content['title'] ?? 'Taller Móvil CONSUR' }}
                            </h2>
                        </div>

                        <p class="text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                            {{ $secTaller->content['desc'] ?? 'Porque tu tiempo es importante nos acercamos a vos. Servicio pos-venta CONSUR Móvil: te ofrecemos mantenimiento express para tu vehículo en tu hogar u oficina.' }}
                        </p>

                        <!-- Grilla de 12 Puntos de Inspección Oficiales -->
                        <div class="bg-white dark:bg-slate-950 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 block mb-3">
                                Cobertura de Mantenimiento & Inspección Express
                            </span>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-2.5 gap-x-4">
                                @foreach($tallerChecklist as $point)
                                    <div class="flex items-center gap-2 text-xs sm:text-sm font-medium text-slate-700 dark:text-slate-200">
                                        <span class="w-4 h-4 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 flex items-center justify-center flex-shrink-0 text-[9px]">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span>{{ $point }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-1 flex flex-wrap gap-3.5">
                            <a href="{{ $secTaller->content['button_1_url'] ?? \App\Models\Setting::get('turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131') }}"
                               target="_blank" rel="noopener"
                               class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider px-6 py-3.5 rounded-xl transition shadow-md shadow-red-600/20 flex items-center gap-2">
                                <i class="far fa-calendar-check"></i>
                                <span>{{ $secTaller->content['button_1_text'] ?? 'Agendar Turno Online' }}</span>
                            </a>
                            <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text={{ urlencode($secTaller->content['button_2_msg'] ?? 'Hola CONSUR, solicito el servicio de Taller Móvil') }}"
                               target="_blank" rel="noopener"
                               class="bg-slate-900 dark:bg-slate-800 hover:bg-slate-800 dark:hover:bg-slate-700 text-white font-bold text-xs uppercase tracking-wider px-6 py-3.5 rounded-xl transition shadow-md flex items-center gap-2">
                                <i class="fab fa-whatsapp text-sm text-emerald-400"></i>
                                <span>{{ $secTaller->content['button_2_text'] ?? 'Solicitar Taller Móvil' }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- 3.5. Ecosistema Oficial: Mosaico Panorámico de Marcas & Divisiones CONSUR S.A. (Modo Oscuro Premium Full-Width) -->
    <x-frontend.brand-showcase-grid />

    <!-- 4. Banner Usados Certificados con Garantía (Luminoso, Comercial & Limpio) -->
    @php $secUsados = \App\Models\SiteSection::getSection('usados_banner'); @endphp
    @if($secUsados->is_visible)
        <section class="py-16 md:py-20 bg-white dark:bg-slate-950 text-slate-900 dark:text-white relative border-t border-slate-100 dark:border-neutral-800 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-10" data-aos="fade-up">
                    <div class="max-w-xl space-y-4">
                        <span class="inline-flex items-center gap-2 text-xs font-bold tracking-[0.2em] uppercase text-slate-400 dark:text-neutral-500">
                            <span class="w-2 h-2 rounded-full bg-red-600"></span>
                            {{ $secUsados->content['badge'] ?? 'CONSUR Usados Certificados' }}
                        </span>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                            {{ $secUsados->content['title'] ?? 'Vehículos Usados Seleccionados' }}
                        </h2>
                        <p class="text-slate-600 dark:text-slate-300 text-sm md:text-base leading-relaxed font-light">
                            {{ $secUsados->content['desc'] ?? 'Gran variedad de vehículos usados de diferentes marcas y modelos con certificación mecánica y garantía de procedencia.' }}
                        </p>
                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="{{ $secUsados->content['button_url'] ?? '/usados' }}" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider px-7 py-3.5 rounded-xl transition shadow-md shadow-red-600/25 flex items-center gap-2">
                                <span>{{ $secUsados->content['button_text'] ?? 'Ver Todo el Stock de Usados' }}</span>
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Showcase de 2 Usados Destacados -->
                    <div class="w-full lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($featuredUsados->take(2) as $u)
                            <a href="{{ route('vehiculo.detalle', $u->slug) }}" class="bg-slate-50 dark:bg-neutral-900/90 rounded-2xl p-4 border border-slate-200/80 dark:border-neutral-800 hover:border-slate-300 dark:hover:border-neutral-700 hover:shadow-xl transition-all group flex flex-col justify-between">
                                <div class="aspect-[16/10] rounded-xl overflow-hidden mb-3 bg-slate-200 dark:bg-neutral-800">
                                    <img src="{{ $u->primary_image_url }}" alt="{{ $u->full_name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                </div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-white uppercase group-hover:text-red-600 transition">{{ $u->model }} {{ $u->version }}</h4>
                                <div class="flex justify-between items-center mt-2.5 text-xs">
                                    <span class="text-slate-500 dark:text-slate-400 font-light">{{ $u->year }} &bull; {{ $u->formatted_mileage }}</span>
                                    <span class="font-extrabold text-slate-900 dark:text-white">{{ $u->formatted_price_usd }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- 5. Llamada a la Acción: Visita Nuestra Tienda Online (CONSUR Shop -> https://consurshop.com) -->
    @php $secShop = \App\Models\SiteSection::getSection('consur_shop_cta'); @endphp
    @if($secShop->is_visible)
        <section id="consur-shop" class="py-16 md:py-24 bg-slate-50 dark:bg-slate-900/90 border-t border-slate-200/80 dark:border-slate-800 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                    <!-- Columna Izquierda: Editorial Premium -->
                    <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                        <div class="inline-flex items-center gap-2 text-red-600 text-xs font-bold uppercase tracking-[0.2em]">
                            <span class="w-8 h-[2px] bg-red-600"></span>
                            <span>{{ $secShop->content['badge'] ?? 'Tienda Oficial • CONSUR Shop' }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide leading-tight">
                            {{ $secShop->content['title'] ?? 'Visitá Nuestra Tienda Online' }}
                        </h2>

                        <p class="text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                            {{ $secShop->content['desc'] ?? '¡Enterate de todo lo que tenemos para vos! Encontrá repuestos, accesorios originales, neumáticos, bicicletas y productos destacados comprando online de forma rápida y 100% segura.' }}
                        </p>

                        <!-- Pilares de Confianza -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                            <div class="flex items-center gap-2.5 text-xs font-semibold text-slate-700 dark:text-slate-300">
                                <span class="w-7 h-7 rounded-full bg-white dark:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 text-slate-900 dark:text-white flex items-center justify-center shrink-0 shadow-xs">
                                    <i class="fas fa-lock text-[11px]"></i>
                                </span>
                                <span>Compra 100% Segura</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs font-semibold text-slate-700 dark:text-slate-300">
                                <span class="w-7 h-7 rounded-full bg-white dark:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 text-slate-900 dark:text-white flex items-center justify-center shrink-0 shadow-xs">
                                    <i class="fas fa-truck-fast text-[11px]"></i>
                                </span>
                                <span>Envíos a todo el país</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs font-semibold text-slate-700 dark:text-slate-300">
                                <span class="w-7 h-7 rounded-full bg-white dark:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 text-slate-900 dark:text-white flex items-center justify-center shrink-0 shadow-xs">
                                    <i class="fas fa-certificate text-[11px]"></i>
                                </span>
                                <span>Garantía CONSUR</span>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="{{ $secShop->content['button_url'] ?? 'https://consurshop.com' }}"
                               target="_blank" rel="noopener"
                               class="inline-flex items-center gap-3 bg-slate-900 dark:bg-slate-800 hover:bg-red-600 dark:hover:bg-red-600 text-white font-bold text-xs uppercase tracking-widest px-8 py-3.5 rounded-xl transition-colors duration-300 shadow-md shadow-slate-900/10">
                                <i class="fas fa-shopping-bag text-xs"></i>
                                <span>{{ $secShop->content['button_text'] ?? 'Visitar ConsurShop.com' }}</span>
                                <i class="fas fa-arrow-up-right-from-square text-[10px] opacity-80"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Columna Derecha: Imagen Oficial de CONSUR Shop -->
                    <div class="lg:col-span-7" data-aos="fade-left" data-aos-delay="150">
                        <a href="{{ $secShop->content['button_url'] ?? 'https://consurshop.com' }}"
                           target="_blank" rel="noopener"
                           class="relative block w-full group rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl shadow-slate-300/70 dark:shadow-black/70 border border-slate-200/90 dark:border-slate-800 hover:border-red-500/50 hover:shadow-red-600/15 transition-all duration-500">
                            <picture class="block w-full overflow-hidden">
                                <source srcset="{{ asset('images/home/banner_consurshop.webp') }}" type="image/webp">
                                <img src="{{ asset(ltrim($secShop->content['banner_image'] ?? '/images/home/banner_consurshop.jpg', '/')) }}"
                                     alt="Visita Nuestra Tienda Online - CONSUR Shop"
                                     loading="lazy"
                                     decoding="async"
                                     class="w-full h-auto object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            </picture>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- 6. Gran Variedad de Servicios (Diseño Moderno sobre Fondo Oficial CONSUR) -->
    @php
        $secQuick = \App\Models\SiteSection::getSection('quick_value_bar');
        $defaultServices = [
            1 => [
                'num' => '01',
                'icon' => 'fas fa-cogs',
                'image' => '/images/home/turbo.png',
                'title' => 'Repuestos originales',
                'desc' => 'Tenemos todo lo que buscas con precios que te harán ahorrar dinero y ganar seguridad.',
            ],
            2 => [
                'num' => '02',
                'icon' => 'fas fa-sliders-h',
                'image' => '/images/home/steering-wheel.png',
                'title' => 'Equipamiento',
                'desc' => 'Personalice su vehículo con una gran variedad de accesorios que disponemos para usted.',
            ],
            3 => [
                'num' => '03',
                'icon' => 'fas fa-stethoscope',
                'image' => '/images/home/suspension.png',
                'title' => 'Chequeo & Diagnóstico',
                'desc' => 'Diagnosticamos si tu vehículo está en condiciones normales de funcionamiento.',
            ],
            4 => [
                'num' => '04',
                'icon' => 'fas fa-tablet-alt',
                'image' => '/images/home/support.png',
                'title' => 'Service Tablet',
                'desc' => 'Valoramos tu tiempo y estamos comprometidos en brindarte el mejor servicio Post venta.',
            ],
        ];
    @endphp
    @if($secQuick->is_visible)
        <section id="servicios-consur" class="relative py-20 md:py-28 bg-slate-950 text-white overflow-hidden">
            <!-- Imagen de Fondo Oficial con Overlay Moderno -->
            <div class="absolute inset-0 bg-cover bg-center bg-fixed opacity-30"
                 style="background-image: url('{{ asset(ltrim($secQuick->content['background_image'] ?? '/images/home/toyotaaclientes.jpg', '/')) }}')"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-900/80 to-slate-950/95"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Encabezado Centrado -->
                <div class="text-center max-w-3xl mx-auto mb-14 space-y-3" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-red-600/20 border border-red-500/30 text-red-400 text-xs font-semibold uppercase tracking-widest">
                        {{ $secQuick->content['badge'] ?? 'Respaldo Posventa Integral' }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-white font-heading uppercase tracking-wide">
                        {{ $secQuick->content['title'] ?? 'Gran variedad de servicios' }}
                    </h2>
                    <p class="text-sm sm:text-base text-slate-300 font-normal leading-relaxed">
                        {{ $secQuick->content['desc'] ?? 'Para una mejor atención disponemos de cinco locales, con la más amplia gama de vehículos, repuestos y servicios.' }}
                    </p>
                </div>

                <!-- 4 Tarjetas Modernas Numeradas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $item = $secQuick->content['item_' . $i] ?? [];
                            $def = $defaultServices[$i];
                            $title = !empty($item['title']) ? $item['title'] : $def['title'];
                            $desc = !empty($item['desc']) ? $item['desc'] : $def['desc'];
                            $img = !empty($item['image']) ? $item['image'] : $def['image'];
                        @endphp
                        <div class="group relative bg-white/10 hover:bg-white/15 backdrop-blur-md rounded-3xl p-7 border border-white/15 hover:border-red-500/60 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between shadow-xl"
                             data-aos="fade-up"
                             data-aos-delay="{{ $i * 100 }}">
                            <div>
                                <!-- Cabecera de la Tarjeta: Icono + Número -->
                                <div class="flex items-center justify-between mb-6">
                                    <div class="w-14 h-14 rounded-2xl bg-red-600/90 group-hover:bg-red-600 flex items-center justify-center shadow-lg shadow-red-600/30 transition">
                                        @if(!empty($img) && file_exists(public_path(ltrim($img, '/'))))
                                            <img src="{{ asset(ltrim($img, '/')) }}" alt="{{ $title }}" class="w-8 h-8 object-contain brightness-0 invert">
                                        @else
                                            <i class="{{ $item['icon'] ?? $def['icon'] }} text-white text-xl"></i>
                                        @endif
                                    </div>
                                    <span class="text-3xl font-light text-white/25 group-hover:text-red-400/80 font-heading transition-colors select-none">
                                        0{{ $i }}
                                    </span>
                                </div>

                                <!-- Título y Descripción -->
                                <h3 class="text-lg font-medium text-white font-heading tracking-wide mb-2.5 group-hover:text-red-400 transition-colors">
                                    {{ $title }}
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                                    {{ $desc }}
                                </p>
                            </div>

                            <!-- Línea decorativa inferior -->
                            <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between text-[11px] text-slate-400 group-hover:text-white transition">
                                <span>Servicio Oficial CONSUR</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    @endif

    <!-- 6.5. Estamos en Instagram (Feed Sincronizado Automáticamente con @consur_toyota) -->
    @php
        $igPosts = \App\Services\InstagramFeedService::getPosts(12);
        $igProfileUrl = \App\Models\Setting::get('instagram_url', 'https://www.instagram.com/consur_toyota/');
    @endphp
    @if(count($igPosts) > 0)
        <section id="instagram-feed" class="py-16 md:py-22 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 select-none transition-colors"
                 x-data="{
                    page: 0,
                    totalPages: {{ max(1, (int) ceil(count($igPosts) / 4)) }},
                    next() { this.page = (this.page + 1) % this.totalPages; },
                    prev() { this.page = (this.page - 1 + this.totalPages) % this.totalPages; }
                 }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Feed de Instagram Oficial CONSUR -->
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10" data-aos="fade-up">
                    <div>
                        <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-red-600 mb-1.5">
                            <i class="fab fa-instagram text-sm"></i>
                            <span>@consur_toyota</span>
                        </span>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                            Estamos en Instagram
                        </h2>
                    </div>

                    <div class="flex items-center gap-3">
                        @if(count($igPosts) > 4)
                            <div class="hidden sm:flex items-center gap-2 mr-2">
                                <button type="button" @click="prev()"
                                        class="w-10 h-10 rounded-full border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 hover:bg-red-600 dark:hover:bg-red-600 hover:border-red-600 dark:hover:border-red-600 hover:text-white dark:hover:text-white text-slate-700 dark:text-slate-200 flex items-center justify-center transition shadow-2xs cursor-pointer"
                                        aria-label="Anterior">
                                    <i class="fas fa-chevron-left text-xs"></i>
                                </button>
                                <button type="button" @click="next()"
                                        class="w-10 h-10 rounded-full border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 hover:bg-red-600 dark:hover:bg-red-600 hover:border-red-600 dark:hover:border-red-600 hover:text-white dark:hover:text-white text-slate-700 dark:text-slate-200 flex items-center justify-center transition shadow-2xs cursor-pointer"
                                        aria-label="Siguiente">
                                    <i class="fas fa-chevron-right text-xs"></i>
                                </button>
                            </div>
                        @endif

                        <a href="{{ $igProfileUrl }}" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2.5 bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] hover:opacity-95 text-white font-bold text-xs uppercase tracking-wider px-6 py-3 rounded-full transition shadow-md">
                            <i class="fab fa-instagram text-sm"></i>
                            <span>Seguir en Instagram</span>
                        </a>
                    </div>
                </div>

                <!-- Grilla / Carrusel de Posteos (4 por página en Desktop) -->
                <div class="relative" data-aos="fade-up" data-aos-delay="150">
                    @foreach(array_chunk($igPosts, 4) as $pageIndex => $chunk)
                        <div x-show="page === {{ $pageIndex }}"
                             @if($pageIndex > 0) x-cloak @endif
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                            @foreach($chunk as $ig)
                                <div class="bg-white dark:bg-slate-950 rounded-2xl border border-slate-200/90 dark:border-slate-800 shadow-xs hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col group">
                                    <!-- Top User Bar (Idéntico al plugin sbi-modern boxed de consur.com.py) -->
                                    <a href="{{ $ig['url'] }}" target="_blank" rel="noopener"
                                       class="px-4 py-3 flex items-center justify-between border-b border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-950">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <img src="{{ asset(ltrim($ig['avatar'] ?? '/images/instagram/avatar.jpg', '/')) }}"
                                                 alt="{{ $ig['username'] }}"
                                                 class="w-8 h-8 rounded-full object-cover border border-slate-200 dark:border-slate-700 shrink-0">
                                            <div class="min-w-0">
                                                <span class="block text-xs font-bold text-slate-900 dark:text-white truncate">{{ $ig['username'] }}</span>
                                                @if(!empty($ig['date_label']))
                                                    <span class="block text-[10px] text-slate-400 dark:text-slate-400 font-medium">{{ $ig['date_label'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <i class="fab fa-instagram text-slate-400 dark:text-slate-400 group-hover:text-pink-600 transition text-sm"></i>
                                    </a>

                                    <!-- Imagen Cuadrada + Ícono de Tipo + Overlay de Caption en Hover -->
                                    <a href="{{ $ig['url'] }}" target="_blank" rel="noopener"
                                       class="relative aspect-square w-full bg-slate-100 dark:bg-slate-900 overflow-hidden block">
                                        <img src="{{ str_starts_with($ig['image'], 'http') ? $ig['image'] : asset(ltrim($ig['image'], '/')) }}"
                                             alt="{{ Str::limit($ig['caption'] ?? 'Instagram CONSUR', 60) }}"
                                             loading="lazy"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                                        <!-- Indicador de Reel/Video o Carrusel -->
                                        @if(in_array($ig['type'], ['video', 'reels']))
                                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none group-hover:opacity-0 transition-opacity duration-200">
                                                <div class="w-12 h-12 rounded-full bg-black/55 backdrop-blur-xs text-white flex items-center justify-center shadow-lg">
                                                    <i class="fas fa-play text-sm ml-0.5"></i>
                                                </div>
                                            </div>
                                        @elseif($ig['type'] === 'carousel')
                                            <div class="absolute top-3 right-3 w-7 h-7 rounded-lg bg-black/55 backdrop-blur-xs text-white flex items-center justify-center text-xs pointer-events-none">
                                                <i class="fas fa-clone"></i>
                                            </div>
                                        @endif

                                        <!-- Hover Overlay con el Texto del Post y Likes/Comentarios -->
                                        <div class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-5 flex flex-col justify-between text-white">
                                            <p class="text-xs leading-relaxed text-white/95 line-clamp-7 font-normal">
                                                {{ $ig['caption'] }}
                                            </p>

                                            <div class="pt-3 border-t border-white/15 flex items-center justify-between text-xs font-semibold">
                                                <div class="flex items-center gap-4">
                                                    <span class="inline-flex items-center gap-1.5">
                                                        <i class="fas fa-heart text-red-500"></i>
                                                        <span>{{ $ig['likes'] ?? 0 }}</span>
                                                    </span>
                                                    <span class="inline-flex items-center gap-1.5">
                                                        <i class="fas fa-comment text-sky-400"></i>
                                                        <span>{{ $ig['comments'] ?? 0 }}</span>
                                                    </span>
                                                </div>
                                                <span class="text-[11px] uppercase tracking-wider text-white/80 flex items-center gap-1">
                                                    <span>Ver post</span>
                                                    <i class="fas fa-external-link-alt text-[9px]"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <!-- Indicadores de Página del Carrusel -->
                @if(count($igPosts) > 4)
                    <div class="flex items-center justify-center gap-2 mt-7">
                        @for($p = 0; $p < ceil(count($igPosts) / 4); $p++)
                            <button type="button"
                                    @click="page = {{ $p }}"
                                    :class="page === {{ $p }} ? 'w-7 bg-red-600' : 'w-2 bg-slate-300 hover:bg-slate-400'"
                                    class="h-2 rounded-full transition-all duration-300 cursor-pointer"
                                    aria-label="Página {{ $p + 1 }}"></button>
                        @endfor
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- 7. Podcast Oficial CONSUR (Carga Automática del Último Episodio en Spotify + Enlace al Canal) -->
    @php
        $secPodcast = \App\Models\SiteSection::getSection('podcast_section');
        $spotifyChannelUrl = $secPodcast->content['spotify_show_url'] ?? 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2?si=50dea64677714274';
        $spotifyShowId = '2c7HzcDvLF5XXMPbOckJn2';
        if (preg_match('/show\/([a-zA-Z0-9]+)/', $spotifyChannelUrl, $mShow)) {
            $spotifyShowId = $mShow[1];
        }
        $spotifyEmbedUrl = "https://open.spotify.com/embed/show/{$spotifyShowId}/video?utm_source=generator";
    @endphp
    @if($secPodcast->is_visible)
        <section id="podcast" class="relative py-20 md:py-28 bg-slate-950 text-white overflow-hidden border-t border-neutral-900 select-none">
            <!-- Resplandores y Fondo Cinemático Modo Oscuro -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900/95 to-slate-950"></div>
            <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-emerald-500/15 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full bg-red-600/10 blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                    <!-- Información y Botón al Canal -->
                    <div class="lg:col-span-5 space-y-6 text-center lg:text-left" data-aos="fade-right">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 text-xs font-semibold uppercase tracking-widest">
                            <i class="fab fa-spotify text-sm"></i>
                            <span>{{ $secPodcast->content['podcast_badge'] ?? 'Conecta con CONSUR • Podcast Oficial' }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-light text-white font-heading uppercase tracking-wide leading-tight">
                            {{ $secPodcast->content['podcast_title'] ?? 'Último Episodio en Spotify' }}
                        </h2>

                        <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-normal">
                            {{ $secPodcast->content['podcast_desc'] ?? 'Escuchá o mirá automáticamente nuestro episodio más reciente sobre novedades automotrices, tecnología Toyota y consejos de posventa, o visitá nuestro canal oficial con todos los capítulos.' }}
                        </p>

                        <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-4">
                            <a href="{{ $spotifyChannelUrl }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2.5 bg-[#1DB954] hover:bg-[#1ed760] text-slate-950 font-bold text-xs uppercase tracking-wider px-7 py-4 rounded-full transition-all duration-300 shadow-lg shadow-[#1DB954]/25 hover:shadow-[#1DB954]/40 hover:scale-105">
                                <i class="fab fa-spotify text-base"></i>
                                <span>Ir al Canal en Spotify</span>
                                <i class="fas fa-external-link-alt text-[10px]"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Reproductor Oficial Spotify (Actualiza automáticamente al último episodio publicado en el canal) -->
                    <div class="lg:col-span-7" data-aos="fade-left" data-aos-delay="150">
                        <div class="rounded-2xl overflow-hidden shadow-2xl border border-white/10 bg-slate-900/80 backdrop-blur-md p-1.5">
                            <iframe data-testid="embed-iframe"
                                    style="border-radius:12px"
                                    src="{{ $spotifyEmbedUrl }}"
                                    width="100%"
                                    height="352"
                                    frameBorder="0"
                                    allowfullscreen=""
                                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                    loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- 7. Sucursales de CONSUR S.A. con Pestañas Interactivas y Mapa Propio -->
    @php $secBranches = \App\Models\SiteSection::getSection('branches_section'); @endphp
    @if($secBranches->is_visible && $branches->count() > 0)
        <section id="sucursales" class="py-16 md:py-24 bg-white dark:bg-slate-900 border-t border-slate-200/80 dark:border-slate-800 transition-colors"
                 x-data="{ activeBranch: {{ $branches->first()->id }} }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Encabezado -->
                <div class="text-center max-w-2xl mx-auto mb-10" data-aos="fade-up">
                    <span class="text-xs uppercase font-medium tracking-widest text-red-600">
                        {{ $secBranches->content['badge'] ?? 'Red de Atención Oficial' }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-neutral-900 dark:text-white font-heading uppercase tracking-wide mt-1">
                        {{ $secBranches->content['title'] ?? 'Nuestras Sucursales' }}
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-2">
                        {{ $secBranches->content['desc'] ?? 'Seleccioná una sucursal para ver su ubicación exacta en el mapa, teléfonos directos y horarios de atención.' }}
                    </p>
                </div>

                <!-- Navegación de Pestañas por Ciudad / Sucursal -->
                <div class="flex items-center justify-start sm:justify-center overflow-x-auto no-scrollbar pb-2 mb-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="inline-flex items-center gap-2 p-1.5 rounded-2xl bg-slate-100 dark:bg-slate-950 border border-slate-200/80 dark:border-slate-800">
                        @foreach($branches as $bTab)
                            <button type="button"
                                    @click="activeBranch = {{ $bTab->id }}"
                                    :class="activeBranch === {{ $bTab->id }}
                                        ? 'bg-red-600 text-white shadow-sm font-semibold'
                                        : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-white/60 dark:hover:bg-slate-800 font-medium'"
                                    class="px-4 sm:px-5 py-2.5 rounded-xl text-xs sm:text-sm transition-all duration-200 whitespace-nowrap flex items-center gap-2 cursor-pointer">
                                <i class="fas fa-map-marker-alt text-xs"
                                   :class="activeBranch === {{ $bTab->id }} ? 'text-white' : 'text-red-600'"></i>
                                <span>{{ $bTab->city }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Contenido de la Sucursal Seleccionada + Su Mapa Propio -->
                <div data-aos="fade-up" data-aos-delay="150">
                    @foreach($branches as $b)
                        <div x-show="activeBranch === {{ $b->id }}"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             @if(!$loop->first) x-cloak @endif
                             class="bg-white dark:bg-slate-950 rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-lg overflow-hidden">
                            <div class="grid grid-cols-1 lg:grid-cols-12">
                            <!-- Columna Izquierda: Datos de la Sucursal -->
                            <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between space-y-6 bg-slate-50/60 dark:bg-slate-950">
                                <div class="space-y-5">
                                    <div>
                                        <div class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-widest text-red-600 mb-1">
                                            <i class="fas fa-building"></i>
                                            <span>{{ $b->city }} • Paraguay</span>
                                        </div>
                                        <h3 class="text-2xl sm:text-3xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                                            {{ $b->name }}
                                        </h3>
                                    </div>

                                    <!-- Lista de Datos -->
                                    <div class="space-y-3.5 text-sm text-slate-600 dark:text-slate-300 pt-2 border-t border-slate-200/80 dark:border-slate-800">
                                        <div class="flex items-start gap-3">
                                            <div class="w-8 h-8 rounded-xl bg-red-50 dark:bg-red-950/40 text-red-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <i class="fas fa-map-marker-alt text-xs"></i>
                                            </div>
                                            <div>
                                                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 block">Dirección</span>
                                                <span class="text-slate-800 dark:text-slate-200 font-medium">{{ $b->address }}</span>
                                            </div>
                                        </div>

                                        @if($b->phone)
                                            <div class="flex items-start gap-3">
                                                <div class="w-8 h-8 rounded-xl bg-slate-200/70 dark:bg-slate-800 text-slate-700 dark:text-slate-300 flex items-center justify-center flex-shrink-0 mt-0.5">
                                                    <i class="fas fa-phone-alt text-xs"></i>
                                                </div>
                                                <div>
                                                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 block">Teléfono</span>
                                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $b->phone) }}" class="text-slate-800 dark:text-slate-200 font-semibold hover:text-red-600 dark:hover:text-red-500 transition">
                                                        {{ $b->phone }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        @if($b->email)
                                            <div class="flex items-start gap-3">
                                                <div class="w-8 h-8 rounded-xl bg-slate-200/70 dark:bg-slate-800 text-slate-700 dark:text-slate-300 flex items-center justify-center flex-shrink-0 mt-0.5">
                                                    <i class="fas fa-envelope text-xs"></i>
                                                </div>
                                                <div>
                                                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 block">Correo Electrónico</span>
                                                    <a href="mailto:{{ $b->email }}" class="text-slate-800 dark:text-slate-200 font-medium hover:text-red-600 dark:hover:text-red-500 transition">
                                                        {{ $b->email }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        @if($b->schedule_weekdays || $b->schedule_saturday)
                                            <div class="flex items-start gap-3">
                                                <div class="w-8 h-8 rounded-xl bg-slate-200/70 dark:bg-slate-800 text-slate-700 dark:text-slate-300 flex items-center justify-center flex-shrink-0 mt-0.5">
                                                    <i class="far fa-clock text-xs"></i>
                                                </div>
                                                <div class="text-xs leading-relaxed">
                                                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 block">Horario de Atención</span>
                                                    @if($b->schedule_weekdays)
                                                        <div class="text-slate-700 dark:text-slate-300">{{ $b->schedule_weekdays }}</div>
                                                    @endif
                                                    @if($b->schedule_saturday)
                                                        <div class="text-slate-600 dark:text-slate-400">{{ $b->schedule_saturday }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Etiquetas de Servicios en la Sede -->
                                    <div class="flex flex-wrap items-center gap-2 pt-1">
                                        @if($b->has_workshop)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800">
                                                <i class="fas fa-tools text-[10px]"></i> Taller Oficial Toyota
                                            </span>
                                        @endif
                                        @if($b->has_mobile_workshop)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold bg-sky-50 dark:bg-sky-950/40 text-sky-700 dark:text-sky-300 border border-sky-200 dark:border-sky-800">
                                                <i class="fas fa-truck-pickup text-[10px]"></i> Taller Móvil Disponible
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Botones de Acción Directa -->
                                <div class="pt-4 border-t border-slate-200/80 dark:border-slate-800 flex flex-wrap items-center gap-3">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $b->whatsapp ?: '595985204106') }}?text={{ urlencode('Hola CONSUR, quisiera comunicarme con la sucursal de ' . $b->city) }}"
                                       target="_blank" rel="noopener"
                                       class="flex-1 inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-wider py-3 px-5 rounded-xl transition shadow-sm">
                                        <i class="fab fa-whatsapp text-sm"></i>
                                        <span>WhatsApp {{ $b->city }}</span>
                                    </a>
                                    @if($b->phone)
                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $b->phone) }}"
                                           class="inline-flex items-center justify-center gap-2 bg-white dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-800 text-xs font-bold uppercase tracking-wider py-3 px-4 rounded-xl transition">
                                            <i class="fas fa-phone-alt text-red-600"></i>
                                            <span>Llamar</span>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Columna Derecha: Mapa Interactivo Propio de la Sucursal -->
                            <div class="lg:col-span-7 min-h-[340px] sm:min-h-[420px] lg:min-h-[460px] bg-slate-100 dark:bg-slate-900 relative">
                                <iframe src="{{ $b->embed_map_url }}"
                                        class="w-full h-full min-h-[340px] sm:min-h-[420px] lg:min-h-[460px] border-0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                        title="Mapa {{ $b->name }} - {{ $b->city }}"></iframe>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
    @endif

</div>
