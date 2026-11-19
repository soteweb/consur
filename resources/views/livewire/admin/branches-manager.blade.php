<div class="space-y-6">
    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-red-50 text-red-700 border border-red-200">
                    <i class="fas fa-map-marked-alt mr-1"></i> Red de Atención Oficial
                </span>
            </div>
            <h1 class="text-xl font-semibold text-slate-800 tracking-tight mt-1">Sucursales, Mapas Interactivos & Talleres</h1>
            <p class="text-xs text-slate-500 mt-0.5">
                Administra las pestañas de sucursales que se muestran en la web pública, cada una con su propio mapa interactivo de Google Maps y datos de contacto.
            </p>
        </div>

        @if(!$isOpen)
            <button wire:click="create" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-xs flex items-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Nueva Sucursal</span>
            </button>
        @endif
    </div>

    @if($isOpen)
        <!-- Panel de Creación / Edición de Sucursal -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-lg overflow-hidden">
            <div class="bg-slate-900 px-6 py-4 text-white flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-red-600 flex items-center justify-center text-white text-sm">
                        <i class="fas fa-building"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-red-400">Configuración de Sede y Mapa</span>
                        <h2 class="text-base font-bold text-white">
                            {{ $selectedId ? 'Editar Sucursal: ' . $name . ' (' . $city . ')' : 'Registrar Nueva Sucursal' }}
                        </h2>
                    </div>
                </div>
                <button type="button" wire:click="closeModal" class="px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold transition flex items-center gap-1.5">
                    <i class="fas fa-arrow-left text-[10px]"></i> Volver al listado
                </button>
            </div>

            <form wire:submit="save" class="p-6 sm:p-8 space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Columna Izquierda: Datos de la Sucursal -->
                    <div class="lg:col-span-7 space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Ciudad (Nombre en Pestaña) *</label>
                                <input type="text" wire:model="city" placeholder="Ej: Encarnación, Obligado..." required
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                                @error('city') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título de la Sede *</label>
                                <input type="text" wire:model="name" placeholder="Ej: Casa Matriz, Sucursal Obligado" required
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                                @error('name') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Orden de Pestaña</label>
                                <input type="number" wire:model="sort_order" min="0"
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Dirección Exacta *</label>
                            <input type="text" wire:model="address" placeholder="Ej: Avda. Caballero 749, Encarnación – Paraguay" required
                                   class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                            @error('address') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Teléfono</label>
                                <input type="text" wire:model="phone" placeholder="(+595-71) 204 106"
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">WhatsApp</label>
                                <input type="text" wire:model="whatsapp" placeholder="+595 985 204 106"
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Correo Electrónico</label>
                                <input type="email" wire:model="email" placeholder="aclientes@consur.com.py"
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Horario Lunes a Viernes</label>
                                <input type="text" wire:model="schedule_weekdays" placeholder="De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:30 Hs."
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Horario Sábados</label>
                                <input type="text" wire:model="schedule_saturday" placeholder="Sábados: de 07:30 a 12:00 Hs."
                                       class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-red-500">
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-6 pt-2">
                            <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                                <input type="checkbox" wire:model="has_workshop" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500">
                                <span>Taller Oficial en Sede</span>
                            </label>
                            <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                                <input type="checkbox" wire:model="has_mobile_workshop" class="w-4 h-4 rounded text-sky-600 focus:ring-sky-500">
                                <span>Servicio de Taller Móvil</span>
                            </label>
                            <label class="flex items-center gap-2 text-xs font-bold text-slate-700 cursor-pointer">
                                <input type="checkbox" wire:model="is_active" class="w-4 h-4 rounded text-red-600 focus:ring-red-500">
                                <span>Mostrar Sucursal en la Web</span>
                            </label>
                        </div>
                    </div>

                    <!-- Columna Derecha: Mapa de Google Maps -->
                    <div class="lg:col-span-5 space-y-4">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="block text-xs font-bold text-slate-800">
                                    <i class="fas fa-map-pin text-red-600 mr-1"></i> Mapa de Google Maps (URL o <code>&lt;iframe&gt;</code>)
                                </label>
                                <span class="text-[10px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200">
                                    Interactivo
                                </span>
                            </div>

                            <textarea wire:model.live.debounce.500ms="google_maps_url" rows="3"
                                      placeholder="Pega aquí la URL de Google Maps Embed (https://www.google.com/maps/embed?pb=...) o el código <iframe> completo de Compartir -> Insertar un mapa"
                                      class="w-full text-xs font-mono rounded-xl border border-slate-200 p-3 bg-white focus:ring-2 focus:ring-red-500"></textarea>

                            <p class="text-[11px] text-slate-500 leading-relaxed">
                                Puedes pegar directamente el código <code>&lt;iframe src="..."&gt;</code> de Google Maps o la URL <code>https://www.google.com/maps/embed...</code>. Si lo dejas vacío, se generará un mapa automático con la dirección y ciudad.
                            </p>

                            @php
                                $previewUrl = trim($google_maps_url);
                                if (preg_match('/src=["\']([^"\']+)["\']/i', $previewUrl, $m)) {
                                    $previewUrl = $m[1];
                                } elseif ($previewUrl === '' || (!str_contains($previewUrl, 'google.com/maps/embed') && !str_contains($previewUrl, 'output=embed'))) {
                                    $q = urlencode(trim(($name ?: 'CONSUR') . ' ' . $address . ' ' . ($city ?: 'Encarnación') . ' Paraguay'));
                                    $previewUrl = "https://maps.google.com/maps?q={$q}&t=&z=15&ie=UTF8&iwloc=&output=embed";
                                }
                            @endphp

                            <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-100 h-52">
                                <iframe src="{{ $previewUrl }}" class="w-full h-full border-0" loading="lazy" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-5 border-t border-slate-100">
                    <button type="button" wire:click="closeModal" class="px-5 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50">
                        Cancelar
                    </button>
                    <button type="submit" class="px-7 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
                        <i class="fas fa-save"></i>
                        <span>{{ $selectedId ? 'Guardar Cambios' : 'Crear Sucursal' }}</span>
                    </button>
                </div>
            </form>
        </div>
    @else
        <!-- Listado de Sucursales en Tarjetas con Vista Previa de Mapa -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
            @foreach($branches as $b)
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <!-- Mapa Miniatura Superior -->
                        <div class="relative h-40 bg-slate-100 border-b border-slate-100">
                            <iframe src="{{ $b->embed_map_url }}" class="w-full h-full border-0 pointer-events-none" loading="lazy"></iframe>
                            <div class="absolute top-3 left-3 flex items-center gap-1.5">
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider bg-slate-900/90 text-white backdrop-blur-xs shadow-xs">
                                    Pestaña #{{ $b->sort_order }}: {{ $b->city }}
                                </span>
                                @if(!$b->is_active)
                                    <span class="px-2 py-0.5 rounded-lg text-[10px] font-bold bg-amber-500 text-white">Oculta</span>
                                @endif
                            </div>
                        </div>

                        <!-- Información -->
                        <div class="p-5 space-y-3">
                            <div>
                                <h3 class="font-bold text-slate-900 text-base leading-snug">{{ $b->name }}</h3>
                                <p class="text-xs text-slate-500 mt-0.5 flex items-start gap-1.5">
                                    <i class="fas fa-map-marker-alt text-red-600 mt-0.5"></i>
                                    <span>{{ $b->address }}</span>
                                </p>
                            </div>

                            <div class="grid grid-cols-1 gap-1.5 text-xs bg-slate-50 p-3 rounded-xl border border-slate-100">
                                @if($b->phone)
                                    <div class="flex items-center justify-between">
                                        <span class="text-slate-400 font-medium">Teléfono:</span>
                                        <strong class="text-slate-800">{{ $b->phone }}</strong>
                                    </div>
                                @endif
                                @if($b->email)
                                    <div class="flex items-center justify-between">
                                        <span class="text-slate-400 font-medium">Email:</span>
                                        <span class="text-slate-700 font-mono text-[11px]">{{ $b->email }}</span>
                                    </div>
                                @endif
                                @if($b->schedule_weekdays)
                                    <div class="pt-1 border-t border-slate-200/60 text-[11px] text-slate-500">
                                        <strong class="text-slate-700">Horario:</strong> {{ $b->schedule_weekdays }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="px-5 py-3.5 bg-slate-50/60 border-t border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-[11px]">
                            @if($b->has_workshop)
                                <span class="text-emerald-700 font-semibold flex items-center gap-1">
                                    <i class="fas fa-tools text-[10px]"></i> Taller Oficial
                                </span>
                            @endif
                            @if($b->has_mobile_workshop)
                                <span class="text-sky-700 font-semibold flex items-center gap-1">
                                    <i class="fas fa-truck-pickup text-[10px]"></i> Taller Móvil
                                </span>
                            @endif
                        </div>

                        <div class="flex items-center gap-1.5">
                            <button wire:click="edit({{ $b->id }})" class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold text-xs transition flex items-center gap-1">
                                <i class="fas fa-edit text-[10px]"></i> Editar
                            </button>
                            <button wire:click="delete({{ $b->id }})" wire:confirm="¿Seguro que deseas eliminar la sucursal {{ $b->name }}?" class="p-1.5 text-rose-500 hover:bg-rose-50 rounded-xl transition" title="Eliminar sucursal">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
