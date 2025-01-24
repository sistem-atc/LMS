<?php

namespace App\Services\Towns\Etransparencia\Methods;

trait IMPRESSAOLINKNFSE
{

    private static string $operation;

    public static function IMPRESSAOLINKNFSE($data): string|int|array
    {
        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->NumeroNota = $data['numeroNota'];
        $dataMsg->DataInicio = $data['dataInicio'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
