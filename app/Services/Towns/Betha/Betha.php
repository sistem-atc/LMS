<?php

namespace App\Services\Towns\Betha;

use Illuminate\Support\Str;
use App\Enums\MotivosCancelamento;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Betha extends LinkTownBase
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
        string $Numero_Nota_Fiscal,
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Codigo_Municipal,
        MotivosCancelamento $Codigo_Cancelamento
    ): ?string {

        $operacao = 'CancelarNfse';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_NUMERO_NF]', $Numero_Nota_Fiscal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_MUNICIPIO]', $Codigo_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CODIGO_CANCELAMENTO]', $Codigo_Cancelamento[0], $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Protocolo
    ): ?string {

        $operacao = 'ConsultarLoteRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_PROTOCOLO]', $Protocolo, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseFaixa(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Nota_Inicial
    ): ?string {

        $operacao = 'ConsultarNfseFaixa';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NOTA_INICIAL]', $Nota_Inicial, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps(
        string $Numero_RPS,
        string $Serie_RPS,
        string $Tipo_RPS,
        string $CNPJ,
        string $Inscricao_Municipal
    ): ?string {

        $operacao = 'ConsultarNfsePorRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_NUMERO_RPS]', $Numero_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_SERIE_RPS]', $Serie_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_TIPO_RPS]', $Tipo_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoPrestado(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Data_Inicial,
        string $Data_Final
    ): ?string {

        $operacao = 'ConsultarNfseServicoPrestado';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_INICIAL]', date("Ymd", strtotime($Data_Inicial)), $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_FINAL]', date("Ymd", strtotime($Data_Final)), $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoTomado(
        string $CNPJ
    ): ?string {

        $operacao = 'ConsultarNfseServicoTomado';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function GerarNfse(
        string $CNPJ
    ): ?string {

        $operacao = 'GerarNfse';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps(
        string $CNPJ
    ): ?string {

        $operacao = 'RecepcionarLoteRps';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRpsSincrono(
        string $CNPJ
    ): ?string {

        $operacao = 'RecepcionarLoteRpsSincrono';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function SubstituirNfse(
        string $CNPJ
    ): ?string {

        $operacao = 'SubstituirNfse';
        $headMsg = self::composeHeader(self::$headerVersion);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[CabecMsg]', $headMsg, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(): ?string
    {

        $assembleMessage_ = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:e="http://www.betha.com.br/e-nota-contribuinte-ws">';
        $assembleMessage_ .= '<soapenv:Header/>';
        $assembleMessage_ .= '<soapenv:Body>';
        $assembleMessage_ .= '<e:[Mount_Mensage]>';
        $assembleMessage_ .= '<nfseCabecMsg><![CDATA[[CabecMsg]]]></nfseCabecMsg>';
        $assembleMessage_ .= '<nfseDadosMsg><![CDATA[[DadosMsg]]]></nfseDadosMsg>';
        $assembleMessage_ .= '</e:[Mount_Mensage]>';
        $assembleMessage_ .= '</soapenv:Body>';
        $assembleMessage_ .= '</soapenv:Envelope>';

        return $assembleMessage_;
    }

    private static function composeMessage(string $Tipo): ?string
    {

        $MensagemXML = '';

        switch ($Tipo) {

            case 'CancelarNfse':

                $MensagemXML = '<CancelarNfseEnvio xmlns = "http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<Pedido>';
                $MensagemXML .= '<InfPedidoCancelamento Id="1">';
                $MensagemXML .= '<IdentificacaoNfse>';
                $MensagemXML .= '<Numero>[CAMPO_NUMERO_NF]</Numero>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '<CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</CodigoMunicipio>';
                $MensagemXML .= '</IdentificacaoNfse>';
                $MensagemXML .= '<CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</CodigoCancelamento>';
                $MensagemXML .= '</InfPedidoCancelamento>';
                $MensagemXML .= '</Pedido>';
                $MensagemXML .= '</CancelarNfseEnvio>';

            case 'ConsultarLoteRps':

                $MensagemXML = '<ConsultarLoteRpsEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Protocolo>[CAMPO_PROTOCOLO]</Protocolo>';
                $MensagemXML .= '</ConsultarLoteRpsEnvio>';

            case 'ConsultarNfseFaixa':

                $MensagemXML = '<ConsultarNfseFaixaEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Faixa>';
                $MensagemXML .= '<NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</NumeroNfseInicial>';
                $MensagemXML .= '</Faixa>';
                $MensagemXML .= '<Pagina>1</Pagina>';
                $MensagemXML .= '</ConsultarNfseFaixaEnvio>';

            case 'ConsultarNfsePorRps':

                $MensagemXML = '<ConsultarNfseRpsEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>[CAMPO_NUMERO_RPS]</Numero>';
                $MensagemXML .= '<Serie>[CAMPO_SERIE_RPS]</Serie>';
                $MensagemXML .= '<Tipo>[CAMPO_TIPO_RPS]</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '</ConsultarNfseRpsEnvio>';

            case 'ConsultarNfseServicoPrestado':

                $MensagemXML = '<ConsultarNfseServicoPrestadoEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<PeriodoEmissao>';
                $MensagemXML .= '<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>';
                $MensagemXML .= '<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>';
                $MensagemXML .= '</PeriodoEmissao>';
                $MensagemXML .= '<Pagina>1</Pagina>';
                $MensagemXML .= '</ConsultarNfseServicoPrestadoEnvio>';

            case 'ConsultarNfseServicoTomado':

                $MensagemXML = '<ConsultarNfseServicoTomadoEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<Consulente>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Consulente>';
                $MensagemXML .= '<NumeroNfse>[NUMERO_NOTA_FISCAL]</NumeroNfse>';
                $MensagemXML .= '<PeriodoEmissao>';
                $MensagemXML .= '<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>';
                $MensagemXML .= '<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>';
                $MensagemXML .= '</PeriodoEmissao>';
                $MensagemXML .= '<PeriodoCompetencia>';
                $MensagemXML .= '<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>';
                $MensagemXML .= '<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>';
                $MensagemXML .= '</PeriodoCompetencia>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<Intermediario>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Intermediario>';
                $MensagemXML .= '<Pagina>1</Pagina>';
                $MensagemXML .= '</ConsultarNfseServicoTomadoEnvio>';

            case 'GerarNfse':

                $MensagemXML = '<GerarNfseEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfDeclaracaoPrestacaoServico  Id="lote">';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>[NUMERO_LOTE]</Numero>';
                $MensagemXML .= '<Serie>[SERIE_LOTE]</Serie>';
                $MensagemXML .= '<Tipo>[TIPO_LOTE]</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao>[CAMPO_DATA_EMISSAO]</DataEmissao>';
                $MensagemXML .= '<Status>[STATUS]</Status>';
                $MensagemXML .= '<RpsSubstituido>';
                $MensagemXML .= '<Numero>[NUMERO_NOTA_FISCAL]</Numero>';
                $MensagemXML .= '<Serie>[SERIE_NOTA_FISCAL]</Serie>';
                $MensagemXML .= '<Tipo>[TIPO_NOTA_FISCAL]</Tipo>';
                $MensagemXML .= '</RpsSubstituido>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '<Competencia>[COMPETENCIA]</Competencia>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos>[VALOR_SERVICOS]</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>[VALOR_DEDUCOES]</ValorDeducoes>';
                $MensagemXML .= '<ValorPis>[VALOR_PIS]</ValorPis>';
                $MensagemXML .= '<ValorCofins>[VALOR_COFINS]</ValorCofins>';
                $MensagemXML .= '<ValorInss>[VALOR_INSS]</ValorInss>';
                $MensagemXML .= '<ValorIr>[VALOR_IR]</ValorIr>';
                $MensagemXML .= '<ValorCsll>[VALOR_CSLL]</ValorCsll>';
                $MensagemXML .= '<OutrasRetencoes>[OUTRAS_RETENCOES]</OutrasRetencoes>';
                $MensagemXML .= '<ValorIss>[VALOR_ISS]</ValorIss>';
                $MensagemXML .= '<Aliquota>[ALIQUOTA]</Aliquota>';
                $MensagemXML .= '<DescontoIncondicionado>[DESCONTO_INCONDICIONADO]</DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado>[DESCONTO_CONDICIONADO]</DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<IssRetido>[ISS_RETIDO]</IssRetido>';
                $MensagemXML .= '<ResponsavelRetencao>[RESPONSAVEL_RETENCAO]</ResponsavelRetencao>';
                $MensagemXML .= '<ItemListaServico>[ITENS_LISTA_SERVICO]</ItemListaServico>';
                $MensagemXML .= '<CodigoCnae>[CODIGO_CNAE]</CodigoCnae>';
                $MensagemXML .= '<CodigoTributacaoMunicipio>[CODIGO_TRIBUTACAO]</CodigoTributacaoMunicipio>';
                $MensagemXML .= '<Discriminacao>[DESCRIMINICAO]</Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio>[CODIGO_MUNICIPIO]</CodigoMunicipio>';
                $MensagemXML .= '<CodigoPais>[CODIGO_PAIS]</CodigoPais>';
                $MensagemXML .= '<ExigibilidadeIss>[EXIGIBILIDADE_ISS]</ExigibilidadeIss>';
                $MensagemXML .= '<MunicipioIncidencia>[MUNICIPIO_INCIDENCIA]</MunicipioIncidencia>';
                $MensagemXML .= '<NumeroProcesso>[NUMERO_PROCESSO]</NumeroProcesso>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CNPJ_PRESTADOR]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[INSCRICAO_MUNICIPAL_PRESTADOR]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CNPJ_TOMADOR]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[INSCRICAO_MUNICIPAL_TOMADOR]</InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial>[RAZAO_SOCIAL_TOMADOR]</RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco>[ENDERECO_TOMADOR]</Endereco>';
                $MensagemXML .= '<Numero>[NUMERO_TOMADOR]</Numero>';
                $MensagemXML .= '<Complemento>[COMPLEMENTO_TOMADOR]</Complemento>';
                $MensagemXML .= '<Bairro>[BAIRRO_TOMADOR]</Bairro>';
                $MensagemXML .= '<CodigoMunicipio>[CODIGO_MUNICIPIO_TOMADOR]</CodigoMunicipio>';
                $MensagemXML .= '<Uf>[UF_TOMADOR]</Uf>';
                $MensagemXML .= '<CodigoPais>[CODIGO_PAIS_TOMADOR]</CodigoPais>';
                $MensagemXML .= '<Cep>[CEP_TOMADOR]</Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone>[TELEFONE_TOMADOR]</Telefone>';
                $MensagemXML .= '<Email>[EMAIL_TOMADOR]</Email>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<Intermediario>';
                $MensagemXML .= '<IdentificacaoIntermediario>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CNPJ_INTERMEDIARIO]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[INSCRICAO_MUNICIPAL_INTERMEDIARIO]</InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoIntermediario>';
                $MensagemXML .= '<RazaoSocial>[RAZAO_SOCIAL_INTERMEDIARIO]</RazaoSocial>';
                $MensagemXML .= '</Intermediario>';
                $MensagemXML .= '<ConstrucaoCivil>';
                $MensagemXML .= '<CodigoObra>[CODIGO_OBRA]</CodigoObra>';
                $MensagemXML .= '<Art>[ART]</Art>';
                $MensagemXML .= '</ConstrucaoCivil>';
                $MensagemXML .= '<RegimeEspecialTributacao>[REGIME_ESPECIAL_TRIBUTACAO]</RegimeEspecialTributacao>';
                $MensagemXML .= '<OptanteSimplesNacional>[SIMPLES_NACIONAL]</OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivoFiscal>[INCENTIVO_FISCAL]</IncentivoFiscal>';
                $MensagemXML .= '</InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</GerarNfseEnvio>';

            case 'RecepcionarLoteRps':

                $MensagemXML = '<RecepcionarLoteRpsEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<LoteRps  Id="numero_lote" versao="2.02">';
                $MensagemXML .= '<NumeroLote></NumeroLote>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '<QuantidadeRps></QuantidadeRps>';
                $MensagemXML .= '<ListaRps>';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfDeclaracaoPrestacaoServico  Id="numero_rps">';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Serie></Serie>';
                $MensagemXML .= '<Tipo></Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao></DataEmissao>';
                $MensagemXML .= '<Status></Status>';
                $MensagemXML .= '<RpsSubstituido>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Serie></Serie>';
                $MensagemXML .= '<Tipo></Tipo>';
                $MensagemXML .= '</RpsSubstituido>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '<Competencia></Competencia>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos></ValorServicos>';
                $MensagemXML .= '<ValorDeducoes></ValorDeducoes>';
                $MensagemXML .= '<ValorPis></ValorPis>';
                $MensagemXML .= '<ValorCofins></ValorCofins>';
                $MensagemXML .= '<ValorInss></ValorInss>';
                $MensagemXML .= '<ValorIr></ValorIr>';
                $MensagemXML .= '<ValorCsll></ValorCsll>';
                $MensagemXML .= '<OutrasRetencoes></OutrasRetencoes>';
                $MensagemXML .= '<ValorIss></ValorIss>';
                $MensagemXML .= '<Aliquota></Aliquota>';
                $MensagemXML .= '<DescontoIncondicionado></DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado></DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<IssRetido></IssRetido>';
                $MensagemXML .= '<ResponsavelRetencao></ResponsavelRetencao>';
                $MensagemXML .= '<ItemListaServico></ItemListaServico>';
                $MensagemXML .= '<CodigoCnae></CodigoCnae>';
                $MensagemXML .= '<CodigoTributacaoMunicipio></CodigoTributacaoMunicipio>';
                $MensagemXML .= '<Discriminacao></Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio></CodigoMunicipio>';
                $MensagemXML .= '<CodigoPais></CodigoPais>';
                $MensagemXML .= '<ExigibilidadeISS></ExigibilidadeISS>';
                $MensagemXML .= '<MunicipioIncidencia></MunicipioIncidencia>';
                $MensagemXML .= '<NumeroProcesso></NumeroProcesso>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial></RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco></Endereco>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Complemento></Complemento>';
                $MensagemXML .= '<Bairro></Bairro>';
                $MensagemXML .= '<CodigoMunicipio></CodigoMunicipio>';
                $MensagemXML .= '<Uf></Uf>';
                $MensagemXML .= '<CodigoPais></CodigoPais>';
                $MensagemXML .= '<Cep></Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone></Telefone>';
                $MensagemXML .= '<Email></Email>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<Intermediario>';
                $MensagemXML .= '<IdentificacaoIntermediario>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoIntermediario>';
                $MensagemXML .= '<RazaoSocial></RazaoSocial>';
                $MensagemXML .= '</Intermediario>';
                $MensagemXML .= '<ConstrucaoCivil>';
                $MensagemXML .= '<CodigoObra></CodigoObra>';
                $MensagemXML .= '<Art></Art>';
                $MensagemXML .= '</ConstrucaoCivil>';
                $MensagemXML .= '<RegimeEspecialTributacao></RegimeEspecialTributacao>';
                $MensagemXML .= '<OptanteSimplesNacional></OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivoFiscal></IncentivoFiscal>';
                $MensagemXML .= '</InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</ListaRps>';
                $MensagemXML .= '</LoteRps>';
                $MensagemXML .= '</EnviarLoteRpsEnvio>';

            case 'RecepcionarLoteRpsSincrono':

                $MensagemXML = '<RecepcionarLoteRpsSincronoEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<LoteRps  Id="lote" versao="2.02">';
                $MensagemXML .= '<NumeroLote></NumeroLote>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '<QuantidadeRps></QuantidadeRps>';
                $MensagemXML .= '<ListaRps>';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfDeclaracaoPrestacaoServico  Id="lote">';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Serie></Serie>';
                $MensagemXML .= '<Tipo></Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao></DataEmissao>';
                $MensagemXML .= '<Status></Status>';
                $MensagemXML .= '<RpsSubstituido>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Serie></Serie>';
                $MensagemXML .= '<Tipo></Tipo>';
                $MensagemXML .= '</RpsSubstituido>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '<Competencia></Competencia>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos></ValorServicos>';
                $MensagemXML .= '<ValorDeducoes></ValorDeducoes>';
                $MensagemXML .= '<ValorPis></ValorPis>';
                $MensagemXML .= '<ValorCofins></ValorCofins>';
                $MensagemXML .= '<ValorInss></ValorInss>';
                $MensagemXML .= '<ValorIr></ValorIr>';
                $MensagemXML .= '<ValorCsll></ValorCsll>';
                $MensagemXML .= '<OutrasRetencoes></OutrasRetencoes>';
                $MensagemXML .= '<ValorIss></ValorIss>';
                $MensagemXML .= '<Aliquota></Aliquota>';
                $MensagemXML .= '<DescontoIncondicionado></DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado></DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<IssRetido></IssRetido>';
                $MensagemXML .= '<ResponsavelRetencao></ResponsavelRetencao>';
                $MensagemXML .= '<ItemListaServico></ItemListaServico>';
                $MensagemXML .= '<CodigoCnae></CodigoCnae>';
                $MensagemXML .= '<CodigoTributacaoMunicipio></CodigoTributacaoMunicipio>';
                $MensagemXML .= '<Discriminacao></Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio></CodigoMunicipio>';
                $MensagemXML .= '<CodigoPais></CodigoPais>';
                $MensagemXML .= '<ExigibilidadeIss></ExigibilidadeIss>';
                $MensagemXML .= '<MunicipioIncidencia></MunicipioIncidencia>';
                $MensagemXML .= '<NumeroProcesso></NumeroProcesso>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial></RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco></Endereco>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Complemento></Complemento>';
                $MensagemXML .= '<Bairro></Bairro>';
                $MensagemXML .= '<CodigoMunicipio></CodigoMunicipio>';
                $MensagemXML .= '<Uf></Uf>';
                $MensagemXML .= '<CodigoPais></CodigoPais>';
                $MensagemXML .= '<Cep></Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone></Telefone>';
                $MensagemXML .= '<Email></Email>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<Intermediario>';
                $MensagemXML .= '<IdentificacaoIntermediario>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoIntermediario>';
                $MensagemXML .= '<RazaoSocial></RazaoSocial>';
                $MensagemXML .= '</Intermediario>';
                $MensagemXML .= '<ConstrucaoCivil>';
                $MensagemXML .= '<CodigoObra></CodigoObra>';
                $MensagemXML .= '<Art></Art>';
                $MensagemXML .= '</ConstrucaoCivil>';
                $MensagemXML .= '<RegimeEspecialTributacao></RegimeEspecialTributacao>';
                $MensagemXML .= '<OptanteSimplesNacional></OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivoFiscal></IncentivoFiscal>';
                $MensagemXML .= '</InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</ListaRps>';
                $MensagemXML .= '</LoteRps>';
                $MensagemXML .= '</EnviarLoteRpsSincronoEnvio>';

            case 'SubstituirNfse':

                $MensagemXML = '<SubstituirNfseEnvio xmlns="http://www.betha.com.br/e-nota-contribuinte-ws">';
                $MensagemXML .= '<SubstituicaoNfse Id="1">';
                $MensagemXML .= '<Pedido>';
                $MensagemXML .= '<InfPedidoCancelamento Id="1">';
                $MensagemXML .= '<IdentificacaoNfse>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '<CodigoMunicipio></CodigoMunicipio>';
                $MensagemXML .= '</IdentificacaoNfse>';
                $MensagemXML .= '<CodigoCancelamento></CodigoCancelamento>';
                $MensagemXML .= '</InfPedidoCancelamento>';
                $MensagemXML .= '</Pedido>';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfDeclaracaoPrestacaoServico  Id="lote">';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Serie></Serie>';
                $MensagemXML .= '<Tipo></Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao></DataEmissao>';
                $MensagemXML .= '<Status></Status>';
                $MensagemXML .= '<RpsSubstituido>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Serie></Serie>';
                $MensagemXML .= '<Tipo></Tipo>';
                $MensagemXML .= '</RpsSubstituido>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '<Competencia></Competencia>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos></ValorServicos>';
                $MensagemXML .= '<ValorDeducoes></ValorDeducoes>';
                $MensagemXML .= '<ValorPis></ValorPis>';
                $MensagemXML .= '<ValorCofins></ValorCofins>';
                $MensagemXML .= '<ValorInss></ValorInss>';
                $MensagemXML .= '<ValorIr></ValorIr>';
                $MensagemXML .= '<ValorCsll></ValorCsll>';
                $MensagemXML .= '<OutrasRetencoes></OutrasRetencoes>';
                $MensagemXML .= '<ValorIss></ValorIss>';
                $MensagemXML .= '<Aliquota></Aliquota>';
                $MensagemXML .= '<DescontoIncondicionado></DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado></DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<IssRetido></IssRetido>';
                $MensagemXML .= '<ResponsavelRetencao></ResponsavelRetencao>';
                $MensagemXML .= '<ItemListaServico></ItemListaServico>';
                $MensagemXML .= '<CodigoCnae></CodigoCnae>';
                $MensagemXML .= '<CodigoTributacaoMunicipio></CodigoTributacaoMunicipio>';
                $MensagemXML .= '<Discriminacao></Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio></CodigoMunicipio>';
                $MensagemXML .= '<CodigoPais></CodigoPais>';
                $MensagemXML .= '<ExigibilidadeIss></ExigibilidadeIss>';
                $MensagemXML .= '<MunicipioIncidencia></MunicipioIncidencia>';
                $MensagemXML .= '<NumeroProcesso></NumeroProcesso>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial></RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco></Endereco>';
                $MensagemXML .= '<Numero></Numero>';
                $MensagemXML .= '<Complemento></Complemento>';
                $MensagemXML .= '<Bairro></Bairro>';
                $MensagemXML .= '<CodigoMunicipio></CodigoMunicipio>';
                $MensagemXML .= '<Uf></Uf>';
                $MensagemXML .= '<CodigoPais></CodigoPais>';
                $MensagemXML .= '<Cep></Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone></Telefone>';
                $MensagemXML .= '<Email></Email>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<Intermediario>';
                $MensagemXML .= '<IdentificacaoIntermediario>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj></Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal></InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoIntermediario>';
                $MensagemXML .= '<RazaoSocial></RazaoSocial>';
                $MensagemXML .= '</Intermediario>';
                $MensagemXML .= '<ConstrucaoCivil>';
                $MensagemXML .= '<CodigoObra></CodigoObra>';
                $MensagemXML .= '<Art></Art>';
                $MensagemXML .= '</ConstrucaoCivil>';
                $MensagemXML .= '<RegimeEspecialTributacao></RegimeEspecialTributacao>';
                $MensagemXML .= '<OptanteSimplesNacional></OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivoFiscal></IncentivoFiscal>';
                $MensagemXML .= '</InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</SubstituicaoNfse>';
                $MensagemXML .= '</SubstituirNfseEnvio>';
        }

        return $MensagemXML;
    }

    private static function composeHeader(string $type): ?string
    {

        switch ($type) {

            case '2.02':
                return '<cabecalho xmlns="http://www.betha.com.br/e-nota-contribuinte-ws" versao="2.02"><versaoDados>2.02</versaoDados></cabecalho>';
        }
    }
}
