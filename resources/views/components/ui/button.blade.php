@props([
    'variant' => 'primary',   // primary | secondary | ghost | copper | danger
    'size'    => 'md',        // sm | md | lg
    'as'      => 'button',    // button | a
    'href'    => null,
    'type'    => 'button',
    'icon'    => null,
])

@php
    $base = 'inline-flex items-center gap-2 font-semibold transition-colors duration-200 focus-visible:outline-none cursor-pointer';
    $base .= ' focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-primary';

    $variants = [
        'primary'   => 'bg-primary-dark text-cream hover:bg-[#4A1219] rounded-[--radius-md]',
        'secondary' => 'bg-transparent text-ink border border-ink hover:bg-ink hover:text-cream rounded-[--radius-md]',
        'ghost'     => 'bg-transparent text-primary-dark hover:bg-primary-dark/8 rounded-[--radius-md]',
        'copper'    => 'bg-copper text-cream hover:bg-[#9A5F2D] rounded-[--radius-md]',
        'danger'    => 'bg-transparent text-red-700 border border-red-700 hover:bg-red-700 hover:text-white rounded-[--radius-md]',
    ];

    $sizes = [
        'sm' => 'px-[14px] py-2 text-sm',
        'md' => 'px-[18px] py-2.5 text-sm',
        'lg' => 'px-6 py-4 text-base',
    ];

    $classes = "{$base} {$variants[$variant]} {$sizes[$size]}";
    $tag = ($as === 'a') ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($tag === 'a' && $href) href="{{ $href }}" @endif
    @if($tag === 'button') type="{{ $type }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
    @if($icon)
        <x-dynamic-component :component="$icon" class="w-4 h-4 shrink-0" />
    @endif
</{{ $tag }}>
