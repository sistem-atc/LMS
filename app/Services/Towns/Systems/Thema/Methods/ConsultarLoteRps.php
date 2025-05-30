<?php

namespace App\Services\Towns\Systems\Thema\Methods;

trait ConsultarLoteRps
{

    private static string $operation;
    private static string $endpoint;

    public static function ConsultarLoteRps(array $data): string|int|array
    {

        self::$endpoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
