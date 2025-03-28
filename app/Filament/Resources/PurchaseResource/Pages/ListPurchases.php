<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use App\Filament\Exports\PurchaseExporter;
use App\Filament\Resources\PurchaseResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ListRecords;



class ListPurchases extends ListRecords
{
    protected static string $resource = PurchaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()
                ->label('Export Purchases')
                ->exporter(PurchaseExporter::class)
                ->icon('heroicon-o-arrow-down-tray')
                ->formats([ExportFormat::Csv]),
        ];
    }
}
