<?php

namespace App\Filament\Resources\Finance\Billing\BillResource\Pages;

use App\Actions\SendBill;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Finance\Billing\BillResource;
use App\Models\TransportDocument;

class CreateBill extends CreateRecord
{
    protected static string $resource = BillResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $order = $this->record;
        TransportDocument::wherein('debtor_customer_id', $order->cte_id)->update(['bill' => $order->id]);
        SendBill::execute($order);
        Notification::make()
            ->title('Fatura criada com sucesso')
            ->success()
            ->body("Numero da fatura $order->id.")
            ->persistent()
            ->send();

    }


}
