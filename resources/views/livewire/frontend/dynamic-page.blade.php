<div>
    @if(str_contains($page->content, 'data-cms-layout="fullwidth"'))
        <!-- Layout Full-Width (100% Ancho de Pantalla con su propio Carrusel Hero y Secciones Edge-to-Edge) -->
        <div class="cms-fullwidth-wrapper bg-white dark:bg-slate-950 text-slate-800 dark:text-neutral-100">
            {!! $this->parsedContent !!}
        </div>
    @else
        <!-- Hero Banner Dinámico de la Página -->
        <div class="relative bg-slate-950 text-white overflow-hidden py-16 md:py-24 border-b border-slate-800">
            @if($page->banner_image)
                <div class="absolute inset-0 z-0">
                    <img src="{{ $page->banner_image }}" alt="{{ $page->title }}" class="w-full h-full object-cover opacity-25">
                    <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-900/80 to-transparent"></div>
                </div>
            @endif

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumbs -->
                <nav class="flex items-center space-x-2 text-xs text-neutral-400 mb-4">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a>
                    <span class="text-neutral-600">/</span>
                    <span class="text-neutral-300">Páginas</span>
                    <span class="text-neutral-600">/</span>
                    <span class="text-red-500 font-medium truncate">{{ $page->title }}</span>
                </nav>

                <span class="text-xs uppercase font-medium tracking-widest text-red-500 mb-2 inline-block" data-aos="fade-down">
                    CONSUR S.A. &bull; Concesionaria Oficial Toyota
                </span>

                <h1 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-normal font-heading leading-tight" data-aos="fade-up" data-aos-delay="100">
                    {{ $page->title }}
                </h1>

                @if($page->subtitle)
                    <p class="mt-4 text-base sm:text-lg text-neutral-300 max-w-3xl font-light leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                        {{ $page->subtitle }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Contenido Principal CMS -->
        @if(str_contains($page->content, 'data-cms-layout="modern"'))
            <div class="cms-fullwidth-wrapper max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 space-y-16 text-slate-800 dark:text-neutral-100">
                {!! $this->parsedContent !!}
            </div>
        @else
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-12 border border-slate-200/80 dark:border-slate-800 shadow-xs space-y-6" data-aos="fade-up">
                    <div class="prose dark:prose-invert max-w-none text-slate-700 dark:text-neutral-300 leading-relaxed text-sm sm:text-base 
                                [&>h2]:text-2xl [&>h2]:font-semibold [&>h2]:text-slate-900 dark:[&>h2]:text-white [&>h2]:font-heading [&>h2]:mt-8 [&>h2]:mb-4 [&>h2]:tracking-tight [&>h2]:border-b [&>h2]:border-slate-100 dark:[&>h2]:border-neutral-800 [&>h2]:pb-2
                                [&>h3]:text-lg [&>h3]:font-semibold [&>h3]:text-slate-800 dark:[&>h3]:text-neutral-200 [&>h3]:mt-6 [&>h3]:mb-2
                                [&>p]:mb-4 [&>p]:leading-relaxed
                                [&>ul]:list-disc [&>ul]:pl-5 [&>ul]:mb-4 [&>ul>li]:mb-2
                                [&>ol]:list-decimal [&>ol]:pl-5 [&>ol]:mb-4 [&>ol>li]:mb-2
                                [&>blockquote]:border-l-4 [&>blockquote]:border-red-600 [&>blockquote]:pl-4 [&>blockquote]:italic [&>blockquote]:text-slate-600 dark:[&>blockquote]:text-neutral-400 [&>blockquote]:my-6">
                        {!! $this->parsedContent !!}
                    </div>

                    <!-- Call to Action Banner al final del artículo -->
                    <div class="mt-12 p-6 sm:p-8 bg-slate-50 dark:bg-slate-950 rounded-2xl border border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div>
                            <h4 class="text-base font-semibold text-slate-900 dark:text-white font-heading">¿Necesitas asesoramiento personalizado?</h4>
                            <p class="text-xs text-slate-500 dark:text-neutral-400 mt-1">Nuestros asesores oficiales de CONSUR S.A. están disponibles para ayudarte.</p>
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text={{ urlencode('Hola CONSUR S.A., estuve leyendo la página ' . $page->title . ' y quisiera consultar.') }}" 
                               target="_blank" 
                               class="w-full sm:w-auto px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-emerald-600/20 flex items-center justify-center gap-2">
                                <i class="fab fa-whatsapp text-base"></i>
                                <span>Contactar Asesor</span>
                            </a>
                            <a href="{{ route('home') }}#contacto" 
                               class="w-full sm:w-auto px-6 py-3 bg-slate-900 hover:bg-slate-800 dark:bg-red-600 dark:hover:bg-red-700 text-white font-medium text-xs uppercase tracking-wider rounded-xl transition text-center">
                                Cotizar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
