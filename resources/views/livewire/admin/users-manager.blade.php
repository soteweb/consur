<div class="space-y-6">
    <!-- Header Principal -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-semibold text-slate-800 tracking-tight">Gestión de Usuarios & Roles</h1>
            <p class="text-xs text-slate-500 font-normal mt-0.5">Administrá el equipo de CONSUR S.A. y definí los permisos para Administradores, Gestores y Vendedores.</p>
        </div>
        @if(!$isOpen)
            <button wire:click="create" class="px-5 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-semibold rounded-xl transition shadow-xs flex items-center gap-1.5">
                <i class="fas fa-user-plus"></i> Nuevo Usuario
            </button>
        @else
            <button wire:click="closeModal" class="px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-800 text-xs font-semibold rounded-xl transition shadow-xs flex items-center gap-1.5">
                <i class="fas fa-times"></i> Cancelar Edición
            </button>
        @endif
    </div>

    <!-- KPI Cards de Roles -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-2xs flex items-center justify-between">
            <div>
                <p class="text-[10px] font-medium uppercase tracking-wider text-slate-400">Total Usuarios</p>
                <p class="text-2xl font-semibold text-slate-800 mt-0.5 tabular-nums">{{ $counts['total'] }}</p>
            </div>
            <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center text-sm">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-purple-200/80 shadow-2xs flex items-center justify-between">
            <div>
                <p class="text-[10px] font-medium uppercase tracking-wider text-purple-600">Administradores</p>
                <p class="text-2xl font-semibold text-purple-900 mt-0.5 tabular-nums">{{ $counts['admin'] }}</p>
            </div>
            <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-sm">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-sky-200/80 shadow-2xs flex items-center justify-between">
            <div>
                <p class="text-[10px] font-medium uppercase tracking-wider text-sky-600">Gestores CMS</p>
                <p class="text-2xl font-semibold text-sky-900 mt-0.5 tabular-nums">{{ $counts['gestor'] }}</p>
            </div>
            <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm">
                <i class="fas fa-edit"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-4 border border-emerald-200/80 shadow-2xs flex items-center justify-between">
            <div>
                <p class="text-[10px] font-medium uppercase tracking-wider text-emerald-600">Vendedores</p>
                <p class="text-2xl font-semibold text-emerald-900 mt-0.5 tabular-nums">{{ $counts['vendedor'] }}</p>
            </div>
            <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm">
                <i class="fas fa-handshake"></i>
            </div>
        </div>
    </div>

    <!-- FORMULARIO INTEGRADO EN PÁGINA (SIN VENTANA MODAL) -->
    @if($isOpen)
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-sky-50 text-[#416A8D] flex items-center justify-center text-lg">
                        <i class="fas {{ $selectedId ? 'fa-user-edit' : 'fa-user-plus' }}"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-red-600">
                            {{ $selectedId ? 'Editando Usuario #' . $selectedId : 'Nuevo Miembro del Equipo' }}
                        </span>
                        <h2 class="text-xl font-black text-slate-900 font-heading">
                            {{ $selectedId ? ($name ?: 'Editar Usuario') : 'Registrar Nuevo Usuario' }}
                        </h2>
                    </div>
                </div>
                <button type="button" wire:click="closeModal" class="px-4 py-2 text-xs font-bold text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 rounded-xl transition flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Cerrar</span>
                </button>
            </div>

            <form wire:submit="save" class="space-y-6">
                <!-- Datos Personales -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nombre Completo *</label>
                        <input type="text" wire:model="name" placeholder="Ej: Rodrigo Alcaraz" required
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                        @error('name') <span class="text-[11px] text-red-600 font-bold">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Correo Electrónico *</label>
                        <input type="email" wire:model="email" placeholder="usuario@consur.com.py" required
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                        @error('email') <span class="text-[11px] text-red-600 font-bold">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Teléfono / WhatsApp</label>
                        <input type="text" wire:model="phone" placeholder="+595 985 000 000"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D]">
                        @error('phone') <span class="text-[11px] text-red-600 font-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Selector Visual de Roles -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-800">
                        Seleccionar Rol y Nivel de Acceso *
                    </label>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- 1. Administrador -->
                        <label class="cursor-pointer">
                            <input type="radio" wire:model.live="role" value="admin" class="sr-only">
                            <div class="p-4 rounded-2xl border-2 transition-all h-full flex flex-col justify-between {{ $role === 'admin' ? 'border-purple-600 bg-purple-50/50 shadow-xs' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-700 flex items-center justify-center text-sm font-bold">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                        @if($role === 'admin')
                                            <i class="fas fa-check-circle text-purple-600 text-base"></i>
                                        @endif
                                    </div>
                                    <h3 class="font-extrabold text-sm text-slate-900 font-heading">Administrador</h3>
                                    <p class="text-[11px] text-slate-500 mt-1 leading-snug">
                                        Control total: gestión de usuarios, auditoría, configuración global, contenidos y leads.
                                    </p>
                                </div>
                                <div class="mt-3 pt-2 border-t border-purple-100/60 text-[10px] font-bold text-purple-700">
                                    Acceso al 100% del sistema
                                </div>
                            </div>
                        </label>

                        <!-- 2. Gestor de Contenidos -->
                        <label class="cursor-pointer">
                            <input type="radio" wire:model.live="role" value="gestor" class="sr-only">
                            <div class="p-4 rounded-2xl border-2 transition-all h-full flex flex-col justify-between {{ $role === 'gestor' ? 'border-sky-600 bg-sky-50/50 shadow-xs' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="w-8 h-8 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center text-sm font-bold">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                        @if($role === 'gestor')
                                            <i class="fas fa-check-circle text-sky-600 text-base"></i>
                                        @endif
                                    </div>
                                    <h3 class="font-extrabold text-sm text-slate-900 font-heading">Gestor de Contenido</h3>
                                    <p class="text-[11px] text-slate-500 mt-1 leading-snug">
                                        Administra vehículos, banners de portada, páginas CMS, menús, footer y secciones.
                                    </p>
                                </div>
                                <div class="mt-3 pt-2 border-t border-sky-100/60 text-[10px] font-bold text-sky-700">
                                    Catálogo, Web & Marketing
                                </div>
                            </div>
                        </label>

                        <!-- 3. Vendedor Comercial -->
                        <label class="cursor-pointer">
                            <input type="radio" wire:model.live="role" value="vendedor" class="sr-only">
                            <div class="p-4 rounded-2xl border-2 transition-all h-full flex flex-col justify-between {{ $role === 'vendedor' ? 'border-emerald-600 bg-emerald-50/50 shadow-xs' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center text-sm font-bold">
                                            <i class="fas fa-handshake"></i>
                                        </div>
                                        @if($role === 'vendedor')
                                            <i class="fas fa-check-circle text-emerald-600 text-base"></i>
                                        @endif
                                    </div>
                                    <h3 class="font-extrabold text-sm text-slate-900 font-heading">Vendedor Comercial</h3>
                                    <p class="text-[11px] text-slate-500 mt-1 leading-snug">
                                        Atención de leads de 0km y usados, seguimiento de cotizaciones y consulta de stock.
                                    </p>
                                </div>
                                <div class="mt-3 pt-2 border-t border-emerald-100/60 text-[10px] font-bold text-emerald-700">
                                    CRM Comercial & Leads
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Credenciales de Contraseña -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-800 flex items-center gap-1.5">
                            <i class="fas fa-lock text-[#416A8D]"></i> Contraseña de Acceso
                        </span>
                        @if($selectedId)
                            <span class="text-[11px] text-slate-500 italic">Dejar en blanco si no deseas cambiar la contraseña actual</span>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">
                                {{ $selectedId ? 'Nueva Contraseña (Opcional)' : 'Contraseña *' }}
                            </label>
                            <input type="password" wire:model="password" placeholder="Mínimo 6 caracteres"
                                   class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D] bg-white">
                            @error('password') <span class="text-[11px] text-red-600 font-bold">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Confirmar Contraseña</label>
                            <input type="password" wire:model="password_confirmation" placeholder="Repetir contraseña"
                                   class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3 focus:ring-2 focus:ring-[#416A8D] bg-white">
                        </div>
                    </div>
                </div>

                <!-- Botones y Estado -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-4 border-t border-slate-100">
                    <label class="flex items-center text-xs font-bold text-slate-700 cursor-pointer">
                        <input type="checkbox" wire:model="is_active" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500">
                        <span class="ml-2">Usuario Activo con Permiso de Acceso</span>
                    </label>

                    <div class="flex items-center gap-3">
                        <button type="button" wire:click="closeModal" class="px-5 py-2.5 text-xs font-bold text-slate-600 hover:text-slate-900 rounded-xl transition border border-slate-200 bg-white">
                            Cancelar
                        </button>
                        <button type="submit" class="px-6 py-2.5 bg-[#416A8D] hover:bg-[#2c5373] text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-xs transition flex items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>{{ $selectedId ? 'Guardar Cambios' : 'Crear Usuario' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    <!-- Tabla y Filtros de Usuarios -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden space-y-4 p-5 sm:p-6">
        <!-- Barra de Búsqueda y Filtros -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-slate-100">
            <div class="relative flex-1 max-w-sm">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar por nombre, correo o teléfono..."
                       class="w-full text-xs rounded-xl border border-slate-200 pl-9 pr-3 py-2 focus:ring-2 focus:ring-[#416A8D]">
            </div>

            <div class="flex items-center gap-2">
                <select wire:model.live="filterRole" class="text-xs rounded-xl border border-slate-200 py-2 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    <option value="">Todos los Roles</option>
                    <option value="admin">Administradores</option>
                    <option value="gestor">Gestores de Contenido</option>
                    <option value="vendedor">Vendedores</option>
                </select>

                <select wire:model.live="filterStatus" class="text-xs rounded-xl border border-slate-200 py-2 px-3 focus:ring-2 focus:ring-[#416A8D]">
                    <option value="">Todos los Estados</option>
                    <option value="1">Activos</option>
                    <option value="0">Inactivos</option>
                </select>
            </div>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[11px] font-extrabold uppercase tracking-wider text-slate-400 border-b border-slate-100">
                        <th class="py-3 px-3">Usuario</th>
                        <th class="py-3 px-3">Contacto</th>
                        <th class="py-3 px-3">Rol / Permiso</th>
                        <th class="py-3 px-3">Estado</th>
                        <th class="py-3 px-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="py-3.5 px-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-xs uppercase shrink-0 {{ $user->role_badge_class }}">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-extrabold text-slate-900">{{ $user->name }}</p>
                                        <p class="text-[11px] text-slate-400">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="py-3.5 px-3 text-slate-500">
                                @if($user->phone)
                                    <span class="inline-flex items-center gap-1">
                                        <i class="fas fa-phone text-slate-400 text-[10px]"></i> {{ $user->phone }}
                                    </span>
                                @else
                                    <span class="text-slate-400 italic">Sin teléfono</span>
                                @endif
                            </td>

                            <td class="py-3.5 px-3">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-extrabold uppercase border {{ $user->role_badge_class }}">
                                    @if($user->isAdmin())
                                        <i class="fas fa-user-shield"></i>
                                    @elseif($user->isGestor())
                                        <i class="fas fa-edit"></i>
                                    @else
                                        <i class="fas fa-handshake"></i>
                                    @endif
                                    <span>{{ $user->role_label }}</span>
                                </span>
                            </td>

                            <td class="py-3.5 px-3">
                                <button type="button" wire:click="toggleActive({{ $user->id }})" 
                                        class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase transition {{ $user->is_active ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' : 'bg-slate-100 text-slate-400 hover:bg-slate-200' }}"
                                        title="Alternar estado">
                                    {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                                </button>
                            </td>

                            <td class="py-3.5 px-3 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <button type="button" wire:click="edit({{ $user->id }})" 
                                            class="p-2 text-[#416A8D] hover:bg-sky-50 rounded-lg transition" title="Editar Usuario">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @if(auth()->id() !== $user->id)
                                        <button type="button" wire:click="delete({{ $user->id }})" 
                                                wire:confirm="¿Seguro que deseas eliminar este usuario del sistema?"
                                                class="p-2 text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Eliminar Usuario">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400 italic">
                                No se encontraron usuarios con los criterios de búsqueda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pt-4 border-t border-slate-100">
            {{ $users->links() }}
        </div>
    </div>
</div>
