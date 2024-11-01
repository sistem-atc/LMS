<?php

namespace App\CityHall\SemFaz;


class SemFaz
{
    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Codigo_Cidade As String: Token As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Token() As String: Token = This.Token: End Property
Public Property Get Codigo_Cidade() As String: Codigo_Cidade = This.Codigo_Cidade: End Property
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Codigo_Cidade = Split(Links_Prefeituras.Item(Value), "|")(1): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "SLZ", "http://sistemas.semfaz.saoluis.ma.gov.br/WsNFe2/LoteRps|0921" 'Prefeitura São Luiz - MA

End Sub

Private Function Obter_Token(ByVal CNPJ As String) As String
    
    If Left(CNPJ, 8) = "10970887" Then
        This.Token = "1BC6A1CB0F2FC26860A8514473B4F8E0"
    Else
        This.Token = "CAD759CE09C1B44F177435600C1CBCB8"
    End If

End Function

Public Function cancelar(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "Cancelar": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    cancelar = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarLote(ByVal CNPJ As String, ByVal Numero_Lote As Long, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "consultarLote": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TOKEN]", Token)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_LOTE]", Numero_Lote)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    consultarLote = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfseRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_Nota As String, _
                                 ByVal Used_Companny As String, Optional ByVal Codigo_Verificacao As String = "0") As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "consultarNFSeRps": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TOKEN]", Token)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_VERIFICACAO]", Codigo_Verificacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarNota(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                              ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "consultarNota": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TOKEN]", Token)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    consultarNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarSequencialRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "consultarSequencialRps": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    consultarSequencialRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function enviar(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "enviar": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    enviar = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function enviarSincrono(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "enviarSincrono": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    enviarSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function testeEnviar(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Obter_Token CNPJ: Operacao = "testeEnviar": Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    testeEnviar = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String
    
    Dim SignedXml As z_cls_WsFuncoes
    
    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant
    
    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=utf-8"
    
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing
    
End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:lot=""http://sistemas.semfaz.saoluis.ma.gov.br/WsNFe2/LoteRps.jws"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<lot:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<mensagemXml><![CDATA[[DadosMsg]]]></mensagemXml>"
    Message_Assemble = Message_Assemble & "</lot:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String
   
   Dim MensagemXML As String
   
   Select Case Tipo
   
    Case Is = "cancelar"
        
        MensagemXML = ""
        MensagemXML = MensagemXML & ""
        
    Case Is = "consultarLote"
                  
        MensagemXML = "<ns1:ReqConsultaLote xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote http://localhost:8080/WsNFe2/xsd/ReqConsultaLote.xsd"">"
        MensagemXML = MensagemXML & "<Cabecalho>"
        MensagemXML = MensagemXML & "<TokenEnvio>[CAMPO_TOKEN]</TokenEnvio>"
        MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
        MensagemXML = MensagemXML & "<CPFCNPJRemetente>[CAMPO_CNPJ]</CPFCNPJRemetente>"
        MensagemXML = MensagemXML & "<Versao>1</Versao>"
        MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
        MensagemXML = MensagemXML & "</Cabecalho>"
        MensagemXML = MensagemXML & "</ns1:ReqConsultaLote>"
                
   
    Case Is = "consultarNFSeRps"
        
        MensagemXML = "<ns1:ReqConsultaNFSeRPS xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote http://localhost:8080/WsNFe2/xsd/ReqConsultaLote.xsd"">"
        MensagemXML = MensagemXML & "<Cabecalho>"
        MensagemXML = MensagemXML & "<TokenEnvio>[CAMPO_TOKEN]</TokenEnvio>"
        MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
        MensagemXML = MensagemXML & "<CPFCNPJRemetente>[CAMPO_CNPJ]</CPFCNPJRemetente>"
        MensagemXML = MensagemXML & "<transacao>false</transacao>"
        MensagemXML = MensagemXML & "<Versao>1</Versao>"
        MensagemXML = MensagemXML & "</Cabecalho>"
        MensagemXML = MensagemXML & "<Lote>"
        MensagemXML = MensagemXML & "<NotaConsulta>"
        MensagemXML = MensagemXML & "<Nota>"
        MensagemXML = MensagemXML & "<InscricaoMunicipalPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipalPrestador>"
        MensagemXML = MensagemXML & "<NumeroNota>[CAMPO_NUMERO_NOTA]</NumeroNota>"
        MensagemXML = MensagemXML & "<CodigoVerificacao>[CAMPO_CODIGO_VERIFICACAO]</CodigoVerificacao>"
        MensagemXML = MensagemXML & "</Nota>"
        MensagemXML = MensagemXML & "</NotaConsulta>"
        MensagemXML = MensagemXML & "</Lote>"
        MensagemXML = MensagemXML & "</ns1:ReqConsultaNFSeRPS>"
        
    Case Is = "consultarNota"
                       
        MensagemXML = "<ns1:ReqConsultaNotas xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote http://localhost:8080/WsNFe2/xsd/ReqConsultaLote.xsd"">"
        MensagemXML = MensagemXML & "<Cabecalho>"
        MensagemXML = MensagemXML & "<TokenEnvio>[CAMPO_TOKEN]</TokenEnvio>"
        MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
        MensagemXML = MensagemXML & "<CPFCNPJRemetente>[CAMPO_CNPJ]</CPFCNPJRemetente>"
        MensagemXML = MensagemXML & "<InscricaoMunicipalPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipalPrestador>"
        MensagemXML = MensagemXML & "<dtInicio>[CAMPO_DATA_INICIAL]</dtInicio>"
        MensagemXML = MensagemXML & "<dtFim>[CAMPO_DATA_FINAL]</dtFim>"
        MensagemXML = MensagemXML & "<Versao>1</Versao>"
        MensagemXML = MensagemXML & "</Cabecalho>"
        MensagemXML = MensagemXML & "</ns1:ReqConsultaNotas>"
        
    Case Is = "consultarSequencialRps"
   
   
    Case Is = "enviar"
   
   
    Case Is = "enviarSincrono"
   
   
    Case Is = "testeEnviar"


   End Select
   
   Compor_MensagemXML = MensagemXML
   
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
    Dim Fator_Aliquota As Integer, Data_Address As Variant, Description As String, Funcoes As z_cls_WsFuncoes
    
    If Left(Array_Dados_TNT(12), 8) = "95591723" Then
        '<DescricaoRPS></DescricaoRPS> Tag Retornando Vazia
        Description = InputBox("Digite a Descrição da Nota " & Dict_Xml.Item("NumeroNota") & " de SLZ")
        'Description = Descricao_TNT(Array_Dados_TNT(5), Dict_Xml.Item("NumeroNota"), Dict_Xml.Item("DataProcessamento"), "TNT") Precisa do E-Cold
        Fator_Aliquota = 1
    ElseIf Left(Array_Dados_TNT(12), 8) = "10970887" Then
        Description = Dict_Xml.Item("DiscriminacaoServico") & " - RPS: " & Dict_Xml.Item("NumeroRPS")
        Fator_Aliquota = 100
    End If
    
    Set Funcoes = New z_cls_WsFuncoes: Data_Address = Funcoes.BuscarDadosEndereço(Dict_Xml.Item("CEPTomador")): Set Funcoes = Nothing
    
    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")
    
    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("CodigoAtividade"))
    Set Descricao_Servico = Nothing
    
    Url = ""
    'Dict_Xml.Exists("MotCancelamento") Tag Cancelamento
    
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("NumeroNota")
        Set Nodo = .getElementById("data_emissao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Left(Dict_Xml.Item("DataProcessamento"), 19), "T", " ", 1), "dd/mm/yyyy hh:mm:ss")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao"): Nodo.Style.FontSize = "21px"
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("CPFCNPJTomador"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("RazaoSocialTomador")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("NumeroEnderecoTomador")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("LogradouroTomador")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Data_Address(0)
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("BairroTomador"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("CEPTomador"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Data_Address(2)
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = ""
        Set Nodo = .getElementById("discriminacao_servicos_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 1, 90)
        Set Nodo = .getElementById("discriminacao_servicos_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 91, 90)
        Set Nodo = .getElementById("discriminacao_servicos_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 181, 90)
        Set Nodo = .getElementById("discriminacao_servicos_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 271, 90)
        Set Nodo = .getElementById("discriminacao_servicos_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 361, 90)
        Set Nodo = .getElementById("discriminacao_servicos_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 451, 90)
        Set Nodo = .getElementById("discriminacao_servicos_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 541, 90)
        Set Nodo = .getElementById("discriminacao_servicos_8")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Description, 631, 90)
        Set Nodo = .getElementById("retencao_cofins")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCOFINS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCSLL"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorINSS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIR"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorPIS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorUnitario"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorUnitario"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorTotal"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("AliquotaAtividade"), ".", ",") * Fator_Aliquota, 2)
        Set Nodo = .getElementById("valor_deducoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("desconto_incondicionado")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("ValorTotal") * (Dict_Xml.Item("AliquotaAtividade") / 100), "R$ #,##0.00")
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
    
    Preecher_Template = Array(Dict_Xml.Item("CPFCNPJTomador"), htmlDoc.Body.innerHTML)
    
End Function

'Private Function Descricao_TNT(ByVal Incricao_Municipal As String, ByVal Numero As String, ByVal Data_Emissao As String, _
'                               ByVal Companny As String) As String
'
'    Dim Busca_eCold As z_cls_eCold_NDD, LeituraXml As cls_LeituraXML, BuscaXML_eCold As String
'    Dim XmlDom As Object, objNodes As Object, Funcoes As z_cls_WsFuncoes
'
'    Const Err_Function As String = "Documento inexistente"
'    Const Err2_Function As String = "Consumo indevido, excedeu o limite maximo de consultas em um periodo."
'
'    Set Busca_eCold = New z_cls_eCold_NDD
'    Set LeituraXml = New cls_LeituraXML
'    Set Funcoes = New z_cls_WsFuncoes
'
'    Busca_eCold.Prefeitura_Utilizada = "eCold"
'    Do
'        BuscaXML_eCold = Busca_eCold.Send(Incricao_Municipal, Numero, Numero_Nota, True, False, False, Mid(Data_Emissao, 1, InStr(1, Data_Emissao, "T") - 1), Companny)
'        If InStr(1, BuscaXML_eCold, Err2_Function) > 0 Then Funcoes.WaitSelenium (30)
'    Loop Until InStr(1, BuscaXML_eCold, Err2_Function) = 0
'
'    If InStr(1, BuscaXML_eCold, Err_Function, vbTextCompare) > 0 Then
'        Debug.Print Numero: Stop
'        Descricao_TNT = "03254082000512 INSTITUTO ACQUA ACAO CIDADANIA QUALIDADE URBANA E RODOVIA RUA DO NORTE, SN 0 CENTRO SAO LUIS MA CEP: 65015460 R$ 32686,76 523,84 KG 104 VOLS 01564529FREIGHT,NUMERO FISCAL DO RPS: 000003092,MERCURIO E ARACATUBA SAO TNT."
'        Exit Function
'    End If
'    BuscaXML_eCold = LeituraXml.Ajuste_Xml(BuscaXML_eCold)
'
'    Set XmlDom = CreateObject("MSXML2.DOMDocument"): XmlDom.Async = False: XmlDom.LoadXML (BuscaXML_eCold)
'    Set objNodes = XmlDom.SelectNodes("/ns1:ReqEnvioLoteRPS/Lote/RPS/DescricaoRPS")
'
'    Descricao_TNT = objNodes.Item(0).text
'
'    Set Busca_eCold = Nothing
'    Set LeituraXml = Nothing
'    Set Funcoes = Nothing
'
'End Function

}