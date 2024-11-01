<?php

namespace App\Services\Towns\Abaco;

use App\Enums\TypeRPS;
use Illuminate\Support\Str;
use App\Enums\MotivosCancelamento;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Abaco extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $headerVersion;

    protected static $headers = [
        'Content-Type' => 'text/xml;charset=UTF-8'
    ];


    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns);
        static::$link = $this->getLinkForIbge($codeIbge);
        self::$url = explode("|", self::$link)[0];
        self::$headerVersion = explode("|", self::$link)[1] ?? null;
    }

    public static function recepcionarLoteRps(
        array $data,
        string $numeroNF,
        MotivosCancelamento $motivoCancelamento
    ): string|int {

        $endPoint = 'arecepcionarloterps?wsdl';
        $operacao = 'RecepcionarLoteRPS';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $codigoCancelamento = 'MC0' . $motivoCancelamento;
        $mountMessage = self::assembleMessage();

        $dataMsg = Str::replace('[CAMPO_NUMERO_NF]', $numeroNF, $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);

        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarSituacaoLoteRPS(
        string $cnpj,
        string $inscricaoMunicipal,
        string $protocolo
    ): string|int {

        $endPoint = 'aconsultarsituacaoloterps?wsdl';
        $Operacao = 'ConsultarSituacaoLoteRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($Operacao);
        $mountMessage = self::assembleMessage();

        $dataMsg = Str::replace('[CAMPO_CNPJ]', $cnpj, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $inscricaoMunicipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_PROTOCOLO]', $protocolo, $dataMsg);

        $mountMessage = Str::replace('[Mount_Mensage]', $Operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps(
        string $Numero_RPS,
        string $Serie_RPS,
        TypeRPS $Tipo_RPS,
        string $CNPJ,
        string $Inscricao_Municipal
    ): string|int {

        $endPoint = 'aconsultarnfseporrps?wsdl';
        $Operacao = 'ConsultarNfsePorRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($Operacao);
        $mountMessage = self::assembleMessage();

        $dataMsg = Str::replace('[CAMPO_NUMERO_RPS]', $Numero_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_SERIE_RPS]', $Serie_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_TIPO_RPS]', '', $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);

        $mountMessage = Str::replace('[Mount_Mensage]', $Operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Protocolo,
    ): string|int {

        $endPoint = 'aconsultarloterps?wsdl';
        $Operacao = 'ConsultarLoteRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($Operacao);
        $mountMessage = self::assembleMessage();

        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_PROTOCOLO]', $Protocolo, $dataMsg);

        $mountMessage = Str::replace('[Mount_Mensage]', $Operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarNfse(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Data_Inicial,
        string $Data_Final
    ): string|int {

        $endPoint = 'aconsultarnfse?wsdl';
        $Operacao = 'ConsultarNfse';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($Operacao);
        $mountMessage = self::assembleMessage();

        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_INICIAL]', date("Ymd", strtotime($Data_Inicial)) . 'T00:00:01', $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_FINAL]', date("Ymd", strtotime($Data_Final)) . 'T23:59:59', $dataMsg);

        $mountMessage = Str::replace('[Mount_Mensage]', $Operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    private static function assembleMessage(): string
    {

        $assembleMessage = '<?xml version="1.0" encoding="utf-8"?>';
        $assembleMessage .= '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:e="http://www.e-nfs.com.br">';
        $assembleMessage .= '<soapenv:Header/><soapenv:Body><e:[Mount_Mensage].Execute>';
        $assembleMessage .= '<e:Nfsecabecmsg>[CabecMsg]</e:Nfsecabecmsg><e:Nfsedadosmsg>[DadosMsg]</e:Nfsedadosmsg>';
        $assembleMessage .= '</e:[Mount_Mensage].Execute></soapenv:Body></soapenv:Envelope>';

        return $assembleMessage;
    }

    private static function composeMessage(string $type): string
    {

        $mensageXML = '';

        switch ($type) {
            case 'RecepcionarLoteRPS':

                $mensageXML = '';

            case 'ConsultarSituacaoLoteRps':

                $mensageXML = '&lt;ConsultarSituacaoLoteRpsEnvio&gt;&lt;Prestador&gt;&lt;Cnpj&gt;[CAMPO_CNPJ]&lt;/Cnpj&gt;';
                $mensageXML .= '&lt;InscricaoMunicipal&gt;[CAMPO_INSCRICAO_MUNICIPAL]&lt;/InscricaoMunicipal&gt;';
                $mensageXML .= '&lt;/Prestador&gt;&lt;Protocolo&gt;[CAMPO_PROTOCOLO]&lt;/Protocolo&gt;&lt;/ConsultarSituacaoLoteRpsEnvio&gt;';

            case 'ConsultarNfsePorRps':

                $mensageXML = '&lt;ConsultarNfseRpsEnvio&gt;&lt;IdentificacaoRps&gt;&lt;Numero&gt;[CAMPO_NUMERO_RPS]&lt;/Numero&gt;';
                $mensageXML .= '&lt;Serie&gt;[CAMPO_SERIE_RPS]&lt;/Serie&gt;&lt;Tipo&gt;[CAMPO_TIPO_RPS]&lt;/Tipo&gt;';
                $mensageXML .= '&lt;/IdentificacaoRps&gt;&lt;Prestador&gt;&lt;Cnpj&gt;[CAMPO_CNPJ]&lt;/Cnpj&gt;';
                $mensageXML .= '&lt;InscricaoMunicipal&gt;[CAMPO_INSCRICAO_MUNICIPAL]&lt;/InscricaoMunicipal&gt;';
                $mensageXML .= '&lt;/Prestador&gt;&lt;/ConsultarNfseRpsEnvio&gt;';

            case 'ConsultarLoteRps':

                $mensageXML = '&lt;ConsultarLoteRpsEnvio&gt;&lt;Prestador&gt;&lt;Cnpj&gt;[CAMPO_CNPJ]&lt;/Cnpj&gt;';
                $mensageXML .= '&lt;InscricaoMunicipal&gt;[CAMPO_INSCRICAO_MUNICIPAL]&lt;/InscricaoMunicipal&gt;';
                $mensageXML .= '&lt;/Prestador&gt;&lt;Protocolo&gt;[CAMPO_PROTOCOLO]&lt;/Protocolo&gt;&lt;/ConsultarLoteRpsEnvio&gt;';

            case 'ConsultarNfse':

                $mensageXML = '&lt;ConsultarNfsEnvio&gt;&lt;Prestador&gt;&lt;Cnpj&gt;[CAMPO_CNPJ]&lt;/Cnpj&gt;';
                $mensageXML .= '&lt;InscricaoMunicipal&gt;[CAMPO_INSCRICAO_MUNICIPAL]&lt;/InscricaoMunicipal&gt;';
                $mensageXML .= '&lt;/Prestador&gt;&lt;PeriodoEmissao&gt;';
                $mensageXML .= '&lt;DataInicial&gt;[CAMPO_DATA_INICIAL]&lt;/DataInicial&gt;';
                $mensageXML .= '&lt;DataFinal&gt;[CAMPO_DATA_FINAL]&lt;/DataFinal&gt;';
                $mensageXML .= '&lt;/PeriodoEmissao&gt;&lt;/ConsultarNfsEnvio&gt;';
        }

        return $mensageXML;
    }

    private static function composeHeader(string $type): string
    {

        switch ($type) {
            case '2.02':
                return '&lt;cabecalho xmlns=&quot;http://www.abrasf.org.br/nfse.xsd&quot; versao=&quot;2.02&quot;&gt;&lt;versaoDados&gt;2.02&lt;/versaoDados&gt;&lt;/cabecalho&gt;';
        }
    }
}
