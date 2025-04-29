<?php

namespace App\Services\Towns\Equiplano\Methods;

trait esConsultarLoteRps
{

    private static string $operation;

    public static function esConsultarLoteRps($data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, self::$operation);

        return self::connection();
    }

}
