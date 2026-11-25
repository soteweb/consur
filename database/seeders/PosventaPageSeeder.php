<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PosventaPageSeeder extends Seeder
{
    public function run(): void
    {
        $html = <<<'HTML'
<div data-cms-layout="fullwidth" class="w-full bg-white text-slate-900">

    <!-- 1. HERO INSTITUCIONAL FULL-WIDTH CON EFECTO PARALLAX (Estilo /hino y /seguros) -->
    <section class="relative w-full min-h-[460px] md:min-h-[540px] flex items-center bg-fixed bg-cover bg-center overflow-hidden select-none"
             style="background-image: url('/images/pages/posventa-hero.jpg');">
        <!-- Degradados cinematográficos de alto contraste -->
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/95 via-neutral-950/80 to-neutral-950/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-neutral-950/40"></div>

        <!-- Brillo ambiental rojo Toyota -->
        <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-[#eb0a1e]/15 blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl" data-aos="fade-right">
                <!-- Badge arquitectónico sin bordes redondeados -->
                <div class="inline-flex items-center gap-3 mb-6 bg-white/10 backdrop-blur-md px-4 py-2 border-l-2 border-[#eb0a1e]">
                    <span class="w-2 h-2 bg-[#eb0a1e] animate-pulse"></span>
                    <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-white">
                        Servicio Técnico Oficial &bull; CONSUR S.A.
                    </span>
                </div>

                <!-- Título con Tipografía Toyota (Raleway Light) -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-light text-white uppercase tracking-normal font-heading leading-[1.06]">
                    Posventa
                </h1>

                <p class="mt-4 text-base sm:text-lg md:text-xl text-slate-300 font-light max-w-2xl leading-relaxed">
                    Mantené tu vehículo en condiciones óptimas con el respaldo oficial de fábrica, técnicos certificados internacionalmente y repuestos 100% legítimos.
                </p>

                <!-- Botones de Acción Arquitectónicos (Sin bordes redondeados tipo píldora) -->
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="http://www.turnos365.com/turnos.aspx?con=131"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-3 px-8 py-4 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-red-600/30">
                        <i class="far fa-calendar-check text-sm"></i>
                        <span>Agendá tu Turno Online</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                    <a href="https://wa.me/595985204106?text=Hola%20Consur%2C%20quisiera%20consultar%20sobre%20el%20Servicio%20T%C3%A9cnico%20y%20Repuestos%20Toyota."
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2.5 px-7 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-xs font-bold uppercase tracking-widest backdrop-blur-sm transition-all">
                        <i class="fab fa-whatsapp text-emerald-400 text-sm"></i>
                        <span>Consultar a Posventa</span>
                    </a>
                </div>

                <!-- 4 Indicadores Clave en Grilla Lineal -->
                <div class="mt-12 pt-8 border-t border-white/15 grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-2xl">
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">21</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Puntos Clave Inspección</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-normal text-[#eb0a1e] font-heading tracking-normal">4</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Talleres Autorizados</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">100%</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Repuestos Genuinos</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-normal text-[#eb0a1e] font-heading tracking-normal">Kaizen</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Mejora Continua</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. INTRODUCCIÓN EDITORIAL: EXCELENCIA OPERATIVA & RESPALDO OFICIAL (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <!-- Columna Izquierda: Información Editorial -->
                <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-3 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.25em]">
                        <span class="w-10 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Con Garantía de Confianza</span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-slate-900 tracking-normal font-heading leading-tight uppercase">
                        <span class="font-normal text-[#eb0a1e]">Mantené</span> tu vehículo como nuevo
                    </h2>

                    <p class="text-lg sm:text-xl font-medium text-slate-800 tracking-wide border-l-4 border-[#eb0a1e] pl-4">
                        A partir del momento en que adquirís tu vehículo empieza una relación de acompañamiento permanente.
                    </p>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-light">
                        En <strong class="text-slate-900 font-medium">CONSUR S.A.</strong> cuidamos tu vehículo con los mismos estándares de fábrica con los que fue diseñado. Contamos con tecnología de diagnóstico computarizado oficial para todas nuestras marcas representadas, técnicos especializados con certificación internacional y un amplio stock de repuestos legítimos que garantizan tu seguridad y la vida útil de cada componente.
                    </p>

                    <!-- 3 Pilares Arquitectónicos en Fila Minimalista -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-px bg-slate-200 border border-slate-200 shadow-xs pt-0">
                        <div class="bg-white p-5 space-y-2">
                            <div class="w-10 h-10 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-base">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Técnicos Certificados</span>
                            <span class="block text-[11px] text-slate-500 font-light leading-snug">Capacitación continua bajo estándares de fábrica</span>
                        </div>

                        <div class="bg-white p-5 space-y-2">
                            <div class="w-10 h-10 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-base">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Repuestos Genuinos</span>
                            <span class="block text-[11px] text-slate-500 font-light leading-snug">Piezas originales con garantía oficial de fábrica</span>
                        </div>

                        <div class="bg-white p-5 space-y-2">
                            <div class="w-10 h-10 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-base">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Preventivo Oficial</span>
                            <span class="block text-[11px] text-slate-500 font-light leading-snug">Mantenimientos programados que cuidan tu inversión</span>
                        </div>
                    </div>

                    <!-- Enlaces Rápidos de Acción -->
                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="http://www.turnos365.com/turnos.aspx?con=131"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition shadow-md shadow-red-600/20">
                            <i class="far fa-calendar-check text-xs"></i>
                            <span>Agendá tu Turno Online</span>
                        </a>
                        <a href="#servicios-especializados"
                           class="inline-flex items-center gap-2 px-7 py-3.5 bg-transparent hover:bg-slate-100 text-slate-900 border border-slate-300 text-xs font-bold uppercase tracking-widest transition">
                            <span>Ver Servicios Especializados</span>
                            <i class="fas fa-arrow-down text-[10px] text-[#eb0a1e]"></i>
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Imagen Oficial de Instalaciones sin Bordes Redondeados -->
                <div class="lg:col-span-5" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative overflow-hidden shadow-2xl border border-slate-200 group">
                        <img src="/images/toyota/frontservicios.png"
                             alt="Instalaciones de Taller y Servicios Oficiales CONSUR Toyota"
                             class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/95 via-slate-950/60 to-transparent p-6 border-t border-white/10">
                            <span class="text-xs font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Excelencia Operativa
                            </span>
                            <span class="text-white text-sm font-semibold font-heading uppercase tracking-wide block mt-0.5">
                                Instalaciones de Taller y Mantenimiento Oficial en CONSUR
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. SERVICIOS ESPECIALIZADOS: BOX EXPRÉS, VEHÍCULO DE CORTESÍA Y TALLER MÓVIL (FULL-WIDTH GRIS CLARO) -->
    <section id="servicios-especializados" class="w-full py-20 md:py-28 bg-slate-50 border-y border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado Centrado -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block">
                    Soluciones a Tu Medida
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-slate-900 font-heading uppercase tracking-normal">
                    Servicios Posventa <span class="font-normal text-[#eb0a1e]">Especializados</span>
                </h2>
                <div class="w-16 h-1 bg-[#eb0a1e] mx-auto mt-4"></div>
                <p class="text-sm sm:text-base text-slate-500 font-light max-w-3xl mx-auto pt-1">
                    Atención inmediata sin esperas, movilidad garantizada mientras cuidamos de tu unidad y soporte técnico integral con respaldo oficial para toda la línea de vehículos <strong class="text-slate-800 font-semibold">Toyota</strong>.
                </p>
            </div>

            <!-- Grilla de 3 Tarjetas Arquitectónicas (Bordes Rectos, Línea Superior de Hover, Sombra Fina) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- 1. Box Exprés -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative"
                     data-aos="fade-up" data-aos-delay="0">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>

                    <div>
                        <div class="aspect-[16/10] overflow-hidden bg-slate-100 border-b border-slate-100">
                            <img src="/images/pages/posventa-boxexpress.jpg"
                                 alt="Box Exprés CONSUR"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="p-8 space-y-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Atención Inmediata &bull; 21 Puntos Clave
                            </span>
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Box Exprés
                            </h3>
                            <p class="text-sm text-slate-600 leading-relaxed font-light">
                                En nuestro servicio Box Exprés, tu vehículo recibe atención inmediata y precisa. Con dos técnicos especializados, realizamos el cambio de aceite y filtro, más una inspección completa de 21 puntos clave que incluyen luces, suspensión y frenos. Un servicio rápido, eficiente y seguro, pensado para que vuelvas a la ruta sin demoras.
                            </p>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="http://www.turnos365.com/turnos.aspx?con=131"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 group-hover:text-[#eb0a1e] transition-colors">
                            <span>Agendar Box Exprés</span>
                            <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. Vehículo de Cortesía -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative"
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>

                    <div>
                        <div class="aspect-[16/10] overflow-hidden bg-slate-100 border-b border-slate-100">
                            <img src="/images/pages/posventa-vehiculocortesia.jpg"
                                 alt="Vehículo de Cortesía CONSUR"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="p-8 space-y-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Movilidad Garantizada
                            </span>
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Vehículo de Cortesía
                            </h3>
                            <p class="text-sm text-slate-600 leading-relaxed font-light">
                                Servicio posventa sin pausas: mientras cuidamos de tu vehículo, seguís tu camino. Consultá por nuestra opción de vehículo de cortesía para continuar con tu rutina de trabajo o compromisos personales sin ningún tipo de interrupciones.
                            </p>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="https://wa.me/595985204106?text=Hola%20Consur%2C%20quisiera%20consultar%20por%20la%20opci%C3%B3n%20de%20Veh%C3%ADculo%20de%20Cortes%C3%ADa."
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 group-hover:text-[#eb0a1e] transition-colors">
                            <span>Consultar Disponibilidad</span>
                            <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Taller Móvil -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>

                    <div>
                        <div class="aspect-[16/10] overflow-hidden bg-slate-100 border-b border-slate-100">
                            <img src="/images/pages/posventa-tallermovil.jpg"
                                 alt="Taller Móvil CONSUR"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="p-8 space-y-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Asistencia Donde Estés
                            </span>
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Taller Móvil
                            </h3>
                            <p class="text-sm text-slate-600 leading-relaxed font-light">
                                ¡El taller ahora va donde estés! Con el servicio de Taller Móvil, solucionamos lo que tu vehículo necesita, estés donde estés. Práctico, rápido y confiable, con una unidad 100% equipada con herramientas de última generación, diagnóstico multimarca oficial y lubricantes certificados.
                            </p>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="https://wa.me/595985204106?text=Hola%20Consur%2C%20solicito%20el%20servicio%20de%20Taller%20M%C3%B3vil%20en%20mi%20domicilio."
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 group-hover:text-[#eb0a1e] transition-colors">
                            <span>Solicitar Taller Móvil</span>
                            <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECCIÓN TOYOTA 10: GARANTÍA EXTENDIDA HASTA 10 AÑOS O 200.000 KM -->
    <section id="toyota-10" class="w-full py-16 md:py-20 bg-white dark:bg-neutral-900 border-b border-slate-200 dark:border-neutral-800 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            <!-- 1. ENCABEZADO Y PRESENTACIÓN PRINCIPAL (2 COLUMNAS EQUILIBRADAS) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Columna Izquierda: Afiche Oficial Toyota 10 -->
                <div class="lg:col-span-5 flex flex-col items-center justify-center" data-aos="fade-right">
                    <div class="relative w-full max-w-[460px] overflow-hidden rounded-2xl shadow-2xl border border-slate-200 dark:border-neutral-800 bg-white dark:bg-neutral-800/80 p-2 sm:p-3 group">
                        <img src="/images/pages/toyota10/toyota10.jpg"
                             alt="Toyota 10: hasta 10 años de garantía o 200.000 km - CONSUR S.A."
                             class="w-full h-auto object-contain rounded-xl transition-transform duration-500 group-hover:scale-[1.02]">
                        <div class="mt-3 px-3 py-2 text-center border-t border-slate-100 dark:border-neutral-700/60">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Programa Oficial Toyota
                            </span>
                            <span class="text-xs text-slate-500 dark:text-neutral-400">
                                Exclusivo en la Red Oficial CONSUR S.A.
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Información Principal y Cómo Funciona -->
                <div class="lg:col-span-7 space-y-6" data-aos="fade-left">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3 py-1 rounded-sm tracking-wider">
                            <i class="fas fa-shield-alt text-[10px]"></i>
                            <span>Garantía Extendida Oficial &bull; Toyota 10</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-normal leading-tight">
                            Nos mueve tu <span class="font-normal text-[#eb0a1e]">tranquilidad</span>
                        </h2>
                    </div>

                    <p class="text-base text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                        Conscientes de la calidad y durabilidad que definen a cada vehículo de la marca, te presentamos <strong class="text-slate-900 dark:text-white font-semibold">Toyota 10</strong>: una cobertura extendida de <strong class="text-slate-900 dark:text-white font-semibold">hasta 10 años o 200.000 km</strong> que se renueva automáticamente con tus mantenimientos oficiales, sin trámites extras ni costos adicionales.
                    </p>

                    <!-- Tarjeta Informativa: ¿Cómo funciona? -->
                    <div class="bg-slate-50 dark:bg-neutral-800/70 border-l-4 border-[#eb0a1e] p-5 sm:p-6 rounded-r-xl space-y-2.5">
                        <h3 class="text-sm sm:text-base font-bold text-slate-900 dark:text-white font-heading uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-sync-alt text-[#eb0a1e] text-sm"></i>
                            ¿Cómo funciona la renovación?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                            Con cada servicio de mantenimiento periódico realizado en nuestros talleres oficiales CONSUR, renovás la garantía por <strong class="text-slate-900 dark:text-white font-medium">1 año o 5.000 km</strong> (lo que ocurra primero), hasta completar un período máximo de <strong class="text-slate-900 dark:text-white font-medium">10 años o 200.000 km</strong>.
                        </p>
                    </div>

                    <!-- Enlaces Rápidos de Acción -->
                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="https://wa.me/595985204106?text=Hola%20CONSUR%2C%20quiero%20agendar%20mi%20turno%20de%20mantenimiento%20Toyota%20para%20mantener%20mi%20Garant%C3%ADa%20Toyota%2010."
                           target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition duration-200 shadow-md shadow-red-600/20">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Agendá tu turno</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                        <a href="/images/pages/toyota10/toyota10-terminos-y-condiciones.pdf"
                           target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 px-5 py-3.5 bg-white dark:bg-neutral-800 hover:bg-slate-100 dark:hover:bg-neutral-700 text-slate-800 dark:text-white border border-slate-300 dark:border-neutral-600 rounded-xl font-semibold text-xs uppercase tracking-wider transition">
                            <i class="far fa-file-pdf text-[#eb0a1e] text-sm"></i>
                            <span>Bases y Condiciones (PDF)</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. PILARES CLAVE DE TOYOTA 10 (GRID DE 4 TARJETAS LIMPIAS) -->
            <div class="pt-8 border-t border-slate-200 dark:border-neutral-800 space-y-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    
                    <!-- Tarjeta 1: Cobertura -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-shield-alt text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            Hasta 10 Años
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            O 200.000 KM
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            La cobertura más extensa y confiable del mercado automotriz paraguayo.
                        </p>
                    </div>

                    <!-- Tarjeta 2: Repuestos Genuinos -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-tools text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            100% Genuinos
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            Piezas Oficiales Toyota
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            Mano de obra certificada internacionalmente y repuestos originales.
                        </p>
                    </div>

                    <!-- Tarjeta 3: Activación Directa -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-check-circle text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            Automática
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            Sin Contratos Extra
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            Se activa de inmediato tras completar cada service periódico oficial.
                        </p>
                    </div>

                    <!-- Tarjeta 4: 100% Transferible -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-id-card text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            Transferible
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            Asociada al Chasis (VIN)
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            Acompaña al vehículo ante cualquier venta, protegiendo su valor residual.
                        </p>
                    </div>

                </div>
            </div>

            <!-- 3. CONSULTA DE ELEGIBILIDAD POR CHASIS (BANNER INTERACTIVO ELEGANTE) -->
            <div class="p-6 sm:p-8 bg-slate-50 dark:bg-neutral-800/70 rounded-2xl border border-slate-200 dark:border-neutral-700 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="space-y-1.5 text-center md:text-left max-w-xl">
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#eb0a1e]">
                        <i class="fas fa-search"></i>
                        <span>Verificación Inmediata</span>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-slate-900 dark:text-white font-heading">
                        ¿Querés saber si tu Toyota aplica a la garantía extendida?
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-400 font-light">
                        Envianos el número de chasis (VIN) de tu vehículo y nuestros asesores oficiales validarán el estado de cobertura en el acto.
                    </p>
                </div>

                <div class="shrink-0 w-full md:w-auto flex flex-col sm:flex-row items-center gap-3">
                    <a href="https://wa.me/595985204106?text=Hola%20CONSUR%2C%20quiero%20consultar%20la%20elegibilidad%20de%20mi%20Toyota%20por%20chasis%20(Programa%20Toyota%2010)."
                       target="_blank" rel="noopener noreferrer"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition duration-200 shadow-sm">
                        <i class="fas fa-barcode text-sm"></i>
                        <span>Consultar Elegibilidad por VIN</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- 4. BARRA DE ACCIÓN Y CONTACTO (TÉRMINOS Y CONDICIONES + AGENDAR TURNO) -->
            <div class="pt-6 border-t border-slate-200 dark:border-neutral-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs text-slate-500 dark:text-neutral-400 text-center sm:text-left">
                    <span class="font-medium text-slate-700 dark:text-neutral-300">Válido para vehículos comercializados desde noviembre de 2023.</span>
                    <span class="hidden sm:inline"> &bull; Sujeto a cumplimiento del plan de mantenimiento oficial.</span>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-3 w-full sm:w-auto">
                    <!-- Botón Términos y Condiciones -->
                    <a href="/images/pages/toyota10/toyota10-terminos-y-condiciones.pdf"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-white dark:bg-neutral-800 hover:bg-slate-100 dark:hover:bg-neutral-700 text-slate-800 dark:text-white border border-slate-300 dark:border-neutral-600 rounded-xl font-semibold text-xs uppercase tracking-wider transition">
                        <i class="far fa-file-pdf text-[#eb0a1e] text-sm"></i>
                        <span>Términos y Condiciones</span>
                    </a>

                    <!-- Botón Agendar Turno Oficial WhatsApp -->
                    <a href="https://wa.me/595985204106?text=Hola%20CONSUR%2C%20quiero%20agendar%20mi%20turno%20de%20mantenimiento%20Toyota%20para%20mantener%20mi%20Garant%C3%ADa%20Toyota%2010."
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#25D366] hover:bg-[#20ba59] text-white rounded-xl font-bold text-xs uppercase tracking-wider transition shadow-sm">
                        <i class="fab fa-whatsapp text-base"></i>
                        <span>Agendá tu Turno Oficial</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. FRANJA PARALLAX FULL-WIDTH: 4 TALLERES AUTORIZADOS EN EL SUR DEL PAÍS (Estilo /hino y /la-empresa) -->
    <section class="relative w-full py-24 md:py-32 bg-fixed bg-cover bg-center overflow-hidden text-white select-none"
             style="background-image: url('/images/home/toyotaaclientes.jpg');">
        <!-- Overlay oscuro con profundidad -->
        <div class="absolute inset-0 bg-slate-950/90 backdrop-blur-[2px]"></div>

        <!-- Brillo ambiental rojo Toyota -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#eb0a1e]/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado de la Franja Parallax -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block">
                    Red Oficial CONSUR S.A.
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white font-heading uppercase tracking-normal">
                    4 Talleres Autorizados en el <span class="font-normal text-[#eb0a1e]">Sur del País</span>
                </h2>
                <div class="w-16 h-1 bg-[#eb0a1e] mx-auto mt-4"></div>
                <p class="text-sm sm:text-base text-slate-300 font-light max-w-2xl mx-auto pt-1 leading-relaxed">
                    Infraestructura de taller oficial, boxes de diagnóstico computarizado y repuestos genuinos estratégicamente ubicados en Itapúa y Misiones.
                </p>
            </div>

            <!-- Grilla Arquitectónica de las 4 Sedes Oficiales de Taller -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-white/10 border border-white/10 shadow-2xl mb-12">

                <!-- Sede 1: Encarnación -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="50">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            Sede Principal
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            Encarnación
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Av. Bernardino Caballero 749 (Casa Central)
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie: 07:00 a 12:00 y 14:00 a 17:00 Hs</span>
                    </div>
                </div>

                <!-- Sede 2: Obligado -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            Colonias Unidas
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            Obligado
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Av. Gaspar R. de Francia y Mcal. López
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie: 07:00 a 12:00 y 14:00 a 17:00 Hs</span>
                    </div>
                </div>

                <!-- Sede 3: San Ignacio -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            Misiones
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            San Ignacio
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Ruta 1 Mcal. Estigarribia, km 224
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie: 07:00 a 12:00 y 14:00 a 17:00 Hs</span>
                    </div>
                </div>

                <!-- Sede 4: María Auxiliadora -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            Itapúa Norte
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            Ma. Auxiliadora
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Ruta VI km. 119
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie: 07:00 a 12:00 y 14:00 a 17:00 Hs</span>
                    </div>
                </div>

            </div>

            <!-- Botón Central de Agendamiento -->
            <div class="text-center" data-aos="fade-up">
                <a href="https://wa.me/595985204106?text=Hola%20CONSUR%2C%20quisiera%20agendar%20un%20turno%20para%20el%20Servicio%20T%C3%A9cnico%20Toyota."
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-10 py-4 transition-all shadow-xl shadow-red-600/30">
                    <i class="fab fa-whatsapp text-base"></i>
                    <span>Agendá tu turno</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- 5. COMPROMISO POSVENTA: TE ACOMPAÑAMOS & PERSONAL ALTAMENTE CALIFICADO (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <!-- Columna Izquierda: Información de Compromiso y Beneficios -->
                <div class="lg:col-span-7 space-y-8" data-aos="fade-right">
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                            <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                            <span>Compromiso Posventa CONSUR</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-slate-900 font-heading uppercase tracking-normal">
                            Te <span class="font-normal text-[#eb0a1e]">Acompañamos</span>
                        </h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-light">
                            A partir del momento que Usted adquiere nuestras unidades o nuestros servicios empieza una relación donde siempre va a encontrarse acompañado con la calidez, transparencia y excelencia técnica que nos caracteriza desde 1977.
                        </p>
                    </div>

                    <!-- 4 Beneficios Clave (Grilla Arquitectónica Recta con Iconos Cuadrados) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-shield-heart"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Extienda la Vida Útil</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">Mantenimientos preventivos que cuidan tu vehículo</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-gas-pump"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Ahorre Combustible</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">Inyección y puesta a punto calibrada de fábrica</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-coins"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Reducción de Costos</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">Prevención temprana de desgastes mayores</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-route"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Evite Contratiempos</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">Seguridad y confianza en cada viaje o jornada</span>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Altamente Calificado (Bloque con Borde Lateral Rojo Estilo Kaizen) -->
                    <div class="border-l-4 border-[#eb0a1e] pl-6 space-y-4 bg-slate-50/70 p-6">
                        <h3 class="text-lg sm:text-xl font-light text-slate-900 font-heading uppercase tracking-normal">
                            ¡<span class="font-normal text-[#eb0a1e]">Personal altamente calificado</span> para brindar los mejores servicios!
                        </h3>
                        <div class="space-y-3 text-sm text-slate-600 leading-relaxed font-light">
                            <p>
                                Nuestra <strong class="text-slate-900 font-medium">Gerencia de Servicios</strong> se encargará de atenderlo en todo el proceso durante su visita al Servicio Técnico, tomando nota de sus necesidades y brindándole en forma ágil toda la información que necesita.
                            </p>
                            <p>
                                <strong class="text-slate-900 font-medium">Técnicos altamente capacitados</strong> estarán poniendo el mejor de sus conocimientos para realizar los mantenimientos y reparaciones necesarias en su vehículo. El <strong class="text-slate-900 font-medium">Asesor de Repuestos</strong> podrá brindarle toda la información necesaria acerca de la disponibilidad y costos de accesorios y repuestos legítimos.
                            </p>
                            <p>
                                <strong class="text-slate-900 font-medium">CONSUR S.A.</strong> cuenta con el Servicio Técnico Oficial Toyota en sus diferentes sucursales, estratégicamente distribuidas en los departamentos de Itapúa y Misiones para brindarle una cobertura total y la mayor tranquilidad.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Showcase del Mecánico con Sello de Garantía Recto -->
                <div class="lg:col-span-5 flex flex-col items-center justify-center" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative w-full max-w-[420px]">
                        <img src="/images/pages/posventa-mechanic.png"
                             alt="Servicio Técnico Oficial CONSUR S.A."
                             class="w-full h-auto object-contain drop-shadow-2xl transform hover:scale-105 transition-transform duration-700">

                        <!-- Sello Flotante Recto con Borde Rojo -->
                        <div class="mt-6 bg-slate-950 text-white p-6 border-l-4 border-[#eb0a1e] shadow-xl">
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block">
                                Respaldo Escrito de Fábrica
                            </span>
                            <span class="text-base font-semibold font-heading uppercase tracking-wide block mt-1">
                                Garantía en Mano de Obra y Repuestos
                            </span>
                            <p class="text-xs text-slate-300 mt-1 font-light leading-relaxed">
                                Cada service cuenta con la tranquilidad de contar con trazabilidad, herramientas de diagnóstico oficial Toyota y repuestos 100% legítimos.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. FRANJA DE CONTACTO Y HORARIOS OFICIALES (BARRA COMPLETA MINIMALISTA) -->
    <section class="w-full py-12 bg-slate-950 text-white border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="flex flex-wrap items-center gap-6 sm:gap-10 text-xs text-slate-300">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/10 text-[#eb0a1e] flex items-center justify-center text-sm shrink-0">
                            <i class="far fa-clock"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Horario de Atención</span>
                            <span class="font-medium text-white">Lunes a Viernes: 7:00 a 12:00 • 14:00 a 17:00 | Sábados: 7:30 a 12:00</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/10 text-[#eb0a1e] flex items-center justify-center text-sm shrink-0">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Casa Central Encarnación</span>
                            <a href="tel:+59571204106" class="font-medium text-white hover:text-[#eb0a1e] transition">+595 71 204 106</a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3.5 shrink-0">
                    <a href="http://www.turnos365.com/turnos.aspx?con=131"
                       target="_blank" rel="noopener"
                       class="px-6 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition shadow-lg shadow-red-600/25 flex items-center gap-2">
                        <i class="far fa-calendar-check text-xs"></i>
                        <span>Turnos Online</span>
                    </a>
                    <a href="https://wa.me/595985204106?text=Hola%20Consur%2C%20quisiera%20consultar%20sobre%20el%20Servicio%20T%C3%A9cnico%20Toyota."
                       target="_blank" rel="noopener"
                       class="px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-widest transition shadow-lg shadow-emerald-600/25 flex items-center gap-2">
                        <i class="fab fa-whatsapp text-sm"></i>
                        <span>WhatsApp Taller</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
HTML;

        Page::updateOrCreate(
            ['slug' => 'posventa'],
            [
                'title' => 'Posventa Toyota – Consur S.A.',
                'subtitle' => 'Mantené tu Toyota como nuevo con técnicos certificados, repuestos 100% legítimos y talleres oficiales en Itapúa y Misiones.',
                'banner_image' => '/images/pages/posventa-hero.jpg',
                'content' => $html,
                'meta_title' => 'Posventa Toyota | Consur S.A. – Servicio Técnico Oficial y Repuestos Legítimos',
                'meta_description' => 'Servicio Técnico Oficial Toyota en Paraguay: Mantenimiento preventivo, Box Exprés, Vehículo de Cortesía, Taller Móvil y Garantía Toyota 10 con Consur S.A.',
                'is_published' => true,
                'sort_order' => 2,
            ]
        );
    }
}
