<?php

namespace App\Services\Towns\Systems\Thema\Methods;

trait RecepcionarLoteRpsDocumento
{
    private static string $operation;
    private static string $endpoint;

    public static function RecepcionarLoteRpsDocumento(array $data): string|int|array
    {

        self::$endpoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        // adicionar ao schema <ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}

