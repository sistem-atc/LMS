<?php

namespace App\Services\Towns\Systems\Thema\Methods;

trait RetornarDadosCadastrais
{
    private static string $operation;
    private static string $endpoint;

    public static function RetornarDadosCadastrais(array $data): string|int|array
    {

        self::$endpoint = "NFSEdadosCadastrais.NFSEdadosCadastraisHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpjCpf = $data['cnpj'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}

