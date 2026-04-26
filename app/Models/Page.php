<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['title', 'slug', 'meta_description', 'content'];

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'content',
        'template',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }
}
