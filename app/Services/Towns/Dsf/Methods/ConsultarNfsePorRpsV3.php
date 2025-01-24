<?php

namespace App\Services\Towns\Dsf\Methods;

trait ConsultarNfsePorRpsV3
{

    private static string $operation;

    public static function ConsultarNfsePorRpsV3($data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->numeroRps = $data['numeroRps'];
        $dataMsg->serieRps = $data['serieRps'];
        $dataMsg->tipoRps = $data['tipoRps'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
