@extends('nezzydev.layouts.app')

@section('title', 'Servicios — NezzyDev')

@section('content')

{{-- PAGE BANNER --}}
<div class="page-banner">
    <div class="container">
        <div class="tag" style="margin-bottom:1rem;">// Servicios</div>
        <h1 class="section-title" style="font-size:clamp(2.5rem,6vw,4rem); margin-bottom:1rem;">
            LO QUE <span class="highlight">FORJAMOS</span>
        </h1>
        <p style="color:var(--color-muted); max-width:520px; font-size:1rem; line-height:1.75;">
            Desde tu primera presencia en línea hasta sistemas complejos y campañas que convierten — todo bajo un mismo techo.
        </p>
    </div>
</div>

{{-- WEB DEVELOPMENT --}}
<section style="padding:5rem 0; position:relative;">
    <div class="container">

        <div style="display:flex; align-items:center; gap:1rem; margin-bottom:3rem;">
            <div style="
                width:48px; height:48px;
                border:1px solid var(--color-primary);
                display:flex; align-items:center; justify-content:center;
                background:rgba(232,34,10,0.08);
                flex-shrink:0;
            ">
                <i data-lucide="globe" style="width:22px;height:22px;color:var(--color-primary);"></i>
            </div>
            <div>
                <div class="tag" style="margin-bottom:0.25rem;">01 — Desarrollo</div>
                <h2 style="font-family:var(--font-display); font-size:1.6rem; font-weight:700; letter-spacing:0.03em;">
                    DESARROLLO <span class="highlight">WEB</span>
                </h2>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.25rem;">
            @foreach([
                [
                    'icon'  => 'layout-template',
                    'title' => 'Landing Pages',
                    'badge' => 'Desde $8,500',
                    'desc'  => 'Páginas de conversión rápidas, modernas y optimizadas. Ideal para emprendedores y campañas específicas.',
                    'items' => ['Diseño personalizado','Optimización móvil','Formulario de contacto','Alta velocidad de carga','Entrega en 7 días'],
                    'color' => 'var(--color-primary)',
                ],
                [
                    'icon'  => 'building-2',
                    'title' => 'Sitios Corporativos',
                    'badge' => 'Desde $22,000',
                    'desc'  => 'Tu presencia profesional completa. Multi-página, con panel de administración y SEO integrado.',
                    'items' => ['Hasta 8 páginas','Panel de administración','Blog / noticias','SEO básico','Soporte 3 meses'],
                    'color' => 'var(--color-accent)',
                ],
                [
                    'icon'  => 'monitor-smartphone',
                    'title' => 'Web Apps Escalables',
                    'badge' => 'Cotización',
                    'desc'  => 'Plataformas robustas con arquitectura sólida, APIs y experiencia de usuario de primer nivel.',
                    'items' => ['Arquitectura escalable','APIs e integraciones','Alta disponibilidad','Dashboard avanzado','Documentación técnica'],
                    'color' => 'var(--color-amber)',
                ],
            ] as $s)
            <div class="fire-card" style="padding:2rem; position:relative; overflow:hidden;">
                <div style="
                    position:absolute; top:0; right:0; width:100px; height:100px;
                    background:radial-gradient(circle at top right, {{ $s['color'] }}12, transparent 70%);
                "></div>

                <div style="
                    width:44px; height:44px; margin-bottom:1.25rem;
                    border:1px solid {{ $s['color'] }}40;
                    background:{{ $s['color'] }}10;
                    display:flex; align-items:center; justify-content:center;
                ">
                    <i data-lucide="{{ $s['icon'] }}" style="width:20px;height:20px;color:{{ $s['color'] }};"></i>
                </div>

                <div style="
                    display:inline-block; margin-bottom:0.75rem;
                    font-family:var(--font-mono); font-size:0.65rem;
                    color:{{ $s['color'] }}; border:1px solid {{ $s['color'] }}40;
                    padding:0.2rem 0.65rem; letter-spacing:0.1em;
                ">{{ $s['badge'] }}</div>

                <h3 style="font-family:var(--font-display); font-size:1rem; font-weight:700; color:var(--color-text); margin-bottom:0.75rem; letter-spacing:0.04em;">
                    {{ strtoupper($s['title']) }}
                </h3>

                <p style="font-size:0.85rem; color:var(--color-muted); line-height:1.7; margin-bottom:1.25rem;">
                    {{ $s['desc'] }}
                </p>

                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.5rem; margin-bottom:1.75rem;">
                    @foreach($s['items'] as $item)
                    <li style="display:flex; align-items:center; gap:0.6rem; font-size:0.82rem; color:var(--color-text);">
                        <i data-lucide="check" style="width:13px;height:13px;color:{{ $s['color'] }};flex-shrink:0;"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('contacto') }}" style="
                    display:flex; align-items:center; justify-content:center; gap:0.5rem;
                    padding:0.75rem; border:1px solid {{ $s['color'] }}50;
                    color:{{ $s['color'] }}; font-family:var(--font-display);
                    font-size:0.78rem; font-weight:600; letter-spacing:0.06em;
                    text-decoration:none; transition:all 0.2s;
                    background:{{ $s['color'] }}08;
                "
                onmouseover="this.style.background='{{ $s['color'] }}20'"
                onmouseout="this.style.background='{{ $s['color'] }}08'">
                    SOLICITAR COTIZACIÓN
                    <i data-lucide="arrow-right" style="width:13px;height:13px;"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="fire-divider"></div>

{{-- SISTEMAS --}}
<section style="padding:5rem 0; background:var(--color-surface);">
    <div class="container">

        <div style="display:flex; align-items:center; gap:1rem; margin-bottom:3rem;">
            <div style="
                width:48px; height:48px;
                border:1px solid var(--color-accent);
                display:flex; align-items:center; justify-content:center;
                background:rgba(255,107,26,0.08);
                flex-shrink:0;
            ">
                <i data-lucide="settings-2" style="width:22px;height:22px;color:var(--color-accent);"></i>
            </div>
            <div>
                <div class="tag" style="margin-bottom:0.25rem; color:var(--color-accent);">02 — Sistemas</div>
                <h2 style="font-family:var(--font-display); font-size:1.6rem; font-weight:700; letter-spacing:0.03em;">
                    SISTEMAS <span style="
                        background:linear-gradient(90deg,var(--color-accent),var(--color-amber));
                        -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
                    ">A LA MEDIDA</span>
                </h2>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:3rem; align-items:center;">
            <div>
                <p style="color:var(--color-muted); font-size:0.95rem; line-height:1.8; margin-bottom:2rem;">
                    Automatizamos los procesos internos de tu negocio con software diseñado específicamente para ti. Sin soluciones genéricas — solo lo que tu operación necesita.
                </p>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                    @foreach([
                        ['cpu',           'CRM a medida'],
                        ['file-text',     'Sistemas de cotización'],
                        ['package',       'Control de inventario'],
                        ['users',         'Gestión de clientes'],
                        ['bar-chart-2',   'Dashboards y reportes'],
                        ['link',          'Integraciones y APIs'],
                    ] as [$icon, $label])
                    <div style="
                        display:flex; align-items:center; gap:0.75rem;
                        padding:0.85rem 1rem;
                        background:var(--color-surface2);
                        border:1px solid var(--color-border);
                        transition:border-color 0.2s;
                    "
                    onmouseover="this.style.borderColor='var(--color-accent)'"
                    onmouseout="this.style.borderColor='var(--color-border)'">
                        <i data-lucide="{{ $icon }}" style="width:16px;height:16px;color:var(--color-accent);flex-shrink:0;"></i>
                        <span style="font-size:0.83rem; color:var(--color-text);">{{ $label }}</span>
                    </div>
                    @endforeach
                </div>
                <div style="margin-top:2rem;">
                    <a href="{{ route('contacto') }}" class="btn-primary">
                        <span>Platica con nosotros</span>
                        <i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i>
                    </a>
                </div>
            </div>

            <div style="
                background:var(--color-bg);
                border:1px solid var(--color-border);
                padding:2rem;
                font-family:var(--font-mono);
                font-size:0.8rem;
                line-height:2;
            " class="glow-fire">
                <div style="color:var(--color-muted); margin-bottom:0.5rem;">// tu_sistema.config</div>
                <div><span style="color:var(--color-accent);">const</span> <span style="color:var(--color-text);">sistema</span> <span style="color:var(--color-muted);">= {</span></div>
                <div style="padding-left:1.5rem;"><span style="color:var(--color-primary);">tipo</span><span style="color:var(--color-muted);">:</span> <span style="color:var(--color-amber);">'a tu medida'</span><span style="color:var(--color-muted);">,</span></div>
                <div style="padding-left:1.5rem;"><span style="color:var(--color-primary);">stack</span><span style="color:var(--color-muted);">:</span> <span style="color:var(--color-amber);">['Laravel', 'Filament']</span><span style="color:var(--color-muted);">,</span></div>
                <div style="padding-left:1.5rem;"><span style="color:var(--color-primary);">escalable</span><span style="color:var(--color-muted);">:</span> <span style="color:var(--color-accent);">true</span><span style="color:var(--color-muted);">,</span></div>
                <div style="padding-left:1.5rem;"><span style="color:var(--color-primary);">soporte</span><span style="color:var(--color-muted);">:</span> <span style="color:var(--color-amber);">'prioritario'</span><span style="color:var(--color-muted);">,</span></div>
                <div style="padding-left:1.5rem;"><span style="color:var(--color-primary);">entrega</span><span style="color:var(--color-muted);">:</span> <span style="color:var(--color-accent);">'a tiempo'</span></div>
                <div><span style="color:var(--color-muted);">};</span></div>
                <div style="margin-top:1rem; color:var(--color-muted);">
                    <span style="color:var(--color-accent);">export default</span>
                    <span style="color:var(--color-text);"> sistema</span>
                    <span style="color:var(--color-primary); animation:blink 1s step-end infinite;">_</span>
                </div>
                <style>@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }</style>
            </div>
        </div>
    </div>
</section>

<div class="fire-divider"></div>

{{-- MARKETING --}}
<section style="padding:5rem 0;">
    <div class="container">

        <div style="display:flex; align-items:center; gap:1rem; margin-bottom:3rem;">
            <div style="
                width:48px; height:48px;
                border:1px solid var(--color-amber);
                display:flex; align-items:center; justify-content:center;
                background:rgba(255,181,71,0.08);
                flex-shrink:0;
            ">
                <i data-lucide="flame" style="width:22px;height:22px;color:var(--color-amber);"></i>
            </div>
            <div>
                <div class="tag" style="margin-bottom:0.25rem; color:var(--color-amber);">03 — Marketing</div>
                <h2 style="font-family:var(--font-display); font-size:1.6rem; font-weight:700; letter-spacing:0.03em;">
                    MARCA Y <span style="
                        background:linear-gradient(90deg,var(--color-accent),var(--color-amber));
                        -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
                    ">MARKETING</span>
                </h2>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(2,1fr); gap:1.25rem;">
            @foreach([
                [
                    'icon'  => 'pen-tool',
                    'title' => 'Identidad de Marca',
                    'desc'  => 'Logo, paleta de colores, tipografía y manual de marca completo. Tu negocio con carácter propio.',
                    'items' => ['Logo y variantes','Manual de marca','Paleta y tipografía','Assets digitales','Presentación de marca'],
                    'color' => 'var(--color-amber)',
                ],
                [
                    'icon'  => 'megaphone',
                    'title' => 'Campañas Publicitarias',
                    'desc'  => 'Estrategia y ejecución en Meta Ads, Google Ads y TikTok Ads. Más alcance, más leads, más ventas.',
                    'items' => ['Meta & Google Ads','TikTok Ads','Segmentación avanzada','Reportes mensuales','Optimización continua'],
                    'color' => 'var(--color-primary)',
                ],
                [
                    'icon'  => 'share-2',
                    'title' => 'Gestión de Redes Sociales',
                    'desc'  => 'Contenido estratégico, calendario editorial y crecimiento orgánico para tu marca en redes.',
                    'items' => ['Calendario editorial','Diseño de contenido','Estrategia de hashtags','Stories y Reels','Reportes de crecimiento'],
                    'color' => 'var(--color-accent)',
                ],
                [
                    'icon'  => 'search',
                    'title' => 'SEO & Posicionamiento',
                    'desc'  => 'Optimización para buscadores que lleva tráfico orgánico real y duradero a tu sitio web.',
                    'items' => ['Auditoría SEO','Optimización on-page','Link building','SEO técnico','Reportes de posicionamiento'],
                    'color' => 'var(--color-amber)',
                ],
            ] as $s)
            <div class="fire-card" style="padding:2rem; display:flex; gap:1.5rem;">
                <div style="
                    width:44px; height:44px; flex-shrink:0;
                    border:1px solid {{ $s['color'] }}40;
                    background:{{ $s['color'] }}10;
                    display:flex; align-items:center; justify-content:center;
                ">
                    <i data-lucide="{{ $s['icon'] }}" style="width:20px;height:20px;color:{{ $s['color'] }};"></i>
                </div>
                <div style="flex:1;">
                    <h3 style="font-family:var(--font-display); font-size:0.9rem; font-weight:700; color:var(--color-text); margin-bottom:0.6rem; letter-spacing:0.04em;">
                        {{ strtoupper($s['title']) }}
                    </h3>
                    <p style="font-size:0.83rem; color:var(--color-muted); line-height:1.7; margin-bottom:1rem;">
                        {{ $s['desc'] }}
                    </p>
                    <div style="display:flex; flex-wrap:wrap; gap:0.4rem;">
                        @foreach($s['items'] as $item)
                        <span style="
                            font-family:var(--font-mono); font-size:0.68rem;
                            padding:0.2rem 0.6rem;
                            background:var(--color-bg);
                            border:1px solid var(--color-border2);
                            color:var(--color-muted);
                        ">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:4rem 0; background:var(--color-surface); position:relative; overflow:hidden;">
    <div style="
        position:absolute; inset:0;
        background:radial-gradient(ellipse 50% 100% at 50% 100%, rgba(232,34,10,0.1) 0%, transparent 70%);
    "></div>
    <div class="container" style="text-align:center; position:relative;">
        <h2 class="section-title" style="margin-bottom:1rem;">
            ¿NO SABES POR <span class="highlight">DÓNDE EMPEZAR?</span>
        </h2>
        <p style="color:var(--color-muted); max-width:440px; margin:0 auto 2rem; font-size:0.92rem; line-height:1.75;">
            Cuéntanos tu negocio y te orientamos sin costo. Encontramos el servicio perfecto para tu etapa actual.
        </p>
        <a href="{{ route('contacto') }}" class="btn-primary">
            <span>Solicitar asesoría gratuita</span>
            <i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i>
        </a>
    </div>
</section>

@endsection

@push('styles')
<style>
    @media (max-width: 900px) {
        .services-grid-3 { grid-template-columns: 1fr 1fr !important; }
        .services-grid-2 { grid-template-columns: 1fr !important; }
    }
    @media (max-width: 600px) {
        .services-grid-3 { grid-template-columns: 1fr !important; }
    }
</style>
@endpush