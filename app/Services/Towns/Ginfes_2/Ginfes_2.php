<?php

namespace App\Services\Towns\Ginfes_2;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class Ginfes_2 extends LinkTownBase
{

    use Methods\CancelarNfse,
        Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarSituacaoLoteRps,
        Methods\RecepcionarLoteRps;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfse($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
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

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
