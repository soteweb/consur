<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-rose-50 text-rose-700 border border-rose-200">
                    <i class="fas fa-funnel-dollar mr-1"></i> CRM Comercial
                </span>
                <span class="text-xs text-slate-400">&bull;</span>
                <span class="text-xs text-slate-500 font-medium">
                    Rol: <strong class="text-slate-700">{{ auth()->user()->role_badge['label'] }}</strong>
                </span>
            </div>
            <h1 class="text-xl font-semibold text-slate-800 tracking-tight mt-1">Gestión de Leads & Cotizaciones</h1>
            <p class="text-xs text-slate-500 font-normal mt-0.5">Pipeline de oportunidades comerciales para vehículos 0km, usados seleccionados y entregas.</p>
        </div>

        <div class="flex items-center gap-2">
            @if(auth()->user()->isVendedor())
                <button wire:click="setAssignment('mis_leads')"
                        class="px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-2 {{ $filterAssignment === 'mis_leads' ? 'bg-[#416A8D] text-white shadow-sm' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50' }}">
                    <i class="fas fa-user-check"></i>
                    <span>Mis Asignados ({{ $kpiMisLeads }})</span>
                </button>
            @endif
        </div>
    </div>

    <!-- KPI Metric Cards -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3.5">
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-medium text-slate-400 uppercase tracking-wider">Total Leads</span>
                <div class="w-7 h-7 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-xs">
                    <i class="fas fa-inbox"></i>
                </div>
            </div>
            <div class="text-2xl font-semibold text-slate-800 mt-1.5 tabular-nums">{{ $kpiTotal }}</div>
            <span class="text-[10px] text-slate-400 font-normal">Bandeja general</span>
        </div>

        <div wire:click="setCategory('0km')" class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs cursor-pointer hover:border-red-300 transition group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-medium text-red-600 uppercase tracking-wider group-hover:text-red-700">0 Km Nuevos</span>
                <div class="w-7 h-7 rounded-lg bg-red-50 text-red-600 flex items-center justify-center text-xs">
                    <i class="fas fa-car-side"></i>
                </div>
            </div>
            <div class="text-2xl font-semibold text-slate-800 mt-1.5 tabular-nums">{{ $kpi0km }}</div>
            <span class="text-[10px] text-red-600 font-medium">Gama 0km Toyota</span>
        </div>

        <div wire:click="setCategory('usados')" class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs cursor-pointer hover:border-amber-300 transition group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-medium text-amber-600 uppercase tracking-wider group-hover:text-amber-700">Usados & Entregas</span>
                <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-xs">
                    <i class="fas fa-sync-alt"></i>
                </div>
            </div>
            <div class="text-2xl font-semibold text-slate-800 mt-1.5 tabular-nums">{{ $kpiUsados }}</div>
            <span class="text-[10px] text-amber-600 font-semibold">Usados certificados / toma</span>
        </div>

        @if(auth()->user()->isVendedor())
            <div wire:click="setAssignment('mis_leads')" class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs cursor-pointer hover:border-[#416A8D] transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold text-[#416A8D] uppercase tracking-wider group-hover:text-[#2c5373]">Mis Clientes</span>
                    <div class="w-7 h-7 rounded-lg bg-[#416A8D]/10 text-[#416A8D] flex items-center justify-center text-xs">
                        <i class="fas fa-user-tag"></i>
                    </div>
                </div>
                <div class="text-2xl font-black text-[#416A8D] mt-2">{{ $kpiMisLeads }}</div>
                <span class="text-[10px] text-slate-400 font-medium">Bajo tu gestión</span>
            </div>
        @else
            <div wire:click="setAssignment('sin_asignar')" class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs cursor-pointer hover:border-amber-300 transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider group-hover:text-amber-700">Sin Asignar</span>
                    <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-xs">
                        <i class="fas fa-user-clock"></i>
                    </div>
                </div>
                <div class="text-2xl font-black text-slate-900 mt-2">{{ $kpiSinAsignar }}</div>
                <span class="text-[10px] text-slate-400 font-medium">Pendientes de asesor</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-emerald-600 uppercase tracking-wider">Ventas Concretadas</span>
                <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs">
                    <i class="fas fa-trophy"></i>
                </div>
            </div>
            <div class="text-2xl font-black text-emerald-600 mt-2">{{ $kpiGanados }}</div>
            <span class="text-[10px] text-slate-400 font-medium">Cierres exitosos</span>
        </div>
    </div>

    <!-- PANEL INLINE DE GESTIÓN COMERCIAL (SIN MODAL) -->
    @if($isOpen && $activeLead)
        <div class="bg-white rounded-3xl border-2 border-[#416A8D]/30 shadow-xl overflow-hidden transition-all duration-200">
            <!-- Top bar -->
            <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 p-5 text-white flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center text-white text-base">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase bg-red-600 text-white tracking-wider">
                                Lead #{{ $activeLead->id }}
                            </span>
                            @if($activeLead->vehicle)
                                <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase {{ $activeLead->vehicle->condition === '0km' ? 'bg-red-500/30 text-red-200 border border-red-400/40' : 'bg-amber-500/30 text-amber-200 border border-amber-400/40' }}">
                                    {{ $activeLead->vehicle->condition === '0km' ? 'Vehículo 0 Km' : 'Vehículo Usado' }}
                                </span>
                            @endif
                            <span class="text-xs text-slate-400">&bull; {{ $activeLead->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="text-xl font-black text-white font-heading mt-0.5">{{ $activeLead->full_name }}</h2>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $activeLead->phone) }}?text=Hola%20{{ urlencode($activeLead->full_name) }},%20te%20saluda%20{{ urlencode(auth()->user()->name) }}%20de%20Consur%20S.A.%20respecto%20a%20tu%20consulta%20por%20{{ urlencode($activeLead->vehicle ? $activeLead->vehicle->full_name : 'Toyota') }}." 
                       target="_blank" 
                       class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl flex items-center gap-2 shadow-sm transition">
                        <i class="fab fa-whatsapp text-sm"></i> Iniciar WhatsApp
                    </a>

                    @if(!$activeLead->assigned_to_user_id || $activeLead->assigned_to_user_id !== auth()->id())
                        <button wire:click="claimLead({{ $activeLead->id }})" 
                                class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-slate-900 font-extrabold text-xs rounded-xl flex items-center gap-1.5 shadow-sm transition">
                            <i class="fas fa-hand-holding-usd"></i> Tomar este Lead
                        </button>
                    @endif

                    <button wire:click="closeLeadPanel" 
                            class="px-3 py-2 bg-white/10 hover:bg-white/20 text-white font-bold text-xs rounded-xl transition flex items-center gap-1">
                        <i class="fas fa-times"></i> Cerrar Panel
                    </button>
                </div>
            </div>

            <!-- Body Details & Management Form -->
            <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Column 1: Lead & Vehicle Information -->
                <div class="lg:col-span-1 space-y-4">
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 space-y-3">
                        <div class="text-[11px] font-black uppercase tracking-wider text-slate-400">Datos del Interesado</div>
                        
                        <div class="space-y-2 text-xs">
                            <div class="flex items-center justify-between py-1 border-b border-slate-200/60">
                                <span class="text-slate-500 font-medium"><i class="fas fa-phone mr-1.5 text-slate-400"></i> Teléfono:</span>
                                <strong class="text-slate-900 font-bold select-all">{{ $activeLead->phone }}</strong>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-200/60">
                                <span class="text-slate-500 font-medium"><i class="fas fa-envelope mr-1.5 text-slate-400"></i> Email:</span>
                                <strong class="text-slate-900 font-semibold">{{ $activeLead->email ?: 'No informado' }}</strong>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-200/60">
                                <span class="text-slate-500 font-medium"><i class="fas fa-map-marker-alt mr-1.5 text-slate-400"></i> Ciudad:</span>
                                <strong class="text-slate-900">{{ $activeLead->city ?: 'No informada' }}</strong>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-slate-500 font-medium"><i class="fas fa-building mr-1.5 text-slate-400"></i> Sucursal:</span>
                                <strong class="text-slate-900">{{ $activeLead->branch->name ?? 'Encarnación (Casa Central)' }}</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle Card -->
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 space-y-3">
                        <div class="text-[11px] font-black uppercase tracking-wider text-slate-400">Vehículo de Interés</div>
                        
                        @if($activeLead->vehicle)
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-12 rounded-xl bg-slate-200 overflow-hidden flex-shrink-0">
                                    <img src="{{ $activeLead->vehicle->primary_image_url }}" alt="{{ $activeLead->vehicle->model }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-extrabold uppercase {{ $activeLead->vehicle->condition === '0km' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700' }}">
                                        {{ $activeLead->vehicle->condition === '0km' ? '0 Km Nuevo' : 'Usado Certificado' }}
                                    </span>
                                    <div class="font-black text-slate-900 text-sm leading-tight mt-0.5">
                                        {{ $activeLead->vehicle->full_name }}
                                    </div>
                                    <div class="text-[11px] font-bold text-red-600">
                                        {{ $activeLead->vehicle->formatted_price_usd }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-xs text-slate-600 bg-white p-3 rounded-xl border border-slate-200 font-medium">
                                <i class="fas fa-info-circle text-slate-400 mr-1"></i> Consulta General o Sin modelo predefinido.
                            </div>
                        @endif

                        @if($activeLead->trade_in_vehicle)
                            <div class="pt-2 border-t border-slate-200">
                                <span class="text-[11px] font-bold text-amber-700 block mb-1">
                                    <i class="fas fa-exchange-alt mr-1"></i> Vehículo Usado a Entregar:
                                </span>
                                <div class="p-2.5 rounded-xl bg-amber-50/70 border border-amber-200 text-xs font-semibold text-slate-800">
                                    {{ $activeLead->trade_in_vehicle }}
                                </div>
                            </div>
                        @endif

                        @if($activeLead->financing_plan)
                            <div class="pt-2 border-t border-slate-200">
                                <span class="text-[11px] font-bold text-[#416A8D] block mb-1">
                                    <i class="fas fa-calculator mr-1"></i> Plan Financiero Consultado:
                                </span>
                                <div class="p-2.5 rounded-xl bg-sky-50/70 border border-sky-200 text-xs font-semibold text-slate-800">
                                    {{ $activeLead->financing_plan }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Column 2 & 3: Management, Notes & Follow-up Form -->
                <div class="lg:col-span-2 space-y-4">
                    @if($activeLead->message)
                        <div class="bg-amber-50/50 rounded-2xl p-4 border border-amber-100">
                            <span class="text-[11px] font-black uppercase tracking-wider text-amber-800 block mb-1.5">
                                <i class="fas fa-comment-dots mr-1"></i> Mensaje Enviado por el Cliente
                            </span>
                            <p class="text-xs text-slate-700 bg-white p-3.5 rounded-xl border border-amber-200/60 leading-relaxed font-medium">
                                "{{ $activeLead->message }}"
                            </p>
                        </div>
                    @endif

                    <form wire:submit="updateLead" class="space-y-4 bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                            <h3 class="text-sm font-black text-slate-900 font-heading">
                                <i class="fas fa-edit mr-1 text-[#416A8D]"></i> Actualización de Seguimiento Comercial
                            </h3>
                            <span class="text-[11px] text-slate-500">
                                Último contacto: <strong>{{ $activeLead->last_contacted_at ? $activeLead->last_contacted_at->format('d/m/Y H:i') : 'Sin contactar aún' }}</strong>
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Estado de la Oportunidad</label>
                                <select wire:model="status" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 font-bold focus:ring-2 focus:ring-[#416A8D]">
                                    <option value="nuevo">🟢 Nuevo (Sin contactar)</option>
                                    <option value="en_gestion">🟡 En Gestión (En conversación)</option>
                                    <option value="contactado">🔵 Contactado (Propuesta enviada)</option>
                                    <option value="cerrado_ganado">🏆 Venta Concretada (Cierre exitoso)</option>
                                    <option value="cerrado_perdido">🔴 Descartado / No interesado</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Asesor Asignado</label>
                                <select wire:model="assigned_to_user_id" 
                                        @disabled(!auth()->user()->isAdmin())
                                        class="w-full text-xs rounded-xl border border-slate-200 py-2.5 font-medium focus:ring-2 focus:ring-[#416A8D] {{ !auth()->user()->isAdmin() ? 'bg-slate-100 cursor-not-allowed' : '' }}">
                                    <option value="">Sin Asignar</option>
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}">
                                            {{ $u->name }} ({{ $u->role }}) {{ $u->id === auth()->id() ? '★ (Tú)' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @if(!auth()->user()->isAdmin())
                                    <span class="text-[10px] text-slate-400 mt-0.5 block">Solo un administrador puede reasignar a otro asesor.</span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Bitácora de Notas Internas (Privadas)</label>
                            <textarea wire:model="internal_notes" rows="4" 
                                      placeholder="Anota aquí las llamadas realizadas, cotizaciones enviadas, precios negociados, tasación del usado, etc..."
                                      class="w-full text-xs rounded-xl border border-slate-200 p-3 focus:ring-2 focus:ring-[#416A8D] leading-relaxed"></textarea>
                            <span class="text-[10px] text-slate-400">Estas notas solo son visibles para el equipo de ventas y administración.</span>
                        </div>

                        <!-- Buttons bar -->
                        <div class="flex items-center justify-between pt-3 border-t border-slate-200">
                            <button type="button" wire:click="closeLeadPanel" class="px-4 py-2 text-xs font-bold text-slate-600 hover:text-slate-900 transition">
                                Cancelar
                            </button>

                            <div class="flex items-center gap-2">
                                <button type="submit" class="px-6 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white font-bold text-xs rounded-xl shadow-sm transition flex items-center gap-2">
                                    <i class="fas fa-save"></i> Guardar Seguimiento
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Category Tabs & Commercial Quick Filters -->
    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs space-y-4">
        <!-- Top Category Segmented Pills -->
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 pb-3">
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mr-1">Filtrar por:</span>
                
                <button wire:click="setCategory('todos')" 
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ $filterCategory === 'todos' ? 'bg-slate-900 text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    <i class="fas fa-border-all text-[10px]"></i> Todos ({{ $kpiTotal }})
                </button>

                <button wire:click="setCategory('0km')" 
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ $filterCategory === '0km' ? 'bg-red-600 text-white shadow-xs' : 'bg-red-50 text-red-700 hover:bg-red-100 border border-red-200/50' }}">
                    <i class="fas fa-car text-[10px]"></i> 0 Km ({{ $kpi0km }})
                </button>

                <button wire:click="setCategory('usados')" 
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ $filterCategory === 'usados' ? 'bg-amber-600 text-white shadow-xs' : 'bg-amber-50 text-amber-800 hover:bg-amber-100 border border-amber-200/50' }}">
                    <i class="fas fa-sync-alt text-[10px]"></i> Usados & Entregas ({{ $kpiUsados }})
                </button>

                <button wire:click="setCategory('taller')" 
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ $filterCategory === 'taller' ? 'bg-slate-700 text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    <i class="fas fa-tools text-[10px]"></i> Taller / Postventa
                </button>
            </div>

            <!-- Assignment Quick Filter -->
            <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl">
                <button wire:click="setAssignment('todos')" 
                        class="px-3 py-1 rounded-lg text-xs font-bold transition {{ $filterAssignment === 'todos' ? 'bg-white text-slate-900 shadow-xs' : 'text-slate-500 hover:text-slate-900' }}">
                    Todos
                </button>
                @if(auth()->user()->isVendedor())
                    <button wire:click="setAssignment('mis_leads')" 
                            class="px-3 py-1 rounded-lg text-xs font-bold transition {{ $filterAssignment === 'mis_leads' ? 'bg-white text-[#416A8D] shadow-xs' : 'text-slate-500 hover:text-slate-900' }}">
                        Mis Asignados
                    </button>
                @endif
                <button wire:click="setAssignment('sin_asignar')" 
                        class="px-3 py-1 rounded-lg text-xs font-bold transition {{ $filterAssignment === 'sin_asignar' ? 'bg-white text-amber-600 shadow-xs' : 'text-slate-500 hover:text-slate-900' }}">
                    Sin Asignar
                </button>
            </div>
        </div>

        <!-- Search and Secondary Dropdowns -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-3">
            <div class="relative w-full md:w-80">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar por cliente, teléfono, auto, usado..."
                       class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#416A8D]">
                <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
            </div>

            <div class="flex flex-wrap items-center gap-2.5 w-full md:w-auto justify-end">
                <select wire:model.live="filterStatus" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    <option value="">Todos los Estados</option>
                    <option value="nuevo">Nuevo</option>
                    <option value="en_gestion">En Gestión</option>
                    <option value="contactado">Contactado</option>
                    <option value="cerrado_ganado">Venta Concretada</option>
                    <option value="cerrado_perdido">Descartado</option>
                </select>

                <select wire:model.live="filterType" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    <option value="">Todos los Tipos</option>
                    <option value="cotizacion">Cotización</option>
                    <option value="test_drive">Test Drive</option>
                    <option value="usado_entrega">Entrega de Usado</option>
                    <option value="taller_turno">Taller / Service</option>
                </select>

                @if(auth()->user()->isAdmin())
                    <select wire:model.live="filterAssignedUser" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                        <option value="">Todos los Asesores</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
    </div>

    <!-- Leads Table -->
    <div class="overflow-x-auto bg-white rounded-2xl border border-slate-200/80 shadow-xs">
        <table class="w-full text-left text-xs text-slate-600">
            <thead class="bg-slate-50 text-slate-400 font-semibold uppercase border-b border-slate-100">
                <tr>
                    <th class="px-4 py-3.5">Cliente & Ubicación</th>
                    <th class="px-4 py-3.5">Vehículo / Interés</th>
                    <th class="px-4 py-3.5">Contacto</th>
                    <th class="px-4 py-3.5">Estado</th>
                    <th class="px-4 py-3.5">Asesor Asignado</th>
                    <th class="px-4 py-3.5 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($leads as $lead)
                    <tr class="hover:bg-slate-50/80 transition {{ $activeLead && $activeLead->id === $lead->id ? 'bg-[#416A8D]/5 border-l-4 border-l-[#416A8D]' : '' }}">
                        <!-- Cliente -->
                        <td class="px-4 py-3.5">
                            <div class="font-black text-slate-900 text-sm flex items-center gap-1.5">
                                {{ $lead->full_name }}
                                @if($lead->status === 'nuevo')
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse" title="Nuevo sin atender"></span>
                                @endif
                            </div>
                            <div class="text-[11px] text-slate-400">
                                {{ $lead->city ?: 'Sin ciudad' }} &bull; {{ $lead->created_at->diffForHumans() }}
                            </div>
                        </td>

                        <!-- Vehículo / Categoría -->
                        <td class="px-4 py-3.5">
                            <div class="flex items-center gap-1.5 flex-wrap">
                                @if($lead->vehicle)
                                    @if($lead->vehicle->condition === '0km')
                                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-black uppercase bg-red-50 text-red-700 border border-red-200">
                                            0 Km
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-black uppercase bg-amber-50 text-amber-700 border border-amber-200">
                                            Usado
                                        </span>
                                    @endif
                                @elseif($lead->trade_in_vehicle || $lead->type === 'usado_entrega')
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-black uppercase bg-amber-50 text-amber-700 border border-amber-200">
                                        Entrega Usado
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-black uppercase bg-slate-100 text-slate-600">
                                        {{ str_replace('_', ' ', $lead->type) }}
                                    </span>
                                @endif
                            </div>

                            <div class="font-bold text-slate-900 mt-1">
                                {{ $lead->vehicle ? $lead->vehicle->full_name : ($lead->trade_in_vehicle ? 'Toma de Usado' : 'Consulta General') }}
                            </div>

                            @if($lead->trade_in_vehicle)
                                <div class="text-[10px] text-amber-700 font-semibold mt-0.5">
                                    <i class="fas fa-exchange-alt mr-0.5"></i> Entrega: {{ Str::limit($lead->trade_in_vehicle, 28) }}
                                </div>
                            @endif
                        </td>

                        <!-- Contacto -->
                        <td class="px-4 py-3.5">
                            <div class="font-bold text-slate-800 flex items-center gap-1">
                                {{ $lead->phone }}
                            </div>
                            <div class="text-[11px] text-slate-400">{{ $lead->email ?: 'Sin email' }}</div>
                        </td>

                        <!-- Estado -->
                        <td class="px-4 py-3.5">
                            @php $badge = $lead->status_badge; @endphp
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold border {{ $badge['class'] }}">
                                {{ $badge['label'] }}
                            </span>
                            @if($lead->last_contacted_at)
                                <div class="text-[9px] text-slate-400 mt-0.5">
                                    Contactado {{ $lead->last_contacted_at->diffForHumans() }}
                                </div>
                            @endif
                        </td>

                        <!-- Asignado a -->
                        <td class="px-4 py-3.5">
                            @if($lead->assignedTo)
                                <div class="flex items-center gap-1.5">
                                    <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold text-slate-600">
                                        {{ substr($lead->assignedTo->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 text-xs">
                                            {{ $lead->assignedTo->name }}
                                            @if($lead->assigned_to_user_id === auth()->id())
                                                <span class="text-[9px] text-emerald-600 font-black">(Tú)</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[11px] text-amber-600 font-bold bg-amber-50 px-2 py-0.5 rounded-lg border border-amber-200">
                                        Sin Asignar
                                    </span>
                                    <button wire:click="claimLead({{ $lead->id }})" 
                                            class="px-2 py-1 bg-amber-500 hover:bg-amber-600 text-slate-900 rounded-lg text-[10px] font-black transition"
                                            title="Asignarme este lead">
                                        Tomar
                                    </button>
                                </div>
                            @endif
                        </td>

                        <!-- Acciones -->
                        <td class="px-4 py-3.5 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <!-- WhatsApp -->
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}?text=Hola%20{{ urlencode($lead->full_name) }},%20te%20escribimos%20de%20Consur%20S.A.%20por%20tu%20consulta" 
                                   target="_blank" 
                                   class="p-2 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition shadow-xs"
                                   title="Chatear por WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>

                                <!-- Gestionar Inline -->
                                <button wire:click="viewLead({{ $lead->id }})" 
                                        class="px-3 py-1.5 bg-[#416A8D] hover:bg-[#2c5373] text-white rounded-xl font-bold text-[11px] transition shadow-xs flex items-center gap-1">
                                    <i class="fas fa-tasks text-[10px]"></i> Gestionar
                                </button>

                                <!-- Eliminar (SOLO ADMIN) -->
                                @if(auth()->user()->isAdmin())
                                    <button wire:click="delete({{ $lead->id }})" wire:confirm="¿Deseas eliminar permanentemente este lead?" 
                                            class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition"
                                            title="Eliminar Lead">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <i class="fas fa-inbox text-3xl mb-2 text-slate-300 block"></i>
                            No hay leads registrados con los filtros seleccionados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $leads->links() }}</div>
</div>
