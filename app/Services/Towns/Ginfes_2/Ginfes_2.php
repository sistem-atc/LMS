<?php

namespace App\Services\Towns\Ginfes_2;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Ginfes_2 extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfse($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRps($data);
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

        $dadosMsg = self::composeMessage($operation);
        $dadosMsg->Cnpj = $data['cnpj'];

        $dadosMsg = self::Sign_XML($dadosMsg);

        self::mountMensage($dadosMsg);

        return self::connection();
    }

    public static function ConsultarLoteRps(array $data): string|int|array
    {

        $operation = __FUNCTION__;

        $dadosMsg = self::composeMessage($operation);
        $dadosMsg->Cnpj = $data['cnpj'];
        $dadosMsg = self::Sign_XML($dadosMsg);

        self::mountMensage($dadosMsg);

        return self::connection();
    }

    public static function ConsultarNfsePorRps(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dadosMsg = self::composeMessage($operation);
        $dadosMsg->Cnpj = $data['cnpj'];
        $dadosMsg = self::Sign_XML($dadosMsg);
        self::mountMensage($dadosMsg);

        return self::connection();
    }

    public static function ConsultarNfse(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dadosMsg = self::composeMessage($operation);
        $dadosMsg->Cnpj = $data['cnpj'];
        $dadosMsg = self::Sign_XML($dadosMsg);
        self::mountMensage($dadosMsg);

        return self::connection();
    }

    public static function ConsultarSituacaoLoteRps(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dadosMsg = self::composeMessage($operation);
        $dadosMsg->Cnpj = $data['cnpj'];
        $dadosMsg = self::Sign_XML($dadosMsg);
        self::mountMensage($dadosMsg);

        return self::connection();
    }

    public static function RecepcionarLoteRps(array $data): string|int|array
    {

        $operation = __FUNCTION__;
        $dadosMsg = self::composeMessage($operation);
        $dadosMsg->Cnpj = $data['cnpj'];
        $dadosMsg = self::Sign_XML($dadosMsg);
        self::mountMensage($dadosMsg);

        return self::connection();
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
