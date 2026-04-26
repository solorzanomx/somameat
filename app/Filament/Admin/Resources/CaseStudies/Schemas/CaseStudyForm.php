<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CaseStudies\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class CaseStudyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contenido')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Título (ES)')
                            ->required()
                            ->columnSpan(1)
                            ->dehydrateStateUsing(fn (string $state, Get $get): array => [
                                'es' => $state,
                                'en' => $get('title_en') ?: $state,
                            ]),

                        TextInput::make('title_en')
                            ->label('Title (EN)')
                            ->columnSpan(1)
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('title', 'en', false)))
                            ->dehydrated(false),

                        TextInput::make('slug')
                            ->label('Slug (ES)')
                            ->required()
                            ->dehydrateStateUsing(fn (string $state, Get $get): array => [
                                'es' => $state,
                                'en' => $get('slug_en') ?: $state,
                            ]),

                        TextInput::make('slug_en')
                            ->label('Slug (EN)')
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('slug', 'en', false)))
                            ->dehydrated(false),

                        Textarea::make('summary')
                            ->label('Resumen (ES)')
                            ->rows(3)
                            ->columnSpanFull()
                            ->dehydrateStateUsing(fn (?string $state, Get $get): array => [
                                'es' => $state ?? '',
                                'en' => $get('summary_en') ?: ($state ?? ''),
                            ]),

                        Textarea::make('summary_en')
                            ->label('Summary (EN)')
                            ->rows(3)
                            ->columnSpanFull()
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('summary', 'en', false)))
                            ->dehydrated(false),
                    ]),

                Section::make('Datos del cliente')
                    ->columns(2)
                    ->schema([
                        TextInput::make('client_name')
                            ->label('Nombre del cliente'),

                        Select::make('channel')
                            ->label('Canal')
                            ->options([
                                'food_service' => 'Food Service / HORECA',
                                'industry'     => 'Industria',
                                'export'       => 'Exportación',
                                'retail'       => 'Retail / Autoservicio',
                            ]),
                    ]),

                Section::make('Configuración')
                    ->columns(2)
                    ->schema([
                        TextInput::make('sort_order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ]),
            ]);
    }
}
