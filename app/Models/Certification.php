<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Certification extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'description',
        'code',
        'issuer',
        'issued_at',
        'expires_at',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'issued_at'  => 'date',
            'expires_at' => 'date',
            'is_active'  => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }
}
