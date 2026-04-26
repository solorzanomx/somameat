<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Clients\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Empresa')
                    ->columns(2)
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Razón social')
                            ->required(),

                        TextInput::make('rfc')
                            ->label('RFC')
                            ->maxLength(20),

                        TextInput::make('contact_name')
                            ->label('Contacto principal')
                            ->required(),

                        TextInput::make('email')
                            ->label('Correo')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('phone')
                            ->label('Teléfono')
                            ->tel(),

                        Select::make('channel')
                            ->label('Canal')
                            ->required()
                            ->default('food_service')
                            ->options([
                                'food_service' => 'Food Service / HORECA',
                                'industry'     => 'Industria',
                                'export'       => 'Exportación',
                                'retail'       => 'Retail / Autoservicio',
                            ]),

                        Select::make('country')
                            ->label('País')
                            ->required()
                            ->default('MX')
                            ->options([
                                'MX' => 'México',
                                'US' => 'Estados Unidos',
                                'CA' => 'Canadá',
                                'JP' => 'Japón',
                                'OTHER' => 'Otro',
                            ]),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ]),

                Section::make('Notas internas')
                    ->schema([
                        Textarea::make('notes')
                            ->label('Notas')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
