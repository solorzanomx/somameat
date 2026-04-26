<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Lead;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{
    #[Validate('required|string|max:150')]
    public string $name = '';

    #[Validate('required|email|max:200')]
    public string $email = '';

    #[Validate('nullable|string|max:30')]
    public string $phone = '';

    #[Validate('required|string|max:200')]
    public string $company = '';

    #[Validate('required|string|in:food_service,industry,export,retail,other')]
    public string $channel = '';

    #[Validate('required|string|min:10|max:2000')]
    public string $message = '';

    public bool $sent = false;

    public function submit(): void
    {
        $this->validate();

        Lead::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone ?: null,
            'company' => $this->company,
            'channel' => $this->channel,
            'source'  => 'contact_form',
            'message' => $this->message,
            'status'  => 'new',
        ]);

        $this->reset(['name', 'email', 'phone', 'company', 'channel', 'message']);
        $this->sent = true;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.contact-form');
    }
}
