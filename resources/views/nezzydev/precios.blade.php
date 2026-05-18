@extends('nezzydev.layouts.app')

@section('title', 'Precios — NezzyDev')

@section('content')

{{-- BANNER --}}
<div class="page-banner">
    <div class="container">
        <div class="tag" style="margin-bottom:1rem;">// Precios</div>
        <h1 class="section-title" style="font-size:clamp(2.5rem,6vw,4rem); margin-bottom:1rem;">
            INVERSIÓN CLARA,<br><span class="highlight">RESULTADOS REALES.</span>
        </h1>
        <p style="color:var(--color-muted); max-width:520px; font-size:1rem; line-height:1.75;">
            Planes pensados para cada etapa de tu negocio. Sin costos ocultos, sin sorpresas.
        </p>
    </div>
</div>

{{-- PLANES WEB --}}
<section style="padding:5rem 0;">
    <div class="container">

        <div style="text-align:center; margin-bottom:3rem;">
            <div class="tag" style="margin-bottom:0.75rem;">// Desarrollo Web</div>
            <h2 class="section-title">PLANES <span class="highlight">WEB</span></h2>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem; align-items:start;">
            @foreach([
                [
                    'name'     => 'Starter',
                    'badge'    => 'Para empezar',
                    'price'    => '$8,500',
                    'period'   => 'MXN · pago único',
                    'desc'     => 'Ideal para emprendedores y negocios que necesitan presencia web rápida y profesional.',
                    'featured' => false,
                    'color'    => 'var(--color-primary)',
                    'items'    => [
                        [true,  'Landing page 1 página'],
                        [true,  'Diseño personalizado'],
                        [true,  'Formulario de contacto'],
                        [true,  'Optimización móvil'],
                        [true,  'Dominio + hosting 1 año'],
                        [true,  'Entrega en 7 días'],
                        [false, 'Panel de administración'],
                        [false, 'Blog incluido'],
                    ],
                ],
                [
                    'name'     => 'Business',
                    'badge'    => 'Más popular',
                    'price'    => '$22,000',
                    'period'   => 'MXN · pago único',
                    'desc'     => 'Para negocios que quieren una presencia completa con panel de administración y mayor alcance.',
                    'featured' => true,
                    'color'    => 'var(--color-accent)',
                    'items'    => [
                        [true,  'Sitio multi-página (hasta 8)'],
                        [true,  'Panel de administración'],
                        [true,  'Blog / noticias'],
                        [true,  'SEO básico integrado'],
                        [true,  'Galería y portafolio'],
                        [true,  'Dominio + hosting 1 año'],
                        [true,  'Soporte 3 meses'],
                        [true,  'Entrega en 15 días'],
                    ],
                ],
                [
                    'name'     => 'Enterprise',
                    'badge'    => 'A la medida',
                    'price'    => 'Cotización',
                    'period'   => 'según alcance',
                    'desc'     => 'Sistemas complejos, web apps escalables y proyectos con requerimientos específicos.',
                    'featured' => false,
                    'color'    => 'var(--color-amber)',
                    'items'    => [
                        [true,  'Desarrollo 100% a medida'],
                        [true,  'Arquitectura escalable'],
                        [true,  'Integraciones y APIs'],
                        [true,  'Base de datos optimizada'],
                        [true,  'Panel avanzado'],
                        [true,  'Soporte prioritario'],
                        [true,  'Documentación técnica'],
                        [true,  'Mantenimiento mensual'],
                    ],
                ],
            ] as $plan)
            <div style="
                background:{{ $plan['featured'] ? 'linear-gradient(135deg,var(--color-surface),var(--color-surface2))' : 'var(--color-surface)' }};
                border:1px solid {{ $plan['featured'] ? $plan['color'] : 'var(--color-border)' }};
                padding:2.25rem;
                position:relative;
                transition:transform 0.3s;
                {{ $plan['featured'] ? 'box-shadow:0 0 50px rgba(255,107,26,0.12);' : '' }}
            "
            onmouseover="this.style.transform='translateY(-4px)'"
            onmouseout="this.style.transform='translateY(0)'">

                @if($plan['featured'])
                <div style="
                    position:absolute; top:-1px; left:50%; transform:translateX(-50%);
                    background:linear-gradient(90deg,var(--color-primary),var(--color-accent));
                    color:#fff; font-family:var(--font-mono); font-size:0.65rem;
                    font-weight:600; padding:0.25rem 1.25rem; letter-spacing:0.12em;
                    display:flex; align-items:center; gap:0.4rem;
                ">
                    <i data-lucide="star" style="width:10px;height:10px;"></i>
                    MÁS POPULAR
                </div>
                @endif

                <div style="font-family:var(--font-mono); font-size:0.68rem; color:{{ $plan['color'] }}; letter-spacing:0.15em; margin-bottom:0.75rem;">
                    {{ strtoupper($plan['badge']) }}
                </div>

                <h3 style="font-family:var(--font-display); font-size:1.5rem; font-weight:700; color:var(--color-text); margin-bottom:1rem; letter-spacing:0.05em;">
                    {{ strtoupper($plan['name']) }}
                </h3>

                <div style="margin-bottom:1rem;">
                    <span style="
                        font-family:var(--font-display); font-size:2.2rem; font-weight:700;
                        background:linear-gradient(90deg,{{ $plan['color'] }},var(--color-amber));
                        -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
                    ">{{ $plan['price'] }}</span>
                    <span style="font-size:0.75rem; color:var(--color-muted); font-family:var(--font-mono); display:block; margin-top:0.25rem;">
                        {{ $plan['period'] }}
                    </span>
                </div>

                <p style="font-size:0.83rem; color:var(--color-muted); line-height:1.65; padding:1.25rem 0; border-top:1px solid var(--color-border); border-bottom:1px solid var(--color-border); margin-bottom:1.5rem;">
                    {{ $plan['desc'] }}
                </p>

                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.65rem; margin-bottom:2rem;">
                    @foreach($plan['items'] as [$active, $item])
                    <li style="display:flex; align-items:center; gap:0.6rem; font-size:0.83rem; color:{{ $active ? 'var(--color-text)' : 'var(--color-muted)' }}; opacity:{{ $active ? '1' : '0.4' }};">
                        <i data-lucide="{{ $active ? 'check-circle' : 'minus-circle' }}"
                           style="width:14px;height:14px;color:{{ $active ? $plan['color'] : 'var(--color-muted)' }};flex-shrink:0;"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('contacto') }}" style="
                    display:flex; align-items:center; justify-content:center; gap:0.5rem;
                    padding:0.9rem;
                    background:{{ $plan['featured'] ? 'linear-gradient(135deg,var(--color-primary),var(--color-accent))' : 'transparent' }};
                    border:1px solid {{ $plan['featured'] ? 'transparent' : 'var(--color-border2)' }};
                    color:{{ $plan['featured'] ? '#fff' : 'var(--color-text)' }};
                    font-family:var(--font-display); font-weight:600;
                    font-size:0.82rem; letter-spacing:0.06em;
                    text-decoration:none; transition:all 0.25s;
                "
                onmouseover="this.style.borderColor='{{ $plan['color'] }}'; this.style.color='{{ $plan['featured'] ? '#fff' : $plan['color'] }}'"
                onmouseout="this.style.borderColor='{{ $plan['featured'] ? 'transparent' : 'var(--color-border2)' }}'; this.style.color='{{ $plan['featured'] ? '#fff' : 'var(--color-text)' }}'">
                    {{ $plan['price'] === 'Cotización' ? 'SOLICITAR COTIZACIÓN' : 'COMENZAR AHORA' }}
                    <i data-lucide="arrow-right" style="width:13px;height:13px;"></i>
                </a>

            </div>
            @endforeach
        </div>

    </div>
</section>

<div class="fire-divider"></div>

{{-- PLANES MARKETING --}}
<section style="padding:5rem 0; background:var(--color-surface);">
    <div class="container">

        <div style="text-align:center; margin-bottom:3rem;">
            <div class="tag" style="margin-bottom:0.75rem;">// Marketing Digital</div>
            <h2 class="section-title">PLANES DE <span class="highlight">MARKETING</span></h2>
        </div>

        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem;">
            @foreach([
                [
                    'icon'   => 'zap',
                    'name'   => 'Spark',
                    'badge'  => 'Para arrancar',
                    'price'  => '$5,500',
                    'period' => 'MXN / mes',
                    'color'  => 'var(--color-primary)',
                    'items'  => ['1 red social','12 publicaciones/mes','Diseño de contenido','Reporte mensual'],
                ],
                [
                    'icon'   => 'flame',
                    'name'   => 'Blaze',
                    'badge'  => 'Más completo',
                    'price'  => '$12,000',
                    'period' => 'MXN / mes',
                    'color'  => 'var(--color-accent)',
                    'items'  => ['3 redes sociales','30 publicaciones/mes','Meta Ads incluido','Stories y Reels','Reporte semanal'],
                ],
                [
                    'icon'   => 'rocket',
                    'name'   => 'Inferno',
                    'badge'  => 'Máximo impacto',
                    'price'  => '$22,000',
                    'period' => 'MXN / mes',
                    'color'  => 'var(--color-amber)',
                    'items'  => ['Todas las redes','Contenido ilimitado','Meta + Google + TikTok Ads','SEO incluido','Estrategia completa','Reporte en tiempo real'],
                ],
            ] as $plan)
            <div class="fire-card" style="padding:2rem; text-align:center;">
                <div style="
                    width:52px; height:52px; margin:0 auto 1.25rem;
                    border:1px solid {{ $plan['color'] }}40;
                    background:{{ $plan['color'] }}10;
                    display:flex; align-items:center; justify-content:center;
                ">
                    <i data-lucide="{{ $plan['icon'] }}" style="width:22px;height:22px;color:{{ $plan['color'] }};"></i>
                </div>

                <div style="font-family:var(--font-mono); font-size:0.65rem; color:{{ $plan['color'] }}; letter-spacing:0.15em; margin-bottom:0.5rem;">
                    {{ strtoupper($plan['badge']) }}
                </div>

                <h3 style="font-family:var(--font-display); font-size:1.3rem; font-weight:700; color:var(--color-text); margin-bottom:0.75rem; letter-spacing:0.06em;">
                    {{ strtoupper($plan['name']) }}
                </h3>

                <div style="margin-bottom:1.5rem;">
                    <span style="
                        font-family:var(--font-display); font-size:1.8rem; font-weight:700;
                        background:linear-gradient(90deg,{{ $plan['color'] }},var(--color-amber));
                        -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
                    ">{{ $plan['price'] }}</span>
                    <span style="font-size:0.75rem; color:var(--color-muted); font-family:var(--font-mono); display:block; margin-top:0.2rem;">
                        {{ $plan['period'] }}
                    </span>
                </div>

                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.6rem; margin-bottom:1.75rem; text-align:left;">
                    @foreach($plan['items'] as $item)
                    <li style="display:flex; align-items:center; gap:0.6rem; font-size:0.83rem; color:var(--color-text);">
                        <i data-lucide="check" style="width:13px;height:13px;color:{{ $plan['color'] }};flex-shrink:0;"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('contacto') }}" style="
                    display:flex; align-items:center; justify-content:center; gap:0.5rem;
                    padding:0.8rem;
                    border:1px solid {{ $plan['color'] }}50;
                    color:{{ $plan['color'] }};
                    font-family:var(--font-display); font-size:0.78rem;
                    font-weight:600; letter-spacing:0.06em;
                    text-decoration:none; transition:all 0.2s;
                    background:{{ $plan['color'] }}08;
                "
                onmouseover="this.style.background='{{ $plan['color'] }}20'"
                onmouseout="this.style.background='{{ $plan['color'] }}08'">
                    COMENZAR
                    <i data-lucide="arrow-right" style="width:13px;height:13px;"></i>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>

<div class="fire-divider"></div>

{{-- FAQ --}}
<section style="padding:5rem 0;">
    <div class="container">
        <div style="text-align:center; margin-bottom:3rem;">
            <div class="tag" style="margin-bottom:0.75rem;">// Preguntas frecuentes</div>
            <h2 class="section-title">¿TIENES <span class="highlight">DUDAS?</span></h2>
        </div>

        <div style="max-width:720px; margin:0 auto; display:flex; flex-direction:column; gap:1px;">
            @foreach([
                ['¿Los precios incluyen IVA?',                   'Los precios mostrados no incluyen IVA. Al momento de cotizar te indicamos el desglose completo sin sorpresas.'],
                ['¿Puedo pagar en parcialidades?',              'Sí. Generalmente manejamos 50% al inicio y 50% al entregar. En proyectos grandes podemos acordar un plan de pagos personalizado.'],
                ['¿Cuánto tiempo tarda un proyecto?',            'Depende del alcance. Una landing page puede estar lista en 7 días; un sistema a medida puede tomar de 4 a 12 semanas según complejidad.'],
                ['¿Qué pasa después de la entrega?',             'Incluimos soporte post-entrega según el plan. También ofrecemos planes de mantenimiento mensual para que tu proyecto siempre esté actualizado.'],
                ['¿Puedo solicitar cambios durante el proceso?', 'Sí, dentro del alcance acordado. Si el proyecto crece, lo cotizamos de forma transparente antes de proceder.'],
            ] as $i => [$q, $a])
            <div style="
                background:var(--color-surface);
                border:1px solid var(--color-border);
                margin-bottom:2px;
            ">
                <button onclick="toggleFaq(this)" style="
                    width:100%; display:flex; align-items:center; justify-content:space-between;
                    padding:1.25rem 1.5rem;
                    background:none; border:none; cursor:pointer;
                    color:var(--color-text); text-align:left;
                    font-family:var(--font-display); font-size:0.88rem;
                    font-weight:600; letter-spacing:0.03em;
                ">
                    {{ $q }}
                    <i data-lucide="plus" style="width:16px;height:16px;color:var(--color-primary);flex-shrink:0;transition:transform 0.3s;"></i>
                </button>
                <div class="faq-answer" style="
                    max-height:0; overflow:hidden;
                    transition:max-height 0.3s ease, padding 0.3s ease;
                    padding:0 1.5rem;
                ">
                    <p style="font-size:0.87rem; color:var(--color-muted); line-height:1.75; padding-bottom:1.25rem;">
                        {{ $a }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align:center; margin-top:2.5rem;">
            <p style="color:var(--color-muted); font-size:0.88rem; margin-bottom:1.25rem;">
                ¿Tienes una pregunta diferente?
            </p>
            <a href="{{ route('contacto') }}" class="btn-outline">
                <i data-lucide="message-circle" style="width:15px;height:15px;"></i>
                Escríbenos directamente
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function toggleFaq(btn) {
    const answer = btn.nextElementSibling;
    const icon = btn.querySelector('i[data-lucide]');
    const isOpen = answer.style.maxHeight !== '0px' && answer.style.maxHeight !== '';

    document.querySelectorAll('.faq-answer').forEach(a => { a.style.maxHeight = '0'; a.style.padding = '0 1.5rem'; });
    document.querySelectorAll('.faq-answer + button i, button i[data-lucide="x"]').forEach(i => i.style.transform = 'rotate(0deg)');

    if (!isOpen) {
        answer.style.maxHeight = answer.scrollHeight + 32 + 'px';
        answer.style.paddingTop = '0';
        icon.style.transform = 'rotate(45deg)';
    }
}
</script>
@endpush

@push('styles')
<style>
    @media (max-width: 900px) {
        section .container > div[style*="grid-template-columns:repeat(3"] {
            grid-template-columns: 1fr !important;
            max-width: 440px; margin-left: auto; margin-right: auto;
        }
    }
</style>
@endpush