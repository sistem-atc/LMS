<?php

namespace App\Services\Towns\Etransparencia;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Etransparencia extends LinkTownBase
{

    private static $Codigo_Usuario = 'a5a07214-136a-4254-bad1-0272dc48238018ah24ni0119grav000-ed10--5l';
    private static $Codigo_Contribuinte = '1d658984-9ea7-4cbb-8769-e50f53fdd1f250ah10ni0091grav104-ed28--1l';

    use Methods\CANCELARNOTAELETRONICA,
        Methods\CONSNFSERECEBIDAS,
        Methods\CONSULTANOTASPROTOCOLO,
        Methods\CONSULTAPROTOCOLO,
        Methods\IMPRESSAOLINKNFSE,
        Methods\PROCESSARPS,
        Methods\VERFICARPS;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota($data): string|int|array
    {
        return self::PROCESSARPS($data);
    }

    public function consultarNota($data): string|int|array
    {
        return self::CONSULTANOTASPROTOCOLO($data);
    }

    public function cancelarNota($data): string|int|array
    {
        return self::CANCELARNOTAELETRONICA($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

    }

}
