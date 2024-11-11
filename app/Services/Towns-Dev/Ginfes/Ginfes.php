<?php

namespace App\Services\Towns\Ginfes;


class Ginfes
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Versao_Cabecalho As String: Filial_Usada As String: Fator_Aliquota As Integer: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Versao_Cabecalho = Split(Links_Prefeituras.Item(Value), "|")(1): This.Fator_Aliquota = Split(Links_Prefeituras.Item(Value), "|")(2): End Property
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Get Versao_Cabecalho() As String: Versao_Cabecalho = This.Versao_Cabecalho: End Property
Private Property Get Fator_Aliquota() As Integer: Fator_Aliquota = This.Fator_Aliquota: End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "CAU", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|100"      'Prefeitura Caruaru
    Links_Prefeituras.Add "BEL", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|1"        'Prefeitura Belem
    Links_Prefeituras.Add "CGO", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|1"        'Prefeitura Campos Goytacazes
    Links_Prefeituras.Add "FRC", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|100"      'Prefeitura Franca
    Links_Prefeituras.Add "MCZ", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|1"        'Prefeitura Maceio
    Links_Prefeituras.Add "SJP", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|100"      'Prefeitura São José do Rio Preto
    Links_Prefeituras.Add "STO", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|100"      'Prefeitura Santos
    Links_Prefeituras.Add "BHE", "https://producao.ginfes.com.br//ServiceGinfesImpl|3|100"      'Prefeitura Betim

End Sub

Public Function CancelarNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "CancelarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function CancelarNfseV3(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "CancelarNfseV3": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)

    CancelarNfseV3 = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRpsV3(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarLoteRpsV3": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)

    ConsultarLoteRpsV3 = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRpsV3(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRpsV3": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)

    ConsultarNfsePorRpsV3 = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseV3(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfseV3": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)

    If CNPJ = "10970887000951" Then
        ConsultarNfseV3 = Conection(Prefeitura_Utilizada, Mount_Mensage, "TNT")
    Else
        ConsultarNfseV3 = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    End If

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRpsV3(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRpsV3": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)

    ConsultarSituacaoLoteRpsV3 = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRpsV3(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRpsV3": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)

    RecepcionarLoteRpsV3 = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=utf-8"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing

End Function


Private Function Message_Assemble(Optional V2 As Boolean = False) As String

    If V2 Then

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:prod=""http://producao.ginfes.com.br"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<prod:[Mount_Mensage]><arg0>[CabecMsg]</arg0><arg1>[DadosMsg]</arg1></prod:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    Else

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:prod=""http://producao.ginfes.com.br"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<prod:[Mount_Mensage]><arg0>[DadosMsg]</arg0></prod:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    End If

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

   Dim MensagemXML As String

   Select Case Tipo

       Case Is = "CancelarNfse"


       Case Is = "CancelarNfseV3"


       Case Is = "ConsultarLoteRps"


       Case Is = "ConsultarLoteRpsV3"


       Case Is = "ConsultarNfse"


       Case Is = "ConsultarNfsePorRps"


       Case Is = "ConsultarNfsePorRpsV3"


       Case Is = "ConsultarNfseV3"

            MensagemXML = "<ConsultarNfseEnvio xmlns=""http://www.ginfes.com.br/servico_consultar_nfse_envio_v03.xsd"" xmlns:tipos=""http://www.ginfes.com.br/tipos_v03.xsd"" xmlns:xsi=""http://www.w3.org/2000/09/xmldsig#"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tipos:Cnpj>[CAMPO_CNPJ]</tipos:Cnpj>"
            MensagemXML = MensagemXML & "<tipos:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tipos:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "</ConsultarNfseEnvio>"

       Case Is = "ConsultarSituacaoLoteRps"


       Case Is = "ConsultarSituacaoLoteRpsV3"


       Case Is = "RecepcionarLoteRps"


       Case Is = "RecepcionarLoteRpsV3"


       Case Else
        MsgBox "Tipo Não Cadastrado!"
        Stop

   End Select

   Compor_MensagemXML = MensagemXML

   MensagemXML = ""

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String

   Select Case Tipo

    Case Is = "3"
         Compor_CabecalhoXML = "<ns2:cabecalho xmlns:ns2=""http://www.ginfes.com.br/cabecalho_v03.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" versao=""3""><versaoDados>3</versaoDados></ns2:cabecalho>"

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
        Data = Array("Codigo Municipio", Dict_Xml.Item("TomadorServico.Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = "http://visualizar.ginfes.com.br/report/consultarNota?__report=nfs_ver4&cdVerificacao=" & Dict_Xml.Item("CodigoVerificacao") & "&numNota=" & Dict_Xml.Item("Numero") & "&cnpjPrestador=null"

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
            If Not Nodo Is Nothing Then
                Nodo.innerHTML = Array_Dados_TNT(1)
                If Len(Array_Dados_TNT(1)) > 33 Then
                    Nodo.Style.FontSize = "30px"
                End If
            End If

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorServico.RazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorServico.Endereco.Numero")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Endereco")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("Nome Municipio")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then
                If Len(Dict_Xml.Item("Endereco.Bairro")) = 16 Then
                    Nodo.innerHTML = Dict_Xml.Item("Endereco.Bairro")
                Else
                    Nodo.innerHTML = Dict_Xml.Item("Endereco.Bairro")
                    Nodo.Style.FontSize = "30px"
                End If
            End If
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
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCofins") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCofins"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If

        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCsll") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCsll"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If

        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorInss") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorInss"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If

        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorIr") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIr"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If

        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorPis") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorPis"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If

        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")

        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorLiquidoNfse") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorLiquidoNfse"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
                End If
            End If

        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)

        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("BaseCalculo") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("BaseCalculo"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
                End If
            End If

        Set Nodo = .getElementById("aliquota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("Aliquota"), ".", ",") * Fator_Aliquota, 2)
        Set Nodo = .getElementById("valor_deducoes")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorDeducoes") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorDeducoes"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
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

    Preecher_Template = Array(Dict_Xml.Item("CpfCnpj.Cnpj"), htmlDoc.Body.innerHTML)

End Function

*/
}
