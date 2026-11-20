<!-- Sección Full-Width: Grilla Cinemática Modo Oscuro de Marcas Oficiales CONSUR S.A. -->
<section id="marcas-consur" class="w-full bg-neutral-950 border-t border-neutral-900 select-none overflow-hidden">
    
    @php
        $brandCards = [
            [
                'name' => 'Toyota',
                'badge' => 'Concesionaria Oficial',
                'url' => url('/toyota'),
                'image' => asset('images/toyota/hiluxcostanera-grid.webp'),
                'logo' => asset('images/marcas/toyota.svg'),
                'cols' => 'col-span-1 sm:col-span-2 lg:col-span-6',
                'height' => 'h-[240px] sm:h-[280px] lg:h-[320px]',
                'accent' => '#eb0a1e',
            ],
            [
                'name' => 'Omoda | Jaecoo',
                'badge' => 'Nueva Era',
                'url' => url('/omoda-jaecoo'),
                'image' => asset('images/omoda-jaecoo/banner-hero.webp'),
                'logo' => asset('images/marcas/omoda-jaecoo.svg'),
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'h-[240px] sm:h-[280px] lg:h-[320px]',
                'accent' => '#0284c7',
            ],
            [
                'name' => 'Hino',
                'badge' => 'Toyota Group',
                'url' => url('/hino'),
                'image' => asset('images/hino/banner-hero.webp'),
                'logo' => asset('images/marcas/hino.svg'),
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'h-[240px] sm:h-[280px] lg:h-[320px]',
                'accent' => '#dc2626',
            ],
            [
                'name' => 'Can-Am',
                'badge' => 'BRP Oficial',
                'url' => url('/canam'),
                'image' => asset('images/canam/banner-can-am.webp'),
                'logo' => asset('images/marcas/can-am.png'),
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'h-[210px] sm:h-[240px] lg:h-[270px]',
                'accent' => '#d97706',
            ],
            [
                'name' => 'Sea-Doo',
                'badge' => 'BRP Oficial',
                'url' => url('/seadoo'),
                'image' => asset('images/seadoo/sea-doo-main-banner.webp'),
                'logo' => asset('images/marcas/sea-doo.svg'),
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'h-[210px] sm:h-[240px] lg:h-[270px]',
                'accent' => '#0891b2',
            ],
            [
                'name' => 'CONSUR Bike',
                'badge' => 'Specialized & Trek',
                'url' => url('/consur-bike'),
                'image' => asset('images/pages/consurbike-hero.webp'),
                'logo' => asset('images/marcas/consur-bike.png'),
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'h-[210px] sm:h-[240px] lg:h-[270px]',
                'accent' => '#e11d48',
            ],
            [
                'name' => 'Broker de Seguros',
                'badge' => 'Cobertura Integral',
                'url' => url('/seguros'),
                'image' => asset('images/pages/seguros-bg.webp'),
                'logo' => asset('images/marcas/consur-seguros.png'),
                'cols' => 'col-span-1 sm:col-span-1 lg:col-span-3',
                'height' => 'h-[210px] sm:h-[240px] lg:h-[270px]',
                'accent' => '#059669',
            ],
        ];
    @endphp

    <!-- Encabezado Cinemático Full-Width -->
    <div class="w-full px-5 sm:px-8 lg:px-12 pt-10 pb-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-neutral-900">
        <div>
            <div class="inline-flex items-center gap-2 text-xs font-bold tracking-[0.2em] uppercase text-red-600 mb-1.5">
                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                ECOSISTEMA OFICIAL CONSUR S.A.
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-light text-white tracking-tight font-heading">
                NUESTRAS <span class="font-bold text-white">MARCAS & DIVISIONES</span>
            </h2>
        </div>
        <p class="text-xs sm:text-sm text-neutral-400 font-light max-w-md sm:text-right">
            Seleccioná la marca para ingresar directamente a su vitrina exclusiva y catálogo de modelos.
        </p>
    </div>

    <!-- Mosaico Asimétrico Full-Width (Bento Grid Edge-to-Edge) -->
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-1.5 p-1.5 bg-neutral-900/60">
        @foreach($brandCards as $card)
            <a href="{{ $card['url'] }}"
               wire:navigate
               class="group relative {{ $card['cols'] }} {{ $card['height'] }} overflow-hidden rounded-xl sm:rounded-2xl flex items-center justify-center p-6 transition-all duration-500 hover:shadow-2xl hover:shadow-black focus:outline-none focus:ring-2 focus:ring-red-600">

                <!-- 1. Fotografía Protagonista de Alta Claridad (Lazy Loading Nativo) -->
                <img src="{{ $card['image'] }}" 
                     alt="{{ $card['name'] }} - CONSUR"
                     loading="lazy" 
                     decoding="async"
                     width="1200" 
                     height="800"
                     class="absolute inset-0 w-full h-full object-cover object-center transform scale-100 group-hover:scale-108 transition-transform duration-700 ease-out will-change-transform opacity-90 group-hover:opacity-100">

                <!-- 2. Capa de Contraste Cinemático Suave (Deja ver la foto con total nitidez) -->
                <div class="absolute inset-0 bg-gradient-to-t from-neutral-950/80 via-neutral-950/25 to-neutral-950/40 group-hover:from-neutral-950/60 transition-colors duration-500"></div>
                <div class="absolute inset-0 rounded-xl sm:rounded-2xl border border-white/10 group-hover:border-white/30 transition-colors duration-300 pointer-events-none"></div>

                <!-- 3. Badge Superior de Categoría -->
                <span class="absolute top-4 left-4 z-10 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-black/65 backdrop-blur-md text-white/90 border border-white/15 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $card['accent'] }};"></span>
                    {{ $card['badge'] }}
                </span>

                <!-- 4. Flecha Interactiva en Hover (Esquina inferior derecha) -->
                <span class="absolute bottom-4 right-4 z-10 w-9 h-9 rounded-full bg-white/15 backdrop-blur-md border border-white/25 text-white flex items-center justify-center transform translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 group-hover:bg-red-600 group-hover:border-red-600 transition-all duration-300 shadow-lg">
                    <i class="fas fa-arrow-right text-xs"></i>
                </span>

                <!-- 5. SOLO EL LOGO OFICIAL ENCIMA (Sin texto de nombre repetitivo) -->
                <div class="relative z-10 flex items-center justify-center">
                    <div class="inline-flex items-center justify-center bg-white/95 backdrop-blur-md px-6 py-3.5 rounded-2xl border border-white/40 shadow-2xl h-14 sm:h-16 min-w-[130px] max-w-[190px] group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ $card['logo'] }}" 
                             alt="{{ $card['name'] }}" 
                             loading="lazy"
                             decoding="async"
                             class="max-h-8 sm:max-h-9 max-w-full object-contain">
                    </div>
                </div>

            </a>
        @endforeach
    </div>

</section>
