<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class CaseStudy extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['title', 'slug', 'summary', 'body'];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'body',
        'client_name',
        'channel',
        'metrics',
        'image',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'metrics'    => 'array',
            'is_active'  => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
