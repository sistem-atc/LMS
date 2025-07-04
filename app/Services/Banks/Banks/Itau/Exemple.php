<?php

namespace App\Services\Banks\Banks\Itau;

use App\Models\Bill;
use App\Services\Banks\DTO\BankConfig;
use App\Services\Banks\Factories\BankFactory;
use App\Services\Banks\Banks\Itau\TokenResolver\ItauTokenResolver;

class Exemple
{

    public function example(): void
    {

        $data = [
            'tokenResolver' => ItauTokenResolver::class,
            'bankCode' => '341',
            'path_crt' => storage_path() . '/app/01_341.crt',
            'path_key' => storage_path() . '/app/01_341.key',
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
