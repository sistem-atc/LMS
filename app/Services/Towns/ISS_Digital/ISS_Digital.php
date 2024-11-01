<?php

namespace App\CityHall\ISS_Digital;


class ISS_Digital
{
    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Codigo_Cidade As String: Formato_IE As String: Url_Verificacao As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Get Codigo_Cidade() As String: Codigo_Cidade = This.Codigo_Cidade: End Property
Public Property Get Formato_IE() As String: Formato_IE = This.Formato_IE: End Property
Public Property Get Url_Verificacao() As String: Url_Verificacao = This.Url_Verificacao: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Codigo_Cidade = Split(Links_Prefeituras.Item(Value), "|")(1): This.Formato_IE = Split(Links_Prefeituras.Item(Value), "|")(2): This.Url_Verificacao = Split(Links_Prefeituras.Item(Value), "|")(3): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "THE", "https://www.issdigitalthe.com.br/WsNFe2/LoteRps.jws|1219|0000000|https://www.issdigitalthe.com.br/nfse/" 'Prefeitura Teresina
    Links_Prefeituras.Add "CPQ", "https://issdigital.campinas.sp.gov.br/WsNFe2/LoteRps.jws|6291|000000000|https://issdigital.campinas.sp.gov.br/NotaFiscal/" 'Prefeitura Campinas
    Links_Prefeituras.Add "VCP", "https://issdigital.campinas.sp.gov.br/WsNFe2/LoteRps.jws|6291|000000000|https://issdigital.campinas.sp.gov.br/NotaFiscal/" 'Prefeitura Viracopos
    Links_Prefeituras.Add "CGR", "https://issdigital.pmcg.ms.gov.br/WsNFe2/LoteRps.jws|9051|00000000000|https://nfse.pmcg.ms.gov.br/NotaFiscal/index.php" 'Prefeitura Campo Grande
    Links_Prefeituras.Add "UBL", "https://udigital.uberlandia.mg.gov.br/WsNFe2/LoteRps.jws|5403|00000000|http://udigital.uberlandia.mg.gov.br/nfse/" 'Prefeitura Uberlandia

End Sub

Public Function cancelar(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Used_Companny As String, _
                         ByVal Numero_Nota As String, ByVal Codigo_Verificacao As String, ByVal Motivo_Cancelamento As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "cancelar": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SEQUENCIA_LOTE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_ID_NOTA]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_VERIFICAÇÃO]", Codigo_Verificacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_MOTIVO_CANCELAMENTO]", Motivo_Cancelamento)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    cancelar = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarAliquotaSimplesNacional(ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "consultarAliquotaSimplesNacional": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    consultarAliquotaSimplesNacional = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarLote(ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "consultarLote": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    consultarLote = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfseRps(ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "consultarNFSeRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    ConsultarNfseRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarNota(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As String, _
                              ByVal Data_Final As String, ByVal Used_Companny As String, Optional Numero_Nota As String = "1") As Variant
                              
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "consultarNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", Conf.Item("CNPJ_Matriz_" & Used_Companny))
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Format(Replace(Inscricao_Municipal, "-", ""), Formato_IE))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Numero_Nota)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    consultarNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarNotaTomada(ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "consultarNotaTomada": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    consultarNotaTomada = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarSequencialRps(ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "consultarSequencialRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    consultarSequencialRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function enviar(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Razao_Social As String, ByVal Data_Inicial As String, _
                       ByVal Data_Final As String, ByRef Dict_Dados_Notas As Object, ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String, Conexao As z_cls_WsFuncoes
    Dim Quantidade_RPS As String, Valor_Total_Servicos As Currency, Valor_Total_Deducoes As String, Dados_Nota As Variant
    Dim Signature As String, String_URI As String, Split_Dados_Nota As Variant, XmlDom As Object
    Dim Ie_Formatado As String, Serie_RPS_Formatado As String, Numero_RPS_Formatado As String
    Dim Data_Emissao_Formatado As String, Tributacao_Formatado As String, Situacao_RPS_Formatado As String, Tipo_Recolhimento As String
    Dim Valor_Servico As String, Valor_Deducao As String, Codigo_Atividade As String, CNPJ_Formatado As String
    Dim Node_Value As Variant
    
    Operacao = "enviar": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ_REMETENTE]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_RAZAO_SOCIAL_REMETENTE]", Razao_Social)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    
    For Each Dados_Nota In Dict_Dados_Notas
        If Dados_Nota = "[CAMPO_INSCRICAO_MUNICIPAL_TOMADOR]" Then
            DadosMsg = Replace(DadosMsg, Dados_Nota, Format(Dict_Dados_Notas.Item(Dados_Nota), "0000000"))
        Else
            DadosMsg = Replace(DadosMsg, Dados_Nota, Dict_Dados_Notas.Item(Dados_Nota))
        End If
    Next Dados_Nota
    
    Set XmlDom = CreateObject("MSXML2.DOMDocument")
        XmlDom.Async = False
        If Not XmlDom.LoadXML(DadosMsg) Then
            Err.Raise XmlDom.parseError.ErrorCode, , XmlDom.parseError.reason
        End If
    
    Quantidade_RPS = XmlDom.SelectNodes("/ns1:ReqEnvioLoteRPS/Lote/RPS").Length
    
    For Each Node_Value In XmlDom.SelectNodes("/ns1:ReqEnvioLoteRPS/Lote/RPS/Itens/Item/ValorTotal")
        Valor_Total_Servicos = Valor_Total_Servicos + Replace(Node_Value.text, ".", ",")
    Next Node_Value
    
    Ie_Formatado = Format(Inscricao_Municipal, "00000000000")
    Serie_RPS_Formatado = Dict_Dados_Notas.Item("[CAMPO_SERIE_RPS]") & "   "
    Numero_RPS_Formatado = Format((Dict_Dados_Notas.Item("[CAMPO_NUMERO_RPS]")), "000000000000")
    Data_Emissao_Formatado = Format(Split(Dict_Dados_Notas.Item("[CAMPO_DATA_EMISSAO_RPS]"), "T")(0), "yyyymmdd")
    Tributacao_Formatado = Dict_Dados_Notas.Item("[CAMPO_TRIBUTACAO]") & " "
    Situacao_RPS_Formatado = Dict_Dados_Notas.Item("[CAMPO_SITUACAO_RPS]")
    If Dict_Dados_Notas.Item("[CAMPO_TIPO_RECOLHIMENTO]") = "A" Then
        Tipo_Recolhimento = "N"
    Else
        Tipo_Recolhimento = "S"
    End If
    Valor_Servico = Format(Replace(Dict_Dados_Notas.Item("[CAMPO_VALOR_TOTAL]"), ".", ""), "000000000000000")
    Valor_Deducao = "000000000000000"
    Codigo_Atividade = Format(Replace(Dict_Dados_Notas.Item("[CAMPO_CODIGO_ATIVIDADE]"), ".", ""), "0000000000")
    CNPJ_Formatado = Format(Replace(Dict_Dados_Notas.Item("[CAMPO_CPF_CNPJ_TOMADOR]"), ".", ""), "00000000000000")
    
    Signature = Ie_Formatado & Serie_RPS_Formatado & Numero_RPS_Formatado & Data_Emissao_Formatado & Tributacao_Formatado & _
                Situacao_RPS_Formatado & Tipo_Recolhimento & Valor_Servico & Valor_Deducao & Codigo_Atividade & CNPJ_Formatado
    Set Conexao = New z_cls_WsFuncoes: Signature = Conexao.SHA1(Signature): Set Conexao = Nothing
    
    DadosMsg = Replace(DadosMsg, "[CAMPO_ASSINATURA]", Signature)
    DadosMsg = Replace(DadosMsg, "[CAMPO_QUANTIDADE_RPS]", Quantidade_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_VALOR_TOTAL_SERVICOS]", Replace(Valor_Total_Servicos, ",", "."))
    DadosMsg = Replace(DadosMsg, "[CAMPO_VALOR_TOTAL_DEDUCOES]", "0.00")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny, "#" & Dict_Dados_Notas.Item("[CAMPO_ID_LOTE]"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    enviar = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function enviarSincrono(ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "enviarSincrono": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    enviarSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function testeEnviar(ByVal Used_Companny As String) As Variant
    
    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "testeEnviar": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    testeEnviar = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String, Optional URI As String = "") As String
    
    Dim SignedXml As z_cls_WsFuncoes
    
    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny, URI): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "SOAPAction", "POST"
    
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing
    
End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:proc=""http://proces.wsnfe2.dsfnet.com.br"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<proc:[Mount_Mensage] soapenv:encodingStyle=""http://schemas.xmlsoap.org/soap/encoding/"">"
    Message_Assemble = Message_Assemble & "<mensagemXml xsi:type=""xsd:string""><![CDATA[[DadosMsg]]]></mensagemXml>"
    Message_Assemble = Message_Assemble & "</proc:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String
    
    Dim MensagemXML As String
    
    Select Case Tipo
    
        Case Is = "cancelar"
        
            MensagemXML = "<ns1:ReqCancelamentoNFSe xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote http://localhost:8080/WsNFe2/xsd/ReqCancelamentoNFSe.xsd"">"
            MensagemXML = MensagemXML & "<Cabecalho>"
            MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
            MensagemXML = MensagemXML & "<CPFCNPJRemetente>[CAMPO_CNPJ]</CPFCNPJRemetente>"
            MensagemXML = MensagemXML & "<transacao>true</transacao>"
            MensagemXML = MensagemXML & "<Versao>1</Versao>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<Lote Id=""lote:[CAMPO_SEQUENCIA_LOTE]"">"
            MensagemXML = MensagemXML & "<Nota Id=""[CAMPO_ID_NOTA]"">"
            MensagemXML = MensagemXML & "<InscricaoMunicipalPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipalPrestador>"
            MensagemXML = MensagemXML & "<NumeroNota>[CAMPO_NUMERO_NOTA]</NumeroNota>"
            MensagemXML = MensagemXML & "<CodigoVerificacao>[CAMPO_CODIGO_VERIFICAÇÃO]</CodigoVerificacao>"
            MensagemXML = MensagemXML & "<MotivoCancelamento>[CAMPO_MOTIVO_CANCELAMENTO]</MotivoCancelamento>"
            MensagemXML = MensagemXML & "</Nota>"
            MensagemXML = MensagemXML & "</Lote>"
            MensagemXML = MensagemXML & "</ns1:ReqCancelamentoNFSe>"
            
        Case Is = "consultarAliquotaSimplesNacional"
         
        Case Is = "consultarLote"
         
            MensagemXML = "<ns1:ReqConsultaLote xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote  http://localhost:8080/WsNFe2/xsd/ReqConsultaLote.xsd"">"
            MensagemXML = MensagemXML & "<Cabecalho>"
            MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
            MensagemXML = MensagemXML & "<CPFCNPJRemetente>[CAMPO_CNPJ]</CPFCNPJRemetente>"
            MensagemXML = MensagemXML & "<Versao>1</Versao>"
            MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "</ns1:ReqConsultaLote>"
         
        Case Is = "consultarNFSeRps"
         
            MensagemXML = "<ns1:ReqConsultaNFSeRPS xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote http://localhost:8080/WsNFe2/xsd/ReqConsultaNFSeRPS.xsd"">"
            MensagemXML = MensagemXML & "<Cabecalho>"
            MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
            MensagemXML = MensagemXML & "<CPFCNPJRemetente>28785966843</CPFCNPJRemetente>"
            MensagemXML = MensagemXML & "<transacao>true</transacao>"
            MensagemXML = MensagemXML & "<Versao>1</Versao>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<Lote Id=""lote:1ABCDZ"">"
            MensagemXML = MensagemXML & "<NotaConsulta>"
            MensagemXML = MensagemXML & "<Nota Id=""nota:4"">"
            MensagemXML = MensagemXML & "<InscricaoMunicipalPrestador>0317330</InscricaoMunicipalPrestador>"
            MensagemXML = MensagemXML & "<NumeroNota>4</NumeroNota>"
            MensagemXML = MensagemXML & "<CodigoVerificacao>0a2a2f0f</CodigoVerificacao>"
            MensagemXML = MensagemXML & "</Nota>"
            MensagemXML = MensagemXML & "</NotaConsulta>"
            MensagemXML = MensagemXML & "<RPSConsulta>"
            MensagemXML = MensagemXML & "<RPS Id=""rps:38676"">"
            MensagemXML = MensagemXML & "<InscricaoMunicipalPrestador>0317330</InscricaoMunicipalPrestador>"
            MensagemXML = MensagemXML & "<NumeroRPS>38676</NumeroRPS>"
            MensagemXML = MensagemXML & "<SeriePrestacao>99</SeriePrestacao>"
            MensagemXML = MensagemXML & "</RPS>"
            MensagemXML = MensagemXML & "</RPSConsulta>"
            MensagemXML = MensagemXML & "</Lote>"
            MensagemXML = MensagemXML & "</ns1:ReqConsultaNFSeRPS>"
         
        Case Is = "consultarNota"
        
            MensagemXML = "<ns1:ReqConsultaNotas xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote http://localhost:8080/WsNFe2/xsd/ReqConsultaNotas.xsd"">"
            MensagemXML = MensagemXML & "<Cabecalho Id=""Consulta:notas"">"
            MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
            MensagemXML = MensagemXML & "<CPFCNPJRemetente>[CAMPO_CNPJ]</CPFCNPJRemetente>"
            MensagemXML = MensagemXML & "<InscricaoMunicipalPrestador>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipalPrestador>"
            MensagemXML = MensagemXML & "<dtInicio>[CAMPO_DATA_INICIAL]</dtInicio>"
            MensagemXML = MensagemXML & "<dtFim>[CAMPO_DATA_FINAL]</dtFim>"
            MensagemXML = MensagemXML & "<NotaInicial>[CAMPO_NOTA_INICIAL]</NotaInicial>"
            MensagemXML = MensagemXML & "<Versao>1</Versao>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "</ns1:ReqConsultaNotas>"
         
        Case Is = "consultarNotaTomada"
         
        Case Is = "consultarSequencialRps"
         
        Case Is = "enviar"
                     
            MensagemXML = "<ns1:ReqEnvioLoteRPS xmlns:ns1=""http://localhost:8080/WsNFe2/lote"" xmlns:tipos=""http://localhost:8080/WsNFe2/tp"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://localhost:8080/WsNFe2/lote http://localhost:8080/WsNFe2/xsd/ReqEnvioLoteRPS.xsd"">"
            MensagemXML = MensagemXML & "<Cabecalho>"
            MensagemXML = MensagemXML & "<CodCidade>[CAMPO_CODIGO_CIDADE]</CodCidade>"
            MensagemXML = MensagemXML & "<CPFCNPJRemetente>[CAMPO_CNPJ_REMETENTE]</CPFCNPJRemetente>"
            MensagemXML = MensagemXML & "<RazaoSocialRemetente>[CAMPO_RAZAO_SOCIAL_REMETENTE]</RazaoSocialRemetente>"
            MensagemXML = MensagemXML & "<transacao/>"
            MensagemXML = MensagemXML & "<dtInicio>[CAMPO_DATA_INICIAL]</dtInicio>"
            MensagemXML = MensagemXML & "<dtFim>[CAMPO_DATA_FINAL]</dtFim>"
            MensagemXML = MensagemXML & "<QtdRPS>[CAMPO_QUANTIDADE_RPS]</QtdRPS>"
            MensagemXML = MensagemXML & "<ValorTotalServicos>[CAMPO_VALOR_TOTAL_SERVICOS]</ValorTotalServicos>"
            MensagemXML = MensagemXML & "<ValorTotalDeducoes>[CAMPO_VALOR_TOTAL_DEDUCOES]</ValorTotalDeducoes>"
            MensagemXML = MensagemXML & "<Versao>1</Versao>"
            MensagemXML = MensagemXML & "<MetodoEnvio>WS</MetodoEnvio>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<Lote Id=""[CAMPO_ID_LOTE]"">"
            MensagemXML = MensagemXML & "<RPS Id=""[CAMPO_ID_RPS]"">"
            MensagemXML = MensagemXML & "<Assinatura>[CAMPO_ASSINATURA]</Assinatura>"
            MensagemXML = MensagemXML & "<InscricaoMunicipalPrestador>[CAMPO_INSCRICAO_MUNICIPAL_PRESTADOR]</InscricaoMunicipalPrestador>"
            MensagemXML = MensagemXML & "<RazaoSocialPrestador>[CAMPO_RAZAO_SOCIAL_PRESTADOR]</RazaoSocialPrestador>"
            MensagemXML = MensagemXML & "<TipoRPS>[CAMPO_TIPO_RPS]</TipoRPS>"
            MensagemXML = MensagemXML & "<SerieRPS>[CAMPO_SERIE_RPS]</SerieRPS>"
            MensagemXML = MensagemXML & "<NumeroRPS>[CAMPO_NUMERO_RPS]</NumeroRPS>"
            MensagemXML = MensagemXML & "<DataEmissaoRPS>[CAMPO_DATA_EMISSAO_RPS]</DataEmissaoRPS>"
            MensagemXML = MensagemXML & "<SituacaoRPS>[CAMPO_SITUACAO_RPS]</SituacaoRPS>"
            MensagemXML = MensagemXML & "<SerieRPSSubstituido>[CAMPO_SERIE_RPS_SUBSTITUIDO]</SerieRPSSubstituido>"
            MensagemXML = MensagemXML & "<NumeroRPSSubstituido>[CAMPO_RPS_SUBSTITUIDO]</NumeroRPSSubstituido>"
            MensagemXML = MensagemXML & "<NumeroNFSeSubstituida>[CAMPO_NFE_SUBSTITUIDO]</NumeroNFSeSubstituida>"
            MensagemXML = MensagemXML & "<DataEmissaoNFSeSubstituida>[CAMPO_DATA_NFE_SUBSTITUIDO]</DataEmissaoNFSeSubstituida>"
            MensagemXML = MensagemXML & "<SeriePrestacao>[CAMPO_SERIE_PRESTACAO]</SeriePrestacao>"
            MensagemXML = MensagemXML & "<InscricaoMunicipalTomador>[CAMPO_INSCRICAO_MUNICIPAL_TOMADOR]</InscricaoMunicipalTomador>"
            MensagemXML = MensagemXML & "<CPFCNPJTomador>[CAMPO_CPF_CNPJ_TOMADOR]</CPFCNPJTomador>"
            MensagemXML = MensagemXML & "<RazaoSocialTomador>[CAMPO_RAZAO_SOCIAL_TOMADOR]</RazaoSocialTomador>"
            MensagemXML = MensagemXML & "<TipoLogradouroTomador>[CAMPO_TIPO_LOGRADOURO_TOMADOR]</TipoLogradouroTomador>"
            MensagemXML = MensagemXML & "<LogradouroTomador>[CAMPO_LOGRADOURO_TOMADOR]</LogradouroTomador>"
            MensagemXML = MensagemXML & "<NumeroEnderecoTomador>[CAMPO_NUMERO_LOGRADOURO_TOMADOR]</NumeroEnderecoTomador>"
            MensagemXML = MensagemXML & "<ComplementoEnderecoTomador/>"
            MensagemXML = MensagemXML & "<TipoBairroTomador>[CAMPO_TIPO_BAIRRO_TOMADOR]</TipoBairroTomador>"
            MensagemXML = MensagemXML & "<BairroTomador>[CAMPO_BAIRRO_TOMADOR]</BairroTomador>"
            MensagemXML = MensagemXML & "<CidadeTomador>[CAMPO_CIDADE_CODIGO_TOMADOR]</CidadeTomador>"
            MensagemXML = MensagemXML & "<CidadeTomadorDescricao>[CAMPO_CIDADE_DESCRICAO_TOMADOR]</CidadeTomadorDescricao>"
            MensagemXML = MensagemXML & "<CEPTomador>[CAMPO_CEP_TOMADOR]</CEPTomador>"
            MensagemXML = MensagemXML & "<EmailTomador>[CAMPO_EMAIL_TOMADOR]</EmailTomador>"
            MensagemXML = MensagemXML & "<CodigoAtividade>[CAMPO_CODIGO_ATIVIDADE]</CodigoAtividade>"
            MensagemXML = MensagemXML & "<AliquotaAtividade>[CAMPO_ALIQUOTA_ATIVIDADE]</AliquotaAtividade>"
            MensagemXML = MensagemXML & "<TipoRecolhimento>[CAMPO_TIPO_RECOLHIMENTO]</TipoRecolhimento>"
            MensagemXML = MensagemXML & "<MunicipioPrestacao>[CAMPO_CODIGO_MUNICIPIO_PRESTACAO]</MunicipioPrestacao>"
            MensagemXML = MensagemXML & "<MunicipioPrestacaoDescricao>[CAMPO_DESCRICAO_MUNICIPIO_PRESTACAO]</MunicipioPrestacaoDescricao>"
            MensagemXML = MensagemXML & "<Operacao>[CAMPO_OPERACAO]</Operacao>"
            MensagemXML = MensagemXML & "<Tributacao>[CAMPO_TRIBUTACAO]</Tributacao>"
            MensagemXML = MensagemXML & "<ValorPIS>[CAMPO_VALOR_PIS]</ValorPIS>"
            MensagemXML = MensagemXML & "<ValorCOFINS>[CAMPO_VALOR_COFINS]</ValorCOFINS>"
            MensagemXML = MensagemXML & "<ValorINSS>[CAMPO_VALOR_INSS]</ValorINSS>"
            MensagemXML = MensagemXML & "<ValorIR>[CAMPO_VALOR_IR]</ValorIR>"
            MensagemXML = MensagemXML & "<ValorCSLL>[CAMPO_VALOR_CSLL]</ValorCSLL>"
            MensagemXML = MensagemXML & "<AliquotaPIS>[CAMPO_ALIQUOTA_PIS]</AliquotaPIS>"
            MensagemXML = MensagemXML & "<AliquotaCOFINS>[CAMPO_ALIQUOTA_COFINS]</AliquotaCOFINS>"
            MensagemXML = MensagemXML & "<AliquotaINSS>[CAMPO_ALIQUOTA_INSS]</AliquotaINSS>"
            MensagemXML = MensagemXML & "<AliquotaIR>[CAMPO_ALIQUOTA_IR]</AliquotaIR>"
            MensagemXML = MensagemXML & "<AliquotaCSLL>[CAMPO_ALIQUOTA_CSLL]</AliquotaCSLL>"
            MensagemXML = MensagemXML & "<DescricaoRPS>[CAMPO_DISCRMINACAO_SERVICO]</DescricaoRPS>"
            MensagemXML = MensagemXML & "<DDDPrestador>[CAMPO_DDD_PRESTADOR]</DDDPrestador>"
            MensagemXML = MensagemXML & "<TelefonePrestador>[CAMPO_TELEFONE_PRESTADOR]</TelefonePrestador>"
            MensagemXML = MensagemXML & "<DDDTomador>[CAMPO_DDD_TOMADOR]</DDDTomador>"
            MensagemXML = MensagemXML & "<TelefoneTomador>[CAMPO_TELEFONE_TOMADOR]</TelefoneTomador>"
            MensagemXML = MensagemXML & "<MotCancelamento/>"
            MensagemXML = MensagemXML & "<CPFCNPJIntermediario/>"
            MensagemXML = MensagemXML & "<Deducoes>"
            MensagemXML = MensagemXML & "<Deducao>"
            MensagemXML = MensagemXML & "<DeducaoPor>Percentual</DeducaoPor>"
            MensagemXML = MensagemXML & "<TipoDeducao/>"
            MensagemXML = MensagemXML & "<CPFCNPJReferencia>00000000000</CPFCNPJReferencia>"
            MensagemXML = MensagemXML & "<NumeroNFReferencia>0</NumeroNFReferencia>"
            MensagemXML = MensagemXML & "<ValorTotalReferencia>0.00</ValorTotalReferencia>"
            MensagemXML = MensagemXML & "<PercentualDeduzir>0</PercentualDeduzir>"
            MensagemXML = MensagemXML & "<ValorDeduzir>0.00</ValorDeduzir>"
            MensagemXML = MensagemXML & "</Deducao>"
            MensagemXML = MensagemXML & "</Deducoes>"
            MensagemXML = MensagemXML & "<Itens>"
            MensagemXML = MensagemXML & "<Item>"
            MensagemXML = MensagemXML & "<DiscriminacaoServico>[CAMPO_DISCRMINACAO_OPERACAO]</DiscriminacaoServico>"
            MensagemXML = MensagemXML & "<Quantidade>[CAMPO_QUANTIDADE]</Quantidade>"
            MensagemXML = MensagemXML & "<ValorUnitario>[CAMPO_VALOR_UNITARIO]</ValorUnitario>"
            MensagemXML = MensagemXML & "<ValorTotal>[CAMPO_VALOR_TOTAL]</ValorTotal>"
            MensagemXML = MensagemXML & "<Tributavel>[CAMPO_TRIBUTAVEL]</Tributavel>"
            MensagemXML = MensagemXML & "</Item>"
            MensagemXML = MensagemXML & "</Itens>"
            MensagemXML = MensagemXML & "</RPS>"
            MensagemXML = MensagemXML & "</Lote>"
            MensagemXML = MensagemXML & "</ns1:ReqEnvioLoteRPS>"
            
        Case Is = "enviarSincrono"
         
        Case Is = "testeEnviar"
         
        Case Else
         
         Stop 'Tipo não cadastrado!
    
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
    
    Dim htmlDoc As Object, Nodo As Object, ArrayDescricao As Variant, ValueIss, CotaPosition As Integer
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Data() As Variant, DictUF As Object
    
    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")
    
    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("CodigoAtividade"))
    Set Descricao_Servico = Nothing
    
    Set DB_Connection = New cls_DB_Connection
        Data = Array("Nome Municipio", Dict_Xml.Item("CidadeTomadorDescricao"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing
    
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
        Set Nodo = .getElementById("endereco_prestador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = UCase(Array_Dados_TNT(2) & ", N " & Array_Dados_TNT(3) & " - SALA:01; - DISTRITO INDUSTRIAL - CEP:" & Format(Array_Dados_TNT(4), "00000""-""000"))
        Set Nodo = .getElementById("municipio_prestador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(7)
        Set Nodo = .getElementById("uf_prestador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Array_Dados_TNT(8)
        Set Nodo = .getElementById("numero_nota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("NumeroNota"), "00000000")
        Set Nodo = .getElementById("data_emissao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Left(Dict_Xml.Item("DataProcessamento"), 19), "T", " ", 1), "dd/mm/yyyy")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao")
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("CPFCNPJTomador"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("RazaoSocialTomador")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = UCase(Dict_Xml.Item("LogradouroTomador") & ", N " & Dict_Xml.Item("NumeroEnderecoTomador") & " - BAIRRO " & Dict_Xml.Item("BairroTomador") & " - CEP:" & Format(Dict_Xml.Item("CEPTomador"), "00000""-""000"))
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CidadeTomadorDescricao")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("UF")
        Set Nodo = .getElementById("im_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("InscricaoMunicipalTomador") Then
                    If Dict_Xml.Item("InscricaoMunicipalTomador") = 0 Then
                        Nodo.innerHTML = Format(0, "000"".""000""-""00")
                    Else
                        Nodo.innerHTML = Format(Dict_Xml.Item("InscricaoMunicipalTomador"), "000"".""000""-""00")
                    End If
                Else
                    Nodo.innerHTML = Format(0, "000"".""000""-""00")
                End If
            End If
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("EmailTomador")
        Set Nodo = .getElementById("discriminacao_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("DescricaoRPS")
        Set Nodo = .getElementById("discriminacao_servicos_vcp")
            If Not Nodo Is Nothing Then
                Nodo.innerHTML = "Descricao do servico prestado conforme CNAE informada pelo prestador de servico, a qual<br>define o valor do ISSQN devido: " & Format(Dict_Xml.Item("CodigoAtividade"), "0000-0/00-00") & " - " & ArrayDescricao(0)
            End If
        Set Nodo = .getElementById("tributavel")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Item("Tributavel") = "S" Then Nodo.innerHTML = "SIM" Else Nodo.innerHTML = "NAO"
            End If
        Set Nodo = .getElementById("item")
            If Not Nodo Is Nothing Then Nodo.innerHTML = UCase(Dict_Xml.Item("DiscriminacaoServico"))
        Set Nodo = .getElementById("quantidade")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Quantidade")
        Set Nodo = .getElementById("valor_unitario")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorUnitario"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_total")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorTotal"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota_pis_valor_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "PIS (" & Format(Replace(Dict_Xml.Item("AliquotaPIS"), ".", ","), "#,##0.0000") & "%):" & "<br><span class=""impressaoCampo"">" & Format(Replace(Dict_Xml.Item("ValorPIS"), ".", ","), "R$ #,##0.00") & "<span>"
        Set Nodo = .getElementById("aliquota_cofins_valor_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "COFINS (" & Format(Replace(Dict_Xml.Item("AliquotaCOFINS"), ".", ","), "#,##0.0000") & "%):" & "<br><span class=""impressaoCampo"">" & Format(Replace(Dict_Xml.Item("ValorCOFINS"), ".", ","), "R$ #,##0.00") & "<span>"
        Set Nodo = .getElementById("aliquota_inss_valor_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "INSS (" & Format(Replace(Dict_Xml.Item("AliquotaINSS"), ".", ","), "#,##0.0000") & "%):" & "<br><span class=""impressaoCampo"">" & Format(Replace(Dict_Xml.Item("ValorINSS"), ".", ","), "R$ #,##0.00") & "<span>"
        Set Nodo = .getElementById("aliquota_ir_valor_ir")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "IR (" & Format(Replace(Dict_Xml.Item("AliquotaIR"), ".", ","), "#,##0.0000") & "%):" & "<br><span class=""impressaoCampo"">" & Format(Replace(Dict_Xml.Item("ValorIR"), ".", ","), "R$ #,##0.00") & "<span>"
        Set Nodo = .getElementById("aliquota_csll_valor_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "CSLL (" & Format(Replace(Dict_Xml.Item("AliquotaCSLL"), ".", ","), "#,##0.0000") & "%):" & "<br><span class=""impressaoCampo"">" & Format(Replace(Dict_Xml.Item("ValorCSLL"), ".", ","), "R$ #,##0.00") & "<span>"
        Set Nodo = .getElementById("valor_total_nota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorTotal"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_total_deducoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("base_calculo")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorTotal"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("AliquotaAtividade"), ".", ","), 2) & "%"
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then
                ValueIss = CDbl(Replace(Dict_Xml.Item("AliquotaAtividade") / 100, ".", ",")) * CDbl(Replace(Dict_Xml.Item("ValorTotal"), ".", ","))
                CotaPosition = InStr(ValueIss, ","): Nodo.innerHTML = Format(Left(ValueIss, CotaPosition + 2), "R$ #,##0.00")
            End If
        Set Nodo = .getElementById("mes_competencia")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(CDate(Replace(Left(Dict_Xml.Item("DataProcessamento"), 19), "T", " ", 1)), "mm/yyyy")
        Set Nodo = .getElementById("tributavel_outrasinformacoes")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Item("Tributacao") = "T" Then Nodo.innerHTML = "TRIBUTAVEL" Else Stop 'Nodo.innerHTML = "NAO TRIBUTAVEL"
            End If
        Set Nodo = .getElementById("local_prestacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("MunicipioPrestacaoDescricao") & "/" & Array_Dados_TNT(8)
        Set Nodo = .getElementById("local_incidencia")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("MunicipioPrestacaoDescricao") & "/" & Array_Dados_TNT(8)
        Set Nodo = .getElementById("rps_serie_data")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "RPS/SERIE: " & Dict_Xml.Item("NumeroRPS") & "/" & Dict_Xml.Item("SeriePrestacao") & " (" & CDate(Replace(Left(Dict_Xml.Item("DataEmissaoRPS"), 19), "T", " ", 1)) & ")"
        Set Nodo = .getElementById("tipo_recolhimento")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Item("TipoRecolhimento") = "A" Then Nodo.innerHTML = "ISS A RECOLHER PELO PRESTADOR" Else Nodo.innerHTML = "ISS RETIDO NA FONTE PELO TOMADOR"
            End If
        Set Nodo = .getElementById("cnae_descricao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoAtividade") & " - " & UCase(ArrayDescricao(0))
        Set Nodo = .getElementById("servico_prestado")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Replace(ArrayDescricao(1), ".", "") & " - " & UCase(ArrayDescricao(2))
        Set Nodo = .getElementById("pis_descricao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "PIS: " & Format(Replace(Dict_Xml.Item("AliquotaPIS"), ".", ","), "#,##0.00") & "% R$ " & Format(Replace(Dict_Xml.Item("ValorPIS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("cofins_descricao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "COFINS: " & Format(Replace(Dict_Xml.Item("AliquotaCOFINS"), ".", ","), "#,##0.00") & "% R$ " & Format(Replace(Dict_Xml.Item("ValorCOFINS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("csll_descricao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "CSLL: " & Format(Replace(Dict_Xml.Item("AliquotaCSLL"), ".", ","), "#,##0.00") & "% " & Format(Replace(Dict_Xml.Item("ValorCSLL"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("ir_descricao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "IRRF: " & Format(Replace(Dict_Xml.Item("AliquotaIR"), ".", ","), "#,##0.00") & "% " & Format(Replace(Dict_Xml.Item("ValorIR"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota_iss_efetiva")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("AliquotaAtividade"), ".", ","), 2) & "%"
        Set Nodo = .getElementById("url_nota")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Item("URLNotaFiscal") <> "" Then
                    Nodo.innerHTML = Dict_Xml.Item("URLNotaFiscal")
                Else
                    .getElementById("notify_url_nota").innerText = ""
                End If
            End If
        
    End With
    
    Preecher_Template = Array(Dict_Xml.Item("CPFCNPJTomador"), htmlDoc.Body.innerHTML)
    
End Function

}