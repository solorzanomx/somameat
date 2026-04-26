<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Clients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company_name')
                    ->label('Empresa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('contact_name')
                    ->label('Contacto')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Correo')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('channel')
                    ->label('Canal')
                    ->badge()
                    ->color('info'),

                TextColumn::make('country')
                    ->label('País')
                    ->badge()
                    ->color('gray'),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Alta')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
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
