<?php

namespace App\Services\Towns\Ginfes_2;

use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;
use InvalidArgumentException;

enum Consulta_Notas
{
    case Por_Tipo;
    case Por_Periodo;
}

class Ginfes_2 extends LinkTownBase implements LinkTownsInterface, DevelopInterface
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
            'FTZ',
            'https://iss.fortaleza.ce.gov.br/grpfor-iss/ServiceGinfesImplService', //Prefeitura Fortaleza
        ];

        if (array_key_exists($value, self::$Links_Prefeituras)) {
            self::$Filial = self::$Links_Prefeituras[$value];
            self::$Link_Prefeitura = self::$Filial;
        } else {
            throw new InvalidArgumentException("Prefeitura {$value} não cadastrada");
        }

        return self::$instance;
    }

    public static function CancelarNfse(string $CNPJ, string $Used_Companny, Consulta_Notas $Tipo_Consulta): string|int
    {

        $Operacao = 'CancelarNfse';
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Compor_MensagemXML($Operacao, $Tipo_Consulta);
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('<prod:CancelarNfseV3>', '<prod:CancelarNfse>', $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public static function ConsultarLoteRpsV3(string $CNPJ, string $Used_Companny, Consulta_Notas $Tipo_Consulta): string|int
    {

        $Operacao = 'ConsultarLoteRps';
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Compor_MensagemXML($Operacao, $Tipo_Consulta);
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public static function ConsultarNfsePorRpsV3(string $CNPJ, string $Used_Companny, Consulta_Notas $Tipo_Consulta): string|int
    {

        $Operacao = 'ConsultarNfsePorRps';
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Compor_MensagemXML($Operacao, $Tipo_Consulta);
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public static function ConsultarNfseV3(string $CNPJ, string $Inscricao_Municipal, Consulta_Notas $Tipo_Consulta, string $Used_Companny,  string $Data_Inicial, string $Data_Final, string $Numero_Nota_Fiscal): string|int
    {

        $Operacao = 'ConsultarNfse';
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Compor_MensagemXML($Operacao, $Tipo_Consulta);
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = str_replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $DadosMsg);

        if ($Tipo_Consulta == 0) {
            $DadosMsg = str_replace('[CAMPO_NUMERO_NOTA]', $Numero_Nota_Fiscal, $DadosMsg);
        } elseif ($Tipo_Consulta == 1) {
            $DadosMsg = str_replace('[CAMPO_DATA_INICIAL]', date("Ymd", strtotime($Data_Inicial)), $DadosMsg);
            $DadosMsg = str_replace('[CAMPO_DATA_FINAL]', date("Ymd", strtotime($Data_Final)), $DadosMsg);
        }

        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public static function ConsultarSituacaoLoteRpsV3(string $CNPJ, string $Used_Companny, Consulta_Notas $Tipo_Consulta): string|int
    {

        $Operacao = 'ConsultarSituacaoLoteRps';
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Compor_MensagemXML($Operacao, $Tipo_Consulta);
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    public static function RecepcionarLoteRpsV3(string $CNPJ, string $Used_Companny, Consulta_Notas $Tipo_Consulta): string|int
    {

        $Operacao = 'RecepcionarLoteRps';
        $Mount_Mensage = self::Message_Assemble();
        $DadosMsg = self::Compor_MensagemXML($Operacao, $Tipo_Consulta);
        $DadosMsg = str_replace('[CAMPO_CNPJ]', $CNPJ, $DadosMsg);
        $DadosMsg = self::Sign_XML($DadosMsg, $Used_Companny);
        $Mount_Mensage = str_replace('[Mount_Mensage]', $Operacao, $Mount_Mensage);
        $Mount_Mensage = str_replace('<RecepcionarLoteRpsEnvio>', '<EnviarLoteRpsEnvio>', $Mount_Mensage);
        $Mount_Mensage = str_replace('[DadosMsg]', $DadosMsg, $Mount_Mensage);

        return self::Conection(self::$Link_Prefeitura, $Mount_Mensage, $Used_Companny);
    }

    private static function Sign_XML(string $Xml_Not_Signing, string $Used_Companny): string
    {

        //Set SignedXml = New z_cls_WsFuncoes;
        //return SignedXml.Sign_XML($Xml_Not_Signing, $Used_Companny);
        dd($Xml_Not_Signing);
    }

    private static function Conection(string $Prefeitura, string $Mensage, string $Used_Companny): string|int
    {

        return ''; //Connection::Conexao($Prefeitura, $Mensage, $Used_Companny, Nothing , 'POST', false, false);

    }

    private static function Message_Assemble(): string
    {

        $Message_Assemble = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prod="http://producao.issfortaleza.com.br">';
        $Message_Assemble = $Message_Assemble . '<soapenv:Header/>';
        $Message_Assemble = $Message_Assemble . '<soapenv:Body>';
        $Message_Assemble = $Message_Assemble . '<prod:[Mount_Mensage]V3>';
        $Message_Assemble = $Message_Assemble . '<Cabecalho></Cabecalho>';
        $Message_Assemble = $Message_Assemble . '<[Mount_Mensage]Envio><![CDATA[[DadosMsg]]]></[Mount_Mensage]Envio>';
        $Message_Assemble = $Message_Assemble . '</prod:[Mount_Mensage]V3>';
        $Message_Assemble = $Message_Assemble . '</soapenv:Body>';
        $Message_Assemble = $Message_Assemble . '</soapenv:Envelope>';

        return $Message_Assemble;
    }

    private static function Compor_MensagemXML(string $Tipo, Consulta_Notas $Tipo_Consulta): string
    {

        $MensagemXML = '';

        switch ($Tipo) {
            case 'CancelarNfse':
                $MensagemXML = '';

            case 'ConsultarLoteRps':
                $MensagemXML = '';

            case 'ConsultarNfsePorRps':
                $MensagemXML = '';

            case 'ConsultarNfse':

                if ($Tipo_Consulta == 0) {
                    $MensagemXML = '<ns2:ConsultarNfseEnvio xmlns:ns2="http://www.ginfes.com.br/servico_consultar_nfse_envio_v03.xsd" xmlns="http://www.ginfes.com.br/tipos_v03.xsd" xmlns:ns3="http://www.w3.org/2000/09/xmldsig#">';
                    $MensagemXML = $MensagemXML . '<ns2:Prestador>';
                    $MensagemXML = $MensagemXML . '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                    $MensagemXML = $MensagemXML . '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                    $MensagemXML = $MensagemXML . '</ns2:Prestador>';
                    $MensagemXML = $MensagemXML . '<ns2:NumeroNfse>[CAMPO_NUMERO_NOTA]</ns2:NumeroNfse>';
                    $MensagemXML = $MensagemXML . '</ns2:ConsultarNfseEnvio>';
                } elseif ($Tipo_Consulta == 1) {
                    $MensagemXML = '<ConsultarNfseEnvio xmlns="http://www.ginfes.com.br/servico_consultar_nfse_envio_v03.xsd">';
                    $MensagemXML = $MensagemXML . '<Prestador>';
                    $MensagemXML = $MensagemXML . '<tipos:Cnpj xmlns:tipos="http://www.ginfes.com.br/tipos_v03.xsd">[CAMPO_CNPJ]</tipos:Cnpj>';
                    $MensagemXML = $MensagemXML . '<tipos:InscricaoMunicipal xmlns:tipos="http://www.ginfes.com.br/tipos_v03.xsd">[CAMPO_INSCRICAO_MUNICIPAL]</tipos:InscricaoMunicipal>';
                    $MensagemXML = $MensagemXML . '</Prestador>';
                    $MensagemXML = $MensagemXML . '<PeriodoEmissao>';
                    $MensagemXML = $MensagemXML . '<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>';
                    $MensagemXML = $MensagemXML . '<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>';
                    $MensagemXML = $MensagemXML . '</PeriodoEmissao>';
                    $MensagemXML = $MensagemXML . '</ConsultarNfseEnvio>';
                };

            case 'ConsultarSituacaoLoteRps':
                $MensagemXML = '';

            case 'RecepcionarLoteRps':
                $MensagemXML = '';
        };

        return $MensagemXML;
    }

    public static function Select_Template()
    {

        //Set Template = New cls_Template
        //return Template.Select_Template(self::$Filial);
        dd(self::$Filial);
    }

    public static function Exluir_Template(string $PathTemplate): bool
    {

        //Set Template = New cls_Template
        //return Template.Delete_Template($PathTemplate);
        dd($PathTemplate);
    }

    public static function Preecher_Template($Array_Dados_TNT, $ParametersTemplate, $Dict_Xml): array
    {

        /*
        Set htmlDoc = CreateObject("htmlfile")
            htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

        Set Descricao_Servico = New cls_Descricao_Servico
            ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("ItemListaServico"))
        Set Descricao_Servico = Nothing

        Set DB_Connection = New cls_DB_Connection
            Data = Array("Codigo Municipio", Dict_Xml.Item("TomadorServico.Endereco.CodigoMunicipio"))
            Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
        Set DB_Connection = Nothing

        Url = ""
        //Dict_Xml.Exists("Motivo") TagCancelamento

        With htmlDoc
            Set Nodo = .getElementById("css_b64")
                If Not Nodo Is Nothing Then Nodo.href = ParametersTemplate.Item("LayoutCss")
            Set Nodo = .getElementById("img_company")
                If Not Nodo Is Nothing Then Nodo.src = ParametersTemplate.Item("Company_Img")
            Set Nodo = .getElementById("img_layout")
                If Not Nodo Is Nothing Then Nodo.src = ParametersTemplate.Item("LayoutImg")
            Set Nodo = .getElementById("img_prefeitura")
                If Not Nodo Is Nothing Then Nodo.src = ParametersTemplate.Item("Prefeitura_Img")
            Set Nodo = .getElementById("nome_prefeitura")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(1)
            Set Nodo = .getElementById("cnpj_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Array_Dados_TNT(12), "00"".""000"".""000""/""0000-00")
            Set Nodo = .getElementById("im_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Array_Dados_TNT(5), "000"".""000""-""00")
            Set Nodo = .getElementById("razao_social_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(9)
            Set Nodo = .getElementById("nome_fantasia_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(10)
            Set Nodo = .getElementById("email_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(11)
            Set Nodo = .getElementById("tel_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(6)
            Set Nodo = .getElementById("endereco_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(2)
            Set Nodo = .getElementById("numero_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(3)
            Set Nodo = .getElementById("municipio_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(7)
            Set Nodo = .getElementById("uf_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(8)
            Set Nodo = .getElementById("cep_prestador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Array_Dados_TNT(4), "00000""-""000")
            Set Nodo = .getElementById("numero_nota")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Numero")
            Set Nodo = .getElementById("data_emissao")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Left(Dict_Xml.Item("DataEmissao"), 19), "T", " ", 1), "dd/mm/yyyy hh:mm:ss")
            Set Nodo = .getElementById("codigo_verificacao")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao")
            Set Nodo = .getElementById("cnpj_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
            Set Nodo = .getElementById("razao_social_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorServico.RazaoSocial")
            Set Nodo = .getElementById("numero_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorServico.Endereco.Numero")
            Set Nodo = .getElementById("endereco_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Endereco")
            Set Nodo = .getElementById("municipio_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("Nome Municipio")
            Set Nodo = .getElementById("bairro_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("Endereco.Bairro"), 17)
            Set Nodo = .getElementById("cep_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("Endereco.Cep"), "00000""-""000")
            Set Nodo = .getElementById("uf_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Uf")
            Set Nodo = .getElementById("email_tomador")
                If Not Nodo Is Nothing Then
                    If Dict_Xml.Exists("Contato.Email") Then
                        Nodo.innerHTML = Dict_Xml.Item("Contato.Email")
                    Else
                        Nodo.innerHTML = ""
                    End If
                End If
            Set Nodo = .getElementById("discriminacao_servicos_1")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 1, 90)
            Set Nodo = .getElementById("discriminacao_servicos_2")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 91, 90)
            Set Nodo = .getElementById("discriminacao_servicos_3")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 181, 90)
            Set Nodo = .getElementById("discriminacao_servicos_4")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 271, 90)
            Set Nodo = .getElementById("discriminacao_servicos_5")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 361, 90)
            Set Nodo = .getElementById("discriminacao_servicos_6")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 451, 90)
            Set Nodo = .getElementById("discriminacao_servicos_7")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 541, 90)
            Set Nodo = .getElementById("discriminacao_servicos_8")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("Discriminacao"), 631, 90)
            Set Nodo = .getElementById("retencao_cofins")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_csll")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_inss")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_irpj")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_pis")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("valor_servicos")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("valor_liquido")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorLiquidoNfse"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("servico_prestado_1")
                If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
            Set Nodo = .getElementById("servico_prestado_2")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
            Set Nodo = .getElementById("base_de_calculo")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("BaseCalculo"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("aliquota")
                If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("Aliquota"), ".", ","), 2)
            Set Nodo = .getElementById("valor_deducoes")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("desconto_incondicionado")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("outras_retencoes")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("valor_iss")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIss"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("credito_iptu")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("outras_informacoes_1")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 1, 89)
            Set Nodo = .getElementById("outras_informacoes_2")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 90, 89)
            Set Nodo = .getElementById("outras_informacoes_3")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 180, 89)
            Set Nodo = .getElementById("outras_informacoes_4")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 269, 89)
            Set Nodo = .getElementById("outras_informacoes_5")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 358, 89)
            Set Nodo = .getElementById("outras_informacoes_6")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 447, 89)
            Set Nodo = .getElementById("outras_informacoes_7")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 535, 89)
        End With
        */

        //Dict_Xml.Item("CpfCnpj.Cnpj"), htmlDoc.Body.innerHTML
        return array('');
    }
}
