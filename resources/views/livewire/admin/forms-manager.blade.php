<div class="space-y-6">
    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-red-50 text-red-700 border border-red-200">
                    <i class="fas fa-wpforms mr-1"></i> Captación de Leads & Alertas
                </span>
            </div>
            <h1 class="text-xl font-semibold text-slate-800 tracking-tight mt-1">Gestor de Formularios y Notificaciones</h1>
            <p class="text-xs text-slate-500 mt-0.5">
                Configura títulos, mensajes de confirmación, correos de alerta comercial y plantillas de WhatsApp para cada formulario del sitio.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <button type="button" wire:click="save" wire:loading.attr="disabled"
                    class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-xs transition flex items-center gap-2 cursor-pointer">
                <span wire:loading.remove wire:target="save"><i class="fas fa-save mr-1"></i> Guardar Cambios</span>
                <span wire:loading wire:target="save"><i class="fas fa-circle-notch fa-spin mr-1"></i> Guardando...</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <!-- Selector Lateral de Formularios (4 cols) -->
        <div class="lg:col-span-4 bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-3">
            <div class="px-2 pb-2 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Formularios del Sitio</h3>
                <span class="text-[11px] font-semibold text-slate-400">{{ $forms->count() }} activos</span>
            </div>

            <div class="space-y-2">
                @foreach($forms as $form)
                    @php
                        $isSelected = $selectedFormKey === $form->form_key;
                        $formIcon = match($form->form_key) {
                            'home_cotizacion' => 'fas fa-home',
                            'vehicle_detail' => 'fas fa-car-side',
                            'test_drive' => 'fas fa-steering-wheel',
                            'usado_entrega' => 'fas fa-sync-alt',
                            default => 'fas fa-wpforms',
                        };
                    @endphp
                    <button type="button"
                            wire:click="selectForm('{{ $form->form_key }}')"
                            class="w-full text-left p-3.5 rounded-2xl border transition-all flex items-center justify-between gap-3 cursor-pointer {{ $isSelected ? 'bg-slate-900 border-slate-900 text-white shadow-sm' : 'bg-slate-50/70 border-slate-200/70 text-slate-700 hover:bg-white hover:border-slate-300' }}">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 {{ $isSelected ? 'bg-red-600 text-white' : 'bg-white text-slate-600 border border-slate-200' }}">
                                <i class="fas fa-file-signature text-xs"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="text-xs font-bold truncate {{ $isSelected ? 'text-white' : 'text-slate-800' }}">
                                    {{ $form->name }}
                                </div>
                                <div class="text-[10px] font-mono truncate {{ $isSelected ? 'text-slate-400' : 'text-slate-400' }}">
                                    {{ $form->form_key }}
                                </div>
                            </div>
                        </div>

                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold flex-shrink-0 {{ $form->is_active ? ($isSelected ? 'bg-emerald-500 text-white' : 'bg-emerald-50 text-emerald-700 border border-emerald-200') : 'bg-slate-200 text-slate-500' }}">
                            {{ $form->is_active ? 'Activo' : 'Inactivo' }}
                        </span>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Editor del Formulario Seleccionado (8 cols) -->
        <div class="lg:col-span-8 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <!-- Cabecera del Formulario Activo -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-5">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2.5 py-0.5 rounded-md font-bold border border-slate-200">
                            {{ $selectedFormKey }}
                        </span>
                        <span class="text-[11px] text-slate-400">ID #{{ $selectedId }}</span>
                    </div>
                    <h2 class="text-lg font-bold text-slate-900 mt-1">{{ $name }}</h2>
                </div>

                <!-- Switch Habilitado (con posición relative corregida) -->
                <label class="inline-flex items-center gap-3 cursor-pointer select-none bg-slate-50 px-3.5 py-2 rounded-xl border border-slate-200/80">
                    <span class="text-xs font-bold text-slate-700">Formulario Habilitado</span>
                    <input type="checkbox" wire:model="is_active" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 cursor-pointer">
                </label>
            </div>

            <!-- Campos de Configuración -->
            <form wire:submit="save" class="space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Nombre Interno del Formulario *
                        </label>
                        <input type="text" wire:model="name" required
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 text-slate-800 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        @error('name') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Texto del Botón de Envío *
                        </label>
                        <input type="text" wire:model="button_text" required
                               placeholder="Ej: Enviar Solicitud"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 font-semibold text-slate-800 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        @error('button_text') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Título Visible en la Web *
                        </label>
                        <input type="text" wire:model="title" required
                               placeholder="Ej: Cotizá tu Próximo Toyota"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 font-semibold text-slate-900 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        @error('title') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            Subtítulo / Instrucción Descriptiva
                        </label>
                        <textarea wire:model="subtitle" rows="2"
                                  placeholder="Texto breve debajo del título principal del formulario..."
                                  class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 text-slate-700 focus:ring-2 focus:ring-red-500 focus:border-red-500"></textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            <i class="fas fa-envelope text-red-600 mr-1"></i> Correos para Alertas de Leads (separados por coma)
                        </label>
                        <input type="text" wire:model="notification_emails"
                               placeholder="aclientes@consur.com.py, ventas@consur.com.py"
                               class="w-full text-xs font-mono rounded-xl border border-slate-200 py-2.5 px-3.5 text-slate-800 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        <p class="text-[11px] text-slate-400 mt-1">
                            Los correos indicados recibirán las notificaciones comerciales cada vez que un cliente complete este formulario.
                        </p>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">
                            <i class="fas fa-check-circle text-emerald-600 mr-1"></i> Mensaje de Confirmación / Éxito *
                        </label>
                        <textarea wire:model="success_message" rows="2" required
                                  class="w-full text-xs rounded-xl border border-emerald-200 bg-emerald-50/40 py-2.5 px-3.5 text-emerald-900 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                        @error('success_message') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        <p class="text-[11px] text-slate-400 mt-1">
                            Se muestra inmediatamente al usuario en pantalla tras enviar su consulta.
                        </p>
                    </div>

                    <div class="sm:col-span-2 p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2">
                        <label class="block text-xs font-bold text-slate-800">
                            <i class="fab fa-whatsapp text-emerald-600 mr-1"></i> Plantilla de Mensaje para Botón Directo de WhatsApp
                        </label>
                        <textarea wire:model="whatsapp_template" rows="2"
                                  class="w-full text-xs font-mono rounded-xl border border-slate-200 bg-white py-2.5 px-3.5 text-slate-800 focus:ring-2 focus:ring-emerald-500"></textarea>
                        <p class="text-[11px] text-slate-500">
                            Variables dinámicas disponibles en fichas de vehículos:
                            <code class="bg-white border border-slate-200 text-red-600 px-1.5 py-0.5 rounded font-bold">{vehicle_title}</code>
                            <code class="bg-white border border-slate-200 text-red-600 px-1.5 py-0.5 rounded font-bold">{price}</code>
                            <code class="bg-white border border-slate-200 text-red-600 px-1.5 py-0.5 rounded font-bold">{vehicle_id}</code>
                        </p>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
                    <button type="submit"
                            class="px-7 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-xs transition flex items-center gap-2 cursor-pointer">
                        <i class="fas fa-check"></i>
                        <span>Actualizar Formulario</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
