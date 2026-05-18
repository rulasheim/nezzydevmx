<nav id="navbar" style="
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    padding: 1.25rem 0;
    transition: all 0.4s ease;
    border-bottom: 1px solid transparent;
">
    <div class="container" style="display:flex; align-items:center; justify-content:space-between;">

        {{-- Logo --}}
        <a href="{{ route('home') }}" style="text-decoration:none; display:flex; align-items:center; gap:0.75rem;">
            <div style="position:relative; width:42px; height:42px;">
                <svg viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:42px;height:42px;">
                    <polygon points="21,2 39,11 39,31 21,40 3,31 3,11"
                        fill="#110a0a" stroke="#E8220A" stroke-width="1.5"/>
                    <polygon points="21,7 35,14.5 35,29.5 21,37 7,29.5 7,14.5"
                        fill="url(#fireGradNav)" opacity="0.15"/>
                    <text x="21" y="26" text-anchor="middle"
                        font-family="Cinzel,serif" font-size="14" font-weight="700"
                        fill="#E8220A">N</text>
                    <defs>
                        <linearGradient id="fireGradNav" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#E8220A"/>
                            <stop offset="100%" stop-color="#FFB547"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <span style="
                font-family:var(--font-display);
                font-weight:700;
                font-size:1.1rem;
                color:var(--color-text);
                letter-spacing:0.08em;
            ">NEZZY<span style="
                background:linear-gradient(90deg,var(--color-primary),var(--color-amber));
                -webkit-background-clip:text;
                -webkit-text-fill-color:transparent;
                background-clip:text;
            ">DEV</span></span>
        </a>

        {{-- Desktop links --}}
        @php
            $navItems = [
                ['route' => 'home',       'label' => 'Inicio'],
                ['route' => 'servicios',  'label' => 'Servicios'],
                ['route' => 'portafolio', 'label' => 'Portafolio'],
                ['route' => 'nosotros',   'label' => 'Nosotros'],
                ['route' => 'precios',    'label' => 'Precios'],
                ['route' => 'wizard', 'label' => 'Descubre'],
            ];
        @endphp

        <ul id="nav-links" style="display:flex; gap:2.5rem; list-style:none; align-items:center;">
            @foreach($navItems as $item)
            <li>
                <a href="{{ route($item['route']) }}" style="
                    color: {{ request()->routeIs($item['route']) ? 'var(--color-primary)' : 'var(--color-muted)' }};
                    text-decoration: none;
                    font-size: 0.78rem;
                    font-weight: 500;
                    letter-spacing: 0.1em;
                    font-family: var(--font-display);
                    transition: color 0.2s;
                    position: relative;
                    padding-bottom: 4px;
                "
                onmouseover="this.style.color='var(--color-text)'"
                onmouseout="this.style.color='{{ request()->routeIs($item['route']) ? 'var(--color-primary)' : 'var(--color-muted)' }}'">
                    {{ strtoupper($item['label']) }}
                    @if(request()->routeIs($item['route']))
                    <span style="
                        position:absolute; bottom:0; left:0; right:0;
                        height:1px;
                        background:linear-gradient(90deg,var(--color-primary),var(--color-amber));
                    "></span>
                    @endif
                </a>
            </li>
            @endforeach
            <li>
                <a href="{{ route('contacto') }}" class="btn-primary">
                    <span>Hablemos</span>
                    <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                </a>
            </li>
        </ul>

        {{-- Mobile toggle --}}
        <button id="menu-toggle" style="
            display:none;
            background:none;
            border:1px solid var(--color-border2);
            color:var(--color-text);
            padding:0.5rem 0.75rem;
            cursor:pointer;
            border-radius:2px;
        ">
            <i data-lucide="menu" style="width:20px;height:20px;"></i>
        </button>

    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" style="
        display:none;
        flex-direction:column;
        background:var(--color-surface);
        border-top:1px solid var(--color-border);
        margin-top:1rem;
    ">
        @foreach(array_merge($navItems, [['route' => 'contacto', 'label' => 'Contacto']]) as $item)
        <a href="{{ route($item['route']) }}" style="
            padding:1rem 2rem;
            color:var(--color-muted);
            text-decoration:none;
            border-bottom:1px solid var(--color-border);
            font-family:var(--font-display);
            font-size:0.78rem;
            letter-spacing:0.1em;
            transition:all 0.2s;
            display:flex; align-items:center; gap:0.5rem;
        "
        onmouseover="this.style.color='var(--color-primary)'; this.style.paddingLeft='2.5rem'"
        onmouseout="this.style.color='var(--color-muted)'; this.style.paddingLeft='2rem'">
            {{ strtoupper($item['label']) }}
        </a>
        @endforeach
    </div>
</nav>

@push('scripts')
<script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(8,6,8,0.96)';
            navbar.style.backdropFilter = 'blur(20px)';
            navbar.style.borderBottomColor = 'var(--color-border)';
            navbar.style.padding = '0.85rem 0';
        } else {
            navbar.style.background = 'transparent';
            navbar.style.backdropFilter = 'none';
            navbar.style.borderBottomColor = 'transparent';
            navbar.style.padding = '1.25rem 0';
        }
    });

    const toggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.getElementById('nav-links');

    toggle.addEventListener('click', () => {
        const open = mobileMenu.style.display === 'flex';
        mobileMenu.style.display = open ? 'none' : 'flex';
    });

    function checkNav() {
        if (window.innerWidth < 900) {
            navLinks.style.display = 'none';
            toggle.style.display = 'block';
        } else {
            navLinks.style.display = 'flex';
            toggle.style.display = 'none';
            mobileMenu.style.display = 'none';
        }
    }
    checkNav();
    window.addEventListener('resize', checkNav);

    mobileMenu.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', () => { mobileMenu.style.display = 'none'; });
    });
</script>
@endpush