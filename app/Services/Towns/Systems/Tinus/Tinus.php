<?php

namespace App\Services\Towns\Tinus;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Tinus extends LinkTownBase
{

    use Methods\CancelarNfse,
        Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\RecepcionarLoteRps;

    protected static $verb = HttpMethod::POST;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8',
            'SOAPAction' => 'http://www.tinus.com.br/WSNFSE.' . self::$operation . '.' . self::$operation . ''
        ];
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
        return self::CancelarNfse($data);
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

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage(self::$operation);

        $dadosMsg = self::$mountMessage->xpath('tin:Arg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
