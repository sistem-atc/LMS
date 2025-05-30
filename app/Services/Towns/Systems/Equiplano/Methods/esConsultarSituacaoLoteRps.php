<?php

namespace App\Services\Towns\Systems\Equiplano\Methods;

trait esConsultarSituacaoLoteRps
{

    private static string $operation;

    public static function esConsultarSituacaoLoteRps($data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
