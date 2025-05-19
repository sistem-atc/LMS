<?php

namespace App\Services\Towns\DBSeller;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Towns\Template\TownTemplate;

class DBSeller extends TownTemplate
{

    use Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\RecepcionarLoteRps,
        Methods\CancelarNfse;

    protected static $verb = HttpMethod::POST;

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
        return self::Conection(
            null,
            parent::$url,
            self::$mountMessage->asXML(),
            self::getHeaders(),
            self::$verb
        );
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = self::assembleMessage();

        $dadosMsg = self::$mountMessage->xpath('//xml')[0];
        //<![CDATA[[DadosMsg]]]>
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }
}
