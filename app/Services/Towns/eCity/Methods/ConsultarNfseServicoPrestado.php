<?php

namespace App\Services\Towns\eCity\Methods;

trait ConsultarNfseServicoPrestado
{

    private static string $operation;

    public static function ConsultarNfseServicoPrestado(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
