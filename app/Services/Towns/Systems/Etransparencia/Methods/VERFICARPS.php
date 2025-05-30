<?php

namespace App\Services\Towns\Systems\Etransparencia\Methods;

trait VERFICARPS
{

    private static string $operation;

    public static function VERFICARPS($data): string|int|array
    {
        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
