<?php

namespace App\Filament\Resources\Operational\Lot\LotResource\Pages;

use App\Models\Lot;
use App\Enums\LotEnum;
use Filament\Forms\Get;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;

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

    public static function totalValueNF(Get $get): int
    {
        $total = 0;
        $items = $get('document_fiscal_customer_id');

        foreach ($items as $key => $item) {
            $doc = DocumentFiscalCustomer::where('id', $item)->first();
            $subTotal = $doc['vNF'];
            $total += $subTotal;
        };

        return $total;
    }

    public static function freightValue(Get $get): int
    {
        $weightTotal = 0;
        $items = $get('document_fiscal_customer_id');

        foreach ($items as $key => $item) {
            $doc = DocumentFiscalCustomer::where('id', $item)->first();
            $subTotal = $doc['pesoB'];
            $weightTotal += $subTotal;
        };

        return $weightTotal * 0.3;
    }

    public static function weightTotal(Get $get): int
    {
        $weightTotal = 0;
        $items = $get('document_fiscal_customer_id');

        foreach ($items as $key => $item) {
            $doc = DocumentFiscalCustomer::where('id', $item)->first();
            $subTotal = $doc['pesoB'];
            $weightTotal += $subTotal;
        };

        return $weightTotal;
    }

    public static function qtdNF(Get $get): int
    {
        $qtd = 0;
        $items = $get('document_fiscal_customer_id');

        foreach ($items as $key => $item) {
            $qtd += 1;
        };

        return $qtd;
    }

    public static function optionsCheckBoxList(?Lot $record, string $operation): Collection
    {

        if ($operation == 'view') {
            if (! is_null($record)) {
                if ($record->exists) {
                    return DocumentFiscalCustomer::where('lot_id', '=', $record->id)
                        ->get()
                        ->mapWithKeys(fn($item): array => [$item->id => $item->nNF . ' ' . $item->emit_customer->company_name]);
                }
            }
        }

        if (! is_null($record)) {
            if ($record->exists) {
                return DocumentFiscalCustomer::where('lot_id', '=', $record->id)
                    ->orWhere('lot_id', null)
                    ->get()
                    ->mapWithKeys(fn($item): array => [$item->id => $item->nNF . ' ' . $item->emit_customer->company_name]);
            }
        }

        return DocumentFiscalCustomer::whereNull('lot_id')
            ->get()
            ->mapWithKeys(fn($item): array => [$item->id => $item->nNF . ' ' . $item->emit_customer->company_name]);
    }

    public static function defaultOptionsCheckBoxList(?Lot $record): ?Collection
    {
        if (! is_null($record)) {
            if ($record->exists) {
                return $record->documentFiscalCustomer->pluck('id')->toArray();
            }
        }

        return null;
    }
}
