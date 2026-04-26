<x-layouts.app>
@php
    $en = app()->getLocale() === 'en';
    $wa = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
    $quoteRoute   = $en ? route('en.quote')   : route('quote');
    $contactRoute = $en ? route('en.contact') : route('contact');
    $maquilaImg   = file_exists(public_path('img/srv-maquila.webp')) ? asset('img/srv-maquila.webp') : asset('img/hero-planta.webp');
    $empaque      = file_exists(public_path('img/srv-empaque.webp')) ? asset('img/srv-empaque.webp') : null;
    $rastro       = file_exists(public_path('img/srv-rastro.webp'))  ? asset('img/srv-rastro.webp')  : null;
@endphp

    <x-slot name="seo">
        <x-seo
            :title="($en ? 'Toll Manufacturing & Private Label' : 'Maquila y Marca Propia') . ' — Soma Meat Co'"
            :description="$en
                ? 'TIF 422 certified toll manufacturing. We process under your brand: cutting, packaging, labeling and sanitary documentation. 18–21 ton/day capacity. NDA available.'
                : 'Maquila cárnica certificada TIF 422 y HACCP. Procesamos bajo tu marca: corte, empaque, etiquetado y documentación sanitaria. 18–21 ton/día. NDA disponible.'"
        />
    </x-slot>

    <x-slot name="schema">
        <x-seo.breadcrumb :items="[
            ['label' => $en ? 'Home' : 'Inicio', 'url' => url($en ? '/en' : '/')],
            ['label' => $en ? 'Toll Manufacturing' : 'Maquila y Marca Propia'],
        ]"/>
    </x-slot>

    {{-- ═══════════════════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink pt-[106px] pb-0 overflow-hidden" aria-label="{{ $en ? 'Toll Manufacturing hero' : 'Hero Maquila' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-[1.1fr_1fr] gap-12 lg:gap-16 items-end pt-14 pb-0">

                <div class="pb-14">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 bg-primary/20 border border-primary/30 rounded-full px-4 py-2 mb-6">
                        <svg class="w-3.5 h-3.5 text-primary" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                        <span class="font-mono text-[10px] tracking-[0.12em] uppercase text-primary">
                            {{ $en ? 'First institutional order completed — 10,000 pcs · Retail chain' : 'Primer pedido institucional completado — 10,000 piezas · Cadena de autoservicio' }}
                        </span>
                    </div>

                    <div class="flex items-center gap-3 mb-5">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Toll Manufacturing & Private Label' : 'Maquila y Marca Propia' }}</span>
                    </div>

                    <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-[0.95] tracking-[-0.04em] mb-6"
                        style="font-variation-settings:'\"opsz\" 96'">
                        {{ $en ? 'Your product,' : 'Tu producto.' }}<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">
                            {{ $en ? 'our certification.' : 'Nuestra certificación.' }}
                        </em>
                    </h1>

                    <p class="text-base text-copper leading-relaxed max-w-lg mb-10">
                        {{ $en
                            ? 'We produce under your brand with your exact specifications. From formulation to shipment, certified TIF 422. Confidentiality agreement available from first contact.'
                            : 'Producimos bajo tu marca con toda la documentación sanitaria. Desde la formulación hasta el embarque, certificado TIF 422. Acuerdo de confidencialidad disponible desde el primer contacto.' }}
                    </p>

                    <div class="flex flex-wrap gap-3 mb-14">
                        <a href="{{ $quoteRoute }}"
                           class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Talk about your project' : 'Hablar de tu proyecto' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-3 font-sans text-sm font-medium border border-ink/20 text-white px-6 py-3.5 rounded-lg hover:bg-ink/5 transition-colors">
                            <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </a>
                    </div>

                    {{-- Specs rápidos --}}
                    <div class="grid grid-cols-3 gap-px bg-white/10 rounded-xl overflow-hidden">
                        @foreach([
                            ['val' => '18–21', 'unit' => 'ton', 'label' => $en ? 'Per day (max)' : 'Por día (máx)'],
                            ['val' => '5',     'unit' => $en ? 'sp.' : 'esp.', 'label' => $en ? 'Species processed' : 'Especies procesadas'],
                            ['val' => 'NDA',   'unit' => '',    'label' => $en ? 'Available 1st contact' : 'Disponible primer contacto'],
                        ] as $spec)
                        <div class="bg-white/5 px-5 py-5">
                            <div class="flex items-baseline gap-1.5 mb-1">
                                <span class="font-display font-bold text-2xl text-white leading-none">{{ $spec['val'] }}</span>
                                @if($spec['unit'])<span class="font-display text-sm text-white/40">{{ $spec['unit'] }}</span>@endif
                            </div>
                            <p class="font-mono text-[9px] tracking-[0.1em] uppercase text-white/40 leading-tight">{{ $spec['label'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Imagen hero --}}
                <div class="hidden lg:block self-end">
                    <img src="{{ $maquilaImg }}"
                         alt="{{ $en ? 'Private label packaging — Soma Meat Co' : 'Maquila marca propia — Soma Meat Co' }}"
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
         PROPUESTA DE VALOR
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="{{ $en ? 'Value proposition' : 'Propuesta de valor' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Your brand. Our TIF plant.' : 'Tu marca. Nuestra planta TIF.' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'Your formula.' : 'Tu fórmula.' }}<br>
                        {{ $en ? 'Your packaging.' : 'Tu empaque.' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">
                            {{ $en ? 'Our TIF 422 guarantee.' : 'Nuestra garantía TIF 422.' }}
                        </em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'SOMA MEAT CO is the certified infrastructure your brand needs without the investment in a plant. We produce to your exact specifications under TIF 422 and HACCP standards, with complete documentation for retail homologation, distribution and export.'
                            : 'SOMA MEAT CO es la infraestructura certificada que tu marca necesita sin la inversión en planta propia. Producimos a tus especificaciones exactas bajo estándares TIF 422 y HACCP, con documentación completa para homologación en autoservicio, distribución y exportación.' }}
                    </p>
                    <ul class="space-y-0 mb-10">
                        @php $props = $en ? [
                            'TIF 422 certified facility from day one',
                            'HACCP documentation per lot, audit-ready',
                            'KOSHER KC available under request',
                            'NDA from first contact — strict confidentiality',
                            'TIF seal on every piece under your brand',
                        ] : [
                            'Planta certificada TIF 422 desde el primer día',
                            'Documentación HACCP por lote, lista para auditoría',
                            'KOSHER KC disponible bajo solicitud',
                            'NDA desde el primer contacto — confidencialidad estricta',
                            'Sello TIF en cada pieza bajo tu marca',
                        ]; @endphp
                        @foreach($props as $p)
                        <li class="flex items-start gap-3 py-4 border-b border-line">
                            <svg class="w-4 h-4 text-verify shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <span class="text-sm text-ink-mid">{{ $p }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ $quoteRoute }}"
                       class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                        {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                {{-- Visual --}}
                <div class="flex flex-col gap-4">
                    @if($empaque)
                    <img src="{{ $empaque }}"
                         alt="{{ $en ? 'TIF-certified vacuum packaging — Soma Meat Co' : 'Empaque al vacío certificado TIF — Soma Meat Co' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md"
                         width="640" height="480" loading="lazy">
                    @endif
                    <div class="bg-ink rounded-xl px-6 py-5 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-mono text-[10px] tracking-[0.15em] uppercase text-copper mb-1">{{ $en ? 'Reference order · 2026' : 'Pedido de referencia · 2026' }}</p>
                            <p class="font-sans text-sm font-semibold text-white">{{ $en ? '10,000 pcs · Retail chain · Vacuum packed · TIF certified' : '10,000 piezas · Cadena de autoservicio · Empaque al vacío · Certificado TIF' }}</p>
                        </div>
                        <svg class="w-5 h-5 text-verify-live shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         4 CAPACIDADES
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone-soft py-24 md:py-32" aria-label="{{ $en ? 'Capabilities' : 'Capacidades' }}">
        <div class="container-soma">
            <div class="mb-14">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'What we can do for your brand' : 'Qué podemos hacer por tu marca' }}</span>
                </div>
                <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'Four pillars.' : 'Cuatro pilares.' }}<br>
                    <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'One certified plant.' : 'Una planta certificada.' }}</em>
                </h2>
            </div>

            @php $caps = $en ? [
                [
                    'num'   => '01',
                    'title' => 'Formulation',
                    'desc'  => 'Recipe development and organoleptic testing. We adjust texture, flavor and shelf life to your target market. Joint development or your formula — you choose.',
                    'items' => ['Recipe and product development', 'Organoleptic testing', 'Shelf life adjustment', 'Regulatory compliance NOM-051'],
                ],
                [
                    'num'   => '02',
                    'title' => 'Production under your brand',
                    'desc'  => 'The entire TIF 422 certified production line runs under your brand. Your product exits with your label and our sanitary guarantee — verifiable on every piece.',
                    'items' => ['TIF 422 certified production line', 'HACCP documentation per lot', 'Your label and EAN-13 code', 'KOSHER KC available'],
                ],
                [
                    'num'   => '03',
                    'title' => 'Custom packaging',
                    'desc'  => 'Vacuum, MAP, skin, fresh-tray. Label design included. NOM-051 and FDA compliance for export. Packaging adapted to retail, HORECA or bulk distribution.',
                    'items' => ['Vacuum and MAP packaging', 'Skin and fresh-tray format', 'NOM-051 / FDA compliant', 'EAN-13 barcode and labeling'],
                ],
                [
                    'num'   => '04',
                    'title' => 'Complete documentation',
                    'desc'  => 'Sanitary certificates, technical sheets, certificate of origin and HACCP per lot. Ready for homologation audit in any retail chain or export process.',
                    'items' => ['Sanitary certificates per lot', 'Technical data sheets', 'Certificate of origin', 'Audit-ready HACCP documentation'],
                ],
            ] : [
                [
                    'num'   => '01',
                    'title' => 'Formulación',
                    'desc'  => 'Desarrollo de receta y pruebas organolépticas. Ajustamos textura, sabor y vida de anaquel a tu mercado objetivo. Desarrollo conjunto o tu fórmula — tú eliges.',
                    'items' => ['Desarrollo de receta y producto', 'Pruebas organolépticas', 'Ajuste de vida de anaquel', 'Cumplimiento normativo NOM-051'],
                ],
                [
                    'num'   => '02',
                    'title' => 'Proceso bajo tu marca',
                    'desc'  => 'Toda la línea de producción certificada TIF 422 opera bajo tu marca. Tu producto sale con tu etiqueta y nuestra garantía sanitaria — verificable en cada pieza.',
                    'items' => ['Línea de producción TIF 422', 'HACCP documentado por lote', 'Tu etiqueta y código EAN-13', 'KOSHER KC disponible'],
                ],
                [
                    'num'   => '03',
                    'title' => 'Empaque personalizado',
                    'desc'  => 'Al vacío, MAP, skin, fresh-tray. Diseño de etiqueta incluido. Cumplimiento NOM-051 y FDA para exportación. Empaque adaptado a retail, HORECA o distribución a granel.',
                    'items' => ['Empaque al vacío y MAP', 'Formato skin y fresh-tray', 'Cumplimiento NOM-051 / FDA', 'Código de barras EAN-13 y etiquetado'],
                ],
                [
                    'num'   => '04',
                    'title' => 'Documentación completa',
                    'desc'  => 'Certificados sanitarios, fichas técnicas, certificado de origen y HACCP por lote. Listos para auditoría de homologación en cualquier cadena de autoservicio o proceso de exportación.',
                    'items' => ['Certificados sanitarios por lote', 'Fichas técnicas del producto', 'Certificado de origen', 'HACCP listo para auditoría'],
                ],
            ]; @endphp

            <div class="grid md:grid-cols-2 gap-6">
                @foreach($caps as $cap)
                <div class="bg-white border border-line rounded-xl p-8 flex flex-col gap-6">
                    <div class="flex items-center gap-3">
                        <span class="font-mono text-[10px] tracking-[0.2em] text-mute uppercase">{{ $cap['num'] }}</span>
                        <span class="w-4 h-px bg-line" aria-hidden="true"></span>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-2xl text-ink mb-3 leading-snug">{{ $cap['title'] }}</h3>
                        <p class="text-sm text-ink-mid leading-relaxed">{{ $cap['desc'] }}</p>
                    </div>
                    <ul class="space-y-2 pt-4 border-t border-line">
                        @foreach($cap['items'] as $item)
                        <li class="flex items-center gap-2.5 text-sm text-ink-mid">
                            <svg class="w-3.5 h-3.5 text-verify shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         STATS + CAPACIDAD
    ═══════════════════════════════════════════════════════ --}}
    <x-sections.stats />

    {{-- ═══════════════════════════════════════════════════════
         ESPECIES DISPONIBLES
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="{{ $en ? 'Species' : 'Especies' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

                @if($rastro)
                <div>
                    <img src="{{ $rastro }}"
                         alt="{{ $en ? 'TIF 422 slaughterhouse — 5 species — Soma Meat Co' : 'Rastro TIF 422 — 5 especies — Soma Meat Co' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md"
                         width="640" height="480" loading="lazy">
                </div>
                @endif

                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? '5 species' : '5 especies' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'Your product.' : 'Tu producto.' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">
                            {{ $en ? 'Any species.' : 'Cualquier especie.' }}
                        </em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'We process 5 species under TIF 422 certification. Your private label can include any combination: lamb, goat, veal, pork or poultry — each with documented traceability.'
                            : 'Procesamos 5 especies bajo certificación TIF 422. Tu marca propia puede incluir cualquier combinación: ovino, caprino, ternera, porcino o aviar — cada una con trazabilidad documentada.' }}
                    </p>

                    <div class="grid grid-cols-1 gap-0">
                        @php $species = $en ? [
                            ['name' => 'Sheep (Ovine)',  'spec' => 'Lamb, whole carcass, rack, leg — KOSHER available'],
                            ['name' => 'Goat (Caprine)', 'spec' => 'Suckling kid, cabrito — reserve order'],
                            ['name' => 'Veal',           'spec' => 'Primary cuts, uniform caliber, aged controlled'],
                            ['name' => 'Pork',           'spec' => 'Full cuts, bulk — vacuum or MAP'],
                            ['name' => 'Poultry',        'spec' => 'Whole, skinless, IQF — for export'],
                        ] : [
                            ['name' => 'Ovino',   'spec' => 'Cordero, canal, rack, pierna — KOSHER disponible'],
                            ['name' => 'Caprino', 'spec' => 'Cabrito lechal — pedido de reserva'],
                            ['name' => 'Ternera', 'spec' => 'Cortes primarios, calibre uniforme, maduración controlada'],
                            ['name' => 'Porcino', 'spec' => 'Cortes completos, a granel — vacío o MAP'],
                            ['name' => 'Aviar',   'spec' => 'Entero, sin piel, IQF — para exportación'],
                        ]; @endphp
                        @foreach($species as $sp)
                        <div class="flex items-start gap-4 py-4 border-b border-line">
                            <span class="shrink-0 w-2 h-2 rounded-full bg-primary mt-1.5" aria-hidden="true"></span>
                            <div>
                                <p class="font-sans text-sm font-semibold text-ink">{{ $sp['name'] }}</p>
                                <p class="font-mono text-[10px] tracking-[0.08em] text-mute mt-0.5">{{ $sp['spec'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         PROCESO — cómo funciona la maquila
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink py-24 md:py-32" aria-label="{{ $en ? 'How toll manufacturing works' : 'Cómo funciona la maquila' }}">
        <div class="container-soma">
            <div class="mb-14">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Process' : 'Proceso' }}</span>
                </div>
                <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'From NDA to' : 'Del NDA al' }}<br>
                    <em class="font-fraunces font-normal text-copper" style="font-style:italic">
                        {{ $en ? 'certified dispatch.' : 'despacho certificado.' }}
                    </em>
                </h2>
            </div>

            @php $steps = $en ? [
                ['n' => '01', 'title' => 'NDA & first contact',       'sub' => 'Confidentiality agreement from the first meeting. We discuss concept, volume, species and technical specifications.'],
                ['n' => '02', 'title' => 'Technical specifications',  'sub' => 'We validate your technical sheet, packaging, labeling and EAN-13. We develop formula if required.'],
                ['n' => '03', 'title' => 'TIF 422 production',        'sub' => 'Processing under SENASICA veterinary supervision. HACCP documented per lot. Your label on every piece.'],
                ['n' => '04', 'title' => 'Documented dispatch',       'sub' => 'Temperature record, sanitary certificates, COA per lot, traceability documentation. Ready for retail or export.'],
            ] : [
                ['n' => '01', 'title' => 'NDA y primer contacto',     'sub' => 'Acuerdo de confidencialidad desde la primera reunión. Hablamos de concepto, volumen, especie y especificaciones técnicas.'],
                ['n' => '02', 'title' => 'Especificaciones técnicas', 'sub' => 'Validamos tu ficha técnica, empaque, etiquetado y código EAN-13. Desarrollamos fórmula si se requiere.'],
                ['n' => '03', 'title' => 'Producción TIF 422',        'sub' => 'Proceso bajo supervisión veterinaria SENASICA. HACCP documentado por lote. Tu etiqueta en cada pieza.'],
                ['n' => '04', 'title' => 'Despacho documentado',      'sub' => 'Registro de temperatura, certificados sanitarios, COA por lote, documentación de trazabilidad. Listo para autoservicio o exportación.'],
            ]; @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
                @foreach($steps as $i => $step)
                <div class="bg-white/5 border border-ink/10 rounded-xl p-7 flex flex-col gap-5">
                    <span class="font-mono text-[10px] tracking-[0.2em] text-copper uppercase">{{ $step['n'] }}</span>
                    <div>
                        <h3 class="font-display font-semibold text-xl text-white mb-2 leading-snug">{{ $step['title'] }}</h3>
                        <p class="text-sm text-ink-mid leading-relaxed">{{ $step['sub'] }}</p>
                    </div>
                    @if($i === 0)
                    <div class="mt-auto pt-4 border-t border-ink/10">
                        <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 font-sans text-xs font-semibold text-copper hover:text-white transition-colors">
                            {{ $en ? 'Start with NDA →' : 'Iniciar con NDA →' }}
                        </a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ $quoteRoute }}"
                   class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ $en ? 'Talk about your project — 48 h response' : 'Hablar de tu proyecto — respuesta en 48 h' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 font-sans text-sm font-medium border border-ink/20 text-white px-8 py-4 rounded-lg hover:bg-ink/5 transition-colors">
                    <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         CTA FINAL
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-cream py-24" aria-label="{{ $en ? 'Call to action' : 'Llamada a la acción' }}">
        <div class="container-soma text-center max-w-3xl mx-auto">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? "Let's start" : 'Empecemos' }}</span>
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
            </div>
            <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-5">
                {{ $en ? "Ready to launch" : '¿Listo para lanzar' }}<br>
                <em class="font-fraunces font-normal" style="font-style:italic;color:var(--color-primary)">
                    {{ $en ? 'your meat line?' : 'tu línea cárnica?' }}
                </em>
            </h2>
            <p class="text-base text-ink-mid leading-relaxed mb-10 max-w-xl mx-auto">
                {{ $en
                    ? 'Tell us your concept, volume and market. An executive contacts you in less than 48 business hours.'
                    : 'Cuéntanos tu concepto, volumen y mercado. Un ejecutivo te contacta en menos de 48 horas hábiles.' }}
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ $quoteRoute }}"
                   class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-3 font-sans text-sm font-medium border-2 border-white/40 text-white px-8 py-4 rounded-lg hover:bg-ink/5 transition-colors">
                    <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp
                </a>
            </div>
            <p class="mt-8 font-mono text-[10px] tracking-[0.14em] text-white/40 uppercase">
                {{ $en ? 'NDA available · Response guaranteed in max. 48 business hours' : 'NDA disponible · Respuesta garantizada en máximo 48 horas hábiles' }}
            </p>
        </div>
    </section>

</x-layouts.app>
