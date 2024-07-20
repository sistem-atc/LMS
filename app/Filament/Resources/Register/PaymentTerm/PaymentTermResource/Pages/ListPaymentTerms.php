<?php

namespace App\Filament\Resources\Register\PaymentTerm\PaymentTermResource\Pages;

use App\Filament\Resources\Register\PaymentTerm\PaymentTermResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentTerms extends ListRecords
{
    protected static string $resource = PaymentTermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
