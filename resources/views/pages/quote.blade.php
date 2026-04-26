<x-layouts.app>
    <x-slot name="seo">
        <x-seo
            :title="__('quote.eyebrow') . ' — Soma Meat Co'"
            :description="__('quote.meta_description')"
        />
    </x-slot>

    {{-- HERO --}}
    <section class="bg-ink pt-32 pb-24">
        <div class="container-soma">
            <x-ui.eyebrow class="text-copper/80">{{ __('quote.eyebrow') }}</x-ui.eyebrow>
            <h1 class="mt-4 font-display text-4xl md:text-6xl text-cream leading-tight max-w-3xl">
                {!! __('quote.title') !!}
            </h1>
            <p class="mt-6 text-xl text-cream/70 max-w-xl leading-relaxed">{{ __('quote.subtitle') }}</p>
        </div>
    </section>

    {{-- CERT STRIP --}}
    <x-sections.cert-strip />

    {{-- FORMULARIO --}}
    <section class="bg-bone py-24">
        <div class="container-soma">
            <div class="grid lg:grid-cols-3 gap-16">

                {{-- Formulario (2/3) --}}
                <div class="lg:col-span-2">
                    <livewire:quote-form />
                </div>

                {{-- Por qué Soma (1/3) --}}
                <aside class="space-y-8 lg:pt-2">
                    <div>
                        <x-ui.eyebrow>{{ app()->getLocale() === 'en' ? 'Why Soma' : 'Por qué Soma' }}</x-ui.eyebrow>
                    </div>

                    @php
                    $reasons = app()->getLocale() === 'en' ? [
                        ['num' => 'TIF 422', 'label' => 'Federal cert.', 'desc' => 'SAGARPA-SENASICA certified plant, accepted in 50+ countries.'],
                        ['num' => '21 t',    'label' => 'Daily capacity', 'desc' => 'Scalable runs from 1 ton. Reliable on-time delivery.'],
                        ['num' => '4',       'label' => 'Certifications', 'desc' => 'TIF, HACCP, Kosher and Halal. Ready for any market.'],
                        ['num' => '24 h',    'label' => 'Quote turnaround', 'desc' => 'Detailed commercial proposal within one business day.'],
                    ] : [
                        ['num' => 'TIF 422', 'label' => 'Cert. federal',         'desc' => 'Planta certificada SAGARPA-SENASICA, aceptada en más de 50 países.'],
                        ['num' => '21 t',    'label' => 'Capacidad diaria',      'desc' => 'Corridas escalables desde 1 tonelada. Entregas puntuales.'],
                        ['num' => '4',       'label' => 'Certificaciones',       'desc' => 'TIF, HACCP, Kosher y Halal. Listos para cualquier mercado.'],
                        ['num' => '24 h',    'label' => 'Respuesta cotización',  'desc' => 'Propuesta comercial detallada en un día hábil.'],
                    ];
                    @endphp

                    <div class="space-y-6">
                        @foreach($reasons as $reason)
                        <div class="flex gap-4">
                            <div class="shrink-0 w-14 text-right">
                                <span class="font-mono text-lg font-bold text-copper">{{ $reason['num'] }}</span>
                            </div>
                            <div class="pt-0.5">
                                <p class="text-sm font-semibold text-ink">{{ $reason['label'] }}</p>
                                <p class="mt-0.5 text-xs text-ink-soft leading-relaxed">{{ $reason['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Contacto directo --}}
                    <div class="border-t border-line pt-6">
                        <p class="text-xs text-ink-soft mb-3">
                            {{ app()->getLocale() === 'en' ? 'Prefer to talk directly?' : '¿Prefieres hablar directamente?' }}
                        </p>
                        <a href="https://wa.me/525500000000"
                           class="inline-flex items-center gap-2 text-sm font-semibold text-evergreen hover:text-evergreen/80 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </aside>

            </div>
        </div>
    </section>

</x-layouts.app>
