<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Leads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company')
                    ->label('Empresa')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Correo')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('channel')
                    ->label('Canal')
                    ->badge()
                    ->color('info'),

                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new'       => 'danger',
                        'contacted' => 'warning',
                        'qualified' => 'success',
                        'lost'      => 'gray',
                        default     => 'gray',
                    }),

                TextColumn::make('assignedUser.name')
                    ->label('Asignado')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Recibido')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'new'       => 'Nuevo',
                        'contacted' => 'Contactado',
                        'qualified' => 'Calificado',
                        'lost'      => 'Perdido',
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
