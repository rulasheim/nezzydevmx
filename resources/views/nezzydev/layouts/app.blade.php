<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NezzyDev — Desarrollo web, sistemas a la medida y marketing digital. Tecnología que arde.">
    <title>@yield('title', 'NezzyDev — Tecnología que arde.')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    <style>
        :root {
            --color-bg:        #080608;
            --color-surface:   #110a0a;
            --color-surface2:  #1a0e0e;
            --color-border:    #2a0f0f;
            --color-border2:   #3d1515;
            --color-primary:   #E8220A;
            --color-accent:    #FF6B1A;
            --color-amber:     #FFB547;
            --color-text:      #F5F0EE;
            --color-muted:     #7a6060;
            --font-display:    'Cinzel', serif;
            --font-body:       'DM Sans', sans-serif;
            --font-mono:       'JetBrains Mono', monospace;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: var(--font-body);
            font-size: 16px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--color-bg); }
        ::-webkit-scrollbar-thumb { background: var(--color-primary); border-radius: 2px; }

        /* Noise overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.5;
        }

        /* Ember particles */
        .ember {
            position: fixed;
            bottom: -10px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            animation: emberRise linear infinite;
            opacity: 0;
        }

        @keyframes emberRise {
            0%   { transform: translateY(0) translateX(0) scale(1); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { transform: translateY(-100vh) translateX(var(--drift)) scale(0.2); opacity: 0; }
        }

        /* Utility */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .tag {
            font-family: var(--font-mono);
            font-size: 0.7rem;
            color: var(--color-accent);
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700;
            line-height: 1.15;
            color: var(--color-text);
            letter-spacing: 0.02em;
        }

        .highlight {
            background: linear-gradient(90deg, var(--color-primary), var(--color-amber));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
            color: #fff;
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--color-accent), var(--color-amber));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(232,34,10,0.4); }
        .btn-primary span { position: relative; z-index: 1; }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            background: transparent;
            color: var(--color-text);
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            border: 1px solid var(--color-border2);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
            box-shadow: 0 0 20px rgba(232,34,10,0.15);
        }

        section { padding: 6rem 0; }

        /* Fire glow */
        .glow-fire {
            box-shadow: 0 0 40px rgba(232,34,10,0.12), 0 0 80px rgba(255,107,26,0.06);
        }

        .glow-amber {
            box-shadow: 0 0 30px rgba(255,181,71,0.1);
        }

        /* Divider */
        .fire-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-primary), var(--color-amber), var(--color-primary), transparent);
            opacity: 0.4;
        }

        /* Card */
        .fire-card {
            background: var(--color-surface);
            border: 1px solid var(--color-border);
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .fire-card:hover {
            border-color: var(--color-primary);
            transform: translateY(-4px);
            box-shadow: 0 8px 40px rgba(232,34,10,0.12);
        }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes floatY {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }

        @keyframes pulse-fire {
            0%, 100% { box-shadow: 0 0 20px rgba(232,34,10,0.3); }
            50%       { box-shadow: 0 0 40px rgba(255,107,26,0.5); }
        }

        .animate-fade-up { animation: fadeUp 0.7s ease both; }
        .animate-fade-up-2 { animation: fadeUp 0.7s ease 0.15s both; }
        .animate-fade-up-3 { animation: fadeUp 0.7s ease 0.3s both; }

        /* Page header banner */
        .page-banner {
            padding: 8rem 0 4rem;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid var(--color-border);
        }

        .page-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 80% at 50% 100%, rgba(232,34,10,0.12) 0%, transparent 70%);
            pointer-events: none;
        }
    </style>
    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    @stack('styles')
</head>
<body>

    {{-- Ember particles --}}
    <div id="embers"></div>

    @include('nezzydev.partials.nav')

    <main>
        @yield('content')
    </main>

    @include('nezzydev.partials.footer')

    @vite(['resources/js/app.js'])

    <script>
        // Ember particle system
        function createEmber() {
            const ember = document.createElement('div');
            ember.classList.add('ember');
            const size = Math.random() * 4 + 1;
            const left = Math.random() * 100;
            const duration = Math.random() * 8 + 6;
            const drift = (Math.random() - 0.5) * 120;
            const colors = ['#E8220A', '#FF6B1A', '#FFB547', '#ff4500'];
            ember.style.cssText = `
                left: ${left}vw;
                width: ${size}px;
                height: ${size}px;
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                animation-duration: ${duration}s;
                animation-delay: ${Math.random() * 8}s;
                --drift: ${drift}px;
                box-shadow: 0 0 ${size * 2}px currentColor;
            `;
            document.getElementById('embers').appendChild(ember);
            setTimeout(() => ember.remove(), (duration + 8) * 1000);
        }

        // Generate embers periodically
        setInterval(createEmber, 600);
        for (let i = 0; i < 8; i++) createEmber();
    </script>
    <script>lucide.createIcons();</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>


    @stack('scripts')
</body>
</html>