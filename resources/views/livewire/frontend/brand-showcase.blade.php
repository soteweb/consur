<div>
    <!-- 1. Hero Banner Oficial de la Marca -->
    <section class="relative bg-neutral-950 text-white overflow-hidden py-16 sm:py-20 md:py-24 border-b border-neutral-800">
        <!-- Fondo con Banner o Gradiente Sutil -->
        <div class="absolute inset-0 z-0">
            @if($brand->banner_image)
                <img src="{{ $brand->banner_image }}" alt="{{ $brand->name }}" class="w-full h-full object-cover opacity-20">
            @else
                <div class="w-full h-full bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-neutral-800 via-neutral-950 to-black opacity-90"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs text-neutral-400 mb-6 font-normal">
                <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a>
                <span class="text-neutral-600">/</span>
                <span class="text-neutral-400">Marcas Oficiales</span>
                <span class="text-neutral-600">/</span>
                <span class="text-[#eb0a1e] font-medium">{{ $brand->name }}</span>
            </nav>

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
                <!-- Marca Info & Logo -->
                <div class="space-y-4 max-w-3xl" data-aos="fade-right">
                    <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md px-3.5 py-1.5 rounded-full border border-white/10">
                        <span class="w-2 h-2 rounded-full bg-[#eb0a1e] animate-pulse"></span>
                        <span class="text-[11px] uppercase tracking-widest text-neutral-200 font-medium">Línea Oficial CONSUR S.A.</span>
                    </div>

                    <div class="flex items-center gap-5 pt-1">
                        <div class="bg-white rounded-2xl p-3 shadow-lg border border-neutral-200/20 flex items-center justify-center w-20 h-20 sm:w-24 sm:h-24 flex-shrink-0">
                            <img src="{{ $brand->logo_src }}" alt="{{ $brand->name }}" class="max-h-16 max-w-full object-contain">
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-tight font-heading">
                                {{ $brand->name }}
                            </h1>
                            @if($brand->tagline)
                                <p class="text-sm sm:text-base text-neutral-300 font-light mt-1">
                                    {{ $brand->tagline }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <p class="text-sm sm:text-base text-neutral-400 font-light leading-relaxed max-w-2xl pt-2">
                        {{ $brand->description ?: 'Descubrí los modelos, innovaciones y el respaldo posventa oficial que ofrece CONSUR S.A. en Paraguay con la calidad y trayectoria que nos caracteriza.' }}
                    </p>
                </div>

                <!-- Botones de Acción Rápidos -->
                <div class="flex flex-wrap sm:flex-col gap-3 w-full sm:w-auto flex-shrink-0" data-aos="fade-left" data-aos-delay="150">
                    <a href="#catalogo" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#eb0a1e] hover:bg-[#d0091a] text-white px-6 py-3 rounded-full text-xs uppercase tracking-wider font-semibold transition-all shadow-md">
                        <i class="fas fa-eye text-xs"></i> Ver Catálogo
                    </a>
                    <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20quisiera%20solicitar%20asesoramiento%20y%20precios%20de%20{{ urlencode($brand->name) }}" 
                       target="_blank" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white border border-white/20 px-6 py-3 rounded-full text-xs uppercase tracking-wider font-semibold transition-all backdrop-blur-sm">
                        <i class="fab fa-whatsapp text-emerald-400 text-sm"></i> Asesor Especializado
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Vitrina de Modelos / Catálogo Oficial -->
    <section id="catalogo" class="py-16 md:py-24 bg-white dark:bg-slate-950 relative overflow-hidden select-none transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Título de Sección -->
            <div class="text-center mb-8 md:mb-12" data-aos="fade-up">
                <span class="text-xs font-semibold uppercase tracking-widest text-[#eb0a1e] block mb-2">Showroom Oficial</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-neutral-900 dark:text-white tracking-normal font-heading">
                    Modelos y Gama {{ $brand->name }}
                </h2>
                <p class="text-sm text-neutral-500 dark:text-neutral-400 font-light mt-2 max-w-2xl mx-auto">
                    Conocé cada detalle, equipamiento y prestaciones diseñadas para superar tus expectativas.
                </p>
            </div>

            <!-- Tabs de Categoría si existen categorías para esta marca -->
            @if($categories->count() > 1)
                <div class="flex items-center justify-center mb-12">
                    <div class="flex items-center gap-6 sm:gap-10 overflow-x-auto no-scrollbar px-2 pb-1">
                        <button wire:click="selectCategory('all')"
                                type="button"
                                class="group relative pb-2.5 text-sm tracking-wide transition-all duration-200 whitespace-nowrap {{ $selectedCategory === 'all' ? 'font-medium text-neutral-900 dark:text-white' : 'font-normal text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white' }}">
                            <span>Todos</span>
                            @if($selectedCategory === 'all')
                                <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-[#eb0a1e] rounded-full"></span>
                            @endif
                        </button>
                        @foreach($categories as $cat)
                            <button wire:click="selectCategory('{{ $cat->slug }}')"
                                    type="button"
                                    class="group relative pb-2.5 text-sm tracking-wide transition-all duration-200 whitespace-nowrap {{ $selectedCategory === $cat->slug ? 'font-medium text-neutral-900 dark:text-white' : 'font-normal text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white' }}">
                                <span>{{ $cat->name }}</span>
                                @if($selectedCategory === $cat->slug)
                                    <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-[#eb0a1e] rounded-full"></span>
                                @else
                                    <span class="absolute bottom-0 left-0 right-0 h-[2.5px] bg-transparent group-hover:bg-slate-200 dark:group-hover:bg-neutral-800 rounded-full transition-all"></span>
                                @endif
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Caso A: Vehículos registrados en Base de Datos -->
            @if($vehicles->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($vehicles as $veh)
                        <div class="bg-neutral-50 dark:bg-[#111318] hover:bg-white dark:hover:bg-[#161820] rounded-3xl p-6 border border-neutral-100 dark:border-neutral-800 hover:border-neutral-200 dark:hover:border-neutral-700 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group"
                             data-aos="fade-up"
                             data-aos-delay="{{ ($loop->index % 6) * 60 }}">
                            <div>
                                <!-- Imagen del Vehículo -->
                                <div class="relative w-full h-48 flex items-center justify-center overflow-hidden mb-4 bg-white dark:bg-neutral-900 rounded-2xl p-2">
                                    <img src="{{ $veh->primary_image_url }}" 
                                         alt="{{ $veh->full_name }}" 
                                         class="max-h-44 w-auto max-w-full object-contain filter drop-shadow-sm transition-transform duration-300 group-hover:scale-105">
                                    <span class="absolute top-2 right-2 bg-[#eb0a1e] text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">
                                        {{ $veh->condition === '0km' ? '0 KM' : 'USADO' }}
                                    </span>
                                </div>

                                <!-- Datos Principales -->
                                <h3 class="text-lg font-semibold uppercase tracking-wider text-neutral-900 dark:text-white font-heading group-hover:text-[#eb0a1e] transition-colors">
                                    {{ $veh->model }}
                                </h3>
                                @if($veh->version)
                                    <p class="text-xs text-neutral-500 dark:text-neutral-400 font-medium">{{ $veh->version }}</p>
                                @endif

                                @if($veh->tagline)
                                    <p class="text-xs text-neutral-400 font-light mt-2 line-clamp-2">{{ $veh->tagline }}</p>
                                @endif

                                <!-- Precio -->
                                <div class="mt-4 pt-3 border-t border-neutral-200/60 dark:border-neutral-800 flex items-center justify-between">
                                    <div>
                                        <span class="text-[10px] uppercase font-bold text-neutral-400 dark:text-neutral-500 block tracking-wider">Precio</span>
                                        @if($veh->show_price && $veh->price_usd)
                                            <span class="text-base font-bold text-neutral-900 dark:text-white">USD {{ number_format($veh->price_usd, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">Consultar precio</span>
                                        @endif
                                    </div>
                                    <span class="text-xs text-neutral-400">{{ $veh->year }}</span>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="mt-6 pt-4 border-t border-neutral-100 dark:border-neutral-800 flex items-center gap-2">
                                <a href="{{ route('vehiculo.detalle', $veh->slug) }}" 
                                   class="flex-1 text-center bg-white dark:bg-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-700 text-neutral-900 dark:text-white border border-neutral-200 dark:border-neutral-700 py-2.5 rounded-full text-xs font-semibold uppercase tracking-wider transition">
                                    Ver Detalle
                                </a>
                                <button type="button" 
                                        @click="document.getElementById('cotizar').scrollIntoView({ behavior: 'smooth' })" 
                                        class="flex-1 text-center bg-[#eb0a1e] hover:bg-[#d0091a] text-white py-2.5 rounded-full text-xs font-semibold uppercase tracking-wider transition">
                                    Cotizar
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            <!-- Caso B: Vitrina Referencial de Modelos Oficiales de la Marca -->
            @elseif(!empty($fallbackShowcase))
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($fallbackShowcase as $item)
                        <div class="bg-neutral-50/80 dark:bg-[#111318] hover:bg-white dark:hover:bg-[#161820] rounded-3xl p-6 sm:p-7 border border-neutral-100 dark:border-neutral-800 hover:border-neutral-200 dark:hover:border-neutral-700 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <!-- Imagen Referencial en marco elegante -->
                                <div class="relative w-full h-48 rounded-2xl overflow-hidden bg-neutral-200 dark:bg-neutral-900 mb-5">
                                    <img src="{{ $item['image'] }}" 
                                         alt="{{ $item['name'] }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                    <span class="absolute top-3 right-3 bg-[#eb0a1e] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                        {{ $item['badge'] }}
                                    </span>
                                    <span class="absolute bottom-3 left-3 text-xs text-white/90 font-medium">
                                        {{ $item['category'] }}
                                    </span>
                                </div>

                                <!-- Nombre y Tagline -->
                                <h3 class="text-xl font-bold uppercase tracking-wider text-neutral-900 dark:text-white font-heading group-hover:text-[#eb0a1e] transition-colors">
                                    {{ $item['name'] }}
                                </h3>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400 font-normal mt-1">
                                    {{ $item['tagline'] }}
                                </p>

                                <!-- Características Clave -->
                                <div class="mt-4 pt-4 border-t border-neutral-200/60 dark:border-neutral-800 space-y-2">
                                    <span class="text-[10px] uppercase font-bold tracking-widest text-neutral-400 dark:text-neutral-500 block">Equipamiento Destacado:</span>
                                    <ul class="text-xs text-neutral-600 dark:text-neutral-300 space-y-1.5 font-light">
                                        @foreach($item['features'] as $feat)
                                            <li class="flex items-center gap-2">
                                                <i class="fas fa-check text-[#eb0a1e] text-[10px]"></i>
                                                <span>{{ $feat }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="mt-6 pt-5 border-t border-neutral-200/60 dark:border-neutral-800 flex items-center gap-3">
                                <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20quisiera%20solicitar%20información%20y%20precios%20de%20{{ urlencode($item['name']) }}" 
                                   target="_blank"
                                   class="flex-1 text-center bg-[#eb0a1e] hover:bg-[#d0091a] text-white py-3 rounded-full text-xs font-semibold uppercase tracking-wider transition shadow-sm flex items-center justify-center gap-1.5">
                                    <i class="fab fa-whatsapp text-sm"></i> Cotizar Modelo
                                </a>
                                <button type="button" 
                                        @click="document.getElementById('cotizar').scrollIntoView({ behavior: 'smooth' })" 
                                        class="px-4 py-3 bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 text-neutral-700 dark:text-neutral-200 rounded-full text-xs font-semibold uppercase tracking-wider transition">
                                    Ficha
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            <!-- Caso C: Sin items cargados -->
            @else
                <div class="text-center py-16 bg-neutral-50 dark:bg-[#111318] rounded-3xl border border-neutral-200/60 dark:border-neutral-800 max-w-2xl mx-auto p-8">
                    <div class="w-16 h-16 bg-neutral-200 dark:bg-neutral-800 rounded-full flex items-center justify-center mx-auto mb-4 text-neutral-400">
                        <i class="fas fa-car-side text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-neutral-800 dark:text-white">Catálogo en Actualización</h3>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-2 leading-relaxed">
                        Estamos actualizando los modelos disponibles de {{ $brand->name }}. Podés consultar disponibilidad y precios directamente con nuestros asesores comerciales.
                    </p>
                    <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%20S.A.,%20quisiera%20consultar%20por%20modelos%20de%20{{ urlencode($brand->name) }}" 
                       target="_blank" 
                       class="mt-6 inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-xs uppercase tracking-wider font-semibold px-6 py-2.5 rounded-full shadow-sm hover:bg-[#d0091a] transition">
                        <i class="fab fa-whatsapp text-sm"></i> Consultar Disponibilidad
                    </a>
                </div>
            @endif

        </div>
    </section>

    <!-- 3. Ventajas y Respaldo Oficial CONSUR S.A. -->
    <section class="py-16 bg-neutral-50 dark:bg-slate-900 border-y border-neutral-200/70 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-xs font-semibold uppercase tracking-widest text-[#eb0a1e] block mb-2">Respaldo Integral</span>
                <h3 class="text-2xl sm:text-3xl font-light text-neutral-900 dark:text-white tracking-normal font-heading">
                    Por qué elegir {{ $brand->name }} en CONSUR S.A.
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Ventaja 1 -->
                <div class="bg-white dark:bg-slate-950 rounded-2xl p-6 border border-neutral-200/80 dark:border-slate-800 shadow-xs hover:border-[#eb0a1e]/40 transition">
                    <div class="w-12 h-12 rounded-xl bg-red-50 dark:bg-red-950/40 text-[#eb0a1e] flex items-center justify-center text-xl mb-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-neutral-900 dark:text-white font-heading mb-1">Garantía Oficial</h4>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 font-light leading-relaxed">
                        Cuentas con la garantía oficial de fábrica y el respaldo de CONSUR S.A. en todo el territorio paraguayo.
                    </p>
                </div>

                <!-- Ventaja 2 -->
                <div class="bg-white dark:bg-slate-950 rounded-2xl p-6 border border-neutral-200/80 dark:border-slate-800 shadow-xs hover:border-[#eb0a1e]/40 transition">
                    <div class="w-12 h-12 rounded-xl bg-red-50 dark:bg-red-950/40 text-[#eb0a1e] flex items-center justify-center text-xl mb-4">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-neutral-900 dark:text-white font-heading mb-1">Taller y Posventa</h4>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 font-light leading-relaxed">
                        Mantenimiento especializado, repuestos originales y nuestro servicio exclusivo de Taller Móvil a domicilio.
                    </p>
                </div>

                <!-- Ventaja 3 -->
                <div class="bg-white dark:bg-slate-950 rounded-2xl p-6 border border-neutral-200/80 dark:border-slate-800 shadow-xs hover:border-[#eb0a1e]/40 transition">
                    <div class="w-12 h-12 rounded-xl bg-red-50 dark:bg-red-950/40 text-[#eb0a1e] flex items-center justify-center text-xl mb-4">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-neutral-900 dark:text-white font-heading mb-1">Financiación a Medida</h4>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 font-light leading-relaxed">
                        Planes personalizados, crédito propio y alianzas con los principales bancos de plaza con tasas preferenciales.
                    </p>
                </div>

                <!-- Ventaja 4 -->
                <div class="bg-white dark:bg-slate-950 rounded-2xl p-6 border border-neutral-200/80 dark:border-slate-800 shadow-xs hover:border-[#eb0a1e]/40 transition">
                    <div class="w-12 h-12 rounded-xl bg-red-50 dark:bg-red-950/40 text-[#eb0a1e] flex items-center justify-center text-xl mb-4">
                        <i class="fas fa-car"></i>
                    </div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-neutral-900 dark:text-white font-heading mb-1">Tomamos tu Usado</h4>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 font-light leading-relaxed">
                        Tasamos tu vehículo usado al mejor valor del mercado como parte de pago para tu nueva unidad.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Formulario de Cotización Exclusivo de la Marca -->
    <section id="cotizar" class="py-16 md:py-24 bg-white dark:bg-slate-950 relative transition-colors">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-900 text-white rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden border border-slate-800" data-aos="fade-up">
                <!-- Decoración Sutil -->
                <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-[#eb0a1e]/15 blur-3xl pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="text-center max-w-xl mx-auto mb-8">
                        <span class="text-xs font-semibold uppercase tracking-widest text-[#eb0a1e] block mb-2">Atención Personalizada</span>
                        <h3 class="text-2xl sm:text-3xl font-light text-white tracking-normal font-heading">
                            Cotizá tu {{ $brand->name }}
                        </h3>
                        <p class="text-xs sm:text-sm text-neutral-400 font-light mt-2">
                            Completá tus datos y un asesor comercial de CONSUR S.A. te contactará con una propuesta a tu medida.
                        </p>
                    </div>

                    @if($sentSuccess)
                        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-6 rounded-2xl text-center space-y-2 mb-6">
                            <i class="fas fa-check-circle text-3xl text-emerald-400"></i>
                            <h4 class="text-base font-semibold">¡Solicitud recibida con éxito!</h4>
                            <p class="text-xs text-neutral-300">Nos pondremos en contacto contigo a la brevedad.</p>
                        </div>
                    @endif

                    <form wire:submit="submitQuotation" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-neutral-300 mb-1">Nombre y Apellido *</label>
                                <input type="text" wire:model="name" required placeholder="Tu nombre completo" 
                                       class="w-full bg-neutral-800/80 border border-neutral-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-neutral-500 focus:outline-hidden focus:border-[#eb0a1e] focus:ring-1 focus:ring-[#eb0a1e]">
                                @error('name') <span class="text-red-400 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-neutral-300 mb-1">Teléfono / WhatsApp *</label>
                                <input type="tel" wire:model="phone" required placeholder="Ej: 0981 123 456" 
                                       class="w-full bg-neutral-800/80 border border-neutral-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-neutral-500 focus:outline-hidden focus:border-[#eb0a1e] focus:ring-1 focus:ring-[#eb0a1e]">
                                @error('phone') <span class="text-red-400 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-neutral-300 mb-1">Correo Electrónico (Opcional)</label>
                                <input type="email" wire:model="email" placeholder="correo@ejemplo.com" 
                                       class="w-full bg-neutral-800/80 border border-neutral-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-neutral-500 focus:outline-hidden focus:border-[#eb0a1e] focus:ring-1 focus:ring-[#eb0a1e]">
                                @error('email') <span class="text-red-400 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-neutral-300 mb-1">Ciudad / Departamento</label>
                                <input type="text" wire:model="city" placeholder="Ej: Asunción, Encarnación..." 
                                       class="w-full bg-neutral-800/80 border border-neutral-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-neutral-500 focus:outline-hidden focus:border-[#eb0a1e] focus:ring-1 focus:ring-[#eb0a1e]">
                                @error('city') <span class="text-red-400 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-neutral-300 mb-1">Modelo o Servicio de Interés</label>
                            <input type="text" wire:model="vehicleInterest" placeholder="Ej: {{ $brand->name }}" 
                                   class="w-full bg-neutral-800/80 border border-neutral-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-neutral-500 focus:outline-hidden focus:border-[#eb0a1e] focus:ring-1 focus:ring-[#eb0a1e]">
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-neutral-300 mb-1">Mensaje o Consulta Adicional</label>
                            <textarea wire:model="message" rows="3" placeholder="Contanos qué equipamiento o tipo de financiación buscas..." 
                                      class="w-full bg-neutral-800/80 border border-neutral-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-neutral-500 focus:outline-hidden focus:border-[#eb0a1e] focus:ring-1 focus:ring-[#eb0a1e]"></textarea>
                        </div>

                        <div class="text-center pt-2">
                            <button type="submit" 
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#eb0a1e] hover:bg-[#d0091a] text-white px-8 py-3.5 rounded-full text-xs uppercase tracking-wider font-semibold transition-all shadow-lg hover:shadow-red-600/30">
                                <i class="fas fa-paper-plane text-xs"></i> Enviar Solicitud de Cotización
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
