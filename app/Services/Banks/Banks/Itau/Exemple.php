<?php

namespace App\Services\Banks\Banks\Itau;

use App\Models\Bill;
use App\Services\Banks\DTO\BankConfig;
use App\Services\Banks\Factories\BankFactory;

class Exemple
{

    public function example(): void
    {

        $data = [
            'bankCode' => '341',
            'path_crt' => 'path/to/certificate.crt',
            'path_key' => 'path/to/private.key',
            'agencia' => '3841',
            'conta' => '123456',
            'conta_dv' => '7',
            'wallet' => '109',
        ];

        $config = new BankConfig($data);
        $bank = BankFactory::make(config: $config);
        $bank->makeOurNumber(
            data: Bill::find(id: 1)->toArray()
        );

        $bank->gerarBoleto(
            data: Bill::find(id: 1)->toArray()
        );

        dd($bank);
    }

}
