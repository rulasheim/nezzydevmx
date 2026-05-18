@extends('nezzydev.layouts.app')

@section('title', 'Nosotros — NezzyDev')

@section('content')

{{-- BANNER --}}
<div class="page-banner">
    <div class="container">
        <div class="tag" style="margin-bottom:1rem;">// Nosotros</div>
        <h1 class="section-title" style="font-size:clamp(2.5rem,6vw,4rem); margin-bottom:1rem;">
            NO SOMOS UNA <span class="highlight">FÁBRICA</span><br>DE CÓDIGO.
        </h1>
        <p style="color:var(--color-muted); max-width:520px; font-size:1rem; line-height:1.75;">
            Somos tu equipo técnico. Pensamos en tu negocio antes de escribir una sola línea de código.
        </p>
    </div>
</div>

{{-- MANIFIESTO --}}
<section style="padding:5rem 0;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:5rem; align-items:center;">

            {{-- Izquierda — texto --}}
            <div>
                <div class="tag" style="margin-bottom:1rem;">// Nuestra filosofía</div>
                <h2 class="section-title" style="margin-bottom:1.5rem;">
                    TECNOLOGÍA AL<br>
                    <span class="highlight">SERVICIO DEL</span><br>
                    NEGOCIO.
                </h2>
                <p style="color:var(--color-muted); line-height:1.85; margin-bottom:1.25rem; font-size:0.95rem;">
                    En NezzyDev creemos que la tecnología debe servir al negocio, no al revés. Cada proyecto comienza con una pregunta simple: <em style="color:var(--color-text);">¿qué necesita tu negocio para crecer?</em>
                </p>
                <p style="color:var(--color-muted); line-height:1.85; margin-bottom:2rem; font-size:0.95rem;">
                    Combinamos desarrollo sólido, diseño estratégico y marketing efectivo para entregar soluciones que realmente funcionan — a tiempo y dentro del presupuesto.
                </p>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                    @foreach([
                        ['target',        'Enfoque en resultados'],
                        ['message-square','Comunicación directa'],
                        ['code-2',        'Código limpio'],
                        ['shield-check',  'Soporte post-entrega'],
                        ['clock',         'Entrega puntual'],
                        ['trending-up',   'Visión de crecimiento'],
                    ] as [$icon, $val])
                    <div style="display:flex; align-items:center; gap:0.75rem; padding:0.75rem; background:var(--color-surface); border:1px solid var(--color-border);">
                        <i data-lucide="{{ $icon }}" style="width:15px;height:15px;color:var(--color-primary);flex-shrink:0;"></i>
                        <span style="font-size:0.82rem; color:var(--color-text);">{{ $val }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Derecha — stats visual --}}
            <div style="display:flex; flex-direction:column; gap:1.25rem;">

                @foreach([
                    ['Tecnología & Desarrollo', '88', 'var(--color-primary)'],
                    ['Diseño & UX',             '80', 'var(--color-accent)'],
                    ['Marketing Digital',        '72', 'var(--color-amber)'],
                    ['Estrategia de Negocio',   '90', 'var(--color-primary)'],
                ] as [$label, $pct, $color])
                <div style="
                    background:var(--color-surface);
                    border:1px solid var(--color-border);
                    padding:1.25rem 1.5rem;
                ">
                    <div style="display:flex; justify-content:space-between; margin-bottom:0.6rem;">
                        <span style="font-size:0.85rem; color:var(--color-text);">{{ $label }}</span>
                        <span style="font-family:var(--font-mono); font-size:0.8rem; color:{{ $color }};">{{ $pct }}%</span>
                    </div>
                    <div style="height:3px; background:var(--color-border); border-radius:2px; overflow:hidden;">
                        <div style="
                            height:100%; width:{{ $pct }}%;
                            background:linear-gradient(90deg, {{ $color }}, var(--color-amber));
                            border-radius:2px;
                        "></div>
                    </div>
                </div>
                @endforeach

                {{-- Badge --}}
                <div style="
                    background:linear-gradient(135deg, var(--color-surface), var(--color-surface2));
                    border:1px solid var(--color-border2);
                    padding:1.5rem;
                    display:grid; grid-template-columns:1fr 1fr 1fr;
                    gap:1rem; text-align:center;
                " class="glow-fire">
                    @foreach([
                        ['50+',  'Proyectos'],
                        ['3+',   'Años'],
                        ['100%', 'Satisfacción'],
                    ] as [$n, $l])
                    <div>
                        <div style="
                            font-family:var(--font-display); font-size:1.6rem; font-weight:700;
                            background:linear-gradient(90deg,var(--color-primary),var(--color-amber));
                            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
                        ">{{ $n }}</div>
                        <div style="font-size:0.72rem; color:var(--color-muted); font-family:var(--font-mono); margin-top:0.2rem;">{{ $l }}</div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

<div class="fire-divider"></div>

{{-- VALORES --}}
<section style="padding:5rem 0; background:var(--color-surface);">
    <div class="container">
        <div style="text-align:center; margin-bottom:3.5rem;">
            <div class="tag" style="margin-bottom:0.75rem;">// Nuestros valores</div>
            <h2 class="section-title">LO QUE NOS <span class="highlight">DEFINE</span></h2>
        </div>

        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:1.25rem;">
            @foreach([
                ['flame',       'Pasión',       'Cada proyecto lo tratamos como si fuera nuestro. Sin medias tintas.',             'var(--color-primary)'],
                ['shield',      'Confianza',    'Transparencia total desde el primer día. Sabes qué hacemos y por qué.',           'var(--color-accent)'],
                ['zap',         'Agilidad',     'Metodología ágil. Entregas incrementales. Sin esperas interminables.',            'var(--color-amber)'],
                ['award',       'Calidad',      'Código limpio, diseño cuidado y pruebas antes de cada entrega.',                 'var(--color-primary)'],
            ] as [$icon, $title, $desc, $color])
            <div class="fire-card" style="padding:2rem; text-align:center;">
                <div style="
                    width:52px; height:52px; margin:0 auto 1.25rem;
                    border:1px solid {{ $color }}40;
                    background:{{ $color }}10;
                    display:flex; align-items:center; justify-content:center;
                    clip-path:polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);
                ">
                    <i data-lucide="{{ $icon }}" style="width:22px;height:22px;color:{{ $color }};"></i>
                </div>
                <h3 style="font-family:var(--font-display); font-size:0.9rem; font-weight:700; color:var(--color-text); margin-bottom:0.75rem; letter-spacing:0.05em;">
                    {{ strtoupper($title) }}
                </h3>
                <p style="font-size:0.82rem; color:var(--color-muted); line-height:1.7;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="fire-divider"></div>

{{-- PROCESO RÁPIDO --}}
<section style="padding:5rem 0;">
    <div class="container">
        <div style="text-align:center; margin-bottom:3.5rem;">
            <div class="tag" style="margin-bottom:0.75rem;">// Cómo trabajamos</div>
            <h2 class="section-title">NUESTRO <span class="highlight">PROCESO</span></h2>
        </div>

        <div style="display:grid; grid-template-columns:repeat(5,1fr); gap:0; position:relative;">
            <div style="
                position:absolute; top:2rem; left:10%; right:10%;
                height:1px;
                background:linear-gradient(90deg,var(--color-primary),var(--color-amber));
                opacity:0.3; z-index:0;
            "></div>

            @foreach([
                ['01','search',      'Descubrimiento', 'Entendemos tu negocio, objetivos y audiencia.',     'var(--color-primary)'],
                ['02','layout',      'Estrategia',     'Definimos arquitectura, stack y plan de trabajo.',  'var(--color-accent)'],
                ['03','pen-tool',    'Diseño',         'Prototipos e identidad visual alineada a tu marca.','var(--color-amber)'],
                ['04','code-2',      'Desarrollo',     'Código limpio con entregas incrementales.',          'var(--color-accent)'],
                ['05','rocket',      'Lanzamiento',    'Desplegamos y te acompañamos en el crecimiento.',   'var(--color-primary)'],
            ] as [$num, $icon, $title, $desc, $color])
            <div style="display:flex; flex-direction:column; align-items:center; text-align:center; padding:0 0.75rem; position:relative; z-index:1;">
                <div style="
                    width:48px; height:48px; border-radius:50%;
                    background:var(--color-bg);
                    border:2px solid {{ $color }};
                    display:flex; align-items:center; justify-content:center;
                    margin-bottom:1.25rem;
                    box-shadow:0 0 20px {{ $color }}30;
                ">
                    <i data-lucide="{{ $icon }}" style="width:18px;height:18px;color:{{ $color }};"></i>
                </div>
                <div style="font-family:var(--font-mono); font-size:0.65rem; color:{{ $color }}; margin-bottom:0.4rem;">{{ $num }}</div>
                <h4 style="font-family:var(--font-display); font-size:0.82rem; font-weight:700; color:var(--color-text); margin-bottom:0.5rem; letter-spacing:0.04em;">
                    {{ strtoupper($title) }}
                </h4>
                <p style="font-size:0.78rem; color:var(--color-muted); line-height:1.6;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:4rem 0; background:var(--color-surface); position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background:radial-gradient(ellipse 50% 100% at 50% 100%, rgba(232,34,10,0.1) 0%, transparent 70%);"></div>
    <div class="container" style="text-align:center; position:relative;">
        <h2 class="section-title" style="margin-bottom:1rem;">¿LISTO PARA <span class="highlight">TRABAJAR JUNTOS?</span></h2>
        <p style="color:var(--color-muted); max-width:420px; margin:0 auto 2rem; font-size:0.92rem; line-height:1.75;">
            Una llamada de 30 minutos puede cambiar el rumbo digital de tu negocio.
        </p>
        <a href="{{ route('contacto') }}" class="btn-primary">
            <span>Agendar llamada</span>
            <i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i>
        </a>
    </div>
</section>

@endsection

@push('styles')
<style>
    @media (max-width: 900px) {
        section .container > div[style*="grid-template-columns:1fr 1fr"] {
            grid-template-columns: 1fr !important;
        }
        section .container > div[style*="grid-template-columns:repeat(4"] {
            grid-template-columns: 1fr 1fr !important;
        }
        section .container > div[style*="grid-template-columns:repeat(5"] {
            grid-template-columns: 1fr 1fr !important;
            gap: 2rem !important;
        }
    }
    @media (max-width: 550px) {
        section .container > div[style*="grid-template-columns:repeat(4"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush