<?php

namespace App\Filament\Resources\Finance\Billing\BillResource\Pages;

use App\Models\Cte;
use App\Filament\Resources\Finance\Billing\BillResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateBill extends CreateRecord
{
    protected static string $resource = BillResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    /*protected function mutateFormDataBeforeCreate(array $data): array
    {

        Bill::create($data);
        return $data;

    }*/

    protected function afterCreate(): void
    {
        $order = $this->record;

        Cte::wherein('debtor_customer_id', $order->cte_id)->update(['bill' => $order->id]);

        Notification::make()
            ->title('Fatura criada com sucesso')
            ->success()
            ->body("Numero da fatura $order->id.")
            ->persistent()
            ->send();


    }


}
