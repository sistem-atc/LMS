<?php

namespace App\Services\Towns\Systems\eSiat;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\Template\TownTemplate;

class eSiat extends TownTemplate
{

    use Methods\ConsultarTomador,
        Methods\RecepcionarApuracaoMensalDESIF,
        Methods\RecepcionarConsultaNotaCancelada,
        Methods\RecepcionarConsultaRPS,
        Methods\RecepcionarDeclaracaoAdministradoraCartao,
        Methods\RecepcionarLoteNotasCanceladas,
        Methods\RecepcionarLoteRps,
        Methods\RecepcionarNFSe,
        Methods\VerificarExistenciaNota,
        Methods\VersaoInstalada;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/soap+xml;charset=UTF-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->RecepcionarNFSe(data: $data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->RecepcionarConsultaRPS(data: $data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return $this->RecepcionarLoteNotasCanceladas(data: $data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception(message: 'Método não implementado', code: 501);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version = null): void
    {

        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = self::assembleMessage();

        self::$mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
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
