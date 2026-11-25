<div class="bg-slate-950 text-slate-100 min-h-screen selection:bg-teal-500 selection:text-black font-sans"
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

    <!-- 1. HERO SECTION NÁUTICO CINEMATOGRÁFICO CON PARALLAX -->
    <section class="relative w-full min-h-[580px] lg:min-h-[680px] flex items-center justify-center overflow-hidden bg-slate-950">
        <!-- Imagen de Fondo con Olas y Agua Turquesa -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/seadoo/sea-doo-main-banner.jpg') }}" 
                 alt="Sea-Doo Paraguay CONSUR S.A." 
                 class="w-full h-full object-cover object-center opacity-45 scale-105 transform motion-safe:transition-transform duration-1000 ease-out" />
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-black/75"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-teal-500/10 via-transparent to-transparent"></div>
        </div>

        <!-- Contenido Central del Hero -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center flex flex-col items-center">
            <!-- Badge BRP / Sea-Doo -->
            <div class="inline-flex items-center gap-3 px-4 py-1.5 bg-slate-900/90 border border-teal-500/40 text-teal-300 text-xs font-semibold uppercase tracking-[0.25em] mb-6 backdrop-blur-md shadow-2xl"
                 data-aos="fade-down">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                Concesionario Oficial Sea-Doo • CONSUR S.A.
            </div>

            <!-- Logo Oficial Sea-Doo -->
            <div class="mb-6 flex justify-center" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('images/seadoo/logo-seadoo.png') }}" 
                     alt="Sea-Doo BRP" 
                     class="h-16 md:h-20 w-auto object-contain drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] filter brightness-110" />
            </div>

            <!-- Título Principal -->
            <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-light tracking-tight text-white max-w-5xl leading-tight mb-6 font-heading"
                data-aos="fade-up" data-aos-delay="200">
                VIVA LA VIDA <span class="font-bold text-teal-400 uppercase">SEA-DOO</span>
            </h1>

            <p class="text-slate-300 max-w-3xl text-sm sm:text-base md:text-lg font-light leading-relaxed mb-10 tracking-wide"
               data-aos="fade-up" data-aos-delay="300">
                Nuestras motos acuáticas y pontones son mejores que nunca. Una potencia récord de 
                <strong class="text-white font-medium">325 HP</strong>, la diversión ágil del <strong class="text-white font-medium">Spark Trixx</strong> y la revolución modular de los pontones <strong class="text-white font-medium">Switch</strong> en Encarnación y las playas de Itapúa.
            </p>

            <!-- Botones de Acción Hero -->
            <div class="flex flex-wrap items-center justify-center gap-4 w-full sm:w-auto"
                 data-aos="fade-up" data-aos-delay="400">
                <a href="#catalogo-seadoo" 
                   class="w-full sm:w-auto px-8 py-3.5 bg-teal-500 hover:bg-teal-400 text-black font-bold uppercase tracking-wider text-xs sm:text-sm transition-all duration-300 shadow-xl shadow-teal-500/20 text-center">
                    <i class="fas fa-water mr-2"></i> Ver Modelos Disponibles (8)
                </a>
                <a href="#cotizar" 
                   class="w-full sm:w-auto px-8 py-3.5 bg-slate-900/80 hover:bg-slate-800 text-white font-semibold uppercase tracking-wider text-xs sm:text-sm border border-slate-700 hover:border-teal-400 transition-all duration-300 backdrop-blur-sm text-center">
                    <i class="fas fa-paper-plane mr-2 text-teal-400"></i> Solicitar Asesoría
                </a>
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., me interesa conocer más sobre las motos de agua y pontones Sea-Doo.') }}" 
                   target="_blank" 
                   rel="noopener"
                   class="w-full sm:w-auto px-8 py-3.5 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold uppercase tracking-wider text-xs sm:text-sm transition-all duration-300 shadow-lg shadow-emerald-600/20 text-center flex items-center justify-center">
                    <i class="fab fa-whatsapp mr-2 text-base"></i> WhatsApp Directo
                </a>
            </div>
        </div>

        <!-- Indicador de Scroll -->
        <a href="#catalogo-seadoo" class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 text-slate-400 hover:text-teal-400 transition flex flex-col items-center gap-1">
            <span class="text-[10px] uppercase tracking-widest font-mono">Explorar Flota</span>
            <i class="fas fa-chevron-down text-xs animate-bounce"></i>
        </a>
    </section>

    <!-- 2. BARRA DE ADN NÁUTICO SEA-DOO -->
    <section class="border-y border-slate-800 bg-slate-900/60 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-x-0 md:divide-x divide-slate-800">
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-teal-400 font-heading mb-1">325 HP</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400 font-medium">Potencia Récord Mundial Rotax®</div>
                </div>
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-white font-heading mb-1">iBR® GEN III</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400 font-medium">Freno y Marcha Atrás Inteligente</div>
                </div>
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-teal-400 font-heading mb-1">CASCO ST3™</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400 font-medium">Estabilidad Líder en Olas y Fondeo</div>
                </div>
                <div class="px-4 py-2">
                    <div class="text-2xl sm:text-3xl font-black text-white font-heading mb-1">SWITCH LINQ®</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400 font-medium">Pontones Modulares con Propulsión Jet</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CATÁLOGO INTERACTIVO DE MODELOS (TODO EN LA MISMA LANDING) -->
    <section id="catalogo-seadoo" class="py-16 md:py-24 bg-slate-950 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Encabezado de Sección -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 border-b border-slate-800 pb-6 gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-teal-400 block mb-2">
                        Línea Oficial Sea-Doo 2025 / 2026
                    </span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-tight font-heading">
                        Motos de Agua y Pontones en <span class="font-normal text-teal-400">CONSUR</span>
                    </h2>
                    <p class="text-slate-400 text-sm sm:text-base font-light mt-2 max-w-xl">
                        Descargá la ficha técnica oficial en PDF de cada modelo con sus especificaciones de potencia Rotax, eslora y equipamiento náutico.
                    </p>
                </div>

                <!-- Filtros Interactivos por Categoría (Alpine.js) -->
                <div class="flex items-center gap-1.5 bg-slate-900 border border-slate-800 p-1 overflow-x-auto max-w-full">
                    <button type="button" 
                            @click="filter = 'all'" 
                            :class="filter === 'all' ? 'bg-teal-500 text-black font-bold shadow-md' : 'text-slate-400 hover:text-white font-medium'"
                            class="px-3.5 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        Todos (8)
                    </button>
                    <button type="button" 
                            @click="filter = 'rec-lite'" 
                            :class="filter === 'rec-lite' ? 'bg-teal-500 text-black font-bold shadow-md' : 'text-slate-400 hover:text-white font-medium'"
                            class="px-3.5 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        Spark Trixx
                    </button>
                    <button type="button" 
                            @click="filter = 'recreacion'" 
                            :class="filter === 'recreacion' ? 'bg-teal-500 text-black font-bold shadow-md' : 'text-slate-400 hover:text-white font-medium'"
                            class="px-3.5 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        GTI 130
                    </button>
                    <button type="button" 
                            @click="filter = 'arrastre'" 
                            :class="filter === 'arrastre' ? 'bg-teal-500 text-black font-bold shadow-md' : 'text-slate-400 hover:text-white font-medium'"
                            class="px-3.5 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        Wake & Wake Pro (2)
                    </button>
                    <button type="button" 
                            @click="filter = 'touring'" 
                            :class="filter === 'touring' ? 'bg-teal-500 text-black font-bold shadow-md' : 'text-slate-400 hover:text-white font-medium'"
                            class="px-3.5 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        GTX Limited 325
                    </button>
                    <button type="button" 
                            @click="filter = 'performance'" 
                            :class="filter === 'performance' ? 'bg-teal-500 text-black font-bold shadow-md' : 'text-slate-400 hover:text-white font-medium'"
                            class="px-3.5 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        RXP-X & RXT-X 325 (2)
                    </button>
                    <button type="button" 
                            @click="filter = 'pontones'" 
                            :class="filter === 'pontones' ? 'bg-teal-500 text-black font-bold shadow-md' : 'text-slate-400 hover:text-white font-medium'"
                            class="px-3.5 py-2 text-xs uppercase tracking-wider transition whitespace-nowrap">
                        Pontón Switch 21'
                    </button>
                </div>
            </div>

            <!-- Grilla de Tarjetas Verticales de Modelos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($models as $key => $model)
                    <div class="group bg-slate-900 border border-slate-800 hover:border-teal-500/80 transition-all duration-300 flex flex-col justify-between overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-teal-500/10"
                         x-show="filter === 'all' || filter === '{{ $model['category'] }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100">
                        
                        <!-- Afiche Vertical Oficial de CONSUR -->
                        <div class="relative w-full aspect-[9/14] bg-slate-950 overflow-hidden cursor-pointer"
                             @click="openLightbox('{{ $model['image'] }}')">
                            <img src="{{ $model['image'] }}" 
                                 alt="{{ $model['name'] }}" 
                                 loading="lazy"
                                 class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out" />
                            
                            <!-- Overlay Gradiente -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-black/30 pointer-events-none"></div>

                            <!-- Badge de Categoría -->
                            <div class="absolute top-3 left-3 z-10">
                                <span class="px-2.5 py-1 bg-black/80 backdrop-blur-md text-[10px] font-bold uppercase tracking-widest text-teal-300 border border-teal-500/30">
                                    {{ $model['category_label'] }}
                                </span>
                            </div>

                            <!-- Botón Lupa Lightbox -->
                            <div class="absolute top-3 right-3 z-10 opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-8 h-8 rounded-full bg-black/80 text-white flex items-center justify-center hover:bg-teal-500 hover:text-black transition shadow-lg text-xs"
                                      title="Ampliar Afiche">
                                    <i class="fas fa-search-plus"></i>
                                </span>
                            </div>

                            <!-- Badge Destacado Inferior -->
                            <div class="absolute bottom-3 left-3 right-3 z-10 pointer-events-none">
                                <div class="text-[11px] font-mono font-bold tracking-wider text-teal-300 bg-slate-950/90 px-2.5 py-1 border-l-2 border-teal-400 inline-block shadow">
                                    {{ $model['badge'] }}
                                </div>
                            </div>
                        </div>

                        <!-- Información y Especificaciones del Modelo -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <!-- Nombre del Modelo -->
                                <h3 class="text-lg md:text-xl font-bold text-white group-hover:text-teal-300 transition font-heading leading-snug mb-1">
                                    {{ $model['name'] }}
                                </h3>
                                
                                <!-- Color / Edición -->
                                <div class="text-xs text-slate-400 font-light mb-3 flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-teal-400 inline-block"></span>
                                    <span>Color: <strong class="text-slate-200 font-medium">{{ $model['color'] }}</strong></span>
                                </div>

                                <!-- Tagline Resumen -->
                                <p class="text-xs text-slate-300 font-light line-clamp-2 mb-4 leading-relaxed">
                                    {{ $model['tagline'] }}
                                </p>

                                <!-- Lista Rápida de Características Clave -->
                                <ul class="space-y-1.5 mb-5 border-t border-slate-800 pt-3 text-[11px] text-slate-300">
                                    @foreach(array_slice($model['highlights'], 0, 3) as $hl)
                                        <li class="flex items-start gap-1.5">
                                            <i class="fas fa-check text-teal-400 text-[10px] mt-0.5 shrink-0"></i>
                                            <span class="line-clamp-1">{{ $hl }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Botón Único de Descarga Ficha PDF Oficial -->
                            <div class="pt-4 border-t border-slate-800">
                                <a href="{{ $model['pdf'] }}" 
                                   target="_blank" 
                                   download
                                   class="w-full py-2.5 bg-slate-950 hover:bg-slate-800 text-slate-200 hover:text-white font-semibold text-xs uppercase tracking-wider transition flex items-center justify-center gap-2 border border-slate-800 hover:border-teal-400 text-center shadow-xs group/btn"
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

    <!-- 4. SECCIÓN INSTITUCIONAL AUTOMARKET: "LA VIDA EN EL AGUA NUNCA ESTUVO MEJOR" -->
    <section class="py-20 bg-slate-900 border-t border-slate-800 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-[0.3em] text-teal-400 block mb-2">Tu Sea-Doo te espera</span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-tight font-heading">
                    La vida en el agua <span class="font-normal text-teal-400">nunca estuvo mejor</span>
                </h2>
                <p class="text-slate-400 text-sm sm:text-base font-light mt-3 leading-relaxed">
                    ¡La gama Sea-Doo lo tiene todo! Una potencia récord de 325 HP ofrece la mejor aceleración de la industria. 
                    El siguiente nivel de versatilidad llega con la gama revolucionaria de pontones Switch. 
                    Y la evolución de la Spark ofrece lo último en diversión accesible en el agua.
                </p>
            </div>

            <!-- Bloques con Imágenes de Apoyo Extraídas de Automarket -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <!-- Bloque 1: Apoyo 1 -->
                <div class="p-8 bg-slate-950 border border-slate-800 hover:border-teal-500/50 transition flex flex-col justify-between">
                    <div>
                        <div class="mb-6 overflow-hidden bg-slate-900 aspect-video flex items-center justify-center">
                            <img src="{{ asset('images/seadoo/apoyo-1.png') }}" 
                                 alt="Diversión y Estilo Sea-Doo" 
                                 class="w-full h-full object-cover hover:scale-105 transition duration-500" />
                        </div>
                        <h3 class="text-xl font-bold text-white uppercase tracking-wider mb-2 font-heading">
                            Estabilidad & Música a Bordo
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-400 font-light leading-relaxed mb-4">
                            Sistemas de audio BRP Premium impermeables de 100W con Bluetooth para navegar con tu banda sonora preferida, complementados con la estabilidad inigualable del casco ST3 para tomar sol o descansar fondeado.
                        </p>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-widest text-teal-400 flex items-center gap-2">
                        <i class="fas fa-music"></i> Audio 100% Náutico Integrado
                    </div>
                </div>

                <!-- Bloque 2: Apoyo 2 -->
                <div class="p-8 bg-slate-950 border border-slate-800 hover:border-teal-500/50 transition flex flex-col justify-between">
                    <div>
                        <div class="mb-6 overflow-hidden bg-slate-900 aspect-video flex items-center justify-center">
                            <img src="{{ asset('images/seadoo/apoyo-2.png') }}" 
                                 alt="Pontones Switch y Modularidad LinQ" 
                                 class="w-full h-full object-cover hover:scale-105 transition duration-500" />
                        </div>
                        <h3 class="text-xl font-bold text-white uppercase tracking-wider mb-2 font-heading">
                            Pontones Switch: Conducción Intuitiva
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-400 font-light leading-relaxed mb-4">
                            El único pontón que se maneja con manillar de moto de agua. Gracias a sus baldosas LinQ, cambiás los asientos de lugar en segundos sin herramientas, y con el motor Jet Drive no tenés ninguna hélice peligrosa bajo el agua.
                        </p>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-widest text-teal-400 flex items-center gap-2">
                        <i class="fas fa-ship"></i> Versatilidad Modular LinQ®
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. FORMULARIO DE COTIZACIÓN & CONTACTO CONSUR -->
    <section id="cotizar" class="py-20 bg-slate-950 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Columna Izquierda: Información de Concesionaria -->
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-teal-400 block">Atención Náutica Oficial</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-white tracking-tight font-heading leading-tight">
                        ¿Querés cotizar tu <span class="font-normal text-teal-400">Sea-Doo</span> en CONSUR?
                    </h2>
                    <p class="text-slate-300 text-sm font-light leading-relaxed">
                        Consultá con nuestro equipo especializado en náutica recreativa y deportiva. 
                        Te informamos sobre disponibilidad, colores, trailers oficiales, entrega en Encarnación y servicio postventa.
                    </p>

                    <div class="space-y-4 pt-4 border-t border-slate-800 text-sm text-slate-300 font-light">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 rounded-full bg-slate-800 text-teal-400 flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <span>Casa Matriz: <strong>Av. Bernardino Caballero 749, Encarnación</strong></span>
                        </div>
                        <a href="https://wa.me/595985204106?text={{ urlencode('Hola CONSUR, quisiera consultar sobre modelos Sea-Doo.') }}"
                           target="_blank" rel="noopener"
                           class="flex items-center gap-3 hover:text-emerald-400 transition">
                            <span class="w-9 h-9 rounded-full bg-slate-800 text-emerald-500 flex items-center justify-center shrink-0">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                            <span>Ventas y Asesoramiento: <strong class="text-white">+595985204106</strong></span>
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Formulario Livewire -->
                <div class="lg:col-span-7 bg-slate-900 border border-slate-800 p-8 sm:p-10 shadow-2xl relative">
                    
                    @if($sentSuccess)
                        <div class="p-6 bg-emerald-950/80 border border-emerald-500 text-emerald-200 text-center">
                            <i class="fas fa-check-circle text-4xl text-emerald-400 mb-3"></i>
                            <h3 class="text-lg font-bold text-white mb-1 font-heading">¡Solicitud Náutica Recibida!</h3>
                            <p class="text-xs sm:text-sm text-emerald-300 font-light mb-4">
                                Gracias por tu interés. Un especialista de CONSUR S.A. se comunicará contigo para brindarte todos los detalles.
                            </p>
                            <button type="button" 
                                    wire:click="$set('sentSuccess', false)" 
                                    class="px-6 py-2 bg-emerald-500 hover:bg-emerald-400 text-black font-bold uppercase text-xs tracking-wider transition">
                                Enviar Otra Consulta
                            </button>
                        </div>
                    @else
                        <form wire:submit.prevent="submitLead" class="space-y-5">
                            <h3 class="text-xl font-bold text-white uppercase tracking-wider font-heading mb-4 pb-2 border-b border-slate-800">
                                Formulario de Cotización Sea-Doo
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-medium mb-1.5">
                                        Nombre y Apellido *
                                    </label>
                                    <input type="text" 
                                           wire:model="name" 
                                           placeholder="Ej: Marcelo Benítez"
                                           class="w-full bg-slate-950 border border-slate-700 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-medium mb-1.5">
                                        Teléfono / WhatsApp *
                                    </label>
                                    <input type="text" 
                                           wire:model="phone" 
                                           placeholder="Ej: 0985 123 456"
                                           class="w-full bg-slate-950 border border-slate-700 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('phone') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-medium mb-1.5">
                                        Correo Electrónico
                                    </label>
                                    <input type="email" 
                                           wire:model="email" 
                                           placeholder="ejemplo@correo.com"
                                           class="w-full bg-slate-950 border border-slate-700 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-medium mb-1.5">
                                        Ciudad / Departamento
                                    </label>
                                    <input type="text" 
                                           wire:model="city" 
                                           placeholder="Ej: Encarnación / Itapúa"
                                           class="w-full bg-slate-950 border border-slate-700 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 text-white text-sm px-4 py-2.5 outline-none transition" />
                                    @error('city') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-medium mb-1.5">
                                    Modelo de Interés *
                                </label>
                                <select wire:model="vehicleInterest"
                                        class="w-full bg-slate-950 border border-slate-700 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 text-white text-sm pl-4 pr-10 py-2.5 outline-none transition">
                                    @foreach($this->getModels() as $m)
                                        <option value="{{ $m['name'] }}">{{ $m['name'] }} ({{ $m['category_label'] }})</option>
                                    @endforeach
                                </select>
                                @error('vehicleInterest') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-medium mb-1.5">
                                    Mensaje o Consulta Adicional
                                </label>
                                <textarea wire:model="message" 
                                          rows="3" 
                                          placeholder="¿Querés saber sobre remolques, disponibilidad o mantenimiento oficial?"
                                          class="w-full bg-slate-950 border border-slate-700 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 text-white text-sm px-4 py-2.5 outline-none transition"></textarea>
                                @error('message') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" 
                                    class="w-full py-3.5 bg-teal-500 hover:bg-teal-400 text-black font-bold uppercase tracking-widest text-xs transition shadow-lg flex items-center justify-center gap-2">
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

    <!-- 6. LIGHTBOX A PANTALLA COMPLETA PARA EL AFICHE VERTICAL -->
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
                class="absolute top-6 right-6 z-20 w-12 h-12 rounded-full bg-slate-900/90 text-white hover:bg-teal-500 hover:text-black transition flex items-center justify-center text-lg border border-slate-700 shadow-2xl">
            <i class="fas fa-times"></i>
        </button>

        <div class="max-w-4xl max-h-[92vh] flex items-center justify-center p-2" @click.stop>
            <img :src="lightboxImage" 
                 alt="Afiche Oficial Sea-Doo CONSUR" 
                 class="max-w-full max-h-[90vh] object-contain rounded shadow-2xl border border-slate-800" />
        </div>
    </div>

</div>
