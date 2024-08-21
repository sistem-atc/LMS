<?php

namespace App\Filament\Resources\Operational\Lot\LotResource\Pages;

use App\Models\Lot;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class SuportFunctions
{

    public static function generate(Model $record): Notification
    {

        dd($record, $record->documentFiscalCustomers());

        if ($record->status == 'Digitado') {

            //Criar um numero de CT-e e associar o lote a ele.

            $record->status = 'Calculado';
            $record->save();

            return Notification::make()
                ->success()
                ->title('Lote Calculado com sucesso')
                ->body('CT-e Criado');

        } else {
            return Notification::make()
                    ->danger()
                    ->title('Lote Não pode Ser Calculado')
                    ->body('Lote com status diferente de Digitado não pode ser calculado.');
        }

    }

}
