<?php

namespace App\Services\Towns\eSiat\Methods;

trait RecepcionarDeclaracaoAdministradoraCartao
{

    private static string $operation;

    public static function RecepcionarDeclaracaoAdministradoraCartao($data): string|int|array
    {
        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
