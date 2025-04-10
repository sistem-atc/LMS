<?php

namespace App\Modules\Finance\Billing\BillResource\Pages;

use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuportFunctions
{

    public static function BillingCSV(array $data)
    {

        $filePath = $data['attachment'];
        $idcustomer = $data['customer_id'];
        $emissiondate = $data['emission_date'];
        $duedate = $data['due_date'];

        $file = fopen(Storage::path($filePath), 'r');
        $header = fgetcsv($file);

        //Recuperar os dados do customer
        //validar os ctes's para ver se são todos do cliente recuperado e se estão pendentes de faturamento
        // autorizados, não cancelados e não excluidos (verificar mais regras)
        //gravar no banco da dados a fatura e no banco de ctes o numero do titulo
        //retornar o numero da fatura


        while ($row = fgetcsv($file)) {
            //$ctes[] = array_combine($header, $row);
        }

        fclose($file);

        unlink(Storage::path($filePath));

        return '';
    }

    public static function BillingSemiAutomatic(array $data)
    {
        dd($data);
    }

    public static function CalculateDuoDate($state, $get): string
    {
        $payment = Customer::find($state)->first();
        $currentDate = Carbon::createFromFormat('Y-m-d', $get('emission_date'));
        $newDate = $currentDate->addDay((int) $payment->payment_term->term);

        //Fazer a regra de calculo da data de vencimento correta

        /**
         *"id" => 1
         *"name" => "Vencimento as Segundas"
         *"type_freight" => "["CIF","FOB"]"
         *"weekday" => "["Segunda-feira"]"
         *"especific_date" => "[]"
         *"term" => "7"
         *"created_at" => "2024-04-20 13:15:49"
         *"updated_at" => "2024-04-20 13:15:49"
         *"deleted_at" => null
         *
         * GET
         *+data: array:23 [▼
         *"customer_id" => "1"
         *"emission_date" => "2024-05-08"
         *"due_date" => null
         *"historic" => null
         *"situation_id" => null
         *"cte_id" => []
         *"nature_id" => null
         *"bank_id" => null
         *"total_value" => "0,00"
         *"discount_value" => "0,00"
         *"liquid_value" => "0,00"
         *"irrf_base" => "0,00"
         *"irrf_tax" => null
         *"irrf_value" => "0,00"
         *"iss_base" => "0,00"
         *"iss_tax" => null
         *"iss_value" => "0,00"
         *"fine" => "0,00"
         *"interests" => "0,00"
         *"boleto_number" => null
         *"barr_code" => null
         *"writeoff_date" => null
         *"receiving_type_id" => null
         */

        return date('d-m-Y', strtotime($newDate));
    }

    public static function SelectDocumentsBilling(string $customer): ?Collection
    {
        return
            DB::table('transport_documents')
                ->join('branches', 'transport_documents.branch_id', '=', 'branches.id')
                ->select(
                    DB::raw("concat('Origem: ', branches.abbreviation, ' | ', 'Numero do CT-e: ', transport_documents.id,
                            ' | ', 'Serie: ', transport_documents.serie, ' | ', 'Valor Total: ', format(transport_documents.total_value, 2, 'de_DE')) as id,
                            transport_documents.id as cte")
                )
                ->where('transport_documents.debtor_customer_id', '=', $customer)
                ->where('transport_documents.doct_blocked', '=', '0')
                ->where('transport_documents.bill', '=', '')
                ->get()
                ->pluck('id', 'cte');
    }

}
