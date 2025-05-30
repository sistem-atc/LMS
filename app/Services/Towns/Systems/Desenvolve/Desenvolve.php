<?php

namespace App\Services\Towns\Systems\Desenvolve;

use Exception;
use SimpleXMLElement;
use App\Services\Towns\DTO\TownConfig;
use App\Services\Towns\Template\TownTemplate;

class Desenvolve extends TownTemplate
{

    use Methods\CancelarNfseEnvio,
        Methods\ConsultarLoteRpsEnvio,
        Methods\ConsultarNfseRpsEnvio,
        Methods\ConsultarNfseServicoTomadoEnvio,
        Methods\EnviarLoteRpsEnvio,
        Methods\EnviarLoteRpsSincronoEnvio,
        Methods\GerarNfseEnvio;

    private SimpleXMLElement $headMsg;

    public function __construct(TownConfig $config)
    {
        parent::__construct($config);
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return $this->gerarNfseEnvio($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return $this->consultarNfseRpsEnvio($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return $this->cancelarNfseEnvio($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function mountMensage(SimpleXMLElement $dataMsg, string $operation, ?string $version): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage();

        self::$mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
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
