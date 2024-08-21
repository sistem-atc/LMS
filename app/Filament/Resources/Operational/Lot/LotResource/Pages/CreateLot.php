<?php

namespace App\Filament\Resources\Operational\Lot\LotResource\Pages;

use Illuminate\Support\Arr;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Operational\Lot\LotResource;
use App\Models\DocumentFiscalCustomer;

class CreateLot extends CreateRecord
{
    protected static string $resource = LotResource::class;
    private $documentsFiscalCustomer;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->documentsFiscalCustomer = $data['document_fiscal_customer_id'];
        $data = Arr::except($data, ['document_fiscal_customer_id']);
        return $data;
    }

    protected function afterCreate(): void
    {
        $lotId = $this->record->id;

        foreach($this->documentsFiscalCustomer as $id)
        {
            DocumentFiscalCustomer::where('id', $id)
                ->update([
                    'lot_id' => $lotId,
                ]);
        }
    }
}
