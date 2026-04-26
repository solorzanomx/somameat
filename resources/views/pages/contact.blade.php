<x-layouts.app>
@php
    $en = app()->getLocale() === 'en';
    $wa = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
@endphp

    <x-slot name="seo">
        <x-seo
            :title="($en ? 'Contact' : 'Contacto') . ' — Soma Meat Co'"
            :description="$en
                ? 'Contact Soma Meat Co for B2B quotes. Response guaranteed in 48 business hours. Phone, WhatsApp and online form.'
                : 'Contacta a Soma Meat Co para cotizaciones B2B. Respuesta garantizada en 48 horas hábiles. Teléfono, WhatsApp y formulario online.'"
        />
    </x-slot>

    <x-slot name="schema">
        <x-seo.breadcrumb :items="[
            ['label' => $en ? 'Home' : 'Inicio', 'url' => url($en ? '/en' : '/')],
            ['label' => $en ? 'Contact' : 'Contacto'],
        ]"/>
    </x-slot>

    {{-- ═══ HERO ═══ --}}
    <section class="bg-ink pt-[106px] pb-20" aria-label="{{ $en ? 'Contact hero' : 'Hero contacto' }}">
        <div class="container-soma pt-14">
            <div class="flex items-center gap-3 mb-6">
                <span class="w-8 h-px bg-copper" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'Contact' : 'Contacto' }}</span>
            </div>
            <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-[0.95] tracking-[-0.04em] mb-6" style="font-variation-settings:'\"opsz\" 96'">
                {{ $en ? 'Let\'s talk about' : 'Hablemos de' }}<br>
                <em class="font-fraunces font-normal text-copper" style="font-style:italic">{{ $en ? 'your project.' : 'tu proyecto.' }}</em>
            </h1>
            <p class="text-base text-white/70 leading-relaxed max-w-lg mb-8">
                {{ $en
                    ? 'Tell us what you need. A specialized executive contacts you in less than 48 business hours.'
                    : 'Cuéntanos qué necesitas. Un ejecutivo especializado te contacta en menos de 48 horas hábiles.' }}
            </p>
            {{-- Quick contact bar --}}
            <div class="flex flex-wrap gap-4">
                <a href="tel:{{ config('soma.contact.phone_1') }}"
                   class="inline-flex items-center gap-2.5 font-mono text-[11px] tracking-[0.1em] text-white/70 hover:text-copper transition-colors">
                    <svg class="w-4 h-4 text-copper" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                    {{ config('soma.contact.phone_1') }}
                </a>
                <span class="text-white/20" aria-hidden="true">·</span>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2.5 font-mono text-[11px] tracking-[0.1em] text-white/70 hover:text-[#25D366] transition-colors">
                    <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp
                </a>
                <span class="text-white/20" aria-hidden="true">·</span>
                <a href="mailto:{{ config('soma.contact.email') }}"
                   class="inline-flex items-center gap-2 font-mono text-[11px] tracking-[0.1em] text-white/70 hover:text-copper transition-colors">
                    {{ config('soma.contact.email') }}
                </a>
            </div>
        </div>
    </section>

    {{-- ═══ FORMULARIO + INFO ═══ --}}
    <section class="bg-bone py-20 md:py-24" aria-label="{{ $en ? 'Contact form' : 'Formulario de contacto' }}">
        <div class="container-soma">
            <div class="grid lg:grid-cols-[1fr_360px] gap-12 lg:gap-16 items-start">

                {{-- Formulario --}}
                <div>
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-6 h-px bg-copper" aria-hidden="true"></span>
                        <span class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper">{{ $en ? 'B2B quotation form' : 'Formulario de cotización B2B' }}</span>
                    </div>
                    <livewire:contact-form />
                </div>

                {{-- Info lateral --}}
                <aside class="lg:sticky lg:top-32 flex flex-col gap-5">

                    <div class="bg-white border border-line rounded-xl p-6 flex flex-col gap-5">
                        <p class="font-mono text-[10px] tracking-[0.18em] uppercase text-copper">{{ $en ? 'Contact information' : 'Información de contacto' }}</p>

                        {{-- Dirección --}}
                        <div class="flex items-start gap-3">
                            <div class="shrink-0 w-9 h-9 rounded-lg bg-bone border border-line flex items-center justify-center">
                                <svg class="w-4 h-4 text-copper" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0zM19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                            </div>
                            <div>
                                <p class="font-mono text-[9px] tracking-[0.14em] uppercase text-mute mb-1">{{ $en ? 'Address' : 'Dirección' }}</p>
                                <p class="text-sm text-ink leading-relaxed">{{ config('soma.contact.address') }}</p>
                            </div>
                        </div>

                        {{-- Teléfonos --}}
                        <div class="flex items-start gap-3">
                            <div class="shrink-0 w-9 h-9 rounded-lg bg-bone border border-line flex items-center justify-center">
                                <svg class="w-4 h-4 text-copper" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                            </div>
                            <div>
                                <p class="font-mono text-[9px] tracking-[0.14em] uppercase text-mute mb-1">{{ $en ? 'Phone' : 'Teléfono' }}</p>
                                <a href="tel:{{ config('soma.contact.phone_1') }}" class="block text-sm text-ink hover:text-primary transition-colors">{{ config('soma.contact.phone_1') }}</a>
                                <a href="tel:{{ config('soma.contact.phone_2') }}" class="block text-sm text-ink hover:text-primary transition-colors">{{ config('soma.contact.phone_2') }}</a>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-3">
                            <div class="shrink-0 w-9 h-9 rounded-lg bg-bone border border-line flex items-center justify-center">
                                <svg class="w-4 h-4 text-copper" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                            </div>
                            <div>
                                <p class="font-mono text-[9px] tracking-[0.14em] uppercase text-mute mb-1">Email</p>
                                <a href="mailto:{{ config('soma.contact.email') }}" class="text-sm text-ink hover:text-primary transition-colors">{{ config('soma.contact.email') }}</a>
                            </div>
                        </div>

                        {{-- Horario --}}
                        <div class="flex items-start gap-3">
                            <div class="shrink-0 w-9 h-9 rounded-lg bg-bone border border-line flex items-center justify-center">
                                <svg class="w-4 h-4 text-copper" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="font-mono text-[9px] tracking-[0.14em] uppercase text-mute mb-1">{{ $en ? 'Hours' : 'Horario' }}</p>
                                <p class="text-sm text-ink">{{ config('soma.contact.hours') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp CTA --}}
                    <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                       class="flex items-center gap-3 bg-[#25D366] text-white rounded-xl px-5 py-4 hover:bg-[#1da851] transition-colors">
                        <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <div>
                            <p class="font-sans text-sm font-semibold">WhatsApp {{ $en ? 'direct' : 'directo' }}</p>
                            <p class="font-mono text-[10px] opacity-80">{{ config('soma.contact.whatsapp') }}</p>
                        </div>
                    </a>

                    {{-- Promesa --}}
                    <div class="bg-ink rounded-xl px-5 py-4">
                        <div class="flex items-center gap-2.5 mb-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-verify-live shrink-0" aria-hidden="true"></span>
                            <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-copper">{{ $en ? 'Response guarantee' : 'Garantía de respuesta' }}</p>
                        </div>
                        <p class="text-sm text-white/70 leading-relaxed">
                            {{ $en ? 'Response guaranteed in max. 48 business hours for standard quotations.' : 'Respuesta garantizada en máximo 48 horas hábiles para cotizaciones estándar.' }}
                        </p>
                    </div>

                    {{-- Certificaciones --}}
                    <div class="bg-white border border-line rounded-xl p-5">
                        <p class="font-mono text-[9px] tracking-[0.14em] uppercase text-mute mb-3">{{ $en ? 'Active certifications' : 'Certificaciones activas' }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['TIF 422', 'HACCP', 'KOSHER KC'] as $cert)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1.5 border border-line rounded-md font-mono text-[9px] tracking-[0.08em] text-ink">
                                <svg class="w-2.5 h-2.5 text-verify" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                {{ $cert }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>

</x-layouts.app>
