<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Page;
use Illuminate\Database\Seeder;

class HinoAndBikeRedesignSeeder extends Seeder
{
    public function run(): void
    {
        // Asegurar que las marcas Hino y Consur Bike apunten directo a sus landings
        Brand::where('slug', 'hino')->update([
            'custom_url' => '/hino',
            'is_active' => true,
            'is_featured_menu' => true,
        ]);

        Brand::where('slug', 'consur-bike')->update([
            'custom_url' => '/consur-bike',
            'is_active' => true,
            'is_featured_menu' => true,
        ]);

        // =====================================================================
        // 1. LANDING PREMIUM Y MINIMALISTA PARA /hino (Full-Width, Sin Cajas Redondeadas)
        // =====================================================================
        $hinoHtml = <<<'HTML'
<div data-cms-layout="fullwidth" class="w-full bg-white text-slate-900">

    <!-- 1. HERO FULL-WIDTH CON EFECTO PARALLAX -->
    <section class="relative w-full min-h-[440px] md:min-h-[520px] flex items-center bg-fixed bg-cover bg-center overflow-hidden select-none"
             style="background-image: url('/images/hino/banner-hero.jpg');">
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/92 via-neutral-950/75 to-neutral-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-neutral-950/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl" data-aos="fade-right">
                <div class="inline-flex items-center gap-3 mb-5 bg-white/10 backdrop-blur-md px-4 py-1.5 border-l-2 border-[#eb0a1e]">
                    <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-white">
                        Grupo Toyota &bull; Calidad Japonesa
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white uppercase tracking-tight font-heading leading-[1.06]">
                    Camiones <span class="text-[#eb0a1e]">HINO</span>
                </h1>

                <p class="mt-4 text-base sm:text-lg text-slate-300 font-light max-w-2xl leading-relaxed">
                    Mayor fabricante japonés de camiones para servicio comercial. Máxima durabilidad, Soporte Total y los tres modelos oficiales disponibles en Paraguay.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#modelos-hino"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-red-600/25">
                        <span>Ver Modelos Disponibles</span>
                        <i class="fas fa-arrow-down text-[10px]"></i>
                    </a>
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20asesoramiento%20y%20cotizaci%C3%B3n%20sobre%20camiones%20HINO."
                       target="_blank"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-xs font-bold uppercase tracking-widest backdrop-blur-sm transition-all">
                        <i class="fab fa-whatsapp text-emerald-400 text-sm"></i>
                        <span>Solicitar Cotización</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. BLOQUE INTRODUCTORIO: HINO MOTORS & GRUPO TOYOTA (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-4">
                        <img src="/images/hino/logo.png" alt="Hino Logo" class="h-9 sm:h-11 w-auto object-contain">
                        <span class="h-6 w-px bg-slate-200"></span>
                        <span class="text-xs uppercase font-bold tracking-[0.2em] text-[#eb0a1e]">
                            Grupo Toyota &bull; Japón
                        </span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight leading-tight">
                        El mayor fabricante de camiones para servicio comercial de Japón
                    </h2>

                    <div class="w-16 h-1 bg-[#eb0a1e]"></div>

                    <p class="text-base sm:text-lg font-medium text-slate-800">
                        Potencia, durabilidad inquebrantable y el respaldo integral de Soporte Total para tu negocio.
                    </p>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        <strong class="text-slate-900">HINO</strong>, la prestigiosa división de camiones comerciales de <strong class="text-slate-900">Toyota Group</strong>, es sinónimo de eficiencia, resistencia y rentabilidad operativa a nivel global. A través de <strong class="text-slate-900">Consur S.A.</strong>, te acercamos a Paraguay la línea completa de camiones diseñados para cumplir con las más altas exigencias de transporte, distribución urbana y logística pesada.
                    </p>
                </div>

                <div class="lg:col-span-5" data-aos="fade-left">
                    <div class="relative overflow-hidden shadow-2xl border border-slate-200 group">
                        <img src="/images/hino/hino-editada.jpg"
                             alt="Camiones Hino en Paraguay"
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/95 via-slate-950/60 to-transparent p-6 border-t border-white/10">
                            <span class="text-white text-xs font-bold tracking-widest uppercase block">
                                Garantía Oficial de 3 Años o 100.000 Km
                            </span>
                            <span class="text-slate-300 text-xs block mt-1">
                                Respaldo de fábrica y servicio de posventa garantizado
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. PILARES DE LA MARCA HINO (SECCIÓN GRIS CLARO MINIMALISTA) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs uppercase font-bold tracking-[0.25em] text-[#eb0a1e] block">
                    Ventajas Competitivas Hino
                </span>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight">
                    Por Qué Elegir un Camión <span class="text-[#eb0a1e]">HINO</span>
                </h3>
                <p class="text-sm sm:text-base text-slate-500">
                    La fórmula de valor que asegura la máxima rentabilidad y el menor costo operativo por kilómetro recorrido.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px bg-slate-200 border border-slate-200 shadow-sm">
                <!-- Pilar 1: Soporte Total -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="50">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>
                    <div class="w-12 h-12 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-xl">
                        <i class="fas fa-handshake-angle"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        Soporte Total (Total Support)
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Al adquirir un camión Hino usted accede al sistema de Soporte Total. Nuestro objetivo es que su unidad esté trabajando siempre, minimizando tiempos de inactividad técnica para mantener su productividad activa.
                    </p>
                </div>

                <!-- Pilar 2: QDR Durabilidad -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>
                    <div class="w-12 h-12 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-xl">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        QDR: Calidad y Durabilidad
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Los camiones Hino ofrecen durabilidad sin límites. Chasis reforzado, componentes sobredimensionados y una rigurosa manufactura japonesa garantizan confiabilidad extrema incluso en faenas severas.
                    </p>
                </div>

                <!-- Pilar 3: Hino Eco Drive -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="150">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-emerald-600 transition-colors"></div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        Hino Eco Drive
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Equipados con tecnología de avanzada para proveer bajas emisiones y una óptima eficiencia en el consumo de combustible, complementado con recomendaciones y seminarios de conducción ecológica.
                    </p>
                </div>

                <!-- Pilar 4: Garantía y Respaldo Oficial -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>
                    <div class="w-12 h-12 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-xl">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        Garantía 3 Años o 100.000 Km
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Tenga la tranquilidad de contar con el respaldo institucional más sólido del país, provisión permanente de repuestos genuinos y talleres autorizados con técnicos capacitados en fábrica.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. FRANJA PARALLAX FULL-WIDTH: ADN RALLY DAKAR (SIN BORDES REDONDEADOS) -->
    <section class="relative w-full py-24 md:py-32 bg-fixed bg-cover bg-center overflow-hidden text-white"
             style="background-image: url('/images/hino/banner-dakar.jpg');">
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/95 via-neutral-950/85 to-neutral-950/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl space-y-5" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                    <i class="fas fa-trophy"></i>
                    <span>Espíritu & Resistencia Dakar</span>
                </div>

                <h3 class="text-3xl sm:text-4xl md:text-5xl font-extrabold uppercase tracking-tight font-heading leading-tight">
                    Probado en la carrera más dura del mundo
                </h3>

                <p class="text-sm sm:text-base text-neutral-300 leading-relaxed font-light">
                    El equipo <strong class="text-white font-semibold">Hino Dakar</strong> ha participado ininterrumpidamente en más de 25 ediciones del Rally Dakar, completando siempre las etapas más inclementes del planeta. Este récord histórico es el resultado directo de la alta resistencia, robustez mecánica y calidad japonesa que define a cada camión Hino que trabaja en nuestras rutas.
                </p>

                <div class="pt-4 flex flex-wrap items-center gap-8 text-xs font-bold uppercase tracking-wider text-neutral-200 border-t border-white/15">
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-check text-[#eb0a1e]"></i>
                        <span>+25 Ediciones consecutivas</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-check text-[#eb0a1e]"></i>
                        <span>Fiabilidad bajo condiciones extremas</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. MODELOS DISPONIBLES EN PARAGUAY (SERIE 200, SERIE 300, SERIE 500) -->
    <section id="modelos-hino" class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs uppercase font-bold tracking-[0.25em] text-[#eb0a1e] block">
                    Línea Comercial Oficial
                </span>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight">
                    Los 3 Modelos Disponibles en <span class="text-[#eb0a1e]">Paraguay</span>
                </h3>
                <p class="text-sm sm:text-base text-slate-500">
                    Soluciones a medida para cada escala de carga: desde transporte urbano ágil hasta logística semipesada interurbana.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- MODELO 1: HINO SERIE 200 -->
                <div class="bg-white border border-slate-200 hover:border-slate-400 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-xl" data-aos="fade-up" data-aos-delay="50">
                    <div>
                        <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                            <img src="/images/hino/hino200.jpg" alt="Hino Serie 200" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-0 left-0 bg-[#eb0a1e] text-white text-[10px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                                Serie 200 &bull; Ligero Urbano
                            </div>
                            <div class="absolute bottom-0 right-0 bg-slate-950/90 text-white text-xs font-bold px-4 py-1.5">
                                Carga: 2.200 Kg
                            </div>
                        </div>

                        <div class="p-7 sm:p-8 space-y-5">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Modelo 410</span>
                                <h4 class="text-2xl font-extrabold text-slate-900 font-heading uppercase mt-0.5">
                                    HINO Serie 200
                                </h4>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Un vehículo HINO 200 es garantía de calidad y satisfacción. No es sólo un camión, es un conjunto de grandes beneficios a largo plazo. Camión ligero de alta eficiencia, bajo consumo de combustible, motor de bajas emisiones, alta maniobrabilidad, ideal para espacios reducidos, confortable y con bajos costos de mantenimiento.
                            </p>

                            <div class="space-y-2.5 pt-4 border-t border-slate-100 text-xs text-slate-700">
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Capacidad de carga:</span>
                                    <span class="font-bold text-slate-900">2.200 Kg</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Configuración:</span>
                                    <span class="font-bold text-slate-900">Eje Simple</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Capacidad eje trasero:</span>
                                    <span class="font-bold text-slate-900">4.300 Kg</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5">
                                    <span class="font-medium text-slate-500">Aplicación:</span>
                                    <span class="font-bold text-[#eb0a1e]">Reparto Urbano y Fletes</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-7 sm:p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20200%20(Modelo%20410)."
                           target="_blank"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest transition-colors">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Cotizar Serie 200</span>
                        </a>
                    </div>
                </div>

                <!-- MODELO 2: HINO SERIE 300 -->
                <div class="bg-white border border-slate-200 hover:border-slate-400 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-xl" data-aos="fade-up" data-aos-delay="150">
                    <div>
                        <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                            <img src="/images/hino/hino300-814.jpg" alt="Hino Serie 300" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-0 left-0 bg-[#eb0a1e] text-white text-[10px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                                Serie 300 &bull; Mediano Versátil
                            </div>
                            <div class="absolute bottom-0 right-0 bg-slate-950/90 text-white text-xs font-bold px-4 py-1.5">
                                Carga: 2.500 a 6.000 Kg
                            </div>
                        </div>

                        <div class="p-7 sm:p-8 space-y-5">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Modelos 512 &bull; 711 &bull; 814</span>
                                <h4 class="text-2xl font-extrabold text-slate-900 font-heading uppercase mt-0.5">
                                    HINO Serie 300
                                </h4>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Si su objetivo fuera solamente el de acarrear cargas, no habría razón de seleccionar este camión. Este camión genera niveles bajos de emisión, contribuyendo al cuidado del medio ambiente, y su bajo nivel de consumo lo hace altamente eficiente. Su cabina fue diseñada desde la perspectiva de prevenir accidentes, con máxima seguridad y ergonomía.
                            </p>

                            <div class="space-y-2.5 pt-4 border-t border-slate-100 text-xs text-slate-700">
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Modelo 512:</span>
                                    <span class="font-bold text-slate-900">2.500 Kg (Eje Simple)</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Modelo 711:</span>
                                    <span class="font-bold text-slate-900">4.500 Kg (Eje Dual)</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Modelo 814:</span>
                                    <span class="font-bold text-slate-900">6.000 Kg (Eje Dual)</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5">
                                    <span class="font-medium text-slate-500">Aplicación:</span>
                                    <span class="font-bold text-[#eb0a1e]">Distribución Media y Logística</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-7 sm:p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20300."
                           target="_blank"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest transition-colors">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Cotizar Serie 300</span>
                        </a>
                    </div>
                </div>

                <!-- MODELO 3: HINO SERIE 500 -->
                <div class="bg-white border border-slate-200 hover:border-slate-400 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-xl" data-aos="fade-up" data-aos-delay="250">
                    <div>
                        <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                            <img src="/images/hino/hino500-1018.jpg" alt="Hino Serie 500" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-0 left-0 bg-[#eb0a1e] text-white text-[10px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                                Serie 500 &bull; Carga Pesada
                            </div>
                            <div class="absolute bottom-0 right-0 bg-slate-950/90 text-white text-xs font-bold px-4 py-1.5">
                                Carga: 8.500 Kg
                            </div>
                        </div>

                        <div class="p-7 sm:p-8 space-y-5">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Modelo 1018</span>
                                <h4 class="text-2xl font-extrabold text-slate-900 font-heading uppercase mt-0.5">
                                    HINO Serie 500
                                </h4>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                El Nuevo Hino 500 presenta un diseño aerodinámico y al mismo tiempo fuerte y robusto. Fiel a su legendaria tradición de durabilidad, resistencia y confiabilidad a toda prueba, el Hino 500 se constituye en uno de los modelos más apreciados en el segmento de los camiones medianos y semipesados. Cuando usted elige un Hino, sus negocios tienen el mejor respaldo.
                            </p>

                            <div class="space-y-2.5 pt-4 border-t border-slate-100 text-xs text-slate-700">
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Capacidad de carga:</span>
                                    <span class="font-bold text-slate-900">8.500 Kg</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Configuración:</span>
                                    <span class="font-bold text-slate-900">Eje Dual Reforzado</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Rendimiento:</span>
                                    <span class="font-bold text-slate-900">Alto torque y bajo costo/km</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5">
                                    <span class="font-medium text-slate-500">Aplicación:</span>
                                    <span class="font-bold text-[#eb0a1e]">Interurbano, Agro e Industria</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-7 sm:p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20500%20(Modelo%201018)."
                           target="_blank"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest transition-colors">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Cotizar Serie 500</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. TALLERES CERTIFICADOS & REPUESTOS GENUINOS (SECCIÓN GRIS CLARO FULL-WIDTH) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Posventa Oficial Especializada</span>
                    </div>

                    <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight leading-tight">
                        Talleres Certificados & Repuestos Genuinos Hino
                    </h3>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Contamos con talleres exclusivos con certificación de calidad y un equipo de técnicos especializados y capacitados en Hino para brindarle un servicio de excelencia. Garantizamos la tranquilidad operativa de su flota con diagnósticos precisos, mantenimiento preventivo y repuestos 100% legítimos que protegen el valor y la vida útil de su inversión.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs sm:text-sm font-semibold text-slate-800">
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>Técnicos certificados por fábrica</span>
                        </div>
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>Stock permanente de repuestos</span>
                        </div>
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>Mantenimiento express para flotas</span>
                        </div>
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>Respaldo oficial de Consur S.A.</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6" data-aos="fade-left">
                    <div class="overflow-hidden shadow-xl border border-slate-200">
                        <img src="/images/hino/talleres.jpg" alt="Taller Oficial Hino" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. BANNER FINAL CALL TO ACTION FULL-WIDTH (SIN BORDES REDONDEADOS) -->
    <section class="w-full py-20 md:py-24 bg-neutral-950 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6" data-aos="fade-up">
            <span class="text-xs uppercase font-extrabold tracking-[0.25em] text-[#eb0a1e] block">
                Atención Comercial & Flotas
            </span>
            <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold uppercase tracking-tight font-heading">
                ¿Necesitás asesoramiento para tu próximo camión?
            </h3>
            <p class="text-sm sm:text-base text-slate-400 max-w-2xl mx-auto font-light leading-relaxed">
                Contactate con nuestros asesores comerciales corporativos de Consur S.A. y recibí una cotización adaptada a las necesidades de carga y transporte de tu empresa.
            </p>
            <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20solicito%20presupuesto%20para%20camiones%20HINO."
                   target="_blank"
                   class="inline-flex items-center gap-2.5 px-8 py-4 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest shadow-lg shadow-red-600/25 transition-all">
                    <i class="fab fa-whatsapp text-base"></i>
                    <span>Hablar con un Asesor Hino</span>
                </a>
                <a href="tel:+59571204106"
                   class="inline-flex items-center gap-2.5 px-8 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/15 text-xs font-bold uppercase tracking-widest transition-all">
                    <i class="fas fa-phone-alt"></i>
                    <span>Llamar al +595 71 204 106</span>
                </a>
            </div>
        </div>
    </section>

</div>
HTML;

        Page::updateOrCreate(
            ['slug' => 'hino'],
            [
                'title' => 'Camiones HINO – Grupo Toyota',
                'subtitle' => 'Mayor fabricante japonés de camiones para servicio comercial. Máxima durabilidad, Soporte Total y los tres modelos oficiales disponibles en Paraguay.',
                'banner_image' => '/images/hino/banner-hero.jpg',
                'content' => $hinoHtml,
                'meta_title' => 'Camiones HINO en Paraguay – Serie 200, 300 y 500 | Consur S.A.',
                'meta_description' => 'Concesionario Oficial de Camiones HINO (Grupo Toyota) en Paraguay. Descubrí los modelos Serie 200, Serie 300 y Serie 500 con Garantía de 3 años o 100.000 Km y Soporte Total.',
                'is_published' => true,
                'sort_order' => 4,
            ]
        );

        // =====================================================================
        // 2. LANDING PREMIUM Y MINIMALISTA PARA /consur-bike (Full-Width, Sin Cajas Redondeadas)
        // =====================================================================
        $bikeHtml = <<<'HTML'
<div data-cms-layout="fullwidth" class="w-full bg-white text-slate-900">

    <!-- 1. HERO FULL-WIDTH CON EFECTO PARALLAX -->
    <section class="relative w-full min-h-[440px] md:min-h-[520px] flex items-center bg-fixed bg-cover bg-center overflow-hidden select-none"
             style="background-image: url('/images/pages/consurbike-hero.jpg');">
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/92 via-neutral-950/75 to-neutral-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-neutral-950/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl" data-aos="fade-right">
                <div class="inline-flex items-center gap-3 mb-5 bg-white/10 backdrop-blur-md px-4 py-1.5 border-l-2 border-[#eb0a1e]">
                    <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-white">
                        División Oficial Ciclismo &bull; Consur S.A.
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-light text-white uppercase tracking-normal font-heading leading-[1.06]">
                    Consur <span class="font-normal text-[#eb0a1e]">Bike</span>
                </h1>

                <p class="mt-4 text-base sm:text-lg text-slate-300 font-light max-w-2xl leading-relaxed">
                    El Ciclismo está en nuestra sangre &bull; Corre por nuestras venas &bull; Vivimos y respiramos ciclismo.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="https://www.consurshop.com/deportes/ciclismo"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all shadow-lg shadow-red-600/25">
                        <i class="fas fa-bicycle text-sm"></i>
                        <span>Ver Tienda Online</span>
                        <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>
                    <a href="#escuelas-ciclismo"
                       class="inline-flex items-center gap-2.5 px-7 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-xs font-bold uppercase tracking-widest backdrop-blur-sm transition-all">
                        <span>Escuelas de Ciclismo</span>
                        <i class="fas fa-arrow-down text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. BICICLETAS, ACCESORIOS Y EQUIPAMIENTO SPECIALIZED (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-6 space-y-8" data-aos="fade-right">
                    <div>
                        <img src="/images/pages/specialized-logo.png"
                             alt="Specialized - Consur Bike"
                             class="h-12 sm:h-14 w-auto object-contain">
                    </div>

                    <div class="space-y-6">
                        <div class="border-l-2 border-[#eb0a1e] pl-6 space-y-2">
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Bicicletas y accesorios
                            </h3>
                            <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-light">
                                Tenemos una verdadera pasión por traerte los mejores productos y servicios a los mejores precios brindando el mejor asesoramiento acorde a tu necesidad.
                            </p>
                        </div>

                        <div class="border-l-2 border-slate-900 pl-6 space-y-2">
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Equipamiento para todos
                            </h3>
                            <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-light">
                                Sin importar tu nivel de novato o profesional, tenemos el equipamiento adecuado para que vivas la experiencia que deseas, de la mano de la mejor marca.
                            </p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="https://www.consurshop.com/deportes/ciclismo"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition shadow-lg shadow-red-600/20">
                            <i class="fas fa-bicycle text-sm"></i>
                            <span>Ver Tienda</span>
                            <i class="fas fa-external-link-alt text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-6 flex items-center justify-center" data-aos="fade-left">
                    <img src="/images/pages/consurbike-bici.png"
                         alt="Bicicletas Specialized en Consur Bike"
                         class="w-full max-w-[560px] h-auto object-contain drop-shadow-2xl transform hover:scale-105 transition-transform duration-700">
                </div>
            </div>

            <!-- Descarga de Catálogos Oficiales (Diseño Arquitectónico Minimalista) -->
            <div class="mt-16 pt-12 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-6" data-aos="fade-up">
                <a href="/images/pages/catalogo-specialized.pdf"
                   target="_blank" rel="noopener"
                   class="flex items-center justify-between p-7 bg-slate-950 hover:bg-[#eb0a1e] text-white transition-colors duration-300 group">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fas fa-file-pdf text-xl text-[#eb0a1e] group-hover:text-white transition-colors"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 group-hover:text-red-100 block">Catálogo Oficial PDF</span>
                            <span class="text-base sm:text-lg font-semibold font-heading uppercase tracking-wide">Descargar Catálogo Specialized</span>
                        </div>
                    </div>
                    <i class="fas fa-download text-sm opacity-80 group-hover:translate-y-0.5 transition"></i>
                </a>

                <a href="/images/pages/catalogo-ebike.pdf"
                   target="_blank" rel="noopener"
                   class="flex items-center justify-between p-7 bg-slate-950 hover:bg-[#eb0a1e] text-white transition-colors duration-300 group">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fas fa-bolt text-xl text-amber-400 group-hover:text-white transition-colors"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 group-hover:text-red-100 block">Catálogo Oficial PDF</span>
                            <span class="text-base sm:text-lg font-semibold font-heading uppercase tracking-wide">Descargar Catálogo E-Bike</span>
                        </div>
                    </div>
                    <i class="fas fa-download text-sm opacity-80 group-hover:translate-y-0.5 transition"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 3. CONSUR BIKE KIDS, ESCUELA DE CICLISMO + VIDEO OFICIAL (SECCIÓN GRIS CLARO FULL-WIDTH) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Sembrando Futuros Campeones</span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 font-heading uppercase tracking-normal leading-tight">
                        <span class="font-normal text-[#eb0a1e]">Consur Bike Kids</span>, escuela de ciclismo
                    </h2>

                    <div class="w-16 h-1 bg-[#eb0a1e]"></div>

                    <div class="space-y-4 text-sm sm:text-base text-slate-600 leading-relaxed font-light">
                        <p>
                            En Consur Bike, creemos firmemente en el poder del deporte como semillero de valores y oportunidades para los más jóvenes. Nuestra <strong class="text-slate-900 font-medium">Escuela de Ciclismo Consur Bike Kids</strong>, dirigida a niños y niñas de 4 a 14 años, es mucho más que clases de ciclismo: es un espacio donde cultivamos la pasión por el deporte, el desarrollo integral y los valores fundamentales.
                        </p>
                        <p>
                            Gracias a la valiosa enseñanza de profesores y su equipo, nuestro programa ofrece una variedad de actividades recreativas y deportivas que complementan el aprendizaje del ciclismo. Este proyecto refuerza nuestro compromiso de fomentar la cooperación, el respeto y el esfuerzo desde temprana edad.
                        </p>
                        <div class="p-5 bg-white border-l-4 border-[#eb0a1e] shadow-xs text-slate-800 text-xs sm:text-sm font-medium">
                            <i class="far fa-calendar-check text-[#eb0a1e] mr-1.5"></i>
                            Las clases se desarrollan los días <strong>miércoles y sábados</strong> en el parque de la ciudad de <strong>Encarnación</strong>, y los días <strong>jueves y domingos</strong> en la plaza Bernardino Caballero de <strong>Bella Vista</strong>.
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6" data-aos="fade-left">
                    <div class="aspect-video overflow-hidden shadow-2xl border border-slate-200 bg-slate-950">
                        <iframe class="w-full h-full"
                                src="https://www.youtube.com/embed/7lzYa9eigVo"
                                title="Consur Bike Kids - Escuela de Ciclismo"
                                loading="lazy"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. FRANJA FULL-WIDTH ULTRA NÍTIDA: CONSUR BIKE CLUB (2K Ultra-HD + WebP) -->
    <section class="relative w-full py-24 md:py-32 overflow-hidden text-white select-none">
        <!-- Capa de imagen de fondo ultra nítida de alta resolución -->
        <div class="absolute inset-0 z-0">
            <picture class="w-full h-full block">
                <source srcset="/images/pages/consurbike-club-bg.webp" type="image/webp">
                <img src="/images/pages/consurbike-club-bg.jpg"
                     alt="Consur Bike Club"
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover object-center transform scale-[1.02] transition-transform duration-1000">
            </picture>
            <!-- Degradado cinematográfico de alto contraste -->
            <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/95 via-neutral-950/80 to-neutral-950/50"></div>
            <!-- Brillo ambiental rojo Consur -->
            <div class="absolute top-1/2 left-1/3 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[300px] bg-[#eb0a1e]/15 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-5" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3.5 py-1.5 tracking-widest">
                    <i class="fas fa-users"></i>
                    <span>Comunidad Ciclista</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light font-heading uppercase tracking-normal">
                    Consur Bike <span class="font-normal text-[#eb0a1e]">Club</span>
                </h2>
                <p class="text-base sm:text-lg text-slate-200 font-light leading-relaxed">
                    Buscamos compartir los mejores momentos unidos por nuestro deporte. Hacemos rutas de mountain bike y carretera para todos los niveles y edades. Para nuestros asociados contamos con una amplia gama de beneficios.
                </p>
            </div>
        </div>
    </section>

    <!-- 5. INSCRIPCIONES A LAS ESCUELAS DE CICLISMO (ENCARNACIÓN Y BELLA VISTA) -->
    <section id="escuelas-ciclismo" class="w-full py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14 space-y-3" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block">Inscripciones Abiertas</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 font-heading uppercase tracking-normal">
                    Uníte a Nuestras Escuelas de <span class="font-normal text-[#eb0a1e]">Ciclismo</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Escuela de Ciclismo de Encarnación -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-[16/10] overflow-hidden bg-slate-100">
                        <picture class="w-full h-full block">
                            <source srcset="/images/pages/escuela-encarnacion.webp" type="image/webp">
                            <img src="/images/pages/escuela-encarnacion.jpg"
                                 alt="Escuela de Ciclismo de Encarnación"
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        </picture>
                    </div>
                    <div class="p-7 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t border-slate-100">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">Miércoles y Sábados &bull; Parque de la Ciudad</span>
                            <h3 class="text-lg sm:text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide mt-1">
                                Escuela de Ciclismo de Encarnación
                            </h3>
                        </div>
                        <a href="https://www.race.com.py/register.php?id=13"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center justify-center gap-2 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-6 py-3.5 transition shrink-0 shadow-md shadow-red-600/20">
                            <span>Inscribíte Aquí</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Escuela de Ciclismo de Bella Vista (Estructura Simétrica Cuadrada) -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="200">
                    <div class="aspect-[16/10] overflow-hidden bg-slate-100">
                        <picture class="w-full h-full block">
                            <source srcset="/images/pages/escuela-bellavista.webp" type="image/webp">
                            <img src="/images/pages/escuela-bellavista.jpg"
                                 alt="Escuela de Ciclismo de Bella Vista"
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        </picture>
                    </div>
                    <div class="p-7 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t border-slate-100">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">Jueves y Domingos &bull; Plaza Bernardino Caballero</span>
                            <h3 class="text-lg sm:text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide mt-1">
                                Escuela de Ciclismo de Bella Vista
                            </h3>
                        </div>
                        <a href="https://www.race.com.py/register.php?id=18"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center justify-center gap-2 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-6 py-3.5 transition shrink-0 shadow-md shadow-red-600/20">
                            <span>Inscribíte Aquí</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CANAL OFICIAL YOUTUBE @RACEPARAGUAY (INFORMACIÓN Y SUSCRIPCIÓN) -->
    <section id="race-paraguay" class="w-full py-16 md:py-24 bg-slate-950 text-white border-t border-slate-900 relative overflow-hidden select-none">
        <!-- Resplandor sutil de fondo -->
        <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-[#eb0a1e]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="bg-neutral-900/90 border border-slate-800 p-8 sm:p-12 md:p-16 flex flex-col lg:flex-row lg:items-center justify-between gap-10" data-aos="fade-up">
                
                <!-- Columna Izquierda: Información del Canal -->
                <div class="max-w-3xl space-y-4">
                    <div class="inline-flex items-center gap-2.5 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3.5 py-1.5 tracking-widest">
                        <i class="fab fa-youtube text-sm"></i>
                        <span>Canal Oficial de YouTube</span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light font-heading uppercase tracking-normal text-white leading-tight">
                        Seguí la Pasión del Ciclismo en <span class="font-normal text-[#eb0a1e]">@RACEPARAGUAY</span>
                    </h2>

                    <p class="text-sm sm:text-base text-slate-300 font-light leading-relaxed max-w-2xl">
                        Acompañanos en YouTube para disfrutar de coberturas completas de carreras nacionales, el Panamericano de MTB, entrevistas exclusivas, clínicas técnicas y el día a día de nuestras escuelas de ciclismo.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-3 text-xs text-slate-400 font-light">
                        <span class="inline-flex items-center gap-1.5 bg-black/50 border border-slate-800 px-3 py-1.5">
                            <i class="fas fa-check text-[#eb0a1e] text-[10px]"></i> Coberturas en vivo y resúmenes
                        </span>
                        <span class="inline-flex items-center gap-1.5 bg-black/50 border border-slate-800 px-3 py-1.5">
                            <i class="fas fa-check text-[#eb0a1e] text-[10px]"></i> Panamericano MTB
                        </span>
                        <span class="inline-flex items-center gap-1.5 bg-black/50 border border-slate-800 px-3 py-1.5">
                            <i class="fas fa-check text-[#eb0a1e] text-[10px]"></i> Consur Bike Kids
                        </span>
                    </div>
                </div>

                <!-- Columna Derecha: Tarjeta de Suscripción CTA -->
                <div class="shrink-0 flex flex-col sm:flex-row lg:flex-col items-start sm:items-center lg:items-stretch gap-4 p-6 bg-black/70 border border-slate-800 lg:min-w-[320px]">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 bg-[#eb0a1e] flex items-center justify-center shrink-0 shadow-lg shadow-red-600/30">
                            <i class="fab fa-youtube text-2xl text-white"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-white uppercase tracking-wider block font-heading">RACE PARAGUAY</span>
                            <span class="text-[11px] text-slate-400 font-mono">@RACEPARAGUAY</span>
                        </div>
                    </div>

                    <a href="https://www.youtube.com/@RACEPARAGUAY?sub_confirmation=1"
                       target="_blank" rel="noopener"
                       title="Suscribirse en YouTube"
                       class="w-12 h-12 sm:w-14 sm:h-14 inline-flex items-center justify-center bg-[#eb0a1e] hover:bg-red-700 text-white transition-all duration-300 shadow-xl shadow-red-600/25">
                        <i class="fab fa-youtube text-2xl"></i>
                    </a>

                    <p class="text-[10px] text-slate-500 text-center font-light">
                        Contenido gratuito para toda la comunidad ciclista
                    </p>
                </div>

            </div>
        </div>
    </section>

</div>
HTML;

        Page::updateOrCreate(
            ['slug' => 'consur-bike'],
            [
                'title' => 'Consur Bike',
                'subtitle' => 'El Ciclismo está en nuestra sangre • Corre por nuestras venas • Vivimos y respiramos ciclismo.',
                'banner_image' => '/images/pages/consurbike-hero.jpg',
                'content' => $bikeHtml,
                'meta_title' => 'Consur Bike – Bicicletas Specialized, Accesorios y Escuela de Ciclismo | Consur S.A.',
                'meta_description' => 'Consur Bike: distribuidor oficial de bicicletas y equipamiento Specialized, E-Bikes, Consur Bike Kids y Consur Bike Club en Encarnación y Bella Vista.',
                'is_published' => true,
                'sort_order' => 6,
            ]
        );
    }
}

