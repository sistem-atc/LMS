<?php

namespace App\Services\Towns\Equiplano;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Equiplano extends LinkTownBase
{

    use Methods\esCancelarNfse,
        Methods\esConsultarLoteRps,
        Methods\esConsultarNfse,
        Methods\esConsultarNfsePorRps,
        Methods\esConsultarSituacaoLoteRps,
        Methods\esRecepcionarLoteRps,
        Methods\esStatusWebServices;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::esRecepcionarLoteRps($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::esConsultarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::esCancelarNfse($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return parent::Conection(parent::$url, self::$mountMessage->asXML(), static::getHeaders(), self::$verb, false);
    }

    private static function mountMensage(?SimpleXMLElement $dataMsg, string $operation): void
    {
        // Version 0 //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage($operation, parent::getVersion());

        if ($dataMsg) {
            $dadosMsg = self::$mountMessage->xpath('//ser:xml')[0];
            $dom = dom_import_simplexml($dadosMsg);
            $fragment = dom_import_simplexml($dataMsg);
            $dom->appendChild($dom->ownerDocument->importNode($fragment, true));
        }

    }
}

