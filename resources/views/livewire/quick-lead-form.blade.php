@php $en = app()->getLocale() === 'en'; @endphp

@if($sent)
<div class="flex items-center gap-4 py-4">
    <span class="w-10 h-10 rounded-full bg-verify/15 flex items-center justify-center shrink-0">
        <svg class="w-5 h-5 text-verify" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
    </span>
    <div>
        <p class="font-sans font-semibold text-ink">{{ $en ? 'Message received!' : '¡Mensaje recibido!' }}</p>
        <p class="text-sm text-mute">{{ $en ? 'We\'ll contact you in less than 48 business hours.' : 'Te contactamos en menos de 48 horas hábiles.' }}</p>
    </div>
</div>
@else
<form wire:submit="submit" novalidate class="space-y-4">

    {{-- Fila 1: Email + Empresa + Canal --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div>
            <label for="qlf-email" class="block text-xs font-semibold text-ink-mid mb-1.5 uppercase tracking-wide">
                Email <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <input id="qlf-email" wire:model="email" type="email" autocomplete="email"
                   placeholder="{{ $en ? 'you@company.com' : 'tu@empresa.com' }}"
                   class="w-full rounded-xl border border-line-strong bg-white px-4 py-3 text-sm text-ink placeholder-mute/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors @error('email') border-primary @enderror">
            @error('email')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="qlf-company" class="block text-xs font-semibold text-ink-mid mb-1.5 uppercase tracking-wide">
                {{ $en ? 'Company' : 'Empresa' }} <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <input id="qlf-company" wire:model="company" type="text" autocomplete="organization"
                   placeholder="{{ $en ? 'Your company' : 'Tu empresa' }}"
                   class="w-full rounded-xl border border-line-strong bg-white px-4 py-3 text-sm text-ink placeholder-mute/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors @error('company') border-primary @enderror">
            @error('company')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="qlf-channel" class="block text-xs font-semibold text-ink-mid mb-1.5 uppercase tracking-wide">
                {{ $en ? 'Your business type' : '¿Cómo describes tu negocio?' }} <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <select id="qlf-channel" wire:model="channel"
                    class="w-full rounded-xl border border-line-strong bg-white px-4 py-3 text-sm text-ink focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors @error('channel') border-primary @enderror">
                <option value="">{{ $en ? 'Choose one…' : 'Elige una opción…' }}</option>
                <option value="retail">{{ $en ? 'Supermarket / Retail chain' : 'Supermercado / Cadena de autoservicio' }}</option>
                <option value="horeca">{{ $en ? 'Restaurant, hotel or catering' : 'Restaurante, hotel o catering' }}</option>
                <option value="distribucion">{{ $en ? 'Distributor or wholesaler' : 'Distribuidor o mayorista' }}</option>
                <option value="marca_propia">{{ $en ? 'I want to launch my own brand' : 'Quiero lanzar mi propia marca' }}</option>
            </select>
            @error('channel')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
        </div>
    </div>

    {{-- Fila 2: Privacy + Botón --}}
    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
        <label class="flex items-center gap-2 cursor-pointer flex-1">
            <input wire:model="privacy" type="checkbox"
                   class="w-4 h-4 rounded border-line-strong text-primary focus:ring-primary/20 cursor-pointer shrink-0 @error('privacy') border-primary @enderror">
            <span class="text-xs text-mute leading-snug">
                {{ $en ? 'I accept the' : 'Acepto el' }}
                <a href="{{ route('legal.privacy') }}" target="_blank" class="text-primary hover:underline">{{ $en ? 'Privacy Policy' : 'aviso de privacidad' }}</a>
            </span>
        </label>
        @error('privacy')<p class="text-xs text-primary">{{ $en ? 'Required' : 'Requerido' }}</p>@enderror
        <button type="submit"
                wire:loading.attr="disabled"
                class="inline-flex items-center justify-center gap-2 font-sans text-sm font-semibold bg-ink text-white px-8 py-3 rounded-xl hover:bg-primary transition-colors disabled:opacity-60 whitespace-nowrap shrink-0">
            <span wire:loading.remove>{{ $en ? 'Get a quote →' : 'Quiero cotización →' }}</span>
            <span wire:loading class="text-xs">{{ $en ? 'Sending…' : 'Enviando…' }}</span>
        </button>
    </div>

</form>
@endif
