<?php

namespace App\Services\Towns\INfse\Methods;

use Illuminate\Support\Facades\Validator;

trait RecepcionarLoteRps
{

    private static string $operation;

    public static function RecepcionarLoteRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

}
