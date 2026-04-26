<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class PlantSection extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public array $translatable = ['eyebrow', 'title_line1', 'title_line2'];

    protected $fillable = ['eyebrow', 'title_line1', 'title_line2'];

    public static function singleton(): self
    {
        return self::firstOrCreate(['id' => 1], [
            'eyebrow'     => ['es' => 'Nuestras instalaciones', 'en' => 'Our facilities'],
            'title_line1' => ['es' => 'PLANTA TIF 422 · SAN JUAN TEOLOYUCAN', 'en' => 'TIF 422 PLANT · SAN JUAN TEOLOYUCAN'],
            'title_line2' => ['es' => 'ESTADO DE MÉXICO', 'en' => 'STATE OF MEXICO'],
        ]);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(800)->height(540)->nonQueued();
    }
}
