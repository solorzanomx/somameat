<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class TechnicalSheet extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['title'];

    protected $fillable = [
        'product_id',
        'title',
        'file_path',
        'version',
        'valid_from',
        'valid_until',
        'is_public',
    ];

    protected function casts(): array
    {
        return [
            'valid_from'  => 'date',
            'valid_until' => 'date',
            'is_public'   => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
