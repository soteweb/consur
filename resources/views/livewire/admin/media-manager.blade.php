<div class="space-y-6" x-data="{
    copied: false,
    copyUrl(url) {
        const fullUrl = url.startsWith('http') ? url : window.location.origin + url;
        navigator.clipboard.writeText(fullUrl).then(() => {
            this.copied = true;
            setTimeout(() => this.copied = false, 2500);
        });
    },
    showDropzone: false
}">

    <!-- 1. Header con Resumen & Acciones Principales -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-5 rounded-2xl border border-slate-200/80 shadow-2xs">
        <div>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-50 text-[#eb0a1e] flex items-center justify-center text-lg">
                    <i class="fas fa-photo-video"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-900 font-heading">Biblioteca de Medios</h1>
                    <p class="text-xs text-slate-500">Administrá fotos, catálogos PDF y archivos multimedia del sitio web al estilo WordPress.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <!-- Botón Sincronizar Existentes -->
            <button type="button"
                    wire:click="syncExistingMedia"
                    wire:loading.attr="disabled"
                    title="Escanea e indexa fotos ya existentes en public/images/"
                    class="inline-flex items-center gap-2 px-3.5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-xl transition">
                <i class="fas fa-sync-alt" wire:loading.class="fa-spin" wire:target="syncExistingMedia"></i>
                <span class="hidden sm:inline">Indexar Existentes</span>
            </button>

            <!-- Botón Mostrar/Ocultar Zona de Subida -->
            <button type="button"
                    @click="showDropzone = !showDropzone"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-semibold rounded-xl shadow-md shadow-red-600/20 transition">
                <i class="fas fa-cloud-upload-alt text-sm"></i>
                <span x-text="showDropzone ? 'Ocultar Subida' : 'Añadir Nuevo Medio'">Añadir Nuevo Medio</span>
            </button>
        </div>
    </div>

    <!-- 2. Zona de Carga Drag & Drop (Desplegable) -->
    <div x-show="showDropzone"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-cloak
         class="bg-white rounded-2xl border-2 border-dashed border-slate-300 hover:border-[#eb0a1e] p-8 text-center transition-colors relative overflow-hidden group">

        <input type="file"
               multiple
               wire:model="uploads"
               id="media-file-input"
               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
               accept="image/*,application/pdf,video/mp4,.svg,.doc,.docx,.xls,.xlsx">

        <div wire:loading.remove wire:target="uploads" class="space-y-3 pointer-events-none">
            <div class="w-16 h-16 mx-auto rounded-full bg-red-50 text-[#eb0a1e] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                <i class="fas fa-cloud-arrow-up"></i>
            </div>
            <div>
                <h3 class="text-sm font-bold text-slate-800">Arrastrá y soltá tus archivos aquí para subirlos</h3>
                <p class="text-xs text-slate-500 mt-1">O hacé clic en cualquier parte de este recuadro para seleccionar desde tu equipo.</p>
            </div>
            <div class="inline-flex items-center gap-3 text-[11px] text-slate-400 bg-slate-50 px-3 py-1.5 rounded-full border border-slate-200/60">
                <span><i class="fas fa-check text-emerald-500 mr-1"></i>Optimización WebP automática</span>
                <span>&bull;</span>
                <span>Formatos: JPG, PNG, WEBP, PDF, SVG</span>
                <span>&bull;</span>
                <span>Máx: 25 MB por archivo</span>
            </div>
        </div>

        <!-- Spinner de Progreso de Subida -->
        <div wire:loading wire:target="uploads" class="py-6 space-y-3 text-center">
            <div class="inline-block animate-spin text-[#eb0a1e] text-3xl">
                <i class="fas fa-circle-notch"></i>
            </div>
            <p class="text-xs font-semibold text-slate-700">Subiendo, procesando y optimizando archivos...</p>
            <p class="text-[11px] text-slate-400">Por favor, espera unos segundos mientras se generan las versiones livianas.</p>
        </div>
    </div>

    <!-- 3. Barra de Estadísticas Rápidas -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <div class="bg-white p-3.5 rounded-xl border border-slate-200/70 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-sm shrink-0">
                <i class="fas fa-folder-open"></i>
            </div>
            <div class="min-w-0">
                <span class="text-[11px] text-slate-400 uppercase tracking-wider block font-semibold truncate">Total Archivos</span>
                <span class="text-base font-bold text-slate-800">{{ number_format($totalCount) }}</span>
            </div>
        </div>

        <div class="bg-white p-3.5 rounded-xl border border-slate-200/70 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm shrink-0">
                <i class="fas fa-images"></i>
            </div>
            <div class="min-w-0">
                <span class="text-[11px] text-slate-400 uppercase tracking-wider block font-semibold truncate">Imágenes</span>
                <span class="text-base font-bold text-slate-800">{{ number_format($imagesCount) }}</span>
            </div>
        </div>

        <div class="bg-white p-3.5 rounded-xl border border-slate-200/70 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm shrink-0">
                <i class="fas fa-file-pdf"></i>
            </div>
            <div class="min-w-0">
                <span class="text-[11px] text-slate-400 uppercase tracking-wider block font-semibold truncate">Documentos & PDF</span>
                <span class="text-base font-bold text-slate-800">{{ number_format($docsCount) }}</span>
            </div>
        </div>

        <div class="bg-white p-3.5 rounded-xl border border-slate-200/70 flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-sm shrink-0">
                <i class="fas fa-hard-drive"></i>
            </div>
            <div class="min-w-0">
                <span class="text-[11px] text-slate-400 uppercase tracking-wider block font-semibold truncate">Espacio Total</span>
                <span class="text-base font-bold text-slate-800">{{ $humanTotalSize }}</span>
            </div>
        </div>
    </div>

    <!-- 4. Filtros, Búsqueda y Selector de Vistas (Estilo WordPress) -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-2xs space-y-3">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
            <!-- Pestañas de Tipo de Medio -->
            <div class="flex flex-wrap items-center gap-1.5">
                <button type="button"
                        wire:click="setFilterType('all')"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold transition {{ $filterType === 'all' ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                    Todos ({{ $totalCount }})
                </button>
                <button type="button"
                        wire:click="setFilterType('images')"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold transition {{ $filterType === 'images' ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                    Imágenes ({{ $imagesCount }})
                </button>
                <button type="button"
                        wire:click="setFilterType('documents')"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold transition {{ $filterType === 'documents' ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                    Documentos ({{ $docsCount }})
                </button>
            </div>

            <!-- Controles de Vista & Buscador -->
            <div class="flex flex-wrap items-center gap-2">
                <!-- Selector de Mes / Fecha -->
                @if(!empty($availableMonths))
                    <select wire:model.live="filterMonth"
                            class="px-3 py-1.5 rounded-lg border border-slate-300 text-xs text-slate-700 bg-white focus:ring-1 focus:ring-slate-900 focus:border-slate-900">
                        <option value="">Todas las fechas</option>
                        @foreach($availableMonths as $ym => $label)
                            <option value="{{ $ym }}">{{ $label }}</option>
                        @endforeach
                    </select>
                @endif

                <!-- Buscador de Texto -->
                <div class="relative min-w-[200px] sm:min-w-[240px]">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="text"
                           wire:model.live.debounce.350ms="search"
                           placeholder="Buscar por nombre o alt..."
                           class="w-full pl-8 pr-3 py-1.5 rounded-lg border border-slate-300 text-xs text-slate-800 placeholder-slate-400 focus:ring-1 focus:ring-slate-900 focus:border-slate-900">
                </div>

                <!-- Selector de Vista: Cuadrícula o Lista -->
                <div class="inline-flex rounded-lg border border-slate-200 bg-slate-50 p-0.5">
                    <button type="button"
                            wire:click="setViewMode('grid')"
                            title="Vista en Cuadrícula"
                            class="p-1.5 rounded-md text-xs transition {{ $viewMode === 'grid' ? 'bg-white text-slate-900 shadow-2xs font-bold' : 'text-slate-400 hover:text-slate-700' }}">
                        <i class="fas fa-th-large w-4 h-4 flex items-center justify-center"></i>
                    </button>
                    <button type="button"
                            wire:click="setViewMode('list')"
                            title="Vista en Lista"
                            class="p-1.5 rounded-md text-xs transition {{ $viewMode === 'list' ? 'bg-white text-slate-900 shadow-2xs font-bold' : 'text-slate-400 hover:text-slate-700' }}">
                        <i class="fas fa-bars w-4 h-4 flex items-center justify-center"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Barra de Acciones en Lote si hay seleccionados -->
        @if(count($selected) > 0)
            <div class="pt-2 border-t border-slate-100 flex items-center justify-between gap-3 text-xs">
                <div class="flex items-center gap-2 text-slate-700">
                    <span class="font-bold text-[#eb0a1e]">{{ count($selected) }}</span> archivo(s) seleccionado(s)
                </div>
                <button type="button"
                        wire:click="deleteSelected"
                        wire:confirm="¿Estás seguro de que deseas eliminar permanentemente los archivos seleccionados?"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 font-semibold rounded-lg transition">
                    <i class="fas fa-trash-alt text-xs"></i>
                    <span>Eliminar seleccionados</span>
                </button>
            </div>
        @endif
    </div>

    <!-- 5. Contenido Principal: Cuadrícula o Lista -->
    @if($mediaItems->isEmpty())
        <div class="bg-white rounded-2xl border border-slate-200/80 p-12 text-center space-y-4">
            <div class="w-16 h-16 mx-auto rounded-full bg-slate-100 text-slate-400 flex items-center justify-center text-2xl">
                <i class="fas fa-images"></i>
            </div>
            <div>
                <h3 class="text-sm font-bold text-slate-800">No se encontraron archivos de medios</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto">
                    Podés subir nuevos archivos arrastrándolos arriba, o utilizar el botón <strong class="text-slate-700">"Indexar Existentes"</strong> para catalogar las fotos ya existentes en el sitio.
                </p>
            </div>
            <button type="button"
                    wire:click="syncExistingMedia"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold rounded-xl transition">
                <i class="fas fa-sync-alt"></i>
                <span>Indexar fotos existentes ahora</span>
            </button>
        </div>
    @else

        @if($viewMode === 'grid')
            <!-- VISTA EN CUADRÍCULA (Grid de Miniaturas Estilo WordPress) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3.5">
                @foreach($mediaItems as $item)
                    <div wire:key="media-grid-{{ $item->id }}"
                         class="group relative bg-white rounded-xl border border-slate-200/80 hover:border-slate-900 overflow-hidden shadow-2xs hover:shadow-md transition-all duration-200 flex flex-col cursor-pointer {{ in_array((string)$item->id, $selected) ? 'ring-2 ring-[#eb0a1e] border-transparent' : '' }}"
                         @click="$wire.openDetail({{ $item->id }})">

                        <!-- Miniatura -->
                        <div class="aspect-square bg-slate-100 relative overflow-hidden flex items-center justify-center">
                            @if($item->is_image)
                                <img src="{{ $item->url }}"
                                     alt="{{ $item->alt ?: $item->name }}"
                                     loading="lazy"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="text-center p-3 space-y-1">
                                    <i class="{{ $item->icon }} text-3xl"></i>
                                    <span class="block text-[10px] uppercase font-bold text-slate-500 tracking-wider">
                                        {{ pathinfo($item->file_name, PATHINFO_EXTENSION) }}
                                    </span>
                                </div>
                            @endif

                            <!-- Checkbox de Selección -->
                            <div class="absolute top-2 left-2 z-10" @click.stop>
                                <input type="checkbox"
                                       wire:model.live="selected"
                                       value="{{ (string)$item->id }}"
                                       class="rounded border-slate-300 text-[#eb0a1e] focus:ring-0 cursor-pointer shadow-xs">
                            </div>

                            <!-- Badge de Formato / Dimensiones -->
                            <div class="absolute bottom-1.5 right-1.5 bg-slate-950/80 backdrop-blur-xs text-white text-[9px] font-semibold px-1.5 py-0.5 rounded uppercase tracking-wider">
                                {{ pathinfo($item->file_name, PATHINFO_EXTENSION) }}
                            </div>
                        </div>

                        <!-- Info del Archivo -->
                        <div class="p-2.5 flex-1 flex flex-col justify-between bg-white text-left">
                            <h4 class="text-xs font-semibold text-slate-800 truncate" title="{{ $item->name }}">
                                {{ $item->name }}
                            </h4>
                            <div class="flex items-center justify-between text-[10px] text-slate-400 mt-1">
                                <span>{{ $item->human_size }}</span>
                                @if($item->width)
                                    <span>{{ $item->width }}x{{ $item->height }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- VISTA EN LISTA (Tabla Detallada) -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-700">
                        <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200/80">
                            <tr>
                                <th class="w-10 px-4 py-3 text-center">
                                    <input type="checkbox"
                                           wire:model.live="selectAll"
                                           class="rounded border-slate-300 text-[#eb0a1e] focus:ring-0 cursor-pointer">
                                </th>
                                <th class="px-4 py-3">Miniatura</th>
                                <th class="px-4 py-3">Nombre & Enlace</th>
                                <th class="px-4 py-3">Tipo</th>
                                <th class="px-4 py-3">Dimensiones</th>
                                <th class="px-4 py-3">Tamaño</th>
                                <th class="px-4 py-3">Fecha</th>
                                <th class="px-4 py-3 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($mediaItems as $item)
                                <tr wire:key="media-list-{{ $item->id }}" class="hover:bg-slate-50/80 transition-colors">
                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox"
                                               wire:model.live="selected"
                                               value="{{ (string)$item->id }}"
                                               class="rounded border-slate-300 text-[#eb0a1e] focus:ring-0 cursor-pointer">
                                    </td>
                                    <td class="px-4 py-2.5 w-16">
                                        <div class="w-12 h-12 rounded-lg bg-slate-100 border border-slate-200/70 overflow-hidden flex items-center justify-center cursor-pointer"
                                             wire:click="openDetail({{ $item->id }})">
                                            @if($item->is_image)
                                                <img src="{{ $item->url }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                                            @else
                                                <i class="{{ $item->icon }} text-lg"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-slate-900">
                                        <div class="truncate max-w-xs cursor-pointer hover:text-[#eb0a1e]" wire:click="openDetail({{ $item->id }})">
                                            {{ $item->name }}
                                        </div>
                                        <span class="text-[11px] text-slate-400 font-mono block truncate max-w-xs">
                                            {{ $item->url }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold uppercase bg-slate-100 text-slate-600">
                                            {{ pathinfo($item->file_name, PATHINFO_EXTENSION) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-slate-500 whitespace-nowrap">
                                        {{ $item->dimensions ?: '—' }}
                                    </td>
                                    <td class="px-4 py-3 text-slate-500 whitespace-nowrap">
                                        {{ $item->human_size }}
                                    </td>
                                    <td class="px-4 py-3 text-slate-500 whitespace-nowrap">
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-right space-x-1 whitespace-nowrap">
                                        <button type="button"
                                                @click="copyUrl('{{ $item->url }}')"
                                                title="Copiar URL al portapapeles"
                                                class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition">
                                            <i class="far fa-copy text-xs"></i>
                                        </button>
                                        <button type="button"
                                                wire:click="openDetail({{ $item->id }})"
                                                title="Editar detalles"
                                                class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition">
                                            <i class="far fa-eye text-xs"></i>
                                        </button>
                                        <button type="button"
                                                wire:click="deleteSingle({{ $item->id }})"
                                                wire:confirm="¿Estás seguro de eliminar este archivo?"
                                                title="Eliminar"
                                                class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition">
                                            <i class="far fa-trash-alt text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Paginación -->
        <div class="mt-4">
            {{ $mediaItems->links() }}
        </div>

    @endif

    <!-- 6. MODAL LATERAL / DETALLE DEL MEDIO (Estilo WordPress) -->
    @if($showDetailModal && $activeMedia)
        <div class="fixed inset-0 z-50 overflow-y-auto"
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">

            <!-- Backdrop -->
            <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs" wire:click="closeDetail"></div>

            <div class="min-h-screen px-4 text-center flex items-center justify-center p-4">
                <div class="inline-block w-full max-w-4xl bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all border border-slate-200 relative z-10"
                     @click.stop>

                    <!-- Barra Superior Modal -->
                    <div class="px-6 py-4 bg-slate-50 border-b border-slate-200/80 flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <i class="{{ $activeMedia->icon }} text-base"></i>
                            <h3 class="text-sm font-bold text-slate-900 font-heading truncate max-w-md">
                                Detalles de Archivo Adjunto
                            </h3>
                        </div>
                        <button type="button"
                                wire:click="closeDetail"
                                class="w-8 h-8 rounded-full bg-slate-200/70 hover:bg-slate-300 text-slate-600 flex items-center justify-center transition">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>

                    <!-- Cuerpo Modal: Preview + Metadatos -->
                    <div class="grid grid-cols-1 md:grid-cols-12 divide-y md:divide-y-0 md:divide-x divide-slate-200">

                        <!-- Columna Izquierda: Vista Previa Grande -->
                        <div class="md:col-span-7 p-6 bg-slate-950/5 flex flex-col items-center justify-center min-h-[320px]">
                            @if($activeMedia->is_image)
                                <div class="max-h-[460px] w-full flex items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xs p-2">
                                    <img src="{{ $activeMedia->url }}"
                                         alt="{{ $activeMedia->alt ?: $activeMedia->name }}"
                                         class="max-h-[440px] max-w-full object-contain">
                                </div>
                            @elseif($activeMedia->is_pdf)
                                <div class="text-center p-8 space-y-4">
                                    <i class="fas fa-file-pdf text-6xl text-red-500"></i>
                                    <div>
                                        <p class="font-bold text-slate-800 text-sm">{{ $activeMedia->file_name }}</p>
                                        <p class="text-xs text-slate-500 mt-1">Documento PDF</p>
                                    </div>
                                    <a href="{{ $activeMedia->url }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-xl">
                                        <i class="fas fa-external-link-alt text-xs"></i>
                                        <span>Abrir Documento</span>
                                    </a>
                                </div>
                            @else
                                <div class="text-center p-8 space-y-4">
                                    <i class="{{ $activeMedia->icon }} text-6xl"></i>
                                    <p class="font-bold text-slate-800 text-sm">{{ $activeMedia->file_name }}</p>
                                    <a href="{{ $activeMedia->url }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-xl">
                                        <i class="fas fa-download text-xs"></i>
                                        <span>Descargar Archivo</span>
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Columna Derecha: Metadatos y Campos Editables -->
                        <div class="md:col-span-5 p-6 space-y-5 text-xs flex flex-col justify-between">
                            <div class="space-y-4">
                                <!-- Datos Técnicos -->
                                <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200/70 space-y-1.5 text-slate-600">
                                    <div class="flex items-center justify-between">
                                        <span class="font-semibold text-slate-700">Subido el:</span>
                                        <span>{{ $activeMedia->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="font-semibold text-slate-700">Nombre de archivo:</span>
                                        <span class="font-mono text-[11px] truncate max-w-[170px]" title="{{ $activeMedia->file_name }}">
                                            {{ $activeMedia->file_name }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="font-semibold text-slate-700">Tipo MIME:</span>
                                        <span class="font-mono text-[11px]">{{ $activeMedia->mime_type }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="font-semibold text-slate-700">Tamaño del archivo:</span>
                                        <span>{{ $activeMedia->human_size }}</span>
                                    </div>
                                    @if($activeMedia->dimensions)
                                        <div class="flex items-center justify-between">
                                            <span class="font-semibold text-slate-700">Dimensiones:</span>
                                            <span>{{ $activeMedia->dimensions }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Formulario de Edición de Metadatos -->
                                <form wire:submit="saveDetails" class="space-y-3.5">
                                    <div>
                                        <label class="block font-bold text-slate-700 uppercase tracking-wider text-[10px] mb-1">
                                            Título / Nombre
                                        </label>
                                        <input type="text"
                                               wire:model="editName"
                                               class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs text-slate-800 focus:ring-1 focus:ring-slate-900 focus:border-slate-900">
                                    </div>

                                    <div>
                                        <label class="block font-bold text-slate-700 uppercase tracking-wider text-[10px] mb-1">
                                            Texto Alternativo (Alt)
                                        </label>
                                        <input type="text"
                                               wire:model="editAlt"
                                               placeholder="Descripción para SEO y accesibilidad"
                                               class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs text-slate-800 focus:ring-1 focus:ring-slate-900 focus:border-slate-900">
                                    </div>

                                    <!-- Campo URL con Botón Copiar al Portapapeles (WordPress Style) -->
                                    <div>
                                        <label class="block font-bold text-slate-700 uppercase tracking-wider text-[10px] mb-1">
                                            URL del Archivo
                                        </label>
                                        <div class="flex items-center gap-1.5">
                                            <input type="text"
                                                   readonly
                                                   value="{{ url($activeMedia->url) }}"
                                                   class="w-full px-3 py-2 bg-slate-100 rounded-xl border border-slate-200 text-slate-600 font-mono text-[11px] select-all cursor-text">
                                            <button type="button"
                                                    @click="copyUrl('{{ $activeMedia->url }}')"
                                                    class="shrink-0 px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-semibold text-xs flex items-center gap-1.5 transition">
                                                <i class="far fa-copy text-xs"></i>
                                                <span x-text="copied ? '¡Copiado!' : 'Copiar'">Copiar</span>
                                            </button>
                                        </div>
                                        <p class="text-[10px] text-slate-400 mt-1">Copiá este enlace para usarlo en cualquier página, banner o editor del sitio.</p>
                                    </div>

                                    <div class="pt-2 flex items-center justify-between">
                                        <button type="submit"
                                                class="px-4 py-2 bg-[#eb0a1e] hover:bg-red-700 text-white rounded-xl font-bold text-xs shadow-xs transition">
                                            Guardar Cambios
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Acciones Inferiores: Eliminar -->
                            <div class="pt-4 border-t border-slate-200 flex items-center justify-end">
                                <button type="button"
                                        wire:click="deleteSingle({{ $activeMedia->id }})"
                                        wire:confirm="¿Estás seguro de que deseas eliminar permanentemente este archivo del servidor?"
                                        class="text-xs text-red-600 hover:text-red-800 font-semibold inline-flex items-center gap-1">
                                    <i class="fas fa-trash-alt text-[10px]"></i>
                                    <span>Eliminar permanentemente</span>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif

</div>
