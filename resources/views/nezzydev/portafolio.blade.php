@extends('nezzydev.layouts.app')

@section('title', 'Portafolio — NezzyDev')

@section('content')

{{-- BANNER --}}
<div class="page-banner">
    <div class="container">
        <div class="tag" style="margin-bottom:1rem;">// Portafolio</div>
        <h1 class="section-title" style="font-size:clamp(2.5rem,6vw,4rem); margin-bottom:1rem;">
            PROYECTOS QUE <span class="highlight">HABLAN</span><br>POR SÍ SOLOS.
        </h1>
        <p style="color:var(--color-muted); max-width:520px; font-size:1rem; line-height:1.75;">
            Cada proyecto es una solución real para un negocio real. Aquí está nuestro trabajo.
        </p>
    </div>
</div>

{{-- FILTROS --}}
<section style="padding:4rem 0 0;">
    <div class="container">

        <div style="display:flex; justify-content:center; gap:0.75rem; flex-wrap:wrap; margin-bottom:3rem;">
            @foreach([
                ['todos',     'Todos',      'globe'],
                ['web',       'Web',        'layout-template'],
                ['sistemas',  'Sistemas',   'settings-2'],
                ['marca',     'Marca',      'pen-tool'],
                ['marketing', 'Marketing',  'megaphone'],
            ] as [$cat, $label, $icon])
            <button
                onclick="filterPortfolio(this, '{{ $cat }}')"
                data-filter="{{ $cat }}"
                style="
                    display:inline-flex; align-items:center; gap:0.5rem;
                    padding:0.6rem 1.25rem;
                    background:{{ $cat === 'todos' ? 'var(--color-primary)' : 'transparent' }};
                    border:1px solid {{ $cat === 'todos' ? 'var(--color-primary)' : 'var(--color-border2)' }};
                    color:{{ $cat === 'todos' ? '#fff' : 'var(--color-muted)' }};
                    font-family:var(--font-mono);
                    font-size:0.72rem;
                    letter-spacing:0.1em;
                    cursor:pointer;
                    transition:all 0.2s;
                ">
                <i data-lucide="{{ $icon }}" style="width:13px;height:13px;"></i>
                {{ strtoupper($label) }}
            </button>
            @endforeach
        </div>

        {{-- GRID --}}
        <div id="portfolio-grid" style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem; padding-bottom:5rem;">

            @foreach([
                [
                    'title'    => 'RestaurantePro',
                    'category' => 'web',
                    'tag'      => 'Landing Page',
                    'desc'     => 'Landing page de alto impacto para restaurante local con sistema de reservas integrado y optimización SEO.',
                    'tech'     => ['Laravel','Tailwind','Alpine.js'],
                    'icon'     => 'utensils',
                    'color'    => 'var(--color-primary)',
                ],
                [
                    'title'    => 'DistribuidoraMX',
                    'category' => 'sistemas',
                    'tag'      => 'Sistema a medida',
                    'desc'     => 'Sistema de cotización y gestión de pedidos para distribuidora con múltiples sucursales y roles de usuario.',
                    'tech'     => ['Laravel','Filament','MySQL'],
                    'icon'     => 'package',
                    'color'    => 'var(--color-accent)',
                ],
                [
                    'title'    => 'FitLife Brand',
                    'category' => 'marca',
                    'tag'      => 'Identidad de marca',
                    'desc'     => 'Identidad visual completa para gym boutique incluyendo logo, manual de marca y todos los assets digitales.',
                    'tech'     => ['Branding','Figma','Ilustración'],
                    'icon'     => 'dumbbell',
                    'color'    => 'var(--color-amber)',
                ],
                [
                    'title'    => 'InmobiliariaNova',
                    'category' => 'web',
                    'tag'      => 'Sitio corporativo',
                    'desc'     => 'Plataforma web escalable con catálogo de propiedades, filtros avanzados y CRM integrado para agentes.',
                    'tech'     => ['Laravel','Vue.js','PostgreSQL'],
                    'icon'     => 'building-2',
                    'color'    => 'var(--color-primary)',
                ],
                [
                    'title'    => 'CaféOrgánico',
                    'category' => 'marketing',
                    'tag'      => 'Campaña digital',
                    'desc'     => 'Estrategia de Meta Ads y contenido que triplicó las ventas en línea en 60 días con ROI de 340%.',
                    'tech'     => ['Meta Ads','Google Ads','Analytics'],
                    'icon'     => 'coffee',
                    'color'    => 'var(--color-accent)',
                ],
                [
                    'title'    => 'LogisticaRed',
                    'category' => 'sistemas',
                    'tag'      => 'Web App',
                    'desc'     => 'Panel de control para gestión de rutas, choferes y entregas en tiempo real con notificaciones push.',
                    'tech'     => ['Laravel','Filament','WebSockets'],
                    'icon'     => 'truck',
                    'color'    => 'var(--color-amber)',
                ],
                [
                    'title'    => 'ClínicaVida',
                    'category' => 'web',
                    'tag'      => 'Sitio corporativo',
                    'desc'     => 'Sitio web para clínica médica con sistema de citas en línea, expedientes y panel administrativo.',
                    'tech'     => ['Laravel','Livewire','MySQL'],
                    'icon'     => 'heart-pulse',
                    'color'    => 'var(--color-primary)',
                ],
                [
                    'title'    => 'ModaLocal',
                    'category' => 'marketing',
                    'tag'      => 'Redes sociales',
                    'desc'     => 'Gestión de redes sociales y contenido que llevó de 800 a 15k seguidores en Instagram en 4 meses.',
                    'tech'     => ['Instagram','TikTok','Diseño'],
                    'icon'     => 'shirt',
                    'color'    => 'var(--color-accent)',
                ],
                [
                    'title'    => 'TechStartup',
                    'category' => 'marca',
                    'tag'      => 'Branding completo',
                    'desc'     => 'Identidad visual y estrategia de comunicación para startup tecnológica en su etapa de lanzamiento.',
                    'tech'     => ['Branding','Estrategia','Motion'],
                    'icon'     => 'rocket',
                    'color'    => 'var(--color-amber)',
                ],
            ] as $project)
            <div
                class="fire-card portfolio-item"
                data-category="{{ $project['category'] }}"
                style="overflow:hidden; cursor:default;">

                {{-- Thumbnail --}}
                <div style="
                    height:180px;
                    background:linear-gradient(135deg, var(--color-surface2) 0%, {{ $project['color'] }}18 100%);
                    display:flex; align-items:center; justify-content:center;
                    position:relative;
                    border-bottom:1px solid var(--color-border);
                ">
                    <div style="
                        width:64px; height:64px;
                        border:1px solid {{ $project['color'] }}40;
                        background:{{ $project['color'] }}15;
                        display:flex; align-items:center; justify-content:center;
                    ">
                        <i data-lucide="{{ $project['icon'] }}" style="width:28px;height:28px;color:{{ $project['color'] }};"></i>
                    </div>

                    <div style="
                        position:absolute; top:1rem; right:1rem;
                        background:var(--color-bg);
                        border:1px solid {{ $project['color'] }}50;
                        padding:0.2rem 0.65rem;
                        font-family:var(--font-mono); font-size:0.65rem;
                        color:{{ $project['color'] }};
                        letter-spacing:0.08em;
                    ">{{ strtoupper($project['tag']) }}</div>
                </div>

                {{-- Content --}}
                <div style="padding:1.5rem;">
                    <h3 style="
                        font-family:var(--font-display); font-size:1rem; font-weight:700;
                        color:var(--color-text); margin-bottom:0.6rem; letter-spacing:0.04em;
                    ">{{ strtoupper($project['title']) }}</h3>

                    <p style="font-size:0.82rem; color:var(--color-muted); line-height:1.7; margin-bottom:1.25rem;">
                        {{ $project['desc'] }}
                    </p>

                    <div style="display:flex; flex-wrap:wrap; gap:0.4rem; margin-bottom:1.25rem;">
                        @foreach($project['tech'] as $tech)
                        <span style="
                            font-family:var(--font-mono); font-size:0.66rem;
                            padding:0.2rem 0.6rem;
                            background:var(--color-bg);
                            border:1px solid var(--color-border2);
                            color:var(--color-muted);
                        ">{{ $tech }}</span>
                        @endforeach
                    </div>

                    <a href="{{ route('contacto') }}" style="
                        display:inline-flex; align-items:center; gap:0.4rem;
                        font-family:var(--font-mono); font-size:0.7rem;
                        color:{{ $project['color'] }}; text-decoration:none;
                        letter-spacing:0.08em; transition:opacity 0.2s;
                    "
                    onmouseover="this.style.opacity='0.7'"
                    onmouseout="this.style.opacity='1'">
                        PROYECTO SIMILAR
                        <i data-lucide="arrow-right" style="width:12px;height:12px;"></i>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- CTA --}}
<section style="padding:4rem 0; background:var(--color-surface); position:relative; overflow:hidden;">
    <div style="position:absolute; inset:0; background:radial-gradient(ellipse 50% 100% at 50% 50%, rgba(232,34,10,0.08) 0%, transparent 70%);"></div>
    <div class="container" style="text-align:center; position:relative;">
        <div style="display:inline-flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
            <i data-lucide="plus-circle" style="width:18px;height:18px;color:var(--color-primary);"></i>
            <span class="tag">Tu proyecto puede ser el siguiente</span>
        </div>
        <h2 class="section-title" style="margin-bottom:1rem;">
            ¿TIENES UN <span class="highlight">PROYECTO EN MENTE?</span>
        </h2>
        <p style="color:var(--color-muted); max-width:420px; margin:0 auto 2rem; font-size:0.92rem; line-height:1.75;">
            Cuéntanos tu idea. Sin compromisos, te damos una propuesta inicial en menos de 24 horas.
        </p>
        <a href="{{ route('contacto') }}" class="btn-primary">
            <span>Iniciar mi proyecto</span>
            <i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i>
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
function filterPortfolio(btn, category) {
    document.querySelectorAll('[data-filter]').forEach(b => {
        b.style.background = 'transparent';
        b.style.borderColor = 'var(--color-border2)';
        b.style.color = 'var(--color-muted)';
    });
    btn.style.background = 'var(--color-primary)';
    btn.style.borderColor = 'var(--color-primary)';
    btn.style.color = '#fff';

    document.querySelectorAll('.portfolio-item').forEach(item => {
        const match = category === 'todos' || item.dataset.category === category;
        item.style.display = match ? 'block' : 'none';
    });
}
</script>
@endpush

@push('styles')
<style>
    @media (max-width: 900px) {
        #portfolio-grid { grid-template-columns: repeat(2,1fr) !important; }
    }
    @media (max-width: 580px) {
        #portfolio-grid { grid-template-columns: 1fr !important; }
    }
</style>
@endpush