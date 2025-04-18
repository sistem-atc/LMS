<?php

namespace App\Modules\Finance\ShippingCollection\ShippingCollectionResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Finance\ShippingCollection\ShippingCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippingCollections extends ListRecords
{
    protected static string $resource = ShippingCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
