<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Products\Pages;

use App\Filament\Admin\Resources\Products\ProductResource;
use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        $showPrices = Setting::get('show_catalog_prices', false);

        return [
            Action::make('toggle_prices')
                ->label($showPrices ? 'Ocultar precios en home' : 'Mostrar precios en home')
                ->icon($showPrices ? Heroicon::OutlinedEyeSlash : Heroicon::OutlinedEye)
                ->color($showPrices ? 'warning' : 'success')
                ->action(function () use ($showPrices) {
                    Setting::updateOrCreate(
                        ['key' => 'show_catalog_prices'],
                        ['group' => 'catalog', 'value' => $showPrices ? '0' : '1', 'type' => 'boolean']
                    );
                    Notification::make()
                        ->title($showPrices ? 'Precios ocultos en el catálogo público' : 'Precios visibles en el catálogo público')
                        ->success()
                        ->send();
                }),

            CreateAction::make(),
        ];
    }
}
