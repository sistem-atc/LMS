<?php

namespace App\Services\Towns\Betha;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Towns\Template\TownTemplate;

class Betha extends TownTemplate
{

    use Methods\CancelarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarNfseServicoPrestado,
        Methods\ConsultarNfseServicoTomado,
        Methods\GerarNfse,
        Methods\RecepcionarLoteRps,
        Methods\RecepcionarLoteRpsSincrono,
        Methods\SubstituirNfse;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;
    protected static $headers;

    public function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfsePorRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return self::SubstituirNfse($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
        self::$headMsg = self::composeHeader();
    }

    private function connection(): string|int|array|null
    {
        return self::Conection(
            null,
            parent::$url,
            self::$mountMessage->asXML(),
            $this->getHeaders(),
            self::$verb
        );
    }

    private static function mountMensage(SimpleXMLElement $headMsg, SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage();

        self::$mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');
        self::$mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $cabecMsg = self::$mountMessage->xpath('//e:Nfsecabecmsg')[0];
        $dom = dom_import_simplexml($cabecMsg);
        $fragment = dom_import_simplexml($headMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

    }

}
