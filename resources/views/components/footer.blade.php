@php
    $en = app()->getLocale() === 'en';
    $wa = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
@endphp

<footer class="bg-ink text-white" aria-label="Footer">
    <div class="container-soma py-16 md:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-14">

            {{-- Marca --}}
            <div class="lg:col-span-1">
                <a href="{{ $en ? route('en.home') : route('home') }}" class="inline-flex items-center gap-2 mb-5 group" aria-label="Soma Meat Co — Inicio">
                    <img src="{{ asset('img/logo-soma.webp') }}" alt="Soma Meat Co" class="h-8 w-auto" width="120" height="32">
                </a>
                <p class="text-sm text-white/55 leading-relaxed mb-5">
                    {{ $en
                        ? 'TIF 422 certified meat plant. Cutting, packaging and toll manufacturing for retail and foodservice.'
                        : 'Planta cárnica certificada TIF 422. Corte, empaque y maquila para autoservicio y foodservice.' }}
                </p>
                <div class="flex flex-wrap gap-2">
                    @foreach(['TIF 422', 'HACCP', 'KOSHER KC'] as $cert)
                    <span class="font-mono text-[9px] tracking-[0.1em] uppercase text-copper/70 border border-copper/20 rounded px-2 py-1">{{ $cert }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Servicios --}}
            <div>
                <h3 class="font-mono text-[10px] tracking-[0.18em] uppercase text-white/35 mb-4">{{ $en ? 'Services' : 'Servicios' }}</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ $en ? route('en.services.index') : route('services.index') }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'All services' : 'Todos los servicios' }}</a></li>
                    <li><a href="{{ $en ? route('en.maquila') : route('maquila') }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'Toll Mfg · Private Label' : 'Maquila · Marca Propia' }}</a></li>
                    <li><a href="{{ $en ? route('en.quality') : route('quality') }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'Certifications' : 'Certificaciones' }}</a></li>
                    <li><a href="{{ $en ? route('en.sectors') : route('sectors') }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'Sectors' : 'Sectores' }}</a></li>
                    <li><a href="{{ $en ? route('en.quote') : route('quote') }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'Request quote' : 'Solicitar cotización' }}</a></li>
                </ul>
            </div>

            {{-- Empresa --}}
            <div>
                <h3 class="font-mono text-[10px] tracking-[0.18em] uppercase text-white/35 mb-4">{{ $en ? 'Company' : 'Empresa' }}</h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ $en ? route('en.about') : route('about') }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'About us' : 'Nosotros' }}</a></li>
                    <li><a href="{{ $en ? route('en.contact') : route('contact') }}" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'Contact' : 'Contacto' }}</a></li>
                    <li><a href="#portal" class="text-sm text-white/60 hover:text-white transition-colors">{{ $en ? 'Client portal' : 'Portal cliente' }}</a></li>
                </ul>
            </div>

            {{-- Contacto --}}
            <div>
                <h3 class="font-mono text-[10px] tracking-[0.18em] uppercase text-white/35 mb-4">{{ $en ? 'Contact' : 'Contacto' }}</h3>
                <ul class="space-y-3 text-sm text-white/55">
                    <li>
                        <a href="tel:{{ config('soma.contact.phone_1') }}" class="hover:text-white transition-colors block">
                            {{ config('soma.contact.phone_1') }}
                        </a>
                        <a href="tel:{{ config('soma.contact.phone_2') }}" class="hover:text-white transition-colors block">
                            {{ config('soma.contact.phone_2') }}
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ config('soma.contact.email') }}" class="hover:text-white transition-colors">
                            {{ config('soma.contact.email') }}
                        </a>
                    </li>
                    <li class="leading-relaxed text-white/40 text-[13px]">{{ config('soma.contact.address') }}</li>
                    <li class="text-white/40 text-[13px]">{{ config('soma.contact.hours') }}</li>
                    <li>
                        <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 text-sm text-[#25D366] hover:text-white transition-colors mt-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- Barra inferior --}}
        <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-[12px] text-white/35 font-mono tracking-wide">
                &copy; {{ date('Y') }} SOMA MEAT CO · {{ $en ? 'All rights reserved' : 'Todos los derechos reservados' }}
                <span class="mx-2 text-white/20" aria-hidden="true">·</span>
                Quality · Traceability · Trust
            </p>
            <div class="flex items-center gap-5">
                <a href="{{ route('legal.privacy') }}" class="text-[12px] text-white/35 hover:text-white/70 transition-colors">
                    {{ $en ? 'Privacy policy' : 'Aviso de privacidad' }}
                </a>
                <a href="{{ route('legal.terms') }}" class="text-[12px] text-white/35 hover:text-white/70 transition-colors">
                    {{ $en ? 'Terms of use' : 'Términos y condiciones' }}
                </a>
                <a href="{{ route('legal.cookies') }}" class="text-[12px] text-white/35 hover:text-white/70 transition-colors">
                    Cookies
                </a>
            </div>
        </div>
    </div>
</footer>
