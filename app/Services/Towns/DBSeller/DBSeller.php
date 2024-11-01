<?php

namespace App\Services\Towns\DBSeller;

use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class DBSeller extends LinkTownBase
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

    public static function CancelarNfse(): string|int
    {

        $operacao = 'CancelarNfse';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps(): string|int
    {

        $operacao = 'ConsultarLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfse(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Data_Inicial,
        string $Data_Final
    ): string|int {

        $operacao = 'ConsultarNfse';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_INICIAL]', date("Ymd", strtotime($Data_Inicial)), $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_FINAL]', date("Ymd", strtotime($Data_Final)), $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps(): string|int
    {

        $operacao = 'ConsultarNfsePorRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarSituacaoLoteRPS(): string|int
    {

        $operacao = 'ConsultarSituacaoLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps(): string|int
    {

        $operacao = 'RecepcionarLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(): string
    {

        $assembleMessage = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prod="https://nfe.sdolivramento.com.br/webservice/index/producao">';
        $assembleMessage .= '<soapenv:Header/>';
        $assembleMessage .= '<soapenv:Body>';
        $assembleMessage .= '<prod:[Mount_Mensage]>';
        $assembleMessage .= '<xml><![CDATA[[DadosMsg]]]></xml>';
        $assembleMessage .= '</prod:[Mount_Mensage]>';
        $assembleMessage .= '</soapenv:Body>';
        $assembleMessage .= '</soapenv:Envelope>';

        return $assembleMessage;
    }

    private static function composeMessage(string $Tipo): string
    {

        $MensagemXML = '';

        switch ($Tipo) {

            case 'CancelarNfse':

                $MensagemXML = '<CancelarNfse>';
                $MensagemXML .= '<CancelarNfseEnvio>';
                $MensagemXML .= '<Pedido>';
                $MensagemXML .= '<InfPedidoCancelamento>';
                $MensagemXML .= '<IdentificacaoNfse>';
                $MensagemXML .= '<Numero>[CAMPO_NUMERO_NF]</Numero>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '<CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</CodigoMunicipio>';
                $MensagemXML .= '</IdentificacaoNfse>';
                $MensagemXML .= '<CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</CodigoCancelamento>';
                $MensagemXML .= '</InfPedidoCancelamento>';
                $MensagemXML .= '</Pedido>';
                $MensagemXML .= '</CancelarNfseEnvio>';
                $MensagemXML .= '</CancelarNfse>';

            case 'ConsultarLoteRps':

                $MensagemXML = '<ConsultarLoteRpsEnvio>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Protocolo>[CAMPO_PROTOCOLO]</Protocolo>';
                $MensagemXML .= '</ConsultarLoteRpsEnvio>';

            case 'ConsultarNfse':

                $MensagemXML = '<ConsultarNfse>';
                $MensagemXML .= '<ConsultarNfseEnvio>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<PeriodoEmissao>';
                $MensagemXML .= '<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>';
                $MensagemXML .= '<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>';
                $MensagemXML .= '</PeriodoEmissao>';
                $MensagemXML .= '</ConsultarNfseEnvio>';
                $MensagemXML .= '</ConsultarNfse>';

            case 'ConsultarNfsePorRps':

                $MensagemXML = '<ConsultarNfsePorRps>';
                $MensagemXML .= '<ConsultarNfseRpsEnvio>';
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
                $MensagemXML .= '</ConsultarNfsePorRps>';

            case 'ConsultarSituacaoLoteRps':

                $MensagemXML = '<ConsultarSituacaoLoteRps>';
                $MensagemXML .= '<ConsultarSituacaoLoteRpsEnvio>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Protocolo>[CAMPO_PROTOCOLO]</Protocolo>';
                $MensagemXML .= '</ConsultarSituacaoLoteRpsEnvio>';
                $MensagemXML .= '</ConsultarSituacaoLoteRps>';

            case 'RecepcionarLoteRps':

                $MensagemXML = '<EnviarLoteRpsEnvio xmlns="http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd">';
                $MensagemXML .= '<LoteRps id="Lote21">';
                $MensagemXML .= '<NumeroLote>23</NumeroLote>';
                $MensagemXML .= '<Cnpj>00000000000000</Cnpj>';
                $MensagemXML .= '<InscricaoMunicipal>00000</InscricaoMunicipal>';
                $MensagemXML .= '<QuantidadeRps>1</QuantidadeRps>';
                $MensagemXML .= '<ListaRps>';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfRps id="Lote21">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>2</Numero>';
                $MensagemXML .= '<Serie>0</Serie>';
                $MensagemXML .= '<Tipo>1</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao>2014-03-18T10:00:31</DataEmissao>';
                $MensagemXML .= '<NaturezaOperacao>1</NaturezaOperacao>';
                $MensagemXML .= '<OptanteSimplesNacional>2</OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivadorCultural>2</IncentivadorCultural>';
                $MensagemXML .= '<Status>1</Status>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos>497.50</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>0.00</ValorDeducoes>';
                $MensagemXML .= '<ValorPis>0.00</ValorPis>';
                $MensagemXML .= '<ValorCofins>0.00</ValorCofins>';
                $MensagemXML .= '<ValorInss>0.00</ValorInss>';
                $MensagemXML .= '<ValorIr>0.00</ValorIr>';
                $MensagemXML .= '<ValorCsll>0.00</ValorCsll>';
                $MensagemXML .= '<IssRetido>2</IssRetido>';
                $MensagemXML .= '<ValorIss>36.01</ValorIss>';
                $MensagemXML .= '<ValorIssRetido>36.01</ValorIssRetido>';
                $MensagemXML .= '<OutrasRetencoes>0.00</OutrasRetencoes>';
                $MensagemXML .= '<BaseCalculo>497.50</BaseCalculo>';
                $MensagemXML .= '<Aliquota>0.0300</Aliquota>';
                $MensagemXML .= '<ValorLiquidoNfse>497.50</ValorLiquidoNfse>';
                $MensagemXML .= '<DescontoIncondicionado>0.00</DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado>0.00</DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<ItemListaServico>14.01</ItemListaServico>';
                $MensagemXML .= '<CodigoCnae>4789099</CodigoCnae>';
                $MensagemXML .= '<Discriminacao>MAO-DE-OBRA </Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio>4300406</CodigoMunicipio>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<Cnpj>0</Cnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cpf>0</Cpf>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial>JASON</RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco>AV Maua</Endereco>';
                $MensagemXML .= '<Numero>10</Numero>';
                $MensagemXML .= '<Complemento>0</Complemento>';
                $MensagemXML .= '<Bairro>INTERIOR</Bairro>';
                $MensagemXML .= '<CodigoMunicipio>4322400</CodigoMunicipio>';
                $MensagemXML .= '<Uf>RS</Uf>';
                $MensagemXML .= '<Cep>97500505</Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone>55333333333</Telefone>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '</InfRps>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</ListaRps>';
                $MensagemXML .= '</LoteRps>';
                $MensagemXML .= '</EnviarLoteRpsEnvio>';
        }

        return $MensagemXML;
    }
}
