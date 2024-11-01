<?php

namespace App\Services\Towns\Etransparencia;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Enums\MotivosCancelamento;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Etransparencia extends LinkTownBase
{

    private static $Codigo_Usuario = 'a5a07214-136a-4254-bad1-0272dc48238018ah24ni0119grav000-ed10--5l';
    private static $Codigo_Contribuinte = '1d658984-9ea7-4cbb-8769-e50f53fdd1f250ah10ni0091grav104-ed28--1l';

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $headerVersion;

    protected static $headers = [];

    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns);
        static::$link = $this->getLinkForIbge($codeIbge);
        self::$url = explode("|", self::$link)[0];
        self::$headerVersion = explode("|", self::$link)[1] ?? null;
    }

    public static function cancelarNotaEletronica(
        string $serieNota,
        string $numeroNota,
        string $serieRps,
        string $numeroRps,
        string $valorNota,
        MotivosCancelamento $motivoCancelamento,
        string $cancelarGuia
    ): string | int {

        $operacao = 'CANCELANOTAELETRONICA';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();

        $dataMsg = Str::replace('[CAMPO_CODIGO_USUARIO]', self::$Codigo_Usuario, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CONTRIBUINTE]', self::$Codigo_Contribuinte, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_SERIE_NOTA]', $serieNota, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_NOTA]', $numeroNota, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_SERIE_RPS]', $serieRps, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_RPS]', $numeroRps, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_VALOR_NOTA]', $valorNota, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_MOTIVO_CANCELAMENTO]', $motivoCancelamento->getLabel(), $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CANCELAR_GUIA]', $cancelarGuia, $dataMsg);

        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function CONSNFSERECEBIDAS(): string | int
    {

        $operacao = 'CONSNFSERECEBIDAS';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CODIGO_USUARIO]', self::$Codigo_Usuario, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CONTRIBUINTE]', self::$Codigo_Contribuinte, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function CONSULTANOTASPROTOCOLO(
        string $numeroProtocolo
    ): string | int {

        $operacao = 'CONSULTANOTASPROTOCOLO';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CODIGO_USUARIO]', self::$Codigo_Usuario, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CONTRIBUINTE]', self::$Codigo_Contribuinte, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_PROTOCOLO]', $numeroProtocolo, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function CONSULTAPROTOCOLO(
        string $numeroProtocolo
    ): string | int {

        $operacao = 'CONSULTAPROTOCOLO';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CODIGO_USUARIO]', self::$Codigo_Usuario, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CONTRIBUINTE]', self::$Codigo_Contribuinte, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_PROTOCOLO]', $numeroProtocolo, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function IMPRESSAOLINKNFSE(
        string $numeroNota,
        string $dataInicio
    ): string | int {

        $operacao = 'IMPRESSAOLINKNFSE';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CODIGO_USUARIO]', self::$Codigo_Usuario, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CONTRIBUINTE]', self::$Codigo_Contribuinte, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_MES_INICIO]', Carbon::parse($dataInicio)->month, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_ANO_INICIO]', Carbon::parse($dataInicio)->year, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_NOTA]', $numeroNota, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function PROCESSARPS(): string | int
    {

        $operacao = 'PROCESSARPS';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CODIGO_USUARIO]', self::$Codigo_Usuario, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CONTRIBUINTE]', self::$Codigo_Contribuinte, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function VERFICARPS(): string | int
    {

        $operacao = 'VERFICARPS';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CODIGO_USUARIO]', self::$Codigo_Usuario, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CONTRIBUINTE]', self::$Codigo_Contribuinte, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function Message_Assemble(): string
    {
        $messageAssemble = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:nfe="NFe">';
        $messageAssemble .= '<soapenv:Header/>';
        $messageAssemble .= '<soapenv:Body>';
        $messageAssemble .= '<nfe:ws_nfe.[Mount_Mensage]>[DadosMsg]</nfe:ws_nfe.[Mount_Mensage]>';
        $messageAssemble .= '</soapenv:Body>';
        $messageAssemble .= '</soapenv:Envelope>';

        return $messageAssemble;
    }

    private static function Compor_MensagemXML(string $type): string
    {
        switch ($type) {
            case 'CANCELANOTAELETRONICA':

                $mensageXML = '<nfe:Sdt_cancelanfe>';
                $mensageXML .= '<nfe:Login>';
                $mensageXML .= '<nfe:CodigoUsuario>[CAMPO_CODIGO_USUARIO]</nfe:CodigoUsuario>';
                $mensageXML .= '<nfe:CodigoContribuinte>[CAMPO_CODIGO_CONTRIBUINTE]</nfe:CodigoContribuinte>';
                $mensageXML .= '</nfe:Login>';
                $mensageXML .= '<nfe:Nota>';
                $mensageXML .= '<nfe:SerieNota>[CAMPO_SERIE_NOTA]</nfe:SerieNota>';
                $mensageXML .= '<nfe:NumeroNota>[CAMPO_NUMERO_NOTA]</nfe:NumeroNota>';
                $mensageXML .= '<nfe:SerieRPS>[CAMPO_SERIE_RPS]</nfe:SerieRPS>';
                $mensageXML .= '<nfe:NumeroRps>[CAMPO_NUMERO_RPS]</nfe:NumeroRps>';
                $mensageXML .= '<nfe:ValorNota>[CAMPO_VALOR_NOTA]</nfe:ValorNota>';
                $mensageXML .= '<nfe:MotivoCancelamento>[CAMPO_MOTIVO_CANCELAMENTO]</nfe:MotivoCancelamento>';
                $mensageXML .= '<nfe:PodeCancelarGuia>[CAMPO_CANCELAR_GUIA]</nfe:PodeCancelarGuia>';
                $mensageXML .= '</nfe:Nota>';
                $mensageXML .= '</nfe:Sdt_cancelanfe>';

            case 'CONSNFSERECEBIDAS':

                $mensageXML = '<nfe:Consnfserecebida_in>';
                $mensageXML .= '<nfe:Login>';
                $mensageXML .= '<nfe:CodigoUsuario>[CAMPO_CODIGO_USUARIO]</nfe:CodigoUsuario>';
                $mensageXML .= '<nfe:CodigoContribuinte>[CAMPO_CODIGO_CONTRIBUINTE]</nfe:CodigoContribuinte>';
                $mensageXML .= '</nfe:Login>';
                $mensageXML .= '<nfe:Pagina>?</nfe:Pagina>';
                $mensageXML .= '<nfe:Filtro>';
                $mensageXML .= '<nfe:CpfCnpjPrestador>?</nfe:CpfCnpjPrestador>';
                $mensageXML .= '<nfe:DtEmissaoDe>?</nfe:DtEmissaoDe>';
                $mensageXML .= '<nfe:DtEmissaoAte>?</nfe:DtEmissaoAte>';
                $mensageXML .= '<nfe:NumeroNotaDe>?</nfe:NumeroNotaDe>';
                $mensageXML .= '<nfe:NumeroNotaAte>?</nfe:NumeroNotaAte>';
                $mensageXML .= '</nfe:Filtro>';
                $mensageXML .= '</nfe:Consnfserecebida_in>';

            case 'CONSULTANOTASPROTOCOLO':

                $mensageXML = '<nfe:Sdt_consultaprotocoloin>';
                $mensageXML .= '<nfe:Protocolo>[CAMPO_NUMERO_PROTOCOLO]</nfe:Protocolo>';
                $mensageXML .= '<nfe:Login>';
                $mensageXML .= '<nfe:CodigoUsuario>[CAMPO_CODIGO_USUARIO]</nfe:CodigoUsuario>';
                $mensageXML .= '<nfe:CodigoContribuinte>[CAMPO_CODIGO_CONTRIBUINTE]</nfe:CodigoContribuinte>';
                $mensageXML .= '</nfe:Login>';
                $mensageXML .= '</nfe:Sdt_consultaprotocoloin>';

            case 'CONSULTAPROTOCOLO':

                $mensageXML = '<nfe:Sdt_consultaprotocoloin>';
                $mensageXML .= '<nfe:Protocolo>[CAMPO_NUMERO_PROTOCOLO]</nfe:Protocolo>';
                $mensageXML .= '<nfe:Login>';
                $mensageXML .= '<nfe:CodigoUsuario>[CAMPO_CODIGO_USUARIO]</nfe:CodigoUsuario>';
                $mensageXML .= '<nfe:CodigoContribuinte>[CAMPO_CODIGO_CONTRIBUINTE]</nfe:CodigoContribuinte>';
                $mensageXML .= '</nfe:Login>';
                $mensageXML .= '</nfe:Sdt_consultaprotocoloin>';

            case 'IMPRESSAOLINKNFSE':

                $mensageXML = '<nfe:Xml_entrada>';
                $mensageXML .= '&lt;SDT_IMPRESSAO_IN xmlns=&quot;NFe&quot;&gt;';
                $mensageXML .= '&lt;Login&gt;';
                $mensageXML .= '&lt;CodigoUsuario&gt;[CAMPO_CODIGO_USUARIO]&lt;/CodigoUsuario&gt;';
                $mensageXML .= '&lt;CodigoContribuinte&gt;[CAMPO_CODIGO_CONTRIBUINTE]&lt;/CodigoContribuinte&gt;';
                $mensageXML .= '&lt;Versao&gt;2.00&lt;/Versao&gt;';
                $mensageXML .= '&lt;/Login&gt;';
                $mensageXML .= '&lt;Nota&gt;';
                $mensageXML .= '&lt;Competencia_Mes&gt;[CAMPO_MES_INICIO]&lt;/Competencia_Mes&gt;';
                $mensageXML .= '&lt;Competencia_Ano&gt;[CAMPO_ANO_INICIO]&lt;/Competencia_Ano&gt;';
                $mensageXML .= '&lt;RPS_Serie&gt;&lt;/RPS_Serie&gt;';
                $mensageXML .= '&lt;RPS_Numero&gt;&lt;/RPS_Numero&gt;';
                $mensageXML .= '&lt;Nota_Serie&gt;NFE&lt;/Nota_Serie&gt;';
                $mensageXML .= '&lt;Nota_Numero&gt;[CAMPO_NUMERO_NOTA]&lt;/Nota_Numero&gt;';
                $mensageXML .= '&lt;/Nota&gt;';
                $mensageXML .= '&lt;/SDT_IMPRESSAO_IN&gt;';
                $mensageXML .= '</nfe:Xml_entrada>';

            case 'PROCESSARPS':

                $mensageXML = '<nfe:Sdt_processarpsin>';
                $mensageXML .= '<nfe:Login>';
                $mensageXML .= '<nfe:CodigoUsuario>[CAMPO_CODIGO_USUARIO]</nfe:CodigoUsuario>';
                $mensageXML .= '<nfe:CodigoContribuinte>[CAMPO_CODIGO_CONTRIBUINTE]</nfe:CodigoContribuinte>';
                $mensageXML .= '</nfe:Login>';
                $mensageXML .= '<nfe:SDTRPS>';
                $mensageXML .= '<nfe:Ano>[CAMPO_ANO_EMISSAO]</nfe:Ano>';
                $mensageXML .= '<nfe:Mes>[CAMPO_MES_EMISSAO]</nfe:Mes>';
                $mensageXML .= '<nfe:CPFCNPJ>[CAMPO_CNPJ]</nfe:CPFCNPJ>';
                $mensageXML .= '<nfe:DTIni>[CAMPO_DATA_EMISSAO]</nfe:DTIni>';
                $mensageXML .= '<nfe:DTFin>[CAMPO_DATA_EMISSAO]</nfe:DTFin>';
                $mensageXML .= '<nfe:TipoTrib>1</nfe:TipoTrib>';
                $mensageXML .= '<nfe:DtAdeSN></nfe:DtAdeSN>';
                $mensageXML .= '<nfe:AlqIssSN_IP></nfe:AlqIssSN_IP>';
                $mensageXML .= '<nfe:Versao>2.00</nfe:Versao>';
                $mensageXML .= '<nfe:Reg20>';
                $mensageXML .= '<nfe:Reg20Item>';
                $mensageXML .= '<nfe:TipoNFS>RPS</nfe:TipoNFS>';
                $mensageXML .= '<nfe:NumRps>[CAMPO_NUMERO_RPS]</nfe:NumRps>';
                $mensageXML .= '<nfe:SerRps>1</nfe:SerRps>';
                $mensageXML .= '<nfe:DtEmi>[CAMPO_EMISSAO_RPS]</nfe:DtEmi>';
                $mensageXML .= '<nfe:RetFonte>NAO</nfe:RetFonte>';
                $mensageXML .= '<nfe:CodSrv>[CAMPO_CODIGO_SERVICO]</nfe:CodSrv>';
                $mensageXML .= '<nfe:DiscrSrv>[CAMPO_DESCRICAO_SERVICO]</nfe:DiscrSrv>';
                $mensageXML .= '<nfe:VlNFS>[CAMPO_VALOR_RPS]</nfe:VlNFS>';
                $mensageXML .= '<nfe:VlDed></nfe:VlDed>';
                $mensageXML .= '<nfe:DiscrDed></nfe:DiscrDed>';
                $mensageXML .= '<nfe:VlBasCalc>[CAMPO_VALOR_RPS]</nfe:VlBasCalc>';
                $mensageXML .= '<nfe:AlqIss>[CAMPO_ALIQUOTA_ISS]</nfe:AlqIss>';
                $mensageXML .= '<nfe:VlIss>[CAMPO_VALOR_ISS]</nfe:VlIss>';
                $mensageXML .= '<nfe:VlIssRet></nfe:VlIssRet>';
                $mensageXML .= '<nfe:CpfCnpTom>[CAMPO_CNPJ_TOMADOR]</nfe:CpfCnpTom>';
                $mensageXML .= '<nfe:RazSocTom>[CAMPO_RAZAO_SOCIAL_TOMADOR]</nfe:RazSocTom>';
                $mensageXML .= '<nfe:TipoLogtom>[CAMPO_TIPO_LOGRADOURO_TOMADOR]</nfe:TipoLogtom>';
                $mensageXML .= '<nfe:LogTom>[CAMPO_LOGRADOURO_TOMADOR]</nfe:LogTom>';
                $mensageXML .= '<nfe:NumEndTom>[CAMPO_NUMERO_TOMADOR]</nfe:NumEndTom>';
                $mensageXML .= '<nfe:ComplEndTom>[CAMPO_COMPLEMENTO_TOMADOR]</nfe:ComplEndTom>';
                $mensageXML .= '<nfe:BairroTom>[CAMPO_BAIRRO_TOMADOR]</nfe:BairroTom>';
                $mensageXML .= '<nfe:MunTom>[CAMPO_MUNICIPIO_TOMADOR]</nfe:MunTom>';
                $mensageXML .= '<nfe:SiglaUFTom>[CAMPO_UF_TOMADOR]</nfe:SiglaUFTom>';
                $mensageXML .= '<nfe:CepTom>[CAMPO_CEP_TOMADOR]</nfe:CepTom>';
                $mensageXML .= '<nfe:Telefone>[CAMPO_TELEFONE_TOMADOR]</nfe:Telefone>';
                $mensageXML .= '<nfe:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL_TOMADOR]</nfe:InscricaoMunicipal>';
                $mensageXML .= '<nfe:TipoLogLocPre></nfe:TipoLogLocPre>';
                $mensageXML .= '<nfe:LogLocPre></nfe:LogLocPre>';
                $mensageXML .= '<nfe:NumEndLocPre></nfe:NumEndLocPre>';
                $mensageXML .= '<nfe:ComplEndLocPre></nfe:ComplEndLocPre>';
                $mensageXML .= '<nfe:BairroLocPre></nfe:BairroLocPre>';
                $mensageXML .= '<nfe:MunLocPre></nfe:MunLocPre>';
                $mensageXML .= '<nfe:SiglaUFLocpre></nfe:SiglaUFLocpre>';
                $mensageXML .= '<nfe:CepLocPre></nfe:CepLocPre>';
                $mensageXML .= '<nfe:Email1></nfe:Email1>';
                $mensageXML .= '<nfe:Email2></nfe:Email2>';
                $mensageXML .= '<nfe:Email3></nfe:Email3>';
                $mensageXML .= '<nfe:Reg30>';
                $mensageXML .= '<nfe:Reg30Item>';
                $mensageXML .= '<nfe:TributoSigla></nfe:TributoSigla>';
                $mensageXML .= '<nfe:TributoAliquota></nfe:TributoAliquota>';
                $mensageXML .= '<nfe:TributoValor></nfe:TributoValor>';
                $mensageXML .= '</nfe:Reg30Item>';
                $mensageXML .= '</nfe:Reg30>';
                $mensageXML .= '</nfe:Reg20Item>';
                $mensageXML .= '</nfe:Reg20>';
                $mensageXML .= '<nfe:Reg90>';
                $mensageXML .= '<nfe:QtdRegNormal>1</nfe:QtdRegNormal>';
                $mensageXML .= '<nfe:ValorNFS></nfe:ValorNFS>';
                $mensageXML .= '<nfe:ValorISS></nfe:ValorISS>';
                $mensageXML .= '<nfe:ValorDed>0,00</nfe:ValorDed>';
                $mensageXML .= '<nfe:ValorIssRetTom>0,00</nfe:ValorIssRetTom>';
                $mensageXML .= '<nfe:QtdReg30></nfe:QtdReg30>';
                $mensageXML .= '<nfe:ValorTributos>0,00</nfe:ValorTributos>';
                $mensageXML .= '</nfe:Reg90>';
                $mensageXML .= '</nfe:SDTRPS>';
                $mensageXML .= '</nfe:Sdt_processarpsin>';

            case 'VERFICARPS':

                $mensageXML = '<nfe:Sdt_processarpsin>';
                $mensageXML .= '<nfe:Login>';
                $mensageXML .= '<nfe:CodigoUsuario>[CAMPO_CODIGO_USUARIO]</nfe:CodigoUsuario>';
                $mensageXML .= '<nfe:CodigoContribuinte>[CAMPO_CODIGO_CONTRIBUINTE]</nfe:CodigoContribuinte>';
                $mensageXML .= '</nfe:Login>';
                $mensageXML .= '<nfe:SDTRPS>';
                $mensageXML .= '<nfe:Ano>?</nfe:Ano>';
                $mensageXML .= '<nfe:Mes>?</nfe:Mes>';
                $mensageXML .= '<nfe:CPFCNPJ>?</nfe:CPFCNPJ>';
                $mensageXML .= '<nfe:DTIni>?</nfe:DTIni>';
                $mensageXML .= '<nfe:DTFin>?</nfe:DTFin>';
                $mensageXML .= '<nfe:TipoTrib>?</nfe:TipoTrib>';
                $mensageXML .= '<nfe:DtAdeSN>?</nfe:DtAdeSN>';
                $mensageXML .= '<nfe:AlqIssSN_IP>?</nfe:AlqIssSN_IP>';
                $mensageXML .= '<nfe:Versao>?</nfe:Versao>';
                $mensageXML .= '<nfe:Reg20>';
                $mensageXML .= '<!--Zero or more repetitions:-->';
                $mensageXML .= '<nfe:Reg20Item>';
                $mensageXML .= '<nfe:TipoNFS>?</nfe:TipoNFS>';
                $mensageXML .= '<nfe:NumRps>?</nfe:NumRps>';
                $mensageXML .= '<nfe:SerRps>?</nfe:SerRps>';
                $mensageXML .= '<nfe:DtEmi>?</nfe:DtEmi>';
                $mensageXML .= '<nfe:RetFonte>?</nfe:RetFonte>';
                $mensageXML .= '<nfe:CodSrv>?</nfe:CodSrv>';
                $mensageXML .= '<nfe:DiscrSrv>?</nfe:DiscrSrv>';
                $mensageXML .= '<nfe:VlNFS>?</nfe:VlNFS>';
                $mensageXML .= '<nfe:VlDed>?</nfe:VlDed>';
                $mensageXML .= '<nfe:DiscrDed>?</nfe:DiscrDed>';
                $mensageXML .= '<nfe:VlBasCalc>?</nfe:VlBasCalc>';
                $mensageXML .= '<nfe:AlqIss>?</nfe:AlqIss>';
                $mensageXML .= '<nfe:VlIss>?</nfe:VlIss>';
                $mensageXML .= '<nfe:VlIssRet>?</nfe:VlIssRet>';
                $mensageXML .= '<nfe:CpfCnpTom>?</nfe:CpfCnpTom>';
                $mensageXML .= '<nfe:RazSocTom>?</nfe:RazSocTom>';
                $mensageXML .= '<nfe:TipoLogtom>?</nfe:TipoLogtom>';
                $mensageXML .= '<nfe:LogTom>?</nfe:LogTom>';
                $mensageXML .= '<nfe:NumEndTom>?</nfe:NumEndTom>';
                $mensageXML .= '<nfe:ComplEndTom>?</nfe:ComplEndTom>';
                $mensageXML .= '<nfe:BairroTom>?</nfe:BairroTom>';
                $mensageXML .= '<nfe:MunTom>?</nfe:MunTom>';
                $mensageXML .= '<nfe:SiglaUFTom>?</nfe:SiglaUFTom>';
                $mensageXML .= '<nfe:CepTom>?</nfe:CepTom>';
                $mensageXML .= '<nfe:Telefone>?</nfe:Telefone>';
                $mensageXML .= '<nfe:InscricaoMunicipal>?</nfe:InscricaoMunicipal>';
                $mensageXML .= '<nfe:TipoLogLocPre>?</nfe:TipoLogLocPre>';
                $mensageXML .= '<nfe:LogLocPre>?</nfe:LogLocPre>';
                $mensageXML .= '<nfe:NumEndLocPre>?</nfe:NumEndLocPre>';
                $mensageXML .= '<nfe:ComplEndLocPre>?</nfe:ComplEndLocPre>';
                $mensageXML .= '<nfe:BairroLocPre>?</nfe:BairroLocPre>';
                $mensageXML .= '<nfe:MunLocPre>?</nfe:MunLocPre>';
                $mensageXML .= '<nfe:SiglaUFLocpre>?</nfe:SiglaUFLocpre>';
                $mensageXML .= '<nfe:CepLocPre>?</nfe:CepLocPre>';
                $mensageXML .= '<nfe:Email1>?</nfe:Email1>';
                $mensageXML .= '<nfe:Email2>?</nfe:Email2>';
                $mensageXML .= '<nfe:Email3>?</nfe:Email3>';
                $mensageXML .= '<nfe:Reg30>';
                $mensageXML .= '<!--Zero or more repetitions:-->';
                $mensageXML .= '<nfe:Reg30Item>';
                $mensageXML .= '<nfe:TributoSigla>?</nfe:TributoSigla>';
                $mensageXML .= '<nfe:TributoAliquota>?</nfe:TributoAliquota>';
                $mensageXML .= '<nfe:TributoValor>?</nfe:TributoValor>';
                $mensageXML .= '</nfe:Reg30Item>';
                $mensageXML .= '</nfe:Reg30>';
                $mensageXML .= '</nfe:Reg20Item>';
                $mensageXML .= '</nfe:Reg20>';
                $mensageXML .= '<nfe:Reg90>';
                $mensageXML .= '<nfe:QtdRegNormal>?</nfe:QtdRegNormal>';
                $mensageXML .= '<nfe:ValorNFS>?</nfe:ValorNFS>';
                $mensageXML .= '<nfe:ValorISS>?</nfe:ValorISS>';
                $mensageXML .= '<nfe:ValorDed>?</nfe:ValorDed>';
                $mensageXML .= '<nfe:ValorIssRetTom>?</nfe:ValorIssRetTom>';
                $mensageXML .= '<nfe:QtdReg30>?</nfe:QtdReg30>';
                $mensageXML .= '<nfe:ValorTributos>?</nfe:ValorTributos>';
                $mensageXML .= '</nfe:Reg90>';
                $mensageXML .= '</nfe:SDTRPS>';
                $mensageXML .= '</nfe:Sdt_processarpsin>';
        }
        return $mensageXML;
    }
}
