<?php

namespace App\Modules\Finance\Billing\BillResource\Pages;

use App\Actions\FilamentActions\SendBillAction;
use App\Models\TransportDocument;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Modules\Finance\Billing\BillResource;

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

        //Validar se o cliente gera boleto
        SendBillAction::execute($order);

        Notification::make()
            ->title('Fatura criada com sucesso')
            ->success()
            ->body("Numero da fatura $order->id.")
            ->persistent()
            ->send();
    }
}
