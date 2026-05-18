@extends('nezzydev.layouts.app')

@section('title', 'Contacto — NezzyDev')

@section('content')

{{-- BANNER --}}
<div class="page-banner">
    <div class="container">
        <div class="tag" style="margin-bottom:1rem;">// Contacto</div>
        <h1 class="section-title" style="font-size:clamp(2.5rem,6vw,4rem); margin-bottom:1rem;">
            HABLEMOS DE<br><span class="highlight">TU PROYECTO.</span>
        </h1>
        <p style="color:var(--color-muted); max-width:520px; font-size:1rem; line-height:1.75;">
            Sin compromisos. Cuéntanos qué necesitas y te respondemos en menos de 24 horas.
        </p>
    </div>
</div>

{{-- CONTACTO --}}
<section style="padding:5rem 0;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1.4fr; gap:5rem; align-items:start;">

            {{-- Izquierda --}}
            <div>
                <div class="tag" style="margin-bottom:1rem;">// Encuéntranos</div>
                <h2 style="font-family:var(--font-display); font-size:1.4rem; font-weight:700; margin-bottom:2rem; letter-spacing:0.03em;">
                    ESTAMOS LISTOS<br>
                    <span class="highlight">PARA ESCUCHARTE.</span>
                </h2>

                <div style="display:flex; flex-direction:column; gap:1.5rem; margin-bottom:3rem;">
                    @foreach([
                        ['mail',        'Email',        'hola@nezzydev.com',    'mailto:hola@nezzydev.com',        'var(--color-primary)'],
                        ['phone',       'Teléfono',     '+52 33 0000 0000',     'tel:+523300000000',               'var(--color-accent)'],
                        ['message-circle','WhatsApp',   '+52 33 0000 0000',     'https://wa.me/5233000000',        'var(--color-amber)'],
                        ['map-pin',     'Ubicación',    'Guadalajara, Jalisco', null,                              'var(--color-primary)'],
                    ] as [$icon, $label, $value, $href, $color])
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <div style="
                            width:46px; height:46px; flex-shrink:0;
                            background:{{ $color }}10;
                            border:1px solid {{ $color }}30;
                            display:flex; align-items:center; justify-content:center;
                        ">
                            <i data-lucide="{{ $icon }}" style="width:18px;height:18px;color:{{ $color }};"></i>
                        </div>
                        <div>
                            <div style="font-family:var(--font-mono); font-size:0.68rem; color:var(--color-muted); letter-spacing:0.12em; margin-bottom:0.2rem;">
                                {{ strtoupper($label) }}
                            </div>
                            @if($href)
                            <a href="{{ $href }}" style="color:var(--color-text); text-decoration:none; font-size:0.92rem; transition:color 0.2s;"
                               onmouseover="this.style.color='{{ $color }}'"
                               onmouseout="this.style.color='var(--color-text)'">{{ $value }}</a>
                            @else
                            <span style="color:var(--color-text); font-size:0.92rem;">{{ $value }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Redes --}}
                <div>
                    <div class="tag" style="margin-bottom:1rem;">// Síguenos</div>
                    <div style="display:flex; gap:0.75rem;">
                        @foreach([
                            ['instagram', 'Instagram'],
                            ['linkedin',  'LinkedIn'],
                            ['music-2',   'TikTok'],
                            ['facebook',  'Facebook'],
                        ] as [$icon, $name])
                        <a href="#" title="{{ $name }}" style="
                            width:42px; height:42px;
                            border:1px solid var(--color-border2);
                            display:flex; align-items:center; justify-content:center;
                            color:var(--color-muted); text-decoration:none; transition:all 0.2s;
                        "
                        onmouseover="this.style.borderColor='var(--color-primary)'; this.style.color='var(--color-primary)'; this.style.background='rgba(232,34,10,0.08)'"
                        onmouseout="this.style.borderColor='var(--color-border2)'; this.style.color='var(--color-muted)'; this.style.background='transparent'">
                            <i data-lucide="{{ $icon }}" style="width:16px;height:16px;"></i>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Horario --}}
                <div style="
                    margin-top:2.5rem;
                    padding:1.5rem;
                    background:var(--color-surface);
                    border:1px solid var(--color-border);
                ">
                    <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom:1rem;">
                        <i data-lucide="clock" style="width:15px;height:15px;color:var(--color-primary);"></i>
                        <span style="font-family:var(--font-mono); font-size:0.7rem; color:var(--color-muted); letter-spacing:0.12em;">HORARIO DE ATENCIÓN</span>
                    </div>
                    @foreach([
                        ['Lunes — Viernes', '9:00 AM — 7:00 PM'],
                        ['Sábado',          '10:00 AM — 2:00 PM'],
                        ['Domingo',         'Cerrado'],
                    ] as [$day, $hours])
                    <div style="display:flex; justify-content:space-between; padding:0.5rem 0; border-bottom:1px solid var(--color-border); font-size:0.83rem;">
                        <span style="color:var(--color-muted);">{{ $day }}</span>
                        <span style="color:{{ $hours === 'Cerrado' ? 'var(--color-muted)' : 'var(--color-text)' }}; font-family:var(--font-mono); font-size:0.78rem;">{{ $hours }}</span>
                    </div>
                    @endforeach
                </div>

            </div>

            {{-- Derecha — Formulario --}}
            <div style="
                background:var(--color-surface);
                border:1px solid var(--color-border);
                padding:2.5rem;
                position:relative;
                overflow:hidden;
            " class="glow-fire">

                <div style="
                    position:absolute; top:0; right:0;
                    width:150px; height:150px;
                    background:radial-gradient(circle at top right, rgba(232,34,10,0.08), transparent 70%);
                "></div>

                <div class="tag" style="margin-bottom:1.5rem;">// nueva_consulta.init</div>

                <form action="#" method="POST" style="display:flex; flex-direction:column; gap:1.25rem; position:relative;">
                    @csrf

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem;">
                        @foreach([
                            ['text',  'nombre',  'Tu nombre', 'Nombre *'],
                            ['email', 'email',   'tu@email.com', 'Email *'],
                        ] as [$type, $name, $ph, $label])
                        <div>
                            <label style="display:block; font-family:var(--font-mono); font-size:0.68rem; color:var(--color-muted); letter-spacing:0.12em; margin-bottom:0.5rem;">
                                {{ strtoupper($label) }}
                            </label>
                            <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $ph }}" style="
                                width:100%; background:var(--color-bg);
                                border:1px solid var(--color-border2);
                                padding:0.8rem 1rem; color:var(--color-text);
                                font-family:var(--font-body); font-size:0.9rem; outline:none;
                                transition:border-color 0.2s;
                            "
                            onfocus="this.style.borderColor='var(--color-primary)'"
                            onblur="this.style.borderColor='var(--color-border2)'">
                        </div>
                        @endforeach
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem;">
                        <div>
                            <label style="display:block; font-family:var(--font-mono); font-size:0.68rem; color:var(--color-muted); letter-spacing:0.12em; margin-bottom:0.5rem;">
                                TELÉFONO
                            </label>
                            <input type="tel" name="telefono" placeholder="+52 33 ..." style="
                                width:100%; background:var(--color-bg);
                                border:1px solid var(--color-border2);
                                padding:0.8rem 1rem; color:var(--color-text);
                                font-family:var(--font-body); font-size:0.9rem; outline:none;
                                transition:border-color 0.2s;
                            "
                            onfocus="this.style.borderColor='var(--color-primary)'"
                            onblur="this.style.borderColor='var(--color-border2)'">
                        </div>
                        <div>
                            <label style="display:block; font-family:var(--font-mono); font-size:0.68rem; color:var(--color-muted); letter-spacing:0.12em; margin-bottom:0.5rem;">
                                PRESUPUESTO APROXIMADO
                            </label>
                            <select name="presupuesto" style="
                                width:100%; background:var(--color-bg);
                                border:1px solid var(--color-border2);
                                padding:0.8rem 1rem; color:var(--color-text);
                                font-family:var(--font-body); font-size:0.9rem; outline:none;
                                cursor:pointer; transition:border-color 0.2s;
                            "
                            onfocus="this.style.borderColor='var(--color-primary)'"
                            onblur="this.style.borderColor='var(--color-border2)'">
                                <option value="">Selecciona...</option>
                                @foreach(['Menos de $10,000','$10,000 — $25,000','$25,000 — $50,000','$50,000 — $100,000','Más de $100,000'] as $opt)
                                <option value="{{ $opt }}">{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label style="display:block; font-family:var(--font-mono); font-size:0.68rem; color:var(--color-muted); letter-spacing:0.12em; margin-bottom:0.5rem;">
                            SERVICIO DE INTERÉS *
                        </label>
                        <select name="servicio" style="
                            width:100%; background:var(--color-bg);
                            border:1px solid var(--color-border2);
                            padding:0.8rem 1rem; color:var(--color-text);
                            font-family:var(--font-body); font-size:0.9rem; outline:none;
                            cursor:pointer; transition:border-color 0.2s;
                        "
                        onfocus="this.style.borderColor='var(--color-primary)'"
                        onblur="this.style.borderColor='var(--color-border2)'">
                            <option value="">Selecciona una opción...</option>
                            @foreach(['Landing Page','Sitio Corporativo','Web App / Sistema a medida','Identidad de Marca','Campaña Publicitaria','Gestión de Redes','Paquete completo'] as $opt)
                            <option value="{{ $opt }}">{{ $opt }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label style="display:block; font-family:var(--font-mono); font-size:0.68rem; color:var(--color-muted); letter-spacing:0.12em; margin-bottom:0.5rem;">
                            CUÉNTANOS TU PROYECTO *
                        </label>
                        <textarea name="mensaje" rows="5" placeholder="Describe brevemente qué necesitas, tu negocio y cualquier detalle relevante..." style="
                            width:100%; background:var(--color-bg);
                            border:1px solid var(--color-border2);
                            padding:0.8rem 1rem; color:var(--color-text);
                            font-family:var(--font-body); font-size:0.9rem; outline:none;
                            resize:vertical; transition:border-color 0.2s;
                        "
                        onfocus="this.style.borderColor='var(--color-primary)'"
                        onblur="this.style.borderColor='var(--color-border2)'"></textarea>
                    </div>

                    <button type="submit" class="btn-primary" style="width:100%; justify-content:center; padding:1rem; font-size:0.88rem;">
                        <span>Enviar mensaje</span>
                        <i data-lucide="send" style="width:15px;height:15px;position:relative;z-index:1;"></i>
                    </button>

                    <p style="font-size:0.75rem; color:var(--color-muted); text-align:center; font-family:var(--font-mono);">
                        Respondemos en menos de 24 horas · Sin spam
                    </p>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    @media (max-width: 900px) {
        section .container > div[style*="grid-template-columns:1fr 1.4fr"] {
            grid-template-columns: 1fr !important;
        }
    }
    @media (max-width: 550px) {
        section .container form > div[style*="grid-template-columns:1fr 1fr"] {
            grid-template-columns: 1fr !important;
        }
    }
    select option { background: #110a0a; }
</style>
@endpush