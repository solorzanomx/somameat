<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Channel extends Model implements HasMedia
{
    use HasTranslations, SoftDeletes, InteractsWithMedia;

    public array $translatable = ['name', 'slug', 'tagline', 'description', 'long_description'];

    protected $fillable = [
        'name', 'slug', 'tagline', 'description', 'long_description',
        'features', 'home_bullets', 'proof_points', 'pain_points', 'process_steps',
        'color', 'sort_order', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'features'      => 'array',
            'home_bullets'  => 'array',
            'proof_points'  => 'array',
            'pain_points'   => 'array',
            'process_steps' => 'array',
            'is_active'     => 'boolean',
            'sort_order'    => 'integer',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero')->singleFile()->useDisk('public');
        $this->addMediaCollection('thumbnail')->singleFile()->useDisk('public');
        $this->addMediaCollection('gallery')->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(600)->height(400)->nonQueued();
        $this->addMediaConversion('hero')->width(1440)->height(700)->nonQueued();
    }
}
