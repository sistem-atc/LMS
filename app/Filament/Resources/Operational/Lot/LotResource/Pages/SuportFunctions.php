<?php

namespace App\Filament\Resources\Operational\Lot\LotResource\Pages;

use App\Enums\LotEnum;
use App\Models\DocumentFiscalCustomer;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class SuportFunctions
{
    public static function generate(Model $record): Notification
    {

        $allDocuments = DocumentFiscalCustomer::where('lot_id', $record->id)->get();

        dd($record, $allDocuments);

        if ($record->status == LotEnum::DIGITAÇÃO) {

            //Criar um numero de CT-e e associar o lote a ele.

            $record->status = LotEnum::CALCULADO;
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

    public static function reverse(Model $record): Notification
    {
        dd($record);

        return Notification::make()
            ->danger()
            ->title('Lote Estornado com sucesso')
            ->body('Lote estornado e notas disponivel para vinculo.');
    }
}
