<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Quote;
use Livewire\Attributes\Validate;
use Livewire\Component;

class QuoteForm extends Component
{
    #[Validate('required|string|max:150')]
    public string $name = '';

    #[Validate('required|email|max:200')]
    public string $email = '';

    #[Validate('required|string|max:200')]
    public string $company = '';

    #[Validate('required|string|in:food_service,industry,export,retail,other')]
    public string $channel = '';

    #[Validate('required|string|in:beef,pork,lamb,goat,poultry,mixed')]
    public string $species = '';

    #[Validate('required|string|min:10|max:1000')]
    public string $volumeNotes = '';

    #[Validate('nullable|string|max:300')]
    public string $destination = '';

    public bool $sent = false;

    public function submit(): void
    {
        $this->validate();

        Quote::create([
            'name'         => $this->name,
            'email'        => $this->email,
            'company'      => $this->company,
            'channel'      => $this->channel,
            'species'      => $this->species,
            'volume_notes' => $this->volumeNotes,
            'destination'  => $this->destination ?: null,
            'status'       => 'pending',
        ]);

        $this->reset(['name', 'email', 'company', 'channel', 'species', 'volumeNotes', 'destination']);
        $this->sent = true;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.quote-form');
    }
}
