<div class="space-y-6">
    <!-- Header Superior -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-0.5 rounded-full bg-red-50 text-red-600 text-[10px] font-extrabold uppercase tracking-wider border border-red-200">
                    <i class="fas fa-file-code mr-1"></i> Editor CMS & Landing Pages
                </span>
            </div>
            <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight font-heading">Páginas Institucionales</h1>
            <p class="text-xs sm:text-sm text-slate-500">Gestor de contenidos, cabeceras y carruseles con soporte para computadoras y dispositivos móviles.</p>
        </div>
        <div class="flex items-center gap-2">
            @if($isOpen)
                <button wire:click="closeModal" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold uppercase tracking-wider transition shadow-2xs">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver al Listado</span>
                </button>
            @else
                <button wire:click="create" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider transition shadow-sm">
                    <i class="fas fa-plus"></i>
                    <span>Nueva Página</span>
                </button>
            @endif
        </div>
    </div>

    @if($isOpen)
        <!-- ======================================================== -->
        <!-- EDITOR DE PÁGINA CMS (DISEÑO FULL-SCREEN PREMIUM)        -->
        <!-- ======================================================== -->
        <form wire:submit="save" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- COLUMNA PRINCIPAL DE EDICIÓN (8 COLS) -->
            <div class="lg:col-span-8 space-y-6">

                <!-- 1. BLOQUE DE TÍTULO & ENLACE PERMANENTE -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8 space-y-5">
                    <div class="space-y-3">
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400">Título del Documento</label>
                        <input type="text" wire:model.live.debounce.300ms="title"
                               placeholder="Añadir título de la página..."
                               class="w-full text-2xl sm:text-3xl font-black text-slate-900 border-0 border-b-2 border-slate-200 focus:border-red-600 focus:ring-0 px-0 pb-3 bg-transparent placeholder-slate-300 tracking-tight font-heading transition">
                        @error('title') <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span> @enderror
                    </div>

                    <!-- Barra de Enlace Permanente (Slug amigable) -->
                    <div class="flex flex-wrap items-center gap-2 text-xs text-slate-500 pt-2 border-t border-slate-100" x-data="{ editingSlug: false }">
                        <span class="font-bold text-slate-400 uppercase text-[10px] tracking-wider flex items-center gap-1.5">
                            <i class="fas fa-link text-slate-400 text-xs"></i> Enlace permanente:
                        </span>
                        
                        <template x-if="!editingSlug">
                            <div class="flex items-center gap-2">
                                <span class="font-mono text-slate-700 bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200 text-xs">
                                    https://consur.com.py/pagina/<strong class="text-red-600">{{ $slug ?: '...' }}</strong>
                                </span>
                                <button type="button" @click="editingSlug = true" class="text-red-600 hover:text-red-700 font-bold text-xs underline cursor-pointer">
                                    Editar
                                </button>
                            </div>
                        </template>

                        <template x-if="editingSlug">
                            <div class="flex items-center gap-1.5">
                                <span class="text-xs text-slate-400 font-mono">/pagina/</span>
                                <input type="text" wire:model="slug" class="input-field py-1 px-2.5 text-xs font-mono w-44">
                                <button type="button" @click="editingSlug = false" class="px-2.5 py-1 bg-slate-900 text-white rounded-lg text-xs font-bold hover:bg-slate-800 transition">
                                    Listo
                                </button>
                            </div>
                        </template>

                        @if($selectedId && $slug)
                            <a href="{{ route('page.show', $slug) }}" target="_blank"
                               class="text-slate-500 hover:text-red-600 font-bold text-xs inline-flex items-center gap-1 sm:ml-auto transition">
                                <span>Ver página en vivo</span>
                                <i class="fas fa-external-link-alt text-[10px]"></i>
                            </a>
                        @endif
                    </div>

                    <!-- Resumen / Subtítulo -->
                    <div class="pt-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Subtítulo o Resumen Breve
                        </label>
                        <textarea wire:model="subtitle" rows="2"
                                  placeholder="Escribe una breve introducción o lema que resuma esta página (opcional)..."
                                  class="input-field text-xs bg-slate-50/50 hover:bg-white focus:bg-white transition"></textarea>
                    </div>
                </div>

                <!-- 2. VINCULACIÓN CON BANNERS & SLIDERS HERO (SHORTCODE DINÁMICO) -->
                @if(str_contains($content, '[slider:') || $slug === 'seguros')
                    <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-950 text-white rounded-3xl p-6 sm:p-7 shadow-lg border border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-red-600/20 text-red-500 flex items-center justify-center text-xl border border-red-500/30 shrink-0">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-red-400">Carrusel Hero Dinámico Activo</span>
                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 text-[10px] font-mono font-bold border border-emerald-500/30">
                                        [slider:{{ $slug === 'seguros' ? 'seguros' : 'home' }}]
                                    </span>
                                </div>
                                <h3 class="text-base font-bold text-white">Carrusel Gestionado desde Banners & Sliders</h3>
                                <p class="text-xs text-slate-300">
                                    Las imágenes para Desktop (1920x633) y Mobile (600x953), orden y enlaces de WhatsApp se administran desde el panel central de Sliders, sin tocar código HTML.
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('admin.sliders') }}" target="_blank"
                           class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md flex items-center gap-2 shrink-0 self-start md:self-auto">
                            <i class="fas fa-sliders-h text-xs"></i>
                            <span>Gestionar Diapositivas</span>
                            <i class="fas fa-external-link-alt text-[10px]"></i>
                        </a>
                    </div>
                @endif

                <!-- 3. SUBIDA DIRECTA DE IMÁGENES / BIBLIOTECA RÁPIDA -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-sm border border-blue-100">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Cargar Imágenes para el Contenido</h3>
                                <p class="text-[11px] text-slate-400">Subí fotos directamente a la galería para insertarlas en cualquier bloque de texto.</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-2 border-dashed border-slate-200 hover:border-red-500 rounded-2xl p-6 text-center transition bg-slate-50/50">
                        <input type="file" wire:model="contentUpload" accept="image/*" id="page-content-upload" class="hidden">
                        <label for="page-content-upload" class="cursor-pointer space-y-2 block">
                            <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto text-xl">
                                <i class="fas fa-arrow-up-from-bracket"></i>
                            </div>
                            <p class="text-xs font-bold text-slate-700">
                                Hacé clic para <span class="text-red-600 underline">seleccionar una imagen</span> desde tu equipo
                            </p>
                            <p class="text-[11px] text-slate-400">
                                JPG, PNG, WebP (Máx. 8 MB). Se comprime y genera enlace público al instante.
                            </p>
                        </label>
                    </div>

                    <div wire:loading wire:target="contentUpload" class="p-3 bg-amber-50 rounded-xl text-xs text-amber-700 flex items-center gap-2">
                        <i class="fas fa-spinner fa-spin"></i> Subiendo y optimizando archivo...
                    </div>
                    @error('contentUpload') <span class="text-red-500 text-xs block">{{ $message }}</span> @enderror

                    @if($lastUploadedUrl)
                        <div class="p-4 bg-emerald-50/70 border border-emerald-200 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $lastUploadedUrl }}" alt="Última subida" class="w-16 h-12 object-cover rounded-xl border border-emerald-300 shadow-2xs">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700">¡Imagen subida con éxito!</span>
                                    <p class="text-xs font-mono text-slate-700 truncate max-w-xs">{{ $lastUploadedUrl }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" x-data @click="navigator.clipboard.writeText('{{ $lastUploadedUrl }}'); alert('URL copiada al portapapeles: {{ $lastUploadedUrl }}')"
                                        class="px-3.5 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl transition shadow-2xs flex items-center gap-1.5">
                                    <i class="fas fa-copy"></i> Copiar URL
                                </button>
                                <button type="button" wire:click="insertUploadedImage"
                                        class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition shadow-2xs flex items-center gap-1.5">
                                    <i class="fas fa-plus"></i> Insertar en Contenido
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- 4. EDITOR DE CONTENIDO (HTML / TEXTO ENRIQUECIDO) -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-sm border border-purple-100">
                                <i class="fas fa-code"></i>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Cuerpo del Contenido (HTML Enriquecido) *</h3>
                                <p class="text-[11px] text-slate-400">Podés redactar texto estándar o bloques con formato HTML completo.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <textarea wire:model="content" rows="18"
                                  class="w-full font-mono text-xs rounded-2xl border border-slate-800 bg-slate-950 text-emerald-400 p-5 focus:ring-2 focus:ring-red-500 focus:border-red-500 leading-relaxed shadow-inner"
                                  placeholder="<p>Texto introductorio de la página...</p>"></textarea>
                        @error('content') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- COLUMNA LATERAL: AJUSTES DE DOCUMENTO (INSPECTOR - 4 COLS) -->
            <div class="lg:col-span-4 space-y-6">

                <!-- 1. PUBLICACIÓN & ACCIONES PRINCIPALES (STICKY) -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 space-y-5 sticky top-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800">Publicación & Estado</h4>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase {{ $is_published ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-500' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $is_published ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                            {{ $is_published ? 'Publicada' : 'Borrador' }}
                        </span>
                    </div>

                    <div class="space-y-4">
                        <label class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 border border-slate-200 cursor-pointer hover:bg-slate-100/70 transition">
                            <div>
                                <span class="text-xs font-bold text-slate-800 block">Visibilidad Pública</span>
                                <span class="text-[10px] text-slate-400">Visible para todos los visitantes</span>
                            </div>
                            <div class="relative">
                                <input type="checkbox" wire:model="is_published" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            </div>
                        </label>

                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1">Orden de Visualización</label>
                            <input type="number" wire:model="sort_order" class="input-field text-xs font-bold py-2">
                        </div>

                        <div class="pt-2 flex flex-col gap-2.5 border-t border-slate-100">
                            <button type="submit"
                                    class="w-full py-3.5 px-4 bg-red-600 hover:bg-red-700 text-white text-xs font-black uppercase tracking-wider rounded-xl transition shadow-md shadow-red-600/20 flex items-center justify-center gap-2">
                                <i class="fas fa-save"></i>
                                <span>Guardar Cambios</span>
                            </button>
                            <button type="button" wire:click="closeModal"
                                    class="w-full py-2.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold uppercase tracking-wider rounded-xl transition flex items-center justify-center gap-2">
                                <i class="fas fa-times"></i>
                                <span>Cancelar</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 2. IMAGEN DESTACADA / BANNER HERO -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-panorama text-red-600 text-sm"></i>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800">Banner Hero (Cabecera)</h4>
                        </div>
                        @if($banner_image)
                            <button type="button" wire:click="removeBannerImage"
                                    class="text-[11px] font-bold text-rose-600 hover:text-rose-800 transition flex items-center gap-1">
                                <i class="fas fa-trash-alt text-[10px]"></i> Quitar
                            </button>
                        @endif
                    </div>

                    @if($banner_image)
                        <div class="relative rounded-2xl overflow-hidden aspect-video bg-slate-900 border border-slate-200 group">
                            <img src="{{ $banner_image }}" alt="Banner Hero" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-3 text-center">
                                <a href="{{ $banner_image }}" target="_blank" class="px-3 py-1.5 bg-white/90 hover:bg-white text-slate-800 rounded-xl text-xs font-bold flex items-center gap-1.5 shadow">
                                    <i class="fas fa-eye"></i> Ver Completa
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="aspect-video rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-400 text-xs p-4 text-center">
                            <i class="fas fa-image text-2xl mb-1 text-slate-300"></i>
                            <span>Sin imagen de cabecera asignada</span>
                        </div>
                    @endif

                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase text-slate-600">
                            Subir nueva imagen desde tu equipo
                        </label>
                        <input type="file" wire:model="bannerUpload" accept="image/*"
                               class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-800 hover:file:bg-slate-300 cursor-pointer">
                        <div wire:loading wire:target="bannerUpload" class="text-xs text-amber-600 flex items-center gap-1.5">
                            <i class="fas fa-spinner fa-spin"></i> Subiendo imagen...
                        </div>
                        @error('bannerUpload') <span class="text-red-500 text-xs block">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">O escribir URL directa:</label>
                        <input type="text" wire:model="banner_image" placeholder="/images/pages/... o https://..."
                               class="input-field text-xs font-mono py-2">
                    </div>
                </div>

                <!-- 3. AJUSTES DE SEO & VISTA PREVIA GOOGLE -->
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 space-y-4">
                    <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
                        <i class="fab fa-google text-blue-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800">Optimización SEO</h4>
                    </div>

                    <div class="space-y-3">
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-slate-600 mb-1">Meta Título (Google)</label>
                            <input type="text" wire:model="meta_title" placeholder="{{ $title ?: 'Título para buscadores' }}" class="input-field text-xs py-2">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-slate-600 mb-1">Meta Descripción</label>
                            <textarea wire:model="meta_description" rows="3" placeholder="Descripción resumida para los resultados de Google..." class="input-field text-xs"></textarea>
                        </div>

                        <!-- Snippet Preview de Google -->
                        <div class="p-3 bg-slate-50 rounded-2xl border border-slate-200 text-xs space-y-1">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Vista Previa en Google:</span>
                            <p class="text-blue-700 font-semibold truncate hover:underline cursor-pointer">
                                {{ $meta_title ?: ($title ?: 'Título de la Página | CONSUR S.A.') }}
                            </p>
                            <p class="text-emerald-700 text-[11px] font-mono truncate">
                                https://consur.com.py/pagina/{{ $slug ?: 'pagina' }}
                            </p>
                            <p class="text-slate-500 text-[11px] line-clamp-2">
                                {{ $meta_description ?: ($subtitle ?: 'Descubrí información oficial sobre nuestros productos, servicios y atención personalizada en CONSUR S.A.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 4. GALERÍA RÁPIDA DE MEDIOS -->
                @if(isset($availablePageImages) && count($availablePageImages) > 0)
                    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-photo-film text-purple-600 text-sm"></i>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800">Galería de Páginas</h4>
                            </div>
                            <span class="text-[10px] text-slate-400 font-bold">Clic para copiar URL</span>
                        </div>

                        <div class="grid grid-cols-4 gap-2 max-h-48 overflow-y-auto p-1">
                            @foreach($availablePageImages as $img)
                                <button type="button" x-data @click="navigator.clipboard.writeText('{{ $img['url'] }}'); alert('Copiado: {{ $img['url'] }}')"
                                        title="{{ $img['name'] }} ({{ $img['size'] }}) - Clic para copiar URL"
                                        class="aspect-square rounded-xl overflow-hidden border border-slate-200 hover:border-red-500 hover:scale-105 transition bg-slate-50 relative group cursor-pointer">
                                    <img src="{{ $img['url'] }}" alt="{{ $img['name'] }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </form>

    @else
        <!-- ======================================================== -->
        <!-- TABLA PRINCIPAL DE PÁGINAS CMS (VISTA LISTADO)           -->
        <!-- ======================================================== -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4">
            <div class="relative max-w-md">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" wire:model.live.debounce.300ms="search"
                       placeholder="Buscar por título o slug (ej: seguros, posventa)..."
                       class="input-field pl-10 text-xs">
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-[11px] uppercase font-bold text-slate-500 tracking-wider border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4">Página</th>
                            <th class="px-6 py-4">URL Pública</th>
                            <th class="px-6 py-4">Cabecera</th>
                            <th class="px-6 py-4 text-center">Orden</th>
                            <th class="px-6 py-4 text-center">Estado</th>
                            <th class="px-6 py-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($pages as $page)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-900 text-sm">{{ $page->title }}</div>
                                    @if($page->subtitle)
                                        <p class="text-xs text-slate-400 line-clamp-1 mt-0.5">{{ $page->subtitle }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-mono text-xs text-slate-500">
                                    <a href="{{ route('page.show', $page->slug) }}" target="_blank"
                                       class="hover:text-red-600 transition inline-flex items-center gap-1.5 font-bold">
                                        <span>/pagina/{{ $page->slug }}</span>
                                        <i class="fas fa-external-link-alt text-[10px]"></i>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    @if($page->banner_image)
                                        <div class="w-14 h-9 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                                            <img src="{{ $page->banner_image }}" alt="{{ $page->title }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <span class="text-[11px] text-slate-400 italic">Sin cabecera</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-xs tabular-nums">{{ $page->sort_order }}</td>
                                <td class="px-6 py-4 text-center">
                                    <button wire:click="togglePublished({{ $page->id }})" title="Clic para alternar estado"
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase transition {{ $page->is_published ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-400 border border-slate-200' }}">
                                        <i class="fas {{ $page->is_published ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                        <span>{{ $page->is_published ? 'Publicada' : 'Borrador' }}</span>
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-right space-x-1">
                                    <button wire:click="edit({{ $page->id }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition cursor-pointer" title="Editar Página">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="delete({{ $page->id }})" wire:confirm="¿Seguro que deseas eliminar esta página?"
                                            class="p-2 text-rose-600 hover:bg-rose-50 rounded-xl transition cursor-pointer" title="Eliminar Página">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                    No se encontraron páginas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($pages->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $pages->links() }}
                </div>
            @endif
        </div>
    @endif
</div>
