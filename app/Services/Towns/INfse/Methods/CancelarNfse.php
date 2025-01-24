<?php

namespace App\Services\Towns\INfse\Methods;

use Illuminate\Support\Facades\Validator;

trait CancelarNfse
{

    private static string $operation;

    public static function CancelarNfse(array $data): string|int|array
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
