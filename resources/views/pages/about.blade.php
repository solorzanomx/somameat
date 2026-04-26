<x-layouts.app>
@php
    $en = app()->getLocale() === 'en';
    $wa = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
    $quoteRoute   = $en ? route('en.quote')   : route('quote');
    $contactRoute = $en ? route('en.contact') : route('contact');
    $plantaImg    = file_exists(public_path('img/planta-proceso.webp')) ? asset('img/planta-proceso.webp') : asset('img/hero-planta.webp');
    $rastroImg    = file_exists(public_path('img/srv-rastro.webp'))     ? asset('img/srv-rastro.webp')     : null;
@endphp

    <x-slot name="seo">
        <x-seo
            :title="($en ? 'About us' : 'Nosotros') . ' — Soma Meat Co'"
            :description="$en
                ? 'SOMA MEAT CO — TIF 422 certified meat plant in San Juan Teoloyucan, Estado de México. Mission: produce premium meat products with the highest standards of inocuity and traceability.'
                : 'SOMA MEAT CO — Planta cárnica certificada TIF 422 en San Juan Teoloyucan, Estado de México. Misión: elaborar productos cárnicos premium con los más altos estándares de inocuidad y trazabilidad.'"
        />
    </x-slot>

    <x-slot name="schema">
        <x-seo.breadcrumb :items="[
            ['label' => $en ? 'Home' : 'Inicio', 'url' => url($en ? '/en' : '/')],
            ['label' => $en ? 'About us' : 'Nosotros'],
        ]"/>
    </x-slot>

    {{-- ═══ HERO ═══ --}}
    <section class="bg-ink pt-[106px] pb-0 overflow-hidden" aria-label="{{ $en ? 'About us hero' : 'Hero nosotros' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-[1.1fr_1fr] gap-12 items-end pt-14 pb-0">
                <div class="pb-14">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Who we are' : 'Quiénes somos' }}</span>
                    </div>
                    <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-[0.95] tracking-[-0.04em] mb-6" style="font-variation-settings:'\"opsz\" 96'">
                        {{ $en ? 'Industrial tradition' : 'Tradición industrial' }}<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">{{ $en ? 'with global standard.' : 'con estándar global.' }}</em>
                    </h1>
                    <p class="text-base text-copper leading-relaxed max-w-lg mb-10">
                        {{ $en
                            ? 'Founded with the purpose of bringing the Mexican meat industry to the most demanding markets in the world. TIF 422, HACCP and Kosher KC — not as requirements, but as our own standard.'
                            : 'Fundada con el propósito de llevar la industria cárnica mexicana a los mercados más exigentes del mundo. TIF 422, HACCP y Kosher KC — no como requisito, sino como estándar propio.' }}
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ $contactRoute }}" class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-6 py-3.5 rounded-lg hover:bg-primary-dark transition-colors">
                            {{ $en ? 'Contact us' : 'Contactar' }}
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $quoteRoute }}" class="inline-flex items-center gap-2 font-sans text-sm font-medium border border-ink/20 text-white px-6 py-3.5 rounded-lg hover:bg-ink/5 transition-colors">
                            {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block self-end">
                    <img src="{{ $plantaImg }}" alt="{{ $en ? 'Soma Meat Co processing plant — Teoloyucan' : 'Planta Soma Meat Co — Teoloyucan' }}"
                         class="w-full h-[480px] object-cover rounded-t-2xl" width="640" height="480" loading="eager">
                </div>
            </div>
        </div>
    </section>

    <x-sections.cert-strip />

    {{-- ═══ PROPÓSITO / HISTORIA ═══ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="{{ $en ? 'Our story' : 'Nuestra historia' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Where we come from' : 'De dónde venimos' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'More than a decade' : 'Más de una década' }}<br>
                        <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'processing with purpose.' : 'procesando con propósito.' }}</em>
                    </h2>
                    <p class="text-base text-ink-mid leading-relaxed mb-6 max-w-lg">
                        {{ $en
                            ? 'SOMA MEAT CO was born in San Juan Teoloyucan, Estado de México, with a conviction: that Mexico has the raw material, talent and infrastructure to compete in the most demanding markets in the world.'
                            : 'SOMA MEAT CO nació en San Juan Teoloyucan, Estado de México, con una convicción: que México tiene la materia prima, el talento y la infraestructura para competir en los mercados más exigentes del mundo.' }}
                    </p>
                    <p class="text-base text-ink-mid leading-relaxed mb-8 max-w-lg">
                        {{ $en
                            ? 'We built a TIF 422 certified plant from day one — not as a requirement, but as our own standard. Every cut that leaves our plant is the result of an impeccable process: traced, certified and produced to international inocuity standards.'
                            : 'Construimos una planta con certificación TIF 422 desde el primer día, no como requisito sino como estándar propio. Cada corte que sale de nuestra planta es el resultado de un proceso impecable: trazado, certificado y elaborado con estándares internacionales de inocuidad.' }}
                    </p>
                    <div class="bg-ink rounded-xl px-6 py-5">
                        <p class="font-mono text-[10px] tracking-[0.15em] uppercase text-copper mb-2">{{ $en ? 'Corporate purpose' : 'Propósito corporativo' }}</p>
                        <p class="font-display text-lg font-semibold text-white leading-snug">
                            {{ $en
                                ? '"Guarantee that every cut that reaches the table — in a home, a restaurant or a shelf — is the result of an impeccable process: traced, certified and produced to international standards."'
                                : '"Garantizar que cada corte que llega a la mesa —en un hogar, un restaurante o un anaquel— sea el resultado de un proceso impecable: trazado, certificado y elaborado con estándares internacionales."' }}
                        </p>
                    </div>
                </div>
                @if($rastroImg)
                <div>
                    <img src="{{ $rastroImg }}" alt="{{ $en ? 'TIF 422 processing plant — Soma Meat Co' : 'Planta de proceso TIF 422 — Soma Meat Co' }}"
                         class="w-full aspect-[4/5] object-cover rounded-2xl shadow-md" width="640" height="800" loading="lazy">
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ═══ MISIÓN + VISIÓN ═══ --}}
    <section class="bg-bone-soft py-24 md:py-32" aria-label="{{ $en ? 'Mission and vision' : 'Misión y visión' }}">
        <div class="container-soma">
            <div class="mb-14">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Strategic direction' : 'Dirección estratégica' }}</span>
                </div>
                <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'Mission' : 'Misión' }}
                    <em class="font-fraunces font-normal text-primary" style="font-style:italic"> {{ $en ? '& vision.' : 'y visión.' }}</em>
                </h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white border border-line rounded-2xl p-8 md:p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Mission' : 'Misión' }}</span>
                    </div>
                    <p class="font-display text-xl font-semibold text-ink leading-snug mb-4">
                        {{ $en
                            ? 'Produce and market premium meat products with the highest standards of inocuity, traceability and quality.'
                            : 'Elaborar y comercializar productos cárnicos premium con los más altos estándares de inocuidad, trazabilidad y calidad.' }}
                    </p>
                    <p class="text-sm text-mute leading-relaxed">
                        {{ $en
                            ? 'Aimed at retail chains, B2B clients and export markets — competing with leading international brands.'
                            : 'Dirigidos a autoservicios, clientes B2B y mercados exportadores, compitiendo con marcas internacionales de primera línea.' }}
                    </p>
                </div>
                <div class="bg-ink rounded-2xl p-8 md:p-10">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Vision' : 'Visión' }}</span>
                    </div>
                    <p class="font-display text-xl font-semibold text-white leading-snug mb-4">
                        {{ $en
                            ? 'Become the Mexican reference brand for premium meats at a Latin American level.'
                            : 'Convertirse en la marca mexicana de referencia en cárnicos premium a nivel latinoamericano.' }}
                    </p>
                    <p class="text-sm text-ink-mid leading-relaxed">
                        {{ $en
                            ? 'Present in major distribution chains, high-end restaurants and export markets.'
                            : 'Presente en principales cadenas de distribución, restaurantes de alta categoría y mercados de exportación.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ VALORES ═══ --}}
    <section class="bg-bone py-24 md:py-32" aria-label="{{ $en ? 'Values' : 'Valores' }}">
        <div class="container-soma">
            <div class="mb-14">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'What guides us' : 'Lo que nos guía' }}</span>
                </div>
                <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em]">
                    {{ $en ? 'Values visible' : 'Valores visibles' }}<br>
                    <em class="font-fraunces font-normal text-primary" style="font-style:italic">{{ $en ? 'in every lot.' : 'en cada lote.' }}</em>
                </h2>
            </div>
            @php $values = $en ? [
                ['title' => 'Inocuity first',            'desc' => 'TIF and HACCP protocols without concessions in food safety. There are no acceptable exceptions in sanitary process.'],
                ['title' => 'Total traceability',        'desc' => 'Tracking from origin to dispatch per lot. Every cut has documented history: which ranch, how it was processed, who audited it.'],
                ['title' => 'Consistent quality',        'desc' => '"We don\'t produce the best lot. We produce the same level of excellence in every order, always." Consistency is our only standard.'],
            ] : [
                ['title' => 'Inocuidad primero',         'desc' => 'Protocolos TIF y HACCP sin concesiones en seguridad alimentaria. No existen excepciones aceptables en el proceso sanitario.'],
                ['title' => 'Trazabilidad total',        'desc' => 'Seguimiento desde origen hasta despacho por lote. Cada corte tiene historia documentada: de qué rancho proviene, cómo se procesó, quién lo auditó.'],
                ['title' => 'Calidad consistente',       'desc' => '"No producimos el mejor lote. Producimos el mismo nivel de excelencia en cada pedido, siempre." La consistencia es nuestro único estándar.'],
            ]; @endphp
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($values as $i => $val)
                <div class="bg-white border border-line rounded-xl p-8 flex flex-col gap-5">
                    <div>
                        <span class="font-mono text-[10px] tracking-[0.2em] text-copper uppercase">0{{ $i + 1 }}</span>
                        <div class="w-10 h-1 bg-copper rounded mt-3 mb-4"></div>
                    </div>
                    <h3 class="font-display font-bold text-2xl text-ink leading-snug">{{ $val['title'] }}</h3>
                    <p class="text-sm text-mute leading-relaxed flex-1">{{ $val['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ UBICACIÓN ═══ --}}
    <section class="bg-ink py-24 md:py-32" aria-label="{{ $en ? 'Location' : 'Ubicación' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Location' : 'Ubicación' }}</span>
                    </div>
                    <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-6">
                        {{ $en ? 'San Juan Teoloyucan,' : 'San Juan Teoloyucan,' }}<br>
                        <em class="font-fraunces font-normal text-copper" style="font-style:italic">{{ $en ? 'Estado de México.' : 'Estado de México.' }}</em>
                    </h2>
                    <p class="text-base text-copper leading-relaxed mb-10 max-w-lg">
                        {{ $en
                            ? '45 minutes from AICM with direct access to the country\'s main logistics corridors. Strategic position for export and national distribution.'
                            : 'A 45 minutos del AICM y con acceso directo a los principales corredores logísticos del país. Posición estratégica para exportación y distribución nacional.' }}
                    </p>
                    <div class="space-y-4">
                        @foreach([
                            ['icon' => 'M15 10.5a3 3 0 11-6 0 3 3 0 016 0zM19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z', 'label' => $en ? 'Address' : 'Dirección', 'val' => config('soma.contact.address')],
                            ['icon' => 'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z', 'label' => $en ? 'Phone' : 'Teléfono', 'val' => config('soma.contact.phone_1') . ' / ' . config('soma.contact.phone_2')],
                            ['icon' => 'M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75', 'label' => 'Email', 'val' => config('soma.contact.email')],
                            ['icon' => 'M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => $en ? 'Hours' : 'Horario', 'val' => config('soma.contact.hours')],
                        ] as $info)
                        <div class="flex items-start gap-4">
                            <div class="shrink-0 w-10 h-10 rounded-lg bg-white/5 border border-ink/10 flex items-center justify-center">
                                <svg class="w-4.5 h-4.5 text-copper" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $info['icon'] }}"/></svg>
                            </div>
                            <div>
                                <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-copper mb-1">{{ $info['label'] }}</p>
                                <p class="text-sm text-copper">{{ $info['val'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <img src="{{ $plantaImg }}" alt="{{ $en ? 'Soma Meat Co plant — San Juan Teoloyucan' : 'Planta Soma Meat Co — San Juan Teoloyucan' }}"
                         class="w-full aspect-[4/3] object-cover rounded-2xl" width="640" height="480" loading="lazy">
                    <div class="grid grid-cols-3 gap-3">
                        @foreach([
                            ['val' => '21', 'unit' => 'ton', 'label' => $en ? 'Daily maquila' : 'Maquila / día'],
                            ['val' => '150', 'unit' => 'cab', 'label' => $en ? 'Carcass chamber' : 'Cámara canales'],
                            ['val' => '5',  'unit' => $en ? 'sp.' : 'esp.', 'label' => $en ? 'Species' : 'Especies'],
                        ] as $stat)
                        <div class="bg-white/5 border border-ink/10 rounded-xl p-4 text-center">
                            <div class="flex items-baseline justify-center gap-1 mb-1">
                                <span class="font-display font-bold text-2xl text-white">{{ $stat['val'] }}</span>
                                <span class="font-display text-sm text-white/40">{{ $stat['unit'] }}</span>
                            </div>
                            <p class="font-mono text-[9px] tracking-[0.1em] uppercase text-white/30">{{ $stat['label'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ CTA FINAL ═══ --}}
    <section class="bg-cream py-24" aria-label="{{ $en ? 'Call to action' : 'Llamada a la acción' }}">
        <div class="container-soma text-center max-w-3xl mx-auto">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? "Let's work together" : 'Trabajemos juntos' }}</span>
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
            </div>
            <h2 class="font-display font-bold text-4xl md:text-5xl text-ink leading-[1.0] tracking-[-0.03em] mb-5">
                {{ $en ? 'Want to visit' : '¿Quieres conocer' }}<br>
                <em class="font-fraunces font-normal" style="font-style:italic;color:var(--color-primary)">{{ $en ? 'the plant?' : 'la planta?' }}</em>
            </h2>
            <p class="text-base text-ink-mid leading-relaxed mb-10 max-w-xl mx-auto">
                {{ $en ? 'We schedule a visit or send you the complete certification and capacity dossier.' : 'Agendamos una visita o te enviamos el dossier completo de certificaciones y capacidades.' }}
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ $contactRoute }}" class="inline-flex items-center gap-3 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ $en ? 'Schedule visit' : 'Agendar visita' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 font-sans text-sm font-medium border-2 border-white/40 text-white px-8 py-4 rounded-lg hover:bg-ink/5 transition-colors">
                    WhatsApp
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
