<?php

namespace App\Services\Towns\Systems\eSiat\Methods;

trait RecepcionarLoteRps
{

    private static string $operation;

    public static function RecepcionarLoteRps($data): string|int|array
    {
        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
