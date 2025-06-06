<?php

namespace App\Utils\Tms;

use App\Models\Customer;
use Illuminate\Support\Collection;

class CalculateTransportDocument
{

    private Collection $tableCustomer;

    public function calculate(Collection $customerNotes): float
    {

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

        $this->tableCustomer = Customer::find($debitCustomer->freight_table_id);
        $sumWeightB = $customerNotes->sum('pesoB');
        $totalValue = $this->tableCustomer->routes() * $sumWeightB;

        return $totalValue;
    }

}
