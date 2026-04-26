<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Quotes\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos del solicitante')
                    ->columns(2)
                    ->schema([
                        TextInput::make('number')
                            ->label('Número de cotización')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->default(fn () => 'COT-' . strtoupper(substr(uniqid(), -6))),

                        TextInput::make('name')
                            ->label('Nombre')
                            ->required(),

                        TextInput::make('email')
                            ->label('Correo')
                            ->email()
                            ->required(),

                        TextInput::make('company')
                            ->label('Empresa'),

                        Select::make('channel')
                            ->label('Canal')
                            ->options([
                                'food_service' => 'Food Service / HORECA',
                                'industry'     => 'Industria',
                                'export'       => 'Exportación',
                                'retail'       => 'Retail / Autoservicio',
                            ]),

                        Select::make('species')
                            ->label('Especie')
                            ->options([
                                'bovino'  => 'Bovino',
                                'porcino' => 'Porcino',
                                'pollo'   => 'Pollo / Ave',
                                'ovino'   => 'Ovino',
                                'pescado' => 'Pescado',
                                'mixto'   => 'Mixto / Varios',
                            ]),
                    ]),

                Section::make('Requerimiento')
                    ->schema([
                        Textarea::make('volume_notes')
                            ->label('Volumen y especificaciones')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('destination')
                            ->label('Destino / mercado')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Section::make('Gestión interna')
                    ->columns(2)
                    ->schema([
                        Select::make('lead_id')
                            ->label('Lead relacionado')
                            ->relationship('lead', 'name')
                            ->searchable(),

                        Select::make('client_id')
                            ->label('Cliente registrado')
                            ->relationship('client', 'company_name')
                            ->searchable(),

                        Select::make('status')
                            ->label('Estado')
                            ->required()
                            ->default('pending')
                            ->options([
                                'pending'   => 'Pendiente',
                                'reviewing' => 'En revisión',
                                'sent'      => 'Enviada',
                                'accepted'  => 'Aceptada',
                                'rejected'  => 'Rechazada',
                            ]),

                        Textarea::make('internal_notes')
                            ->label('Notas internas')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
