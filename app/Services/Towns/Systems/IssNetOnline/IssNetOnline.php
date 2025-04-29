<?php

namespace App\Services\Towns\IssNetOnline;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class IssNetOnline extends LinkTownBase
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
            'Content-Type' => 'application/soap+xml;charset=UTF-8',
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfse($data);
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
        // <![CDATA[[DadosMsg]]]>

    }
}
