<?php
declare(strict_types=1);
namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Imagen')->schema([
                SpatieMediaLibraryFileUpload::make('image')
                    ->label('Foto del servicio')->collection('image')->image()->imageEditor()
                    ->acceptedFileTypes(['image/jpeg','image/png','image/webp'])->maxSize(4096)
                    ->helperText('480×320 px recomendado · JPG, PNG o WebP · Máx 4 MB'),
            ]),

            Section::make('Identificación')->columns(2)->schema([
                TextInput::make('name')->label('Nombre (ES)')->required()->live(debounce: 400)
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('name', 'es', false)))
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state, ?string $old) {
                        $cur = $get('slug');
                        if (blank($cur) || $cur === Str::slug($old ?? '')) {
                            $set('slug', Str::slug($state ?? ''));
                        }
                    })
                    ->dehydrateStateUsing(fn (string|array $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : $state,
                        'en' => $get('name_en') ?: (is_array($state) ? ($state['es'] ?? '') : $state),
                    ]),
                TextInput::make('name_en')->label('Name (EN)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('name', 'en', false)))
                    ->dehydrated(false),

                TextInput::make('slug')->label('Slug (ES)')->required()
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('slug', 'es', false)))
                    ->helperText('Se genera automáticamente.')
                    ->dehydrateStateUsing(fn (string|array $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : $state,
                        'en' => $get('slug_en') ?: (is_array($state) ? ($state['es'] ?? '') : $state),
                    ]),
                TextInput::make('slug_en')->label('Slug (EN)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('slug', 'en', false)))
                    ->dehydrated(false),

                TextInput::make('category')->label('Categoría (ES)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('category', 'es', false)))
                    ->dehydrateStateUsing(fn (string|array|null $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : ($state ?? ''),
                        'en' => $get('category_en') ?: (is_array($state) ? ($state['es'] ?? '') : ($state ?? '')),
                    ]),
                TextInput::make('category_en')->label('Category (EN)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('category', 'en', false)))
                    ->dehydrated(false),
            ]),

            Section::make('Descripción')->schema([
                Textarea::make('description')->label('Descripción corta (ES)')->rows(3)->required()
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('description', 'es', false)))
                    ->dehydrateStateUsing(fn (string|array|null $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : ($state ?? ''),
                        'en' => $get('description_en') ?: (is_array($state) ? ($state['es'] ?? '') : ($state ?? '')),
                    ]),
                Textarea::make('description_en')->label('Description (EN)')->rows(3)
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('description', 'en', false)))
                    ->dehydrated(false),
                Textarea::make('long_description')->label('Descripción larga (ES)')->rows(5)
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('long_description', 'es', false)))
                    ->dehydrateStateUsing(fn (string|array|null $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : ($state ?? ''),
                        'en' => $get('long_description_en') ?: (is_array($state) ? ($state['es'] ?? '') : ($state ?? '')),
                    ]),
                Textarea::make('long_description_en')->label('Long description (EN)')->rows(5)
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('long_description', 'en', false)))
                    ->dehydrated(false),
            ]),

            Section::make('Proof points (estadísticas)')
                ->description('Activa los que quieres mostrar en el home.')
                ->schema([
                    Repeater::make('proof_points')->label('')->addActionLabel('+ Añadir stat')
                        ->schema([
                            Toggle::make('active')->label('Mostrar en home')->default(true)->inline(false),
                            TextInput::make('value')->label('Valor')->required(),
                            TextInput::make('label_es')->label('Etiqueta ES')->required(),
                            TextInput::make('label_en')->label('Label EN'),
                        ])->columns(4)->defaultItems(0),
                ]),

            Section::make('Visibilidad')->columns(2)->schema([
                Toggle::make('is_active')->label('Activo')->default(true),
                Toggle::make('is_featured')
                    ->label('Destacado en home')
                    ->helperText('Muestra este servicio con fondo oscuro (tarjeta destacada).')
                    ->default(false),
                TextInput::make('sort_order')->label('Orden en listado')->numeric()->default(0),
            ]),
        ]);
    }
}
