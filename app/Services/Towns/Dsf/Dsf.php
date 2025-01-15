<?php

namespace App\Services\Towns\Dsf;

use App\Enums\HttpMethod;
use App\Enums\TypeRPS;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Dsf extends LinkTownBase implements LinkTownsInterface, DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    protected static $operation;

    protected static $headers = ['Content-Type' => 'text/xml;charset=utf-8'];

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
    }

    public static function CancelarNfse(
        string $CNPJ
    ): string|int {

        $operacao = 'CancelarNfse';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(True);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function CancelarNfseV3(
        string $CNPJ
    ): string|int {

        $operacao = 'CancelarNfseV3';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(False);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps(
        string $CNPJ
    ): string|int {

        $operacao = 'ConsultarLoteRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(True);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRpsV3(
        string $CNPJ
    ): string|int {

        $operacao = 'ConsultarLoteRpsV3';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(True);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps(
        string $CNPJ
    ): string|int {

        $operacao = 'ConsultarNfsePorRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(True);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRpsV3(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Numero_RPS,
        string $Serie_RPS,
        TypeRPS $Tipo_RPS
    ): string|int {

        $operacao = 'ConsultarNfsePorRpsV3';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_RPS]', $Numero_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_SERIE_RPS]', $Serie_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_TIPO_RPS]', $Tipo_RPS[0], $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(False);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfse(
        string $CNPJ
    ): string|int {

        $operacao = 'ConsultarNfse';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(True);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseV3(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Data_Inicial,
        string $Data_Final
    ): string|int {

        $operacao = 'ConsultarNfseV3';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_INICIAL]', date("Ymd", strtotime($Data_Inicial)), $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_FINAL]', date("Ymd", strtotime($Data_Final)), $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(False);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarSituacaoLoteRPS(
        string $CNPJ
    ): string|int {

        $operacao = 'ConsultarSituacaoLoteRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(True);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarSituacaoLoteRpsV3(
        string $CNPJ
    ): string|int {

        $operacao = 'ConsultarSituacaoLoteRpsV3';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(False);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps(
        string $CNPJ
    ): string|int {

        $operacao = 'RecepcionarLoteRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(True);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRpsV3(
        string $CNPJ
    ): string|int {

        $operacao = 'RecepcionarLoteRpsV3';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = self::assembleMessage(False);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function composeHeader(string $Tipo): string
    {

        switch ($Tipo) {

            case '1':
                return '<cabecalho xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" versao="1"><versaoDados>1</versaoDados></cabecalho>';
        }
    }
}
