<div class="space-y-6 max-w-6xl">
    <div>
        <h1 class="text-2xl font-black text-slate-900 font-heading">Personalizador de Secciones (Home Page Builder)</h1>
        <p class="text-xs text-slate-500">Editá los textos, íconos, imágenes y visibilidad de cada bloque de la página de inicio estilo WordPress.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Sidebar de Secciones (4 cols) -->
        <div class="lg:col-span-4 bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-2">
            <h2 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 px-3 pb-2 border-b border-slate-100 font-heading">
                Bloques de la Portada
            </h2>

            <div class="space-y-1">
                @foreach($sections as $sec)
                    <div class="flex items-center justify-between p-2 rounded-2xl transition {{ $activeSectionKey === $sec->key ? 'bg-slate-900 text-white shadow-sm' : 'hover:bg-slate-50 text-slate-700' }}">
                        <button type="button" wire:click="selectSection('{{ $sec->key }}')" class="flex-1 text-left px-2 py-1 text-xs font-bold truncate">
                            {{ $sec->name }}
                        </button>
                        <button type="button" wire:click="toggleVisibility('{{ $sec->key }}')" 
                                class="text-[10px] font-bold px-2 py-0.5 rounded-full transition {{ $sec->is_visible ? ($activeSectionKey === $sec->key ? 'bg-emerald-500 text-white' : 'bg-emerald-50 text-emerald-700') : 'bg-slate-200 text-slate-500' }}"
                                title="Alternar visibilidad">
                            {{ $sec->is_visible ? 'Visible' : 'Oculto' }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Formulario de la Sección Activa (8 cols) -->
        <div class="lg:col-span-8 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-red-600">Editando Sección</span>
                    <h2 class="text-xl font-black text-slate-900 font-heading">{{ $currentSection->name ?? '' }}</h2>
                </div>
                <label class="flex items-center text-xs font-bold text-slate-700 cursor-pointer">
                    <input type="checkbox" wire:model="is_visible" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500">
                    <span class="ml-2">Mostrar en la Web</span>
                </label>
            </div>

            <form wire:submit="save" class="space-y-6">
                <!-- FORMULARIOS ESPECÍFICOS SEGÚN LA SECCIÓN SELECCIONADA -->

                <!-- 1. Gran Variedad de Servicios (4 Bloques) -->
                @if($activeSectionKey === 'quick_value_bar')
                    <div class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Badge Superior</label>
                                <input type="text" wire:model="content.badge" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título Principal</label>
                                <input type="text" wire:model="content.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Subtítulo Descriptivo</label>
                            <input type="text" wire:model="content.desc" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Imagen de Fondo</label>
                            <input type="text" wire:model="content.background_image" placeholder="/images/home/toyotaaclientes.jpg" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>

                        @for($i = 1; $i <= 4; $i++)
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 space-y-3">
                                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Servicio #0{{ $i }}</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Ícono / Imagen</label>
                                        <input type="text" wire:model="content.item_{{ $i }}.image" placeholder="/images/home/turbo.png" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Título</label>
                                        <input type="text" wire:model="content.item_{{ $i }}.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-semibold text-slate-600 mb-1">Descripción Breve</label>
                                        <input type="text" wire:model="content.item_{{ $i }}.desc" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                @endif

                <!-- Tienda Online CONSUR Shop CTA -->
                @if($activeSectionKey === 'consur_shop_cta')
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Badge Superior</label>
                                <input type="text" wire:model="content.badge" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título Principal</label>
                                <input type="text" wire:model="content.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Descripción</label>
                            <textarea wire:model="content.desc" rows="2" class="w-full text-xs rounded-xl border border-slate-200 py-2"></textarea>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Texto del Botón</label>
                                <input type="text" wire:model="content.button_text" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">URL Tienda Online</label>
                                <input type="url" wire:model="content.button_url" placeholder="https://consurshop.com" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Ruta o URL de Imagen Banner</label>
                            <input type="text" wire:model="content.banner_image" placeholder="/images/home/banner_consurshop.jpg" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                    </div>
                @endif

                <!-- 2. Sección Vehículos 0 Km Destacados -->
                @if($activeSectionKey === 'featured_0km')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Etiqueta Badge Superior</label>
                            <input type="text" wire:model="content.badge" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Título de la Sección</label>
                            <input type="text" wire:model="content.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                    </div>
                @endif

                <!-- 3. Banner Usados Certificados -->
                @if($activeSectionKey === 'usados_banner')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Etiqueta Badge</label>
                            <input type="text" wire:model="content.badge" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Título de Impacto</label>
                            <input type="text" wire:model="content.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Descripción / Párrafo</label>
                            <textarea wire:model="content.desc" rows="3" class="w-full text-xs rounded-xl border border-slate-200 py-2"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Texto del Botón</label>
                                <input type="text" wire:model="content.button_text" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">URL de Destino</label>
                                <input type="text" wire:model="content.button_url" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">URL Imagen de Fondo</label>
                            <input type="url" wire:model="content.background_image" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                    </div>
                @endif

                <!-- 4. Posventa & Taller Móvil -->
                @if($activeSectionKey === 'posventa_taller_movil')
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Etiqueta Badge</label>
                                <input type="text" wire:model="content.badge" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título de la Sección</label>
                                <input type="text" wire:model="content.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Texto Descriptivo</label>
                            <textarea wire:model="content.desc" rows="3" class="w-full text-xs rounded-xl border border-slate-200 py-2"></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Ruta o URL de Imagen del Taller Móvil</label>
                            <input type="text" wire:model="content.main_image" placeholder="/images/home/hometallermovil.png" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>

                        <!-- Badge Flotante 100% Oficial -->
                        <div class="p-4 rounded-2xl bg-red-50/50 border border-red-100 space-y-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-red-600">Caja Flotante sobre la Foto</span>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-[11px] font-semibold text-slate-600 mb-1">Título</label>
                                    <input type="text" wire:model="content.highlight_badge_title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-semibold text-slate-600 mb-1">Texto</label>
                                    <input type="text" wire:model="content.highlight_badge_desc" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                                </div>
                            </div>
                        </div>

                        <!-- 2 Beneficios -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-600">Beneficio #1</span>
                                <input type="text" wire:model="content.feature_1_icon" placeholder="fas fa-tools" class="w-full text-xs rounded-xl border border-slate-200 py-1.5 mb-1">
                                <input type="text" wire:model="content.feature_1_title" placeholder="Título" class="w-full text-xs rounded-xl border border-slate-200 py-1.5 mb-1">
                                <textarea wire:model="content.feature_1_desc" rows="2" placeholder="Descripción" class="w-full text-xs rounded-xl border border-slate-200 py-1.5"></textarea>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-600">Beneficio #2</span>
                                <input type="text" wire:model="content.feature_2_icon" placeholder="fas fa-oil-can" class="w-full text-xs rounded-xl border border-slate-200 py-1.5 mb-1">
                                <input type="text" wire:model="content.feature_2_title" placeholder="Título" class="w-full text-xs rounded-xl border border-slate-200 py-1.5 mb-1">
                                <textarea wire:model="content.feature_2_desc" rows="2" placeholder="Descripción" class="w-full text-xs rounded-xl border border-slate-200 py-1.5"></textarea>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Texto Botón 1 (Turnos)</label>
                                <input type="text" wire:model="content.button_1_text" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Texto Botón 2 (WhatsApp)</label>
                                <input type="text" wire:model="content.button_2_text" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                    </div>
                @endif

                <!-- 5. Podcast Oficial en Spotify -->
                @if($activeSectionKey === 'podcast_section')
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Badge de Podcast</label>
                                <input type="text" wire:model="content.podcast_badge" placeholder="Conecta con CONSUR • Podcast Oficial" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título de Podcast</label>
                                <input type="text" wire:model="content.podcast_title" placeholder="Último Episodio en Spotify" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Descripción de Podcast</label>
                            <textarea wire:model="content.podcast_desc" rows="2" class="w-full text-xs rounded-xl border border-slate-200 py-2"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">URL del Canal / Show en Spotify (Carga automática del último episodio)</label>
                            <input type="url" wire:model="content.spotify_show_url" placeholder="https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2" class="w-full text-xs font-mono rounded-xl border border-slate-200 py-2">
                            <p class="text-[11px] text-slate-400 mt-1">El reproductor de la Home toma automáticamente el último capítulo publicado en este canal de Spotify.</p>
                        </div>
                    </div>
                @endif

                <!-- 6. Red de Sucursales -->
                @if($activeSectionKey === 'branches_section')
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Badge Superior</label>
                                <input type="text" wire:model="content.badge" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título</label>
                                <input type="text" wire:model="content.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Subtítulo Descriptivo</label>
                            <input type="text" wire:model="content.desc" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                    </div>
                @endif

                <!-- 7. Sección Formulario de Cotización -->
                @if($activeSectionKey === 'quotation_section')
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Badge Superior</label>
                                <input type="text" wire:model="content.badge" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título</label>
                                <input type="text" wire:model="content.title" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Texto Descriptivo</label>
                            <textarea wire:model="content.desc" rows="2" class="w-full text-xs rounded-xl border border-slate-200 py-2"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Texto del Botón de Envío</label>
                            <input type="text" wire:model="content.button_text" class="w-full text-xs rounded-xl border border-slate-200 py-2">
                        </div>
                    </div>
                @endif

                <!-- Botón de Guardar Cambios de Sección -->
                <div class="pt-4 border-t border-slate-100 flex justify-end">
                    <button type="submit" 
                            class="px-8 py-3 bg-[#416A8D] hover:bg-[#2c5373] text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md flex items-center gap-2">
                        <i class="fas fa-save"></i>
                        <span>Guardar Cambios de la Sección</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
