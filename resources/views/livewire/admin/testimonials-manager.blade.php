<div class="space-y-6 max-w-5xl">
    <!-- Encabezado -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200">
                    <i class="fab fa-spotify mr-1"></i> Sincronización Automática
                </span>
            </div>
            <h1 class="text-xl font-semibold text-slate-800 tracking-tight mt-1">Podcast Oficial CONSUR en Spotify</h1>
            <p class="text-xs text-slate-500 mt-0.5">
                El reproductor de la página de inicio carga automáticamente el último episodio publicado en el canal de Spotify de CONSUR S.A.
            </p>
        </div>

        <a href="{{ $spotify_show_url }}" target="_blank" rel="noopener"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#1DB954] hover:bg-[#1aa34a] text-white text-xs font-bold rounded-xl transition shadow-xs">
            <i class="fab fa-spotify text-sm"></i>
            <span>Abrir Canal en Spotify</span>
            <i class="fas fa-external-link-alt text-[10px]"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <!-- Formulario de Configuración (7 cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-5">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Configuración del Canal y Sección en Portada</h2>
                    <p class="text-xs text-slate-400">Personaliza el enlace del canal de Spotify y los textos de presentación.</p>
                </div>
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-700">
                    <input type="checkbox" wire:model="is_visible" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500">
                    <span>Visible en Home</span>
                </label>
            </div>

            <form wire:submit="saveChannelConfig" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">
                        URL del Canal / Show de Spotify *
                    </label>
                    <input type="url" wire:model.live.debounce.400ms="spotify_show_url" required
                           placeholder="https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2"
                           class="w-full text-xs font-mono rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-emerald-500">
                    <p class="text-[11px] text-slate-400 mt-1">
                        Al pegar el enlace del programa (<code>open.spotify.com/show/...</code>), la web mostrará automáticamente el episodio más reciente publicado en ese canal.
                    </p>
                    @error('spotify_show_url') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Etiqueta Superior (Badge)</label>
                        <input type="text" wire:model="podcast_badge"
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Título Principal *</label>
                        <input type="text" wire:model="podcast_title" required
                               class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-emerald-500">
                        @error('podcast_title') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Descripción</label>
                    <textarea wire:model="podcast_desc" rows="3"
                              class="w-full text-xs rounded-xl border border-slate-200 py-2.5 px-3.5 focus:ring-2 focus:ring-emerald-500"></textarea>
                </div>

                <div class="pt-3 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-2">
                        <i class="fas fa-save"></i>
                        <span>Guardar Configuración</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Vista Previa en Vivo del Reproductor Automático (5 cols) -->
        <div class="lg:col-span-5 bg-slate-900 rounded-3xl p-6 text-white space-y-4 shadow-lg">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-400 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Vista Previa en Vivo (Último Episodio)
                </span>
            </div>

            <div class="rounded-2xl overflow-hidden border border-white/10 bg-slate-950">
                <iframe src="{{ $spotifyEmbedUrl }}"
                        width="100%"
                        height="279"
                        frameBorder="0"
                        allowfullscreen=""
                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                        loading="lazy"></iframe>
            </div>

            <p class="text-[11px] text-slate-400 leading-relaxed">
                Cada vez que subas un nuevo episodio a Spotify, este reproductor se actualizará solo en la portada sin que tengas que cargarlo manualmente.
            </p>
        </div>
    </div>
</div>
