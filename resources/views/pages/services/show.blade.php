<x-layouts.app>
    @php
    $locale = app()->getLocale();
    $en = $locale === 'en';

    // Mapa slug → datos del servicio (pre-DB)
    $services = [
        'rastro-tif' => [
            'key'     => 's1',
            'icon'    => null,
            'features' => $en
                ? ['Full traceability from carcass to cut','SAGARPA-SENASICA audited','NOM-009-ZOO-1994 compliant','21 tons daily capacity']
                : ['Trazabilidad completa de canal a corte','Auditado por SAGARPA-SENASICA','Cumplimiento NOM-009-ZOO-1994','21 toneladas de capacidad diaria'],
            'detail'  => $en
                ? 'Our TIF 422 slaughterhouse operates under the strictest federal regulations with full chain-of-custody documentation. Each carcass is tagged, weighed and logged from entry to dispatch. Third-party audits are conducted quarterly by SENASICA inspectors.'
                : 'Nuestro rastro TIF 422 opera bajo las regulaciones federales más estrictas con documentación completa de trazabilidad. Cada canal se etiqueta, pesa y registra desde el ingreso hasta el despacho. Auditorías de terceros se realizan trimestralmente por inspectores SENASICA.',
        ],
        'corte-premium' => [
            'key'     => 's2',
            'icon'    => null,
            'features' => $en
                ? ['Beef, pork, lamb, goat & poultry','Certified calibers and yields','Custom cuts to specification','Zero-tolerance contamination protocols']
                : ['Res, cerdo, borrego, cabra y ave','Calibres y rendimientos certificados','Cortes personalizados según especificación','Protocolos de cero tolerancia a contaminación'],
            'detail'  => $en
                ? 'Precision deboning and portioning for every cut type. Our master cutters work to tight caliber tolerances and documented yield targets. Each customer specification is codified in an SOP and reviewed on every production run.'
                : 'Deshuese y porcionado de precisión para cada tipo de corte. Nuestros maestros carniceros trabajan con tolerancias de calibre estrechas y objetivos de rendimiento documentados. Cada especificación del cliente se codifica en un PNO y se revisa en cada corrida de producción.',
        ],
        'maquila' => [
            'key'     => 's3',
            'icon'    => null,
            'features' => $en
                ? ['Private label or co-brand options','Custom formulation & seasoning','Retail, food service & export formats','Kosher & Halal certified runs']
                : ['Etiqueta privada o co-marca','Formulación y condimentación personalizada','Formatos para retail, food service y exportación','Corridas certificadas Kosher y Halal'],
            'detail'  => $en
                ? 'We process under your brand from recipe development to finished pallet. Minimum runs start at one ton with full traceability and batch documentation. Our QA team validates each formulation before production begins.'
                : 'Procesamos bajo tu marca desde el desarrollo de receta hasta el pallet terminado. Las corridas mínimas inician en una tonelada con trazabilidad completa y documentación de lote. Nuestro equipo de QA valida cada formulación antes de iniciar producción.',
        ],
        'empaque' => [
            'key'     => 's4',
            'icon'    => null,
            'features' => $en
                ? ['Cryovac MAP & vacuum technology','Extended shelf life for export','Custom tray, pouch and master carton','HACCP-validated sealing protocols']
                : ['Tecnología MAP y vacío Cryovac','Shelf life extendido para exportación','Charola, bolsa y caja master personalizados','Protocolos de sellado validados HACCP'],
            'detail'  => $en
                ? 'Modified atmosphere and vacuum packaging lines running at food-grade ISO conditions. All sealing parameters are logged per batch. We offer full graphic design and label compliance support for export markets.'
                : 'Líneas de empaque MAP y al vacío corriendo en condiciones ISO grado alimentario. Todos los parámetros de sellado se registran por lote. Ofrecemos soporte completo de diseño gráfico y cumplimiento de etiqueta para mercados de exportación.',
        ],
        'congelacion' => [
            'key'     => 's5',
            'icon'    => null,
            'features' => $en
                ? ['15 tons IQF capacity per cycle','USDA-accepted cold chain','Holding chamber for 150 head','Real-time temperature logging']
                : ['15 toneladas de capacidad IQF por ciclo','Cadena de frío aceptada por USDA','Cámara de mantenimiento para 150 cabezas','Registro de temperatura en tiempo real'],
            'detail'  => $en
                ? 'Individual quick freezing locks in product quality at the cellular level. Our cold chain is unbroken from post-slaughter through shipment. Temperature data is logged every 15 minutes and available for customer audit.'
                : 'La congelación IQF fija la calidad del producto a nivel celular. Nuestra cadena de frío es ininterrumpida desde el post-proceso hasta el embarque. Los datos de temperatura se registran cada 15 minutos y están disponibles para auditoría del cliente.',
        ],
    ];

    // Fallback si slug no existe
    if (!isset($services[$slug])) {
        abort(404);
    }

    $service = $services[$slug];
    $key     = $service['key'];
    @endphp

    <x-slot name="seo">
        <x-seo
            :title="__('services.' . $key . '_title') . ' — Soma Meat Co'"
            :description="__('services.' . $key . '_desc')"
        />
    </x-slot>

    <x-slot name="schema">
        <x-seo.breadcrumb :items="[
            ['label' => ($en ? 'Home' : 'Inicio'), 'url' => url($en ? '/en' : '/')],
            ['label' => __('services.eyebrow'), 'url' => ($en ? route('en.services.index') : route('services.index'))],
            ['label' => __('services.' . $key . '_title')],
        ]"/>
    </x-slot>

    {{-- HERO --}}
    <section class="bg-ink pt-32 pb-24">
        <div class="container-soma">
            <a href="{{ $en ? route('en.services.index') : route('services.index') }}"
               class="inline-flex items-center gap-2 text-sm text-cream/50 hover:text-cream/80 transition-colors mb-8">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                {{ $en ? 'All services' : 'Todos los servicios' }}
            </a>
            <x-ui.eyebrow class="text-copper/80">{{ __('services.' . $key . '_category') }}</x-ui.eyebrow>
            <h1 class="mt-4 font-display text-4xl md:text-6xl text-cream leading-tight max-w-3xl">
                {{ __('services.' . $key . '_title') }}
            </h1>
            <p class="mt-6 text-xl text-cream/70 max-w-2xl leading-relaxed">
                {{ __('services.' . $key . '_desc') }}
            </p>
        </div>
    </section>

    {{-- CERT STRIP --}}
    <x-sections.cert-strip />

    {{-- DETALLE + FEATURES --}}
    <section class="bg-bone py-24">
        <div class="container-soma">
            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <div>
                    <x-ui.eyebrow>{{ $en ? 'How it works' : 'Cómo funciona' }}</x-ui.eyebrow>
                    <h2 class="mt-4 font-display text-4xl text-ink leading-tight">
                        {{ $en ? 'Industrial precision,<br>documented at every step' : 'Precisión industrial,<br>documentada en cada paso' }}
                    </h2>
                    <p class="mt-6 text-lg text-ink-soft leading-relaxed">
                        {{ $service['detail'] }}
                    </p>

                    {{-- Features --}}
                    <ul class="mt-10 space-y-3">
                        @foreach($service['features'] as $feature)
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-copper shrink-0"></span>
                            <span class="text-ink-soft">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Visual placeholder --}}
                <div class="space-y-6">
                    <div class="aspect-[4/3] rounded-2xl bg-pearl border border-line flex items-center justify-center">
                        <span class="text-ink-soft/40 text-sm font-mono">foto servicio</span>
                    </div>
                    {{-- Stat box --}}
                    <div class="bg-ink rounded-xl p-8 grid grid-cols-2 gap-6">
                        <div>
                            <span class="font-mono text-3xl font-bold text-copper">21 t</span>
                            <p class="mt-1 text-sm text-cream/60">{{ $en ? 'Daily capacity' : 'Capacidad diaria' }}</p>
                        </div>
                        <div>
                            <span class="font-mono text-3xl font-bold text-copper">TIF 422</span>
                            <p class="mt-1 text-sm text-cream/60">{{ $en ? 'Federal cert.' : 'Cert. federal' }}</p>
                        </div>
                        <div>
                            <span class="font-mono text-3xl font-bold text-copper">4</span>
                            <p class="mt-1 text-sm text-cream/60">{{ $en ? 'Certifications' : 'Certificaciones' }}</p>
                        </div>
                        <div>
                            <span class="font-mono text-3xl font-bold text-copper">24 h</span>
                            <p class="mt-1 text-sm text-cream/60">{{ $en ? 'Quote response' : 'Respuesta cotización' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- OTROS SERVICIOS --}}
    <section class="bg-cream py-24">
        <div class="container-soma">
            <x-ui.eyebrow class="text-center">{{ $en ? 'Also available' : 'También disponible' }}</x-ui.eyebrow>
            <h2 class="mt-4 font-display text-4xl text-ink text-center mb-12">{{ $en ? 'Complete the process' : 'Completa el proceso' }}</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach(array_filter($services, fn($k) => $k !== $slug, ARRAY_FILTER_USE_KEY) as $otherSlug => $other)
                @if($loop->index < 3)
                <a href="{{ $en ? route('en.services.show', $otherSlug) : route('services.show', $otherSlug) }}"
                   class="bg-white border border-line rounded-xl p-6 hover:shadow-[--shadow-md] transition-shadow group">
                    <span class="text-xs font-semibold uppercase tracking-wider text-copper">
                        {{ __('services.' . $other['key'] . '_category') }}
                    </span>
                    <h3 class="mt-2 font-display text-xl text-ink group-hover:text-primary transition-colors">
                        {{ __('services.' . $other['key'] . '_title') }}
                    </h3>
                    <p class="mt-2 text-sm text-ink-soft leading-relaxed line-clamp-2">
                        {{ __('services.' . $other['key'] . '_desc') }}
                    </p>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <x-sections.cta
        :eyebrow="__('services.cta_eyebrow')"
        :title="__('services.cta_title')"
        :subtitle="__('services.cta_subtitle')"
        :primaryLabel="__('services.cta_primary')"
        :primaryHref="$en ? route('en.quote') : route('quote')"
    />

</x-layouts.app>
