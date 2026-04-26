<?php
declare(strict_types=1);
namespace App\Filament\Admin\Resources\Channels\Tables;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChannelsTable {
    public static function configure(Table $table): Table {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')->collection('thumbnail')->label('Imagen')->circular(false)->width(60)->height(40),
                TextColumn::make('name')->label('Canal')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->searchable()->toggleable(),
                IconColumn::make('is_active')->label('Activo')->boolean(),
                TextColumn::make('sort_order')->label('Orden')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->recordActions([EditAction::make()]);
    }
}
