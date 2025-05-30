<?php

namespace App\Services\Towns\Systems\GeisWeb\Methods;

use Illuminate\Support\Facades\Validator;

trait EnviaLoteRps
{

    private static string $operation;

    public static function EnviaLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroLote' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroLote = $data['numeroLote'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
