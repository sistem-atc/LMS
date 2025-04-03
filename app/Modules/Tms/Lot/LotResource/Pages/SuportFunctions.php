<?php

namespace App\Modules\Tms\Lot\LotResource\Pages;

use Carbon\Carbon;
use App\Models\Lot;
use App\Enums\LotEnum;
use Filament\Forms\Get;
use Illuminate\Support\Collection;
use App\Models\DocumentFiscalCustomer;
use App\Models\TransportDocument;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class SuportFunctions
{
    public static function generate(Model $record): Notification
    {
        $allDocuments = DocumentFiscalCustomer::where('lot_id', $record->id)->get();

        if ($record->status == LotEnum::DIGITAÇÃO->getLabel()) {

            //Validar o tipo de documento a ser criado
            // Intermunicipal RPS-t
            // Intramunicipal CT-e

            $dataCte = static::calculateCTe($allDocuments);
            dd($dataCte);
            //Validar como parametrizar todos os campos incluindo os devidos calculos

            $cteNumber = TransportDocument::create([
                'branch_id' => $record['branche_id'],
                'serie' => 904, //Definir modo para parametrizar a serie por filial ou por modo de emissão
                'emission_date' => Carbon::now(),
                'weight' => $allDocuments->sum('pesoB'),
                'weight_m3' => $allDocuments->sum('pesoB'),
                'weight_charged' => $allDocuments->sum('pesoB'),
                'm3' => $allDocuments->sum('pesoB'),
                'shipping_value',
                'tax_amount',
                'total_value',
                'type_transportation',
                'lot' => $record->id,
                'origin_branche_id' => $record['branche_id'],
                'recipient_branche_id' => $record['branche_id'],
                'calculation_branche_id' => $record['branche_id'],
                'debit_branche_id' => $record['branche_id'],
                'shipping_table',
                'shipping_table_order',
                'shipping_type',
                'insurance',
                'insurance_contract',
                'delivery_time',
                'doct_blocked' => false,
                'sender_customer_id' => $allDocuments->first()['sender_customer_id'],
                'recipient_customer_id' => $allDocuments->first()['recipient_customer_id'],
                'debtor_customer_id' => $allDocuments->first()['sender_customer_id'], //Se modFrete = 0 então sender, contratio recipient
                'customer_calculation_id' => $allDocuments->first()['sender_customer_id'],
                'delivery_route_id',
                'delivery_date',
                'cte_key',
                'cost_center_id',
            ]);

            $record->status = LotEnum::CALCULADO;
            $record->save();

            return Notification::make()
                ->success()
                ->title('Lote Calculado com sucesso')
                ->body('CT-e Criado ' . $cteNumber);
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
        //Criar Regra para calcular de acordo com a tabela, ou em caso de ausencia na tabela frete cheio
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

    private static function calculateCTe(Collection $allDocuments): ?Collection
    {
        return $allDocuments;
    }
}
