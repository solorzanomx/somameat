@if($sent)
    {{-- Estado de éxito --}}
    <div class="bg-evergreen/10 border border-evergreen/30 rounded-xl p-8 text-center">
        <div class="w-12 h-12 rounded-full bg-evergreen/20 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6 text-evergreen" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h3 class="font-display text-2xl text-ink mb-2">{{ __('contact.success_title') }}</h3>
        <p class="text-ink-soft">{{ __('contact.success_message') }}</p>
    </div>
@else
    <form wire:submit="submit" class="space-y-6" novalidate>

        {{-- Nombre + Email --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="cf-name" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('contact.form_name') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input
                    id="cf-name"
                    wire:model="name"
                    type="text"
                    autocomplete="name"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('name') border-primary @enderror"
                    placeholder="{{ __('contact.form_name') }}"
                    aria-describedby="{{ $errors->has('name') ? 'cf-name-error' : '' }}"
                >
                @error('name')
                    <p id="cf-name-error" class="mt-1.5 text-xs text-primary">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="cf-email" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('contact.form_email') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input
                    id="cf-email"
                    wire:model="email"
                    type="email"
                    autocomplete="email"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('email') border-primary @enderror"
                    placeholder="tu@empresa.com"
                    aria-describedby="{{ $errors->has('email') ? 'cf-email-error' : '' }}"
                >
                @error('email')
                    <p id="cf-email-error" class="mt-1.5 text-xs text-primary">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Teléfono + Empresa --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="cf-phone" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('contact.form_phone') }}
                </label>
                <input
                    id="cf-phone"
                    wire:model="phone"
                    type="tel"
                    autocomplete="tel"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('phone') border-primary @enderror"
                    placeholder="+52 55 0000 0000"
                >
                @error('phone')
                    <p class="mt-1.5 text-xs text-primary">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="cf-company" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('contact.form_company') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input
                    id="cf-company"
                    wire:model="company"
                    type="text"
                    autocomplete="organization"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('company') border-primary @enderror"
                    placeholder="{{ __('contact.form_company') }}"
                >
                @error('company')
                    <p class="mt-1.5 text-xs text-primary">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Canal --}}
        <div>
            <label for="cf-channel" class="block text-sm font-semibold text-ink mb-1.5">
                {{ __('contact.form_channel') }} <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <select
                id="cf-channel"
                wire:model="channel"
                class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('channel') border-primary @enderror"
                aria-describedby="{{ $errors->has('channel') ? 'cf-channel-error' : '' }}"
            >
                <option value="">— {{ __('contact.form_channel') }} —</option>
                <option value="food_service">{{ __('contact.channel_food_service') }}</option>
                <option value="industry">{{ __('contact.channel_industry') }}</option>
                <option value="export">{{ __('contact.channel_export') }}</option>
                <option value="retail">{{ __('contact.channel_retail') }}</option>
                <option value="other">{{ __('contact.channel_other') }}</option>
            </select>
            @error('channel')
                <p id="cf-channel-error" class="mt-1.5 text-xs text-primary">{{ $message }}</p>
            @enderror
        </div>

        {{-- Mensaje --}}
        <div>
            <label for="cf-message" class="block text-sm font-semibold text-ink mb-1.5">
                {{ __('contact.form_message') }} <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <textarea
                id="cf-message"
                wire:model="message"
                rows="5"
                class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition resize-none @error('message') border-primary @enderror"
                placeholder="{{ __('contact.form_message') }}..."
                aria-describedby="{{ $errors->has('message') ? 'cf-message-error' : '' }}"
            ></textarea>
            @error('message')
                <p id="cf-message-error" class="mt-1.5 text-xs text-primary">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="pt-2">
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="inline-flex items-center gap-2.5 px-7 py-4 text-base font-semibold rounded-lg bg-primary text-cream hover:bg-primary-dark transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 disabled:opacity-60"
            >
                <span wire:loading.remove>{{ __('contact.form_submit') }}</span>
                <span wire:loading>{{ __('contact.form_sending') }}</span>
                <svg wire:loading.remove class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
                <svg wire:loading class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
            </button>
        </div>

    </form>
@endif
