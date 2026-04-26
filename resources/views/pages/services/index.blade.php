<x-layouts.app>
@php
    $en = app()->getLocale() === 'en';
    $wa = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
    $quoteRoute  = $en ? route('en.quote')            : route('quote');
    $contactRoute= $en ? route('en.contact')           : route('contact');
    $qualityRoute= $en ? route('en.quality')           : route('quality');
@endphp

    <x-slot name="seo">
        <x-seo
            :title="($en ? 'Industrial Meat Services' : 'Servicios industriales cárnicos') . ' — Soma Meat Co'"
            :description="$en
                ? 'TIF 422 slaughterhouse, cutting, deboning, vacuum packaging, toll manufacturing and cold logistics. 21 ton/day. HACCP, Kosher KC.'
                : 'Rastro TIF 422, corte, deshuese, empaque al vacío, maquila y frío logístico. 21 ton/día. HACCP, Kosher KC. San Juan Teoloyucan, México.'"
        />
    </x-slot>

    <x-slot name="schema">
        <x-seo.breadcrumb :items="[
            ['label' => $en ? 'Home' : 'Inicio', 'url' => url($en ? '/en' : '/')],
            ['label' => $en ? 'Services' : 'Servicios'],
        ]"/>
    </x-slot>

    {{-- ═══════════════════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink pt-[106px] pb-0 overflow-hidden" aria-label="{{ $en ? 'Services hero' : 'Hero servicios' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-[1.1fr_1fr] gap-12 lg:gap-16 items-end pt-14 pb-0">

                <div class="pb-14">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Industrial services' : 'Servicios industriales' }}</span>
                    </div>

                    <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-[0.95] tracking-[-0.04em] mb-6"
                        style="font-variation-settings:'\"opsz\" 96'">
                        {{ $en ? 'Certified industrial' : 'Servicios industriales' }}<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">
                            {{ $en ? 'services.' : 'certificados.' }}
                        </em>
                    </h1>

                    <p class="text-base text-white/70 leading-relaxed max-w-lg mb-10">
                        {{ $en
                            ? 'Slaughterhouse, cutting, deboning, packaging and toll manufacturing for retail and foodservice. Documented operation, total traceability.'
                            : 'Rastro, corte, deshuese, empaque y maquila para autoservicio, retail y foodservice. Operación documentada, trazabilidad total.' }}
                    </p>

                    <div class="flex flex-wrap gap-3 mb-12">
                        <a href="{{ $quoteRoute }}"
                           class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $qualityRoute }}"
                           class="inline-flex items-center gap-3 font-sans text-sm font-medium border border-white/20 text-white px-6 py-3.5 rounded-lg hover:bg-white/10 transition-colors">
                            {{ $en ? 'Certifications' : 'Certificaciones' }}
                        </a>
                    </div>

                    {{-- Stats --}}
                    <div class="grid grid-cols-3 gap-px bg-white/10 rounded-xl overflow-hidden">
                        @foreach([
                            ['val' => '21', 'unit' => 'ton', 'label' => $en ? 'Maquila combos / day (max)' : 'Maquila combos / día (máx)'],
                            ['val' => '15', 'unit' => 'ton', 'label' => $en ? 'IQF freezing / day (max)' : 'Congelación / día (máx)'],
                            ['val' => '150', 'unit' => 'cab', 'label' => $en ? 'Chamber heads / day' : 'Cámara canales / día'],
                        ] as $stat)
                        <div class="bg-white/5 px-5 py-5">
                            <div class="flex items-baseline gap-1.5 mb-1">
                                <span class="font-display font-bold text-3xl text-white leading-none">{{ $stat['val'] }}</span>
                                <span class="font-display text-base text-white/40">{{ $stat['unit'] }}</span>
                            </div>
                            <p class="font-mono text-[9px] tracking-[0.1em] uppercase text-white/40 leading-tight">{{ $stat['label'] }}</p>
                        </div>
                        @endforeach
                    </div>
                    <p class="mt-3 font-mono text-[9px] tracking-[0.1em] text-white/25 uppercase">
                        {{ $en ? '* Capacity varies by species, service type and scheduled operation.' : '* La capacidad varía según especie, tipo de servicio y operación programada.' }}
                    </p>
                </div>

                {{-- Imagen hero --}}
                <div class="hidden lg:block self-end">
                    @php $srvImg = file_exists(public_path('img/srv-rastro.webp')) ? asset('img/srv-rastro.webp') : asset('img/hero-planta.webp'); @endphp
                    <img src="{{ $srvImg }}"
                         alt="{{ $en ? 'TIF 422 certified slaughterhouse — Soma Meat Co' : 'Rastro TIF 422 certificado — Soma Meat Co' }}"
                         class="w-full h-[520px] object-cover object-center rounded-t-2xl"
                         width="640" height="520" loading="eager">
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         CERT STRIP
    ═══════════════════════════════════════════════════════ --}}
    <x-sections.cert-strip />

    {{-- ═══════════════════════════════════════════════════════
         TIF 422 — Autoridad de entrada
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="TIF 422">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Federal certification' : 'Certificación federal' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        Rastro TIF 422<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">
                            {{ $en ? 'Type Federal Inspection.' : 'Tipo Inspección Federal.' }}
                        </em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'Authorized by SENASICA — SADER México. Permanent official veterinary supervision. The TIF seal on every carcass is the physical proof that enables access to retail homologation, formal distribution and export.'
                            : 'Autorizado por SENASICA — SADER México. Supervisión veterinaria oficial permanente. El sello TIF en cada canal es la prueba física que habilita el acceso al autoservicio, distribución formal y exportación.' }}
                    </p>

                    <ul class="space-y-0 mb-10">
                        @php $tifFeatures = $en ? [
                            'Permanent official veterinarian on every shift',
                            'TIF 422 seal stamped on every carcass',
                            'Valid documentation for supplier homologation',
                            'KOSHER KC available upon request',
                        ] : [
                            'Veterinario oficial permanente en cada turno',
                            'Sello TIF 422 estampado en cada canal',
                            'Documentación válida para homologación de proveedor',
                            'Certificación KOSHER KC disponible bajo solicitud',
                        ]; @endphp
                        @foreach($tifFeatures as $feat)
                        <li class="flex items-start gap-3 py-4 border-b border-line">
                            <svg class="w-4 h-4 text-verify shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <span class="text-sm text-ink-mid">{{ $feat }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <a href="{{ $quoteRoute }}"
                       class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                        {{ $en ? 'Quote this service' : 'Cotizar este servicio' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                {{-- Visual TIF --}}
                <div class="flex flex-col gap-4">
                    <div class="bg-ink rounded-2xl p-8 flex flex-col gap-6">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center shrink-0">
                                <span class="font-display font-bold text-xl text-white leading-none">422</span>
                            </div>
                            <div>
                                <p class="font-sans font-bold text-white text-lg leading-tight">RASTRO TIF 422</p>
                                <p class="font-mono text-[10px] tracking-[0.14em] text-white/40 uppercase mt-1">SENASICA · SADER México</p>
                            </div>
                        </div>
                        <p class="font-mono text-[11px] tracking-[0.12em] text-white/60 uppercase leading-relaxed border-t border-white/10 pt-5">
                            "{{ $en ? 'TIF is not a logo. It is not a piece of paper. It is the seal stamped on every carcass that enables access to self-service, formal distribution and export.' : 'El TIF no es un logo ni un papel: es el sello estampado en cada canal que habilita el acceso a cadenas de autoservicio, distribución formal y exportación.' }}"
                        </p>
                        <p class="font-mono text-[10px] tracking-[0.1em] text-primary italic">"{{ $en ? 'Without TIF, there is no access.' : 'Sin TIF, no hay acceso.' }}"</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach([
                            ['label' => 'HACCP', 'sub' => $en ? '7 critical points' : '7 puntos críticos'],
                            ['label' => 'KOSHER KC', 'sub' => 'Rab. Maya · 2026'],
                        ] as $cert)
                        <div class="bg-bone-soft border border-line rounded-xl p-5 flex items-center gap-4">
                            <svg class="w-5 h-5 text-verify shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                            <div>
                                <p class="font-mono text-[11px] font-semibold tracking-[0.1em] text-ink uppercase">{{ $cert['label'] }}</p>
                                <p class="font-mono text-[9px] text-mute mt-0.5">{{ $cert['sub'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         SERVICIOS — landing por servicio
    ═══════════════════════════════════════════════════════ --}}

    {{-- Encabezado de sección --}}
    <div class="bg-bone-soft border-y border-line py-10">
        <div class="container-soma flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-6 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'All our services' : 'Todos nuestros servicios' }}</span>
                </div>
                <h2 class="font-display font-bold text-3xl md:text-4xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'Five services.' : 'Cinco servicios.' }}
                    <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'One supplier.' : 'Un solo proveedor.' }}</em>
                </h2>
            </div>
            <a href="{{ $quoteRoute }}" class="shrink-0 inline-flex items-center gap-2 font-sans text-sm font-semibold text-primary hover:text-primary-dark transition-colors">
                {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>

    @php
    $services = [
        [
            'num'   => '01',
            'title' => $en ? 'Cutting & Deboning'  : 'Corte y Deshuese',
            'tag'   => $en ? 'Cutting'              : 'Corte',
            'desc'  => $en
                ? '5 species to your exact technical specifications. Documented yield per lot. Trim control. From primary cuts to final retail or HORECA presentation.'
                : '5 especies a especificación técnica del cliente. Rendimiento documentado por lote. Control de merma. Desde cortes primarios hasta presentación final para retail o HORECA.',
            'items' => $en ? [
                '5 species: sheep, goat, veal, pork, poultry',
                'Cuts to your exact technical sheet',
                'Documented yield and trim per lot',
                'HACCP documented at each stage',
            ] : [
                '5 especies: ovino, caprino, ternera, porcino, aviar',
                'Cortes a ficha técnica exacta del cliente',
                'Rendimiento y merma documentados por lote',
                'HACCP documentado en cada etapa',
            ],
            'cta'   => $en ? 'Quote cutting service'   : 'Cotizar servicio de corte',
            'image' => file_exists(public_path('img/srv-corte.webp'))   ? asset('img/srv-corte.webp')   : null,
            'imgAlt'=> $en ? 'Cutting and deboning — Soma Meat Co' : 'Corte y deshuese — Soma Meat Co',
            'flip'  => false,
        ],
        [
            'num'   => '02',
            'title' => $en ? 'Vacuum Packaging'    : 'Empaque al Vacío',
            'tag'   => $en ? 'Packaging'            : 'Empaque',
            'desc'  => $en
                ? 'TIF seal on every piece. Product ready for wholesale distribution and retail shelf. Documented cold chain from packaging to dispatch.'
                : 'Sello TIF en cada pieza. Producto listo para distribución mayorista y punto de venta. Cadena de frío documentada desde empaque hasta despacho.',
            'items' => $en ? [
                'TIF 422 seal on every piece',
                'Vacuum and MAP packaging available',
                'Documented cold chain per lot',
                'Extended shelf life for export',
            ] : [
                'Sello TIF 422 en cada pieza',
                'Empaque al vacío y MAP disponible',
                'Cadena de frío documentada por lote',
                'Shelf life extendido para exportación',
            ],
            'cta'   => $en ? 'Quote packaging service' : 'Cotizar servicio de empaque',
            'image' => file_exists(public_path('img/srv-empaque.webp')) ? asset('img/srv-empaque.webp') : null,
            'imgAlt'=> $en ? 'Vacuum packaging — Soma Meat Co' : 'Empaque al vacío — Soma Meat Co',
            'flip'  => true,
        ],
        [
            'num'   => '03',
            'title' => $en ? 'Cold Storage & Logistics' : 'Frío y Logística',
            'tag'   => $en ? 'Logistics'            : 'Logística',
            'desc'  => $en
                ? 'Controlled cold storage. Temperature recorded on dispatch. Lot-documented delivery. IQF freezing for 15 ton/day. Carcass chamber for 150 heads.'
                : 'Conservación en frío controlado. Temperatura registrada en entrega. Despacho documentado por lote. Congelación IQF para 15 ton/día. Cámara de canales para 150 cabezas.',
            'items' => $en ? [
                'IQF freezing — 15 ton/day max',
                'Carcass chamber — 150 heads',
                'Temperature registered at dispatch',
                'Complete lot traceability',
            ] : [
                'Congelación IQF — 15 ton/día máx',
                'Cámara de canales — 150 cabezas',
                'Temperatura registrada en despacho',
                'Trazabilidad completa por lote',
            ],
            'cta'   => $en ? 'Consult logistics'      : 'Consultar logística',
            'image' => file_exists(public_path('img/planta-proceso.webp')) ? asset('img/planta-proceso.webp') : asset('img/hero-planta.webp'),
            'imgAlt'=> $en ? 'Cold storage and logistics — Soma Meat Co' : 'Frío y logística — Soma Meat Co',
            'flip'  => false,
        ],
    ];
    @endphp

    @foreach($services as $i => $srv)
    <section class="{{ $i % 2 === 0 ? 'bg-bone' : 'bg-white' }} py-24" aria-label="{{ $srv['title'] }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center {{ $srv['flip'] ? 'lg:grid-flow-col-dense' : '' }}">

                {{-- Contenido --}}
                <div class="{{ $srv['flip'] ? 'lg:col-start-2' : '' }}">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-mute">{{ $srv['num'] }}</span>
                        <span class="w-4 h-px bg-line" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $srv['tag'] }}</span>
                    </div>
                    <h3 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $srv['title'] }}
                    </h3>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">{{ $srv['desc'] }}</p>
                    <ul class="space-y-0 mb-10">
                        @foreach($srv['items'] as $item)
                        <li class="flex items-start gap-3 py-3.5 border-b border-line">
                            <svg class="w-4 h-4 text-verify shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <span class="text-sm text-ink-mid">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ $quoteRoute }}"
                       class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-ink text-white px-6 py-3.5 rounded-lg hover:bg-ink-mid transition-colors">
                        {{ $srv['cta'] }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                {{-- Imagen --}}
                <div class="{{ $srv['flip'] ? 'lg:col-start-1' : '' }}">
                    @if($srv['image'])
                    <img src="{{ $srv['image'] }}" alt="{{ $srv['imgAlt'] }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md"
                         width="640" height="480" loading="lazy">
                    @else
                    <div class="w-full aspect-[4/3] rounded-2xl bg-bone-soft border border-line flex items-center justify-center">
                        <span class="font-mono text-sm text-mute">{{ $srv['num'] }}</span>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
    @endforeach

    {{-- ═══════════════════════════════════════════════════════
         MAQUILA — Sección destacada (full width, dark)
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink py-24 md:py-32" aria-label="{{ $en ? 'Toll manufacturing' : 'Maquila y Marca Propia' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-white/30">04</span>
                        <span class="w-4 h-px bg-white/20" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Private Label' : 'Maquila' }}</span>
                    </div>

                    {{-- Badge primer pedido --}}
                    <div class="inline-flex items-center gap-2 bg-primary/20 border border-primary/30 rounded-full px-4 py-2 mb-6">
                        <svg class="w-3.5 h-3.5 text-primary" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                        <span class="font-mono text-[10px] tracking-[0.12em] uppercase text-primary">
                            {{ $en ? 'First institutional order completed — 10,000 pcs · Retail chain' : 'Primer pedido institucional completado — 10,000 piezas · Cadena de autoservicio' }}
                        </span>
                    </div>

                    <h3 class="font-display font-bold text-4xl md:text-5xl text-white leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'Toll manufacturing' : 'Maquila y' }}<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">
                            {{ $en ? '& Private Label.' : 'Marca Propia.' }}
                        </em>
                    </h3>
                    <p class="text-base text-white/70 leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'We produce under your brand with your exact specifications. From formulation to delivery. TIF 422 certified facilities for commercial-scale production. Confidentiality agreement available from first contact.'
                            : 'Producimos bajo tu marca con tus especificaciones exactas. Desde la formulación hasta la entrega. Instalaciones TIF 422 certificadas para producción a escala comercial. Acuerdo de confidencialidad disponible desde el primer contacto.' }}
                    </p>

                    <ul class="space-y-0 mb-10">
                        @php $maquilaItems = $en ? [
                            'Your formula or joint development with our team',
                            'Your packaging, your label, your EAN-13 code',
                            'NDA available — strict confidentiality',
                            'TIF documentation for retail and distribution',
                            'Capacity: 18–21 ton/day (by species and type)',
                        ] : [
                            'Tu fórmula o desarrollo conjunto con equipo',
                            'Tu empaque, tu etiqueta, tu código EAN-13',
                            'NDA disponible — confidencialidad estricta',
                            'Documentación TIF para autoservicio y distribución',
                            'Capacidad: 18–21 ton/día (según especie y tipo)',
                        ]; @endphp
                        @foreach($maquilaItems as $item)
                        <li class="flex items-start gap-3 py-4 border-b border-white/10">
                            <svg class="w-4 h-4 text-copper shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <span class="text-sm text-white/70">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ $en ? route('en.maquila') : route('maquila') }}"
                           class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Talk about your project' : 'Hablar de tu proyecto' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 font-sans text-sm font-medium border border-white/20 text-white px-6 py-3.5 rounded-lg hover:bg-white/10 transition-colors">
                            WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Imagen maquila --}}
                <div>
                    @php $maquilaImg = file_exists(public_path('img/srv-maquila.webp')) ? asset('img/srv-maquila.webp') : null; @endphp
                    @if($maquilaImg)
                    <img src="{{ $maquilaImg }}" alt="{{ $en ? 'Private label packaging — Soma Meat Co' : 'Maquila marca propia — Soma Meat Co' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl"
                         width="640" height="480" loading="lazy">
                    @endif
                    <div class="mt-4 bg-white/5 border border-white/10 rounded-xl p-6">
                        <p class="font-mono text-[10px] tracking-[0.16em] uppercase text-copper mb-3">{{ $en ? 'Capacity' : 'Capacidad' }}</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="font-display font-bold text-3xl text-white">18–21</p>
                                <p class="font-mono text-[10px] text-white/40 uppercase tracking-[0.1em] mt-1">ton / {{ $en ? 'day' : 'día' }}</p>
                            </div>
                            <div>
                                <p class="font-display font-bold text-3xl text-white">5</p>
                                <p class="font-mono text-[10px] text-white/40 uppercase tracking-[0.1em] mt-1">{{ $en ? 'species' : 'especies' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         PROCESO DE TRABAJO
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone-soft py-24 md:py-32" aria-label="{{ $en ? 'How we work' : 'Cómo trabajamos' }}">
        <div class="container-soma">
            <div class="mb-14">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Process' : 'Proceso' }}</span>
                </div>
                <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'From request to dispatch.' : 'De la solicitud al despacho.' }}<br>
                    <em class="font-fraunces font-normal text-primary" style="font-style:italic">
                        {{ $en ? 'Every step documented.' : 'Cada paso documentado.' }}
                    </em>
                </h2>
            </div>

            @php $steps = $en ? [
                ['n' => '01', 'title' => 'Quote request', 'sub' => 'Technical and price proposal in maximum 48 hours. Specifications, volume and presentation.'],
                ['n' => '02', 'title' => 'Technical approval', 'sub' => 'We validate your technical sheet, packaging and labeling. We sign NDA if applicable.'],
                ['n' => '03', 'title' => 'Certified production', 'sub' => 'Processing under TIF 422 and HACCP. Traceability documented at every stage.'],
                ['n' => '04', 'title' => 'Documented dispatch', 'sub' => 'Temperature registered. Complete lot documentation. Ready for distribution.'],
            ] : [
                ['n' => '01', 'title' => 'Solicitud y cotización', 'sub' => 'Propuesta técnica y de precio en máximo 48 horas. Especificaciones, volumen y presentación.'],
                ['n' => '02', 'title' => 'Aprobación técnica', 'sub' => 'Validamos tu ficha técnica, empaque y etiquetado. Firmamos NDA si aplica.'],
                ['n' => '03', 'title' => 'Producción certificada', 'sub' => 'Proceso bajo TIF 422 y HACCP. Trazabilidad documentada en cada etapa.'],
                ['n' => '04', 'title' => 'Despacho documentado', 'sub' => 'Temperatura registrada. Documentación de lote completa. Listo para distribución.'],
            ]; @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
                @foreach($steps as $i => $step)
                <div class="bg-white border border-line rounded-xl p-7 flex flex-col gap-5 relative overflow-hidden">
                    <span class="font-mono text-[10px] tracking-[0.2em] text-mute uppercase">{{ $step['n'] }}</span>
                    <div>
                        <h3 class="font-display font-semibold text-xl text-ink mb-2 leading-snug">{{ $step['title'] }}</h3>
                        <p class="text-sm text-mute leading-relaxed">{{ $step['sub'] }}</p>
                    </div>
                    @if($i === 0)
                    <div class="absolute top-5 right-5 w-2 h-2 rounded-full bg-primary" aria-hidden="true"></div>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ $quoteRoute }}"
                   class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ $en ? 'Request quote — response in 48 h' : 'Solicitar cotización — respuesta en 48 h' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 font-sans text-sm font-medium border border-line text-ink px-8 py-4 rounded-lg hover:border-ink transition-colors">
                    WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         CTA FINAL
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink py-24" aria-label="{{ $en ? 'Call to action' : 'Llamada a la acción' }}">
        <div class="container-soma text-center max-w-3xl mx-auto">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="w-8 h-px bg-white/20" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? "Let's work together" : 'Trabajemos juntos' }}</span>
                <span class="w-8 h-px bg-white/20" aria-hidden="true"></span>
            </div>
            <h2 class="font-display font-bold text-4xl md:text-5xl text-white leading-[1.0] tracking-[-0.03em] mb-5">
                {{ $en ? 'Need a certified' : '¿Necesitas un proveedor' }}<br>
                <em class="font-fraunces font-normal text-copper" style="font-style:italic">
                    {{ $en ? 'meat supplier?' : 'cárnico certificado?' }}
                </em>
            </h2>
            <p class="text-base text-white/60 leading-relaxed mb-4 max-w-xl mx-auto">
                {{ $en
                    ? 'Your menu deserves a supplier with the same standards you demand.'
                    : 'Su menú merece un proveedor con los mismos estándares que usted exige.' }}
            </p>
            <p class="font-mono text-[10px] tracking-[0.14em] text-white/30 uppercase mb-10">
                {{ $en ? 'For food industry companies' : 'Para empresas del sector alimentario' }}
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ $quoteRoute }}"
                   class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ $en ? 'Request B2B quote' : 'Solicitar cotización B2B' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-3 font-sans text-sm font-medium border-2 border-white/20 text-white px-8 py-4 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp {{ $en ? 'direct' : 'directo' }}
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
