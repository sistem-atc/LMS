<?php

namespace App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource;

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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['create_user_id'] = auth()->id();
        return $data;
    }
}
