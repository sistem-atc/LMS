<?php

namespace App\Services\Towns\Dsf;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Dsf extends LinkTownBase
{

    use Methods\CancelarNfse,
        Methods\CancelarNfseV3,
        Methods\RecepcionarLoteRps,
        Methods\RecepcionarLoteRpsV3,
        Methods\ConsultarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarNfsePorRpsV3,
        Methods\ConsultarNfseV3,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\ConsultarSituacaoLoteRpsV3,
        Methods\RecepcionarLoteRps,
        Methods\RecepcionarLoteRpsV3;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=utf-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRpsV3($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfsePorRpsV3($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg, string $operation): void
    {
        self::$mountMessage = parent::assembleMessage($operation);

        if (self::getVersion() === null) {

            $dadosMsg = self::$mountMessage->xpath('//nfse:'. $operation)[0];

        } else {

            $cabecMsg = self::composeHeader();
            $headMsg = self::$mountMessage->xpath('//arg0')[0];
            $dadosMsg = self::$mountMessage->xpath('//arg1')[0];
            $dom = dom_import_simplexml($cabecMsg);
            $fragment = dom_import_simplexml($headMsg);
            $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

        }

        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
