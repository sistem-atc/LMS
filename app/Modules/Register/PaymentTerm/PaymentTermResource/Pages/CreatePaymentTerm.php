<?php

namespace App\Modules\Register\PaymentTerm\PaymentTermResource\Pages;

use App\Modules\Register\PaymentTerm\PaymentTermResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentTerm extends CreateRecord
{
    protected static string $resource = PaymentTermResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
