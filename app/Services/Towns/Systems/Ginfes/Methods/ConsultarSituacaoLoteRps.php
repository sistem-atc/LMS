<?php

namespace App\Services\Towns\Ginfes\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarSituacaoLoteRps
{

    private static string $operation;

    public static function ConsultarSituacaoLoteRps(array $data): string|int|array
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
