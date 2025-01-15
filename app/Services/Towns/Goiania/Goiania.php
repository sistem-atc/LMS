<?php

namespace App\Services\Towns\Goiania;


class Goiania
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "GYN", "https://nfse.goiania.go.gov.br/ws/nfse.asmx" 'Prefeitura Goiania

End Sub

Public Function ConsultarNfseRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_RPS As String, _
                                 ByVal Used_Companny As String, Optional Serie_RPS As String = "UNICA") As Variant

    Dim Mount_Mensage As String, DadosMsg As String, Operacao As String

    Operacao = "ConsultarNfseRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", Conf.Item("CNPJ_Matriz_" & Used_Companny))
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function GerarNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, DadosMsg As String, Operacao As String

    Operacao = "GerarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, ByVal Operation As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        Headers.Add "SOAPAction", "http://nfse.goiania.go.gov.br/ws/" & Operation

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:ws=""http://nfse.goiania.go.gov.br/ws/"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<ws:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<ws:ArquivoXML><![CDATA[[DadosMsg]]]></ws:ArquivoXML>"
    Message_Assemble = Message_Assemble & "</ws:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "ConsultarNfseRps"

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://nfse.goiania.go.gov.br/xsd/nfse_gyn_v02.xsd"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>[CAMPO_NUMERO_RPS]</Numero>"
            MensagemXML = MensagemXML & "<Serie>[CAMPO_SERIE_RPS]</Serie>"
            MensagemXML = MensagemXML & "<Tipo>1</Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "</ConsultarNfseRpsEnvio>"

        Case Is = "GerarNfse"

            MensagemXML = "<GerarNfseEnvio xmlns=""http://nfse.goiania.go.gov.br/xsd/nfse_gyn_v02.xsd"">"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>18</Numero>"
            MensagemXML = MensagemXML & "<Serie>UNICA</Serie>"
            MensagemXML = MensagemXML & "<Tipo>1</Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao>2011-11-16T00:00:00</DataEmissao>"
            MensagemXML = MensagemXML & "<Status>1</Status>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos>2000.00</ValorServicos>"
            MensagemXML = MensagemXML & "<ValorPis>40.50</ValorPis>"
            MensagemXML = MensagemXML & "<ValorCofins>20.00</ValorCofins>"
            MensagemXML = MensagemXML & "<ValorInss>10.50</ValorInss>"
            MensagemXML = MensagemXML & "<ValorCsll>30.00</ValorCsll>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio>551080100</CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<Discriminacao>TESTE DE WEBSERVICE RETIDO</Discriminacao>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>2530000</CodigoMunicipio>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cpf>24329550130</Cpf>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1300687</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>06926334000177</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>2118513</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial>GRAMADO EMPREENDIMENTOS</RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Endereco>RUA 3</Endereco>"
            MensagemXML = MensagemXML & "<Numero>1003</Numero>"
            MensagemXML = MensagemXML & "<Complemento>1003</Complemento>"
            MensagemXML = MensagemXML & "<Bairro>CAPUAVA</Bairro>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>2530000</CodigoMunicipio>"
            MensagemXML = MensagemXML & "<Uf>GO</Uf>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</GerarNfseEnvio>"

   End Select

   Compor_MensagemXML = MensagemXML

   MensagemXML = ""

End Function

Public Function Select_Template() As Object

    Dim Template As cls_Template

    Set Template = New cls_Template
        Set Select_Template = Template.Select_Template(This.Filial_Usada)
    Set Template = Nothing

End Function

Public Function Exluir_Template(ByVal PathTemplate As String) As Boolean

    Dim Template As cls_Template

    Set Template = New cls_Template: Exluir_Template = Template.Delete_Template(PathTemplate): Set Template = Nothing

End Function

Public Function Preecher_Template(ByVal Array_Dados_TNT As Variant, ByVal ParametersTemplate As Object, ByVal Dict_Xml As Object) As Variant

    Dim htmlDoc As Object, Nodo As Object, ArrayDescricao As Variant, Data() As Variant, DictUF As Object
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Url As String

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("CodigoTributacaoMunicipio"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = "https://www6.goiania.go.gov.br/sistemas/snfse/asp/snfse00200w0.asp?nota=" & Dict_Xml.Item("Numero")

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Left(Dict_Xml.Item("DataEmissao"), 19), "T", " ", 1), "dd/mm/yyyy")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao")
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("RazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Numero")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("Nome Municipio")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("Bairro"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("Endereco.Cep"), "00000""-""000") 'Não tem CEP
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Uf")
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("Email") Then
                    Nodo.innerHTML = Dict_Xml.Item("Email")
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
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCofins") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCofins"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(0, "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCofins") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCsll"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(0, "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCofins") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorInss"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(0, "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCofins") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIr"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(0, "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCofins") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorPis"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(0, "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("BaseCalculo") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("BaseCalculo"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(Replace(0, ".", ","), "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("aliquota")
            If Dict_Xml.Exists("Aliquota") Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("Aliquota"), ".", ","), 2) Else Nodo.innerHTML = 0
        Set Nodo = .getElementById("valor_deducoes")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorDeducoes") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorDeducoes"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(Replace(0, ".", ","), "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("desconto_incondicionado")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("DescontoIncondicionado") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("DescontoIncondicionado"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(Replace(0, ".", ","), "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorIss") Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIss"), ".", ","), "R$ #,##0.00") Else Nodo.innerHTML = Format(Replace(0, ".", ","), "R$ #,##0.00")
            End If
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

    Preecher_Template = Array(Dict_Xml.Item("CpfCnpj.Cnpj"), htmlDoc.Body.innerHTML)

End Function


*/
}
