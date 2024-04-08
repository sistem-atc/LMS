<?php

namespace App\Filament\Resources\Finance\ShippingCollection\ShippingCollectionResource\Pages;

use App\Filament\Resources\Finance\ShippingCollection\ShippingCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippingCollections extends ListRecords
{
    protected static string $resource = ShippingCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
