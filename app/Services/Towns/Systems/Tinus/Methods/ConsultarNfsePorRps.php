<?php

namespace App\Services\Towns\Systems\Tinus\Methods;

use SimpleXMLElement;

trait ConsultarNfsePorRps
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function ConsultarNfsePorRps(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage->asXML());

        return self::connection();
    }

}
