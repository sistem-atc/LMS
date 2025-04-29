<?php

namespace App\Actions\FilamentActions;

use App\Models\Bank;
use App\Models\Bill;
use App\Models\Customer;
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

        $data = [
            'model' => Bank::find($bank)->first(),
            'customer' => Customer::find($customer)->first(),
            'billing' => $data,
        ];

        $bank = BankFactory::make($data);

        Bill::update([
            'boleto_number' => $bank->makeOurNumber($data),
            'barcode' => $bank->makeBarCode($data),
        ]);

        $response = $bank->gerarBoleto($data);

        dd($response);

        //gravar as responses no banco de dados

    }

}
