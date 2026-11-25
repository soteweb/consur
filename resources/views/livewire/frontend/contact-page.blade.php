<div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors">

    <!-- 1. HERO CABECERA DE CONTACTO -->
    <section class="relative bg-neutral-950 text-white py-16 sm:py-24 overflow-hidden border-b border-neutral-900">
        <div class="absolute inset-0 opacity-25">
            <img src="{{ asset('images/toyota/consursomos.jpg') }}" alt="CONSUR S.A." class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/80 to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-red-600/20 text-red-500 border border-red-500/30 mb-4">
                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                Atención Oficial Directa
            </span>
            <h1 class="text-3xl sm:text-5xl font-light font-heading tracking-tight text-white uppercase">
                Contactate con <span class="font-bold text-white">CONSUR S.A.</span>
            </h1>
            <p class="mt-4 text-sm sm:text-base text-neutral-300 font-light max-w-2xl mx-auto leading-relaxed">
                Estamos a tu disposición para asesorarte en la compra de tu 0 Km, vehículos usados garantizados, servicio posventa oficial y cotización de seguros.
            </p>
        </div>
    </section>

    <!-- 2. CONTENIDO PRINCIPAL: FORMULARIO + DATOS DE SUCURSALES -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

            <!-- COLUMNA IZQUIERDA: FORMULARIO DE CONTACTO / COTIZACIÓN (7 COLS) -->
            <div class="lg:col-span-7 bg-white dark:bg-neutral-900 rounded-3xl p-6 sm:p-10 border border-slate-200/80 dark:border-neutral-800 shadow-xl" data-aos="fade-up">
                <div class="mb-8">
                    <span class="text-xs uppercase font-bold tracking-wider text-red-600">
                        Envianos tu Consulta
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white tracking-tight mt-1">
                        Formulario de Atención Comercial
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-light">
                        Completá tus datos y un asesor se comunicará contigo a la brevedad con la información exacta.
                    </p>
                </div>

                @if($sentSuccess)
                    <div class="p-6 rounded-2xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 text-center space-y-3">
                        <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mx-auto text-xl">
                            <i class="fas fa-check"></i>
                        </div>
                        <h4 class="font-bold text-lg text-slate-900 dark:text-white">¡Mensaje Recibido con Éxito!</h4>
                        <p class="text-xs text-slate-600 dark:text-slate-300 max-w-md mx-auto">
                            Muchas gracias por ponerte en contacto. Nuestro equipo comercial se comunicará contigo por teléfono o WhatsApp para brindarte atención personalizada.
                        </p>
                        <button type="button" wire:click="$set('sentSuccess', false)" class="mt-2 text-xs font-bold text-emerald-700 dark:text-emerald-400 underline">
                            Enviar otra consulta
                        </button>
                    </div>
                @else
                    <form wire:submit="submitContact" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Nombre Completo *</label>
                                <input type="text" wire:model="name" placeholder="Ej: Carlos Benítez" required
                                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-red-600 focus:border-red-600 transition">
                                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Teléfono / WhatsApp *</label>
                                <input type="text" wire:model="phone" placeholder="Ej: +595 981 123 456" required
                                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-red-600 focus:border-red-600 transition">
                                @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Correo Electrónico (Opcional)</label>
                                <input type="email" wire:model="email" placeholder="carlos@correo.com"
                                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-red-600 focus:border-red-600 transition">
                                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Ciudad / Localidad</label>
                                <input type="text" wire:model="city" placeholder="Ej: Encarnación / Posadas / Asunción"
                                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-red-600 focus:border-red-600 transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Departamento / Área de Interés *</label>
                                <select wire:model="department" required
                                        class="w-full pl-4 pr-10 py-2.5 bg-slate-50 dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-red-600 focus:border-red-600 transition">
                                    <option value="ventas">Ventas 0 KM</option>
                                    <option value="usados">Venta de usados</option>
                                    <option value="brp">BRP (Can-Am / Sea-Doo)</option>
                                    <option value="bike">Ventas de Bicicletas - Consur Bike</option>
                                    <option value="posventa">Servicio Posventa - Reserva de turnos</option>
                                    <option value="repuestos">Servicios y Repuestos</option>
                                    <option value="seguros">Seguros - cotizaciones y asesoramiento</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Modelo de Interés (Opcional)</label>
                                <input type="text" wire:model="vehicleInterest" placeholder="Ej: Hilux SRX, Corolla Cross, Camión Hino..."
                                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-red-600 focus:border-red-600 transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Mensaje o Consulta Detallada</label>
                            <textarea wire:model="message" rows="4" placeholder="Escribí aquí tus dudas, consulta sobre financiación o formas de entrega de usados como parte de pago..."
                                      class="w-full px-4 py-2.5 bg-slate-50 dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-red-600 focus:border-red-600 transition"></textarea>
                            @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Turnstile Cloudflare Captcha -->
                        <div wire:ignore class="my-2">
                            <x-turnstile wire-model="turnstileToken" />
                        </div>
                        @error('turnstileToken') <span class="text-red-500 text-xs block">{{ $message }}</span> @enderror

                        <button type="submit"
                                wire:loading.attr="disabled"
                                class="w-full py-3.5 px-6 rounded-xl bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-bold text-sm uppercase tracking-wider shadow-lg shadow-red-600/30 transition flex items-center justify-center gap-2 cursor-pointer">
                            <span wire:loading.remove><i class="fas fa-paper-plane mr-1"></i> Enviar Mensaje</span>
                            <span wire:loading><i class="fas fa-spinner fa-spin mr-1"></i> Enviando solicitud...</span>
                        </button>
                    </form>
                @endif
            </div>

            <!-- COLUMNA DERECHA: INFORMACIÓN CORPORATIVA & SUCURSALES (5 COLS) -->
            <div class="lg:col-span-5 space-y-6" data-aos="fade-up" data-aos-delay="100">

                <!-- Contact Center & WhatsApp Rápido -->
                <div class="bg-gradient-to-br from-red-600 to-rose-700 text-white rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden">
                    <div class="relative z-10 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/20 text-white">
                            Atención Inmediata
                        </span>
                        <h3 class="text-xl sm:text-2xl font-bold tracking-tight">
                            Canal de Contact Center
                        </h3>
                        <p class="text-xs text-rose-100 font-light leading-relaxed">
                            Atención directa de lunes a viernes y sábados por la mañana para cotizaciones, agendamientos y asesoría técnica.
                        </p>

                        <div class="pt-2 flex flex-col gap-2.5">
                            <a href="https://wa.me/{{ $companyWhatsapp }}?text=Hola%20CONSUR%20S.A.,%20quisiera%20recibir%20información%20comercial"
                               target="_blank"
                               class="inline-flex items-center justify-center gap-2.5 py-3 px-5 rounded-xl bg-white text-red-600 hover:bg-rose-50 font-bold text-sm shadow-md transition">
                                <i class="fab fa-whatsapp text-lg text-emerald-500"></i>
                                <span>Chatear por WhatsApp Oficial</span>
                            </a>
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $companyPhone) }}"
                               class="inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-red-700/60 hover:bg-red-700 text-white font-medium text-xs border border-white/20 transition">
                                <i class="fas fa-phone-alt"></i>
                                <span>Llamar al {{ $companyPhone }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sucursales Físicas -->
                @foreach($branches as $b)
                    <div class="bg-white dark:bg-neutral-900 rounded-3xl p-6 border border-slate-200/80 dark:border-neutral-800 shadow-md space-y-3.5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest uppercase text-red-600">
                                    {{ $b->city }}
                                </span>
                                <h4 class="text-base font-bold text-slate-900 dark:text-white">
                                    {{ $b->name }}
                                </h4>
                            </div>
                            <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-neutral-800 text-red-600 flex items-center justify-center text-xs flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>

                        <p class="text-xs text-slate-600 dark:text-slate-400 flex items-start gap-2">
                            <i class="fas fa-location-arrow text-slate-400 mt-0.5 text-[10px]"></i>
                            <span>{{ $b->address }}</span>
                        </p>

                        @if($b->phone)
                            <p class="text-xs text-slate-600 dark:text-slate-400 flex items-center gap-2">
                                <i class="fas fa-phone text-slate-400 text-[10px]"></i>
                                <span>{{ $b->phone }}</span>
                            </p>
                        @endif

                        @if($b->schedule_weekdays)
                            <p class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-2 border-t border-slate-100 dark:border-neutral-800 pt-2.5">
                                <i class="far fa-clock text-slate-400 text-[10px]"></i>
                                <span>{{ $b->schedule_weekdays }}</span>
                            </p>
                        @endif

                        @if($b->google_maps_url)
                            <a href="{{ $b->google_maps_url }}" target="_blank"
                               class="inline-flex items-center gap-1.5 text-xs font-bold text-red-600 hover:text-red-700 transition pt-1">
                                <span>Cómo llegar en Google Maps</span>
                                <i class="fas fa-external-link-alt text-[10px]"></i>
                            </a>
                        @endif
                    </div>
                @endforeach

            </div>

        </div>
    </section>

</div>

