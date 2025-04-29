<?php

namespace App\Services\Towns\NFem;


class NFem
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "JOI", "https://nfemws.joinville.sc.gov.br/NotaFiscal/Servicos.asmx" 'Prefeitura Joinville

End Sub

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Protocolo As String, _
                                 ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfsePorRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_RPS As String, _
                                    ByVal Tipo As TypeRPS, ByVal Used_Companny As String, Optional ByVal Serie_RPS As String = "NF") As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_RPS]", Tipo)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function RecepcionarLoteRps(ByVal LoteRPS As Object, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, DadoRPS As Variant
    Dim SignedXml As z_cls_WsFuncoes

    Operacao = "EnviarLoteRps": DadosMsg = Compor_MensagemXML(Operacao)

    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", "<nfem:LoteRps>[DadosMsg]</nfem:LoteRps>")

    For Each DadoRPS In LoteRPS
        DadosMsg = Replace(DadosMsg, DadoRPS, LoteRPS(DadoRPS))
    Next DadoRPS

    Set SignedXml = New z_cls_WsFuncoes
        DadosMsg = SignedXml.Sign_XML(DadosMsg, Used_Companny, "#infPS_1")
        DadosMsg = SignedXml.Sign_XML(DadosMsg, Used_Companny)
    Set SignedXml = Nothing

    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, ByVal Operacao As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "application/soap+xml;charset=UTF-8;action=""https://nfemws.joinville.sc.gov.br/" & Operacao & "Envio" & """"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:nfem=""https://nfemws.joinville.sc.gov.br"">"
    Message_Assemble = Message_Assemble & "<soap:Header/>"
    Message_Assemble = Message_Assemble & "<soap:Body>"
    Message_Assemble = Message_Assemble & "<nfem:[Mount_Mensage]Envio>[DadosMsg]</nfem:[Mount_Mensage]Envio>"
    Message_Assemble = Message_Assemble & "</soap:Body>"
    Message_Assemble = Message_Assemble & "</soap:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<nfem:Pedido>"
            MensagemXML = MensagemXML & "</nfem:Pedido>"

        Case Is = "ConsultarLoteRps"

            MensagemXML = "<nfem:Prestador>"
            MensagemXML = MensagemXML & "<nfem:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfem:Cnpj>[CAMPO_CNPJ]</nfem:Cnpj>"
            MensagemXML = MensagemXML & "</nfem:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfem:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfem:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfem:Prestador>"
            MensagemXML = MensagemXML & "<nfem:Protocolo>[CAMPO_PROTOCOLO]</nfem:Protocolo>"

        Case Is = "ConsultarNfseRps"

            MensagemXML = "<nfem:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfem:Numero>[CAMPO_NUMERO_RPS]</nfem:Numero>"
            MensagemXML = MensagemXML & "<nfem:Serie>[CAMPO_SERIE_RPS]</nfem:Serie>"
            MensagemXML = MensagemXML & "<nfem:Tipo>[CAMPO_TIPO_RPS]</nfem:Tipo>"
            MensagemXML = MensagemXML & "</nfem:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfem:Prestador>"
            MensagemXML = MensagemXML & "<nfem:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfem:Cnpj>[CAMPO_CNPJ]</nfem:Cnpj>"
            MensagemXML = MensagemXML & "</nfem:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfem:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfem:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfem:Prestador>"

        Case Is = "RecepcionarLoteRps"

            MensagemXML = "<EnviarLoteRpsEnvio xmlns=""http://nfewshomologacao.joinville.sc.gov.br"">"
            MensagemXML = MensagemXML & "<LoteRps Id=""lote_[CAMPO_ID_LOTE]"" versao=""1.00"">"
            MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<QuantidadeRps>[CAMPO_QUANTIDADE_RPS]</QuantidadeRps>"
            MensagemXML = MensagemXML & "<ListaRps>"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico Id=""infPS_[CAMPO_ID_RPS]"">"
            MensagemXML = MensagemXML & "<Rps Id=""infRPS_[CAMPO_ID_RPS]"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>[CAMPO_NUMERO_RPS]</Numero>"
            MensagemXML = MensagemXML & "<Serie>[CAMPO_SERIE_RPS]</Serie>"
            MensagemXML = MensagemXML & "<Tipo>[CAMPO_TIPO_RPS]</Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao>[CAMPO_DATA_EMISSAO]</DataEmissao>"
            MensagemXML = MensagemXML & "<Status>1</Status>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "<Competencia>[CAMPO_COMPETENCIA]</Competencia>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos>[CAMPO_VALOR_SERVICOS]</ValorServicos>"
            MensagemXML = MensagemXML & "<Aliquota>[CAMPO_ALIQUOTA]</Aliquota>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<IssRetido>[CAMPO_ISS_RETIDO]</IssRetido>"
            MensagemXML = MensagemXML & "<ItemListaServico>[CAMPO_ITEM_LISTA]</ItemListaServico>"
            MensagemXML = MensagemXML & "<Discriminacao>[CAMPO_DESCRIMINACAO_SERVICOS]</Discriminacao>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</CodigoMunicipio>"
            MensagemXML = MensagemXML & "<CodigoPais>[CAMPO_CODIGO_PAIS]</CodigoPais>"
            MensagemXML = MensagemXML & "<ExigibilidadeISS>[CAMPO_EXIGIBILIDADE_ISS]</ExigibilidadeISS>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ_PRESTADOR]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<TomadorServico>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ_TOMADOR]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial>[CAMPO_RAZAO_SOCIAL_TOMADOR]</RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Endereco>[CAMPO_LOGRADOURO_TOMADOR]</Endereco>"
            MensagemXML = MensagemXML & "<Numero>[CAMPO_NUMERO_LOGRADOURO_TOMADOR]</Numero>"
            MensagemXML = MensagemXML & "<Bairro>[CAMPO_BAIRRO_TOMADOR]</Bairro>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO_TOMADOR]</CodigoMunicipio>"
            MensagemXML = MensagemXML & "<Uf>SC</Uf>"
            MensagemXML = MensagemXML & "<Cep>[CAMPO_CEP_TOMADOR]</Cep>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "</TomadorServico>"
            MensagemXML = MensagemXML & "<OptanteSimplesNacional>[CAMPO_SIMPLES_NACIONAL]</OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<IncentivoFiscal>[CAMPO_INCENTIVO_FISCAL]</IncentivoFiscal>"
            MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
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
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Url As String, CodServ As String

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        If InStr(1, Dict_Xml.Item("Discriminacao"), "Servicos Adicionais") > 0 Then CodServ = "1104" Else: CodServ = "1601"
        ArrayDescricao = Descricao_Servico.DescrServ(CodServ)
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = "https://nfem.joinville.sc.gov.br/processos/imprimir_nfe.aspx?numero=" & Dict_Xml.Item("Numero") & "&documento_prestador=" & Array_Dados_TNT(12)

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao"): Nodo.Style.FontSize = "19px"
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("Cnpj"), "00"".""000"".""000""/""0000-00")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("Cep"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Uf")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorLiquidoNfse"), ".", ","), "R$ #,##0.00")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCredito"), ".", ","), "R$ #,##0.00")
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

    Preecher_Template = Array(Dict_Xml.Item("Cnpj"), htmlDoc.Body.innerHTML)

End Function


*/
}
