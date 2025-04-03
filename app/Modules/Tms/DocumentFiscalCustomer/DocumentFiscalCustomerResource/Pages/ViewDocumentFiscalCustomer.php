<?php

namespace App\Modules\Tms\DocumentFiscalCustomer\DocumentFiscalCustomerResource\Pages;

use App\Models\CodeUf;
use Filament\Resources\Pages\ViewRecord;
use App\Modules\Tms\DocumentFiscalCustomer\DocumentFiscalCustomerResource;

class ViewDocumentFiscalCustomer extends ViewRecord
{
    protected static string $resource = DocumentFiscalCustomerResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {

        $data['cUF_id'] = CodeUf::where('code_uf', '=', substr($data['cUF_id'], 0, 2))->pluck('federation_unit')->first();

        return $data;
    }
}
