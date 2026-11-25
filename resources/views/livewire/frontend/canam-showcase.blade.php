<div class="bg-neutral-950 text-neutral-100 min-h-screen selection:bg-amber-500 selection:text-black font-sans"
     x-data="{ 
         filter: @entangle('activeCategory'),
         lightboxImage: null,
         openLightbox(img) {
             this.lightboxImage = img;
             document.body.classList.add('overflow-hidden');
         },
         closeLightbox() {
             this.lightboxImage = null;
             document.body.classList.remove('overflow-hidden');
         }
     }"
     @keydown.escape.window="if (lightboxImage) { closeLightbox(); }">

    <!-- 1. HERO SECTION CINEMATOGRÁFICO CON PARALLAX -->
    <section class="relative w-full min-h-[580px] lg:min-h-[680px] flex items-center justify-center overflow-hidden bg-black">
        <!-- Imagen de Fondo con Efecto de Profundidad -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/canam/banner-can-am.png') }}" 
                 alt="Can-Am Paraguay CONSUR S.A." 
                 class="w-full h-full object-cover object-center opacity-45 scale-105 transform motion-safe:transition-transform duration-1000 ease-out" />
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/60 to-black/70"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-amber-500/10 via-transparent to-transparent"></div>
        </div>

        <!-- Contenido Central del Hero -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center flex flex-col items-center">
            <!-- Logo Oficial Can-Am -->
            <div class="mb-6 flex justify-center" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('images/canam/logo-canam.png') }}" 
                     alt="Can-Am Off-Road BRP" 
                     class="h-16 md:h-20 w-auto object-contain drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] filter brightness-110" />
            </div>

            <!-- Título Principal con Raleway Liviana y Elegante -->
            <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-light tracking-tight text-white max-w-5xl leading-tight mb-6 font-heading"
                data-aos="fade-up" data-aos-delay="200">
                CONQUISTA CUALQUIER <span class="font-bold text-amber-500 uppercase">TERRENO</span>
            </h1>

            <p class="text-neutral-3xl text-neutral-300 max-w-3xl text-sm sm:text-base md:text-lg font-light leading-relaxed mb-10 tracking-wide"
               data-aos="fade-up" data-aos-delay="300">
                Desde un camino abierto hasta los senderos más desafiantes y las dunas del Paraguay. 
                Descubrí la gama de vehículos <strong class="text-white font-medium">Side-by-Side (SSV)</strong> y 
                <strong class="text-white font-medium">Cuadriciclos (ATV)</strong> con tecnología Rotax® y garantía oficial CONSUR.
            </p>

            <!-- Botones de Acción Hero -->
            <div class="flex flex-col items-center gap-5 w-full sm:w-auto"
                 data-aos="fade-up" data-aos-delay="400">
                <div class="flex flex-wrap items-center justify-center gap-4 w-full sm:w-auto">
                    <a href="#catalogo-canam" 
                       class="w-full sm:w-auto px-8 py-3.5 bg-amber-500 hover:bg-amber-400 text-black font-bold uppercase tracking-wider text-xs sm:text-sm transition-all duration-300 shadow-xl shadow-amber-500/20 text-center">
                        <i class="fas fa-th-large mr-2"></i> Ver Modelos Disponibles
                    </a>
                    <a href="#cotizar" 
                       class="w-full sm:w-auto px-8 py-3.5 bg-neutral-900/80 hover:bg-neutral-800 text-white font-semibold uppercase tracking-wider text-xs sm:text-sm border border-neutral-700 hover:border-amber-500 transition-all duration-300 backdrop-blur-sm text-center">
                        <i class="fas fa-file-invoice-dollar mr-2 text-amber-500"></i> Cotizar
                    </a>
                </div>

                <!-- Contacto WhatsApp con Asesores -->
                <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-black/60 border border-white/10 backdrop-blur-md shadow-lg">
                    <span class="text-xs sm:text-sm text-neutral-300 font-light">Comunicate con nuestros asesores</span>
                    <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., me interesa conocer más sobre los modelos Can-Am Off-Road.') }}" 
                       target="_blank" 
                       rel="noopener"
                       aria-label="WhatsApp"
                       class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white text-base transition-all hover:scale-110 shadow-md shadow-emerald-600/30">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Indicador de Scroll -->
        <a href="#catalogo-canam" class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 text-neutral-400 hover:text-amber-400 transition flex flex-col items-center gap-1">
            <span class="text-[10px] uppercase tracking-widest font-mono">Descubrir</span>
            <i class="fas fa-chevron-down text-xs animate-bounce"></i>
        </a>
    </section>

    <!-- 2. BARRA DE CARACTERÍSTICAS Y PRESTIGIO BRP -->
    <section class="border-y border-neutral-800 bg-neutral-900/60 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-x-0 md:divide-x divide-neutral-800">
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-amber-500 font-heading mb-1">ROTAX®</div>
                    <div class="text-xs uppercase tracking-widest text-neutral-400 font-medium">Motores de hasta 135 HP / 101 HP</div>
                </div>
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-white font-heading mb-1">SMART-LOK™</div>
                    <div class="text-xs uppercase tracking-widest text-neutral-400 font-medium">Bloqueo Inteligente de Diferencial</div>
                </div>
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-amber-500 font-heading mb-1">FOX® & SHOWA</div>
                    <div class="text-xs uppercase tracking-widest text-neutral-400 font-medium">Suspensión de Competición Activa</div>
                </div>
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-white font-heading mb-1">CONSUR S.A.</div>
                    <div class="text-xs uppercase tracking-widest text-neutral-400 font-medium">Garantía, Servicio & Repuestos Oficiales</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CATÁLOGO INTERACTIVO DE MODELOS (TODO EN LA MISMA LANDING) -->
    <section id="catalogo-canam" class="py-16 md:py-24 bg-neutral-950 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Encabezado de Sección -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 border-b border-neutral-800 pb-6 gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-amber-500 block mb-2">
                        Línea Oficial 2025 / 2026
                    </span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-tight font-heading">
                        Modelos Disponibles en <span class="font-normal text-amber-500">CONSUR</span>
                    </h2>
                    <p class="text-neutral-400 text-sm sm:text-base font-light mt-2 max-w-xl">
                        Descargá la ficha técnica oficial en PDF de cada modelo con sus especificaciones de motor, dimensiones y equipamiento de fábrica.
                    </p>
                </div>

                <!-- Filtros Interactivos por Categoría (Alpine.js) -->
                <div class="flex items-center gap-2 bg-neutral-900 border border-neutral-800 p-1 overflow-x-auto max-w-full">
                    <button type="button" 
                            @click="filter = 'all'" 
                            :class="filter === 'all' ? 'bg-amber-500 text-black font-bold shadow-md' : 'text-neutral-400 hover:text-white font-medium'"
                            class="px-4 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        Todos (8)
                    </button>
                    <button type="button" 
                            @click="filter = 'ssv'" 
                            :class="filter === 'ssv' ? 'bg-amber-500 text-black font-bold shadow-md' : 'text-neutral-400 hover:text-white font-medium'"
                            class="px-4 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        Side-by-Side SSV (5)
                    </button>
                    <button type="button" 
                            @click="filter = 'atv'" 
                            :class="filter === 'atv' ? 'bg-amber-500 text-black font-bold shadow-md' : 'text-neutral-400 hover:text-white font-medium'"
                            class="px-4 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        Cuadriciclos ATV (3)
                    </button>
                </div>
            </div>

            <!-- Grilla de Tarjetas Verticales de Modelos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($models as $key => $model)
                    <div class="group bg-neutral-900 border border-neutral-800 hover:border-amber-500/80 transition-all duration-300 flex flex-col justify-between overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-amber-500/10"
                         x-show="filter === 'all' || filter === '{{ $model['category'] }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100">
                        
                        <!-- Afiche Vertical Oficial de CONSUR -->
                        <div class="relative w-full aspect-[9/14] bg-neutral-950 overflow-hidden cursor-pointer"
                             @click="openLightbox('{{ $model['image'] }}')">
                            <img src="{{ $model['image'] }}" 
                                 alt="{{ $model['name'] }}" 
                                 loading="lazy"
                                 class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out" />
                            
                            <!-- Overlay Gradiente -->
                            <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-transparent to-black/30 pointer-events-none"></div>

                            <!-- Badge de Categoría -->
                            <div class="absolute top-3 left-3 z-10">
                                <span class="px-2.5 py-1 bg-black/80 backdrop-blur-md text-[10px] font-bold uppercase tracking-widest text-amber-400 border border-amber-500/30">
                                    {{ $model['category_label'] }}
                                </span>
                            </div>

                            <!-- Botón Lupa Lightbox -->
                            <div class="absolute top-3 right-3 z-10 opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-8 h-8 rounded-full bg-black/80 text-white flex items-center justify-center hover:bg-amber-500 hover:text-black transition shadow-lg text-xs"
                                      title="Ampliar Afiche">
                                    <i class="fas fa-search-plus"></i>
                                </span>
                            </div>

                            <!-- Badge Destacado Inferior -->
                            <div class="absolute bottom-3 left-3 right-3 z-10 pointer-events-none">
                                <div class="text-[11px] font-mono font-bold tracking-wider text-amber-400 bg-neutral-950/90 px-2.5 py-1 border-l-2 border-amber-500 inline-block shadow">
                                    {{ $model['badge'] }}
                                </div>
                            </div>
                        </div>

                        <!-- Información y Especificaciones del Modelo -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <!-- Nombre del Modelo -->
                                <h3 class="text-lg md:text-xl font-bold text-white group-hover:text-amber-400 transition font-heading leading-snug mb-1">
                                    {{ $model['name'] }}
                                </h3>
                                
                                <!-- Color / Edición -->
                                <div class="text-xs text-neutral-400 font-light mb-3 flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-amber-500 inline-block"></span>
                                    <span>Color: <strong class="text-neutral-300 font-medium">{{ $model['color'] }}</strong></span>
                                </div>

                                <!-- Tagline Resumen -->
                                <p class="text-xs text-neutral-300 font-light line-clamp-2 mb-4 leading-relaxed">
                                    {{ $model['tagline'] }}
                                </p>

                                <!-- Lista Rápida de Características Clave -->
                                <ul class="space-y-1.5 mb-5 border-t border-neutral-800 pt-3 text-[11px] text-neutral-300">
                                    @foreach(array_slice($model['highlights'], 0, 3) as $hl)
                                        <li class="flex items-start gap-1.5">
                                            <i class="fas fa-check text-amber-500 text-[10px] mt-0.5 shrink-0"></i>
                                            <span class="line-clamp-1">{{ $hl }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Botón Único de Descarga Ficha PDF Oficial -->
                            <div class="pt-4 border-t border-neutral-800">
                                <a href="{{ $model['pdf'] }}" 
                                   target="_blank" 
                                   download
                                   class="w-full py-2.5 bg-neutral-950 hover:bg-neutral-800 text-neutral-200 hover:text-white font-semibold text-xs uppercase tracking-wider transition flex items-center justify-center gap-2 border border-neutral-800 hover:border-amber-500 text-center shadow-xs group/btn"
                                   title="Descargar Ficha Técnica en PDF">
                                    <i class="fas fa-file-pdf text-red-500 text-sm group-hover/btn:scale-110 transition-transform"></i>
                                    <span>Ficha</span>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- 4. SECCIÓN INSTITUCIONAL AUTOMARKET: "¿CUÁL ES TU LUGAR FAVORITO PARA TU PRÓXIMA AVENTURA?" -->
    <section class="py-20 bg-neutral-900 border-t border-neutral-800 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.3em] text-amber-500 block mb-2">Viví la Experiencia Can-Am</span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-tight font-heading">
                    ¿Cuál es tu lugar favorito para tu <span class="font-normal text-amber-500">próxima aventura</span>?
                </h2>
                <p class="text-neutral-400 text-sm sm:text-base font-light mt-3 leading-relaxed">
                    Can-Am nació para los apasionados que buscan superar cualquier límite. 
                    Desde expediciones en el Chaco hasta las dunas de San Cosme y las serranías de Itapúa, 
                    cada máquina está configurada para entregarte el máximo control y fiabilidad.
                </p>
            </div>

            <!-- Grilla de Experiencias y Terrenos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 bg-neutral-950 border border-neutral-800 hover:border-amber-500/50 transition">
                    <div class="w-12 h-12 bg-amber-500/10 border border-amber-500/30 text-amber-400 flex items-center justify-center text-xl mb-6">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white uppercase tracking-wider mb-2 font-heading">Dunas & Senderos Extremos</h3>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        Con los Maverick X3 DS y RS Turbo de 72 pulgadas, la suspensión SHOWA HPG y los neumáticos XPS Trac Force devoran la arena y el barro con una agilidad insuperable.
                    </p>
                </div>

                <div class="p-8 bg-neutral-950 border border-neutral-800 hover:border-amber-500/50 transition">
                    <div class="w-12 h-12 bg-amber-500/10 border border-amber-500/30 text-amber-400 flex items-center justify-center text-xl mb-6">
                        <i class="fas fa-tractor"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white uppercase tracking-wider mb-2 font-heading">Trabajo en Estancias & Campo</h3>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        La gama Defender HD y Outlander PRO ofrecen hasta 1,134 kg de arrastre, cajas basculantes, limitador de velocidad de trabajo y la robustez requerida para las labores diarias en el interior del país.
                    </p>
                </div>

                <div class="p-8 bg-neutral-950 border border-neutral-800 hover:border-amber-500/50 transition">
                    <div class="w-12 h-12 bg-amber-500/10 border border-amber-500/30 text-amber-400 flex items-center justify-center text-xl mb-6">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white uppercase tracking-wider mb-2 font-heading">Aventura Familiar & Touring</h3>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        Con los Defender MAX para 6 personas y los Outlander MAX biplaza, podés compartir travesías de fin de semana con total confort, asientos ergonómicos y malacates de rescate instalados de fábrica.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. HISTORIA DE CAN-AM: LÍNEA DE TIEMPO INTERACTIVA (1973 - HOY) -->
    <section class="py-20 bg-neutral-950 border-t border-neutral-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.3em] text-amber-500 block mb-2">ADN Ganador</span>
                <h2 class="text-3xl sm:text-4xl font-light text-white tracking-tight font-heading">
                    Descubre la Historia de <span class="font-normal text-amber-500">Can-Am</span>
                </h2>
                <p class="text-neutral-400 text-xs sm:text-sm font-light mt-2">
                    Más de 50 años revolucionando el mundo de la competición y el off-road global.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <div class="p-5 bg-neutral-900/60 border-l-2 border-amber-500">
                    <div class="text-amber-500 font-mono font-bold text-lg mb-1">1973</div>
                    <h4 class="text-sm font-bold text-white mb-2 font-heading">Nacimiento del Mito</h4>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        Can-Am irrumpe en el motocross de competición y conquista los campeonatos nacionales estadounidenses AMA de 250 cc ganando oro, plata y bronce.
                    </p>
                </div>
                <div class="p-5 bg-neutral-900/60 border-l-2 border-neutral-700">
                    <div class="text-neutral-400 font-mono font-bold text-lg mb-1">1997</div>
                    <h4 class="text-sm font-bold text-white mb-2 font-heading">Revolución Traxter</h4>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        Lanzamiento del revolucionario Traxter, el primer ATV con paso libre entre asientos y motor de trabajo utilitario de alta resistencia.
                    </p>
                </div>
                <div class="p-5 bg-neutral-900/60 border-l-2 border-neutral-700">
                    <div class="text-neutral-400 font-mono font-bold text-lg mb-1">2010</div>
                    <h4 class="text-sm font-bold text-white mb-2 font-heading">Llega el Commander</h4>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        Can-Am ingresa al segmento Side-by-Side con el Commander 1000 de 85 HP, estableciendo un nuevo estándar de potencia y suspensión.
                    </p>
                </div>
                <div class="p-5 bg-neutral-900/60 border-l-2 border-neutral-700">
                    <div class="text-neutral-400 font-mono font-bold text-lg mb-1">2016</div>
                    <h4 class="text-sm font-bold text-white mb-2 font-heading">Defender & Maverick X3</h4>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        Presentación del Maverick X3 con suspensión TTX de recorrido monumental y de la línea utilitaria Defender para trabajo rudo.
                    </p>
                </div>
                <div class="p-5 bg-neutral-900/60 border-l-2 border-amber-500 bg-amber-500/5">
                    <div class="text-amber-400 font-mono font-bold text-lg mb-1">HOY</div>
                    <h4 class="text-sm font-bold text-white mb-2 font-heading">Smart-Shox & CONSUR</h4>
                    <p class="text-xs text-neutral-400 font-light leading-relaxed">
                        CONSUR S.A. acerca a Encarnación e Itapúa la gama de última generación con suspensión activa Smart-Shox y pantallas táctiles de 10.25".
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. FORMULARIO DE COTIZACIÓN & CONTACTO CONSUR -->
    <section id="cotizar" class="py-20 bg-neutral-900 border-t border-neutral-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Columna Izquierda: Información de Concesionaria -->
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-amber-500 block">Atención Personalizada</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-white tracking-tight font-heading leading-tight">
                        ¿Querés cotizar tu <span class="font-normal text-amber-500">Can-Am</span> en CONSUR?
                    </h2>
                    <p class="text-neutral-300 text-sm font-light leading-relaxed">
                        Dejanos tus datos o comunicate con nuestro equipo especializado de ventas off-road. 
                        Te asesoramos con disponibilidad de modelos, planes de financiación y entrega inmediata en Encarnación y sucursales.
                    </p>

                    <div class="space-y-4 pt-4 border-t border-neutral-800 text-sm text-neutral-300 font-light">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 rounded-full bg-neutral-800 text-amber-500 flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <span>Casa Matriz: <strong>Av. Bernardino Caballero 749, Encarnación</strong></span>
                        </div>
                        <a href="https://wa.me/595985204106?text={{ urlencode('Hola CONSUR, quisiera consultar sobre modelos Can-Am.') }}"
                           target="_blank" rel="noopener"
                           class="flex items-center gap-3 hover:text-emerald-400 transition">
                            <span class="w-9 h-9 rounded-full bg-neutral-800 text-emerald-500 flex items-center justify-center shrink-0">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                            <span>Ventas y Asesoramiento: <strong class="text-white">+595985204106</strong></span>
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Formulario Livewire -->
                <div class="lg:col-span-7 bg-neutral-950 border border-neutral-800 p-8 sm:p-10 shadow-2xl relative">
                    
                    @if($sentSuccess)
                        <div class="p-6 bg-emerald-950/80 border border-emerald-500 text-emerald-200 text-center">
                            <i class="fas fa-check-circle text-4xl text-emerald-400 mb-3"></i>
                            <h3 class="text-lg font-bold text-white mb-1 font-heading">¡Solicitud Recibida con Éxito!</h3>
                            <p class="text-xs sm:text-sm text-emerald-300 font-light mb-4">
                                Gracias por escribirnos. Uno de nuestros asesores comerciales Can-Am se pondrá en contacto contigo a la brevedad.
                            </p>
                            <button type="button" 
                                    wire:click="$set('sentSuccess', false)" 
                                    class="px-6 py-2 bg-emerald-500 hover:bg-emerald-400 text-black font-bold uppercase text-xs tracking-wider transition">
                                Enviar Otra Consulta
                            </button>
                        </div>
                    @else
                        <form wire:submit.prevent="submitLead" class="space-y-5">
                            <h3 class="text-xl font-bold text-white uppercase tracking-wider font-heading mb-4 pb-2 border-b border-neutral-800">
                                Formulario de Cotización Can-Am
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-neutral-400 font-medium mb-1.5">
                                        Nombre y Apellido *
                                    </label>
                                    <input type="text" 
                                           wire:model="name" 
                                           placeholder="Ej: Carlos Benítez"
                                           class="w-full bg-neutral-900 border border-neutral-700 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-neutral-400 font-medium mb-1.5">
                                        Teléfono / WhatsApp *
                                    </label>
                                    <input type="text" 
                                           wire:model="phone" 
                                           placeholder="Ej: 0985 123 456"
                                           class="w-full bg-neutral-900 border border-neutral-700 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('phone') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-neutral-400 font-medium mb-1.5">
                                        Correo Electrónico
                                    </label>
                                    <input type="email" 
                                           wire:model="email" 
                                           placeholder="ejemplo@correo.com"
                                           class="w-full bg-neutral-900 border border-neutral-700 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-neutral-400 font-medium mb-1.5">
                                        Ciudad / Departamento
                                    </label>
                                    <input type="text" 
                                           wire:model="city" 
                                           placeholder="Ej: Encarnación / Itapúa"
                                           class="w-full bg-neutral-900 border border-neutral-700 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('city') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs uppercase tracking-wider text-neutral-400 font-medium mb-1.5">
                                    Modelo de Interés *
                                </label>
                                <select wire:model="vehicleInterest"
                                        class="w-full bg-neutral-900 border border-neutral-700 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 text-white text-sm pl-4 pr-10 py-2.5 outline-none transition">
                                    @foreach($this->getModels() as $m)
                                        <option value="{{ $m['name'] }}">{{ $m['name'] }} ({{ $m['category_label'] }})</option>
                                    @endforeach
                                </select>
                                @error('vehicleInterest') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs uppercase tracking-wider text-neutral-400 font-medium mb-1.5">
                                    Mensaje o Consulta Adicional
                                </label>
                                <textarea wire:model="message" 
                                          rows="3" 
                                          placeholder="¿Tenés alguna consulta específica sobre financiación, uso para trabajo o entrega?"
                                          class="w-full bg-neutral-900 border border-neutral-700 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 text-white text-sm px-4 py-2.5 outline-none transition"></textarea>
                                @error('message') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" 
                                    class="w-full py-3.5 bg-amber-500 hover:bg-amber-400 text-black font-bold uppercase tracking-widest text-xs transition shadow-lg flex items-center justify-center gap-2">
                                <span wire:loading.remove wire:target="submitLead">
                                    <i class="fas fa-paper-plane mr-1"></i> Enviar Solicitud de Cotización
                                </span>
                                <span wire:loading wire:target="submitLead">
                                    <i class="fas fa-circle-notch fa-spin mr-1"></i> Procesando...
                                </span>
                            </button>
                        </form>
                    @endif

                </div>

            </div>
        </div>
    </section>

    <!-- 7. LIGHTBOX A PANTALLA COMPLETA PARA EL AFICHE VERTICAL -->
    <div x-show="lightboxImage" 
         x-cloak
         class="fixed inset-0 z-[60] bg-black/95 backdrop-blur-xl flex items-center justify-center p-4"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click="closeLightbox()">
        
        <button type="button" 
                @click="closeLightbox()" 
                class="absolute top-6 right-6 z-20 w-12 h-12 rounded-full bg-neutral-900/90 text-white hover:bg-amber-500 hover:text-black transition flex items-center justify-center text-lg border border-neutral-700 shadow-2xl">
            <i class="fas fa-times"></i>
        </button>

        <div class="max-w-4xl max-h-[92vh] flex items-center justify-center p-2" @click.stop>
            <img :src="lightboxImage" 
                 alt="Afiche Oficial Can-Am CONSUR" 
                 class="max-w-full max-h-[90vh] object-contain rounded shadow-2xl border border-neutral-800" />
        </div>
    </div>

</div>
