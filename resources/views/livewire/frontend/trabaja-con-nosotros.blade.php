<div class="bg-[#f8f9fa] dark:bg-slate-950 min-h-screen py-10 transition-colors duration-200">
    
    <!-- Breadcrumb -->
    <nav class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
        <ol class="flex items-center space-x-2 text-xs text-slate-500 dark:text-neutral-400 font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-red-600 transition">Inicio</a></li>
            <li><span class="text-slate-300 dark:text-neutral-700">/</span></li>
            <li class="text-slate-900 dark:text-white font-bold">Trabaja con nosotros</li>
        </ol>
    </nav>

    <!-- Header / Hero Section -->
    <header class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-10">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/40 text-red-600 text-xs font-bold uppercase tracking-wider mb-4">
            <i class="fas fa-users"></i>
            <span>Talento Humano en CONSUR</span>
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 dark:text-white font-heading uppercase tracking-tight">
            Trabaja con Nosotros
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base text-slate-600 dark:text-neutral-400 leading-relaxed font-normal">
            En <strong>CONSUR S.A. – Concesionaria Oficial</strong> creemos que las personas son el motor que impulsa nuestro crecimiento. Buscamos talentos apasionados, proactivos y comprometidos para formar parte de nuestro equipo.
        </p>

        <!-- Perks / Pilares CONSUR -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
            <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200/80 dark:border-slate-800 text-center shadow-xs">
                <div class="w-10 h-10 mx-auto rounded-xl bg-red-50 dark:bg-red-950/40 text-red-600 flex items-center justify-center text-lg mb-3">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white text-sm font-heading">Capacitación Continua</h3>
                <p class="text-xs text-slate-500 dark:text-neutral-400 mt-1">Formación oficial con estándares internacionales Toyota.</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200/80 dark:border-slate-800 text-center shadow-xs">
                <div class="w-10 h-10 mx-auto rounded-xl bg-red-50 dark:bg-red-950/40 text-red-600 flex items-center justify-center text-lg mb-3">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white text-sm font-heading">Clima de Confianza</h3>
                <p class="text-xs text-slate-500 dark:text-neutral-400 mt-1">Ambiente de trabajo colaborativo, respetuoso y dinámico.</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200/80 dark:border-slate-800 text-center shadow-xs">
                <div class="w-10 h-10 mx-auto rounded-xl bg-red-50 dark:bg-red-950/40 text-red-600 flex items-center justify-center text-lg mb-3">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="font-bold text-slate-900 dark:text-white text-sm font-heading">Crecimiento y Solidez</h3>
                <p class="text-xs text-slate-500 dark:text-neutral-400 mt-1">Más de 30 años de liderazgo automotriz en el sur del país.</p>
            </div>
        </div>
    </header>

    <!-- Main Application Form Container -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-10 md:p-12 border border-slate-200/90 dark:border-slate-800 shadow-xl space-y-10">

            @if($sentSuccess)
                <!-- Mensaje de Éxito -->
                <div class="text-center py-10 space-y-4">
                    <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 dark:bg-emerald-950/50 text-emerald-600 flex items-center justify-center text-3xl shadow-inner">
                        <i class="fas fa-check"></i>
                    </div>
                    <h2 class="text-2xl font-black text-slate-900 dark:text-white font-heading uppercase">
                        ¡Postulación Recibida con Éxito!
                    </h2>
                    <p class="max-w-lg mx-auto text-sm text-slate-600 dark:text-neutral-300 leading-relaxed">
                        Muchas gracias por tu interés en formar parte de <strong>CONSUR S.A.</strong> Nuestro equipo de Talento Humano revisará tus antecedentes y se pondrá en contacto contigo ante búsquedas laborales afines a tu perfil.
                    </p>
                    <div class="pt-4">
                        <button type="button" 
                                wire:click="$set('sentSuccess', false)" 
                                class="px-6 py-2.5 rounded-xl bg-red-600 text-white font-bold text-xs uppercase tracking-wider hover:bg-red-700 transition shadow-md shadow-red-600/30">
                            Enviar otra postulación
                        </button>
                    </div>
                </div>
            @else
                <form wire:submit="submitApplication" class="space-y-10">

                    <!-- SECCIÓN 1: DATOS PERSONALES -->
                    <div class="space-y-6">
                        <div class="border-b border-slate-200 dark:border-neutral-800 pb-3 flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-black text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                                    1. Datos Personales
                                </h2>
                                <p class="text-xs text-slate-500 dark:text-neutral-400 mt-0.5">
                                    Los campos marcados con <span class="text-red-600 font-bold">*</span> son obligatorios.
                                </p>
                            </div>
                            <span class="text-red-600 font-bold text-xs"><i class="fas fa-id-card text-base"></i></span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Nombres -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Nombres <span class="text-red-600">*</span>
                                </label>
                                <input type="text" 
                                       wire:model="nombres" 
                                       placeholder="Ingresa tus nombres" 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('nombres') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Apellidos -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Apellidos <span class="text-red-600">*</span>
                                </label>
                                <input type="text" 
                                       wire:model="apellidos" 
                                       placeholder="Ingresa tus apellidos" 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('apellidos') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Correo Electrónico -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Correo Electrónico <span class="text-red-600">*</span>
                                </label>
                                <input type="email" 
                                       wire:model="correo" 
                                       placeholder="ejemplo@correo.com" 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('correo') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Ciudad -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Ciudad de Residencia
                                </label>
                                <input type="text" 
                                       wire:model="ciudad" 
                                       placeholder="Ej: Encarnación, Cambyretá, etc." 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('ciudad') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- CI Número -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Cédula de Identidad (CI) <span class="text-red-600">*</span>
                                </label>
                                <input type="text" 
                                       wire:model="cedula" 
                                       placeholder="Número de C.I." 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('cedula') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Celular -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Celular / Teléfono Móvil <span class="text-red-600">*</span>
                                </label>
                                <input type="tel" 
                                       wire:model="celular" 
                                       placeholder="098X XXX XXX" 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('celular') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Línea Baja -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Teléfono Línea Baja
                                </label>
                                <input type="tel" 
                                       wire:model="lineabaja" 
                                       placeholder="(071) 20X XXX" 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('lineabaja') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Cargo al que se postula -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-1">
                                    Cargo al que se postula
                                </label>
                                <input type="text" 
                                       wire:model="cargo" 
                                       placeholder="Ej: Asesor Comercial, Técnico Mecánico..." 
                                       class="w-full text-xs font-semibold px-4 py-3 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none">
                                @error('cargo') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Foto Actual -->
                        <div class="pt-2">
                            <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase mb-2">
                                Foto actual del postulante (Formato .jpg / .png)
                            </label>
                            <div class="flex items-center gap-4">
                                <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50 dark:bg-neutral-800 hover:bg-slate-100 dark:hover:bg-neutral-700 text-slate-700 dark:text-neutral-200 text-xs font-bold transition">
                                    <i class="fas fa-camera text-red-600"></i>
                                    <span>Seleccionar Foto</span>
                                    <input type="file" wire:model="fotoactual" accept=".jpg,.jpeg,.png" class="hidden">
                                </label>
                                @if($fotoactual)
                                    <span class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold flex items-center gap-1">
                                        <i class="fas fa-check-circle"></i> Foto cargada: {{ $fotoactual->getClientOriginalName() }}
                                    </span>
                                @else
                                    <span class="text-xs text-slate-400 dark:text-neutral-500">Ningún archivo seleccionado</span>
                                @endif
                            </div>
                            @error('fotoactual') <span class="text-[11px] text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- SECCIÓN 2: ÁREA DE INTERÉS -->
                    <div class="space-y-6 pt-4 border-t border-slate-200 dark:border-neutral-800">
                        <div class="border-b border-slate-200 dark:border-neutral-800 pb-3 flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-black text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                                    2. Área de Interés
                                </h2>
                                <p class="text-xs text-slate-500 dark:text-neutral-400 mt-0.5">
                                    Marque hasta 2 opciones según su experiencia o perfil. (Seleccionadas: <strong class="text-red-600">{{ count($areainteres) }}</strong>/2)
                                </p>
                            </div>
                            <span class="text-red-600 font-bold text-xs"><i class="fas fa-briefcase text-base"></i></span>
                        </div>

                        <!-- Grilla de Checkboxes / Chips Interactivos -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2.5">
                            @foreach($availableAreas as $area)
                                @php
                                    $isSelected = in_array($area, $areainteres);
                                @endphp
                                <button type="button" 
                                        wire:click="toggleArea('{{ $area }}')"
                                        class="flex items-center justify-between p-3 rounded-xl border text-xs font-bold transition-all text-left {{ $isSelected ? 'border-red-600 bg-red-50 dark:bg-red-950/40 text-red-700 dark:text-red-400 ring-2 ring-red-600/20 shadow-xs' : 'border-slate-200 dark:border-neutral-800 bg-slate-50/60 dark:bg-neutral-800/60 text-slate-700 dark:text-neutral-300 hover:border-slate-300 dark:hover:border-neutral-700 hover:bg-slate-100 dark:hover:bg-neutral-800' }}">
                                    <span>{{ $area }}</span>
                                    <div class="w-4 h-4 rounded-md border flex items-center justify-center text-[10px] {{ $isSelected ? 'bg-red-600 border-red-600 text-white' : 'border-slate-300 dark:border-neutral-600' }}">
                                        @if($isSelected) <i class="fas fa-check"></i> @endif
                                    </div>
                                </button>
                            @endforeach
                        </div>
                        @error('areainteres') <span class="text-[11px] text-red-600 font-semibold block">{{ $message }}</span> @enderror

                        <!-- Observaciones / Carrera Universitaria -->
                        <div class="space-y-1.5 pt-2">
                            <label class="block text-xs font-bold text-slate-700 dark:text-neutral-300 uppercase">
                                Observaciones / Estudios Universitarios
                            </label>
                            <p class="text-[11px] text-slate-500 dark:text-neutral-400">
                                Si estás siguiendo alguna carrera universitaria, favor especificar la carrera, el año y la institución donde se lleva a cabo.
                            </p>
                            <textarea wire:model="observaciones" 
                                      rows="3" 
                                      placeholder="Detalla tu formación académica, cursos realizados, disponibilidad horaria o cualquier observación relevante..." 
                                      class="w-full text-xs font-semibold p-4 rounded-xl border border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800 text-slate-900 dark:text-white focus:bg-white dark:focus:bg-neutral-900 focus:ring-2 focus:ring-red-600/30 focus:border-red-600 transition outline-none"></textarea>
                            @error('observaciones') <span class="text-[11px] text-red-600 font-semibold block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- SECCIÓN 3: DOCUMENTOS (CURRÍCULUM PDF) -->
                    <div class="space-y-6 pt-4 border-t border-slate-200 dark:border-neutral-800">
                        <div class="border-b border-slate-200 dark:border-neutral-800 pb-3 flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-black text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                                    3. Documentos
                                </h2>
                                <p class="text-xs text-slate-500 dark:text-neutral-400 mt-0.5">
                                    Adjunta tu currículum vitae actualizado en formato PDF.
                                </p>
                            </div>
                            <span class="text-red-600 font-bold text-xs"><i class="fas fa-file-pdf text-base"></i></span>
                        </div>

                        <div class="p-6 rounded-2xl border-2 border-dashed border-slate-300 dark:border-neutral-700 bg-slate-50/50 dark:bg-neutral-800/40 text-center hover:bg-slate-50 dark:hover:bg-neutral-800 transition">
                            <i class="fas fa-cloud-arrow-up text-3xl text-red-600 mb-2 block"></i>
                            <p class="text-xs font-bold text-slate-800 dark:text-neutral-200 uppercase">
                                Sube aquí tu currículum en formato .PDF
                            </p>
                            <p class="text-[11px] text-slate-500 dark:text-neutral-400 mt-1 mb-4">
                                Tamaño máximo permitido: 10 MB.
                            </p>

                            <label class="cursor-pointer inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-slate-900 dark:bg-white hover:bg-slate-800 dark:hover:bg-neutral-200 text-white dark:text-slate-900 text-xs font-bold transition shadow-sm">
                                <i class="fas fa-paperclip"></i>
                                <span>Seleccionar Archivo PDF</span>
                                <input type="file" wire:model="curriculum" accept=".pdf" class="hidden">
                            </label>

                            @if($curriculum)
                                <div class="mt-3 text-xs text-emerald-600 dark:text-emerald-400 font-semibold flex items-center justify-center gap-1.5">
                                    <i class="fas fa-file-pdf text-base text-red-600"></i>
                                    <span>Archivo seleccionado: <strong>{{ $curriculum->getClientOriginalName() }}</strong></span>
                                </div>
                            @endif

                            @error('curriculum') 
                                <span class="text-[11px] text-red-600 font-semibold block mt-2">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>

                    <!-- BOTÓN DE ENVÍO -->
                    <div class="pt-4 text-center">
                        <!-- Cloudflare Turnstile Verification -->
                        <x-turnstile model="turnstileToken" theme="auto" action="rrhh" />
                        @error('turnstileToken')
                            <p class="text-xs text-red-600 font-semibold mb-3">{{ $message }}</p>
                        @enderror

                        <button type="submit" 
                                wire:loading.attr="disabled"
                                class="w-full sm:w-auto sm:min-w-[280px] py-4 px-8 rounded-xl bg-red-600 hover:bg-red-700 disabled:opacity-50 text-white font-extrabold text-xs uppercase tracking-widest shadow-xl shadow-red-600/30 transition-all duration-300 inline-flex items-center justify-center gap-2">
                            <span wire:loading.remove><i class="fas fa-paper-plane mr-1"></i> Enviar Postulación</span>
                            <span wire:loading><i class="fas fa-spinner fa-spin mr-1"></i> Enviando postulación...</span>
                        </button>

                        <p class="text-[11px] text-slate-400 dark:text-neutral-500 mt-3">
                            Tus datos personales y antecedentes laborales serán tratados con absoluta confidencialidad bajo las políticas de privacidad de CONSUR S.A.
                        </p>
                    </div>

                </form>
            @endif

        </div>
    </main>

</div>

