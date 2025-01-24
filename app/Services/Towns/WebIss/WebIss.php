<?php

namespace App\Services\Towns\WebIss;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class WebIss extends LinkTownBase
{

    use Methods\CancelarNfse,
        Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarNfseFaixa,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarNfseServicoPrestado,
        Methods\ConsultarNfseServicoTomado,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\GerarNfse,
        Methods\RecepcionarLoteRps,
        Methods\RecepcionarLoteRpsSincrono,
        Methods\SubstituirNfse;

    protected static $verb = HttpMethod::POST;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage(self::$operation);
        self::$mountMessage->registerXPathNamespace('soapenv', parent::getNamespace());

        if (self::getVersion() === null) {
            $cabecMsg = self::$mountMessage->xpath('//e:Nfsecabecmsg')[0];
            $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        } else {
            $cabecMsg = self::$mountMessage->xpath('//cabec')[0];
            $dadosMsg = self::$mountMessage->xpath('//msg')[0];
        }

        $dom = dom_import_simplexml($cabecMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection(self::composeHeader()->asXml()));
        $dom = dom_import_simplexml($dadosMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dataMsg->asXml()));

    }

}
