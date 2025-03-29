<?php

namespace App\Filament\Widgets;

use App\Models\Movie;
use App\Models\User;
use App\Models\Purchase;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SalesOverview extends BaseWidget
{
    protected static bool $isLazy = false;


    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::all()->count()),
            Stat::make('Total Revenue', Purchase::sum('amount'))
            ->description('USD'),
            Stat::make('Completed Purchases', Purchase::where('status', 'Completed')->count()),
            Stat::make('Pending Purchases', Purchase::where('status', 'Pending')->count()),
            Stat::make('Failed Purchases', Purchase::where('status', 'Failed')->count()),
            Stat::make('Refunded Purchases', Purchase::where('status', 'Refunded')->count()),
            Stat::make('Total Movie', Movie::all()->count()),
            Stat::make('Top Movie', Movie::withSum('purchases', 'amount')
                ->orderBy('purchases_sum_amount', 'desc')
                ->first()?->title ?? 'None'),
        ];
    }
}
