<?php

namespace App\Services\Towns\Systems\Ginfes_2\Methods;

trait ConsultarNfsePorRps
{

    private static string $operation;

    public static function ConsultarNfsePorRps(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dadosMsg = self::composeMessage(self::$operation);
        $dadosMsg->Cnpj = $data['cnpj'];
        $dadosMsg = self::Sign_XML($dadosMsg);
        self::mountMensage($dadosMsg);

        return self::connection();
    }

}
