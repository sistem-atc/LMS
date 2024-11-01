<?php

namespace App\CityHall\Fi1_Fiorilli;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Fi1_Fiorilli extends LinkTownBase
{

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

    public static function CancelarNfse(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'cancelarNfse';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'consultarLoteRps';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function consultarNfsePorFaixa(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'consultarNfsePorFaixa';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'consultarNfsePorRps';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoPrestado(
        string $cnpj,
        string $dataInicial,
        string $dataFinal,
        string $inscricaoMunicipal,
        string $password,
        int $page = 1
    ): string | int {

        $operacao = 'consultarNfseServicoPrestado';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace("[CAMPO_CNPJ]", $cnpj, $dataMsg);
        $dataMsg = Str::replace("[CAMPO_INSCRICAO_MUNICIPAL]", $inscricaoMunicipal, $dataMsg);
        $dataMsg = Str::replace("[CAMPO_DATA_INICIAL]", Carbon::parse($dataInicial)->format('Y-m-d'), $dataMsg);
        $dataMsg = Str::replace("[CAMPO_DATA_FINAL]", Carbon::parse($dataFinal)->format('Y-m-d'), $dataMsg);
        $dataMsg = Str::replace("[CAMPO_PAGINA]", $page, $dataMsg);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoTomado(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'consultarNfseServicoTomado';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function GerarNfse(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'gerarNfse';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'recepcionarLoteRps';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRpsSincrono(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'recepcionarLoteRpsSincrono';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function SubstituirNfse(
        string $cnpj,
        string $password
    ): string | int {

        $operacao = 'substituirNfse';
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = Str::replace("[Username]", $cnpj, $mountMessage);
        $mountMessage = Str::replace("[Password]", $password, $mountMessage);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(): string
    {
        $assembleMessage = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.issweb.fiorilli.com.br/" xmlns:nfse="http://www.abrasf.org.br/nfse.xsd">';
        $assembleMessage .= '<soapenv:Header/>';
        $assembleMessage .= '<soapenv:Body>';
        $assembleMessage .= '<ws:[Mount_Mensage]>[DadosMsg]';
        $assembleMessage .= '<username>[Username]</username>';
        $assembleMessage .= '<password>[Password]</password>';
        $assembleMessage .= '</ws:[Mount_Mensage]>';
        $assembleMessage .= '</soapenv:Body>';
        $assembleMessage .= '</soapenv:Envelope>';

        return $assembleMessage;
    }

    private static function composeMessage(string $type): string
    {
        switch ($type) {

            case 'cancelarNfse':

                $MensagemXML = '<nfse:CancelarNfseEnvio>';
                $MensagemXML .= '<nfse:Pedido>';
                $MensagemXML .= '<nfse:InfPedidoCancelamento Id="[CAMPO_ID_CANCELAMENTO]">';
                $MensagemXML .= '<nfse:IdentificacaoNfse>';
                $MensagemXML .= '<nfse:Numero>[NUMERO_NOTA]</nfse:Numero>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>';
                $MensagemXML .= '<nfse:CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</nfse:CodigoMunicipio>';
                $MensagemXML .= '</nfse:IdentificacaoNfse>';
                $MensagemXML .= '<nfse:CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</nfse:CodigoCancelamento>';
                $MensagemXML .= '</nfse:InfPedidoCancelamento>';
                $MensagemXML .= '</nfse:Pedido>';
                $MensagemXML .= '</nfse:CancelarNfseEnvio>';

            case 'consultarLoteRps':

                $MensagemXML = '<nfse:ConsultarLoteRpsEnvio>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Protocolo>[CAMPO_PROTOCOLO]</nfse:Protocolo>';
                $MensagemXML .= '</nfse:ConsultarLoteRpsEnvio>';

            case 'consultarNfsePorFaixa':

                $MensagemXML = '<nfse:ConsultarNfseFaixaEnvio>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Faixa>';
                $MensagemXML .= '<nfse:NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</nfse:NumeroNfseInicial>';
                $MensagemXML .= '<nfse:NumeroNfseFinal>[CAMPO_NOTA_FINAL]</nfse:NumeroNfseFinal>';
                $MensagemXML .= '</nfse:Faixa>';
                $MensagemXML .= '<nfse:Pagina>[CAMPO_PAGINA]</nfse:Pagina>';
                $MensagemXML .= '</nfse:ConsultarNfseFaixaEnvio>';

            case 'consultarNfsePorRps':

                $MensagemXML = '<nfse:ConsultarNfseRpsEnvio>';
                $MensagemXML .= '<nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:Numero>[CAMPO_NUMERO_NOTA]</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>[CAMPO_SERIE_NOTA]</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>[CAMPO_TIPO_NOTA]</nfse:Tipo>';
                $MensagemXML .= '</nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '</nfse:ConsultarNfseRpsEnvio>';

            case 'consultarNfseServicoPrestado':

                $MensagemXML = '<nfse:ConsultarNfseServicoPrestadoEnvio>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:PeriodoEmissao>';
                $MensagemXML .= '<nfse:DataInicial>[CAMPO_DATA_INICIAL]</nfse:DataInicial>';
                $MensagemXML .= '<nfse:DataFinal>[CAMPO_DATA_FINAL]</nfse:DataFinal>';
                $MensagemXML .= '</nfse:PeriodoEmissao>';
                $MensagemXML .= '<nfse:Pagina>[CAMPO_PAGINA]</nfse:Pagina>';
                $MensagemXML .= '</nfse:ConsultarNfseServicoPrestadoEnvio>';

            case 'consultarNfseServicoTomado':

                $MensagemXML = '<nfse:ConsultarNfseServicoTomadoEnvio>';
                $MensagemXML .= '<nfse:Consulente>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Consulente>';
                $MensagemXML .= '<nfse:NumeroNfse>[CAMPO_NUMERO_NOTA]</nfse:NumeroNfse>';
                $MensagemXML .= '<nfse:PeriodoEmissao>';
                $MensagemXML .= '<nfse:DataInicial>[CAMPO_DATA_INICIAL]</nfse:DataInicial>';
                $MensagemXML .= '<nfse:DataFinal>[CAMPO_DATA_FINAL]</nfse:DataFinal>';
                $MensagemXML .= '</nfse:PeriodoEmissao>';
                $MensagemXML .= '<nfse:PeriodoCompetencia>';
                $MensagemXML .= '<nfse:DataInicial>[CAMPO_DATA_INICIAL]</nfse:DataInicial>';
                $MensagemXML .= '<nfse:DataFinal>[CAMPO_DATA_FINAL]</nfse:DataFinal>';
                $MensagemXML .= '</nfse:PeriodoCompetencia>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Tomador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Tomador>';
                $MensagemXML .= '<nfse:Intermediario>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Intermediario>';
                $MensagemXML .= '<nfse:Pagina>?</nfse:Pagina>';
                $MensagemXML .= '</nfse:ConsultarNfseServicoTomadoEnvio>';

            case 'gerarNfse':

                $MensagemXML = '<nfse:GerarNfseEnvio>';
                $MensagemXML .= '<nfse:Rps>';
                $MensagemXML .= '<nfse:InfDeclaracaoPrestacaoServico Id="?">';
                $MensagemXML .= '<nfse:Rps Id="?">';
                $MensagemXML .= '<nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:DataEmissao>?</nfse:DataEmissao>';
                $MensagemXML .= '<nfse:Status>?</nfse:Status>';
                $MensagemXML .= '<nfse:RpsSubstituido>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:RpsSubstituido>';
                $MensagemXML .= '</nfse:Rps>';
                $MensagemXML .= '<nfse:Competencia>?</nfse:Competencia>';
                $MensagemXML .= '<nfse:Servico>';
                $MensagemXML .= '<nfse:Valores>';
                $MensagemXML .= '<nfse:ValorServicos>?</nfse:ValorServicos>';
                $MensagemXML .= '<nfse:ValorDeducoes>?</nfse:ValorDeducoes>';
                $MensagemXML .= '<nfse:ValorPis>?</nfse:ValorPis>';
                $MensagemXML .= '<nfse:ValorCofins>?</nfse:ValorCofins>';
                $MensagemXML .= '<nfse:ValorInss>?</nfse:ValorInss>';
                $MensagemXML .= '<nfse:ValorIr>?</nfse:ValorIr>';
                $MensagemXML .= '<nfse:ValorCsll>?</nfse:ValorCsll>';
                $MensagemXML .= '<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>';
                $MensagemXML .= '<nfse:ValorIss>?</nfse:ValorIss>';
                $MensagemXML .= '<nfse:Aliquota>?</nfse:Aliquota>';
                $MensagemXML .= '<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>';
                $MensagemXML .= '<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>';
                $MensagemXML .= '</nfse:Valores>';
                $MensagemXML .= '<nfse:IssRetido>?</nfse:IssRetido>';
                $MensagemXML .= '<nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>';
                $MensagemXML .= '<nfse:ItemListaServico>?</nfse:ItemListaServico>';
                $MensagemXML .= '<nfse:CodigoCnae>?</nfse:CodigoCnae>';
                $MensagemXML .= '<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>';
                $MensagemXML .= '<nfse:Discriminacao>?</nfse:Discriminacao>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>';
                $MensagemXML .= '<nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>';
                $MensagemXML .= '<nfse:NumeroProcesso>?</nfse:NumeroProcesso>';
                $MensagemXML .= '</nfse:Servico>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Tomador>';
                $MensagemXML .= '<nfse:IdentificacaoTomador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoTomador>';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '<nfse:Endereco>';
                $MensagemXML .= '<nfse:Endereco>?</nfse:Endereco>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Complemento>?</nfse:Complemento>';
                $MensagemXML .= '<nfse:Bairro>?</nfse:Bairro>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<nfse:Uf>?</nfse:Uf>';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<nfse:Cep>?</nfse:Cep>';
                $MensagemXML .= '</nfse:Endereco>';
                $MensagemXML .= '<nfse:Contato>';
                $MensagemXML .= '<nfse:Telefone>?</nfse:Telefone>';
                $MensagemXML .= '<nfse:Email>?</nfse:Email>';
                $MensagemXML .= '</nfse:Contato>';
                $MensagemXML .= '</nfse:Tomador>';
                $MensagemXML .= '<nfse:Intermediario>';
                $MensagemXML .= '<nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '</nfse:Intermediario>';
                $MensagemXML .= '<nfse:ConstrucaoCivil>';
                $MensagemXML .= '<nfse:CodigoObra>?</nfse:CodigoObra>';
                $MensagemXML .= '<nfse:Art>?</nfse:Art>';
                $MensagemXML .= '</nfse:ConstrucaoCivil>';
                $MensagemXML .= '<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>';
                $MensagemXML .= '<nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>';
                $MensagemXML .= '<nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>';
                $MensagemXML .= '</nfse:InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</nfse:Rps>';
                $MensagemXML .= '</nfse:GerarNfseEnvio>';

            case 'recepcionarLoteRps':

                $MensagemXML = '<nfse:EnviarLoteRpsEnvio>';
                $MensagemXML .= '<nfse:LoteRps Id="?" versao="?">';
                $MensagemXML .= '<nfse:NumeroLote>?</nfse:NumeroLote>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '<nfse:QuantidadeRps>?</nfse:QuantidadeRps>';
                $MensagemXML .= '<nfse:ListaRps>';
                $MensagemXML .= '<nfse:Rps>';
                $MensagemXML .= '<nfse:InfDeclaracaoPrestacaoServico Id="?">';
                $MensagemXML .= '<nfse:Rps Id="?">';
                $MensagemXML .= '<nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:DataEmissao>?</nfse:DataEmissao>';
                $MensagemXML .= '<nfse:Status>?</nfse:Status>';
                $MensagemXML .= '<nfse:RpsSubstituido>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:RpsSubstituido>';
                $MensagemXML .= '</nfse:Rps>';
                $MensagemXML .= '<nfse:Competencia>?</nfse:Competencia>';
                $MensagemXML .= '<nfse:Servico>';
                $MensagemXML .= '<nfse:Valores>';
                $MensagemXML .= '<nfse:ValorServicos>?</nfse:ValorServicos>';
                $MensagemXML .= '<nfse:ValorDeducoes>?</nfse:ValorDeducoes>';
                $MensagemXML .= '<nfse:ValorPis>?</nfse:ValorPis>';
                $MensagemXML .= '<nfse:ValorCofins>?</nfse:ValorCofins>';
                $MensagemXML .= '<nfse:ValorInss>?</nfse:ValorInss>';
                $MensagemXML .= '<nfse:ValorIr>?</nfse:ValorIr>';
                $MensagemXML .= '<nfse:ValorCsll>?</nfse:ValorCsll>';
                $MensagemXML .= '<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>';
                $MensagemXML .= '<nfse:ValorIss>?</nfse:ValorIss>';
                $MensagemXML .= '<nfse:Aliquota>?</nfse:Aliquota>';
                $MensagemXML .= '<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>';
                $MensagemXML .= '<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>';
                $MensagemXML .= '</nfse:Valores>';
                $MensagemXML .= '<nfse:IssRetido>?</nfse:IssRetido>';
                $MensagemXML .= '<nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>';
                $MensagemXML .= '<nfse:ItemListaServico>?</nfse:ItemListaServico>';
                $MensagemXML .= '<nfse:CodigoCnae>?</nfse:CodigoCnae>';
                $MensagemXML .= '<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>';
                $MensagemXML .= '<nfse:Discriminacao>?</nfse:Discriminacao>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>';
                $MensagemXML .= '<nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>';
                $MensagemXML .= '<nfse:NumeroProcesso>?</nfse:NumeroProcesso>';
                $MensagemXML .= '</nfse:Servico>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Tomador>';
                $MensagemXML .= '<nfse:IdentificacaoTomador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoTomador>';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '<nfse:Endereco>';
                $MensagemXML .= '<nfse:Endereco>?</nfse:Endereco>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Complemento>?</nfse:Complemento>';
                $MensagemXML .= '<nfse:Bairro>?</nfse:Bairro>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<nfse:Uf>?</nfse:Uf>';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<nfse:Cep>?</nfse:Cep>';
                $MensagemXML .= '</nfse:Endereco>';
                $MensagemXML .= '<nfse:Contato>';
                $MensagemXML .= '<nfse:Telefone>?</nfse:Telefone>';
                $MensagemXML .= '<nfse:Email>?</nfse:Email>';
                $MensagemXML .= '</nfse:Contato>';
                $MensagemXML .= '</nfse:Tomador>';
                $MensagemXML .= '<nfse:Intermediario>';
                $MensagemXML .= '<nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '</nfse:Intermediario>';
                $MensagemXML .= '<nfse:ConstrucaoCivil>';
                $MensagemXML .= '<nfse:CodigoObra>?</nfse:CodigoObra>';
                $MensagemXML .= '<nfse:Art>?</nfse:Art>';
                $MensagemXML .= '</nfse:ConstrucaoCivil>';
                $MensagemXML .= '<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>';
                $MensagemXML .= '<nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>';
                $MensagemXML .= '<nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>';
                $MensagemXML .= '</nfse:InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</nfse:Rps>';
                $MensagemXML .= '</nfse:ListaRps>';
                $MensagemXML .= '</nfse:LoteRps>';
                $MensagemXML .= '</nfse:EnviarLoteRpsEnvio>';

            case 'recepcionarLoteRpsSincrono':

                $MensagemXML = '<nfse:EnviarLoteRpsSincronoEnvio>';
                $MensagemXML .= '<nfse:LoteRps Id="?" versao="?">';
                $MensagemXML .= '<nfse:NumeroLote>?</nfse:NumeroLote>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '<nfse:QuantidadeRps>?</nfse:QuantidadeRps>';
                $MensagemXML .= '<nfse:ListaRps>';
                $MensagemXML .= '<nfse:Rps>';
                $MensagemXML .= '<nfse:InfDeclaracaoPrestacaoServico Id="?">';
                $MensagemXML .= '<nfse:Rps Id="?">';
                $MensagemXML .= '<nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:DataEmissao>?</nfse:DataEmissao>';
                $MensagemXML .= '<nfse:Status>?</nfse:Status>';
                $MensagemXML .= '<nfse:RpsSubstituido>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:RpsSubstituido>';
                $MensagemXML .= '</nfse:Rps>';
                $MensagemXML .= '<nfse:Competencia>?</nfse:Competencia>';
                $MensagemXML .= '<nfse:Servico>';
                $MensagemXML .= '<nfse:Valores>';
                $MensagemXML .= '<nfse:ValorServicos>?</nfse:ValorServicos>';
                $MensagemXML .= '<nfse:ValorDeducoes>?</nfse:ValorDeducoes>';
                $MensagemXML .= '<nfse:ValorPis>?</nfse:ValorPis>';
                $MensagemXML .= '<nfse:ValorCofins>?</nfse:ValorCofins>';
                $MensagemXML .= '<nfse:ValorInss>?</nfse:ValorInss>';
                $MensagemXML .= '<nfse:ValorIr>?</nfse:ValorIr>';
                $MensagemXML .= '<nfse:ValorCsll>?</nfse:ValorCsll>';
                $MensagemXML .= '<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>';
                $MensagemXML .= '<nfse:ValorIss>?</nfse:ValorIss>';
                $MensagemXML .= '<nfse:Aliquota>?</nfse:Aliquota>';
                $MensagemXML .= '<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>';
                $MensagemXML .= '<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>';
                $MensagemXML .= '</nfse:Valores>';
                $MensagemXML .= '<nfse:IssRetido>?</nfse:IssRetido>';
                $MensagemXML .= '<nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>';
                $MensagemXML .= '<nfse:ItemListaServico>?</nfse:ItemListaServico>';
                $MensagemXML .= '<nfse:CodigoCnae>?</nfse:CodigoCnae>';
                $MensagemXML .= '<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>';
                $MensagemXML .= '<nfse:Discriminacao>?</nfse:Discriminacao>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>';
                $MensagemXML .= '<nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>';
                $MensagemXML .= '<nfse:NumeroProcesso>?</nfse:NumeroProcesso>';
                $MensagemXML .= '</nfse:Servico>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<nfse:Tomador>';
                $MensagemXML .= '<nfse:IdentificacaoTomador>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoTomador>';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '<nfse:Endereco>';
                $MensagemXML .= '<nfse:Endereco>?</nfse:Endereco>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Complemento>?</nfse:Complemento>';
                $MensagemXML .= '<nfse:Bairro>?</nfse:Bairro>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<nfse:Uf>?</nfse:Uf>';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<nfse:Cep>?</nfse:Cep>';
                $MensagemXML .= '</nfse:Endereco>';
                $MensagemXML .= '<nfse:Contato>';
                $MensagemXML .= '<nfse:Telefone>?</nfse:Telefone>';
                $MensagemXML .= '<nfse:Email>?</nfse:Email>';
                $MensagemXML .= '</nfse:Contato>';
                $MensagemXML .= '</nfse:Tomador>';
                $MensagemXML .= '<nfse:Intermediario>';
                $MensagemXML .= '<nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '</nfse:Intermediario>';
                $MensagemXML .= '<nfse:ConstrucaoCivil>';
                $MensagemXML .= '<nfse:CodigoObra>?</nfse:CodigoObra>';
                $MensagemXML .= '<nfse:Art>?</nfse:Art>';
                $MensagemXML .= '</nfse:ConstrucaoCivil>';
                $MensagemXML .= '<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>';
                $MensagemXML .= '<nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>';
                $MensagemXML .= '<nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>';
                $MensagemXML .= '</nfse:InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</nfse:Rps>';
                $MensagemXML .= '</nfse:ListaRps>';
                $MensagemXML .= '</nfse:LoteRps>';
                $MensagemXML .= '</nfse:EnviarLoteRpsSincronoEnvio>';

            case 'substituirNfse':

                $MensagemXML = '<nfse:SubstituirNfseEnvio>';
                $MensagemXML .= '<nfse:SubstituicaoNfse Id="?">';
                $MensagemXML .= '<nfse:Pedido>';
                $MensagemXML .= '<nfse:InfPedidoCancelamento Id="?">';
                $MensagemXML .= '<nfse:IdentificacaoNfse>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '</nfse:IdentificacaoNfse>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CodigoCancelamento>?</nfse:CodigoCancelamento>';
                $MensagemXML .= '</nfse:InfPedidoCancelamento>';
                $MensagemXML .= '</nfse:Pedido>';
                $MensagemXML .= '<nfse:Rps>';
                $MensagemXML .= '<nfse:InfDeclaracaoPrestacaoServico Id="?">';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Rps Id="?">';
                $MensagemXML .= '<nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:IdentificacaoRps>';
                $MensagemXML .= '<nfse:DataEmissao>?</nfse:DataEmissao>';
                $MensagemXML .= '<nfse:Status>?</nfse:Status>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:RpsSubstituido>';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<nfse:Serie>?</nfse:Serie>';
                $MensagemXML .= '<nfse:Tipo>?</nfse:Tipo>';
                $MensagemXML .= '</nfse:RpsSubstituido>';
                $MensagemXML .= '</nfse:Rps>';
                $MensagemXML .= '<nfse:Competencia>?</nfse:Competencia>';
                $MensagemXML .= '<nfse:Servico>';
                $MensagemXML .= '<nfse:Valores>';
                $MensagemXML .= '<nfse:ValorServicos>?</nfse:ValorServicos>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ValorDeducoes>?</nfse:ValorDeducoes>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ValorPis>?</nfse:ValorPis>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ValorCofins>?</nfse:ValorCofins>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ValorInss>?</nfse:ValorInss>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ValorIr>?</nfse:ValorIr>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ValorCsll>?</nfse:ValorCsll>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ValorIss>?</nfse:ValorIss>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Aliquota>?</nfse:Aliquota>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>';
                $MensagemXML .= '</nfse:Valores>';
                $MensagemXML .= '<nfse:IssRetido>?</nfse:IssRetido>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>';
                $MensagemXML .= '<nfse:ItemListaServico>?</nfse:ItemListaServico>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CodigoCnae>?</nfse:CodigoCnae>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>';
                $MensagemXML .= '<nfse:Discriminacao>?</nfse:Discriminacao>';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:NumeroProcesso>?</nfse:NumeroProcesso>';
                $MensagemXML .= '</nfse:Servico>';
                $MensagemXML .= '<nfse:Prestador>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:Prestador>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Tomador>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:IdentificacaoTomador>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoTomador>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Endereco>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Endereco>?</nfse:Endereco>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Numero>?</nfse:Numero>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Complemento>?</nfse:Complemento>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Bairro>?</nfse:Bairro>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Uf>?</nfse:Uf>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CodigoPais>?</nfse:CodigoPais>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cep>?</nfse:Cep>';
                $MensagemXML .= '</nfse:Endereco>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Contato>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Telefone>?</nfse:Telefone>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Email>?</nfse:Email>';
                $MensagemXML .= '</nfse:Contato>';
                $MensagemXML .= '</nfse:Tomador>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Intermediario>';
                $MensagemXML .= '<nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cpf>?</nfse:Cpf>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:Cnpj>?</nfse:Cnpj>';
                $MensagemXML .= '</nfse:CpfCnpj>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>';
                $MensagemXML .= '</nfse:IdentificacaoIntermediario>';
                $MensagemXML .= '<nfse:RazaoSocial>?</nfse:RazaoSocial>';
                $MensagemXML .= '</nfse:Intermediario>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:ConstrucaoCivil>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:CodigoObra>?</nfse:CodigoObra>';
                $MensagemXML .= '<nfse:Art>?</nfse:Art>';
                $MensagemXML .= '</nfse:ConstrucaoCivil>';
                $MensagemXML .= '<!--Optional:-->';
                $MensagemXML .= '<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>';
                $MensagemXML .= '<nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>';
                $MensagemXML .= '<nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>';
                $MensagemXML .= '</nfse:InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</nfse:SubstituirNfseEnvio>';
        }

        return $MensagemXML;
    }
}
