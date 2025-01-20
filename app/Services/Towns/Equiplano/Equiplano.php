<?php

namespace App\Services\Towns\Equiplano;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Equiplano extends LinkTownBase
{

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

    public static function esCancelarNfse($data): string|int|array
    {

        $operation = __FUNCTION__;

        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function esConsultarLoteRps($data): string|int|array
    {

        $operation = __FUNCTION__;

        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function esConsultarNfse($data): string|int|array
    {

        $operation = __FUNCTION__;

        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function esConsultarNfsePorRps($data): string|int|array
    {

        $operation = __FUNCTION__;

        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function esConsultarSituacaoLoteRps($data): string|int|array
    {

        $operation = __FUNCTION__;

        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function esRecepcionarLoteRps($data): string|int|array
    {

        $operation = __FUNCTION__;

        $dataMsg = self::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = parent::Sign_XML($dataMsg);

        self::mountMensage($dataMsg, $operation);

        return self::connection();
    }

    public static function esStatusWebServices(): string|int|array
    {

        $operation = __FUNCTION__;
        self::mountMensage(null, $operation);

        return self::connection();
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

