<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Database\Seeder;

class LaEmpresaPageSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Asegurar enlaces "Usados" y "La Empresa" en el menú superior (header)
        MenuItem::updateOrCreate(
            [
                'location' => 'header',
                'url' => '/usados',
            ],
            [
                'title' => 'Usados',
                'target' => '_self',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        MenuItem::updateOrCreate(
            [
                'location' => 'header',
                'url' => '/la-empresa',
            ],
            [
                'title' => 'La Empresa',
                'target' => '_self',
                'sort_order' => 6,
                'is_active' => true,
            ]
        );

        // 2. Contenido Full-Width moderno con Parallax y Animaciones AOS
        $html = <<<'HTML'
<div data-cms-layout="fullwidth" class="w-full" x-data="{ lightboxOpen: false, lightboxSrc: '', lightboxTitle: '' }">

    <!-- 1. HERO INSTITUCIONAL ULTRA NÍTIDO (2K Ultra-HD + Picture WebP/JPG) -->
    <section class="relative w-full min-h-[440px] md:min-h-[520px] flex items-center overflow-hidden select-none">
        <!-- Capa de imagen de fondo ultra nítida de alta resolución -->
        <div class="absolute inset-0 z-0">
            <picture class="w-full h-full block">
                <source srcset="/images/pages/la-empresa/consurcentral.webp" type="image/webp">
                <img src="/images/pages/la-empresa/consurcentral.jpg"
                     alt="Consur S.A. Casa Central Encarnación"
                     fetchpriority="high"
                     decoding="async"
                     class="w-full h-full object-cover object-center transform scale-[1.02] transition-transform duration-1000">
            </picture>
            <!-- Capas de contraste cinematográfico y viñeteado elegante -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/80 to-slate-950/45"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/40"></div>
            <!-- Decoración geométrica sutil -->
            <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-[#eb0a1e]/15 blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl">
                <!-- Breadcrumb & Badge -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 mb-6" data-aos="fade-down">
                    <span class="w-2 h-2 rounded-full bg-[#eb0a1e] animate-pulse"></span>
                    <span class="text-[11px] font-bold uppercase tracking-[0.22em] text-white/90">
                        Desde 1977 &bull; 50 Años de Trayectoria
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-light text-white uppercase tracking-normal font-heading leading-[1.08]" data-aos="fade-up" data-aos-delay="100">
                    La <span class="font-normal text-[#eb0a1e]">Empresa</span>
                </h1>

                <p class="mt-4 text-base sm:text-lg md:text-xl text-slate-300 font-light max-w-2xl leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    Sinónimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay.
                </p>

                <!-- Indicadores clave -->
                <div class="mt-10 pt-8 border-t border-white/15 grid grid-cols-3 gap-6 max-w-lg" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">1977</span>
                        <span class="text-[11px] uppercase tracking-wider text-slate-400 font-medium">Año de Fundación</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-normal text-[#eb0a1e] font-heading tracking-normal">50 Años</span>
                        <span class="text-[11px] uppercase tracking-wider text-slate-400 font-medium">De Trayectoria</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">5 Sedes</span>
                        <span class="text-[11px] uppercase tracking-wider text-slate-400 font-medium">En el Sur del País</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. HISTORIA PRINCIPAL: LA FUERZA AUTOMOTRIZ DEL SUR -->
    <section class="w-full py-20 md:py-28 bg-white dark:bg-neutral-900 relative overflow-hidden">
        <!-- Elemento decorativo de fondo -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-50/70 dark:bg-neutral-800/20 -skew-x-12 translate-x-24 pointer-events-none hidden lg:block"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <!-- Columna de Texto -->
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Quiénes Somos</span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-light text-slate-900 dark:text-white tracking-normal font-heading leading-tight uppercase">
                        La fuerza automotriz del <span class="font-normal text-[#eb0a1e]">Sur</span>
                    </h2>

                    <div class="w-16 h-1 bg-[#eb0a1e] rounded-full"></div>

                    <div class="space-y-5 text-slate-600 dark:text-neutral-300 text-base sm:text-[17px] leading-relaxed font-normal">
                        <p>
                            Desde 1977, en el corazón de Encarnación, Consur ha sido sinónimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay, consolidando <strong class="text-slate-900 dark:text-white font-semibold">50 años de trayectoria</strong>.
                        </p>
                        <p>
                            Fundada por <strong class="text-slate-900 dark:text-white font-semibold">Don Carlos Szopa</strong>, un empresario visionario con profundas raíces en la comunidad, la empresa creció bajo su guía durante más de dos décadas, consolidando una cultura basada en la excelencia y la atención al cliente. Hoy, seguimos avanzando con la misma pasión que nos vio nacer. En Consur, nos dedicamos a importar, representar y comercializar vehículos que marcan la diferencia en cada camino y acompañan la vida de nuestros clientes con desempeño, seguridad y estilo.
                        </p>
                    </div>

                    <!-- Sello de Respaldo -->
                    <div class="pt-4 flex flex-wrap items-center gap-6">
                        <div class="flex items-center gap-3.5 bg-slate-50 dark:bg-neutral-800/80 px-5 py-3.5 rounded-2xl border border-slate-200/80 dark:border-neutral-700">
                            <div class="w-10 h-10 rounded-xl bg-[#eb0a1e]/10 text-[#eb0a1e] flex items-center justify-center text-lg">
                                <i class="fas fa-award"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-white">Concesionario Oficial</span>
                                <span class="block text-[11px] text-slate-500 dark:text-neutral-400">Calidad, garantía y posventa de excelencia</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna de Imagen Oficial (consursomos.jpg) -->
                <div class="lg:col-span-6" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative group">
                        <!-- Marco decorativo desplazado -->
                        <div class="absolute -inset-3 bg-gradient-to-tr from-[#eb0a1e]/20 via-slate-200/40 to-transparent rounded-3xl transform rotate-1 group-hover:rotate-0 transition-transform duration-500 pointer-events-none"></div>

                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200/80 dark:border-neutral-800 bg-slate-900">
                            <img src="/images/pages/la-empresa/consursomos.jpg"
                                 alt="Consur S.A. - La fuerza automotriz del Sur"
                                 class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">

                            <!-- Barra inferior superpuesta -->
                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/90 via-slate-950/50 to-transparent p-6 sm:p-8 flex items-end justify-between">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block">Legado y Visión</span>
                                    <span class="text-white text-sm sm:text-base font-bold font-heading">Encarnación &bull; Itapúa &bull; Misiones</span>
                                </div>
                                <span class="px-3.5 py-1.5 rounded-full bg-[#eb0a1e] text-white text-xs font-bold tracking-wider uppercase shadow-lg">
                                    50 Años
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. PILARES CORPORATIVOS (Nuestro Desafío, Filosofía, Crecimiento - Fondo 2K Ultra Nítido) -->
    <section class="relative w-full py-24 md:py-32 overflow-hidden text-white select-none">
        <!-- Capa de imagen de fondo ultra nítida de alta resolución -->
        <div class="absolute inset-0 z-0">
            <picture class="w-full h-full block">
                <source srcset="/images/pages/la-empresa/consurobligado.webp" type="image/webp">
                <img src="/images/pages/la-empresa/consurobligado.jpg"
                     alt="Consur S.A. Sucursal Obligado"
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover object-center transform scale-[1.02] transition-transform duration-1000">
            </picture>
            <!-- Overlay oscuro de máxima definición y contraste (sin el backdrop-blur de 2px que generaba ruido visual) -->
            <div class="absolute inset-0 bg-slate-950/90"></div>
            <!-- Brillo ambiental rojo Toyota -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#eb0a1e]/15 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Encabezado de sección -->
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block mb-3">
                    ADN Corporativo Consur
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white uppercase tracking-normal font-heading">
                    Nuestros Pilares <span class="font-normal text-[#eb0a1e]">Fundamentales</span>
                </h2>
                <div class="w-16 h-1 bg-[#eb0a1e] mx-auto mt-5 rounded-full"></div>
            </div>

            <!-- Grilla Horizontal de 3 Pilares -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Pilar 1: Nuestro Desafío -->
                <div class="group relative bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-[#eb0a1e]/60 transition-all duration-300 flex flex-col justify-between shadow-2xl"
                     data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-[#eb0a1e] text-white flex items-center justify-center text-2xl shadow-lg shadow-red-600/30 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-key"></i>
                            </div>
                            <span class="text-4xl font-light text-white/20 group-hover:text-[#eb0a1e]/40 transition-colors font-heading select-none">01</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-white uppercase tracking-wide font-heading mb-4 group-hover:text-[#eb0a1e] transition-colors">
                            Nuestro Desafío
                        </h3>

                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                            Representar y distribuir en forma exclusiva para el departamento de Itapúa, los productos de una de las mayores empresas fabricantes de automóviles del mundo: <strong class="text-white font-semibold">TOYOTA</strong>.
                        </p>
                    </div>

                    <div class="mt-8 pt-4 border-t border-white/10 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#eb0a1e]">
                        <span>Representación Exclusiva</span>
                        <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>

                <!-- Pilar 2: Filosofía -->
                <div class="group relative bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-[#eb0a1e]/60 transition-all duration-300 flex flex-col justify-between shadow-2xl"
                     data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-[#eb0a1e] text-white flex items-center justify-center text-2xl shadow-lg shadow-red-600/30 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-gears"></i>
                            </div>
                            <span class="text-4xl font-light text-white/20 group-hover:text-[#eb0a1e]/40 transition-colors font-heading select-none">02</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-white uppercase tracking-wide font-heading mb-4 group-hover:text-[#eb0a1e] transition-colors">
                            Filosofía
                        </h3>

                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                            Nos inspira transitar como empresa incorporando la filosofía <strong class="text-white font-semibold">“Kaizen”</strong>; concepto basado en la mejora continua con el aporte fundamental de cada uno de los miembros del equipo.
                        </p>
                    </div>

                    <div class="mt-8 pt-4 border-t border-white/10 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#eb0a1e]">
                        <span>Mejora Continua Kaizen</span>
                        <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>

                <!-- Pilar 3: Crecimiento -->
                <div class="group relative bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-[#eb0a1e]/60 transition-all duration-300 flex flex-col justify-between shadow-2xl"
                     data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-[#eb0a1e] text-white flex items-center justify-center text-2xl shadow-lg shadow-red-600/30 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <span class="text-4xl font-light text-white/20 group-hover:text-[#eb0a1e]/40 transition-colors font-heading select-none">03</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-white uppercase tracking-wide font-heading mb-4 group-hover:text-[#eb0a1e] transition-colors">
                            Crecimiento
                        </h3>

                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                            A medida que fuimos creciendo en infraestructura, habilitamos otras sucursales en el interior del país, y otras alternativas de productos y servicios.
                        </p>
                    </div>

                    <div class="mt-8 pt-4 border-t border-white/10 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#eb0a1e]">
                        <span>Expansión Regional</span>
                        <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. NUESTRAS SUCURSALES E INFRAESTRUCTURA (Las 5 Sedes Oficiales de consur.com.py/la-empresa/) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 dark:bg-neutral-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6" data-aos="fade-up">
                <div>
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em] mb-2">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Presencia Regional</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-light text-slate-900 dark:text-white uppercase tracking-normal font-heading">
                        Nuestras <span class="font-normal text-[#eb0a1e]">Sucursales</span>
                    </h2>
                </div>
                <p class="text-slate-500 dark:text-neutral-400 text-sm sm:text-base max-w-md">
                    Infraestructura moderna, showrooms oficiales y talleres autorizados estratégicamente ubicados en Itapúa y Misiones.
                </p>
            </div>

            <!-- Casa Central Destacada (Full-Width Card) -->
            <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
                <div @click="lightboxSrc = '/images/pages/la-empresa/consurcentral.jpg'; lightboxTitle = 'CASA CENTRAL: Av. Bernardino Caballero 749 – Encarnación Paraguay'; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-xl border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[320px] sm:h-[420px] md:h-[480px]">
                    <img src="/images/pages/la-empresa/consurcentral.jpg"
                         alt="CASA CENTRAL: Av. Bernardino Caballero 749 – Encarnación Paraguay"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/35 to-transparent"></div>

                    <div class="absolute top-6 left-6">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest shadow-lg">
                            <i class="fas fa-building"></i> Sede Principal
                        </span>
                    </div>

                    <div class="absolute top-6 right-6 w-11 h-11 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-sm"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-10 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Encarnación &bull; Paraguay</span>
                            <h3 class="text-2xl sm:text-3xl font-semibold text-white font-heading uppercase tracking-wide">
                                Casa Central
                            </h3>
                            <p class="text-slate-200 text-sm sm:text-base mt-1 flex items-center gap-2">
                                <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                                <span>Av. Bernardino Caballero 749 – Encarnación Paraguay</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grilla de 4 Sucursales del Interior -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Sucursal 1: María Auxiliadora -->
                <div data-aos="fade-up" data-aos-delay="150"
                     @click="lightboxSrc = '/images/pages/la-empresa/consurmaux.jpg'; lightboxTitle = 'Ma. Auxiliadora: Ruta VI km. 119'; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consurmaux.jpg"
                         alt="Ma. Auxiliadora: Ruta VI km. 119"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal Itapúa</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            Ma. Auxiliadora
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Ruta VI km. 119</span>
                        </p>
                    </div>
                </div>

                <!-- Sucursal 2: Obligado -->
                <div data-aos="fade-up" data-aos-delay="200"
                     @click="lightboxSrc = '/images/pages/la-empresa/consurobligado.jpg'; lightboxTitle = 'Obligado: Av. Gaspar R. de Francia y Mcal. López'; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consurobligado.jpg"
                         alt="Obligado: Av. Gaspar R. de Francia y Mcal. López"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal Colonias Unidas</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            Obligado
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Av. Gaspar R. de Francia y Mcal. López</span>
                        </p>
                    </div>
                </div>

                <!-- Sucursal 3: San Ignacio -->
                <div data-aos="fade-up" data-aos-delay="250"
                     @click="lightboxSrc = '/images/pages/la-empresa/consursanignacio.jpg'; lightboxTitle = 'San Ignacio: Ruta 1 Mcal. Estigarribia, km 224'; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consursanignacio.jpg"
                         alt="San Ignacio: Ruta 1 Mcal. Estigarribia, km 224"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal Misiones</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            San Ignacio
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Ruta 1 Mcal. Estigarribia, km 224</span>
                        </p>
                    </div>
                </div>

                <!-- Sucursal 4: San Pedro del Paraná -->
                <div data-aos="fade-up" data-aos-delay="300"
                     @click="lightboxSrc = '/images/pages/la-empresa/consursanpedro.jpg'; lightboxTitle = 'San Pedro del Paraná: Gregorio Cabrera González entre Capitán Leguizamón y Tebicuary'; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consursanpedro.jpg"
                         alt="San Pedro del Paraná: Gregorio Cabrera González entre Capitán Leguizamón y Tebicuary"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal Itapúa</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            San Pedro del Paraná
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Gregorio Cabrera González entre Capitán Leguizamón y Tebicuary</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- LIGHTBOX MODAL PARA VER IMÁGENES DE SUCURSALES EN PANTALLA COMPLETA -->
    <div x-show="lightboxOpen"
         x-cloak
         x-transition.opacity.duration.250ms
         @keydown.escape.window="lightboxOpen = false"
         @click="lightboxOpen = false"
         class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-4">
        <div @click.stop class="relative max-w-5xl w-full rounded-2xl overflow-hidden bg-neutral-950 border border-white/15 shadow-2xl">
            <button @click="lightboxOpen = false"
                    class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-black/70 hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                <i class="fas fa-times"></i>
            </button>
            <img :src="lightboxSrc" :alt="lightboxTitle" class="w-full max-h-[80vh] object-contain bg-black">
            <div class="p-4 sm:p-5 bg-neutral-900 border-t border-white/10 text-center">
                <p class="text-white font-bold text-sm sm:text-base font-heading" x-text="lightboxTitle"></p>
            </div>
        </div>
    </div>

</div>
HTML;

        Page::updateOrCreate(
            ['slug' => 'la-empresa'],
            [
                'title' => 'La Empresa – Consur S.A.',
                'subtitle' => 'Desde 1977, en el corazón de Encarnación, Consur ha sido sinónimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay, consolidando 50 años de trayectoria.',
                'banner_image' => '/images/pages/la-empresa/consurcentral.jpg',
                'content' => $html,
                'meta_title' => 'La Empresa | Consur S.A. – 50 Años de Trayectoria',
                'meta_description' => 'Desde 1977, en el corazón de Encarnación, Consur ha sido sinónimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay, consolidando 50 años de trayectoria.',
                'is_published' => true,
                'sort_order' => 1,
            ]
        );
    }
}

