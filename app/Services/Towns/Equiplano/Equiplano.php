<?php

namespace App\Services\Towns\Equiplano;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Equiplano extends LinkTownBase implements LinkTownsInterface, DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    protected static $operation;

    protected static $headers = [];

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

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
    }

    public static function esCancelarNfse($data): string|int
    {

        $operacao = 'esCancelarNfse';

        $dataMsg = self::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($operacao, $dataMsg);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function esConsultarLoteRps($data): string|int
    {

        $operacao = 'esConsultarLoteRps';

        $dataMsg = self::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($operacao, $dataMsg);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function esConsultarNfse($data): string|int {

        $operacao = 'esConsultarNfse';

        $dataMsg = self::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($operacao, $dataMsg);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function esConsultarNfsePorRps($data): string|int
    {

        $operacao = 'esConsultarNfsePorRps';

        $dataMsg = self::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($operacao, $dataMsg);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function esConsultarSituacaoLoteRps($data): string|int
    {

        $operacao = 'esConsultarSituacaoLoteRps';

        $dataMsg = self::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($operacao, $dataMsg);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function esRecepcionarLoteRps($data): string|int
    {

        $operacao = 'esRecepcionarLoteRps';

        $dataMsg = self::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($operacao, $dataMsg);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function esStatusWebServices(): string|int
    {

        $operacao = 'esStatusWebServices';
        $mountMessage = self::mountMensage($operacao);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
    }

    private static function mountMensage(string $operacao, SimpleXMLElement $dataMsg = null): SimpleXMLElement
    {
        // Version 0 //<![CDATA[[DadosMsg]]]>
        $mountMessage = parent::assembleMessage($operacao, parent::getVersion());

        if ($dataMsg) {
            $dadosMsg = $mountMessage->xpath('//ser:xml')[0];
            $dom = dom_import_simplexml($dadosMsg);
            $fragment = dom_import_simplexml($dataMsg);
            $dom->appendChild($dom->ownerDocument->importNode($fragment, true));
        }

        return $mountMessage;

    }
}
