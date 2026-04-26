<x-layouts.app>
    <x-slot name="seo">
        <x-seo
            :title="__('home.hero_title')"
            :description="__('home.meta_description')"
        />
    </x-slot>

    @php
        $en             = app()->getLocale() === 'en';
        $heroProductImg = file_exists(public_path('img/srv-empaque.webp'))  ? asset('img/srv-empaque.webp')  : asset('img/hero-planta.webp');
        // Panel derecho: tif422 preferido
        $heroSmallImg   = collect(['tif422.jpg','tif422.webp','tif422.png','sello-tif.png','srv-rastro.webp'])
            ->map(fn($f) => file_exists(public_path("img/$f")) ? asset("img/$f") : null)
            ->filter()->first();
        $plantaImg      = file_exists(public_path('img/planta-proceso.webp'))? asset('img/planta-proceso.webp'): asset('img/hero-planta.webp');
        $wa             = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
    @endphp

    {{-- ═══════════════════════════════════════════════════════
         1. HERO
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone pt-[106px] pb-4" aria-label="{{ $en ? 'Hero' : 'Portada' }}">
        <div class="max-w-[1280px] mx-auto px-6 md:px-10">
            <div class="grid lg:grid-cols-[1.05fr_1fr] items-start">

                {{-- Columna izquierda --}}
                <div class="flex flex-col py-14 lg:pr-14">
                    <div>
                        {{-- Eyebrow — certificaciones --}}
                        <div class="flex flex-wrap items-center gap-2 mb-7">
                            @foreach(['TIF 422', 'HACCP', 'KOSHER KC'] as $cert)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded bg-verify-soft text-verify font-mono text-[10px] font-semibold tracking-[0.12em] uppercase">
                                <svg class="w-3 h-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                {{ $cert }}
                            </span>
                            @endforeach
                        </div>

                        {{-- H1 --}}
                        <h1 class="font-display font-bold leading-[0.95] tracking-[-0.04em] text-ink mb-7"
                            style="font-size: clamp(2.85rem, 5.4vw, 4.3rem); font-variation-settings: '\"opsz\" 96'">
                            @if($en)
                                The supplier<br>
                                TIF 422<br>
                                that won't fail you<br>
                                <em class="font-fraunces font-normal text-primary" style="font-style:italic;letter-spacing:-0.02em;font-size:0.9em">in any audit.</em>
                            @else
                                El proveedor<br>
                                TIF 422<br>
                                que no te falla<br>
                                <em class="font-fraunces font-normal text-primary" style="font-style:italic;letter-spacing:-0.02em;font-size:0.9em">en ninguna auditoría.</em>
                            @endif
                        </h1>

                        {{-- Subtítulo --}}
                        <p class="font-sans text-base leading-relaxed text-ink-mid max-w-[480px] mb-8">
                            {{ $en
                                ? 'TIF 422 certified plant since 2014. Cutting, packaging and toll manufacturing with lot-to-lot traceability ready for your homologation audit.'
                                : 'Planta certificada TIF 422 desde 2014. Corte, empaque y maquila con trazabilidad lote a lote lista para tu auditoría de homologación.' }}
                        </p>

                        {{-- CTAs --}}
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <a href="{{ $en ? route('en.quote') : route('quote') }}"
                               class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                                {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                            <a href="{{ $en ? route('en.quality') : route('quality') }}"
                               class="inline-flex items-center gap-3 font-sans text-sm font-medium bg-white text-ink px-6 py-3.5 rounded-lg border border-line-strong hover:border-ink transition-colors">
                                {{ $en ? 'See certifications' : 'Ver certificaciones' }}
                            </a>
                        </div>
                    </div>

                    {{-- Trust row --}}
                    <div class="mt-6 lg:mt-8">
                        <p class="font-sans text-sm font-medium text-ink-mid tracking-[0.12em]">{{ $en ? 'Sheep  ·  Goat  ·  Veal  ·  Pork  ·  Poultry' : 'Ovino  ·  Caprino  ·  Ternera  ·  Porcino  ·  Aviar' }}</p>
                    </div>
                </div>

                {{-- Columna derecha — tarjeta modular --}}
                <div class="hidden lg:block pt-8 pl-6 pb-0">
                    <div class="bg-white border border-line rounded-[14px] overflow-hidden shadow-sm flex flex-row"
                         style="height: 520px">

                        {{-- Imagen principal --}}
                        <div class="flex-1 relative overflow-hidden">
                            <img src="{{ $heroProductImg }}" alt="{{ $en ? 'TIF-certified vacuum-packed cuts' : 'Cortes al vacío certificados TIF — Soma Meat Co' }}"
                                 class="absolute inset-0 w-full h-full object-cover" width="520" height="680" loading="eager">
                            <div class="absolute top-[18px] left-[18px] bg-white rounded-lg px-3.5 py-2.5 flex items-center gap-3 shadow-md z-10">
                                <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center shrink-0">
                                    <span class="font-display font-bold text-sm text-white leading-none">422</span>
                                </div>
                                <div>
                                    <p class="font-mono text-[9px] tracking-[0.14em] text-mute uppercase mb-0.5">SAGARPA · SADER</p>
                                    <p class="font-sans text-[13px] font-semibold text-ink">Tipo Inspección Federal</p>
                                </div>
                            </div>
                            <div class="absolute top-5 right-5 bg-white rounded-full px-2.5 py-1.5 flex items-center gap-1.5 shadow-sm z-10">
                                <span class="w-1.5 h-1.5 rounded-full bg-verify-live shrink-0" aria-hidden="true"></span>
                                <span class="font-mono text-[10px] font-medium tracking-[0.1em] text-ink">LOTE · #SM-04221</span>
                            </div>
                            <div class="absolute bottom-3.5 left-3.5 right-3.5 bg-white rounded-lg px-3.5 py-3 flex items-center justify-between gap-3 z-10">
                                <div>
                                    <p class="font-mono text-[9px] tracking-[0.14em] text-mute uppercase mb-1">{{ $en ? 'Reception · Validation' : 'Recepción · Validación' }}</p>
                                    <p class="font-sans text-[13px] font-semibold text-ink">{{ $en ? 'Inspected primary cut' : 'Corte primario inspeccionado' }}</p>
                                </div>
                                <span class="shrink-0 font-mono text-[9px] font-semibold tracking-[0.1em] px-2 py-1 rounded bg-verify-soft text-verify">✓ {{ $en ? 'APPROVED' : 'APROBADO' }}</span>
                            </div>
                        </div>

                        {{-- Columna derecha de la tarjeta --}}
                        <div class="flex flex-col border-l border-line" style="width:48%">
                            <div class="relative overflow-hidden" style="flex:1.3">
                                @if($heroSmallImg)
                                    <img src="{{ $heroSmallImg }}" alt="{{ $en ? 'TIF 422 slaughterhouse' : 'Rastro TIF 422' }}"
                                         class="object-cover" style="position:absolute; top:22%; left:22%; width:56%; height:56%;" width="220" height="280" loading="eager">
                                @else
                                    <div class="absolute inset-0 bg-bone-soft flex items-end p-3">
                                        <span class="font-mono text-[10px] uppercase text-mute">Rastro TIF</span>
                                    </div>
                                @endif
                            </div>
                            <div class="bg-bone-soft border-t border-line px-4 py-4 flex flex-col justify-between" style="flex:1">
                                <p class="font-mono text-[9px] tracking-[0.18em] uppercase text-verify font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-verify inline-block" aria-hidden="true"></span>
                                    {{ $en ? 'Monitoring' : 'Monitoreo' }}
                                </p>
                                <div>
                                    <div class="mb-2">
                                        <p class="font-mono text-[9px] tracking-[0.14em] text-mute uppercase">{{ $en ? 'Chamber temp.' : 'Temp. cámara' }}</p>
                                        <p class="font-display text-[22px] font-semibold tracking-[-0.02em] text-ink mt-1 leading-none">−2.4°C</p>
                                    </div>
                                    <div>
                                        <p class="font-mono text-[9px] tracking-[0.14em] text-mute uppercase">{{ $en ? 'Carcass pH' : 'pH canal' }}</p>
                                        <p class="font-display text-[22px] font-semibold tracking-[-0.02em] text-ink mt-1 leading-none">5.6</p>
                                    </div>
                                </div>
                                <p class="font-mono text-[9px] tracking-[0.14em] text-mute uppercase pt-2.5 border-t border-line">Aud. 2026.03 · 0 NC</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         2. STATS
    ═══════════════════════════════════════════════════════ --}}
    <x-sections.stats />

    {{-- ═══════════════════════════════════════════════════════
         4. QUIÉNES SOMOS
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="{{ $en ? 'About us' : 'Quiénes somos' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

                <div x-data="{ v: false }" x-init="new IntersectionObserver(([e]) => { if(e.isIntersecting) v=true }, {threshold:0.2}).observe($el)">
                    <div class="flex items-center gap-3 mb-6 will-animate" :class="v ? 'animate-fade-up anim-delay-1' : ''">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Who we are' : 'Quiénes somos' }}</span>
                    </div>

                    <h2 class="font-display font-bold text-4xl md:text-5xl leading-[1.0] tracking-[-0.03em] text-ink mb-2 will-animate" :class="v ? 'animate-fade-up anim-delay-2' : ''">
                        {{ $en ? 'Certified meat plant' : 'Planta cárnica certificada' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">
                            {{ $en ? 'in Teoloyucan, México.' : 'en Teoloyucan, México.' }}
                        </em>
                    </h2>
                    <div class="w-10 h-1 bg-primary rounded mb-7 will-animate" :class="v ? 'animate-fade-up anim-delay-2' : ''"></div>

                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg will-animate" :class="v ? 'animate-fade-up anim-delay-3' : ''">
                        {{ $en
                            ? 'SOMA MEAT CO operates a TIF 422 slaughterhouse with cutting, deboning, packaging and toll manufacturing for supermarkets, HORECA, distributors and private label in Mexico.'
                            : 'SOMA MEAT CO opera un Rastro TIF 422 con corte, deshuese, empaque y maquila para autoservicio, HORECA, distribuidores y marca privada en México.' }}
                    </p>

                    <ul class="space-y-0 mb-8 will-animate" :class="v ? 'animate-fade-up anim-delay-3' : ''">
                        @php $aboutItems = $en ? [
                            'TIF 422 slaughterhouse — permanent official veterinary supervision',
                            '5 species: sheep, goat, veal, pork and poultry',
                            'Toll manufacturing under your brand — NDA available',
                            'Complete traceability from origin to dispatch',
                        ] : [
                            'Rastro TIF 422 — supervisión veterinaria oficial permanente',
                            '5 especies: ovino, caprino, ternera, porcino y aviar',
                            'Maquila bajo tu marca — NDA disponible',
                            'Trazabilidad completa desde el origen hasta el despacho',
                        ]; @endphp
                        @foreach($aboutItems as $item)
                        <li class="flex items-start gap-3 py-3.5 border-b border-line">
                            <svg class="w-4 h-4 text-primary shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <span class="text-sm text-ink-mid">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <div class="flex flex-wrap items-center gap-3 will-animate" :class="v ? 'animate-fade-up anim-delay-4' : ''">
                        <a href="{{ $en ? route('en.quote') : route('quote') }}"
                           class="inline-flex items-center gap-2.5 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $en ? route('en.about') : route('about') }}"
                           class="inline-flex items-center gap-2 font-sans text-sm font-medium text-ink hover:text-primary transition-colors">
                            {{ $en ? 'Our story' : 'Nuestra historia' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>

                    {{-- Proof bar --}}
                    <div class="mt-8 bg-ink rounded-xl px-6 py-4 flex items-center justify-between gap-4 will-animate" :class="v ? 'animate-fade-up anim-delay-4' : ''">
                        <div>
                            <p class="font-mono text-[10px] tracking-[0.15em] uppercase text-copper mb-1">{{ $en ? 'Reference order · 2026' : 'Pedido de referencia · 2026' }}</p>
                            <p class="font-sans text-sm font-semibold text-white">{{ $en ? '10,000 pcs · Retail chain · Vacuum packed · TIF' : '10,000 piezas · Cadena de autoservicio · Empaque al vacío · TIF' }}</p>
                        </div>
                        <svg class="w-5 h-5 text-copper shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>

                {{-- Imagen --}}
                <div x-data="{ v: false }" x-init="new IntersectionObserver(([e]) => { if(e.isIntersecting) v=true }, {threshold:0.15}).observe($el)"
                     class="will-animate" :class="v ? 'animate-fade-up anim-delay-2' : ''">
                    <img src="{{ $plantaImg }}"
                         alt="{{ $en ? 'TIF 422 certified processing plant — Soma Meat Co, Teoloyucan' : 'Planta TIF 422 certificada — Soma Meat Co, Teoloyucan' }}"
                         class="w-full aspect-[4/5] object-cover rounded-2xl shadow-lg"
                         width="640" height="800" loading="lazy">
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         5. CERT STRIP — refuerzo de autoridad post quiénes somos
    ═══════════════════════════════════════════════════════ --}}
    <x-sections.cert-strip />

    {{-- ═══════════════════════════════════════════════════════
         6. SERVICIOS
    ═══════════════════════════════════════════════════════ --}}
    <x-sections.services-grid
        :services="$services"
        :eyebrow="$en ? 'Industrial services' : 'Servicios industriales'"
        :title="$en ? 'Five services.' : 'Cinco servicios.'"
        :titleLine2="$en ? 'One certified supplier.' : 'Un proveedor certificado.'"
        :ctaLabel="$en ? 'View all services' : 'Ver todos los servicios'"
    />

    {{-- ═══════════════════════════════════════════════════════
         6. TIF 422 — Autoridad + CTA
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-cream py-24 md:py-32" aria-label="{{ $en ? 'TIF 422 Certification' : 'Certificación TIF 422' }}">
        <div class="container-soma">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Federal certification' : 'Certificación federal' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'The physical seal that' : 'El sello físico que' }}<br>
                        {{ $en ? 'opens the institutional' : 'abre el mercado' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">
                            {{ $en ? 'market.' : 'institucional.' }}
                        </em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-3 max-w-lg">
                        {{ $en
                            ? 'TIF (Tipo Inspección Federal) is Mexico\'s highest food safety standard, authorized by SENASICA–SADER. Equivalent to USDA. Enables export to the most demanding markets.'
                            : 'TIF (Tipo Inspección Federal) es el nivel máximo de control sanitario en México, autorizado por SENASICA–SADER. Equivalente al estándar USDA. Habilita exportación a los mercados más exigentes.' }}
                    </p>
                    <p class="text-sm text-mute italic mb-8">
                        "{{ $en ? 'TIF is not a logo. It is the seal stamped on every carcass.' : 'El TIF no es un logo. Es el sello estampado en cada canal.' }}"
                    </p>

                    @php $tifItems = $en ? [
                        'Permanent SENASICA–SADER veterinary supervision on every shift',
                        'Equivalent to USDA — valid for US market export',
                        'Verifiable lot-to-lot traceability from origin to dispatch',
                        'Enables retail homologation and formal distribution',
                    ] : [
                        'Supervisión veterinaria permanente SENASICA–SADER en cada turno',
                        'Equivalencia con estándar USDA — válido para exportación a EE.UU.',
                        'Trazabilidad lote a lote verificable desde origen hasta despacho',
                        'Habilita homologación en autoservicio y distribución formal',
                    ]; @endphp
                    <ul class="space-y-3 mb-10">
                        @foreach($tifItems as $item)
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-verify shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <span class="text-sm text-ink-mid">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>

                </div>

                {{-- Imagen sello TIF físico --}}
                <div class="relative">
                    @php
                        $selloImg = collect(['sello-tif.webp','sello-tif.jpg','sello-tif.png'])
                            ->map(fn($f) => file_exists(public_path("img/$f")) ? asset("img/$f") : null)
                            ->filter()
                            ->first();
                    @endphp
                    @if($selloImg)
                        <img src="{{ $selloImg }}"
                             alt="{{ $en ? 'TIF 422 physical seal on carcass — SAGARPA MEX. 422' : 'Sello físico TIF 422 estampado en canal — SAGARPA MEX. 422' }}"
                             class="w-full aspect-[3/4] object-cover rounded-2xl"
                             width="600" height="800" loading="lazy">
                    @else
                        <div class="w-full aspect-[3/4] rounded-2xl bg-ink/5 border border-line flex flex-col items-center justify-center gap-3">
                            <span class="font-mono text-[10px] tracking-[0.14em] uppercase text-mute">sello-tif.webp</span>
                        </div>
                    @endif
                    {{-- Caption flotante --}}
                    <div class="absolute bottom-4 left-4 right-4 bg-ink/90 backdrop-blur-sm rounded-xl px-4 py-3 flex items-center justify-between gap-3">
                        <div>
                            <p class="font-mono text-[9px] tracking-[0.14em] uppercase text-copper">SAGARPA · MEX. 422</p>
                            <p class="font-sans text-sm font-semibold text-white mt-0.5">{{ $en ? 'Inspected and approved' : 'Inspeccionado y aprobado' }}</p>
                        </div>
                        <svg class="w-5 h-5 text-verify shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         7. SECTORES
    ═══════════════════════════════════════════════════════ --}}
    <section id="sectores" class="bg-bone-soft py-24 md:py-32" aria-label="{{ $en ? 'Sectors served' : 'Sectores atendidos' }}">
        <div class="container-soma">
            <div class="text-center mb-14">
                <div class="flex items-center justify-center gap-3 mb-5">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Sectors served' : 'Sectores atendidos' }}</span>
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                </div>
                <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'What channel does' : '¿A qué canal' }}<br>
                    <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'your company belong to?' : 'pertenece tu empresa?' }}</em>
                </h2>
            </div>

            @if($channels->isNotEmpty())
            <div x-data="{ active: 0 }" class="flex flex-col gap-6">
                {{-- Tabs --}}
                <div class="flex flex-wrap gap-2" role="tablist">
                    @foreach($channels as $i => $ch)
                    @php $chName = $ch->getTranslation('name', $en?'en':'es', false) ?: $ch->getTranslation('name','es',false); @endphp
                    <button x-on:click="active = {{ $i }}"
                            :class="active === {{ $i }} ? 'bg-ink text-white border-ink' : 'bg-transparent text-ink-mid border-line hover:border-ink hover:text-ink'"
                            class="px-4 py-2 text-sm font-medium border rounded-lg transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                            role="tab" :aria-selected="(active === {{ $i }}).toString()">
                        {{ $chName }}
                    </button>
                    @endforeach
                </div>

                {{-- Paneles --}}
                @foreach($channels as $i => $ch)
                @php
                    $chName    = $ch->getTranslation('name',        $en?'en':'es', false) ?: $ch->getTranslation('name','es',false);
                    $chDesc    = $ch->getTranslation('description',  $en?'en':'es', false) ?: $ch->getTranslation('description','es',false);
                    $chSlug    = $ch->getTranslation('slug', $en?'en':'es', false) ?: $ch->getTranslation('slug','es',false);
                    $chUrl     = $en ? route('en.channels.show', $chSlug) : route('channels.show', $chSlug);
                    $chThumb   = $ch->getFirstMediaUrl('thumbnail','thumb') ?: $ch->getFirstMediaUrl('thumbnail');
                    $chBullets = $ch->home_bullets ?? [];
                    $chBulletList = is_array($chBullets['es']??null)
                        ? ($en ? ($chBullets['en'] ?? $chBullets['es']) : $chBullets['es'])
                        : [];
                    $chStats = collect($ch->proof_points ?? [])->filter(fn($p) => !empty($p['active']))->values();
                @endphp
                <div x-show="active === {{ $i }}"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     role="tabpanel">
                    <div class="bg-white rounded-2xl border border-line overflow-hidden flex flex-col lg:flex-row min-h-[320px]">
                        {{-- Imagen --}}
                        @if($chThumb)
                        <div class="lg:w-[380px] shrink-0">
                            <img src="{{ $chThumb }}" alt="{{ $chName }}"
                                 class="w-full h-56 lg:h-full object-cover"
                                 width="600" height="400">
                        </div>
                        @endif
                        {{-- Contenido --}}
                        <div class="flex-1 p-8 md:p-10 flex flex-col justify-between gap-8">
                            <div>
                                <h3 class="font-display font-bold text-2xl md:text-3xl text-ink mb-4 leading-tight">{{ $chName }}</h3>
                                <p class="text-base text-ink-mid leading-relaxed">{{ $chDesc }}</p>
                            </div>
                            @if($chStats->isNotEmpty())
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach($chStats as $stat)
                                <li class="flex items-center gap-3 py-2.5 border-b border-line last:border-0">
                                    <span class="w-5 h-5 rounded-full bg-verify/15 flex items-center justify-center shrink-0" aria-hidden="true">
                                        <svg class="w-3 h-3 text-verify" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                    </span>
                                    <span class="font-mono font-bold text-sm text-ink">{{ $stat['value'] }}</span>
                                    <span class="text-sm text-mute">{{ $en ? ($stat['label_en'] ?? $stat['label_es'] ?? '') : ($stat['label_es'] ?? '') }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif

                            @if($chBulletList)
                            <ul class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                @foreach($chBulletList as $bullet)
                                <li class="flex items-start gap-3 bg-bone-soft rounded-xl px-4 py-3">
                                    <span class="w-5 h-5 rounded-full bg-verify/15 flex items-center justify-center shrink-0 mt-0.5" aria-hidden="true">
                                        <svg class="w-3 h-3 text-verify" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                    </span>
                                    <span class="text-sm text-ink-mid leading-snug">{{ $bullet }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            <div class="flex flex-wrap gap-3 pt-2">
                                <a href="{{ $chUrl }}"
                                   class="inline-flex items-center gap-2.5 font-sans text-sm font-semibold bg-primary text-white px-5 py-3 rounded-lg hover:bg-primary-dark transition-colors">
                                    {{ $en ? 'Learn more' : 'Ver más' }}
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                                <a href="{{ $en ? route('en.quote') : route('quote') }}"
                                   class="inline-flex items-center gap-2 font-sans text-sm font-medium text-ink-mid border border-line hover:border-ink hover:text-ink px-5 py-3 rounded-lg transition-colors">
                                    {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         8. CAPTURA RÁPIDA — post sectores
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink py-16 md:py-20" aria-label="{{ $en ? 'Quick contact' : 'Contacto rápido' }}">
        <div class="container-soma">
            {{-- Header --}}
            <div class="text-center mb-10">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'No commitment · 48 h response' : 'Sin compromiso · respuesta en 48 h' }}</span>
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                </div>
                <h2 class="font-display font-bold text-3xl md:text-4xl text-white leading-tight tracking-[-0.02em]">
                    {{ $en ? 'A quote tailored to' : 'Cotización a tu medida' }}<br>
                    <em class="font-fraunces font-normal text-copper" style="font-style:italic">{{ $en ? 'your operation in 48 h.' : 'en 48 horas.' }}</em>
                </h2>
                <p class="text-sm text-white/50 mt-3 max-w-md mx-auto">
                    {{ $en
                        ? 'Tell us your volume and destination. We reply with a specific price, presentation and lead time — no generic quotes.'
                        : 'Cuéntanos tu volumen y destino. Te respondemos con precio, presentación y tiempo de entrega específicos para tu operación.' }}
                </p>
            </div>
            {{-- Form en card blanca --}}
            <div class="max-w-3xl mx-auto bg-white rounded-2xl p-8 shadow-lg">
                <livewire:quick-lead-form />
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         9. CATÁLOGO
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-16 md:py-20" aria-label="{{ $en ? 'Product catalogue' : 'Catálogo de productos' }}">
        <div class="container-soma">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Catalogue' : 'Catálogo' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                        {{ $en ? 'Specialty cuts.' : 'Cortes de especialidad.' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'TIF seal on every piece.' : 'Sello TIF en cada pieza.' }}</em>
                    </h2>
                </div>
                <a href="{{ $en ? route('en.services.index') : route('services.index') }}"
                   class="shrink-0 inline-flex items-center gap-2 font-sans text-sm font-medium text-primary hover:text-primary-dark transition-colors">
                    {{ $en ? 'Full catalogue' : 'Ver catálogo completo' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            @if($products->isEmpty())
            <div class="py-16 text-center">
                <p class="font-mono text-sm text-mute">{{ $en ? 'Catalogue coming soon.' : 'Catálogo próximamente.' }}</p>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
                @foreach($products as $product)
                @php
                    $thumb = $product->getFirstMediaUrl('image', 'thumb') ?: $product->getFirstMediaUrl('image');
                    $productName = $product->getTranslation('name', app()->getLocale(), false) ?: $product->getTranslation('name', 'es', false);
                    $productDesc = $product->getTranslation('description', app()->getLocale(), false) ?: $product->getTranslation('description', 'es', false);
                    $speciesLabel = match($product->species) {
                        'bovino'  => $en ? 'Beef'    : 'Bovino',
                        'porcino' => $en ? 'Pork'    : 'Porcino',
                        'pollo'   => $en ? 'Poultry' : 'Pollo',
                        'ovino'   => $en ? 'Lamb'    : 'Ovino',
                        'caprino' => $en ? 'Goat'    : 'Caprino',
                        'pescado' => $en ? 'Fish'    : 'Pescado',
                        default   => $product->species,
                    };
                @endphp
                <div class="bg-white rounded-xl border border-line overflow-hidden group hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden relative bg-bone-soft">
                        @if($thumb)
                            <img src="{{ $thumb }}" alt="{{ $productName }}"
                                 class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-500"
                                 width="480" height="360" loading="lazy">
                        @else
                            <div class="absolute inset-0 flex flex-col items-center justify-center gap-2">
                                <svg class="w-10 h-10 text-line" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3 3h18M3 21h18"/></svg>
                                @if($product->sku)
                                <span class="font-mono text-xs font-medium text-mute">{{ $product->sku }}</span>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <span class="inline-flex items-center gap-1.5 font-mono text-[9px] tracking-[0.14em] uppercase text-verify bg-verify-soft px-2 py-1 rounded self-start mb-3">
                            <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            TIF · {{ $speciesLabel }}
                        </span>
                        <h3 class="font-mono text-sm font-bold text-ink mb-1 leading-snug tracking-wide uppercase">{{ $productName }}</h3>
                        @if($productDesc)
                        <p class="text-sm text-mute leading-relaxed flex-1">{{ $productDesc }}</p>
                        @endif
                        <div class="mt-4 pt-4 border-t border-line flex items-center justify-between gap-3">
                            @if($showCatalogPrices && $product->price)
                                <div>
                                    <span class="font-mono text-base font-bold text-ink">${{ number_format($product->price, 2) }}</span>
                                    <span class="font-mono text-[10px] text-mute ml-0.5">/ {{ $product->price_unit ?? 'kg' }}</span>
                                </div>
                            @else
                                <span class="text-xs text-mute italic">{{ $en ? 'Price by volume' : 'Precio por volumen' }}</span>
                            @endif
                            <a href="{{ $en ? route('en.quote') : route('quote') }}"
                               class="font-mono text-[10px] tracking-[0.1em] uppercase text-primary hover:text-primary-dark transition-colors shrink-0">
                                {{ $en ? 'Quote →' : 'Cotizar →' }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            {{-- CTA mayoreo --}}
            <div class="bg-bone-soft border border-line rounded-2xl px-8 py-7 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div>
                    <p class="font-mono text-[10px] tracking-[0.18em] uppercase text-copper mb-2">{{ $en ? 'Wholesale B2B' : 'Mayoreo B2B' }}</p>
                    <p class="font-display text-xl font-semibold text-ink">
                        {{ $en ? 'Need wholesale pricing or a custom formula?' : '¿Necesitas precios al mayoreo o fórmula personalizada?' }}
                    </p>
                    <p class="text-sm text-mute mt-1">{{ $en ? 'Quote in 48 business hours. NDA available for private label.' : 'Cotización en 48 horas hábiles. NDA disponible para maquila.' }}</p>
                </div>
                <div class="flex flex-wrap gap-3 shrink-0">
                    <a href="{{ $en ? route('en.quote') : route('quote') }}"
                       class="inline-flex items-center gap-2.5 font-sans text-sm font-semibold bg-ink text-white px-6 py-3.5 rounded-lg hover:bg-ink-mid transition-colors whitespace-nowrap">
                        {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ $en ? route('en.contact') : route('contact') }}"
                       class="inline-flex items-center gap-2 font-sans text-sm font-medium border border-line text-ink px-6 py-3.5 rounded-lg hover:border-ink transition-colors whitespace-nowrap">
                        {{ $en ? 'Contact' : 'Contacto' }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         9. NUESTRAS INSTALACIONES
    ═══════════════════════════════════════════════════════ --}}
    @php
        $psEyebrow = $plantSection->getTranslation('eyebrow',     $en?'en':'es', false) ?: $plantSection->getTranslation('eyebrow',     'es', false);
        $psLine1   = $plantSection->getTranslation('title_line1', $en?'en':'es', false) ?: $plantSection->getTranslation('title_line1', 'es', false);
        $psLine2   = $plantSection->getTranslation('title_line2', $en?'en':'es', false) ?: $plantSection->getTranslation('title_line2', 'es', false);
        $psPhotos  = $plantSection->getMedia('gallery');
    @endphp
    <section class="bg-bone py-16 md:py-20" aria-label="{{ $psEyebrow ?: ($en ? 'Our facilities' : 'Nuestras instalaciones') }}">
        <div class="container-soma">
            {{-- Header centrado --}}
            <div class="text-center mb-12">
                @if($psEyebrow)
                <div class="flex items-center justify-center gap-3 mb-5">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $psEyebrow }}</span>
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                </div>
                @endif
                <h2 class="font-sans font-black text-3xl md:text-5xl text-ink leading-tight tracking-tight uppercase">
                    @if($psLine1){{ $psLine1 }}@endif
                    @if($psLine2)<br><span class="text-primary">{{ $psLine2 }}</span>@endif
                </h2>
            </div>

            {{-- Galería de 3 fotos --}}
            @if($psPhotos->count())
            <div class="grid grid-cols-1 md:grid-cols-{{ min($psPhotos->count(), 3) }} gap-4">
                @foreach($psPhotos->take(3) as $photo)
                <div class="rounded-2xl overflow-hidden aspect-[4/3]">
                    <img src="{{ $photo->getUrl('thumb') ?: $photo->getUrl() }}"
                         alt="{{ $psEyebrow }}"
                         class="w-full h-full object-cover hover:scale-[1.03] transition-transform duration-500"
                         width="800" height="540" loading="lazy">
                </div>
                @endforeach
            </div>
            @else
            {{-- Placeholder hasta subir fotos --}}
            <div class="grid grid-cols-3 gap-4">
                @foreach([1,2,3] as $n)
                <div class="rounded-2xl bg-bone-soft border border-line aspect-[4/3] flex items-center justify-center">
                    <span class="font-mono text-[10px] text-mute uppercase">Foto {{ $n }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         10. CTA FINAL + FORMULARIO INLINE
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-cream py-20 md:py-28" aria-label="{{ $en ? 'Call to action' : 'Llamada a la acción' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                {{-- Columna izquierda — copy --}}
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-white/40" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-white/70">{{ $en ? "Let's start" : 'Empecemos' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'Ready for a' : '¿Listo para un proveedor' }}<br>
                        <em class="font-fraunces font-normal" style="font-style:italic;color:var(--color-primary)">
                            {{ $en ? 'certified supplier?' : 'certificado?' }}
                        </em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-md">
                        {{ $en
                            ? 'Tell us your volume, species and destination. An executive contacts you in less than 48 business hours.'
                            : 'Cuéntanos tu volumen, especie y destino. Un ejecutivo te contacta en menos de 48 horas hábiles.' }}
                    </p>

                    {{-- Proof points --}}
                    <ul class="space-y-3 mb-8">
                        @foreach($en ? [
                            'TIF 422 certified plant — SENASICA · SADER',
                            'HACCP and Kosher KC documentation ready',
                            'Response guaranteed in max. 48 business hours',
                            'NDA available for private label projects',
                        ] : [
                            'Planta certificada TIF 422 — SENASICA · SADER',
                            'Documentación HACCP y Kosher KC disponible',
                            'Respuesta garantizada en máximo 48 horas hábiles',
                            'NDA disponible para proyectos de maquila',
                        ] as $point)
                        <li class="flex items-center gap-3 text-sm text-ink-mid">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            {{ $point }}
                        </li>
                        @endforeach
                    </ul>

                    {{-- WhatsApp alternativo --}}
                    <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2.5 font-sans text-sm font-medium text-ink-mid hover:text-ink transition-colors">
                        <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        {{ $en ? 'Or write us on WhatsApp' : 'O escríbenos por WhatsApp' }}
                    </a>
                </div>

                {{-- Columna derecha — formulario --}}
                <div>
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <livewire:home-lead-form />
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.app>
