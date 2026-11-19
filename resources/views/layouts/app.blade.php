<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    
    <!-- Título y Metadatos de Indexación para Google y Motores de Búsqueda -->
    <title>{{ !empty($title) ? (str_contains($title, 'CONSUR') ? $title : $title . ' – CONSUR S.A.') : 'CONSUR S.A. – Concesionaria Oficial Toyota Paraguay' }}</title>
    <meta name="description" content="{{ $description ?? 'CONSUR S.A. Concesionaria oficial de Toyota en Paraguay. Venta de vehículos 0 Km, camionetas Hilux, SUVs híbridas, catálogo de autos usados certificados, servicio técnico oficial de posventa, repuestos legítimos y taller móvil en Encarnación y todo el país.' }}">
    <meta name="keywords" content="{{ $keywords ?? 'CONSUR S.A., CONSUR Toyota, Toyota Paraguay, Concesionaria Oficial Toyota, Toyota Hilux, Corolla Cross, RAV4 Hybrid, Land Cruiser, Omoda Jaecoo Paraguay, Can-Am Paraguay, Sea-Doo Paraguay, Camiones Hino, autos usados certificados Paraguay, taller oficial Toyota, repuestos legitimos, Encarnacion Itapua' }}">
    <meta name="author" content="CONSUR S.A.">
    <meta name="publisher" content="CONSUR S.A.">
    <meta name="application-name" content="CONSUR S.A.">
    <meta name="theme-color" content="#eb0a1e">

    <!-- Directivas de Indexación SEO (Googlebot, Bingbot) -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ $canonicalUrl ?? url()->current() }}">

    <!-- Geolocalización Oficial (Encarnación, Itapúa - Paraguay) -->
    <meta name="geo.region" content="PY-IT">
    <meta name="geo.placename" content="Encarnación, Paraguay">
    <meta name="geo.position" content="-27.330837;-55.867761">
    <meta name="ICBM" content="-27.330837, -55.867761">

    <!-- Open Graph / Redes Sociales (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:locale" content="es_PY">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name" content="CONSUR S.A.">
    <meta property="og:title" content="{{ !empty($title) ? (str_contains($title, 'CONSUR') ? $title : $title . ' – CONSUR S.A.') : 'CONSUR S.A. – Concesionaria Oficial Toyota Paraguay' }}">
    <meta property="og:description" content="{{ $description ?? 'CONSUR S.A. Concesionaria oficial de Toyota en Paraguay. Vehículos 0 Km, Usados Certificados, Servicio Técnico Oficial y Repuestos Genuinos.' }}">
    <meta property="og:url" content="{{ $canonicalUrl ?? url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/logoconsurweb.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="CONSUR S.A. – Concesionaria Oficial Toyota Paraguay">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ !empty($title) ? (str_contains($title, 'CONSUR') ? $title : $title . ' – CONSUR S.A.') : 'CONSUR S.A. – Concesionaria Oficial Toyota Paraguay' }}">
    <meta name="twitter:description" content="{{ $description ?? 'CONSUR S.A. Concesionaria oficial de Toyota en Paraguay. Vehículos 0 Km, Usados Certificados, Servicio Técnico Oficial y Repuestos Genuinos.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/logoconsurweb.png') }}">

    <!-- Favicon Oficial CONSUR S.A. -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Datos Estructurados JSON-LD Schema.org para Google (AutoDealer & WebSite) -->
    @php
        $schemaOrgJson = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'AutoDealer',
                    '@id' => url('/') . '#dealer',
                    'name' => 'CONSUR S.A. – Concesionaria Oficial Toyota',
                    'url' => url('/'),
                    'logo' => asset('images/logoconsurweb.png'),
                    'image' => asset('images/logoconsurweb.png'),
                    'description' => 'Concesionaria Oficial de Toyota en Paraguay. Venta de vehículos 0 Km, usados garantizados, taller mecánico oficial, repuestos originales y taller móvil.',
                    'telephone' => '+59571204106',
                    'priceRange' => '$$',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Ruta PY01 km 329 (Av. Irrazábal y Juan L. Mallorquín)',
                        'addressLocality' => 'Encarnación',
                        'addressRegion' => 'Itapúa',
                        'postalCode' => '6000',
                        'addressCountry' => 'PY',
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => -27.330837,
                        'longitude' => -55.867761,
                    ],
                    'openingHoursSpecification' => [
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                            'opens' => '07:00',
                            'closes' => '17:30',
                        ],
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => 'Saturday',
                            'opens' => '07:30',
                            'closes' => '11:30',
                        ],
                    ],
                    'sameAs' => [
                        'https://www.facebook.com/ConsurToyota/',
                        'https://www.instagram.com/consur_toyota/',
                        'https://www.tiktok.com/@consurtoyota',
                        'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2',
                        'https://www.youtube.com/@Consurtoyota',
                    ],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/') . '#website',
                    'url' => url('/'),
                    'name' => 'CONSUR S.A.',
                    'description' => 'Concesionaria Oficial Toyota Paraguay',
                    'publisher' => [
                        '@id' => url('/') . '#dealer',
                    ],
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => url('/usados') . '?search={search_term_string}',
                        'query-input' => 'required name=search_term_string',
                    ],
                ],
            ],
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($schemaOrgJson, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    @stack('meta')
    
    <!-- Google Fonts: Raleway -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS (Animate On Scroll) Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Dark Mode Init Script (Sin parpadeo FOUC) -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-[#f8f9fa] dark:bg-slate-950 text-slate-800 dark:text-neutral-100 font-sans antialiased selection:bg-red-600 selection:text-white transition-colors duration-200" 
      x-data="{ 
          mobileMenuOpen: false, 
          brandsMenuOpen: false, 
          brandsMenuTimeout: null,
          isDark: document.documentElement.classList.contains('dark'),
          toggleTheme() {
              this.isDark = !this.isDark;
              if (this.isDark) {
                  document.documentElement.classList.add('dark');
                  localStorage.theme = 'dark';
              } else {
                  document.documentElement.classList.remove('dark');
                  localStorage.theme = 'light';
              }
          }
      }">

    <!-- Preloader Automotriz Estilo Tacómetro / Velocímetro (AutoDrive Experience) -->
    <div id="preloader" 
         class="fixed inset-0 z-[99999] flex flex-col items-center justify-center bg-white dark:bg-slate-950 transition-opacity duration-700 ease-out select-none">
        <div class="relative flex flex-col items-center justify-center px-4">
            
            <!-- Tacómetro Circular -->
            <div class="relative w-44 h-44 sm:w-52 sm:h-52 flex items-center justify-center">
                
                <!-- Aura de pulso de fondo -->
                <div class="absolute inset-2 rounded-full border border-red-500/20 dark:border-red-500/30 animate-ping opacity-25 pointer-events-none"></div>
                <div class="absolute inset-0 rounded-full border border-red-500/10 dark:border-red-500/20 animate-glow-pulse pointer-events-none"></div>

                <!-- Dial SVG -->
                <svg class="w-full h-full -rotate-[135deg] transform" viewBox="0 0 160 160">
                    <!-- Track de fondo -->
                    <circle cx="80" cy="80" r="66" 
                            fill="none" 
                            stroke="currentColor" 
                            class="text-neutral-200 dark:text-neutral-800" 
                            stroke-width="7" 
                            stroke-linecap="round" 
                            stroke-dasharray="414.7" 
                            stroke-dashoffset="103.7" />
                    <!-- Arco activo con degradado rojo CONSUR -->
                    <circle cx="80" cy="80" r="66" 
                            fill="none" 
                            stroke="url(#preloader-red-grad)" 
                            stroke-width="7" 
                            stroke-linecap="round" 
                            stroke-dasharray="414.7" 
                            stroke-dashoffset="150"
                            class="opacity-90 drop-shadow-sm" />
                    <defs>
                        <linearGradient id="preloader-red-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#EB0A1E" />
                            <stop offset="60%" stop-color="#DC2626" />
                            <stop offset="100%" stop-color="#F97316" />
                        </linearGradient>
                    </defs>
                </svg>

                <!-- Marcas de escala de RPM (ticks perimetrales) -->
                <div class="absolute inset-6 rounded-full flex items-center justify-center pointer-events-none">
                    <span class="absolute top-2 text-[10px] font-bold text-neutral-400 dark:text-neutral-600 font-mono">100</span>
                    <span class="absolute right-3 text-[10px] font-bold text-red-600 font-mono">MAX</span>
                    <span class="absolute left-3 text-[10px] font-bold text-neutral-400 dark:text-neutral-600 font-mono">0</span>
                </div>

                <!-- Aguja Velocímetro / Tacómetro con animación de barrido -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="relative w-full h-full flex items-center justify-center">
                        <!-- Brazo de la aguja con transform-origin al pivote inferior -->
                        <div class="animate-needle-sweep absolute w-1.5 h-20 sm:h-24 bg-gradient-to-t from-red-600 via-red-500 to-rose-300 rounded-full shadow-lg shadow-red-600/60"
                             style="bottom: 50%; transform-origin: 50% 100%;">
                        </div>
                        <!-- Buje central cromado con núcleo rojo -->
                        <div class="relative z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-neutral-900 dark:bg-white border-2 border-red-600 shadow-lg flex items-center justify-center">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-600 shadow-sm animate-pulse"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Identidad CONSUR y Telemetría -->
            <div class="mt-4 flex flex-col items-center text-center">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-black tracking-[0.25em] uppercase text-neutral-800 dark:text-white font-heading">
                        CONSUR
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-ping"></span>
                    <span class="text-[11px] font-bold tracking-wider text-red-600 uppercase font-mono">
                        0–100 KM/H
                    </span>
                </div>
                <p class="mt-1 text-[10px] uppercase font-mono tracking-widest text-neutral-400 dark:text-neutral-500">
                    Cargando experiencia...
                </p>
            </div>
        </div>
    </div>

    <!-- Header / Navbar Principal CONSUR S.A. -->
    <header id="main-site-header" class="bg-white/95 dark:bg-slate-950/95 backdrop-blur-md shadow-xs {{ request()->routeIs('vehiculo.detalle', 'vehicle.detail') ? 'relative' : 'sticky top-0' }} z-50 transition-all duration-300 border-b border-neutral-100 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14 md:h-16">
                <!-- Logo Oficial CONSUR -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                        @if(\App\Models\Setting::get('site_logo_type', 'image') === 'image')
                            @php
                                $lightLogo = \App\Models\Setting::get('site_logo_url', '/images/logoconsurweb.png');
                                $darkLogo = \App\Models\Setting::get('site_logo_dark_url', '/images/logoconsurweb-white.png');
                            @endphp
                            <img class="h-7 sm:h-8 md:h-9 w-auto object-contain dark:hidden" 
                                 src="{{ asset(ltrim($lightLogo, '/')) }}" 
                                 alt="{{ \App\Models\Setting::get('company_name', 'CONSUR S.A.') }}">
                            <img class="h-7 sm:h-8 md:h-9 w-auto object-contain hidden dark:block" 
                                 src="{{ asset(ltrim($darkLogo ?: '/images/logoconsurweb-white.png', '/')) }}" 
                                 alt="{{ \App\Models\Setting::get('company_name', 'CONSUR S.A.') }}">
                        @else
                            <span class="text-xl md:text-2xl font-bold tracking-tight text-neutral-900 dark:text-white font-heading">
                                {{ \App\Models\Setting::get('site_logo_text_prefix', 'CONSUR') }}<span class="text-red-600">{{ \App\Models\Setting::get('site_logo_text_suffix', '.') }}</span>
                            </span>
                        @endif
                    </a>
                </div>

                <!-- Navigation Desktop Links -->
                @php 
                    $headerMenuItems = \App\Models\MenuItem::getHeaderMenu(); 
                    $featuredBrands = \App\Models\Brand::getFeaturedForMenu();
                @endphp
                <nav class="hidden lg:flex items-center space-x-1 text-[13.5px] font-normal text-neutral-700 dark:text-neutral-300">
                    
                    <!-- Botón Mega Menú: Marcas Oficiales -->
                    <div class="relative" 
                         @mouseenter="clearTimeout(brandsMenuTimeout); brandsMenuOpen = true" 
                         @mouseleave="brandsMenuTimeout = setTimeout(() => { brandsMenuOpen = false }, 250)">
                        <button type="button" 
                                @click="brandsMenuOpen = !brandsMenuOpen" 
                                class="px-3.5 py-2 flex items-center gap-1.5 transition text-[13.5px] font-medium"
                                :class="brandsMenuOpen ? 'text-[#eb0a1e]' : 'text-neutral-800 dark:text-neutral-200 hover:text-[#eb0a1e] dark:hover:text-[#eb0a1e]'">
                            <i class="fas fa-layer-group text-xs text-[#eb0a1e]"></i>
                            <span>Marcas</span>
                            <i class="fas fa-chevron-down text-[9px] transition-transform duration-200"
                               :class="brandsMenuOpen ? 'rotate-180 text-[#eb0a1e]' : 'text-neutral-400'"></i>
                        </button>
                    </div>

                    @foreach($headerMenuItems as $menuItem)
                        @if($menuItem->activeChildren->count() > 0)
                            <!-- Dropdown Menu Item -->
                            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                                <button class="px-3.5 py-2 hover:text-red-600 dark:hover:text-red-500 flex items-center gap-1.5 transition text-neutral-700 dark:text-neutral-300 font-normal">
                                    @if($menuItem->icon) <i class="{{ $menuItem->icon }} text-xs"></i> @endif
                                    <span>{{ $menuItem->title }}</span>
                                    <i class="fas fa-chevron-down text-[9px] text-neutral-400 group-hover:text-red-600 transition-transform group-hover:rotate-180"></i>
                                </button>
                                <div x-show="open" x-cloak x-transition.opacity.duration.200ms class="absolute left-0 top-full w-60 bg-white dark:bg-neutral-900 shadow-xl rounded-xl border border-neutral-100 dark:border-neutral-800 py-2 z-50">
                                    @foreach($menuItem->activeChildren as $subItem)
                                        <a href="{{ $subItem->url }}" target="{{ $subItem->target }}" 
                                           class="block px-4 py-2 text-sm text-neutral-700 dark:text-neutral-300 hover:bg-neutral-50 dark:hover:bg-neutral-800 hover:text-red-600 dark:hover:text-red-500 transition flex items-center justify-between font-normal">
                                            <span>{{ $subItem->title }}</span>
                                            @if($subItem->badge_text)
                                                <span class="text-[10px] font-medium px-2 py-0.5 rounded {{ $subItem->badge_color === 'red' ? 'bg-red-50 text-red-600' : ($subItem->badge_color === 'emerald' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-700') }}">
                                                    {{ $subItem->badge_text }}
                                                </span>
                                            @endif
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Direct Link Item -->
                            <a href="{{ $menuItem->url }}" target="{{ $menuItem->target }}" 
                               class="px-3.5 py-2 hover:text-red-600 dark:hover:text-red-500 transition flex items-center gap-1.5 text-neutral-700 dark:text-neutral-300 font-normal">
                                @if($menuItem->icon) <i class="{{ $menuItem->icon }} text-xs text-red-600"></i> @endif
                                <span>{{ $menuItem->title }}</span>
                                @if($menuItem->badge_text)
                                    <span class="text-[10px] font-medium px-2 py-0.5 rounded {{ $menuItem->badge_color === 'red' ? 'bg-red-50 text-red-600' : ($menuItem->badge_color === 'emerald' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-700') }}">
                                        {{ $menuItem->badge_text }}
                                    </span>
                                @endif
                            </a>
                        @endif
                    @endforeach
                </nav>

                <!-- Actions Right -->
                <div class="hidden sm:flex items-center space-x-3">
                    <!-- Botón Toggle Claro / Oscuro (Desktop) -->
                    <button @click="toggleTheme()" 
                            type="button" 
                            class="w-9 h-9 rounded-full flex items-center justify-center transition-colors text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white hover:bg-neutral-100 dark:hover:bg-neutral-900 border border-transparent hover:border-neutral-200 dark:hover:border-neutral-800 focus:outline-hidden"
                            :title="isDark ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro (Negro)'">
                        <i class="fas text-sm" :class="isDark ? 'fa-sun text-amber-400' : 'fa-moon text-neutral-600 dark:text-neutral-300'"></i>
                    </button>

                    <a href="{{ \App\Models\Setting::get('turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131') }}" target="_blank" class="text-xs uppercase font-medium tracking-wider text-neutral-700 dark:text-neutral-300 hover:text-red-600 dark:hover:text-red-500 transition flex items-center gap-1.5">
                        <i class="far fa-calendar-check text-red-600 text-sm"></i> Turnos Online
                    </a>
                    <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}" target="_blank" class="bg-red-600 text-white font-medium text-xs uppercase tracking-wider px-4 py-2 rounded-full hover:bg-red-700 hover:shadow-md transition-all flex items-center gap-1.5">
                        <i class="fab fa-whatsapp text-sm"></i> WhatsApp
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-slate-900 text-white text-xs font-medium px-3.5 py-1.5 rounded-full hover:bg-slate-800 transition">
                            <i class="fas fa-tachometer-alt mr-1"></i> Admin
                        </a>
                    @endauth
                </div>

                <!-- Mobile menu button & Dark mode toggle -->
                <div class="flex lg:hidden items-center gap-1.5">
                    <button @click="toggleTheme()" 
                            type="button" 
                            class="w-8 h-8 rounded-full flex items-center justify-center transition-colors text-neutral-600 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-900 focus:outline-hidden"
                            :title="isDark ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro'">
                        <i class="fas text-xs" :class="isDark ? 'fa-sun text-amber-400' : 'fa-moon text-neutral-600 dark:text-neutral-300'"></i>
                    </button>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white focus:outline-hidden">
                        <i class="fas" :class="mobileMenuOpen ? 'fa-times text-xl' : 'fa-bars text-xl'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- MEGA MENÚ DESKTOP DESPLEGABLE (Se mantiene en blanco sólido en ambos modos) -->
        <div x-show="brandsMenuOpen" 
             x-cloak 
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @mouseenter="clearTimeout(brandsMenuTimeout); brandsMenuOpen = true"
             @mouseleave="brandsMenuTimeout = setTimeout(() => { brandsMenuOpen = false }, 200)"
             class="hidden lg:block absolute left-0 right-0 top-full w-full bg-white shadow-2xl border-b border-slate-200 z-50">
             
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header del Mega Menú -->
                <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-100">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">Línea Multimarca Oficial</span>
                        <h3 class="text-xl font-bold text-slate-900 tracking-tight font-heading">
                            Nuestras Marcas y Divisiones
                        </h3>
                    </div>
                    <span class="text-xs text-slate-500 font-normal hidden sm:inline-block">
                        Garantía oficial, posventa autorizada y repuestos genuinos CONSUR S.A.
                    </span>
                </div>

                <!-- Grilla de 7 Marcas Oficiales (Tarjetas sólidas, limpias y minimalistas con fondo blanco) -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 gap-3 sm:gap-4">
                    @foreach($featuredBrands as $b)
                        <a href="{{ $b->effective_url }}" 
                           @click="brandsMenuOpen = false" 
                           class="group bg-slate-50 hover:bg-white rounded-2xl p-4 border border-slate-200/90 hover:border-[#eb0a1e] hover:shadow-xl transition-all duration-300 flex flex-col items-center text-center justify-center min-h-[160px]">
                            
                            <!-- Logo Centrado con Fondo Blanco Nítido -->
                            <div class="w-full h-16 bg-white rounded-xl border border-slate-200/60 flex items-center justify-center p-2 transition-transform duration-300 group-hover:scale-105 group-hover:border-[#eb0a1e]/30 shadow-xs">
                                <img src="{{ $b->logo_src }}" 
                                     alt="{{ $b->name }}" 
                                     class="max-h-11 max-w-[88%] object-contain filter group-hover:drop-shadow-xs">
                            </div>

                            <!-- Textos -->
                            <div class="w-full mt-2.5">
                                <span class="block text-xs font-bold uppercase tracking-wide text-slate-900 group-hover:text-[#eb0a1e] transition-colors font-heading truncate">
                                    {{ $b->name }}
                                </span>
                                @if($b->slug === 'toyota')
                                    <span class="inline-block mt-1 text-[9px] uppercase font-bold tracking-widest bg-red-100 text-[#eb0a1e] px-2 py-0.5 rounded-full">
                                        Vitrina 0 KM
                                    </span>
                                @elseif($b->tagline)
                                    <span class="block mt-1 text-[10px] text-slate-500 font-medium line-clamp-1">
                                        {{ $b->tagline }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Footer del Mega Menú con Respaldo y WhatsApp Directo -->
                <div class="mt-6 pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-600">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-certificate text-[#eb0a1e] text-sm"></i>
                        <span>Vehículos y productos con <strong>Garantía Oficial, Taller Móvil y Servicio Posventa CONSUR S.A.</strong></span>
                    </div>
                    <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20quisiera%20recibir%20asesoramiento%20sobre%20sus%20marcas%20oficiales" 
                       target="_blank" 
                       class="text-slate-800 hover:text-[#eb0a1e] font-bold flex items-center gap-1.5 transition">
                        <i class="fab fa-whatsapp text-emerald-500 text-sm"></i>
                        <span>Consultar con Asesor</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Backdrop Oscuro Detrás del Mega Menú -->
        <div x-show="brandsMenuOpen" 
             x-cloak 
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="brandsMenuOpen = false"
             class="hidden lg:block fixed inset-0 top-14 md:top-16 bg-black/60 backdrop-blur-xs z-40 pointer-events-auto">
        </div>

        <!-- Mobile Menu Dropdown Dinámico con Acordeón de Marcas -->
        <div x-show="mobileMenuOpen" x-cloak x-transition class="lg:hidden bg-white dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 px-4 pt-2 pb-6 space-y-2 max-h-[85vh] overflow-y-auto">
            
            <!-- Acordeón Móvil: Marcas Oficiales -->
            <div x-data="{ marcasMobileOpen: true }" class="py-2 border-b border-slate-100 dark:border-neutral-800">
                <button @click="marcasMobileOpen = !marcasMobileOpen" class="w-full flex items-center justify-between text-sm font-semibold text-neutral-900 dark:text-white py-1.5">
                    <span class="flex items-center gap-2">
                        <i class="fas fa-layer-group text-sm text-[#eb0a1e]"></i>
                        <span>Marcas y Divisiones Oficiales</span>
                    </span>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="marcasMobileOpen ? 'rotate-180 text-[#eb0a1e]' : 'text-neutral-400'"></i>
                </button>
                <div x-show="marcasMobileOpen" x-cloak x-transition class="mt-2 space-y-1.5 pl-2 border-l-2 border-[#eb0a1e]/40">
                    @foreach($featuredBrands as $b)
                        <a href="{{ $b->effective_url }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 py-2 px-2.5 rounded-xl hover:bg-neutral-50 dark:hover:bg-neutral-900 transition">
                            <div class="w-9 h-9 rounded-lg bg-white border border-neutral-200/80 shadow-xs flex items-center justify-center p-1.5 flex-shrink-0">
                                <img src="{{ $b->logo_src }}" alt="{{ $b->name }}" class="max-h-6 max-w-full object-contain">
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="block text-xs font-semibold text-neutral-800 dark:text-neutral-200 truncate">{{ $b->name }}</span>
                                <span class="block text-[10px] text-neutral-400 font-light truncate">
                                    {{ $b->slug === 'toyota' ? 'Vitrina Oficial 0 KM' : ($b->tagline ?: 'Línea Oficial') }}
                                </span>
                            </div>
                            <i class="fas fa-chevron-right text-[10px] text-neutral-300 dark:text-neutral-600"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            @foreach($headerMenuItems as $menuItem)
                @if($menuItem->activeChildren->count() > 0)
                    <div class="py-2 border-b border-slate-100 dark:border-neutral-800">
                        <span class="block text-xs font-medium uppercase tracking-wider text-neutral-400 dark:text-neutral-500 mb-1">{{ $menuItem->title }}</span>
                        @foreach($menuItem->activeChildren as $sub)
                            <a href="{{ $sub->url }}" @click="mobileMenuOpen = false" target="{{ $sub->target }}" 
                               class="block py-1.5 pl-3 text-sm font-normal text-neutral-700 dark:text-neutral-300 hover:text-red-600 dark:hover:text-red-500">
                                {{ $sub->title }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <a href="{{ $menuItem->url }}" @click="mobileMenuOpen = false" target="{{ $menuItem->target }}" 
                       class="block py-2 text-base font-normal text-neutral-800 dark:text-neutral-200 hover:text-red-600 dark:hover:text-red-500">
                        {{ $menuItem->title }}
                    </a>
                @endif
            @endforeach
            <div class="pt-4 border-t border-slate-100 dark:border-neutral-800 flex flex-col space-y-3">
                <a href="{{ \App\Models\Setting::get('turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131') }}" target="_blank" class="w-full text-center bg-slate-100 dark:bg-neutral-900 text-neutral-800 dark:text-neutral-200 py-2.5 rounded-xl font-medium text-sm">
                    Agendar Turno Online
                </a>
                <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}" target="_blank" class="w-full text-center bg-red-600 text-white py-2.5 rounded-xl font-medium text-sm">
                    Contactar por WhatsApp
                </a>
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content Slot -->
    <main>
        {{ $slot }}
    </main>

    <!-- Floating WhatsApp CTA Button -->
    <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20quisiera%20recibir%20asesoramiento" 
       target="_blank" 
       class="fixed bottom-6 right-6 z-50 bg-[#25D366] hover:bg-[#20bd5a] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-all duration-300 flex items-center justify-center group"
       title="Chatear con un Asesor">
        <i class="fab fa-whatsapp text-3xl"></i>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-500 ease-in-out font-bold text-sm px-0 group-hover:px-2">
            Chatear con Asesor
        </span>
    </a>

    <!-- Footer Corporativo CONSUR Dinámico -->
    @php
        $featuredBrands ??= \App\Models\Brand::getFeaturedForMenu();
        $copyrightText = str_replace('{year}', date('Y'), \App\Models\Setting::get('footer_copyright', '© {year} CONSUR S.A. Todos los derechos reservados. Concesionaria Oficial Toyota Paraguay.'));
        $scheduleInfo = \App\Models\Setting::get('schedule_info', 'Lun a Vie: 07:00 a 12:00 • 13:30 a 17:30 | Sáb: 07:30 a 11:30');
        $turnosUrl = \App\Models\Setting::get('turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131');
    @endphp
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-12 border-t border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-12 border-b border-slate-800/80">
                <!-- Columna 1: Logo CONSUR, Horarios de Atención y Redes Sociales -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="inline-block">
                            <img src="{{ asset(ltrim(\App\Models\Setting::get('site_logo_dark_url', '/images/logoconsurweb-white.png'), '/')) }}" alt="CONSUR S.A." class="h-8 md:h-9 w-auto object-contain">
                        </a>
                    </div>

                    <!-- Horarios de Atención -->
                    <div class="pt-1">
                        <p class="text-xs font-bold text-slate-200 uppercase tracking-wider flex items-center gap-1.5 mb-1">
                            <i class="far fa-clock text-red-500"></i> Horario de Atención:
                        </p>
                        <p class="text-[11px] text-slate-400 leading-snug">
                            {!! nl2br(e($scheduleInfo)) !!}
                        </p>
                    </div>

                    <!-- Redes Sociales -->
                    <div class="flex flex-wrap gap-2 text-sm text-slate-300 pt-2">
                        @if(\App\Models\Setting::get('footer_show_facebook', 1))
                            <a href="{{ \App\Models\Setting::get('facebook_url', 'https://www.facebook.com/ConsurToyota/') }}" target="_blank" class="w-8 h-8 rounded-full bg-neutral-800 hover:bg-blue-600 flex items-center justify-center transition" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('footer_show_instagram', 1))
                            <a href="{{ \App\Models\Setting::get('instagram_url', 'https://www.instagram.com/consur_toyota/') }}" target="_blank" class="w-8 h-8 rounded-full bg-neutral-800 hover:bg-pink-600 flex items-center justify-center transition" title="Instagram"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('footer_show_tiktok', 1))
                            <a href="{{ \App\Models\Setting::get('tiktok_url', 'https://www.tiktok.com/@consurtoyota') }}" target="_blank" class="w-8 h-8 rounded-full bg-neutral-800 hover:bg-slate-950 flex items-center justify-center transition" title="TikTok"><i class="fab fa-tiktok"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('footer_show_spotify', 1))
                            <a href="{{ \App\Models\Setting::get('spotify_url', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2') }}" target="_blank" class="w-8 h-8 rounded-full bg-neutral-800 hover:bg-emerald-500 flex items-center justify-center transition" title="Spotify"><i class="fab fa-spotify"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('footer_show_linkedin', 0))
                            <a href="{{ \App\Models\Setting::get('linkedin_url', '#') }}" target="_blank" class="w-8 h-8 rounded-full bg-neutral-800 hover:bg-blue-700 flex items-center justify-center transition" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('footer_show_youtube', 1))
                            <a href="{{ \App\Models\Setting::get('youtube_url', 'https://www.youtube.com/@Consurtoyota') }}" target="_blank" class="w-8 h-8 rounded-full bg-neutral-800 hover:bg-red-600 flex items-center justify-center transition" title="YouTube"><i class="fab fa-youtube"></i></a>
                        @endif
                    </div>
                </div>

                <!-- Columna 2: Menú de Marcas (Con las marcas que tenemos arriba) -->
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 font-heading flex items-center gap-2">
                        <i class="fas fa-layer-group text-red-500 text-xs"></i>
                        <span>{{ \App\Models\Setting::get('footer_col2_title', 'Marcas Oficiales') }}</span>
                    </h4>
                    <ul class="space-y-3 text-xs">
                        @foreach($featuredBrands as $b)
                            <li>
                                <a href="{{ $b->effective_url }}" class="hover:text-red-500 transition flex items-center gap-2 group">
                                    <i class="fas fa-angle-right text-[10px] text-red-500"></i>
                                    <span>{{ $b->name }}</span>
                                    @if($b->slug === 'toyota')
                                        <span class="text-[9px] px-1.5 py-0.5 rounded font-bold uppercase bg-red-600 text-white ml-auto">0 KM</span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Columna 3: NOSOTROS (La Empresa, Agendamiento, Trabaja con nosotros, Novedades) -->
                @php
                    $footerCol3Items = \App\Models\MenuItem::getFooterMenu('footer_col_3');
                @endphp
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 font-heading flex items-center gap-2">
                        <i class="fas fa-building text-red-500 text-xs"></i>
                        <span>{{ \App\Models\Setting::get('footer_col3_title', 'NOSOTROS') }}</span>
                    </h4>
                    <ul class="space-y-3 text-xs">
                        @forelse($footerCol3Items as $fItem)
                            <li>
                                <a href="{{ $fItem->url }}" target="{{ $fItem->target }}" class="hover:text-red-500 transition flex items-center gap-2">
                                    <i class="fas fa-angle-right text-[10px] text-red-500"></i>
                                    <span>{{ $fItem->title }}</span>
                                </a>
                            </li>
                        @empty
                            <li>
                                <a href="{{ route('la-empresa') }}" class="hover:text-red-500 transition flex items-center gap-2">
                                    <i class="fas fa-angle-right text-[10px] text-red-500"></i>
                                    <span>La Empresa</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $turnosUrl }}" target="_blank" class="hover:text-red-500 transition flex items-center gap-2">
                                    <i class="fas fa-angle-right text-[10px] text-red-500"></i>
                                    <span>Agendamiento</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('trabaja-con-nosotros') }}" class="hover:text-red-500 transition flex items-center gap-2">
                                    <i class="fas fa-angle-right text-[10px] text-red-500"></i>
                                    <span>Trabaja con nosotros</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('novedades') }}" class="hover:text-red-500 transition flex items-center gap-2">
                                    <i class="fas fa-angle-right text-[10px] text-red-500"></i>
                                    <span>Novedades</span>
                                </a>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Copyright & Créditos (Powered by Soteweb) -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <p>{{ $copyrightText }}</p>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('page.show', 'terminos-y-condiciones') }}" class="hover:text-slate-300 transition">Términos & Privacidad</a>
                    <span>•</span>
                    <a href="{{ route('page.show', 'garantia-y-seguros') }}" class="hover:text-slate-300 transition">Garantía & Seguros</a>
                    <span>•</span>
                    <span>Powered by <a href="https://soteweb.com" target="_blank" rel="noopener noreferrer" class="hover:text-red-500 font-bold transition text-slate-300">Soteweb</a></span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Botón Flotante "Subir Arriba" (Inferior Izquierda) -->
    <div x-data="{ showScrollTop: false }"
         @scroll.window="showScrollTop = (window.pageYOffset || document.documentElement.scrollTop) > 300"
         x-show="showScrollTop"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 scale-90"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-90"
         class="fixed bottom-6 left-6 z-50">
        <button type="button"
                @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                title="Volver arriba"
                aria-label="Volver arriba"
                class="w-12 h-12 rounded-full bg-neutral-900/90 hover:bg-[#eb0a1e] text-white shadow-xl border border-white/15 flex items-center justify-center transition-all duration-300 hover:scale-110 cursor-pointer backdrop-blur-xs">
            <i class="fas fa-chevron-up text-sm"></i>
        </button>
    </div>

    <!-- Global Toast Notification Component (Alpine.js + Livewire Event Listener) -->
    <div x-data="{ show: false, message: '', type: 'success' }"
         @notify.window="show = true; message = $event.detail.message; type = $event.detail.type || 'success'; setTimeout(() => show = false, 4500)"
         x-show="show"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         class="fixed bottom-6 left-6 z-50 p-4 rounded-2xl shadow-2xl border text-sm font-semibold flex items-center gap-3 backdrop-blur-md"
         :class="{
             'bg-emerald-500/90 text-white border-emerald-400': type === 'success',
             'bg-rose-500/90 text-white border-rose-400': type === 'danger' || type === 'error',
             'bg-amber-500/90 text-white border-amber-400': type === 'warning',
             'bg-primary-500/90 text-white border-primary-400': type === 'info'
         }">
        <i class="fas" :class="{
            'fa-check-circle': type === 'success',
            'fa-exclamation-triangle': type === 'danger' || type === 'error',
            'fa-info-circle': type === 'info' || type === 'warning'
        }"></i>
        <span x-text="message"></span>
    </div>

    @livewireScripts

    <!-- AOS (Animate On Scroll) JS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Preloader & AOS Smooth Init Script -->
    <script>
        (function() {
            // Manejador del Preloader Tacómetro
            const hidePreloader = function() {
                const preloader = document.getElementById('preloader');
                if (preloader && !preloader.dataset.hidden) {
                    preloader.dataset.hidden = 'true';
                    preloader.classList.add('opacity-0', 'pointer-events-none');
                    setTimeout(function() {
                        preloader.style.display = 'none';
                        if (typeof AOS !== 'undefined') {
                            AOS.refresh();
                        }
                    }, 700);
                }
            };

            if (document.readyState === 'complete') {
                setTimeout(hidePreloader, 120);
            } else {
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(hidePreloader, 150);
                });
                window.addEventListener('load', function() {
                    setTimeout(hidePreloader, 150);
                });
            }

            // Fallback de seguridad por si algún tracker o recurso secundario tarda en responder
            setTimeout(hidePreloader, 900);

            // Inicialización de AOS
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof AOS !== 'undefined') {
                    AOS.init({
                        duration: 800,
                        easing: 'ease-out-cubic',
                        once: true,
                        offset: 50,
                        delay: 60
                    });
                }
            });

            // Compatibilidad con Livewire navigation
            document.addEventListener('livewire:navigated', function() {
                if (typeof AOS !== 'undefined') {
                    AOS.refresh();
                }
            });
        })();
    </script>
</body>
</html>
