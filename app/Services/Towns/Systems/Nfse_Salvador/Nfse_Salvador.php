<?php

namespace App\Services\Towns\Systems\Nfse_Salvador;


class Nfse_Salvador
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "SSA", "https://nfse.salvador.ba.gov.br/rps/" 'Prefeitura Salvador
    Links_Prefeituras.Add "SSA_TOMADOR", "https://nfse.salvador.ba.gov.br/" 'Prefeitura Salvador Casos Tomador

End Sub

Public Function CancelaNFTS(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_Nota As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "CancelaNFTS": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_ASSINATURA_CANCELAMENTO]", "") 'Verificar Modo de criação da Assinatura
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelaNFTS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function ConsultaAutEmissaoNFSE(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "ConsultaAutEmissaoNFSE": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ_MTZ]", Conf.Item("CNPJ_Matriz_" & Used_Companny))
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultaAutEmissaoNFSE = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function ConsultaInformacoesLoteNFTS(ByVal CNPJ As String, ByVal Numero_Lote As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "ConsultaInformacoesLoteNFTS": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_LOTE]", Numero_Lote)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultaInformacoesLoteNFTS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function ConsultaLoteNFTS(ByVal CNPJ As String, ByVal Numero_Lote As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "ConsultaLoteNFTS": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_LOTE]", Numero_Lote)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultaLoteNFTS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function ConsultaNFTS(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_NF As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "ConsultaNFTS": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", Conf.Item("CNPJ_Matriz_" & Used_Companny))
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_NF)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultaNFTS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function EnvioLoteNFTS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "EnvioLoteNFTS": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnvioLoteNFTS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function EnvioNFTS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "EnvioNFTS": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnvioNFTS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function TesteEnvioLoteNFTS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "ws/LoteNFTS.asmx": Operacao = "TesteEnvioLoteNFTS": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(True)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    TesteEnvioLoteNFTS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, Operacao, True)

End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "CONSULTALOTERPS/ConsultaLoteRPS.svc": SOAPAction = "http://tempuri.org/IConsultaLoteRPS/ConsultarLoteRPS"
    Operacao = "ConsultarLoteRPS": Operacao_2 = "loteXML": DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function ConsultarLoteRPSComplementar(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "CONSULTALOTERPS/ConsultaLoteRPS.svc": SOAPAction = "http://tempuri.org/IConsultaLoteRPS/ConsultarLoteRPSComplementar"
    Operacao = "ConsultarLoteRPSComplementar": Operacao_2 = "loteXML"
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRPSComplementar = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                              ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "CONSULTANFSE/ConsultaNfse.svc": SOAPAction = "http://tempuri.org/IConsultaNfse/ConsultarNfse"
    Operacao = "ConsultarNfse": Operacao_2 = "consultaxml"
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function ConsultarNfseComplementar(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "CONSULTANFSE/ConsultaNfse.svc": SOAPAction = "http://tempuri.org/IConsultaNfse/ConsultarNfseComplementar"
    Operacao = "ConsultarNfseComplementar": Operacao_2 = "consultaxml"
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseComplementar = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function ConsultarNfseRps(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "ConsultaNfseRPS/ConsultaNfseRPS.svc": SOAPAction = "http://tempuri.org/IConsultaNfseRPS/ConsultarNfseRPS"
    Operacao = "ConsultarNfseRPS": Operacao_2 = "consultaxml"
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function ConsultarNfseRPSComplementar(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "ConsultaNfseRPS/ConsultaNfseRPS.svc"
    SOAPAction = "http://tempuri.org/IConsultaNfseRPS/ConsultarNfseRPSComplementar"
    Operacao = "ConsultarNfseRPSComplementar"
    Operacao_2 = "consultaxml"
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseRPSComplementar = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "CONSULTASITUACAOLOTERPS/ConsultaSituacaoLoteRPS.svc"
    SOAPAction = "http://tempuri.org/IConsultaSituacaoLoteRPS/ConsultarSituacaoLoteRPS"
    Operacao = "ConsultarSituacaoLoteRPS"
    Operacao_2 = "loteXML"
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function EnviarLoteRPS(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "ENVIOLOTERPS/EnvioLoteRPS.svc"
    SOAPAction = "http://tempuri.org/IEnvioLoteRPS/EnviarLoteRPS"
    Operacao = "EnviarLoteRPS"
    Operacao_2 = "loteXML"
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteRPS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function EnviarLoteRPSComplementar(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "ENVIOLOTERPS/EnvioLoteRPS.svc"
    SOAPAction = "http://tempuri.org/IEnvioLoteRPS/EnviarLoteRPSComplementar"
    Operacao = "EnviarLoteRPSComplementar"
    Operacao_2 = "loteXML"
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "</tem:EnviarLoteRPSComplementar>", "<tem:pxmlDadosComplementares>VEROQUEVAIAQUI</tem:pxmlDadosComplementares>")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteRPSComplementar = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Public Function ConsultarSituacaoNfse(ByVal Used_Companny As String)

    Dim Mount_Mensage As String, Operacao As String, Operacao_2 As String, DadosMsg As String, EndPoint As String, SOAPAction As String

    EndPoint = "CONSULTASITUACAONFSE/ConsultaSituacaoNfse.svc"
    SOAPAction = "http://tempuri.org/IConsultaSituacaoNfse/ConsultarSituacaoNfse"
    Operacao = "ConsultarSituacaoNfse"
    Operacao_2 = "consultaXml"
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage_2]", Operacao_2)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny, , False, SOAPAction)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, Optional ByVal Operacao As String, _
                           Optional ByVal V2 As Boolean, Optional ByVal SOAPAction As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
    If V2 Then
        Headers.Add "Content-Type", "application/soap+xml;charset=UTF-8;action=""https://nfse.salvador.ba.gov.br/nfts/ws/" & Operacao & ""
        Headers.Add "SOAPAction", SOAPAction
    Else
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        Headers.Add "SOAPAction", SOAPAction
    End If

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing

End Function

Private Function Message_Assemble(ByVal V2 As Boolean) As String

    If V2 Then

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:nfts=""https://nfse.salvador.ba.gov.br/nfts"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<nfts:[Mount_Mensage]Request>"
        Message_Assemble = Message_Assemble & "<nfts:MensagemXML><![CDATA[[DadosMsg]]]></nfts:MensagemXML>"
        Message_Assemble = Message_Assemble & "</nfts:[Mount_Mensage]Request>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    Else

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:tem=""http://tempuri.org/"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<tem:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "<tem:[Mount_Mensage_2]><![CDATA[[DadosMsg]]]></tem:[Mount_Mensage_2]>"
        Message_Assemble = Message_Assemble & "</tem:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    End If

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelaNFTS"

            MensagemXML = "<PedidoCancelamentoNFTS xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns=""https://nfse.salvador.ba.gov.br/nfts"">"
            MensagemXML = MensagemXML & "<Cabecalho xmlns="""" Versao=""1"">"
            MensagemXML = MensagemXML & "<Remetente>"
            MensagemXML = MensagemXML & "<CPFCNPJ>"
            MensagemXML = MensagemXML & "<CNPJ>[CAMPO_CNPJ]</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJ>"
            MensagemXML = MensagemXML & "</Remetente>"
            MensagemXML = MensagemXML & "<transacao>true</transacao>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<DetalheNFTS xmlns="""">"
            MensagemXML = MensagemXML & "<ChaveNFTS>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<NumeroNFTS>[CAMPO_NUMERO_NF]</NumeroNFTS>"
            MensagemXML = MensagemXML & "</ChaveNFTS>"
            MensagemXML = MensagemXML & "<AssinaturaCancelamento>[CAMPO_ASSINATURA_CANCELAMENTO]</AssinaturaCancelamento>"
            MensagemXML = MensagemXML & "</DetalheNFTS>"
            MensagemXML = MensagemXML & "</PedidoCancelamentoNFTS>"

        Case Is = "ConsultaAutEmissaoNFSE"

            MensagemXML = "<PedidoConsultaEmissaoNFSE xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns=""https://nfse.salvador.ba.gov.br/nfts"">"
            MensagemXML = MensagemXML & "<Cabecalho xmlns="""" Versao=""1"">"
            MensagemXML = MensagemXML & "<Remetente>"
            MensagemXML = MensagemXML & "<CPFCNPJ>"
            MensagemXML = MensagemXML & "<CNPJ>[CAMPO_CNPJ_MTZ]</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJ>"
            MensagemXML = MensagemXML & "</Remetente>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<DetalheEmissNFSE xmlns="""">"
            MensagemXML = MensagemXML & "<CPFCNPJPrestador>"
            MensagemXML = MensagemXML & "<CNPJ>[CAMPO_CNPJ]</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJPrestador>"
            MensagemXML = MensagemXML & "</DetalheEmissNFSE>"
            MensagemXML = MensagemXML & "</PedidoConsultaEmissaoNFSE>"

        Case Is = "ConsultaInformacoesLoteNFTS"

            MensagemXML = "<PedidoConsultaLoteNFTS xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns=""https://nfse.salvador.ba.gov.br/nfts"">"
            MensagemXML = MensagemXML & "<Cabecalho xmlns="""" Versao=""1"">"
            MensagemXML = MensagemXML & "<Remetente>"
            MensagemXML = MensagemXML & "<CPFCNPJ>"
            MensagemXML = MensagemXML & "<CNPJ>[CAMPO_CNPJ]</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJ>"
            MensagemXML = MensagemXML & "</Remetente>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<DetalheLoteNFTS xmlns="""">"
            MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
            MensagemXML = MensagemXML & "</DetalheLoteNFTS>"
            MensagemXML = MensagemXML & "</PedidoConsultaLoteNFTS>"

        Case Is = "ConsultaLoteNFTS"

            MensagemXML = "<PedidoConsultaLoteNFTS xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns=""https://nfse.salvador.ba.gov.br/nfts"">"
            MensagemXML = MensagemXML & "<Cabecalho xmlns="""" Versao=""1"">"
            MensagemXML = MensagemXML & "<Remetente>"
            MensagemXML = MensagemXML & "<CPFCNPJ>"
            MensagemXML = MensagemXML & "<CNPJ>[CAMPO_CNPJ]</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJ>"
            MensagemXML = MensagemXML & "</Remetente>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<DetalheLoteNFTS xmlns="""">"
            MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
            MensagemXML = MensagemXML & "</DetalheLoteNFTS>"
            MensagemXML = MensagemXML & "</PedidoConsultaLoteNFTS>"

        Case Is = "ConsultaNFTS"

            MensagemXML = "<PedidoConsultaNFTS xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns=""https://nfse.salvador.ba.gov.br/nfts"">"
            MensagemXML = MensagemXML & "<Cabecalho xmlns="""" Versao=""1"">"
            MensagemXML = MensagemXML & "<Remetente>"
            MensagemXML = MensagemXML & "<CPFCNPJ>"
            MensagemXML = MensagemXML & "<CNPJ>[CAMPO_CNPJ]</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJ>"
            MensagemXML = MensagemXML & "</Remetente>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<DetalheNFTS xmlns="""">"
            MensagemXML = MensagemXML & "<ChaveNFTS>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<NumeroNFTS>[CAMPO_NUMERO_NF]</NumeroNFTS>"
            MensagemXML = MensagemXML & "</ChaveNFTS>"
            MensagemXML = MensagemXML & "</DetalheNFTS>"
            MensagemXML = MensagemXML & "</PedidoConsultaNFTS>"

        Case Is = "EnvioLoteNFTS"

            MensagemXML = ""
            MensagemXML = MensagemXML & ""

        Case Is = "EnvioNFTS"

            MensagemXML = ""
            MensagemXML = MensagemXML & ""

        Case Is = "TesteEnvioLoteNFTS"

            MensagemXML = "<PedidoEnvioLoteNFTS xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns=""https://nfse.salvador.ba.gov.br/nfts"">"
            MensagemXML = MensagemXML & "<Cabecalho xmlns="""" Versao=""1"">"
            MensagemXML = MensagemXML & "<Remetente>"
            MensagemXML = MensagemXML & "<CPFCNPJ>"
            MensagemXML = MensagemXML & "<CNPJ>57529050000188</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJ>"
            MensagemXML = MensagemXML & "</Remetente>"
            MensagemXML = MensagemXML & "<transacao>false</transacao>"
            MensagemXML = MensagemXML & "<dtInicio>2014-10-01</dtInicio>"
            MensagemXML = MensagemXML & "<dtFim>2014-10-03</dtFim>"
            MensagemXML = MensagemXML & "<QtdNFTS>1</QtdNFTS>"
            MensagemXML = MensagemXML & "<ValorTotalServicos>100</ValorTotalServicos>"
            MensagemXML = MensagemXML & "<ValorTotalDeducoes>0</ValorTotalDeducoes>"
            MensagemXML = MensagemXML & "</Cabecalho>"
            MensagemXML = MensagemXML & "<NFTS xmlns="""">"
            MensagemXML = MensagemXML & "<TipoDocumento>01</TipoDocumento>"
            MensagemXML = MensagemXML & "<ChaveDocumento>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>13580200127</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<SerieNFTS>A</SerieNFTS>"
            MensagemXML = MensagemXML & "<NumeroDocumento>350</NumeroDocumento>"
            MensagemXML = MensagemXML & "</ChaveDocumento>"
            MensagemXML = MensagemXML & "<DataPrestacao>2014-10-02</DataPrestacao>"
            MensagemXML = MensagemXML & "<StatusNFTS>N</StatusNFTS>"
            MensagemXML = MensagemXML & "<TributacaoNFTS>T</TributacaoNFTS>"
            MensagemXML = MensagemXML & "<ValorServicos>100</ValorServicos>"
            MensagemXML = MensagemXML & "<ValorDeducoes>0</ValorDeducoes>"
            MensagemXML = MensagemXML & "<CodigoServico>9999</CodigoServico>"
            MensagemXML = MensagemXML & "<CodigoCnae>0</CodigoCnae>"
            MensagemXML = MensagemXML & "<AliquotaServicos>0.03</AliquotaServicos>"
            MensagemXML = MensagemXML & "<ISSRetidoTomador>true</ISSRetidoTomador>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CPFCNPJ>"
            MensagemXML = MensagemXML & "<CNPJ>32250824000106</CNPJ>"
            MensagemXML = MensagemXML & "</CPFCNPJ>"
            MensagemXML = MensagemXML & "<RazaoSocialPrestador>Prestador Teste</RazaoSocialPrestador>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<NumeroEndereco>100</NumeroEndereco>"
            MensagemXML = MensagemXML & "<CEP>44020200</CEP>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "<Email>jose@uol.com.br</Email>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<RegimeTributacao>0</RegimeTributacao>"
            MensagemXML = MensagemXML & "<Discriminacao>Emissao de NFTS</Discriminacao>"
            MensagemXML = MensagemXML & "<TipoNFTS>1</TipoNFTS>"
            MensagemXML = MensagemXML & "<Assinatura>[CAMPO_ASSINATURA]</Assinatura>"
            MensagemXML = MensagemXML & "</NFTS>"
            MensagemXML = MensagemXML & "</PedidoEnvioLoteNFTS>"

        Case Is = "ConsultarLoteRPS"

            'Compor Mensagem

        Case Is = "ConsultarLoteRPSComplementar"

            'Compor Mensagem

        Case Is = "ConsultarNfse"

            MensagemXML = "<ConsultarNfseEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "</ConsultarNfseEnvio>"

        Case Is = "ConsultarNfseComplementar"

            'Compor Mensagem

        Case Is = "ConsultarNfseRPS"

            'Compor Mensagem

        Case Is = "ConsultarNfseRPSComplementar"

            'Compor Mensagem

        Case Is = "ConsultarSituacaoLoteRPS"

            'Compor Mensagem

        Case Is = "EnviarLoteRPS"

            'Compor Mensagem

        Case Is = "EnviarLoteRPSComplementar"

            'Compor Mensagem

        Case Is = "ConsultarSituacaoNfse"

            'Compor Mensagem

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

    Url = ""

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
