<?php

namespace App\Services\Towns\Systems\INfse;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class INfse extends LinkTownBase
{

    use Methods\CancelarNfse,
        Methods\ConsultarLoteRps,
        Methods\ConsultarNfsePorFaixa,
        Methods\ConsultarNfsePorRps,
        Methods\ConsultarNfseServicoPrestado,
        Methods\ConsultarNfseServicoTomado,
        Methods\GerarNfse,
        Methods\RecepcionarLoteRps,
        Methods\RecepcionarLoteRpsSincrono,
        Methods\SubstituirNfse;

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
        return self::ConsultarNfsePorRps($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function substituirNota(array $data): string|int|array
    {
        return self::SubstituirNfse($data);
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
