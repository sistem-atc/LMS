<?php

namespace App\Services\Towns\eCity;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class eCity extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/soap+xml;charset=UTF-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfseRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function CancelarNfse(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function ConsultarLoteRps(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function ConsultarNfseFaixa(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function ConsultarNfseRps(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function ConsultarNfseServicoPrestado(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function ConsultarNfseServicoTomado(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function GerarNfse(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function RecepcionarLoteRpsSincrono(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function SubstituirNfse(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    private static function mountMensage(SimpleXMLElement $dataMsg, string $operation): void
    {
        //<![CDATA[[DadosMsg]]]>
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
