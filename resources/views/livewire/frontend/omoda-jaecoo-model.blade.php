<div class="oj-theme bg-white dark:bg-slate-950 text-[#0d0e0e] dark:text-white antialiased overflow-x-hidden selection:bg-consur-red selection:text-white transition-colors"
     x-data="{
         activeColor: 0,
         colors: @js($modelData['configurator']['colors']),
         sentSuccess: @entangle('sentSuccess')
     }"
     x-init="
         colors.forEach(c => {
             const img = new Image();
             img.src = c.img;
         });
     ">

    <!-- Tipografías Oficiales OMODA | JAECOO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-ExtraLight.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-ExtraLight.otf') format('opentype');
            font-weight: 200;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Light.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Light.otf') format('opentype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Normal.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Normal.otf') format('opentype');
            font-weight: 350;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Regular.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Regular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Medium.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Medium.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Medium.otf') format('opentype');
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Bold.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Bold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Heavy.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Heavy.otf') format('opentype');
            font-weight: 800;
            font-style: normal;
            font-display: swap;
        }

        .oj-theme,
        .oj-theme .font-display,
        .oj-theme .font-sans,
        .oj-theme button,
        .oj-theme input,
        .oj-theme textarea {
            font-family: 'Source Han Sans HK', 'Noto Sans HK', Arial, sans-serif !important;
        }

        .oj-heading {
            font-family: 'Source Han Sans HK', 'Noto Sans HK', Arial, sans-serif !important;
            font-weight: 200;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            line-height: 1.1;
        }

        .swatch {
            width: 30px; height: 30px;
            border-radius: 50%;
            border: 1px solid rgba(15, 23, 42, 0.2);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }
        .swatch:hover {
            transform: translateY(-2px);
        }
        .swatch.active {
            transform: scale(1.15);
            box-shadow: 0 0 0 2px #ffffff, 0 0 0 4px #eb0a1e;
        }

        .btn-shimmer {
            background: linear-gradient(90deg, #eb0a1e 0%, #c50016 40%, #eb0a1e 60%, #c50016 100%);
            background-size: 200% 100%;
        }
        .btn-shimmer:hover {
            animation: shimmer 1.4s linear infinite;
        }

        .form-input-light {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #0f172a;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .form-input-light::placeholder { color: #94a3b8; }
        .form-input-light:focus {
            outline: none;
            background: #ffffff;
            border-color: #eb0a1e;
            box-shadow: 0 0 0 3px rgba(235,10,30,0.1);
        }

        /* ── Dark Mode Overrides (Slate / Deep Titanium Scheme) ── */
        .dark.oj-theme,
        .dark .oj-theme {
            background-color: #020617 !important;
            color: #ffffff !important;
        }
        .dark #colores {
            background-color: #020617 !important;
            border-color: #1e293b !important;
            color: #ffffff !important;
        }
        .dark #colores aside {
            background-color: #0f172a !important;
            border-color: #1e293b !important;
        }
        .dark #seguridad {
            background-color: #0f172a !important;
            border-color: #1e293b !important;
            color: #ffffff !important;
        }
        .dark #seguridad button {
            background-color: #020617 !important;
            border-color: #1e293b !important;
            color: #ffffff !important;
        }
        .dark #cotizacion {
            background-color: #020617 !important;
            border-color: #1e293b !important;
            color: #ffffff !important;
        }
        .dark #cotizacion > div > div {
            background-color: #0f172a !important;
            border-color: #1e293b !important;
        }
        .dark .form-input-light {
            background: #020617 !important;
            border-color: #1e293b !important;
            color: #ffffff !important;
        }
        .dark .form-input-light::placeholder {
            color: #64748b !important;
        }
        .dark .form-input-light:focus {
            background: #0f172a !important;
            border-color: #eb0a1e !important;
        }
        .dark section.bg-\[\#f4f5f7\] {
            background-color: #0b0c10 !important;
            border-color: #1f232c !important;
        }

        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <!-- ═══════════════════════════════════════════════════════════
         1. HERO (OSCURA — COMPACTA Y EQUILIBRADA)
    ═══════════════════════════════════════════════════════════ -->
    <header class="relative min-h-[480px] lg:min-h-[560px] flex items-end overflow-hidden bg-[#0d0e0e] pt-20">
        <img src="{{ $modelData['hero']['image'] }}" alt="{{ $modelData['name'] }}" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0d0e0e] via-[#0d0e0e]/45 to-[#0d0e0e]/20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0d0e0e]/90 via-[#0d0e0e]/40 to-transparent"></div>

        <!-- Subtle Top Bar inside Hero -->
        <div class="absolute top-6 left-0 right-0 z-20 max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between">
            <a href="{{ route('omoda-jaecoo') }}#modelos"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-black/55 hover:bg-black/80 border border-white/15 hover:border-consur-red/60 backdrop-blur-md text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-200 hover:text-white transition">
                <i class="fas fa-arrow-left text-[10px] text-consur-red"></i>
                <span class="hidden sm:inline">Todos los</span> Modelos
            </a>

            @if(!empty($modelData['catalog_pdf']))
                <a href="{{ $modelData['catalog_pdf'] }}" target="_blank" download
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-black/55 hover:bg-black/80 border border-white/15 hover:border-red-500/60 backdrop-blur-md text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-200 hover:text-white transition group"
                   title="Descargar Catálogo Oficial PDF">
                    <i class="fas fa-file-pdf text-red-500 text-xs group-hover:scale-110 transition-transform"></i>
                    <span>Catálogo <span class="hidden sm:inline">Oficial</span> PDF</span>
                </a>
            @endif
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-10 pb-14 sm:pb-20">
            <p data-aos="fade-up" data-aos-delay="50" class="text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.3em] text-consur-red">{{ $modelData['hero']['eyebrow'] }}</p>
            <h1 data-aos="fade-up" data-aos-delay="150" class="mt-4 oj-heading text-3xl sm:text-5xl lg:text-[52px] text-white">
                @foreach($modelData['hero']['lines'] as $line)
                    <span class="block">{{ $line }}</span>
                @endforeach
            </h1>
            <p data-aos="fade-up" data-aos-delay="250" class="mt-4 max-w-lg text-sm sm:text-[15px] text-slate-200 font-light leading-relaxed">{{ $modelData['hero']['description'] }}</p>
            <div data-aos="fade-up" data-aos-delay="350" class="mt-8 flex flex-wrap items-center gap-4">
                <a href="#cotizacion" class="inline-flex items-center justify-center gap-2.5 px-8 py-3.5 btn-shimmer text-white text-[11px] font-bold uppercase tracking-[0.16em] transition hover:-translate-y-0.5 shadow-lg shadow-red-950/40">
                    Cotizar este modelo
                </a>
                @if(!empty($modelData['viewer_3d']))
                    <a href="#visor3d" class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white text-[11px] font-semibold uppercase tracking-[0.16em] transition backdrop-blur-xs hover:-translate-y-0.5">
                        <i class="fas fa-cube text-consur-red"></i> Explorar en 3D
                    </a>
                @else
                    <a href="#colores" class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white text-[11px] font-semibold uppercase tracking-[0.16em] transition backdrop-blur-xs hover:-translate-y-0.5">
                        <i class="fas fa-sliders-h text-consur-red"></i> Ver Especificaciones
                    </a>
                @endif
            </div>
        </div>
    </header>

    <!-- ═══════════════════════════════════════════════════════════
         2. CONFIGURADOR DE COLOR + ESPECIFICACIONES (SECCIÓN CLARA - ESTILO OFICIAL)
    ═══════════════════════════════════════════════════════════ -->
    <section id="colores" class="bg-white text-[#0d0e0e] border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 sm:py-24">
            <div data-aos="fade-up" class="max-w-2xl">
                <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red">Personalización</p>
                <h2 class="mt-2 oj-heading text-3xl sm:text-5xl text-[#0d0e0e]">{{ $modelData['configurator']['heading'] }}</h2>
            </div>

            <div class="mt-10 grid grid-cols-1 lg:grid-cols-[1fr_1px_300px] gap-10 lg:gap-12 items-center">
                <!-- Visualizador del auto -->
                <div data-aos="fade-right">
                    <div class="relative aspect-[16/9] w-full flex items-center justify-center">
                        <template x-for="(c, i) in colors" :key="i">
                            <img :src="c.img" :alt="'{{ $modelData['name'] }} ' + c.name"
                                 class="absolute inset-0 w-full h-full object-contain transition-opacity duration-300"
                                 :class="activeColor === i ? 'opacity-100' : 'opacity-0 pointer-events-none'">
                        </template>
                    </div>
                    <p class="mt-4 text-center text-sm font-medium tracking-wide text-slate-600" x-text="colors[activeColor].name"></p>
                    <div class="mt-4 flex items-center justify-center gap-3.5 flex-wrap">
                        <template x-for="(c, i) in colors" :key="i">
                            <button type="button" @click="activeColor = i" class="swatch" :class="activeColor === i ? 'active' : ''"
                                    :style="c.style || ('background:' + c.hex)" :title="c.name" :aria-label="c.name"></button>
                        </template>
                    </div>
                </div>

                <!-- Divisor vertical -->
                <div class="hidden lg:block w-px h-full bg-slate-200"></div>

                <!-- Barra lateral de especificaciones técnicas -->
                <aside data-aos="fade-left" data-aos-delay="150" class="space-y-6 bg-slate-50 p-6 sm:p-8 lg:bg-transparent lg:p-0 rounded-2xl">
                    <h3 class="text-[10px] font-bold uppercase tracking-[0.25em] text-consur-red">Especificaciones clave</h3>

                    @foreach($modelData['configurator']['specs'] as $spec)
                        <div>
                            <p class="text-xs text-slate-500 font-normal">{{ $spec['label'] }}</p>
                            <p class="mt-1 oj-heading text-3xl sm:text-4xl text-[#0d0e0e] !font-light">
                                <span>{{ $spec['value'] }}</span><span class="ml-1.5 text-xs text-slate-500 font-normal normal-case tracking-normal">{{ $spec['unit'] }}</span>
                            </p>
                        </div>
                    @endforeach

                    <div class="pt-3 space-y-2.5">
                        <a href="https://wa.me/595985804106?text={{ urlencode($modelData['hero']['whatsapp_text']) }}" target="_blank" rel="noopener" class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-[#25D366] hover:bg-[#20bd5a] text-white text-[11px] font-bold uppercase tracking-[0.16em] rounded-xl transition shadow-sm">
                            <i class="fab fa-whatsapp text-base"></i> Hablar con un asesor
                        </a>
                        @if(!empty($modelData['catalog_pdf']))
                            <a href="{{ $modelData['catalog_pdf'] }}" target="_blank" download class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-slate-900 hover:bg-black dark:bg-slate-800 dark:hover:bg-slate-700 text-white text-[11px] font-semibold uppercase tracking-[0.16em] rounded-xl transition border border-slate-900 dark:border-slate-700 shadow-xs">
                                <i class="fas fa-file-pdf text-red-500 text-sm"></i> Descargar Catálogo (.PDF)
                            </a>
                        @endif
                        <a href="#cotizacion" class="block text-center text-[10px] text-slate-500 hover:text-consur-red font-semibold uppercase tracking-widest transition pt-1">
                            O solicitar cotización formal &rarr;
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Cotas y Dimensiones -->
            <div data-aos="fade-up" data-aos-delay="200" class="mt-14 pt-10 border-t border-slate-200 grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($modelData['configurator']['dimensions'] as $dim)
                    <div>
                        <p class="oj-heading text-3xl sm:text-4xl text-[#0d0e0e] !font-light">{{ $dim['value'] }}<em class="not-italic text-sm text-slate-400 ml-1 normal-case">{{ $dim['unit'] }}</em></p>
                        <p class="mt-1 text-[11px] font-medium uppercase tracking-widest text-slate-500">{{ $dim['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         3. CARACTERÍSTICAS DESTACADAS (ZIGZAG — SECCIÓN OSCURA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="caracteristicas" class="bg-[#0d0e0e] text-white py-20 sm:py-28">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 space-y-20 lg:space-y-28">
            @foreach($modelData['features'] as $idx => $feature)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                    <div data-aos="{{ $idx % 2 === 0 ? 'fade-right' : 'fade-left' }}" class="{{ $idx % 2 === 1 ? 'lg:order-2' : '' }} overflow-hidden rounded-xl border border-white/10 bg-black aspect-[4/3] shadow-2xl">
                        <img src="{{ $feature['image'] }}" alt="{{ $feature['title'] }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>
                    <div data-aos="{{ $idx % 2 === 0 ? 'fade-left' : 'fade-right' }}" data-aos-delay="100" class="{{ $idx % 2 === 1 ? 'lg:order-1' : '' }}">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red">{{ $feature['eyebrow'] }}</p>
                        <h2 class="mt-3 oj-heading text-3xl sm:text-4xl lg:text-5xl text-white">{{ $feature['title'] }}</h2>
                        <p class="mt-5 max-w-lg text-sm sm:text-[15px] text-slate-300 font-light leading-relaxed">{{ $feature['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         4. SISTEMAS DE SEGURIDAD (CARRUSEL INTERACTIVO — SECCIÓN CLARA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="seguridad" class="bg-[#f4f5f7] text-[#0d0e0e] border-y border-slate-200/80 py-20 sm:py-24 relative overflow-hidden"
             x-data="{
                 canScrollLeft: false,
                 canScrollRight: true,
                 checkScroll() {
                     const el = this.$refs.secTrack;
                     if (!el) return;
                     this.canScrollLeft = el.scrollLeft > 15;
                     this.canScrollRight = el.scrollLeft < (el.scrollWidth - el.clientWidth - 15);
                 },
                 scroll(dir) {
                     const el = this.$refs.secTrack;
                     if (!el) return;
                     const step = el.clientWidth * 0.75;
                     el.scrollBy({ left: dir * step, behavior: 'smooth' });
                     setTimeout(() => this.checkScroll(), 350);
                 }
             }"
             x-init="setTimeout(() => checkScroll(), 150); window.addEventListener('resize', () => checkScroll())">

        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <!-- Header con Título y Botones de Navegación -->
            <div data-aos="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-12">
                <div class="max-w-3xl">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red">{{ $modelData['security']['eyebrow'] }}</p>
                    <h2 class="mt-3 oj-heading text-3xl sm:text-4xl lg:text-5xl text-[#0d0e0e]">{{ $modelData['security']['heading'] }}</h2>
                </div>

                <!-- Botones circulares de navegación en el header -->
                <div class="flex items-center gap-3 shrink-0">
                    <button type="button"
                            @click="scroll(-1)"
                            :disabled="!canScrollLeft"
                            :class="canScrollLeft ? 'border-slate-300 hover:border-consur-red hover:bg-consur-red hover:text-white text-slate-800 cursor-pointer shadow-sm' : 'border-slate-200 text-slate-300 opacity-50 cursor-not-allowed'"
                            class="w-11 h-11 rounded-full border bg-white flex items-center justify-center transition-all duration-300"
                            aria-label="Anterior">
                        <i class="fas fa-arrow-left text-sm"></i>
                    </button>
                    <button type="button"
                            @click="scroll(1)"
                            :disabled="!canScrollRight"
                            :class="canScrollRight ? 'border-slate-300 hover:border-consur-red hover:bg-consur-red hover:text-white text-slate-800 cursor-pointer shadow-sm' : 'border-slate-200 text-slate-300 opacity-50 cursor-not-allowed'"
                            class="w-11 h-11 rounded-full border bg-white flex items-center justify-center transition-all duration-300"
                            aria-label="Siguiente">
                        <i class="fas fa-arrow-right text-sm"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Contenedor del Carrusel -->
        <div data-aos="fade-up" data-aos-delay="150" class="relative max-w-7xl mx-auto px-6 lg:px-10 group/track">

            <!-- Pista deslizable con snap horizontal y scrollbar oculto -->
            <div x-ref="secTrack"
                 @scroll.passive="checkScroll()"
                 class="flex gap-5 sm:gap-6 overflow-x-auto pb-4 pt-2 snap-x snap-mandatory scroll-smooth no-scrollbar select-none"
                 style="scrollbar-width: none; -ms-overflow-style: none;">

                @foreach($modelData['security']['items'] as $secItem)
                    <article class="group relative flex-shrink-0 w-[260px] sm:w-[290px] md:w-[310px] aspect-[3/4] rounded-2xl overflow-hidden snap-start cursor-pointer shadow-lg bg-[#0d0e0e]">
                        <img src="{{ $secItem['image'] }}" alt="{{ $secItem['title'] }}" loading="lazy"
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-black/10 opacity-90 group-hover:opacity-95 transition-opacity duration-300"></div>

                        <div class="absolute inset-x-0 bottom-0 h-1 bg-consur-red scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                        <div class="absolute inset-x-0 bottom-0 p-6 flex flex-col justify-end text-left z-10">
                            <div class="mb-3.5 inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md border border-white/15 text-consur-red text-sm group-hover:bg-consur-red group-hover:text-white group-hover:border-consur-red transition-all duration-300">
                                <i class="{{ $secItem['icon'] }}"></i>
                            </div>

                            <h3 class="text-base font-semibold uppercase tracking-wider text-white leading-snug">
                                {{ $secItem['title'] }}
                            </h3>

                            <p class="mt-2 text-xs sm:text-[13px] text-slate-300 font-light leading-relaxed">
                                {{ $secItem['description'] }}
                            </p>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </section>

    @if(!empty($modelData['viewer_3d']))
    <!-- ═══════════════════════════════════════════════════════════
         5. VISOR INTERACTIVO 3D 360° (LIENZO WEBGL OFICIAL)
    ═══════════════════════════════════════════════════════════ -->
    <section id="visor3d" class="relative bg-[#0d0e0e] text-white border-b border-slate-800 overflow-hidden select-none">
        <!-- Barra de título / Controles superiores -->
        <div class="max-w-7xl mx-auto px-6 lg:px-10 pt-16 pb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.3em] text-consur-red">
                    <span class="w-2 h-2 rounded-full bg-consur-red animate-pulse"></span>
                    Experiencia Interactiva 360°
                </div>
                <h2 class="mt-2 oj-heading text-3xl sm:text-4xl lg:text-5xl tracking-wide text-white">
                    {{ $modelData['viewer_3d']['title'] }}
                </h2>
                <p class="mt-2 text-sm text-slate-400 font-light max-w-xl leading-relaxed">
                    {{ $modelData['viewer_3d']['description'] }}
                </p>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-400 font-medium flex-wrap">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/5 border border-white/10">
                    <i class="fas fa-hand-pointer text-consur-red"></i> Arrastrá para rotar
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/5 border border-white/10">
                    <i class="fas fa-search-plus text-consur-red"></i> Zoom con rueda/pellizco
                </span>
                <button type="button" id="btnFullscreen3D" title="Pantalla completa" class="inline-flex items-center justify-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 text-white transition">
                    <i class="fas fa-expand text-xs text-consur-red" id="iconFullscreen3D"></i>
                    <span class="text-[11px] uppercase tracking-wider font-semibold">Pantalla completa</span>
                </button>
            </div>
        </div>

        <!-- Escenario del visor 3D WebGL -->
        <div class="relative w-full h-[75vh] min-h-[520px] max-h-[820px] bg-[#e6e6e4] overflow-hidden" id="visor3DStage">
            <!-- Loader animado mientras carga el render 3D -->
            <div id="visor3DLoader" class="absolute inset-0 z-10 flex flex-col items-center justify-center gap-4 bg-[#0d0e0e] text-slate-300 transition-opacity duration-500">
                <div class="relative w-14 h-14">
                    <div class="w-14 h-14 rounded-full border-2 border-white/10 border-t-consur-red animate-spin"></div>
                    <i class="fas fa-cube text-base text-consur-red absolute inset-0 flex items-center justify-center"></i>
                </div>
                <div class="text-center">
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-white">Cargando Modelo 3D...</p>
                    <p class="text-[11px] text-slate-500 mt-1">Renderizando {{ $modelData['name'] }} y entorno virtual</p>
                </div>
            </div>

            <!-- Iframe del Lienzo WebGL oficial 360° (Lazy-loaded via IntersectionObserver) -->
            <iframe 
                id="visor3DIframe" 
                data-src="{{ $modelData['viewer_3d']['iframe_url'] }}"
                class="w-full h-full border-0 opacity-0 transition-opacity duration-700 block" 
                title="{{ $modelData['viewer_3d']['iframe_title'] }}" 
                allowfullscreen 
                loading="lazy">
            </iframe>
        </div>

        <!-- Barra de acción post-exploración 3D -->
        <div class="bg-black/85 border-t border-white/10 py-4 px-6 lg:px-10">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
                <p class="text-xs text-slate-300 font-light">
                    ¿Te gustó el <strong class="text-white">{{ $modelData['name'] }}</strong>? Solicitá una propuesta personalizada o agendá tu test drive en CONSUR.
                </p>
                <div class="flex items-center gap-3">
                    <a href="#cotizacion" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl btn-shimmer text-white text-[11px] font-bold uppercase tracking-wider transition">
                        Cotizar este modelo
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- ═══════════════════════════════════════════════════════════
         6. GALERÍA FOTOGRÁFICA (ESTILO LEXUS: SLIDER + TABS + LIGHTBOX)
    ═══════════════════════════════════════════════════════════ -->
    <section id="galeria" class="bg-[#0d0e0e] text-white py-20 sm:py-28 relative overflow-hidden border-t border-white/10"
        x-data="{
            activeTab: 'todos',
            activeIdx: 0,
            lightbox: false,
            touchStartX: 0,
            touchEndX: 0,
            items: @js($modelData['gallery']),

            get filteredItems() {
                if (this.activeTab === 'todos') {
                    return this.items;
                }
                return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
            },

            get currentItem() {
                const list = this.filteredItems;
                if (!list.length) return { image: '', caption: '', category: '' };
                return list[this.activeIdx] || list[0];
            },

            setTab(tab) {
                this.activeTab = tab;
                this.activeIdx = 0;
                this.scrollToThumb(0);
            },

            selectItem(index) {
                this.activeIdx = index;
                this.scrollToThumb(index);
            },

            prev() {
                const total = this.filteredItems.length;
                if (total === 0) return;
                this.activeIdx = (this.activeIdx - 1 + total) % total;
                this.scrollToThumb(this.activeIdx);
            },

            next() {
                const total = this.filteredItems.length;
                if (total === 0) return;
                this.activeIdx = (this.activeIdx + 1) % total;
                this.scrollToThumb(this.activeIdx);
            },

            scrollToThumb(index) {
                this.$nextTick(() => {
                    const thumb = document.getElementById('oj_thumb_' + index);
                    if (thumb) {
                        thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                    }
                });
            },

            handleTouchStart(e) {
                if (e.changedTouches && e.changedTouches[0]) {
                    this.touchStartX = e.changedTouches[0].screenX;
                }
            },

            handleTouchEnd(e) {
                if (e.changedTouches && e.changedTouches[0]) {
                    this.touchEndX = e.changedTouches[0].screenX;
                    const diff = this.touchStartX - this.touchEndX;
                    if (diff > 45) {
                        this.next();
                    } else if (diff < -45) {
                        this.prev();
                    }
                }
            }
        }"
        @keydown.escape.window="lightbox = false"
        @keydown.arrow-left.window="if (lightbox) prev()"
        @keydown.arrow-right.window="if (lightbox) next()"
    >
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <!-- Header con título y pestañas interactivas de especificaciones -->
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-white/10" data-aos="fade-up">
                <div>
                    <h2 class="oj-heading text-3xl sm:text-5xl text-white">Galería</h2>
                </div>

                <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
                <div class="inline-flex items-center p-1 rounded-full bg-white/5 border border-white/10 self-start md:self-auto backdrop-blur-sm">
                    <button type="button" 
                        @click="setTab('todos')"
                        class="px-5 py-2 rounded-full text-xs font-semibold tracking-wider uppercase transition-all duration-300"
                        :class="activeTab === 'todos' ? 'bg-consur-red text-white shadow-lg shadow-consur-red/25' : 'text-slate-400 hover:text-white'">
                        Todos
                    </button>
                    <button type="button" 
                        @click="setTab('exterior')"
                        class="px-5 py-2 rounded-full text-xs font-semibold tracking-wider uppercase transition-all duration-300"
                        :class="activeTab === 'exterior' ? 'bg-consur-red text-white shadow-lg shadow-consur-red/25' : 'text-slate-400 hover:text-white'">
                        Exterior
                    </button>
                    <button type="button" 
                        @click="setTab('interior')"
                        class="px-5 py-2 rounded-full text-xs font-semibold tracking-wider uppercase transition-all duration-300"
                        :class="activeTab === 'interior' ? 'bg-consur-red text-white shadow-lg shadow-consur-red/25' : 'text-slate-400 hover:text-white'">
                        Interior
                    </button>
                </div>
            </div>

            <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
            <div class="mt-8 relative group" data-aos="fade-up" data-aos-delay="100">
                <div 
                    class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[640px] w-full overflow-hidden rounded-2xl bg-black border border-white/10 select-none shadow-2xl cursor-pointer"
                    @click="lightbox = true"
                    @touchstart="handleTouchStart($event)"
                    @touchend="handleTouchEnd($event)"
                >
                    <!-- Capa de Imágenes con transición suave -->
                    <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                        <div 
                            class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                            :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                        >
                            <img 
                                :src="item.image" 
                                :alt="'Foto ' + (idx + 1)" 
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                                loading="lazy"
                            >
                        </div>
                    </template>

                    <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                    <button 
                        type="button" 
                        @click.stop="lightbox = true"
                        class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-semibold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                        title="Ver en pantalla completa"
                    >
                        <i class="fas fa-expand text-consur-red text-xs"></i>
                        <span class="hidden sm:inline">Pantalla Completa</span>
                    </button>

                    <!-- Etiqueta Flotante de Categoría (Arriba Izquierda) -->
                    <div class="absolute top-4 left-4 z-20">
                        <span 
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-bold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                            x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'OMODA & JAECOO')"
                        ></span>
                    </div>

                    <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                    <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                            <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                            <span class="text-slate-400">/</span>
                            <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                        </span>
                    </div>
                </div>

                <!-- Botones de Navegación Anterior / Siguiente -->
                <button 
                    type="button" 
                    @click.stop="prev()"
                    class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-consur-red border border-white/20 hover:border-consur-red text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                    aria-label="Foto anterior"
                >
                    <i class="fas fa-chevron-left text-sm"></i>
                </button>
                <button 
                    type="button" 
                    @click.stop="next()"
                    class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-consur-red border border-white/20 hover:border-consur-red text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                    aria-label="Foto siguiente"
                >
                    <i class="fas fa-chevron-right text-sm"></i>
                </button>
            </div>

            <!-- Tira de Miniaturas Sincronizada -->
            <div class="mt-4 sm:mt-6" data-aos="fade-up" data-aos-delay="150">
                <div 
                    x-ref="thumbsWrapper"
                    class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
                >
                    <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                        <button 
                            type="button"
                            :id="'oj_thumb_' + idx"
                            @click="selectItem(idx)"
                            class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-lg overflow-hidden border transition-all duration-300 group focus:outline-none"
                            :class="activeIdx === idx 
                                ? 'border-consur-red ring-2 ring-consur-red/50 scale-[1.03] opacity-100 shadow-lg shadow-consur-red/20' 
                                : 'border-white/10 opacity-40 hover:opacity-85 hover:border-white/30'"
                            :title="'Foto ' + (idx + 1)"
                        >
                            <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                        </button>
                    </template>
                </div>
            </div>
        </div>

        <!-- ═══════════════════════════════════════════════════════════
             MODAL LIGHTBOX PANTALLA COMPLETA
        ═══════════════════════════════════════════════════════════ -->
        <div 
            x-show="lightbox"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
            @click.self="lightbox = false"
        >
            <!-- Barra superior del Lightbox -->
            <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-consur-red"></span>
                    <span class="text-xs uppercase tracking-widest font-semibold text-white" x-text="'{{ $modelData['name'] }} · ' + (currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span>
                </div>
                <button 
                    type="button" 
                    @click="lightbox = false"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                    title="Cerrar (Esc)"
                >
                    <i class="fas fa-times text-sm"></i>
                </button>
            </div>

            <!-- Imagen Central en Proporción Original Completa -->
            <div 
                class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <img 
                    :src="currentItem.image" 
                    :alt="'Foto ' + (activeIdx + 1)" 
                    class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
                >

                <!-- Flechas dentro del Lightbox -->
                <button 
                    type="button" 
                    @click.stop="prev()"
                    class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-consur-red border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                    aria-label="Anterior"
                >
                    <i class="fas fa-chevron-left text-base"></i>
                </button>
                <button 
                    type="button" 
                    @click.stop="next()"
                    class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-consur-red border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                    aria-label="Siguiente"
                >
                    <i class="fas fa-chevron-right text-base"></i>
                </button>
            </div>

            <!-- Barra inferior del Lightbox -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
                <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
                <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         7. TEST DRIVE (BANNER CON IMAGEN)
    ═══════════════════════════════════════════════════════════ -->
    <section class="relative min-h-[420px] flex items-center overflow-hidden bg-[#0d0e0e] border-t border-white/10">
        <img src="{{ $modelData['test_drive']['image'] }}" alt="{{ $modelData['name'] }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#0d0e0e]/80"></div>
        <div data-aos="zoom-in" class="relative z-10 w-full max-w-4xl mx-auto px-6 py-20 text-center">
            <p class="text-[11px] font-semibold uppercase tracking-[0.25em] text-consur-red">Probalo vos mismo</p>
            <h2 class="mt-4 oj-heading text-3xl sm:text-5xl text-white">
                <span class="block">{{ $modelData['test_drive']['line1'] }}</span>
                <span class="block">{{ $modelData['test_drive']['line2'] }}</span>
            </h2>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/595985804106?text={{ urlencode($modelData['hero']['whatsapp_text']) }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2.5 px-8 py-3.5 border border-white/40 hover:border-white hover:bg-white/10 text-white text-[11px] font-semibold uppercase tracking-[0.16em] transition">
                    <i class="fab fa-whatsapp text-sm"></i> Hablar con un asesor
                </a>
                <a href="#cotizacion" class="inline-flex items-center justify-center gap-2.5 px-8 py-3.5 btn-shimmer text-white text-[11px] font-semibold uppercase tracking-[0.16em] transition hover:-translate-y-0.5">
                    Cotizar este modelo
                </a>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         8. FORMULARIO DE COTIZACIÓN CONSUR (SECCIÓN CLARA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="cotizacion" class="bg-white text-[#0d0e0e] py-20 sm:py-24 border-t border-slate-200/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-10">

            <div data-aos="fade-up" class="relative rounded-3xl border border-slate-200/90 bg-white p-8 sm:p-14 shadow-xl overflow-hidden">
                <div class="relative z-10">
                    <div class="text-center max-w-2xl mx-auto mb-10">
                        <span class="inline-block text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red mb-3">
                            Atención oficial CONSUR S.A.
                        </span>
                        <h2 class="oj-heading text-3xl sm:text-5xl text-[#0d0e0e] mb-3">
                            Cotizá tu <span class="font-normal text-consur-red">{{ $modelData['name'] }}</span>
                        </h2>
                        <p class="text-sm text-slate-600 font-light">Completá tus datos y un asesor comercial de CONSUR te contactará a la brevedad con la mejor propuesta y planes de financiación.</p>
                    </div>

                    <div x-show="sentSuccess" x-cloak class="p-6 rounded-2xl bg-emerald-50 border border-emerald-200 text-center mb-8">
                        <i class="fas fa-check-circle text-emerald-600 text-3xl mb-3"></i>
                        <h4 class="font-bold text-slate-900 text-lg">¡Solicitud recibida con éxito!</h4>
                        <p class="text-sm text-slate-600 mt-1">Un asesor de CONSUR S.A. se comunicará contigo al teléfono provisto.</p>
                        <button @click="sentSuccess = false" type="button" class="text-xs text-emerald-700 underline font-semibold hover:text-emerald-800 transition mt-3">
                            Enviar otra consulta
                        </button>
                    </div>

                    <form x-show="!sentSuccess" wire:submit="submitQuotation" class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Nombre completo *</label>
                                <input type="text" wire:model="name" required placeholder="Ej. Juan Pérez"
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('name') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Teléfono / WhatsApp *</label>
                                <input type="tel" wire:model="phone" required placeholder="Ej. 0985 804 106"
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('phone') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Correo electrónico</label>
                                <input type="email" wire:model="email" placeholder="ejemplo@correo.com"
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('email') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Ciudad / Departamento</label>
                                <input type="text" wire:model="city" placeholder="Ej. Encarnación, Asunción..."
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('city') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Mensaje o consulta</label>
                            <textarea wire:model="message" rows="3" placeholder="¿Te interesa plan de financiación, entrega de usado o agendar un test drive?"
                                      class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 rounded-xl btn-shimmer text-white text-xs font-semibold uppercase tracking-[0.2em] transition shadow-lg hover:-translate-y-0.5">
                            <span wire:loading.remove wire:target="submitQuotation">Solicitar Cotización de {{ $modelData['name'] }}</span>
                            <span wire:loading wire:target="submitQuotation"><i class="fas fa-circle-notch fa-spin mr-2"></i> Enviando...</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         8. EXPLORAR OTROS MODELOS (SECCIÓN CLARA SUAVE)
    ═══════════════════════════════════════════════════════════ -->
    <section class="bg-[#f4f5f7] border-t border-slate-200/80 py-14">
        <div data-aos="fade-up" class="max-w-7xl mx-auto px-6 lg:px-10 text-center">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red">Gama Completa CONSUR</p>
            <h3 class="mt-2 oj-heading text-2xl sm:text-3xl text-[#0d0e0e]">Descubrí nuestros otros vehículos</h3>
            <div class="mt-7 flex flex-wrap justify-center items-center gap-3">
                <a href="{{ route('omoda-jaecoo') }}#modelos" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-slate-900 text-[11px] font-semibold uppercase tracking-[0.16em] text-white hover:bg-consur-red transition">
                    <i class="fas fa-th-large text-xs"></i> Ver showroom completo
                </a>

                @foreach($otherModels as $other)
                    <a href="{{ route('omoda-jaecoo.model', $other['slug']) }}" class="px-5 py-3 rounded-lg border border-slate-300 bg-white text-[11px] font-semibold uppercase tracking-widest text-slate-700 hover:text-consur-red hover:border-consur-red transition">
                        {{ $other['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @if(!empty($modelData['viewer_3d']))
    <!-- Script Autónomo del Visor 3D WebGL (Lazy loading + Fullscreen) -->
    <script>
        (function() {
            function init3DViewer() {
                const stage = document.getElementById('visor3DStage');
                const iframe = document.getElementById('visor3DIframe');
                const loader = document.getElementById('visor3DLoader');
                const btnFullscreen = document.getElementById('btnFullscreen3D');
                const iconFullscreen = document.getElementById('iconFullscreen3D');

                if (!stage || !iframe) return;

                let loaded = false;
                const loadViewer = () => {
                    if (loaded) return;
                    loaded = true;
                    const src = iframe.getAttribute('data-src');
                    if (src && !iframe.src) {
                        iframe.src = src;
                    }

                    iframe.addEventListener('load', () => {
                        iframe.classList.remove('opacity-0');
                        iframe.classList.add('opacity-100');
                        if (loader) {
                            loader.classList.add('opacity-0', 'pointer-events-none');
                            setTimeout(() => { loader.style.display = 'none'; }, 500);
                        }
                    }, { once: true });
                };

                // IntersectionObserver para carga diferida a 350px de distancia
                if ('IntersectionObserver' in window) {
                    const viewerObserver = new IntersectionObserver((entries) => {
                        if (entries.some(e => e.isIntersecting)) {
                            loadViewer();
                            viewerObserver.disconnect();
                        }
                    }, { rootMargin: '350px' });
                    viewerObserver.observe(stage);
                } else {
                    loadViewer();
                }

                // Control de Pantalla Completa
                if (btnFullscreen && !btnFullscreen._has3dListener) {
                    btnFullscreen._has3dListener = true;
                    btnFullscreen.addEventListener('click', () => {
                        if (!document.fullscreenElement) {
                            if (stage.requestFullscreen) {
                                stage.requestFullscreen();
                            } else if (stage.webkitRequestFullscreen) {
                                stage.webkitRequestFullscreen();
                            } else if (stage.msRequestFullscreen) {
                                stage.msRequestFullscreen();
                            }
                        } else {
                            if (document.exitFullscreen) {
                                document.exitFullscreen();
                            } else if (document.webkitExitFullscreen) {
                                document.webkitExitFullscreen();
                            } else if (document.msExitFullscreen) {
                                document.msExitFullscreen();
                            }
                        }
                    });

                    document.addEventListener('fullscreenchange', () => {
                        if (document.fullscreenElement === stage) {
                            if (iconFullscreen) iconFullscreen.className = 'fas fa-compress text-xs text-consur-red';
                        } else {
                            if (iconFullscreen) iconFullscreen.className = 'fas fa-expand text-xs text-consur-red';
                        }
                    });
                }
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init3DViewer);
            } else {
                init3DViewer();
            }
            document.addEventListener('livewire:navigated', init3DViewer);
        })();
    </script>
    @endif

</div>
