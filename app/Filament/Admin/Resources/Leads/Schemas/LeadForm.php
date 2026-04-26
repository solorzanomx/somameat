<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Leads\Schemas;

use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos de contacto')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required(),

                        TextInput::make('email')
                            ->label('Correo')
                            ->email()
                            ->required(),

                        TextInput::make('phone')
                            ->label('Teléfono')
                            ->tel(),

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

                        Select::make('source')
                            ->label('Origen')
                            ->options([
                                'contact'   => 'Formulario de contacto',
                                'quote'     => 'Cotización',
                                'whatsapp'  => 'WhatsApp',
                                'referral'  => 'Referido',
                            ]),
                    ]),

                Section::make('Mensaje')
                    ->schema([
                        Textarea::make('message')
                            ->label('Mensaje')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Gestión')
                    ->columns(3)
                    ->schema([
                        Select::make('status')
                            ->label('Estado')
                            ->required()
                            ->default('new')
                            ->options([
                                'new'        => 'Nuevo',
                                'contacted'  => 'Contactado',
                                'qualified'  => 'Calificado',
                                'lost'       => 'Perdido',
                            ]),

                        Select::make('assigned_to')
                            ->label('Asignado a')
                            ->options(fn () => User::pluck('name', 'id'))
                            ->searchable(),

                        DateTimePicker::make('contacted_at')
                            ->label('Fecha de contacto')
                            ->displayFormat('d/m/Y H:i'),
                    ]),
            ]);
    }
}
