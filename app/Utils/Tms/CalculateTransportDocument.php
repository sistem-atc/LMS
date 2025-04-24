<?php

namespace App\Utils\Tms;

use Illuminate\Support\Collection;

class CalculateTransportDocument
{

    public static function calculate(Collection $customerNotes): float
    {

        dd($customerNotes);

        /*
            $weightTotal = 0;
            $items = $get('document_fiscal_customer_id');

            foreach ($items as $key => $item) {
                $doc = DocumentFiscalCustomer::where('id', $item)->first();
                $subTotal = $doc['pesoB'];
                $weightTotal += $subTotal;
            }
            ;
            //Criar Regra para calcular de acordo com a tabela, ou em caso de ausencia na tabela frete cheio
            return $weightTotal * 0.3;
        */

        if ($customerNotes->first()['modFrete'] == 0) {
            $debitCustomer = $customerNotes->first()['sender_customer_id'];
        } else {
            $debitCustomer = $customerNotes->first()['sender_recipient_customer_idcustomer_id'];
        }

        $tableCustomer = $debitCustomer->freight_table_id;
        //Recuperar tabela de frete do cliente pagador
        $sumWeightB = $customerNotes->sum('pesoB');
        //Calcular peso total do lote
        $totalValue = $tableCustomer->routes() * $sumWeightB;
        //aplicar valor do peso sobre taxa frete peso X peso real

        return $totalValue;
    }

}
