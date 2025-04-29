<?php

namespace App\Services\Towns\Dsf\Methods;

trait CancelarNfseV3
{

    private static string $operation;

    public static function CancelarNfseV3($data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
