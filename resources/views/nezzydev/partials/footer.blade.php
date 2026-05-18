<footer style="background:var(--color-surface); border-top:1px solid var(--color-border); padding:4rem 0 2rem;">
    <div class="container">

        <div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:3rem; margin-bottom:3rem;">

            {{-- Brand --}}
            <div>
                <a href="{{ route('home') }}" style="text-decoration:none; display:inline-flex; align-items:center; gap:0.75rem; margin-bottom:1.25rem;">
                    <svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:36px;height:36px;">
                        <polygon points="18,2 33,10 33,26 18,34 3,26 3,10"
                            fill="#110a0a" stroke="#E8220A" stroke-width="1.5"/>
                        <text x="18" y="23" text-anchor="middle"
                            font-family="Cinzel,serif" font-size="13" font-weight="700"
                            fill="#E8220A">N</text>
                    </svg>
                    <span style="font-family:var(--font-display); font-weight:700; font-size:1rem; color:var(--color-text); letter-spacing:0.08em;">
                        NEZZY<span style="background:linear-gradient(90deg,var(--color-primary),var(--color-amber));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">DEV</span>
                    </span>
                </a>

                <p style="font-size:0.85rem; color:var(--color-muted); line-height:1.75; max-width:260px; margin-bottom:1.5rem;">
                    Desarrollo web, sistemas a la medida y marketing digital. Tecnología que arde para hacer crecer tu negocio.
                </p>

                <div style="display:flex; align-items:center; gap:0.5rem; font-family:var(--font-mono); font-size:0.72rem; color:var(--color-muted);">
                    <i data-lucide="map-pin" style="width:13px;height:13px;color:var(--color-primary);flex-shrink:0;"></i>
                    Guadalajara, México
                </div>
            </div>

            {{-- Servicios --}}
            <div>
                <h4 style="font-family:var(--font-display); font-size:0.78rem; font-weight:700; color:var(--color-text); margin-bottom:1.25rem; letter-spacing:0.1em; padding-bottom:0.75rem; border-bottom:1px solid var(--color-border);">
                    SERVICIOS
                </h4>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.65rem;">
                    @foreach(['Landing Pages','Sitios Corporativos','Web Apps','Sistemas a Medida','Identidad de Marca','Campañas Digitales'] as $item)
                    <li>
                        <a href="{{ route('servicios') }}" style="font-size:0.83rem; color:var(--color-muted); text-decoration:none; transition:color 0.2s; display:flex; align-items:center; gap:0.4rem;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-muted)'">
                            <i data-lucide="chevron-right" style="width:11px;height:11px;flex-shrink:0;"></i>
                            {{ $item }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Empresa --}}
            <div>
                <h4 style="font-family:var(--font-display); font-size:0.78rem; font-weight:700; color:var(--color-text); margin-bottom:1.25rem; letter-spacing:0.1em; padding-bottom:0.75rem; border-bottom:1px solid var(--color-border);">
                    EMPRESA
                </h4>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.65rem;">
                    @foreach([
                        ['Nosotros',   'nosotros'],
                        ['Portafolio', 'portafolio'],
                        ['Precios',    'precios'],
                        ['Contacto',   'contacto'],
                    ] as [$label, $route])
                    <li>
                        <a href="{{ route($route) }}" style="font-size:0.83rem; color:var(--color-muted); text-decoration:none; transition:color 0.2s; display:flex; align-items:center; gap:0.4rem;"
                        onmouseover="this.style.color='var(--color-accent)'"
                        onmouseout="this.style.color='var(--color-muted)'">
                            <i data-lucide="chevron-right" style="width:11px;height:11px;flex-shrink:0;"></i>
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contacto --}}
            <div>
                <h4 style="font-family:var(--font-display); font-size:0.78rem; font-weight:700; color:var(--color-text); margin-bottom:1.25rem; letter-spacing:0.1em; padding-bottom:0.75rem; border-bottom:1px solid var(--color-border);">
                    CONTACTO
                </h4>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.85rem;">
                    @foreach([
                        ['mail',        'hola@nezzydev.com'],
                        ['phone',       '+52 33 0000 0000'],
                        ['map-pin',     'Guadalajara, Jalisco'],
                    ] as [$icon, $info])
                    <li style="display:flex; align-items:center; gap:0.6rem;">
                        <i data-lucide="{{ $icon }}" style="width:13px;height:13px;color:var(--color-primary);flex-shrink:0;"></i>
                        <span style="font-size:0.83rem; color:var(--color-muted);">{{ $info }}</span>
                    </li>
                    @endforeach
                </ul>

                {{-- Social --}}
                <div style="display:flex; gap:0.6rem; margin-top:1.5rem;">
                    @foreach([
                        ['instagram', 'Instagram'],
                        ['linkedin',  'LinkedIn'],
                        ['music-2',   'TikTok'],
                        ['facebook',  'Facebook'],
                    ] as [$icon, $name])
                    <a href="#" title="{{ $name }}" style="
                        width:34px; height:34px;
                        border:1px solid var(--color-border2);
                        display:flex; align-items:center; justify-content:center;
                        color:var(--color-muted); text-decoration:none;
                        transition:all 0.2s;
                    "
                    onmouseover="this.style.borderColor='var(--color-primary)'; this.style.color='var(--color-primary)'"
                    onmouseout="this.style.borderColor='var(--color-border2)'; this.style.color='var(--color-muted)'">
                        <i data-lucide="{{ $icon }}" style="width:14px;height:14px;"></i>
                    </a>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="fire-divider" style="margin-bottom:2rem;"></div>

        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem;">
            <p style="font-size:0.75rem; color:var(--color-muted); font-family:var(--font-mono);">
                © {{ date('Y') }} NezzyDev · Todos los derechos reservados.
            </p>
            <div style="display:flex; align-items:center; gap:0.4rem; font-size:0.75rem; color:var(--color-muted); font-family:var(--font-mono);">
                Forjado con
                <i data-lucide="flame" style="width:13px;height:13px;color:var(--color-primary);"></i>
                en Guadalajara, México
            </div>
        </div>

    </div>
</footer>

@push('styles')
<style>
    @media (max-width: 768px) {
        footer .container > div:first-child {
            grid-template-columns: 1fr 1fr !important;
        }
    }
    @media (max-width: 480px) {
        footer .container > div:first-child {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush