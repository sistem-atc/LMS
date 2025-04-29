<?php

namespace App\Services\Towns\Etransparencia\Methods;

trait CONSULTAPROTOCOLO
{

    private static string $operation;

    public static function CONSULTAPROTOCOLO($data): string|int|array
    {
        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->NumeroProtocolo = $data['numeroProtocolo'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
