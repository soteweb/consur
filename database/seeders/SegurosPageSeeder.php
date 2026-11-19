<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Page;
use Illuminate\Database\Seeder;

class SegurosPageSeeder extends Seeder
{
    public function run(): void
    {
        // Sincronizar marca "Consur Broker de Seguros" (migrar consur-seguros -> seguros y apuntar a /seguros)
        $legacyBrand = Brand::where('slug', 'consur-seguros')->first();
        $segurosBrand = Brand::where('slug', 'seguros')->first();

        if ($legacyBrand && $segurosBrand && $legacyBrand->id !== $segurosBrand->id) {
            $legacyBrand->delete();
            $segurosBrand->update([
                'custom_url' => '/seguros',
                'is_active' => true,
                'is_featured_menu' => true,
            ]);
        } elseif ($legacyBrand) {
            $legacyBrand->update([
                'slug' => 'seguros',
                'custom_url' => '/seguros',
                'is_active' => true,
                'is_featured_menu' => true,
            ]);
        } elseif ($segurosBrand) {
            $segurosBrand->update([
                'custom_url' => '/seguros',
                'is_active' => true,
                'is_featured_menu' => true,
            ]);
        }

        $html = <<<'HTML'
<div data-cms-layout="fullwidth" class="w-full">

    <!-- 1. HERO CARRUSEL PRINCIPAL (Mismo Carrusel de la Home con las imágenes oficiales de consur.com.py/seguros) -->
    <section class="toyota-hero-slider relative bg-slate-950 text-white w-full flex items-center select-none"
             x-data="{
                activeSlide: 0,
                totalSlides: 2,
                timer: null,
                init() {
                    this.start();
                },
                start() {
                    this.stop();
                    this.timer = setInterval(() => { this.next(); }, 6500);
                },
                stop() {
                    if (this.timer) {
                        clearInterval(this.timer);
                        this.timer = null;
                    }
                },
                next() { this.activeSlide = (this.activeSlide + 1) % this.totalSlides; },
                prev() { this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides; }
             }"
             @mouseenter="stop()"
             @mouseleave="start()">

        <!-- SLIDE 1: Promo Río de Janeiro (promoRIO_consur.jpeg) -->
        <div x-show="activeSlide === 0"
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute inset-0 w-full h-full">
            <img src="/images/pages/seguros-promo-rio.jpeg"
                 alt="Renová o adquirí tu póliza y participá por un viaje a Río de Janeiro - Consur Broker de Seguros"
                 class="w-full h-full object-cover object-center">

            <!-- Sutil viñeta inferior para destacar controles y botón -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-transparent to-transparent"></div>

            <!-- Botón Contáctenos (Ubicado como en consur.com.py/seguros) -->
            <div class="absolute inset-0 flex items-end pb-14 sm:pb-16 md:items-center md:pb-0 pointer-events-none">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex justify-end">
                    <div class="pointer-events-auto md:mt-48">
                        <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker%20de%20Seguros,%20quiero%20renovar%20o%20adquirir%20mi%20p%C3%B3liza%20y%20participar%20por%20el%20viaje%20a%20R%C3%ADo%20de%20Janeiro."
                           target="_blank" rel="noopener"
                           class="bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs sm:text-sm uppercase tracking-widest px-7 py-3.5 transition-all duration-300 shadow-xl shadow-black/40 flex items-center gap-2.5 border border-white/20">
                            <span>Contáctenos</span>
                            <i class="fas fa-arrow-circle-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDE 2: Consur Broker de Seguros (sliderbrocker.jpg) -->
        <div x-show="activeSlide === 1"
             x-cloak
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute inset-0 w-full h-full">
            <img src="/images/pages/seguros-slider.jpg"
                 alt="Consur Broker de Seguros - Evolucionar es parte del camino"
                 class="w-full h-full object-cover object-center">

            <!-- Texto superior e inferior respetando el logo central del banner original -->
            <div class="absolute inset-0 flex flex-col items-center justify-between py-12 sm:py-16 md:py-20 px-4 text-center pointer-events-none">
                <div class="pt-2 sm:pt-4">
                    <span class="inline-block text-white text-sm sm:text-xl md:text-2xl font-bold uppercase tracking-[0.25em] drop-shadow-md font-heading">
                        EVOLUCIONAR ES PARTE DEL CAMINO
                    </span>
                </div>

                <div class="pb-4 sm:pb-6 pointer-events-auto">
                    <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker%20de%20Seguros,%20quisiera%20solicitar%20asesoramiento%20sobre%20p%C3%B3lizas."
                       target="_blank" rel="noopener"
                       class="bg-neutral-950/90 hover:bg-black text-white font-bold text-xs sm:text-sm uppercase tracking-widest px-8 py-3.5 transition-all duration-300 shadow-xl flex items-center gap-2.5 border border-white/20">
                        <span>Contáctenos</span>
                        <i class="fas fa-arrow-circle-right text-sm text-red-500"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Flecha Anterior -->
        <button @click="prev()" class="hidden sm:flex absolute left-3 md:left-6 top-1/2 -translate-y-1/2 z-20 w-9 h-9 md:w-11 md:h-11 rounded-full bg-black/50 hover:bg-red-600 text-white items-center justify-center transition backdrop-blur-sm border border-white/10 shadow-lg cursor-pointer" aria-label="Anterior">
            <i class="fas fa-chevron-left text-xs md:text-sm"></i>
        </button>

        <!-- Indicadores Puntos -->
        <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-2">
            <button @click="activeSlide = 0"
                    class="h-1.5 sm:h-2 rounded-full transition-all duration-300 cursor-pointer"
                    :class="activeSlide === 0 ? 'w-6 sm:w-8 bg-red-600' : 'w-2 bg-white/50 hover:bg-white/80'"
                    aria-label="Slide 1"></button>
            <button @click="activeSlide = 1"
                    class="h-1.5 sm:h-2 rounded-full transition-all duration-300 cursor-pointer"
                    :class="activeSlide === 1 ? 'w-6 sm:w-8 bg-red-600' : 'w-2 bg-white/50 hover:bg-white/80'"
                    aria-label="Slide 2"></button>
        </div>

        <!-- Flecha Siguiente -->
        <button @click="next()" class="hidden sm:flex absolute right-3 md:right-6 top-1/2 -translate-y-1/2 z-20 w-9 h-9 md:w-11 md:h-11 rounded-full bg-black/50 hover:bg-red-600 text-white items-center justify-center transition backdrop-blur-sm border border-white/10 shadow-lg cursor-pointer" aria-label="Siguiente">
            <i class="fas fa-chevron-right text-xs md:text-sm"></i>
        </button>
    </section>

    <!-- 2. SECCIÓN INSTITUCIONAL DE ANCHO COMPLETO (Sin cuadros cerrados, limpia y adaptable) -->
    <section class="w-full py-20 md:py-28 bg-white dark:bg-black border-b border-slate-200/80 dark:border-neutral-900 overflow-hidden transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Columna Izquierda: Presentación Editorial con Animaciones Escalonadas -->
                <div class="lg:col-span-7 space-y-6">
                    <div data-aos="fade-right" data-aos-delay="50"
                         class="inline-flex items-center gap-3 text-red-600 dark:text-red-500 text-xs font-bold uppercase tracking-[0.25em]">
                        <span class="w-10 h-[2px] bg-red-600"></span>
                        <span>Respaldo Oficial Grupo Consur</span>
                    </div>

                    <h1 data-aos="fade-right" data-aos-delay="100"
                        class="text-3xl sm:text-4xl md:text-5xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide leading-tight">
                        Consur <span class="font-bold text-red-600">Broker de Seguros</span>
                    </h1>

                    <p data-aos="fade-right" data-aos-delay="150"
                       class="text-lg sm:text-xl font-medium text-slate-800 dark:text-neutral-200 tracking-wide border-l-4 border-red-600 pl-4">
                        Para proteger su esfuerzo y sus sueños.
                    </p>

                    <p data-aos="fade-right" data-aos-delay="200"
                       class="text-slate-600 dark:text-neutral-300 text-sm sm:text-base leading-relaxed font-normal max-w-2xl">
                        Nuestra labor como corredora de seguros se enfoca en proteger a las familias y empresas, a través de un servicio personalizado, profesional y confiable. Nos aliamos con las principales aseguradoras del país para brindar una cobertura completa en pólizas personales, patrimoniales y empresariales.
                    </p>

                    <div data-aos="fade-up" data-aos-delay="250"
                         class="pt-4 flex flex-wrap items-center gap-4">
                        <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker%20de%20Seguros,%20quisiera%20solicitar%20asesoramiento%20sobre%20p%C3%B3lizas."
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-3 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-colors duration-200 shadow-lg shadow-red-600/20">
                            <i class="fab fa-whatsapp text-base"></i>
                            <span>Solicitar Asesoría Ahora</span>
                        </a>
                        <a href="#coberturas"
                           class="inline-flex items-center gap-2.5 bg-transparent hover:bg-slate-100 dark:hover:bg-neutral-900 text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest px-7 py-4 transition-colors duration-200 border border-slate-300 dark:border-neutral-700">
                            <span>Ver Ramas de Cobertura</span>
                            <i class="fas fa-arrow-down text-[10px] text-red-600"></i>
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Pilares Arquitectónicos Minimalistas con Entrada Escalonada -->
                <div class="lg:col-span-5">
                    <div class="divide-y divide-slate-200 dark:divide-neutral-800 border-y border-slate-200 dark:border-neutral-800">
                        <div data-aos="fade-left" data-aos-delay="100"
                             class="py-6 flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-red-600 text-white flex items-center justify-center shrink-0 mt-0.5 shadow-md shadow-red-600/20">
                                <i class="fas fa-user-shield text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold uppercase tracking-wider text-slate-900 dark:text-white font-heading">
                                    Asesoramiento Personalizado
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-neutral-400 mt-1 leading-relaxed">
                                    Analizamos cada riesgo de forma individual para ofrecerte la póliza exacta con la mejor relación costo-cobertura del mercado.
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-left" data-aos-delay="200"
                             class="py-6 flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-slate-900 dark:bg-neutral-900 text-red-500 border border-slate-800 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-bolt text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold uppercase tracking-wider text-slate-900 dark:text-white font-heading">
                                    Gestión Ágil de Siniestros
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-neutral-400 mt-1 leading-relaxed">
                                    Acompañamiento directo ante cualquier eventualidad, agilizando trámites y talleres oficiales con el respaldo integral de Consur S.A.
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-left" data-aos-delay="300"
                             class="py-6 flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-slate-900 dark:bg-neutral-900 text-red-500 border border-slate-800 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-handshake text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold uppercase tracking-wider text-slate-900 dark:text-white font-heading">
                                    Alianzas con Aseguradoras Líderes
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-neutral-400 mt-1 leading-relaxed">
                                    Trabajamos con las compañías de mayor solvencia patrimonial del Paraguay para garantizar tu tranquilidad y la de tu familia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. PROTECCIÓN INTEGRAL: BANNER FULL-SCREEN CON IMAGEN DE FONDO PARALLAX Y 4 ÍTEMS EN POSICIÓN HORIZONTAL -->
    <section id="coberturas" class="relative w-full py-24 md:py-32 bg-slate-950 text-white overflow-hidden">
        <!-- Imagen de Fondo Oficial con Efecto Parallax -->
        <div class="absolute inset-0 bg-cover bg-center bg-fixed"
             style="background-image: url('/images/pages/seguros-bg.png')"></div>
        <!-- Overlay Oscuro Gradual para Contraste de Alta Gama -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950/95"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-16">
            
            <!-- Encabezado Centrado -->
            <div class="text-center max-w-3xl mx-auto space-y-4" data-aos="fade-up">
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 bg-red-600/20 border border-red-500/40 text-red-400 text-xs font-bold uppercase tracking-[0.25em]">
                    <span>Protección Integral</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white font-heading uppercase tracking-wide leading-tight">
                    Coberturas en Pólizas <span class="font-bold text-red-500">Personales y Empresariales</span>
                </h2>
                <div class="w-16 h-[2px] bg-red-600 mx-auto"></div>
                <p class="text-sm sm:text-base text-slate-300 font-light leading-relaxed">
                    Diseñamos y gestionamos planes integrales que aseguran la continuidad de tus proyectos, tu patrimonio y el bienestar de quienes más valorás.
                </p>
            </div>

            <!-- 4 Ítems en Posición Horizontal ocupando todo el ancho del contenedor (Wrapper AOS separado del hover transform) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 items-stretch">
                
                <!-- Ítem 1: Hogar -->
                <div data-aos="fade-up" data-aos-delay="100" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-house-chimney text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    01
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                Hogar
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                Pólizas adaptadas a las necesidades de tu hogar para proteger la estructura y el equipamiento familiar.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Incendio de edificio y contenido</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Robo y daños por tentativa</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Cristales y electrodomésticos</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20de%20Hogar."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar Hogar</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ítem 2: Automóviles -->
                <div data-aos="fade-up" data-aos-delay="200" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-car-side text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    02
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                Automóviles
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                Respaldo total para tu vehículo 0 Km, usado o flota comercial con asistencia permanente en ruta.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Seguro contra todo riesgo</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Responsabilidad Civil hacia terceros</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Asistencia de Grúa las 24 hs</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Cobertura nacional y MERCOSUR</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20de%20Autom%C3%B3vil."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar Automóvil</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ítem 3: Comercio -->
                <div data-aos="fade-up" data-aos-delay="300" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-building-shield text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    03
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                Comercio
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                Protección integral para instalaciones empresariales, mercaderías, maquinarias y producción agrícola.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Incendio y riesgos aliados</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Multirriesgo comercial e industrial</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Seguro Agrícola y patrimonial</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20para%20Comercio%20/%20Empresa."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar Comercio</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ítem 4: Vida -->
                <div data-aos="fade-up" data-aos-delay="400" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-heart-pulse text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    04
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                Vida
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                Tranquilidad y previsión financiera para proteger el futuro de tu familia y tu equipo de trabajo.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Seguro de vida individual</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Accidentes Personales (individual y conjunta)</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Respaldo e indemnización familiar</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20de%20Vida."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar Vida</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. CARRUSEL DE ASEGURADORAS ALIADAS (Ancho Completo, Logos con el Mismo Alto Exacto) -->
    <section class="w-full py-20 md:py-24 bg-white dark:bg-black border-b border-slate-200/80 dark:border-neutral-900 overflow-hidden select-none transition-colors duration-200"
             x-data="{
                currentSlide: 0,
                totalItems: 6,
                itemsPerPage: 4,
                timer: null,
                touchStartX: 0,
                touchEndX: 0,
                get maxIndex() {
                    return Math.max(0, this.totalItems - this.itemsPerPage);
                },
                updateItemsPerPage() {
                    if (window.innerWidth < 640) {
                        this.itemsPerPage = 1;
                    } else if (window.innerWidth < 1024) {
                        this.itemsPerPage = 2;
                    } else if (window.innerWidth < 1280) {
                        this.itemsPerPage = 3;
                    } else {
                        this.itemsPerPage = 4;
                    }
                    if (this.currentSlide > this.maxIndex) {
                        this.currentSlide = this.maxIndex;
                    }
                },
                next() {
                    this.currentSlide = this.currentSlide >= this.maxIndex ? 0 : this.currentSlide + 1;
                },
                prev() {
                    this.currentSlide = this.currentSlide <= 0 ? this.maxIndex : this.currentSlide - 1;
                },
                startAuto() {
                    this.stopAuto();
                    this.timer = setInterval(() => this.next(), 3200);
                },
                stopAuto() {
                    if (this.timer) {
                        clearInterval(this.timer);
                        this.timer = null;
                    }
                },
                handleTouchStart(e) {
                    this.touchStartX = e.changedTouches[0].screenX;
                },
                handleTouchEnd(e) {
                    this.touchEndX = e.changedTouches[0].screenX;
                    if (this.touchStartX - this.touchEndX > 50) this.next();
                    if (this.touchEndX - this.touchStartX > 50) this.prev();
                }
             }"
             x-init="updateItemsPerPage(); startAuto()"
             @resize.window.debounce.100ms="updateItemsPerPage()"
             @mouseenter="stopAuto()"
             @mouseleave="startAuto()"
             @touchstart.passive="handleTouchStart($event); stopAuto()"
             @touchend.passive="handleTouchEnd($event); startAuto()">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Encabezado y Controles -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 pb-6 border-b border-slate-200 dark:border-neutral-800">
                <div data-aos="fade-right">
                    <div class="inline-flex items-center gap-2.5 text-red-600 dark:text-red-500 text-xs font-bold uppercase tracking-[0.25em] mb-2">
                        <span class="w-8 h-[2px] bg-red-600"></span>
                        <span>Compañías Oficiales</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                        Trabajamos con las siguientes <span class="font-bold">aseguradoras</span>
                    </h2>
                </div>

                <!-- Botones Prev / Next -->
                <div data-aos="fade-left" class="flex items-center gap-2 self-start sm:self-auto">
                    <button type="button"
                            @click="prev()"
                            class="w-11 h-11 border border-slate-200 dark:border-neutral-800 bg-white dark:bg-[#0d0d0d] hover:bg-red-600 hover:border-red-600 hover:text-white text-slate-700 dark:text-neutral-300 flex items-center justify-center transition-colors duration-200 cursor-pointer"
                            aria-label="Anterior">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>
                    <button type="button"
                            @click="next()"
                            class="w-11 h-11 border border-slate-200 dark:border-neutral-800 bg-white dark:bg-[#0d0d0d] hover:bg-red-600 hover:border-red-600 hover:text-white text-slate-700 dark:text-neutral-300 flex items-center justify-center transition-colors duration-200 cursor-pointer"
                            aria-label="Siguiente">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>

            <!-- Pista del Carrusel: Todos los logos tienen exactamente el mismo alto (h-10 / 40px) -->
            <div data-aos="fade-up" data-aos-delay="150" class="overflow-hidden relative py-4">
                <div class="flex items-center transition-transform duration-500 ease-out"
                     :style="`transform: translateX(-${currentSlide * (100 / itemsPerPage)}%);`">

                    <!-- 1. La Consolidada -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-consolidada.png"
                                 alt="La Consolidada de Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 2. Sudameris Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-sudameris.png"
                                 alt="Sudameris Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 3. Aseguradora del Este -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-deleste.png"
                                 alt="Aseguradora del Este"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 4. Mapfre Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-mapfre.png"
                                 alt="Mapfre Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 5. Royal Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-royal.png"
                                 alt="Royal Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 6. La Rural Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-aseguradora-5.png"
                                 alt="La Rural Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Indicador de Paginación Lineal -->
            <div data-aos="fade-up" data-aos-delay="250" class="flex items-center justify-center gap-2">
                <template x-for="i in (maxIndex + 1)" :key="i">
                    <button type="button"
                            @click="currentSlide = i - 1"
                            class="h-1 transition-all duration-300 cursor-pointer"
                            :class="currentSlide === (i - 1) ? 'w-10 bg-red-600' : 'w-3 bg-slate-200 dark:bg-neutral-800 hover:bg-slate-400'"></button>
                </template>
            </div>

        </div>
    </section>

    <!-- 5. REDES SOCIALES Y CONTACTO DIRECTO DE ANCHO COMPLETO -->
    <section class="w-full py-20 md:py-24 bg-[#08090c] text-white relative overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-[2px] bg-gradient-to-r from-transparent via-red-600 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
            <div data-aos="fade-up" class="space-y-3 max-w-2xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-red-500 block">
                    Atención Directa & Comunidad
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-light font-heading uppercase tracking-wide">
                    Seguí las Redes Sociales de <span class="font-bold text-white">Consur Broker de Seguros</span>
                </h2>
                <p class="text-xs sm:text-sm text-neutral-400 font-light leading-relaxed">
                    Conectate con nuestro equipo para recibir novedades, promociones vigentes y asistencia inmediata en tus pólizas.
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <div data-aos="fade-up" data-aos-delay="100">
                    <a href="https://www.facebook.com/share/12KrjKDoXnH/?mibextid=wwXIfr"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all duration-200 shadow-lg shadow-red-600/25 min-w-[200px]">
                        <i class="fab fa-facebook-f text-sm"></i>
                        <span>Facebook</span>
                    </a>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <a href="https://www.instagram.com/consurbroker?igsh=ZmdoemNmbTdsc29s"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all duration-200 shadow-lg shadow-red-600/25 min-w-[200px]">
                        <i class="fab fa-instagram text-base"></i>
                        <span>Instagram</span>
                    </a>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <a href="https://wa.me/595984222297"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all duration-200 shadow-lg shadow-emerald-600/25 min-w-[200px]">
                        <i class="fab fa-whatsapp text-base"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
HTML;

        Page::updateOrCreate(
            ['slug' => 'seguros'],
            [
                'title' => 'Consur Broker de Seguros',
                'subtitle' => 'Para proteger su esfuerzo y sus sueños. Servicio personalizado, profesional y confiable junto a las principales aseguradoras del país.',
                'banner_image' => '/images/pages/seguros-slider.jpg',
                'content' => $html,
                'meta_title' => 'Consur Broker de Seguros | Pólizas Personales y Empresariales',
                'meta_description' => 'Consur Broker de Seguros en Paraguay. Coberturas de Hogar, Automóviles, Comercio y Vida con las principales aseguradoras del país.',
                'is_published' => true,
                'sort_order' => 5,
            ]
        );
    }
}
