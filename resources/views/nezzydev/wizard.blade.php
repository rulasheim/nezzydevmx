@extends('nezzydev.layouts.app')

@section('title', 'Descubre qué necesitas — NezzyDev')

@section('content')

<div class="page-banner" style="padding-bottom:2rem;">
    <div class="container" style="text-align:center;">
        <div class="tag" style="margin-bottom:1rem; justify-content:center; display:flex; align-items:center; gap:0.5rem;">
            <i data-lucide="compass" style="width:13px;height:13px;"></i>
            // Diagnóstico Digital
        </div>
        <h1 class="section-title" style="font-size:clamp(2rem,5vw,3.5rem); margin-bottom:1rem;">
            DESCUBRE LO QUE<br><span class="highlight">TU NEGOCIO NECESITA.</span>
        </h1>
        <p style="color:var(--color-muted); max-width:500px; margin:0 auto; font-size:0.95rem; line-height:1.75;">
            Responde 6 preguntas rápidas y te diremos exactamente qué solución digital se adapta a tu negocio.
        </p>
    </div>
</div>

<section style="padding:4rem 0 6rem;">
    <div class="container">
        <div style="max-width:760px; margin:0 auto;">

            {{-- Progress bar --}}
            <div style="margin-bottom:3rem;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                    <span style="font-family:var(--font-mono); font-size:0.7rem; color:var(--color-muted);">
                        PREGUNTA <span id="current-step-label">1</span> DE 6
                    </span>
                    <span style="font-family:var(--font-mono); font-size:0.7rem; color:var(--color-primary);" id="pct-label">0%</span>
                </div>
                <div style="height:3px; background:var(--color-border); border-radius:2px; overflow:hidden;">
                    <div id="progress-bar" style="
                        height:100%; width:0%;
                        background:linear-gradient(90deg,var(--color-primary),var(--color-amber));
                        border-radius:2px; transition:width 0.5s ease;
                    "></div>
                </div>

                {{-- Step dots --}}
                <div style="display:flex; justify-content:space-between; margin-top:0.75rem;">
                    @for($i = 1; $i <= 6; $i++)
                    <div class="step-dot" data-step="{{ $i }}" style="
                        width:28px; height:28px; border-radius:50%;
                        border:1px solid {{ $i === 1 ? 'var(--color-primary)' : 'var(--color-border2)' }};
                        background:{{ $i === 1 ? 'rgba(232,34,10,0.15)' : 'var(--color-bg)' }};
                        display:flex; align-items:center; justify-content:center;
                        font-family:var(--font-mono); font-size:0.65rem;
                        color:{{ $i === 1 ? 'var(--color-primary)' : 'var(--color-muted)' }};
                        transition:all 0.3s;
                        cursor:default;
                    ">{{ $i }}</div>
                    @endfor
                </div>
            </div>

            {{-- Questions container --}}
            <div id="wizard-container">

                {{-- STEP 1 --}}
                <div class="wizard-step" data-step="1" style="animation:fadeUp 0.5s ease both;">
                    <div style="
                        background:var(--color-surface); border:1px solid var(--color-border);
                        padding:2.5rem; margin-bottom:1.5rem; position:relative; overflow:hidden;
                    ">
                        <div style="position:absolute;top:0;right:0;width:120px;height:120px;background:radial-gradient(circle at top right,rgba(232,34,10,0.08),transparent 70%);"></div>

                        <div style="display:flex; align-items:center; gap:1rem; margin-bottom:2rem;">
                            <div style="
                                width:44px;height:44px;flex-shrink:0;
                                border:1px solid var(--color-primary);
                                background:rgba(232,34,10,0.1);
                                display:flex;align-items:center;justify-content:center;
                            ">
                                <i data-lucide="briefcase" style="width:20px;height:20px;color:var(--color-primary);"></i>
                            </div>
                            <div>
                                <div class="tag" style="margin-bottom:0.2rem;">Paso 01</div>
                                <h2 style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;letter-spacing:0.03em;">
                                    ¿En qué etapa está tu negocio?
                                </h2>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;" id="opts-1">
                            @foreach([
                                ['seedling',      'Apenas empieza',      'Tengo la idea o llevo menos de 1 año',         'nuevo'],
                                ['trending-up',   'En crecimiento',      'Ya tengo clientes pero quiero escalar',         'creciendo'],
                                ['building-2',    'Establecido',         'Negocio sólido buscando modernizarse',          'establecido'],
                                ['zap',           'Transformación',      'Necesito digitalizar procesos internos',         'transformacion'],
                            ] as [$icon, $title, $sub, $val])
                            <button
                                onclick="selectOption(this, 1, '{{ $val }}')"
                                class="wizard-option"
                                data-value="{{ $val }}"
                                style="
                                    display:flex;align-items:flex-start;gap:1rem;
                                    padding:1.25rem;text-align:left;
                                    background:var(--color-bg);
                                    border:1px solid var(--color-border2);
                                    color:var(--color-text);cursor:pointer;
                                    transition:all 0.2s;width:100%;
                                ">
                                <div style="
                                    width:36px;height:36px;flex-shrink:0;
                                    border:1px solid var(--color-border2);
                                    display:flex;align-items:center;justify-content:center;
                                    background:var(--color-surface);
                                    transition:all 0.2s;
                                " class="opt-icon">
                                    <i data-lucide="{{ $icon }}" style="width:16px;height:16px;color:var(--color-muted);"></i>
                                </div>
                                <div>
                                    <div style="font-family:var(--font-display);font-size:0.88rem;font-weight:700;letter-spacing:0.03em;margin-bottom:0.25rem;">
                                        {{ strtoupper($title) }}
                                    </div>
                                    <div style="font-size:0.78rem;color:var(--color-muted);line-height:1.5;">{{ $sub }}</div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div style="display:flex;justify-content:flex-end;">
                        <button onclick="nextStep(1)" class="btn-primary" id="next-1" disabled style="opacity:0.4;cursor:not-allowed;">
                            <span>Siguiente</span>
                            <i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i>
                        </button>
                    </div>
                </div>

                {{-- STEP 2 --}}
                <div class="wizard-step" data-step="2" style="display:none;">
                    <div style="background:var(--color-surface);border:1px solid var(--color-border);padding:2.5rem;margin-bottom:1.5rem;position:relative;overflow:hidden;">
                        <div style="position:absolute;top:0;right:0;width:120px;height:120px;background:radial-gradient(circle at top right,rgba(255,107,26,0.08),transparent 70%);"></div>

                        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;">
                            <div style="width:44px;height:44px;flex-shrink:0;border:1px solid var(--color-accent);background:rgba(255,107,26,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="globe" style="width:20px;height:20px;color:var(--color-accent);"></i>
                            </div>
                            <div>
                                <div class="tag" style="margin-bottom:0.2rem;color:var(--color-accent);">Paso 02</div>
                                <h2 style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;letter-spacing:0.03em;">
                                    ¿Tienes presencia digital actualmente?
                                </h2>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;" id="opts-2">
                            @foreach([
                                ['x-circle',     'Sin presencia',        'No tengo web ni redes sociales',                'ninguna'],
                                ['instagram',    'Solo redes sociales',  'Tengo Instagram, Facebook o TikTok',            'redes'],
                                ['layout',       'Página web básica',    'Tengo un sitio pero está desactualizado',       'web-basica'],
                                ['check-circle', 'Presencia completa',   'Tengo web y redes activas, quiero mejorar',     'completa'],
                            ] as [$icon, $title, $sub, $val])
                            <button onclick="selectOption(this, 2, '{{ $val }}')" class="wizard-option" data-value="{{ $val }}" style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;text-align:left;background:var(--color-bg);border:1px solid var(--color-border2);color:var(--color-text);cursor:pointer;transition:all 0.2s;width:100%;">
                                <div style="width:36px;height:36px;flex-shrink:0;border:1px solid var(--color-border2);display:flex;align-items:center;justify-content:center;background:var(--color-surface);transition:all 0.2s;" class="opt-icon">
                                    <i data-lucide="{{ $icon }}" style="width:16px;height:16px;color:var(--color-muted);"></i>
                                </div>
                                <div>
                                    <div style="font-family:var(--font-display);font-size:0.88rem;font-weight:700;letter-spacing:0.03em;margin-bottom:0.25rem;">{{ strtoupper($title) }}</div>
                                    <div style="font-size:0.78rem;color:var(--color-muted);line-height:1.5;">{{ $sub }}</div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <button onclick="prevStep(2)" class="btn-outline">
                            <i data-lucide="arrow-left" style="width:14px;height:14px;"></i>
                            Anterior
                        </button>
                        <button onclick="nextStep(2)" class="btn-primary" id="next-2" disabled style="opacity:0.4;cursor:not-allowed;">
                            <span>Siguiente</span>
                            <i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i>
                        </button>
                    </div>
                </div>

                {{-- STEP 3 --}}
                <div class="wizard-step" data-step="3" style="display:none;">
                    <div style="background:var(--color-surface);border:1px solid var(--color-border);padding:2.5rem;margin-bottom:1.5rem;position:relative;overflow:hidden;">
                        <div style="position:absolute;top:0;right:0;width:120px;height:120px;background:radial-gradient(circle at top right,rgba(255,181,71,0.08),transparent 70%);"></div>

                        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;">
                            <div style="width:44px;height:44px;flex-shrink:0;border:1px solid var(--color-amber);background:rgba(255,181,71,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="target" style="width:20px;height:20px;color:var(--color-amber);"></i>
                            </div>
                            <div>
                                <div class="tag" style="margin-bottom:0.2rem;color:var(--color-amber);">Paso 03</div>
                                <h2 style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;letter-spacing:0.03em;">
                                    ¿Cuál es tu objetivo principal?
                                </h2>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;" id="opts-3">
                            @foreach([
                                ['users',         'Conseguir clientes',    'Quiero que más personas me encuentren y compren',   'clientes'],
                                ['repeat',        'Automatizar procesos',  'Quiero optimizar tareas internas de mi negocio',    'automatizar'],
                                ['star',          'Mejorar mi imagen',     'Quiero una marca profesional y confiable',          'imagen'],
                                ['bar-chart-2',   'Vender en línea',       'Quiero un e-commerce o tienda digital',             'ecommerce'],
                            ] as [$icon, $title, $sub, $val])
                            <button onclick="selectOption(this, 3, '{{ $val }}')" class="wizard-option" data-value="{{ $val }}" style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;text-align:left;background:var(--color-bg);border:1px solid var(--color-border2);color:var(--color-text);cursor:pointer;transition:all 0.2s;width:100%;">
                                <div style="width:36px;height:36px;flex-shrink:0;border:1px solid var(--color-border2);display:flex;align-items:center;justify-content:center;background:var(--color-surface);transition:all 0.2s;" class="opt-icon">
                                    <i data-lucide="{{ $icon }}" style="width:16px;height:16px;color:var(--color-muted);"></i>
                                </div>
                                <div>
                                    <div style="font-family:var(--font-display);font-size:0.88rem;font-weight:700;letter-spacing:0.03em;margin-bottom:0.25rem;">{{ strtoupper($title) }}</div>
                                    <div style="font-size:0.78rem;color:var(--color-muted);line-height:1.5;">{{ $sub }}</div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <button onclick="prevStep(3)" class="btn-outline"><i data-lucide="arrow-left" style="width:14px;height:14px;"></i> Anterior</button>
                        <button onclick="nextStep(3)" class="btn-primary" id="next-3" disabled style="opacity:0.4;cursor:not-allowed;"><span>Siguiente</span><i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i></button>
                    </div>
                </div>

                {{-- STEP 4 --}}
                <div class="wizard-step" data-step="4" style="display:none;">
                    <div style="background:var(--color-surface);border:1px solid var(--color-border);padding:2.5rem;margin-bottom:1.5rem;position:relative;overflow:hidden;">
                        <div style="position:absolute;top:0;right:0;width:120px;height:120px;background:radial-gradient(circle at top right,rgba(232,34,10,0.08),transparent 70%);"></div>

                        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;">
                            <div style="width:44px;height:44px;flex-shrink:0;border:1px solid var(--color-primary);background:rgba(232,34,10,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="wallet" style="width:20px;height:20px;color:var(--color-primary);"></i>
                            </div>
                            <div>
                                <div class="tag" style="margin-bottom:0.2rem;">Paso 04</div>
                                <h2 style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;letter-spacing:0.03em;">
                                    ¿Cuál es tu presupuesto aproximado?
                                </h2>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;" id="opts-4">
                            @foreach([
                                ['sprout',      'Hasta $15,000',         'Ideal para arrancar con lo esencial',            'bajo'],
                                ['flame',       '$15,000 — $40,000',     'Para proyectos intermedios con más alcance',     'medio'],
                                ['zap',         '$40,000 — $80,000',     'Proyectos robustos y bien equipados',            'alto'],
                                ['rocket',      'Más de $80,000',        'Soluciones enterprise o sistemas complejos',     'enterprise'],
                            ] as [$icon, $title, $sub, $val])
                            <button onclick="selectOption(this, 4, '{{ $val }}')" class="wizard-option" data-value="{{ $val }}" style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;text-align:left;background:var(--color-bg);border:1px solid var(--color-border2);color:var(--color-text);cursor:pointer;transition:all 0.2s;width:100%;">
                                <div style="width:36px;height:36px;flex-shrink:0;border:1px solid var(--color-border2);display:flex;align-items:center;justify-content:center;background:var(--color-surface);transition:all 0.2s;" class="opt-icon">
                                    <i data-lucide="{{ $icon }}" style="width:16px;height:16px;color:var(--color-muted);"></i>
                                </div>
                                <div>
                                    <div style="font-family:var(--font-display);font-size:0.88rem;font-weight:700;letter-spacing:0.03em;margin-bottom:0.25rem;">{{ strtoupper($title) }}</div>
                                    <div style="font-size:0.78rem;color:var(--color-muted);line-height:1.5;">{{ $sub }}</div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <button onclick="prevStep(4)" class="btn-outline"><i data-lucide="arrow-left" style="width:14px;height:14px;"></i> Anterior</button>
                        <button onclick="nextStep(4)" class="btn-primary" id="next-4" disabled style="opacity:0.4;cursor:not-allowed;"><span>Siguiente</span><i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i></button>
                    </div>
                </div>

                {{-- STEP 5 --}}
                <div class="wizard-step" data-step="5" style="display:none;">
                    <div style="background:var(--color-surface);border:1px solid var(--color-border);padding:2.5rem;margin-bottom:1.5rem;position:relative;overflow:hidden;">
                        <div style="position:absolute;top:0;right:0;width:120px;height:120px;background:radial-gradient(circle at top right,rgba(255,107,26,0.08),transparent 70%);"></div>

                        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;">
                            <div style="width:44px;height:44px;flex-shrink:0;border:1px solid var(--color-accent);background:rgba(255,107,26,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="clock" style="width:20px;height:20px;color:var(--color-accent);"></i>
                            </div>
                            <div>
                                <div class="tag" style="margin-bottom:0.2rem;color:var(--color-accent);">Paso 05</div>
                                <h2 style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;letter-spacing:0.03em;">
                                    ¿Cuándo necesitas el proyecto?
                                </h2>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;" id="opts-5">
                            @foreach([
                                ['alert-circle', 'Ya mismo',          'Lo necesito en las próximas 2 semanas',          'urgente'],
                                ['calendar',     '1 — 2 meses',       'Tengo algo de tiempo para planear bien',         'normal'],
                                ['hourglass',    '3 — 6 meses',       'Estoy en etapa de planeación',                   'planificando'],
                                ['compass',      'Sin fecha fija',    'Todavía estoy explorando opciones',              'explorando'],
                            ] as [$icon, $title, $sub, $val])
                            <button onclick="selectOption(this, 5, '{{ $val }}')" class="wizard-option" data-value="{{ $val }}" style="display:flex;align-items:flex-start;gap:1rem;padding:1.25rem;text-align:left;background:var(--color-bg);border:1px solid var(--color-border2);color:var(--color-text);cursor:pointer;transition:all 0.2s;width:100%;">
                                <div style="width:36px;height:36px;flex-shrink:0;border:1px solid var(--color-border2);display:flex;align-items:center;justify-content:center;background:var(--color-surface);transition:all 0.2s;" class="opt-icon">
                                    <i data-lucide="{{ $icon }}" style="width:16px;height:16px;color:var(--color-muted);"></i>
                                </div>
                                <div>
                                    <div style="font-family:var(--font-display);font-size:0.88rem;font-weight:700;letter-spacing:0.03em;margin-bottom:0.25rem;">{{ strtoupper($title) }}</div>
                                    <div style="font-size:0.78rem;color:var(--color-muted);line-height:1.5;">{{ $sub }}</div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <button onclick="prevStep(5)" class="btn-outline"><i data-lucide="arrow-left" style="width:14px;height:14px;"></i> Anterior</button>
                        <button onclick="nextStep(5)" class="btn-primary" id="next-5" disabled style="opacity:0.4;cursor:not-allowed;"><span>Siguiente</span><i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i></button>
                    </div>
                </div>

                {{-- STEP 6 --}}
                <div class="wizard-step" data-step="6" style="display:none;">
                    <div style="background:var(--color-surface);border:1px solid var(--color-border);padding:2.5rem;margin-bottom:1.5rem;position:relative;overflow:hidden;">
                        <div style="position:absolute;top:0;right:0;width:120px;height:120px;background:radial-gradient(circle at top right,rgba(255,181,71,0.08),transparent 70%);"></div>

                        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;">
                            <div style="width:44px;height:44px;flex-shrink:0;border:1px solid var(--color-amber);background:rgba(255,181,71,0.1);display:flex;align-items:center;justify-content:center;">
                                <i data-lucide="layers" style="width:20px;height:20px;color:var(--color-amber);"></i>
                            </div>
                            <div>
                                <div class="tag" style="margin-bottom:0.2rem;color:var(--color-amber);">Paso 06</div>
                                <h2 style="font-family:var(--font-display);font-size:1.3rem;font-weight:700;letter-spacing:0.03em;">
                                    ¿Qué funciones son clave para ti?
                                </h2>
                            </div>
                        </div>

                        <p style="font-size:0.83rem;color:var(--color-muted);margin-bottom:1.5rem;">
                            Selecciona todas las que apliquen.
                        </p>

                        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:0.75rem;" id="opts-6">
                            @foreach([
                                ['shopping-cart',    'Tienda online'],
                                ['calendar-check',   'Citas / reservas'],
                                ['file-text',        'Cotizaciones'],
                                ['users',            'Gestión de clientes'],
                                ['bar-chart-2',      'Reportes y métricas'],
                                ['mail',             'Email marketing'],
                                ['share-2',          'Redes sociales'],
                                ['search',           'SEO / Posicionamiento'],
                                ['shield',           'Seguridad y accesos'],
                            ] as [$icon, $label])
                            <button
                                onclick="toggleMulti(this, '{{ \Str::slug($label) }}')"
                                class="wizard-multi"
                                data-value="{{ \Str::slug($label) }}"
                                style="
                                    display:flex;align-items:center;gap:0.6rem;
                                    padding:0.9rem 1rem;
                                    background:var(--color-bg);
                                    border:1px solid var(--color-border2);
                                    color:var(--color-muted);
                                    cursor:pointer;transition:all 0.2s;
                                    font-size:0.8rem;font-family:var(--font-body);
                                    text-align:left;
                                ">
                                <i data-lucide="{{ $icon }}" style="width:14px;height:14px;flex-shrink:0;"></i>
                                {{ $label }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <button onclick="prevStep(6)" class="btn-outline"><i data-lucide="arrow-left" style="width:14px;height:14px;"></i> Anterior</button>
                        <button onclick="showResults()" class="btn-primary" id="next-6">
                            <span>Ver mi diagnóstico</span>
                            <i data-lucide="sparkles" style="width:14px;height:14px;position:relative;z-index:1;"></i>
                        </button>
                    </div>
                </div>

                {{-- RESULTADO --}}
                <div class="wizard-step" data-step="result" style="display:none;">
                    <div style="animation:fadeUp 0.6s ease both;">

                        {{-- Header resultado --}}
                        <div style="
                            background:linear-gradient(135deg,var(--color-surface),var(--color-surface2));
                            border:1px solid var(--color-primary);
                            padding:2.5rem; margin-bottom:1.5rem;
                            position:relative; overflow:hidden; text-align:center;
                        " class="glow-fire">
                            <div style="position:absolute;inset:0;background:radial-gradient(ellipse 60% 60% at 50% 100%,rgba(232,34,10,0.1),transparent 70%);"></div>
                            <div style="position:relative;">
                                <div style="
                                    width:64px;height:64px;margin:0 auto 1.5rem;
                                    border:2px solid var(--color-primary);
                                    background:rgba(232,34,10,0.1);
                                    display:flex;align-items:center;justify-content:center;
                                    animation:pulse-fire 2s infinite;
                                ">
                                    <i data-lucide="flame" style="width:28px;height:28px;color:var(--color-primary);"></i>
                                </div>
                                <div class="tag" style="margin-bottom:0.75rem;justify-content:center;display:flex;gap:0.5rem;">
                                    <i data-lucide="check-circle" style="width:12px;height:12px;"></i>
                                    Diagnóstico completado
                                </div>
                                <h2 style="font-family:var(--font-display);font-size:1.8rem;font-weight:700;margin-bottom:0.5rem;letter-spacing:0.03em;">
                                    TU SOLUCIÓN <span class="highlight">IDEAL</span>
                                </h2>
                                <p id="result-summary" style="color:var(--color-muted);font-size:0.92rem;max-width:480px;margin:0 auto;line-height:1.75;"></p>
                            </div>
                        </div>

                        {{-- Recomendaciones --}}
                        <div id="result-cards" style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;margin-bottom:1.5rem;"></div>

                        {{-- Resumen de respuestas --}}
                        <div style="background:var(--color-surface);border:1px solid var(--color-border);padding:1.75rem;margin-bottom:1.5rem;">
                            <div style="display:flex;align-items:center;gap:0.6rem;margin-bottom:1.25rem;">
                                <i data-lucide="clipboard-list" style="width:15px;height:15px;color:var(--color-primary);"></i>
                                <span style="font-family:var(--font-mono);font-size:0.7rem;color:var(--color-muted);letter-spacing:0.12em;">TUS RESPUESTAS</span>
                            </div>
                            <div id="answers-summary" style="display:flex;flex-wrap:wrap;gap:0.5rem;"></div>
                        </div>

                        {{-- CTA --}}
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                            <a href="{{ route('contacto') }}" class="btn-primary" style="justify-content:center;padding:1rem;">
                                <span>Quiero una propuesta</span>
                                <i data-lucide="arrow-right" style="width:14px;height:14px;position:relative;z-index:1;"></i>
                            </a>
                            <button onclick="restartWizard()" class="btn-outline" style="justify-content:center;">
                                <i data-lucide="rotate-ccw" style="width:14px;height:14px;"></i>
                                Volver a empezar
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Esperar a que lucide esté listo
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });

    const answers = { 1: null, 2: null, 3: null, 4: null, 5: null, 6: [] };

    function selectOption(btn, step, value) {
        // Reset todas las opciones del paso
        const container = document.getElementById('opts-' + step);
        container.querySelectorAll('.wizard-option').forEach(b => {
            b.style.borderColor = 'var(--color-border2)';
            b.style.background = 'var(--color-bg)';
            const icon = b.querySelector('.opt-icon');
            if (icon) {
                icon.style.borderColor = 'var(--color-border2)';
                icon.style.background = 'var(--color-surface)';
            }
            const svg = b.querySelector('.opt-icon svg');
            if (svg) svg.style.color = 'var(--color-muted)';
        });

        // Activar el seleccionado
        btn.style.borderColor = 'var(--color-primary)';
        btn.style.background = 'rgba(232,34,10,0.06)';
        const icon = btn.querySelector('.opt-icon');
        if (icon) {
            icon.style.borderColor = 'var(--color-primary)';
            icon.style.background = 'rgba(232,34,10,0.12)';
        }
        const svg = btn.querySelector('.opt-icon svg');
        if (svg) svg.style.color = 'var(--color-primary)';

        answers[step] = value;

        // Habilitar botón siguiente
        enableNext(step);
    }

    function toggleMulti(btn, value) {
        const isSelected = answers[6].includes(value);
        if (isSelected) {
            answers[6] = answers[6].filter(v => v !== value);
            btn.style.borderColor = 'var(--color-border2)';
            btn.style.background = 'var(--color-bg)';
            btn.style.color = 'var(--color-muted)';
        } else {
            answers[6].push(value);
            btn.style.borderColor = 'var(--color-primary)';
            btn.style.background = 'rgba(232,34,10,0.06)';
            btn.style.color = 'var(--color-text)';
        }
    }

    function enableNext(step) {
        const btn = document.getElementById('next-' + step);
        if (!btn) return;
        btn.disabled = false;
        btn.style.opacity = '1';
        btn.style.cursor = 'pointer';
        btn.style.pointerEvents = 'auto';
    }

    function nextStep(current) {
        if (current < 6 && !answers[current]) return;
        showStep(current + 1);
    }

    function prevStep(current) {
        showStep(current - 1);
    }

    function showStep(step) {
        document.querySelectorAll('.wizard-step').forEach(s => {
            s.style.display = 'none';
        });

        const target = document.querySelector('.wizard-step[data-step="' + step + '"]');
        if (!target) return;
        target.style.display = 'block';
        target.style.animation = 'none';
        setTimeout(() => { target.style.animation = 'fadeUp 0.4s ease both'; }, 10);

        // Progress
        const total = 6;
        const pct = step === 'result' ? 100 : Math.round(((step - 1) / total) * 100);
        document.getElementById('progress-bar').style.width = pct + '%';
        document.getElementById('pct-label').textContent = pct + '%';

        if (step !== 'result') {
            document.getElementById('current-step-label').textContent = step;

            document.querySelectorAll('.step-dot').forEach(dot => {
                const s = parseInt(dot.dataset.step);
                if (s < step) {
                    dot.style.background = 'var(--color-primary)';
                    dot.style.borderColor = 'var(--color-primary)';
                    dot.style.color = '#fff';
                } else if (s === step) {
                    dot.style.background = 'rgba(232,34,10,0.15)';
                    dot.style.borderColor = 'var(--color-primary)';
                    dot.style.color = 'var(--color-primary)';
                } else {
                    dot.style.background = 'var(--color-bg)';
                    dot.style.borderColor = 'var(--color-border2)';
                    dot.style.color = 'var(--color-muted)';
                }
            });
        }

        // Re-renderizar iconos lucide en el nuevo paso
        lucide.createIcons();

        const wizardContainer = document.getElementById('wizard-container');
if (wizardContainer) {
    const offset = wizardContainer.getBoundingClientRect().top + window.scrollY - 100;
    window.scrollTo({ top: offset, behavior: 'smooth' });
}
    }

    function showResults() {
        showStep('result');
        buildResults();
        lucide.createIcons();
    }

    function buildResults() {
        const a = answers;
        const recs = [];

        if (a[3] === 'clientes' || a[2] === 'ninguna' || a[2] === 'redes') {
            recs.push({
                icon: 'layout-template', color: 'var(--color-primary)',
                title: 'Landing Page de conversión',
                desc: 'Tu prioridad es conseguir clientes. Una landing page bien diseñada y optimizada es el primer paso.',
                badge: a[4] === 'bajo' ? 'Plan Starter · desde $8,500' : 'Plan Business · desde $22,000'
            });
        }
        if (a[3] === 'automatizar' || a[1] === 'transformacion') {
            recs.push({
                icon: 'settings-2', color: 'var(--color-accent)',
                title: 'Sistema web a la medida',
                desc: 'Automatizar procesos internos te ahorrará tiempo y dinero. Construimos el sistema exacto que necesitas.',
                badge: 'Plan Enterprise · cotización'
            });
        }
        if (a[3] === 'imagen' || a[2] === 'ninguna') {
            recs.push({
                icon: 'pen-tool', color: 'var(--color-amber)',
                title: 'Identidad de marca',
                desc: 'Sin una marca sólida, todo lo demás pierde fuerza. Empezamos desde los cimientos visuales.',
                badge: 'Servicio de branding'
            });
        }
        if (a[3] === 'ecommerce') {
            recs.push({
                icon: 'shopping-cart', color: 'var(--color-primary)',
                title: 'E-commerce a medida',
                desc: 'Diseñamos tu tienda en línea con experiencia de compra optimizada y administración sencilla.',
                badge: 'Web App · cotización'
            });
        }
        if (a[1] === 'creciendo' || a[1] === 'establecido') {
            recs.push({
                icon: 'megaphone', color: 'var(--color-accent)',
                title: 'Campaña de marketing digital',
                desc: 'Estás listo para escalar. Una estrategia de ads bien ejecutada puede multiplicar tu alcance.',
                badge: a[4] === 'bajo' ? 'Plan Spark · $5,500/mes' : 'Plan Blaze · $12,000/mes'
            });
        }
        if (a[2] === 'web-basica' || a[2] === 'completa') {
            recs.push({
                icon: 'trending-up', color: 'var(--color-amber)',
                title: 'Rediseño y optimización web',
                desc: 'Tu sitio actual puede mejorarse. Lo modernizamos, optimizamos velocidad y mejoramos la conversión.',
                badge: 'Plan Business · desde $22,000'
            });
        }

        const topRecs = recs.slice(0, 4);

        const summaryMap = {
            'nuevo':         'negocio nuevo que quiere arrancar con fuerza',
            'creciendo':     'negocio en crecimiento que quiere escalar',
            'establecido':   'negocio establecido que busca modernizarse',
            'transformacion':'empresa que quiere digitalizar sus procesos'
        };

        document.getElementById('result-summary').textContent =
            'Basado en tu diagnóstico, eres un ' +
            (summaryMap[a[1]] || 'negocio') +
            '. Estas son las soluciones que mejor se adaptan a tu situación actual.';

        const cardsEl = document.getElementById('result-cards');
        cardsEl.innerHTML = topRecs.map(r => `
            <div style="
                background:var(--color-surface);border:1px solid var(--color-border);
                padding:1.75rem;transition:border-color 0.3s,transform 0.3s;
            "
            onmouseover="this.style.borderColor='${r.color}';this.style.transform='translateY(-3px)'"
            onmouseout="this.style.borderColor='var(--color-border)';this.style.transform='translateY(0)'">
                <div style="
                    width:40px;height:40px;margin-bottom:1rem;
                    border:1px solid ${r.color}40;background:${r.color}12;
                    display:flex;align-items:center;justify-content:center;
                ">
                    <i data-lucide="${r.icon}" style="width:18px;height:18px;color:${r.color};"></i>
                </div>
                <div style="
                    display:inline-block;margin-bottom:0.75rem;
                    font-family:'JetBrains Mono',monospace;font-size:0.62rem;
                    color:${r.color};border:1px solid ${r.color}40;
                    padding:0.15rem 0.6rem;letter-spacing:0.1em;
                ">${r.badge}</div>
                <h3 style="font-family:'Cinzel',serif;font-size:0.95rem;font-weight:700;color:#F5F0EE;margin-bottom:0.6rem;letter-spacing:0.03em;">
                    ${r.title.toUpperCase()}
                </h3>
                <p style="font-size:0.82rem;color:#7a6060;line-height:1.7;">${r.desc}</p>
            </div>
        `).join('');

        const labelMap = {
            1: { nuevo:'Negocio nuevo', creciendo:'En crecimiento', establecido:'Establecido', transformacion:'Transformación digital' },
            2: { ninguna:'Sin presencia', redes:'Solo redes', 'web-basica':'Web básica', completa:'Presencia completa' },
            3: { clientes:'Conseguir clientes', automatizar:'Automatizar procesos', imagen:'Mejorar imagen', ecommerce:'Vender en línea' },
            4: { bajo:'Hasta $15k', medio:'$15k–$40k', alto:'$40k–$80k', enterprise:'+$80k' },
            5: { urgente:'Urgente', normal:'1–2 meses', planificando:'3–6 meses', explorando:'Explorando' },
        };

        let html = '';
        for (let i = 1; i <= 5; i++) {
            if (a[i] && labelMap[i][a[i]]) {
                html += `<span style="
                    font-family:'JetBrains Mono',monospace;font-size:0.7rem;
                    padding:0.3rem 0.8rem;
                    background:#1a0e0e;
                    border:1px solid #3d1515;
                    color:#7a6060;
                ">${labelMap[i][a[i]]}</span>`;
            }
        }
        if (a[6].length > 0) {
            html += `<span style="font-family:'JetBrains Mono',monospace;font-size:0.7rem;padding:0.3rem 0.8rem;background:#1a0e0e;border:1px solid #3d1515;color:#7a6060;">
                +${a[6].length} funciones seleccionadas
            </span>`;
        }
        document.getElementById('answers-summary').innerHTML = html;
    }

    function restartWizard() {
        answers[1] = null; answers[2] = null; answers[3] = null;
        answers[4] = null; answers[5] = null; answers[6] = [];

        document.querySelectorAll('.wizard-option').forEach(b => {
            b.style.borderColor = 'var(--color-border2)';
            b.style.background = 'var(--color-bg)';
            const icon = b.querySelector('.opt-icon');
            if (icon) {
                icon.style.borderColor = 'var(--color-border2)';
                icon.style.background = 'var(--color-surface)';
            }
            const svg = b.querySelector('.opt-icon svg');
            if (svg) svg.style.color = 'var(--color-muted)';
        });

        document.querySelectorAll('.wizard-multi').forEach(b => {
            b.style.borderColor = 'var(--color-border2)';
            b.style.background = 'var(--color-bg)';
            b.style.color = 'var(--color-muted)';
        });

        for (let i = 1; i <= 5; i++) {
            const btn = document.getElementById('next-' + i);
            if (btn) {
                btn.disabled = true;
                btn.style.opacity = '0.4';
                btn.style.cursor = 'not-allowed';
                btn.style.pointerEvents = 'none';
            }
        }

        showStep(1);
    }
</script>
@endpush

@push('styles')
<style>
    /* Quitar pointer-events del disabled para no bloquear el click en opciones */
    .wizard-step button[disabled] {
        pointer-events: none;
    }
    .wizard-option {
        -webkit-appearance: none;
        appearance: none;
    }
    .wizard-option:hover {
        background: rgba(255,255,255,0.02) !important;
    }
    .wizard-multi:hover {
        background: rgba(255,255,255,0.02) !important;
    }
    @media (max-width: 600px) {
        #opts-1, #opts-2, #opts-3, #opts-4, #opts-5 {
            grid-template-columns: 1fr !important;
        }
        #opts-6 { grid-template-columns: 1fr 1fr !important; }
        #result-cards { grid-template-columns: 1fr !important; }
    }
</style>
@endpush