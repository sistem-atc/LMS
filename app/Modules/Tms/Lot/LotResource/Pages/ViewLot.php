<?php

namespace App\Modules\Tms\Lot\LotResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Modules\Tms\Lot\LotResource;
use App\Models\DocumentFiscalCustomer;

class ViewLot extends ViewRecord
{
    protected static string $resource = LotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['document_fiscal_customer_id'] = DocumentFiscalCustomer::where('lot_id', $data['id'])->get()->pluck('id')->toArray();
        return $data;
    }
}
