<x-layouts.app>
@php
    $en = app()->getLocale() === 'en';
    $wa = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
    $quoteRoute   = $en ? route('en.quote')   : route('quote');
    $contactRoute = $en ? route('en.contact') : route('contact');
    $rastroImg    = file_exists(public_path('img/srv-rastro.webp'))   ? asset('img/srv-rastro.webp')   : null;
    $empaqueImg   = file_exists(public_path('img/srv-empaque.webp'))  ? asset('img/srv-empaque.webp')  : null;
    $cortaImg     = file_exists(public_path('img/srv-corte.webp'))    ? asset('img/srv-corte.webp')    : null;
    $plantaImg    = file_exists(public_path('img/planta-proceso.webp'))? asset('img/planta-proceso.webp'): asset('img/hero-planta.webp');
@endphp

    <x-slot name="seo">
        <x-seo
            :title="($en ? 'Certifications & Traceability' : 'Certificaciones y Trazabilidad') . ' — Soma Meat Co'"
            :description="$en
                ? 'TIF 422, HACCP, Kosher KC active certifications. Lot-level traceability from ranch to dispatch. Complete documentation for supplier homologation audits.'
                : 'Certificaciones activas TIF 422, HACCP, Kosher KC. Trazabilidad por lote desde rancho hasta despacho. Documentación completa para auditorías de homologación de proveedor.'"
        />
    </x-slot>

    <x-slot name="schema">
        <x-seo.breadcrumb :items="[
            ['label' => $en ? 'Home' : 'Inicio', 'url' => url($en ? '/en' : '/')],
            ['label' => $en ? 'Certifications' : 'Certificaciones'],
        ]"/>
    </x-slot>

    {{-- ═══════════════════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink pt-[106px] pb-0 overflow-hidden" aria-label="{{ $en ? 'Certifications hero' : 'Hero certificaciones' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-[1.1fr_1fr] gap-12 lg:gap-16 items-end pt-14 pb-0">

                <div class="pb-14">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Active & verifiable certifications' : 'Certificaciones activas y verificables' }}</span>
                    </div>

                    <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-[0.95] tracking-[-0.04em] mb-6"
                        style="font-variation-settings:'\"opsz\" 96'">
                        {{ $en ? 'We don\'t present' : 'No presentamos' }}<br>
                        {{ $en ? 'promises.' : 'promesas.' }}<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">
                            {{ $en ? 'We present documents.' : 'Presentamos documentos.' }}
                        </em>
                    </h1>

                    <p class="text-base text-copper leading-relaxed max-w-lg mb-10">
                        {{ $en
                            ? 'All documentation available for your supplier homologation process. TIF 422, HACCP, Kosher KC — active and verifiable, not decorative seals.'
                            : 'Toda la documentación disponible para tu proceso de homologación de proveedor. TIF 422, HACCP, Kosher KC — activas y verificables, no sellos decorativos.' }}
                    </p>

                    <div class="flex flex-wrap gap-3 mb-14">
                        <a href="{{ $contactRoute }}"
                           class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Request documentation' : 'Solicitar documentación' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-3 font-sans text-sm font-medium border border-ink/20 text-white px-6 py-3.5 rounded-lg hover:bg-ink/5 transition-colors">
                            WhatsApp
                        </a>
                    </div>

                    {{-- Cert badges --}}
                    <div class="flex flex-wrap gap-3">
                        @foreach([
                            ['code' => 'TIF 422', 'sub' => 'SENASICA · SADER'],
                            ['code' => 'HACCP',   'sub' => '7 puntos críticos'],
                            ['code' => 'KOSHER',  'sub' => 'KC · 2026'],
                            ['code' => 'TRAZ.',   'sub' => $en ? 'Lot-level' : 'Por lote'],
                        ] as $badge)
                        <div class="flex items-center gap-2.5 bg-white/5 border border-ink/10 rounded-lg px-4 py-2.5">
                            <svg class="w-3.5 h-3.5 text-verify-live shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                            <div>
                                <p class="font-mono text-[10px] font-semibold tracking-[0.1em] text-white uppercase">{{ $badge['code'] }}</p>
                                <p class="font-mono text-[9px] text-white/30 mt-0.5">{{ $badge['sub'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Imagen hero --}}
                <div class="hidden lg:block self-end">
                    <img src="{{ $plantaImg }}"
                         alt="{{ $en ? 'TIF 422 certified processing plant — Soma Meat Co' : 'Planta TIF 422 certificada — Soma Meat Co' }}"
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
         TIF 422
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="TIF 422">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="font-mono text-[10px] tracking-[0.2em] text-mute uppercase">01</span>
                        <span class="w-4 h-px bg-line" aria-hidden="true"></span>
                        <span class="inline-flex items-center gap-1.5 font-mono text-[10px] tracking-[0.1em] text-verify bg-verify-soft px-2.5 py-1 rounded uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-verify-live inline-block" aria-hidden="true"></span>
                            {{ $en ? 'Active' : 'Activo' }}
                        </span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-2">
                        TIF No. 422
                    </h2>
                    <p class="font-mono text-[10px] tracking-[0.14em] text-mute uppercase mb-6">SENASICA · SADER México</p>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'Tipo Inspección Federal is Mexico\'s highest food safety standard for slaughterhouses, authorized by SENASICA–SADER. The TIF seal on every carcass is the physical proof that enables retail homologation, formal distribution and export.'
                            : 'Tipo Inspección Federal es el estándar máximo de inocuidad alimentaria para rastros en México, autorizado por SENASICA–SADER. El sello TIF en cada canal es la prueba física que habilita la homologación en autoservicio, distribución formal y exportación.' }}
                    </p>

                    <p class="font-mono text-[11px] tracking-[0.1em] text-ink-mid italic mb-8 border-l-2 border-primary pl-4">
                        "{{ $en ? 'TIF is not a logo. It is not a piece of paper. It is the seal stamped on every carcass that enables access to retail, formal distribution and export.' : 'El TIF no es un logo ni un papel: es el sello estampado en cada canal que habilita el acceso a cadenas de autoservicio, distribución formal y exportación.' }}"
                    </p>

                    <h3 class="font-sans text-sm font-semibold text-ink uppercase tracking-wider mb-5">{{ $en ? 'What TIF 422 guarantees your company' : 'Qué garantiza el TIF 422 a tu empresa' }}</h3>
                    <ul class="space-y-0 mb-10">
                        @php $tifBenefits = $en ? [
                            ['title' => 'Permanent veterinary inspection', 'sub' => 'Official veterinarian on every shift — not periodic visits. Continuous sanitary supervision.'],
                            ['title' => 'Physical seal on every carcass',  'sub' => 'Tangible, verifiable proof that the buyer can confirm on each piece.'],
                            ['title' => 'Retail homologation',            'sub' => 'Valid for supermarket chains, formal distribution and export — required by leading retailers.'],
                            ['title' => 'SENASICA–SADER backing',         'sub' => 'Official authority of the Mexican State. Equivalent to USDA standard for US export.'],
                        ] : [
                            ['title' => 'Inspección veterinaria permanente', 'sub' => 'Médico veterinario oficial en cada turno — no visita periódica. Supervisión sanitaria continua.'],
                            ['title' => 'Sello físico en cada canal',        'sub' => 'Prueba tangible y verificable que el comprador puede confirmar en cada pieza.'],
                            ['title' => 'Homologación en autoservicio',      'sub' => 'Válido para cadenas de supermercado, distribución formal y exportación — requerido por las principales cadenas.'],
                            ['title' => 'Respaldo SENASICA–SADER',          'sub' => 'Autoridad oficial del Estado Mexicano. Equivalente al estándar USDA para exportación a EE.UU.'],
                        ]; @endphp
                        @foreach($tifBenefits as $b)
                        <li class="flex items-start gap-4 py-4 border-b border-line">
                            <svg class="w-4 h-4 text-verify shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <div>
                                <p class="font-sans text-sm font-semibold text-ink">{{ $b['title'] }}</p>
                                <p class="text-sm text-mute mt-0.5">{{ $b['sub'] }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <a href="{{ $contactRoute }}"
                       class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                        {{ $en ? 'Request TIF documentation' : 'Solicitar documentación TIF' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                {{-- Imagen TIF --}}
                <div class="flex flex-col gap-4">
                    @if($rastroImg)
                    <img src="{{ $rastroImg }}"
                         alt="{{ $en ? 'TIF 422 certified slaughterhouse — Soma Meat Co' : 'Rastro TIF 422 certificado — Soma Meat Co' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md"
                         width="640" height="480" loading="lazy">
                    @endif
                    <div class="bg-ink rounded-xl px-6 py-5">
                        <p class="font-mono text-[10px] tracking-[0.15em] uppercase text-copper mb-3">{{ $en ? 'Without TIF' : 'Sin TIF' }}</p>
                        <p class="font-display text-xl font-semibold text-white leading-snug">
                            {{ $en ? '"Without TIF, there is no access."' : '"Sin TIF, no hay acceso."' }}
                        </p>
                        <p class="text-sm text-ink-mid mt-2">{{ $en ? 'Retail chains, formal distributors and export require it. It is not optional.' : 'Las cadenas de autoservicio, distribuidores formales y exportación lo exigen. No es opcional.' }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         TABLA COMPARATIVA
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone-soft py-24 md:py-28" aria-label="{{ $en ? 'Comparison' : 'Comparativa' }}">
        <div class="container-soma">
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Market access' : 'Acceso a mercado' }}</span>
                </div>
                <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'Certifications are market access,' : 'Las certificaciones son acceso a mercado,' }}<br>
                    <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'not just compliance.' : 'no solo cumplimiento.' }}</em>
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse" aria-label="{{ $en ? 'Comparison table' : 'Tabla comparativa' }}">
                    <thead>
                        <tr>
                            <th class="text-left py-4 px-6 font-mono text-[10px] tracking-[0.14em] uppercase text-mute border-b border-line bg-white rounded-tl-xl" scope="col">{{ $en ? 'Criteria' : 'Criterio' }}</th>
                            <th class="py-4 px-6 font-mono text-[10px] tracking-[0.14em] uppercase border-b border-line bg-ink text-copper text-center" scope="col">SOMA MEAT CO</th>
                            <th class="py-4 px-6 font-mono text-[10px] tracking-[0.14em] uppercase border-b border-line bg-white text-mute text-center rounded-tr-xl" scope="col">{{ $en ? 'Without certification' : 'Sin certificación' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rows = $en ? [
                            ['label' => 'Active & verifiable TIF 422',       'soma' => true,  'none' => false],
                            ['label' => 'Veterinary inspection',              'soma' => 'Permanent in process', 'none' => 'No supervision'],
                            ['label' => 'HACCP system',                       'soma' => 'Implemented & documented', 'none' => 'N/A'],
                            ['label' => 'Lot-level traceability',             'soma' => 'Origin to dispatch', 'none' => 'No documentation'],
                            ['label' => 'Retail homologation',                'soma' => true,  'none' => false],
                            ['label' => 'Export enabled',                     'soma' => 'With TIF documents', 'none' => 'Not permitted'],
                        ] : [
                            ['label' => 'TIF 422 activo y verificable',         'soma' => true,  'none' => false],
                            ['label' => 'Inspección veterinaria',               'soma' => 'Permanente en proceso', 'none' => 'Sin supervisión'],
                            ['label' => 'Sistema HACCP',                        'soma' => 'Implementado y documentado', 'none' => 'No aplica'],
                            ['label' => 'Trazabilidad por lote',                'soma' => 'Origen a despacho', 'none' => 'Sin documentación'],
                            ['label' => 'Homologación autoservicio',            'soma' => true,  'none' => false],
                            ['label' => 'Exportación habilitada',               'soma' => 'Con documentos TIF', 'none' => 'No permitida'],
                        ]; @endphp
                        @foreach($rows as $i => $row)
                        <tr class="{{ $i % 2 === 0 ? 'bg-white' : 'bg-bone' }}">
                            <td class="py-4 px-6 text-sm font-medium text-ink border-b border-line">{{ $row['label'] }}</td>
                            <td class="py-4 px-6 text-center border-b border-line/50 bg-ink/5">
                                @if($row['soma'] === true)
                                    <svg class="w-5 h-5 text-verify mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-label="{{ $en ? 'Yes' : 'Sí' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                @else
                                    <span class="font-mono text-[11px] text-ink-mid">{{ $row['soma'] }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center border-b border-line">
                                @if($row['none'] === false)
                                    <svg class="w-4 h-4 text-line mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-label="{{ $en ? 'No' : 'No' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                @else
                                    <span class="font-mono text-[11px] text-mute">{{ $row['none'] }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         HACCP
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="HACCP">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

                {{-- Imagen --}}
                @if($cortaImg)
                <div>
                    <img src="{{ $cortaImg }}"
                         alt="{{ $en ? 'HACCP documented cutting process — Soma Meat Co' : 'Proceso de corte documentado HACCP — Soma Meat Co' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md"
                         width="640" height="480" loading="lazy">
                </div>
                @endif

                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="font-mono text-[10px] tracking-[0.2em] text-mute uppercase">02</span>
                        <span class="w-4 h-px bg-line" aria-hidden="true"></span>
                        <span class="inline-flex items-center gap-1.5 font-mono text-[10px] tracking-[0.1em] text-verify bg-verify-soft px-2.5 py-1 rounded uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-verify-live inline-block" aria-hidden="true"></span>
                            {{ $en ? 'Active' : 'Activo' }}
                        </span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'HACCP System' : 'Sistema HACCP' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? '7 critical points.' : '7 puntos críticos.' }}</em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-4 max-w-lg">
                        {{ $en
                            ? 'Hazard Analysis and Critical Control Points. 7 principles implemented from livestock reception to finished product dispatch. Documented per lot.'
                            : 'Análisis de Peligros y Puntos Críticos de Control. 7 principios implementados desde la recepción de ganado hasta el despacho del producto terminado. Documentado por lote.' }}
                    </p>
                    <div class="bg-bone-soft border border-line rounded-xl px-6 py-5 mb-8">
                        <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-copper mb-2">{{ $en ? 'Why it matters to your company' : '¿Por qué importa a tu empresa?' }}</p>
                        <p class="text-sm text-ink-mid leading-relaxed">
                            {{ $en
                                ? 'Required to supply retail chains and export to the US or Europe. Its absence closes markets. Any major retailer\'s supplier audit will require HACCP documentation.'
                                : 'Requisito para proveer cadenas de autoservicio y exportar a EE.UU. o Europa. Su ausencia cierra mercados. Cualquier auditoría de homologación de proveedor en una cadena importante exige documentación HACCP.' }}
                        </p>
                    </div>
                    <ul class="space-y-0 mb-10">
                        @php $haccpItems = $en ? [
                            'Hazard analysis at each production stage',
                            'Critical Control Points (CCPs) identified and monitored',
                            'Documented corrective actions per lot',
                            'Verification and validation records',
                            'Ready for retail homologation audit',
                        ] : [
                            'Análisis de peligros en cada etapa de producción',
                            'Puntos Críticos de Control (PCC) identificados y monitoreados',
                            'Acciones correctivas documentadas por lote',
                            'Registros de verificación y validación',
                            'Listos para auditoría de homologación en autoservicio',
                        ]; @endphp
                        @foreach($haccpItems as $item)
                        <li class="flex items-start gap-3 py-3.5 border-b border-line">
                            <svg class="w-4 h-4 text-verify shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                            <span class="text-sm text-ink-mid">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ $contactRoute }}"
                       class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-ink text-white px-6 py-3.5 rounded-lg hover:bg-ink-mid transition-colors">
                        {{ $en ? 'Request HACCP documentation' : 'Solicitar documentación HACCP' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         KOSHER KC
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-ink py-24 md:py-32" aria-label="Kosher KC">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="font-mono text-[10px] tracking-[0.2em] text-white/30 uppercase">03</span>
                        <span class="w-4 h-px bg-white/20" aria-hidden="true"></span>
                        <span class="inline-flex items-center gap-1.5 font-mono text-[10px] tracking-[0.1em] text-verify bg-verify-soft px-2.5 py-1 rounded uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-verify-live inline-block" aria-hidden="true"></span>
                            {{ $en ? 'Active 2026' : 'Activo 2026' }}
                        </span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        Kosher KC<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">{{ $en ? 'Hashgacha KC.' : 'Hashgacha KC.' }}</em>
                    </h2>
                    <p class="text-base text-copper leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'Active authorization issued by Hashgacha KC, Mexico City. Supervised by Rabbi Shmuel Maya and Rabbi Efraim Cremisi. Valid annually — renewed 2026.'
                            : 'Autorización activa emitida por Hashgacha KC, Ciudad de México. Bajo supervisión del Rab. Shmuel Maya y Rab. Efraim Cremisi. Vigencia anual renovable — activo 2026.' }}
                    </p>

                    <div class="bg-white/5 border border-ink/10 rounded-xl px-6 py-5 mb-8">
                        <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-copper mb-3">{{ $en ? 'What markets does it enable?' : '¿Qué mercados habilita?' }}</p>
                        <ul class="space-y-2">
                            @foreach($en ? [
                                'Jewish communities in Mexico and the United States',
                                'Certified export to specialized markets',
                                'Supermarkets and kosher retailers',
                                'HORECA with Jewish dietary requirements',
                            ] : [
                                'Comunidades judías en México y Estados Unidos',
                                'Exportación certificada a mercados especializados',
                                'Supermercados y tiendas especializadas kosher',
                                'HORECA con requerimientos dietéticos judíos',
                            ] as $m)
                            <li class="flex items-center gap-2.5 text-sm text-copper">
                                <span class="w-1.5 h-1.5 rounded-full bg-copper shrink-0" aria-hidden="true"></span>
                                {{ $m }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-10">
                        @foreach([
                            ['label' => $en ? 'Supervision' : 'Supervisión', 'val' => 'Rab. Shmuel Maya'],
                            ['label' => $en ? 'Co-supervision' : 'Co-supervisión', 'val' => 'Rab. Efraim Cremisi'],
                            ['label' => $en ? 'Issuer' : 'Emisor', 'val' => 'Hashgacha KC · CDMX'],
                            ['label' => $en ? 'Validity' : 'Vigencia', 'val' => $en ? 'Annual · 2026' : 'Anual renovable · 2026'],
                        ] as $detail)
                        <div class="bg-white/5 border border-ink/10 rounded-lg px-4 py-4">
                            <p class="font-mono text-[9px] tracking-[0.14em] uppercase text-white/30 mb-1">{{ $detail['label'] }}</p>
                            <p class="font-sans text-sm font-medium text-white">{{ $detail['val'] }}</p>
                        </div>
                        @endforeach
                    </div>

                    <a href="{{ $contactRoute }}"
                       class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                        {{ $en ? 'Request Kosher documentation' : 'Solicitar documentación Kosher' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                {{-- Visual Kosher --}}
                <div class="flex flex-col gap-4">
                    @if($empaqueImg)
                    <img src="{{ $empaqueImg }}"
                         alt="{{ $en ? 'Kosher certified packaging — Soma Meat Co' : 'Empaque certificado Kosher — Soma Meat Co' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl"
                         width="640" height="480" loading="lazy">
                    @endif
                    <div class="bg-white/5 border border-ink/10 rounded-xl px-6 py-5">
                        <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-copper mb-2">{{ $en ? 'Available on request' : 'Disponible bajo solicitud' }}</p>
                        <p class="text-sm text-primary leading-relaxed">
                            {{ $en
                                ? 'Kosher production requires prior coordination. Contact us to schedule a Kosher production run under rabbinical supervision.'
                                : 'La producción Kosher requiere coordinación previa. Contáctanos para programar una corrida de producción Kosher bajo supervisión rabínica.' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════
         TRAZABILIDAD
    ═══════════════════════════════════════════════════════ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="{{ $en ? 'Traceability' : 'Trazabilidad' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="font-mono text-[10px] tracking-[0.2em] text-mute uppercase">04</span>
                        <span class="w-4 h-px bg-line" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Traceability' : 'Trazabilidad' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'We know where every' : 'Sabemos de dónde viene' }}<br>
                        {{ $en ? 'piece comes from.' : 'cada pieza.' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'Always.' : 'Siempre.' }}</em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-10 max-w-lg">
                        {{ $en
                            ? 'Traceability at SOMA MEAT CO documents the origin, process, packaging and destination of every product lot. It is not a paper requirement — it is a system verifiable in audit from day one.'
                            : 'La trazabilidad en SOMA MEAT CO documenta el origen, proceso, empaque y destino de cada lote de producto. No es un requisito de papel — es un sistema verificable en auditoría desde el primer día.' }}
                    </p>

                    @php $trazSteps = $en ? [
                        ['n' => '01', 'title' => 'Documented origin',      'sub' => 'Livestock provenance verified before plant entry. Ranch, origin state and sanitary status documented.'],
                        ['n' => '02', 'title' => 'Lot on every piece',     'sub' => 'Label with lot number, processing date and exact weight on every package. No piece without identification.'],
                        ['n' => '03', 'title' => 'Available for audits',   'sub' => 'Lot documentation ready for review in supplier homologation. Complete from origin to dispatch.'],
                    ] : [
                        ['n' => '01', 'title' => 'Origen documentado',    'sub' => 'Procedencia del ganado verificada antes del ingreso a planta. Rancho, estado de origen y situación sanitaria documentados.'],
                        ['n' => '02', 'title' => 'Lote en cada pieza',    'sub' => 'Etiqueta con número de lote, fecha de proceso y peso exacto en cada empaque. Ninguna pieza sin identificación.'],
                        ['n' => '03', 'title' => 'Disponible para auditorías', 'sub' => 'Documentación de lote lista para revisión en homologación de proveedor. Completa desde origen hasta despacho.'],
                    ]; @endphp

                    <div class="space-y-4 mb-10">
                        @foreach($trazSteps as $step)
                        <div class="bg-white border border-line rounded-xl px-6 py-5 flex items-start gap-5">
                            <span class="shrink-0 font-mono text-[10px] tracking-[0.2em] uppercase text-copper mt-0.5">{{ $step['n'] }}</span>
                            <div>
                                <h3 class="font-sans text-sm font-semibold text-ink mb-1">{{ $step['title'] }}</h3>
                                <p class="text-sm text-mute leading-relaxed">{{ $step['sub'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Badge --}}
                    <div class="inline-flex flex-wrap items-center gap-3 bg-verify-soft border border-verify/20 rounded-xl px-5 py-4 mb-10">
                        <svg class="w-4 h-4 text-verify shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        <span class="font-mono text-[10px] tracking-[0.1em] uppercase text-verify font-semibold">{{ $en ? 'Full traceability · Audit-verifiable · For homologation processes' : 'Trazabilidad completa · Verificable en auditoría · Para procesos de homologación' }}</span>
                    </div>

                    <a href="{{ $contactRoute }}"
                       class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-ink text-white px-6 py-3.5 rounded-lg hover:bg-ink-mid transition-colors">
                        {{ $en ? 'Request traceability documentation' : 'Solicitar documentación de trazabilidad' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                {{-- Visual trazabilidad --}}
                <div class="flex flex-col gap-4">
                    @if($empaqueImg)
                    <img src="{{ $empaqueImg }}"
                         alt="{{ $en ? 'Lot-labeled packaging — Soma Meat Co' : 'Empaque etiquetado por lote — Soma Meat Co' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md"
                         width="640" height="480" loading="lazy">
                    @endif

                    {{-- Trazabilidad flow --}}
                    <div class="bg-bone-soft border border-line rounded-xl p-6">
                        <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-copper mb-4">{{ $en ? 'Traceability chain' : 'Cadena de trazabilidad' }}</p>
                        <div class="flex items-center gap-2 flex-wrap">
                            @foreach($en ? ['Ranch', 'Plant entry', 'Slaughter', 'Cutting', 'Packaging', 'Dispatch'] : ['Rancho', 'Ingreso', 'Sacrificio', 'Corte', 'Empaque', 'Despacho'] as $i => $step)
                            <span class="font-mono text-[10px] tracking-[0.1em] uppercase text-ink-mid bg-white border border-line px-3 py-1.5 rounded-md">{{ $step }}</span>
                            @if($i < 5)<span class="text-line font-mono text-xs" aria-hidden="true">→</span>@endif
                            @endforeach
                        </div>
                        <p class="font-mono text-[9px] tracking-[0.1em] uppercase text-mute mt-4">{{ $en ? 'Every stage documented · Verifiable per lot number' : 'Cada etapa documentada · Verificable por número de lote' }}</p>
                    </div>
                </div>

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
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Documentation' : 'Documentación' }}</span>
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
            </div>
            <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-5">
                {{ $en ? 'Need the certification' : '¿Necesitas la documentación' }}<br>
                <em class="font-fraunces font-normal" style="font-style:italic;color:var(--color-primary)">
                    {{ $en ? 'documentation?' : 'de certificaciones?' }}
                </em>
            </h2>
            <p class="text-base text-ink-mid leading-relaxed mb-3 max-w-xl mx-auto">
                {{ $en
                    ? 'TIF 422, HACCP, Kosher KC and lot-level traceability. Everything available for your supplier procurement process.'
                    : 'TIF 422, HACCP, Kosher KC y trazabilidad por lote. Todo disponible para tu proceso de proveeduría.' }}
            </p>
            <p class="font-mono text-[10px] tracking-[0.14em] text-white/40 uppercase mb-10">
                {{ $en ? 'Response guaranteed in max. 48 business hours' : 'Respuesta garantizada en máximo 48 horas hábiles' }}
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ $contactRoute }}"
                   class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ $en ? 'Request documentation' : 'Solicitar documentación' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-3 font-sans text-sm font-medium border-2 border-white/40 text-white px-8 py-4 rounded-lg hover:bg-ink/5 transition-colors">
                    <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp {{ $en ? 'direct' : 'directo' }}
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
