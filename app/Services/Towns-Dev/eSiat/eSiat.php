<?php

namespace App\Services\Towns\eSiat;

use Illuminate\Support\Str;
use App\Enums\MotivosCancelamento;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class eSiat extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $accessCode;

    protected static $headers = [
        "Content-Type" => "application/soap+xml;charset=utf-8",
    ];


    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns);
        static::$link = $this->getLinkForIbge($codeIbge);
        self::$url = explode("|", self::$link)[0];
        self::$accessCode = explode("|", self::$link)[1] ?? null;
    }

    public static function ConsultarTomador(
        string $CNPJ_Tomador
    ): string|int {

        $operacao = 'ConsultarTomador';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CHAVE_DE_ACESSO]', self::$accessCode, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CNPJ_TOMADOR]', $CNPJ_Tomador, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarApuracaoMensalDESIF(): string|int
    {

        $operacao = 'RecepcionarApuracaoMensalDESIF';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CHAVE_DE_ACESSO]', self::$accessCode, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarConsultaNotaCancelada(
        string $Numero_Nota,
        string $Codigo_Verificacao
    ): string|int {

        $operacao = 'RecepcionarConsultaNotaCancelada';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CHAVE_DE_ACESSO]', self::$accessCode, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_NOTA]', $Numero_Nota, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_VERIFICACAO]', $Codigo_Verificacao, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarConsultaRPS(
        string $Numero_RPS,
        string $Codigo_Verificacao,
        int $fileVersion = 4
    ): string|int {

        $operacao = 'RecepcionarConsultaRPS';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CHAVE_DE_ACESSO]', self::$accessCode, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_VERSAO_ARQUIVO]', $fileVersion, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_RPS]', $Numero_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_VERIFICACAO]', $Codigo_Verificacao, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarDeclaracaoAdministradoraCartao(): string|int
    {

        $operacao = 'RecepcionarDeclaracaoAdministradoraCartao';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CHAVE_DE_ACESSO]', self::$accessCode, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteNotasCanceladas(
        string $Numero_Nota,
        string $Codigo_Verificacao,
        MotivosCancelamento $Motivo_Cancelamento,
        int $fileVersion = 4
    ): string|int {

        $operacao = 'RecepcionarLoteNotasCanceladas';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CHAVE_DE_ACESSO]', self::$accessCode, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_VERSAO_ARQUIVO]', $fileVersion, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_NOTA]', $Numero_Nota, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_VERIFICACAO]', $Codigo_Verificacao, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_MOTIVO_CANCELAMENTO]', $Motivo_Cancelamento, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps(): string|int
    {

        $operacao = 'recepcionarLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace("[CAMPO_CHAVE_DE_ACESSO]", self::$accessCode, $dataMsg);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarNFSe(): string|int
    {

        $operacao = 'RecepcionarNFSe';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace("[CAMPO_CHAVE_DE_ACESSO]", self::$accessCode, $dataMsg);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $dataMsg);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function VerificarExistenciaNota(
        string $CNPJ_Tomador,
        string $Data_Emissao,
        string $Valor_Servicos
    ): string|int {

        $operacao = 'VerificarExistenciaNota';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CHAVE_DE_ACESSO]', self::$accessCode, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CNPJ_TOMADOR]', $CNPJ_Tomador, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_EMISSAO]', date("Ymd", strtotime($Data_Emissao)), $dataMsg);
        $dataMsg = Str::replace('[CAMPO_VALOR_SERVICOS]', $Valor_Servicos, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function VersaoInstalada(): string|int
    {

        $operacao = 'VerificarExistenciaNota';
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', '', $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(): string
    {

        $assembleMessage = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/">';
        $assembleMessage .= '<soap:Header/>';
        $assembleMessage .= '<soap:Body>';
        $assembleMessage .= '<tem:[Mount_Mensage]>';
        $assembleMessage .= '<tem:pArquivoXML><![CDATA[[DadosMsg]]]></tem:pArquivoXML>';
        $assembleMessage .= '</tem:[Mount_Mensage]>';
        $assembleMessage .= '</soap:Body>';
        $assembleMessage .= '</soap:Envelope>';

        return $assembleMessage;
    }

    private static function composeMessage(string $Tipo): string
    {

        $MensagemXML = '';

        switch ($Tipo) {

            case 'ConsultarTomador':

                $MensagemXML = "<tcConsultaTomador>";
                $MensagemXML .= "<tsCodCadBic>1</tsCodCadBic>";
                $MensagemXML .= "<tsChvAcs>[CAMPO_CHAVE_DE_ACESSO]</tsChvAcs>";
                $MensagemXML .= "<tsNumDocTmd>[CAMPO_CNPJ_TOMADOR]</tsNumDocTmd>";
                $MensagemXML .= "</tcConsultaTomador>";

            case 'RecepcionarApuracaoMensalDESIF':

                $MensagemXML = '';

            case 'RecepcionarConsultaNotaCancelada':

                $MensagemXML = "<tcConsultaCancelamento>";
                $MensagemXML .= "<tsCodCadBic>1</tsCodCadBic>";
                $MensagemXML .= "<tsChvAcs>[CAMPO_CHAVE_DE_ACESSO]</tsChvAcs>";
                $MensagemXML .= "<tsNumNot>[CAMPO_NUMERO_NOTA]</tsNumNot>";
                $MensagemXML .= "<tsCodVer>[CAMPO_CODIGO_VERIFICACAO]</tsCodVer>";
                $MensagemXML .= "</tcConsultaCancelamento>";

            case 'RecepcionarConsultaRPS':

                $MensagemXML = "<tcConsultaRPS>";
                $MensagemXML .= "<tsCodCadBic>1</tsCodCadBic>";
                $MensagemXML .= "<tsChvAcs>[CAMPO_CHAVE_DE_ACESSO]</tsChvAcs>";
                $MensagemXML .= "<tsVrsArq>[CAMPO_VERSAO_ARQUIVO]</tsVrsArq>";
                $MensagemXML .= "<tcInfConsultaRPS>";
                $MensagemXML .= "<tsNumRPS>[CAMPO_NUMERO_RPS]</tsNumRPS>";
                $MensagemXML .= "<tsCodVer>[CAMPO_CODIGO_VERIFICACAO]</tsCodVer>";
                $MensagemXML .= "</tcInfConsultaRPS>";
                $MensagemXML .= "</tcConsultaRPS>";

            case 'RecepcionarDeclaracaoAdministradoraCartao':

                $MensagemXML = '';

            case 'RecepcionarLoteNotasCanceladas':

                $MensagemXML = "<tcLoteCancelamento>";
                $MensagemXML .= "<tsCodCadBic>1</tsCodCadBic>";
                $MensagemXML .= "<tsChvAcs>[CAMPO_CHAVE_DE_ACESSO]</tsChvAcs>";
                $MensagemXML .= "<tsVrsArq>[CAMPO_VERSAO_ARQUIVO]</tsVrsArq>";
                $MensagemXML .= "<tcNotCan>";
                $MensagemXML .= "<tcInfNotCan>";
                $MensagemXML .= "<tsNumNot>[CAMPO_NUMERO_NOTA]</tsNumNot>";
                $MensagemXML .= "<tsCodVer>[CAMPO_CODIGO_VERIFICACAO]</tsCodVer>";
                $MensagemXML .= "<tsDesMotCan>[CAMPO_MOTIVO_CANCELAMENTO]</tsDesMotCan>";
                $MensagemXML .= "</tcInfNotCan>";
                $MensagemXML .= "</tcNotCan>";
                $MensagemXML .= "</tcLoteCancelamento>";

            case 'RecepcionarLoteRps':

                $MensagemXML = "<tcLoteRps>";
                $MensagemXML .= "<tsCodCadBic>02</tsCodCadBic>";
                $MensagemXML .= "<tsVrsArq>4</tsVrsArq>";
                $MensagemXML .= "<tsChvAcs>[CAMPO_CHAVE_DE_ACESSO]</tsChvAcs>";
                $MensagemXML .= "<tcRps>";
                $MensagemXML .= "<tcInfRps>";
                $MensagemXML .= "<tsNumRps>2</tsNumRps>";
                $MensagemXML .= "<tsCodVer>F2Z6HZPBGW</tsCodVer>";
                $MensagemXML .= "<tsVrsImp>5</tsVrsImp>";
                $MensagemXML .= "<tsNumDocTmd>12345678909</tsNumDocTmd>";
                $MensagemXML .= "<tsInsEstTmd>Isento</tsInsEstTmd>";
                $MensagemXML .= "<tsInsMunTmd/>";
                $MensagemXML .= "<tsNomTmd>Nome do Tomador do Serviço</tsNomTmd>";
                $MensagemXML .= "<tsDesEndTmd>Av. Brasil, 10</tsDesEndTmd>";
                $MensagemXML .= "<tsNomBaiTmd>Bairro Central</tsNomBaiTmd>";
                $MensagemXML .= "<tsNomCidTmd>Município A</tsNomCidTmd>";
                $MensagemXML .= "<tsCodEstTmd>MG</tsCodEstTmd>";
                $MensagemXML .= "<tsTlfTmd>1122223333</tsTlfTmd>";
                $MensagemXML .= "<tsCEPTmd>38400684</tsCEPTmd>";
                $MensagemXML .= "<tsEmlTmd/>";
                $MensagemXML .= "<tsCodAti>902</tsCodAti>";
                $MensagemXML .= "<tsPerAlq>2</tsPerAlq>";
                $MensagemXML .= "<tsRegRec>0</tsRegRec>";
                $MensagemXML .= "<tsFrmRec>0</tsFrmRec>";
                $MensagemXML .= "<tsMesCmp>2</tsMesCmp>";
                $MensagemXML .= "<tsAnoCmp>2018</tsAnoCmp>";
                $MensagemXML .= "<tsDatEmsRps>20180205</tsDatEmsRps>";
                $MensagemXML .= "<tsVlrRep>0</tsVlrRep>";
                $MensagemXML .= "<tsVlrDed>0</tsVlrDed>";
                $MensagemXML .= "<tsVlrDsc>0</tsVlrDsc>";
                $MensagemXML .= "<tsVlrPIS>0</tsVlrPIS>";
                $MensagemXML .= "<tsVlrCOFINS>0</tsVlrCOFINS>";
                $MensagemXML .= "<tsVlrINSS>0</tsVlrINSS>";
                $MensagemXML .= "<tsVlrIR>0</tsVlrIR>";
                $MensagemXML .= "<tsVlrCSLL>0</tsVlrCSLL>";
                $MensagemXML .= "<tsVlrOtrRtn>0</tsVlrOtrRtn>";
                $MensagemXML .= "<tsDesOtrRtn/>";
                $MensagemXML .= "<tsObs>Informe aqui a observação quando houver.</tsObs>";
                $MensagemXML .= "<tsEstServ>31</tsEstServ>";
                $MensagemXML .= "<tsMunSvc>3148004</tsMunSvc>";
                $MensagemXML .= "<tcItensRps>";
                $MensagemXML .= "<tcItemRps>";
                $MensagemXML .= "<tsSeqItem>1</tsSeqItem>";
                $MensagemXML .= "<tsDesSvc>Descrição do item 01</tsDesSvc>";
                $MensagemXML .= "<tsVlrUnt>100,00</tsVlrUnt>";
                $MensagemXML .= "</tcItemRps>";
                $MensagemXML .= "<tcItemRps>";
                $MensagemXML .= "<tsSeqItem>2</tsSeqItem>";
                $MensagemXML .= "<tsDesSvc>Descrição do item 02</tsDesSvc>";
                $MensagemXML .= "<tsVlrUnt>200,00</tsVlrUnt>";
                $MensagemXML .= "</tcItemRps>";
                $MensagemXML .= "</tcItensRps>";
                $MensagemXML .= "</tcInfRps>";
                $MensagemXML .= "</tcRps>";
                $MensagemXML .= "</tcLoteRps>";

            case 'RecepcionarNFSe':

                $MensagemXML = "<tcGrcNFSe>";
                $MensagemXML .= "<tsCodCadBic>02</tsCodCadBic>";
                $MensagemXML .= "<tsVrsArq>4</tsVrsArq>";
                $MensagemXML .= "<tsChvAcs>[CAMPO_CHAVE_DE_ACESSO]</tsChvAcs>";
                $MensagemXML .= "<tcInfNFSe>";
                $MensagemXML .= "<tsVrsImp>5</tsVrsImp>";
                $MensagemXML .= "<tsNumDocTmd>12345678909</tsNumDocTmd>";
                $MensagemXML .= "<tsInsEstTmd>111111</tsInsEstTmd>";
                $MensagemXML .= "<tsInsMunTmd>222222</tsInsMunTmd>";
                $MensagemXML .= "<tsNomTmd>Nome do Tomador</tsNomTmd>";
                $MensagemXML .= "<tsDesEndTmd>Av. Brasil, 10</tsDesEndTmd>";
                $MensagemXML .= "<tsNomCidTmd>Município ABC</tsNomCidTmd>";
                $MensagemXML .= "<tsNomBaiTmd>Centro</tsNomBaiTmd>";
                $MensagemXML .= "<tsTlfTmd>3422223333</tsTlfTmd>";
                $MensagemXML .= "<tsCodEstTmd>MG</tsCodEstTmd>";
                $MensagemXML .= "<tsCEPTmd>38300123</tsCEPTmd>";
                $MensagemXML .= "<tsEmlTmd/>";
                $MensagemXML .= "<tsCodAti>902</tsCodAti>";
                $MensagemXML .= "<tsPerAlq>2</tsPerAlq>";
                $MensagemXML .= "<tsRegRec>0</tsRegRec>";
                $MensagemXML .= "<tsFrmRec>0</tsFrmRec>";
                $MensagemXML .= "<tsMesCmp>2</tsMesCmp>";
                $MensagemXML .= "<tsAnoCmp>2018</tsAnoCmp>";
                $MensagemXML .= "<tsDatEmsNFSe>20180205</tsDatEmsNFSe>";
                $MensagemXML .= "<tsVlrRep>0</tsVlrRep>";
                $MensagemXML .= "<tsVlrDed>0</tsVlrDed>";
                $MensagemXML .= "<tsVlrDsc>0</tsVlrDsc>";
                $MensagemXML .= "<tsVlrPIS>0</tsVlrPIS>";
                $MensagemXML .= "<tsVlrCOFINS>0</tsVlrCOFINS>";
                $MensagemXML .= "<tsVlrINSS>0</tsVlrINSS>";
                $MensagemXML .= "<tsVlrIR>0</tsVlrIR>";
                $MensagemXML .= "<tsVlrCSLL>0</tsVlrCSLL>";
                $MensagemXML .= "<tsVlrOtrRtn>0</tsVlrOtrRtn>";
                $MensagemXML .= "<tsDesOtrRtn/>";
                $MensagemXML .= "<tsObs>Informe aqui a observação quando houver.</tsObs>";
                $MensagemXML .= "<tsEstServ>31</tsEstServ>";
                $MensagemXML .= "<tsMunSvc>3148004</tsMunSvc>";
                $MensagemXML .= "<tcItensNFSe>";
                $MensagemXML .= "<tcItemNFSe>";
                $MensagemXML .= "<tsSeqItem>1</tsSeqItem>";
                $MensagemXML .= "<tsDesSvc>Descrição do item 1</tsDesSvc>";
                $MensagemXML .= "<tsVlrUnt>100,00</tsVlrUnt>";
                $MensagemXML .= "</tcItemNFSe>";
                $MensagemXML .= "<tcItemNFSe>";
                $MensagemXML .= "<tsSeqItem>2</tsSeqItem>";
                $MensagemXML .= "<tsDesSvc>Descrição do item 2</tsDesSvc>";
                $MensagemXML .= "<tsVlrUnt>100,00</tsVlrUnt>";
                $MensagemXML .= "</tcItemNFSe>";
                $MensagemXML .= "</tcItensNFSe>";
                $MensagemXML .= "</tcInfNFSe>";
                $MensagemXML .= "</tcGrcNFSe>";

            case 'VerificarExistenciaNota':

                $MensagemXML = "<tcConsultaExistenciaNota>";
                $MensagemXML .= "<tsCodCadBic>1</tsCodCadBic>";
                $MensagemXML .= "<tsChvAcs>[CAMPO_CHAVE_DE_ACESSO]</tsChvAcs>";
                $MensagemXML .= "<tsNumDocTmd>[CAMPO_CNPJ_TOMADOR]</tsNumDocTmd>";
                $MensagemXML .= "<tsDatEms>[CAMPO_DATA_EMISSAO]</tsDatEms>";
                $MensagemXML .= "<tsVlrSvc>[CAMPO_VALOR_SERVICOS]</tsVlrSvc>";
                $MensagemXML .= "</tcConsultaExistenciaNota>";
        }

        return $MensagemXML;
    }
}
