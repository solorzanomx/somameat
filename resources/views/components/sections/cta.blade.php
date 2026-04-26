@props([
    'eyebrow'        => null,
    'title'          => null,
    'subtitle'       => null,
    'primaryLabel'   => null,
    'primaryHref'    => null,
    'secondaryLabel' => null,
    'secondaryHref'  => null,
    'dark'           => true,
])

@php
    $bg      = $dark ? 'bg-primary-dark' : 'bg-cream';
    $textH   = $dark ? 'text-cream' : 'text-ink';
    $textSub = $dark ? 'text-cream/70' : 'text-ink-soft';
@endphp

<section class="{{ $bg }} py-20 md:py-24" aria-label="{{ $title ?? 'Llamada a la acción' }}">
    <div class="container-soma text-center max-w-2xl mx-auto">
        @if($eyebrow)
            <x-ui.eyebrow :color="$dark ? 'copper' : 'copper'" class="justify-center mb-6">{{ $eyebrow }}</x-ui.eyebrow>
        @endif

        @if($title)
            <h2 class="font-display text-3xl md:text-4xl {{ $textH }} mb-4 leading-tight">
                {!! $title !!}
            </h2>
        @endif

        @if($subtitle)
            <p class="text-base {{ $textSub }} leading-relaxed mb-10">{{ $subtitle }}</p>
        @endif

        <div class="flex flex-wrap items-center justify-center gap-4">
            @if($primaryLabel && $primaryHref)
                <x-ui.button variant="copper" size="lg" as="a" :href="$primaryHref">
                    {{ $primaryLabel }}
                </x-ui.button>
            @endif
            @if($secondaryLabel && $secondaryHref)
                <x-ui.button variant="{{ $dark ? 'secondary' : 'secondary' }}" size="lg" as="a" :href="$secondaryHref" class="{{ $dark ? 'border-cream/40 text-cream hover:bg-cream hover:text-ink' : '' }}">
                    {{ $secondaryLabel }}
                </x-ui.button>
            @endif
            {{ $slot ?? '' }}
        </div>
    </div>
</section>
