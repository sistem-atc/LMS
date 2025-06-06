<?php

namespace App\Services\Towns\Systems\Equiplano\Methods;

trait esRecepcionarLoteRps
{

    private static string $operation;

    public static function esRecepcionarLoteRps($data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
