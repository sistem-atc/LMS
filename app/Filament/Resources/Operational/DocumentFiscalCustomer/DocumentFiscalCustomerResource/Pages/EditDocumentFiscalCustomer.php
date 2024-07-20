<?php

namespace App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocumentFiscalCustomer extends EditRecord
{
    protected static string $resource = DocumentFiscalCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
