<?php

namespace App\Services\Towns\Tinus;


class Tinus
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "REC", "https://www.tinus.com.br/csp/jaboatao/"  'Prefeitura Recife

End Sub

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps"
    EndPoint = "WSNFSE." & Operacao & ".cls"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Protocolo As String, _
                                         ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRps"
    EndPoint = "WSNFSE." & Operacao & ".cls"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Protocolo As String, _
                                 ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarLoteRps"
    EndPoint = "WSNFSE." & Operacao & ".cls"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfsePorRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_RPS As String, _
                                    ByVal Serie_RPS As String, ByVal Tipo_RPS As TypeRPS, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps"
    EndPoint = "WSNFSE." & Operacao & ".cls"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_RPS]", Tipo_RPS)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                              ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfse"
    EndPoint = "WSNFSE." & Operacao & ".cls"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD") & "T00:00:01")
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD") & "T23:59:59")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfse"
    EndPoint = "WSNFSE." & Operacao & ".cls"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, ByVal Operation As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        Headers.Add "SOAPAction", "http://www.tinus.com.br/WSNFSE." & Operation & "." & Operation & ""

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:tin=""http://www.tinus.com.br"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<tin:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<tin:Arg>[DadosMsg]</tin:Arg>"
    Message_Assemble = Message_Assemble & "</tin:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

    Case Is = "RecepcionarLoteRps"

        MensagemXML = "<tin:LoteRps id=""?"">"
        MensagemXML = MensagemXML & "<tin:NumeroLote>?</tin:NumeroLote>"
        MensagemXML = MensagemXML & "<tin:Cnpj>?</tin:Cnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>?</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "<tin:QuantidadeRps>?</tin:QuantidadeRps>"
        MensagemXML = MensagemXML & "<tin:ListaRps>"
        MensagemXML = MensagemXML & "<tin:Rps>"
        MensagemXML = MensagemXML & "<tin:InfRps id=""?"">"
        MensagemXML = MensagemXML & "<tin:IdentificacaoRps>"
        MensagemXML = MensagemXML & "<tin:Numero>?</tin:Numero>"
        MensagemXML = MensagemXML & "<tin:Serie>?</tin:Serie>"
        MensagemXML = MensagemXML & "<tin:Tipo>?</tin:Tipo>"
        MensagemXML = MensagemXML & "</tin:IdentificacaoRps>"
        MensagemXML = MensagemXML & "<tin:DataEmissao>?</tin:DataEmissao>"
        MensagemXML = MensagemXML & "<tin:NaturezaOperacao>?</tin:NaturezaOperacao>"
        MensagemXML = MensagemXML & "<tin:RegimeEspecialTributacao>?</tin:RegimeEspecialTributacao>"
        MensagemXML = MensagemXML & "<tin:OptanteSimplesNacional>?</tin:OptanteSimplesNacional>"
        MensagemXML = MensagemXML & "<tin:IncentivadorCultural>?</tin:IncentivadorCultural>"
        MensagemXML = MensagemXML & "<tin:Status>?</tin:Status>"
        MensagemXML = MensagemXML & "<tin:RpsSubstituido>"
        MensagemXML = MensagemXML & "<tin:Numero>?</tin:Numero>"
        MensagemXML = MensagemXML & "<tin:Serie>?</tin:Serie>"
        MensagemXML = MensagemXML & "<tin:Tipo>?</tin:Tipo>"
        MensagemXML = MensagemXML & "</tin:RpsSubstituido>"
        MensagemXML = MensagemXML & "<tin:Servico>"
        MensagemXML = MensagemXML & "<tin:Valores>"
        MensagemXML = MensagemXML & "<tin:ValorServicos>?</tin:ValorServicos>"
        MensagemXML = MensagemXML & "<tin:ValorDeducoes>?</tin:ValorDeducoes>"
        MensagemXML = MensagemXML & "<tin:ValorPis>?</tin:ValorPis>"
        MensagemXML = MensagemXML & "<tin:ValorCofins>?</tin:ValorCofins>"
        MensagemXML = MensagemXML & "<tin:ValorInss>?</tin:ValorInss>"
        MensagemXML = MensagemXML & "<tin:ValorIr>?</tin:ValorIr>"
        MensagemXML = MensagemXML & "<tin:ValorCsll>?</tin:ValorCsll>"
        MensagemXML = MensagemXML & "<tin:IssRetido>?</tin:IssRetido>"
        MensagemXML = MensagemXML & "<tin:ValorIss>?</tin:ValorIss>"
        MensagemXML = MensagemXML & "<tin:ValorIssRetido>?</tin:ValorIssRetido>"
        MensagemXML = MensagemXML & "<tin:OutrasRetencoes>?</tin:OutrasRetencoes>"
        MensagemXML = MensagemXML & "<tin:BaseCalculo>?</tin:BaseCalculo>"
        MensagemXML = MensagemXML & "<tin:Aliquota>?</tin:Aliquota>"
        MensagemXML = MensagemXML & "<tin:ValorLiquidoNfse>?</tin:ValorLiquidoNfse>"
        MensagemXML = MensagemXML & "<tin:DescontoIncondicionado>?</tin:DescontoIncondicionado>"
        MensagemXML = MensagemXML & "<tin:DescontoCondicionado>?</tin:DescontoCondicionado>"
        MensagemXML = MensagemXML & "</tin:Valores>"
        MensagemXML = MensagemXML & "<tin:ItemListaServico>?</tin:ItemListaServico>"
        MensagemXML = MensagemXML & "<tin:CodigoCnae>?</tin:CodigoCnae>"
        MensagemXML = MensagemXML & "<tin:CodigoTributacaoMunicipio>?</tin:CodigoTributacaoMunicipio>"
        MensagemXML = MensagemXML & "<tin:Discriminacao>?</tin:Discriminacao>"
        MensagemXML = MensagemXML & "<tin:CodigoMunicipio>?</tin:CodigoMunicipio>"
        MensagemXML = MensagemXML & "</tin:Servico>"
        MensagemXML = MensagemXML & "<tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Cnpj>?</tin:Cnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>?</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Tomador>"
        MensagemXML = MensagemXML & "<tin:IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<tin:CpfCnpj>"
        MensagemXML = MensagemXML & "<tin:Cpf>?</tin:Cpf>"
        MensagemXML = MensagemXML & "<tin:Cnpj>?</tin:Cnpj>"
        MensagemXML = MensagemXML & "</tin:CpfCnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>?</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</tin:IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<tin:RazaoSocial>?</tin:RazaoSocial>"
        MensagemXML = MensagemXML & "<tin:Endereco>"
        MensagemXML = MensagemXML & "<tin:Endereco>?</tin:Endereco>"
        MensagemXML = MensagemXML & "<tin:Numero>?</tin:Numero>"
        MensagemXML = MensagemXML & "<tin:Complemento>?</tin:Complemento>"
        MensagemXML = MensagemXML & "<tin:Bairro>?</tin:Bairro>"
        MensagemXML = MensagemXML & "<tin:CodigoMunicipio>?</tin:CodigoMunicipio>"
        MensagemXML = MensagemXML & "<tin:Uf>?</tin:Uf>"
        MensagemXML = MensagemXML & "<tin:Cep>?</tin:Cep>"
        MensagemXML = MensagemXML & "</tin:Endereco>"
        MensagemXML = MensagemXML & "<tin:Contato>"
        MensagemXML = MensagemXML & "<tin:Telefone>?</tin:Telefone>"
        MensagemXML = MensagemXML & "<tin:Email>?</tin:Email>"
        MensagemXML = MensagemXML & "</tin:Contato>"
        MensagemXML = MensagemXML & "</tin:Tomador>"
        MensagemXML = MensagemXML & "<tin:IntermediarioServico>"
        MensagemXML = MensagemXML & "<tin:RazaoSocial>?</tin:RazaoSocial>"
        MensagemXML = MensagemXML & "<tin:CpfCnpj>"
        MensagemXML = MensagemXML & "<tin:Cpf>?</tin:Cpf>"
        MensagemXML = MensagemXML & "<tin:Cnpj>?</tin:Cnpj>"
        MensagemXML = MensagemXML & "</tin:CpfCnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>?</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</tin:IntermediarioServico>"
        MensagemXML = MensagemXML & "<tin:ConstrucaoCivil>"
        MensagemXML = MensagemXML & "<tin:CodigoObra>?</tin:CodigoObra>"
        MensagemXML = MensagemXML & "<tin:Art>?</tin:Art>"
        MensagemXML = MensagemXML & "</tin:ConstrucaoCivil>"
        MensagemXML = MensagemXML & "</tin:InfRps>"
        MensagemXML = MensagemXML & "</tin:Rps>"
        MensagemXML = MensagemXML & "</tin:ListaRps>"
        MensagemXML = MensagemXML & "</tin:LoteRps>"

    Case Is = "ConsultarSituacaoLoteRps"

        MensagemXML = "<tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Cnpj>[CAMPO_CNPJ]</tin:Cnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Protocolo>[CAMPO_PROTOCOLO]</tin:Protocolo>"

    Case Is = "ConsultarLoteRps"

        MensagemXML = "<tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Cnpj>[CAMPO_CNPJ]</tin:Cnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Protocolo>[CAMPO_PROTOCOLO]</tin:Protocolo>"

    Case Is = "ConsultarNfsePorRps"

        MensagemXML = "<tin:IdentificacaoRps>"
        MensagemXML = MensagemXML & "<tin:Numero>[CAMPO_NUMERO_RPS]</tin:Numero>"
        MensagemXML = MensagemXML & "<tin:Serie>[CAMPO_SERIE_RPS]</tin:Serie>"
        MensagemXML = MensagemXML & "<tin:Tipo>[CAMPO_TIPO_RPS]</tin:Tipo>"
        MensagemXML = MensagemXML & "</tin:IdentificacaoRps>"
        MensagemXML = MensagemXML & "<tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Cnpj>[CAMPO_CNPJ]</tin:Cnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</tin:Prestador>"

    Case Is = "ConsultarNfse"

        MensagemXML = "<tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:Cnpj>[CAMPO_CNPJ]</tin:Cnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</tin:Prestador>"
        MensagemXML = MensagemXML & "<tin:PeriodoEmissao>"
        MensagemXML = MensagemXML & "<tin:DataInicial>[CAMPO_DATA_INICIAL]</tin:DataInicial>"
        MensagemXML = MensagemXML & "<tin:DataFinal>[CAMPO_DATA_FINAL]</tin:DataFinal>"
        MensagemXML = MensagemXML & "</tin:PeriodoEmissao>"

    Case Is = "CancelarNfse"

        MensagemXML = "<tin:Pedido>"
        MensagemXML = MensagemXML & "<tin:InfPedidoCancelamento id=""[CAMPO_ID_PEDIDO_CANCELAMENTO]"">"
        MensagemXML = MensagemXML & "<tin:IdentificacaoNfse>"
        MensagemXML = MensagemXML & "<tin:Numero>[CAMPO_NUMERO_NOTA]</tin:Numero>"
        MensagemXML = MensagemXML & "<tin:Cnpj>[CAMPO_CNPJ]</tin:Cnpj>"
        MensagemXML = MensagemXML & "<tin:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tin:InscricaoMunicipal>"
        MensagemXML = MensagemXML & "<tin:CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</tin:CodigoMunicipio>"
        MensagemXML = MensagemXML & "</tin:IdentificacaoNfse>"
        MensagemXML = MensagemXML & "<tin:CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</tin:CodigoCancelamento>"
        MensagemXML = MensagemXML & "</tin:InfPedidoCancelamento>"
        MensagemXML = MensagemXML & "</tin:Pedido>"

    Case Else

        MsgBox "Tipo Não Cadastrado!"
        Stop

    End Select

    Compor_MensagemXML = MensagemXML

    MensagemXML = ""

End Function

'QR Code = "http://www.tinus.com.br/csp/JABOATAO/portal/nfsepdfQR.csp?WPARAM=" & IncricaoPrestador & "-" & NumeroNota & "-" & CodigoVerificação
'QR Code = http://www.tinus.com.br/csp/JABOATAO/portal/nfsepdfQR.csp?WPARAM=9484191-000055421-BRZF87169

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
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Url As String, Consulta_Nota As Variant

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("ItemListaServico"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("TomadorServico.Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Consulta_Nota = Consulta_Descricao(Dict_Xml.Item("InscricaoMunicipal"), Dict_Xml.Item("Numero"), Dict_Xml.Item("CodigoVerificacao"))

    Url = Dict_Xml.Item("Discriminacao")
    'Dict_Xml.Item("Status") Tag Cancelamento

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 1, 90)
        Set Nodo = .getElementById("discriminacao_servicos_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 91, 90)
        Set Nodo = .getElementById("discriminacao_servicos_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 181, 90)
        Set Nodo = .getElementById("discriminacao_servicos_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 271, 90)
        Set Nodo = .getElementById("discriminacao_servicos_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 361, 90)
        Set Nodo = .getElementById("discriminacao_servicos_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 451, 90)
        Set Nodo = .getElementById("discriminacao_servicos_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 541, 90)
        Set Nodo = .getElementById("discriminacao_servicos_8")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Consulta_Nota(0), 631, 90)
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")  'Dict_XML.Item("ValorLiquidoNfse") 'Valor Retornando zerado
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("OutrasRetencoes"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIss"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("credito_iptu")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_informacoes_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Consulta_Nota(1)
        Set Nodo = .getElementById("outras_informacoes_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 1, 89)
        Set Nodo = .getElementById("outras_informacoes_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 90, 89)
        Set Nodo = .getElementById("outras_informacoes_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 180, 89)
        Set Nodo = .getElementById("outras_informacoes_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 269, 89)
        Set Nodo = .getElementById("outras_informacoes_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 358, 89)
        Set Nodo = .getElementById("outras_informacoes_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 447, 89)
    End With

    Preecher_Template = Array(Dict_Xml.Item("CpfCnpj.Cnpj"), htmlDoc.Body.innerHTML)

End Function

Private Function Consulta_Descricao(ByVal Inscricao_Estadual As String, ByVal Numero_Nota As String, ByVal Codigo_Verificacao As String) As Variant

    Dim Link_Select_Description As String, Conexao As cls_Connection, StrDescription As Variant
    Dim Description_HTML As Object, TagFont As Variant

    Const Partial_Link As String = "https://www.tinus.com.br/csp/JABOATAO/portal/nfsepdf.csp?WPARAM="

    Link_Select_Description = Partial_Link & Inscricao_Estadual & "-" & Format(Numero_Nota, "000000000") & "-" & Codigo_Verificacao

    Set Conexao = New cls_Connection
        StrDescription = Conexao.Conexao(Link_Select_Description, "", "TNT", Nothing, "GET")
    Set Conexao = Nothing

    Set Description_HTML = CreateObject("htmlfile")
    Description_HTML.Body.innerHTML = StrDescription

    If Inscricao_Estadual = "9418407" Then
        For Each TagFont In Description_HTML.getElementsByTagName("font")
            If InStr(1, TagFont.innerText, "Local de Prestacao do Servico") > 0 Then
                Consulta_Descricao = Array(TagFont.innerText, Link_Select_Description)
                Exit For
            End If
        Next
    ElseIf Inscricao_Estadual = "9484191" Then
        For Each TagFont In Description_HTML.getElementsByTagName("font")
            If InStr(1, TagFont.innerText, "Numero fiscal do RPS") > 0 Then
                Consulta_Descricao = Array(TagFont.innerText, Link_Select_Description)
                Exit For
            End If
        Next
    Else
        Debug.Print "Inscrição não encontrada"
        Consulta_Descricao = Array("", Link_Select_Description)
    End If

    Set TagFont = Nothing
    Set Description_HTML = Nothing

End Function
*/
}
