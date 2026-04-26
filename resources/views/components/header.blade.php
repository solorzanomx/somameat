@php $locale = app()->getLocale(); $en = $locale === 'en'; @endphp

<header x-data="{ open: false }" class="fixed top-0 inset-x-0 z-40">

    {{-- Barra utilitaria — autoridad + operación activa --}}
    <div class="bg-ink text-white h-[30px] flex items-center justify-between px-6 md:px-10">
        <div class="flex items-center gap-5 font-mono text-[10px] tracking-[0.14em] uppercase">
            <span class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-verify-live" aria-hidden="true"></span>
                <span class="text-[#86EFAC]">{{ $en ? 'Active operation' : 'Operación activa' }}</span>
            </span>
            <span class="hidden md:inline opacity-55">SAGARPA · MÉX-422</span>
            <span class="hidden md:inline opacity-55">HACCP · KOSHER KC</span>
            <span class="hidden lg:inline opacity-55">Auditoría 2026.03 · 0 NC</span>
        </div>
        <div class="flex items-center gap-4 font-mono text-[10px] tracking-[0.12em] opacity-70">
            <a href="{{ $en ? url('/') : url('/en') }}"
               class="hover:opacity-100 transition-opacity"
               hreflang="{{ $en ? 'es' : 'en' }}">{{ $en ? 'ES' : 'EN' }}</a>
            <span class="hidden md:inline">contacto@somameat.mx</span>
        </div>
    </div>

    {{-- Navegación principal --}}
    <div class="bg-white border-b border-line">
        <div class="max-w-[1280px] mx-auto px-6 md:px-10 flex items-center justify-between h-[76px]">

            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="flex items-center shrink-0 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded"
               aria-label="Soma Meat Co — Inicio">
                <img
                    src="{{ asset('img/logo-soma.webp') }}"
                    alt="Soma Meat Co"
                    class="w-auto" style="height: 2.7rem"
                    width="160"
                    height="48"
                >
            </a>

            {{-- Nav principal (desktop) --}}
            <nav class="hidden md:flex items-center gap-8" aria-label="Navegación principal">
                @php
                $navLinks = [
                    ['label' => __('nav.services'), 'href' => $en ? route('en.services.index') : route('services.index')],
                    ['label' => __('nav.maquila'),  'href' => $en ? route('en.maquila')         : route('maquila')],
                    ['label' => __('nav.quality'),  'href' => $en ? route('en.quality')          : route('quality')],
                    ['label' => __('nav.sectors'),  'href' => $en ? route('en.sectors') : route('sectors')],
                    ['label' => __('nav.about'),    'href' => $en ? route('en.about')            : route('about')],
                    ['label' => __('nav.contact'),  'href' => $en ? route('en.contact')          : route('contact')],
                ];
                $current = request()->path();
                @endphp
                @foreach($navLinks as $link)
                    @php $active = url($link['href']) === url()->current(); @endphp
                    <a href="{{ $link['href'] }}"
                       class="font-sans text-[13px] font-medium pb-1 border-b-2 transition-colors duration-150
                              {{ $active
                                  ? 'text-primary border-primary'
                                  : 'text-ink border-transparent hover:text-primary hover:border-primary/40' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Acciones (desktop) --}}
            <div class="hidden md:flex items-center gap-2">
                <a href="#portal"
                   class="font-sans text-[13px] font-medium text-ink px-4 py-2.5 hover:text-primary transition-colors">
                    {{ $en ? 'Client portal' : 'Portal cliente' }}
                </a>
                <a href="{{ $en ? route('en.quote') : route('quote') }}"
                   class="inline-flex items-center gap-2.5 font-sans text-[13px] font-semibold bg-primary text-white px-5 py-2.5 rounded-lg hover:bg-primary-dark transition-colors">
                    {{ __('nav.quote') }}
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            {{-- Hamburguesa (mobile) --}}
            <button
                x-on:click="open = !open"
                class="md:hidden flex items-center justify-center w-10 h-10 rounded text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                :aria-expanded="open.toString()"
                aria-controls="mobile-menu"
                aria-label="Menú"
            >
                <svg x-show="!open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

        </div>
    </div>

    {{-- Menú mobile --}}
    <div
        id="mobile-menu"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        class="md:hidden bg-white border-t border-line shadow-lg"
    >
        <nav class="max-w-[1280px] mx-auto px-6 py-4 flex flex-col gap-0" aria-label="Menú móvil">
            <a href="{{ $en ? route('en.services.index') : route('services.index') }}" class="py-3 text-sm font-medium text-ink border-b border-line hover:text-primary transition-colors">{{ __('nav.services') }}</a>
            <a href="{{ $en ? route('en.maquila') : route('maquila') }}"               class="py-3 text-sm font-medium text-ink border-b border-line hover:text-primary transition-colors">{{ __('nav.maquila') }}</a>
            <a href="{{ $en ? route('en.quality') : route('quality') }}"               class="py-3 text-sm font-medium text-ink border-b border-line hover:text-primary transition-colors">{{ __('nav.quality') }}</a>
            <a href="{{ $en ? route('en.sectors') : route('sectors') }}"               class="py-3 text-sm font-medium text-ink border-b border-line hover:text-primary transition-colors">{{ __('nav.sectors') }}</a>
            <a href="{{ $en ? route('en.about') : route('about') }}"                   class="py-3 text-sm font-medium text-ink border-b border-line hover:text-primary transition-colors">{{ __('nav.about') }}</a>
            <a href="{{ $en ? route('en.contact') : route('contact') }}"               class="py-3 text-sm font-medium text-ink border-b border-line hover:text-primary transition-colors">{{ __('nav.contact') }}</a>
            <div class="pt-4">
                <a href="{{ $en ? route('en.quote') : route('quote') }}"
                   class="flex items-center justify-center gap-2 w-full bg-primary text-white text-sm font-semibold rounded-lg py-3 hover:bg-primary-dark transition-colors">
                    {{ __('nav.quote') }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </nav>
    </div>

</header>
