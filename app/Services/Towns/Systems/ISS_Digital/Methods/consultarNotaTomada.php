<?php

namespace App\Services\Towns\Systems\ISS_Digital\Methods;

use Illuminate\Support\Facades\Validator;

trait consultarNotaTomada
{
    private static string $operation;

    public static function consultarNotaTomada(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'used_companny' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

}
