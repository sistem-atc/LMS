<?php

namespace App\Services\Towns\Infisc_Gif;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class Infisc_Gif extends LinkTownBase
{

    use Methods\CancelarLote,
        Methods\CancelarNotaFiscal,
        Methods\EnviarLoteCupom,
        Methods\EnviarLoteDms,
        Methods\EnviarLoteNotas,
        Methods\Inutilizacao,
        Methods\ObterCriticaLote,
        Methods\ObterCriticaLoteDms,
        Methods\ObterLoteNotaFiscal,
        Methods\ObterNotaFiscal,
        Methods\ObterNotaFiscalXml,
        Methods\ObterNotasEmPDF,
        Methods\ObterNotasEmPNG,
        Methods\ObterNumeracao,
        Methods\ObterReciboLote,
        Methods\ObterStatusLoteDms;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8'
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::obterNotaFiscal($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::gerarNota($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelarNotaFiscal($data);
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

    public static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage();

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));
    }
}
