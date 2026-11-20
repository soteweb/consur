<div class="oj-theme bg-[#f4f5f7] dark:bg-slate-950 text-[#0d0e0e] dark:text-neutral-100 antialiased overflow-x-hidden selection:bg-consur-red selection:text-white transition-colors"
     x-data="{
         vehicleInterest: @entangle('vehicleInterest'),
         sentSuccess: @entangle('sentSuccess')
     }">

    <!-- Tipografías Oficiales OMODA | JAECOO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-ExtraLight.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-ExtraLight.otf') format('opentype');
            font-weight: 200;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Light.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Light.otf') format('opentype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Normal.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Normal.otf') format('opentype');
            font-weight: 350;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Regular.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Regular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Medium.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Medium.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Medium.otf') format('opentype');
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Bold.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Bold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Source Han Sans HK';
            src: url('/fonts/omoda-jaecoo/SourceHanSansHK-Heavy.otf') format('opentype'),
                 url('https://omodajaecoo.com.py/fonts/SourceHanSansHK-Heavy.otf') format('opentype');
            font-weight: 800;
            font-style: normal;
            font-display: swap;
        }

        .oj-theme,
        .oj-theme .font-display,
        .oj-theme .font-sans,
        .oj-theme button,
        .oj-theme input,
        .oj-theme textarea {
            font-family: 'Source Han Sans HK', 'Noto Sans HK', Arial, sans-serif !important;
        }

        .oj-heading {
            font-family: 'Source Han Sans HK', 'Noto Sans HK', Arial, sans-serif !important;
            font-weight: 200;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            line-height: 1.12;
        }

        /* ── Shimmer btn ── */
        .btn-shimmer {
            background: linear-gradient(90deg, #eb0a1e 0%, #c50016 40%, #eb0a1e 60%, #c50016 100%);
            background-size: 200% 100%;
        }
        .btn-shimmer:hover {
            animation: shimmer 1.4s linear infinite;
        }

        /* ── Dark section cards ── */
        .why-card {
            background: linear-gradient(145deg, rgba(255,255,255,0.045) 0%, rgba(255,255,255,0.015) 100%);
            border: 1px solid rgba(255,255,255,0.08);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        .why-card:hover {
            transform: translateY(-4px);
            border-color: rgba(235,10,30,0.35);
        }

        .spec-card-dark {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            transition: border-color 0.25s, background 0.25s;
        }
        .spec-card-dark:hover {
            background: rgba(255,255,255,0.06);
            border-color: rgba(235,10,30,0.35);
        }

        /* ── Comparison badge ── */
        .badge-best { background: linear-gradient(135deg,#eb0a1e,#c50016); }

        /* ── Light form inputs ── */
        .form-input-light {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #0f172a;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .form-input-light::placeholder { color: #94a3b8; }
        .form-input-light:focus {
            outline: none;
            background: #ffffff;
            border-color: #eb0a1e;
            box-shadow: 0 0 0 3px rgba(235,10,30,0.1);
        }

        /* ── Dark mode card & form overrides (Slate / Deep Titanium) ── */
        .dark .mdl-card {
            background: #0f172a;
            border-color: #1e293b;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }
        .dark .mdl-card__title {
            color: #ffffff;
        }
        .dark .mdl-card__desc {
            color: #94a3b8;
        }
        .dark .form-input-light {
            background: #020617;
            border-color: #1e293b;
            color: #ffffff;
        }
        .dark .form-input-light::placeholder {
            color: #64748b;
        }
        .dark .form-input-light:focus {
            background: #0f172a;
            border-color: #eb0a1e;
        }
        .dark #comparativa {
            background-color: #020617 !important;
            border-color: #1e293b !important;
        }
        .dark #comparativa table td {
            border-color: #1e293b !important;
        }
        .dark #comparativa .text-slate-900 {
            color: #ffffff !important;
        }
        .dark #comparativa .text-slate-500 {
            color: #94a3b8 !important;
        }
        .dark #comparativa .hover\:bg-slate-50\/80:hover {
            background-color: rgba(255,255,255,0.03) !important;
        }
        .dark #comparativa .bg-red-50\/40 {
            background-color: rgba(235,10,30,0.12) !important;
        }
        .dark #cotizacion {
            background-color: #070709 !important;
        }

        /* ── Official Model Cards Hover (Adaptado a sección clara) ── */
        .mdl-card {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            border-radius: 16px;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.07);
            min-height: 410px;
            padding: 24px;
            transition: border-color 0.4s ease, box-shadow 0.4s ease, transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            isolation: isolate;
        }
        .mdl-card:hover {
            border-color: rgba(235, 10, 30, 0.5);
            box-shadow: 0 24px 48px -12px rgba(15, 23, 42, 0.22);
            transform: translateY(-6px);
        }
        .mdl-card__grande {
            position: absolute;
            inset: 0;
            z-index: 1;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.45s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .mdl-card__grande img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .mdl-card:hover .mdl-card__grande {
            opacity: 1;
        }
        .mdl-card:hover .mdl-card__grande img {
            transform: scale(1.05);
        }
        .mdl-card__grande::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(13, 14, 14, 0.15) 0%, rgba(13, 14, 14, 0.55) 50%, rgba(13, 14, 14, 0.92) 100%);
        }
        .mdl-card__img-wrap {
            position: relative;
            z-index: 2;
            width: 100%;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            border-radius: 10px;
            background: #0d0e0e;
            transition: opacity 0.35s ease;
        }
        .mdl-card__img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .mdl-card:hover .mdl-card__img-wrap {
            opacity: 0;
        }
        .mdl-card__texto {
            position: relative;
            z-index: 2;
            margin-top: 22px;
            transition: transform 0.35s ease;
        }
        .mdl-card:hover .mdl-card__texto {
            transform: translateY(-4px);
        }
        .mdl-card__title {
            color: #0d0e0e;
            transition: color 0.35s ease;
        }
        .mdl-card:hover .mdl-card__title {
            color: #ffffff;
        }
        .mdl-card__desc {
            color: #64748b;
            transition: color 0.35s ease;
        }
        .mdl-card:hover .mdl-card__desc {
            color: #e2e8f0;
        }
        .mdl-card__cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: #eb0a1e;
            transition: color 0.3s ease;
            margin-top: 16px;
        }
        .mdl-card:hover .mdl-card__cta {
            color: #ff4d5e;
        }
        .mdl-card__cta i {
            transition: transform 0.3s ease;
        }
        .mdl-card:hover .mdl-card__cta i {
            transform: translateX(5px);
        }
    </style>

    <!-- ═══════════════════════════════════════════════════════════
         1. HERO SECTION (OSCURA - COMPACTA Y MINIMALISTA)
    ═══════════════════════════════════════════════════════════ -->
    <section class="relative min-h-[460px] lg:min-h-[520px] flex items-center overflow-hidden bg-[#0d0e0e]">

        <!-- Background image -->
        <div class="absolute inset-0 z-0">
            <img src="/images/omoda-jaecoo/banner-hero.jpg"
                 onerror="this.src='https://omodajaecoo.com.py/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsiZGF0YSI6NzIsInB1ciI6ImJsb2JfaWQifX0=--f1af5d83f28c0e5ad5dd98ec58f74e5a63d4b365/hero-exterior.jpg'"
                 alt="OMODA & JAECOO Paraguay – CONSUR S.A."
                 class="w-full h-full object-cover object-center opacity-45">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0d0e0e] via-[#0d0e0e]/80 to-[#0d0e0e]/20"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0d0e0e] via-transparent to-[#0d0e0e]/40"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-14 lg:py-20 w-full">
            <div class="max-w-2xl">

                <!-- Eyebrow -->
                <p data-aos="fade-up" data-aos-delay="50" class="text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.3em] text-consur-red mb-4">
                    De lo Clásico &nbsp;·&nbsp; Más Allá de lo Clásico
                </p>

                <!-- Título Principal OMODA -->
                <h1 data-aos="fade-up" data-aos-delay="150" class="oj-heading text-3xl sm:text-5xl lg:text-[52px] text-white mb-5">
                    Una Nueva Era en<br>
                    <span class="font-normal text-white">Movilidad Inteligente</span>
                </h1>

                <p data-aos="fade-up" data-aos-delay="250" class="text-sm sm:text-[15px] text-slate-300 font-light leading-relaxed max-w-lg mb-8">
                    Descubrí la gama oficial <strong class="font-medium text-white">OMODA &amp; JAECOO</strong> en Paraguay con el respaldo de <strong class="font-medium text-white">CONSUR S.A.</strong>
                </p>

                <!-- CTAs -->
                <div data-aos="fade-up" data-aos-delay="350" class="flex flex-wrap gap-3.5">
                    <a href="#modelos"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 btn-shimmer text-white text-[11px] font-semibold uppercase tracking-[0.16em] transition hover:-translate-y-0.5">
                        <span>Explorar modelos</span>
                        <i class="fas fa-arrow-down text-[10px] opacity-80"></i>
                    </a>
                    <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%2C%20quiero%20informaci%C3%B3n%20sobre%20la%20gama%20OMODA%20y%20JAECOO."
                       target="_blank"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-white/[0.06] hover:bg-white/[0.12] text-white border border-white/25 text-[11px] font-semibold uppercase tracking-[0.16em] backdrop-blur-sm transition hover:-translate-y-0.5">
                        <i class="fab fa-whatsapp text-emerald-400 text-sm"></i>
                        <span>Consultar por WhatsApp</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         2. MODELOS (SECCIÓN CLARA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="modelos" class="py-20 sm:py-24 bg-[#f4f5f7] dark:bg-slate-900 text-[#0d0e0e] dark:text-white transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

            <!-- Section header -->
            <div data-aos="fade-up" class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-block text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red mb-3">
                    Gama completa disponible en CONSUR
                </span>
                <h2 class="oj-heading text-3xl sm:text-5xl text-[#0d0e0e] dark:text-white mb-3">
                    Elegí tu <span class="font-normal text-consur-red">vehículo</span>
                </h2>
                <p class="text-sm sm:text-[15px] text-slate-600 dark:text-neutral-400 font-light leading-relaxed">
                    Cuatro modelos, una sola filosofía: ir más allá de lo clásico.
                </p>
            </div>

            <!-- Grilla de modelos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10 max-w-5xl mx-auto">

                <!-- OMODA C5 -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('omoda-jaecoo.model', 'omoda-c5') }}" class="mdl-card group" aria-label="Ver OMODA C5">
                        <div class="mdl-card__grande" aria-hidden="true">
                            <img src="https://omodajaecoo.com.py/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsiZGF0YSI6MSwicHVyIjoiYmxvYl9pZCJ9fQ==--7104b590447f45d9466163ac04d0bd8c31763a11/hero-exterior.jpg" alt="" loading="lazy">
                        </div>
                        <div class="mdl-card__img-wrap">
                            <img src="https://omodajaecoo.com.py/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsiZGF0YSI6MSwicHVyIjoiYmxvYl9pZCJ9fQ==--7104b590447f45d9466163ac04d0bd8c31763a11/hero-exterior.jpg" alt="OMODA C5" loading="lazy">
                        </div>
                        <div class="mdl-card__texto">
                            <h3 class="oj-heading mdl-card__title text-2xl sm:text-3xl">OMODA C5</h3>
                            <p class="mt-2 text-sm mdl-card__desc font-light leading-relaxed">SUV Compacta — Diseño audaz para la ciudad y más allá</p>
                            <span class="mdl-card__cta">
                                Ver modelo <i class="fas fa-arrow-right text-[10px]"></i>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- OMODA E5 -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('omoda-jaecoo.model', 'omoda-e5') }}" class="mdl-card group" aria-label="Ver OMODA E5">
                        <div class="mdl-card__grande" aria-hidden="true">
                            <img src="https://omodajaecoo.com.py/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsiZGF0YSI6MjIsInB1ciI6ImJsb2JfaWQifX0=--aa84b1d6e48b13150e5ad7df9465daf3d15ad728/hero-exterior.jpg" alt="" loading="lazy">
                        </div>
                        <div class="mdl-card__img-wrap">
                            <img src="https://omodajaecoo.com.py/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsiZGF0YSI6MjIsInB1ciI6ImJsb2JfaWQifX0=--aa84b1d6e48b13150e5ad7df9465daf3d15ad728/hero-exterior.jpg" alt="OMODA E5" loading="lazy">
                        </div>
                        <div class="mdl-card__texto">
                            <h3 class="oj-heading mdl-card__title text-2xl sm:text-3xl">OMODA E5</h3>
                            <p class="mt-2 text-sm mdl-card__desc font-light leading-relaxed">SUV Eléctrica — El futuro eléctrico con estilo propio</p>
                            <span class="mdl-card__cta">
                                Ver modelo <i class="fas fa-arrow-right text-[10px]"></i>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- JAECOO J5 -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('omoda-jaecoo.model', 'jaecoo-j5') }}" class="mdl-card group" aria-label="Ver JAECOO J5">
                        <div class="mdl-card__grande" aria-hidden="true">
                            <img src="https://omodajaecoo.com.py/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsiZGF0YSI6MzgsInB1ciI6ImJsb2JfaWQifX0=--34bcf1c2024874d5baa8e9e8791e4780bce9b593/hero-exterior.jpg" alt="" loading="lazy">
                        </div>
                        <div class="mdl-card__img-wrap">
                            <img src="https://omodajaecoo.com.py/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsiZGF0YSI6MzgsInB1ciI6ImJsb2JfaWQifX0=--34bcf1c2024874d5baa8e9e8791e4780bce9b593/hero-exterior.jpg" alt="JAECOO J5" loading="lazy">
                        </div>
                        <div class="mdl-card__texto">
                            <h3 class="oj-heading mdl-card__title text-2xl sm:text-3xl">JAECOO J5</h3>
                            <p class="mt-2 text-sm mdl-card__desc font-light leading-relaxed">SUV Híbrida — Eficiencia autorecargable sin enchufe</p>
                            <span class="mdl-card__cta">
                                Ver modelo <i class="fas fa-arrow-right text-[10px]"></i>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- JAECOO J7 -->
                <div data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('omoda-jaecoo.model', 'jaecoo-j7') }}" class="mdl-card group" aria-label="Ver JAECOO J7">
                        <div class="mdl-card__grande" aria-hidden="true">
                            <img src="/images/omoda-jaecoo/jaecoo-j7-hero.jpg" alt="" loading="lazy">
                        </div>
                        <div class="mdl-card__img-wrap">
                            <img src="/images/omoda-jaecoo/jaecoo-j7-hero.jpg" alt="JAECOO J7" loading="lazy">
                        </div>
                        <div class="mdl-card__texto">
                            <h3 class="oj-heading mdl-card__title text-2xl sm:text-3xl">JAECOO J7</h3>
                            <p class="mt-2 text-sm mdl-card__desc font-light leading-relaxed">SUV Híbrida Enchufable — Lujo y aventura en perfecto equilibrio</p>
                            <span class="mdl-card__cta">
                                Ver modelo <i class="fas fa-arrow-right text-[10px]"></i>
                            </span>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         3. TECNOLOGÍA — PILARES (SECCIÓN OSCURA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="tecnologia" class="py-20 sm:py-24 bg-[#0d0e0e] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

            <div data-aos="fade-up" class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-block text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red mb-3">
                    Innovación de clase mundial
                </span>
                <h2 class="oj-heading text-3xl sm:text-5xl text-white mb-4">
                    La tecnología que <span class="font-normal text-consur-red">te define</span>
                </h2>
                <p class="text-sm sm:text-[15px] text-slate-400 font-light leading-relaxed">
                    Cada vehículo de la gama OMODA &amp; JAECOO fue diseñado para transformar tu experiencia de conducción.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="why-card p-8 rounded-2xl h-full">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-6 bg-consur-red/10 border border-consur-red/20">
                            <i class="fas fa-shapes text-xl text-consur-red"></i>
                        </div>
                        <h4 class="oj-heading text-xl text-white mb-3 !font-normal">Diseño de impacto</h4>
                        <p class="text-sm text-slate-400 font-light leading-relaxed">Líneas atléticas, silueta robusta y detalles que capturan miradas. Una estética que combina el lujo urbano con el carácter off-road y desafía los moldes tradicionales.</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="why-card p-8 rounded-2xl h-full">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-6 bg-sky-500/10 border border-sky-500/20">
                            <i class="fas fa-microchip text-xl text-sky-400"></i>
                        </div>
                        <h4 class="oj-heading text-xl text-white mb-3 !font-normal">Cabina inteligente</h4>
                        <p class="text-sm text-slate-400 font-light leading-relaxed">Pantallas táctiles HD, Apple CarPlay y Android Auto inalámbricos, carga inalámbrica y conectividad total. Un cockpit diseñado para el conductor digital.</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="why-card p-8 rounded-2xl h-full">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-6 bg-emerald-500/10 border border-emerald-500/20">
                            <i class="fas fa-shield-halved text-xl text-emerald-400"></i>
                        </div>
                        <h4 class="oj-heading text-xl text-white mb-3 !font-normal">Seguridad ADAS</h4>
                        <p class="text-sm text-slate-400 font-light leading-relaxed">Monitoreo de punto ciego, frenado autónomo de emergencia, visión panorámica 540°, control de crucero adaptativo y más sistemas que te cuidan en cada trayecto.</p>
                    </div>
                </div>

            </div>

            <!-- Feature strip -->
            <div data-aos="fade-up" data-aos-delay="350" class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="flex items-center gap-3.5 p-5 rounded-xl spec-card-dark">
                    <i class="fas fa-bolt text-xl text-violet-400 flex-shrink-0"></i>
                    <div>
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block">100% Eléctrico</span>
                        <span class="text-xs font-semibold text-white">430 km WLTP (E5)</span>
                    </div>
                </div>
                <div class="flex items-center gap-3.5 p-5 rounded-xl spec-card-dark">
                    <i class="fas fa-plug-circle-bolt text-xl text-consur-red flex-shrink-0"></i>
                    <div>
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block">PHEV Enchufable</span>
                        <span class="text-xs font-semibold text-white">288 HP + AWD (J7)</span>
                    </div>
                </div>
                <div class="flex items-center gap-3.5 p-5 rounded-xl spec-card-dark">
                    <i class="fas fa-rotate text-xl text-emerald-400 flex-shrink-0"></i>
                    <div>
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block">SHEV Híbrido</span>
                        <span class="text-xs font-semibold text-white">Auto-recarga (J5)</span>
                    </div>
                </div>
                <div class="flex items-center gap-3.5 p-5 rounded-xl spec-card-dark">
                    <i class="fas fa-shield-halved text-xl text-sky-400 flex-shrink-0"></i>
                    <div>
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block">Seguridad ADAS</span>
                        <span class="text-xs font-semibold text-white">Visión 360° / 540°</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         4. TABLA COMPARATIVA (SECCIÓN CLARA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="comparativa" class="py-20 sm:py-24 bg-white text-[#0d0e0e] border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

            <div data-aos="fade-up" class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-block text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red mb-3">
                    Gama OMODA &amp; JAECOO
                </span>
                <h2 class="oj-heading text-3xl sm:text-5xl text-[#0d0e0e] mb-4">
                    Tabla <span class="font-normal text-consur-red">Comparativa</span>
                </h2>
                <p class="text-sm sm:text-[15px] text-slate-600 font-light leading-relaxed">
                    Compará las 4 opciones de movilidad avanzada de CONSUR S.A.: combustión turbo, 100% eléctrica, híbrida autorrecargable y PHEV enchufable.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" class="overflow-x-auto rounded-2xl border border-slate-200 shadow-lg bg-white">
                <table class="w-full text-xs sm:text-sm border-collapse min-w-[760px]">
                    <thead>
                        <tr class="bg-slate-900 text-white border-b border-slate-800">
                            <th class="p-4 sm:p-5 text-left font-semibold text-slate-400 uppercase tracking-wider w-[20%]">Especificación</th>
                            <th class="p-4 sm:p-5 text-left uppercase tracking-wider border-l border-slate-800">
                                <span class="block text-[9px] font-semibold text-sky-400 tracking-widest mb-0.5">Turbo · Vanguardia</span>
                                <span class="text-white text-base font-medium">OMODA C5</span>
                            </th>
                            <th class="p-4 sm:p-5 text-left uppercase tracking-wider border-l border-slate-800">
                                <span class="block text-[9px] font-semibold text-violet-400 tracking-widest mb-0.5">100% Eléctrico EV</span>
                                <span class="text-white text-base font-medium">OMODA E5</span>
                            </th>
                            <th class="p-4 sm:p-5 text-left uppercase tracking-wider border-l border-slate-800">
                                <span class="block text-[9px] font-semibold text-emerald-400 tracking-widest mb-0.5">SHEV · Sin enchufe</span>
                                <span class="text-white text-base font-medium">JAECOO J5</span>
                            </th>
                            <th class="p-4 sm:p-5 text-left uppercase tracking-wider border-l border-slate-800 bg-consur-red/20">
                                <span class="block text-[9px] font-semibold text-red-300 tracking-widest mb-0.5">PHEV · Enchufable</span>
                                <span class="text-white text-base font-medium">JAECOO J7</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 text-slate-700">
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Segmento</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">SUV Fastback Urbano</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">SUV 100% Eléctrico</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">SUV Familiar Híbrido</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40 font-medium text-slate-900">SUV Todocamino Premium</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Motorización</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-slate-900">1.5 Turbo Nafta</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-violet-700">Motor Eléctrico 150 kW</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-emerald-700">1.5T + Híbrido Autorecargable</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40 font-semibold text-consur-red">1.5 TGDI + Dual Motor PHEV</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Potencia</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-slate-900">147 HP</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-slate-900">201 HP (340 Nm)</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-slate-900">224 HP Combinados</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40 font-bold text-slate-900">
                                288 HP
                                <span class="ml-1.5 text-[9px] font-bold px-2 py-0.5 rounded-full badge-best text-white">MÁX.</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Transmisión</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Automática 9-CVT</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Directa 1-Speed EV</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Híbrida DHT150</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40">Híbrida 1DHT</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Autonomía / Recarga</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Alta eficiencia nafta</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-violet-700">430 km WLTP (DC 28m)</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Recarga continua sin enchufe</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40 font-semibold text-slate-900">+1200 km (90 km EV)</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Dimensiones (L×An×Al)</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">4400 × 1830 × 1588 mm</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">4545 × 1830 × 1588 mm</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">4380 × 1860 × 1650 mm</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40">4500 × 1865 × 1680 mm</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Distancia entre ejes</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">2630 mm</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">2630 mm</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">2620 mm</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40">2672 mm</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Pantallas / Cockpit</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Dual 10.25" HD</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-slate-900">Doble curva 24.6" UHD</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Táctil vertical 13.2" HD</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40 font-semibold text-sky-700">Táctil 14.8" HD + Sony® 8</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Cámaras y Visión</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">360° HD Panorámica</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">360° HD Dinámica</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">Reversa + Periférica</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40 font-semibold text-slate-900">540° Chasis Transparente</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Llantas</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">18" Bicolor</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">18" Aerodinámicas EV</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">18" Bicolor (235/55 R18)</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40">19" Aleación Kumho</td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Catálogo</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">
                                <a href="{{ asset('catalogos/omoda-jaecoo/omoda-c5.pdf') }}" target="_blank" download class="inline-flex items-center gap-1.5 text-xs text-red-600 hover:text-red-700 font-bold">
                                    <i class="fas fa-file-pdf"></i> Descargar PDF
                                </a>
                            </td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">
                                <a href="{{ asset('catalogos/omoda-jaecoo/omoda-e5.pdf') }}" target="_blank" download class="inline-flex items-center gap-1.5 text-xs text-red-600 hover:text-red-700 font-bold">
                                    <i class="fas fa-file-pdf"></i> Descargar PDF
                                </a>
                            </td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">
                                <a href="{{ asset('catalogos/omoda-jaecoo/jaecoo-j5.pdf') }}" target="_blank" download class="inline-flex items-center gap-1.5 text-xs text-red-600 hover:text-red-700 font-bold">
                                    <i class="fas fa-file-pdf"></i> Descargar PDF
                                </a>
                            </td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40">
                                <a href="{{ asset('catalogos/omoda-jaecoo/jaecoo-j7.pdf') }}" target="_blank" download class="inline-flex items-center gap-1.5 text-xs text-red-600 hover:text-red-700 font-bold">
                                    <i class="fas fa-file-pdf"></i> Descargar PDF
                                </a>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Cotización</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">
                                <a href="#cotizacion" @click="vehicleInterest='OMODA C5'" class="inline-block px-3.5 py-2 rounded-lg bg-slate-900 text-white hover:bg-consur-red text-[11px] font-semibold uppercase tracking-wider transition">Cotizar C5</a>
                            </td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">
                                <a href="#cotizacion" @click="vehicleInterest='OMODA E5'" class="inline-block px-3.5 py-2 rounded-lg bg-slate-900 text-white hover:bg-consur-red text-[11px] font-semibold uppercase tracking-wider transition">Cotizar E5</a>
                            </td>
                            <td class="p-4 sm:p-5 border-l border-slate-200">
                                <a href="#cotizacion" @click="vehicleInterest='JAECOO J5'" class="inline-block px-3.5 py-2 rounded-lg bg-slate-900 text-white hover:bg-consur-red text-[11px] font-semibold uppercase tracking-wider transition">Cotizar J5</a>
                            </td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 bg-red-50/40">
                                <a href="#cotizacion" @click="vehicleInterest='JAECOO J7'" class="inline-block px-3.5 py-2 rounded-lg btn-shimmer text-white text-[11px] font-semibold uppercase tracking-wider transition shadow">Cotizar J7</a>
                            </td>
                        </tr>
                        <tr class="bg-slate-50">
                            <td class="p-4 sm:p-5 font-semibold text-slate-500">Garantía oficial</td>
                            <td class="p-4 sm:p-5 border-l border-slate-200 font-semibold text-consur-red text-center" colspan="4">Garantía oficial CONSUR S.A. · Respaldo posventa y repuestos originales en Paraguay</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         5. POR QUÉ CONSUR (SECCIÓN OSCURA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="consur" class="py-20 sm:py-24 bg-[#0d0e0e] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 lg:gap-20 items-center">

                <!-- Left text -->
                <div data-aos="fade-right" class="space-y-8">
                    <div>
                        <span class="inline-block text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red mb-3">
                            Tu concesionario de confianza
                        </span>
                        <h2 class="oj-heading text-3xl sm:text-5xl text-white mt-2 mb-4">
                            ¿Por qué elegir <span class="font-normal text-consur-red">CONSUR S.A.?</span>
                        </h2>
                        <p class="text-sm sm:text-[15px] text-slate-400 font-light leading-relaxed">Somos el concesionario oficial OMODA &amp; JAECOO en Paraguay, con años de experiencia en el sector automotriz y el respaldo de un equipo especializado en cada etapa de tu compra.</p>
                    </div>

                    <ul class="space-y-5">
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-consur-red/10 border border-consur-red/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-award text-consur-red text-sm"></i>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-white mb-1 uppercase tracking-wider">Concesionario oficial certificado</h5>
                                <p class="text-xs text-slate-400 font-light leading-relaxed">Autorización directa de OMODA &amp; JAECOO para comercializar y dar servicio posventa con estándares de calidad internacionales.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-sky-500/10 border border-sky-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-tools text-sky-400 text-sm"></i>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-white mb-1 uppercase tracking-wider">Servicio técnico especializado</h5>
                                <p class="text-xs text-slate-400 font-light leading-relaxed">Mecánicos certificados, equipamiento de diagnóstico de última generación y repuestos originales garantizados.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-handshake text-emerald-400 text-sm"></i>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-white mb-1 uppercase tracking-wider">Financiación a tu medida</h5>
                                <p class="text-xs text-slate-400 font-light leading-relaxed">Planes de financiación flexibles, planes con entrada reducida y posibilidad de entregar tu vehículo usado como parte de pago.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-location-dot text-purple-400 text-sm"></i>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-white mb-1 uppercase tracking-wider">Ubicación estratégica</h5>
                                <p class="text-xs text-slate-400 font-light leading-relaxed">Ruta 1 Km 2.5 y Avda. San Roque González, Encarnación. Atendemos también a clientes de Posadas y toda la región.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Right: stat cards -->
                <div data-aos="fade-left" data-aos-delay="150" class="grid grid-cols-2 gap-5">
                    <div class="p-7 rounded-2xl bg-gradient-to-br from-consur-red/15 to-consur-red/5 border border-consur-red/25 flex flex-col gap-2">
                        <span class="oj-heading text-4xl sm:text-5xl text-white leading-none">+15</span>
                        <span class="text-xs text-slate-300 font-light leading-tight">Años de trayectoria en el sector automotriz paraguayo</span>
                    </div>
                    <div class="p-7 rounded-2xl bg-white/[0.04] border border-white/10 flex flex-col gap-2">
                        <span class="oj-heading text-4xl sm:text-5xl text-white leading-none">100%</span>
                        <span class="text-xs text-slate-300 font-light leading-tight">Disponibilidad de la gama OMODA &amp; JAECOO en Encarnación</span>
                    </div>
                    <div class="p-7 rounded-2xl bg-white/[0.04] border border-white/10 flex flex-col gap-2">
                        <span class="oj-heading text-4xl sm:text-5xl text-white leading-none">3 yr</span>
                        <span class="text-xs text-slate-300 font-light leading-tight">Garantía de fábrica incluida en todos los modelos</span>
                    </div>
                    <div class="p-7 rounded-2xl bg-gradient-to-br from-emerald-500/15 to-emerald-500/5 border border-emerald-500/25 flex flex-col gap-2">
                        <span class="oj-heading text-4xl sm:text-5xl text-white leading-none">24/7</span>
                        <span class="text-xs text-slate-300 font-light leading-tight">Atención vía WhatsApp para consultas y agendamiento</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         6. FORMULARIO DE COTIZACIÓN (SECCIÓN CLARA)
    ═══════════════════════════════════════════════════════════ -->
    <section id="cotizacion" class="py-20 sm:py-24 bg-[#f4f5f7] text-[#0d0e0e]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-10">

            <div data-aos="fade-up" class="relative rounded-3xl border border-slate-200/90 bg-white p-8 sm:p-14 shadow-xl overflow-hidden">

                <div class="relative z-10">

                    <!-- Header -->
                    <div class="text-center max-w-2xl mx-auto mb-10">
                        <span class="inline-block text-[11px] font-semibold uppercase tracking-[0.22em] text-consur-red mb-3">
                            Atención oficial CONSUR S.A.
                        </span>
                        <h2 class="oj-heading text-3xl sm:text-5xl text-[#0d0e0e] mb-3">
                            Cotizá tu <span class="font-normal text-consur-red" x-text="vehicleInterest">JAECOO</span>
                        </h2>
                        <p class="text-sm text-slate-600 font-light leading-relaxed">
                            Completá tus datos y un asesor de CONSUR se comunicará con vos para brindarte precios, financiación y disponibilidad.
                        </p>
                    </div>

                    <!-- Success message -->
                    <div x-show="sentSuccess" x-cloak class="p-7 rounded-2xl bg-emerald-50 border border-emerald-200 text-center space-y-3 animate-scaleIn">
                        <i class="fas fa-circle-check text-emerald-600 text-4xl"></i>
                        <h4 class="text-lg font-bold text-slate-900 uppercase tracking-wide">¡Solicitud enviada!</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">Un asesor de <strong>CONSUR S.A.</strong> se pondrá en contacto a la brevedad para coordinar tu cotización y prueba de manejo.</p>
                        <button @click="sentSuccess = false"
                                type="button"
                                class="text-xs text-emerald-700 underline font-semibold hover:text-emerald-800 transition mt-1">
                            Enviar otra consulta
                        </button>
                    </div>

                    <!-- Form -->
                    <form x-show="!sentSuccess" wire:submit="submitQuotation" class="space-y-6">

                        <!-- Vehicle select -->
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-500 mb-3">Modelo de Interés <span class="text-consur-red">*</span></label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                <button type="button" @click="vehicleInterest='OMODA C5'"
                                        class="p-3.5 rounded-xl border text-xs font-semibold uppercase tracking-wider transition flex items-center justify-center gap-2"
                                        :class="vehicleInterest==='OMODA C5' ? 'bg-consur-red text-white border-consur-red shadow-md' : 'bg-slate-50 border-slate-200 text-slate-600 hover:border-slate-400 hover:text-slate-900'">
                                    <i class="fas fa-check-circle text-xs" :class="vehicleInterest==='OMODA C5' ? 'text-white' : 'text-slate-300'"></i>
                                    C5 — 1.5T
                                </button>
                                <button type="button" @click="vehicleInterest='OMODA E5'"
                                        class="p-3.5 rounded-xl border text-xs font-semibold uppercase tracking-wider transition flex items-center justify-center gap-2"
                                        :class="vehicleInterest==='OMODA E5' ? 'bg-consur-red text-white border-consur-red shadow-md' : 'bg-slate-50 border-slate-200 text-slate-600 hover:border-slate-400 hover:text-slate-900'">
                                    <i class="fas fa-check-circle text-xs" :class="vehicleInterest==='OMODA E5' ? 'text-white' : 'text-slate-300'"></i>
                                    E5 — EV
                                </button>
                                <button type="button" @click="vehicleInterest='JAECOO J5'"
                                        class="p-3.5 rounded-xl border text-xs font-semibold uppercase tracking-wider transition flex items-center justify-center gap-2"
                                        :class="vehicleInterest==='JAECOO J5' ? 'bg-consur-red text-white border-consur-red shadow-md' : 'bg-slate-50 border-slate-200 text-slate-600 hover:border-slate-400 hover:text-slate-900'">
                                    <i class="fas fa-check-circle text-xs" :class="vehicleInterest==='JAECOO J5' ? 'text-white' : 'text-slate-300'"></i>
                                    J5 — SHEV
                                </button>
                                <button type="button" @click="vehicleInterest='JAECOO J7'"
                                        class="p-3.5 rounded-xl border text-xs font-semibold uppercase tracking-wider transition flex items-center justify-center gap-2"
                                        :class="vehicleInterest==='JAECOO J7' ? 'bg-consur-red text-white border-consur-red shadow-md' : 'bg-slate-50 border-slate-200 text-slate-600 hover:border-slate-400 hover:text-slate-900'">
                                    <i class="fas fa-check-circle text-xs" :class="vehicleInterest==='JAECOO J7' ? 'text-white' : 'text-slate-300'"></i>
                                    J7 — PHEV
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <!-- Nombre -->
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Nombre y Apellido <span class="text-consur-red">*</span></label>
                                <input type="text" wire:model="name" required placeholder="Tu nombre completo"
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('name') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Teléfono / WhatsApp <span class="text-consur-red">*</span></label>
                                <input type="text" wire:model="phone" required placeholder="Ej: 0985 804 106"
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('phone') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Correo electrónico</label>
                                <input type="email" wire:model="email" placeholder="correo@ejemplo.com"
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('email') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Ciudad -->
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Ciudad de residencia</label>
                                <input type="text" wire:model="city" placeholder="Ej: Encarnación, Posadas…"
                                       class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm">
                                @error('city') <span class="text-xs text-consur-red mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Mensaje -->
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-widest text-slate-600 mb-2">Mensaje o consulta</label>
                                <textarea wire:model="message" rows="3"
                                          placeholder="¿Querés consultar sobre financiación, entrega de usado o agendar un Test Drive?"
                                          class="form-input-light w-full px-4 py-3.5 rounded-xl text-sm resize-none"></textarea>
                            </div>

                        </div>

                        <div class="text-center">
                            <button type="submit"
                                    class="inline-flex items-center justify-center gap-3 px-10 py-4 btn-shimmer text-white text-xs font-semibold uppercase tracking-[0.18em] rounded-xl shadow-lg transition hover:-translate-y-0.5 w-full sm:w-auto">
                                <span wire:loading.remove wire:target="submitQuotation" class="inline-flex items-center gap-3">
                                    <i class="fas fa-paper-plane text-xs"></i>
                                    Enviar solicitud de cotización
                                </span>
                                <span wire:loading wire:target="submitQuotation" class="inline-flex items-center gap-2">
                                    <i class="fas fa-circle-notch fa-spin text-xs"></i>
                                    Enviando...
                                </span>
                            </button>
                            <p class="text-[11px] text-slate-400 mt-3">Tu información es confidencial y solo será utilizada para contactarte.</p>
                        </div>

                    </form>

                    <!-- WhatsApp direct -->
                    <div class="mt-8 pt-8 border-t border-slate-200 text-center">
                        <p class="text-xs text-slate-500 mb-4">¿Preferís contacto directo e inmediato?</p>
                        <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20Consur%2C%20quiero%20informaci%C3%B3n%20sobre%20los%20modelos%20OMODA%20y%20JAECOO."
                           target="_blank"
                           class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl border border-emerald-600/30 bg-emerald-50 text-emerald-700 text-xs font-semibold uppercase tracking-widest hover:bg-emerald-100 transition">
                            <i class="fab fa-whatsapp text-base"></i>
                            Escribinos por WhatsApp ahora
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
