<?php

namespace App\Services\Towns\Systems\Fi1_Fiorilli;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
use App\Services\Towns\Template\TownTemplate;

class Fi1_Fiorilli extends TownTemplate
{

    use Methods\cancelarNfse,
        Methods\consultarLoteRps,
        Methods\consultarNfsePorFaixa,
        Methods\consultarNfsePorRps,
        Methods\consultarNfseServicoPrestado,
        Methods\gerarNfse,
        Methods\recepcionarLoteRps,
        Methods\recepcionarLoteRpsSincrono,
        Methods\substituirNfse;

    public function __construct(TownConfig $config)
    {
        parent::__construct(config: $config);
    }

    public static function getHeaders(): array
    {
        return [];
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->consultarNfsePorFaixa(data: $data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->RecepcionarLoteRps(data: $data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return $this->CancelarNfse(data: $data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return $this->substituirNfse(data: $data);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version = null): void
    {

        self::$mountMessage = parent::assembleMessage();

        //self::$mountMessage = Str::replace("[Username]", parent::getUsername(), self::$mountMessage);
        //self::$mountMessage = Str::replace("[Password]", parent::getPassword(), self::$mountMessage);

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
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
