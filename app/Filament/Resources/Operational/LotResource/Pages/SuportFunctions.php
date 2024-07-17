<?php

namespace App\Filament\Resources\Operational\LotResource\Pages;

use App\Models\Lot;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class SuportFunctions
{

    public static function generate(Model $record): Notification
    {

        if ($record->status == 'Digitado') {

            $docs = DocumentFiscalCustomer::where('lot_id','=', $record->id)->get();

            //Loop para agrupar notas
            //Popular CT-e com os dados necessarios

            $lot = new Lot;
            $lot->status = 'Calculado';
            $lot->save();

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
