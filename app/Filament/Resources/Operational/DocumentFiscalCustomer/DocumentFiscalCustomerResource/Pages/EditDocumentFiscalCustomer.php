<?php

namespace App\Filament\Resources\Operational\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use Filament\Actions;
use App\Models\CodeUf;
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

    protected function mutateFormDataBeforeFill(array $data): array
    {

        $data['xml'] = file_get_contents($data['xml']->getRealPath());
        $data['cUF_id'] = CodeUf::where('code_uf', '=', substr($data['cUF_id'], 0, 2))->pluck('federation_unit')->first();

        return $data;
    }
}
