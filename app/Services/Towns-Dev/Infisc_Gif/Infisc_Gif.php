<?php

namespace App\Services\Towns\Infisc_Gif;


class Infisc_Gif
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "CXJ", "https://nfse.caxias.rs.gov.br/portal/Servicos?wsdl" 'Prefeitura Caxias do Sul

End Sub

Public Function anularNotaFiscal(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "anularNotaFiscal": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    anularNotaFiscal = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function cancelarLote(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "cancelarLote": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    cancelarLote = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function cancelarNotaFiscal(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "cancelarNotaFiscal": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    cancelarNotaFiscal = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function consultarNotaFiscal(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "consultarNotaFiscal": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNotaFiscal = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function enviarLoteCupom(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "enviarLoteCupom": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    enviarLoteCupom = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function enviarLoteDms(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "enviarLoteDms": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    enviarLoteDms = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function enviarLoteNotas(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "enviarLoteNotas": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    enviarLoteNotas = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function inutilizacao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "inutilizacao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    inutilizacao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterCriticaLote(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterCriticaLote": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterCriticaLote = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterCriticaLoteDms(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterCriticaLoteDms": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterCriticaLoteDms = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterLoteNotaFiscal(ByVal CNPJ As String, ByVal Nota_Inicial As String, ByVal Nota_Final As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterLoteNotaFiscal": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_FINAL]", Nota_Final)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterLoteNotaFiscal = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ObterNotaFiscal(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterNotaFiscal": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ObterNotaFiscal = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterNotaFiscalXml(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterNotaFiscalXml": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterNotaFiscalXml = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterNotasEmPDF(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterNotasEmPDF": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterNotasEmPDF = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterNotasEmPNG(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterNotasEmPNG": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterNotasEmPNG = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterNumeracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterNumeracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterNumeracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterReciboLote(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterReciboLote": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterReciboLote = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function obterStatusLoteDms(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "obterStatusLoteDms": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    obterStatusLoteDms = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:ws=""http://ws.pc.gif.com.br/"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<ws:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<xml>[DadosMsg]</xml>"
    Message_Assemble = Message_Assemble & "</ws:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "anularNotaFiscal"
        Case Is = "cancelarLote"

            MensagemXML = "<pedidoCancelamentoLote versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<cLote>13585</cLote>"
            MensagemXML = MensagemXML & "</pedidoCancelamentoLote>"

        Case Is = "cancelarNotaFiscal"

            MensagemXML = "<pedCancelaNFSe versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<chvAcessoNFS-e>434945460000011990000000976482769641</chvAcessoNFS-e>"
            MensagemXML = MensagemXML & "<motivo>1</motivo>"
            MensagemXML = MensagemXML & "</pedCancelaNFSe>"

        Case Is = "consultarNotaFiscal"

            MensagemXML = "<pedConsultaTrans versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<chvAcessoNFS-e>434945460000011990000000976482769641</chvAcessoNFS-e>"
            MensagemXML = MensagemXML & "</pedConsultaTrans>"

        Case Is = "enviarLoteCupom"

            MensagemXML = "<envioLote versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>08967207000141</CNPJ>"
            MensagemXML = MensagemXML & "<dhTrans>2015-12-21 10:28:12</dhTrans>"
            MensagemXML = MensagemXML & "<CFS-e>"
            MensagemXML = MensagemXML & "<infCFSe versao=""1.0"">"
            MensagemXML = MensagemXML & "<Id>"
            MensagemXML = MensagemXML & "<cCFS-e>000000001</cCFS-e>"
            MensagemXML = MensagemXML & "<serie>CF</serie>"
            MensagemXML = MensagemXML & "<nCFS-e>2</nCFS-e>"
            MensagemXML = MensagemXML & "<dEmi>2015-08-25</dEmi>"
            MensagemXML = MensagemXML & "<hEmi>10:15</hEmi>"
            MensagemXML = MensagemXML & "<refNF>4308967207000141980CF000000002000000002</refNF>"
            MensagemXML = MensagemXML & "<ambienteEmi>2</ambienteEmi>"
            MensagemXML = MensagemXML & "<formaEmi>2</formaEmi>"
            MensagemXML = MensagemXML & "</Id>"
            MensagemXML = MensagemXML & "<prest>"
            MensagemXML = MensagemXML & "<CNPJ>08967207000141</CNPJ>"
            MensagemXML = MensagemXML & "<xNome>Empresa Ficticia Ltda</xNome>"
            MensagemXML = MensagemXML & "<xFant>Empresa Ficticia Ltda</xFant>"
            MensagemXML = MensagemXML & "<IM>150000</IM>"
            MensagemXML = MensagemXML & "<xEmail>teste@teste.com.br</xEmail>"
            MensagemXML = MensagemXML & "<xSite>www.sitedaempresa.com.br</xSite>"
            MensagemXML = MensagemXML & "<end>"
            MensagemXML = MensagemXML & "<xLgr>Rua Julio de Castilhos</xLgr>"
            MensagemXML = MensagemXML & "<nro>1750</nro>"
            MensagemXML = MensagemXML & "<xCpl>Sala</xCpl>"
            MensagemXML = MensagemXML & "<xBairro>Centro</xBairro>"
            MensagemXML = MensagemXML & "<cMun>4320008</cMun>"
            MensagemXML = MensagemXML & "<xMun>Caxias do Sul</xMun>"
            MensagemXML = MensagemXML & "<UF>RS</UF>"
            MensagemXML = MensagemXML & "<CEP>95600000</CEP>"
            MensagemXML = MensagemXML & "<cPais>01058</cPais>"
            MensagemXML = MensagemXML & "<xPais>Brasil</xPais>"
            MensagemXML = MensagemXML & "</end>"
            MensagemXML = MensagemXML & "<fone>5455555555</fone>"
            MensagemXML = MensagemXML & "<fone2>5499999999</fone2>"
            MensagemXML = MensagemXML & "<IE>0291234000</IE>"
            MensagemXML = MensagemXML & "<regimeTrib>3</regimeTrib>"
            MensagemXML = MensagemXML & "</prest>"
            MensagemXML = MensagemXML & "<TomS>"
            MensagemXML = MensagemXML & "<CPF>02561347079</CPF>"
            MensagemXML = MensagemXML & "<xEmail>tomador@tomador.com.br</xEmail>"
            MensagemXML = MensagemXML & "</TomS>"
            MensagemXML = MensagemXML & "<estacionamento>"
            MensagemXML = MensagemXML & "<xPlaca>IMS5438</xPlaca>"
            MensagemXML = MensagemXML & "<dDataInicial>2015-12-21</dDataInicial>"
            MensagemXML = MensagemXML & "<hHoraInicial>10:00</hHoraInicial>"
            MensagemXML = MensagemXML & "<dDataFinal>2015-12-21</dDataFinal>"
            MensagemXML = MensagemXML & "<hHoraFinal>11:00</hHoraFinal>"
            MensagemXML = MensagemXML & "</estacionamento>"
            MensagemXML = MensagemXML & "<det>"
            MensagemXML = MensagemXML & "<nItem>1</nItem>"
            MensagemXML = MensagemXML & "<serv>"
            MensagemXML = MensagemXML & "<cServ>11010000</cServ> <cLCServ>0104</cLCServ>"
            MensagemXML = MensagemXML & "<xServ>Guarda e estacionamento de veículos terrestres automotores</xServ>"
            MensagemXML = MensagemXML & "<uTrib>UN</uTrib>"
            MensagemXML = MensagemXML & "<qTrib>1</qTrib>"
            MensagemXML = MensagemXML & "<vUnit>1000.00</vUnit>"
            MensagemXML = MensagemXML & "<vServ>1000.00</vServ>"
            MensagemXML = MensagemXML & "<vBCISS>1000.00</vBCISS>"
            MensagemXML = MensagemXML & "<pISS>3.50</pISS>"
            MensagemXML = MensagemXML & "<vISS>35.00</vISS>"
            MensagemXML = MensagemXML & "<totalAproxTribServ>100.00</totalAproxTribServ>"
            MensagemXML = MensagemXML & "</serv>"
            MensagemXML = MensagemXML & "</det>"
            MensagemXML = MensagemXML & "<total>"
            MensagemXML = MensagemXML & "<vServ>1000.00</vServ>"
            MensagemXML = MensagemXML & "<vtNF>1000.00</vtNF>"
            MensagemXML = MensagemXML & "<vtLiq>1000.00</vtLiq>"
            MensagemXML = MensagemXML & "<totalAproxTrib>100.00</totalAproxTrib>"
            MensagemXML = MensagemXML & "<ISS>"
            MensagemXML = MensagemXML & "<vBCISS>1000.00</vBCISS>"
            MensagemXML = MensagemXML & "<vISS>35.00</vISS>"
            MensagemXML = MensagemXML & "</ISS>"
            MensagemXML = MensagemXML & "</total>"
            MensagemXML = MensagemXML & "</infCFSe>"
            MensagemXML = MensagemXML & "</CFS-e>"
            MensagemXML = MensagemXML & "</envioLote>"

        Case Is = "enviarLoteDms"
        Case Is = "enviarLoteNotas"

            MensagemXML = "<envioLote versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<dhTrans>2013-04-07 07:28:12</dhTrans>"
            MensagemXML = MensagemXML & "<NFS-e>"
            MensagemXML = MensagemXML & "<infNFSe versao=""1.1"">"
            MensagemXML = MensagemXML & "<Id>"
            MensagemXML = MensagemXML & "<cNFS-e>218736215</cNFS-e>"
            MensagemXML = MensagemXML & "<mod>90</mod>"
            MensagemXML = MensagemXML & "<serie>S</serie>"
            MensagemXML = MensagemXML & "<nNFS-e>976</nNFS-e>"
            MensagemXML = MensagemXML & "<dEmi>2013-04-07</dEmi>"
            MensagemXML = MensagemXML & "<hEmi>06:15</hEmi>"
            MensagemXML = MensagemXML & "<tpNF>1</tpNF>"
            MensagemXML = MensagemXML & "<refNF>43494546000001199000S000000976218736215</refNF>"
            MensagemXML = MensagemXML & "<tpImp>1</tpImp>"
            MensagemXML = MensagemXML & "<tpEmis>N</tpEmis>"
            MensagemXML = MensagemXML & "<cancelada>N</cancelada>"
            MensagemXML = MensagemXML & "<canhoto>1</canhoto>"
            MensagemXML = MensagemXML & "</Id>"
            MensagemXML = MensagemXML & "<prest>"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<xNome>Silva e Silva Ltda</xNome>"
            MensagemXML = MensagemXML & "<xFant>Silva e Silva</xFant>"
            MensagemXML = MensagemXML & "<IM>23231</IM>"
            MensagemXML = MensagemXML & "<xEmail>teste@teste.com</xEmail>"
            MensagemXML = MensagemXML & "<xSite>www.sitedaempresa.com.br</xSite>"
            MensagemXML = MensagemXML & "<end>"
            MensagemXML = MensagemXML & "<xLgr>Rua Alfredo Chaves</xLgr>"
            MensagemXML = MensagemXML & "<nro>1750</nro>"
            MensagemXML = MensagemXML & "<xCpl>Sala</xCpl>"
            MensagemXML = MensagemXML & "<xBairro>Centro</xBairro>"
            MensagemXML = MensagemXML & "<cMun>4320008</cMun>"
            MensagemXML = MensagemXML & "<xMun>Caxias do Sul</xMun>"
            MensagemXML = MensagemXML & "<UF>RS</UF>"
            MensagemXML = MensagemXML & "<CEP>95020460</CEP>"
            MensagemXML = MensagemXML & "<cPais>01058</cPais>"
            MensagemXML = MensagemXML & "<xPais>Brasil</xPais>"
            MensagemXML = MensagemXML & "</end>"
            MensagemXML = MensagemXML & "<fone>5421091919</fone>"
            MensagemXML = MensagemXML & "<fone2>5499999999</fone2>"
            MensagemXML = MensagemXML & "<IE>0291234567</IE>"
            MensagemXML = MensagemXML & "<regimeTrib>3</regimeTrib>"
            MensagemXML = MensagemXML & "</prest>"
            MensagemXML = MensagemXML & "<TomS>"
            MensagemXML = MensagemXML & "<CNPJ>99882491000109</CNPJ>"
            MensagemXML = MensagemXML & "<xNome>Empresa Tomadora</xNome>"
            MensagemXML = MensagemXML & "<ender>"
            MensagemXML = MensagemXML & "<xLgr>Av Silva</xLgr>"
            MensagemXML = MensagemXML & "<nro>131</nro>"
            MensagemXML = MensagemXML & "<xCpl>Sala</xCpl>"
            MensagemXML = MensagemXML & "<xBairro>Centro</xBairro>"
            MensagemXML = MensagemXML & "<cMun>4320008</cMun>"
            MensagemXML = MensagemXML & "<xMun>Caxias do Sul</xMun>"
            MensagemXML = MensagemXML & "<UF>RS</UF>"
            MensagemXML = MensagemXML & "<CEP>95020000</CEP>"
            MensagemXML = MensagemXML & "<cPais>01058</cPais>"
            MensagemXML = MensagemXML & "<xPais>Brasil</xPais>"
            MensagemXML = MensagemXML & "</ender>"
            MensagemXML = MensagemXML & "<xEmail>tomador@tomador.com.br</xEmail>"
            MensagemXML = MensagemXML & "<IE>2132365544</IE>"
            MensagemXML = MensagemXML & "<IM>64889</IM>"
            MensagemXML = MensagemXML & "<fone>5435302020</fone>"
            MensagemXML = MensagemXML & "<fone2>5499999999</fone2>"
            MensagemXML = MensagemXML & "</TomS>"
            MensagemXML = MensagemXML & "<dadosDaObra>"
            MensagemXML = MensagemXML & "<xLogObra>Av Santos</xLogObra>"
            MensagemXML = MensagemXML & "<xComplObra>Sala</xComplObra>"
            MensagemXML = MensagemXML & "<vNumeroObra>320</vNumeroObra>"
            MensagemXML = MensagemXML & "<xBairroObra>Centro</xBairroObra>"
            MensagemXML = MensagemXML & "<xCepObra>95020460</xCepObra>"
            MensagemXML = MensagemXML & "<cCidadeObra>4320008</cCidadeObra>"
            MensagemXML = MensagemXML & "<xCidadeObra>Caxias do Sul</xCidadeObra>"
            MensagemXML = MensagemXML & "<xUfObra>RS</xUfObra>"
            MensagemXML = MensagemXML & "<cPaisObra>01058</cPaisObra>"
            MensagemXML = MensagemXML & "<xPaisObra>Brasil</xPaisObra>"
            MensagemXML = MensagemXML & "<numeroArt>123456789012</numeroArt>"
            MensagemXML = MensagemXML & "<numeroCei>123456789012</numeroCei>"
            MensagemXML = MensagemXML & "<numeroProj>846548</numeroProj>"
            MensagemXML = MensagemXML & "<numeroMatri>8494546</numeroMatri>"
            MensagemXML = MensagemXML & "</dadosDaObra>"
            MensagemXML = MensagemXML & "<transportadora>"
            MensagemXML = MensagemXML & "<xNomeTrans>Transportadora Ficticia LTDA</xNomeTrans>"
            MensagemXML = MensagemXML & "<xCpfCnpjTrans>26578334000130</xCpfCnpjTrans>"
            MensagemXML = MensagemXML & "<xInscEstTrans>1232185494</xInscEstTrans>"
            MensagemXML = MensagemXML & "<xPlacaTrans>IBB6962</xPlacaTrans>"
            MensagemXML = MensagemXML & "<xEndTrans>Av. Carlos Gomes</xEndTrans>"
            MensagemXML = MensagemXML & "<cMunTrans>4320008 </cMunTrans>"
            MensagemXML = MensagemXML & "<xMunTrans>Caxias do Sul </xMunTrans>"
            MensagemXML = MensagemXML & "<xUfTrans>RS</xUfTrans>"
            MensagemXML = MensagemXML & "<cPaisTrans>01058</cPaisTrans>"
            MensagemXML = MensagemXML & "<xPaisTrans>Brasil</xPaisTrans>"
            MensagemXML = MensagemXML & "<vTipoFreteTrans>0</vTipoFreteTrans>"
            MensagemXML = MensagemXML & "</transportadora>"
            MensagemXML = MensagemXML & "<det>"
            MensagemXML = MensagemXML & "<nItem>1</nItem>"
            MensagemXML = MensagemXML & "<serv>"
            MensagemXML = MensagemXML & "<cServ>1505</cServ>"
            MensagemXML = MensagemXML & "<cLCServ>1405</cLCServ>"
            MensagemXML = MensagemXML & "<xServ>Pintura</xServ>"
            MensagemXML = MensagemXML & "<localTributacao>4305108</localTributacao>"
            MensagemXML = MensagemXML & "<localVerifResServ>1</localVerifResServ>"
            MensagemXML = MensagemXML & "<uTrib>m2</uTrib>"
            MensagemXML = MensagemXML & "<qTrib>30</qTrib>"
            MensagemXML = MensagemXML & "<vUnit>100.00</vUnit>"
            MensagemXML = MensagemXML & "<vServ>3000.00</vServ>"
            MensagemXML = MensagemXML & "<vDesc>0.00</vDesc>"
            MensagemXML = MensagemXML & "<vBCISS>3000.00</vBCISS>"
            MensagemXML = MensagemXML & "<pISS>4.00</pISS>"
            MensagemXML = MensagemXML & "<vISS>120.00</vISS>"
            MensagemXML = MensagemXML & "<vBCINSS>0.00</vBCINSS>"
            MensagemXML = MensagemXML & "<pRetINSS>0.00</pRetINSS>"
            MensagemXML = MensagemXML & "<vRetINSS>0.00</vRetINSS>"
            MensagemXML = MensagemXML & "<vRed>0.00</vRed>"
            MensagemXML = MensagemXML & "<vBCRetIR>0.00</vBCRetIR>"
            MensagemXML = MensagemXML & "<pRetIR>0.00</pRetIR>"
            MensagemXML = MensagemXML & "<vRetIR>0.00</vRetIR>"
            MensagemXML = MensagemXML & "<vBCCOFINS>0.00</vBCCOFINS>"
            MensagemXML = MensagemXML & "<pRetCOFINS>0.00</pRetCOFINS>"
            MensagemXML = MensagemXML & "<vRetCOFINS>0.00</vRetCOFINS>"
            MensagemXML = MensagemXML & "<vBCCSLL>0.00</vBCCSLL>"
            MensagemXML = MensagemXML & "<pRetCSLL>0.00</pRetCSLL>"
            MensagemXML = MensagemXML & "<vRetCSLL>0.00</vRetCSLL>"
            MensagemXML = MensagemXML & "<vBCPISPASEP>0.00</vBCPISPASEP>"
            MensagemXML = MensagemXML & "<pRetPISPASEP>0.00</pRetPISPASEP>"
            MensagemXML = MensagemXML & "<vRetPISPASEP>0.00</vRetPISPASEP>"
            MensagemXML = MensagemXML & "</serv>"
            MensagemXML = MensagemXML & "</det>"
            MensagemXML = MensagemXML & "<total>"
            MensagemXML = MensagemXML & "<vServ>3000.00</vServ>"
            MensagemXML = MensagemXML & "<vDesc>0.00</vDesc>"
            MensagemXML = MensagemXML & "<vtNF>3000.00</vtNF>"
            MensagemXML = MensagemXML & "<vtLiq>3000.00</vtLiq>"
            MensagemXML = MensagemXML & "<Ret>"
            MensagemXML = MensagemXML & "<vRetIR>0.00</vRetIR>"
            MensagemXML = MensagemXML & "<vRetPISPASEP>0.00</vRetPISPASEP>"
            MensagemXML = MensagemXML & "<vRetCOFINS>0.00</vRetCOFINS>"
            MensagemXML = MensagemXML & "<vRetCSLL>0.00</vRetCSLL>"
            MensagemXML = MensagemXML & "<vRetINSS>0.00</vRetINSS>"
            MensagemXML = MensagemXML & "</Ret>"
            MensagemXML = MensagemXML & "<vtLiqFaturas>3000.00</vtLiqFaturas> <ISS>"
            MensagemXML = MensagemXML & "<vBCISS>3000.00</vBCISS>"
            MensagemXML = MensagemXML & "<vISS>120.00</vISS>"
            MensagemXML = MensagemXML & "</ISS>"
            MensagemXML = MensagemXML & "</total>"
            MensagemXML = MensagemXML & "<faturas>"
            MensagemXML = MensagemXML & "<fat>"
            MensagemXML = MensagemXML & "<nItem>1</nItem>"
            MensagemXML = MensagemXML & "<nFat>1</nFat>"
            MensagemXML = MensagemXML & "<dVenc>2013-04-30</dVenc>"
            MensagemXML = MensagemXML & "<vFat>3000.00</vFat>"
            MensagemXML = MensagemXML & "</fat>"
            MensagemXML = MensagemXML & "</faturas>"
            MensagemXML = MensagemXML & "<infAdicLT>4305108</infAdicLT>"
            MensagemXML = MensagemXML & "<infAdic>Esta nota é apenas um exemplo de NFS-e \s\n emitida em ambiente de homologação.</infAdic>"
            MensagemXML = MensagemXML & "</infNFSe>"
            MensagemXML = MensagemXML & "</NFS-e>"
            MensagemXML = MensagemXML & "</envioLote>"

        Case Is = "inutilizacao"
        Case Is = "obterCriticaLote"

            MensagemXML = "<pedidoStatusLote versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<cLote>13585</cLote>"
            MensagemXML = MensagemXML & "</pedidoStatusLote>"

        Case Is = "obterCriticaLoteDms"
        Case Is = "obterLoteNotaFiscal"

            MensagemXML = "<pedidoLoteNFSe versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>[CAMPO_CNPJ]</CNPJ>"
            MensagemXML = MensagemXML & "<notaInicial>[CAMPO_NOTA_INICIAL]</notaInicial>"
            MensagemXML = MensagemXML & "<notaFinal>[CAMPO_NOTA_FINAL]</notaFinal>"
            MensagemXML = MensagemXML & "<serieNotaFiscal>S</serieNotaFiscal>"
            MensagemXML = MensagemXML & "</pedidoLoteNFSe>"

        Case Is = "obterNotaFiscal"

            MensagemXML = "<pedidoNFSe versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<chvAcessoNFS-e>434945460000011990000000976482769641</chvAcessoNFS-e>"
            MensagemXML = MensagemXML & "</pedidoNFSe>"

        Case Is = "obterNotaFiscalXml"

            MensagemXML = "<pedidoNFSeXml versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<chvAcessoNFS-e>434945460000011990000000976482769641</chvAcessoNFS-e>"
            MensagemXML = MensagemXML & "</pedidoNFSeXml>"

        Case Is = "obterNotasEmPDF"

            MensagemXML = "<pedidoNFSePDF versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<chvAcessoNFS-e>434945460000011990000000976482769641</chvAcessoNFS-e>"
            MensagemXML = MensagemXML & "</pedidoNFSePDF>"

        Case Is = "obterNotasEmPNG"

            MensagemXML = "<pedidoNFSePNG versao=""1.0"">"
            MensagemXML = MensagemXML & "<CNPJ>49454600000119</CNPJ>"
            MensagemXML = MensagemXML & "<chvAcessoNFS-e>434945460000011990000000976482769641</chvAcessoNFS-e>"
            MensagemXML = MensagemXML & "</pedidoNFSePNG>"

        Case Is = "obterNumeracao"
        Case Is = "obterReciboLote"
        Case Is = "obterStatusLoteDms"

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

    Dim htmlDoc As Object, Nodo As Object, ArrayDescricao As Variant, Descricao_Servico As cls_Descricao_Servico, Url As String

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("cLCServ"))
    Set Descricao_Servico = Nothing

    Url = "https://nfse.caxias.rs.gov.br/nfse/consultaExterna/" & Dict_Xml.Item("refNF") & " " & Dict_Xml.Item("infAdic")
    'Dict_Xml.Item("cancelada") <> "N" Tag Cancelamento

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("nNFS-e")
        Set Nodo = .getElementById("data_emissao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(CDate(Dict_Xml.Item("dEmi")), "dd/mm/yyyy") & " " & Dict_Xml.Item("hEmi")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("cNFS-e")
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("TomS.CNPJ"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomS.xNome")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("ender.nro")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("ender.xLgr")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("ender.xMun")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("ender.xBairro"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("ender.CEP"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("ender.UF")
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("TomS.xEmail") Then
                    Nodo.innerHTML = Dict_Xml.Item("TomS.xEmail")
                Else
                    Nodo.innerHTML = ""
                End If
            End If
        Set Nodo = .getElementById("discriminacao_servicos_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 1, 90)
        Set Nodo = .getElementById("discriminacao_servicos_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 91, 90)
        Set Nodo = .getElementById("discriminacao_servicos_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 181, 90)
        Set Nodo = .getElementById("discriminacao_servicos_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 271, 90)
        Set Nodo = .getElementById("discriminacao_servicos_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 361, 90)
        Set Nodo = .getElementById("discriminacao_servicos_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 451, 90)
        Set Nodo = .getElementById("discriminacao_servicos_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 541, 90)
        Set Nodo = .getElementById("discriminacao_servicos_8")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("xServ"), 631, 90)
        Set Nodo = .getElementById("retencao_cofins")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vBCCOFINS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vBCCSLL"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vBCINSS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vBCRetIR"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vBCPISPASEP"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vServ"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vtLiq"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vBCISS"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("pISS"), ".", ","), 2)
        Set Nodo = .getElementById("valor_deducoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vtDed"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("desconto_incondicionado")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("vISS"), ".", ","), "R$ #,##0.00")
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

    Preecher_Template = Array(Dict_Xml.Item("TomS.CNPJ"), htmlDoc.Body.innerHTML)

End Function


*/
}
