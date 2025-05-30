<?php

namespace App\Services\Towns\Systems\SystemPro;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class SystemPro extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRps($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelarNfse($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url . self::$endpoint, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }
}
