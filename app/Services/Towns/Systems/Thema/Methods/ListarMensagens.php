<?php

namespace App\Services\Towns\Systems\Thema\Methods;

trait ListarMensagens
{
    private static string $operation;
    private static string $endpoint;

    public static function ListarMensagens(array $data): string|int|array
    {

        self::$endpoint = "NFSEmensagens.NFSEmensagensHttpSoap11Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}

