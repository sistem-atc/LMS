<?php

namespace App\Services\Towns\Systems\eCity\Methods;

trait ConsultarNfseServicoTomado
{

    private static string $operation;

    public static function ConsultarNfseServicoTomado(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
