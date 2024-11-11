<?php

namespace App\Services\Towns\SigIss;


class SigIss
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Versao_Cabecalho As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Get Versao_Cabecalho() As String: Versao_Cabecalho = This.Versao_Cabecalho: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Versao_Cabecalho = Split(Links_Prefeituras.Item(Value), "|")(1): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "POU", "https://abrasfpousoalegre.sigcorp.com.br/servico.asmx|2.03" 'Prefeitura Pouso Alegre

End Sub

Public Function Assinar(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "Assinar": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "<tem:nfseCabecMsg><![CDATA[[CabecMsg]]]></tem:nfseCabecMsg>", "<tem:xml><![CDATA[[CabecMsg]]]></tem:xml>")
    Mount_Mensage = Replace(Mount_Mensage, "<tem:nfseDadosMsg><![CDATA[[DadosMsg]]]></tem:nfseDadosMsg>", "<tem:tag><![CDATA[[DadosMsg]]]></tem:tag>")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    Assinar = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function CancelaNota(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "CancelaNota": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelaNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function CancelarNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "CancelarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function consultarNfsePorFaixa(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Nota_Inicial As String, _
                                      ByVal Nota_Final As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfsePorFaixa": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_FINAL]", Nota_Final)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfsePorFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function GerarNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "GerarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRpsSincrono(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRpsSincrono": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function SubstituirNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "SubstituirNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "application/soap+xml;charset=utf-8"
        Headers.Add "User-Agent", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:tem=""http://tempuri.org/"">"
    Message_Assemble = Message_Assemble & "<soap:Header/>"
    Message_Assemble = Message_Assemble & "<soap:Body>"
    Message_Assemble = Message_Assemble & "<tem:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<tem:nfseCabecMsg><![CDATA[[CabecMsg]]]></tem:nfseCabecMsg>"
    Message_Assemble = Message_Assemble & "<tem:nfseDadosMsg><![CDATA[[DadosMsg]]]></tem:nfseDadosMsg>"
    Message_Assemble = Message_Assemble & "</tem:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soap:Body>"
    Message_Assemble = Message_Assemble & "</soap:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

   Dim MensagemXML As String

   Select Case Tipo

    Case Is = "Assinar"
    Case Is = "CancelaNota"
    Case Is = "CancelarNfse"
    Case Is = "ConsultarLoteRps"
    Case Is = "ConsultarNfsePorFaixa"

        MensagemXML = "<ConsultarNfseFaixaEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
        MensagemXML = MensagemXML & "<Prestador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</Prestador>"
        MensagemXML = MensagemXML & "<Faixa>"
        MensagemXML = MensagemXML & "<NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</NumeroNfseInicial>"
        MensagemXML = MensagemXML & "<NumeroNfseFinal>[CAMPO_NOTA_FINAL]</NumeroNfseFinal>"
        MensagemXML = MensagemXML & "</Faixa>"
        MensagemXML = MensagemXML & "<Pagina>1</Pagina>"
        MensagemXML = MensagemXML & "</ConsultarNfseFaixaEnvio>"

    Case Is = "ConsultarNfsePorRps"
    Case Is = "GerarNfse"
    Case Is = "RecepcionarLoteRps"
    Case Is = "RecepcionarLoteRpsSincrono"
    Case Is = "SubstituirNfse"

   End Select

   Compor_MensagemXML = MensagemXML

   MensagemXML = ""

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String

   Select Case Tipo

    Case Is = "2.03"
         Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd"" versao=""2.03""><versaoDados>2.03</versaoDados></cabecalho>"

    Case Else
         MsgBox "Tipo Não Cadastrado!"
         Stop

   End Select

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
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("ItemListaServico"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = Dict_Xml.Item("LinkNota")
    'CInt(Dict_Xml.Item("Status")) <> 1 Tag Cancelada

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("IdentificacaoTomador.CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Tomador.RazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Tomador.Endereco.Numero")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCofins"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCsll"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorInss"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIr"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorPis"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Item("IssRetido") = 2 Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
                ElseIf Dict_Xml.Item("IssRetido") = 1 Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorLiquidoNfse"), ".", ","), "R$ #,##0.00")
                End If
            End If
        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("BaseCalculo"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("Aliquota"), ".", ","), 2)
        Set Nodo = .getElementById("valor_deducoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorDeducoes"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("desconto_incondicionado")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("DescontoIncondicionado"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("OutrasRetencoes"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIss"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("credito_iptu")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_informacoes_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 1, 115)
        Set Nodo = .getElementById("outras_informacoes_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 116, 115)
        Set Nodo = .getElementById("outras_informacoes_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 231, 115)
        Set Nodo = .getElementById("outras_informacoes_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 346, 115)
        Set Nodo = .getElementById("outras_informacoes_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 461, 115)
        Set Nodo = .getElementById("outras_informacoes_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 576, 115)
        Set Nodo = .getElementById("outras_informacoes_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 691, 115)
    End With

    Preecher_Template = Array(Dict_Xml.Item("IdentificacaoTomador.CpfCnpj.Cnpj"), htmlDoc.Body.innerHTML)

End Function


*/
}
