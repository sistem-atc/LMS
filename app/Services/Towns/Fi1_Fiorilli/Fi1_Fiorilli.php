<?php

namespace App\Services\Towns\Fi1_Fiorilli;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Fi1_Fiorilli extends LinkTownBase
{

    use Methods\cancelarNfse,
        Methods\consultarLoteRps,
        Methods\consultarNfsePorFaixa,
        Methods\consultarNfsePorRps,
        Methods\consultarNfseServicoPrestado,
        Methods\gerarNfse,
        Methods\recepcionarLoteRps,
        Methods\recepcionarLoteRpsSincrono,
        Methods\substituirNfse;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::consultarNfsePorFaixa($data);
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
        return self::substituirNfse($data);
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

        self::$mountMessage = parent::assembleMessage();

        self::$mountMessage = Str::replace("[Username]", parent::getUsername(), self::$mountMessage);
        self::$mountMessage = Str::replace("[Password]", parent::getPassword(), self::$mountMessage);

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
