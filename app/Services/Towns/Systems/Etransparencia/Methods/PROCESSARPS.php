<?php

namespace App\Services\Towns\Systems\Etransparencia\Methods;

trait PROCESSARPS
{

    private static string $operation;

    public static function PROCESSARPS($data): string|int|array
    {
        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
