<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Products\Tables;

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

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('species')
                    ->label('Especie')
                    ->badge()
                    ->color('info'),

                TextColumn::make('price')
                    ->label('Precio')
                    ->money('MXN')
                    ->sortable(),

                TextColumn::make('price_unit')
                    ->label('/ unidad')
                    ->toggleable(),

                TextColumn::make('cut_type')
                    ->label('Corte')
                    ->searchable()
                    ->toggleable(),

                IconColumn::make('is_featured')
                    ->label('Destacado')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Orden')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->filters([
                SelectFilter::make('species')
                    ->label('Especie')
                    ->options([
                        'bovino'  => 'Bovino',
                        'porcino' => 'Porcino',
                        'pollo'   => 'Pollo / Ave',
                        'ovino'   => 'Ovino',
                        'pescado' => 'Pescado',
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
