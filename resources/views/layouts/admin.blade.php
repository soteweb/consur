<!DOCTYPE html>
<html lang="es" class="h-full bg-[#f4f6f8]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Panel de Administración' }} – CONSUR S.A.</title>

    <!-- Favicon Oficial CONSUR S.A. -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts: Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        [x-cloak] { display: none !important; }
        /* Scrollbar minimalista para el sidebar */
        .admin-sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .admin-sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .admin-sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 4px; }
        .admin-sidebar-scroll::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.25); }
    </style>
</head>
@php
    $isCatalogGroup = request()->routeIs('admin.vehicles*', 'admin.brands*', 'admin.catalog*');
    $isContentGroup = request()->routeIs('admin.posts*', 'admin.pages*', 'admin.branches*');
    $isAppearanceGroup = request()->routeIs('admin.sliders*', 'admin.sections*', 'admin.menus*', 'admin.footer*', 'admin.testimonials*');
    $isSystemGroup = request()->routeIs('admin.users*', 'admin.forms*', 'admin.audit*', 'admin.settings*');

    $newLeadsCount = auth()->user()->canManageCommercial()
        ? \App\Models\Lead::where('status', 'nuevo')->count()
        : 0;

    // Título contextual automático según la ruta activa
    $currentSectionTitle = $header ?? match(true) {
        request()->routeIs('admin.dashboard') => 'Dashboard Ejecutivo',
        request()->routeIs('admin.leads*') => 'Leads & Cotizaciones Comerciales',
        request()->routeIs('admin.vehicles.0km') => 'Catálogo de Vehículos 0 Km',
        request()->routeIs('admin.vehicles.usados') => 'Catálogo de Vehículos Usados',
        request()->routeIs('admin.brands*') => 'Marcas & Categorías Oficiales',
        request()->routeIs('admin.catalog*') => 'Catálogo Mensual (Revista PDF)',
        request()->routeIs('admin.posts*') => 'Novedades & Prensa',
        request()->routeIs('admin.pages*') => 'Páginas del Sitio (CMS)',
        request()->routeIs('admin.branches*') => 'Sucursales & Talleres Oficiales',
        request()->routeIs('admin.sliders*') => 'Banners & Sliders de Portada',
        request()->routeIs('admin.sections*') => 'Secciones de Portada (Home)',
        request()->routeIs('admin.menus*') => 'Menús & Navegación',
        request()->routeIs('admin.footer*') => 'Pie de Página (Footer)',
        request()->routeIs('admin.testimonials*') => 'Podcast Spotify & Multimedia',
        request()->routeIs('admin.users*') => 'Usuarios & Permisos (RBAC)',
        request()->routeIs('admin.forms*') => 'Gestor de Formularios & Correos',
        request()->routeIs('admin.audit*') => 'Registro de Auditoría (Audit Trail)',
        request()->routeIs('admin.settings*') => 'Configuración Global del Sitio',
        default => 'Panel de Control',
    };
@endphp
<body class="h-full font-sans text-slate-800 antialiased bg-[#f4f6f8]"
      x-data="{
          sidebarOpen: false,
          sidebarCollapsed: localStorage.getItem('admin_sidebar_collapsed') === 'true',
          quickActionsOpen: false,
          openGroup: '{{ $isAppearanceGroup ? 'appearance' : ($isSystemGroup ? 'system' : ($isContentGroup ? 'content' : ($isCatalogGroup ? 'catalog' : ''))) }}',
          toggleCollapse() {
              this.sidebarCollapsed = !this.sidebarCollapsed;
              localStorage.setItem('admin_sidebar_collapsed', this.sidebarCollapsed);
          },
          toggleGroup(group) {
              if (this.sidebarCollapsed) {
                  this.sidebarCollapsed = false;
                  localStorage.setItem('admin_sidebar_collapsed', 'false');
                  this.openGroup = group;
              } else {
                  this.openGroup = (this.openGroup === group) ? '' : group;
              }
          }
      }">

    <div class="min-h-full flex">

        <!-- ========================================== -->
        <!-- 1. SIDEBAR EJECUTIVO DESKTOP (CONSUR DARK) -->
        <!-- ========================================== -->
        <aside :class="sidebarCollapsed ? 'lg:w-20' : 'lg:w-64'"
               class="hidden lg:flex lg:flex-col bg-neutral-950 border-r border-neutral-800/80 text-slate-300 transition-all duration-300 shrink-0 select-none">

            <!-- Brand Logo Header -->
            <div class="h-16 flex items-center justify-between px-5 border-b border-neutral-800/80 bg-black/40">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 overflow-hidden">
                    <img src="{{ asset('images/logoconsurweb-white.png') }}"
                         alt="CONSUR S.A."
                         x-show="!sidebarCollapsed"
                         class="h-7 w-auto object-contain">
                    <span x-show="sidebarCollapsed" x-cloak class="w-9 h-9 rounded-xl bg-[#eb0a1e] text-white font-black text-base flex items-center justify-center shadow-md shadow-red-600/25">
                        C
                    </span>
                </a>
                <span x-show="!sidebarCollapsed" class="text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-white/5 text-slate-400 border border-white/10">
                    Admin
                </span>
            </div>

            <!-- Navigation Links (Limpio, Jerárquico y con Acordeones) -->
            <nav class="flex-1 px-3 py-5 space-y-1.5 overflow-y-auto admin-sidebar-scroll">

                <!-- SECCIÓN PRINCIPAL: OPERACIÓN DIARIA -->
                <div x-show="!sidebarCollapsed" class="px-3 pb-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-neutral-500">
                    Operación Diaria
                </div>

                <!-- 1. Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                   title="Dashboard Ejecutivo"
                   class="group relative flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-[#eb0a1e] text-white font-semibold shadow-md shadow-red-600/20' : 'text-neutral-400 hover:bg-white/[0.06] hover:text-white' }}">
                    <i class="fas fa-chart-pie w-5 text-center text-sm {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-neutral-400 group-hover:text-white' }}"></i>
                    <span x-show="!sidebarCollapsed" class="truncate">Dashboard</span>
                </a>

                <!-- 2. Leads & Cotizaciones (Prioridad Comercial) -->
                @if(auth()->user()->canManageCommercial())
                    <a href="{{ route('admin.leads') }}"
                       title="Leads & Cotizaciones"
                       class="group relative flex items-center justify-between px-3.5 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 {{ request()->routeIs('admin.leads*') ? 'bg-[#eb0a1e] text-white font-semibold shadow-md shadow-red-600/20' : 'text-neutral-400 hover:bg-white/[0.06] hover:text-white' }}">
                        <div class="flex items-center gap-3 min-w-0">
                            <i class="fas fa-inbox w-5 text-center text-sm {{ request()->routeIs('admin.leads*') ? 'text-white' : 'text-neutral-400 group-hover:text-white' }}"></i>
                            <span x-show="!sidebarCollapsed" class="truncate">Leads & Consultas</span>
                        </div>
                        @if($newLeadsCount > 0)
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-full {{ request()->routeIs('admin.leads*') ? 'bg-white text-[#eb0a1e]' : 'bg-[#eb0a1e] text-white animate-pulse' }}">
                                {{ $newLeadsCount }}
                            </span>
                        @endif
                    </a>
                @endif

                <!-- 3. Vehículos & Catálogo (Accesos directos + subopciones limpias) -->
                <div class="pt-1">
                    <button type="button"
                            @click="toggleGroup('catalog')"
                            title="Vehículos & Catálogo"
                            class="w-full group flex items-center justify-between px-3.5 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 {{ $isCatalogGroup ? 'bg-white/[0.08] text-white font-semibold' : 'text-neutral-400 hover:bg-white/[0.06] hover:text-white' }}">
                        <div class="flex items-center gap-3 min-w-0">
                            <i class="fas fa-car-side w-5 text-center text-sm {{ $isCatalogGroup ? 'text-[#eb0a1e]' : 'text-neutral-400 group-hover:text-white' }}"></i>
                            <span x-show="!sidebarCollapsed" class="truncate">Vehículos & Stock</span>
                        </div>
                        <i x-show="!sidebarCollapsed"
                           class="fas fa-chevron-down text-[10px] text-neutral-500 transition-transform duration-200"
                           :class="openGroup === 'catalog' ? 'rotate-180 text-white' : ''"></i>
                    </button>

                    <div x-show="openGroup === 'catalog' && !sidebarCollapsed"
                         x-cloak
                         x-transition.opacity.duration.150ms
                         class="mt-1 ml-4 pl-3 border-l border-neutral-800 space-y-1">
                        <a href="{{ route('admin.vehicles.0km') }}"
                           class="flex items-center justify-between px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.vehicles.0km') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                            <span>Vehículos 0 Km</span>
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('admin.vehicles.0km') ? 'bg-[#eb0a1e]' : 'bg-neutral-700' }}"></span>
                        </a>
                        <a href="{{ route('admin.vehicles.usados') }}"
                           class="flex items-center justify-between px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.vehicles.usados') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                            <span>Vehículos Usados</span>
                            <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('admin.vehicles.usados') ? 'bg-[#eb0a1e]' : 'bg-neutral-700' }}"></span>
                        </a>
                        @if(auth()->user()->canManageContent())
                            <a href="{{ route('admin.brands') }}"
                               class="flex items-center justify-between px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.brands*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                <span>Marcas & Categorías</span>
                            </a>
                            <a href="{{ route('admin.catalog') }}"
                               class="flex items-center justify-between px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.catalog*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                <span>Catálogo Mensual PDF</span>
                            </a>
                        @endif
                    </div>
                </div>

                @if(auth()->user()->canManageContent())
                    <!-- SECCIÓN SECUNDARIA: GESTIÓN WEB & CMS -->
                    <div x-show="!sidebarCollapsed" class="pt-4 px-3 pb-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-neutral-500">
                        Gestión Web & CMS
                    </div>

                    <!-- 4. Contenidos & Sucursales (Acordeón) -->
                    <div>
                        <button type="button"
                                @click="toggleGroup('content')"
                                title="Contenidos & Red"
                                class="w-full group flex items-center justify-between px-3.5 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 {{ $isContentGroup ? 'bg-white/[0.08] text-white font-semibold' : 'text-neutral-400 hover:bg-white/[0.06] hover:text-white' }}">
                            <div class="flex items-center gap-3 min-w-0">
                                <i class="fas fa-newspaper w-5 text-center text-sm {{ $isContentGroup ? 'text-[#eb0a1e]' : 'text-neutral-400 group-hover:text-white' }}"></i>
                                <span x-show="!sidebarCollapsed" class="truncate">Contenidos & Red</span>
                            </div>
                            <i x-show="!sidebarCollapsed"
                               class="fas fa-chevron-down text-[10px] text-neutral-500 transition-transform duration-200"
                               :class="openGroup === 'content' ? 'rotate-180 text-white' : ''"></i>
                        </button>

                        <div x-show="openGroup === 'content' && !sidebarCollapsed"
                             x-cloak
                             x-transition.opacity.duration.150ms
                             class="mt-1 ml-4 pl-3 border-l border-neutral-800 space-y-1">
                            <a href="{{ route('admin.posts') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.posts*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Novedades & Prensa
                            </a>
                            <a href="{{ route('admin.pages') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.pages*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Páginas del Sitio (CMS)
                            </a>
                            <a href="{{ route('admin.branches') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.branches*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Sucursales & Talleres
                            </a>
                        </div>
                    </div>

                    <!-- 5. Portada & Apariencia (Acordeón que agrupa los 5 gestores de interfaz) -->
                    <div>
                        <button type="button"
                                @click="toggleGroup('appearance')"
                                title="Portada & Apariencia"
                                class="w-full group flex items-center justify-between px-3.5 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 {{ $isAppearanceGroup ? 'bg-white/[0.08] text-white font-semibold' : 'text-neutral-400 hover:bg-white/[0.06] hover:text-white' }}">
                            <div class="flex items-center gap-3 min-w-0">
                                <i class="fas fa-layer-group w-5 text-center text-sm {{ $isAppearanceGroup ? 'text-[#eb0a1e]' : 'text-neutral-400 group-hover:text-white' }}"></i>
                                <span x-show="!sidebarCollapsed" class="truncate">Portada & Apariencia</span>
                            </div>
                            <i x-show="!sidebarCollapsed"
                               class="fas fa-chevron-down text-[10px] text-neutral-500 transition-transform duration-200"
                               :class="openGroup === 'appearance' ? 'rotate-180 text-white' : ''"></i>
                        </button>

                        <div x-show="openGroup === 'appearance' && !sidebarCollapsed"
                             x-cloak
                             x-transition.opacity.duration.150ms
                             class="mt-1 ml-4 pl-3 border-l border-neutral-800 space-y-1">
                            <a href="{{ route('admin.sliders') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.sliders*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Banners & Sliders Hero
                            </a>
                            <a href="{{ route('admin.sections') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.sections*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Secciones de Portada
                            </a>
                            <a href="{{ route('admin.menus') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.menus*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Menús & Navegación
                            </a>
                            <a href="{{ route('admin.footer') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.footer*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Pie de Página (Footer)
                            </a>
                            <a href="{{ route('admin.testimonials') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.testimonials*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Podcast Spotify
                            </a>
                        </div>
                    </div>
                @endif

                <!-- 6. Sistema & Seguridad (Acordeón Exclusivo Administrador) -->
                @if(auth()->user()->canManageSystem())
                    <div x-show="!sidebarCollapsed" class="pt-4 px-3 pb-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-neutral-500">
                        Administración
                    </div>

                    <div>
                        <button type="button"
                                @click="toggleGroup('system')"
                                title="Sistema & Seguridad"
                                class="w-full group flex items-center justify-between px-3.5 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 {{ $isSystemGroup ? 'bg-white/[0.08] text-white font-semibold' : 'text-neutral-400 hover:bg-white/[0.06] hover:text-white' }}">
                            <div class="flex items-center gap-3 min-w-0">
                                <i class="fas fa-sliders-h w-5 text-center text-sm {{ $isSystemGroup ? 'text-[#eb0a1e]' : 'text-neutral-400 group-hover:text-white' }}"></i>
                                <span x-show="!sidebarCollapsed" class="truncate">Sistema & Ajustes</span>
                            </div>
                            <i x-show="!sidebarCollapsed"
                               class="fas fa-chevron-down text-[10px] text-neutral-500 transition-transform duration-200"
                               :class="openGroup === 'system' ? 'rotate-180 text-white' : ''"></i>
                        </button>

                        <div x-show="openGroup === 'system' && !sidebarCollapsed"
                             x-cloak
                             x-transition.opacity.duration.150ms
                             class="mt-1 ml-4 pl-3 border-l border-neutral-800 space-y-1">
                            <a href="{{ route('admin.settings') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.settings*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Configuración Global
                            </a>
                            <a href="{{ route('admin.users') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.users*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Usuarios & Roles
                            </a>
                            <a href="{{ route('admin.forms') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.forms*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Gestor de Formularios
                            </a>
                            <a href="{{ route('admin.audit') }}"
                               class="block px-3 py-2 rounded-lg text-xs transition {{ request()->routeIs('admin.audit*') ? 'bg-[#eb0a1e]/15 text-white font-semibold border-l-2 border-[#eb0a1e] -ml-[13px] pl-[23px]' : 'text-neutral-400 hover:text-white hover:bg-white/[0.04]' }}">
                                Auditoría (Audit Trail)
                            </a>
                        </div>
                    </div>
                @endif

            </nav>

            <!-- User Profile Footer in Sidebar -->
            <div class="p-3.5 border-t border-neutral-800/80 bg-black/40 flex items-center justify-between">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#eb0a1e] to-red-700 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div x-show="!sidebarCollapsed" class="min-w-0 flex-1">
                        <p class="text-xs font-semibold text-white truncate">{{ preg_replace('/\s*\(.*?\)/', '', auth()->user()->name ?? 'Usuario') }}</p>
                        <span class="block text-[10px] text-neutral-400 truncate">
                            {{ auth()->user()->role_label }}
                        </span>
                    </div>
                </div>
                <button type="button"
                        @click="toggleCollapse()"
                        :title="sidebarCollapsed ? 'Expandir menú' : 'Contraer menú'"
                        class="w-7 h-7 rounded-lg text-neutral-500 hover:text-white hover:bg-white/10 flex items-center justify-center transition cursor-pointer shrink-0">
                    <i class="fas text-xs" :class="sidebarCollapsed ? 'fa-angles-right' : 'fa-angles-left'"></i>
                </button>
            </div>
        </aside>

        <!-- ========================================== -->
        <!-- 2. MAIN CONTENT WRAPPER & TOPBAR           -->
        <!-- ========================================== -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            <!-- Topbar Ejecutivo -->
            <header class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-4 sm:px-6 lg:px-8 z-20 shrink-0">
                <div class="flex items-center gap-3.5">
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none">
                        <i class="fas fa-bars text-lg"></i>
                    </button>

                    <div>
                        <div class="flex items-center gap-2">
                            <h1 class="text-sm sm:text-base font-bold text-slate-900 tracking-tight">{{ $currentSectionTitle }}</h1>
                        </div>
                    </div>
                </div>

                <!-- Right Actions: Quick Create Dropdown + Ver Web + Salir -->
                <div class="flex items-center gap-2.5">

                    <!-- Botón Desplegable "+ Acceso Rápido" -->
                    <div class="relative" @click.outside="quickActionsOpen = false">
                        <button type="button"
                                @click="quickActionsOpen = !quickActionsOpen"
                                class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold rounded-xl bg-slate-900 hover:bg-[#eb0a1e] text-white transition-colors duration-200 shadow-2xs cursor-pointer">
                            <i class="fas fa-bolt text-[11px] text-amber-400"></i>
                            <span class="hidden sm:inline">Ir a Módulo</span>
                            <i class="fas fa-chevron-down text-[9px] opacity-75 ml-0.5"></i>
                        </button>

                        <div x-show="quickActionsOpen"
                             x-cloak
                             x-transition.opacity.duration.150ms
                             class="absolute right-0 mt-2 w-56 rounded-2xl bg-white shadow-xl border border-slate-200/90 py-2 z-50 text-xs">
                            <div class="px-3.5 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Accesos Directos
                            </div>
                            <a href="{{ route('admin.vehicles.0km') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#eb0a1e] font-medium">
                                <i class="fas fa-car-side w-4 text-center text-[#eb0a1e]"></i> Gestionar Vehículos 0 Km
                            </a>
                            <a href="{{ route('admin.vehicles.usados') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#eb0a1e] font-medium">
                                <i class="fas fa-sync-alt w-4 text-center text-amber-500"></i> Gestionar Vehículos Usados
                            </a>
                            @if(auth()->user()->canManageCommercial())
                                <a href="{{ route('admin.leads') }}" class="flex items-center justify-between px-3.5 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#eb0a1e] font-medium">
                                    <span class="flex items-center gap-2.5">
                                        <i class="fas fa-inbox w-4 text-center text-emerald-600"></i> Ver Leads Comerciales
                                    </span>
                                    @if($newLeadsCount > 0)
                                        <span class="px-1.5 py-0.5 text-[10px] font-bold rounded-full bg-red-100 text-[#eb0a1e]">{{ $newLeadsCount }}</span>
                                    @endif
                                </a>
                            @endif
                            @if(auth()->user()->canManageContent())
                                <div class="my-1 border-t border-slate-100"></div>
                                <a href="{{ route('admin.posts') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#eb0a1e] font-medium">
                                    <i class="fas fa-newspaper w-4 text-center text-slate-400"></i> Publicar Novedad
                                </a>
                                <a href="{{ route('admin.pages') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#eb0a1e] font-medium">
                                    <i class="fas fa-file-alt w-4 text-center text-slate-400"></i> Editar Páginas CMS
                                </a>
                                <a href="{{ route('admin.sliders') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#eb0a1e] font-medium">
                                    <i class="fas fa-images w-4 text-center text-slate-400"></i> Banners de Portada
                                </a>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('home') }}" target="_blank"
                       class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold rounded-xl text-slate-700 bg-slate-100 hover:bg-slate-200/80 transition">
                        <i class="fas fa-external-link-alt text-[11px] text-slate-500"></i>
                        <span class="hidden sm:inline">Ver Sitio Web</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                title="Cerrar sesión"
                                class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-semibold rounded-xl text-rose-600 hover:bg-rose-50 transition cursor-pointer">
                            <i class="fas fa-power-off"></i>
                            <span class="hidden md:inline">Salir</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- ========================================================================= -->
            <!-- 3. SUB-NAVEGACIÓN CONTEXTUAL (PESTAÑAS HORIZONTALES RÁPIDAS POR MÓDULO)   -->
            <!-- ========================================================================= -->
            @if($isCatalogGroup)
                <div class="bg-white border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto no-scrollbar py-2 shrink-0">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mr-2 hidden sm:inline">Catálogo:</span>
                    <a href="{{ route('admin.vehicles.0km') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.vehicles.0km') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-car-side mr-1.5 text-[11px] {{ request()->routeIs('admin.vehicles.0km') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Vehículos 0 Km
                    </a>
                    <a href="{{ route('admin.vehicles.usados') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.vehicles.usados') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-sync-alt mr-1.5 text-[11px] {{ request()->routeIs('admin.vehicles.usados') ? 'text-amber-400' : 'text-slate-400' }}"></i>Vehículos Usados
                    </a>
                    @if(auth()->user()->canManageContent())
                        <a href="{{ route('admin.brands') }}"
                           class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.brands*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                            <i class="fas fa-tags mr-1.5 text-[11px] {{ request()->routeIs('admin.brands*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Marcas & Categorías
                        </a>
                        <a href="{{ route('admin.catalog') }}"
                           class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.catalog*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                            <i class="fas fa-file-pdf mr-1.5 text-[11px] {{ request()->routeIs('admin.catalog*') ? 'text-emerald-400' : 'text-slate-400' }}"></i>Catálogo Mensual PDF
                        </a>
                    @endif
                </div>
            @elseif($isContentGroup && auth()->user()->canManageContent())
                <div class="bg-white border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto no-scrollbar py-2 shrink-0">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mr-2 hidden sm:inline">Contenidos:</span>
                    <a href="{{ route('admin.posts') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.posts*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-newspaper mr-1.5 text-[11px] {{ request()->routeIs('admin.posts*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Novedades & Prensa
                    </a>
                    <a href="{{ route('admin.pages') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.pages*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-file-alt mr-1.5 text-[11px] {{ request()->routeIs('admin.pages*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Páginas del Sitio (CMS)
                    </a>
                    <a href="{{ route('admin.branches') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.branches*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-building mr-1.5 text-[11px] {{ request()->routeIs('admin.branches*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Sucursales & Talleres
                    </a>
                </div>
            @elseif($isAppearanceGroup && auth()->user()->canManageContent())
                <div class="bg-white border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto no-scrollbar py-2 shrink-0">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mr-2 hidden sm:inline">Apariencia Web:</span>
                    <a href="{{ route('admin.sliders') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.sliders*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-images mr-1.5 text-[11px] {{ request()->routeIs('admin.sliders*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Banners & Sliders
                    </a>
                    <a href="{{ route('admin.sections') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.sections*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-cubes mr-1.5 text-[11px] {{ request()->routeIs('admin.sections*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Secciones de Portada
                    </a>
                    <a href="{{ route('admin.menus') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.menus*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-bars mr-1.5 text-[11px] {{ request()->routeIs('admin.menus*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Menús & Navegación
                    </a>
                    <a href="{{ route('admin.footer') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.footer*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-shoe-prints mr-1.5 text-[11px] {{ request()->routeIs('admin.footer*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Pie de Página (Footer)
                    </a>
                    <a href="{{ route('admin.testimonials') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.testimonials*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-podcast mr-1.5 text-[11px] {{ request()->routeIs('admin.testimonials*') ? 'text-emerald-400' : 'text-slate-400' }}"></i>Podcast Spotify
                    </a>
                </div>
            @elseif($isSystemGroup && auth()->user()->canManageSystem())
                <div class="bg-white border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto no-scrollbar py-2 shrink-0">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mr-2 hidden sm:inline">Sistema:</span>
                    <a href="{{ route('admin.settings') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.settings*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-sliders-h mr-1.5 text-[11px] {{ request()->routeIs('admin.settings*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Configuración Global
                    </a>
                    <a href="{{ route('admin.users') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.users*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-users-cog mr-1.5 text-[11px] {{ request()->routeIs('admin.users*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Usuarios & Roles
                    </a>
                    <a href="{{ route('admin.forms') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.forms*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-wpforms mr-1.5 text-[11px] {{ request()->routeIs('admin.forms*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Gestor de Formularios
                    </a>
                    <a href="{{ route('admin.audit') }}"
                       class="px-3.5 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ request()->routeIs('admin.audit*') ? 'bg-slate-900 text-white shadow-2xs' : 'text-slate-600 hover:bg-slate-100' }}">
                        <i class="fas fa-shield-alt mr-1.5 text-[11px] {{ request()->routeIs('admin.audit*') ? 'text-[#eb0a1e]' : 'text-slate-400' }}"></i>Auditoría (Audit Trail)
                    </a>
                </div>
            @endif

            <!-- Mobile Drawer Sidebar -->
            <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-50 lg:hidden flex" role="dialog" aria-modal="true">
                <div @click="sidebarOpen = false" class="fixed inset-0 bg-black/75 backdrop-blur-xs"></div>
                <div class="relative flex-1 flex flex-col max-w-xs w-full bg-neutral-950 text-slate-300">
                    <div class="h-16 flex items-center justify-between px-5 border-b border-neutral-800">
                        <img src="{{ asset('images/logoconsurweb-white.png') }}" alt="CONSUR S.A." class="h-7 w-auto object-contain">
                        <button @click="sidebarOpen = false" class="text-neutral-400 hover:text-white"><i class="fas fa-times text-lg"></i></button>
                    </div>
                    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-[#eb0a1e] text-white' : 'text-neutral-300 hover:bg-white/5' }}">
                            <i class="fas fa-chart-pie w-4 text-center"></i> Dashboard
                        </a>
                        @if(auth()->user()->canManageCommercial())
                            <a href="{{ route('admin.leads') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold {{ request()->routeIs('admin.leads*') ? 'bg-[#eb0a1e] text-white' : 'text-neutral-300 hover:bg-white/5' }}">
                                <span class="flex items-center gap-3"><i class="fas fa-inbox w-4 text-center"></i> Leads & Consultas</span>
                                @if($newLeadsCount > 0)
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-[#eb0a1e] text-white">{{ $newLeadsCount }}</span>
                                @endif
                            </a>
                        @endif

                        <div class="pt-3 pb-1 px-3 text-[10px] font-bold uppercase tracking-wider text-neutral-500">Vehículos & Stock</div>
                        <a href="{{ route('admin.vehicles.0km') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Vehículos 0 Km</a>
                        <a href="{{ route('admin.vehicles.usados') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Vehículos Usados</a>
                        @if(auth()->user()->canManageContent())
                            <a href="{{ route('admin.brands') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Marcas & Categorías</a>
                            <a href="{{ route('admin.catalog') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Catálogo Mensual (PDF)</a>

                            <div class="pt-3 pb-1 px-3 text-[10px] font-bold uppercase tracking-wider text-neutral-500">Contenidos & Apariencia</div>
                            <a href="{{ route('admin.posts') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Novedades & Prensa</a>
                            <a href="{{ route('admin.pages') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Páginas CMS</a>
                            <a href="{{ route('admin.branches') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Sucursales & Talleres</a>
                            <a href="{{ route('admin.sliders') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Banners & Sliders</a>
                            <a href="{{ route('admin.sections') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Secciones Home</a>
                            <a href="{{ route('admin.menus') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Menús & Navegación</a>
                            <a href="{{ route('admin.footer') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Pie de Página (Footer)</a>
                            <a href="{{ route('admin.testimonials') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Podcast Spotify</a>
                        @endif

                        @if(auth()->user()->canManageSystem())
                            <div class="pt-3 pb-1 px-3 text-[10px] font-bold uppercase tracking-wider text-neutral-500">Sistema</div>
                            <a href="{{ route('admin.settings') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Configuración Global</a>
                            <a href="{{ route('admin.users') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Usuarios & Roles</a>
                            <a href="{{ route('admin.forms') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Formularios</a>
                            <a href="{{ route('admin.audit') }}" class="block px-3 py-2 rounded-lg text-xs font-medium text-neutral-300 hover:bg-white/5">Auditoría</a>
                        @endif
                    </nav>
                </div>
            </div>

            <!-- Page Main Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                @if(session('warning'))
                    <div class="mb-6 p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-800 text-xs font-bold flex items-center gap-3 shadow-xs">
                        <i class="fas fa-exclamation-triangle text-amber-600 text-base"></i>
                        <span>{{ session('warning') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-bold flex items-center gap-3 shadow-xs">
                        <i class="fas fa-times-circle text-rose-600 text-base"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold flex items-center gap-3 shadow-xs">
                        <i class="fas fa-check-circle text-emerald-600 text-base"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Admin Toast Notification Component -->
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
         class="fixed bottom-6 right-6 z-50 p-4 rounded-2xl shadow-2xl border text-sm font-semibold flex items-center gap-3 backdrop-blur-md"
         :class="{
             'bg-emerald-600 text-white border-emerald-500': type === 'success',
             'bg-rose-600 text-white border-rose-500': type === 'danger' || type === 'error',
             'bg-amber-500 text-white border-amber-400': type === 'warning',
             'bg-slate-900 text-white border-slate-700': type === 'info'
         }">
        <i class="fas" :class="{
            'fa-check-circle': type === 'success',
            'fa-exclamation-triangle': type === 'danger' || type === 'error',
            'fa-info-circle': type === 'info' || type === 'warning'
        }"></i>
        <span x-text="message"></span>
    </div>

    @livewireScripts
</body>
</html>
