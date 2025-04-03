<?php

namespace App\Modules\Register\PaymentTerm\PaymentTermResource\Pages;

use App\Actions\FilamentActions\FavoriteResourceAction;
use App\Modules\Register\PaymentTerm\PaymentTermResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentTerms extends ListRecords
{
    protected static string $resource = PaymentTermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            FavoriteResourceAction::make()->className(static::$resource),
        ];
    }
}
