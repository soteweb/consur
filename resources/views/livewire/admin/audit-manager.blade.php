<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 font-heading">Registro de Auditoría (Audit Trail)</h1>
            <p class="text-xs text-slate-500">Trazabilidad completa de acciones, cambios de precios, altas, bajas y accesos en el sistema.</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="relative w-full sm:w-80">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar por usuario, acción, IP..."
                   class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#416A8D]">
            <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
        </div>

        <select wire:model.live="filterAction" class="text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
            <option value="">Todas las Acciones</option>
            <option value="login">Inicios de Sesión</option>
            <option value="created_vehicle">Alta de Vehículo</option>
            <option value="updated_vehicle">Edición de Vehículo</option>
            <option value="deleted_vehicle">Borrado de Vehículo</option>
            <option value="status_change">Cambio de Estado</option>
            <option value="crm_update">Gestión de Lead</option>
            <option value="update_settings">Configuración</option>
        </select>
    </div>

    <!-- Audit Logs Table -->
    <div class="overflow-x-auto bg-white rounded-2xl border border-slate-200/80 shadow-xs">
        <table class="w-full text-left text-xs text-slate-600">
            <thead class="bg-slate-50 text-slate-400 font-semibold uppercase border-b border-slate-100">
                <tr>
                    <th class="px-4 py-3.5">Fecha & Hora</th>
                    <th class="px-4 py-3.5">Usuario</th>
                    <th class="px-4 py-3.5">Acción</th>
                    <th class="px-4 py-3.5">Descripción del Evento</th>
                    <th class="px-4 py-3.5">IP</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($logs as $log)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-4 py-3.5 text-slate-900 font-medium whitespace-nowrap">
                            {{ $log->created_at->format('d/m/Y H:i:s') }}
                            <span class="block text-[10px] text-slate-400">{{ $log->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="px-4 py-3.5">
                            <div class="font-bold text-slate-900">{{ $log->user->name ?? 'Sistema / Externo' }}</div>
                            <div class="text-[10px] text-slate-400">{{ $log->user->email ?? '' }}</div>
                        </td>
                        <td class="px-4 py-3.5">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-slate-100 text-slate-700">
                                {{ $log->action }}
                            </span>
                        </td>
                        <td class="px-4 py-3.5 font-medium text-slate-800">
                            {{ $log->description }}
                        </td>
                        <td class="px-4 py-3.5 font-mono text-slate-500 text-[11px]">
                            {{ $log->ip_address ?: '127.0.0.1' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-slate-400">No hay registros de actividad coincidentes.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $logs->links() }}</div>
</div>
