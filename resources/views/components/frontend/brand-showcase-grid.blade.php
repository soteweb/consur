<!-- Sección: Grilla Compacta & Luminosa de Marcas Oficiales CONSUR (Bento Grid) -->
<section id="marcas-consur" class="w-full py-14 sm:py-20 bg-slate-50 dark:bg-slate-950 border-t border-slate-200/80 dark:border-neutral-800/80 select-none transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @php
            $brandCards = [
                [
                    'name' => 'Toyota',
                    'badge' => 'Concesionaria Oficial',
                    'tagline' => 'Líder en Pickups Hilux, SUVs & Movilidad Híbrida 0 KM',
                    'url' => url('/toyota'),
                    'image' => asset('images/toyota/hiluxcostanera-grid.webp'),
                    'logo' => asset('images/marcas/toyota.svg'),
                    'cta' => 'Explorar Vitrina 0 KM',
                    'cols' => 'col-span-1 sm:col-span-2 lg:col-span-6',
                    'accent' => '#eb0a1e',
                ],
                [
                    'name' => 'Omoda | Jaecoo',
                    'badge' => 'Nueva Era',
                    'tagline' => 'SUVs de Vanguardia, Confort & Alta Gama (J7 y C5)',
                    'url' => url('/omoda-jaecoo'),
                    'image' => asset('images/omoda-jaecoo/banner-hero.webp'),
                    'logo' => asset('images/marcas/omoda-jaecoo.svg'),
                    'cta' => 'Ver Modelos',
                    'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                    'accent' => '#0284c7',
                ],
                [
                    'name' => 'Hino',
                    'badge' => 'Toyota Group',
                    'tagline' => 'Camiones Pesados, Chasis & Utilitarios de Carga',
                    'url' => url('/hino'),
                    'image' => asset('images/hino/banner-hero.webp'),
                    'logo' => asset('images/marcas/hino.svg'),
                    'cta' => 'Línea Camiones',
                    'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                    'accent' => '#dc2626',
                ],
                [
                    'name' => 'Can-Am',
                    'badge' => 'BRP Oficial',
                    'tagline' => 'UTVs Maverick, Defender & Todoterreno Extremo',
                    'url' => url('/canam'),
                    'image' => asset('images/canam/banner-can-am.webp'),
                    'logo' => asset('images/marcas/can-am.png'),
                    'cta' => 'Mundo Off-Road',
                    'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                    'accent' => '#d97706',
                ],
                [
                    'name' => 'Sea-Doo',
                    'badge' => 'BRP Oficial',
                    'tagline' => 'Motos Acuáticas, Potencia & Deporte Náutico',
                    'url' => url('/seadoo'),
                    'image' => asset('images/seadoo/sea-doo-main-banner.webp'),
                    'logo' => asset('images/marcas/sea-doo.svg'),
                    'cta' => 'Línea Náutica',
                    'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                    'accent' => '#0891b2',
                ],
                [
                    'name' => 'CONSUR Bike',
                    'badge' => 'Specialized & Trek',
                    'tagline' => 'Bicicletas de Montaña, Ruta, Gravel & Accesorios',
                    'url' => url('/consur-bike'),
                    'image' => asset('images/pages/consurbike-hero.webp'),
                    'logo' => asset('images/marcas/consur-bike.png'),
                    'cta' => 'Ver Bicicletas',
                    'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                    'accent' => '#e11d48',
                ],
                [
                    'name' => 'Broker de Seguros',
                    'badge' => 'Cobertura Integral',
                    'tagline' => 'Protección para tu Vehículo, Flota, Hogar y Vida',
                    'url' => url('/seguros'),
                    'image' => asset('images/pages/seguros-slider.webp'),
                    'logo' => asset('images/marcas/consur-seguros.png'),
                    'cta' => 'Cotizar Póliza',
                    'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                    'accent' => '#059669',
                ],
            ];
        @endphp

        <!-- Encabezado Elegante y Luminoso -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 sm:mb-10" data-aos="fade-up">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-red-600 mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                    Ecosistema Oficial CONSUR S.A.
                </div>
                <h2 class="text-2xl sm:text-3xl font-light text-slate-900 dark:text-white tracking-tight font-heading">
                    Nuestras <span class="font-bold">Marcas & Unidades de Negocio</span>
                </h2>
            </div>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-light max-w-md sm:text-right">
                Explorá la gama completa de movilidad, utilitarios de trabajo, deportes extremos y servicios de respaldo oficial.
            </p>
        </div>

        <!-- Mosaico Asimétrico Compacto (Tarjetas Claras & Luminosas de ~210px) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3.5 sm:gap-4" data-aos="fade-up" data-aos-delay="100">
            @foreach($brandCards as $card)
                <a href="{{ $card['url'] }}"
                   wire:navigate
                   class="group relative {{ $card['cols'] }} h-[190px] sm:h-[210px] bg-white dark:bg-neutral-900/90 rounded-2xl border border-slate-200/90 dark:border-neutral-800 shadow-xs hover:shadow-xl hover:border-slate-300 dark:hover:border-neutral-700 transition-all duration-300 overflow-hidden flex flex-col justify-between p-5 sm:p-6 focus:outline-none focus:ring-2 focus:ring-red-600">

                    <!-- 1. Foto de Fondo Iluminada en Luz de Día (Lazy Loading Nativo Ultrarrápido) -->
                    <div class="absolute inset-y-0 right-0 w-3/5 sm:w-2/3 overflow-hidden pointer-events-none">
                        <img src="{{ $card['image'] }}" 
                             alt="{{ $card['name'] }}"
                             loading="lazy" 
                             decoding="async"
                             class="w-full h-full object-cover object-center transform scale-100 group-hover:scale-106 transition-transform duration-500 ease-out will-change-transform opacity-80 group-hover:opacity-100">
                    </div>

                    <!-- 2. Gradiente Suave de Fusión Blanca / Luminosa (Asegura Lectura 100% Nítida) -->
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/92 to-white/20 dark:from-neutral-900 dark:via-neutral-900/92 dark:to-neutral-900/30 group-hover:via-white/85 dark:group-hover:via-neutral-900/85 transition-colors duration-300"></div>

                    <!-- 3. Indicador Superior: Badge de Marca y Flecha Dinámica -->
                    <div class="relative z-10 flex items-center justify-between w-full">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold tracking-wider uppercase bg-slate-100 dark:bg-neutral-800 text-slate-600 dark:text-slate-300 border border-slate-200/70 dark:border-neutral-700">
                            <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $card['accent'] }};"></span>
                            {{ $card['badge'] }}
                        </span>

                        <span class="w-7 h-7 rounded-full bg-slate-100 dark:bg-neutral-800 text-slate-400 group-hover:text-red-600 group-hover:bg-red-50 dark:group-hover:bg-red-950/40 flex items-center justify-center transition-all duration-200">
                            <i class="fas fa-arrow-right text-[10px] transform group-hover:translate-x-0.5 transition-transform"></i>
                        </span>
                    </div>

                    <!-- 4. Contenido Inferior: Logo, Título y Descripción Compacta -->
                    <div class="relative z-10 pr-4">
                        <div class="flex items-center gap-3 mb-1.5">
                            <img src="{{ $card['logo'] }}" 
                                 alt="Logo {{ $card['name'] }}" 
                                 loading="lazy"
                                 decoding="async"
                                 class="h-6 w-auto max-w-[110px] object-contain flex-shrink-0">
                            <span class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-red-600 transition-colors">
                                {{ $card['name'] }}
                            </span>
                        </div>

                        <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-1 font-light">
                            {{ $card['tagline'] }}
                        </p>

                        <div class="mt-2.5 inline-flex items-center gap-1.5 text-xs font-semibold text-red-600 dark:text-red-500 group-hover:underline">
                            <span>{{ $card['cta'] }}</span>
                            <i class="fas fa-chevron-right text-[9px] transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>

    </div>
</section>
