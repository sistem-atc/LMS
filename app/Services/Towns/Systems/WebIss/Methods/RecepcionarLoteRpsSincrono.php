<?php

namespace App\Services\Towns\Systems\WebIss\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait RecepcionarLoteRpsSincrono
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function RecepcionarLoteRpsSincrono(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

}
