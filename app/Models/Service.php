<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements HasMedia
{
    use HasTranslations, SoftDeletes, InteractsWithMedia;

    public array $translatable = ['name', 'slug', 'category', 'description', 'long_description'];

    protected $fillable = [
        'name', 'slug', 'category', 'description', 'long_description',
        'icon', 'proof_points', 'is_active', 'is_featured', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'proof_points' => 'array',
            'is_active'    => 'boolean',
            'is_featured'  => 'boolean',
            'sort_order'   => 'integer',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile()->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(480)->height(320)->nonQueued();
        $this->addMediaConversion('card')->width(800)->height(533)->nonQueued();
    }
}
