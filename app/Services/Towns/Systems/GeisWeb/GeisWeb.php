<?php

namespace App\Services\Towns\Systems\GeisWeb;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class GeisWeb extends LinkTownBase
{

    use Methods\CancelaNfse,
        Methods\consultaLoteRps,
        Methods\ConsultaNfse,
        Methods\ConsultaRps,
        Methods\ConsultaSituacaoLoteAsync,
        Methods\EmailNFSeTomador,
        Methods\EnviaLoteRps,
        Methods\EnviaLoteRpsAsync,
        Methods\GeraPDFNFSe;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8',
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultaNfse($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::EnviaLoteRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelaNfse($data);
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
