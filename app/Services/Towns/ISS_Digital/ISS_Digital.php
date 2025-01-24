<?php

namespace App\Services\Towns\ISS_Digital;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class ISS_Digital extends LinkTownBase
{

    use Methods\cancelar,
        Methods\consultarAliquotaSimplesNacional,
        Methods\consultarLote,
        Methods\consultarNfseRps,
        Methods\consultarNota,
        Methods\consultarNotaTomada,
        Methods\consultarSequencialRps,
        Methods\enviar,
        Methods\enviarSincrono,
        Methods\testeEnviar;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'SOAPAction' => 'POST'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::enviar($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelar($data);
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
