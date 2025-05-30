<?php

namespace App\Services\Towns\Systems\Betha;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
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

    private SimpleXMLElement $headMsg;

    public function __construct(TownConfig $config)
    {
        parent::__construct(config: $config);
        $this->headMsg = $this->composeHeader(headerVersion: $config->headerVersion);
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->GerarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->ConsultarNfsePorRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return $this->CancelarNfse($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return $this->SubstituirNfse($data);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version): void
    {

        $this->mountMessage = $this->assembleMessage(replaceOperation: $operation, version: $version);

        $this->mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');
        $this->mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $cabecMsg = $this->mountMessage->xpath('//e:Nfsecabecmsg')[0];
        $dom = dom_import_simplexml($cabecMsg);
        $fragment = dom_import_simplexml($this->headMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

        $dadosMsg = $this->mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

    }

    public function parseXmlToArray(string $xmlString, string $xpath, string $namespace = ''): array
    {

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xmlString);

        if ($xml === false) {
            $errors = libxml_get_errors();
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->message;
            }
            libxml_clear_errors();
            throw new Exception("Erro ao carregar o XML: " . implode(", ", $errorMessages));
        }

        $namespaces = $xml->getNamespaces(true);
        if (isset($namespaces[$namespace])) {
            $xml->registerXPathNamespace('ns', $namespaces[$namespace]);
        }

        $outputXml = $xml->xpath($xpath);

        if (isset($outputXml[0])) {
            $nestedXml = simplexml_load_string($outputXml[0]);
            return json_decode(json_encode($nestedXml), true);
        }

        return [];
    }

}
