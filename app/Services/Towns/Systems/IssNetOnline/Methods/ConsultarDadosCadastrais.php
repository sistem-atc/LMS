<?php

namespace App\Services\Towns\Systems\IssNetOnline\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarDadosCadastrais
{

    private static string $operation;

    public static function ConsultarDadosCadastrais(array $data): string|int|array
    {

        $validator = Validator::make($data, [
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        self::mountMensage($dataMsg);

        return self::connection();
    }
}
