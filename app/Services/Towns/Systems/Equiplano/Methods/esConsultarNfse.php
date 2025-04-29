<?php

namespace App\Services\Towns\Equiplano\Methods;

trait esConsultarNfse
{

    public static function esConsultarNfse($data): string|int|array
    {

        $operation = __FUNCTION__;

        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

}
