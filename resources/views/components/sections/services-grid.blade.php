@props([
    'services'    => [],
    'eyebrow'     => null,
    'title'       => null,
    'titleLine2'  => null,
    'ctaLabel'    => 'Ver todos',
    'ctaHref'     => null,
])

@php
    $ctaHref ??= route('services.index');
@endphp

<section class="bg-bone py-20 md:py-28" aria-label="{{ $eyebrow ?? 'Servicios industriales' }}">
    <div class="container-soma">

        {{-- Cabecera --}}
        <div class="flex items-start justify-between gap-6 mb-10 md:mb-14">
            <div>
                @if($eyebrow)
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-copper">{{ $eyebrow }}</span>
                    </div>
                @endif

                @if($title)
                    <h2 class="font-sans font-black text-4xl md:text-5xl lg:text-6xl leading-[0.9] tracking-tight">
                        <span class="block text-ink uppercase">{{ $title }}</span>
                        @if($titleLine2)
                            <span class="block text-primary uppercase">{{ $titleLine2 }}</span>
                        @endif
                    </h2>
                @endif
            </div>

            <a
                href="{{ $ctaHref }}"
                class="shrink-0 mt-2 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.15em] text-primary hover:text-primary-dark transition-colors"
                aria-label="{{ $ctaLabel }}"
            >
                {{ $ctaLabel }}
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        {{-- Grid de servicios --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($services as $i => $service)
                @php
                    $index     = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                    $featured  = !empty($service['featured']);
                    $hasImage  = !empty($service['image']);
                @endphp

                <a
                    href="{{ $service['url'] ?? '#' }}"
                    class="group flex flex-col rounded-2xl overflow-hidden border transition-shadow duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary
                        {{ $featured
                            ? 'bg-ink border-ink/60 hover:shadow-[--shadow-lg]'
                            : 'bg-white border-line hover:shadow-[--shadow-md]' }}"
                >
                    {{-- Imagen --}}
                    <div class="aspect-[3/2] overflow-hidden {{ $hasImage ? '' : ($featured ? 'bg-ink-soft/20' : 'bg-pearl') }} shrink-0">
                        @if($hasImage)
                            <img
                                src="{{ $service['image'] }}"
                                alt="{{ $service['title'] }}"
                                class="w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-500"
                                loading="lazy"
                                width="480"
                                height="320"
                            >
                        @else
                            {{-- Placeholder mientras no hay imagen --}}
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="font-mono text-2xl font-bold {{ $featured ? 'text-cream/10' : 'text-line' }}">{{ $index }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Contenido --}}
                    <div class="flex flex-col flex-1 p-5 pt-4">
                        {{-- Número · categoría --}}
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] mb-3 {{ $featured ? 'text-copper' : 'text-ink-soft/50' }}">
                            {{ $index }}
                            @if($featured)
                                · <span class="text-copper">Destacado</span>
                            @elseif(!empty($service['category']))
                                · {{ $service['category'] }}
                            @endif
                        </p>

                        {{-- Título --}}
                        <h3 class="font-sans font-bold text-base md:text-lg uppercase leading-tight mb-2 {{ $featured ? 'text-cream' : 'text-ink' }}">
                            {{ $service['title'] }}
                        </h3>

                        {{-- Descripción --}}
                        <p class="text-xs leading-relaxed flex-1 {{ $featured ? 'text-cream/60' : 'text-ink-soft' }}">
                            {{ $service['description'] }}
                        </p>

                        {{-- CTA --}}
                        <div class="mt-4 flex items-center gap-1.5 text-xs font-bold uppercase tracking-[0.12em] group-hover:gap-2.5 transition-all duration-200
                            {{ $featured ? 'text-copper' : 'text-primary' }}">
                            <span>{{ __('Ver detalle') }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Slot opcional para contenido extra --}}
        @if(!$slot->isEmpty())
            <div class="mt-12">{{ $slot }}</div>
        @endif

    </div>
</section>
