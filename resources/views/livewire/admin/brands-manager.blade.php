<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 font-heading">Marcas y Categorías</h1>
            <p class="text-xs text-slate-500">Gestión de marcas oficiales (Mega Menú y vitrinas dedicadas) y tipos de carrocería.</p>
        </div>
        <div class="flex items-center gap-2">
            @if($isOpen)
                <button wire:click="closeModal" 
                        class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition shadow-xs flex items-center gap-1.5">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </button>
            @else
                <button wire:click="$set('activeTab', 'brands'); create()" 
                        class="px-4 py-2 bg-[#eb0a1e] hover:bg-[#c90819] text-white text-xs font-bold rounded-xl transition shadow-xs flex items-center gap-1.5">
                    <i class="fas fa-plus"></i> Nueva Marca
                </button>
                <button wire:click="$set('activeTab', 'categories'); create()" 
                        class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition shadow-xs flex items-center gap-1.5">
                    <i class="fas fa-plus"></i> Nueva Categoría
                </button>
            @endif
        </div>
    </div>

    @if($isOpen)
        <!-- ============================================== -->
        <!-- PANEL INTEGRADO EN PÁGINA (SIN VENTANA MODAL)   -->
        <!-- ============================================== -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-lg">
                        <i class="fas {{ $selectedId ? 'fa-edit' : 'fa-plus' }}"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-red-600">
                            {{ $activeTab === 'brands' ? ($selectedId ? 'Editar Marca #' . $selectedId : 'Nueva Marca Oficial') : ($selectedId ? 'Editar Categoría' : 'Nueva Categoría') }}
                        </span>
                        <h2 class="text-xl font-black text-slate-900 font-heading">
                            {{ $activeTab === 'brands' ? ($brandName ?: 'Configuración de Marca') : ($categoryName ?: 'Configuración de Categoría') }}
                        </h2>
                    </div>
                </div>
                <button type="button" wire:click="closeModal" class="px-4 py-2 text-xs font-bold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 rounded-xl transition flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver al Listado</span>
                </button>
            </div>

            @if($activeTab === 'brands')
                <form wire:submit="saveBrand" class="space-y-5 max-w-3xl">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nombre de la Marca *</label>
                        <input type="text" wire:model="brandName" placeholder="Ej: Toyota, Omoda | Jaecoo, Hino..." required
                               class="w-full text-sm font-semibold rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]">
                        @error('brandName') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Subtítulo / Tagline</label>
                        <input type="text" wire:model="brandTagline" placeholder="Ej: Lujo, Vanguardia & Tecnología"
                               class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]">
                        @error('brandTagline') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Logo Section: Upload or URL -->
                    <div class="space-y-3 p-4 bg-slate-50 rounded-2xl border border-slate-200">
                        <label class="block text-xs font-bold text-slate-800 uppercase tracking-wider">Logo de la Marca</label>
                        
                        @if($newLogo)
                            <div class="p-3 bg-white rounded-xl border border-slate-200 flex items-center gap-4">
                                <img src="{{ $newLogo->temporaryUrl() }}" class="h-12 max-w-full object-contain">
                                <span class="text-xs text-emerald-600 font-bold">Nuevo archivo seleccionado listo para guardar</span>
                            </div>
                        @elseif($brandLogo)
                            <div class="p-3 bg-white rounded-xl border border-slate-200 flex items-center gap-4">
                                <img src="{{ $brandLogo }}" class="h-12 max-w-full object-contain">
                                <span class="text-xs text-slate-600 truncate font-mono">{{ $brandLogo }}</span>
                            </div>
                        @endif

                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 mb-1">Subir archivo (PNG, SVG, JPG, WebP)</label>
                            <input type="file" wire:model="newLogo" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-800 hover:file:bg-slate-300">
                            @error('newLogo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 mb-1">O bien ingresá URL / Ruta de imagen existente</label>
                            <input type="text" wire:model="brandLogo" placeholder="images/marcas/ejemplo.svg o https://..."
                                   class="w-full text-xs rounded-xl border border-slate-300 py-2 px-3 bg-white focus:ring-2 focus:ring-[#eb0a1e]">
                        </div>

                        <!-- Sugerencia de Formato -->
                        <div class="p-3 bg-amber-50 rounded-xl border border-amber-200 text-xs text-amber-950 space-y-1">
                            <div class="font-bold flex items-center gap-1.5 text-amber-800">
                                <i class="fas fa-lightbulb text-amber-500"></i> Sugerencia de formato y tamaño para el logo del menú:
                            </div>
                            <ul class="list-disc pl-4 space-y-0.5 text-[11px] text-amber-900 font-normal">
                                <li><strong>Dimensiones recomendadas:</strong> 300 x 90 px (proporción horizontal ~3:1).</li>
                                <li><strong>Formato ideal:</strong> <code>.SVG</code> (vectorial) o <code>.PNG</code> transparente.</li>
                                <li><strong>Recorte:</strong> Ajustado al ras de las letras/isotipo, sin márgenes vacíos.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Redirección personalizada opcional -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">URL de Destino Personalizada (Opcional)</label>
                            <span class="text-[10px] text-slate-400 font-mono">Ej: <code>/#destacados-0km</code></span>
                        </div>
                        <input type="text" wire:model="brandCustomUrl" placeholder="Dejar vacío para página automática /marcas/{slug}"
                               class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]">
                        <p class="text-[10px] text-slate-400 mt-1">
                            Si especificás una URL (por ejemplo <code>/#destacados-0km</code> como en Toyota), el menú redirigirá a esa sección.
                        </p>
                        @error('brandCustomUrl') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Descripción de la Marca</label>
                        <textarea wire:model="brandDescription" rows="3" placeholder="Breve reseña que aparecerá en el encabezado de su vitrina..."
                                  class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]"></textarea>
                        @error('brandDescription') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Orden de Visualización</label>
                            <input type="number" wire:model="brandSortOrder" min="0" 
                                   class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]">
                        </div>

                        <div class="space-y-2 pt-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" wire:model="brandIsFeaturedMenu" class="rounded text-[#eb0a1e] focus:ring-[#eb0a1e]">
                                <span class="text-xs font-bold text-slate-800">Mostrar en Mega Menú</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" wire:model="brandActive" class="rounded text-[#eb0a1e] focus:ring-[#eb0a1e]">
                                <span class="text-xs font-medium text-slate-700">Marca Activa</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                        <button type="button" wire:click="closeModal" class="px-5 py-2.5 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition">Cancelar</button>
                        <button type="submit" class="px-6 py-2.5 bg-[#eb0a1e] hover:bg-[#c90819] text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>Guardar Marca</span>
                        </button>
                    </div>
                </form>
            @else
                <form wire:submit="saveCategory" class="space-y-5 max-w-xl">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nombre de la Categoría *</label>
                        <input type="text" wire:model="categoryName" placeholder="Ej: SUV, Sedán, Pick-up, Híbrido" required
                               class="w-full text-sm font-semibold rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]">
                        @error('categoryName') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Ícono FontAwesome (Opcional)</label>
                        <input type="text" wire:model="categoryIcon" placeholder="fas fa-truck-pickup"
                               class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Descripción</label>
                        <textarea wire:model="categoryDescription" rows="3" placeholder="Descripción breve..."
                                  class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#eb0a1e]"></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                        <button type="button" wire:click="closeModal" class="px-5 py-2.5 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition">Cancelar</button>
                        <button type="submit" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>Guardar Categoría</span>
                        </button>
                    </div>
                </form>
            @endif
        </div>

    @else
        <!-- ============================================== -->
        <!-- LISTADO DE MARCAS Y CATEGORÍAS (TABS)         -->
        <!-- ============================================== -->
        <!-- Tabs Navigation -->
        <div class="flex border-b border-slate-200">
            <button wire:click="$set('activeTab', 'brands')" 
                    class="px-6 py-3 font-bold text-xs uppercase tracking-wider transition border-b-2 {{ $activeTab === 'brands' ? 'border-[#eb0a1e] text-[#eb0a1e]' : 'border-transparent text-slate-400 hover:text-slate-700' }}">
                Marcas & Divisiones ({{ $brands->count() }})
            </button>
            <button wire:click="$set('activeTab', 'categories')" 
                    class="px-6 py-3 font-bold text-xs uppercase tracking-wider transition border-b-2 {{ $activeTab === 'categories' ? 'border-[#eb0a1e] text-[#eb0a1e]' : 'border-transparent text-slate-400 hover:text-slate-700' }}">
                Tipos de Carrocería ({{ $categories->count() }})
            </button>
        </div>

        <!-- Content Tabs -->
        @if($activeTab === 'brands')
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($brands as $brand)
                    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <!-- Header Card: Logo & Badges -->
                            <div class="flex items-start justify-between gap-3 mb-3">
                                <div class="w-16 h-12 bg-slate-50 border border-slate-100 rounded-xl p-1 flex items-center justify-center flex-shrink-0">
                                    <img src="{{ $brand->logo_src }}" alt="{{ $brand->name }}" class="max-h-9 max-w-full object-contain">
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    @if($brand->is_featured_menu)
                                        <span role="button" wire:click="toggleFeaturedMenu({{ $brand->id }})" title="Clic para alternar visibilidad en Mega Menú" 
                                              class="cursor-pointer text-[10px] font-bold px-2 py-0.5 rounded-full bg-red-50 text-[#eb0a1e] border border-red-200/50 flex items-center gap-1">
                                            <i class="fas fa-bars text-[8px]"></i> Mega Menú
                                        </span>
                                    @else
                                        <span role="button" wire:click="toggleFeaturedMenu({{ $brand->id }})" title="Clic para mostrar en Mega Menú" 
                                              class="cursor-pointer text-[10px] font-medium px-2 py-0.5 rounded-full bg-slate-100 text-slate-400 hover:text-slate-700 flex items-center gap-1">
                                            Solo Catálogo
                                        </span>
                                    @endif

                                    @if(!$brand->is_active)
                                        <span class="text-[9px] font-medium px-1.5 py-0.5 rounded bg-amber-50 text-amber-700">Inactiva</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Brand Info -->
                            <div>
                                <div class="flex items-center gap-1.5">
                                    <h3 class="font-bold text-slate-900 text-sm font-heading">{{ $brand->name }}</h3>
                                    <span class="text-[10px] text-slate-400 font-mono">#{{ $brand->sort_order }}</span>
                                </div>
                                @if($brand->tagline)
                                    <p class="text-[11px] text-slate-500 font-normal mt-0.5 line-clamp-1">{{ $brand->tagline }}</p>
                                @endif
                            </div>

                            <!-- Info extra y enlace a modelos -->
                            <div class="mt-3 pt-2 border-t border-slate-100 flex items-center justify-between text-[11px]">
                                <a href="{{ route('admin.vehicles.0km') }}?brand_id={{ $brand->id }}" 
                                   class="font-bold text-[#eb0a1e] hover:underline flex items-center gap-1.5"
                                   title="Ver y cargar modelos de {{ $brand->name }}">
                                    <i class="fas fa-car-side text-[10px]"></i> Modelos ({{ $brand->vehicles_count }}) &rarr;
                                </a>
                                @if($brand->custom_url)
                                    <span class="text-slate-400 font-mono text-[10px] truncate max-w-[110px]" title="{{ $brand->custom_url }}">
                                        {{ $brand->custom_url }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-end gap-2 mt-4 pt-3 border-t border-slate-100">
                            <button wire:click="editBrand({{ $brand->id }})" class="p-1.5 text-slate-600 hover:text-slate-900 transition" title="Editar">
                                <i class="fas fa-edit text-xs"></i>
                            </button>
                            <button wire:click="toggleBrandActive({{ $brand->id }})" class="p-1.5 {{ $brand->is_active ? 'text-emerald-600' : 'text-slate-400' }} hover:text-emerald-800 transition" title="Activar/Desactivar">
                                <i class="fas {{ $brand->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }} text-sm"></i>
                            </button>
                            <button wire:click="deleteBrand({{ $brand->id }})" wire:confirm="¿Seguro de eliminar esta marca? Sus vehículos asociados pasarán a no tener marca." class="p-1.5 text-rose-500 hover:text-rose-700 transition" title="Eliminar">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Categorías -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($categories as $category)
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs flex items-center justify-between hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-50 text-slate-700 flex items-center justify-center text-sm border border-slate-100">
                                <i class="{{ $category->icon ?: 'fas fa-car' }}"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-xs">{{ $category->name }}</h3>
                                <p class="text-[10px] text-slate-400">{{ $category->vehicles_count }} vehículos registrados</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <button wire:click="editCategory({{ $category->id }})" class="p-1.5 text-slate-600 hover:text-slate-900 transition" title="Editar">
                                <i class="fas fa-edit text-xs"></i>
                            </button>
                            <button wire:click="deleteCategory({{ $category->id }})" wire:confirm="¿Seguro de eliminar esta categoría?" class="p-1.5 text-rose-500 hover:text-rose-700 transition" title="Eliminar">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</div>
