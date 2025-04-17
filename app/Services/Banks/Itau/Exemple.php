<?php

namespace App\Services\Banks\Itau;

use App\Models\Bank;
use App\Models\Bill;
use App\Models\Customer;
use App\Factories\BankFactory;

class Exemple
{

    private function example(): void
    {
        $data = [
            'model' => Bank::find(1)->first(),
            'customer' => Customer::find(1)->first(),
            'billing' => Bill::find(1)->first(),
        ];
        $bank = BankFactory::make($data);
        $response = $bank->consultarBoleto(
            [
                'boleto_number' => '12345678901234567890123456789012345678901234',
            ]
        );
        dd($response);
    }

}
