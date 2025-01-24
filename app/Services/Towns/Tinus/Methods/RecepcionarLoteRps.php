<?php

namespace App\Services\Towns\Tinus\Methods;

use SimpleXMLElement;

trait RecepcionarLoteRps
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function RecepcionarLoteRps(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage);

        return self::connection();
    }

}
