<?php

namespace App\Services\Towns\IssNetOnline2;

use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use SimpleXMLElement;

class IssNetOnline2 extends LinkTownBase
{
    use Methods\CancelarNfse,
        Methods\ConsultaNFSePorRPS,
        Methods\ConsultarDadosCadastrais,
        Methods\ConsultarLoteRps,
        Methods\ConsultarNfse,
        Methods\ConsultarSituacaoLoteRPS,
        Methods\ConsultarUrlVisualizacaoNfse,
        Methods\ConsultarUrlVisualizacaoNfseSerie,
        Methods\RecepcionarLoteRps;

    protected static $verb = HttpMethod::POST;

    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8',
            'SOAPAction' => 'http://nfse.abrasf.org.br/' . self::$operation
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::($data);
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
        // <![CDATA[[DadosMsg]]]>

    }

}
