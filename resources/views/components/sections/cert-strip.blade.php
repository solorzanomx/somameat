@php
    $en    = app()->getLocale() === 'en';
    $certs = [
        [
            'title' => 'RASTRO TIF 422',
            'sub'   => $en ? 'SENASICA · SADER México' : 'SENASICA · SADER México',
            'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>',
        ],
        [
            'title' => 'SISTEMA HACCP',
            'sub'   => $en ? '7 critical control points' : '7 puntos críticos documentados',
            'icon'  => '<rect x="3" y="3" width="18" height="18" rx="2" stroke-width="1.5"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.5 12l3 3 6-6"/>',
        ],
        [
            'title' => 'KOSHER KC',
            'sub'   => $en ? 'Feb. Maya · Rab. Cremisi · 2026' : 'Feb. Maya · Rab. Cremisi · 2026',
            'icon'  => '<circle cx="12" cy="12" r="9" stroke-width="1.5"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 12l2.5 2.5 5-5"/>',
        ],
        [
            'title' => $en ? 'FULL TRACEABILITY' : 'TRAZABILIDAD TOTAL',
            'sub'   => $en ? 'Lot · origin to dispatch'  : 'Por lote · origen a despacho',
            'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>',
        ],
    ];
@endphp

<section
    class="bg-primary"
    aria-label="{{ $en ? 'Certifications' : 'Certificaciones' }}"
    x-data="{ visible: false }"
    x-init="
        const io = new IntersectionObserver(([e]) => {
            if (e.isIntersecting) { visible = true; io.disconnect(); }
        }, { threshold: 0.2 });
        io.observe($el);
    "
>
    <div class="max-w-[1280px] mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-white/15">
            @foreach($certs as $i => $cert)
            <div
                class="will-animate flex items-center gap-4 py-5 px-7"
                :class="visible ? 'animate-fade-up anim-delay-{{ $i + 1 }}' : ''"
            >
                <div class="shrink-0 w-10 h-10 rounded-lg border border-white/30 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        {!! $cert['icon'] !!}
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-white uppercase tracking-wide leading-none">{{ $cert['title'] }}</p>
                    <p class="text-[10px] text-white/55 mt-1 leading-tight">{{ $cert['sub'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
