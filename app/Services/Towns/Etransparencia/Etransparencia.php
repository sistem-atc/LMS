<?php

namespace App\Services\Towns\Etransparencia;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Etransparencia extends LinkTownBase
{

    private static $Codigo_Usuario = 'a5a07214-136a-4254-bad1-0272dc48238018ah24ni0119grav000-ed10--5l';
    private static $Codigo_Contribuinte = '1d658984-9ea7-4cbb-8769-e50f53fdd1f250ah10ni0091grav104-ed28--1l';

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota($data): string|int|array
    {
        return self::PROCESSARPS($data);
    }

    public function consultarNota($data): string|int|array
    {
        return self::CONSULTANOTASPROTOCOLO($data);
    }

    public function cancelarNota($data): string|int|array
    {
        return self::CANCELARNOTAELETRONICA($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function CANCELARNOTAELETRONICA($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->SerieNota = $data['serieNota'];
        $dataMsg->NumeroNota = $data['numeroNota'];
        $dataMsg->SerieRps = $data['serieRps'];
        $dataMsg->NumeroRps = $data['numeroRps'];
        $dataMsg->ValorNota = $data['valorNota'];
        $dataMsg->MotivoCancelamento = $data['motivoCancelamento'];
        $dataMsg->PodeCancelarGuia = $data['podeCancelarGuia'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function CONSNFSERECEBIDAS($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function CONSULTANOTASPROTOCOLO($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->NumeroProtocolo = $data['numeroProtocolo'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function CONSULTAPROTOCOLO($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->NumeroProtocolo = $data['numeroProtocolo'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function IMPRESSAOLINKNFSE($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->NumeroNota = $data['numeroNota'];
        $dataMsg->DataInicio = $data['dataInicio'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function PROCESSARPS($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function VERFICARPS($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

    }

}
