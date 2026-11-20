<!-- Sección Full-Width: Grilla Cinemática de Marcas Oficiales CONSUR (Bento Grid Asimétrico) -->
<section class="w-full bg-neutral-950 border-y border-neutral-900 overflow-hidden select-none">
    @php
        $brandCards = [
            [
                'name' => 'Toyota',
                'badge' => 'Concesionaria Oficial',
                'tagline' => 'Líder en Pickups, SUVs & Movilidad Híbrida',
                'url' => url('/toyota'),
                'image' => asset('images/toyota/hiluxcostanera-grid.webp'),
                'logo' => asset('images/marcas/toyota.svg'),
                'cta' => 'Explorar Vitrina 0 KM',
                'cols' => 'col-span-1 sm:col-span-2 lg:col-span-6',
                'height' => 'min-h-[340px] sm:min-h-[380px] lg:min-h-[420px]',
                'accent' => '#eb0a1e',
                'is_featured' => true,
            ],
            [
                'name' => 'Omoda | Jaecoo',
                'badge' => 'Nueva Era',
                'tagline' => 'SUVs Híbridos de Lujo, Confort & Alta Gama',
                'url' => url('/omoda-jaecoo'),
                'image' => asset('images/omoda-jaecoo/banner-hero.webp'),
                'logo' => asset('images/marcas/omoda-jaecoo.svg'),
                'cta' => 'Descubrir Modelos J7 & C5',
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'min-h-[300px] sm:min-h-[340px] lg:min-h-[420px]',
                'accent' => '#0ea5e9',
                'is_featured' => false,
            ],
            [
                'name' => 'Hino',
                'badge' => 'Toyota Group',
                'tagline' => 'Camiones Pesados, Chasis & Utilitarios de Carga',
                'url' => url('/hino'),
                'image' => asset('images/hino/banner-hero.webp'),
                'logo' => asset('images/marcas/hino.svg'),
                'cta' => 'Ver Línea de Camiones',
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'min-h-[300px] sm:min-h-[340px] lg:min-h-[420px]',
                'accent' => '#dc2626',
                'is_featured' => false,
            ],
            [
                'name' => 'Can-Am',
                'badge' => 'BRP Oficial',
                'tagline' => 'UTVs Maverick, Defender & Todoterreno Extremo',
                'url' => url('/canam'),
                'image' => asset('images/canam/banner-can-am.webp'),
                'logo' => asset('images/marcas/can-am.png'),
                'cta' => 'Explorar Off-Road',
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'min-h-[290px] sm:min-h-[320px] lg:min-h-[360px]',
                'accent' => '#eab308',
                'is_featured' => false,
            ],
            [
                'name' => 'Sea-Doo',
                'badge' => 'BRP Oficial',
                'tagline' => 'Motos Acuáticas, Potencia & Adrenalina Náutica',
                'url' => url('/seadoo'),
                'image' => asset('images/seadoo/sea-doo-main-banner.webp'),
                'logo' => asset('images/marcas/sea-doo.svg'),
                'cta' => 'Línea Acuática',
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'min-h-[290px] sm:min-h-[320px] lg:min-h-[360px]',
                'accent' => '#06b6d4',
                'is_featured' => false,
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
                'height' => 'min-h-[290px] sm:min-h-[320px] lg:min-h-[360px]',
                'accent' => '#ef4444',
                'is_featured' => false,
            ],
            [
                'name' => 'CONSUR Broker de Seguros',
                'badge' => 'Cobertura Integral',
                'tagline' => 'Protección para tu Vehículo, Flota, Hogar y Vida',
                'url' => url('/seguros'),
                'image' => asset('images/pages/seguros-slider.webp'),
                'logo' => asset('images/marcas/consur-seguros.png'),
                'cta' => 'Cotizar Póliza Online',
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'min-h-[290px] sm:min-h-[320px] lg:min-h-[360px]',
                'accent' => '#10b981',
                'is_featured' => false,
            ],
        ];
    @endphp

    <!-- Encabezado sutil de sección full-width -->
    <div class="w-full px-4 sm:px-8 lg:px-12 pt-8 pb-5 flex flex-col sm:flex-row sm:items-end justify-between gap-3 border-b border-neutral-900/80">
        <div>
            <span class="inline-flex items-center gap-2 text-[11px] font-bold tracking-[0.2em] uppercase text-red-600">
                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                Ecosistema Oficial CONSUR S.A.
            </span>
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-light text-white tracking-tight mt-1 font-heading">
                Nuestras <span class="font-bold text-white">Marcas & Unidades de Negocio</span>
            </h2>
        </div>
        <p class="text-xs text-neutral-400 font-light max-w-md sm:text-right">
            Vehículos 0 Km, utilitarios de carga, deportes extremos, movilidad sustentable y respaldo de seguros con garantía oficial.
        </p>
    </div>

    <!-- Mosaico Asimétrico (Bento Grid) Full-Width -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-1.5 p-1.5 bg-neutral-900/60">
        @foreach($brandCards as $card)
            <a href="{{ $card['url'] }}"
               wire:navigate
               class="group relative {{ $card['cols'] }} {{ $card['height'] }} overflow-hidden rounded-xl sm:rounded-2xl flex flex-col justify-between p-5 sm:p-7 transition-all duration-500 hover:shadow-2xl hover:shadow-black/70 transform-gpu focus:outline-none focus:ring-2 focus:ring-red-600">
                
                <!-- 1. Imagen de Fondo de Alta Definición Ultra Optimizada (Lazy Load Nativo) -->
                <img src="{{ $card['image'] }}" 
                     alt="{{ $card['name'] }} - CONSUR"
                     loading="lazy" 
                     decoding="async"
                     width="1200" 
                     height="800"
                     class="absolute inset-0 w-full h-full object-cover object-center transform scale-100 group-hover:scale-108 transition-transform duration-700 ease-out will-change-transform opacity-75 group-hover:opacity-90">

                <!-- 2. Capas de Gradiente Cinemático para Contraste Impecable -->
                <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/45 to-neutral-950/20 group-hover:from-neutral-950/90 transition-colors duration-500"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/60 via-transparent to-neutral-950/30"></div>

                <!-- 3. Borde Dinámico en Hover con el Color Acento de la Marca -->
                <div class="absolute inset-0 rounded-xl sm:rounded-2xl border border-white/10 group-hover:border-white/30 transition-colors duration-300 pointer-events-none"></div>

                <!-- 4. Top: Badge Distintivo de Marca -->
                <div class="relative z-10 flex items-center justify-between w-full">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-semibold tracking-wider uppercase bg-black/60 backdrop-blur-md text-white/90 border border-white/15 shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $card['accent'] }};"></span>
                        {{ $card['badge'] }}
                    </span>

                    <span class="w-8 h-8 rounded-full bg-white/10 backdrop-blur-md border border-white/15 flex items-center justify-center text-white/70 group-hover:text-white group-hover:bg-white/25 group-hover:scale-110 transition-all duration-300">
                        <i class="fas fa-arrow-up-right text-xs transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300"></i>
                    </span>
                </div>

                <!-- 5. Bottom: Logo, Información y Call To Action -->
                <div class="relative z-10 pt-8 sm:pt-12">
                    <!-- Caja de Logo con Filtro Glass Premium -->
                    <div class="inline-flex items-center justify-center bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-xl border border-white/40 shadow-lg mb-3 h-10 min-w-[110px] max-w-[160px] group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ $card['logo'] }}" 
                             alt="Logo {{ $card['name'] }}" 
                             loading="lazy"
                             decoding="async"
                             class="max-h-6 max-w-full object-contain">
                    </div>

                    <!-- Título y Subtítulo Descriptivo -->
                    <h3 class="text-lg sm:text-xl font-bold text-white tracking-tight drop-shadow-sm flex items-center gap-2">
                        <span>{{ $card['name'] }}</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-neutral-300 font-light mt-1 max-w-xl line-clamp-2 leading-relaxed drop-shadow-sm">
                        {{ $card['tagline'] }}
                    </p>

                    <!-- Botón / Indicador Interactivo -->
                    <div class="mt-3.5 flex items-center gap-2 text-xs font-semibold text-white/90 group-hover:text-white">
                        <span class="border-b border-white/30 group-hover:border-white pb-0.5 transition-colors">
                            {{ $card['cta'] }}
                        </span>
                        <i class="fas fa-chevron-right text-[10px] transform group-hover:translate-x-1 transition-transform duration-300" style="color: {{ $card['accent'] }};"></i>
                    </div>
                </div>

            </a>
        @endforeach
    </div>
</section>
