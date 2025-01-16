<?php

namespace App\Services\Towns\Dsf;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use App\Enums\HttpMethod;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Dsf extends LinkTownBase implements LinkTownsInterface, DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    protected static string|int|array|null $connection;
    private static SimpleXMLElement $mountMessage;
    protected static $headers;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=utf-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRpsV3($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfsePorRpsV3($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
        self::$connection = self::Conection(parent::$url, self::$mountMessage->asXML(), static::$headers, self::$verb, false);
    }

    public static function CancelarNfse($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function CancelarNfseV3($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarLoteRps($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarLoteRpsV3($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarNfsePorRps($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarNfsePorRpsV3($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->numeroRps = $data['numeroRps'];
        $dataMsg->serieRps = $data['serieRps'];
        $dataMsg->tipoRps = $data['tipoRps'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarNfse($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarNfseV3($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->dataInicial = date("Ymd", strtotime($data['dataInicial']));
        $dataMsg->dataFinal = date("Ymd", strtotime($data['dataFinal']));
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarSituacaoLoteRPS($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function ConsultarSituacaoLoteRpsV3($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function RecepcionarLoteRps($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    public static function RecepcionarLoteRpsV3($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::$connection;
    }

    private static function mountMensage(SimpleXMLElement $dataMsg, string $operation): void
    {
        self::$mountMessage = parent::assembleMessage($operation);

        if (self::getVersion() === null) {

            $dadosMsg = self::$mountMessage->xpath('//nfse:'. $operation)[0];

        } else {

            $cabecMsg = self::composeHeader();
            $headMsg = self::$mountMessage->xpath('//arg0')[0];
            $dadosMsg = self::$mountMessage->xpath('//arg1')[0];
            $dom = dom_import_simplexml($cabecMsg);
            $fragment = dom_import_simplexml($headMsg);
            $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

        }

        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
