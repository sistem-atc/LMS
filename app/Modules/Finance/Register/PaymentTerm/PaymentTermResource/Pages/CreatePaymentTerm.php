<?php

namespace App\Modules\Finance\Register\PaymentTerm\PaymentTermResource\Pages;

use App\Modules\Finance\Register\PaymentTerm\PaymentTermResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentTerm extends CreateRecord
{
    protected static string $resource = PaymentTermResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
