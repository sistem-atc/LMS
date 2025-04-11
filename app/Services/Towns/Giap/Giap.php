<?php

namespace App\Services\Towns\Giap;

use Exception;
use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Bases\LinkTownBase;

class Giap extends LinkTownBase
{

    use Methods\cancela,
        Methods\consulta,
        Methods\emissao,
        Methods\hello,
        Methods\simula;

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/xml',
            'Authorization' => parent::$password //Inscricao_Municipal & "-" & Token
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::consulta($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::emissao($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancela($data);
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
        return self::Conection(parent::$url & self::$endpoint & self::$operation, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    private static function mountMensage(?SimpleXMLElement $dataMsg): void
    {
        self::$mountMessage = parent::assembleMessage();

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
