<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Lead;
use Livewire\Attributes\Validate;
use Livewire\Component;

class HomeLeadForm extends Component
{
    #[Validate('required|string|max:150')]
    public string $name = '';

    #[Validate('required|email|max:200')]
    public string $email = '';

    #[Validate('nullable|string|max:30')]
    public string $phone = '';

    #[Validate('required|string|max:150')]
    public string $company = '';

    #[Validate('required|string|min:5|max:1000')]
    public string $message = '';

    #[Validate('accepted')]
    public bool $privacy = false;

    public bool $sent = false;

    public function submit(): void
    {
        $this->validate();

        Lead::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone ?: null,
            'company' => $this->company,
            'channel' => 'other',
            'source'  => 'home_cta',
            'message' => $this->message,
            'status'  => 'new',
        ]);

        $this->reset(['name', 'email', 'phone', 'company', 'message', 'privacy']);
        $this->sent = true;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.home-lead-form');
    }
}
