@php $en = app()->getLocale() === 'en'; @endphp

@if($sent)
    <div class="flex flex-col items-center justify-center gap-5 py-10 text-center">
        <div class="w-14 h-14 rounded-full bg-verify-soft flex items-center justify-center">
            <svg class="w-7 h-7 text-verify" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
            </svg>
        </div>
        <div>
            <h3 class="font-display font-bold text-xl text-ink mb-1">
                {{ $en ? 'Message received!' : '¡Mensaje recibido!' }}
            </h3>
            <p class="text-sm text-mute leading-relaxed">
                {{ $en
                    ? 'An executive will contact you in less than 48 business hours.'
                    : 'Un ejecutivo te contactará en menos de 48 horas hábiles.' }}
            </p>
        </div>
    </div>
@else
    <form wire:submit="submit" novalidate class="space-y-4">

        {{-- Título --}}
        <div class="mb-6">
            <h3 class="font-display font-bold text-xl text-ink mb-1">
                {{ $en ? 'Send us a message' : 'Envíanos un mensaje' }}
            </h3>
            <p class="text-sm text-mute">
                {{ $en ? 'We respond in less than 48 business hours.' : 'Respondemos en menos de 48 horas hábiles.' }}
            </p>
        </div>

        {{-- Nombre + Email --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="hlf-name" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ $en ? 'Name' : 'Nombre' }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input id="hlf-name" wire:model="name" type="text" autocomplete="name"
                       placeholder="{{ $en ? 'Your full name' : 'Tu nombre completo' }}"
                       class="w-full rounded-xl border border-line-strong bg-bone px-4 py-3 text-sm text-ink placeholder-mute/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors @error('name') border-primary @enderror">
                @error('name')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="hlf-email" class="block text-sm font-semibold text-ink mb-1.5">
                    Email <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input id="hlf-email" wire:model="email" type="email" autocomplete="email"
                       placeholder="{{ $en ? 'you@company.com' : 'tu@empresa.com' }}"
                       class="w-full rounded-xl border border-line-strong bg-bone px-4 py-3 text-sm text-ink placeholder-mute/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors @error('email') border-primary @enderror">
                @error('email')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Teléfono --}}
        <div>
            <label for="hlf-phone" class="block text-sm font-semibold text-ink mb-1.5">
                {{ $en ? 'Phone' : 'Teléfono' }}
            </label>
            <input id="hlf-phone" wire:model="phone" type="tel" autocomplete="tel"
                   placeholder="+52 55 1234 5678"
                   class="w-full rounded-xl border border-line-strong bg-bone px-4 py-3 text-sm text-ink placeholder-mute/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors @error('phone') border-primary @enderror">
            @error('phone')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
        </div>

        {{-- Empresa --}}
        <div>
            <label for="hlf-company" class="block text-sm font-semibold text-ink mb-1.5">
                {{ $en ? 'Company' : 'Empresa' }} <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <input id="hlf-company" wire:model="company" type="text" autocomplete="organization"
                   placeholder="{{ $en ? 'Your company name' : 'Nombre de tu empresa' }}"
                   class="w-full rounded-xl border border-line-strong bg-bone px-4 py-3 text-sm text-ink placeholder-mute/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors @error('company') border-primary @enderror">
            @error('company')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
        </div>

        {{-- Mensaje --}}
        <div>
            <label for="hlf-message" class="block text-sm font-semibold text-ink mb-1.5">
                {{ $en ? 'Message' : 'Mensaje' }} <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <textarea id="hlf-message" wire:model="message" rows="4"
                      placeholder="{{ $en ? 'Write your message...' : 'Escribe tu mensaje...' }}"
                      class="w-full rounded-xl border border-line-strong bg-bone px-4 py-3 text-sm text-ink placeholder-mute/60 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors resize-none @error('message') border-primary @enderror"></textarea>
            @error('message')<p class="mt-1 text-xs text-primary">{{ $message }}</p>@enderror
        </div>

        {{-- Checkbox privacidad --}}
        <div class="flex items-start gap-3 pt-1">
            <input id="hlf-privacy" wire:model="privacy" type="checkbox"
                   class="mt-0.5 w-4 h-4 rounded border-line-strong text-primary focus:ring-primary/20 cursor-pointer shrink-0 @error('privacy') border-primary @enderror">
            <label for="hlf-privacy" class="text-sm text-mute leading-relaxed cursor-pointer">
                {{ $en ? 'I have read and accept the' : 'He leído y acepto el' }}
                <a href="{{ route('legal.privacy') }}" target="_blank"
                   class="text-primary hover:text-primary-dark underline underline-offset-2 transition-colors">
                    {{ $en ? 'Privacy Policy' : 'Aviso de Privacidad' }}
                </a>
            </label>
        </div>
        @error('privacy')
            <p class="text-xs text-primary -mt-2">{{ $en ? 'You must accept the privacy policy to continue.' : 'Debes aceptar el aviso de privacidad para continuar.' }}</p>
        @enderror

        {{-- Submit --}}
        <div class="pt-2">
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full inline-flex items-center justify-center gap-3 font-sans text-sm font-semibold bg-ink text-white px-6 py-4 rounded-xl hover:bg-ink-mid transition-colors disabled:opacity-60 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30">
                <span wire:loading.remove>{{ $en ? 'Send message' : 'Enviar mensaje' }}</span>
                <span wire:loading>{{ $en ? 'Sending...' : 'Enviando...' }}</span>
                <svg wire:loading.remove class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
                <svg wire:loading class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
            </button>
        </div>

    </form>
@endif
