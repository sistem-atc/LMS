<?php

namespace App\Services\Towns\Systems\Thema\Methods;

trait ConsultarNfse
{
    private static string $operation;
    private static string $endpoint;

    public static function ConsultarNfse(array $data): string|int|array
    {

        self::$endpoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/";
        self::$operation = __FUNCTION__;

        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricao_municipal'];
        $dataMsg->DataInicial = $data['data_inicial'];
        $dataMsg->DataFinal = $data['data_final'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}

