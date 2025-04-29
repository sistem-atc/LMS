<?php

namespace App\Services\Towns\Thema\Methods;

trait RecepcionarLoteRps
{
    private static string $operation;
    private static string $endpoint;

    public static function RecepcionarLoteRps(array $data): string|int|array
    {

        self::$endpoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }
}
