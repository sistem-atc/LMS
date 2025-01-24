<?php

namespace App\Services\Towns\Dsf\Methods;

trait ConsultarSituacaoLoteRPS
{

    private static string $operation;

    public static function ConsultarSituacaoLoteRPS($data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
