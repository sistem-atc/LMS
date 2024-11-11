<?php

namespace App\Services\Towns\Dsf;

use App\Enums\TypeRPS;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Dsf extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $headerVersion;

    protected static $headers = ['Content-Type' => 'text/xml;charset=utf-8'];

    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns);
        static::$link = $this->getLinkForIbge($codeIbge);
        self::$url = explode("|", self::$link)[0];
        self::$headerVersion = explode("|", self::$link)[1] ?? null;
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

    private static function assembleMessage(bool $Version): string
    {

        if ($Version) {
            $assembleMessage = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd" xmlns:nfse1="http:/www.abrasf.org.br/nfse.xsd">';
            $assembleMessage .= '<soapenv:Header/>';
            $assembleMessage .= '<soapenv:Body>';
            $assembleMessage .= '<nfse:[Mount_Mensage]>[DadosMsg]</nfse:[Mount_Mensage]>';
            $assembleMessage .= '</soapenv:Body>';
            $assembleMessage .= '</soapenv:Envelope>';
        } else {
            $assembleMessage = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd">';
            $assembleMessage .= '<soapenv:Header/>';
            $assembleMessage .= '<soapenv:Body>';
            $assembleMessage .= '<nfse:[Mount_Mensage]>';
            $assembleMessage .= '<arg0><![CDATA[[CabecMsg]]]></arg0>';
            $assembleMessage .= '<arg1><![CDATA[[DadosMsg]]]></arg1>';
            $assembleMessage .= '</nfse:[Mount_Mensage]>';
            $assembleMessage .= '</soapenv:Body>';
            $assembleMessage .= '</soapenv:Envelope>';
        }

        return $assembleMessage;
    }

    private static function composeMessage(string $Tipo): string
    {

        $MensagemXML = '';

        switch ($Tipo) {

            case 'CancelarNfse':

                $MensagemXML = '<CancelarNfseEnvio>';
                $MensagemXML .= '<nfse:Pedido>';
                $MensagemXML .= '<nfse1:InfPedidoCancelamento Id="?">';
                $MensagemXML .= '<nfse1:IdentificacaoNfse>';
                $MensagemXML .= '<nfse1:Numero>[CAMPO_NUMERO_NOTA_FISCAL]</nfse1:Numero>';
                $MensagemXML .= '<nfse1:Cnpj>[CAMPO_CNPJ]</nfse1:Cnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '<nfse1:CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</nfse1:CodigoMunicipio>';
                $MensagemXML .= '</nfse1:IdentificacaoNfse>';
                $MensagemXML .= '<nfse1:CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</nfse1:CodigoCancelamento>';
                $MensagemXML .= '</nfse1:InfPedidoCancelamento>';
                $MensagemXML .= '</nfse:Pedido>';
                $MensagemXML .= '</CancelarNfseEnvio>';

            case 'CancelarNfseV3':

                $MensagemXML = '';

            case 'ConsultarLoteRps':

                $MensagemXML = '<ConsultarLoteRpsEnvio>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse1:Cnpj>[CAMPO_CNPJ]</nfse1:Cnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Protocolo>[CAMPO_PROTOCOLO]</nfse:Protocolo>';
                $MensagemXML .= '</ConsultarLoteRpsEnvio>';


            case 'ConsultarLoteRpsV3':

                $MensagemXML = '';

            case 'ConsultarNfse':

                $MensagemXML = '<ConsultarNfseEnvio>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse1:Cnpj>[CAMPO_CNPJ]</nfse1:Cnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:PeriodoEmissao>';
                $MensagemXML .= '<nfse:DataInicial>[CAMPO_DATA_INICIAL]</nfse:DataInicial>';
                $MensagemXML .= '<nfse:DataFinal>[CAMPO_DATA_FINAL]</nfse:DataFinal>';
                $MensagemXML .= '</nfse:PeriodoEmissao>';
                $MensagemXML .= '</ConsultarNfseEnvio>';

            case 'ConsultarNfsePorRps':

                $MensagemXML = '<ConsultarNfseRpsEnvio>';
                $MensagemXML .= '<nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse1:Numero>[CAMPO_NUMERO_RPS]</nfse1:Numero>';
                $MensagemXML .= '<nfse1:Serie>[CAMPO_SERIE_RPS]</nfse1:Serie>';
                $MensagemXML .= '<nfse1:Tipo>[CAMPO_TIPO_RPS]</nfse1:Tipo>';
                $MensagemXML .= '</nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse1:Cnpj>[CAMPO_CNPJ]</nfse1:Cnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '</ConsultarNfseRpsEnvio>';


            case 'ConsultarNfsePorRpsV3':

                $MensagemXML = '<ConsultarNfseRpsEnvio xmlns="http:/www.abrasf.org.br/nfse.xsd" xmlns:tipos="http://www.abrasf.org.br/nfse.xsd" xmlns:xsi="http://www.w3.org/2000/09/xmldsig#">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>[CAMPO_NUMERO_RPS]</Numero>';
                $MensagemXML .= '<Serie>[CAMPO_SERIE_RPS]</Serie>';
                $MensagemXML .= '<Tipo>[CAMPO_TIPO_RPS]</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '</ConsultarNfseRpsEnvio>';

            case 'ConsultarNfseV3':

                $MensagemXML = '<ConsultarNfseEnvio xmlns="http:/www.abrasf.org.br/nfse.xsd" xmlns:tipos="http://www.abrasf.org.br/nfse.xsd" xmlns:xsi="http://www.w3.org/2000/09/xmldsig#">';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<tipos:Cnpj>[CAMPO_CNPJ]</tipos:Cnpj>';
                $MensagemXML .= '<tipos:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tipos:InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<PeriodoEmissao>';
                $MensagemXML .= '<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>';
                $MensagemXML .= '<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>';
                $MensagemXML .= '</PeriodoEmissao>';
                $MensagemXML .= '</ConsultarNfseEnvio>';

            case 'ConsultarSituacaoLoteRps':

                $MensagemXML = '<ConsultarSituacaoLoteRpsEnvio>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse1:Cnpj>[CAMPO_CNPJ]</nfse1:Cnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Protocolo>[CAMPO_PROTOCOLO]</nfse:Protocolo>';
                $MensagemXML .= '</ConsultarSituacaoLoteRpsEnvio>';

            case 'ConsultarSituacaoLoteRpsV3':

                $MensagemXML = '';

            case 'RecepcionarLoteRps':

                $MensagemXML = '<EnviarLoteRpsEnvio>';
                $MensagemXML .= '<nfse:LoteRps Id="?" versao="?">';
                $MensagemXML .= '<nfse1:NumeroLote>?</nfse1:NumeroLote>';
                $MensagemXML .= '<nfse1:Cnpj>[CAMPO_CNPJ]</nfse1:Cnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>?</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '<nfse1:QuantidadeRps>?</nfse1:QuantidadeRps>';
                $MensagemXML .= '<nfse1:ListaRps>';
                $MensagemXML .= '<nfse1:Rps>';
                $MensagemXML .= '<nfse1:InfRps Id="?">';
                $MensagemXML .= '<nfse1:IdentificacaoRps>';
                $MensagemXML .= '<nfse1:Numero>?</nfse1:Numero>';
                $MensagemXML .= '<nfse1:Serie>?</nfse1:Serie>';
                $MensagemXML .= '<nfse1:Tipo>?</nfse1:Tipo>';
                $MensagemXML .= '</nfse1:IdentificacaoRps>';
                $MensagemXML .= '<nfse1:DataEmissao>?</nfse1:DataEmissao>';
                $MensagemXML .= '<nfse1:NaturezaOperacao>?</nfse1:NaturezaOperacao>';
                $MensagemXML .= '<nfse1:RegimeEspecialTributacao>?</nfse1:RegimeEspecialTributacao>';
                $MensagemXML .= '<nfse1:OptanteSimplesNacional>?</nfse1:OptanteSimplesNacional>';
                $MensagemXML .= '<nfse1:IncentivadorCultural>?</nfse1:IncentivadorCultural>';
                $MensagemXML .= '<nfse1:Status>?</nfse1:Status>';
                $MensagemXML .= '<nfse1:RpsSubstituido>';
                $MensagemXML .= '<nfse1:Numero>?</nfse1:Numero>';
                $MensagemXML .= '<nfse1:Serie>?</nfse1:Serie>';
                $MensagemXML .= '<nfse1:Tipo>?</nfse1:Tipo>';
                $MensagemXML .= '</nfse1:RpsSubstituido>';
                $MensagemXML .= '<nfse1:Servico>';
                $MensagemXML .= '<nfse1:Valores>';
                $MensagemXML .= '<nfse1:ValorServicos>?</nfse1:ValorServicos>';
                $MensagemXML .= '<nfse1:ValorDeducoes>?</nfse1:ValorDeducoes>';
                $MensagemXML .= '<nfse1:ValorPis>?</nfse1:ValorPis>';
                $MensagemXML .= '<nfse1:ValorCofins>?</nfse1:ValorCofins>';
                $MensagemXML .= '<nfse1:ValorInss>?</nfse1:ValorInss>';
                $MensagemXML .= '<nfse1:ValorIr>?</nfse1:ValorIr>';
                $MensagemXML .= '<nfse1:ValorCsll>?</nfse1:ValorCsll>';
                $MensagemXML .= '<nfse1:IssRetido>?</nfse1:IssRetido>';
                $MensagemXML .= '<nfse1:ValorIss>?</nfse1:ValorIss>';
                $MensagemXML .= '<nfse1:ValorIssRetido>?</nfse1:ValorIssRetido>';
                $MensagemXML .= '<nfse1:OutrasRetencoes>?</nfse1:OutrasRetencoes>';
                $MensagemXML .= '<nfse1:BaseCalculo>?</nfse1:BaseCalculo>';
                $MensagemXML .= '<nfse1:Aliquota>?</nfse1:Aliquota>';
                $MensagemXML .= '<nfse1:ValorLiquidoNfse>?</nfse1:ValorLiquidoNfse>';
                $MensagemXML .= '<nfse1:DescontoIncondicionado>?</nfse1:DescontoIncondicionado>';
                $MensagemXML .= '<nfse1:DescontoCondicionado>?</nfse1:DescontoCondicionado>';
                $MensagemXML .= '</nfse1:Valores>';
                $MensagemXML .= '<nfse1:ItemListaServico>?</nfse1:ItemListaServico>';
                $MensagemXML .= '<nfse1:CodigoCnae>?</nfse1:CodigoCnae>';
                $MensagemXML .= '<nfse1:CodigoTributacaoMunicipio>?</nfse1:CodigoTributacaoMunicipio>';
                $MensagemXML .= '<nfse1:Discriminacao>?</nfse1:Discriminacao>';
                $MensagemXML .= '<nfse1:CodigoMunicipio>?</nfse1:CodigoMunicipio>';
                $MensagemXML .= '</nfse1:Servico>';
                $MensagemXML .= '<nfse1:Prestador>';
                $MensagemXML .= '<nfse1:Cnpj>?</nfse1:Cnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>?</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '</nfse1:Prestador>';
                $MensagemXML .= '<nfse1:Tomador>';
                $MensagemXML .= '<nfse1:IdentificacaoTomador>';
                $MensagemXML .= '<nfse1:CpfCnpj>';
                $MensagemXML .= '<nfse1:Cnpj>?</nfse1:Cnpj>';
                $MensagemXML .= '</nfse1:CpfCnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>?</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '</nfse1:IdentificacaoTomador>';
                $MensagemXML .= '<nfse1:RazaoSocial>?</nfse1:RazaoSocial>';
                $MensagemXML .= '<nfse1:Endereco>';
                $MensagemXML .= '<nfse1:Endereco>?</nfse1:Endereco>';
                $MensagemXML .= '<nfse1:Numero>?</nfse1:Numero>';
                $MensagemXML .= '<nfse1:Complemento>?</nfse1:Complemento>';
                $MensagemXML .= '<nfse1:Bairro>?</nfse1:Bairro>';
                $MensagemXML .= '<nfse1:CodigoMunicipio>?</nfse1:CodigoMunicipio>';
                $MensagemXML .= '<nfse1:Uf>?</nfse1:Uf>';
                $MensagemXML .= '<nfse1:Cep>?</nfse1:Cep>';
                $MensagemXML .= '</nfse1:Endereco>';
                $MensagemXML .= '<nfse1:Contato>';
                $MensagemXML .= '<nfse1:Telefone>?</nfse1:Telefone>';
                $MensagemXML .= '<nfse1:Email>?</nfse1:Email>';
                $MensagemXML .= '</nfse1:Contato>';
                $MensagemXML .= '</nfse1:Tomador>';
                $MensagemXML .= '<nfse1:IntermediarioServico>';
                $MensagemXML .= '<nfse1:RazaoSocial>?</nfse1:RazaoSocial>';
                $MensagemXML .= '<nfse1:CpfCnpj>';
                $MensagemXML .= '<nfse1:Cpf>?</nfse1:Cpf>';
                $MensagemXML .= '<nfse1:Cnpj>?</nfse1:Cnpj>';
                $MensagemXML .= '</nfse1:CpfCnpj>';
                $MensagemXML .= '<nfse1:InscricaoMunicipal>?</nfse1:InscricaoMunicipal>';
                $MensagemXML .= '</nfse1:IntermediarioServico>';
                $MensagemXML .= '<nfse1:ContrucaoCivil>';
                $MensagemXML .= '<nfse1:CodigoObra>?</nfse1:CodigoObra>';
                $MensagemXML .= '<nfse1:Art>?</nfse1:Art>';
                $MensagemXML .= '</nfse1:ContrucaoCivil>';
                $MensagemXML .= '</nfse1:InfRps>';
                $MensagemXML .= '</nfse1:Rps>';
                $MensagemXML .= '</nfse1:ListaRps>';
                $MensagemXML .= '</nfse:LoteRps>';
                $MensagemXML .= '</EnviarLoteRpsEnvio>';


            case 'RecepcionarLoteRpsV3':

                $MensagemXML = '';
        }

        return $MensagemXML;
    }

    private static function composeHeader(string $Tipo): string
    {

        switch ($Tipo) {

            case '1':
                return '<cabecalho xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" versao="1"><versaoDados>1</versaoDados></cabecalho>';
        }
    }
}
