<?php

namespace App\Modules\Tms\Lot\LotResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use App\Models\DocumentFiscalCustomer;
use Filament\Resources\Pages\EditRecord;
use App\Modules\Tms\Lot\LotResource;

class EditLot extends EditRecord
{
    protected static string $resource = LotResource::class;

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
        $data['document_fiscal_customer_id'] = DocumentFiscalCustomer::where('lot_id', '=', $this->record->id)->pluck('id')->toArray();
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {

        DocumentFiscalCustomer::where('lot_id', $this->record->id)
            ->update([
                'lot_id' => null,
            ]);

        foreach ($data['document_fiscal_customer_id'] as $id) {
            DocumentFiscalCustomer::where('id', $id)
                ->update([
                    'lot_id' => $this->record->id,
                ]);
        }

        $data = Arr::except($data, ['document_fiscal_customer_id']);

        return $data;
    }
}
