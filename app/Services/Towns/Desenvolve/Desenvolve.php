<?php

namespace App\Services\Towns\Desenvolve;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Desenvolve extends LinkTownBase
{

    use Methods\CancelarNfseEnvio,
        Methods\ConsultarLoteRpsEnvio,
        Methods\ConsultarNfseRpsEnvio,
        Methods\ConsultarNfseServicoTomadoEnvio,
        Methods\EnviarLoteRpsEnvio,
        Methods\EnviarLoteRpsSincronoEnvio,
        Methods\GerarNfseEnvio;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::gerarNfseEnvio($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::consultarNfseRpsEnvio($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelarNfseEnvio($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return throw new Exception('Método não implementado', 501);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage();

        self::$mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }
}
