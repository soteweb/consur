<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña – CONSUR S.A.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col items-center justify-center p-4 sm:p-6 bg-[#f8fafc] font-sans text-slate-800 selection:bg-[#eb0a1e] selection:text-white">

    <div class="w-full max-w-md">
        <!-- Tarjeta Principal de Recuperación -->
        <div class="bg-white border border-slate-200/90 rounded-3xl p-8 sm:p-10 shadow-xl shadow-slate-200/50 space-y-6">

            <!-- Logo Header Oficial -->
            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-block transition hover:opacity-90">
                    <img src="{{ asset('images/logoconsurweb.png') }}" alt="CONSUR S.A." class="h-11 sm:h-12 w-auto mx-auto object-contain">
                </a>
                <h1 class="text-lg font-bold text-slate-900 font-heading mt-4">¿Olvidaste tu contraseña?</h1>
                <p class="text-xs text-slate-500 font-normal leading-relaxed mt-1">
                    Ingresá el correo electrónico asociado a tu cuenta de usuario y te enviaremos las instrucciones para restablecerla.
                </p>
            </div>

            <!-- Alertas de Estado / Enlace Enviado -->
            @if (session('status'))
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-start gap-2.5">
                    <i class="fas fa-check-circle text-emerald-600 text-sm mt-0.5 shrink-0"></i>
                    <span class="leading-relaxed">{{ session('status') }}</span>
                </div>
            @endif

            <!-- Errores de Validación -->
            @if ($errors->any())
                <div class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs space-y-1">
                    <div class="font-bold flex items-center gap-1.5 text-red-800">
                        <i class="fas fa-exclamation-circle text-sm shrink-0"></i>
                        <span>No pudimos procesar la solicitud</span>
                    </div>
                    @foreach ($errors->all() as $error)
                        <p class="text-red-600 pl-5">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Correo Electrónico -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 mb-1.5">
                        Correo Electrónico
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400 text-sm">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               class="w-full pl-10 pr-4 py-3 bg-slate-50/80 border border-slate-300 rounded-xl text-slate-900 text-sm focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#eb0a1e]/20 focus:border-[#eb0a1e] placeholder-slate-400 transition"
                               placeholder="nombre@consur.com.py">
                    </div>
                </div>

                <!-- Verificación Anti-Bot Cloudflare Turnstile -->
                <x-turnstile action="forgot_password" theme="light" model="" />
                @error('cf-turnstile-response')
                    <p class="text-xs text-red-600 text-center font-medium">{{ $message }}</p>
                @enderror

                <!-- Botón de Envío -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3.5 px-4 bg-[#eb0a1e] hover:bg-red-700 active:scale-[0.99] text-white font-bold text-sm rounded-xl shadow-md shadow-red-600/20 transition-all flex items-center justify-center cursor-pointer">
                        <span>Enviar enlace de recuperación</span>
                    </button>
                </div>
            </form>

            <!-- Volver a Iniciar Sesión -->
            <div class="pt-2 text-center border-t border-slate-100">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-600 hover:text-[#eb0a1e] transition">
                    <i class="fas fa-arrow-left text-[11px]"></i>
                    <span>Volver a Iniciar Sesión</span>
                </a>
            </div>
        </div>

        <!-- Pie de página y Créditos Institucionales -->
        <div class="text-center space-y-3 pt-6 px-4">
            <p class="text-xs text-slate-500 leading-relaxed">
                Plataforma Consur &reg; es un producto digital desarrollado por <a href="https://soteweb.com" target="_blank" rel="noopener" class="font-semibold text-slate-700 hover:text-[#eb0a1e] underline underline-offset-2 transition">Soteweb</a> Tecnología
            </p>

            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-slate-700 transition">
                    <i class="fas fa-arrow-left text-[10px]"></i>
                    <span>Volver a la Web de CONSUR</span>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
