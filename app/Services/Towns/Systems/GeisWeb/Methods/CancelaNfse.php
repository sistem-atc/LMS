<?php

namespace App\Services\Towns\GeisWeb\Methods;

use Illuminate\Support\Facades\Validator;

trait CancelaNfse
{

    private static string $operation;

    public static function CancelaNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroNfse = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
