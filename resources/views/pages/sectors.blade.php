<x-layouts.app>
@php
    $en = app()->getLocale() === 'en';
    $wa = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
    $quoteRoute   = $en ? route('en.quote')   : route('quote');
    $contactRoute = $en ? route('en.contact') : route('contact');
    $maquilaRoute = $en ? route('en.maquila') : route('maquila');
@endphp

    <x-slot name="seo">
        <x-seo
            :title="($en ? 'Sectors served' : 'Sectores atendidos') . ' — Soma Meat Co'"
            :description="$en
                ? 'TIF 422 certified meat supplier for retail, HORECA, distributors, private label and specialty retail. One certified plant for all food industry channels.'
                : 'Proveedor cárnico certificado TIF 422 para autoservicio, HORECA, distribuidores, marca propia y retail especializado. Una planta certificada para todos los canales del sector alimentario.'"
        />
    </x-slot>

    <x-slot name="schema">
        <x-seo.breadcrumb :items="[
            ['label' => $en ? 'Home' : 'Inicio', 'url' => url($en ? '/en' : '/')],
            ['label' => $en ? 'Sectors' : 'Sectores'],
        ]"/>
    </x-slot>

    {{-- ═══ HERO ═══ --}}
    <section class="bg-ink pt-[106px] pb-0 overflow-hidden" aria-label="{{ $en ? 'Sectors hero' : 'Hero sectores' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-[1.1fr_1fr] gap-12 items-end pt-14 pb-0">
                <div class="pb-14">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Sectors served' : 'Sectores atendidos' }}</span>
                    </div>
                    <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-[0.95] tracking-[-0.04em] mb-6" style="font-variation-settings:'\"opsz\" 96'">
                        {{ $en ? 'We serve food' : 'Atendemos empresas' }}<br>
                        {{ $en ? 'industry companies.' : 'del sector alimentario.' }}<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">{{ $en ? 'All channels.' : 'Todos los canales.' }}</em>
                    </h1>
                    <p class="text-base text-copper leading-relaxed max-w-lg mb-10">
                        {{ $en
                            ? 'Retail, HORECA, distributors and private label. One TIF 422 certified supplier for every food industry channel.'
                            : 'Autoservicio, retail, HORECA, distribuidores y marca privada. Un proveedor TIF 422 certificado para todos los canales del sector cárnico.' }}
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ $quoteRoute }}" class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 font-sans text-sm font-medium border border-ink/20 text-white px-6 py-3.5 rounded-lg hover:bg-ink/5 transition-colors">WhatsApp</a>
                    </div>
                </div>
                <div class="hidden lg:block self-end">
                    @php $img = file_exists(public_path('img/srv-maquila.webp')) ? asset('img/srv-maquila.webp') : asset('img/hero-planta.webp'); @endphp
                    <img src="{{ $img }}" alt="{{ $en ? 'Soma Meat Co — certified for all channels' : 'Soma Meat Co — certificado para todos los canales' }}"
                         class="w-full h-[480px] object-cover rounded-t-2xl" width="640" height="480" loading="eager">
                </div>
            </div>
        </div>
    </section>

    <x-sections.cert-strip />

    {{-- ═══ SECTORES ═══ --}}
    @php
    $sectors = [
        [
            'num'   => '01',
            'title' => $en ? 'Retail & Grocery' : 'Retail & Autoservicio',
            'sub'   => $en ? 'Supermarket chains and membership stores' : 'Cadenas de autoservicio y tiendas de membresía',
            'desc'  => $en
                ? 'Continuous supply with documentation, traceability and presentation required by modern commerce. TIF 422 certification enables supplier homologation in major retail chains.'
                : 'Suministro continuo con documentación, trazabilidad y presentación requerida por el comercio moderno. La certificación TIF 422 habilita la homologación de proveedor en las principales cadenas.',
            'items' => $en ? [
                'TIF 422 documentation for supplier homologation',
                'TIF-sealed packaging with lot number on every piece',
                'Verifiable traceability available for audit',
                'Continuous supply capacity by contract',
                'NOM-051 compliance and current labeling regulations',
            ] : [
                'Documentación TIF 422 para homologación de proveedor',
                'Empaque con sello TIF y número de lote en cada pieza',
                'Trazabilidad verificable disponible para auditoría',
                'Capacidad de abasto continuo por contrato',
                'Cumplimiento NOM-051 y normativa de etiquetado vigente',
            ],
            'cta'   => $en ? 'Talk to sales' : 'Hablar con ventas',
            'image' => file_exists(public_path('img/srv-empaque.webp')) ? asset('img/srv-empaque.webp') : null,
            'dark'  => false,
            'flip'  => false,
        ],
        [
            'num'   => '02',
            'title' => 'HORECA',
            'sub'   => $en ? 'Hotels, restaurants and catering' : 'Hoteles, restaurantes y catering',
            'desc'  => $en
                ? 'Cuts to the chef\'s exact technical specifications, calibrated portions and documented inocuity for professional kitchens. 5 species available. KOSHER under request.'
                : 'Cortes a especificación técnica del chef, porciones calibradas e inocuidad documentada para cocina profesional. 5 especies disponibles. KOSHER bajo solicitud.',
            'items' => $en ? [
                'Cuts to spec with minimum trim tolerance',
                'Portions calibrated to exact weight',
                'HACCP documented per lot',
                '5 species: lamb, goat, veal, pork, poultry',
                'KOSHER available for certified restaurants',
            ] : [
                'Cortes a ficha técnica con tolerancia mínima de merma',
                'Porciones calibradas por peso exacto',
                'Protocolo HACCP documentado por lote',
                '5 especies: ovino, caprino, ternera, porcino, aviar',
                'KOSHER disponible para restaurantes certificados',
            ],
            'cta'   => $en ? 'Talk to sales' : 'Hablar con ventas',
            'image' => file_exists(public_path('img/srv-corte.webp')) ? asset('img/srv-corte.webp') : null,
            'dark'  => false,
            'flip'  => true,
        ],
        [
            'num'   => '03',
            'title' => $en ? 'Distribution' : 'Distribución',
            'sub'   => $en ? 'Distributors and wholesalers' : 'Distribuidores y mayoristas',
            'desc'  => $en
                ? 'TIF 422 supplier backing to strengthen your commercial offer and meet the documentary requirements of your end clients. Standard and bulk presentations labeled per lot.'
                : 'Respaldo de proveedor TIF 422 para fortalecer tu oferta comercial y cumplir los requisitos documentales de tus clientes finales. Presentaciones estándar y mayorista etiquetadas por lote.',
            'items' => $en ? [
                'Standard and bulk box presentations, labeled per lot',
                'Active and renewable TIF 422 supplier certificate',
                'Traceability documentation available per order',
                'Barcode labeling for resale available',
            ] : [
                'Presentaciones caja estándar y mayorista, etiquetadas por lote',
                'Constancia de proveedor TIF 422 activa y renovable',
                'Documentación de trazabilidad disponible por pedido',
                'Etiquetado para reventa con código de barras disponible',
            ],
            'cta'   => $en ? 'Talk to sales' : 'Hablar con ventas',
            'image' => file_exists(public_path('img/planta-proceso.webp')) ? asset('img/planta-proceso.webp') : asset('img/hero-planta.webp'),
            'dark'  => false,
            'flip'  => false,
        ],
        [
            'num'   => '04',
            'title' => $en ? 'Toll Mfg · Private Label' : 'Maquila · Marca Propia',
            'sub'   => $en ? 'Private brands and toll manufacturing projects' : 'Marcas privadas y proyectos de maquila',
            'desc'  => $en
                ? 'Your product. Your specifications. Our TIF 422 certified facilities. NDA available from first contact. First institutional order of 10,000 pieces completed.'
                : 'Tu producto. Tus especificaciones. Nuestras instalaciones TIF 422 certificadas. NDA disponible desde el primer contacto. Primer pedido institucional de 10,000 piezas completado.',
            'items' => $en ? [
                'Your formula or joint development with our team',
                'Your packaging, label and EAN-13 code',
                'NDA — confidentiality guaranteed',
                'TIF documentation for retail homologation',
                'Institutional order: 10,000 pcs completed',
            ] : [
                'Tu fórmula o desarrollo conjunto con equipo',
                'Tu empaque, etiqueta y código EAN-13',
                'NDA — confidencialidad garantizada',
                'Documentación TIF para autoservicio',
                'Pedido institucional: 10,000 piezas completado',
            ],
            'cta'   => $en ? 'Talk about your project' : 'Hablar de tu proyecto',
            'image' => file_exists(public_path('img/srv-maquila.webp')) ? asset('img/srv-maquila.webp') : null,
            'dark'  => true,
            'flip'  => false,
        ],
        [
            'num'   => '05',
            'title' => $en ? 'Specialty Retail' : 'Retail Especializado',
            'sub'   => $en ? 'Premium butcher shops, gourmet stores and e-commerce' : 'Carnicerías premium, tiendas gourmet y e-commerce',
            'desc'  => $en
                ? 'TIF 422 certified product with presentation and credentials that the informed consumer and specialty retail demand. Premium cuts with full traceability printed on packaging.'
                : 'Producto certificado TIF 422 con presentación y credenciales que el consumidor informado y el retail especializado demandan. Cortes premium con trazabilidad completa impresa en el empaque.',
            'items' => $en ? [
                'TIF 422 product with traceability printed on packaging',
                'Premium cuts: French Rack, T-Bone, Lamb Rib-Eye',
                'Presentations for premium point of sale',
                'KOSHER available for Jewish and gourmet niche',
            ] : [
                'Producto TIF 422 con trazabilidad impresa en empaque',
                'Cortes premium: Rack francés, T-Bone, Rib-Eye de cordero',
                'Presentaciones para punto de venta premium',
                'KOSHER disponible para nicho judío y gourmet',
            ],
            'cta'   => $en ? 'Talk to sales' : 'Hablar con ventas',
            'image' => file_exists(public_path('img/srv-rastro.webp')) ? asset('img/srv-rastro.webp') : null,
            'dark'  => false,
            'flip'  => true,
        ],
    ];
    @endphp

    @foreach($sectors as $i => $sector)
    <section class="{{ $sector['dark'] ? 'bg-ink' : ($i % 2 === 0 ? 'bg-bone' : 'bg-white') }} py-24" aria-label="{{ $sector['title'] }}">
        <div class="container-soma">
            @if($sector['dark'])
                {{-- Layout especial para maquila --}}
                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="font-mono text-[10px] tracking-[0.2em] text-white/30 uppercase">{{ $sector['num'] }}</span>
                            <span class="w-4 h-px bg-white/20" aria-hidden="true"></span>
                            <span class="inline-flex items-center gap-1.5 font-mono text-[10px] tracking-[0.1em] text-primary bg-primary/20 border border-primary/30 px-2.5 py-1 rounded uppercase">★ {{ $en ? 'Featured' : 'Destacado' }}</span>
                        </div>
                        <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-2">{{ $sector['title'] }}</h2>
                        <p class="font-mono text-[10px] tracking-[0.14em] text-copper uppercase mb-6">{{ $sector['sub'] }}</p>
                        <p class="text-base text-copper leading-relaxed mb-8 max-w-lg">{{ $sector['desc'] }}</p>
                        <ul class="space-y-0 mb-10">
                            @foreach($sector['items'] as $item)
                            <li class="flex items-start gap-3 py-4 border-b border-ink/10">
                                <svg class="w-4 h-4 text-copper shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                <span class="text-sm text-copper">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ $maquilaRoute }}" class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                                {{ $sector['cta'] }}
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                            <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 font-sans text-sm font-medium border border-ink/20 text-white px-6 py-3.5 rounded-lg hover:bg-ink/5 transition-colors">WhatsApp</a>
                        </div>
                    </div>
                    @if($sector['image'])
                    <div>
                        <img src="{{ $sector['image'] }}" alt="{{ $sector['title'] }}" class="w-full aspect-[4/3] object-cover rounded-2xl" width="640" height="480" loading="lazy">
                    </div>
                    @endif
                </div>
            @else
                {{-- Layout estándar alternado --}}
                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center {{ $sector['flip'] ? 'lg:grid-flow-col-dense' : '' }}">
                    <div class="{{ $sector['flip'] ? 'lg:col-start-2' : '' }}">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="font-mono text-[10px] tracking-[0.2em] text-mute uppercase">{{ $sector['num'] }}</span>
                            <span class="w-4 h-px bg-line" aria-hidden="true"></span>
                            <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Sector' : 'Sector' }}</span>
                        </div>
                        <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-2">{{ $sector['title'] }}</h2>
                        <p class="font-mono text-[10px] tracking-[0.14em] text-mute uppercase mb-6">{{ $sector['sub'] }}</p>
                        <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">{{ $sector['desc'] }}</p>
                        <ul class="space-y-0 mb-10">
                            @foreach($sector['items'] as $item)
                            <li class="flex items-start gap-3 py-4 border-b border-line">
                                <svg class="w-4 h-4 text-verify shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                <span class="text-sm text-ink-mid">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ $quoteRoute }}" class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-ink text-white px-6 py-3.5 rounded-lg hover:bg-ink-mid transition-colors">
                                {{ $sector['cta'] }}
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="{{ $sector['flip'] ? 'lg:col-start-1' : '' }}">
                        @if($sector['image'])
                        <img src="{{ $sector['image'] }}" alt="{{ $sector['title'] }}" class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md" width="640" height="480" loading="lazy">
                        @else
                        <div class="w-full aspect-[4/3] rounded-2xl bg-bone-soft border border-line flex items-center justify-center">
                            <span class="font-mono text-sm text-mute">{{ $sector['num'] }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
    @endforeach

    {{-- ═══ CASO DE ÉXITO ═══ --}}
    <section class="bg-bone-soft py-24" aria-label="{{ $en ? 'Success story' : 'Caso de éxito' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Success story' : 'Caso de éxito' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'We\'re already' : 'Ya estamos' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'on the shelf.' : 'en el anaquel.' }}</em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'First institutional order completed for a leading retail chain. TIF 422 certified, vacuum-packed, labeled per lot. Delivered on time, without incident.'
                            : 'Primer pedido institucional completado para una cadena líder de autoservicio. Certificado TIF 422, empacado al vacío, etiquetado por lote. Entregado a tiempo, sin incidencias.' }}
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ $quoteRoute }}" class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Is your company next?' : '¿Tu empresa es la siguiente?' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-5">
                    @foreach([
                        ['val' => '10K', 'label' => $en ? 'Pieces delivered' : 'Piezas entregadas'],
                        ['val' => 'TIF', 'label' => $en ? 'Certification 422' : 'Certificación 422'],
                        ['val' => '5',   'label' => $en ? 'Species processed' : 'Especies procesadas'],
                    ] as $stat)
                    <div class="bg-white border border-line rounded-xl p-6 text-center flex flex-col gap-2">
                        <span class="font-display font-bold text-4xl text-ink tracking-[-0.03em]">{{ $stat['val'] }}</span>
                        <span class="font-mono text-[9px] tracking-[0.14em] uppercase text-mute">{{ $stat['label'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ CTA FINAL ═══ --}}
    <section class="bg-cream py-24" aria-label="{{ $en ? 'Call to action' : 'Llamada a la acción' }}">
        <div class="container-soma text-center max-w-3xl mx-auto">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Your channel' : 'Tu canal' }}</span>
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
            </div>
            <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-5">
                {{ $en ? 'Does your channel need a' : '¿Tu canal necesita un' }}<br>
                <em class="font-fraunces font-normal" style="font-style:italic;color:var(--color-primary)">{{ $en ? 'TIF 422 supplier?' : 'proveedor TIF 422?' }}</em>
            </h2>
            <p class="text-base text-ink-mid leading-relaxed mb-10 max-w-xl mx-auto">
                {{ $en ? 'Your menu deserves a supplier with the same standards you demand.' : 'Su menú merece un proveedor con los mismos estándares que usted exige.' }}
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ $quoteRoute }}" class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ $en ? 'Request B2B quote' : 'Solicitar cotización B2B' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 font-sans text-sm font-medium border-2 border-white/40 text-white px-8 py-4 rounded-lg hover:bg-ink/5 transition-colors">
                    WhatsApp {{ $en ? 'direct' : 'directo' }}
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
