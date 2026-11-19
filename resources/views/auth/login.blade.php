<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Panel Administrativo – CONSUR S.A.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4 bg-slate-950 font-sans selection:bg-red-600 selection:text-white">
    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl space-y-6">
        <!-- Logo Header -->
        <div class="text-center space-y-2">
            <div class="inline-flex items-center gap-2">
                <span class="text-3xl font-black tracking-tight text-white font-heading">
                    CONSUR<span class="text-red-500">.</span>
                </span>
                <span class="text-xs uppercase font-bold tracking-widest bg-red-600 text-white px-2 py-0.5 rounded">
                    TOYOTA
                </span>
            </div>
            <p class="text-xs text-slate-400 font-medium">Plataforma de Gestión Integral Backoffice</p>
        </div>

        @if ($errors->any())
            <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs space-y-1">
                <div class="font-bold flex items-center gap-1.5 text-rose-400">
                    <i class="fas fa-exclamation-circle"></i> Error de Autenticación
                </div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            
            <div>
                <label for="email" class="block text-xs font-semibold text-slate-300 mb-1.5">Correo Electrónico</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-500 text-sm">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email', 'admin@consur.com.py') }}" required autofocus
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-800/80 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#416A8D] focus:border-[#416A8D] placeholder-slate-500 transition"
                           placeholder="nombre@consur.com.py">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-semibold text-slate-300">Contraseña</label>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-500 text-sm">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" required value="admin123"
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-800/80 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#416A8D] focus:border-[#416A8D] placeholder-slate-500 transition"
                           placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center text-slate-400 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-700 bg-slate-800 text-red-600 focus:ring-red-500">
                    <span class="ml-2">Recordar dispositivo</span>
                </label>
            </div>

            <!-- Cloudflare Turnstile Anti-Bot Verification -->
            <x-turnstile action="login" theme="dark" model="" />
            @error('cf-turnstile-response')
                <p class="text-xs text-red-400 text-center font-medium">{{ $message }}</p>
            @enderror

            <button type="submit" 
                    class="w-full py-3 px-4 bg-[#416A8D] hover:bg-[#2c5373] text-white font-bold text-sm rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
                <i class="fas fa-sign-in-alt"></i>
                <span>Ingresar al Sistema</span>
            </button>
        </form>

        @if(app()->isLocal() || config('app.debug'))
        <!-- Acceso Rápido por Roles (Solo Visible en Entornos de Desarrollo) -->
        <div class="pt-4 border-t border-slate-800 space-y-2">
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 text-center">
                Acceso Rápido por Roles (Contraseña: password)
            </p>
            <div class="grid grid-cols-3 gap-2">
                <button type="button" 
                        onclick="document.getElementById('email').value = 'admin@consur.com.py'; document.getElementById('password').value = 'password';"
                        class="p-2 rounded-xl bg-purple-950/60 hover:bg-purple-900 border border-purple-800/60 text-purple-200 text-center text-[10px] font-bold transition">
                    <i class="fas fa-user-shield block text-xs mb-0.5 text-purple-400"></i>
                    Admin
                </button>
                <button type="button" 
                        onclick="document.getElementById('email').value = 'gestor@consur.com.py'; document.getElementById('password').value = 'password';"
                        class="p-2 rounded-xl bg-sky-950/60 hover:bg-sky-900 border border-sky-800/60 text-sky-200 text-center text-[10px] font-bold transition">
                    <i class="fas fa-edit block text-xs mb-0.5 text-sky-400"></i>
                    Gestor
                </button>
                <button type="button" 
                        onclick="document.getElementById('email').value = 'vendedor@consur.com.py'; document.getElementById('password').value = 'password';"
                        class="p-2 rounded-xl bg-emerald-950/60 hover:bg-emerald-900 border border-emerald-800/60 text-emerald-200 text-center text-[10px] font-bold transition">
                    <i class="fas fa-handshake block text-xs mb-0.5 text-emerald-400"></i>
                    Vendedor
                </button>
            </div>
        </div>
        @endif

        <div class="pt-2 text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-white transition flex items-center justify-center gap-1.5">
                <i class="fas fa-arrow-left"></i> Volver a la Web Pública de CONSUR
            </a>
        </div>
    </div>
</body>
</html>
