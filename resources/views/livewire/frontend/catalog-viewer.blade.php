<div class="w-full bg-slate-950 text-white min-h-screen select-none">

    <!-- 1. ENCABEZADO EDITORIAL COMPACTO DEL CATÁLOGO -->
    <section class="relative overflow-hidden border-b border-white/10 bg-gradient-to-b from-neutral-900 via-slate-950 to-slate-950 py-6 md:py-8">
        <!-- Brillo ambiental decorativo -->
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[700px] h-[220px] bg-[#eb0a1e]/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#eb0a1e]/15 border border-[#eb0a1e]/30 mb-2">
                        <span class="w-2 h-2 rounded-full bg-[#eb0a1e] animate-pulse"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-red-400">
                            {{ $edition }} &bull; Revista Interactiva 3D
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-light text-white tracking-normal font-heading leading-tight uppercase">
                        Catálogo <span class="font-normal text-[#eb0a1e]">CONSUR S.A.</span>
                    </h1>
                </div>

                <!-- Botones de Acción Directa -->
                <div class="flex flex-wrap items-center gap-2.5" data-aos="fade-left">
                    <a href="{{ $pdfUrl }}"
                       download
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-red-600/25 transition-all">
                        <i class="fas fa-file-arrow-down text-sm"></i>
                        <span>Descargar PDF</span>
                    </a>

                    <a href="{{ $pdfUrl }}"
                       target="_blank"
                       rel="noopener"
                       class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/15 text-xs font-semibold uppercase tracking-wider transition-all">
                        <i class="fas fa-arrow-up-right-from-square text-xs"></i>
                        <span>Abrir PDF</span>
                    </a>

                    <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20estoy%20viendo%20el%20Cat%C3%A1logo%20Digital%20y%20quisiera%20consultar%20sobre%20un%20modelo."
                       target="_blank"
                       rel="noopener"
                       class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-xl bg-emerald-600/20 hover:bg-emerald-600 text-emerald-300 hover:text-white border border-emerald-500/30 text-xs font-bold uppercase tracking-wider transition-all">
                        <i class="fab fa-whatsapp text-sm"></i>
                        <span>Consultar Modelo</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. ESCENARIO INTERACTIVO DE LA REVISTA 3D (TAMAÑO COMPLETO) -->
    <section class="relative py-4 md:py-6 px-2 sm:px-4 lg:px-6" id="catalog-stage-wrapper" wire:ignore>
        <div class="max-w-[1440px] mx-auto">

            <!-- Contenedor Principal del Visor (Soporta Fullscreen Nativo) -->
            <div id="magazine-fullscreen-container"
                 class="relative rounded-3xl bg-gradient-to-b from-[#151821] via-[#0f1117] to-[#090a0f] border border-white/10 shadow-[0_30px_90px_rgba(0,0,0,0.85)] overflow-hidden flex flex-col justify-between">

                <!-- Textura radial de iluminación detrás de la revista -->
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(235,10,30,0.10)_0%,rgba(15,23,42,0)_70%)] pointer-events-none"></div>

                <!-- BARRA SUPERIOR DE CONTROLES DEL VISOR -->
                <div class="relative z-20 flex flex-wrap items-center justify-between gap-3 px-4 sm:px-6 py-3 bg-black/70 backdrop-blur-md border-b border-white/10">
                    <!-- Indicador de Página y Título -->
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-white/10 text-xs font-mono font-bold text-white">
                            <i class="fas fa-book-open text-[#eb0a1e]"></i>
                            <span id="mag-page-indicator">Cargando...</span>
                        </span>
                        <span class="hidden md:inline-block text-xs text-slate-400 font-medium">
                            Arrastrá las esquinas o usá las flechas para hojear la revista a pantalla completa
                        </span>
                    </div>

                    <!-- Switcher de Modo (Revista 3D vs Cuadrícula) + Controles de Zoom y Pantalla Completa -->
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <!-- Botón Modo Revista 3D -->
                        <button type="button" id="btn-mode-flipbook"
                                class="px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 bg-[#eb0a1e] text-white shadow-sm"
                                title="Vista Revista 3D">
                            <i class="fas fa-book-open"></i>
                            <span class="hidden sm:inline">Revista 3D</span>
                        </button>

                        <!-- Botón Modo Cuadrícula -->
                        <button type="button" id="btn-mode-grid"
                                class="px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 bg-white/5 hover:bg-white/10 text-slate-300"
                                title="Ver todas las páginas en cuadrícula">
                            <i class="fas fa-grip"></i>
                            <span class="hidden sm:inline">Páginas</span>
                        </button>

                        <span class="h-5 w-px bg-white/10 mx-1"></span>

                        <!-- Zoom Out -->
                        <button type="button" id="btn-zoom-out"
                                class="w-8 h-8 rounded-lg bg-white/5 hover:bg-white/15 text-slate-300 hover:text-white flex items-center justify-center transition"
                                title="Alejar">
                            <i class="fas fa-magnifying-glass-minus text-xs"></i>
                        </button>

                        <!-- Zoom Nivel -->
                        <span id="mag-zoom-label" class="text-[11px] font-mono text-slate-300 min-w-[42px] text-center">100%</span>

                        <!-- Zoom In -->
                        <button type="button" id="btn-zoom-in"
                                class="w-8 h-8 rounded-lg bg-white/5 hover:bg-white/15 text-slate-300 hover:text-white flex items-center justify-center transition"
                                title="Acercar">
                            <i class="fas fa-magnifying-glass-plus text-xs"></i>
                        </button>

                        <!-- Miniaturas -->
                        <button type="button" id="btn-toggle-thumbs"
                                class="w-8 h-8 rounded-lg bg-white/5 hover:bg-white/15 text-slate-300 hover:text-white flex items-center justify-center transition"
                                title="Mostrar/Ocultar Miniaturas">
                            <i class="fas fa-images text-xs"></i>
                        </button>

                        <!-- Pantalla Completa -->
                        <button type="button" id="btn-fullscreen"
                                class="w-8 h-8 rounded-lg bg-white/5 hover:bg-[#eb0a1e] text-slate-300 hover:text-white flex items-center justify-center transition"
                                title="Pantalla Completa">
                            <i class="fas fa-expand text-xs" id="icon-fullscreen"></i>
                        </button>
                    </div>
                </div>

                <!-- ESTADO DE CARGA CON PROGRESO -->
                <div id="mag-loader" class="relative z-20 flex-1 flex flex-col items-center justify-center py-28 px-6 text-center">
                    <div class="w-16 h-16 rounded-2xl bg-[#eb0a1e]/15 border border-[#eb0a1e]/40 flex items-center justify-center mb-5 shadow-lg shadow-red-600/20">
                        <i class="fas fa-circle-notch fa-spin text-2xl text-[#eb0a1e]"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white font-heading uppercase tracking-wider">
                        Preparando Revista Digital 3D...
                    </h3>
                    <p id="mag-loader-status" class="text-xs text-slate-400 mt-1.5 font-mono">
                        Procesando pliegos en alta definición
                    </p>
                    <div class="w-56 h-1.5 bg-white/10 rounded-full overflow-hidden mt-4">
                        <div id="mag-loader-bar" class="h-full bg-[#eb0a1e] transition-all duration-300" style="width: 12%"></div>
                    </div>
                </div>

                <!-- ÁREA CENTRAL: REVISTA 3D INTERACTIVA OCUPANDO TODO EL ESCENARIO -->
                <div id="mag-flipbook-stage" class="relative z-10 flex-1 hidden items-center justify-center py-3 sm:py-5 px-2 sm:px-14 overflow-hidden min-h-[520px] sm:min-h-[680px] lg:min-h-[780px]">
                    <!-- Botón Anterior Lateral -->
                    <button type="button" id="btn-prev-page"
                            class="hidden sm:flex absolute left-3 lg:left-5 z-30 w-12 h-12 rounded-full bg-black/75 hover:bg-[#eb0a1e] text-white border border-white/15 items-center justify-center shadow-2xl transition-all duration-200 hover:scale-110 focus:outline-hidden cursor-pointer"
                            title="Página Anterior">
                        <i class="fas fa-chevron-left text-base"></i>
                    </button>

                    <!-- Contenedor Escalable del Libro 3D -->
                    <div id="mag-zoom-wrapper" class="w-full h-full flex items-center justify-center transition-transform duration-200 origin-center">
                        <div id="flipbook-canvas-root" class="shadow-[0_30px_80px_rgba(0,0,0,0.95)]"></div>
                    </div>

                    <!-- Botón Siguiente Lateral -->
                    <button type="button" id="btn-next-page"
                            class="hidden sm:flex absolute right-3 lg:right-5 z-30 w-12 h-12 rounded-full bg-black/75 hover:bg-[#eb0a1e] text-white border border-white/15 items-center justify-center shadow-2xl transition-all duration-200 hover:scale-110 focus:outline-hidden cursor-pointer"
                            title="Página Siguiente">
                        <i class="fas fa-chevron-right text-base"></i>
                    </button>

                    <!-- Banner de Fin de Catálogo (Aparece dinámicamente al llegar a la última página/pliego) -->
                    <div id="mag-end-banner" class="hidden absolute bottom-4 sm:bottom-6 z-30 inset-x-4 max-w-xl mx-auto bg-neutral-900/95 backdrop-blur-md border border-[#eb0a1e]/40 rounded-2xl p-3 sm:p-4 shadow-2xl text-center transition-all duration-300">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                            <div class="flex items-center gap-2.5 text-left">
                                <span class="w-8 h-8 rounded-xl bg-[#eb0a1e]/20 border border-[#eb0a1e]/40 flex items-center justify-center text-[#eb0a1e] shrink-0">
                                    <i class="fas fa-check-double text-xs"></i>
                                </span>
                                <div>
                                    <p class="text-xs font-bold text-white uppercase tracking-wider">Has llegado al final del catálogo</p>
                                    <p class="text-[11px] text-slate-400">¿Deseas consultar por algún modelo o plan de financiación?</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0 w-full sm:w-auto">
                                <button type="button" id="btn-end-restart" class="flex-1 sm:flex-initial px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer" title="Volver a la portada">
                                    <i class="fas fa-rotate-left text-[10px]"></i>
                                    <span>Portada</span>
                                </button>
                                <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20acabo%20de%20ver%20el%20Cat%C3%A1logo%20Digital%20completo%20y%20quiero%20recibir%20asesoramiento."
                                   target="_blank" rel="noopener"
                                   class="flex-1 sm:flex-initial px-3.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-md shadow-emerald-600/30">
                                    <i class="fab fa-whatsapp text-xs"></i>
                                    <span>Asesor</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ÁREA ALTERNATIVA: VISTA EN CUADRÍCULA DE TODAS LAS PÁGINAS -->
                <div id="mag-grid-stage" class="relative z-10 flex-1 hidden p-6 sm:p-10 overflow-y-auto max-h-[780px]">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-white font-heading uppercase">Vista Rápida de Páginas</h3>
                            <p class="text-xs text-slate-400">Hacé clic en cualquier página para abrirla directamente en la revista interactiva 3D.</p>
                        </div>
                    </div>
                    <div id="mag-grid-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6"></div>
                </div>

                <!-- CAJÓN DESPLEGABLE DE MINIATURAS (THUMBNAIL STRIP) -->
                <div id="mag-thumbs-drawer" class="relative z-20 hidden bg-black/90 backdrop-blur-md border-t border-white/10 px-4 py-3">
                    <div id="mag-thumbs-strip" class="flex items-center gap-3 overflow-x-auto pb-1 no-scrollbar"></div>
                </div>

                <!-- BARRA INFERIOR DE NAVEGACIÓN Y DESLIZADOR -->
                <div class="relative z-20 flex flex-col sm:flex-row items-center justify-between gap-4 px-4 sm:px-6 py-3 bg-black/70 backdrop-blur-md border-t border-white/10">
                    <!-- Controles rápidos móvil/escritorio -->
                    <div class="flex items-center gap-2">
                        <button type="button" id="btn-first-page"
                                class="px-2.5 py-1.5 rounded-lg bg-white/5 hover:bg-white/15 text-slate-300 hover:text-white text-xs transition cursor-pointer"
                                title="Primera Página">
                            <i class="fas fa-angles-left"></i>
                        </button>
                        <button type="button" id="btn-bottom-prev"
                                class="px-3.5 py-1.5 rounded-lg bg-white/10 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 cursor-pointer">
                            <i class="fas fa-chevron-left text-[10px]"></i>
                            <span>Anterior</span>
                        </button>
                        <button type="button" id="btn-bottom-next"
                                class="px-3.5 py-1.5 rounded-lg bg-white/10 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 cursor-pointer">
                            <span>Siguiente</span>
                            <i class="fas fa-chevron-right text-[10px]"></i>
                        </button>
                        <button type="button" id="btn-last-page"
                                class="px-2.5 py-1.5 rounded-lg bg-white/5 hover:bg-white/15 text-slate-300 hover:text-white text-xs transition cursor-pointer"
                                title="Última Página">
                            <i class="fas fa-angles-right"></i>
                        </button>
                    </div>

                    <!-- Slider de progreso de lectura -->
                    <div class="flex items-center gap-3 w-full sm:max-w-xs">
                        <span class="text-[11px] font-mono text-slate-400">Pág.</span>
                        <input type="range" id="mag-page-slider" min="1" max="1" value="1"
                               class="w-full accent-[#eb0a1e] h-1.5 bg-white/15 rounded-lg cursor-pointer">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. FRANJA DE ASESORAMIENTO RÁPIDO -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 pt-4">
        <div class="rounded-3xl bg-gradient-to-r from-neutral-900 via-neutral-900 to-red-950/40 border border-white/10 p-6 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
            <div class="space-y-1 text-center md:text-left">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block">Atención Personalizada CONSUR S.A.</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-white font-heading uppercase">
                    ¿Te interesó algún vehículo o promoción del catálogo?
                </h2>
                <p class="text-sm text-slate-400">
                    Solicitá tu cotización o agendá un Test Drive directamente con nuestro equipo de asesores comerciales.
                </p>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-3 shrink-0">
                <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20vi%20el%20Cat%C3%A1logo%20del%20mes%20y%20quiero%20recibir%20m%C3%A1s%20informaci%C3%B3n."
                   target="_blank"
                   rel="noopener"
                   class="px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-wider transition shadow-lg shadow-emerald-600/25 flex items-center gap-2">
                    <i class="fab fa-whatsapp text-base"></i>
                    <span>Hablar con un Asesor</span>
                </a>
                <a href="{{ route('home') }}#contacto"
                   class="px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/15 text-xs font-bold uppercase tracking-wider transition">
                    Solicitar Cotización
                </a>
            </div>
        </div>
    </section>

    <!-- ESTILOS DEL LIBRO 3D -->
    <style>
        .stf__parent {
            margin: 0 auto !important;
        }
        #flipbook-canvas-root {
            border-radius: 4px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.95), 0 0 0 1px rgba(255, 255, 255, 0.08);
            background-color: #ffffff;
        }
        .mag-page {
            background-color: #ffffff;
            overflow: hidden;
            box-shadow: inset 0 0 25px rgba(0, 0, 0, 0.08);
            outline: 1px solid rgba(0, 0, 0, 0.08);
        }
        .mag-page.--left {
            border-right: 1px solid rgba(0, 0, 0, 0.14);
            background-image: linear-gradient(to right, rgba(0,0,0,0) 90%, rgba(0,0,0,0.22) 100%);
        }
        .mag-page.--right {
            border-left: 1px solid rgba(0, 0, 0, 0.14);
            background-image: linear-gradient(to left, rgba(0,0,0,0) 90%, rgba(0,0,0,0.22) 100%);
        }
        .mag-page img {
            width: 100%;
            height: 100%;
            object-fit: fill;
            display: block;
            pointer-events: none;
            user-select: none;
        }
        #magazine-fullscreen-container:fullscreen {
            border-radius: 0;
            border: none;
            width: 100vw;
            height: 100vh;
            background: #090a0f;
        }
        #magazine-fullscreen-container:fullscreen #mag-flipbook-stage {
            min-height: calc(100vh - 115px);
        }
    </style>

    <!-- SCRIPTS: PDF.JS + STPAGEFLIP (CON AUTO-SPLIT DE PLIEGOS DOBLES Y ESCALADO FULL-STAGE) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.js"></script>
    <script>
        (function () {
            const pdfUrl = @json($pdfUrl);
            const loaderEl = document.getElementById('mag-loader');
            const loaderStatus = document.getElementById('mag-loader-status');
            const loaderBar = document.getElementById('mag-loader-bar');
            const flipbookStage = document.getElementById('mag-flipbook-stage');
            const gridStage = document.getElementById('mag-grid-stage');
            const gridContainer = document.getElementById('mag-grid-container');
            const flipRoot = document.getElementById('flipbook-canvas-root');
            const thumbsDrawer = document.getElementById('mag-thumbs-drawer');
            const thumbsStrip = document.getElementById('mag-thumbs-strip');
            const pageIndicator = document.getElementById('mag-page-indicator');
            const pageSlider = document.getElementById('mag-page-slider');
            const zoomWrapper = document.getElementById('mag-zoom-wrapper');
            const zoomLabel = document.getElementById('mag-zoom-label');
            const fullscreenContainer = document.getElementById('magazine-fullscreen-container');

            let pageFlip = null;
            let totalPages = 0;
            let currentZoom = 1;
            let singlePageAspect = 0.707;
            const extractedPages = [];

            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

            async function initMagazine() {
                try {
                    const loadingTask = pdfjsLib.getDocument(pdfUrl);
                    const pdf = await loadingTask.promise;
                    const rawNumPages = pdf.numPages;

                    for (let i = 1; i <= rawNumPages; i++) {
                        loaderStatus.textContent = `Procesando pliego ${i} de ${rawNumPages}...`;
                        loaderBar.style.width = `${Math.round((i / rawNumPages) * 100)}%`;

                        const page = await pdf.getPage(i);
                        const renderScale = window.innerWidth < 768 ? 1.8 : 2.4;
                        const viewport = page.getViewport({ scale: renderScale });

                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d', { alpha: false });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        await page.render({ canvasContext: ctx, viewport }).promise;

                        const rawAspect = viewport.width / viewport.height;

                        // Si la hoja del PDF es un pliego doble horizontal (2 páginas pegadas), la dividimos exactamente por la mitad
                        if (rawAspect > 1.15) {
                            const halfWidth = Math.floor(viewport.width / 2);
                            const fullHeight = viewport.height;
                            singlePageAspect = halfWidth / fullHeight;

                            // Mitad Izquierda
                            const leftCanvas = document.createElement('canvas');
                            leftCanvas.width = halfWidth;
                            leftCanvas.height = fullHeight;
                            leftCanvas.getContext('2d', { alpha: false }).drawImage(
                                canvas,
                                0, 0, halfWidth, fullHeight,
                                0, 0, halfWidth, fullHeight
                            );
                            const leftDataUrl = leftCanvas.toDataURL('image/jpeg', 0.92);

                            // Mitad Derecha
                            const rightCanvas = document.createElement('canvas');
                            rightCanvas.width = halfWidth;
                            rightCanvas.height = fullHeight;
                            rightCanvas.getContext('2d', { alpha: false }).drawImage(
                                canvas,
                                halfWidth, 0, viewport.width - halfWidth, fullHeight,
                                0, 0, halfWidth, fullHeight
                            );
                            const rightDataUrl = rightCanvas.toDataURL('image/jpeg', 0.92);

                            // En móvil (vista de 1 página), en el primer pliego colocamos primero la Portada (mitad derecha)
                            if (i === 1 && window.innerWidth < 768) {
                                extractedPages.push(rightDataUrl);
                                extractedPages.push(leftDataUrl);
                            } else {
                                extractedPages.push(leftDataUrl);
                                extractedPages.push(rightDataUrl);
                            }
                        } else {
                            singlePageAspect = rawAspect;
                            extractedPages.push(canvas.toDataURL('image/jpeg', 0.92));
                        }
                    }

                    totalPages = extractedPages.length;
                    pageSlider.max = totalPages;

                    // Construir elementos DOM para cada página individual
                    extractedPages.forEach((dataUrl, idx) => {
                        const pageNum = idx + 1;

                        const pageDiv = document.createElement('div');
                        pageDiv.className = 'mag-page';
                        pageDiv.setAttribute('data-density', 'soft');

                        const img = document.createElement('img');
                        img.src = dataUrl;
                        img.alt = `Página ${pageNum}`;
                        pageDiv.appendChild(img);
                        flipRoot.appendChild(pageDiv);

                        // Miniatura
                        const thumbBtn = document.createElement('button');
                        thumbBtn.type = 'button';
                        thumbBtn.dataset.pageIndex = idx;
                        thumbBtn.className = 'mag-thumb-item group relative shrink-0 w-16 sm:w-20 rounded-lg overflow-hidden border-2 border-white/15 hover:border-[#eb0a1e] transition-all focus:outline-hidden cursor-pointer';
                        thumbBtn.innerHTML = `
                            <img src="${dataUrl}" alt="Pág ${pageNum}" class="w-full h-auto object-cover">
                            <span class="absolute bottom-0 inset-x-0 bg-black/75 text-[10px] font-mono text-white py-0.5 text-center">${pageNum}</span>
                        `;
                        thumbBtn.addEventListener('click', () => {
                            if (pageFlip) pageFlip.flip(idx);
                        });
                        thumbsStrip.appendChild(thumbBtn);

                        // Tarjeta de Vista Cuadrícula
                        const gridCard = document.createElement('div');
                        gridCard.className = 'group relative rounded-2xl overflow-hidden bg-neutral-900 border border-white/10 hover:border-[#eb0a1e] cursor-pointer shadow-lg transition-all hover:-translate-y-1';
                        gridCard.innerHTML = `
                            <div class="bg-white overflow-hidden">
                                <img src="${dataUrl}" alt="Página ${pageNum}" class="w-full h-auto object-contain group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-3 bg-neutral-900/95 flex items-center justify-between">
                                <span class="text-xs font-bold text-white font-heading uppercase">Página ${pageNum}</span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#eb0a1e] flex items-center gap-1">
                                    Ver <i class="fas fa-arrow-right text-[9px]"></i>
                                </span>
                            </div>
                        `;
                        gridCard.addEventListener('click', () => {
                            switchMode('flipbook');
                            setTimeout(() => {
                                if (pageFlip) pageFlip.flip(idx);
                            }, 80);
                        });
                        gridContainer.appendChild(gridCard);
                    });

                    // Mostrar escenario y ocultar loader
                    loaderEl.classList.add('hidden');
                    flipbookStage.classList.remove('hidden');
                    flipbookStage.classList.add('flex');

                    // Calcular el tamaño exacto de cada hoja para que la revista abierta ocupe todo el visor sin franjas vacías
                    const isMobile = window.innerWidth < 768;
                    const stageAvailWidth = Math.min(window.innerWidth - (isMobile ? 20 : 180), 1240);
                    const stageAvailHeight = isMobile ? Math.min(window.innerHeight * 0.76, 660) : Math.min(window.innerHeight * 0.80, 780);

                    let pageWidth, pageHeight;
                    if (isMobile) {
                        pageWidth = Math.round(stageAvailWidth);
                        pageHeight = Math.round(pageWidth / singlePageAspect);
                        if (pageHeight > stageAvailHeight) {
                            pageHeight = Math.round(stageAvailHeight);
                            pageWidth = Math.round(pageHeight * singlePageAspect);
                        }
                    } else {
                        // En escritorio se muestran 2 páginas abiertas lado a lado (pliego completo)
                        const maxSingleWidth = Math.floor(stageAvailWidth / 2);
                        pageHeight = Math.round(stageAvailHeight);
                        pageWidth = Math.round(pageHeight * singlePageAspect);

                        if (pageWidth > maxSingleWidth) {
                            pageWidth = maxSingleWidth;
                            pageHeight = Math.round(pageWidth / singlePageAspect);
                        }
                    }

                    pageFlip = new St.PageFlip(flipRoot, {
                        width: pageWidth,
                        height: pageHeight,
                        size: 'fixed',
                        maxShadowOpacity: 0.7,
                        showCover: false,
                        mobileScrollSupport: false,
                        swipeDistance: 25,
                        usePortrait: isMobile,
                        flippingTime: 650,
                        drawShadow: true
                    });

                    pageFlip.loadFromHTML(document.querySelectorAll('#flipbook-canvas-root .mag-page'));

                    updatePageUI(0);

                    pageFlip.on('flip', (e) => {
                        updatePageUI(e.data);
                    });
                } catch (err) {
                    console.error('Error al cargar el catálogo PDF:', err);
                    loaderEl.innerHTML = `
                        <div class="max-w-md mx-auto space-y-4">
                            <i class="fas fa-file-pdf text-4xl text-[#eb0a1e]"></i>
                            <h3 class="text-lg font-bold text-white">Visualizador Directo Disponible</h3>
                            <p class="text-xs text-slate-400">Podés abrir o descargar el catálogo directamente desde el siguiente botón:</p>
                            <a href="${pdfUrl}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-wider">
                                <i class="fas fa-external-link-alt"></i> Abrir Catálogo PDF
                            </a>
                        </div>
                    `;
                }
            }

            const endBanner = document.getElementById('mag-end-banner');
            const btnPrevPage = document.getElementById('btn-prev-page');
            const btnNextPage = document.getElementById('btn-next-page');
            const btnBottomPrev = document.getElementById('btn-bottom-prev');
            const btnBottomNext = document.getElementById('btn-bottom-next');
            const btnFirstPage = document.getElementById('btn-first-page');
            const btnLastPage = document.getElementById('btn-last-page');

            function updatePageUI(pageIndex) {
                const isMobile = window.innerWidth < 768;
                const currentNum = pageIndex + 1;
                const isAtStart = pageIndex === 0;
                // En modo escritorio (2 páginas), el final se alcanza cuando el pliego cubre la última página
                const isAtEnd = isMobile ? (pageIndex >= totalPages - 1) : (pageIndex + 2 >= totalPages || currentNum >= totalPages);

                if (!isMobile && currentNum < totalPages) {
                    pageIndicator.textContent = `Páginas ${currentNum}–${currentNum + 1} de ${totalPages}`;
                } else if (isAtEnd) {
                    pageIndicator.textContent = `Página ${currentNum} de ${totalPages} • Final`;
                } else {
                    pageIndicator.textContent = `Página ${currentNum} de ${totalPages}`;
                }
                pageSlider.value = currentNum;

                // Controles de retroceso (Inicio)
                if (btnPrevPage) {
                    btnPrevPage.classList.toggle('opacity-0', isAtStart);
                    btnPrevPage.classList.toggle('pointer-events-none', isAtStart);
                }
                if (btnBottomPrev) {
                    btnBottomPrev.disabled = isAtStart;
                    btnBottomPrev.classList.toggle('opacity-30', isAtStart);
                    btnBottomPrev.classList.toggle('cursor-not-allowed', isAtStart);
                    btnBottomPrev.classList.toggle('pointer-events-none', isAtStart);
                }
                if (btnFirstPage) {
                    btnFirstPage.disabled = isAtStart;
                    btnFirstPage.classList.toggle('opacity-30', isAtStart);
                    btnFirstPage.classList.toggle('cursor-not-allowed', isAtStart);
                    btnFirstPage.classList.toggle('pointer-events-none', isAtStart);
                }

                // Controles de avance (Fin)
                if (btnNextPage) {
                    btnNextPage.classList.toggle('opacity-0', isAtEnd);
                    btnNextPage.classList.toggle('pointer-events-none', isAtEnd);
                }
                if (btnBottomNext) {
                    btnBottomNext.disabled = isAtEnd;
                    btnBottomNext.classList.toggle('opacity-30', isAtEnd);
                    btnBottomNext.classList.toggle('cursor-not-allowed', isAtEnd);
                    btnBottomNext.classList.toggle('pointer-events-none', isAtEnd);
                }
                if (btnLastPage) {
                    btnLastPage.disabled = isAtEnd;
                    btnLastPage.classList.toggle('opacity-30', isAtEnd);
                    btnLastPage.classList.toggle('cursor-not-allowed', isAtEnd);
                    btnLastPage.classList.toggle('pointer-events-none', isAtEnd);
                }

                // Banner de Fin de Catálogo
                if (endBanner) {
                    if (isAtEnd) {
                        endBanner.classList.remove('hidden');
                    } else {
                        endBanner.classList.add('hidden');
                    }
                }

                document.querySelectorAll('.mag-thumb-item').forEach((btn) => {
                    const idx = parseInt(btn.dataset.pageIndex, 10);
                    if (idx === pageIndex || (!isMobile && idx === pageIndex + 1)) {
                        btn.classList.add('border-[#eb0a1e]', 'ring-2', 'ring-[#eb0a1e]/50');
                        btn.classList.remove('border-white/15');
                    } else {
                        btn.classList.remove('border-[#eb0a1e]', 'ring-2', 'ring-[#eb0a1e]/50');
                        btn.classList.add('border-white/15');
                    }
                });
            }

            function switchMode(mode) {
                const btnFlip = document.getElementById('btn-mode-flipbook');
                const btnGrid = document.getElementById('btn-mode-grid');

                if (mode === 'grid') {
                    flipbookStage.classList.add('hidden');
                    flipbookStage.classList.remove('flex');
                    gridStage.classList.remove('hidden');

                    btnGrid.className = 'px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 bg-[#eb0a1e] text-white shadow-sm';
                    btnFlip.className = 'px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 bg-white/5 hover:bg-white/10 text-slate-300';
                } else {
                    gridStage.classList.add('hidden');
                    flipbookStage.classList.remove('hidden');
                    flipbookStage.classList.add('flex');

                    btnFlip.className = 'px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 bg-[#eb0a1e] text-white shadow-sm';
                    btnGrid.className = 'px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider transition flex items-center gap-1.5 bg-white/5 hover:bg-white/10 text-slate-300';
                }
            }

            function applyZoom(newZoom) {
                currentZoom = Math.min(1.6, Math.max(0.8, Number(newZoom.toFixed(2))));
                zoomWrapper.style.transform = `scale(${currentZoom})`;
                zoomLabel.textContent = `${Math.round(currentZoom * 100)}%`;
            }

            // Controles de navegación
            document.getElementById('btn-prev-page')?.addEventListener('click', () => pageFlip && pageFlip.flipPrev());
            document.getElementById('btn-next-page')?.addEventListener('click', () => pageFlip && pageFlip.flipNext());
            document.getElementById('btn-bottom-prev')?.addEventListener('click', () => pageFlip && pageFlip.flipPrev());
            document.getElementById('btn-bottom-next')?.addEventListener('click', () => pageFlip && pageFlip.flipNext());
            document.getElementById('btn-first-page')?.addEventListener('click', () => pageFlip && pageFlip.flip(0));
            document.getElementById('btn-last-page')?.addEventListener('click', () => pageFlip && pageFlip.flip(totalPages - 1));
            document.getElementById('btn-end-restart')?.addEventListener('click', () => pageFlip && pageFlip.flip(0));

            pageSlider?.addEventListener('input', (e) => {
                const targetPage = parseInt(e.target.value, 10) - 1;
                if (pageFlip) pageFlip.flip(targetPage);
            });

            // Teclado <- y ->
            window.addEventListener('keydown', (e) => {
                if (!pageFlip) return;
                if (e.key === 'ArrowLeft') pageFlip.flipPrev();
                if (e.key === 'ArrowRight') pageFlip.flipNext();
            });

            // Modos
            document.getElementById('btn-mode-flipbook')?.addEventListener('click', () => switchMode('flipbook'));
            document.getElementById('btn-mode-grid')?.addEventListener('click', () => switchMode('grid'));

            // Zoom
            document.getElementById('btn-zoom-in')?.addEventListener('click', () => applyZoom(currentZoom + 0.15));
            document.getElementById('btn-zoom-out')?.addEventListener('click', () => applyZoom(currentZoom - 0.15));

            // Miniaturas
            document.getElementById('btn-toggle-thumbs')?.addEventListener('click', () => {
                thumbsDrawer.classList.toggle('hidden');
            });

            // Pantalla Completa
            document.getElementById('btn-fullscreen')?.addEventListener('click', () => {
                if (!document.fullscreenElement) {
                    fullscreenContainer.requestFullscreen().catch(() => {});
                } else {
                    document.exitFullscreen().catch(() => {});
                }
            });

            document.addEventListener('fullscreenchange', () => {
                const icon = document.getElementById('icon-fullscreen');
                if (document.fullscreenElement) {
                    icon.classList.remove('fa-expand');
                    icon.classList.add('fa-compress');
                } else {
                    icon.classList.remove('fa-compress');
                    icon.classList.add('fa-expand');
                }
            });

            initMagazine();
        })();
    </script>
</div>
