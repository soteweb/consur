@props([
    'sliders' => collect(),
    'group' => 'home',
])

@if($sliders && $sliders->count() > 0)
    <section class="toyota-hero-slider relative bg-slate-950 text-white w-full flex items-center select-none" 
             x-data="{ 
                activeSlide: 0, 
                totalSlides: {{ $sliders->count() }},
                timer: null,
                init() {
                    this.start();
                },
                start() {
                    this.stop();
                    if (this.totalSlides > 1) {
                        this.timer = setInterval(() => { this.next(); }, 6500);
                    }
                },
                stop() {
                    if (this.timer) {
                        clearInterval(this.timer);
                        this.timer = null;
                    }
                },
                next() { this.activeSlide = (this.activeSlide + 1) % this.totalSlides; },
                prev() { this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides; }
             }"
             @mouseenter="stop()"
             @mouseleave="start()">
        
        @foreach ($sliders as $index => $slide)
            @php
                $hasText = !empty(trim($slide->title ?? '')) || !empty(trim($slide->description ?? ''));
                $hasButtons = !empty(trim($slide->button_text ?? '')) || !empty(trim($slide->button_secondary_text ?? ''));
                $hasTag = !empty(trim($slide->tag ?? ''));
            @endphp
            <div x-show="activeSlide === {{ $index }}" 
                 @if($index > 0) x-cloak @endif
                 x-effect="if (activeSlide === {{ $index }}) { $el.querySelector('video')?.play(); } else { const v = $el.querySelector('video'); if (v) { v.pause(); } }"
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-500"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute inset-0 w-full h-full">
                
                <!-- Media: Video o Imagen Responsive (Desktop y Mobile) -->
                @if($slide->has_video)
                    <video autoplay muted loop playsinline
                           poster="{{ $slide->desktop_image_url }}"
                           class="absolute inset-0 w-full h-full object-cover object-center {{ $hasText ? 'opacity-60 md:opacity-75' : 'opacity-100' }}">
                        <source src="{{ $slide->video_src }}" type="video/mp4">
                        <picture class="w-full h-full">
                            <source media="(max-width: 768px)" srcset="{{ $slide->mobile_image_url }}">
                            <img src="{{ $slide->desktop_image_url }}" 
                                 alt="{{ $slide->title ?: 'Banner CONSUR' }}" 
                                 class="w-full h-full object-cover object-center">
                        </picture>
                    </video>
                @else
                    <picture class="absolute inset-0 w-full h-full">
                        <source media="(max-width: 768px)" srcset="{{ $slide->mobile_image_url }}">
                        <img src="{{ $slide->desktop_image_url }}" 
                             alt="{{ $slide->title ?: 'Banner CONSUR' }}" 
                             class="w-full h-full object-cover object-center {{ $hasText ? 'opacity-60 md:opacity-75' : 'opacity-100' }}">
                    </picture>
                @endif

                @if($hasText)
                    <!-- Gradient Overlay: Se aplica ÚNICAMENTE cuando el slide tiene título o descripción -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent md:bg-gradient-to-r md:from-slate-950 md:via-slate-950/70 md:to-transparent"></div>
                @endif

                @if(!$hasButtons && $slide->button_url)
                    <!-- Enlace de click completo si el banner tiene diseño integral y URL asignada -->
                    <a href="{{ $slide->button_url }}" class="absolute inset-0 z-10" target="_blank" rel="noopener" aria-label="{{ $slide->title ?: 'Ver más información' }}"></a>
                @endif
                
                @if($hasText || $hasButtons || $hasTag)
                    <!-- Content Container: Ubicación adaptable según content_position (left, center, right) -->
                    <div class="absolute inset-0 flex items-end pb-16 sm:pb-20 md:items-center md:pb-0 pointer-events-none">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex {{ $slide->content_position === 'right' ? 'justify-end' : ($slide->content_position === 'center' ? 'justify-center' : 'justify-start') }}">
                            <div class="max-w-2xl space-y-2 sm:space-y-3.5 pl-2 sm:pl-0 pointer-events-auto {{ $slide->content_position === 'right' ? 'text-right' : ($slide->content_position === 'center' ? 'text-center' : 'text-left') }}">
                                @if($slide->tag)
                                    <div class="inline-flex items-center gap-1.5 bg-red-600/90 backdrop-blur-sm text-white text-[9px] sm:text-[10px] md:text-[11px] font-extrabold uppercase px-2.5 py-1 rounded shadow-md tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                        {{ $slide->tag }}
                                    </div>
                                @endif
                                @if($slide->title)
                                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-light text-white tracking-normal font-heading leading-tight drop-shadow-md">
                                        {{ $slide->title }}
                                    </h2>
                                @endif
                                @if($slide->description)
                                    <p class="text-xs sm:text-sm md:text-base text-slate-200 font-normal leading-relaxed line-clamp-2 md:line-clamp-none max-w-xl drop-shadow">
                                        {{ $slide->description }}
                                    </p>
                                @endif
                                @if($hasButtons)
                                    <div class="flex flex-wrap items-center gap-2.5 sm:gap-3.5 pt-1.5 sm:pt-2 {{ $slide->content_position === 'right' ? 'justify-end' : ($slide->content_position === 'center' ? 'justify-center' : 'justify-start') }}">
                                        @if($slide->button_text)
                                            <a href="{{ $slide->button_url }}" target="_blank" rel="noopener" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs sm:text-sm uppercase tracking-wider px-5 sm:px-6 py-2.5 sm:py-3 rounded-full transition shadow-lg shadow-red-600/30 flex items-center gap-2">
                                                <span>{{ $slide->button_text }}</span>
                                                <i class="fas fa-arrow-right text-[10px]"></i>
                                            </a>
                                        @endif
                                        @if($slide->button_secondary_text)
                                            <a href="{{ $slide->button_secondary_url }}" target="_blank" rel="noopener" class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 font-bold text-xs sm:text-sm uppercase tracking-wider px-4 sm:px-5 py-2.5 sm:py-3 rounded-full transition">
                                                {{ $slide->button_secondary_text }}
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Carrusel Navigation Buttons: Flechas en los laterales y Puntos centrados al fondo -->
        @if($sliders->count() > 1)
            <!-- Flecha Anterior -->
            <button @click="prev()" class="hidden sm:flex absolute left-3 md:left-6 top-1/2 -translate-y-1/2 z-20 w-9 h-9 md:w-11 md:h-11 rounded-full bg-black/50 hover:bg-red-600 text-white items-center justify-center transition backdrop-blur-sm border border-white/10 shadow-lg cursor-pointer" aria-label="Anterior">
                <i class="fas fa-chevron-left text-xs md:text-sm"></i>
            </button>
            
            <!-- Indicadores Puntos -->
            <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-2">
                @foreach($sliders as $idx => $s)
                    <button @click="activeSlide = {{ $idx }}" 
                            class="h-1.5 sm:h-2 rounded-full transition-all duration-300 cursor-pointer"
                            :class="activeSlide === {{ $idx }} ? 'w-6 sm:w-8 bg-red-600' : 'w-2 bg-white/40 hover:bg-white/70'"
                            aria-label="Slide {{ $idx + 1 }}"></button>
                @endforeach
            </div>

            <!-- Flecha Siguiente -->
            <button @click="next()" class="hidden sm:flex absolute right-3 md:right-6 top-1/2 -translate-y-1/2 z-20 w-9 h-9 md:w-11 md:h-11 rounded-full bg-black/50 hover:bg-red-600 text-white items-center justify-center transition backdrop-blur-sm border border-white/10 shadow-lg cursor-pointer" aria-label="Siguiente">
                <i class="fas fa-chevron-right text-xs md:text-sm"></i>
            </button>
        @endif
    </section>
@endif

