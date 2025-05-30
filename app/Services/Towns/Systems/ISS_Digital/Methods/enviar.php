<?php

namespace App\Services\Towns\Systems\ISS_Digital\Methods;

use Illuminate\Support\Facades\Validator;

trait enviar
{
    private static string $operation;

    public static function enviar(array $data): string|int|array
    {

        $validator = Validator::make($data, [
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

}
