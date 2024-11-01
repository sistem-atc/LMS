<?php

namespace App\CityHall\GeisWeb;


class GeisWeb
{
    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()
    
    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "CJR", "https://www.geisweb.net.br:443/producao/cajamar/webservice/GeisWebServiceImpl.php"  'Prefeitura Cajamar

End Sub

Public Function CancelaNfse(ByVal CNPJ As String, ByVal Numero_NF As String, ByVal Used_Companny As String) As Variant
    
    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
     
    Operacao = "CancelaNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_NF)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CancelaNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
        
End Function

Public Function ConsultaLoteRps(ByVal CNPJ As String, ByVal Numero_Lote As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_LOTE]", Numero_Lote)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaNfse(ByVal CNPJ As String, ByVal Data_Inicial As Date, ByVal Data_Final As Date, ByVal Used_Companny As String, _
                             Optional Pagina As Integer = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "DD/MM/YYYY"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "DD/MM/YYYY"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Pagina)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaRps(ByVal CNPJ As String, ByVal Data_Inicial As Date, ByVal Data_Final As Date, ByVal Used_Companny As String, _
                            Optional Pagina As Integer = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "DD/MM/YYYY"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "DD/MM/YYYY"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Pagina)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaSituacaoLoteAsync(ByVal CNPJ As String, ByVal Numero_Lote As String, ByVal Numero_Protocolo As String, _
                                          ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaSituacaoLoteAsync": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_LOTE]", Numero_Lote)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PROTOCOLO]", Numero_Protocolo)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaSituacaoLoteAsync = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function EmailNFSeTomador(ByVal CNPJ As String, ByVal Numero_NF As String, ByVal Emails_Envio As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "EmailNFSeTomador": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_NF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_EMAIL]", Emails_Envio)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    EmailNFSeTomador = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function EnviaLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "EnviaLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    EnviaLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function EnviaLoteRpsAsync(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "EnviaLoteRpsAsync": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    EnviaLoteRpsAsync = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function GeraPDFNFSe(ByVal CNPJ As String, ByVal Numero_NF As String, ByVal CNPJ_Tomador As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "GeraPDFNFSe": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_NF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TOMADOR]", CNPJ_Tomador)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    GeraPDFNFSe = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String
    
    Dim SignedXml As z_cls_WsFuncoes
    
    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant
    
    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
    
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing
    
End Function


Private Function Message_Assemble() As String
    
        Message_Assemble = "<soapenv:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:geis=""urn:https://www.geisweb.net.br/producao/cajamar/webservice/GeisWebServiceImpl.php"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<geis:[Mount_Mensage] soapenv:encodingStyle=""http://schemas.xmlsoap.org/soap/encoding/"">"
        Message_Assemble = Message_Assemble & "<[Mount_Mensage] xsi:type=""xsd:string""><![CDATA[[DadosMsg]]]></[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</geis:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"
    
End Function

Private Function Compor_MensagemXML(ByVal Tipo As String) As String
   
    Dim MensagemXML As String
   
    Select Case Tipo
   
        Case Is = "CancelaNfse"
    
             MensagemXML = "<CancelaNfse>"
             MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
             MensagemXML = MensagemXML & "<Cancela>"
             MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
             MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NUMERO_NF]</NumeroNfse>"
             MensagemXML = MensagemXML & "</Cancela>"
             MensagemXML = MensagemXML & "</CancelaNfse>"

        Case Is = "ConsultaLoteRps"
    
            MensagemXML = "<ConsultaLoteRps>"
            MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
            MensagemXML = MensagemXML & "<Consulta>"
            MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
            MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
            MensagemXML = MensagemXML & "</Consulta>"
            MensagemXML = MensagemXML & "</ConsultaLoteRps>"

        Case Is = "ConsultaNfse"
       
            MensagemXML = "<ConsultaNfse>"
            MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
            MensagemXML = MensagemXML & "<Consulta>"
            MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
            MensagemXML = MensagemXML & "<NumeroNfse/>"
            MensagemXML = MensagemXML & "<DtInicial>[CAMPO_DATA_INICIAL]</DtInicial>"
            MensagemXML = MensagemXML & "<DtFinal>[CAMPO_DATA_FINAL]</DtFinal>"
            MensagemXML = MensagemXML & "<NumeroInicial/>"
            MensagemXML = MensagemXML & "<NumeroFinal/>"
            MensagemXML = MensagemXML & "<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina>"
            MensagemXML = MensagemXML & "</Consulta>"
            MensagemXML = MensagemXML & "</ConsultaNfse>"

        Case Is = "ConsultaRps"
       
            MensagemXML = "<ConsultaRps>"
            MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
            MensagemXML = MensagemXML & "<Consulta>"
            MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
            MensagemXML = MensagemXML & "<NumeroRps/>"
            MensagemXML = MensagemXML & "<DtInicial>[CAMPO_DATA_INICIAL]</DtInicial>"
            MensagemXML = MensagemXML & "<DtFinal>[CAMPO_DATA_FINAL]</DtFinal>"
            MensagemXML = MensagemXML & "<NumeroInicial/>"
            MensagemXML = MensagemXML & "<NumeroFinal/>"
            MensagemXML = MensagemXML & "<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina>"
            MensagemXML = MensagemXML & "</Consulta>"
            MensagemXML = MensagemXML & "</ConsultaRps>"

        Case Is = "ConsultaSituacaoLoteAsync"
       
            MensagemXML = "<ConsultaSituacaoLoteAsync>"
            MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
            MensagemXML = MensagemXML & "<Consulta>"
            MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
            MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
            MensagemXML = MensagemXML & "<NumeroProtocolo>[CAMPO_NUMERO_PROTOCOLO]</NumeroProtocolo>"
            MensagemXML = MensagemXML & "</Consulta>"
            MensagemXML = MensagemXML & "</ConsultaSituacaoLoteAsync>"

        Case Is = "EmailNFSeTomador"
       
            MensagemXML = "<EmailNFSeTomador>"
            MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
            MensagemXML = MensagemXML & "<Envia>"
            MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NUMERO_NF]</NumeroNfse>"
            MensagemXML = MensagemXML & "<EmailTomador>[CAMPO_EMAIL]</EmailTomador>"
            MensagemXML = MensagemXML & "</Envia>"
            MensagemXML = MensagemXML & "</EmailNFSeTomador>"

        Case Is = "EnviaLoteRps"
       
            MensagemXML = "<EnviaLoteRps xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps.xsd"">"
            MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
            MensagemXML = MensagemXML & "<NumeroLote>1A1A</NumeroLote>"
            MensagemXML = MensagemXML & "<Rps xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps.xsd"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<NumeroRps>1</NumeroRps>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao>10/02/2020</DataEmissao>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos>10000.00</ValorServicos>"
            MensagemXML = MensagemXML & "<BaseCalculo>2.00</BaseCalculo>"
            MensagemXML = MensagemXML & "<Aliquota>2.45678</Aliquota>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<CodigoServico>101</CodigoServico>"
            MensagemXML = MensagemXML & "<TipoLancamento>P</TipoLancamento>"
            MensagemXML = MensagemXML & "<Discriminacao/>"
            MensagemXML = MensagemXML & "<MunicipioPrestacaoServico>BOTUCATU</MunicipioPrestacaoServico>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<PrestadorServico>"
            MensagemXML = MensagemXML & "<IdentificacaoPrestador>"
            MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>A</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<Regime>1</Regime>"
            MensagemXML = MensagemXML & "</IdentificacaoPrestador>"
            MensagemXML = MensagemXML & "</PrestadorServico>"
            MensagemXML = MensagemXML & "<TomadorServico>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CnpjCpf>34485304841</CnpjCpf>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial>MARCIO DE OLIVEIRA JUNQUEIRA</RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Rua>Rua Veneras Benzema</Rua>"
            MensagemXML = MensagemXML & "<Numero>888</Numero>"
            MensagemXML = MensagemXML & "<Bairro>RIBAS KOMEN</Bairro>"
            MensagemXML = MensagemXML & "<Cidade>BOTUCATU</Cidade>"
            MensagemXML = MensagemXML & "<Estado>SP</Estado>"
            MensagemXML = MensagemXML & "<Cep/>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "</TomadorServico>"
            MensagemXML = MensagemXML & "<OrgaoGerador>"
            MensagemXML = MensagemXML & "<CodigoMunicipio/>"
            MensagemXML = MensagemXML & "<Uf/>"
            MensagemXML = MensagemXML & "</OrgaoGerador>"
            MensagemXML = MensagemXML & "<OutrosImpostos>"
            MensagemXML = MensagemXML & "<Pis>1.00</Pis>"
            MensagemXML = MensagemXML & "<Cofins>11.00</Cofins>"
            MensagemXML = MensagemXML & "<Csll>111.00</Csll>"
            MensagemXML = MensagemXML & "<Irrf>1111.00</Irrf>"
            MensagemXML = MensagemXML & "<Inss>11111.11</Inss>"
            MensagemXML = MensagemXML & "</OutrosImpostos>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</EnviaLoteRps>"

        Case Is = "EnviaLoteRpsAsync"
            
            MensagemXML = "<EnviaLoteRpsAsync xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps_async.xsd"">"
            MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
            MensagemXML = MensagemXML & "<NumeroLote>1A1A</NumeroLote>"
            MensagemXML = MensagemXML & "<Rps xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps_async.xsd"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<NumeroRps>1</NumeroRps>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao>10/02/2020</DataEmissao>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos>10000.00</ValorServicos>"
            MensagemXML = MensagemXML & "<BaseCalculo>2.00</BaseCalculo>"
            MensagemXML = MensagemXML & "<Aliquota>2.45678</Aliquota>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<CodigoServico>101</CodigoServico>"
            MensagemXML = MensagemXML & "<TipoLancamento>P</TipoLancamento>"
            MensagemXML = MensagemXML & "<Discriminacao/>"
            MensagemXML = MensagemXML & "<MunicipioPrestacaoServico>BOTUCATU</MunicipioPrestacaoServico>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<PrestadorServico>"
            MensagemXML = MensagemXML & "<IdentificacaoPrestador>"
            MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>A</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<Regime>1</Regime>"
            MensagemXML = MensagemXML & "</IdentificacaoPrestador>"
            MensagemXML = MensagemXML & "</PrestadorServico>"
            MensagemXML = MensagemXML & "<TomadorServico>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CnpjCpf>34485304841</CnpjCpf>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial>MARCIO DE OLIVEIRA JUNQUEIRA</RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Rua>Rua Veneras Benzema</Rua>"
            MensagemXML = MensagemXML & "<Numero>888</Numero>"
            MensagemXML = MensagemXML & "<Bairro>RIBAS KOMEN</Bairro>"
            MensagemXML = MensagemXML & "<Cidade>BOTUCATU</Cidade>"
            MensagemXML = MensagemXML & "<Estado>SP</Estado>"
            MensagemXML = MensagemXML & "<Cep/>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "</TomadorServico>"
            MensagemXML = MensagemXML & "<OrgaoGerador>"
            MensagemXML = MensagemXML & "<CodigoMunicipio/>"
            MensagemXML = MensagemXML & "<Uf/>"
            MensagemXML = MensagemXML & "</OrgaoGerador>"
            MensagemXML = MensagemXML & "<OutrosImpostos>"
            MensagemXML = MensagemXML & "<Pis>1.00</Pis>"
            MensagemXML = MensagemXML & "<Cofins>11.00</Cofins>"
            MensagemXML = MensagemXML & "<Csll>111.00</Csll>"
            MensagemXML = MensagemXML & "<Irrf>1111.00</Irrf>"
            MensagemXML = MensagemXML & "<Inss>11111.11</Inss>"
            MensagemXML = MensagemXML & "</OutrosImpostos>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</EnviaLoteRpsAsync>"

        Case Is = "GeraPDFNFSe"
       
            MensagemXML = "<GeraPDFNFSe>"
            MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
            MensagemXML = MensagemXML & "<Baixa>"
            MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NUMERO_NF]</NumeroNfse>"
            MensagemXML = MensagemXML & "<Tomador>[CAMPO_TOMADOR]</Tomador>"
            MensagemXML = MensagemXML & "</Baixa>"
            MensagemXML = MensagemXML & "</GeraPDFNFSe>"
       
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
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("CodigoServico"))
    Set Descricao_Servico = Nothing
    
    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing
    
    Url = Dict_Xml.Item("LinkConsulta")
          
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("NumeroNfse")
        Set Nodo = .getElementById("data_emissao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("DataLancamento"), "dd/mm/yyyy hh:mm:ss")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao")
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("IdentificacaoTomador.CnpjCpf"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorServico.RazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Numero")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Rua")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("Nome Municipio")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("Endereco.Bairro"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("Endereco.Cep"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Estado")
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("Endereco.Email") Then
                    Nodo.innerHTML = Dict_Xml.Item("Endereco.Email")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("Inss"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
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
            If Not Nodo Is Nothing Then
                If Dict_Xml.Item("IssDevido") <> 0 Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("IssDevido"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("IssRetido"), ".", ","), "R$ #,##0.00")
                End If
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
    
    Preecher_Template = Array(Dict_Xml.Item("IdentificacaoTomador.CnpjCpf"), htmlDoc.Body.innerHTML)
    
End Function



}