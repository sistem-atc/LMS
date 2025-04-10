<?php

namespace App\Actions\FilamentActions;

use App\Models\Bank;
use App\Models\Bill;
use App\Models\Customer;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use App\Services\Utils\Banks\Factory\BankFactory;

class SendBillAction extends Action
{

    public static function execute(?Model $data)
    {
        dd($data);

        $bank = data_get($data, 'bank_id');
        $customer = data_get($data, 'customer_id');

        $data = [
            'model' => Bank::find($bank)->first(),
            'customer' => Customer::find($customer)->first(),
            'billing' => $data,
        ];

        $bank = BankFactory::make(bankCode: $bank->codigo, constructorArgs: $data);

        Bill::update([
            'boleto_number' => $bank->makeOurNumber($data),
            'barcode' => $bank->makeBarCode($data),
        ]);

        $response = $bank->gerarBoleto($data);

        dd($response);

        //gravar as responses no banco de dados

    }

}
