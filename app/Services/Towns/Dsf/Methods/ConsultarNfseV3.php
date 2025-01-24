<?php

namespace App\Services\Towns\Dsf\Methods;

trait ConsultarNfseV3
{

    private static string $operation;

    public static function ConsultarNfseV3($data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->dataInicial = date("Ymd", strtotime($data['dataInicial']));
        $dataMsg->dataFinal = date("Ymd", strtotime($data['dataFinal']));
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
