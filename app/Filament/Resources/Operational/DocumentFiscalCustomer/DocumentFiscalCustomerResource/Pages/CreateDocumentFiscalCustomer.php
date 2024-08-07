<?php

namespace App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDocumentFiscalCustomer extends CreateRecord
{
    protected static string $resource = DocumentFiscalCustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
