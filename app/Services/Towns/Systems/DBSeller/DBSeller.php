<?php

namespace App\Services\Towns\Systems\DBSeller;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
use App\Services\Towns\Template\TownTemplate;

class DBSeller extends TownTemplate
{

    use Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\RecepcionarLoteRps,
        Methods\CancelarNfse;


    private SimpleXMLElement $headMsg;

    public function __construct(TownConfig $config)
    {
        parent::__construct($config);
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->ConsultarNfse($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->RecepcionarLoteRps($data);
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

        $this->mountMessage = $this->assembleMessage();

        $dadosMsg = $this->mountMessage->xpath('//xml')[0];
        //<![CDATA[[DadosMsg]]]>
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
