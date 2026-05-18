@extends('nezzydev.layouts.app')

@section('title', 'NezzyDev — Tecnología que arde.')

@section('content')

{{-- HERO --}}
{{-- ⚠ SIN overflow:hidden para que el fuego no se recorte --}}
<section id="hero-section" style="min-height:100vh; display:flex; align-items:center; position:relative; padding-top:5rem;">

    {{-- BG grid --}}
    <div style="
        position:absolute; inset:0;
        background-image:
            linear-gradient(var(--color-border) 1px, transparent 1px),
            linear-gradient(90deg, var(--color-border) 1px, transparent 1px);
        background-size:70px 70px;
        opacity:0.25;
        mask-image:radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
        pointer-events:none;
    "></div>

    {{-- Fire glow bottom --}}
    <div style="
        position:absolute; bottom:0; left:50%; transform:translateX(-50%);
        width:800px; height:400px;
        background:radial-gradient(ellipse at bottom, rgba(232,34,10,0.15) 0%, transparent 70%);
        pointer-events:none;
    "></div>

    {{-- Left glow --}}
    <div style="
        position:absolute; top:20%; left:-5%;
        width:500px; height:500px;
        background:radial-gradient(circle, rgba(232,34,10,0.08) 0%, transparent 70%);
        pointer-events:none;
    "></div>

    {{--
        Canvas del fuego: position:fixed sobre TODA la pantalla.
        pointer-events:none para no bloquear nada.
        z-index alto pero debajo del nav.
    --}}
    <canvas id="fire-canvas" style="
        position:fixed;
        top:0; left:0;
        width:100vw; height:100vh;
        pointer-events:none;
        z-index:50;
        display:block;
    "></canvas>

    <div class="container" style="position:relative; z-index:1;">
        <div style="display:grid; grid-template-columns:1fr 1.15fr; gap:2rem; align-items:center;">

            {{-- Left --}}
            <div class="animate-fade-up">

                <div class="tag" style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.75rem;">
                    <span style="display:inline-block; width:30px; height:1px; background:linear-gradient(90deg,var(--color-primary),var(--color-amber));"></span>
                    Desarrollo · Marca · Crecimiento
                </div>

                <h1 style="
                    font-family:var(--font-display);
                    font-size:clamp(2.5rem,6vw,4.2rem);
                    font-weight:700;
                    line-height:1.1;
                    margin-bottom:1.5rem;
                    letter-spacing:0.02em;
                ">
                    TECNOLOGÍA<br>
                    QUE <span class="highlight">ARDE</span><br>
                    PARA TI.
                </h1>

                <p style="color:var(--color-muted); font-size:1.05rem; max-width:460px; margin-bottom:2.5rem; line-height:1.75;">
                    Construimos tu presencia digital desde cero — páginas web, sistemas a la medida y campañas que convierten. Todo bajo un mismo techo.
                </p>

                <div style="display:flex; gap:1rem; flex-wrap:wrap;" class="animate-fade-up-2">
                    <a href="{{ route('servicios') }}" class="btn-primary">
                        <span>Ver servicios</span>
                        <i data-lucide="arrow-right" style="width:15px;height:15px;position:relative;z-index:1;"></i>
                    </a>
                    <a href="{{ route('portafolio') }}" class="btn-outline">
                        Nuestro trabajo
                    </a>
                </div>

                {{-- Stats --}}
                <div class="animate-fade-up-3" style="
                    display:flex; gap:3rem; margin-top:4rem;
                    padding-top:2rem; border-top:1px solid var(--color-border);
                ">
                    @foreach([
                        ['50+', 'Proyectos'],
                        ['100%','Satisfacción'],
                        ['3+',  'Años'],
                    ] as [$num, $label])
                    <div>
                        <div style="
                            font-family:var(--font-display);
                            font-size:2rem; font-weight:700;
                            background:linear-gradient(90deg,var(--color-primary),var(--color-amber));
                            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
                            background-clip:text;
                        ">{{ $num }}</div>
                        <div style="font-size:0.78rem; color:var(--color-muted); margin-top:0.2rem; font-family:var(--font-mono);">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Right — Dragon PNG --}}
            <div id="dragon-scene" style="
                position:relative;
                display:flex; align-items:center; justify-content:center;
                min-height:600px; width:100%;
                cursor:crosshair;
            ">
                {{-- Glow ambiental --}}
                <div id="dragon-glow" style="
                    position:absolute; inset:0;
                    background:radial-gradient(ellipse 75% 65% at 52% 50%, rgba(232,34,10,0.18) 0%, rgba(255,107,26,0.07) 45%, transparent 70%);
                    pointer-events:none;
                    animation: dragonPulse 4s ease-in-out infinite;
                "></div>

                {{-- Imagen dragón --}}
                <img
                    src="{{ asset('images/dragon.png') }}"
                    alt="Dragón NezzyDev"
                    id="dragon-img"
                    style="
                        width:110%; max-width:720px;
                        height:auto;
                        display:block;
                        position:relative; z-index:1;
                        filter:
                            drop-shadow(0 0 45px rgba(232,34,10,0.50))
                            drop-shadow(0 0 90px rgba(255,107,26,0.22));
                        animation: dragonFloat 5s ease-in-out infinite, dragonEntry 1.2s ease-out both;
                        transform-origin:center center;
                        user-select:none; pointer-events:none;
                    "
                />

                {{-- Brasas CSS decorativas idle --}}
                <div style="position:absolute; inset:0; pointer-events:none; overflow:hidden; z-index:2;">
                    @for($i = 0; $i < 10; $i++)
                    <span style="
                        position:absolute;
                        width:{{ rand(3,6) }}px; height:{{ rand(3,6) }}px;
                        border-radius:50%;
                        background:radial-gradient(circle,#FFE060,#FF6B1A);
                        box-shadow:0 0 6px 2px rgba(255,180,71,0.7);
                        left:{{ rand(25,75) }}%;
                        bottom:{{ rand(10,50) }}%;
                        animation: emberRise {{ rand(3,7) }}s ease-in {{ $i * 0.55 }}s infinite;
                        opacity:0;
                    "></span>
                    @endfor
                </div>

                {{-- Hint --}}
                <div id="fire-hint" style="
                    position:absolute; bottom:10px; left:50%; transform:translateX(-50%);
                    font-family:'JetBrains Mono',monospace; font-size:0.68rem;
                    color:#7a6060; letter-spacing:0.12em; white-space:nowrap;
                    display:flex; align-items:center; gap:0.4rem;
                    opacity:0; transition:opacity 1s; pointer-events:none; z-index:5;
                ">
                    <i data-lucide="flame" style="width:11px;height:11px;color:#E8220A;"></i>
                    PASA EL CURSOR SOBRE EL DRAGÓN
                </div>

            </div>

        </div>
    </div>
</section>

{{-- SERVICES PREVIEW --}}
<section style="padding:5rem 0; background:var(--color-surface); position:relative;">
    <div class="fire-divider"></div>
    <div class="container" style="padding-top:5rem;">

        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:3rem; flex-wrap:wrap; gap:1.5rem;">
            <div>
                <div class="tag" style="margin-bottom:0.75rem;">// Servicios</div>
                <h2 class="section-title">LO QUE <span class="highlight">FORJAMOS</span></h2>
            </div>
            <a href="{{ route('servicios') }}" class="btn-outline">Ver todos</a>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.25rem;">
            @foreach([
                ['globe',      'Desarrollo Web',    'Landing pages, sitios corporativos y web apps escalables para cualquier etapa de tu negocio.',    'var(--color-primary)'],
                ['settings-2', 'Sistemas a Medida', 'Software diseñado para tus procesos internos. CRMs, ERPs, sistemas de cotización y más.',          'var(--color-accent)'],
                ['flame',      'Marketing & Marca',  'Identidad visual, campañas de Meta, Google y TikTok. Hacemos crecer tu presencia digital.',        'var(--color-amber)'],
            ] as [$icon, $title, $desc, $color])
            <div class="fire-card" style="padding:2rem; position:relative; overflow:hidden;">
                <div style="
                    position:absolute; top:0; right:0;
                    width:80px; height:80px;
                    background:radial-gradient(circle at top right, {{ $color }}20, transparent 70%);
                "></div>
                <div style="
                    width:44px; height:44px;
                    border:1px solid {{ $color }}40;
                    display:flex; align-items:center; justify-content:center;
                    margin-bottom:1.25rem;
                    background:{{ $color }}10;
                ">
                    <i data-lucide="{{ $icon }}" style="width:20px;height:20px;color:{{ $color }};"></i>
                </div>
                <h3 style="font-family:var(--font-display); font-size:0.95rem; font-weight:700; color:var(--color-text); margin-bottom:0.75rem; letter-spacing:0.05em;">
                    {{ strtoupper($title) }}
                </h3>
                <p style="font-size:0.85rem; color:var(--color-muted); line-height:1.7; margin-bottom:1.5rem;">{{ $desc }}</p>
                <a href="{{ route('servicios') }}" style="
                    font-family:var(--font-mono); font-size:0.72rem; color:{{ $color }};
                    text-decoration:none; letter-spacing:0.1em;
                    display:inline-flex; align-items:center; gap:0.4rem;
                    transition:opacity 0.2s;
                "
                onmouseover="this.style.opacity='0.7'"
                onmouseout="this.style.opacity='1'">
                    VER MÁS
                    <i data-lucide="arrow-right" style="width:12px;height:12px;"></i>
                </a>
            </div>
            @endforeach
        </div>

    </div>
    <div class="fire-divider" style="margin-top:5rem;"></div>
</section>

{{-- CTA STRIP --}}
<section style="padding:5rem 0; position:relative; overflow:hidden;">
    <div style="
        position:absolute; inset:0;
        background:radial-gradient(ellipse 60% 100% at 50% 50%, rgba(232,34,10,0.08) 0%, transparent 70%);
    "></div>
    <div class="container" style="text-align:center; position:relative;">
        <div class="tag" style="margin-bottom:1rem;">// ¿Listo para encender tu negocio?</div>
        <h2 class="section-title" style="margin-bottom:1.5rem;">
            EMPIEZA HOY.<br>
            <span class="highlight">CRECE MAÑANA.</span>
        </h2>
        <p style="color:var(--color-muted); max-width:480px; margin:0 auto 2.5rem; font-size:0.95rem; line-height:1.75;">
            El primer paso es una llamada sin costo. Cuéntanos tu idea y te decimos cómo hacerla realidad.
        </p>
        <a href="{{ route('contacto') }}" class="btn-primary" style="font-size:0.9rem; padding:1rem 2.5rem;">
            <span>Agendar llamada gratuita</span>
            <i data-lucide="phone" style="width:15px;height:15px;position:relative;z-index:1;"></i>
        </a>
    </div>
</section>

@endsection

@push('styles')
<style>
    @keyframes dragonEntry {
        from { opacity:0; transform:translateY(32px) scale(0.90); }
        to   { opacity:1; transform:translateY(0)    scale(1);    }
    }
    @keyframes dragonFloat {
        0%,100% { transform:translateY(0)    rotate(-1.2deg); }
        50%      { transform:translateY(-22px) rotate(1.2deg);  }
    }
    @keyframes dragonPulse {
        0%,100% { opacity:0.8; transform:scale(1);    }
        50%      { opacity:1;   transform:scale(1.07); }
    }
    @keyframes emberRise {
        0%   { opacity:0;   transform:translateY(0)     scale(1);   }
        15%  { opacity:0.9; transform:translateY(-28px)  scale(1.1); }
        80%  { opacity:0.4; transform:translateY(-105px) scale(0.6) translateX(18px); }
        100% { opacity:0;   transform:translateY(-145px) scale(0.2) translateX(22px); }
    }
    #dragon-scene:hover #dragon-img {
        filter:
            drop-shadow(0 0 65px rgba(232,34,10,0.72))
            drop-shadow(0 0 130px rgba(255,107,26,0.42))
            drop-shadow(0 0 28px rgba(255,225,80,0.38));
    }
    #dragon-img { transition:filter 0.5s ease; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    lucide.createIcons();

    const scene   = document.getElementById('dragon-scene');
    const img     = document.getElementById('dragon-img');
    const canvas  = document.getElementById('fire-canvas');
    const hint    = document.getElementById('fire-hint');
    const ctx     = canvas.getContext('2d');

    // ── Canvas cubre toda la ventana (position:fixed) ─────────────
    let DPR = window.devicePixelRatio || 1;

    function resizeCanvas() {
        DPR = window.devicePixelRatio || 1;
        canvas.width  = window.innerWidth  * DPR;
        canvas.height = window.innerHeight * DPR;
        ctx.setTransform(1,0,0,1,0,0);
        ctx.scale(DPR, DPR);
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // ── Posición real de la boca en coordenadas de VENTANA ────────
    // El PNG tiene el dragón volando hacia la izquierda.
    // La cabeza/boca está en la esquina inferior-izquierda del PNG:
    //   - X: ~22% del ancho de la imagen desde su borde izquierdo
    //   - Y: ~60% del alto de la imagen desde su borde superior
    // getBoundingClientRect() nos da la posición real en pantalla.
    const MOUTH_X_PCT = 0.29;   // ← ajusta si necesitas calibrar
    const MOUTH_Y_PCT = 0.70;   // ↑ ajusta si necesitas calibrar

    function getMouthViewport() {
        const r = img.getBoundingClientRect();
        return {
            x: r.left + r.width  * MOUTH_X_PCT,
            y: r.top  + r.height * MOUTH_Y_PCT,
        };
    }

    // ── Partículas ────────────────────────────────────────────────
    const particles = [];
    let fireIntensity  = 0;
    let targetIntensity = 0;

    class Particle {
        constructor(x, y, fi) {
            this.x = x + (Math.random()-0.5) * 12;
            this.y = y + (Math.random()-0.5) * 9;

            // fuego sale hacia la IZQUIERDA con ligero spread
            const spread  = 0.42;
            const angle   = Math.PI + (Math.random()-0.5) * spread;
            const speed   = (4.5 + Math.random() * 6) * fi;

            this.vx   = Math.cos(angle) * speed;
            this.vy   = Math.sin(angle) * speed - 0.6;
            this.life  = 1;
            this.decay = 0.015 + Math.random() * 0.017;
            this.size  = 10 + Math.random() * fi * 26;
            this.angle = 0;
            this.spin  = (Math.random()-0.5) * 0.11;

            const r = Math.random();
            this.type = r < 0.68 ? 'fire' : r < 0.86 ? 'ember' : 'smoke';
        }

        update() {
            this.x    += this.vx;
            this.y    += this.vy;
            this.vx   *= 0.950;
            this.vy   *= 0.950;
            this.angle += this.spin;
            this.life  -= this.decay;
            if (this.type === 'fire')  { this.size *= 0.966; this.vy -= 0.22; }
            if (this.type === 'ember') { this.size *= 0.983; this.vy -= 0.10; this.vx += (Math.random()-0.5)*0.20; }
            if (this.type === 'smoke') { this.size *= 1.006; this.vy -= 0.04; }
        }

        get alive() { return this.life > 0 && this.size > 0.3; }

        draw() {
            const a = Math.max(0, this.life);
            ctx.save();
            ctx.globalAlpha = a;
            ctx.translate(this.x, this.y);
            ctx.rotate(this.angle);

            if (this.type === 'fire') {
                const g = ctx.createRadialGradient(0,0,0, 0,0,this.size);
                g.addColorStop(0,    `rgba(255,250,140,${a})`);
                g.addColorStop(0.15, `rgba(255,165,20,${a*0.92})`);
                g.addColorStop(0.48, `rgba(232,42,10,${a*0.62})`);
                g.addColorStop(1,    'rgba(80,0,0,0)');
                ctx.beginPath();
                ctx.ellipse(0, 0, this.size*0.55, this.size, 0, 0, Math.PI*2);
                ctx.fillStyle = g;
                ctx.fill();
            } else if (this.type === 'ember') {
                ctx.shadowColor = '#FFB547';
                ctx.shadowBlur  = 10;
                const g = ctx.createRadialGradient(0,0,0, 0,0,this.size);
                g.addColorStop(0, `rgba(255,242,95,${a})`);
                g.addColorStop(1, 'rgba(255,50,0,0)');
                ctx.beginPath();
                ctx.arc(0, 0, this.size, 0, Math.PI*2);
                ctx.fillStyle = g;
                ctx.fill();
            } else {
                ctx.beginPath();
                ctx.arc(0, 0, this.size, 0, Math.PI*2);
                ctx.fillStyle = `rgba(14,4,4,${a*0.07})`;
                ctx.fill();
            }
            ctx.restore();
        }
    }

    // ── Render loop ───────────────────────────────────────────────
    function render() {
        // canvas es fixed full-screen: limpiar todo
        ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);

        // suavizar transición
        fireIntensity += (targetIntensity - fireIntensity) * 0.075;

        if (fireIntensity > 0.04) {
            const m     = getMouthViewport();
            const count = Math.floor(fireIntensity * 15);
            for (let i = 0; i < count; i++) {
                particles.push(new Particle(m.x, m.y, fireIntensity));
            }

            // glow en la boca
            ctx.save();
            ctx.globalAlpha = fireIntensity * 0.42;
            const g = ctx.createRadialGradient(m.x, m.y, 0, m.x, m.y, 110 * fireIntensity);
            g.addColorStop(0,   'rgba(255,215,65,0.95)');
            g.addColorStop(0.28,'rgba(232,58,10,0.58)');
            g.addColorStop(1,   'rgba(70,0,0,0)');
            ctx.beginPath();
            ctx.arc(m.x, m.y, 110 * fireIntensity, 0, Math.PI*2);
            ctx.fillStyle = g;
            ctx.fill();
            ctx.restore();
        }

        // actualizar & dibujar partículas
        for (let i = particles.length - 1; i >= 0; i--) {
            particles[i].update();
            if (particles[i].alive) particles[i].draw();
            else particles.splice(i, 1);
        }

        requestAnimationFrame(render);
    }
    render();

    // hint tras 1.8s
    setTimeout(() => { if (!targetIntensity) hint.style.opacity = '1'; }, 1800);

    // ── Hover ─────────────────────────────────────────────────────
    scene.addEventListener('mouseenter', () => {
        targetIntensity = 1;
        hint.style.opacity = '0';
    });
    scene.addEventListener('mouseleave', () => {
        targetIntensity = 0;
        setTimeout(() => { if (!targetIntensity) hint.style.opacity = '1'; }, 1400);
    });
    scene.addEventListener('touchstart', () => {
        targetIntensity = 1;
        hint.style.opacity = '0';
        setTimeout(() => { targetIntensity = 0; }, 2800);
    }, { passive: true });
});
</script>
@endpush