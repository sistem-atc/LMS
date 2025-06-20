<?php

namespace App\Actions\FilamentActions;

use App\Models\Bank;
use App\Models\Bill;
use App\Models\Customer;
use App\Services\Banks\DTO\BankConfig;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use App\Services\Banks\Factories\BankFactory;

class SendBillAction extends Action
{

    public static function execute(?Model $data): never
    {
        dd($data);

        $bank = data_get($data, 'bank_id');
        $customer = data_get($data, 'customer_id');
        $dataBank = Bank::find($bank)->first();

        $config = new BankConfig([
            'bankCode' => $dataBank->bank_code,
            'path_crt' => $dataBank->path_crt,
            'path_key' => $dataBank->path_key,
            'agencia' => $dataBank->agencia,
            'conta' => $dataBank->conta,
            'conta_dv' => $dataBank->conta_dv,
            'wallet' => $dataBank->wallet,
        ]);

        $bank = BankFactory::make(config: $config);

        Bill::update(attributes: [
            'boleto_number' => $bank->makeOurNumber(data: $data->toArray()),
            'barcode' => $bank->makeBarCode(data: $data->toArray()),
        ]);

        $response = $bank->gerarBoleto(data: $data->toArray());

        dd($response);

        //gravar as responses no banco de dados

    }

}
