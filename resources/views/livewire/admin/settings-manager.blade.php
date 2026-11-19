<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-2xl font-black text-slate-900 font-heading">Configuración General & Identidad</h1>
        <p class="text-xs text-slate-500">Personalizá logotipos, datos de contacto, cotización de moneda y enlaces corporativos.</p>
    </div>

    <form wire:submit="save" class="space-y-6">
        <!-- 0. Identidad de Marca & Logotipos -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-5">
            <h2 class="text-base font-bold text-slate-900 font-heading border-b border-slate-100 pb-3 flex items-center gap-2">
                <i class="fas fa-paint-brush text-red-600"></i> Identidad Visual & Logotipo
            </h2>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Tipo de Logotipo a mostrar en la Cabecera</label>
                <div class="grid grid-cols-2 gap-4 max-w-md">
                    <label class="flex items-center p-3 rounded-2xl border cursor-pointer transition {{ $site_logo_type === 'text' ? 'border-[#416A8D] bg-sky-50/50 text-[#416A8D] font-bold' : 'border-slate-200 text-slate-600' }}">
                        <input type="radio" wire:model.live="site_logo_type" value="text" class="text-[#416A8D] focus:ring-[#416A8D]">
                        <span class="ml-2.5 text-xs">Texto Estilizado + Badge</span>
                    </label>
                    <label class="flex items-center p-3 rounded-2xl border cursor-pointer transition {{ $site_logo_type === 'image' ? 'border-[#416A8D] bg-sky-50/50 text-[#416A8D] font-bold' : 'border-slate-200 text-slate-600' }}">
                        <input type="radio" wire:model.live="site_logo_type" value="image" class="text-[#416A8D] focus:ring-[#416A8D]">
                        <span class="ml-2.5 text-xs">Imagen de Logotipo</span>
                    </label>
                </div>
            </div>

            @if($site_logo_type === 'text')
                <!-- Opciones de Logo Texto -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Texto Principal</label>
                        <input type="text" wire:model.live="site_logo_text_prefix" placeholder="CONSUR" 
                               class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Sufijo / Punto</label>
                        <input type="text" wire:model.live="site_logo_text_suffix" placeholder="." 
                               class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Etiqueta Badge</label>
                        <input type="text" wire:model.live="site_logo_badge" placeholder="TOYOTA" 
                               class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    </div>

                    <!-- Live Preview del Logo Texto -->
                    <div class="sm:col-span-3 pt-2 flex items-center gap-3">
                        <span class="text-xs text-slate-400 font-semibold">Previsualización:</span>
                        <div class="p-3 bg-white border border-slate-200 rounded-xl inline-flex items-center gap-2">
                            <span class="text-2xl font-black tracking-tighter text-slate-900 font-heading">
                                {{ $site_logo_text_prefix }}<span class="text-red-600">{{ $site_logo_text_suffix }}</span>
                            </span>
                            @if($site_logo_badge)
                                <span class="text-[10px] uppercase font-bold tracking-widest bg-red-600 text-white px-2 py-0.5 rounded">
                                    {{ $site_logo_badge }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <!-- Opciones de Logo Imagen -->
                <div class="space-y-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">URL Logo Principal (Modo Claro)</label>
                        <input type="url" wire:model.live="site_logo_url" placeholder="https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png" 
                               class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">URL Logo Fondo Oscuro (Modo Oscuro / Footer)</label>
                        <input type="url" wire:model.live="site_logo_dark_url" placeholder="https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb-white.png" 
                               class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                    </div>

                    <!-- Live Preview del Logo Imagen -->
                    @if($site_logo_url || $site_logo_dark_url)
                        <div class="pt-2 flex flex-wrap items-center gap-4">
                            @if($site_logo_url)
                                <div>
                                    <span class="text-[11px] text-slate-400 font-semibold block mb-1">Fondo Claro:</span>
                                    <div class="p-3 bg-white border border-slate-200 rounded-xl inline-flex items-center">
                                        <img src="{{ $site_logo_url }}" class="h-8 w-auto object-contain">
                                    </div>
                                </div>
                            @endif
                            @if($site_logo_dark_url)
                                <div>
                                    <span class="text-[11px] text-slate-400 font-semibold block mb-1">Fondo Oscuro:</span>
                                    <div class="p-3 bg-slate-900 border border-slate-800 rounded-xl inline-flex items-center">
                                        <img src="{{ $site_logo_dark_url }}" class="h-8 w-auto object-contain">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @endif

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">URL de Favicon (Opcional)</label>
                <input type="url" wire:model="site_favicon_url" placeholder="https://dominio.com/favicon.ico" 
                       class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
            </div>
        </div>

        <!-- 1. Datos Generales de la Empresa -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-4">
            <h2 class="text-base font-bold text-slate-900 font-heading border-b border-slate-100 pb-3 flex items-center gap-2">
                <i class="fas fa-building text-[#416A8D]"></i> Datos de Empresa & Operaciones
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nombre Comercial de Empresa</label>
                    <input type="text" wire:model="company_name" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Horario General de Atención</label>
                    <input type="text" wire:model="schedule_info" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 mb-1">Enlace de Turnos Online (Turnos 365)</label>
                    <input type="url" wire:model="turnos_url" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
            </div>
        </div>

        <!-- 2. Canales de Contacto Directo -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-4">
            <h2 class="text-base font-bold text-slate-900 font-heading border-b border-slate-100 pb-3 flex items-center gap-2">
                <i class="fas fa-headset text-emerald-600"></i> Canales de Contacto Directo
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">WhatsApp Principal (sin +, solo números)</label>
                    <input type="text" wire:model="contact_whatsapp" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Teléfono Contact Center</label>
                    <input type="text" wire:model="contact_phone" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Email de Contacto</label>
                    <input type="email" wire:model="contact_email" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
            </div>
        </div>

        <!-- 3. Redes Sociales -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-4">
            <h2 class="text-base font-bold text-slate-900 font-heading border-b border-slate-100 pb-3 flex items-center gap-2">
                <i class="fas fa-share-alt text-red-600"></i> Enlaces a Redes Sociales
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Facebook URL</label>
                    <input type="url" wire:model="facebook_url" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Instagram URL</label>
                    <input type="url" wire:model="instagram_url" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">TikTok URL</label>
                    <input type="url" wire:model="tiktok_url" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">YouTube URL</label>
                    <input type="url" wire:model="youtube_url" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Spotify URL (Podcast)</label>
                    <input type="url" wire:model="spotify_url" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">LinkedIn URL</label>
                    <input type="url" wire:model="linkedin_url" class="w-full text-xs rounded-xl border border-slate-200 py-2 focus:ring-2 focus:ring-[#416A8D]">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-8 py-3 bg-[#416A8D] hover:bg-[#2c5373] text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md">
                Guardar Todas las Configuraciones
            </button>
        </div>
    </form>
</div>
