<div>
    <!-- Hero de la Entrada -->
    <div class="relative bg-neutral-900 text-white overflow-hidden py-14 md:py-22">
        @if($post->featured_image)
            <div class="absolute inset-0 z-0">
                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-20">
                <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-900/85 to-transparent"></div>
            </div>
        @endif

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex flex-wrap items-center gap-2 text-xs text-neutral-400 mb-5">
                <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a>
                <span class="text-neutral-600">/</span>
                <a href="{{ route('novedades') }}" class="hover:text-white transition">Novedades</a>
                <span class="text-neutral-600">/</span>
                <span class="text-red-500 font-medium line-clamp-1">{{ $post->title }}</span>
            </nav>

            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span class="px-3 py-1 rounded-full bg-red-600 text-white text-[11px] font-bold uppercase tracking-wider">
                    {{ $post->category ?: 'Novedades' }}
                </span>
                @if($post->formatted_date)
                    <span class="text-xs text-neutral-300 flex items-center gap-1.5">
                        <i class="far fa-calendar-alt text-red-500"></i>
                        <span>{{ $post->formatted_date }}</span>
                    </span>
                @endif
            </div>

            <h1 class="text-2xl sm:text-3xl md:text-4xl font-light text-white tracking-normal font-heading leading-snug">
                {{ $post->title }}
            </h1>
        </div>
    </div>

    <!-- Cuerpo del Artículo -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <article class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-200/80 dark:border-slate-800 shadow-xs" data-aos="fade-up">
            @if($post->featured_image)
                <div class="w-full max-h-[520px] overflow-hidden bg-slate-100 dark:bg-slate-950">
                    <img src="{{ $post->featured_image_url }}"
                         alt="{{ $post->title }}"
                         class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-6 sm:p-10 md:p-12 space-y-6">
                <div class="prose dark:prose-invert max-w-none text-slate-700 dark:text-neutral-300 leading-relaxed text-sm sm:text-base
                            [&>h2]:text-xl sm:[&>h2]:text-2xl [&>h2]:font-semibold [&>h2]:text-slate-900 dark:[&>h2]:text-white [&>h2]:font-heading [&>h2]:mt-8 [&>h2]:mb-4
                            [&>h3]:text-lg [&>h3]:font-semibold [&>h3]:text-slate-800 dark:[&>h3]:text-neutral-200 [&>h3]:mt-6 [&>h3]:mb-2
                            [&>p]:mb-4 [&>p]:leading-relaxed
                            [&>ul]:list-disc [&>ul]:pl-5 [&>ul]:mb-4 [&>ul>li]:mb-2
                            [&>ol]:list-decimal [&>ol]:pl-5 [&>ol]:mb-4 [&>ol>li]:mb-2
                            [&_img]:rounded-2xl [&_img]:my-6 [&_img]:mx-auto [&_img]:max-w-full [&_img]:h-auto
                            [&>blockquote]:border-l-4 [&>blockquote]:border-red-600 [&>blockquote]:pl-4 [&>blockquote]:italic [&>blockquote]:text-slate-600 dark:[&>blockquote]:text-neutral-400 [&>blockquote]:my-6">
                    {!! $post->content !!}
                </div>

                @if(!empty($post->gallery_images))
                    <!-- Galería de Fotos Interactiva Optimizada WebP con Lightbox -->
                    <div x-data="{ 
                            lightboxOpen: false, 
                            activeImageIndex: 0, 
                            images: {{ json_encode($post->gallery_images) }},
                            openLightbox(index) {
                                this.activeImageIndex = index;
                                this.lightboxOpen = true;
                                document.body.classList.add('overflow-hidden');
                            },
                            closeLightbox() {
                                this.lightboxOpen = false;
                                document.body.classList.remove('overflow-hidden');
                            },
                            nextImage() {
                                this.activeImageIndex = (this.activeImageIndex + 1) % this.images.length;
                            },
                            prevImage() {
                                this.activeImageIndex = (this.activeImageIndex - 1 + this.images.length) % this.images.length;
                            }
                         }"
                         @keydown.escape.window="closeLightbox()"
                         @keydown.arrow-right.window="if(lightboxOpen) nextImage()"
                         @keydown.arrow-left.window="if(lightboxOpen) prevImage()"
                         class="mt-12 pt-10 border-t border-slate-100 dark:border-neutral-800">
                        
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-widest text-red-600">Galería de Imágenes</span>
                                <h3 class="text-xl sm:text-2xl font-light text-slate-900 dark:text-white font-heading mt-0.5">
                                    Fotos de la Novedad
                                </h3>
                            </div>
                            <span class="text-xs text-slate-400 dark:text-neutral-500 font-medium">
                                {{ count($post->gallery_images) }} {{ count($post->gallery_images) === 1 ? 'imagen' : 'imágenes' }}
                            </span>
                        </div>

                        <!-- Mosaico / Grilla de Fotos -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                            @foreach($post->gallery_images as $gIdx => $gImg)
                                <div @click="openLightbox({{ $gIdx }})"
                                     class="group relative aspect-square rounded-2xl overflow-hidden bg-slate-100 dark:bg-neutral-900 border border-slate-200/80 dark:border-neutral-800 cursor-pointer shadow-xs hover:shadow-xl transition-all duration-300">
                                    <img src="{{ $gImg }}" 
                                         alt="Foto {{ $gIdx + 1 }} - {{ $post->title }}" 
                                         loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center text-white">
                                        <span class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-sm shadow">
                                            <i class="fas fa-search-plus"></i>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Modal Lightbox Pantalla Completa -->
                        <div x-show="lightboxOpen" 
                             x-cloak 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 z-50 bg-black/95 backdrop-blur-md flex items-center justify-center p-4 select-none">
                            
                            <!-- Botón Cerrar -->
                            <button @click="closeLightbox()"
                                    type="button" 
                                    class="absolute top-5 right-5 z-50 w-11 h-11 rounded-full bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition cursor-pointer"
                                    aria-label="Cerrar vista previa">
                                <i class="fas fa-times text-lg"></i>
                            </button>

                            <!-- Contador de Foto -->
                            <div class="absolute top-6 left-6 z-50 text-white/80 text-xs font-semibold tracking-wider bg-white/10 backdrop-blur-xs px-3 py-1.5 rounded-full">
                                <span x-text="activeImageIndex + 1"></span> / <span x-text="images.length"></span>
                            </div>

                            <!-- Flecha Anterior -->
                            <button @click.stop="prevImage()" 
                                    x-show="images.length > 1"
                                    type="button" 
                                    class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-50 w-12 h-12 rounded-full bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition cursor-pointer"
                                    aria-label="Foto anterior">
                                <i class="fas fa-chevron-left text-base"></i>
                            </button>

                            <!-- Imagen Principal -->
                            <div class="max-w-5xl max-h-[85vh] flex items-center justify-center p-2">
                                <img :src="images[activeImageIndex]" 
                                     alt="Foto ampliada" 
                                     class="max-w-full max-h-[82vh] object-contain rounded-xl shadow-2xl transition-all duration-300">
                            </div>

                            <!-- Flecha Siguiente -->
                            <button @click.stop="nextImage()" 
                                    x-show="images.length > 1"
                                    type="button" 
                                    class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-50 w-12 h-12 rounded-full bg-white/10 hover:bg-white/25 text-white flex items-center justify-center transition cursor-pointer"
                                    aria-label="Foto siguiente">
                                <i class="fas fa-chevron-right text-base"></i>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Pie del Artículo: Volver y Compartir -->
                <div class="pt-8 mt-8 border-t border-slate-100 dark:border-neutral-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('novedades') }}"
                       class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300 hover:text-red-600 dark:hover:text-red-500 transition">
                        <i class="fas fa-arrow-left text-[10px]"></i>
                        <span>Volver a todas las Novedades</span>
                    </a>

                    <div class="flex items-center gap-2">
                        <span class="text-xs text-slate-400 dark:text-neutral-500 mr-1">Compartir:</span>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->fullUrl()) }}"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white flex items-center justify-center transition">
                            <i class="fab fa-facebook-f text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <!-- Otras Novedades Recientes -->
        @if($recentPosts->count() > 0)
            <div class="mt-14 space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white font-heading uppercase">
                        Más Novedades de CONSUR
                    </h3>
                    <a href="{{ route('novedades') }}" class="text-xs font-bold text-red-600 hover:underline">
                        Ver todas &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($recentPosts as $recent)
                        <a href="{{ route('novedades.show', $recent->slug) }}"
                           class="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200/80 dark:border-slate-800 shadow-xs hover:shadow-lg transition group flex flex-col justify-between">
                            <div>
                                <div class="h-40 overflow-hidden bg-slate-100 dark:bg-slate-950 relative">
                                    <img src="{{ $recent->featured_image_url }}"
                                         alt="{{ $recent->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                    @if($recent->formatted_date)
                                        <span class="absolute top-2.5 right-2.5 bg-red-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                                            {{ $recent->formatted_date }}
                                        </span>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-500 transition line-clamp-2 leading-snug">
                                        {{ $recent->title }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

