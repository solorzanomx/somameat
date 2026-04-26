<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Imagen')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('Foto del producto')
                            ->collection('image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['4:3', '1:1'])
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(4096)
                            ->helperText('JPG, PNG o WebP · Máx 4 MB · Recomendado 800×600 px'),
                    ]),

                Section::make('Identificación')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre (ES)')
                            ->required()
                            ->live(debounce: 400)
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('name', 'es', false)))
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state, ?string $old) {
                                $currentSlug = $get('slug');
                                if (blank($currentSlug) || $currentSlug === Str::slug($old ?? '')) {
                                    $set('slug', Str::slug($state ?? ''));
                                }
                            })
                            ->dehydrateStateUsing(fn (string|array $state, Get $get): array => [
                                'es' => is_array($state) ? ($state['es'] ?? '') : $state,
                                'en' => $get('name_en') ?: (is_array($state) ? ($state['en'] ?? $state['es'] ?? '') : $state),
                            ]),

                        TextInput::make('name_en')
                            ->label('Name (EN)')
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('name', 'en', false)))
                            ->dehydrated(false),

                        TextInput::make('slug')
                            ->label('Slug (ES)')
                            ->required()
                            ->unique(table: 'products', column: 'slug', ignoreRecord: true)
                            ->helperText('Se genera automáticamente. Modifica solo si necesitas un valor distinto.')
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('slug', 'es', false)))
                            ->dehydrateStateUsing(fn (string|array $state, Get $get): array => [
                                'es' => is_array($state) ? ($state['es'] ?? '') : $state,
                                'en' => $get('slug_en') ?: (is_array($state) ? ($state['en'] ?? $state['es'] ?? '') : $state),
                            ]),

                        TextInput::make('slug_en')
                            ->label('Slug (EN)')
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('slug', 'en', false)))
                            ->dehydrated(false),

                        TextInput::make('sku')
                            ->label('SKU')
                            ->unique(ignoreRecord: true)
                            ->maxLength(50),

                        Select::make('species')
                            ->label('Especie')
                            ->required()
                            ->options([
                                'bovino'  => 'Bovino',
                                'porcino' => 'Porcino',
                                'pollo'   => 'Pollo / Ave',
                                'ovino'   => 'Ovino',
                                'caprino' => 'Caprino',
                                'pescado' => 'Pescado',
                            ]),
                    ]),

                Section::make('Descripción')
                    ->columns(1)
                    ->schema([
                        TextInput::make('description')
                            ->label('Descripción (ES)')
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('description', 'es', false)))
                            ->dehydrateStateUsing(fn (string|array|null $state, Get $get): array => [
                                'es' => is_array($state) ? ($state['es'] ?? '') : ($state ?? ''),
                                'en' => $get('description_en') ?: (is_array($state) ? ($state['en'] ?? $state['es'] ?? '') : ($state ?? '')),
                            ]),

                        TextInput::make('description_en')
                            ->label('Description (EN)')
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('description', 'en', false)))
                            ->dehydrated(false),
                    ]),

                Section::make('Precio y características')
                    ->columns(3)
                    ->schema([
                        TextInput::make('price')
                            ->label('Precio (MXN)')
                            ->numeric()
                            ->minValue(0)
                            ->step(0.01)
                            ->placeholder('185.00')
                            ->suffix('/ unidad')
                            ->dehydrateStateUsing(fn ($state): ?string => filled($state) ? (string)(float) $state : null),

                        Select::make('price_unit')
                            ->label('Unidad de precio')
                            ->options([
                                'kg'   => 'por kg',
                                'pza'  => 'por pieza',
                                'caja' => 'por caja',
                                'lt'   => 'por litro',
                            ])
                            ->default('kg'),

                        TextInput::make('cut_type')
                            ->label('Tipo de corte'),

                        TextInput::make('packaging')
                            ->label('Empaque'),

                        TextInput::make('unit')
                            ->label('Unidad de venta')
                            ->default('kg'),

                        TextInput::make('min_order')
                            ->label('Pedido mínimo')
                            ->numeric()
                            ->suffix('kg'),

                        TextInput::make('sort_order')
                            ->label('Orden en listado')
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make('Visibilidad')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),

                        Toggle::make('is_featured')
                            ->label('Destacado · aparece en home')
                            ->helperText('Los productos destacados aparecen en el catálogo de la página de inicio.')
                            ->default(false),
                    ]),
            ]);
    }
}
