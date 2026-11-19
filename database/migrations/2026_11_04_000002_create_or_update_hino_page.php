<?php

use App\Models\Brand;
use App\Models\Page;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Actualizar Marca HINO
        Brand::where('slug', 'hino')->update([
            'logo_url' => '/images/hino/logo.png',
            'banner_image' => '/images/hino/banner-hero.jpg',
            'custom_url' => '/hino',
            'is_active' => true,
            'is_featured_menu' => true,
        ]);

        // 2. Contenido HINO con formato moderno CONSUR S.A.
        $hinoContent = <<<'HTML'
<div data-cms-layout="modern" class="space-y-16 md:space-y-24">

    <!-- 1. Bloque Introductorio: HINO Motors & Grupo Toyota -->
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-10 lg:p-14 overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center gap-3">
                    <img src="/images/hino/logo.png" alt="Hino Logo" class="h-8 sm:h-10 w-auto object-contain">
                    <span class="h-6 w-px bg-slate-200"></span>
                    <span class="text-xs uppercase font-bold tracking-widest text-red-600">
                        Grupo Toyota &bull; Calidad Japonesa
                    </span>
                </div>

                <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 font-heading uppercase tracking-wide leading-tight">
                    El mayor fabricante de camiones para servicio comercial de Japón
                </h2>

                <p class="text-base sm:text-lg font-medium text-slate-700">
                    Potencia, durabilidad inquebrantable y el respaldo integral de Soporte Total para tu negocio.
                </p>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    <strong>HINO</strong>, la prestigiosa división de camiones comerciales de <strong>Toyota Group</strong>, es sinónimo de eficiencia, resistencia y rentabilidad operativa a nivel global. A través de <strong>Consur S.A.</strong>, te acercamos a Paraguay la línea completa de camiones diseñados para cumplir con las más altas exigencias de transporte, distribución urbana y logística pesada.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20asesoramiento%20y%20cotizaci%C3%B3n%20sobre%20camiones%20HINO." 
                       target="_blank" 
                       class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white text-xs sm:text-sm font-semibold rounded-xl shadow-md transition-all">
                        <i class="fab fa-whatsapp text-base"></i>
                        <span>Solicitar Cotización</span>
                    </a>
                    <a href="#modelos-hino" 
                       class="inline-flex items-center gap-2 px-6 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs sm:text-sm font-semibold rounded-xl transition-all">
                        <span>Ver Modelos Disponibles</span>
                        <i class="fas fa-arrow-down text-xs"></i>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="relative rounded-2xl overflow-hidden shadow-lg border border-slate-200/80 group">
                    <img src="/images/hino/hino-editada.jpg" 
                         alt="Camiones Hino en Paraguay" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/80 via-slate-950/40 to-transparent p-5">
                        <span class="text-white text-xs font-semibold tracking-wider uppercase block">
                            Garantía Oficial de 3 Años o 100.000 Km
                        </span>
                        <span class="text-slate-300 text-[11px] block mt-0.5">
                            Respaldo de fábrica y servicio de posventa garantizado
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Pilares de la Marca HINO (Total Support, QDR, Eco Drive, Respaldo) -->
    <section class="space-y-8">
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <span class="text-xs uppercase font-bold tracking-widest text-red-600">
                Ventajas Competitivas Hino
            </span>
            <h3 class="text-2xl sm:text-3xl font-light text-slate-900 font-heading uppercase tracking-wide">
                Por Qué Elegir un Camión HINO
            </h3>
            <p class="text-sm text-slate-500">
                La fórmula de valor que asegura la máxima rentabilidad y el menor costo operativo por kilómetro recorrido.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pilar 1: Soporte Total -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs space-y-4 hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl">
                    <i class="fas fa-handshake-angle"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading uppercase">
                    Soporte Total (Total Support)
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Al adquirir un camión Hino usted accede al sistema de Soporte Total. Nuestro objetivo es que su unidad esté trabajando siempre, minimizando tiempos de inactividad técnica para mantener su productividad activa.
                </p>
            </div>

            <!-- Pilar 2: QDR Durabilidad -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs space-y-4 hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading uppercase">
                    QDR: Calidad y Durabilidad
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Los camiones Hino ofrecen durabilidad sin límites. Chasis reforzado, componentes sobredimensionados y una rigurosa manufactura japonesa garantizan confiabilidad extrema incluso en faenas severas.
                </p>
            </div>

            <!-- Pilar 3: Hino Eco Drive -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs space-y-4 hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                    <i class="fas fa-leaf"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading uppercase">
                    Hino Eco Drive
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Equipados con tecnología de avanzada para proveer bajas emisiones y una óptima eficiencia en el consumo de combustible, complementado con recomendaciones y seminarios de conducción ecológica.
                </p>
            </div>

            <!-- Pilar 4: Garantía y Respaldo Oficial -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs space-y-4 hover:shadow-md transition-shadow">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl">
                    <i class="fas fa-certificate"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading uppercase">
                    Garantía 3 Años o 100.000 Km
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Tenga la tranquilidad de contar con el respaldo institucional más sólido del país, provisión permanente de repuestos genuinos y talleres autorizados con técnicos capacitados en fábrica.
                </p>
            </div>
        </div>
    </section>

    <!-- 3. Bloque ADN Rally Dakar -->
    <section class="bg-neutral-900 text-white rounded-3xl p-8 sm:p-12 lg:p-16 relative overflow-hidden shadow-xl">
        <div class="absolute inset-0 z-0">
            <img src="/images/hino/banner-dakar.jpg" alt="Hino Rally Dakar" class="w-full h-full object-cover opacity-30 object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-neutral-950 via-neutral-950/85 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-2xl space-y-4">
            <div class="inline-flex items-center gap-2 bg-red-600 text-white text-[11px] font-extrabold uppercase px-3 py-1 rounded-md tracking-wider">
                <i class="fas fa-trophy"></i>
                <span>Espíritu & Resistencia Dakar</span>
            </div>

            <h3 class="text-2xl sm:text-3xl md:text-4xl font-light uppercase tracking-wide font-heading leading-tight">
                Probado en la carrera más dura del mundo
            </h3>

            <p class="text-sm sm:text-base text-neutral-300 leading-relaxed font-light">
                El equipo <strong>Hino Dakar</strong> ha participado ininterrumpidamente en más de 25 ediciones del Rally Dakar, completando siempre las etapas más inclementes del planeta. Este récord histórico es el resultado directo de la alta resistencia, robustez mecánica y calidad japonesa que define a cada camión Hino que trabaja en nuestras rutas.
            </p>

            <div class="pt-2 flex items-center gap-6 text-xs text-neutral-400">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-red-500"></i>
                    <span>+25 Ediciones consecutivas</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-red-500"></i>
                    <span>Fiabilidad bajo condiciones extremas</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Modelos Disponibles en Paraguay (Serie 200, Serie 300, Serie 500) -->
    <section id="modelos-hino" class="space-y-10">
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <span class="text-xs uppercase font-bold tracking-widest text-red-600">
                Línea Comercial Oficial
            </span>
            <h3 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 font-heading uppercase tracking-wide">
                Los 3 Modelos Disponibles en Paraguay
            </h3>
            <p class="text-sm text-slate-500">
                Soluciones a medida para cada escala de carga: desde transporte urbano ágil hasta logística semipesada interurbana.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- MODELO 1: HINO SERIE 200 -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between hover:shadow-lg transition-all">
                <div>
                    <!-- Imagen de Portada -->
                    <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                        <img src="/images/hino/hino200.jpg" alt="Hino Serie 200" class="w-full h-full object-cover">
                        <div class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-extrabold uppercase px-2.5 py-1 rounded shadow">
                            Serie 200 &bull; Ligero Urbano
                        </div>
                        <div class="absolute bottom-3 right-3 bg-slate-950/80 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-lg">
                            Carga: 2.200 Kg
                        </div>
                    </div>

                    <div class="p-6 sm:p-7 space-y-4">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Modelo 410</span>
                            <h4 class="text-xl font-bold text-slate-900 font-heading uppercase">
                                HINO Serie 200
                            </h4>
                        </div>

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Un vehículo HINO 200 es garantía de calidad y satisfacción. No es sólo un camión, es un conjunto de grandes beneficios a largo plazo. Camión ligero de alta eficiencia, bajo consumo de combustible, motor de bajas emisiones, alta maniobrabilidad, ideal para espacios reducidos, confortable y con bajos costos de mantenimiento.
                        </p>

                        <!-- Especificaciones Clave -->
                        <div class="space-y-2 pt-2 border-t border-slate-100 text-xs text-slate-700">
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Capacidad de carga:</span>
                                <span class="font-bold text-slate-900">2.200 Kg</span>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Configuración:</span>
                                <span class="font-bold text-slate-900">Eje Simple</span>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Capacidad eje trasero:</span>
                                <span class="font-bold text-slate-900">4.300 Kg</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="font-medium text-slate-500">Aplicación:</span>
                                <span class="font-bold text-red-600">Reparto Urbano y Fletes</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-7 pt-0">
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20200%20(Modelo%20410)." 
                       target="_blank" 
                       class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-slate-900 hover:bg-red-600 text-white text-xs font-bold uppercase rounded-xl transition-colors">
                        <i class="fab fa-whatsapp"></i>
                        <span>Cotizar Serie 200</span>
                    </a>
                </div>
            </div>

            <!-- MODELO 2: HINO SERIE 300 -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between hover:shadow-lg transition-all">
                <div>
                    <!-- Imagen de Portada -->
                    <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                        <img src="/images/hino/hino300-814.jpg" alt="Hino Serie 300" class="w-full h-full object-cover">
                        <div class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-extrabold uppercase px-2.5 py-1 rounded shadow">
                            Serie 300 &bull; Mediano Versátil
                        </div>
                        <div class="absolute bottom-3 right-3 bg-slate-950/80 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-lg">
                            Carga: 2.500 a 6.000 Kg
                        </div>
                    </div>

                    <div class="p-6 sm:p-7 space-y-4">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Modelos 512 &bull; 711 &bull; 814</span>
                            <h4 class="text-xl font-bold text-slate-900 font-heading uppercase">
                                HINO Serie 300
                            </h4>
                        </div>

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Si su objetivo fuera solamente el de acarrear cargas, no habría razón de seleccionar este camión. Este camión genera niveles bajos de emisión, contribuyendo al cuidado del medio ambiente, y su bajo nivel de consumo lo hace altamente eficiente. Su cabina fue diseñada desde la perspectiva de prevenir accidentes, con máxima seguridad y ergonomía.
                        </p>

                        <!-- Versiones Disponibles -->
                        <div class="space-y-2 pt-2 border-t border-slate-100 text-xs text-slate-700">
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Modelo 512:</span>
                                <span class="font-bold text-slate-900">2.500 Kg (Eje Simple)</span>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Modelo 711:</span>
                                <span class="font-bold text-slate-900">4.500 Kg (Eje Dual)</span>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Modelo 814:</span>
                                <span class="font-bold text-slate-900">6.000 Kg (Eje Dual)</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="font-medium text-slate-500">Aplicación:</span>
                                <span class="font-bold text-red-600">Distribución Media y Logística</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-7 pt-0">
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20300." 
                       target="_blank" 
                       class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-slate-900 hover:bg-red-600 text-white text-xs font-bold uppercase rounded-xl transition-colors">
                        <i class="fab fa-whatsapp"></i>
                        <span>Cotizar Serie 300</span>
                    </a>
                </div>
            </div>

            <!-- MODELO 3: HINO SERIE 500 -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between hover:shadow-lg transition-all">
                <div>
                    <!-- Imagen de Portada -->
                    <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                        <img src="/images/hino/hino500-1018.jpg" alt="Hino Serie 500" class="w-full h-full object-cover">
                        <div class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-extrabold uppercase px-2.5 py-1 rounded shadow">
                            Serie 500 &bull; Carga Pesada
                        </div>
                        <div class="absolute bottom-3 right-3 bg-slate-950/80 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-lg">
                            Carga: 8.500 Kg
                        </div>
                    </div>

                    <div class="p-6 sm:p-7 space-y-4">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Modelo 1018</span>
                            <h4 class="text-xl font-bold text-slate-900 font-heading uppercase">
                                HINO Serie 500
                            </h4>
                        </div>

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            El Nuevo Hino 500 presenta un diseño aerodinámico y al mismo tiempo fuerte y robusto. Fiel a su legendaria tradición de durabilidad, resistencia y confiabilidad a toda prueba, el Hino 500 se constituye en uno de los modelos más apreciados en el segmento de los camiones medianos y semipesados. Cuando usted elige un Hino, sus negocios tienen el mejor respaldo.
                        </p>

                        <!-- Especificaciones Clave -->
                        <div class="space-y-2 pt-2 border-t border-slate-100 text-xs text-slate-700">
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Capacidad de carga:</span>
                                <span class="font-bold text-slate-900">8.500 Kg</span>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Configuración:</span>
                                <span class="font-bold text-slate-900">Eje Dual Reforzado</span>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-50">
                                <span class="font-medium text-slate-500">Rendimiento:</span>
                                <span class="font-bold text-slate-900">Alto torque y bajo costo/km</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="font-medium text-slate-500">Aplicación:</span>
                                <span class="font-bold text-red-600">Interurbano, Agro e Industria</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-7 pt-0">
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20500%20(Modelo%201018)." 
                       target="_blank" 
                       class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-slate-900 hover:bg-red-600 text-white text-xs font-bold uppercase rounded-xl transition-colors">
                        <i class="fab fa-whatsapp"></i>
                        <span>Cotizar Serie 500</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- 5. Talleres Certificados & Repuestos Genuinos -->
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-10 lg:p-14 overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-6 space-y-5">
                <div class="inline-flex items-center gap-2 text-red-600 text-xs font-bold uppercase tracking-widest">
                    <i class="fas fa-tools"></i>
                    <span>Posventa Oficial Especializada</span>
                </div>

                <h3 class="text-2xl sm:text-3xl font-light text-slate-900 font-heading uppercase tracking-wide leading-tight">
                    Talleres Certificados & Repuestos Genuinos Hino
                </h3>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Contamos con talleres exclusivos con certificación de calidad y un equipo de técnicos especializados y capacitados en Hino para brindarle un servicio de excelencia. Garantizamos la tranquilidad operativa de su flota con diagnósticos precisos, mantenimiento preventivo y repuestos 100% legítimos que protegen el valor y la vida útil de su inversión.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-xs text-slate-700">
                    <div class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-red-50 text-red-600 flex items-center justify-center text-[10px] flex-shrink-0">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Técnicos certificados por fábrica</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-red-50 text-red-600 flex items-center justify-center text-[10px] flex-shrink-0">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Stock permanente de repuestos</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-red-50 text-red-600 flex items-center justify-center text-[10px] flex-shrink-0">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Mantenimiento express para flotas</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-red-50 text-red-600 flex items-center justify-center text-[10px] flex-shrink-0">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Respaldo oficial de Consur S.A.</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden shadow-md border border-slate-200">
                    <img src="/images/hino/talleres.jpg" alt="Taller Oficial Hino" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Banner Call to Action de Cotización -->
    <section class="bg-gradient-to-r from-slate-900 to-slate-950 text-white rounded-3xl p-8 sm:p-12 lg:p-14 shadow-lg border border-slate-800">
        <div class="max-w-4xl mx-auto text-center space-y-6">
            <span class="text-xs uppercase font-extrabold tracking-widest text-red-500">
                Atención Comercial & Flotas
            </span>
            <h3 class="text-2xl sm:text-3xl md:text-4xl font-light uppercase tracking-wide font-heading">
                ¿Necesitás asesoramiento para tu próximo camión?
            </h3>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                Contactate con nuestros asesores comerciales corporativos de Consur S.A. y recibí una cotización adaptada a las necesidades de carga y transporte de tu empresa.
            </p>
            <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
                <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20solicito%20presupuesto%20para%20camiones%20HINO." 
                   target="_blank" 
                   class="inline-flex items-center gap-2.5 px-8 py-4 bg-red-600 hover:bg-red-700 text-white text-sm font-bold uppercase rounded-xl shadow-lg transition-all">
                    <i class="fab fa-whatsapp text-lg"></i>
                    <span>Hablar con un Asesor Hino</span>
                </a>
                <a href="tel:+59571204106" 
                   class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 hover:bg-white/20 text-white text-sm font-semibold rounded-xl transition-all">
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
                'content' => $hinoContent,
                'meta_title' => 'Camiones HINO en Paraguay | Concesionaria Oficial Consur S.A.',
                'meta_description' => 'Descubrí los camiones HINO Serie 200, Serie 300 y Serie 500 en Consur S.A. Calidad japonesa respaldada por Toyota Group y servicio de Soporte Total.',
                'is_published' => true,
                'sort_order' => 4,
            ]
        );
    }

    public function down(): void
    {
        // No destructivo
    }
};

