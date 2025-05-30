<?php

namespace App\Services\Towns\Systems\Fi1_Fiorilli\Methods;

use Illuminate\Support\Facades\Validator;

trait consultarLoteRps
{

    private static string $operation;

    public static function consultarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::connection();
    }

}
