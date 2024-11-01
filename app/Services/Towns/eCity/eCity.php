<?php

namespace App\Services\Towns\eCity;

use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class eCity extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $headerVersion;

    protected static $headers = ['Content-Type' => 'application/soap+xml;charset=UTF-8'];

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
        $mountMessage = self::assembleMessage();
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps(): string|int
    {

        $operacao = 'ConsultarLoteRps';
        $dataMsg = self::composeMessage($operacao);
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
        $dataMsg = self::composeMessage($operacao);
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
        $dataMsg = self::composeMessage($operacao);
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
        $dataMsg = self::composeMessage($operacao);
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
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function GerarNfse(): string|int
    {

        $operacao = 'GerarNfse';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRpsSincrono(): string|int
    {

        $operacao = 'RecepcionarLoteRpsSincrono';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function SubstituirNfse(): string|int
    {

        $operacao = 'SubstituirNfse';
        $dataMsg = self::composeMessage($operacao);
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

    private static function composeMessage(string $type): string
    {

        switch ($type) {

            case 'CancelarNfse':

                $MensagemXML = '<CancelarNfseEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
                $MensagemXML .= '<Pedido>';
                $MensagemXML .= '<InfPedidoCancelamento Id=">';
                $MensagemXML .= '<IdentificacaoNfse>';
                $MensagemXML .= '<Numero>0</Numero>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>99999999999999</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>999999</InscricaoMunicipal>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '</IdentificacaoNfse>';
                $MensagemXML .= '<CodigoCancelamento>1</CodigoCancelamento>';
                $MensagemXML .= '</InfPedidoCancelamento>';
                $MensagemXML .= '</Pedido>';
                $MensagemXML .= '</CancelarNfseEnvio>';

            case 'ConsultarLoteRps':

                $MensagemXML = '';

            case 'ConsultarNfseFaixa':

                $MensagemXML = '<ConsultarNfseFaixaEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj><Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Faixa><NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</NumeroNfseInicial>';
                $MensagemXML .= '<NumeroNfseFinal>[CAMPO_NOTA_FINAL]</NumeroNfseFinal></Faixa>';
                $MensagemXML .= '<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina>';
                $MensagemXML .= '</ConsultarNfseFaixaEnvio>';

            case 'ConsultarNfseRps':

                $MensagemXML = '<ConsultarNfseRpsEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>1</Numero>';
                $MensagemXML .= '<Serie>1</Serie>';
                $MensagemXML .= '<Tipo>1</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>99999999999999</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>999999</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '</ConsultarNfseRpsEnvio>';

            case 'ConsultarNfseServicoPrestado':

                $MensagemXML = '<ConsultarNfseServicoPrestadoEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
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
                $MensagemXML .= '<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina>';
                $MensagemXML .= '</ConsultarNfseServicoPrestadoEnvio>';

            case 'ConsultarNfseServicoTomado':

                $MensagemXML = '<ConsultarNfseServicoTomadoEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
                $MensagemXML .= '<Consulente>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>00000000000000</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</Consulente>';
                $MensagemXML .= '<NumeroNfse>0</NumeroNfse>';
                $MensagemXML .= '<PeriodoEmissao>';
                $MensagemXML .= '<DataInicial>2001-01-01</DataInicial>';
                $MensagemXML .= '<DataFinal>2001-01-01</DataFinal>';
                $MensagemXML .= '</PeriodoEmissao>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>00000000000000</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>00000000000000</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<Intermediario>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>00000000000000</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</Intermediario>';
                $MensagemXML .= '<Pagina>1</Pagina>';
                $MensagemXML .= '</ConsultarNfseServicoTomadoEnvio>';

            case 'GerarNfse':

                $MensagemXML = '<GerarNfseEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '<Rps Id="rps">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>10368</Numero>';
                $MensagemXML .= '<Serie>1</Serie>';
                $MensagemXML .= '<Tipo>1</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao>2012-06-05</DataEmissao>';
                $MensagemXML .= '<Status>1</Status>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '<Competencia>2012-06-05</Competencia>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos>1089.71</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>0.0</ValorDeducoes>';
                $MensagemXML .= '<ValorPis>0.0</ValorPis>';
                $MensagemXML .= '<ValorCofins>0.0</ValorCofins>';
                $MensagemXML .= '<ValorInss>0.0</ValorInss>';
                $MensagemXML .= '<ValorIr>0.0</ValorIr>';
                $MensagemXML .= '<ValorCsll>0.0</ValorCsll>';
                $MensagemXML .= '<OutrasRetencoes>0.0</OutrasRetencoes>';
                $MensagemXML .= '<ValorIss>32.69</ValorIss>';
                $MensagemXML .= '<Aliquota>3</Aliquota>';
                $MensagemXML .= '<DescontoIncondicionado>0.0</DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado>0.0</DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<IssRetido>2</IssRetido>';
                $MensagemXML .= '<ResponsavelRetencao>1</ResponsavelRetencao>';
                $MensagemXML .= '<ItemListaServico>0101</ItemListaServico>';
                $MensagemXML .= '<CodigoCnae>783770</CodigoCnae>';
                $MensagemXML .= '<CodigoTributacaoMunicipio>0</CodigoTributacaoMunicipio>';
                $MensagemXML .= '<Discriminacao>Discriminacao Servico Teste 10368 Discriminacao Servico Teste 10368 Discriminacao Servico Teste 10368 Discriminacao Servico Teste 10368</Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '<CodigoPais>1058</CodigoPais>';
                $MensagemXML .= '<ExigibilidadeISS>1</ExigibilidadeISS>';
                $MensagemXML .= '<MunicipioIncidencia>4115200</MunicipioIncidencia>';
                $MensagemXML .= '<NumeroProcesso>38300/2012</NumeroProcesso>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>99999999999999</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>999999</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cpf>69778337934</Cpf>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial>TOMADOR TESTE 010368</RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco>XV DE NOVEMBRO</Endereco>';
                $MensagemXML .= '<Numero>701</Numero>';
                $MensagemXML .= '<Complemento>PRIMEIRO ANDAR</Complemento>';
                $MensagemXML .= '<Bairro>CENTRO</Bairro>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '<Uf>PR</Uf>';
                $MensagemXML .= '<CodigoPais>1058</CodigoPais>';
                $MensagemXML .= '<Cep>87013230</Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone>449999999</Telefone>';
                $MensagemXML .= '<Email>mapaliari@gmail.com</Email>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<ConstrucaoCivil>';
                $MensagemXML .= '<CodigoObra>999999</CodigoObra>';
                $MensagemXML .= '<Art>ART9999</Art>';
                $MensagemXML .= '</ConstrucaoCivil>';
                $MensagemXML .= '<RegimeEspecialTributacao>1</RegimeEspecialTributacao>';
                $MensagemXML .= '<OptanteSimplesNacional>2</OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivoFiscal>2</IncentivoFiscal>';
                $MensagemXML .= '</InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</GerarNfseEnvio>';

            case 'RecepcionarLoteRpsSincrono':

                $MensagemXML = '<RecepcionarLoteRpsSincronoEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
                $MensagemXML .= '<LoteRps Id=" versao="2.01">';
                $MensagemXML .= '<NumeroLote>7744</NumeroLote>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>99999999999999</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>999999</InscricaoMunicipal>';
                $MensagemXML .= '<QuantidadeRps>1</QuantidadeRps>';
                $MensagemXML .= '<ListaRps>';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '<Rps Id="rps">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>10367</Numero>';
                $MensagemXML .= '<Serie>1</Serie>';
                $MensagemXML .= '<Tipo>1</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao>2012-06-05</DataEmissao>';
                $MensagemXML .= '<Status>1</Status>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '<Competencia>2012-06-05</Competencia>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos>1830.48</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>0.0</ValorDeducoes>';
                $MensagemXML .= '<ValorPis>0.0</ValorPis>';
                $MensagemXML .= '<ValorCofins>0.0</ValorCofins>';
                $MensagemXML .= '<ValorInss>0.0</ValorInss>';
                $MensagemXML .= '<ValorIr>0.0</ValorIr>';
                $MensagemXML .= '<ValorCsll>0.0</ValorCsll>';
                $MensagemXML .= '<OutrasRetencoes>0.0</OutrasRetencoes>';
                $MensagemXML .= '<ValorIss>54.91</ValorIss>';
                $MensagemXML .= '<Aliquota>3</Aliquota>';
                $MensagemXML .= '<DescontoIncondicionado>0.0</DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado>0.0</DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<IssRetido>2</IssRetido>';
                $MensagemXML .= '<ResponsavelRetencao>1</ResponsavelRetencao>';
                $MensagemXML .= '<ItemListaServico>0101</ItemListaServico>';
                $MensagemXML .= '<CodigoCnae>783770</CodigoCnae>';
                $MensagemXML .= '<CodigoTributacaoMunicipio>0</CodigoTributacaoMunicipio>';
                $MensagemXML .= '<Discriminacao>Discriminacao Servico Teste 10367 Discriminacao Servico Teste 10367 Discriminacao Servico Teste 10367 Discriminacao Servico Teste 10367</Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '<CodigoPais>1058</CodigoPais>';
                $MensagemXML .= '<ExigibilidadeISS>1</ExigibilidadeISS>';
                $MensagemXML .= '<MunicipioIncidencia>4115200</MunicipioIncidencia>';
                $MensagemXML .= '<NumeroProcesso>38300/2012</NumeroProcesso>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>99999999999999</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>999999</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>56407020000136</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial>TOMADOR TESTE 110367</RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco>XV DE NOVEMBRO</Endereco>';
                $MensagemXML .= '<Numero>701</Numero>';
                $MensagemXML .= '<Complemento>PRIMEIRO ANDAR</Complemento>';
                $MensagemXML .= '<Bairro>CENTRO</Bairro>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '<Uf>PR</Uf>';
                $MensagemXML .= '<CodigoPais>1058</CodigoPais>';
                $MensagemXML .= '<Cep>87013230</Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone>449999999</Telefone>';
                $MensagemXML .= '<Email>mapaliari@gmail.com</Email>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<Intermediario>';
                $MensagemXML .= '<IdentificacaoIntermediario>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>63402328000154</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoIntermediario>';
                $MensagemXML .= '<RazaoSocial>INTERMEDIARIO TESTE 10367</RazaoSocial>';
                $MensagemXML .= '</Intermediario>';
                $MensagemXML .= '<ConstrucaoCivil>';
                $MensagemXML .= '<CodigoObra>999999</CodigoObra>';
                $MensagemXML .= '<Art>ART9999</Art>';
                $MensagemXML .= '</ConstrucaoCivil>';
                $MensagemXML .= '<RegimeEspecialTributacao>1</RegimeEspecialTributacao>';
                $MensagemXML .= '<OptanteSimplesNacional>2</OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivoFiscal>2</IncentivoFiscal>';
                $MensagemXML .= '</InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</ListaRps>';
                $MensagemXML .= '</LoteRps>';
                $MensagemXML .= '</RecepcionarLoteRpsSincronoEnvio>';

            case 'SubstituirNfse':

                $MensagemXML = '<SubstituirNfseEnvio xmlns="http://www.abrasf.org.br/nfse.xsd" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.abrasf.org.br/nfse.xsd nfse_v2.01.xsd ">';
                $MensagemXML .= '<SubstituicaoNfse>';
                $MensagemXML .= '<Pedido>';
                $MensagemXML .= '<InfPedidoCancelamento Id="">';
                $MensagemXML .= '<IdentificacaoNfse>';
                $MensagemXML .= '<Numero>0</Numero>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>99999999999999</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>999999</InscricaoMunicipal>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '</IdentificacaoNfse>';
                $MensagemXML .= '<CodigoCancelamento>1</CodigoCancelamento>';
                $MensagemXML .= '</InfPedidoCancelamento>';
                $MensagemXML .= '<ds:Signature Id="idvalue6">';
                $MensagemXML .= '<ds:SignedInfo Id="idvalue7">';
                $MensagemXML .= '<ds:CanonicalizationMethod Algorithm="http://tempuri.org"/>';
                $MensagemXML .= '<ds:SignatureMethod Algorithm="http://tempuri.org">';
                $MensagemXML .= '<ds:HMACOutputLength>0</ds:HMACOutputLength>';
                $MensagemXML .= '</ds:SignatureMethod>';
                $MensagemXML .= '<ds:Reference Id="idvalue8" Type="http://tempuri.org" URI="http://tempuri.org">';
                $MensagemXML .= '<ds:Transforms>';
                $MensagemXML .= '<ds:Transform Algorithm="http://tempuri.org">';
                $MensagemXML .= '<ds:XPath>ds:XPath</ds:XPath>';
                $MensagemXML .= '</ds:Transform>';
                $MensagemXML .= '</ds:Transforms>';
                $MensagemXML .= '<ds:DigestMethod Algorithm="http://tempuri.org"/>';
                $MensagemXML .= '<ds:DigestValue>MA==</ds:DigestValue>';
                $MensagemXML .= '</ds:Reference>';
                $MensagemXML .= '</ds:SignedInfo>';
                $MensagemXML .= '<ds:SignatureValue Id="idvalue9">MA==</ds:SignatureValue>';
                $MensagemXML .= '<ds:KeyInfo Id="idvalue10">';
                $MensagemXML .= '<ds:KeyName>ds:KeyName</ds:KeyName>';
                $MensagemXML .= '</ds:KeyInfo>';
                $MensagemXML .= '<ds:Object Encoding="http://tempuri.org" Id="idvalue11" MimeType="">';
                $MensagemXML .= '<ds:SPKIData>';
                $MensagemXML .= '<ds:SPKISexp>MA==</ds:SPKISexp>';
                $MensagemXML .= '</ds:SPKIData>';
                $MensagemXML .= '</ds:Object>';
                $MensagemXML .= '</ds:Signature>';
                $MensagemXML .= '</Pedido>';
                $MensagemXML .= '<Rps>';
                $MensagemXML .= '<InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '<Rps Id="rps">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>1</Numero>';
                $MensagemXML .= '<Serie>1</Serie>';
                $MensagemXML .= '<Tipo>1</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<DataEmissao>2012-06-05</DataEmissao>';
                $MensagemXML .= '<Status>1</Status>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '<Competencia>2012-06-05</Competencia>';
                $MensagemXML .= '<Servico>';
                $MensagemXML .= '<Valores>';
                $MensagemXML .= '<ValorServicos>1628.62</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>0.0</ValorDeducoes>';
                $MensagemXML .= '<ValorPis>0.0</ValorPis>';
                $MensagemXML .= '<ValorCofins>0.0</ValorCofins>';
                $MensagemXML .= '<ValorInss>0.0</ValorInss>';
                $MensagemXML .= '<ValorIr>0.0</ValorIr>';
                $MensagemXML .= '<ValorCsll>0.0</ValorCsll>';
                $MensagemXML .= '<OutrasRetencoes>0.0</OutrasRetencoes>';
                $MensagemXML .= '<ValorIss>48.86</ValorIss>';
                $MensagemXML .= '<Aliquota>3</Aliquota>';
                $MensagemXML .= '<DescontoIncondicionado>0.0</DescontoIncondicionado>';
                $MensagemXML .= '<DescontoCondicionado>0.0</DescontoCondicionado>';
                $MensagemXML .= '</Valores>';
                $MensagemXML .= '<IssRetido>2</IssRetido>';
                $MensagemXML .= '<ResponsavelRetencao>1</ResponsavelRetencao>';
                $MensagemXML .= '<ItemListaServico>0101</ItemListaServico>';
                $MensagemXML .= '<CodigoCnae>783770</CodigoCnae>';
                $MensagemXML .= '<CodigoTributacaoMunicipio>0</CodigoTributacaoMunicipio>';
                $MensagemXML .= '<Discriminacao>Discriminacao Servico Teste 1 Discriminacao Servico Teste 1 Discriminacao Servico Teste 1 Discriminacao Servico Teste 1</Discriminacao>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '<CodigoPais>1058</CodigoPais>';
                $MensagemXML .= '<ExigibilidadeISS>1</ExigibilidadeISS>';
                $MensagemXML .= '<MunicipioIncidencia>4115200</MunicipioIncidencia>';
                $MensagemXML .= '<NumeroProcesso>38300/2012</NumeroProcesso>';
                $MensagemXML .= '</Servico>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>99999999999999</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>999999</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '<Tomador>';
                $MensagemXML .= '<IdentificacaoTomador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cpf>92562772806</Cpf>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>0</InscricaoMunicipal>';
                $MensagemXML .= '</IdentificacaoTomador>';
                $MensagemXML .= '<RazaoSocial>TOMADOR TESTE 01</RazaoSocial>';
                $MensagemXML .= '<Endereco>';
                $MensagemXML .= '<Endereco>XV DE NOVEMBRO</Endereco>';
                $MensagemXML .= '<Numero>701</Numero>';
                $MensagemXML .= '<Complemento>PRIMEIRO ANDAR</Complemento>';
                $MensagemXML .= '<Bairro>CENTRO</Bairro>';
                $MensagemXML .= '<CodigoMunicipio>4115200</CodigoMunicipio>';
                $MensagemXML .= '<Uf>PR</Uf>';
                $MensagemXML .= '<CodigoPais>1058</CodigoPais>';
                $MensagemXML .= '<Cep>87013230</Cep>';
                $MensagemXML .= '</Endereco>';
                $MensagemXML .= '<Contato>';
                $MensagemXML .= '<Telefone>449999999</Telefone>';
                $MensagemXML .= '<Email>mapaliari@gmail.com</Email>';
                $MensagemXML .= '</Contato>';
                $MensagemXML .= '</Tomador>';
                $MensagemXML .= '<ConstrucaoCivil>';
                $MensagemXML .= '<CodigoObra>999999</CodigoObra>';
                $MensagemXML .= '<Art>ART9999</Art>';
                $MensagemXML .= '</ConstrucaoCivil>';
                $MensagemXML .= '<RegimeEspecialTributacao>1</RegimeEspecialTributacao>';
                $MensagemXML .= '<OptanteSimplesNacional>2</OptanteSimplesNacional>';
                $MensagemXML .= '<IncentivoFiscal>2</IncentivoFiscal>';
                $MensagemXML .= '</InfDeclaracaoPrestacaoServico>';
                $MensagemXML .= '</Rps>';
                $MensagemXML .= '</SubstituicaoNfse>';
                $MensagemXML .= '</SubstituirNfseEnvio>';
        }

        return $MensagemXML;
    }
}
