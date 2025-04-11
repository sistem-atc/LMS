<?php

namespace App\Services\Towns\Abaco;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class Abaco extends LinkTownBase
{

    use Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\RecepcionarLoteRPS;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $headMsg;

    public static function getHeaders(): array
    {
        return [
            "Content-Type: text/xml;charset=UTF-8",
            "SOAPAction: http://www.e-nfs.com.braction/ACONSULTARNFSE.Execute",
            "Content-Length: " . strlen(self::$mountMessage->asXML())
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::recepcionarLoteRps($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfsePorRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
        self::$headMsg = self::composeHeader(parent::$headerVersion);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url . self::$endPoint, self::$mountMessage->asXML(), self::getHeaders(), self::$verb);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version): void
    {

        self::$mountMessage = parent::assembleMessage(replaceOperation: $operation, version: $version);

        $headMsgString = self::removeSpecialChars(htmlspecialchars(self::$headMsg->asXML(), ENT_NOQUOTES, 'UTF-8'));
        $dataMsgString = self::removeSpecialChars(htmlspecialchars($dataMsg->asXML(), ENT_NOQUOTES, 'UTF-8'));

        self::$mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');
        self::$mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $cabecMsg = self::$mountMessage->xpath('//e:Nfsecabecmsg')[0];
        $dom = dom_import_simplexml($cabecMsg);
        $doc = $dom->ownerDocument;

        $textNode = $doc->createTextNode($headMsgString);
        $dom->appendChild($textNode);

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $doc = $dom->ownerDocument;

        $textNode = $doc->createTextNode($dataMsgString);
        $dom->appendChild($textNode);

    }

    private static function removeSpecialChars(string $string): string
    {
        return
            str_replace('"', '&quot;',
                str_replace("\t", '',
                    str_replace("\n", '',
                        str_replace('&lt;?xml version="1.0"?&gt;', '', $string)
                    )
                )
            );
    }

    public static function parseXmlToArray(string $xmlString, string $xpath, string $namespace = ''): array
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
