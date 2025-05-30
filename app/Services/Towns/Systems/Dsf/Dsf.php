<?php

namespace App\Services\Towns\Systems\Dsf;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
use App\Services\Towns\Template\TownTemplate;

class Dsf extends TownTemplate
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

    private SimpleXMLElement $headMsg;

    public function __construct(TownConfig $config)
    {
        parent::__construct($config);
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=utf-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->RecepcionarLoteRpsV3($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->ConsultarNfsePorRpsV3($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return $this->CancelarNfse($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version): void
    {
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
