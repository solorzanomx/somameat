<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\Client;
use App\Models\Lead;
use App\Models\Order;
use App\Models\Quote;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Leads nuevos', Lead::where('status', 'new')->count())
                ->description('Sin atender')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('danger'),

            Stat::make('Cotizaciones pendientes', Quote::where('status', 'pending')->count())
                ->description('Esperando revisión')
                ->descriptionIcon('heroicon-m-document-currency-dollar')
                ->color('warning'),

            Stat::make('Pedidos activos', Order::whereIn('status', ['confirmed', 'processing', 'shipped'])->count())
                ->description('En proceso')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('info'),

            Stat::make('Clientes activos', Client::where('is_active', true)->count())
                ->description('Total registrados')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('success'),
        ];
    }
}
