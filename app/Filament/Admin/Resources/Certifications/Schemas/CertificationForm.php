<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre (ES)')
                            ->required()
                            ->dehydrateStateUsing(fn (string $state, Get $get): array => [
                                'es' => $state,
                                'en' => $get('name_en') ?: $state,
                            ]),

                        TextInput::make('name_en')
                            ->label('Name (EN)')
                            ->afterStateHydrated(fn ($component, $record) =>
                                $component->state($record?->getTranslation('name', 'en', false)))
                            ->dehydrated(false),

                        TextInput::make('code')
                            ->label('Código')
                            ->placeholder('TIF 422'),

                        TextInput::make('issuer')
                            ->label('Organismo emisor')
                            ->placeholder('SAGARPA / SENASICA'),
                    ]),

                Section::make('Vigencia')
                    ->columns(3)
                    ->schema([
                        DatePicker::make('issued_at')
                            ->label('Fecha de emisión')
                            ->displayFormat('d/m/Y'),

                        DatePicker::make('expires_at')
                            ->label('Fecha de vencimiento')
                            ->displayFormat('d/m/Y'),

                        Toggle::make('is_active')
                            ->label('Vigente')
                            ->default(true),
                    ]),
            ]);
    }
}
