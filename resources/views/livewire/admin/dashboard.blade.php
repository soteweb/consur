<div class="space-y-6">
    <!-- 1. Header Welcome -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white rounded-2xl p-5 border border-slate-200/80 shadow-2xs">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ auth()->user()->role_badge_class }}">
                    {{ auth()->user()->role_label }}
                </span>
                <span class="text-xs text-slate-300">&bull;</span>
                <span class="text-xs text-slate-500 font-semibold tracking-wide">CONSUR S.A.</span>
            </div>
            <h1 class="text-lg sm:text-xl font-bold text-slate-900 tracking-tight">
                Hola, {{ preg_replace('/\s*\(.*?\)/', '', auth()->user()->name ?? 'Administrador') }}
            </h1>
            <p class="text-xs text-slate-500 mt-0.5 font-normal">
                Resumen en tiempo real de unidades en salón, cotizaciones comerciales y contenidos del portal.
            </p>
        </div>
    </div>

    <!-- 2. 4 KPI Cards Grid (Interactivas con Enlace Directo) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Stock 0KM -->
        <a href="{{ route('admin.vehicles.0km') }}"
           class="group bg-white rounded-2xl p-5 border border-slate-200/80 shadow-2xs hover:border-[#eb0a1e] hover:shadow-md transition-all flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 group-hover:text-slate-700 transition">Vehículos 0 Km</span>
                <div class="w-9 h-9 rounded-xl bg-red-50 text-[#eb0a1e] group-hover:bg-[#eb0a1e] group-hover:text-white transition flex items-center justify-center text-sm">
                    <i class="fas fa-car-side"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight tabular-nums">
                    {{ $newVehiclesCount }}
                </div>
                <div class="flex items-center justify-between mt-1.5 text-xs">
                    <span class="flex items-center gap-1.5 text-emerald-600 font-medium">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>Unidades activas</span>
                    </span>
                    <span class="text-[11px] font-semibold text-slate-400 group-hover:text-[#eb0a1e] transition">Gestionar &rarr;</span>
                </div>
            </div>
        </a>

        <!-- Stock Usados -->
        <a href="{{ route('admin.vehicles.usados') }}"
           class="group bg-white rounded-2xl p-5 border border-slate-200/80 shadow-2xs hover:border-[#eb0a1e] hover:shadow-md transition-all flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 group-hover:text-slate-700 transition">Stock Usados</span>
                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition flex items-center justify-center text-sm">
                    <i class="fas fa-sync-alt"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight tabular-nums">
                    {{ $usedVehiclesCount }}
                </div>
                <div class="flex items-center justify-between mt-1.5 text-xs">
                    <span class="flex items-center gap-1.5 text-slate-500 font-medium">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                        <span>Seleccionados</span>
                    </span>
                    <span class="text-[11px] font-semibold text-slate-400 group-hover:text-[#eb0a1e] transition">Gestionar &rarr;</span>
                </div>
            </div>
        </a>

        <!-- Valor Total Inventario -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-2xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Valor de Inventario</span>
                <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center text-sm">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight tabular-nums">
                    US$ {{ number_format($totalInventoryValueUsd, 0, ',', '.') }}
                </div>
                <div class="flex items-center gap-1.5 mt-1.5 text-xs text-slate-500 font-normal">
                    <span>Valuación total en dólares</span>
                </div>
            </div>
        </div>

        <!-- Leads Nuevos -->
        <a href="{{ route('admin.leads') }}"
           class="group bg-white rounded-2xl p-5 border border-slate-200/80 shadow-2xs hover:border-[#eb0a1e] hover:shadow-md transition-all flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 group-hover:text-slate-700 transition">Leads Pendientes</span>
                <div class="w-9 h-9 rounded-xl {{ $newLeadsCount > 0 ? 'bg-red-50 text-[#eb0a1e]' : 'bg-emerald-50 text-emerald-600' }} group-hover:bg-[#eb0a1e] group-hover:text-white transition flex items-center justify-center text-sm">
                    <i class="fas fa-inbox"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight tabular-nums">
                    {{ $newLeadsCount }}
                </div>
                <div class="flex items-center justify-between mt-1.5 text-xs">
                    <span class="flex items-center gap-1.5 {{ $leadsTodayCount > 0 ? 'text-[#eb0a1e] font-semibold' : 'text-slate-500 font-medium' }}">
                        <span class="inline-block w-1.5 h-1.5 rounded-full {{ $leadsTodayCount > 0 ? 'bg-[#eb0a1e] animate-pulse' : 'bg-slate-400' }}"></span>
                        <span>{{ $leadsTodayCount }} recibidos hoy</span>
                    </span>
                    <span class="text-[11px] font-semibold text-slate-400 group-hover:text-[#eb0a1e] transition">Atender &rarr;</span>
                </div>
            </div>
        </a>
    </div>

    <!-- 3. Accesos Rápidos de Gestión Web (Atajos de 1 clic sin saturar el sidebar) -->
    @if(auth()->user()->canManageContent())
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <a href="{{ route('admin.sliders') }}" class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-slate-200/80 hover:border-slate-900 transition group">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-slate-900 text-slate-700 group-hover:text-white flex items-center justify-center text-xs transition shrink-0">
                    <i class="fas fa-images"></i>
                </div>
                <div class="min-w-0">
                    <span class="block text-xs font-bold text-slate-800 truncate">Sliders Hero</span>
                    <span class="block text-[10px] text-slate-400 truncate">Banners portada</span>
                </div>
            </a>

            <a href="{{ route('admin.pages') }}" class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-slate-200/80 hover:border-slate-900 transition group">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-slate-900 text-slate-700 group-hover:text-white flex items-center justify-center text-xs transition shrink-0">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="min-w-0">
                    <span class="block text-xs font-bold text-slate-800 truncate">Páginas CMS</span>
                    <span class="block text-[10px] text-slate-400 truncate">Landings & info</span>
                </div>
            </a>

            <a href="{{ route('admin.posts') }}" class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-slate-200/80 hover:border-slate-900 transition group">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-slate-900 text-slate-700 group-hover:text-white flex items-center justify-center text-xs transition shrink-0">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="min-w-0">
                    <span class="block text-xs font-bold text-slate-800 truncate">Novedades</span>
                    <span class="block text-[10px] text-slate-400 truncate">Noticias & eventos</span>
                </div>
            </a>

            <a href="{{ route('admin.catalog') }}" class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-slate-200/80 hover:border-slate-900 transition group">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-slate-900 text-slate-700 group-hover:text-white flex items-center justify-center text-xs transition shrink-0">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <div class="min-w-0">
                    <span class="block text-xs font-bold text-slate-800 truncate">Catálogo PDF</span>
                    <span class="block text-[10px] text-slate-400 truncate">Revista mensual</span>
                </div>
            </a>

            <a href="{{ route('admin.branches') }}" class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-slate-200/80 hover:border-slate-900 transition group">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-slate-900 text-slate-700 group-hover:text-white flex items-center justify-center text-xs transition shrink-0">
                    <i class="fas fa-building"></i>
                </div>
                <div class="min-w-0">
                    <span class="block text-xs font-bold text-slate-800 truncate">Sucursales</span>
                    <span class="block text-[10px] text-slate-400 truncate">Sedes & horarios</span>
                </div>
            </a>

            <a href="{{ route('admin.footer') }}" class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-slate-200/80 hover:border-slate-900 transition group">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-slate-900 text-slate-700 group-hover:text-white flex items-center justify-center text-xs transition shrink-0">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <div class="min-w-0">
                    <span class="block text-xs font-bold text-slate-800 truncate">Redes & Footer</span>
                    <span class="block text-[10px] text-slate-400 truncate">Pie de página</span>
                </div>
            </a>
        </div>
    @endif

    <!-- 4. Main Content 2 Columns: Recent Leads & Recent Vehicles -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Columna Izquierda: Leads Recientes (7 cols) -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 shadow-2xs p-5 space-y-4">
            <div class="flex items-center justify-between pb-3.5 border-b border-slate-100">
                <h2 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <i class="fas fa-inbox text-[#eb0a1e]"></i> Solicitudes & Leads Recientes
                </h2>
                <a href="{{ route('admin.leads') }}" class="text-xs text-slate-600 hover:text-[#eb0a1e] font-semibold transition">Ver bandeja completa &rarr;</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-400 font-bold uppercase text-[10px] tracking-wider">
                        <tr>
                            <th class="px-3 py-2.5">Cliente</th>
                            <th class="px-3 py-2.5">Consulta / Vehículo</th>
                            <th class="px-3 py-2.5">Estado</th>
                            <th class="px-3 py-2.5 text-center">WhatsApp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentLeads as $lead)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="px-3 py-3">
                                    <div class="font-semibold text-slate-900 text-xs">{{ $lead->full_name }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $lead->phone }}</div>
                                </td>
                                <td class="px-3 py-3">
                                    <span class="text-slate-800 font-medium text-xs">{{ $lead->vehicle ? $lead->vehicle->full_name : ucfirst($lead->type) }}</span>
                                    <span class="block text-[10px] text-slate-400 font-normal">{{ $lead->created_at->diffForHumans() }}</span>
                                </td>
                                <td class="px-3 py-3">
                                    @php $badge = $lead->status_badge; @endphp
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold border {{ $badge['class'] }}">
                                        {{ $badge['label'] }}
                                    </span>
                                </td>
                                <td class="px-3 py-3 text-center">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}?text=Hola%20{{ urlencode($lead->full_name) }},%20te%20contacto%20de%20CONSUR%20S.A."
                                       target="_blank"
                                       class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition inline-flex items-center justify-center"
                                       title="Responder por WhatsApp">
                                        <i class="fab fa-whatsapp text-sm"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-8 text-slate-400">No hay consultas registradas aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Columna Derecha: Vehículos & Actividad (5 cols) -->
        <div class="lg:col-span-5 space-y-6">
            <!-- Vehículos Recientes -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs p-5 space-y-4">
                <div class="flex items-center justify-between pb-3.5 border-b border-slate-100">
                    <h2 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <i class="fas fa-car text-[#eb0a1e]"></i> Últimos Vehículos en Stock
                    </h2>
                    <a href="{{ route('admin.vehicles') }}" class="text-xs text-slate-600 hover:text-[#eb0a1e] font-semibold transition">Ver catálogo &rarr;</a>
                </div>

                <div class="space-y-2">
                    @foreach($recentVehicles as $v)
                        <div class="flex items-center justify-between text-xs p-2 rounded-xl hover:bg-slate-50 transition border border-transparent hover:border-slate-100">
                            <div class="flex items-center gap-3 min-w-0">
                                <img src="{{ $v->primary_image_url }}" alt="" class="w-12 h-9 rounded-lg object-cover bg-slate-100 shrink-0">
                                <div class="min-w-0">
                                    <span class="font-semibold text-slate-900 block text-xs truncate">{{ $v->full_name }}</span>
                                    <span class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">{{ strtoupper($v->condition) }} &bull; {{ $v->fuel_type }}</span>
                                </div>
                            </div>
                            <span class="font-bold text-slate-900 shrink-0 ml-2">{{ $v->formatted_price_usd }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Registro de Auditoría Rápido -->
            @if(auth()->user()->canManageSystem())
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs p-5 space-y-4">
                    <div class="flex items-center justify-between pb-3.5 border-b border-slate-100">
                        <h2 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                            <i class="fas fa-history text-slate-500"></i> Actividad Reciente
                        </h2>
                        <a href="{{ route('admin.audit') }}" class="text-xs text-slate-600 hover:text-[#eb0a1e] font-semibold transition">Ver historial &rarr;</a>
                    </div>

                    <div class="space-y-2.5">
                        @foreach($recentLogs as $log)
                            <div class="text-xs flex items-start gap-2.5 text-slate-600">
                                <span class="w-2 h-2 rounded-full bg-[#eb0a1e] mt-1.5 flex-shrink-0"></span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-slate-700 leading-snug font-normal truncate">{{ $log->description }}</p>
                                    <span class="text-[10px] text-slate-400 font-normal">{{ $log->created_at->diffForHumans() }} &bull; {{ $log->user->name ?? 'Sistema' }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
