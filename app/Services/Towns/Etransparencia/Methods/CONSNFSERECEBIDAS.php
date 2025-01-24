<?php

namespace App\Services\Towns\Etransparencia\Methods;

trait CONSNFSERECEBIDAS
{

    private static string $operation;

    public static function CONSNFSERECEBIDAS($data): string|int|array
    {
        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
