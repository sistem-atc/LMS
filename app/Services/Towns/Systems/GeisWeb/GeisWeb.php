<?php

namespace App\Services\Towns\Systems\GeisWeb;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
use App\Services\Towns\Template\TownTemplate;

class GeisWeb extends TownTemplate
{

    use Methods\CancelaNfse,
        Methods\consultaLoteRps,
        Methods\ConsultaNfse,
        Methods\ConsultaRps,
        Methods\ConsultaSituacaoLoteAsync,
        Methods\EmailNFSeTomador,
        Methods\EnviaLoteRps,
        Methods\EnviaLoteRpsAsync,
        Methods\GeraPDFNFSe;

    public function __construct(TownConfig $config)
    {
        parent::__construct(config: $config);
    }

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8',
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->ConsultaNfse(data: $data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->EnviaLoteRps(data: $data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return $this->CancelaNfse(data: $data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception(message: 'Método não implementado', code: 501);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version = null): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = $this->assembleMessage();

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
