<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Lead;
use Livewire\Attributes\Validate;
use Livewire\Component;

class QuickLeadForm extends Component
{
    #[Validate('required|email|max:200')]
    public string $email = '';

    #[Validate('required|string|max:150')]
    public string $company = '';

    #[Validate('required|in:retail,horeca,distribucion,marca_propia')]
    public string $channel = '';

    #[Validate('accepted')]
    public bool $privacy = false;

    public bool $sent = false;

    public function submit(): void
    {
        $this->validate();

        Lead::create([
            'email'   => $this->email,
            'company' => $this->company,
            'channel' => $this->channel,
            'source'  => 'home_sectors_quick',
            'status'  => 'new',
        ]);

        $this->reset(['email', 'company', 'channel', 'privacy']);
        $this->sent = true;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.quick-lead-form');
    }
}
