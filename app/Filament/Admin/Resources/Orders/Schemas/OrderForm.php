<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Orders\Schemas;

use App\Models\Client;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Pedido')
                    ->columns(2)
                    ->schema([
                        TextInput::make('number')
                            ->label('Número de pedido')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->default(fn () => 'PED-' . strtoupper(substr(uniqid(), -6))),

                        Select::make('client_id')
                            ->label('Cliente')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->required(),

                        Select::make('status')
                            ->label('Estado')
                            ->required()
                            ->default('draft')
                            ->options([
                                'draft'      => 'Borrador',
                                'confirmed'  => 'Confirmado',
                                'processing' => 'En proceso',
                                'shipped'    => 'Enviado',
                                'delivered'  => 'Entregado',
                                'cancelled'  => 'Cancelado',
                            ]),

                        DatePicker::make('requested_delivery_at')
                            ->label('Entrega solicitada')
                            ->displayFormat('d/m/Y'),

                        DateTimePicker::make('confirmed_at')
                            ->label('Confirmado en')
                            ->displayFormat('d/m/Y H:i'),
                    ]),

                Section::make('Notas')
                    ->schema([
                        Textarea::make('notes')
                            ->label('Notas')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
