<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-0.5 rounded-full bg-red-50 text-red-600 text-[10px] font-extrabold uppercase tracking-wider border border-red-200">
                    <i class="fas fa-layer-group mr-1"></i> Banners & Sliders Hero
                </span>
            </div>
            <h1 class="text-2xl font-black text-slate-900 font-heading">Banners & Sliders Hero</h1>
            <p class="text-xs text-slate-500">Gestor de carruseles interactivos para la Portada y páginas internas (CONSUR Seguros).</p>
        </div>
        <div>
            @if(!$isOpen)
                <button wire:click="create" class="px-5 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-bold uppercase rounded-xl transition shadow-xs flex items-center gap-1.5">
                    <i class="fas fa-plus"></i> Nuevo Banner
                </button>
            @else
                <button wire:click="closeModal" class="px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-800 text-xs font-bold uppercase rounded-xl transition shadow-xs flex items-center gap-1.5">
                    <i class="fas fa-times"></i> Cancelar Edición
                </button>
            @endif
        </div>
    </div>

    <!-- TABS DE GRUPOS / UBICACIÓN -->
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-200">
        <div class="flex space-x-1">
            <button wire:click="switchGroup('home')"
                    class="px-5 py-3 font-bold text-xs uppercase tracking-wider transition border-b-2 flex items-center gap-2 {{ $activeGroup === 'home' ? 'border-[#416A8D] text-[#416A8D]' : 'border-transparent text-slate-400 hover:text-slate-700' }}">
                <i class="fas fa-home text-sm"></i>
                <span>Portada Principal / Home ({{ $countHome }})</span>
            </button>
            <button wire:click="switchGroup('seguros')"
                    class="px-5 py-3 font-bold text-xs uppercase tracking-wider transition border-b-2 flex items-center gap-2 {{ $activeGroup === 'seguros' ? 'border-red-600 text-red-600' : 'border-transparent text-slate-400 hover:text-slate-700' }}">
                <i class="fas fa-shield-alt text-sm"></i>
                <span>CONSUR Broker de Seguros ({{ $countSeguros }})</span>
            </button>
        </div>

        <div class="pb-2 sm:pb-0">
            <span class="text-[11px] font-mono bg-slate-100 text-slate-600 px-3 py-1.5 rounded-xl border border-slate-200 flex items-center gap-1.5">
                <i class="fas fa-code text-slate-400"></i> Shortcode activo: <strong class="text-red-600 font-bold">[slider:{{ $activeGroup }}]</strong>
            </span>
        </div>
    </div>

    <!-- FORMULARIO INTEGRADO EN PÁGINA (SIN VENTANA MODAL) -->
    @if($isOpen)
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-sky-50 text-[#416A8D] flex items-center justify-center text-lg">
                        <i class="fas {{ $selectedId ? 'fa-edit' : 'fa-plus' }}"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-red-600">
                            {{ $selectedId ? 'Modo Edición de Banner #' . $selectedId : 'Nuevo Banner para ' . ($group === 'seguros' ? 'CONSUR Seguros' : 'la Portada') }}
                        </span>
                        <h2 class="text-xl font-black text-slate-900 font-heading">
                            {{ $selectedId ? ($title ?: 'Editar Banner #' . $selectedId) : 'Configurar Nuevo Banner' }}
                        </h2>
                    </div>
                </div>
                <button type="button" wire:click="closeModal" class="px-4 py-2 text-xs font-bold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 rounded-xl transition flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Cerrar</span>
                </button>
            </div>

            <form wire:submit="save" class="space-y-6">
                <!-- Ubicación, Badge, Alineación y Orden -->
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Ubicación del Carrusel *</label>
                        <select wire:model="group" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D] bg-white font-semibold">
                            <option value="home">🏠 Portada Principal (Home)</option>
                            <option value="seguros">🛡️ CONSUR Broker de Seguros (/seguros)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Etiqueta Badge</label>
                        <input type="text" wire:model="tag" placeholder="Ej: NUEVO LANZAMIENTO"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Alineación Botones / Texto</label>
                        <select wire:model="content_position" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D] bg-white">
                            <option value="left">Izquierda</option>
                            <option value="center">Centrado</option>
                            <option value="right">Derecha</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Orden de Visualización</label>
                        <input type="number" wire:model="sort_order"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-1 gap-1">
                        <label class="block text-xs font-bold text-slate-700">Título Principal (Opcional)</label>
                        <span class="text-[10px] text-amber-700 font-bold bg-amber-50 px-2 py-0.5 rounded border border-amber-200">
                            <i class="fas fa-lightbulb mr-1"></i> Si el banner ya tiene diseño con texto o es un flyer, deja este campo vacío.
                        </span>
                    </div>
                    <input type="text" wire:model="title" placeholder="Ej: TU AUTO, TU ESTILO (dejar vacío si el banner ya tiene diseño con texto)"
                           class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Descripción / Subtítulo (Opcional)</label>
                    <textarea wire:model="description" rows="2" placeholder="Texto explicativo breve que acompaña al título (dejar vacío para banners gráficos)..."
                              class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]"></textarea>
                </div>

                <!-- Sección de Imágenes: Desktop y Mobile con Guía de Tamaños Ideales -->
                <div class="p-5 bg-slate-50 border border-slate-200/80 rounded-2xl space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-200/60 pb-3 gap-2">
                        <span class="text-xs font-black uppercase text-slate-800 tracking-wider flex items-center gap-1.5">
                            <i class="fas fa-images text-[#416A8D]"></i> Imágenes del Carrusel (Estándar CONSUR S.A.)
                        </span>
                        <span class="text-[11px] text-slate-500 font-medium bg-slate-200/60 px-2.5 py-1 rounded-lg">
                            <i class="fas fa-info-circle text-sky-600"></i> Optimizado para Desktop y Mobile responsive
                        </span>
                    </div>

                    <!-- Banner de información de dimensiones globales -->
                    <div class="bg-sky-50/80 border border-sky-200/80 rounded-2xl p-3.5 text-xs text-sky-950 flex items-start gap-3">
                        <div class="w-8 h-8 rounded-xl bg-sky-600 text-white flex items-center justify-center shrink-0 text-sm mt-0.5">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sky-900">Dimensiones Oficiales del Carrusel:</h4>
                            <p class="text-[11px] text-sky-800 leading-relaxed">
                                Para una visualización perfecta sin deformación, el sistema utiliza dos proporciones: 
                                <strong>1920 × 633 px (3:1)</strong> para pantallas de computadoras y <strong>600 × 953 px (9:14 vertical)</strong> para dispositivos móviles.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Imagen Desktop -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="block text-xs font-bold text-slate-800">
                                    Imagen Desktop (PC / Notebooks) <span class="text-red-500">*</span>
                                </label>
                                <span class="text-[10px] font-extrabold px-2.5 py-0.5 rounded-full bg-sky-100 text-sky-800 border border-sky-200">
                                    1920 × 633 px (3:1)
                                </span>
                            </div>

                            <div>
                                <input type="text" wire:model="image_desktop" placeholder="URL: https://... o images/pages/... o subir abajo" 
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2 px-3 focus:ring-2 focus:ring-[#416A8D] bg-white">
                            </div>

                            <div>
                                <label class="block text-[11px] text-slate-500 font-semibold mb-1">O subir archivo directo desde tu equipo:</label>
                                <input type="file" wire:model="uploadedDesktopImage" accept="image/*"
                                       class="w-full text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-[#416A8D] file:text-white hover:file:bg-[#2c5373] text-slate-500">
                            </div>

                            @if($uploadedDesktopImage)
                                <div class="mt-2 text-xs text-emerald-600 font-bold flex items-center gap-1">
                                    <i class="fas fa-check-circle"></i> Archivo desktop listo para guardar
                                </div>
                            @elseif($image_desktop)
                                <div class="mt-2 h-20 rounded-xl overflow-hidden border border-slate-200 bg-slate-900">
                                    <img src="{{ str_starts_with($image_desktop, 'http') ? $image_desktop : (str_starts_with($image_desktop, 'images/') ? asset($image_desktop) : asset('storage/' . $image_desktop)) }}" alt="Preview Desktop" class="w-full h-full object-cover">
                                </div>
                            @endif
                        </div>

                        <!-- Imagen Mobile -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="block text-xs font-bold text-slate-800">
                                    Imagen Mobile (Celulares) <span class="text-slate-400 font-normal">(Opcional)</span>
                                </label>
                                <span class="text-[10px] font-extrabold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                                    600 × 953 px (Vertical)
                                </span>
                            </div>

                            <div>
                                <input type="text" wire:model="image_mobile" placeholder="URL: https://... o images/pages/... o subir abajo" 
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2 px-3 focus:ring-2 focus:ring-[#416A8D] bg-white">
                            </div>

                            <div>
                                <label class="block text-[11px] text-slate-500 font-semibold mb-1">O subir archivo directo desde tu equipo:</label>
                                <input type="file" wire:model="uploadedMobileImage" accept="image/*"
                                       class="w-full text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-[#416A8D] file:text-white hover:file:bg-[#2c5373] text-slate-500">
                            </div>

                            @if($uploadedMobileImage)
                                <div class="mt-2 text-xs text-emerald-600 font-bold flex items-center gap-1">
                                    <i class="fas fa-check-circle"></i> Archivo móvil listo para guardar
                                </div>
                            @elseif($image_mobile)
                                <div class="mt-2 h-20 w-24 rounded-xl overflow-hidden border border-slate-200 bg-slate-900">
                                    <img src="{{ str_starts_with($image_mobile, 'http') ? $image_mobile : (str_starts_with($image_mobile, 'images/') ? asset($image_mobile) : asset('storage/' . $image_mobile)) }}" alt="Preview Mobile" class="w-full h-full object-cover">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Video de fondo opcional -->
                    <div class="pt-4 border-t border-slate-200/60 space-y-2">
                        <label class="block text-xs font-bold text-slate-800">Video de Fondo MP4 (Opcional - solo PC)</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input type="text" wire:model="video_url" placeholder="URL de video: https://... o subir archivo"
                                   class="w-full text-xs rounded-xl border border-slate-200 py-2 px-3 bg-white">
                            <input type="file" wire:model="uploadedVideo" accept="video/mp4,video/webm"
                                   class="w-full text-xs file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-bold file:bg-slate-200 file:text-slate-800 text-slate-500">
                        </div>
                    </div>
                </div>

                <!-- Enlaces y Botones -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Texto Botón Primario <span class="text-slate-400 font-normal">(Opcional)</span>
                        </label>
                        <input type="text" wire:model="button_text" placeholder="Ej: Contáctenos (dejar vacío si el flyer ya tiene botón)"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="block text-xs font-bold text-slate-700">Enlace URL de Destino</label>
                            <span class="text-[10px] text-slate-500 font-medium">Todo el banner será clickeable aquí</span>
                        </div>
                        <input type="text" wire:model="button_url" placeholder="https://wa.me/... o /#contacto"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-6 border-t border-slate-100">
                    <label class="flex items-center text-xs font-bold text-slate-700 cursor-pointer">
                        <input type="checkbox" wire:model="is_active" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500">
                        <span class="ml-2">Banner Activo y Visible en la Web</span>
                    </label>
                    <div class="flex items-center gap-3">
                        <button type="button" wire:click="closeModal" class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:text-slate-900 rounded-xl transition border border-slate-200 bg-white">
                            Cancelar
                        </button>
                        <button type="submit" class="px-6 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-xs transition flex items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>{{ $selectedId ? 'Guardar Cambios' : 'Crear Banner' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    <!-- LISTA DE BANNERS DEL GRUPO ACTIVO -->
    <div class="space-y-4 pt-2">
        <div class="flex items-center justify-between">
            <h2 class="text-sm font-extrabold uppercase tracking-wider text-slate-700 font-heading flex items-center gap-2">
                <i class="fas fa-layer-group text-[#416A8D]"></i>
                <span>Banners en {{ $activeGroup === 'seguros' ? 'CONSUR Broker de Seguros' : 'Portada / Home' }} ({{ $sliders->total() }})</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($sliders as $slide)
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between transition hover:shadow-md {{ $selectedId === $slide->id ? 'ring-2 ring-[#416A8D]' : '' }}">
                    <div>
                        <div class="relative aspect-[1920/633] bg-slate-900 overflow-hidden">
                            <img src="{{ $slide->desktop_image_url }}" alt="" class="w-full h-full object-cover">
                            <span class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-extrabold uppercase px-2 py-0.5 rounded shadow">
                                {{ $slide->tag ?: ($slide->group === 'seguros' ? 'SEGUROS' : 'PROMO') }}
                            </span>
                            <div class="absolute top-3 right-3 flex items-center gap-1.5">
                                @if($slide->has_video)
                                    <span class="bg-indigo-600 text-white text-[9px] font-bold px-2 py-0.5 rounded shadow flex items-center gap-1" title="Tiene video de fondo">
                                        <i class="fas fa-video"></i> Video
                                    </span>
                                @endif
                                @if($slide->image_mobile)
                                    <span class="bg-emerald-600 text-white text-[9px] font-bold px-2 py-0.5 rounded shadow" title="Tiene versión móvil (600×953)">
                                        <i class="fas fa-mobile-alt"></i> Móvil OK
                                    </span>
                                @endif
                                <span class="bg-black/60 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-0.5 rounded">
                                    #{{ $slide->sort_order }}
                                </span>
                            </div>
                        </div>
                        <div class="p-5 space-y-2">
                            <h3 class="font-black text-slate-900 text-base uppercase font-heading leading-tight">
                                {{ $slide->title ?: ('Banner Gráfico #' . $slide->id) }}
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-2">
                                {{ $slide->description ?: ($slide->title ? '' : 'Banner publicitario limpio (sin textos HTML superpuestos).') }}
                            </p>
                            @if($slide->button_url)
                                <p class="text-[11px] font-mono text-emerald-600 truncate">
                                    <i class="fas fa-link mr-1"></i> {{ $slide->button_url }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="p-5 pt-0 flex items-center justify-between border-t border-slate-100 mt-2">
                        <button wire:click="toggleActive({{ $slide->id }})" 
                                class="text-[10px] font-bold px-2.5 py-1 rounded-full uppercase {{ $slide->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                            {{ $slide->is_active ? 'Activo' : 'Inactivo' }}
                        </button>
                        <div class="flex gap-2">
                            <button wire:click="edit({{ $slide->id }})" class="p-2 text-[#416A8D] hover:bg-sky-50 rounded-xl transition flex items-center gap-1 text-xs font-bold" title="Editar">
                                <i class="fas fa-edit"></i>
                                <span>Editar</span>
                            </button>
                            <button wire:click="delete({{ $slide->id }})" wire:confirm="¿Eliminar este banner?" class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
