<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white rounded-2xl p-5 border border-slate-200/80 shadow-2xs">
        <div>
            <h1 class="text-xl font-bold text-slate-900 tracking-tight font-heading">Constructor de Pie de Página (Footer)</h1>
            <p class="text-xs text-slate-500 mt-0.5">Sincronizado 1:1 con las 3 columnas reales del pie de página de la web pública y su barra inferior.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <a href="{{ route('home') }}#contacto" target="_blank" class="px-4 py-2 bg-slate-100 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-200 transition flex items-center gap-2">
                <i class="fas fa-external-link-alt text-[11px]"></i> Ver Footer en Web
            </a>
            <button wire:click="saveSettings" wire:loading.attr="disabled" class="px-5 py-2 bg-slate-900 hover:bg-[#eb0a1e] text-white text-xs font-bold rounded-xl transition shadow-2xs flex items-center gap-2 cursor-pointer">
                <span wire:loading.remove wire:target="saveSettings"><i class="fas fa-save mr-1"></i> Guardar Cambios</span>
                <span wire:loading wire:target="saveSettings"><i class="fas fa-circle-notch fa-spin mr-1"></i> Guardando...</span>
            </button>
        </div>
    </div>

    <!-- Navegación de Pestañas (Columnas) -->
    <div class="flex space-x-2 border-b border-slate-200 overflow-x-auto pb-1">
        <button wire:click="$set('activeColumnTab', 'col1'); resetLinkForm();"
                class="px-4 py-2.5 font-bold text-xs uppercase tracking-wider rounded-t-xl transition-all whitespace-nowrap cursor-pointer {{ $activeColumnTab === 'col1' ? 'bg-white border-t-2 border-[#eb0a1e] text-[#eb0a1e] shadow-2xs' : 'text-slate-500 hover:text-slate-800' }}">
            <i class="fas fa-clock mr-1.5"></i> Columna 1
        </button>
        <button wire:click="$set('activeColumnTab', 'col2'); resetLinkForm();"
                class="px-4 py-2.5 font-bold text-xs uppercase tracking-wider rounded-t-xl transition-all whitespace-nowrap cursor-pointer {{ $activeColumnTab === 'col2' ? 'bg-white border-t-2 border-[#eb0a1e] text-[#eb0a1e] shadow-2xs' : 'text-slate-500 hover:text-slate-800' }}">
            <i class="fas fa-compass mr-1.5"></i> Columna 2
        </button>
        <button wire:click="$set('activeColumnTab', 'col3'); resetLinkForm();"
                class="px-4 py-2.5 font-bold text-xs uppercase tracking-wider rounded-t-xl transition-all whitespace-nowrap cursor-pointer {{ $activeColumnTab === 'col3' ? 'bg-white border-t-2 border-[#eb0a1e] text-[#eb0a1e] shadow-2xs' : 'text-slate-500 hover:text-slate-800' }}">
            <i class="fas fa-building mr-1.5"></i> Columna 3
        </button>
        <button wire:click="$set('activeColumnTab', 'copyright'); resetLinkForm();"
                class="px-4 py-2.5 font-bold text-xs uppercase tracking-wider rounded-t-xl transition-all whitespace-nowrap cursor-pointer {{ $activeColumnTab === 'copyright' ? 'bg-white border-t-2 border-[#eb0a1e] text-[#eb0a1e] shadow-2xs' : 'text-slate-500 hover:text-slate-800' }}">
            <i class="fas fa-copyright mr-1.5"></i> Barra Inferior & Copyright
        </button>
    </div>

    <!-- ========================================== -->
    <!-- PESTAÑA 1: COLUMNA 1 (LOGO, HORARIO, REDES)-->
    <!-- ========================================== -->
    @if($activeColumnTab === 'col1')
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-2xs space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                    <i class="fas fa-id-card text-[#eb0a1e]"></i> Columna 1: Logo CONSUR, Horario de Atención y Redes Sociales
                </h3>
                <span class="text-[11px] text-slate-400">El logo en blanco se toma automáticamente de la identidad global</span>
            </div>

            <!-- Horario de Atención -->
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2">
                <label class="block text-xs font-bold text-slate-800 uppercase tracking-wider">
                    <i class="far fa-clock text-[#eb0a1e] mr-1"></i> Horario de Atención (Visible debajo del logo en el Footer)
                </label>
                <input type="text" wire:model="schedule_info" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 bg-white"
                       placeholder="Lun a Vie: 07:00 a 12:00 • 13:30 a 17:30 | Sáb: 07:30 a 11:30">
                <p class="text-[11px] text-slate-400">Este horario se actualiza instantáneamente en la Columna 1 del pie de página.</p>
            </div>

            <!-- Redes Sociales -->
            <div class="space-y-3">
                <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Canales de Redes Sociales (Interruptor de Visibilidad y URL)</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Facebook -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-2"><i class="fab fa-facebook-f text-blue-600"></i> Facebook</span>
                            <input type="checkbox" wire:model="footer_show_facebook" class="w-4 h-4 rounded text-blue-600">
                        </div>
                        <input type="url" wire:model="facebook_url" class="w-full text-xs rounded-lg border border-slate-200 py-2 px-3 bg-white" placeholder="https://facebook.com/...">
                    </div>

                    <!-- Instagram -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-2"><i class="fab fa-instagram text-pink-600"></i> Instagram</span>
                            <input type="checkbox" wire:model="footer_show_instagram" class="w-4 h-4 rounded text-pink-600">
                        </div>
                        <input type="url" wire:model="instagram_url" class="w-full text-xs rounded-lg border border-slate-200 py-2 px-3 bg-white" placeholder="https://instagram.com/...">
                    </div>

                    <!-- TikTok -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-2"><i class="fab fa-tiktok text-slate-900"></i> TikTok</span>
                            <input type="checkbox" wire:model="footer_show_tiktok" class="w-4 h-4 rounded text-slate-900">
                        </div>
                        <input type="url" wire:model="tiktok_url" class="w-full text-xs rounded-lg border border-slate-200 py-2 px-3 bg-white" placeholder="https://tiktok.com/@...">
                    </div>

                    <!-- Spotify -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-2"><i class="fab fa-spotify text-emerald-500"></i> Spotify</span>
                            <input type="checkbox" wire:model="footer_show_spotify" class="w-4 h-4 rounded text-emerald-600">
                        </div>
                        <input type="url" wire:model="spotify_url" class="w-full text-xs rounded-lg border border-slate-200 py-2 px-3 bg-white" placeholder="https://open.spotify.com/...">
                    </div>

                    <!-- YouTube -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-2"><i class="fab fa-youtube text-red-600"></i> YouTube</span>
                            <input type="checkbox" wire:model="footer_show_youtube" class="w-4 h-4 rounded text-red-600">
                        </div>
                        <input type="url" wire:model="youtube_url" class="w-full text-xs rounded-lg border border-slate-200 py-2 px-3 bg-white" placeholder="https://www.youtube.com/@Consurtoyota">
                    </div>

                    <!-- LinkedIn -->
                    <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800 flex items-center gap-2"><i class="fab fa-linkedin-in text-blue-700"></i> LinkedIn</span>
                            <input type="checkbox" wire:model="footer_show_linkedin" class="w-4 h-4 rounded text-blue-700">
                        </div>
                        <input type="url" wire:model="linkedin_url" class="w-full text-xs rounded-lg border border-slate-200 py-2 px-3 bg-white" placeholder="https://linkedin.com/...">
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- ========================================== -->
    <!-- PESTAÑA 2: COLUMNA 2 (ACCESOS DESTACADOS)  -->
    <!-- ========================================== -->
    @if($activeColumnTab === 'col2')
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Formulario de Enlace Columna 2 (4 cols) -->
            <div class="lg:col-span-4 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-2xs space-y-4">
                <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-3 flex items-center gap-2">
                    <i class="fas fa-{{ $editingLinkId ? 'edit' : 'plus-circle' }} text-[#eb0a1e]"></i>
                    {{ $editingLinkId ? 'Editar Enlace de Columna 2' : 'Agregar Enlace a Columna 2' }}
                </h3>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Título de la Columna 2</label>
                    <input type="text" wire:model="footer_col2_title" class="w-full text-xs font-bold rounded-xl border border-slate-200 py-2.5 px-3.5" placeholder="Explorá CONSUR">
                </div>

                <div class="pt-3 border-t border-slate-100">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Texto del Enlace *</label>
                    <input type="text" wire:model="newLinkTitle" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5" placeholder="Ej: Catálogo">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">URL de Destino *</label>
                    <input type="text" wire:model="newLinkUrl" class="w-full font-mono text-xs rounded-xl border border-slate-200 py-2.5 px-3.5" placeholder="Ej: /catalogo">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Destino</label>
                        <select wire:model="newLinkTarget" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3">
                            <option value="_self">Misma pestaña</option>
                            <option value="_blank">Nueva pestaña</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Orden</label>
                        <input type="number" wire:model="newLinkOrder" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3">
                    </div>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <button wire:click="addLink" class="w-full py-2.5 px-4 bg-slate-900 hover:bg-[#eb0a1e] text-white font-bold text-xs rounded-xl transition cursor-pointer">
                        {{ $editingLinkId ? 'Actualizar Enlace' : 'Agregar Enlace' }}
                    </button>
                    @if($editingLinkId)
                        <button wire:click="resetLinkForm" class="py-2.5 px-4 bg-slate-100 text-slate-700 font-bold text-xs rounded-xl hover:bg-slate-200 transition cursor-pointer">Cancelar</button>
                    @endif
                </div>
            </div>

            <!-- Lista de Enlaces Activos en Columna 2 (8 cols) -->
            <div class="lg:col-span-8 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-2xs space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-list text-[#eb0a1e]"></i> Enlaces de la Columna 2 ({{ $footer_col2_title }})
                        </h3>
                        <p class="text-xs text-slate-400 mt-0.5">Sincronizado 1:1 con la Columna 2 del pie de página público.</p>
                    </div>
                    <span class="text-xs font-bold text-slate-400">{{ $col2Links->count() }} enlaces</span>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($col2Links as $link)
                        <div class="py-3 flex items-center justify-between gap-4 hover:bg-slate-50 px-3 rounded-xl transition">
                            <div class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-100 text-slate-600 font-bold text-xs flex items-center justify-center">
                                    {{ $link->sort_order }}
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">{{ $link->title }}</h4>
                                    <p class="text-[11px] font-mono text-slate-400">{{ $link->url }} ({{ $link->target }})</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <button wire:click="toggleLinkActive({{ $link->id }})" class="p-1.5 rounded-lg {{ $link->is_active ? 'text-emerald-600 hover:bg-emerald-50' : 'text-slate-400 hover:bg-slate-100' }} cursor-pointer" title="Activar/Desactivar">
                                    <i class="fas {{ $link->is_active ? 'fa-toggle-on text-lg' : 'fa-toggle-off text-lg' }}"></i>
                                </button>
                                <button wire:click="editLink({{ $link->id }})" class="p-1.5 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-lg cursor-pointer" title="Editar">
                                    <i class="fas fa-pencil-alt text-xs"></i>
                                </button>
                                <button wire:click="deleteLink({{ $link->id }})" wire:confirm="¿Seguro que deseas eliminar este enlace?" class="p-1.5 text-rose-600 hover:bg-rose-50 rounded-lg cursor-pointer" title="Eliminar">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-6">No hay enlaces en esta columna.</p>
                    @endforelse
                </div>
            </div>
        </div>
    @endif

    <!-- ========================================== -->
    <!-- PESTAÑA 3: COLUMNA 3 (NOSOTROS)            -->
    <!-- ========================================== -->
    @if($activeColumnTab === 'col3')
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Formulario de Enlace (4 cols) -->
            <div class="lg:col-span-4 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-2xs space-y-4">
                <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-3 flex items-center gap-2">
                    <i class="fas fa-{{ $editingLinkId ? 'edit' : 'plus-circle' }} text-[#eb0a1e]"></i>
                    {{ $editingLinkId ? 'Editar Enlace de NOSOTROS' : 'Agregar Enlace a NOSOTROS' }}
                </h3>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Título de la Columna 3</label>
                    <input type="text" wire:model="footer_col3_title" class="w-full text-xs font-bold rounded-xl border border-slate-200 py-2.5 px-3.5" placeholder="NOSOTROS">
                </div>

                <div class="pt-3 border-t border-slate-100">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Texto del Enlace *</label>
                    <input type="text" wire:model="newLinkTitle" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5" placeholder="Ej: La Empresa">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">URL de Destino *</label>
                    <input type="text" wire:model="newLinkUrl" class="w-full font-mono text-xs rounded-xl border border-slate-200 py-2.5 px-3.5" placeholder="Ej: /la-empresa">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Destino</label>
                        <select wire:model="newLinkTarget" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3">
                            <option value="_self">Misma pestaña</option>
                            <option value="_blank">Nueva pestaña</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Orden</label>
                        <input type="number" wire:model="newLinkOrder" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3">
                    </div>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <button wire:click="addLink" class="w-full py-2.5 px-4 bg-slate-900 hover:bg-[#eb0a1e] text-white font-bold text-xs rounded-xl transition cursor-pointer">
                        {{ $editingLinkId ? 'Actualizar Enlace' : 'Agregar Enlace' }}
                    </button>
                    @if($editingLinkId)
                        <button wire:click="resetLinkForm" class="py-2.5 px-4 bg-slate-100 text-slate-700 font-bold text-xs rounded-xl hover:bg-slate-200 transition cursor-pointer">Cancelar</button>
                    @endif
                </div>
            </div>

            <!-- Lista de Enlaces Activos en Columna 3 (8 cols) -->
            <div class="lg:col-span-8 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-2xs space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                        <i class="fas fa-list text-[#eb0a1e]"></i> Enlaces de la Columna 3 ({{ $footer_col3_title }})
                    </h3>
                    <span class="text-xs font-bold text-slate-400">{{ $col3Links->count() }} enlaces</span>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($col3Links as $link)
                        <div class="py-3 flex items-center justify-between gap-4 hover:bg-slate-50 px-3 rounded-xl transition">
                            <div class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-100 text-slate-600 font-bold text-xs flex items-center justify-center">
                                    {{ $link->sort_order }}
                                </span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">{{ $link->title }}</h4>
                                    <p class="text-[11px] font-mono text-slate-400">{{ $link->url }} ({{ $link->target }})</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <button wire:click="toggleLinkActive({{ $link->id }})" class="p-1.5 rounded-lg {{ $link->is_active ? 'text-emerald-600 hover:bg-emerald-50' : 'text-slate-400 hover:bg-slate-100' }} cursor-pointer" title="Activar/Desactivar">
                                    <i class="fas {{ $link->is_active ? 'fa-toggle-on text-lg' : 'fa-toggle-off text-lg' }}"></i>
                                </button>
                                <button wire:click="editLink({{ $link->id }})" class="p-1.5 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-lg cursor-pointer" title="Editar">
                                    <i class="fas fa-pencil-alt text-xs"></i>
                                </button>
                                <button wire:click="deleteLink({{ $link->id }})" wire:confirm="¿Seguro que deseas eliminar este enlace?" class="p-1.5 text-rose-600 hover:bg-rose-50 rounded-lg cursor-pointer" title="Eliminar">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-6">No hay enlaces personalizados en esta columna.</p>
                    @endforelse
                </div>
            </div>
        </div>
    @endif

    <!-- ========================================== -->
    <!-- PESTAÑA 4: BARRA INFERIOR & COPYRIGHT      -->
    <!-- ========================================== -->
    @if($activeColumnTab === 'copyright')
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-2xs space-y-5">
            <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-3 flex items-center gap-2">
                <i class="fas fa-copyright text-[#eb0a1e]"></i> Barra Inferior del Pie de Página
            </h3>

            <div class="space-y-4 max-w-2xl">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Texto de Copyright</label>
                    <input type="text" wire:model="footer_copyright" class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5" placeholder="© {year} CONSUR S.A. Todos los derechos reservados.">
                    <p class="text-[11px] text-slate-400 mt-1">Usa <code class="font-mono text-[#eb0a1e]">{year}</code> para que el año se actualice automáticamente.</p>
                </div>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between text-xs text-slate-600">
                    <span>Enlaces Legales y Firma en Barra Inferior:</span>
                    <span class="font-semibold text-slate-800">Términos & Privacidad &bull; Garantía & Seguros &bull; Powered by <strong class="text-[#eb0a1e]">Soteweb</strong></span>
                </div>
            </div>
        </div>
    @endif
</div>
