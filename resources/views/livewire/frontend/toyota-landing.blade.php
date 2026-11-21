<div>
    <!-- 1. Hero Banner Dinámico Oficial Toyota CONSUR S.A. -->
    <div class="relative bg-neutral-950 text-white overflow-hidden py-16 md:py-24">
        <div class="absolute inset-0 z-0">
            <picture class="w-full h-full block">
                <source srcset="{{ asset('images/toyota/hiluxcostanera.webp') }}" type="image/webp">
                <img src="{{ asset('images/toyota/hiluxcostanera.jpg') }}" 
                     alt="Toyota Hilux en Costanera de Encarnación - CONSUR S.A." 
                     fetchpriority="high"
                     loading="eager"
                     decoding="async"
                     class="w-full h-full object-cover object-center opacity-85 transform motion-safe:transition-transform duration-1000 ease-out">
            </picture>
            <!-- Velo uniforme parejo para apreciar toda la fotografía sin oscurecer la izquierda -->
            <div class="absolute inset-0 bg-neutral-950/35"></div>
            <!-- Transición suave vertical hacia el catálogo -->
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950/90 via-transparent to-neutral-950/25"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs text-neutral-300 mb-4 drop-shadow-[0_1px_3px_rgba(0,0,0,0.8)]">
                <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a>
                <span class="text-neutral-500">/</span>
                <span class="text-neutral-300">Marcas</span>
                <span class="text-neutral-500">/</span>
                <span class="text-red-400 font-medium truncate">Toyota</span>
            </nav>

            <div class="inline-flex items-center gap-2 mb-3 bg-neutral-950/60 backdrop-blur-xs px-3.5 py-1.5 border-l-2 border-red-600 shadow-md" data-aos="fade-down">
                <img src="/images/marcas/toyota.svg" alt="Toyota Logo" class="h-5 w-auto object-contain filter brightness-0 invert">
                <span class="h-3.5 w-px bg-neutral-700"></span>
                <span class="text-xs uppercase font-medium tracking-widest text-red-500">
                    CONSUR S.A. &bull; Concesionaria Oficial en Paraguay
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-light text-white tracking-normal font-heading leading-tight drop-shadow-[0_2px_10px_rgba(0,0,0,0.9)]" data-aos="fade-up" data-aos-delay="100">
                Toyota Paraguay &bull; <span class="font-normal text-red-500">Gama 0 Km</span>
            </h1>

            <p class="mt-4 text-base sm:text-lg text-neutral-200 max-w-3xl font-light leading-relaxed drop-shadow-[0_1px_6px_rgba(0,0,0,0.9)]" data-aos="fade-up" data-aos-delay="200">
                Descubrí los vehículos 0 Km más confiables y duraderos del mundo. Conducción placentera, tecnología híbrida autorrecargable y el respaldo oficial de <strong class="text-white font-medium">CONSUR S.A.</strong> con más de 40 años de liderazgo en el sur del país.
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-4" data-aos="fade-up" data-aos-delay="300">
                <a href="#catalogo" 
                   class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white text-xs sm:text-sm font-semibold rounded-xl shadow-lg shadow-red-600/30 transition-all">
                    <span>Explorar Modelos 0 Km</span>
                    <i class="fas fa-arrow-down text-xs"></i>
                </a>
                <a href="#servicio-tecnico" 
                   class="inline-flex items-center gap-2 px-6 py-3.5 bg-neutral-950/60 hover:bg-neutral-900/80 text-white border border-white/20 text-xs sm:text-sm font-semibold rounded-xl backdrop-blur-md transition-all shadow-md">
                    <i class="fas fa-tools text-red-400"></i>
                    <span>Servicio Técnico & Taller</span>
                </a>
                <a href="#sucursales" 
                   class="inline-flex items-center gap-2 px-6 py-3.5 bg-neutral-950/60 hover:bg-neutral-900/80 text-white border border-white/20 text-xs sm:text-sm font-semibold rounded-xl backdrop-blur-md transition-all shadow-md">
                    <i class="fas fa-map-marker-alt text-red-400"></i>
                    <span>Nuestras Sucursales</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Catálogo Interactivo de Modelos 0 Km Toyota (Filtro por Categorías y Enlace a Detalle) -->
    <section id="catalogo" class="py-16 md:py-24 bg-slate-50 dark:bg-slate-950 border-b border-slate-200/80 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center max-w-3xl mx-auto space-y-3" data-aos="fade-up">
                <span class="text-xs uppercase font-extrabold tracking-widest text-red-600">
                    Línea Oficial de Vehículos 0 Km
                </span>
                <h2 class="text-2xl sm:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                    Elegí tu Próximo <span class="font-bold text-red-600">Toyota</span>
                </h2>
                <p class="text-sm sm:text-base text-slate-500 dark:text-neutral-400 font-light">
                    Hacé clic en cualquier modelo para ingresar a su página oficial con ficha técnica, galería 360°, versiones y cotización personalizada.
                </p>
            </div>

            <!-- Tabs de Categorías con línea roja activa -->
            <div class="flex items-center justify-center">
                <div class="flex items-center gap-4 sm:gap-8 overflow-x-auto no-scrollbar px-2 pb-1">
                    <button wire:click="selectCategory('all')"
                            type="button"
                            class="group relative pb-2.5 text-xs sm:text-sm tracking-wide transition-all duration-200 whitespace-nowrap {{ $selectedCategory === 'all' ? 'font-bold text-slate-900 dark:text-white' : 'font-normal text-slate-500 dark:text-neutral-400 hover:text-slate-900 dark:hover:text-white' }}">
                        <span>Todos ({{ \App\Models\Vehicle::where('condition', '0km')->where('status', 'disponible')->count() }})</span>
                        @if($selectedCategory === 'all')
                            <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-red-600 rounded-full"></span>
                        @else
                            <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-transparent group-hover:bg-slate-200 dark:group-hover:bg-slate-800 rounded-full transition-all"></span>
                        @endif
                    </button>
                    @foreach($categories as $cat)
                        <button wire:click="selectCategory('{{ $cat->slug }}')"
                                type="button"
                                class="group relative pb-2.5 text-xs sm:text-sm tracking-wide transition-all duration-200 whitespace-nowrap {{ $selectedCategory === $cat->slug ? 'font-bold text-slate-900 dark:text-white' : 'font-normal text-slate-500 dark:text-neutral-400 hover:text-slate-900 dark:hover:text-white' }}">
                            <span>{{ $cat->name }}</span>
                            @if($selectedCategory === $cat->slug)
                                <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-red-600 rounded-full"></span>
                            @else
                                <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-transparent group-hover:bg-slate-200 dark:group-hover:bg-slate-800 rounded-full transition-all"></span>
                            @endif
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Grilla de Modelos Toyota 0 Km con Tarjetas Premium -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($vehicles as $veh)
                    <div class="bg-white dark:bg-slate-900/90 rounded-3xl border border-slate-200/80 dark:border-slate-800/80 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden group hover:-translate-y-1.5"
                         data-aos="fade-up"
                         data-aos-delay="{{ ($loop->index % 6) * 60 }}">
                        
                        <!-- Encabezado de la Tarjeta y Badge -->
                        <div>
                            <div class="relative h-[170px] bg-gradient-to-b from-slate-50 via-white to-slate-100/60 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 px-4 py-6 flex items-center justify-center overflow-hidden border-b border-slate-100 dark:border-slate-800">
                                
                                <!-- Badges Superiores -->
                                <div class="absolute top-4 left-4 z-10 flex items-center gap-1.5">
                                    <span class="bg-red-600 text-white text-[10px] font-extrabold uppercase px-2.5 py-0.5 rounded shadow-xs">
                                        0 KM
                                    </span>
                                    @if($veh->is_hybrid)
                                        <span class="bg-[#005cb9] text-white text-[10px] font-extrabold uppercase px-2 py-0.5 rounded shadow-xs flex items-center gap-1 tracking-wide">
                                            <i class="fas fa-bolt text-[8px]"></i> HEV Híbrido
                                        </span>
                                    @endif
                                </div>

                                <div class="absolute top-4 right-4 z-10">
                                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 dark:text-neutral-400 bg-white/90 dark:bg-neutral-800/90 backdrop-blur-xs px-2 py-0.5 rounded-full border border-slate-200/80 dark:border-neutral-700">
                                        {{ $veh->category->name ?? 'Toyota' }}
                                    </span>
                                </div>

                                <!-- Imagen del Vehículo (230x110) con Zoom Suave -->
                                <a href="{{ route('vehiculo.detalle', $veh->slug) }}" class="w-full h-full flex items-center justify-center pt-2">
                                    <img src="{{ $veh->primary_image_url }}" 
                                         alt="{{ $veh->full_name }}" 
                                         loading="lazy"
                                         class="w-[230px] h-[110px] max-w-[230px] max-h-[110px] object-contain filter drop-shadow-md group-hover:scale-105 transition-transform duration-500">
                                </a>
                            </div>

                            <!-- Información del Modelo -->
                            <div class="p-6 sm:p-7 space-y-4">
                                <div>
                                    <a href="{{ route('vehiculo.detalle', $veh->slug) }}" class="block group-hover:text-red-600 transition-colors">
                                        <h3 class="text-xl sm:text-2xl font-bold uppercase tracking-tight text-slate-900 dark:text-white font-heading">
                                            {{ $veh->model }}
                                        </h3>
                                    </a>
                                    @if($veh->version)
                                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-medium mt-0.5 line-clamp-1">
                                            {{ $veh->version }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Specs Resumidos en Pills Limpios -->
                                <div class="grid grid-cols-2 gap-2 text-xs text-slate-600 dark:text-neutral-300 pt-1">
                                    @if($veh->transmission)
                                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-100 dark:border-slate-800">
                                            <i class="fas fa-gear text-slate-400 dark:text-neutral-500 text-[11px]"></i>
                                            <span class="truncate">{{ $veh->transmission }}</span>
                                        </div>
                                    @endif
                                    @if($veh->fuel_type)
                                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-100 dark:border-slate-800">
                                            <i class="fas fa-gas-pump text-slate-400 dark:text-neutral-500 text-[11px]"></i>
                                            <span class="truncate">{{ $veh->fuel_type }}</span>
                                        </div>
                                    @endif
                                    @if($veh->traction)
                                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-100 dark:border-slate-800">
                                            <i class="fas fa-road text-slate-400 dark:text-neutral-500 text-[11px]"></i>
                                            <span class="truncate">{{ $veh->traction }}</span>
                                        </div>
                                    @endif
                                    @if($veh->engine)
                                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-100 dark:border-slate-800">
                                            <i class="fas fa-tachometer-alt text-slate-400 dark:text-neutral-500 text-[11px]"></i>
                                            <span class="truncate">{{ $veh->engine }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción de la Tarjeta -->
                        <div class="p-6 sm:p-7 pt-0 flex items-center gap-3">
                            <a href="{{ route('vehiculo.detalle', $veh->slug) }}" 
                               class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-slate-900 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 text-white text-xs font-bold uppercase rounded-xl transition-colors shadow-xs">
                                <span>Ver Modelo</span>
                                <i class="fas fa-arrow-right text-[10px]"></i>
                            </a>
                            <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20Toyota%20{{ urlencode($veh->model) }}%200%20Km." 
                               target="_blank"
                               class="p-3 bg-red-50 dark:bg-red-950/40 hover:bg-red-100 dark:hover:bg-red-900/50 text-red-600 dark:text-red-400 rounded-xl transition-colors text-sm"
                               title="Cotizar por WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800">
                        <i class="fas fa-car text-4xl text-slate-300 dark:text-neutral-600 mb-3 block"></i>
                        <h4 class="text-base font-bold text-slate-700 dark:text-neutral-200">No hay vehículos disponibles en esta categoría por el momento</h4>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- 3. Sección: Principios Toyota (Toyota Way) - Fiel a la Imagen Oficial -->
    <section class="py-16 md:py-24 bg-white dark:bg-slate-900 border-b border-slate-200/80 dark:border-slate-800 overflow-hidden transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
            
            <!-- Título y Subtítulo con subrayado oficial de la imagen -->
            <div class="text-center max-w-3xl mx-auto space-y-3" data-aos="fade-up">
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-light text-slate-900 dark:text-white font-heading tracking-tight">
                    Principios <span class="font-bold text-red-600">Toyota</span>
                </h2>
                <!-- Línea decorativa central como en la imagen -->
                <div class="w-16 h-1 bg-red-600 mx-auto rounded-full"></div>
                <p class="text-xs sm:text-base text-slate-500 dark:text-neutral-400 font-light max-w-xl mx-auto pt-1 leading-relaxed">
                    La Filosofía Toyota o (Toyota Way) se divide en 4 categorías que se describen en sus pilares fundamentales.
                </p>
            </div>

            <!-- Gráfico Central de Principios Toyota: 2 a la izquierda, Vehículo al centro, 2 a la derecha -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-6 items-center">
                
                <!-- Columna Izquierda: Filosofía & Procesos -->
                <div class="lg:col-span-4 space-y-10 lg:space-y-16" data-aos="fade-right">
                    
                    <!-- Pilar 1: Filosofía -->
                    <div class="flex items-center gap-4 sm:gap-6 text-left">
                        <div class="space-y-2 flex-1">
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white font-heading">
                                Filosofía
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                                Basa sus decisiones de administración en una filosofía de largo plazo, aún a costo de metas financieras a corto plazo.
                            </p>
                        </div>
                        <!-- Círculo Flotante Icono -->
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white dark:bg-slate-800 shadow-[0_10px_25px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_25px_rgba(0,0,0,0.5)] border border-slate-100 dark:border-slate-700/60 flex items-center justify-center flex-shrink-0 text-slate-800 dark:text-white text-2xl group hover:scale-105 transition-transform">
                            <i class="fas fa-compass text-red-600"></i>
                        </div>
                    </div>

                    <!-- Pilar 2: Procesos -->
                    <div class="flex items-center gap-4 sm:gap-6 text-left">
                        <div class="space-y-2 flex-1">
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white font-heading">
                                Procesos
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                                Crea un flujo de procesos de mejora continua dejando que los problemas afloren a la superficie.
                            </p>
                        </div>
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white dark:bg-slate-800 shadow-[0_10px_25px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_25px_rgba(0,0,0,0.5)] border border-slate-100 dark:border-slate-700/60 flex items-center justify-center flex-shrink-0 text-slate-800 dark:text-white text-2xl group hover:scale-105 transition-transform">
                            <i class="fas fa-cogs text-red-600"></i>
                        </div>
                    </div>

                </div>

                <!-- Columna Central: Render Frontal del Vehículo Toyota (frontservicios.png) -->
                <div class="lg:col-span-4 flex items-center justify-center py-6 lg:py-0" data-aos="zoom-in" data-aos-delay="150">
                    <div class="relative w-full max-w-sm sm:max-w-md flex flex-col items-center">
                        <img src="/images/toyota/frontservicios.png" 
                             alt="Principios Toyota - CONSUR S.A." 
                             class="w-full max-h-[300px] object-contain filter drop-shadow-[0_20px_25px_rgba(0,0,0,0.22)] hover:scale-105 transition-transform duration-500">
                        <div class="w-3/4 h-4 bg-slate-400/50 dark:bg-slate-950/70 rounded-full blur-md -mt-2"></div>
                    </div>
                </div>

                <!-- Columna Derecha: Personas & Resolución de Problemas -->
                <div class="lg:col-span-4 space-y-10 lg:space-y-16" data-aos="fade-left">
                    
                    <!-- Pilar 3: Personas -->
                    <div class="flex flex-row-reverse lg:flex-row items-center gap-4 sm:gap-6 text-left">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white dark:bg-slate-800 shadow-[0_10px_25px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_25px_rgba(0,0,0,0.5)] border border-slate-100 dark:border-slate-700/60 flex items-center justify-center flex-shrink-0 text-slate-800 dark:text-white text-2xl group hover:scale-105 transition-transform">
                            <i class="fas fa-users-gear text-red-600"></i>
                        </div>
                        <div class="space-y-2 flex-1">
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white font-heading">
                                Personas
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                                Forma líderes que entiendan su trabajo, vivan su filosofía y lo transmitan al equipo.
                            </p>
                        </div>
                    </div>

                    <!-- Pilar 4: Resolución De Problemas -->
                    <div class="flex flex-row-reverse lg:flex-row items-center gap-4 sm:gap-6 text-left">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white dark:bg-slate-800 shadow-[0_10px_25px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_25px_rgba(0,0,0,0.5)] border border-slate-100 dark:border-slate-700/60 flex items-center justify-center flex-shrink-0 text-slate-800 dark:text-white text-2xl group hover:scale-105 transition-transform">
                            <i class="fas fa-screwdriver-wrench text-red-600"></i>
                        </div>
                        <div class="space-y-2 flex-1">
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white font-heading">
                                Resolución De Problemas
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                                Convierte la empresa en una organización de aprendizaje a través de la reflexión, llamada Hansei, y la mejora continua.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Filosofía Kaizen Adicional extraída de https://consur.com.py/la-empresa/ -->
            <div class="p-6 sm:p-8 bg-slate-50 dark:bg-slate-950 rounded-2xl border border-slate-200/80 dark:border-slate-800 max-w-4xl mx-auto flex flex-col sm:flex-row items-center gap-5">
                <div class="w-12 h-12 rounded-xl bg-red-600 text-white flex items-center justify-center text-xl flex-shrink-0">
                    <i class="fas fa-award"></i>
                </div>
                <div class="space-y-1 text-center sm:text-left">
                    <h4 class="text-sm font-bold uppercase tracking-wider text-slate-900 dark:text-white font-heading">
                        La Filosofía Kaizen en CONSUR S.A.
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                        Nos inspira transitar como empresa incorporando la filosofía <strong>“Kaizen”</strong>; concepto basado en la mejora continua con el aporte fundamental de cada uno de los miembros del equipo, brindando siempre la máxima satisfacción al cliente.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. Servicio Técnico Especializado Toyota & Taller Móvil (Con Foto frontservicios.png de la-empresa) -->
    <section id="servicio-tecnico" class="py-16 md:py-24 bg-slate-50 dark:bg-slate-950 border-b border-slate-200/80 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                <!-- Columna Izquierda: Información del Servicio Técnico Oficial -->
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 text-red-600 text-xs font-bold uppercase tracking-widest">
                        <i class="fas fa-tools"></i>
                        <span>Posventa Oficial Especializada</span>
                    </div>

                    <h2 class="text-2xl sm:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide leading-tight">
                        Servicio Técnico & Posventa <span class="font-bold text-red-600">Toyota</span>
                    </h2>

                    <p class="text-slate-600 dark:text-neutral-300 text-sm sm:text-base leading-relaxed">
                        En <strong>CONSUR S.A.</strong> cuidamos tu vehículo con los mismos estándares de fábrica con los que fue construido. Contamos con tecnología de diagnóstico computarizado oficial Toyota, técnicos capacitados y certificados por Toyota Motor Corporation, y un stock permanente de repuestos legítimos.
                    </p>

                    <!-- Lista de Puntos Fuertes -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-xs text-slate-700 dark:text-neutral-200">
                        <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-xs">
                            <span class="w-5 h-5 rounded-full bg-red-100 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center text-[10px] flex-shrink-0">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="font-medium">Técnicos Certificados Toyota</span>
                        </div>
                        <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-xs">
                            <span class="w-5 h-5 rounded-full bg-red-100 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center text-[10px] flex-shrink-0">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="font-medium">Repuestos 100% Genuinos</span>
                        </div>
                        <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-xs">
                            <span class="w-5 h-5 rounded-full bg-red-100 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center text-[10px] flex-shrink-0">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="font-medium">Mantenimiento Express</span>
                        </div>
                        <div class="flex items-center gap-2.5 p-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-xs">
                            <span class="w-5 h-5 rounded-full bg-red-100 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center text-[10px] flex-shrink-0">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="font-medium">Taller Móvil en tu Domicilio</span>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="pt-4 flex flex-wrap items-center gap-4">
                        <a href="{{ \App\Models\Setting::get('turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131') }}" 
                           target="_blank" 
                           class="inline-flex items-center gap-2 px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white text-xs sm:text-sm font-bold uppercase rounded-xl shadow-md transition-all">
                            <i class="fas fa-calendar-check"></i>
                            <span>Agendar Turno Online</span>
                        </a>
                        <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%2C%20quisiera%20consultar%20sobre%20el%20Servicio%20T%C3%A9cnico%20y%20Repuestos%20Toyota." 
                           target="_blank" 
                           class="inline-flex items-center gap-2 px-6 py-3.5 bg-white dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-white border border-slate-200 dark:border-slate-800 text-xs sm:text-sm font-semibold rounded-xl shadow-xs transition-all">
                            <i class="fab fa-whatsapp text-emerald-600"></i>
                            <span>Consultar a Posventa</span>
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Foto de Posventa Oficial CONSUR Toyota (/images/pages/posventa-hero.jpg) -->
                <div class="lg:col-span-6" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200/80 dark:border-slate-800 bg-slate-950 group">
                        <img src="/images/pages/posventa-hero.jpg" 
                             alt="Servicio Técnico Oficial CONSUR Toyota" 
                             class="w-full h-[360px] sm:h-[420px] md:h-[460px] object-cover object-center transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/30 to-transparent"></div>

                        <!-- Badges Superiores Oficiales -->
                        <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-1.5 bg-red-600/90 backdrop-blur-md text-white text-[10px] font-bold uppercase px-3 py-1.5 tracking-wider shadow-md">
                                <i class="fas fa-certificate"></i>
                                <span>Técnicos Certificados TMC</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5 bg-black/60 backdrop-blur-md text-white text-[10px] font-bold uppercase px-3 py-1.5 tracking-wider border border-white/20 shadow-md">
                                <i class="fas fa-shield-alt text-red-500"></i>
                                <span>Garantía Oficial</span>
                            </span>
                        </div>

                        <!-- Información Inferior & Enlace a /posventa -->
                        <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8 text-white">
                            <span class="text-xs uppercase font-extrabold tracking-widest text-red-400 block">
                                Excelencia Operativa &bull; CONSUR S.A.
                            </span>
                            <h3 class="text-base sm:text-lg md:text-xl font-bold mt-1 text-white leading-snug">
                                Talleres Oficiales, Diagnóstico Computarizado & Repuestos Legítimos
                            </h3>
                            <a href="{{ route('posventa') }}" 
                               class="inline-flex items-center gap-2 mt-3 text-xs font-semibold text-slate-200 hover:text-white hover:underline transition">
                                <span>Conocé más sobre nuestro servicio de Posventa</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-400"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. Red de Sucursales de CONSUR S.A. (Con Foto consursomos.jpg de la-empresa) -->
    <section id="sucursales" class="py-16 md:py-24 bg-white dark:bg-slate-900 border-b border-slate-200/80 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
            
            <div class="text-center max-w-3xl mx-auto space-y-3" data-aos="fade-up">
                <span class="text-xs uppercase font-extrabold tracking-widest text-red-600">
                    Cercanía y Confianza
                </span>
                <h2 class="text-2xl sm:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                    Nuestras <span class="font-bold text-red-600">Sucursales</span>
                </h2>
                <p class="text-sm sm:text-base text-slate-500 dark:text-neutral-400 font-light">
                    Visitanos en nuestra Casa Central de Encarnación o en nuestras sucursales del interior para conocer tu próximo Toyota en persona.
                </p>
            </div>

            <!-- Banner Panorámico con Foto de Fachada de la-empresa -->
            <div class="relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-slate-800 group" data-aos="fade-up">
                <div class="aspect-[21/9] sm:aspect-[24/9] w-full">
                    <img src="/images/toyota/consursomos.jpg" 
                         alt="CONSUR S.A. Casa Central Encarnación" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-950/50 to-transparent p-6 sm:p-10 flex flex-col justify-end text-white">
                    <span class="text-xs uppercase font-extrabold tracking-widest text-red-500">
                        Desde 1977 en Encarnación
                    </span>
                    <h3 class="text-xl sm:text-3xl font-light font-heading mt-1">
                        CONSUR S.A. &bull; <span class="font-normal text-red-500">Casa Central</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-300 max-w-lg mt-1 font-light hidden sm:block">
                        Ruta 1 Km 2.5 y Avda. San Roque González &bull; Salón de ventas 0 Km, repuestos originales y taller integral.
                    </p>
                </div>
            </div>

            <!-- Grilla de Sucursales con Información Detallada -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($branches as $branch)
                    <div class="bg-slate-50 dark:bg-slate-950 rounded-3xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 space-y-5 hover:shadow-md transition"
                         data-aos="fade-up"
                         data-aos-delay="{{ ($loop->index % 4) * 80 }}">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <span class="text-[10px] uppercase font-bold tracking-widest text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-950/40 px-2.5 py-1 rounded-full border border-red-100 dark:border-red-900/40">
                                    {{ $branch->city }}
                                </span>
                                <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white font-heading mt-2">
                                    {{ $branch->name }}
                                </h3>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-red-600 flex items-center justify-center flex-shrink-0 text-base">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>

                        <div class="space-y-2.5 text-xs sm:text-sm text-slate-600 dark:text-neutral-300">
                            <div class="flex items-start gap-2.5">
                                <i class="fas fa-map-pin text-red-500 mt-1"></i>
                                <span>{{ $branch->address }}</span>
                            </div>
                            @if($branch->phone)
                                <div class="flex items-center gap-2.5">
                                    <i class="fas fa-phone-alt text-red-500"></i>
                                    <span>{{ $branch->phone }}</span>
                                </div>
                            @endif
                            @if($branch->whatsapp)
                                <div class="flex items-center gap-2.5">
                                    <i class="fab fa-whatsapp text-emerald-600"></i>
                                    <span>{{ $branch->whatsapp }}</span>
                                </div>
                            @endif
                            <div class="flex items-start gap-2.5 pt-1 border-t border-slate-200/60 dark:border-slate-800">
                                <i class="far fa-clock text-slate-400 mt-1"></i>
                                <div class="text-xs text-slate-500 dark:text-neutral-400">
                                    <div>Lunes a Viernes: 07:00 a 12:00 y 14:00 a 17:30 Hs.</div>
                                    <div>Sábados: 07:30 a 12:00 Hs.</div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            @if($branch->google_maps_url)
                                <a href="{{ $branch->google_maps_url }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-1.5 px-4 py-2 bg-white dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-white border border-slate-200 dark:border-slate-800 text-xs font-semibold rounded-xl transition">
                                    <i class="fas fa-location-arrow text-red-500"></i>
                                    <span>Cómo llegar</span>
                                </a>
                            @endif
                            @if($branch->whatsapp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $branch->whatsapp) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-1.5 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl shadow-xs transition">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp Sucursal</span>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- 6. Formulario de Cotización Rápida & Contacto Directo -->
    <section class="py-16 md:py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-8">
            
            <div class="text-center space-y-3" data-aos="fade-up">
                <span class="text-xs uppercase font-extrabold tracking-widest text-red-500">
                    Atención Personalizada 0 Km
                </span>
                <h2 class="text-2xl sm:text-4xl font-light font-heading uppercase tracking-normal">
                    ¿Listo para dar el paso a tu próximo <span class="font-normal text-red-500">Toyota</span>?
                </h2>
                <p class="text-sm text-slate-300 font-light max-w-xl mx-auto">
                    Dejanos tus datos y un asesor oficial de CONSUR S.A. te enviará una cotización detallada con planes de financiación y opciones de entrega.
                </p>
            </div>

            @if($sentSuccess)
                <div class="p-8 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-center space-y-2">
                    <i class="fas fa-check-circle text-emerald-400 text-4xl mb-2"></i>
                    <h4 class="text-lg font-bold text-white">¡Solicitud Enviada con Éxito!</h4>
                    <p class="text-xs sm:text-sm text-slate-300">
                        Tu solicitud fue registrada. Un asesor oficial de CONSUR S.A. se comunicará contigo a la brevedad.
                    </p>
                </div>
            @else
                <form wire:submit="submitQuotation" class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-6 sm:p-10 space-y-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Nombre Completo *</label>
                            <input type="text" 
                                   wire:model="name" 
                                   placeholder="Tu nombre y apellido"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-red-500 transition">
                            @error('name') <span class="text-[11px] text-red-400">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Teléfono / WhatsApp *</label>
                            <input type="text" 
                                   wire:model="phone" 
                                   placeholder="Ej: 0985 804 106"
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-red-500 transition">
                            @error('phone') <span class="text-[11px] text-red-400">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Modelo de Interés *</label>
                            <select wire:model="vehicleInterest" 
                                    class="w-full pl-4 pr-10 py-3 bg-neutral-800 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:border-red-500 transition">
                                @foreach($vehicles as $v)
                                    <option value="Toyota {{ $v->model }}">{{ $v->model }} (0 Km)</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Ciudad de Residencia</label>
                            <input type="text" 
                                   wire:model="city" 
                                   placeholder="Ej: Encarnación, Posadas, etc."
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-red-500 transition">
                        </div>

                        <div class="sm:col-span-2 space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Mensaje o Consulta</label>
                            <textarea wire:model="message" 
                                      rows="3" 
                                      placeholder="¿Deseas consultar sobre financiación, entrega de usado o coordinar un Test Drive?"
                                      class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-red-500 transition"></textarea>
                        </div>

                    </div>

                    <div class="text-center pt-2">
                        <button type="submit" 
                                wire:loading.attr="disabled"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-red-600 hover:bg-red-700 text-white text-xs sm:text-sm font-bold uppercase rounded-xl shadow-lg transition">
                            <span wire:loading.remove>Enviar Solicitud de Cotización</span>
                            <span wire:loading><i class="fas fa-spinner fa-spin mr-2"></i> Enviando...</span>
                        </button>
                    </div>
                </form>
            @endif

            <!-- Enlaces Directos de Contacto -->
            <div class="pt-4 flex flex-wrap items-center justify-center gap-6 text-xs text-slate-400">
                <a href="tel:+59571204106" class="hover:text-white flex items-center gap-2">
                    <i class="fas fa-phone-alt text-red-500"></i>
                    <span>Casa Central: +595 71 204 106</span>
                </a>
                <span>&bull;</span>
                <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}" target="_blank" class="hover:text-emerald-400 flex items-center gap-2">
                    <i class="fab fa-whatsapp text-emerald-500"></i>
                    <span>WhatsApp Ventas: +595 985 804 106</span>
                </a>
            </div>

        </div>
    </section>
</div>

