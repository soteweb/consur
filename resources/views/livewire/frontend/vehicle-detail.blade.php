<div x-data="{
        activeImage: 0,
        images: {{ json_encode($vehicle->images->pluck('url')->toArray() ?: [$vehicle->primary_image_url]) }},
        heroSlides: {{ json_encode($vehicle->hero_banner_slides) }},
        activeHeroSlide: 0,
        lightboxOpen: false,
        selectedColorIdx: 0,
        colors: {{ json_encode($vehicle->colors ?: []) }},
        activeSpecTab: 0,
        activeVersionModal: null,
        quoteModalOpen: false,
        quoteVersionName: '{{ $vehicle->version ?: $vehicle->model }}',
        resolveColorImg(path) {
            if (!path) return '{{ $vehicle->primary_image_url }}';
            if (path.startsWith('http://') || path.startsWith('https://')) return path;
            if (path.startsWith('images/') || path.startsWith('/images/')) return '{{ asset('') }}' + path.replace(/^\/+/, '');
            return '{{ asset('storage') }}/' + path.replace(/^\/+/, '');
        }
     }">

    @if($vehicle->condition === '0km')
        <!-- ========================================================================= -->
        <!-- ================= PLANTILLA SHOWCASE VEHÍCULOS 0 KM ============= -->
        <!-- ========================================================================= -->

        @php
            $waLeadText = "Hola CONSUR S.A., quisiera más información sobre el Toyota {$vehicle->model} 0 Km.";
            $hasCustomHtml = !empty(trim((string) $vehicle->custom_html));
            $customAnchors = [
                'colores' => 'Colores',
                'diseno' => 'Diseño',
                'interior' => 'Interior',
                'tecnologia' => 'Tecnología',
                'video' => 'Video',
                'desempeno' => 'Desempeño',
                'seguridad' => 'Seguridad',
                'galeria' => 'Galería',
                'especificaciones' => 'Especificaciones',
                'modelos' => 'Modelos',
            ];
        @endphp

        <!-- 1. HERO DEL VEHÍCULO 0 KM -->
        @if(!empty($vehicle->hero_banners) || $hasCustomHtml)
            <header id="hero" class="relative w-full h-auto lg:h-[545px] bg-[#1d1d1d] overflow-hidden select-none">
                <!-- Imagen(es) Widescreen del Hero con soporte Picture Desktop/Mobile -->
                <div class="relative w-full h-auto lg:h-full">
                    <template x-for="(slide, sIdx) in heroSlides" :key="sIdx">
                        <div x-show="activeHeroSlide === sIdx"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             class="relative lg:absolute lg:inset-0 w-full h-auto lg:h-full">
                            <picture class="w-full h-auto lg:h-full block">
                                <source media="(max-width: 767px)" :srcset="slide.mobile || slide.desktop">
                                <img :src="slide.desktop || slide"
                                     alt="{{ $vehicle->full_name }}"
                                     class="w-full h-auto lg:h-full lg:object-cover lg:object-center block">
                            </picture>
                        </div>
                    </template>

                    <!-- Controles si hay más de 1 imagen en el Hero -->
                    <template x-if="heroSlides.length > 1">
                        <div>
                            <button type="button"
                                    @click="activeHeroSlide = (activeHeroSlide - 1 + heroSlides.length) % heroSlides.length"
                                    class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-black/50 hover:bg-[#eb0a1e] text-white flex items-center justify-center transition shadow-lg backdrop-blur-xs">
                                <i class="fas fa-chevron-left text-xs"></i>
                            </button>
                            <button type="button"
                                    @click="activeHeroSlide = (activeHeroSlide + 1) % heroSlides.length"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-black/50 hover:bg-[#eb0a1e] text-white flex items-center justify-center transition shadow-lg backdrop-blur-xs">
                                <i class="fas fa-chevron-right text-xs"></i>
                            </button>
                        </div>
                    </template>
                </div>
            </header>
        @else
            <!-- Hero Clásico para modelos que no tienen banner widescreen propio -->
            <header id="hero" class="relative w-full h-[360px] sm:h-[460px] lg:h-[545px] bg-gradient-to-b from-slate-950 via-slate-900 to-black text-white overflow-hidden flex items-center">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_30%,rgba(235,10,30,0.15),transparent_50%)] pointer-events-none"></div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        <div class="lg:col-span-5 space-y-5">
                            <div>
                                <span class="text-xs font-medium uppercase tracking-widest text-red-500 block mb-1">
                                    {{ $vehicle->brand ? $vehicle->brand->name : 'Toyota' }} &bull; Gama Oficial CONSUR S.A.
                                </span>
                                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-light uppercase tracking-tight font-heading text-white leading-tight">
                                    {{ $vehicle->model }}
                                </h1>
                                @if($vehicle->tagline)
                                    <p class="text-sm sm:text-base text-slate-300 font-light mt-2 border-l-2 border-red-600 pl-3">
                                        {{ $vehicle->tagline }}
                                    </p>
                                @endif
                            </div>
                            @if($vehicle->brochure_link)
                                <div class="pt-1">
                                    <a href="{{ $vehicle->brochure_link }}" target="_blank"
                                       class="inline-flex py-3 px-6 rounded-full bg-[#eb0a1e] hover:bg-red-700 text-white font-medium text-xs uppercase tracking-wider text-center transition items-center justify-center gap-2">
                                        <i class="fas fa-download"></i>
                                        <span>Descargar Brochure</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="lg:col-span-7 relative">
                            <div class="relative w-full h-[240px] sm:h-[320px] lg:h-[420px] flex items-center justify-center">
                                <img src="{{ $vehicle->primary_image_url }}" alt="{{ $vehicle->full_name }}" class="max-h-full max-w-full object-contain drop-shadow-2xl">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        @endif

        <!-- 2. MENÚ DE SECCIONES DEBAJO DEL HERO (Fijo / Sticky en top-0 al hacer scroll hacia abajo) -->
        <nav class="sticky top-0 z-50 bg-white/95 dark:bg-slate-950/95 backdrop-blur-md border-b border-neutral-200/90 dark:border-slate-800 shadow-xs transition-all">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-14">
                <div class="flex items-center gap-3 flex-shrink-0">
                    <span class="text-sm sm:text-base font-semibold text-neutral-900 dark:text-white uppercase tracking-wide font-heading truncate max-w-[180px] sm:max-w-none">
                        {{ $vehicle->model }}
                    </span>
                    @if($vehicle->is_hybrid)
                        <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-blue-50 dark:bg-blue-950/60 text-[#005cb9] dark:text-cyan-400 border border-blue-200 dark:border-blue-800/60 tracking-wide">
                            <i class="fas fa-bolt mr-1 text-[9px]"></i> HEV Híbrido
                        </span>
                    @endif
                </div>

                <!-- Enlaces de salto rápido de sección -->
                <div class="hidden lg:flex items-center gap-6 text-[13px] font-normal text-neutral-700 dark:text-neutral-300 h-full">
                    @if($hasCustomHtml)
                        @foreach($customAnchors as $anchorId => $anchorLabel)
                            @if(str_contains($vehicle->custom_html, 'id="' . $anchorId . '"') || str_contains($vehicle->custom_html, "id='" . $anchorId . "'"))
                                <a href="#{{ $anchorId }}" class="h-full inline-flex items-center border-b-2 border-transparent hover:border-[#eb0a1e] hover:text-[#eb0a1e] transition">{{ $anchorLabel }}</a>
                            @endif
                        @endforeach
                    @else
                        @if(!empty($vehicle->colors))
                            <a href="#colores" class="h-full inline-flex items-center border-b-2 border-transparent hover:border-[#eb0a1e] hover:text-[#eb0a1e] transition">Colores</a>
                        @endif
                        @if(!empty($vehicle->highlights))
                            <a href="#diseno" class="h-full inline-flex items-center border-b-2 border-transparent hover:border-[#eb0a1e] hover:text-[#eb0a1e] transition">Diseño</a>
                        @endif
                        @if(!empty($vehicle->safety))
                            <a href="#seguridad" class="h-full inline-flex items-center border-b-2 border-transparent hover:border-[#eb0a1e] hover:text-[#eb0a1e] transition">Seguridad TSS</a>
                        @endif
                        @if($vehicle->video_embed_url)
                            <a href="#video" class="h-full inline-flex items-center border-b-2 border-transparent hover:border-[#eb0a1e] hover:text-[#eb0a1e] transition">Video</a>
                        @endif
                        @if(!empty($vehicle->versions))
                            <a href="#versiones" class="h-full inline-flex items-center border-b-2 border-transparent hover:border-[#eb0a1e] hover:text-[#eb0a1e] transition">Versiones</a>
                        @endif
                        @if(!empty($vehicle->spec_sheet))
                            <a href="#especificaciones" class="h-full inline-flex items-center border-b-2 border-transparent hover:border-[#eb0a1e] hover:text-[#eb0a1e] transition">Ficha Técnica</a>
                        @endif
                    @endif
                </div>

                <!-- CTA Botón Descargar Brochure -->
                <div class="flex items-center gap-2 flex-shrink-0">
                    @if($vehicle->brochure_link)
                        <a href="{{ $vehicle->brochure_link }}" target="_blank"
                           class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-medium transition shadow-xs">
                            <i class="fas fa-file-pdf"></i>
                            <span>Descargar Brochure</span>
                        </a>
                    @endif
                </div>
            </div>
        </nav>

        <!-- 2. CUERPO DE LA PÁGINA 0 KM: DISEÑO HTML LIBRE O BLOQUES -->
        @if($hasCustomHtml)
            <div class="vehicle-custom-html bg-white dark:bg-slate-950 text-slate-800 dark:text-neutral-100 transition-colors">
                {!! $vehicle->custom_html !!}
            </div>
        @else
            <!-- 2. SELECTOR INTERACTIVO DE COLORES EXTERIORES -->
            @if(!empty($vehicle->colors))
            <section id="colores" class="py-16 bg-slate-50 dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
                    <div>
                        <span class="text-xs font-extrabold uppercase tracking-widest text-red-600 block mb-1">
                            Personalizá tu Experiencia
                        </span>
                        <h2 class="text-3xl font-black uppercase font-heading text-slate-900 dark:text-white tracking-tight">
                            Paleta de Colores
                        </h2>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 max-w-xl mx-auto mt-2">
                            Seleccioná el tono para previsualizar el acabado exterior del nuevo {{ $vehicle->model }}.
                        </p>
                    </div>

                    <!-- Render del Auto con Fondo Limpio -->
                    <div class="relative max-w-3xl mx-auto aspect-[16/10] bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-center justify-center">
                        <template x-if="colors[selectedColorIdx] && colors[selectedColorIdx].image">
                            <img :src="resolveColorImg(colors[selectedColorIdx].image)" 
                                 :alt="colors[selectedColorIdx].name"
                                 class="max-h-full max-w-full object-contain transition-all duration-300">
                        </template>
                        <template x-if="!colors[selectedColorIdx] || !colors[selectedColorIdx].image">
                            <img src="{{ $vehicle->primary_image_url }}" alt="{{ $vehicle->full_name }}" class="max-h-full max-w-full object-contain">
                        </template>
                    </div>

                    <!-- Nombre del Color Seleccionado -->
                    <div>
                        <div class="text-sm font-black uppercase text-slate-900 dark:text-white font-heading" x-text="colors[selectedColorIdx]?.name"></div>
                    </div>

                    <!-- Tira de Chips Circulares de Color -->
                    <div class="flex flex-wrap items-center justify-center gap-3">
                        @foreach($vehicle->colors as $cIdx => $col)
                            <button type="button" @click="selectedColorIdx = {{ $cIdx }}"
                                    class="relative w-9 h-9 rounded-full border-2 transition-all transform hover:scale-110 focus:outline-none"
                                    :class="selectedColorIdx === {{ $cIdx }} ? 'border-red-600 ring-4 ring-red-600/20 scale-110' : 'border-slate-300 dark:border-neutral-700'"
                                    style="background-color: {{ $col['hex'] ?? '#FFFFFF' }};"
                                    title="{{ $col['name'] }}">
                                <span class="sr-only">{{ $col['name'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- 3. BLOQUES DE STORYTELLING / HIGHLIGHTS EDITORIALES -->
        @if(!empty($vehicle->highlights))
            <section id="diseno" class="py-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 space-y-16 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-2xl mx-auto mb-12">
                        <span class="text-xs font-extrabold uppercase tracking-widest text-red-600 block mb-1">
                            Innovación & Confort
                        </span>
                        <h2 class="text-3xl font-black uppercase font-heading text-slate-900 dark:text-white tracking-tight">
                            Diseñado para Superar Expectativas
                        </h2>
                    </div>

                    <div class="space-y-16">
                        @foreach($vehicle->highlights as $hIdx => $high)
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center {{ $hIdx % 2 === 1 ? 'lg:flex-row-reverse' : '' }}">
                                <!-- Imagen del bloque -->
                                <div class="lg:col-span-7 {{ $hIdx % 2 === 1 ? 'lg:order-2' : '' }}">
                                    <div class="rounded-3xl overflow-hidden aspect-[16/10] bg-slate-100 dark:bg-neutral-900 border border-slate-200 dark:border-neutral-800 shadow-sm">
                                        @if(!empty($high['image']))
                                            <img src="{{ \App\Models\Vehicle::mediaUrl($high['image']) }}" 
                                                 alt="{{ $high['title'] }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ $vehicle->primary_image_url }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                </div>

                                <!-- Textos del bloque -->
                                <div class="lg:col-span-5 space-y-3 {{ $hIdx % 2 === 1 ? 'lg:order-1' : '' }}">
                                    @if(!empty($high['subtitle']))
                                        <span class="text-xs font-bold uppercase tracking-wider text-red-600">
                                            {{ $high['subtitle'] }}
                                        </span>
                                    @endif
                                    <h3 class="text-2xl sm:text-3xl font-black uppercase font-heading text-slate-900 leading-tight">
                                        {{ $high['title'] ?? '' }}
                                    </h3>
                                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                                        {{ $high['desc'] ?? $high['text'] ?? $high['description'] ?? '' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- 4. PILAR DE SEGURIDAD OFICIAL: TOYOTA SAFETY SENSE (TSS) -->
        @if(!empty($vehicle->safety))
            <section id="seguridad" class="py-16 bg-gradient-to-br from-slate-900 to-slate-950 text-white border-b border-slate-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-slate-800 pb-6">
                        <div>
                            <span class="text-xs font-extrabold uppercase tracking-widest text-red-500 block mb-1">
                                Máxima Protección a Bordo
                            </span>
                            <h2 class="text-3xl sm:text-4xl font-black uppercase font-heading text-white tracking-tight flex items-center gap-3">
                                <i class="fas fa-shield-halved text-red-600"></i> Toyota Safety Sense & Seguridad
                            </h2>
                            <p class="text-xs text-slate-400 mt-2 max-w-2xl">
                                Paquete integral de seguridad activa y asistencias a la conducción (ADAS) diseñadas para protegerte a vos y a tu familia en todo momento.
                            </p>
                        </div>
                        @if($vehicle->airbags)
                            <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-white/10 border border-white/10 backdrop-blur-sm flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-red-600 text-white flex items-center justify-center text-lg">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div>
                                    <div class="text-xl font-black font-heading">{{ $vehicle->airbags }} Airbags</div>
                                    <div class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">Protección pasiva de serie</div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Grid de Asistencias Activas -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($vehicle->safety_items as $item)
                            <div class="p-5 rounded-2xl bg-white/5 border border-white/10 hover:border-red-500/50 transition space-y-2">
                                <div class="flex items-center gap-2.5 text-red-500 text-lg">
                                    <i class="fas {{ $item['icon'] }}"></i>
                                    <h3 class="text-sm font-black uppercase text-white font-heading">{{ $item['label'] }}</h3>
                                </div>
                                <p class="text-xs text-slate-400 leading-relaxed font-medium">
                                    {{ $item['description'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- 5. VIDEO OFICIAL EXPERIENCIAL (YouTube 16:9) -->
        @if($vehicle->video_embed_url)
            <section id="video" class="py-16 bg-slate-950 text-white border-b border-slate-800">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
                    <div>
                        <span class="text-xs font-extrabold uppercase tracking-widest text-red-500 block mb-1">
                            Experiencia Visual
                        </span>
                        <h2 class="text-3xl font-black uppercase font-heading text-white tracking-tight">
                            Conocé el {{ $vehicle->model }} en Acción
                        </h2>
                    </div>

                    <div class="aspect-video w-full rounded-3xl overflow-hidden border border-slate-800 shadow-2xl bg-black">
                        <iframe src="{{ $vehicle->video_embed_url }}" 
                                class="w-full h-full" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                    </div>
                </div>
            </section>
        @endif

        <!-- 6. MATRIZ COMPARATIVA DE VERSIONES (SUB-MODELOS) -->
        @if(!empty($vehicle->versions))
            <section id="versiones" class="py-16 bg-slate-50 border-b border-slate-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
                    <div class="text-center max-w-2xl mx-auto">
                        <span class="text-xs font-extrabold uppercase tracking-widest text-red-600 block mb-1">
                            Elegí Tu Versión Ideal
                        </span>
                        <h2 class="text-3xl font-black uppercase font-heading text-slate-900 tracking-tight">
                            Versiones Disponibles
                        </h2>
                        <p class="text-xs text-slate-500 mt-2">
                            Compará las configuraciones y equipamiento distintivo de la gama {{ $vehicle->model }}.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($vehicle->versions as $vIdx => $ver)
                            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between space-y-6">
                                <div class="space-y-4">
                                    <div class="border-b border-slate-100 pb-3">
                                        <span class="text-[10px] font-bold text-red-600 uppercase tracking-wider block">Versión #{{ $vIdx + 1 }}</span>
                                        <h3 class="text-xl font-black uppercase text-slate-900 font-heading">{{ $ver['name'] }}</h3>
                                    </div>

                                    <!-- Precios / Cuotas de la versión -->
                                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 space-y-1">
                                        @php
                                            $vMonthly = !empty($ver['monthly_fee_usd']) ? $ver['monthly_fee_usd'] : (!empty($ver['monthly_fee']) ? $ver['monthly_fee'] : null);
                                        @endphp
                                        @if($vMonthly)
                                            <div class="text-xs text-slate-500 font-bold uppercase">Cuotas desde</div>
                                            <div class="text-2xl font-black text-red-600 font-heading">
                                                US$ {{ number_format((float)$vMonthly, 0, ',', '.') }}
                                                <span class="text-xs text-slate-500 font-normal">/ mes</span>
                                            </div>
                                        @endif
                                        @if(!empty($ver['price_usd']))
                                            <div class="text-xs font-bold text-slate-700">
                                                Contado: US$ {{ number_format((float)$ver['price_usd'], 0, ',', '.') }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Especificaciones clave de versión -->
                                    <div class="grid grid-cols-2 gap-2 text-xs">
                                        @if(!empty($ver['engine']))
                                            <div class="p-2 rounded-lg bg-slate-50">
                                                <span class="text-slate-400 text-[10px] block font-bold">Motor:</span>
                                                <strong class="text-slate-800">{{ $ver['engine'] }}</strong>
                                            </div>
                                        @endif
                                        @if(!empty($ver['transmission']))
                                            <div class="p-2 rounded-lg bg-slate-50">
                                                <span class="text-slate-400 text-[10px] block font-bold">Caja:</span>
                                                <strong class="text-slate-800">{{ $ver['transmission'] }}</strong>
                                            </div>
                                        @endif
                                        @if(!empty($ver['traction']))
                                            <div class="p-2 rounded-lg bg-slate-50 col-span-2">
                                                <span class="text-slate-400 text-[10px] block font-bold">Tracción:</span>
                                                <strong class="text-slate-800">{{ $ver['traction'] }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Lista de equipamiento distintivo -->
                                    @if(!empty($ver['features']))
                                        @php
                                            $verFeatures = is_array($ver['features']) 
                                                ? $ver['features'] 
                                                : array_filter(array_map('trim', explode(',', (string)$ver['features'])));
                                        @endphp
                                        <div class="space-y-1.5 pt-2">
                                            <span class="text-[11px] font-bold text-slate-700 uppercase block">Equipamiento Destacado:</span>
                                            <ul class="space-y-1 text-xs text-slate-600">
                                                @foreach($verFeatures as $fItem)
                                                    <li class="flex items-start gap-2">
                                                        <i class="fas fa-check text-emerald-500 mt-0.5 text-[10px]"></i>
                                                        <span>{{ $fItem }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <!-- Botones de acción de la versión -->
                                <div class="space-y-2 pt-4 border-t border-slate-100">
                                    <a href="#cotizacion" 
                                       @click="clientMessage = 'Hola CONSUR, me interesa solicitar plan para la versión: ' + '{{ $ver['name'] }}'"
                                       class="w-full py-2.5 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider text-center transition block">
                                        Cotizar esta Versión
                                    </a>
                                    @if(!empty($ver['brochure_url']))
                                        <a href="{{ \App\Models\Vehicle::mediaUrl($ver['brochure_url']) }}" target="_blank"
                                           class="w-full py-2 px-4 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs text-center transition flex items-center justify-center gap-1.5">
                                            <i class="fas fa-file-pdf text-red-600"></i> Ficha de Versión
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- 7. FICHA TÉCNICA COMPLETA AGRUPADA (Spec Sheet Tabs) -->
        @if(!empty($vehicle->spec_sheet))
            <section id="especificaciones" class="py-16 bg-white border-b border-slate-200">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-slate-200 pb-4">
                        <div>
                            <span class="text-xs font-extrabold uppercase tracking-widest text-red-600 block mb-1">
                                Datos Técnicos Oficiales
                            </span>
                            <h2 class="text-3xl font-black uppercase font-heading text-slate-900 tracking-tight">
                                Especificaciones Técnicas
                            </h2>
                        </div>
                        @if($vehicle->brochure_link)
                            <a href="{{ $vehicle->brochure_link }}" target="_blank"
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider transition shadow-sm">
                                <i class="fas fa-file-pdf"></i>
                                <span>Descargar Catálogo Completo (PDF)</span>
                            </a>
                        @endif
                    </div>

                    <!-- Ficha Técnica Agrupada en Acordeón / Grid Moderno -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($vehicle->spec_sheet as $groupLabel => $items)
                            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 space-y-4">
                                <h3 class="text-sm font-black uppercase text-slate-900 font-heading border-b border-slate-200 pb-2 flex items-center gap-2">
                                    <i class="fas fa-chevron-right text-red-600 text-xs"></i>
                                    <span>{{ $groupLabel }}</span>
                                </h3>
                                <dl class="divide-y divide-slate-200/60 text-xs">
                                    @foreach($items as $label => $val)
                                        <div class="py-2.5 flex justify-between items-baseline gap-4">
                                            <dt class="text-slate-500 font-semibold">{{ $label }}</dt>
                                            <dd class="text-slate-900 font-bold text-right">{{ is_array($val) ? implode(', ', $val) : $val }}</dd>
                                        </div>
                                    @endforeach
                                </dl>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- 8. GALERÍA DE FOTOS ADICIONALES (Lightbox) -->
        @if($vehicle->images->count() > 1)
            <section class="py-16 bg-slate-50 dark:bg-[#0c0d12] border-b border-slate-200 dark:border-neutral-800 transition-colors">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
                    <div class="text-center" data-aos="fade-up">
                        <h2 class="text-2xl sm:text-3xl font-light uppercase font-heading text-slate-900 dark:text-white tracking-normal">
                            Galería
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($vehicle->images as $imgIdx => $vImg)
                            <div class="relative aspect-[16/10] rounded-2xl overflow-hidden bg-slate-200 dark:bg-neutral-800 border border-slate-300 dark:border-neutral-700 group cursor-pointer"
                                 @click="activeImage = {{ $imgIdx }}; lightboxOpen = true">
                                <img src="{{ $vImg->url }}" alt="{{ $vehicle->full_name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white">
                                    <i class="fas fa-search-plus text-lg"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        @endif

    @else
        <!-- ========================================================================= -->
        <!-- ================= PLANTILLA VEHÍCULOS USADOS ======== -->
        <!-- ========================================================================= -->

        <!-- Breadcrumb -->
        <nav class="bg-white dark:bg-[#0c0d12] border-b border-slate-200/80 dark:border-neutral-800 py-3.5 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol class="flex items-center space-x-2 text-xs text-slate-500 dark:text-neutral-400 font-medium">
                    <li><a href="{{ route('home') }}" class="hover:text-[#eb0a1e] transition">Inicio</a></li>
                    <li><span class="text-slate-300 dark:text-neutral-600">/</span></li>
                    <li><a href="{{ route('usados') }}" class="hover:text-[#eb0a1e] transition">Vehículos Usados</a></li>
                    <li><span class="text-slate-300 dark:text-neutral-600">/</span></li>
                    <li class="text-slate-900 dark:text-white font-bold truncate">{{ $vehicle->full_name }}</li>
                </ol>
            </div>
        </nav>

        <main id="car-detail" class="bg-white dark:bg-slate-950 py-8 md:py-10 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                    
                    <!-- ========================================================== -->
                    <!-- COLUMNA IZQUIERDA (Galería, Especificaciones, Ubicación) -->
                    <!-- ========================================================== -->
                    <div class="lg:col-span-8 order-2 lg:order-1 space-y-10">
                        
                        <!-- 1. Galería Principal de Fotos y Miniaturas -->
                        <div class="space-y-3">
                            <!-- Contenedor Principal (Escenario) -->
                            <div class="relative w-full aspect-[16/10] bg-slate-900 rounded-2xl overflow-hidden shadow-sm group select-none">
                                <img :src="images[activeImage]" 
                                     alt="{{ $vehicle->full_name }}" 
                                     class="w-full h-full object-cover cursor-zoom-in transition-transform duration-500 group-hover:scale-[1.02]"
                                     @click="lightboxOpen = true">
                                
                                <!-- Badges Superiores -->
                                <div class="absolute top-4 left-4 flex flex-wrap gap-2 pointer-events-none z-10">
                                    <span class="bg-emerald-600 text-white text-[11px] font-extrabold uppercase px-3 py-1 rounded-full shadow-md tracking-wider">
                                        {{ strtoupper($vehicle->status ?: 'Disponible') }}
                                    </span>
                                </div>

                                <!-- Contador de Fotos -->
                                <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full pointer-events-none z-10 flex items-center gap-1.5">
                                    <i class="fas fa-camera text-[10px]"></i>
                                    <span><span x-text="activeImage + 1"></span> / <span x-text="images.length"></span></span>
                                </div>

                                <!-- Botón Zoom Pantalla Completa -->
                                <button type="button" 
                                        @click="lightboxOpen = true"
                                        class="absolute bottom-4 right-4 w-10 h-10 rounded-full bg-black/60 hover:bg-black/90 text-white flex items-center justify-center transition backdrop-blur-sm z-10 shadow-lg"
                                        title="Ver en pantalla completa">
                                    <i class="fas fa-search-plus"></i>
                                </button>

                                <!-- Flechas de Navegación -->
                                <template x-if="images.length > 1">
                                    <div>
                                        <button type="button" 
                                                @click.stop="activeImage = (activeImage - 1 + images.length) % images.length" 
                                                class="absolute left-3 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/50 hover:bg-black/80 text-white flex items-center justify-center transition backdrop-blur-sm z-10 opacity-80 hover:opacity-100 shadow-md"
                                                title="Foto anterior">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button type="button" 
                                                @click.stop="activeImage = (activeImage + 1) % images.length" 
                                                class="absolute right-3 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/50 hover:bg-black/80 text-white flex items-center justify-center transition backdrop-blur-sm z-10 opacity-80 hover:opacity-100 shadow-md"
                                                title="Siguiente foto">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </template>
                            </div>

                            <!-- Tira de Miniaturas (Splide / Carousel Thumbnails) -->
                            <template x-if="images.length > 1">
                                <div class="flex gap-2.5 overflow-x-auto pb-2 pt-1 scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-transparent">
                                    <template x-for="(img, idx) in images" :key="idx">
                                        <button type="button" 
                                                @click="activeImage = idx" 
                                                class="relative flex-shrink-0 w-24 sm:w-28 aspect-[4/3] rounded-xl overflow-hidden border-2 transition-all duration-200"
                                                :class="activeImage === idx ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/30 shadow-md scale-[1.02]' : 'border-transparent opacity-60 hover:opacity-100 hover:border-slate-300'">
                                            <img :src="img" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover">
                                        </button>
                                    </template>
                                </div>
                            </template>
                        </div>

                        <!-- 2. Especificaciones Técnicas (#features) -->
                        <div id="features" class="space-y-6 pt-4 border-t border-slate-100 dark:border-neutral-800">
                            <div>
                                <h2 class="text-2xl font-black text-slate-900 dark:text-white uppercase font-heading tracking-tight">Especificaciones</h2>
                                <div class="w-16 h-1 bg-[#eb0a1e] mt-2 rounded-full"></div>
                            </div>

                            @php
                                $specsArr = is_array($vehicle->specs) ? $vehicle->specs : [];
                                $specItems = [
                                    [
                                        'label' => 'Tipo de Vehículo',
                                        'value' => $specsArr['Tipo de vehículo'] ?? ($vehicle->category->name ?? 'SUV / Automóvil'),
                                        'icon'  => 'fas fa-car-side'
                                    ],
                                    [
                                        'label' => 'Marca',
                                        'value' => strtoupper($vehicle->brand->name ?? 'TOYOTA'),
                                        'icon'  => 'fas fa-award'
                                    ],
                                    [
                                        'label' => 'Modelo',
                                        'value' => $vehicle->model,
                                        'icon'  => 'fas fa-tag'
                                    ],
                                    [
                                        'label' => 'Año',
                                        'value' => $vehicle->year,
                                        'icon'  => 'fas fa-calendar-alt'
                                    ],
                                    [
                                        'label' => 'Kilometraje',
                                        'value' => $vehicle->formatted_mileage,
                                        'icon'  => 'fas fa-tachometer-alt'
                                    ],
                                    [
                                        'label' => 'Combustible',
                                        'value' => $vehicle->fuel_type ?: ($specsArr['Combustible'] ?? 'Nafta / Diésel'),
                                        'icon'  => 'fas fa-gas-pump'
                                    ],
                                    [
                                        'label' => 'Transmisión',
                                        'value' => $vehicle->transmission ?: ($specsArr['Transmisión'] ?? 'Automática'),
                                        'icon'  => 'fas fa-cogs'
                                    ],
                                    [
                                        'label' => 'Tracción',
                                        'value' => $vehicle->traction ?: ($specsArr['Tracción'] ?? '4x2'),
                                        'icon'  => 'fas fa-road'
                                    ],
                                    [
                                        'label' => 'Motor / Cilindrada',
                                        'value' => $vehicle->engine ?: ($specsArr['Motor'] ?? '-'),
                                        'icon'  => 'fas fa-cogs'
                                    ],
                                    [
                                        'label' => 'Color',
                                        'value' => $vehicle->color_exterior ?: ($specsArr['Color'] ?? '-'),
                                        'icon'  => 'fas fa-palette'
                                    ],
                                    [
                                        'label' => 'Volante / Origen',
                                        'value' => $specsArr['Volante'] ?? 'Original',
                                        'icon'  => 'fas fa-dharmachakra'
                                    ],
                                    [
                                        'label' => 'Sede / Ubicación',
                                        'value' => $specsArr['Sede'] ?? 'CONSUR S.A. Casa Central',
                                        'icon'  => 'fas fa-map-marker-alt'
                                    ],
                                ];
                            @endphp

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-7 gap-x-4">
                                @foreach($specItems as $item)
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-slate-50 dark:bg-[#111318] border border-slate-200/80 dark:border-neutral-800 flex items-center justify-center text-slate-700 dark:text-neutral-300 flex-shrink-0">
                                            <i class="{{ $item['icon'] }} text-sm text-[#eb0a1e]"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-[11px] font-bold text-slate-400 dark:text-neutral-400 uppercase tracking-wider leading-none mb-1">{{ $item['label'] }}</p>
                                            <p class="text-sm font-extrabold text-slate-900 dark:text-white leading-tight truncate" title="{{ $item['value'] }}">{{ $item['value'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- 3. Características y Equipamiento -->
                        @if(!empty($vehicle->features) && count($vehicle->features) > 0)
                            <div class="space-y-6 pt-4 border-t border-slate-100 dark:border-neutral-800">
                                <div>
                                    <h2 class="text-2xl font-black text-slate-900 dark:text-white uppercase font-heading tracking-tight">Características y Equipamiento</h2>
                                    <div class="w-16 h-1 bg-[#eb0a1e] mt-2 rounded-full"></div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                    @foreach($vehicle->features as $feat)
                                        <div class="flex items-center gap-3 p-3.5 rounded-xl bg-slate-50 dark:bg-[#111318] border border-slate-200/70 dark:border-neutral-800 text-slate-800 dark:text-neutral-200 text-xs font-bold transition hover:bg-white dark:hover:bg-[#161820] hover:border-[#eb0a1e]/40 hover:shadow-xs">
                                            <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center flex-shrink-0 text-xs font-black">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <span>{{ $feat }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- 4. Respaldo y Garantía CONSUR S.A. -->
                        <div class="p-6 rounded-2xl bg-gradient-to-r from-slate-900 to-slate-800 text-white space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-[#eb0a1e] text-lg flex-shrink-0">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-extrabold uppercase font-heading">Vehículo Inspeccionado y Garantizado</h3>
                                    <p class="text-xs text-slate-300">Respaldo técnico oficial de CONSUR S.A. – Concesionaria Oficial</p>
                                </div>
                            </div>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                {{ $vehicle->description ?: 'Cada unidad usada seleccionada por CONSUR S.A. pasa por una rigurosa inspección mecánica y legal en nuestros talleres autorizados, garantizando documentación al día, procedencia verificada y óptimo estado de funcionamiento.' }}
                            </p>
                        </div>

                        <!-- 5. Encontranos en: (#location con Mapa) -->
                        <div id="location" class="space-y-6 pt-4 border-t border-slate-100 dark:border-neutral-800">
                            <div>
                                <h2 class="text-2xl font-black text-slate-900 dark:text-white uppercase font-heading tracking-tight">Encontranos en:</h2>
                                <div class="w-16 h-1 bg-[#eb0a1e] mt-2 rounded-full"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
                                <!-- Datos de Contacto y Dirección -->
                                <div class="md:col-span-5 space-y-5 bg-slate-50 dark:bg-[#111318] p-6 rounded-2xl border border-slate-200/70 dark:border-neutral-800 flex flex-col justify-between">
                                    <div class="space-y-4">
                                        <div class="flex items-start gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white dark:bg-neutral-900 flex items-center justify-center text-[#eb0a1e] shadow-xs flex-shrink-0 mt-0.5">
                                                <i class="fas fa-map-marker-alt text-xs"></i>
                                            </div>
                                            <div>
                                                <p class="text-[11px] font-bold text-slate-400 dark:text-neutral-400 uppercase tracking-wider">Dirección</p>
                                                <a href="https://maps.app.goo.gl/dJzT7xH2VzZ41B4A7" target="_blank" class="text-xs font-extrabold text-slate-900 dark:text-white hover:text-[#eb0a1e] transition block leading-snug">
                                                    Ruta PY01 km 329 (Av. Irrazábal y Juan L. Mallorquín)<br>Encarnación - Paraguay
                                                </a>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white dark:bg-neutral-900 flex items-center justify-center text-[#eb0a1e] shadow-xs flex-shrink-0 mt-0.5">
                                                <i class="fas fa-phone-alt text-xs"></i>
                                            </div>
                                            <div>
                                                <p class="text-[11px] font-bold text-slate-400 dark:text-neutral-400 uppercase tracking-wider">Teléfono</p>
                                                <a href="tel:+59571204106" class="text-xs font-extrabold text-slate-900 dark:text-white hover:text-[#eb0a1e] transition block">
                                                    +595 71 204 106 / +595 71 202 240
                                                </a>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-white dark:bg-neutral-900 flex items-center justify-center text-emerald-600 shadow-xs flex-shrink-0 mt-0.5">
                                                <i class="fab fa-whatsapp text-sm"></i>
                                            </div>
                                            <div>
                                                <p class="text-[11px] font-bold text-slate-400 dark:text-neutral-400 uppercase tracking-wider">Whatsapp</p>
                                                <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}" target="_blank" class="text-xs font-extrabold text-emerald-600 hover:underline block">
                                                    +595 985 204 106
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-3 border-t border-slate-200/70 dark:border-neutral-800 text-[11px] text-slate-500 dark:text-neutral-400 font-medium">
                                        <span class="font-bold text-slate-700 dark:text-neutral-300 block uppercase mb-1">Horario de Atención:</span>
                                        {{ \App\Models\Setting::get('schedule_info', 'Lunes a Viernes: 7:00 a 12:00 • 14:00 a 17:00 | Sábados: 7:30 a 12:00') }}
                                    </div>
                                </div>

                                <!-- Mapa Interactivo Embed CONSUR S.A. Casa Central -->
                                <div class="md:col-span-7 rounded-2xl overflow-hidden border border-slate-200/80 dark:border-neutral-800 min-h-[240px] shadow-xs relative">
                                    <iframe 
                                        title="Ubicación CONSUR S.A. Encarnación"
                                        width="100%" 
                                        height="100%" 
                                        style="border:0; min-height: 250px;" 
                                        loading="lazy" 
                                        allowfullscreen 
                                        referrerpolicy="no-referrer-when-downgrade"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3550.556270634676!2d-55.86776102432856!3d-27.33083651139443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9457b98d9e26e2e5%3A0xcda6b0808b534927!2sConsur%20S.A.!5e0!3m2!1ses!2spy!4v1714000000000!5m2!1ses!2spy">
                                    </iframe>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ========================================================== -->
                    <!-- COLUMNA DERECHA STICKY (Precio Contado, Formulario Asesor) -->
                    <!-- ========================================================== -->
                    <div class="lg:col-span-4 order-1 lg:order-2 lg:sticky lg:top-24 space-y-6">
                        <div class="bg-white dark:bg-[#111318] rounded-3xl p-6 sm:p-7 border border-slate-200/90 dark:border-neutral-800 shadow-sm space-y-5">
                            
                            <!-- Badge Disponible -->
                            <div>
                                <span class="inline-block bg-emerald-600 text-white text-[11px] font-extrabold uppercase px-3 py-1 rounded-full shadow-xs tracking-wider">
                                    {{ strtoupper($vehicle->status ?: 'Disponible') }}
                                </span>
                            </div>

                            <!-- Título del Vehículo -->
                            <div>
                                <span class="text-xs font-bold text-slate-400 dark:text-neutral-400 uppercase tracking-widest block mb-1">
                                    {{ $vehicle->brand->name ?? 'TOYOTA' }}
                                </span>
                                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white font-heading uppercase leading-tight tracking-tight">
                                    {{ $vehicle->full_name }}
                                </h1>
                            </div>

                            <!-- Featured Specs: Kilometraje y Año -->
                            <div class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 dark:bg-neutral-900 border border-slate-100 dark:border-neutral-800 text-xs">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-tachometer-alt text-[#eb0a1e] text-sm"></i>
                                    <div>
                                        <span class="text-slate-400 dark:text-neutral-400 font-semibold uppercase text-[10px] block leading-none">Kilometraje</span>
                                        <strong class="text-slate-900 dark:text-white font-extrabold text-sm">{{ $vehicle->formatted_mileage }}</strong>
                                    </div>
                                </div>
                                <div class="h-8 w-px bg-slate-200 dark:bg-neutral-800"></div>
                                <div class="flex items-center gap-2 pl-2">
                                    <i class="fas fa-calendar-alt text-[#eb0a1e] text-sm"></i>
                                    <div>
                                        <span class="text-slate-400 dark:text-neutral-400 font-semibold uppercase text-[10px] block leading-none">Año</span>
                                        <strong class="text-slate-900 dark:text-white font-extrabold text-sm">{{ $vehicle->year }}</strong>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-slate-100 dark:border-neutral-800">

                            <!-- Bloque Precio Contado en U$ -->
                            <div>
                                <span class="text-[10px] font-bold text-slate-400 dark:text-neutral-400 uppercase tracking-wider block leading-none mb-1">Precio Contado</span>
                                <div class="text-3xl font-black text-[#eb0a1e] font-heading leading-tight tracking-tight">
                                    {{ $vehicle->formatted_price_usd }}
                                </div>
                            </div>

                            <!-- Botón Consulta Rápida WhatsApp -->
                            @php
                                $waTextUsed = "Hola CONSUR S.A., quisiera información sobre el vehículo usado " . $vehicle->full_name . " (" . $vehicle->formatted_price_usd . ") disponible en CONSUR.";
                            @endphp
                            <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text={{ urlencode($waTextUsed) }}" 
                               target="_blank"
                               class="w-full py-3.5 bg-[#25D366] hover:bg-[#20bd5a] text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-emerald-600/20 flex items-center justify-center gap-2">
                                <i class="fab fa-whatsapp text-lg"></i>
                                <span>Contactar por WhatsApp</span>
                            </a>

                            <!-- Formulario de Contacto -->
                            <div class="bg-[#f1f4f9] dark:bg-neutral-900/90 rounded-2xl p-5 sm:p-6 border border-slate-200/70 dark:border-neutral-800 space-y-4">
                                <h4 class="text-base font-black text-slate-900 dark:text-white font-heading text-center uppercase tracking-wide">
                                    Contactá con un Asesor
                                </h4>

                                @if($sentSuccess)
                                    <div class="p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800/40 text-emerald-800 dark:text-emerald-300 text-xs text-center space-y-1">
                                        <i class="fas fa-check-circle text-2xl text-emerald-600"></i>
                                        <p class="font-bold">¡Consulta enviada con éxito!</p>
                                        <p class="text-slate-600 dark:text-neutral-300">Un asesor de CONSUR S.A. te responderá en breve.</p>
                                    </div>
                                @else
                                    <form wire:submit="submitLead" class="space-y-3">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">Nombre*</label>
                                            <input type="text" 
                                                   wire:model="clientName" 
                                                   placeholder="Tu nombre y apellido" 
                                                   required 
                                                   class="w-full text-xs font-semibold px-3.5 py-2.5 rounded-lg border border-slate-300 dark:border-neutral-700 focus:ring-2 focus:ring-[#eb0a1e]/30 focus:border-[#eb0a1e] bg-white dark:bg-[#111318] text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-neutral-500 transition outline-none">
                                            @error('clientName') <span class="text-[11px] text-red-600 font-semibold">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="grid grid-cols-2 gap-2.5">
                                            <div>
                                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">Teléfono*</label>
                                                <input type="tel" 
                                                       wire:model="clientPhone" 
                                                       placeholder="098X XXX XXX" 
                                                       required 
                                                       class="w-full text-xs font-semibold px-3.5 py-2.5 rounded-lg border border-slate-300 dark:border-neutral-700 focus:ring-2 focus:ring-[#eb0a1e]/30 focus:border-[#eb0a1e] bg-white dark:bg-[#111318] text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-neutral-500 transition outline-none">
                                                @error('clientPhone') <span class="text-[11px] text-red-600 font-semibold">{{ $message }}</span> @enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">Email</label>
                                                <input type="email" 
                                                       wire:model="clientEmail" 
                                                       placeholder="tu@email.com" 
                                                       class="w-full text-xs font-semibold px-3.5 py-2.5 rounded-lg border border-slate-300 dark:border-neutral-700 focus:ring-2 focus:ring-[#eb0a1e]/30 focus:border-[#eb0a1e] bg-white dark:bg-[#111318] text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-neutral-500 transition outline-none">
                                                @error('clientEmail') <span class="text-[11px] text-red-600 font-semibold">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">Ciudad*</label>
                                            <select wire:model="clientCity" 
                                                    class="w-full text-xs font-semibold pl-3.5 pr-10 py-2.5 rounded-lg border border-slate-300 dark:border-neutral-700 focus:ring-2 focus:ring-[#eb0a1e]/30 focus:border-[#eb0a1e] bg-white dark:bg-[#111318] text-slate-900 dark:text-white transition outline-none">
                                                <option value="">-- Selecciona tu ciudad --</option>
                                                <option value="Encarnación">Encarnación</option>
                                                <option value="Cambyretá">Cambyretá</option>
                                                <option value="Posadas">Posadas</option>
                                                <option value="Hohenau">Hohenau</option>
                                                <option value="Bella Vista">Bella Vista</option>
                                                <option value="Obligado">Obligado</option>
                                                <option value="Coronel Bogado">Coronel Bogado</option>
                                                <option value="San Ignacio">San Ignacio</option>
                                                <option value="Santa Rosa">Santa Rosa</option>
                                                <option value="Maria Auxiliadora">Maria Auxiliadora</option>
                                                <option value="Asunción">Asunción</option>
                                                <option value="Ciudad del Este">Ciudad del Este</option>
                                                <option value="Otra">Otra localidad</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">Mensaje*</label>
                                            <textarea wire:model="clientMessage" 
                                                      rows="2" 
                                                      placeholder="¿Te gustaría coordinar una visita o conocer planes de entrega?" 
                                                      class="w-full text-xs font-semibold px-3.5 py-2 rounded-lg border border-slate-300 dark:border-neutral-700 focus:ring-2 focus:ring-[#eb0a1e]/30 focus:border-[#eb0a1e] bg-white dark:bg-[#111318] text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-neutral-500 transition outline-none"></textarea>
                                        </div>

                                        <!-- Cloudflare Turnstile Verification -->
                                        <x-turnstile model="turnstileToken" theme="auto" action="vehicle_lead" />
                                        @error('turnstileToken')
                                            <p class="text-xs text-red-500 text-center font-semibold">{{ $message }}</p>
                                        @enderror

                                        <button type="submit" 
                                                wire:loading.attr="disabled"
                                                class="w-full py-3 bg-[#eb0a1e] hover:bg-red-700 disabled:opacity-50 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-red-600/20 flex items-center justify-center gap-2">
                                            <span wire:loading.remove>Enviar Consulta</span>
                                            <span wire:loading><i class="fas fa-spinner fa-spin"></i> Enviando...</span>
                                        </button>
                                    </form>
                                @endif

                                <p class="text-[10px] text-slate-500 dark:text-neutral-400 text-center leading-tight pt-1">
                                    Tus datos están protegidos. Un asesor oficial de CONSUR S.A. te brindará información detallada.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </main>
    @endif

    <!-- Sección: Vehículos Similares Recomendados (Para ambas vistas) -->
    @if($similarVehicles->count() > 0)
        <div class="bg-white dark:bg-slate-900 py-12 border-t border-slate-200 dark:border-slate-800 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs font-extrabold uppercase tracking-widest text-[#eb0a1e] block mb-1">
                            Sugerencias de CONSUR S.A.
                        </span>
                        <h3 class="text-2xl font-black text-slate-900 dark:text-white uppercase font-heading">
                            Modelos Similares
                        </h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($similarVehicles as $sim)
                        <a href="{{ route('vehiculo.detalle', $sim->slug) }}" class="bg-slate-50 dark:bg-slate-950 rounded-2xl border border-slate-200/80 dark:border-slate-800 p-4 shadow-xs hover:shadow-md transition group block">
                            <div class="aspect-[16/10] rounded-xl overflow-hidden mb-3 bg-white dark:bg-slate-900 flex items-center justify-center p-2">
                                <img src="{{ $sim->primary_image_url }}" alt="{{ $sim->full_name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                            </div>
                            <span class="text-[10px] font-bold text-[#eb0a1e] uppercase">{{ $sim->brand->name ?? '' }}</span>
                            <h4 class="text-sm font-bold text-slate-900 dark:text-white uppercase group-hover:text-[#eb0a1e] transition">{{ $sim->model }} {{ $sim->version }}</h4>
                            <div class="flex justify-between items-center mt-2 text-xs font-semibold">
                                <span class="text-slate-400 dark:text-neutral-500">{{ $sim->year }}</span>
                                <span class="font-extrabold text-slate-900 dark:text-white">{{ $sim->formatted_price_usd }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Modal Lightbox (Alpine.js) con Navegación de Teclado y Contador -->
    <div x-show="lightboxOpen" 
         x-cloak 
         @keydown.escape.window="lightboxOpen = false"
         @keydown.left.window="lightboxOpen && (activeImage = (activeImage - 1 + images.length) % images.length)"
         @keydown.right.window="lightboxOpen && (activeImage = (activeImage + 1) % images.length)"
         class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center p-4 backdrop-blur-md"
         @click.self="lightboxOpen = false">
        
        <!-- Contador de Foto en Lightbox -->
        <div class="absolute top-6 left-6 text-white/80 font-bold text-xs bg-white/10 backdrop-blur-md px-3.5 py-1.5 rounded-full border border-white/10 pointer-events-none">
            Foto <span x-text="activeImage + 1"></span> de <span x-text="images.length"></span>
        </div>

        <button @click="lightboxOpen = false" 
                class="absolute top-6 right-6 w-11 h-11 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition"
                title="Cerrar (Esc)">
            <i class="fas fa-times text-lg"></i>
        </button>

        <button @click="activeImage = (activeImage - 1 + images.length) % images.length" 
                class="absolute left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-white/30 text-white flex items-center justify-center transition shadow-lg"
                title="Anterior (Flecha izquierda)">
            <i class="fas fa-chevron-left text-lg"></i>
        </button>

        <img :src="images[activeImage]" class="max-h-[85vh] max-w-[90vw] object-contain rounded-2xl shadow-2xl select-none">

        <button @click="activeImage = (activeImage + 1) % images.length" 
                class="absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-white/30 text-white flex items-center justify-center transition shadow-lg"
                title="Siguiente (Flecha derecha)">
            <i class="fas fa-chevron-right text-lg"></i>
        </button>
    </div>
</div>
