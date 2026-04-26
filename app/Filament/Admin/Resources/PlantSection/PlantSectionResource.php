<?php
declare(strict_types=1);
namespace App\Filament\Admin\Resources\PlantSection;

use App\Filament\Admin\Resources\PlantSection\Pages\EditPlantSection;
use App\Models\PlantSection as PlantSectionModel;
use BackedEnum;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlantSectionResource extends Resource
{
    protected static ?string $model = PlantSectionModel::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;
    protected static string|\UnitEnum|null $navigationGroup = 'Contenido';
    protected static ?string $navigationLabel = 'Sección Instalaciones';
    protected static ?string $modelLabel = 'Sección instalaciones';
    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Textos')->columns(2)->schema([
                TextInput::make('eyebrow')
                    ->label('Eyebrow (ES)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('eyebrow', 'es', false)))
                    ->dehydrateStateUsing(fn (string|array|null $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : ($state ?? ''),
                        'en' => $get('eyebrow_en') ?: (is_array($state) ? ($state['es'] ?? '') : ($state ?? '')),
                    ]),
                TextInput::make('eyebrow_en')->label('Eyebrow (EN)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('eyebrow', 'en', false)))
                    ->dehydrated(false),

                TextInput::make('title_line1')
                    ->label('Título línea 1 (ES)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('title_line1', 'es', false)))
                    ->dehydrateStateUsing(fn (string|array|null $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : ($state ?? ''),
                        'en' => $get('title_line1_en') ?: (is_array($state) ? ($state['es'] ?? '') : ($state ?? '')),
                    ]),
                TextInput::make('title_line1_en')->label('Title line 1 (EN)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('title_line1', 'en', false)))
                    ->dehydrated(false),

                TextInput::make('title_line2')
                    ->label('Título línea 2 — acento rojo (ES)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('title_line2', 'es', false)))
                    ->dehydrateStateUsing(fn (string|array|null $state, Get $get): array => [
                        'es' => is_array($state) ? ($state['es'] ?? '') : ($state ?? ''),
                        'en' => $get('title_line2_en') ?: (is_array($state) ? ($state['es'] ?? '') : ($state ?? '')),
                    ]),
                TextInput::make('title_line2_en')->label('Title line 2 accent (EN)')
                    ->afterStateHydrated(fn ($component, $record) => $component->state($record?->getTranslation('title_line2', 'en', false)))
                    ->dehydrated(false),
            ]),

            Section::make('Fotos de la planta (máx 3)')
                ->description('Sube hasta 3 fotos. Se muestran en grilla de 3 columnas en el home.')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('gallery')
                        ->label('')->collection('gallery')
                        ->multiple()->reorderable()->maxFiles(3)
                        ->image()->imageEditor()
                        ->acceptedFileTypes(['image/jpeg','image/png','image/webp'])
                        ->maxSize(6144)
                        ->helperText('800×540 px recomendado · JPG, PNG o WebP · Máx 6 MB c/u'),
                ]),
        ]);
    }

    public static function table(Table $table): Table { return $table; }

    public static function getPages(): array
    {
        return ['index' => EditPlantSection::route('/')];
    }

    public static function canCreate(): bool { return false; }
}
