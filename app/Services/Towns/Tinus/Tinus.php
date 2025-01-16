<?php

namespace App\Services\Towns\Tinus;

use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use SimpleXMLElement;
use App\Enums\HttpMethod;
class Tinus extends LinkTownBase implements LinkTownsInterface,DevelopInterface
{
    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $headMsg;
    private static string|int|array|null $connection;
    private static SimpleXMLElement $mountMessage;
    private static string $endpoint;
    private static string $operation;
    protected static $headers;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8',
            'SOAPAction' => 'http://www.tinus.com.br/WSNFSE.' . self::$operation . '.' . self::$operation . ''
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return '';
    }

    public function consultarNota(array $data): string|int|array
    {
        return '';
    }

    public function cancelarNota(array $data): string|int|array
    {
        return '';
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
        self::$connection = self::Conection(parent::$url . self::$endpoint, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function RecepcionarLoteRps(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage->asXML());

        return self::$connection;
    }


    public static function ConsultarSituacaoLoteRPS(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage->asXML());

        return self::$connection;
    }

    public static function ConsultarLoteRps(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage->asXML());

        return self::$connection;
    }

    public static function ConsultarNfsePorRps(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage->asXML());

        return self::$connection;
    }

    public static function ConsultarNfse(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage->asXML());

        return self::$connection;
    }

    public static function CancelarNfse(array $data): string|int|array
    {

        self::$operation = __FUNCTION__;
        self::$endpoint = "WSNFSE." . self::$operation . ".cls";
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);
        self::$mountMessage = self::Sign_XML(self::$mountMessage->asXML());

        return self::$connection;
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage(self::$operation);

        $dadosMsg = self::$mountMessage->xpath('tin:Arg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
