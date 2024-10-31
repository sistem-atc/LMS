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

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['xml'] = file_get_contents($data['xml']->getRealPath());

        return $data;
    }
}
