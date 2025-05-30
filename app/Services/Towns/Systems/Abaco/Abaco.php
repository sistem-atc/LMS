<?php

namespace App\Services\Towns\Systems\Abaco;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
use App\Services\Towns\Template\TownTemplate;

class Abaco extends TownTemplate
{

    use Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\RecepcionarLoteRPS;

    private SimpleXMLElement $headMsg;

    public function __construct(TownConfig $config)
    {
        parent::__construct(config: $config);
        $this->headMsg = $this->composeHeader(headerVersion: $config->headerVersion);
    }

    public function getHeaders(): array
    {
        return [
            "Content-Type: text/xml;charset=UTF-8",
            "SOAPAction: http://www.e-nfs.com.braction/ACONSULTARNFSE.Execute",
            "Content-Length: " . strlen($this->mountMessage->asXML())
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->recepcionarLoteRps($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->ConsultarNfsePorRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version): void
    {

        $this->mountMessage = $this->assembleMessage(replaceOperation: $operation, version: $version);

        $headMsgString = $this->removeSpecialChars(htmlspecialchars($this->headMsg->asXML(), ENT_NOQUOTES, 'UTF-8'));
        $dataMsgString = $this->removeSpecialChars(htmlspecialchars($dataMsg->asXML(), ENT_NOQUOTES, 'UTF-8'));

        $this->mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');
        $this->mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $cabecMsg = $this->mountMessage->xpath('//e:Nfsecabecmsg')[0];
        $dom = dom_import_simplexml($cabecMsg);
        $doc = $dom->ownerDocument;

        $textNode = $doc->createTextNode($headMsgString);
        $dom->appendChild($textNode);

        $dadosMsg = $this->mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $doc = $dom->ownerDocument;

        $textNode = $doc->createTextNode($dataMsgString);
        $dom->appendChild($textNode);

    }

    private function removeSpecialChars(string $string): string
    {
        return
            str_replace(
                '"',
                '&quot;',
                str_replace(
                    "\t",
                    '',
                    str_replace(
                        "\n",
                        '',
                        str_replace('&lt;?xml version="1.0"?&gt;', '', $string)
                    )
                )
            );
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
