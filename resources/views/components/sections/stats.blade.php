@php
    $capacity = config('soma.capacity');
    $en       = app()->getLocale() === 'en';
    $stats    = [
        ['value' => $capacity['maquila_ton_day'], 'unit' => 'ton',  'label' => $en ? 'Maquila combos / day'  : 'Maquila combos / día'],
        ['value' => $capacity['congelacion_ton'],  'unit' => 'ton',  'label' => $en ? 'IQF freezing / day'    : 'Congelación / día'],
        ['value' => $capacity['camara_cabezas'],   'unit' => 'cab',  'label' => $en ? 'Chamber heads / day'   : 'Cámara canales / día'],
        ['value' => $capacity['especies'],         'unit' => 'sp.',  'label' => $en ? 'Species processed'     : 'Especies procesadas'],
    ];
@endphp

<section
    class="bg-[#0a0a0a]"
    aria-label="{{ $en ? 'Operational capacities' : 'Capacidades operativas' }}"
    x-data="{
        visible: false,
        counts: [0, 0, 0, 0],
        targets: [{{ implode(',', array_column($stats, 'value')) }}],
        start() {
            if (this.visible) return;
            this.visible = true;
            this.targets.forEach((target, i) => {
                const steps = 40, duration = 1100;
                let current = 0;
                const interval = setInterval(() => {
                    current += target / steps;
                    if (current >= target) { current = target; clearInterval(interval); }
                    this.counts[i] = Math.round(current);
                }, duration / steps);
            });
        }
    }"
    x-init="new IntersectionObserver(([e]) => { if(e.isIntersecting) start(); }, { threshold: 0.2 }).observe($el)"
>
    <div class="max-w-[1280px] mx-auto grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
        @foreach($stats as $i => $stat)
        <div
            class="flex flex-col justify-center items-center text-center px-6 py-7"
            :class="visible ? 'animate-fade-up' : 'will-animate'"
            style="animation-delay: {{ 0.08 * ($i + 1) }}s"
        >
            <div class="flex items-baseline gap-1 leading-none mb-3">
                <span
                    class="font-display font-bold text-copper leading-[0.9] tracking-[-0.04em]"
                    style="font-size: clamp(2.5rem, 4.5vw, 4rem)"
                    x-text="counts[{{ $i }}]"
                    aria-label="{{ $stat['value'] }} {{ $stat['unit'] }}"
                >{{ $stat['value'] }}</span>
                @if($stat['unit'])
                <span class="font-display text-xl font-semibold text-copper/70 tracking-[-0.02em]">{{ $stat['unit'] }}</span>
                @endif
            </div>
            <p class="font-mono text-[10px] tracking-[0.18em] uppercase text-white/50 leading-snug">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>
</section>
