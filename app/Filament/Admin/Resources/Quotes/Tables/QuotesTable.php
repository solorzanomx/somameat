<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Quotes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class QuotesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('number')
                    ->label('Número')
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),

                TextColumn::make('company')
                    ->label('Empresa')
                    ->searchable(),

                TextColumn::make('channel')
                    ->label('Canal')
                    ->badge()
                    ->color('info'),

                TextColumn::make('species')
                    ->label('Especie')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending'   => 'gray',
                        'reviewing' => 'warning',
                        'sent'      => 'info',
                        'accepted'  => 'success',
                        'rejected'  => 'danger',
                        default     => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Recibida')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'pending'   => 'Pendiente',
                        'reviewing' => 'En revisión',
                        'sent'      => 'Enviada',
                        'accepted'  => 'Aceptada',
                        'rejected'  => 'Rechazada',
                    ]),
                SelectFilter::make('channel')
                    ->label('Canal')
                    ->options([
                        'food_service' => 'Food Service',
                        'industry'     => 'Industria',
                        'export'       => 'Exportación',
                        'retail'       => 'Retail',
                    ]),
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
