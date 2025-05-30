<?php

namespace App\Services\Towns\Systems\Nfe_Paulista;

use InvalidArgumentException;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;

class Nfe_Paulista extends LinkTownBase implements LinkTownsInterface, DevelopInterface
{

    private static $instance;
    private static $Links_Prefeituras;
    private static $Filial;
    private static $Link_Prefeitura;

    public static function getInstance($value)
    {

        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        self::$Links_Prefeituras = [
            'SAO' => 'https://nfe.prefeitura.sp.gov.br/ws/lotenfe.asmx', //Prefeitura São Paulo
        ];

        if (array_key_exists($value, self::$Links_Prefeituras)) {
            self::$Filial = self::$Links_Prefeituras[$value];
            self::$Link_Prefeitura = explode("|", self::$Filial)[0];
        } else {
            throw new InvalidArgumentException("Prefeitura {$value} não cadastrada");
        }

        return self::$instance;
    }

    public function CancelamentoNFe(string $Numero_Nota_Fiscal, string $CNPJ, string $Inscricao_Municipal, string $Used_Companny): string|int
    {

        $Operacao = 'CancelamentoNFe';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_NUMERO_NOTA]', $Numero_Nota_Fiscal, $DadosMsg);

        $Assinatura_Cancelamento = sha1(substr($DadosMsg, strpos($DadosMsg, "ChaveNFe"), strpos($DadosMsg, "/ChaveNFe") - strpos($DadosMsg, "ChaveNFe")), False);

        $DigestValue = self::Sign_XML($Assinatura_Cancelamento, $Used_Companny);
        $DigestValue = substr($DigestValue, 1, 10); //Extrair somente o DigestValue para inserir no campo abaixo
        $DadosMsg = str_replace('[ASSINATURA_CANCELAMENTO]', $DigestValue, $DadosMsg);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function ConsultaCNPJ(string $CNPJ, string $Used_Companny): string|int
    {

        $Operacao = 'ConsultaCNPJ';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function ConsultaInformacoesLote(string $CNPJ, string $Inscricao_Municipal, string $Used_Companny): string|int
    {

        $Operacao = 'ConsultaInformacoesLote';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function ConsultaLote(string $CNPJ, string $Numero_Lote, string $Used_Companny): string|int
    {

        $Operacao = 'ConsultaLote';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_NUMERO_LOTE]', $Numero_Lote, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function ConsultaNFe(string $CNPJ, string $Inscricao_Municipal, string $Numero_Nota_Fiscal, string $Serie_RPS, string $Numero_RPS, string $Used_Companny): string|int
    {

        $Operacao = 'ConsultaNFe';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_NUMERO_NOTA]', $Numero_Nota_Fiscal, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_SERIE_RPS]', $Serie_RPS, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_NUMERO_RPS]', $Numero_RPS, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function ConsultaNFeEmitidas(string $CNPJ, string $Inscricao_Municipal, string $Data_Inicial, string $Data_Final, string $Used_Companny, int $Numero_Pagina = 1): string|int
    {

        $Operacao = 'ConsultaNFeEmitidas';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_DATA_INICIAL]', date("Ymd", strtotime($Data_Inicial)), $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_DATA_FINAL]', date("Ymd", strtotime($Data_Final)), $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_NUMERO_PAGINA]', $Numero_Pagina, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function ConsultaNFeRecebidas(string $Used_Companny): string|int
    {

        $Operacao = 'ConsultaNFeRecebidas';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function EnvioLoteRPS(string $Used_Companny): string|int
    {

        $Operacao = 'EnvioLoteRPS';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function EnvioRPS(string $Used_Companny): string|int
    {

        $Operacao = 'EnvioRPS';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public function TesteEnvioLoteRPS(string $Used_Companny): string|int
    {

        $Operacao = 'TesteEnvioLoteRPS';
        $DadosMsg = self::Compor_MensagemXML($Operacao);
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    private function Sign_XML(string $Xml_Not_Signing, string $Used_Companny): string
    {

        //return XmlSigner::Sign_XML($Xml_Not_Signing, $Used_Companny);
    }

    private function Conection(string $Prefeitura, string $Mensage, string $Used_Companny): string|int
    {

        $Headers = [
            'Content-Type' => 'text/xml;charset=utf-8',
        ];

        //Set Conexao = New cls_Connection:
        //return Connection::Conexao($Prefeitura, $Mensage, $Used_Companny, $Headers, 'POST', True, False);
    }

    private function Message_Assemble(): string
    {

        $Message_Assemble = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:nfe="http://www.prefeitura.sp.gov.br/nfe">';
        $Message_Assemble .= '<soap:Header/>';
        $Message_Assemble .= '<soap:Body>';
        $Message_Assemble .= '<nfe:[Mount_Mensage]Request>';
        $Message_Assemble .= '<nfe:VersaoSchema>1</nfe:VersaoSchema>';
        $Message_Assemble .= '<nfe:MensagemXML><![CDATA[[DadosMsg]]]></nfe:MensagemXML>';
        $Message_Assemble .= '</nfe:[Mount_Mensage]Request>';
        $Message_Assemble .= '</soap:Body>';
        $Message_Assemble .= '</soap:Envelope>';

        return $Message_Assemble;
    }

    private function Compor_MensagemXML(string $Tipo): string
    {

        $MensagemXML = '';

        switch ($Tipo) {

            case 'CancelamentoNFe':

                $MensagemXML = '<PedidoCancelamentoNFe xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="http://www.prefeitura.sp.gov.br/nfe">';
                $MensagemXML .= '<Cabecalho Versao="1" xmlns="">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '<transacao>true</transacao>';
                $MensagemXML .= '</Cabecalho>';
                $MensagemXML .= '<Detalhe xmlns="">';
                $MensagemXML .= '<ChaveNFe>';
                $MensagemXML .= '<InscricaoPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoPrestador>';
                $MensagemXML .= '<NumeroNFe>[CAMPO_NUMERO_NOTA]</NumeroNFe>';
                $MensagemXML .= '</ChaveNFe>';
                $MensagemXML .= '<AssinaturaCancelamento>[ASSINATURA_CANCELAMENTO]</AssinaturaCancelamento>';
                $MensagemXML .= '</Detalhe>';
                $MensagemXML .= '</PedidoCancelamentoNFe>';

            case 'ConsultaCNPJ':

                $MensagemXML = '<p1:PedidoConsultaCNPJ xmlns:p1="http://www.prefeitura.sp.gov.br/nfe" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
                $MensagemXML .= '<Cabecalho Versao="1">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '</Cabecalho>';
                $MensagemXML .= '<CNPJContribuinte>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CNPJContribuinte>';
                $MensagemXML .= '</p1:PedidoConsultaCNPJ>';

            case 'ConsultaInformacoesLote':

                $MensagemXML = '<p1:PedidoInformacoesLote xmlns:p1="http://www.prefeitura.sp.gov.br/nfe" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
                $MensagemXML .= '<Cabecalho Versao="1">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '<InscricaoPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoPrestador>';
                $MensagemXML .= '</Cabecalho>';
                $MensagemXML .= '</p1:PedidoInformacoesLote>';

            case 'ConsultaLote':

                $MensagemXML = '<p1:PedidoConsultaLote xmlns:p1="http://www.prefeitura.sp.gov.br/nfe" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
                $MensagemXML .= '<Cabecalho Versao="1">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>';
                $MensagemXML .= '</Cabecalho>';
                $MensagemXML .= '</p1:PedidoConsultaLote>';

            case 'ConsultaNFe':

                $MensagemXML = '<p1:PedidoConsultaNFe xmlns:p1="http://www.prefeitura.sp.gov.br/nfe" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
                $MensagemXML .= '<Cabecalho Versao="1">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '</Cabecalho>';
                $MensagemXML .= '<Detalhe>';
                $MensagemXML .= '<ChaveNFe>';
                $MensagemXML .= '<InscricaoPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoPrestador>';
                $MensagemXML .= '<NumeroNFe>[CAMPO_NUMERO_NOTA]</NumeroNFe>';
                $MensagemXML .= '</ChaveNFe>';
                $MensagemXML .= '</Detalhe>';
                $MensagemXML .= '<Detalhe>';
                $MensagemXML .= '<ChaveRPS>';
                $MensagemXML .= '<InscricaoPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoPrestador>';
                $MensagemXML .= '<SerieRPS>[CAMPO_SERIE_RPS]</SerieRPS>';
                $MensagemXML .= '<NumeroRPS>[CAMPO_NUMERO_RPS]</NumeroRPS>';
                $MensagemXML .= '</ChaveRPS>';
                $MensagemXML .= '</Detalhe>';
                $MensagemXML .= '</p1:PedidoConsultaNFe>';

            case 'ConsultaNFeEmitidas':

                $MensagemXML = '<p1:PedidoConsultaNFePeriodo xmlns:p1="http://www.prefeitura.sp.gov.br/nfe" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
                $MensagemXML .= '<Cabecalho Versao="1">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '<CPFCNPJ>';
                $MensagemXML .= '<CNPJ>[CAMPO_CNPJ]</CNPJ>';
                $MensagemXML .= '</CPFCNPJ>';
                $MensagemXML .= '<Inscricao>[CAMPO_INSCRICAO_MUNICIPAL]</Inscricao>';
                $MensagemXML .= '<dtInicio>[CAMPO_DATA_INICIAL]</dtInicio>';
                $MensagemXML .= '<dtFim>[CAMPO_DATA_FINAL]</dtFim>';
                $MensagemXML .= '<NumeroPagina>[CAMPO_NUMERO_PAGINA]</NumeroPagina>';
                $MensagemXML .= '</Cabecalho>';
                $MensagemXML .= '</p1:PedidoConsultaNFePeriodo>';

            case 'ConsultaNFeRecebidas':


            case 'EnvioLoteRPS':

                $MensagemXML = '<PedidoEnvioLoteRPS xmlns="http://www.prefeitura.sp.gov.br/nfe" xmlns: xsi = "http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
                $MensagemXML .= '<Cabecalho xmlns="" Versao="1">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>99999998000228</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '<transacao>false</transacao>';
                $MensagemXML .= '<dtInicio>2015-01-01</dtInicio>';
                $MensagemXML .= '<dtFim>2015-01-26</dtFim>';
                $MensagemXML .= '<QtdRPS>2</QtdRPS>';
                $MensagemXML .= '<ValorTotalServicos>201</ValorTotalServicos>';
                $MensagemXML .= '<ValorTotalDeducoes>0</ValorTotalDeducoes></Cabecalho>-';
                $MensagemXML .= '<RPS xmlns="">';
                $MensagemXML .= '<ChaveRPS>';
                $MensagemXML .= '<InscricaoPrestador>39617106</InscricaoPrestador>';
                $MensagemXML .= '<SerieRPS>BB</SerieRPS>';
                $MensagemXML .= '<NumeroRPS>4102</NumeroRPS>';
                $MensagemXML .= '</ChaveRPS>';
                $MensagemXML .= '<TipoRPS>RPS</TipoRPS>';
                $MensagemXML .= '<DataEmissao>2015-01-20</DataEmissao>';
                $MensagemXML .= '<StatusRPS>N</StatusRPS>';
                $MensagemXML .= '<TributacaoRPS>T</TributacaoRPS>';
                $MensagemXML .= '<ValorServicos>100</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>0</ValorDeducoes>';
                $MensagemXML .= '<ValorPIS>1.01</ValorPIS>';
                $MensagemXML .= '<ValorCOFINS>1.02</ValorCOFINS>';
                $MensagemXML .= '<ValorINSS>1.03</ValorINSS>';
                $MensagemXML .= '<ValorIR>1.04</ValorIR>';
                $MensagemXML .= '<ValorCSLL>1.05</ValorCSLL>';
                $MensagemXML .= '<CodigoServico>7811</CodigoServico>';
                $MensagemXML .= '<AliquotaServicos>0.05</AliquotaServicos>';
                $MensagemXML .= '<ISSRetido>false</ISSRetido>';
                $MensagemXML .= '<CPFCNPJTomador>';
                $MensagemXML .= '<CPF>99999999727</CPF>';
                $MensagemXML .= '</CPFCNPJTomador>';
                $MensagemXML .= '<RazaoSocialTomador>ANTONIO PRUDENTE</RazaoSocialTomador>';
                $MensagemXML .= '<EnderecoTomador>';
                $MensagemXML .= '<TipoLogradouro>RUA</TipoLogradouro>';
                $MensagemXML .= '<Logradouro>PEDRO AMERICO</Logradouro>';
                $MensagemXML .= '<NumeroEndereco>1</NumeroEndereco>';
                $MensagemXML .= '<ComplementoEndereco>1 ANDAR</ComplementoEndereco>';
                $MensagemXML .= '<Bairro>CENTRO</Bairro>';
                $MensagemXML .= '<Cidade>3550308</Cidade>';
                $MensagemXML .= '<UF>SP</UF>';
                $MensagemXML .= '<CEP>00001045</CEP>';
                $MensagemXML .= '</EnderecoTomador>';
                $MensagemXML .= '<EmailTomador>teste@teste.com</EmailTomador>';
                $MensagemXML .= '<Discriminacao>Nota Fiscal de Teste Emitida por Cliente Web</Discriminacao>';
                $MensagemXML .= '<ValorCargaTributaria>30.25</ValorCargaTributaria>';
                $MensagemXML .= '<PercentualCargaTributaria>15.12</PercentualCargaTributaria>';
                $MensagemXML .= '<FonteCargaTributaria>IBPT</FonteCargaTributaria>';
                $MensagemXML .= '</RPS>';
                $MensagemXML .= '</PedidoEnvioLoteRPS>';

            case 'EnvioRPS':

                $MensagemXML = '<PedidoEnvioRPS xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="http://www.prefeitura.sp.gov.br/nfe">';
                $MensagemXML .= '<Cabecalho Versao="1" xmlns="">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>99999997000100</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '</Cabecalho>';
                $MensagemXML .= '<RPS xmlns="">';
                $MensagemXML .= '<ChaveRPS>';
                $MensagemXML .= '<InscricaoPrestador>39616924</InscricaoPrestador>';
                $MensagemXML .= '<SerieRPS>BB</SerieRPS>';
                $MensagemXML .= '<NumeroRPS>4105</NumeroRPS>';
                $MensagemXML .= '</ChaveRPS>';
                $MensagemXML .= '<TipoRPS>RPS-M</TipoRPS>';
                $MensagemXML .= '<DataEmissao>2015-01-20</DataEmissao>';
                $MensagemXML .= '<StatusRPS>N</StatusRPS>';
                $MensagemXML .= '<TributacaoRPS>T</TributacaoRPS>';
                $MensagemXML .= '<ValorServicos>20500</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>5000</ValorDeducoes>';
                $MensagemXML .= '<ValorPIS>10</ValorPIS>';
                $MensagemXML .= '<ValorCOFINS>10</ValorCOFINS>';
                $MensagemXML .= '<ValorINSS>10</ValorINSS>';
                $MensagemXML .= '<ValorIR>10</ValorIR>';
                $MensagemXML .= '<ValorCSLL>10</ValorCSLL>';
                $MensagemXML .= '<CodigoServico>7617</CodigoServico>';
                $MensagemXML .= '<AliquotaServicos>0.05</AliquotaServicos>';
                $MensagemXML .= '<ISSRetido>false</ISSRetido>';
                $MensagemXML .= '<CPFCNPJTomador>';
                $MensagemXML .= '<CPF>12345678909</CPF>';
                $MensagemXML .= '</CPFCNPJTomador>';
                $MensagemXML .= '<RazaoSocialTomador>TOMADOR PF</RazaoSocialTomador>';
                $MensagemXML .= '<EnderecoTomador>';
                $MensagemXML .= '<TipoLogradouro>Av</TipoLogradouro>';
                $MensagemXML .= '<Logradouro>Paulista</Logradouro>';
                $MensagemXML .= '<NumeroEndereco>100</NumeroEndereco>';
                $MensagemXML .= '<ComplementoEndereco>Cj 35</ComplementoEndereco>';
                $MensagemXML .= '<Bairro>Bela Vista</Bairro>';
                $MensagemXML .= '<Cidade>3550308</Cidade>';
                $MensagemXML .= '<UF>SP</UF>';
                $MensagemXML .= '<CEP>1310100</CEP>';
                $MensagemXML .= '</EnderecoTomador>';
                $MensagemXML .= '<EmailTomador>tomador@teste.com.br</EmailTomador>';
                $MensagemXML .= '<Discriminacao>Desenvolvimento de Web Site Pessoal.</Discriminacao>';
                $MensagemXML .= '</RPS>';
                $MensagemXML .= '</PedidoEnvioRPS>';

            case 'TesteEnvioLoteRPS':

                $MensagemXML = '<PedidoEnvioLoteRPS xmlns="http://www.prefeitura.sp.gov.br/nfe" xmlns: xsi = "http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
                $MensagemXML .= '<Cabecalho xmlns="" Versao="1">';
                $MensagemXML .= '<CPFCNPJRemetente>';
                $MensagemXML .= '<CNPJ>99999998000228</CNPJ>';
                $MensagemXML .= '</CPFCNPJRemetente>';
                $MensagemXML .= '<transacao>false</transacao>';
                $MensagemXML .= '<dtInicio>2015-01-01</dtInicio>';
                $MensagemXML .= '<dtFim>2015-01-26</dtFim>';
                $MensagemXML .= '<QtdRPS>2</QtdRPS>';
                $MensagemXML .= '<ValorTotalServicos>201</ValorTotalServicos>';
                $MensagemXML .= '<ValorTotalDeducoes>0</ValorTotalDeducoes></Cabecalho>-';
                $MensagemXML .= '<RPS xmlns="">';
                $MensagemXML .= '<ChaveRPS>';
                $MensagemXML .= '<InscricaoPrestador>39617106</InscricaoPrestador>';
                $MensagemXML .= '<SerieRPS>BB</SerieRPS>';
                $MensagemXML .= '<NumeroRPS>4102</NumeroRPS>';
                $MensagemXML .= '</ChaveRPS>';
                $MensagemXML .= '<TipoRPS>RPS</TipoRPS>';
                $MensagemXML .= '<DataEmissao>2015-01-20</DataEmissao>';
                $MensagemXML .= '<StatusRPS>N</StatusRPS>';
                $MensagemXML .= '<TributacaoRPS>T</TributacaoRPS>';
                $MensagemXML .= '<ValorServicos>100</ValorServicos>';
                $MensagemXML .= '<ValorDeducoes>0</ValorDeducoes>';
                $MensagemXML .= '<ValorPIS>1.01</ValorPIS>';
                $MensagemXML .= '<ValorCOFINS>1.02</ValorCOFINS>';
                $MensagemXML .= '<ValorINSS>1.03</ValorINSS>';
                $MensagemXML .= '<ValorIR>1.04</ValorIR>';
                $MensagemXML .= '<ValorCSLL>1.05</ValorCSLL>';
                $MensagemXML .= '<CodigoServico>7811</CodigoServico>';
                $MensagemXML .= '<AliquotaServicos>0.05</AliquotaServicos>';
                $MensagemXML .= '<ISSRetido>false</ISSRetido>';
                $MensagemXML .= '<CPFCNPJTomador>';
                $MensagemXML .= '<CPF>99999999727</CPF>';
                $MensagemXML .= '</CPFCNPJTomador>';
                $MensagemXML .= '<RazaoSocialTomador>ANTONIO PRUDENTE</RazaoSocialTomador>';
                $MensagemXML .= '<EnderecoTomador>';
                $MensagemXML .= '<TipoLogradouro>RUA</TipoLogradouro>';
                $MensagemXML .= '<Logradouro>PEDRO AMERICO</Logradouro>';
                $MensagemXML .= '<NumeroEndereco>1</NumeroEndereco>';
                $MensagemXML .= '<ComplementoEndereco>1 ANDAR</ComplementoEndereco>';
                $MensagemXML .= '<Bairro>CENTRO</Bairro>';
                $MensagemXML .= '<Cidade>3550308</Cidade>';
                $MensagemXML .= '<UF>SP</UF>';
                $MensagemXML .= '<CEP>00001045</CEP>';
                $MensagemXML .= '</EnderecoTomador>';
                $MensagemXML .= '<EmailTomador>teste@teste.com</EmailTomador>';
                $MensagemXML .= '<Discriminacao>Nota Fiscal de Teste Emitida por Cliente Web</Discriminacao>';
                $MensagemXML .= '<ValorCargaTributaria>30.25</ValorCargaTributaria>';
                $MensagemXML .= '<PercentualCargaTributaria>15.12</PercentualCargaTributaria>';
                $MensagemXML .= '<FonteCargaTributaria>IBPT</FonteCargaTributaria>';
                $MensagemXML .= '</RPS>';
                $MensagemXML .= '</PedidoEnvioLoteRPS>';
        }

        return $MensagemXML;
    }

    public function Select_Template()
    {

        //Set Template = New cls_Template
        return view();
    }
}
