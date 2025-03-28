<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Actions\ExportAction;


class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Content Management',
                'Payment System', // Our new group
                'User Management',
                'System Settings'
            ]);
        });


        ExportAction::configureUsing(fn (ExportAction $action) => $action->fileDisk('s3'));
    }
}
