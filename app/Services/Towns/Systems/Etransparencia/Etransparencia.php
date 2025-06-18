<?php

namespace App\Services\Towns\Systems\Etransparencia;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Towns\DTO\TownConfig;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Towns\Template\TownTemplate;

class Etransparencia extends TownTemplate
{

    private static $Codigo_Usuario = 'a5a07214-136a-4254-bad1-0272dc48238018ah24ni0119grav000-ed10--5l';
    private static $Codigo_Contribuinte = '1d658984-9ea7-4cbb-8769-e50f53fdd1f250ah10ni0091grav104-ed28--1l';

    use Methods\CANCELARNOTAELETRONICA,
        Methods\CONSNFSERECEBIDAS,
        Methods\CONSULTANOTASPROTOCOLO,
        Methods\CONSULTAPROTOCOLO,
        Methods\IMPRESSAOLINKNFSE,
        Methods\PROCESSARPS,
        Methods\VERFICARPS;

    public function __construct(TownConfig $config)
    {
        parent::__construct(config: $config);
    }

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota($data): string|int|array
    {
        return $this->PROCESSARPS(data: $data);
    }

    public function consultarNota($data): string|int|array
    {
        return $this->CONSULTANOTASPROTOCOLO(data: $data);
    }

    public function cancelarNota($data): string|int|array
    {
        return $this->CANCELARNOTAELETRONICA(data: $data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception(message: 'Método não implementado', code: 501);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version = null): void
    {
        //Implements the method to mount the message
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
