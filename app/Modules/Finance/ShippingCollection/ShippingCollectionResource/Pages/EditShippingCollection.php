<?php

namespace App\Modules\Finance\ShippingCollection\ShippingCollectionResource\Pages;

use App\Modules\Finance\ShippingCollection\ShippingCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShippingCollection extends EditRecord
{
    protected static string $resource = ShippingCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
