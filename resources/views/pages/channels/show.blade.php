@php
    $en    = app()->getLocale() === 'en';
    $wa    = 'https://wa.me/' . preg_replace('/\D/', '', config('soma.contact.whatsapp'));
    $name  = $channel->getTranslation('name',  $en?'en':'es', false) ?: $channel->getTranslation('name','es',false);
    $tagline = $channel->getTranslation('tagline', $en?'en':'es', false) ?: $channel->getTranslation('tagline','es',false);
    $desc  = $channel->getTranslation('description', $en?'en':'es', false) ?: $channel->getTranslation('description','es',false);
    $longDesc = $channel->getTranslation('long_description', $en?'en':'es', false) ?: $channel->getTranslation('long_description','es',false);
    $heroImg  = $channel->getFirstMediaUrl('hero','hero') ?: $channel->getFirstMediaUrl('hero');
    $features = $channel->features ?? [];
    $featureList = is_array($features['es']??null) ? ($en ? ($features['en']??$features['es']) : $features['es']) : [];
    $proofPoints = $channel->proof_points ?? [];
    $painPoints  = $channel->pain_points ?? [];
    $steps       = $channel->process_steps ?? [];
    $accentClass = match($channel->color) {
        'copper'    => 'text-copper',
        'evergreen' => 'text-evergreen',
        default     => 'text-primary',
    };
    $accentBg = match($channel->color) {
        'copper'    => 'bg-copper',
        'evergreen' => 'bg-evergreen',
        default     => 'bg-primary',
    };
@endphp

<x-layouts.app>
<x-slot name="seo">
    <x-seo
        :title="$name . ' — Soma Meat Co'"
        :description="$tagline ?: $desc"
    />
</x-slot>

{{-- HERO --}}
<section class="bg-ink pt-[106px] pb-0 relative overflow-hidden" aria-label="{{ $name }}">
    @if($heroImg)
    <div class="absolute inset-0">
        <img src="{{ $heroImg }}" alt="{{ $name }}" class="w-full h-full object-cover opacity-20" width="1440" height="700">
        <div class="absolute inset-0 bg-gradient-to-r from-ink via-ink/90 to-ink/50"></div>
    </div>
    @endif
    <div class="container-soma pt-16 pb-20 relative z-10">
        <div class="max-w-2xl">
            <div class="flex items-center gap-3 mb-6">
                <span class="w-8 h-px {{ $accentBg }}" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.22em] uppercase {{ $accentClass }}">{{ $en ? 'Channel' : 'Canal' }}</span>
            </div>
            <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-[1.0] tracking-[-0.03em] mb-6">
                {{ $name }}
            </h1>
            @if($tagline)
            <p class="text-xl text-copper leading-relaxed mb-10 font-sans">{{ $tagline }}</p>
            @endif
            <div class="flex flex-wrap gap-4">
                <a href="{{ $en ? route('en.quote') : route('quote') }}"
                   class="inline-flex items-center gap-2.5 font-sans text-sm font-semibold {{ $accentBg }} text-white px-6 py-4 rounded-xl hover:opacity-90 transition-opacity">
                    {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 font-sans text-sm font-medium text-copper hover:text-white border border-ink/20 hover:border-white/50 px-6 py-4 rounded-xl transition-all">
                    <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

{{-- PROOF POINTS --}}
@if($proofPoints)
<section class="bg-ink border-t border-ink/10">
    <div class="container-soma">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
            @foreach($proofPoints as $pt)
            <div class="py-8 px-6 text-center">
                <p class="font-mono font-bold text-2xl {{ $accentClass }} mb-1">{{ $pt['value'] }}</p>
                <p class="font-mono text-[10px] tracking-[0.14em] uppercase text-white/40">{{ $en ? ($pt['label_en']??$pt['label_es']??'') : ($pt['label_es']??'') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- DESCRIPCIÓN LARGA --}}
@if($longDesc)
<section class="bg-bone py-20 md:py-28">
    <div class="container-soma">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <span class="w-8 h-px {{ $accentBg }}" aria-hidden="true"></span>
                    <span class="font-mono text-[10px] tracking-[0.2em] uppercase {{ $accentClass }}">{{ $en ? 'About this channel' : 'Sobre este canal' }}</span>
                </div>
                <h2 class="font-display font-bold text-3xl md:text-4xl text-ink leading-[1.1] tracking-[-0.02em] mb-6">
                    {{ $en ? 'Why Soma Meat Co for' : 'Por qué Soma Meat Co para' }}<br>
                    <em class="font-fraunces font-normal {{ $accentClass }}" style="font-style:italic">{{ $name }}</em>
                </h2>
                <p class="text-base text-ink-mid leading-relaxed">{{ $longDesc }}</p>
            </div>
            <ul class="grid grid-cols-1 gap-3" aria-label="{{ $en ? 'Features' : 'Características' }}">
                @foreach($featureList as $feat)
                <li class="flex items-start gap-4 bg-white rounded-xl border border-line px-5 py-4">
                    <span class="w-5 h-5 rounded-full {{ $accentBg }}/10 flex items-center justify-center shrink-0 mt-0.5" aria-hidden="true">
                        <svg class="w-3 h-3 {{ $accentClass }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                    </span>
                    <span class="text-sm text-ink-mid leading-relaxed">{{ $feat }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif

{{-- PAIN POINTS --}}
@if($painPoints)
<section class="bg-bone-soft py-20 md:py-24">
    <div class="container-soma">
        <div class="text-center mb-12">
            <h2 class="font-display font-bold text-3xl md:text-4xl text-ink leading-[1.1] tracking-[-0.02em]">
                {{ $en ? 'Problems we solve' : 'Problemas que resolvemos' }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($painPoints as $pp)
            <div class="bg-white rounded-2xl border border-line p-7">
                <div class="w-10 h-10 rounded-xl {{ $accentBg }}/10 flex items-center justify-center mb-4" aria-hidden="true">
                    <svg class="w-5 h-5 {{ $accentClass }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-display font-bold text-lg text-ink mb-2 leading-snug">{{ $en ? ($pp['title_en']??$pp['title_es']??'') : ($pp['title_es']??'') }}</h3>
                <p class="text-sm text-ink-mid leading-relaxed">{{ $en ? ($pp['body_en']??$pp['body_es']??'') : ($pp['body_es']??'') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- PROCESO --}}
@if($steps)
<section class="bg-ink py-20 md:py-28">
    <div class="container-soma">
        <div class="text-center mb-14">
            <div class="flex items-center justify-center gap-3 mb-5">
                <span class="w-8 h-px {{ $accentBg }}" aria-hidden="true"></span>
                <span class="font-mono text-[10px] tracking-[0.2em] uppercase {{ $accentClass }}">{{ $en ? 'How it works' : 'Cómo funciona' }}</span>
                <span class="w-8 h-px {{ $accentBg }}" aria-hidden="true"></span>
            </div>
            <h2 class="font-display font-bold text-3xl md:text-4xl text-ink leading-[1.0] tracking-[-0.03em]">
                {{ $en ? 'From first contact to delivery.' : 'Del primer contacto a la entrega.' }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($steps as $i => $step)
            <div class="relative">
                @if(!$loop->last)
                <div class="hidden lg:block absolute top-8 left-[calc(100%+12px)] w-6 h-px bg-white/15" aria-hidden="true"></div>
                @endif
                <div class="bg-white/5 border border-ink/10 rounded-2xl p-6 h-full">
                    <span class="font-mono text-[10px] tracking-[0.18em] uppercase {{ $accentClass }} mb-4 block">{{ $step['n'] }}</span>
                    <h3 class="font-sans font-semibold text-white text-base mb-2 leading-snug">{{ $en ? ($step['title_en']??$step['title_es']??'') : ($step['title_es']??'') }}</h3>
                    <p class="text-sm text-ink-mid leading-relaxed">{{ $en ? ($step['body_en']??$step['body_es']??'') : ($step['body_es']??'') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- OTROS CANALES --}}
<section class="bg-bone py-16 md:py-20">
    <div class="container-soma">
        <p class="font-mono text-[10px] tracking-[0.2em] uppercase text-copper mb-8 text-center">{{ $en ? 'Other channels' : 'Otros canales' }}</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($channels as $ch)
            @if($ch->id !== $channel->id)
            @php
                $chName = $ch->getTranslation('name', $en?'en':'es', false) ?: $ch->getTranslation('name','es',false);
                $chSlug = $ch->getTranslation('slug', $en?'en':'es', false) ?: $ch->getTranslation('slug','es',false);
                $chThumb = $ch->getFirstMediaUrl('thumbnail','thumb') ?: $ch->getFirstMediaUrl('thumbnail');
                $chRoute = $en ? route('en.channels.show', $chSlug) : route('channels.show', $chSlug);
            @endphp
            <a href="{{ $chRoute }}"
               class="group bg-white border border-line rounded-xl overflow-hidden hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                @if($chThumb)
                <div class="aspect-[3/2] overflow-hidden relative bg-bone-soft">
                    <img src="{{ $chThumb }}" alt="{{ $chName }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-500" width="300" height="200" loading="lazy">
                </div>
                @else
                <div class="aspect-[3/2] bg-bone-soft flex items-center justify-center">
                    <span class="font-mono text-[10px] text-mute uppercase">{{ $chName }}</span>
                </div>
                @endif
                <div class="p-4">
                    <p class="font-sans font-semibold text-sm text-ink group-hover:text-primary transition-colors">{{ $chName }}</p>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</section>

{{-- CTA FINAL --}}
<section class="bg-cream py-20">
    <div class="container-soma text-center">
        <h2 class="font-display font-bold text-3xl md:text-4xl text-ink leading-[1.0] tracking-[-0.03em] mb-4">
            {{ $en ? 'Ready to start?' : '¿Listo para empezar?' }}
        </h2>
        <p class="text-copper mb-10 max-w-lg mx-auto">
            {{ $en ? 'An executive will contact you in less than 48 business hours.' : 'Un ejecutivo te contactará en menos de 48 horas hábiles.' }}
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ $en ? route('en.quote') : route('quote') }}"
               class="inline-flex items-center gap-2.5 font-sans text-sm font-semibold bg-primary text-white px-8 py-4 rounded-xl hover:bg-bone transition-colors">
                {{ $en ? 'Request quote' : 'Solicitar cotización' }}
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ $wa }}" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 font-sans text-sm font-medium text-white hover:text-ink-mid border border-ink/20 hover:border-white/60 px-8 py-4 rounded-xl transition-all">
                <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                WhatsApp
            </a>
        </div>
    </div>
</section>

</x-layouts.app>
