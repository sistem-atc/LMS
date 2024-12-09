<?php

namespace App\Services\Towns\eCity;

use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use SimpleXMLElement;

class eCity extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $headerVersion;

    protected static $headers = ['Content-Type' => 'application/soap+xml;charset=UTF-8'];

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
    }

    public static function CancelarNfse(): string|int
    {

        $operacao = 'CancelarNfse';
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps(): string|int
    {

        $operacao = 'ConsultarLoteRps';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseFaixa(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Nota_Inicial,
        string $Nota_Final
    ): string|int {

        $operacao = 'ConsultarNfseFaixa';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NOTA_INICIAL]', $Nota_Inicial, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NOTA_FINAL]', $Nota_Final, $dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseRps(): string|int
    {

        $operacao = 'ConsultarNfseRps';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoPrestado(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Data_Inicial,
        string $Data_Final,
        int $Numero_Pagina
    ): string|int {

        $operacao = 'ConsultarNfseServicoPrestado';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace("[CAMPO_CNPJ]", $CNPJ, $dataMsg);
        $dataMsg = Str::replace("[CAMPO_INSCRICAO_MUNICIPAL]", $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace("[CAMPO_DATA_INICIAL]", date("Ymd", strtotime($Data_Inicial)), $dataMsg);
        $dataMsg = Str::replace("[CAMPO_DATA_FINAL]", date("Ymd", strtotime($Data_Final)), $dataMsg);
        $dataMsg = Str::replace("[CAMPO_NUMERO_PAGINA]", $Numero_Pagina, $dataMsg);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoTomado(): string|int
    {

        $operacao = 'ConsultarNfseServicoTomado';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function GerarNfse(): string|int
    {

        $operacao = 'GerarNfse';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRpsSincrono(): string|int
    {

        $operacao = 'RecepcionarLoteRpsSincrono';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function SubstituirNfse(): string|int
    {

        $operacao = 'SubstituirNfse';
        $dataMsg = parent::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(): string
    {

        $assembleMessage = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope">';
        $assembleMessage .= '<soap:Header/>';
        $assembleMessage .= '<soap:Body>';
        $assembleMessage .= '<parameters>';
        $assembleMessage .= '<xml><![CDATA[[DadosMsg]]]></xml>';
        $assembleMessage .= '</parameters>';
        $assembleMessage .= '</soap:Body>';
        $assembleMessage .= '</soap:Envelope>';

        return $assembleMessage;
    }
}
