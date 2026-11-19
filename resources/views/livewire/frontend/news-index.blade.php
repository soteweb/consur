<div>
    <!-- Hero Banner Novedades -->
    <div class="relative bg-neutral-900 text-white overflow-hidden py-16 md:py-24">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/novedades/consur-realizo-el-acto-de-palada-inicial-de-su-nueva-sucursal-en-bella-vista.jpg') }}"
                 alt="Novedades CONSUR S.A."
                 class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-900/85 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-xs text-neutral-400 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a>
                <span class="text-neutral-600">/</span>
                <span class="text-red-500 font-medium">Novedades</span>
            </nav>

            <span class="text-xs uppercase font-medium tracking-widest text-red-500 mb-2 inline-block">
                CONSUR S.A. &bull; Actualidad & Comunidad
            </span>

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-normal font-heading leading-tight uppercase">
                Novedades
            </h1>

            <p class="mt-4 text-base sm:text-lg text-neutral-300 max-w-3xl font-light leading-relaxed">
                Conocé todas las novedades, inauguraciones, competencias deportivas y eventos exclusivos de CONSUR S.A. en Paraguay.
            </p>
        </div>
    </div>

    <!-- Listado Principal de Entradas (Categoría Novedades) -->
    <section class="py-14 md:py-20 bg-[#f8f9fa] dark:bg-slate-950 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <!-- Barra Superior: Categoría Única + Buscador -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white dark:bg-slate-900 p-4 sm:p-5 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-xs">
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-600 text-white text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-newspaper text-[11px]"></i>
                        <span>Categoría: Novedades</span>
                    </span>
                    <span class="text-xs text-slate-500 dark:text-neutral-400 font-medium">
                        {{ $posts->total() }} {{ $posts->total() === 1 ? 'entrada publicada' : 'entradas publicadas' }}
                    </span>
                </div>

                <div class="relative w-full sm:w-80">
                    <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 dark:text-neutral-500 text-xs"></i>
                    <input type="text"
                           wire:model.live.debounce.300ms="search"
                           placeholder="Buscar en Novedades..."
                           class="w-full pl-9 pr-8 py-2.5 rounded-xl border border-slate-200 dark:border-neutral-800 bg-slate-50 dark:bg-neutral-900 focus:bg-white dark:focus:bg-[#0a0a0a] text-xs text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition">
                    @if($search)
                        <button wire:click="$set('search', '')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:text-neutral-500 dark:hover:text-neutral-300">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Grilla de Novedades -->
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-200/80 dark:border-slate-800 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ ($loop->index % 6) * 60 }}">
                            <div>
                                <a href="{{ route('novedades.show', $post->slug) }}" class="block relative h-56 overflow-hidden bg-slate-100 dark:bg-slate-950">
                                    <img src="{{ $post->featured_image_url }}"
                                         alt="{{ $post->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @if($post->formatted_date)
                                        <span class="absolute top-3 right-3 bg-red-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                                            {{ $post->formatted_date }}
                                        </span>
                                    @endif
                                    @if(!empty($post->gallery) && count($post->gallery) > 0)
                                        <span class="absolute bottom-3 left-3 bg-black/75 backdrop-blur-xs text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider flex items-center gap-1.5 shadow">
                                            <i class="fas fa-images text-red-500"></i>
                                            <span>{{ count($post->gallery) }} fotos</span>
                                        </span>
                                    @endif
                                </a>

                                <div class="p-6 space-y-3">
                                    <div class="flex items-center gap-2 text-[10px] uppercase font-bold text-red-600 tracking-widest">
                                        <span>{{ $post->category ?: 'Novedades' }}</span>
                                    </div>

                                    <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white font-heading leading-snug group-hover:text-red-600 dark:group-hover:text-red-500 transition-colors">
                                        <a href="{{ route('novedades.show', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>

                                    @if($post->excerpt)
                                        <p class="text-slate-600 dark:text-neutral-400 text-xs sm:text-sm leading-relaxed font-light line-clamp-3">
                                            {{ $post->excerpt }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="px-6 pb-6 pt-2">
                                <a href="{{ route('novedades.show', $post->slug) }}"
                                   class="inline-flex items-center gap-2 text-xs font-bold text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-400 transition">
                                    <span>Leer novedad completa</span>
                                    <i class="fas fa-arrow-right text-[10px] transition-transform group-hover:translate-x-1"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="pt-6">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="bg-white rounded-3xl p-12 text-center border border-slate-200/80 space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                        <i class="fas fa-newspaper text-xl"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-800">No se encontraron novedades</h3>
                    <p class="text-xs text-slate-500">Probá con otro término de búsqueda o restablecé el filtro.</p>
                </div>
            @endif
        </div>
    </section>
</div>

