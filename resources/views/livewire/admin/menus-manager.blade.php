<div class="space-y-6 max-w-5xl">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 font-heading">Gestor de Menús (Navegación)</h1>
            <p class="text-xs text-slate-500">Personalizá todos los enlaces del menú superior, creá submenús desplegables e insignias destacadas del sitio web.</p>
        </div>
        <div>
            @if($isOpen)
                <button wire:click="closeModal" 
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-xs">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver al Listado</span>
                </button>
            @else
                <button wire:click="create" 
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-xs">
                    <i class="fas fa-plus"></i>
                    <span>Nuevo Ítem de Menú</span>
                </button>
            @endif
        </div>
    </div>

    @if($isOpen)
        <!-- ============================================== -->
        <!-- FORMULARIO INTEGRADO EN PÁGINA (SIN MODAL)     -->
        <!-- ============================================== -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-sky-50 text-[#416A8D] flex items-center justify-center text-lg">
                        <i class="fas {{ $selectedId ? 'fa-edit' : 'fa-plus' }}"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#416A8D]">
                            {{ $selectedId ? 'Modo Edición #' . $selectedId : 'Nuevo Ítem de Menú' }}
                        </span>
                        <h2 class="text-xl font-black text-slate-900 font-heading">
                            {{ $title ?: 'Configuración del Ítem' }}
                        </h2>
                    </div>
                </div>
                <button type="button" wire:click="closeModal" class="px-4 py-2 text-xs font-bold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 rounded-xl transition flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Volver al Listado</span>
                </button>
            </div>

            <form wire:submit="save" class="space-y-5 max-w-2xl">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Título del Menú *</label>
                    <input type="text" wire:model="title" placeholder="Ej: Vehículos, Posventa, Ofertas..." required
                           class="w-full text-sm font-semibold rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Jerarquía: ¿Es Submenú de alguien? -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nivel Jerárquico (Menú Padre)</label>
                    <select wire:model="parent_id" class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                        <option value="">(Ninguno - Ítem Principal del Header)</option>
                        @foreach($potentialParents as $p)
                            <option value="{{ $p->id }}">Dentro de: {{ $p->title }}</option>
                        @endforeach
                    </select>
                    <span class="text-[11px] text-slate-400 mt-1 block">Si seleccionás un menú padre, este ítem aparecerá en el menú desplegable (dropdown).</span>
                </div>

                <!-- Enlace URL -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Enlace / URL de Destino *</label>
                    <input type="text" wire:model="url" placeholder="Ej: /usados, /#contacto, https://..." required
                           class="w-full text-xs font-mono rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    
                    <!-- Botones de Enlace Rápido -->
                    <div class="flex flex-wrap items-center gap-1.5 mt-2">
                        <span class="text-[10px] text-slate-400 font-bold uppercase mr-1">Rápidos:</span>
                        <button type="button" wire:click="setQuickUrl('/#destacados-0km')" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-700 px-2 py-0.5 rounded font-medium">0 Km</button>
                        <button type="button" wire:click="setQuickUrl('/usados')" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-700 px-2 py-0.5 rounded font-medium">Usados</button>
                        <button type="button" wire:click="setQuickUrl('/#taller-movil')" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-700 px-2 py-0.5 rounded font-medium">Taller Móvil</button>
                        <button type="button" wire:click="setQuickUrl('/#servicios')" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-700 px-2 py-0.5 rounded font-medium">Servicios</button>
                        <button type="button" wire:click="setQuickUrl('/#podcast')" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-700 px-2 py-0.5 rounded font-medium">Podcast</button>
                        <button type="button" wire:click="setQuickUrl('/#sucursales')" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-700 px-2 py-0.5 rounded font-medium">Sucursales</button>
                        <button type="button" wire:click="setQuickUrl('/#contacto')" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-700 px-2 py-0.5 rounded font-medium">Contacto</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Ícono FontAwesome</label>
                        <input type="text" wire:model="icon" placeholder="fas fa-car"
                               class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Orden de Posición</label>
                        <input type="number" wire:model="sort_order"
                               class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                </div>

                <!-- Insignia / Badge Opcional -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Texto de Badge (Opcional)</label>
                        <input type="text" wire:model="badge_text" placeholder="Ej: Nuevo, Stock, 2025"
                               class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Color de Badge</label>
                        <select wire:model="badge_color" class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                            <option value="red">Rojo (Toyota)</option>
                            <option value="emerald">Verde (Garantía)</option>
                            <option value="slate">Gris</option>
                            <option value="amber">Ámbar</option>
                            <option value="sky">Azul Celeste</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Destino del Enlace</label>
                        <select wire:model="target" class="w-full text-xs rounded-xl border border-slate-300 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                            <option value="_self">Misma pestaña (_self)</option>
                            <option value="_blank">Nueva pestaña (_blank)</option>
                        </select>
                    </div>
                    <div class="flex items-center pt-4 sm:pt-6">
                        <label class="flex items-center text-xs font-bold text-slate-700 cursor-pointer">
                            <input type="checkbox" wire:model="is_active" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500">
                            <span class="ml-2">Ítem Visible / Activo</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" wire:click="closeModal" class="px-5 py-2.5 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition">Cancelar</button>
                    <button type="submit" class="px-6 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-2">
                        <i class="fas fa-save"></i>
                        <span>Guardar Ítem</span>
                    </button>
                </div>
            </form>
        </div>

    @else
        <!-- ============================================== -->
        <!-- ÁRBOL JERÁRQUICO DE MENÚS                      -->
        <!-- ============================================== -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <h2 class="text-sm font-extrabold uppercase tracking-wider text-slate-700 font-heading flex items-center gap-2">
                    <i class="fas fa-bars text-[#416A8D]"></i> Estructura del Menú de Cabecera (Header)
                </h2>
                <span class="text-xs text-slate-400">Total: {{ $rootItems->count() }} ítems de primer nivel</span>
            </div>

            <!-- Hierarchy List -->
            <div class="space-y-3">
                @forelse($rootItems as $item)
                    <div class="border border-slate-200/80 rounded-2xl overflow-hidden bg-slate-50/50">
                        <!-- Root Item Row -->
                        <div class="p-4 flex items-center justify-between bg-white border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center text-xs font-bold">
                                    {{ $item->sort_order }}
                                </span>
                                @if($item->icon)
                                    <i class="{{ $item->icon }} text-slate-400 text-sm"></i>
                                @endif
                                <div>
                                    <span class="font-extrabold text-slate-900 text-sm">{{ $item->title }}</span>
                                    <span class="text-xs text-slate-400 font-mono ml-2">({{ $item->url }})</span>
                                    @if($item->target === '_blank')
                                        <i class="fas fa-external-link-alt text-[10px] text-slate-400 ml-1" title="Abre en nueva pestaña"></i>
                                    @endif
                                    @if($item->badge_text)
                                        <span class="ml-2 text-[10px] font-bold px-2 py-0.5 rounded {{ $item->badge_color === 'red' ? 'bg-red-50 text-red-600' : ($item->badge_color === 'emerald' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-700') }}">
                                            {{ $item->badge_text }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center gap-2">
                                <button wire:click="toggleActive({{ $item->id }})" 
                                        class="text-[10px] font-bold px-2.5 py-1 rounded-full uppercase transition {{ $item->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-400' }}">
                                    {{ $item->is_active ? 'Activo' : 'Oculto' }}
                                </button>
                                <button wire:click="edit({{ $item->id }})" class="p-2 text-[#416A8D] hover:bg-sky-50 rounded-xl transition" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="delete({{ $item->id }})" wire:confirm="¿Seguro que deseas eliminar este ítem y todos sus submenús?" class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submenu Items (Children) -->
                        @if($item->children->count() > 0)
                            <div class="p-3 pl-8 sm:pl-12 space-y-2 bg-slate-50 border-t border-slate-100">
                                @foreach($item->children as $sub)
                                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-white border border-slate-200/60 shadow-2xs">
                                        <div class="flex items-center gap-2.5">
                                            <i class="fas fa-level-up-alt rotate-90 text-slate-300 text-xs"></i>
                                            <span class="w-5 h-5 rounded-md bg-slate-100 text-slate-500 flex items-center justify-center text-[10px] font-bold">
                                                {{ $sub->sort_order }}
                                            </span>
                                            <span class="font-bold text-slate-800 text-xs">{{ $sub->title }}</span>
                                            <span class="text-[11px] text-slate-400 font-mono">({{ $sub->url }})</span>
                                            @if($sub->badge_text)
                                                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded {{ $sub->badge_color === 'red' ? 'bg-red-50 text-red-600' : ($sub->badge_color === 'emerald' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-700') }}">
                                                    {{ $sub->badge_text }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <button wire:click="toggleActive({{ $sub->id }})" 
                                                    class="text-[9px] font-bold px-2 py-0.5 rounded-full uppercase transition {{ $sub->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-400' }}">
                                                {{ $sub->is_active ? 'Activo' : 'Oculto' }}
                                            </button>
                                            <button wire:click="edit({{ $sub->id }})" class="p-1.5 text-[#416A8D] hover:bg-sky-50 rounded-lg">
                                                <i class="fas fa-edit text-xs"></i>
                                            </button>
                                            <button wire:click="delete({{ $sub->id }})" wire:confirm="¿Eliminar este submenú?" class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-lg">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-10 text-slate-400">
                        <i class="fas fa-bars text-3xl mb-2"></i>
                        <p class="text-xs">No hay ítems configurados en el menú.</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endif
</div>
