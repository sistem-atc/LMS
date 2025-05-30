<?php

namespace App\Services\Towns\Systems\PortalDirecta;


class PortalDirecta
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
    Links_Prefeituras.Add "NAT", "https://wsnfsev1.natal.rn.gov.br:8444/axis2/services/NfseWSServiceV1|1" 'Prefeitura Porto Alegre

End Sub

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "CancelarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseRequest(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                     ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseRequest = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRPS": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

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

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:wsn=""https://wsnfsev1.natal.rn.gov.br:8444"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<wsn:[Mount_Mensage]Request>"
    Message_Assemble = Message_Assemble & "<nfseCabecMsg><![CDATA[[CabecMsg]]]></nfseCabecMsg>"
    Message_Assemble = Message_Assemble & "<nfseDadosMsg><![CDATA[[DadosMsg]]]></nfseDadosMsg>"
    Message_Assemble = Message_Assemble & "</wsn:[Mount_Mensage]Request>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = MensagemXML & "<CancelarNfseEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"
            MensagemXML = MensagemXML & "<Pedido xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<InfPedidoCancelamento Id=""pedidoCancelamento_999999990001911733160024200900000000001"">"
            MensagemXML = MensagemXML & "<IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<Numero>200900000000428</Numero>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1733160024</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>3106200</CodigoMunicipio>"
            MensagemXML = MensagemXML & "</IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<CodigoCancelamento>2</CodigoCancelamento>"
            MensagemXML = MensagemXML & "</InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "</Pedido>"
            MensagemXML = MensagemXML & "</CancelarNfseEnvio>"

        Case Is = "ConsultarLoteRps"

            MensagemXML = "<ConsultarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1733160024</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo>Ak0591217L2009q000000006</Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarLoteRpsEnvio>"

        Case Is = "ConsultarNfsePorRps"

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>1</Numero>"
            MensagemXML = MensagemXML & "<Serie>ABYDZ</Serie>"
            MensagemXML = MensagemXML & "<Tipo>1</Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1733160024</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "</ConsultarNfseRpsEnvio>"

        Case Is = "ConsultarNfse"

            MensagemXML = "<ConsultarNfseEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "</ConsultarNfseEnvio>"

        Case Is = "ConsultarSituacaoLoteRps"

            MensagemXML = "<ConsultarSituacaoLoteRpsEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1733160024</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo>Ak0591217L2009q000000006</Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarSituacaoLoteRpsEnvio>"

        Case Is = "RecepcionarLoteRPS"

            MensagemXML = MensagemXML & "<EnviarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"
            MensagemXML = MensagemXML & "<LoteRps id=""lote"" versao=""1.00"">"
            MensagemXML = MensagemXML & "<NumeroLote>1</NumeroLote>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1733160024</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<QuantidadeRps>2</QuantidadeRps>"
            MensagemXML = MensagemXML & "<ListaRps>"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<InfRps id=""rps:1ABCDZ"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>1</Numero>"
            MensagemXML = MensagemXML & "<Serie>ABCDZ</Serie>"
            MensagemXML = MensagemXML & "<Tipo>1</Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao>2009-06-16T21:00:00</DataEmissao>"
            MensagemXML = MensagemXML & "<NaturezaOperacao>1</NaturezaOperacao>"
            MensagemXML = MensagemXML & "<RegimeEspecialTributacao>6</RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<OptanteSimplesNacional>1</OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<IncentivadorCultural>2</IncentivadorCultural>"
            MensagemXML = MensagemXML & "<Status>1</Status>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos>1000.00</ValorServicos>"
            MensagemXML = MensagemXML & "<ValorDeducoes>10.00</ValorDeducoes>"
            MensagemXML = MensagemXML & "<ValorPis>10.00</ValorPis>"
            MensagemXML = MensagemXML & "<ValorCofins>10.00</ValorCofins>"
            MensagemXML = MensagemXML & "<ValorInss>10.00</ValorInss>"
            MensagemXML = MensagemXML & "<ValorIr>10.00</ValorIr>"
            MensagemXML = MensagemXML & "<ValorCsll>10.00</ValorCsll>"
            MensagemXML = MensagemXML & "<IssRetido>1</IssRetido>"
            MensagemXML = MensagemXML & "<ValorIss>10.00</ValorIss>"
            MensagemXML = MensagemXML & "<OutrasRetencoes>10.00</OutrasRetencoes>"
            MensagemXML = MensagemXML & "<Aliquota>5</Aliquota>"
            MensagemXML = MensagemXML & "<DescontoIncondicionado>10.00</DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<DescontoCondicionado>10.00</DescontoCondicionado>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<ItemListaServico>11.01</ItemListaServico>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio>522310000</CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<Discriminacao>Teste.</Discriminacao>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>3106200</CodigoMunicipio>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1733160024</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>1733160032</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial>INSCRICAO DE TESTE SIATU - D'AGUA -PAULINO'S</RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Endereco>DA BAHIA</Endereco>"
            MensagemXML = MensagemXML & "<Numero>200</Numero>"
            MensagemXML = MensagemXML & "<Complemento>ANDAR 14</Complemento>"
            MensagemXML = MensagemXML & "<Bairro>CENTRO</Bairro>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>3106200</CodigoMunicipio>"
            MensagemXML = MensagemXML & "<Uf>MG</Uf>"
            MensagemXML = MensagemXML & "<Cep>30160010</Cep>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<IntermediarioServico>"
            MensagemXML = MensagemXML & "<RazaoSocial>INSCRICAO DE TESTE SIATU - D'AGUA -PAULINO'S</RazaoSocial>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>99999999000191</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>8041700010</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IntermediarioServico>"
            MensagemXML = MensagemXML & "<ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<CodigoObra>1234</CodigoObra>"
            MensagemXML = MensagemXML & "<Art>1234</Art>"
            MensagemXML = MensagemXML & "</ConstrucaoCivil>"
            MensagemXML = MensagemXML & "</InfRps>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</ListaRps>"
            MensagemXML = MensagemXML & "</LoteRps>"
            MensagemXML = MensagemXML & "</EnviarLoteRpsEnvio>"

        Case Else

            MsgBox "Tipo Não Cadastrado!"
            Stop

    End Select

    Compor_MensagemXML = MensagemXML

    MensagemXML = ""

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String

   Select Case Tipo

   Case Is = "1"

    Compor_CabecalhoXML = "<cabecalho versao=""1"" xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd""><versaoDados>1</versaoDados></cabecalho>"

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

    Url = "https://directa.natal.rn.gov.br/open.do?sys=DIR&idformulario=64"
    'Dict_Xml.Exists("CodigoCancelamento") Tag Cancelamento

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorLiquidoNfse"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("BaseCalculo"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("Aliquota"), ".", ",") * 100, 2)
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
