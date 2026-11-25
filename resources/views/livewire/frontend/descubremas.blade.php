<div class="bg-white text-slate-800">
    <!-- ================= 1. HERO HEADER ================= -->
    <section class="relative bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white overflow-hidden py-16 md:py-24 border-b border-slate-800">
        <!-- Fondos decorativos sutiles -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-red-600/30 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-red-700/20 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-600/10 border border-red-500/30 text-red-400 text-xs font-semibold uppercase tracking-widest" data-aos="fade-down">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                <span>CONSUR S.A. • Concesionaria Oficial</span>
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-light text-white font-heading tracking-tight uppercase" data-aos="fade-up">
                Centro de <span class="text-red-500 font-semibold">Información</span>
            </h1>

            <p class="text-lg sm:text-xl text-neutral-200 font-medium max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                ¡Gracias por elegir CONSUR!
            </p>

            <p class="text-sm sm:text-base text-neutral-400 font-light max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="150">
                A partir del momento que usted adquiere nuestras unidades o nuestros servicios, empieza una relación donde siempre va a encontrarse acompañado.
            </p>
        </div>
    </section>

    <!-- ================= 2. RECUERDE: GARANTÍA & MANTENIMIENTO ================= -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                <!-- Columna de texto -->
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-block px-3 py-1 bg-red-50 border border-red-100 rounded-full text-xs font-semibold uppercase tracking-wider text-red-600">
                        Garantía Oficial Toyota
                    </div>

                    <h2 class="text-2xl sm:text-3xl font-light text-[#b31f26] font-heading tracking-tight leading-tight uppercase">
                        Recuerde
                    </h2>

                    <div class="space-y-4 text-slate-700 text-sm sm:text-base leading-relaxed">
                        <p>
                            Su vehículo tiene una garantía otorgada por <strong>Toyota Motor Corporation</strong> de <span class="font-semibold text-slate-900">3 años o 100.000 kms</span>.
                        </p>
                        <p>
                            Acuda a nuestro taller oficial más cercano para realizar el mantenimiento de su vehículo con repuestos genuinos y técnicos certificados.
                        </p>
                    </div>

                    <!-- Cuadro de frecuencias de mantenimiento -->
                    <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-5 sm:p-6 space-y-4">
                        <h4 class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-slate-900 font-heading">
                            Los mantenimientos deben ser realizados a los:
                        </h4>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div class="bg-white p-3.5 rounded-xl border border-slate-200/60 shadow-xs flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-100 text-[#b31f26] flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                                <span class="font-semibold text-slate-900 text-sm">1.000 kms</span>
                            </div>
                            <div class="bg-white p-3.5 rounded-xl border border-slate-200/60 shadow-xs flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-100 text-[#b31f26] flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                                <span class="font-semibold text-slate-900 text-sm">5.000 kms</span>
                            </div>
                            <div class="bg-white p-3.5 rounded-xl border border-slate-200/60 shadow-xs flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-100 text-[#b31f26] flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                                <span class="font-semibold text-slate-900 text-sm">Cada 5.000 kms</span>
                            </div>
                        </div>

                        <p class="text-xs text-slate-500 italic">
                            * De acuerdo al plan de mantenimiento establecido por fábrica.
                        </p>
                    </div>

                    <div>
                        <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., me contacto desde el Centro de Información para agendar el mantenimiento oficial de mi Toyota.') }}" 
                           target="_blank" 
                           class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-6 py-3.5 bg-[#b31f26] hover:bg-[#91161c] text-white font-medium text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-red-900/10">
                            <i class="fab fa-whatsapp text-base"></i>
                            <span>Agendar Mantenimiento Oficial</span>
                        </a>
                    </div>
                </div>

                <!-- Columna de imagen -->
                <div class="lg:col-span-6" data-aos="fade-left">
                    <div class="relative rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 group">
                        <img src="{{ asset('images/descubremas/boxexpress.jpg') }}" 
                             alt="Taller y Box Express CONSUR Toyota" 
                             class="w-full h-auto object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex items-end p-5 sm:p-6">
                            <div class="text-white">
                                <span class="text-xs uppercase font-medium tracking-widest text-red-400">Servicio Posventa Oficial</span>
                                <p class="text-base sm:text-lg font-medium text-white">Boxes Express y Taller Certificado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 3. TALLER MÓVIL ================= -->
    <section class="py-12 md:py-20 bg-slate-50 border-y border-slate-200/80">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                <!-- Columna de imagen -->
                <div class="lg:col-span-6 order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-white group">
                        <img src="{{ asset('images/descubremas/tallermovilmejorado.jpg') }}" 
                             alt="Taller Móvil CONSUR S.A." 
                             class="w-full h-auto object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex items-end p-5 sm:p-6">
                            <div class="text-white">
                                <span class="text-xs uppercase font-medium tracking-widest text-amber-400">Servicio Express Domiciliario</span>
                                <p class="text-base sm:text-lg font-medium text-white">CONSUR Taller Móvil • Donde estés</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna de texto -->
                <div class="lg:col-span-6 order-1 lg:order-2 space-y-6" data-aos="fade-left">
                    <div class="inline-block px-3 py-1 bg-amber-50 border border-amber-200 rounded-full text-xs font-semibold uppercase tracking-wider text-amber-800">
                        Comodidad &amp; Tiempo Valioso
                    </div>

                    <h2 class="text-2xl sm:text-3xl font-light text-[#b31f26] font-heading tracking-tight leading-tight uppercase">
                        Taller Móvil
                    </h2>

                    <div class="space-y-4 text-slate-700 text-sm sm:text-base leading-relaxed">
                        <p>
                            En <strong>Consur</strong> siempre buscamos formas de hacer tu vida más sencilla, porque sabemos que tu tiempo es valioso.
                        </p>
                        <p>
                            ¿Agenda apretada? No hay problema. Ofrecemos <strong>mantenimiento express</strong> para tu Toyota en la ubicación que prefieras: en tu casa o en tu lugar de trabajo. Así de fácil, así de eficiente.
                        </p>
                    </div>

                    <!-- Áreas incluidas -->
                    <div class="bg-white border-l-4 border-[#b31f26] p-5 rounded-r-2xl border-y border-r border-slate-200/80 shadow-xs space-y-3">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-900 block font-heading">
                            Áreas y Componentes Incluidos:
                        </span>
                        
                        <div class="flex flex-wrap gap-2 text-xs font-medium text-slate-700">
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Transmisión</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Manejo Motor</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Llantas</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Luces</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Interior</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Suspensión</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Exterior</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Frenos</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Refrigeración</span>
                            <span class="px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200">Cubiertas</span>
                        </div>
                    </div>

                    <div>
                        <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., me contacto desde el Centro de Información para coordinar el servicio de Taller Móvil.') }}" 
                           target="_blank" 
                           class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-6 py-3.5 bg-slate-900 hover:bg-black text-white font-medium text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-slate-900/10">
                            <i class="fab fa-whatsapp text-emerald-400 text-base"></i>
                            <span>Solicitar Taller Móvil Express</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 4. CONTÁCTENOS: CANALES DIRECTOS ================= -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <div class="text-center space-y-3">
                <span class="text-xs uppercase font-medium tracking-widest text-red-600">Atención Personalizada</span>
                <h2 class="text-2xl sm:text-3xl font-light text-[#b31f26] font-heading tracking-tight uppercase">
                    Contáctenos
                </h2>
                <p class="text-slate-600 text-sm sm:text-base max-w-xl mx-auto font-light">
                    Seleccione el área con la que desea comunicarse para recibir respuesta inmediata.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <!-- Tarjeta 1: Citas -->
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., quisiera agendar una cita o mantenimiento oficial.') }}" 
                   target="_blank" 
                   class="group bg-slate-50 hover:bg-red-50/50 border border-slate-200 hover:border-red-200 rounded-2xl p-6 text-center transition-all duration-300 hover:shadow-lg flex flex-col items-center justify-between space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-white border border-slate-200 group-hover:border-red-300 flex items-center justify-center text-[#b31f26] text-xl shadow-xs transition group-hover:scale-110">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-900 font-heading">
                            Citas
                        </h3>
                        <p class="text-sm font-bold text-[#b31f26] font-mono">
                            {{ $displayWhatsapp }}
                        </p>
                        <p class="text-xs text-slate-500">Agendamiento de taller y servicios</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 group-hover:underline">
                        <i class="fab fa-whatsapp"></i> Chatea con nosotros
                    </span>
                </a>

                <!-- Tarjeta 2: Escrituraciones -->
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., me comunico para consultar sobre escrituración y documentos de mi vehículo.') }}" 
                   target="_blank" 
                   class="group bg-slate-50 hover:bg-red-50/50 border border-slate-200 hover:border-red-200 rounded-2xl p-6 text-center transition-all duration-300 hover:shadow-lg flex flex-col items-center justify-between space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-white border border-slate-200 group-hover:border-red-300 flex items-center justify-center text-[#b31f26] text-xl shadow-xs transition group-hover:scale-110">
                        <i class="far fa-file-lines"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-900 font-heading">
                            Escrituraciones
                        </h3>
                        <p class="text-sm font-bold text-[#b31f26] font-mono">
                            {{ $displayWhatsapp }}
                        </p>
                        <p class="text-xs text-slate-500">Trámites, títulos y transferencias</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 group-hover:underline">
                        <i class="fab fa-whatsapp"></i> Chatea con nosotros
                    </span>
                </a>

                <!-- Tarjeta 3: Cobranzas -->
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., me comunico con el departamento de cobranzas para consultar sobre pagos o estado de cuenta.') }}" 
                   target="_blank" 
                   class="group bg-slate-50 hover:bg-red-50/50 border border-slate-200 hover:border-red-200 rounded-2xl p-6 text-center transition-all duration-300 hover:shadow-lg flex flex-col items-center justify-between space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-white border border-slate-200 group-hover:border-red-300 flex items-center justify-center text-[#b31f26] text-xl shadow-xs transition group-hover:scale-110">
                        <i class="far fa-credit-card"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-900 font-heading">
                            Cobranzas
                        </h3>
                        <p class="text-sm font-bold text-[#b31f26] font-mono">
                            {{ $displayWhatsapp }}
                        </p>
                        <p class="text-xs text-slate-500">Pagos, cuotas y estados de cuenta</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 group-hover:underline">
                        <i class="fab fa-whatsapp"></i> Chatea con nosotros
                    </span>
                </a>

                <!-- Tarjeta 4: Casa Central -->
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., quisiera comunicarme con Casa Central para una consulta general.') }}" 
                   target="_blank" 
                   class="group bg-slate-50 hover:bg-red-50/50 border border-slate-200 hover:border-red-200 rounded-2xl p-6 text-center transition-all duration-300 hover:shadow-lg flex flex-col items-center justify-between space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-white border border-slate-200 group-hover:border-red-300 flex items-center justify-center text-[#b31f26] text-xl shadow-xs transition group-hover:scale-110">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-900 font-heading">
                            Casa Central
                        </h3>
                        <p class="text-sm font-bold text-[#b31f26] font-mono">
                            {{ $displayWhatsapp }}
                        </p>
                        <p class="text-xs text-slate-500">Atención institucional y consultas</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 group-hover:underline">
                        <i class="fab fa-whatsapp"></i> Chatea con nosotros
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ================= 5. SUCURSALES & MAPAS INTERACTIVOS ================= -->
    <section class="py-12 md:py-20 bg-slate-50 border-t border-slate-200/80">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <div class="text-center space-y-3">
                <span class="text-xs uppercase font-medium tracking-widest text-red-600">Presencia Regional</span>
                <h2 class="text-2xl sm:text-3xl font-light text-[#b31f26] font-heading tracking-tight uppercase">
                    Red de Sucursales
                </h2>
                <p class="text-slate-600 text-sm sm:text-base max-w-xl mx-auto font-light">
                    Encuentre la casa oficial de CONSUR más cercana a su localidad.
                </p>
            </div>

            <!-- Botones / Pestañas de Selección (Touch friendly) -->
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3">
                @foreach($branches as $branch)
                    <button wire:click="selectBranch({{ $branch->id }})" 
                            type="button" 
                            class="px-4 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 flex items-center gap-2 {{ $selectedBranchId === (int)$branch->id ? 'bg-[#b31f26] text-white shadow-md shadow-red-900/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' }}">
                        <i class="fas fa-map-marker-alt {{ $selectedBranchId === (int)$branch->id ? 'text-white' : 'text-red-500' }}"></i>
                        <span>{{ $branch->city ?: $branch->name }}</span>
                    </button>
                @endforeach
            </div>

            <!-- Contenedor de la Sucursal Seleccionada -->
            @if($selectedBranch)
                <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-10 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-8 items-center" wire:key="branch-{{ $selectedBranch->id }}">
                    <!-- Información de la Sucursal -->
                    <div class="lg:col-span-5 space-y-6">
                        <div class="space-y-2">
                            <span class="text-xs uppercase font-semibold tracking-wider text-red-600">
                                {{ $selectedBranch->city ?? 'Sucursal Oficial' }}
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-light text-slate-900 font-heading">
                                {{ $selectedBranch->name }}
                            </h3>
                        </div>

                        <div class="space-y-4 text-sm text-slate-600">
                            <div class="flex items-start gap-3">
                                <span class="w-8 h-8 rounded-lg bg-red-50 text-[#b31f26] flex items-center justify-center shrink-0 text-sm mt-0.5">
                                    <i class="fas fa-map-pin"></i>
                                </span>
                                <div>
                                    <span class="block text-xs font-semibold uppercase tracking-wider text-slate-900">Dirección</span>
                                    <p class="text-slate-700 mt-0.5">{{ $selectedBranch->address }}</p>
                                </div>
                            </div>

                            @if($selectedBranch->phone)
                                <div class="flex items-start gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-red-50 text-[#b31f26] flex items-center justify-center shrink-0 text-sm mt-0.5">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <div>
                                        <span class="block text-xs font-semibold uppercase tracking-wider text-slate-900">Teléfono</span>
                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $selectedBranch->phone) }}" class="text-slate-800 hover:text-[#b31f26] font-medium font-mono mt-0.5 inline-block">
                                            {{ $selectedBranch->phone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($selectedBranch->email)
                                <div class="flex items-start gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-red-50 text-[#b31f26] flex items-center justify-center shrink-0 text-sm mt-0.5">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <div>
                                        <span class="block text-xs font-semibold uppercase tracking-wider text-slate-900">Correo Electrónico</span>
                                        <a href="mailto:{{ $selectedBranch->email }}" class="text-slate-800 hover:text-[#b31f26] font-medium mt-0.5 inline-block break-all">
                                            {{ $selectedBranch->email }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 flex flex-col sm:flex-row gap-3">
                            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., quisiera consultar con la ' . $selectedBranch->name . ' en ' . $selectedBranch->city . '.') }}" 
                               target="_blank" 
                               class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-[#b31f26] hover:bg-[#91161c] text-white font-medium text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-red-900/10">
                                <i class="fab fa-whatsapp text-base"></i>
                                <span>Contactar Sucursal</span>
                            </a>
                        </div>
                    </div>

                    <!-- Mapa de Google Embebido -->
                    <div class="lg:col-span-7">
                        <div class="w-full h-72 sm:h-96 rounded-2xl overflow-hidden border border-slate-200 shadow-inner bg-slate-100">
                            @if($selectedBranch->google_maps_url)
                                <iframe src="{{ $selectedBranch->google_maps_url }}" 
                                        class="w-full h-full border-0" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade" 
                                        allowfullscreen></iframe>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-sm">
                                    Mapa no disponible
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Horarios de Atención Oficiales -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 sm:p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="space-y-1 text-center md:text-left">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#b31f26] block">
                        Horario de Atención en Casa Matriz y Sucursales:
                    </span>
                    <p class="text-slate-800 text-sm sm:text-base font-medium">
                        Lunes a Viernes: 7:00 a 12:00 • 14:00 a 17:00
                    </p>
                    <p class="text-slate-600 text-xs sm:text-sm">
                        Sábados: 7:30 a 12:00
                    </p>
                </div>

                <div class="shrink-0">
                    <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hola CONSUR S.A., tengo una consulta.') }}" 
                       target="_blank" 
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-emerald-600/20">
                        <i class="fab fa-whatsapp text-base"></i>
                        <span>Asistente en Línea</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
