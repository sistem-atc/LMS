<?php

namespace App\Services\Towns\Systems\eCity;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
use App\Services\Towns\Template\TownTemplate;

class eCity extends TownTemplate
{

    use Methods\CancelarNfse,
        Methods\ConsultarLoteRps,
        Methods\ConsultarNfseFaixa,
        Methods\ConsultarNfseRps,
        Methods\ConsultarNfseServicoPrestado,
        Methods\ConsultarNfseServicoTomado,
        Methods\GerarNfse,
        Methods\RecepcionarLoteRpsSincrono,
        Methods\SubstituirNfse;

    public function __construct(TownConfig $config)
    {
        parent::__construct(config: $config);
    }

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/soap+xml;charset=UTF-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->GerarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->ConsultarNfseRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return $this->CancelarNfse($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return $this->SubstituirNfse($data);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version = null): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage($operation);

        if (self::getVersion() === null) {

            $dadosMsg = self::$mountMessage->xpath('//nfse:' . $operation)[0];

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
