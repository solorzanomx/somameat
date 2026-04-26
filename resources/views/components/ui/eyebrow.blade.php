@props([
    'color' => 'copper', // copper | evergreen | ink
])

@php
    $colors = [
        'copper'    => 'text-copper',
        'evergreen' => 'text-evergreen',
        'ink'       => 'text-ink-soft',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center gap-3']) }}>
    <span class="block w-6 h-px bg-copper shrink-0" aria-hidden="true"></span>
    <span class="text-xs font-semibold uppercase tracking-[0.08em] {{ $colors[$color] }}">
        {{ $slot }}
    </span>
</div>
