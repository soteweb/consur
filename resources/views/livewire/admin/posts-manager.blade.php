<div class="space-y-6">
    <!-- Cabecera Superior -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-0.5 rounded-full bg-red-50 text-red-600 text-[10px] font-extrabold uppercase tracking-wider border border-red-200">
                    <i class="fas fa-newspaper mr-1"></i> Categoría Única: Novedades
                </span>
                <a href="{{ route('novedades') }}" target="_blank" class="text-xs font-semibold text-slate-500 hover:text-red-600 transition">
                    Ver /novedades en la web <i class="fas fa-external-link-alt text-[10px] ml-0.5"></i>
                </a>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">Novedades & Noticias</h2>
            <p class="text-xs sm:text-sm text-slate-500">Administrá todas las entradas de la sección Novedades al estilo WordPress.</p>
        </div>

        <div class="flex items-center gap-3">
            @if($isOpen)
                <button wire:click="closeModal"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold uppercase tracking-wider transition shadow-2xs">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver al Listado</span>
                </button>
            @else
                <button wire:click="create"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider transition shadow-sm">
                    <i class="fas fa-plus"></i>
                    <span>Nueva Entrada</span>
                </button>
            @endif
        </div>
    </div>

    @if($isOpen)
        <!-- EDITOR DE ENTRADA / NOTICIA (PANEL PREMIUM) -->
        <form wire:submit.prevent="save" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            <!-- Columna Principal (Título, Extracto y Contenido) -->
            <div class="lg:col-span-8 bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 space-y-5">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="text-base font-bold text-slate-900">
                        {{ $selectedId ? 'Editar Entrada #' . $selectedId : 'Crear Nueva Entrada en Novedades' }}
                    </h3>
                    @if($selectedId && $slug)
                        <a href="{{ route('novedades.show', $slug) }}" target="_blank"
                           class="inline-flex items-center gap-1.5 text-xs font-bold text-red-600 hover:underline">
                            <span>Abrir entrada pública</span>
                            <i class="fas fa-external-link-alt text-[10px]"></i>
                        </a>
                    @endif
                </div>

                <!-- Título -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Título de la Novedad *
                    </label>
                    <input type="text"
                           wire:model.live.debounce.300ms="title"
                           placeholder="Ej: CONSUR realizó el acto de palada inicial..."
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm font-semibold text-slate-900 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500">
                    @error('title') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Enlace permanente (Slug) -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Enlace Permanente (URL Slug) *
                    </label>
                    <div class="flex items-center rounded-xl border border-slate-200 bg-slate-50 overflow-hidden focus-within:ring-2 focus-within:ring-red-500/20 focus-within:border-red-500">
                        <span class="px-3.5 py-2.5 text-xs text-slate-400 font-mono bg-slate-100 border-r border-slate-200 shrink-0">
                            /novedades/
                        </span>
                        <input type="text"
                               wire:model="slug"
                               class="w-full px-3.5 py-2.5 bg-white text-xs font-mono text-slate-800 focus:outline-none">
                    </div>
                    @error('slug') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Extracto / Resumen corto -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Extracto / Resumen Corto <span class="text-slate-400 font-normal">(Se muestra en las tarjetas del listado; si se deja vacío se genera solo)</span>
                    </label>
                    <textarea wire:model="excerpt"
                              rows="2"
                              placeholder="Breve resumen de 1 o 2 oraciones..."
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs sm:text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500"></textarea>
                </div>

                <!-- Contenido Principal HTML + Botón para insertar fotos -->
                <div class="space-y-2">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Contenido de la Entrada (HTML / Texto) *
                        </label>

                        <label class="cursor-pointer inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                            <i class="fas fa-image text-red-600"></i>
                            <span>Subir e Insertar Foto en el Contenido</span>
                            <input type="file" wire:model="inlineUpload" accept="image/*" class="hidden">
                        </label>
                    </div>

                    <textarea wire:model="content"
                              rows="16"
                              placeholder="<p>Escribí aquí el contenido completo de la novedad...</p>"
                              class="w-full px-4 py-3 rounded-xl border border-slate-200 font-mono text-xs sm:text-sm text-slate-800 leading-relaxed focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500"></textarea>
                    @error('content') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Columna Lateral Derecha (Publicación, Categoría e Imagen Destacada) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Caja de Publicación -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5 space-y-4">
                    <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-800 border-b border-slate-100 pb-2.5">
                        Publicación
                    </h4>

                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Categoría</label>
                        <div class="px-3.5 py-2 rounded-xl bg-slate-100 text-slate-700 text-xs font-bold flex items-center justify-between">
                            <span>Novedades</span>
                            <span class="text-[10px] uppercase text-slate-400">Categoría única</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Fecha de Publicación *</label>
                        <input type="date"
                               wire:model="published_date"
                               class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs font-semibold text-slate-800 focus:outline-none focus:border-red-500">
                        @error('published_date') <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <span class="text-xs font-semibold text-slate-700">Estado Visible</span>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="is_published" class="sr-only peer">
                            <div class="w-10 h-5 bg-slate-200 rounded-full peer peer-checked:bg-emerald-600 relative after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-5"></div>
                            <span class="ml-2 text-xs font-bold {{ $is_published ? 'text-emerald-600' : 'text-slate-400' }}">
                                {{ $is_published ? 'Publicado' : 'Borrador' }}
                            </span>
                        </label>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2">
                        <button type="submit"
                                class="flex-1 py-3 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider transition shadow-sm flex items-center justify-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>{{ $selectedId ? 'Guardar Cambios' : 'Publicar Entrada' }}</span>
                        </button>
                        <button type="button"
                                wire:click="closeModal"
                                class="py-3 px-4 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-600 text-xs font-bold transition">
                            Cancelar
                        </button>
                    </div>
                </div>

                <!-- Caja de Imagen Destacada -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5 space-y-4">
                    <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-800 border-b border-slate-100 pb-2.5">
                        Imagen Destacada
                    </h4>

                    @if($featured_image)
                        <div class="relative rounded-xl overflow-hidden bg-slate-100 border border-slate-200 aspect-[16/10]">
                            <img src="{{ str_starts_with($featured_image, 'http') ? $featured_image : asset(ltrim($featured_image, '/')) }}"
                                 alt="Vista previa"
                                 class="w-full h-full object-cover">
                            <button type="button"
                                    wire:click="$set('featured_image', '')"
                                    class="absolute top-2 right-2 w-7 h-7 rounded-full bg-rose-600 text-white text-xs flex items-center justify-center shadow hover:bg-rose-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif

                    <label class="cursor-pointer w-full py-3 px-4 rounded-xl border-2 border-dashed border-slate-300 hover:border-red-500 bg-slate-50 hover:bg-red-50/30 transition flex flex-col items-center justify-center gap-1 text-center">
                        <i class="fas fa-cloud-upload-alt text-lg text-red-600"></i>
                        <span class="text-xs font-bold text-slate-700">Subir imagen desde tu equipo</span>
                        <span class="text-[10px] text-slate-400">JPG, PNG o WEBP (Máx. 6 MB)</span>
                        <input type="file" wire:model="featuredUpload" accept="image/*" class="hidden">
                    </label>

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-500 mb-1">O pegar ruta / URL de imagen:</label>
                        <input type="text"
                               wire:model.live="featured_image"
                               placeholder="/images/novedades/mi-foto.jpg"
                               class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs text-slate-700 focus:outline-none focus:border-red-500">
                    </div>
                </div>

                <!-- Caja de Galería de Fotos Opcional (Optimización Automática WebP) -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2.5">
                        <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-800 flex items-center gap-2">
                            <i class="fas fa-images text-red-600"></i>
                            <span>Galería de Fotos (Opcional)</span>
                        </h4>
                        @if(!empty($gallery))
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-red-50 text-red-600">
                                {{ count($gallery) }} {{ count($gallery) === 1 ? 'foto' : 'fotos' }}
                            </span>
                        @endif
                    </div>

                    <p class="text-[11px] text-slate-500 leading-normal">
                        Subí múltiples fotos para crear un carrusel/mosaico interactivo en la novedad. Se comprimen y optimizan automáticamente a formato <strong>WebP</strong> de alta velocidad.
                    </p>

                    <!-- Subida múltiple -->
                    <label class="cursor-pointer w-full py-3 px-4 rounded-xl border-2 border-dashed border-slate-300 hover:border-red-500 bg-slate-50 hover:bg-red-50/30 transition flex flex-col items-center justify-center gap-1 text-center">
                        <div wire:loading.remove wire:target="galleryUploads" class="flex flex-col items-center gap-1">
                            <i class="fas fa-images text-lg text-red-600"></i>
                            <span class="text-xs font-bold text-slate-700">Agregar fotos a la galería</span>
                            <span class="text-[10px] text-slate-400">Seleccioná una o varias fotos (JPG, PNG, WebP)</span>
                        </div>
                        <div wire:loading wire:target="galleryUploads" class="flex items-center gap-2 text-xs font-bold text-red-600 py-1">
                            <i class="fas fa-spinner fa-spin"></i>
                            <span>Optimizando y convirtiendo a WebP...</span>
                        </div>
                        <input type="file" wire:model="galleryUploads" multiple accept="image/*" class="hidden">
                    </label>

                    <!-- Grilla de fotos en la galería -->
                    @if(!empty($gallery))
                        <div class="grid grid-cols-3 gap-2.5 pt-2">
                            @foreach($gallery as $idx => $photoUrl)
                                <div class="relative group rounded-xl overflow-hidden aspect-square bg-slate-100 border border-slate-200">
                                    <img src="{{ str_starts_with($photoUrl, 'http') ? $photoUrl : asset(ltrim($photoUrl, '/')) }}"
                                         alt="Foto {{ $idx + 1 }}"
                                         class="w-full h-full object-cover">
                                    <button type="button"
                                            wire:click="removeGalleryImage({{ $idx }})"
                                            title="Eliminar de la galería"
                                            class="absolute top-1 right-1 w-6 h-6 rounded-full bg-rose-600/90 text-white text-[10px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition shadow hover:bg-rose-700 cursor-pointer">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <span class="absolute bottom-1 left-1 px-1.5 py-0.5 rounded text-[9px] font-bold bg-black/60 text-white backdrop-blur-xs">
                                        #{{ $idx + 1 }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </form>
    @else
        <!-- RESUMEN Y LISTADO DE TODAS LAS ENTRADAS -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl p-4 border border-slate-200/80 flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Entradas</span>
                    <p class="text-2xl font-black text-slate-900 mt-0.5">{{ $totalPosts }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-4 border border-slate-200/80 flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Publicadas</span>
                    <p class="text-2xl font-black text-emerald-600 mt-0.5">{{ $publishedPosts }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-4 border border-slate-200/80 flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Categoría Activa</span>
                    <p class="text-lg font-extrabold text-slate-900 mt-0.5">Novedades</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center">
                    <i class="fas fa-folder-open"></i>
                </div>
            </div>
        </div>

        <!-- Barra de Búsqueda y Filtro -->
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="relative w-full sm:w-96">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text"
                       wire:model.live.debounce.300ms="search"
                       placeholder="Buscar novedad por título o contenido..."
                       class="w-full pl-9 pr-4 py-2 rounded-xl border border-slate-200 text-xs text-slate-800 focus:outline-none focus:border-red-500">
            </div>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <select wire:model.live="filterStatus"
                        class="px-3.5 py-2 rounded-xl border border-slate-200 text-xs font-semibold text-slate-700 bg-white focus:outline-none focus:border-red-500">
                    <option value="">Todos los estados ({{ $totalPosts }})</option>
                    <option value="1">Publicadas ({{ $publishedPosts }})</option>
                    <option value="0">Borradores ({{ $totalPosts - $publishedPosts }})</option>
                </select>
            </div>
        </div>

        <!-- Tabla de Entradas -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left">
                    <thead class="bg-slate-50/80 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-5 py-3.5 w-20">Imagen</th>
                            <th class="px-5 py-3.5">Título de la Entrada</th>
                            <th class="px-5 py-3.5 w-32">Categoría</th>
                            <th class="px-5 py-3.5 w-32">Fecha</th>
                            <th class="px-5 py-3.5 w-28">Estado</th>
                            <th class="px-5 py-3.5 w-44 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs sm:text-sm">
                        @forelse($posts as $post)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="px-5 py-3.5">
                                    <div class="w-16 h-11 rounded-lg overflow-hidden bg-slate-100 border border-slate-200">
                                        <img src="{{ $post->featured_image_url }}"
                                             alt="{{ $post->title }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-5 py-3.5">
                                    <div class="font-bold text-slate-900 line-clamp-1">{{ $post->title }}</div>
                                    <div class="text-[11px] text-slate-400 font-mono truncate max-w-md">/novedades/{{ $post->slug }}</div>
                                </td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-slate-100 text-slate-700">
                                        {{ $post->category ?: 'Novedades' }}
                                    </span>
                                </td>
                                <td class="px-5 py-3.5 text-xs font-semibold text-slate-600">
                                    {{ $post->formatted_date }}
                                </td>
                                <td class="px-5 py-3.5">
                                    <button wire:click="togglePublished({{ $post->id }})"
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold transition {{ $post->is_published ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-500 border border-slate-200' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $post->is_published ? 'bg-emerald-600' : 'bg-slate-400' }}"></span>
                                        <span>{{ $post->is_published ? 'Publicada' : 'Borrador' }}</span>
                                    </button>
                                </td>
                                <td class="px-5 py-3.5 text-right">
                                    <div class="inline-flex items-center justify-end gap-2">
                                        <a href="{{ route('novedades.show', $post->slug) }}"
                                           target="_blank"
                                           title="Abrir entrada en la web"
                                           class="p-2 rounded-lg text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition">
                                            <i class="fas fa-external-link-alt text-xs"></i>
                                        </a>
                                        <button wire:click="edit({{ $post->id }})"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition">
                                            <i class="fas fa-edit text-[11px]"></i>
                                            <span>Editar</span>
                                        </button>
                                        <button wire:click="delete({{ $post->id }})"
                                                wire:confirm="¿Estás seguro de eliminar esta entrada de Novedades?"
                                                class="p-2 rounded-lg text-rose-500 hover:bg-rose-50 transition"
                                                title="Eliminar">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-400 text-xs">
                                    No se encontraron entradas en Novedades.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($posts->hasPages())
                <div class="px-5 py-4 border-t border-slate-100">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    @endif
</div>

