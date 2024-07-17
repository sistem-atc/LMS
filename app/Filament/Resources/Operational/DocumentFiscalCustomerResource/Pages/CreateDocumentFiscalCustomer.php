<?php

namespace App\Filament\Resources\Operational\DocumentFiscalCustomerResource\Pages;

use App\Filament\Resources\Operational\DocumentFiscalCustomerResource\DocumentFiscalCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDocumentFiscalCustomer extends CreateRecord
{
    protected static string $resource = DocumentFiscalCustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
