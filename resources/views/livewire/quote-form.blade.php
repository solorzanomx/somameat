@if($sent)
    <div class="bg-evergreen/10 border border-evergreen/30 rounded-xl p-8 text-center">
        <div class="w-12 h-12 rounded-full bg-evergreen/20 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6 text-evergreen" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h3 class="font-display text-2xl text-ink mb-2">{{ __('quote.success_title') }}</h3>
        <p class="text-ink-soft">{{ __('quote.success_message') }}</p>
    </div>
@else
    <form wire:submit="submit" class="space-y-6" novalidate>

        {{-- Nombre + Email --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="qf-name" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('quote.form_name') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input
                    id="qf-name"
                    wire:model="name"
                    type="text"
                    autocomplete="name"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('name') border-primary @enderror"
                >
                @error('name') <p class="mt-1.5 text-xs text-primary">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="qf-email" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('quote.form_email') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input
                    id="qf-email"
                    wire:model="email"
                    type="email"
                    autocomplete="email"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('email') border-primary @enderror"
                >
                @error('email') <p class="mt-1.5 text-xs text-primary">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Empresa + Canal --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="qf-company" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('quote.form_company') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <input
                    id="qf-company"
                    wire:model="company"
                    type="text"
                    autocomplete="organization"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('company') border-primary @enderror"
                >
                @error('company') <p class="mt-1.5 text-xs text-primary">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="qf-channel" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('quote.form_channel') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <select
                    id="qf-channel"
                    wire:model="channel"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('channel') border-primary @enderror"
                >
                    <option value="">— {{ __('quote.form_channel') }} —</option>
                    <option value="food_service">{{ __('quote.channel_food_service') }}</option>
                    <option value="industry">{{ __('quote.channel_industry') }}</option>
                    <option value="export">{{ __('quote.channel_export') }}</option>
                    <option value="retail">{{ __('quote.channel_retail') }}</option>
                    <option value="other">{{ __('quote.channel_other') }}</option>
                </select>
                @error('channel') <p class="mt-1.5 text-xs text-primary">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Especie + Destino --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="qf-species" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('quote.form_species') }} <span class="text-primary" aria-hidden="true">*</span>
                </label>
                <select
                    id="qf-species"
                    wire:model="species"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('species') border-primary @enderror"
                >
                    <option value="">— {{ __('quote.form_species') }} —</option>
                    <option value="beef">{{ __('quote.species_beef') }}</option>
                    <option value="pork">{{ __('quote.species_pork') }}</option>
                    <option value="lamb">{{ __('quote.species_lamb') }}</option>
                    <option value="goat">{{ __('quote.species_goat') }}</option>
                    <option value="poultry">{{ __('quote.species_poultry') }}</option>
                    <option value="mixed">{{ __('quote.species_mixed') }}</option>
                </select>
                @error('species') <p class="mt-1.5 text-xs text-primary">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="qf-destination" class="block text-sm font-semibold text-ink mb-1.5">
                    {{ __('quote.form_destination') }}
                </label>
                <input
                    id="qf-destination"
                    wire:model="destination"
                    type="text"
                    class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition @error('destination') border-primary @enderror"
                    placeholder="{{ app()->getLocale() === 'en' ? 'USA, Canada, Mexico...' : 'EE.UU., Canadá, México...' }}"
                >
                @error('destination') <p class="mt-1.5 text-xs text-primary">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Volumen --}}
        <div>
            <label for="qf-volume" class="block text-sm font-semibold text-ink mb-1.5">
                {{ __('quote.form_volume') }} <span class="text-primary" aria-hidden="true">*</span>
            </label>
            <textarea
                id="qf-volume"
                wire:model="volumeNotes"
                rows="4"
                class="w-full rounded-lg border border-line bg-white px-4 py-3 text-ink placeholder-ink-soft/50 text-sm focus:outline-none focus:ring-2 focus:ring-primary/25 focus:border-primary transition resize-none @error('volumeNotes') border-primary @enderror"
                placeholder="{{ __('quote.form_volume_hint') }}"
            ></textarea>
            @error('volumeNotes') <p class="mt-1.5 text-xs text-primary">{{ $message }}</p> @enderror
        </div>

        {{-- Submit --}}
        <div class="pt-2">
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="inline-flex items-center gap-2.5 px-7 py-4 text-base font-semibold rounded-lg bg-copper text-cream hover:bg-copper/90 transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-copper/30 disabled:opacity-60"
            >
                <span wire:loading.remove>{{ __('quote.form_submit') }}</span>
                <span wire:loading>{{ __('quote.form_sending') }}</span>
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
