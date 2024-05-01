<?php

namespace App\Filament\Resources\Finance\Billing\BillResource\Pages;

use App\Models\Customer;
use Illuminate\Support\Facades\Date;
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

    public static function CalculateDuoDate($state): Date
    {
        $payment = Customer::find($state);
        dd($payment->payment_term);

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
         */
    }

}
