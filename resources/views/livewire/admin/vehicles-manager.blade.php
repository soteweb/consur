<div class="space-y-6">
    <!-- Top Bar: Title & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                @if($isZeroKm)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-red-50 text-red-700 border border-red-200">
                        <i class="fas fa-car-side mr-1"></i> Gama Oficial 0 Km
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-amber-50 text-amber-800 border border-amber-200">
                        <i class="fas fa-sync-alt mr-1"></i> Seminuevos & Tomas
                    </span>
                @endif
                <span class="text-xs text-slate-400">&bull;</span>
                <span class="text-xs text-slate-500 font-medium">
                    Rol: <strong class="text-slate-700">{{ auth()->user()->role_badge['label'] }}</strong>
                </span>
            </div>

            <h1 class="text-xl font-semibold text-slate-800 tracking-tight mt-1">
                {{ $isZeroKm ? 'Catálogo Oficial de Vehículos 0 Km' : 'Gestión de Vehículos Usados & Seminuevos' }}
            </h1>
            <p class="text-xs text-slate-500 font-normal mt-0.5">
                {{ $isZeroKm 
                    ? 'Editor limpio de páginas 0 Km: datos del modelo, imágenes del Hero, biblioteca de fotos y diseño HTML libre.' 
                    : 'Inventario comercial de vehículos usados disponibles, tasaciones de entrega y seminuevos certificados.' }}
            </p>
        </div>

        @if(!$isOpen)
            <div class="flex items-center gap-2">
                @if($isZeroKm)
                    @if(auth()->user()->canManageContent())
                        <button wire:click="create" 
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-sm">
                            <i class="fas fa-plus"></i>
                            <span>Nuevo 0 Km</span>
                        </button>
                    @else
                        <a href="{{ route('admin.leads') }}" 
                           class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-bold rounded-xl transition shadow-sm">
                            <i class="fas fa-comments"></i>
                            <span>Atender Leads 0 Km</span>
                        </a>
                    @endif
                @else
                    <button wire:click="create" 
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-sm">
                        <i class="fas fa-plus"></i>
                        <span>+ Registrar Usado</span>
                    </button>
                @endif
            </div>
        @endif
    </div>

    <!-- Banner Informativo de Permisos según Rol -->
    @if(auth()->user()->isVendedor())
        @if($isZeroKm)
            <div class="p-4 rounded-2xl bg-sky-50 border border-sky-200 text-sky-900 text-xs flex items-start sm:items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center flex-shrink-0 text-sm">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="flex-1">
                    <strong class="font-bold">Modo Asesor Comercial (Solo Consulta):</strong>
                    <span class="text-sky-800">Tienes acceso a las fichas técnicas, equipamiento y precios oficiales para asesorar a tus clientes. Para responder y gestionar las consultas de estos vehículos, dirígete a </span>
                    <a href="{{ route('admin.leads') }}" class="font-bold underline text-[#416A8D] hover:text-sky-950">Leads & Cotizaciones</a>.
                </div>
            </div>
        @else
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs flex items-start sm:items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center flex-shrink-0 text-sm">
                    <i class="fas fa-check-double"></i>
                </div>
                <div class="flex-1">
                    <strong class="font-bold">Gestión Comercial Completa de Usados:</strong>
                    <span class="text-amber-800">Como asesor puedes registrar nuevas unidades usadas que ingresen por permuta o consignación, cargar fotografías, actualizar kilometrajes, precios y cambiar el estado (disponible, reservado o vendido).</span>
                </div>
            </div>
        @endif
    @endif

    <!-- KPI Metric Cards (Solo visibles cuando no se está editando) -->
    @if(!$isOpen)
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3.5">
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-medium text-slate-400 uppercase tracking-wider">Total en Catálogo</span>
                <div class="w-7 h-7 rounded-lg {{ $isZeroKm ? 'bg-red-50 text-red-600' : 'bg-amber-50 text-amber-700' }} flex items-center justify-center text-xs">
                    <i class="fas {{ $isZeroKm ? 'fa-car-side' : 'fa-car' }}"></i>
                </div>
            </div>
            <div class="text-2xl font-semibold text-slate-800 mt-1.5 tabular-nums">{{ $kpiTotal }}</div>
            <span class="text-[10px] text-slate-400 font-normal">Unidades registradas</span>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-medium text-emerald-600 uppercase tracking-wider">Disponibles</span>
                <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="text-2xl font-semibold text-emerald-600 mt-1.5 tabular-nums">{{ $kpiDisponibles }}</div>
            <span class="text-[10px] text-slate-400 font-normal">Para venta inmediata</span>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-medium text-amber-600 uppercase tracking-wider">
                    {{ $isZeroKm ? 'Modelos Híbridos' : 'Reservados' }}
                </span>
                <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-xs">
                    <i class="fas {{ $isZeroKm ? 'fa-bolt' : 'fa-handshake' }}"></i>
                </div>
            </div>
            <div class="text-2xl font-semibold text-amber-600 mt-1.5 tabular-nums">
                {{ $isZeroKm ? $kpiHybrids : $kpiReservados }}
            </div>
            <span class="text-[10px] text-slate-400 font-normal">
                {{ $isZeroKm ? 'Tecnología HEV Oficial' : 'Señados / En trámite' }}
            </span>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-medium text-[#416A8D] uppercase tracking-wider">Consultas / Leads</span>
                <div class="w-7 h-7 rounded-lg bg-[#416A8D]/10 text-[#416A8D] flex items-center justify-center text-xs">
                    <i class="fas fa-users-cog"></i>
                </div>
            </div>
            <div class="text-2xl font-semibold text-[#416A8D] mt-1.5 tabular-nums">{{ $kpiLeads }}</div>
            <a href="{{ route('admin.leads') }}" class="text-[10px] text-[#416A8D] font-medium hover:underline">
                Gestionar en CRM &rarr;
            </a>
        </div>
    </div>
    @endif

    <!-- PANEL INLINE DE CREACIÓN / EDICIÓN / FICHA (ESTRICTAMENTE SIN MODAL) -->
    @if($isOpen)
        <div class="bg-white rounded-3xl border-2 {{ $isZeroKm ? 'border-red-500/30' : 'border-[#416A8D]/30' }} shadow-xl overflow-hidden transition-all duration-200"
             x-data="{ tab: 'general' }">
            <!-- Header del Panel -->
            <div class="bg-gradient-to-r {{ $isZeroKm ? 'from-slate-900 via-slate-800 to-red-950' : 'from-slate-900 via-slate-800 to-[#2c5373]' }} p-5 text-white flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-white text-base">
                        <i class="fas {{ $viewOnly ? 'fa-id-card' : 'fa-edit' }}"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider {{ $isZeroKm ? 'bg-red-600' : 'bg-amber-600' }} text-white">
                                {{ $isZeroKm ? 'Vehículo 0 Km' : 'Vehículo Usado' }}
                            </span>
                            @if($selectedId)
                                <span class="text-xs text-slate-300">ID #{{ $selectedId }}</span>
                            @else
                                <span class="text-xs text-emerald-400 font-bold">Nuevo Registro</span>
                            @endif
                        </div>
                        <h2 class="text-xl font-black text-white font-heading mt-0.5">
                            @if($viewOnly)
                                Ficha Técnica Comercial: {{ $model }} {{ $version }} ({{ $year }})
                            @else
                                {{ $selectedId ? 'Editar: ' . $model . ' ' . $version : 'Registrar Nuevo Vehículo ' . ($isZeroKm ? '0 Km' : 'Usado') }}
                            @endif
                        </h2>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-2">
                    @if(!$viewOnly && $isZeroKm && isset($allZeroKmModels) && $allZeroKmModels->count() > 0)
                        <!-- Selector Rápido de Modelo en el Editor 0 Km -->
                        <div class="flex items-center gap-1.5 bg-white/10 border border-white/15 rounded-xl px-2.5 py-1">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-300">
                                <i class="fas fa-car-side text-red-400 mr-1"></i> Modelo:
                            </span>
                            <select wire:change="switchEditorModel($event.target.value)"
                                    class="bg-slate-900 text-white text-xs font-bold rounded-lg border border-white/20 py-1 pl-2 pr-7 focus:ring-2 focus:ring-red-500">
                                <option value="all" @selected($editorModelScope === 'all')>
                                    ★ Todos los Modelos 0 Km ({{ $allZeroKmModels->count() }})
                                </option>
                                <option value="multiple" @selected($editorModelScope === 'multiple')>
                                    ☑ Selección Múltiple ({{ count($targetModelIds) }})
                                </option>
                                <optgroup label="Seleccionar un Modelo 0 Km">
                                    @foreach($allZeroKmModels as $mItem)
                                        <option value="{{ $mItem->id }}" @selected($editorModelScope === 'single' && (int)$selectedId === (int)$mItem->id)>
                                            {{ $mItem->brand?->name }} {{ $mItem->model }} ({{ $mItem->version ?: $mItem->year }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    @endif
                    @if($selectedId && !$isZeroKm)
                        <a href="{{ route('admin.leads') }}?search={{ urlencode($model) }}" 
                           class="px-3.5 py-2 bg-white/10 hover:bg-white/20 text-white font-bold text-xs rounded-xl transition flex items-center gap-1.5">
                            <i class="fas fa-users"></i> Ver Leads
                        </a>
                    @endif
                    @if($selectedId)
                        <a href="{{ route('vehiculo.detalle', \App\Models\Vehicle::find($selectedId)?->slug ?? '') }}" target="_blank"
                           class="px-3.5 py-2 bg-white/10 hover:bg-white/20 text-white font-bold text-xs rounded-xl transition flex items-center gap-1.5">
                            <i class="fas fa-external-link-alt"></i> Ver Página
                        </a>
                    @endif
                    <button wire:click="closeModal" 
                            class="px-3.5 py-2 bg-white/10 hover:bg-white/20 text-white font-bold text-xs rounded-xl transition flex items-center gap-1.5">
                        <i class="fas fa-arrow-left"></i> Volver al Listado
                    </button>
                </div>
            </div>

            @if(!$viewOnly && $isZeroKm && isset($allZeroKmModels) && $allZeroKmModels->count() > 0)
                <!-- Barra de Alcance de Modelos en el Editor 0 Km (Seleccionar Uno, Varios o Todos los Modelos) -->
                <div class="bg-slate-900/95 border-b border-slate-800 px-6 py-3 text-white flex flex-col gap-2.5">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2 text-xs">
                            <span class="font-black uppercase tracking-wider text-red-400 flex items-center gap-1.5">
                                <i class="fas fa-check-double"></i> Aplicar Diseño 0 Km a:
                            </span>
                            <button type="button" wire:click="selectSingleZeroKmTargetModel"
                                    class="px-3 py-1 rounded-lg text-xs font-bold transition {{ $editorModelScope === 'single' ? 'bg-red-600 text-white shadow-xs' : 'bg-white/10 text-slate-300 hover:bg-white/20' }}">
                                Solo este modelo ({{ $model ?: 'Actual' }})
                            </button>
                            <button type="button" wire:click="selectAllZeroKmTargetModels"
                                    class="px-3 py-1 rounded-lg text-xs font-bold transition {{ $editorModelScope === 'all' ? 'bg-red-600 text-white shadow-xs' : 'bg-white/10 text-slate-300 hover:bg-white/20' }}">
                                Todos los modelos 0 Km ({{ $allZeroKmModels->count() }})
                            </button>
                            <button type="button" wire:click="$set('editorModelScope', 'multiple')"
                                    class="px-3 py-1 rounded-lg text-xs font-bold transition {{ $editorModelScope === 'multiple' ? 'bg-red-600 text-white shadow-xs' : 'bg-white/10 text-slate-300 hover:bg-white/20' }}">
                                Seleccionar modelos específicos ({{ count($targetModelIds) }})
                            </button>
                        </div>

                        <div class="flex items-center gap-3 text-[11px] text-slate-400">
                            @if($editorModelScope === 'all')
                                <span class="text-amber-400 font-bold"><i class="fas fa-info-circle mr-1"></i> Todos los {{ $allZeroKmModels->count() }} modelos seleccionados.</span>
                            @elseif($editorModelScope === 'multiple')
                                <span class="text-emerald-400 font-bold">{{ count($targetModelIds) }} modelo(s) seleccionado(s).</span>
                            @else
                                <span>Podés cambiar de modelo arriba o elegir aplicar a todos.</span>
                            @endif

                            @if(($editorModelScope === 'all' || !empty($targetModelIds) || $selectedId) && auth()->user()->canManageContent())
                                <button type="button"
                                        wire:click="deleteTargetModels"
                                        wire:confirm="¿Seguro que deseas eliminar {{ $editorModelScope === 'all' ? 'TODOS los ' . $allZeroKmModels->count() . ' modelos 0 Km' : (count($targetModelIds) > 1 ? 'los ' . count($targetModelIds) . ' modelos seleccionados' : 'este modelo') }}?"
                                        class="px-3 py-1 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs transition flex items-center gap-1.5 shadow-xs">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>{{ $editorModelScope === 'all' ? 'Eliminar Todos (' . $allZeroKmModels->count() . ')' : (count($targetModelIds) > 1 ? 'Eliminar Seleccionados (' . count($targetModelIds) . ')' : 'Eliminar Modelo') }}</span>
                                </button>
                            @endif
                        </div>
                    </div>

                    @if($editorModelScope === 'multiple' || $editorModelScope === 'all')
                        <div class="flex flex-wrap items-center gap-2 pt-1 border-t border-white/10">
                            @foreach($allZeroKmModels as $mCheck)
                                @php
                                    $isChecked = $editorModelScope === 'all' || in_array($mCheck->id, $targetModelIds);
                                @endphp
                                <label class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl text-xs font-bold cursor-pointer transition border {{ $isChecked ? 'bg-red-600/25 border-red-500 text-white' : 'bg-white/5 border-white/10 text-slate-400 hover:bg-white/10' }}">
                                    <input type="checkbox"
                                           wire:click="toggleTargetModel({{ $mCheck->id }})"
                                           @checked($isChecked)
                                           class="rounded border-slate-600 text-red-600 focus:ring-red-500">
                                    <span>{{ $mCheck->model }}</span>
                                    @if((int)$selectedId === (int)$mCheck->id)
                                        <span class="text-[9px] uppercase bg-red-600 text-white px-1.5 py-0.2 rounded">Editando</span>
                                    @endif
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <!-- Contenido del Panel: MODO SOLO LECTURA (FICHA ASESOR) O MODO FORMULARIO COMPLETO -->
            @if($viewOnly)
                <!-- MODO FICHA TÉCNICA COMERCIAL (Para Vendedor en 0 Km) -->
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1 space-y-4">
                            <div class="rounded-2xl overflow-hidden bg-slate-100 aspect-video border border-slate-200">
                                @php 
                                    $mainImg = collect($existingImages)->firstWhere('is_main', true) ?? collect($existingImages)->first(); 
                                @endphp
                                @if($mainImg)
                                    <img src="{{ str_starts_with($mainImg['image_path'], 'http') ? $mainImg['image_path'] : asset('storage/' . $mainImg['image_path']) }}" 
                                         alt="{{ $model }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs">Sin fotografía</div>
                                @endif
                            </div>

                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 space-y-2">
                                <div class="text-[11px] font-black uppercase tracking-wider text-slate-400">Precios Oficiales de Lista</div>
                                <div class="text-2xl font-black text-red-600 font-heading">
                                    {{ $price_usd ? 'US$ ' . number_format($price_usd, 0, ',', '.') : 'Consultar' }}
                                </div>
                                @if($monthly_fee_usd)
                                    <div class="text-xs font-bold text-emerald-600 flex items-center gap-1">
                                        <i class="fas fa-calendar-check"></i> Cuotas desde US$ {{ number_format($monthly_fee_usd, 0, ',', '.') }} / mes
                                    </div>
                                @endif
                                @if($price_note)
                                    <div class="text-xs text-slate-500 italic">{{ $price_note }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-4">
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-xs">
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Modelo:</span>
                                    <strong class="text-slate-900 text-sm">{{ $model }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Versión:</span>
                                    <strong class="text-slate-900 text-sm">{{ $version ?: 'Base' }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Año Modelo:</span>
                                    <strong class="text-slate-900 text-sm">{{ $year }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Motor:</span>
                                    <strong class="text-slate-900">{{ $engine ?: 'Estándar' }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Combustible:</span>
                                    <strong class="text-slate-900">{{ $fuel_type }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Transmisión:</span>
                                    <strong class="text-slate-900">{{ $transmission }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Tracción:</span>
                                    <strong class="text-slate-900">{{ $traction }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Airbags:</span>
                                    <strong class="text-slate-900">{{ $airbags ? $airbags . ' de serie' : 'No especificado' }}</strong>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <span class="text-slate-400 font-bold block">Tecnología Híbrida:</span>
                                    <strong class="{{ $is_hybrid ? 'text-emerald-600 font-black' : 'text-slate-600' }}">
                                        {{ $is_hybrid ? 'Sí (Híbrido HEV)' : 'Convencional' }}
                                    </strong>
                                </div>
                            </div>

                            @if(!empty($featuresList))
                                <div>
                                    <span class="text-xs font-bold text-slate-700 block mb-2">Equipamiento & Destacados:</span>
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach($featuresList as $feat)
                                            <span class="px-2.5 py-1 rounded-lg bg-slate-100 border border-slate-200 text-slate-800 text-xs font-semibold">
                                                <i class="fas fa-check text-emerald-500 mr-1 text-[10px]"></i> {{ $feat }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="flex justify-end pt-3 border-t border-slate-100">
                                <button type="button" wire:click="closeModal" 
                                        class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition">
                                    Cerrar Ficha
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- MODO FORMULARIO COMPLETO: PESTAÑAS LIMPIAS Y SIMPLES -->
                <div class="bg-slate-100/80 px-6 pt-3 border-b border-slate-200 flex gap-2 overflow-x-auto no-scrollbar">
                    <button type="button" @click="tab = 'general'" 
                            :class="tab === 'general' ? 'bg-white text-slate-900 border-b-2 {{ $isZeroKm ? 'border-red-600 text-red-600' : 'border-[#416A8D] text-[#416A8D]' }} shadow-xs' : 'text-slate-500 hover:text-slate-800'"
                            class="px-4 py-2.5 rounded-t-xl text-xs font-bold transition flex items-center gap-1.5 flex-shrink-0">
                        <i class="fas fa-car"></i> {{ $isZeroKm ? '1. Datos del Modelo, Hero & Portada' : '1. Datos & Precios' }}
                    </button>
                    @if($isZeroKm)
                        <button type="button" @click="tab = 'html_builder'" 
                                :class="tab === 'html_builder' ? 'bg-white text-slate-900 border-b-2 border-red-600 text-red-600 shadow-xs' : 'text-slate-500 hover:text-slate-800'"
                                class="px-4 py-2.5 rounded-t-xl text-xs font-bold transition flex items-center gap-1.5 flex-shrink-0">
                            <i class="fas fa-code"></i> 2. Editor HTML Libre & Biblioteca de Fotos ({{ count($htmlMedia) }})
                        </button>
                    @else
                        <button type="button" @click="tab = 'multimedia'" 
                                :class="tab === 'multimedia' ? 'bg-white text-slate-900 border-b-2 border-[#416A8D] text-[#416A8D] shadow-xs' : 'text-slate-500 hover:text-slate-800'"
                                class="px-4 py-2.5 rounded-t-xl text-xs font-bold transition flex items-center gap-1.5 flex-shrink-0">
                            <i class="fas fa-images"></i> 2. Fotos & Multimedia
                        </button>
                    @endif
                </div>

                <form wire:submit="save" novalidate class="p-6 space-y-6">

                    @if ($errors->any())
                        <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1.5 shadow-xs">
                            <div class="font-bold flex items-center gap-1.5 text-rose-700">
                                <i class="fas fa-exclamation-triangle"></i> Por favor revisá los siguientes campos para poder guardar:
                            </div>
                            <ul class="list-disc list-inside space-y-0.5 pl-1 text-[11px]">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- ================= PESTAÑA 1 ================= -->
                    <div x-show="tab === 'general'" class="space-y-6">
                        @if($isZeroKm)
                            <!-- MODO 0 KM SIMPLIFICADO: SOLO DATOS BÁSICOS, BROCHURE PDF, HERO Y PORTADA -->
                            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                    <i class="fas fa-car text-red-600"></i> Datos Básicos del Modelo 0 Km
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Nombre del Modelo *</label>
                                        <input type="text" wire:model="model" placeholder="Ej: Corolla, Hilux, Raize, RAV4" required
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-red-500">
                                        @error('model') <span class="text-rose-500 text-[10px]">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Marca *</label>
                                        <select wire:model="brand_id" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-red-500">
                                            @foreach($brands as $b)
                                                <option value="{{ $b->id }}">{{ $b->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Categoría (Filtro en Home)</label>
                                        <select wire:model="vehicle_category_id" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-red-500">
                                            @foreach($categories as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Estado en la Web *</label>
                                        <select wire:model="status" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 font-bold focus:ring-2 focus:ring-red-500">
                                            <option value="disponible">🟢 Publicado / Visible</option>
                                            <option value="oculto">⚪ Oculto (Borrador)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center gap-6 pt-2 border-t border-slate-200/70">
                                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-700 cursor-pointer">
                                        <input type="checkbox" wire:model="is_featured" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                                        <span>Mostrar en el Catálogo de la Home</span>
                                    </label>
                                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-700 cursor-pointer">
                                        <input type="checkbox" wire:model="is_hybrid" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                        <span>Etiqueta Híbrido (HEV)</span>
                                    </label>
                                </div>
                            </div>

                            <!-- 2. Imágenes del Hero Panorámico (Cabecera del 0 Km) -->
                            <div class="bg-red-50/40 p-5 rounded-2xl border border-red-200/80 space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                                    <div>
                                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-800 flex items-center gap-1.5">
                                            <i class="fas fa-panorama text-red-600"></i> Imagen(es) del Hero (Banner Superior 1920 × 545 px)
                                        </h3>
                                        <p class="text-xs text-slate-500 mt-0.5">
                                            Subí el banner panorámico principal que aparece arriba del menú del modelo.
                                        </p>
                                    </div>
                                    <button type="button" @click="tab = 'html_builder'"
                                            class="px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl transition flex items-center gap-1.5 self-start">
                                        <i class="fas fa-code text-red-400"></i> Ir al Editor HTML Libre &rarr;
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Subir Imagen(es) del Hero desde tu PC</label>
                                        <input type="file" wire:model="uploadedHeroBanners" multiple accept="image/*"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2 bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-red-600 file:text-white">
                                        <div wire:loading wire:target="uploadedHeroBanners" class="text-xs text-red-600 font-bold mt-1">
                                            <i class="fas fa-spinner fa-spin mr-1"></i> Subiendo imagen del Hero...
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">O Pegar Ruta / URL de Imagen para el Hero</label>
                                        <div class="flex gap-2">
                                            <input type="text" wire:model="newHeroBannerUrl" placeholder="/images/vehicles/... o https://..."
                                                   class="flex-1 text-xs rounded-xl border border-slate-200 py-2 bg-white focus:ring-2 focus:ring-red-500">
                                            <button type="button" wire:click="addHeroBannerUrl" class="px-3.5 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold">
                                                + Añadir Hero
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($heroBanners))
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 pt-2">
                                        @foreach($heroBanners as $hbIdx => $hbPath)
                                            <div class="relative group rounded-2xl overflow-hidden aspect-[16/7] bg-slate-900 border-2 border-red-500/40 shadow-sm">
                                                <img src="{{ \App\Models\Vehicle::mediaUrl($hbPath) }}" class="w-full h-full object-cover">
                                                <span class="absolute top-2 left-2 bg-red-600 text-white text-[10px] font-black uppercase px-2 py-0.5 rounded-md shadow">
                                                    Hero #{{ $hbIdx + 1 }}
                                                </span>
                                                <button type="button" wire:click="removeHeroBanner({{ $hbIdx }})"
                                                        class="absolute top-2 right-2 w-7 h-7 rounded-lg bg-rose-600 hover:bg-rose-700 text-white text-xs flex items-center justify-center shadow opacity-90 group-hover:opacity-100 transition"
                                                        title="Quitar imagen del Hero">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- 3. Foto de Portada del Catálogo & Brochure PDF -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Foto de Portada en Home / Menú -->
                                <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                    <div>
                                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                            <i class="fas fa-image text-indigo-600"></i> Foto Miniatura del Modelo (Home & Menú)
                                        </h3>
                                        <p class="text-xs text-slate-500 mt-0.5">Imagen del vehículo con fondo limpio que se muestra en la grilla de la Home.</p>
                                    </div>

                                    <div class="space-y-3">
                                        <input type="file" wire:model="uploadedImages" multiple accept="image/*"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2 bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-slate-900 file:text-white">
                                        <div class="flex gap-2">
                                            <input type="text" wire:model="newImageUrl" placeholder="/images/vehicles/... o https://..."
                                                   class="flex-1 text-xs rounded-xl border border-slate-200 py-2 bg-white focus:ring-2 focus:ring-red-500">
                                            <button type="button" wire:click="addImageUrl" class="px-3 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold">
                                                + URL
                                            </button>
                                        </div>
                                    </div>

                                    @if(!empty($existingImages))
                                        <div class="grid grid-cols-3 sm:grid-cols-4 gap-2.5 pt-1">
                                            @foreach($existingImages as $i => $img)
                                                <div class="relative group rounded-xl overflow-hidden aspect-video bg-white border-2 {{ !empty($img['is_main']) ? 'border-emerald-500' : 'border-slate-200' }}">
                                                    <img src="{{ \App\Models\Vehicle::mediaUrl($img['image_path']) }}" class="w-full h-full object-contain p-1">
                                                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-1">
                                                        @if(empty($img['is_main']))
                                                            <button type="button" wire:click="setMainImage({{ $i }})" title="Usar como portada"
                                                                    class="p-1.5 rounded-lg bg-emerald-600 text-white text-[10px]">
                                                                <i class="fas fa-star"></i>
                                                            </button>
                                                        @endif
                                                        <button type="button" wire:click="removeImage({{ $i }})" title="Quitar"
                                                                class="p-1.5 rounded-lg bg-rose-600 text-white text-[10px]">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    @if(!empty($img['is_main']))
                                                        <span class="absolute top-1 left-1 bg-emerald-600 text-white text-[9px] font-bold uppercase px-1.5 py-0.2 rounded">
                                                            Portada
                                                        </span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <!-- Brochure PDF del Menú -->
                                <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                    <div>
                                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                            <i class="fas fa-file-pdf text-red-600"></i> Brochure PDF (Botón del Menú del Modelo)
                                        </h3>
                                        <p class="text-xs text-slate-500 mt-0.5">Archivo PDF o enlace para el botón rojo "Descargar Brochure".</p>
                                    </div>

                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 mb-1">Subir PDF desde tu PC</label>
                                            <input type="file" wire:model="brochureFile" accept=".pdf,application/pdf"
                                                   class="w-full text-xs rounded-xl border border-slate-200 py-2 bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-red-600 file:text-white">
                                            <div wire:loading wire:target="brochureFile" class="text-xs text-amber-600 font-semibold mt-1.5 flex items-center gap-1.5">
                                                <i class="fas fa-spinner fa-spin"></i> Subiendo archivo PDF...
                                            </div>
                                            @error('brochureFile')
                                                <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 mb-1">O Enlace URL del Brochure PDF</label>
                                            <input type="text" wire:model.live.debounce.300ms="brochure_url" placeholder="https://consur.com.py/catalogos/... o ruta del PDF"
                                                   class="w-full text-xs rounded-xl border border-slate-200 py-2 bg-white focus:ring-2 focus:ring-red-500">
                                            @error('brochure_url')
                                                <p class="text-xs text-rose-600 font-bold mt-1.5 flex items-center gap-1">
                                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>

                                    @if($brochure_url)
                                        <div class="flex items-center justify-between p-3.5 rounded-xl bg-white border border-emerald-300 text-xs shadow-xs">
                                            <div class="flex items-center gap-2.5 truncate">
                                                <div class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0">
                                                    <i class="fas fa-file-pdf text-base"></i>
                                                </div>
                                                <div class="truncate">
                                                    <span class="font-bold text-slate-800 truncate block">{{ $brochure_url }}</span>
                                                    <span class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1">
                                                        <i class="fas fa-check-circle"></i> Brochure vinculado correctamente
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 flex-shrink-0">
                                                <a href="{{ \App\Models\Vehicle::mediaUrl($brochure_url) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition">Ver PDF</a>
                                                <button type="button" wire:click="removeBrochure" class="text-rose-600 hover:text-rose-800 font-bold text-xs ml-1">Quitar</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <!-- MODO USADOS: DATOS COMPLETOS, PRECIOS Y MECÁNICA -->
                            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                    <i class="fas fa-car text-[#416A8D]"></i> Identificación del Vehículo
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Marca *</label>
                                        <select wire:model="brand_id" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                            @foreach($brands as $b)
                                                <option value="{{ $b->id }}">{{ $b->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Carrocería / Categoría</label>
                                        <select wire:model="vehicle_category_id" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                            @foreach($categories as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Sucursal de Exhibición</label>
                                        <select wire:model="branch_id" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                            @foreach($branches as $br)
                                                <option value="{{ $br->id }}">{{ $br->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Modelo *</label>
                                        <input type="text" wire:model="model" placeholder="Ej: Hilux, Corolla Cross, RAV4, Agya" required
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                        @error('model') <span class="text-rose-500 text-[10px]">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Versión Base / Acabado</label>
                                        <input type="text" wire:model="version" placeholder="Ej: Doble Cabina SRV, HEV SEG, Limited"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Año de Fabricación *</label>
                                        <input type="number" wire:model="year" min="1990" max="{{ date('Y') + 1 }}" required
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>
                                </div>
                            </div>

                            <!-- Precios y Cuotas (Solo Usados) -->
                            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                    <i class="fas fa-dollar-sign text-emerald-600"></i> Precios, Cuotas & Financiación
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Precio Contado USD ($)</label>
                                        <input type="number" wire:model.live.debounce.500ms="price_usd" step="1" placeholder="Ej: 34500"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>

                                    @if($isZeroKm)
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 mb-1">Cuota Mensual Desde (USD)</label>
                                            <input type="number" wire:model="monthly_fee_usd" step="1" placeholder="Ej: 465"
                                                   class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                        </div>
                                    @endif

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Nota de Precio / Financiación</label>
                                        <input type="text" wire:model="price_note" placeholder="Ej: Financiación propia CONSUR hasta 60 meses"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 pt-1">
                                    <input type="checkbox" wire:model="show_price" id="show_price" class="rounded border-slate-300 text-[#416A8D] focus:ring-[#416A8D]">
                                    <label for="show_price" class="text-xs font-semibold text-slate-700 cursor-pointer">
                                        Publicar precio en la web (si se desmarca, se mostrará "Consultar Precio")
                                    </label>
                                </div>
                            </div>

                            <!-- Mecánica Base (Solo Usados) -->
                            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                    <i class="fas fa-cogs text-sky-600"></i> Mecánica Básica
                                </h3>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Combustible *</label>
                                        <select wire:model="fuel_type" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                            <option value="Nafta">Nafta</option>
                                            <option value="Diésel">Diésel</option>
                                            <option value="Híbrido">Híbrido (HEV)</option>
                                            <option value="Flex">Flex</option>
                                            <option value="Eléctrico">Eléctrico</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Transmisión *</label>
                                        <select wire:model="transmission" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                            <option value="Automática">Automática</option>
                                            <option value="Manual">Manual</option>
                                            <option value="CVT">CVT</option>
                                            <option value="e-CVT">e-CVT (Híbrida)</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Tracción</label>
                                        <select wire:model="traction" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                            <option value="4x2">4x2</option>
                                            <option value="4x4">4x4 con reductora</option>
                                            <option value="AWD">AWD Integral</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Motor / Cilindrada</label>
                                        <input type="text" wire:model="engine" placeholder="Ej: 2.8L Turbo Diesel 201 CV, 1.8L Hybrid"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Puertas</label>
                                        <input type="number" wire:model="doors" min="2" max="6"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Kilometraje *</label>
                                        <input type="number" wire:model="mileage_km" min="0" required
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Color Exterior Primario</label>
                                        <input type="text" wire:model="color_exterior" placeholder="Ej: Blanco Perlado"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Estado de Inventario *</label>
                                        <select wire:model="status" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 font-bold focus:ring-2 focus:ring-[#416A8D]">
                                            <option value="disponible">🟢 Disponible</option>
                                            <option value="reservado">🟡 Reservado</option>
                                            <option value="vendido">🔴 Vendido</option>
                                            <option value="oculto">⚪ Oculto</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-4 pt-2">
                                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-700 cursor-pointer">
                                        <input type="checkbox" wire:model="is_hybrid" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                        <span>Tecnología Híbrida (HEV)</span>
                                    </label>
                                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-700 cursor-pointer">
                                        <input type="checkbox" wire:model="is_featured" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                                        <span>Destacar en Portada</span>
                                    </label>
                                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-700 cursor-pointer">
                                        <input type="checkbox" wire:model="is_certified" class="rounded border-slate-300 text-amber-600 focus:ring-amber-500">
                                        <span>Usado Certificado CONSUR</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Textos comerciales (Solo Usados) -->
                            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                    <i class="fas fa-heading text-purple-600"></i> Eslogan y Resumen Comercial
                                </h3>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Eslogan / Tagline Destacado</label>
                                    <input type="text" wire:model="tagline" placeholder="Ej: Impecable estado, único dueño"
                                           class="w-full text-xs rounded-xl border border-slate-200 py-2.5 focus:ring-2 focus:ring-[#416A8D]">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Descripción Comercial</label>
                                    <textarea wire:model="description" rows="3" placeholder="Detalles de la unidad usada..."
                                              class="w-full text-xs rounded-xl border border-slate-200 p-3 focus:ring-2 focus:ring-[#416A8D]"></textarea>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- ================= PESTAÑA 2 (0 KM): EDITOR HTML LIBRE & BIBLIOTECA DE FOTOS ================= -->
                    @if($isZeroKm)
                        <div x-show="tab === 'html_builder'" class="space-y-6"
                             x-data="{
                                previewMode: false,
                                copiedIdx: null,
                                insertAtCursor(snippet) {
                                    const el = this.$refs.htmlEditor;
                                    if (!el) return;
                                    const start = el.selectionStart ?? el.value.length;
                                    const end = el.selectionEnd ?? el.value.length;
                                    const before = el.value.substring(0, start);
                                    const after = el.value.substring(end);
                                    el.value = before + snippet + after;
                                    el.dispatchEvent(new Event('input'));
                                    $wire.set('custom_html', el.value);
                                    this.$nextTick(() => {
                                        el.focus();
                                        el.selectionStart = el.selectionEnd = start + snippet.length;
                                    });
                                },
                                copyUrl(url, idx) {
                                    navigator.clipboard.writeText(url);
                                    this.copiedIdx = idx;
                                    setTimeout(() => { if (this.copiedIdx === idx) this.copiedIdx = null; }, 2000);
                                }
                             }">

                            <!-- 1. Biblioteca de Fotos para usar en el Diseño HTML -->
                            <div class="bg-slate-50/90 p-5 rounded-2xl border border-slate-200 space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                                    <div>
                                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-800 flex items-center gap-1.5">
                                            <i class="fas fa-photo-film text-red-600"></i> Biblioteca de Fotos del Vehículo (Para Insertar en el HTML)
                                        </h3>
                                        <p class="text-xs text-slate-500 mt-0.5">
                                            Subí aquí todas las fotos de diseño exterior, interior, seguridad, motor y galería. Luego hacé clic en <strong>"Insertar &lt;img&gt;"</strong> o <strong>"Copiar URL"</strong>.
                                        </p>
                                    </div>
                                    <span class="text-xs font-bold text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-200 self-start">
                                        {{ count($htmlMedia) }} fotos disponibles
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Subir Fotos desde tu Computadora (Múltiple)</label>
                                        <input type="file" wire:model="uploadedHtmlMedia" multiple accept="image/*"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2 bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-red-600 file:text-white">
                                        <div wire:loading wire:target="uploadedHtmlMedia" class="text-xs text-red-600 font-bold mt-1">
                                            <i class="fas fa-spinner fa-spin mr-1"></i> Subiendo fotos a la biblioteca...
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">O Registrar Ruta / URL de Foto</label>
                                        <div class="flex gap-2">
                                            <input type="text" wire:model="newHtmlMediaUrl" placeholder="/images/vehicles/... o https://..."
                                                   class="flex-1 text-xs rounded-xl border border-slate-200 py-2 bg-white focus:ring-2 focus:ring-red-500">
                                            <button type="button" wire:click="addHtmlMediaUrl" class="px-3.5 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold">
                                                + Agregar Foto
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($htmlMedia))
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 gap-3 pt-2 max-h-72 overflow-y-auto p-1">
                                        @foreach($htmlMedia as $mIdx => $media)
                                            @php
                                                $resolvedUrl = \App\Models\Vehicle::mediaUrl($media['path']);
                                            @endphp
                                            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-2xs flex flex-col justify-between group">
                                                <div class="relative aspect-video bg-slate-100 overflow-hidden">
                                                    <img src="{{ $resolvedUrl }}" alt="{{ $media['name'] }}" class="w-full h-full object-cover">
                                                    <button type="button" wire:click="removeHtmlMedia({{ $mIdx }})"
                                                            class="absolute top-1.5 right-1.5 w-6 h-6 rounded-md bg-rose-600/90 hover:bg-rose-700 text-white text-[10px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition"
                                                            title="Quitar de la biblioteca">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="p-2 space-y-1.5">
                                                    <div class="text-[10px] font-bold text-slate-700 truncate" title="{{ $media['name'] }}">
                                                        {{ $media['name'] }}
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-1">
                                                        <button type="button"
                                                                @click="copyUrl('{{ $resolvedUrl }}', {{ $mIdx }})"
                                                                class="px-1.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-700 text-[10px] font-bold transition flex items-center justify-center gap-1">
                                                            <i class="fas" :class="copiedIdx === {{ $mIdx }} ? 'fa-check text-emerald-600' : 'fa-copy'"></i>
                                                            <span x-text="copiedIdx === {{ $mIdx }} ? 'Copiado' : 'URL'"></span>
                                                        </button>
                                                        <button type="button"
                                                                @click="insertAtCursor('\n<img src=&quot;{{ $resolvedUrl }}&quot; alt=&quot;{{ addslashes($media['name']) }}&quot; class=&quot;w-full rounded-2xl shadow-md&quot;>\n')"
                                                                class="px-1.5 py-1 rounded bg-red-600 hover:bg-red-700 text-white text-[10px] font-bold transition flex items-center justify-center gap-1"
                                                                title="Insertar etiqueta <img> en el editor HTML">
                                                            <i class="fas fa-plus"></i>
                                                            <span>&lt;img&gt;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="p-4 rounded-xl bg-white border border-dashed border-slate-200 text-center text-xs text-slate-400">
                                        Aún no subiste fotos a la biblioteca de este vehículo. Subí las imágenes arriba para obtener sus enlaces o insertarlas con un clic.
                                    </div>
                                @endif
                            </div>

                            <!-- 2. Editor de Código HTML Libre + Bloques Rápidos + Vista Previa -->
                            <div class="bg-slate-900 rounded-2xl border border-slate-800 overflow-hidden shadow-lg">
                                <!-- Barra de Herramientas del Editor -->
                                <div class="bg-slate-950 px-4 py-3 border-b border-slate-800 flex flex-wrap items-center justify-between gap-3">
                                    <div class="flex flex-wrap items-center gap-1.5">
                                        <span class="text-[11px] font-black uppercase tracking-wider text-slate-400 mr-2 flex items-center gap-1.5">
                                            <i class="fas fa-cubes text-red-500"></i> Insertar Bloque:
                                        </span>
                                        <button type="button"
                                                @click="insertAtCursor('\n<!-- Bloque 50/50 Imagen + Texto -->\n<section class=&quot;py-16 bg-white&quot;>\n  <div class=&quot;max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center&quot;>\n    <div>\n      <img src=&quot;URL_DE_LA_FOTO&quot; alt=&quot;Título&quot; class=&quot;w-full rounded-3xl shadow-lg object-cover&quot;>\n    </div>\n    <div class=&quot;space-y-4&quot;>\n      <span class=&quot;text-xs font-extrabold uppercase tracking-widest text-red-600&quot;>Destacado</span>\n      <h2 class=&quot;text-3xl font-black uppercase text-slate-900&quot;>Título de la Sección</h2>\n      <p class=&quot;text-slate-600 leading-relaxed&quot;>Descripción detallada de esta característica del vehículo.</p>\n    </div>\n  </div>\n</section>\n')"
                                                class="px-2.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 text-[11px] font-bold transition">
                                            + Foto + Texto (50/50)
                                        </button>
                                        <button type="button"
                                                @click="insertAtCursor('\n<!-- Franja Destacada 3 Columnas -->\n<section class=&quot;py-14 bg-gradient-to-r from-red-700 via-red-600 to-red-700 text-white&quot;>\n  <div class=&quot;max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 text-center&quot;>\n    <div class=&quot;space-y-3&quot;>\n      <img src=&quot;URL_FOTO_1&quot; class=&quot;w-36 h-36 mx-auto rounded-full object-cover border-4 border-white/20 shadow-lg&quot;>\n      <h3 class=&quot;font-bold text-base&quot;>Característica 1</h3>\n    </div>\n    <div class=&quot;space-y-3&quot;>\n      <img src=&quot;URL_FOTO_2&quot; class=&quot;w-36 h-36 mx-auto rounded-full object-cover border-4 border-white/20 shadow-lg&quot;>\n      <h3 class=&quot;font-bold text-base&quot;>Característica 2</h3>\n    </div>\n    <div class=&quot;space-y-3&quot;>\n      <img src=&quot;URL_FOTO_3&quot; class=&quot;w-36 h-36 mx-auto rounded-full object-cover border-4 border-white/20 shadow-lg&quot;>\n      <h3 class=&quot;font-bold text-base&quot;>Característica 3</h3>\n    </div>\n  </div>\n</section>\n')"
                                                class="px-2.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 text-[11px] font-bold transition">
                                            + Franja 3 Íconos
                                        </button>
                                        <button type="button"
                                                @click="insertAtCursor('\n<!-- Grilla 4 Tarjetas Tecnología/Seguridad -->\n<section class=&quot;py-16 bg-slate-50&quot;>\n  <div class=&quot;max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6&quot;>\n    <div class=&quot;bg-white p-6 rounded-2xl border border-slate-200 text-center space-y-3 shadow-xs&quot;>\n      <img src=&quot;URL_FOTO&quot; class=&quot;w-32 h-32 mx-auto object-contain&quot;>\n      <p class=&quot;text-sm text-slate-700&quot;>Descripción del equipamiento.</p>\n    </div>\n  </div>\n</section>\n')"
                                                class="px-2.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 text-[11px] font-bold transition">
                                            + Grilla Tarjetas
                                        </button>
                                        <button type="button"
                                                @click="insertAtCursor('\n<!-- Sección Video YouTube -->\n<section id=&quot;video&quot; class=&quot;py-16 bg-slate-950 text-white text-center&quot;>\n  <div class=&quot;max-w-5xl mx-auto px-4 space-y-6&quot;>\n    <h2 class=&quot;text-3xl font-black uppercase&quot;>Video Oficial</h2>\n    <div class=&quot;aspect-video rounded-3xl overflow-hidden shadow-2xl border border-slate-800&quot;>\n      <iframe src=&quot;https://www.youtube.com/embed/ID_DEL_VIDEO&quot; class=&quot;w-full h-full&quot; frameborder=&quot;0&quot; allowfullscreen></iframe>\n    </div>\n  </div>\n</section>\n')"
                                                class="px-2.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 text-[11px] font-bold transition">
                                            + Video YouTube
                                        </button>
                                    </div>

                                    <button type="button"
                                            @click="previewMode = !previewMode"
                                            class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5"
                                            :class="previewMode ? 'bg-emerald-600 text-white' : 'bg-red-600 hover:bg-red-700 text-white'">
                                        <i class="fas" :class="previewMode ? 'fa-code' : 'fa-eye'"></i>
                                        <span x-text="previewMode ? 'Volver al Código HTML' : 'Vista Previa en Vivo'"></span>
                                    </button>
                                </div>

                                <!-- Área de Código HTML -->
                                <div x-show="!previewMode" class="p-4 space-y-2">
                                    <textarea x-ref="htmlEditor"
                                              wire:model="custom_html"
                                              rows="22"
                                              placeholder="Pegá o diseñá aquí el código HTML completo de las secciones debajo del Hero (soporta <style>, Tailwind CSS, grillas, videos, galerías y fotos)..."
                                              class="w-full font-mono text-xs leading-relaxed bg-slate-950 text-emerald-300 border border-slate-800 rounded-xl p-4 focus:ring-2 focus:ring-red-500 focus:outline-none"></textarea>
                                    <div class="flex flex-wrap items-center justify-between text-[11px] text-slate-400 px-1">
                                        <span>Podés incluir etiquetas <code>&lt;section&gt;</code>, <code>&lt;style&gt;</code>, clases de Tailwind CSS y enlaces de ancla (ej: <code>#diseno</code>, <code>#video</code>, <code>#especificaciones</code>).</span>
                                        <span>Al terminar este HTML, la página mostrará directamente el Pie de Página (Footer) de CONSUR.</span>
                                    </div>
                                </div>

                                <!-- Área de Vista Previa en Vivo -->
                                <div x-show="previewMode" class="bg-white text-slate-900 min-h-[420px] max-h-[750px] overflow-y-auto border-t border-slate-200">
                                    <div class="bg-amber-50 border-b border-amber-200 px-4 py-2 text-xs text-amber-800 font-semibold flex items-center justify-between">
                                        <span><i class="fas fa-eye mr-1"></i> Vista previa en vivo del cuerpo HTML (debajo del Hero):</span>
                                        <button type="button" @click="previewMode = false" class="underline font-bold">Seguir editando código</button>
                                    </div>
                                    <div x-html="$wire.custom_html || '<div class=\'p-12 text-center text-slate-400 text-sm\'>Aún no hay código HTML cargado.</div>'"></div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- ================= PESTAÑA 2 (USADOS): FOTOS & MULTIMEDIA ================= -->
                        <div x-show="tab === 'multimedia'" class="space-y-6">
                            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                                <h3 class="text-xs font-black uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                                    <i class="fas fa-images text-indigo-600"></i> Galería General de Fotografías
                                </h3>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Subir Archivo desde tu Equipo</label>
                                        <input type="file" wire:model="uploadedImages" multiple accept="image/*"
                                               class="w-full text-xs rounded-xl border border-slate-200 py-2 bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#416A8D] file:text-white">
                                        <div wire:loading wire:target="uploadedImages" class="text-xs text-[#416A8D] font-bold mt-1">
                                            <i class="fas fa-spinner fa-spin mr-1"></i> Cargando imágenes...
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">O Ingresar URL Web de Imagen</label>
                                        <div class="flex gap-2">
                                            <input type="url" wire:model="newImageUrl" placeholder="https://..."
                                                   class="flex-1 text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                                            <button type="button" wire:click="addImageUrl" class="px-3 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold">
                                                + Añadir URL
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($existingImages))
                                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3 pt-2">
                                        @foreach($existingImages as $i => $img)
                                            <div class="relative group rounded-xl overflow-hidden aspect-video border-2 {{ !empty($img['is_main']) ? 'border-emerald-500 ring-2 ring-emerald-500/30' : 'border-slate-200' }}">
                                                <img src="{{ \App\Models\Vehicle::mediaUrl($img['image_path']) }}" 
                                                     class="w-full h-full object-cover">
                                                
                                                <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-1.5 p-1">
                                                    @if(empty($img['is_main']))
                                                        <button type="button" wire:click="setMainImage({{ $i }})" title="Hacer foto principal"
                                                                class="p-1.5 rounded-lg bg-emerald-600 text-white text-[10px]">
                                                            <i class="fas fa-star"></i>
                                                        </button>
                                                    @endif
                                                    <button type="button" wire:click="removeImage({{ $i }})" title="Eliminar foto"
                                                            class="p-1.5 rounded-lg bg-rose-600 text-white text-[10px]">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>

                                                @if(!empty($img['is_main']))
                                                    <span class="absolute top-1 left-1 bg-emerald-600 text-white text-[9px] font-black uppercase px-1.5 py-0.5 rounded shadow">
                                                        Portada
                                                    </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Botones de Acción Globales -->
                    <div class="flex items-center justify-between pt-4 border-t border-slate-200">
                        <button type="button" wire:click="closeModal" class="px-4 py-2.5 text-xs font-bold text-slate-600 hover:text-slate-900 transition">
                            Cancelar
                        </button>

                        <div class="flex items-center gap-3">
                            <button type="submit" 
                                    class="px-8 py-3 {{ $isZeroKm ? 'bg-red-600 hover:bg-red-700' : 'bg-[#416A8D] hover:bg-[#2c5373]' }} text-white font-bold text-xs rounded-xl shadow-sm transition flex items-center gap-2">
                                <i class="fas fa-save"></i>
                                <span>{{ $selectedId ? 'Guardar Cambios' : 'Registrar Vehículo' }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    @else
        <!-- ========================================================================= -->
        <!-- LISTADO Y FILTROS (SOLO SE MUESTRAN CUANDO NO SE ESTÁ EDITANDO) -->
        <!-- ========================================================================= -->

        <!-- Barra Única de Búsqueda y Filtros -->
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="relative w-full md:w-80">
                <input type="text" wire:model.live.debounce.300ms="search" 
                       placeholder="Buscar por modelo..."
                       class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#416A8D]">
                <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
            </div>

            <div class="flex flex-wrap items-center gap-2.5 w-full md:w-auto justify-end">
                <select wire:model.live="filterBrand" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    <option value="">Todas las Marcas</option>
                    @foreach($brands as $b)
                        <option value="{{ $b->id }}">{{ $b->name }}</option>
                    @endforeach
                </select>

                @if($isZeroKm && isset($allZeroKmModels))
                    <select wire:model.live="filterModel" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                        <option value="">Todos los Modelos ({{ $allZeroKmModels->count() }})</option>
                        @foreach($allZeroKmModels as $zmOpt)
                            <option value="{{ $zmOpt->id }}">{{ $zmOpt->model }}</option>
                        @endforeach
                    </select>
                @endif

                <select wire:model.live="filterCategory" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    <option value="">Todas las Categorías</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>

                <select wire:model.live="filterStatus" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    <option value="">Todos los Estados</option>
                    <option value="disponible">Disponible</option>
                    @if(!$isZeroKm)
                        <option value="reservado">Reservado</option>
                        <option value="vendido">Vendido</option>
                    @endif
                    <option value="oculto">Oculto</option>
                </select>

                @if($search || $filterBrand || $filterModel || $filterCategory || $filterStatus)
                    <button type="button"
                            wire:click="$set('search', ''); $set('filterBrand', ''); $set('filterModel', ''); $set('filterCategory', ''); $set('filterStatus', '')"
                            class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold transition flex items-center gap-1"
                            title="Limpiar filtros">
                        <i class="fas fa-times text-[10px]"></i> Limpiar
                    </button>
                @endif
            </div>
        </div>

        <!-- Barra de Acciones en Lote cuando se seleccionan uno o todos los modelos -->
        @if(!empty($selectedModels))
            <div class="bg-slate-900 text-white rounded-2xl px-5 py-3 flex flex-wrap items-center justify-between gap-3 shadow-md">
                <div class="flex items-center gap-2 text-xs font-bold">
                    <span class="px-2.5 py-1 rounded-lg bg-red-600 text-white font-black">{{ count($selectedModels) }}</span>
                    <span>modelo(s) seleccionado(s)</span>
                    <button type="button" wire:click="$set('selectAllModels', true)" class="underline text-slate-300 hover:text-white ml-2">
                        Seleccionar todos
                    </button>
                    <span class="text-slate-600">&bull;</span>
                    <button type="button" wire:click="$set('selectedModels', []); $set('selectAllModels', false)" class="underline text-slate-400 hover:text-white">
                        Limpiar selección
                    </button>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    @if(count($selectedModels) === 1)
                        <button type="button" wire:click="edit({{ (int)$selectedModels[0] }})"
                                class="px-3.5 py-1.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition flex items-center gap-1.5">
                            <i class="fas fa-edit"></i> Abrir en Editor
                        </button>
                    @endif
                    <button type="button" wire:click="bulkUpdateStatus('disponible')"
                            class="px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                        Marcar Disponible
                    </button>
                    <button type="button" wire:click="bulkUpdateStatus('oculto')"
                            class="px-3 py-1.5 rounded-xl bg-slate-700 hover:bg-slate-600 text-white text-xs font-bold transition">
                        Marcar Oculto
                    </button>
                    @if(!$isZeroKm || auth()->user()->canManageContent())
                        <button type="button"
                                wire:click="bulkDeleteSelected"
                                wire:confirm="¿Seguro que deseas eliminar los {{ count($selectedModels) }} modelo(s) seleccionado(s)?"
                                class="px-3.5 py-1.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold transition flex items-center gap-1.5 shadow-xs">
                            <i class="fas fa-trash-alt"></i>
                            <span>Eliminar Seleccionados ({{ count($selectedModels) }})</span>
                        </button>
                    @endif
                </div>
            </div>
        @endif

        <!-- Tabla de Vehículos -->
        <div class="overflow-x-auto bg-white rounded-2xl border border-slate-200/80 shadow-xs">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-400 font-semibold uppercase border-b border-slate-100">
                    <tr>
                        <th class="px-4 py-3.5 w-10">
                            <input type="checkbox" wire:model.live="selectAllModels"
                                   title="Seleccionar todos los modelos"
                                   class="rounded border-slate-300 text-red-600 focus:ring-red-500 cursor-pointer">
                        </th>
                        <th class="px-4 py-3.5">Foto</th>
                        <th class="px-4 py-3.5">Modelo</th>
                        @if($isZeroKm)
                            <th class="px-4 py-3.5">Categoría</th>
                            <th class="px-4 py-3.5">Página Pública</th>
                        @else
                            <th class="px-4 py-3.5">Año & Motor</th>
                            <th class="px-4 py-3.5">Kilometraje</th>
                            <th class="px-4 py-3.5">Precio USD / Cuota</th>
                        @endif
                        <th class="px-4 py-3.5">Estado</th>
                        <th class="px-4 py-3.5 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($vehicles as $veh)
                        <tr class="hover:bg-slate-50/80 transition {{ $selectedId === $veh->id || in_array((string)$veh->id, $selectedModels) ? 'bg-[#416A8D]/5 border-l-4 border-l-red-600' : '' }}">
                            <!-- Checkbox Selección -->
                            <td class="px-4 py-3.5">
                                <input type="checkbox" wire:model.live="selectedModels" value="{{ $veh->id }}"
                                       class="rounded border-slate-300 text-red-600 focus:ring-red-500 cursor-pointer">
                            </td>
                            <!-- Foto -->
                            <td class="px-4 py-3.5">
                                <div class="w-16 h-11 rounded-xl bg-slate-50 overflow-hidden border border-slate-200 flex-shrink-0 flex items-center justify-center p-1">
                                    <img src="{{ $veh->primary_image_url }}" alt="{{ $veh->model }}" class="w-full h-full object-contain">
                                </div>
                            </td>

                            <!-- Modelo -->
                            <td class="px-4 py-3.5">
                                <div class="font-bold text-slate-900 text-sm leading-tight flex items-center gap-1.5">
                                    {{ $veh->brand ? $veh->brand->name : 'Toyota' }} {{ $veh->model }}
                                    @if($veh->is_hybrid)
                                        <span class="inline-flex items-center px-1.5 py-0.2 rounded text-[9px] font-bold uppercase bg-blue-50 text-[#005cb9] border border-blue-200">
                                            HEV Híbrido
                                        </span>
                                    @endif
                                </div>
                            </td>

                            @if($isZeroKm)
                                <!-- Categoría -->
                                <td class="px-4 py-3.5">
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold">
                                        {{ $veh->category->name ?? 'General' }}
                                    </span>
                                </td>

                                <!-- Página Pública -->
                                <td class="px-4 py-3.5">
                                    <a href="{{ route('vehiculo.detalle', $veh->slug) }}" target="_blank"
                                       class="inline-flex items-center gap-1.5 text-slate-600 hover:text-red-600 font-medium text-xs transition">
                                        <span>/vehiculos/{{ $veh->slug }}</span>
                                        <i class="fas fa-external-link-alt text-[10px]"></i>
                                    </a>
                                </td>
                            @else
                                <!-- Año & Motor -->
                                <td class="px-4 py-3.5">
                                    <div class="font-bold text-slate-800">{{ $veh->year }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $veh->fuel_type }} &bull; {{ $veh->transmission }}</div>
                                </td>

                                <!-- Kilometraje -->
                                <td class="px-4 py-3.5">
                                    <span class="font-bold text-slate-800">{{ number_format($veh->mileage_km, 0, ',', '.') }} Km</span>
                                </td>

                                <!-- Precios y Cuotas -->
                                <td class="px-4 py-3.5">
                                    <div class="font-black text-slate-900 text-xs">
                                        {{ $veh->formatted_price_usd }}
                                    </div>
                                    @if($veh->monthly_fee_usd && $isZeroKm)
                                        <div class="text-[10px] font-bold text-emerald-600">
                                            Cuotas desde {{ $veh->formatted_monthly_fee }}
                                        </div>
                                    @endif
                                </td>
                            @endif

                            <!-- Estado -->
                            <td class="px-4 py-3.5">
                                @php
                                    $statusBadge = match($veh->status) {
                                        'disponible' => ['label' => 'Disponible', 'class' => 'bg-emerald-50 text-emerald-700 border-emerald-200'],
                                        'reservado' => ['label' => 'Reservado', 'class' => 'bg-amber-50 text-amber-700 border-amber-200'],
                                        'vendido' => ['label' => 'Vendido', 'class' => 'bg-rose-50 text-rose-700 border-rose-200'],
                                        default => ['label' => ucfirst($veh->status), 'class' => 'bg-slate-100 text-slate-600 border-slate-200'],
                                    };
                                @endphp

                                @if(!$isZeroKm || auth()->user()->canManageContent())
                                    <select wire:change="updateStatus({{ $veh->id }}, $event.target.value)"
                                            class="text-[10px] font-extrabold rounded-lg py-1 px-2 border {{ $statusBadge['class'] }} bg-transparent cursor-pointer focus:ring-0">
                                        <option value="disponible" @selected($veh->status === 'disponible')>Disponible</option>
                                        @if(!$isZeroKm)
                                            <option value="reservado" @selected($veh->status === 'reservado')>Reservado</option>
                                            <option value="vendido" @selected($veh->status === 'vendido')>Vendido</option>
                                        @endif
                                        <option value="oculto" @selected($veh->status === 'oculto')>Oculto</option>
                                    </select>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border {{ $statusBadge['class'] }}">
                                        {{ $statusBadge['label'] }}
                                    </span>
                                @endif
                            </td>

                            <!-- Acciones -->
                            <td class="px-4 py-3.5 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="{{ route('vehiculo.detalle', $veh->slug) }}" target="_blank"
                                       class="p-2 text-slate-500 hover:text-slate-900 hover:bg-slate-100 rounded-xl transition"
                                       title="Ver ficha en la web">
                                        <i class="fas fa-external-link-alt text-xs"></i>
                                    </a>

                                    @if($isZeroKm && !auth()->user()->canManageContent())
                                        <button wire:click="viewDetails({{ $veh->id }})" 
                                                class="px-3 py-1.5 bg-[#416A8D] hover:bg-[#2c5373] text-white rounded-xl font-bold text-[11px] transition shadow-xs flex items-center gap-1">
                                            <i class="fas fa-eye text-[10px]"></i> Ver Ficha
                                        </button>
                                    @else
                                        <button wire:click="edit({{ $veh->id }})" 
                                                class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold text-[11px] transition shadow-xs flex items-center gap-1">
                                            <i class="fas fa-edit text-[10px]"></i> Editar
                                        </button>

                                        <button wire:click="delete({{ $veh->id }})" 
                                                wire:confirm="¿Seguro que deseas eliminar este vehículo?"
                                                class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition"
                                                title="Eliminar vehículo">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-slate-400">
                                <i class="fas fa-car text-3xl text-slate-300 mb-2 block"></i>
                                <span class="text-sm font-semibold text-slate-600 block">No se encontraron vehículos</span>
                                <span class="text-xs text-slate-400">Intenta con otros términos de búsqueda o cambia los filtros.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if($vehicles->hasPages())
            <div class="p-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs">
                {{ $vehicles->links() }}
            </div>
        @endif
    @endif
</div>
