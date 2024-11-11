<?php

namespace App\Services\Towns\IssNetOnline2;


class IssNetOnline2
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Versao_Cabecalho As String: Codigo_Cidade As String: Filial_Usada As String: End Type
Public Enum Type_Cancelamento: Erro_na_Emissao = 1: Servico_nao_prestado = 2: Duplicidade_da_nota = 4: End Enum
Dim Links_Prefeituras As Object: Private This As ClassType
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Versao_Cabecalho = Split(Links_Prefeituras.Item(Value), "|")(1): This.Codigo_Cidade = Split(Links_Prefeituras.Item(Value), "|")(2): End Property
Public Property Get Codigo_Cidade() As String: Codigo_Cidade = This.Codigo_Cidade: End Property
Public Property Get Versao_Cabecalho() As String: Versao_Cabecalho = This.Versao_Cabecalho: End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "MCP", "https://nfse.issnetonline.com.br/abrasf204/macapa/nfse.asmx|2.04|4316907" 'Prefeitura Macapá
    Links_Prefeituras.Add "BSB", "https://df.issnetonline.com.br/webservicenfse204/nfse.asmx|2.04|5300108" 'Prefeitura Brasilia
    Links_Prefeituras.Add "SMA", "https://nfse.issnetonline.com.br/abrasf204/santamaria/nfse.asmx|2.04|4316907" 'Prefeitura Santa Maria

End Sub

Public Function CancelarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_Nota As String, _
                             ByVal Motivo_Cancelamento As Type_Cancelamento, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    Dim ID_Sequencial As String

    Operacao = "CancelarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_ID_CANCELAMENTO]", ID_Sequencial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_MUNICIPIO]", This.Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CANCELAMENTO]", Motivo_Cancelamento)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarDadosCadastrais(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarDadosCadastrais": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarDadosCadastrais = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_Protocolo As String, _
                                 ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", "")
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function consultarNfsePorFaixa(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Nota_Inicial As String, _
                                      ByVal Nota_Final As String, ByVal Used_Companny As String, Optional ByVal Numero_Pagina As Long = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarNfsePorFaixa": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_FINAL]", Nota_Final)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Numero_Pagina)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfsePorFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfsePorRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_RPS As String, _
                                    ByVal Serie_RPS As String, ByVal Tipo_RPS As TypeRPS, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarNfsePorRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_RPS]", Tipo_RPS)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfseServicoPrestado(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                             ByVal Data_Final As Date, ByVal Used_Companny As String, Optional ByVal Numero_Pagina As Long = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarNfseServicoPrestado": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Numero_Pagina)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfseServicoTomado(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                           ByVal Data_Final As Date, ByVal CNPJ_Prestador As String, ByVal Inscricao_Municipal_Prestador As String, _
                                           ByVal Used_Companny As String, Optional ByVal Numero_Pagina As Long = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarNfseServicoTomado": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ_PRESTADOR]", CNPJ_Prestador)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL_PRESTADOR]", Inscricao_Municipal_Prestador)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Numero_Pagina)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoTomado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarRpsDisponivel(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_RPS As String, _
                                       ByVal Serie_RPS As String, ByVal Tipo_RPS As TypeRPS, ByVal Used_Companny As String, _
                                       Optional ByVal Numero_Pagina As Long = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarRpsDisponivel": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_RPS]", Tipo_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Numero_Pagina)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarRpsDisponivel = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarUrlNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                 ByVal Data_Final As Date, ByVal Used_Companny As String, Optional ByVal Numero_Pagina As Long = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "ConsultarUrlNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Data_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Data_Final)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Numero_Pagina)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarUrlNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function GerarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "GerarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "RecepcionarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function RecepcionarLoteRpsSincrono(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "RecepcionarLoteRpsSincrono": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function SubstituirNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String

    Operacao = "SubstituirNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble

    DadosMsg = Replace(DadosMsg, "", "")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, ByVal Operation As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        Headers.Add "SOAPAction", "http://nfse.abrasf.org.br/" & Operation

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:nfse=""http://nfse.abrasf.org.br"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/><soapenv:Body><nfse:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<nfseCabecMsg>[CabecMsg]</nfseCabecMsg><nfseDadosMsg>[DadosMsg]</nfseDadosMsg>"
    Message_Assemble = Message_Assemble & "</nfse:[Mount_Mensage]></soapenv:Body></soapenv:Envelope>"

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String

    Select Case Tipo
        Case Is = "2.04": Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd"" versao=""2.04""><versaoDados>2.04</versaoDados></cabecalho>"
    End Select

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Select Case Tipo
        Case Is = "CancelarNfse"
            Compor_MensagemXML = "<CancelarNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><InfPedidoCancelamento Id=""[CAMPO_ID_CANCELAMENTO]""><IdentificacaoNfse>"
            Compor_MensagemXML = Compor_MensagemXML & "<Numero>[CAMPO_NUMERO_NOTA]</Numero><CpfCnpj><Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal><CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</CodigoMunicipio>"
            Compor_MensagemXML = Compor_MensagemXML & "</IdentificacaoNfse><CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</CodigoCancelamento>"
            Compor_MensagemXML = Compor_MensagemXML & "</InfPedidoCancelamento></Pedido></CancelarNfseEnvio>"
        Case Is = "ConsultarDadosCadastrais"
            Compor_MensagemXML = "<ConsultarDadosCadastraisEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><Prestador>"
            Compor_MensagemXML = Compor_MensagemXML & "<CpfCnpj><Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Prestador></Pedido></ConsultarDadosCadastraisEnvio>"
        Case Is = "ConsultarLoteRps"
            Compor_MensagemXML = "<ConsultarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Prestador><CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Prestador><Protocolo>[CAMPO_PROTOCOLO]</Protocolo></ConsultarLoteRpsEnvio>"
        Case Is = "ConsultarNfsePorFaixa"
            Compor_MensagemXML = "<ConsultarNfseFaixaEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><Prestador><CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Prestador><Faixa><NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</NumeroNfseInicial>"
            Compor_MensagemXML = Compor_MensagemXML & "<NumeroNfseFinal>[CAMPO_NOTA_FINAL]</NumeroNfseFinal></Faixa>"
            Compor_MensagemXML = Compor_MensagemXML & "<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina></Pedido></ConsultarNfseFaixaEnvio>"
        Case Is = "ConsultarNfsePorRps"
            Compor_MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><IdentificacaoRps>"
            Compor_MensagemXML = Compor_MensagemXML & "<Numero>[CAMPO_NUMERO_RPS]</Numero><Serie>[CAMPO_SERIE_RPS]</Serie><Tipo>[CAMPO_TIPO_RPS]</Tipo>"
            Compor_MensagemXML = Compor_MensagemXML & "</IdentificacaoRps><Prestador><CpfCnpj><Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal></Prestador>"
            Compor_MensagemXML = Compor_MensagemXML & "</Pedido></ConsultarNfseRpsEnvio>"
        Case Is = "ConsultarNfseServicoPrestado"
            Compor_MensagemXML = "<ConsultarNfseServicoPrestadoEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><Prestador>"
            Compor_MensagemXML = Compor_MensagemXML & "<CpfCnpj><Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Prestador><PeriodoEmissao><DataInicial>[CAMPO_DATA_INICIAL]</DataInicial><DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            Compor_MensagemXML = Compor_MensagemXML & "</PeriodoEmissao><Pagina>[CAMPO_NUMERO_PAGINA]</Pagina></Pedido></ConsultarNfseServicoPrestadoEnvio>"
        Case Is = "ConsultarNfseServicoTomado"
            Compor_MensagemXML = ""
            Compor_MensagemXML = Compor_MensagemXML & "<ConsultarNfseServicoTomadoEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><Consulente><CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Consulente><PeriodoEmissao><DataInicial>[CAMPO_DATA_INICIAL]</DataInicial><DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            Compor_MensagemXML = Compor_MensagemXML & "</PeriodoEmissao><Prestador><CpfCnpj><Cnpj>[CAMPO_CNPJ_PRESTADOR]</Cnpj></CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL_PRESTADOR]</InscricaoMunicipal></Prestador><Tomador>"
            Compor_MensagemXML = Compor_MensagemXML & "<CpfCnpj><Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Tomador><Pagina>[CAMPO_NUMERO_PAGINA]</Pagina></Pedido></ConsultarNfseServicoTomadoEnvio>"
        Case Is = "ConsultarRpsDisponivel"
            Compor_MensagemXML = "<ConsultarRpsDisponivelEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><Prestador><CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Prestador><IdentificacaoRps><Numero>[CAMPO_NUMERO_RPS]</Numero><Serie>[CAMPO_SERIE_RPS]</Serie>"
            Compor_MensagemXML = Compor_MensagemXML & "<Tipo>[CAMPO_TIPO_RPS]</Tipo></IdentificacaoRps><Pagina>[CAMPO_NUMERO_PAGINA]</Pagina></Pedido></ConsultarRpsDisponivelEnvio>"
        Case Is = "ConsultarUrlNfse"
            Compor_MensagemXML = "<ConsultarUrlNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd""><Pedido><Prestador><CpfCnpj>"
            Compor_MensagemXML = Compor_MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj></CpfCnpj><InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            Compor_MensagemXML = Compor_MensagemXML & "</Prestador><PeriodoEmissao><DataInicial>[CAMPO_DATA_INICIAL]</DataInicial><DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            Compor_MensagemXML = Compor_MensagemXML & "</PeriodoEmissao><Pagina>[CAMPO_NUMERO_PAGINA]</Pagina></Pedido></ConsultarUrlNfseEnvio>"
        Case Is = "GerarNfse"
'            Compor_MensagemXML = ""
'<GerarNfseEnvio xmlns="http://www.abrasf.org.br/nfse.xsd">
'<Rps>
'<InfDeclaracaoPrestacaoServico>
'<!--  Representa dados informativos do Recibo Provisório de Serviço (RPS)  -->
'<Rps>
'<IdentificacaoRps>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</IdentificacaoRps>
'<!--  Data de emissão do RPS. Formato:(AAAA-MM-DD)  -->
'<DataEmissao>?</DataEmissao>
'<!--  Situação do RPS (1 – Normal ou 2 – Cancelado)  -->
'<Status>?</Status>
'<!--  IDENTIFICAÇÃO DO RPS SUBSTITUÍDO (OPCIONAL)  -->
'<RpsSubstituido>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</RpsSubstituido>
'</Rps>
'<!--  Dia, mês e ano da prestação de serviço. Formato: (AAAA-MM-DD)  -->
'<Competencia>?</Competencia>
'<Servico>
'<Valores>
'<!--  Valor dos serviços em R$  -->
'<ValorServicos>?</ValorServicos>
'<!--  Valor das deduções para Redução da Base de Cálculo em R$  -->
'<ValorDeducoes>?</ValorDeducoes>
'<!--  Valor da retenção do PIS em R$ Informação declaratória  -->
'<ValorPis>?</ValorPis>
'<!--  Valor da retenção do COFINS em R$ Informação declaratória  -->
'<ValorCofins>?</ValorCofins>
'<!--  Valor da retenção do INSS em R$ Informação declaratória  -->
'<ValorInss>?</ValorInss>
'<!--  Valor da retenção do IR em R$ Informação declaratória  -->
'<ValorIr>?</ValorIr>
'<!--  Valor da retenção do CSLL em R$ Informação declaratória  -->
'<ValorCsll>?</ValorCsll>
'<!--  Outras retenções na Fonte. Informação declaratória  -->
'<OutrasRetencoes>?</OutrasRetencoes>
'<!--  Valor total aproximado dos tributos federais, estaduais e municipais, em conformidade com o artigo 1o da Lei no 12.741/2012  -->
'<ValTotTributos>?</ValTotTributos>
'<!--  Valor do ISS devido em R$  -->
'<ValorIss>?</ValorIss>
'<!--  Alíquota do serviço prestado  -->
'<Aliquota>?</Aliquota>
'<!--  Valor do desconto incondicionado  -->
'<DescontoIncondicionado>?</DescontoIncondicionado>
'<!--  Valor do desconto condicionado  -->
'<DescontoCondicionado>?</DescontoCondicionado>
'</Valores>
'<!--  ISS é retido na fonte
'                1 – Sim;
'                2 – Não.  -->
'<IssRetido>?</IssRetido>
'<!--  Informado somente se IssRetido igual a "1 – Sim".
'                A opção "2 – Intermediário" somente poderá ser selecionada se "CpfCnpjIntermediario" informado.
'                1 – Tomador;
'                2 – Intermediário.  -->
'<ResponsavelRetencao>?</ResponsavelRetencao>
'<!--  Subitem do serviço prestado conforme LC 116/2003. Formato NN.NN  -->
'<ItemListaServico>?</ItemListaServico>
'<!--  Código CNAE  -->
'<CodigoCnae>?</CodigoCnae>
'<!--  Código do serviço prestado próprio do município  -->
'<CodigoTributacaoMunicipio>?</CodigoTributacaoMunicipio>
'<!--  CodigoNbs  -->
'<CodigoNbs>?</CodigoNbs>
'<!--  Discriminação dos serviços.  -->
'<Discriminacao>?</Discriminacao>
'<!--  Código do município onde o serviço foi prestado (tabela do IBGE), se exterior colocar 9999999  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Código do país onde o serviço foi prestado (Tabela de país do IBGE). Preencher somente se MunicipioPrestacaoServico igual 9999999  -->
'<CodigoPais>?</CodigoPais>
'<!--  Exigibilidades possíveis
'                1 – Exigível;
'                2 – Não incidência;
'                3 – Isenção;
'                4 – Exportação;
'                5 – Imunidade;
'                6 – Exigibilidade Suspensa por Decisão Judicial;
'                7 – Exigibilidade Suspensa por Processo Administrativo. -->
'<ExigibilidadeISS>?</ExigibilidadeISS>
'<!--  Identificação da não exigibilidade do ISSQN – somente para os casos de benefício fiscal  -->
'<IdentifNaoExigibilidade>?</IdentifNaoExigibilidade>
'<!--  Código do município onde é a incidência do imposto (Tabela do IBGE)  -->
'<MunicipioIncidencia>?</MunicipioIncidencia>
'<!--  Número do processo da suspensão da exigibilidade  -->
'<NumeroProcesso>?</NumeroProcesso>
'</Servico>
'<!--  Identificação do prestador do serviço  -->
'<Prestador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do prestador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</Prestador>
'<!--  Dados do tomador do serviço  -->
'<TomadorServico>
'<IdentificacaoTomador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do tomador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoTomador>
'<!--  Este elemento só deverá ser preenchido para tomadores não residentes no Brasil  -->
'<NifTomador>?</NifTomador>
'<!--  Nome / Razão Social do tomador. -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Informar apenas uma das Tags. Ou tag Endereco ou Tag EnderecoExterior.  -->
'<!--  Endereço de tomador de serviços do Brasil  -->
'<Endereco>
'<!--  Tipo e nome do logradouro do tomador do serviço  -->
'<Endereco>?</Endereco>
'<!--  Número do imóvel do tomador do serviço  -->
'<Numero>?</Numero>
'<!--  Complemento do endereço do tomador do serviço (Opcional)  -->
'<Complemento>?</Complemento>
'<!--  Bairro do tomador do serviço  -->
'<Bairro>?</Bairro>
'<!--  Código do município do tomador do serviço (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Sigla da unidade da federação do tomador do serviço  -->
'<Uf>?</Uf>
'<!--  Número do CEP do tomador do serviço  -->
'<Cep>?</Cep>
'</Endereco>
'<!--  Endereço de tomador de serviços do exterior  -->
'<EnderecoExterior>
'<!--  Código do país do tomador do serviço (Tabela do de país do IBGE). -->
'<CodigoPais>?</CodigoPais>
'<!--  Descrição completa do endereço do exterior  -->
'<EnderecoCompletoExterior>?</EnderecoCompletoExterior>
'</EnderecoExterior>
'<!--  Opcional  -->
'<Contato>
'<!--  Número do telefone do tomador (Opcional)  -->
'<Telefone>?</Telefone>
'<!--  E-mail do tomador (Opcional)  -->
'<Email>?</Email>
'</Contato>
'</TomadorServico>
'<Intermediario>
'<IdentificacaoIntermediario>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do intermediário de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoIntermediario>
'<!--  Nome ou Razão Social de intermediário do serviço  -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Código do município onde o intermediário está estabelecido (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'</Intermediario>
'<ConstrucaoCivil>
'<!--  Número de identificação da obra. Tamanho máximo 30.  -->
'<CodigoObra>?</CodigoObra>
'<!--  Número da ART. Tamanho máximo 30.  -->
'<Art>?</Art>
'</ConstrucaoCivil>
'<!--  Tipos de Regimes especiais:
'            1 – Microempresa Municipal;
'            2 – Estimativa;
'            3 – Sociedade de Profissionais;
'            4 – Cooperativa;
'            5 – Microempresário Individual (MEI);
'            6 – Microempresa ou Empresa de Pequeno Porte (ME EPP).  -->
'<RegimeEspecialTributacao>?</RegimeEspecialTributacao>
'<!-- Prestador é optante pelo Simples Nacional:
'            1 – Sim;
'            2 – Não . -->
'<OptanteSimplesNacional>?</OptanteSimplesNacional>
'<!-- Prestador possui Incentivo Fiscal:
'            1 – Sim;
'            2 – Não. -->
'<IncentivoFiscal>?</IncentivoFiscal>
'<!--  Opcional  -->
'<Evento>
'<!--  Identificação do evento (Obrigatório se DescricaoEvento não informado)  -->
'<IdentificacaoEvento>?</IdentificacaoEvento>
'<!--  Descrição do evento (Obrigatório se IdentificacaoEvento não informado)  -->
'<DescricaoEvento>?</DescricaoEvento>
'</Evento>
'<InformacoesComplementares>?</InformacoesComplementares>
'<Deducao>
'<!--  Identificação da dedução
'                1 – Materiais;
'                2 – Subempreitada de mão de obra;
'                3 – Serviços;
'                4 – Produção externa;
'                5 – Alimentação e bebidas/frigobar;
'                6 – Reembolso de despesas;
'                7 – Repasse consorciado;
'                8 – Repasse plano de saúde
'                99 – Outras deduções  -->
'<TipoDeducao>?</TipoDeducao>
'<!--  Informar o tipo da dedução no caso da opção 99 – Outras Deduções  -->
'<DescricaoDeducao>?</DescricaoDeducao>
'<IdentificacaoDocumentoDeducao>
'<IdentificacaoNfse>
'<!--  Município de geração da NFS-e  -->
'<CodigoMunicipioGerador>?</CodigoMunicipioGerador>
'<!--  Número da NFS-e  -->
'<NumeroNfse>?</NumeroNfse>
'<!--  Código de verificação da NFS-e  -->
'<CodigoVerificacao>?</CodigoVerificacao>
'</IdentificacaoNfse>
'<IdentificacaoNfe>
'<!--  Número da NF-e  -->
'<NumeroNfe>?</NumeroNfe>
'<!--  Estado de geração da NF-e  -->
'<UfNfe>?</UfNfe>
'<!--  Chave da NF-e  -->
'<ChaveAcessoNfe>?</ChaveAcessoNfe>
'</IdentificacaoNfe>
'<OutroDocumento>
'<!--  Identificação de documento diferente de NFS-e e NF-e  -->
'<IdentificacaoDocumento>?</IdentificacaoDocumento>
'</OutroDocumento>
'</IdentificacaoDocumentoDeducao>
'<DadosFornecedor>
'<IdentificacaoFornecedor>
'<!--  CNPJ ou CPF do fornecedor do Brasil.  -->
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'</IdentificacaoFornecedor>
'<FornecedorExterior>
'<!--  NIF do fornecedor do exterior  -->
'<NifFornecedor>?</NifFornecedor>
'<!--  Código do país do fornecedor do exterior  -->
'<CodigoPais>?</CodigoPais>
'</FornecedorExterior>
'</DadosFornecedor>
'<!--  Data de Emissão do Documento Fiscal  -->
'<DataEmissao>?</DataEmissao>
'<!--  Valor dedutível do documento fiscal  -->
'<ValorDedutivel>?</ValorDedutivel>
'<!--  Valor utilizado na dedução da NFS-e. Deve ser menor ou igual ao ValorDedutivel.  -->
'<ValorUtilizadoDeducao>?</ValorUtilizadoDeducao>
'</Deducao>
'</InfDeclaracaoPrestacaoServico>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</Rps>
'</GerarNfseEnvio>
        Case Is = "RecepcionarLoteRps"
'            Compor_MensagemXML = ""
'            <EnviarLoteRpsEnvio xmlns="http://www.abrasf.org.br/nfse.xsd">
'<LoteRps Id="lote01" versao="2.04">
'<!--  Número do Lote de RPS. Ocorrência 1-1. Numérico de tamanho máximo 15 -->
'<NumeroLote>?</NumeroLote>
'<!--  CNPJ ou CPF do prestador/ Inscrição municipal do prestador. Ocorrência 1-1.  -->
'<Prestador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</Prestador>
'<!--  Quantidade de RPS do Lote. Numérico de tamanho máximo 4.   -->
'<QuantidadeRps>?</QuantidadeRps>
'<!--  Dados dos RPSs. Ocorrência 1-N.  -->
'<ListaRps>
'<Rps>
'<InfDeclaracaoPrestacaoServico>
'<!--  Representa dados informativos do Recibo Provisório de Serviço (RPS)  -->
'<Rps>
'<IdentificacaoRps>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</IdentificacaoRps>
'<!--  Data de emissão do RPS. Formato:(AAAA-MM-DD)  -->
'<DataEmissao>?</DataEmissao>
'<!--  Situação do RPS (1 – Normal ou 2 – Cancelado)  -->
'<Status>?</Status>
'<!--  IDENTIFICAÇÃO DO RPS SUBSTITUÍDO (OPCIONAL)  -->
'<RpsSubstituido>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</RpsSubstituido>
'</Rps>
'<!--  Dia, mês e ano da prestação de serviço. Formato: (AAAA-MM-DD)  -->
'<Competencia>?</Competencia>
'<Servico>
'<Valores>
'<!--  Valor dos serviços em R$  -->
'<ValorServicos>?</ValorServicos>
'<!--  Valor das deduções para Redução da Base de Cálculo em R$  -->
'<ValorDeducoes>?</ValorDeducoes>
'<!--  Valor da retenção do PIS em R$ Informação declaratória  -->
'<ValorPis>?</ValorPis>
'<!--  Valor da retenção do COFINS em R$ Informação declaratória  -->
'<ValorCofins>?</ValorCofins>
'<!--  Valor da retenção do INSS em R$ Informação declaratória  -->
'<ValorInss>?</ValorInss>
'<!--  Valor da retenção do IR em R$ Informação declaratória  -->
'<ValorIr>?</ValorIr>
'<!--  Valor da retenção do CSLL em R$ Informação declaratória  -->
'<ValorCsll>?</ValorCsll>
'<!--  Outras retenções na Fonte. Informação declaratória  -->
'<OutrasRetencoes>?</OutrasRetencoes>
'<!--  Valor total aproximado dos tributos federais, estaduais e municipais, em conformidade com o artigo 1o da Lei no 12.741/2012  -->
'<ValTotTributos>?</ValTotTributos>
'<!--  Valor do ISS devido em R$  -->
'<ValorIss>?</ValorIss>
'<!--  Alíquota do serviço prestado  -->
'<Aliquota>?</Aliquota>
'<!--  Valor do desconto incondicionado  -->
'<DescontoIncondicionado>?</DescontoIncondicionado>
'<!--  Valor do desconto condicionado  -->
'<DescontoCondicionado>?</DescontoCondicionado>
'</Valores>
'<!--  ISS é retido na fonte
'                        1 – Sim;
'                        2 – Não.  -->
'<IssRetido>?</IssRetido>
'<!--  Informado somente se IssRetido igual a "1 – Sim".
'                        A opção "2 – Intermediário" somente poderá ser selecionada se "CpfCnpjIntermediario" informado.
'                        1 – Tomador;
'                        2 – Intermediário.  -->
'<ResponsavelRetencao>?</ResponsavelRetencao>
'<!--  Subitem do serviço prestado conforme LC 116/2003. Formato NN.NN  -->
'<ItemListaServico>?</ItemListaServico>
'<!--  Código CNAE  -->
'<CodigoCnae>?</CodigoCnae>
'<!--  Código do serviço prestado próprio do município  -->
'<CodigoTributacaoMunicipio>?</CodigoTributacaoMunicipio>
'<!--  CodigoNbs  -->
'<CodigoNbs>?</CodigoNbs>
'<!--  Discriminação dos serviços.  -->
'<Discriminacao>?</Discriminacao>
'<!--  Código do município onde o serviço foi prestado (tabela do IBGE), se exterior colocar 9999999  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Código do país onde o serviço foi prestado (Tabela de país do IBGE). Preencher somente se MunicipioPrestacaoServico igual 9999999  -->
'<CodigoPais>?</CodigoPais>
'<!--  Exigibilidades possíveis
'                        1 – Exigível;
'                        2 – Não incidência;
'                        3 – Isenção;
'                        4 – Exportação;
'                        5 – Imunidade;
'                        6 – Exigibilidade Suspensa por Decisão Judicial;
'                        7 – Exigibilidade Suspensa por Processo Administrativo. -->
'<ExigibilidadeISS>?</ExigibilidadeISS>
'<!--  Identificação da não exigibilidade do ISSQN – somente para os casos de benefício fiscal  -->
'<IdentifNaoExigibilidade>?</IdentifNaoExigibilidade>
'<!--  Código do município onde é a incidência do imposto (Tabela do IBGE)  -->
'<MunicipioIncidencia>?</MunicipioIncidencia>
'<!--  Número do processo da suspensão da exigibilidade  -->
'<NumeroProcesso>?</NumeroProcesso>
'</Servico>
'<!--  Identificação do prestador do serviço  -->
'<Prestador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do prestador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</Prestador>
'<!--  Dados do tomador do serviço  -->
'<TomadorServico>
'<IdentificacaoTomador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do tomador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoTomador>
'<!--  Este elemento só deverá ser preenchido para tomadores não residentes no Brasil  -->
'<NifTomador>?</NifTomador>
'<!--  Nome / Razão Social do tomador. -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Informar apenas uma das Tags. Ou tag Endereco ou Tag EnderecoExterior.  -->
'<!--  Endereço de tomador de serviços do Brasil  -->
'<Endereco>
'<!--  Tipo e nome do logradouro do tomador do serviço  -->
'<Endereco>?</Endereco>
'<!--  Número do imóvel do tomador do serviço  -->
'<Numero>?</Numero>
'<!--  Complemento do endereço do tomador do serviço (Opcional)  -->
'<Complemento>?</Complemento>
'<!--  Bairro do tomador do serviço  -->
'<Bairro>?</Bairro>
'<!--  Código do município do tomador do serviço (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Sigla da unidade da federação do tomador do serviço  -->
'<Uf>?</Uf>
'<!--  Número do CEP do tomador do serviço  -->
'<Cep>?</Cep>
'</Endereco>
'<!--  Endereço de tomador de serviços do exterior  -->
'<EnderecoExterior>
'<!--  Código do país do tomador do serviço (Tabela do de país do IBGE). -->
'<CodigoPais>?</CodigoPais>
'<!--  Descrição completa do endereço do exterior  -->
'<EnderecoCompletoExterior>?</EnderecoCompletoExterior>
'</EnderecoExterior>
'<!--  Opcional  -->
'<Contato>
'<!--  Número do telefone do tomador (Opcional)  -->
'<Telefone>?</Telefone>
'<!--  E-mail do tomador (Opcional)  -->
'<Email>?</Email>
'</Contato>
'</TomadorServico>
'<Intermediario>
'<IdentificacaoIntermediario>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do intermediário de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoIntermediario>
'<!--  Nome ou Razão Social de intermediário do serviço  -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Código do município onde o intermediário está estabelecido (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'</Intermediario>
'<ConstrucaoCivil>
'<!--  Número de identificação da obra. Tamanho máximo 30.  -->
'<CodigoObra>?</CodigoObra>
'<!--  Número da ART. Tamanho máximo 30.  -->
'<Art>?</Art>
'</ConstrucaoCivil>
'<!--  Tipos de Regimes especiais:
'                    1 – Microempresa Municipal;
'                    2 – Estimativa;
'                    3 – Sociedade de Profissionais;
'                    4 – Cooperativa;
'                    5 – Microempresário Individual (MEI);
'                    6 – Microempresa ou Empresa de Pequeno Porte (ME EPP).  -->
'<RegimeEspecialTributacao>?</RegimeEspecialTributacao>
'<!-- Prestador é optante pelo Simples Nacional:
'                    1 – Sim;
'                    2 – Não . -->
'<OptanteSimplesNacional>?</OptanteSimplesNacional>
'<!-- Prestador possui Incentivo Fiscal:
'                    1 – Sim;
'                    2 – Não. -->
'<IncentivoFiscal>?</IncentivoFiscal>
'<!--  Opcional  -->
'<Evento>
'<!--  Identificação do evento (Obrigatório se DescricaoEvento não informado)  -->
'<IdentificacaoEvento>?</IdentificacaoEvento>
'<!--  Descrição do evento (Obrigatório se IdentificacaoEvento não informado)  -->
'<DescricaoEvento>?</DescricaoEvento>
'</Evento>
'<InformacoesComplementares>?</InformacoesComplementares>
'<Deducao>
'<!--  Identificação da dedução
'                        1 – Materiais;
'                        2 – Subempreitada de mão de obra;
'                        3 – Serviços;
'                        4 – Produção externa;
'                        5 – Alimentação e bebidas/frigobar;
'                        6 – Reembolso de despesas;
'                        7 – Repasse consorciado;
'                        8 – Repasse plano de saúde
'                        99 – Outras deduções  -->
'<TipoDeducao>?</TipoDeducao>
'<!--  Informar o tipo da dedução no caso da opção 99 – Outras Deduções  -->
'<DescricaoDeducao>?</DescricaoDeducao>
'<IdentificacaoDocumentoDeducao>
'<IdentificacaoNfse>
'<!--  Município de geração da NFS-e  -->
'<CodigoMunicipioGerador>?</CodigoMunicipioGerador>
'<!--  Número da NFS-e  -->
'<NumeroNfse>?</NumeroNfse>
'<!--  Código de verificação da NFS-e  -->
'<CodigoVerificacao>?</CodigoVerificacao>
'</IdentificacaoNfse>
'<IdentificacaoNfe>
'<!--  Número da NF-e  -->
'<NumeroNfe>?</NumeroNfe>
'<!--  Estado de geração da NF-e  -->
'<UfNfe>?</UfNfe>
'<!--  Chave da NF-e  -->
'<ChaveAcessoNfe>?</ChaveAcessoNfe>
'</IdentificacaoNfe>
'<OutroDocumento>
'<!--  Identificação de documento diferente de NFS-e e NF-e  -->
'<IdentificacaoDocumento>?</IdentificacaoDocumento>
'</OutroDocumento>
'</IdentificacaoDocumentoDeducao>
'<DadosFornecedor>
'<IdentificacaoFornecedor>
'<!--  CNPJ ou CPF do fornecedor do Brasil.  -->
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'</IdentificacaoFornecedor>
'<FornecedorExterior>
'<!--  NIF do fornecedor do exterior  -->
'<NifFornecedor>?</NifFornecedor>
'<!--  Código do país do fornecedor do exterior  -->
'<CodigoPais>?</CodigoPais>
'</FornecedorExterior>
'</DadosFornecedor>
'<!--  Data de Emissão do Documento Fiscal  -->
'<DataEmissao>?</DataEmissao>
'<!--  Valor dedutível do documento fiscal  -->
'<ValorDedutivel>?</ValorDedutivel>
'<!--  Valor utilizado na dedução da NFS-e. Deve ser menor ou igual ao ValorDedutivel.  -->
'<ValorUtilizadoDeducao>?</ValorUtilizadoDeducao>
'</Deducao>
'</InfDeclaracaoPrestacaoServico>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</Rps>
'<Rps>
'<InfDeclaracaoPrestacaoServico>
'<!--  Representa dados informativos do Recibo Provisório de Serviço (RPS)  -->
'<Rps>
'<IdentificacaoRps>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</IdentificacaoRps>
'<!--  Data de emissão do RPS. Formato:(AAAA-MM-DD)  -->
'<DataEmissao>?</DataEmissao>
'<!--  Situação do RPS (1 – Normal ou 2 – Cancelado)  -->
'<Status>?</Status>
'<!--  IDENTIFICAÇÃO DO RPS SUBSTITUÍDO (OPCIONAL)  -->
'<RpsSubstituido>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</RpsSubstituido>
'</Rps>
'<!--  Dia, mês e ano da prestação de serviço. Formato: (AAAA-MM-DD)  -->
'<Competencia>?</Competencia>
'<Servico>
'<Valores>
'<!--  Valor dos serviços em R$  -->
'<ValorServicos>?</ValorServicos>
'<!--  Valor das deduções para Redução da Base de Cálculo em R$  -->
'<ValorDeducoes>?</ValorDeducoes>
'<!--  Valor da retenção do PIS em R$ Informação declaratória  -->
'<ValorPis>?</ValorPis>
'<!--  Valor da retenção do COFINS em R$ Informação declaratória  -->
'<ValorCofins>?</ValorCofins>
'<!--  Valor da retenção do INSS em R$ Informação declaratória  -->
'<ValorInss>?</ValorInss>
'<!--  Valor da retenção do IR em R$ Informação declaratória  -->
'<ValorIr>?</ValorIr>
'<!--  Valor da retenção do CSLL em R$ Informação declaratória  -->
'<ValorCsll>?</ValorCsll>
'<!--  Outras retenções na Fonte. Informação declaratória  -->
'<OutrasRetencoes>?</OutrasRetencoes>
'<!--  Valor total aproximado dos tributos federais, estaduais e municipais, em conformidade com o artigo 1o da Lei no 12.741/2012  -->
'<ValTotTributos>?</ValTotTributos>
'<!--  Valor do ISS devido em R$  -->
'<ValorIss>?</ValorIss>
'<!--  Alíquota do serviço prestado  -->
'<Aliquota>?</Aliquota>
'<!--  Valor do desconto incondicionado  -->
'<DescontoIncondicionado>?</DescontoIncondicionado>
'<!--  Valor do desconto condicionado  -->
'<DescontoCondicionado>?</DescontoCondicionado>
'</Valores>
'<!--  ISS é retido na fonte
'                        1 – Sim;
'                        2 – Não.  -->
'<IssRetido>?</IssRetido>
'<!--  Informado somente se IssRetido igual a "1 – Sim".
'                        A opção "2 – Intermediário" somente poderá ser selecionada se "CpfCnpjIntermediario" informado.
'                        1 – Tomador;
'                        2 – Intermediário.  -->
'<ResponsavelRetencao>?</ResponsavelRetencao>
'<!--  Subitem do serviço prestado conforme LC 116/2003. Formato NN.NN  -->
'<ItemListaServico>?</ItemListaServico>
'<!--  Código CNAE  -->
'<CodigoCnae>?</CodigoCnae>
'<!--  Código do serviço prestado próprio do município  -->
'<CodigoTributacaoMunicipio>?</CodigoTributacaoMunicipio>
'<!--  CodigoNbs  -->
'<CodigoNbs>?</CodigoNbs>
'<!--  Discriminação dos serviços.  -->
'<Discriminacao>?</Discriminacao>
'<!--  Código do município onde o serviço foi prestado (tabela do IBGE), se exterior colocar 9999999  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Código do país onde o serviço foi prestado (Tabela de país do IBGE). Preencher somente se MunicipioPrestacaoServico igual 9999999  -->
'<CodigoPais>?</CodigoPais>
'<!--  Exigibilidades possíveis
'                        1 – Exigível;
'                        2 – Não incidência;
'                        3 – Isenção;
'                        4 – Exportação;
'                        5 – Imunidade;
'                        6 – Exigibilidade Suspensa por Decisão Judicial;
'                        7 – Exigibilidade Suspensa por Processo Administrativo. -->
'<ExigibilidadeISS>?</ExigibilidadeISS>
'<!--  Identificação da não exigibilidade do ISSQN – somente para os casos de benefício fiscal  -->
'<IdentifNaoExigibilidade>?</IdentifNaoExigibilidade>
'<!--  Código do município onde é a incidência do imposto (Tabela do IBGE)  -->
'<MunicipioIncidencia>?</MunicipioIncidencia>
'<!--  Número do processo da suspensão da exigibilidade  -->
'<NumeroProcesso>?</NumeroProcesso>
'</Servico>
'<!--  Identificação do prestador do serviço  -->
'<Prestador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do prestador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</Prestador>
'<!--  Dados do tomador do serviço  -->
'<TomadorServico>
'<IdentificacaoTomador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do tomador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoTomador>
'<!--  Este elemento só deverá ser preenchido para tomadores não residentes no Brasil  -->
'<NifTomador>?</NifTomador>
'<!--  Nome / Razão Social do tomador. -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Informar apenas uma das Tags. Ou tag Endereco ou Tag EnderecoExterior.  -->
'<!--  Endereço de tomador de serviços do Brasil  -->
'<Endereco>
'<!--  Tipo e nome do logradouro do tomador do serviço  -->
'<Endereco>?</Endereco>
'<!--  Número do imóvel do tomador do serviço  -->
'<Numero>?</Numero>
'<!--  Complemento do endereço do tomador do serviço (Opcional)  -->
'<Complemento>?</Complemento>
'<!--  Bairro do tomador do serviço  -->
'<Bairro>?</Bairro>
'<!--  Código do município do tomador do serviço (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Sigla da unidade da federação do tomador do serviço  -->
'<Uf>?</Uf>
'<!--  Número do CEP do tomador do serviço  -->
'<Cep>?</Cep>
'</Endereco>
'<!--  Endereço de tomador de serviços do exterior  -->
'<EnderecoExterior>
'<!--  Código do país do tomador do serviço (Tabela do de país do IBGE). -->
'<CodigoPais>?</CodigoPais>
'<!--  Descrição completa do endereço do exterior  -->
'<EnderecoCompletoExterior>?</EnderecoCompletoExterior>
'</EnderecoExterior>
'<!--  Opcional  -->
'<Contato>
'<!--  Número do telefone do tomador (Opcional)  -->
'<Telefone>?</Telefone>
'<!--  E-mail do tomador (Opcional)  -->
'<Email>?</Email>
'</Contato>
'</TomadorServico>
'<Intermediario>
'<IdentificacaoIntermediario>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do intermediário de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoIntermediario>
'<!--  Nome ou Razão Social de intermediário do serviço  -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Código do município onde o intermediário está estabelecido (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'</Intermediario>
'<ConstrucaoCivil>
'<!--  Número de identificação da obra. Tamanho máximo 30.  -->
'<CodigoObra>?</CodigoObra>
'<!--  Número da ART. Tamanho máximo 30.  -->
'<Art>?</Art>
'</ConstrucaoCivil>
'<!--  Tipos de Regimes especiais:
'                    1 – Microempresa Municipal;
'                    2 – Estimativa;
'                    3 – Sociedade de Profissionais;
'                    4 – Cooperativa;
'                    5 – Microempresário Individual (MEI);
'                    6 – Microempresa ou Empresa de Pequeno Porte (ME EPP).  -->
'<RegimeEspecialTributacao>?</RegimeEspecialTributacao>
'<!-- Prestador é optante pelo Simples Nacional:
'                    1 – Sim;
'                    2 – Não . -->
'<OptanteSimplesNacional>?</OptanteSimplesNacional>
'<!-- Prestador possui Incentivo Fiscal:
'                    1 – Sim;
'                    2 – Não. -->
'<IncentivoFiscal>?</IncentivoFiscal>
'<!--  Opcional  -->
'<Evento>
'<!--  Identificação do evento (Obrigatório se DescricaoEvento não informado)  -->
'<IdentificacaoEvento>?</IdentificacaoEvento>
'<!--  Descrição do evento (Obrigatório se IdentificacaoEvento não informado)  -->
'<DescricaoEvento>?</DescricaoEvento>
'</Evento>
'<InformacoesComplementares>?</InformacoesComplementares>
'<Deducao>
'<!--  Identificação da dedução
'                        1 – Materiais;
'                        2 – Subempreitada de mão de obra;
'                        3 – Serviços;
'                        4 – Produção externa;
'                        5 – Alimentação e bebidas/frigobar;
'                        6 – Reembolso de despesas;
'                        7 – Repasse consorciado;
'                        8 – Repasse plano de saúde
'                        99 – Outras deduções  -->
'<TipoDeducao>?</TipoDeducao>
'<!--  Informar o tipo da dedução no caso da opção 99 – Outras Deduções  -->
'<DescricaoDeducao>?</DescricaoDeducao>
'<IdentificacaoDocumentoDeducao>
'<IdentificacaoNfse>
'<!--  Município de geração da NFS-e  -->
'<CodigoMunicipioGerador>?</CodigoMunicipioGerador>
'<!--  Número da NFS-e  -->
'<NumeroNfse>?</NumeroNfse>
'<!--  Código de verificação da NFS-e  -->
'<CodigoVerificacao>?</CodigoVerificacao>
'</IdentificacaoNfse>
'<IdentificacaoNfe>
'<!--  Número da NF-e  -->
'<NumeroNfe>?</NumeroNfe>
'<!--  Estado de geração da NF-e  -->
'<UfNfe>?</UfNfe>
'<!--  Chave da NF-e  -->
'<ChaveAcessoNfe>?</ChaveAcessoNfe>
'</IdentificacaoNfe>
'<OutroDocumento>
'<!--  Identificação de documento diferente de NFS-e e NF-e  -->
'<IdentificacaoDocumento>?</IdentificacaoDocumento>
'</OutroDocumento>
'</IdentificacaoDocumentoDeducao>
'<DadosFornecedor>
'<IdentificacaoFornecedor>
'<!--  CNPJ ou CPF do fornecedor do Brasil.  -->
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'</IdentificacaoFornecedor>
'<FornecedorExterior>
'<!--  NIF do fornecedor do exterior  -->
'<NifFornecedor>?</NifFornecedor>
'<!--  Código do país do fornecedor do exterior  -->
'<CodigoPais>?</CodigoPais>
'</FornecedorExterior>
'</DadosFornecedor>
'<!--  Data de Emissão do Documento Fiscal  -->
'<DataEmissao>?</DataEmissao>
'<!--  Valor dedutível do documento fiscal  -->
'<ValorDedutivel>?</ValorDedutivel>
'<!--  Valor utilizado na dedução da NFS-e. Deve ser menor ou igual ao ValorDedutivel.  -->
'<ValorUtilizadoDeducao>?</ValorUtilizadoDeducao>
'</Deducao>
'</InfDeclaracaoPrestacaoServico>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</Rps>
'</ListaRps>
'</LoteRps>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#" Id="lote01">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</EnviarLoteRpsEnvio>
        Case Is = "RecepcionarLoteRpsSincrono"
'            Compor_MensagemXML = ""
'            <EnviarLoteRpsSincronoEnvio xmlns="http://www.abrasf.org.br/nfse.xsd">
'<LoteRps Id="lote01" versao="2.04">
'<!--  Número do Lote de RPS. Ocorrência 1-1. Numérico de tamanho máximo 15 -->
'<NumeroLote>?</NumeroLote>
'<!--  CNPJ ou CPF do prestador/ Inscrição municipal do prestador. Ocorrência 1-1.  -->
'<Prestador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</Prestador>
'<!--  Quantidade de RPS do Lote. Numérico de tamanho máximo 4.   -->
'<QuantidadeRps>?</QuantidadeRps>
'<!--  Dados dos RPSs. Ocorrência 1-N.  -->
'<ListaRps>
'<Rps>
'<InfDeclaracaoPrestacaoServico>
'<!--  Representa dados informativos do Recibo Provisório de Serviço (RPS)  -->
'<Rps>
'<IdentificacaoRps>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</IdentificacaoRps>
'<!--  Data de emissão do RPS. Formato:(AAAA-MM-DD)  -->
'<DataEmissao>?</DataEmissao>
'<!--  Situação do RPS (1 – Normal ou 2 – Cancelado)  -->
'<Status>?</Status>
'<!--  IDENTIFICAÇÃO DO RPS SUBSTITUÍDO (OPCIONAL)  -->
'<RpsSubstituido>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</RpsSubstituido>
'</Rps>
'<!--  Dia, mês e ano da prestação de serviço. Formato: (AAAA-MM-DD)  -->
'<Competencia>?</Competencia>
'<Servico>
'<Valores>
'<!--  Valor dos serviços em R$  -->
'<ValorServicos>?</ValorServicos>
'<!--  Valor das deduções para Redução da Base de Cálculo em R$  -->
'<ValorDeducoes>?</ValorDeducoes>
'<!--  Valor da retenção do PIS em R$ Informação declaratória  -->
'<ValorPis>?</ValorPis>
'<!--  Valor da retenção do COFINS em R$ Informação declaratória  -->
'<ValorCofins>?</ValorCofins>
'<!--  Valor da retenção do INSS em R$ Informação declaratória  -->
'<ValorInss>?</ValorInss>
'<!--  Valor da retenção do IR em R$ Informação declaratória  -->
'<ValorIr>?</ValorIr>
'<!--  Valor da retenção do CSLL em R$ Informação declaratória  -->
'<ValorCsll>?</ValorCsll>
'<!--  Outras retenções na Fonte. Informação declaratória  -->
'<OutrasRetencoes>?</OutrasRetencoes>
'<!--  Valor total aproximado dos tributos federais, estaduais e municipais, em conformidade com o artigo 1o da Lei no 12.741/2012  -->
'<ValTotTributos>?</ValTotTributos>
'<!--  Valor do ISS devido em R$  -->
'<ValorIss>?</ValorIss>
'<!--  Alíquota do serviço prestado  -->
'<Aliquota>?</Aliquota>
'<!--  Valor do desconto incondicionado  -->
'<DescontoIncondicionado>?</DescontoIncondicionado>
'<!--  Valor do desconto condicionado  -->
'<DescontoCondicionado>?</DescontoCondicionado>
'</Valores>
'<!--  ISS é retido na fonte
'                        1 – Sim;
'                        2 – Não.  -->
'<IssRetido>?</IssRetido>
'<!--  Informado somente se IssRetido igual a "1 – Sim".
'                        A opção "2 – Intermediário" somente poderá ser selecionada se "CpfCnpjIntermediario" informado.
'                        1 – Tomador;
'                        2 – Intermediário.  -->
'<ResponsavelRetencao>?</ResponsavelRetencao>
'<!--  Subitem do serviço prestado conforme LC 116/2003. Formato NN.NN  -->
'<ItemListaServico>?</ItemListaServico>
'<!--  Código CNAE  -->
'<CodigoCnae>?</CodigoCnae>
'<!--  Código do serviço prestado próprio do município  -->
'<CodigoTributacaoMunicipio>?</CodigoTributacaoMunicipio>
'<!--  CodigoNbs  -->
'<CodigoNbs>?</CodigoNbs>
'<!--  Discriminação dos serviços.  -->
'<Discriminacao>?</Discriminacao>
'<!--  Código do município onde o serviço foi prestado (tabela do IBGE), se exterior colocar 9999999  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Código do país onde o serviço foi prestado (Tabela de país do IBGE). Preencher somente se MunicipioPrestacaoServico igual 9999999  -->
'<CodigoPais>?</CodigoPais>
'<!--  Exigibilidades possíveis
'                        1 – Exigível;
'                        2 – Não incidência;
'                        3 – Isenção;
'                        4 – Exportação;
'                        5 – Imunidade;
'                        6 – Exigibilidade Suspensa por Decisão Judicial;
'                        7 – Exigibilidade Suspensa por Processo Administrativo. -->
'<ExigibilidadeISS>?</ExigibilidadeISS>
'<!--  Identificação da não exigibilidade do ISSQN – somente para os casos de benefício fiscal  -->
'<IdentifNaoExigibilidade>?</IdentifNaoExigibilidade>
'<!--  Código do município onde é a incidência do imposto (Tabela do IBGE)  -->
'<MunicipioIncidencia>?</MunicipioIncidencia>
'<!--  Número do processo da suspensão da exigibilidade  -->
'<NumeroProcesso>?</NumeroProcesso>
'</Servico>
'<!--  Identificação do prestador do serviço  -->
'<Prestador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do prestador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</Prestador>
'<!--  Dados do tomador do serviço  -->
'<TomadorServico>
'<IdentificacaoTomador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do tomador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoTomador>
'<!--  Este elemento só deverá ser preenchido para tomadores não residentes no Brasil  -->
'<NifTomador>?</NifTomador>
'<!--  Nome / Razão Social do tomador. -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Informar apenas uma das Tags. Ou tag Endereco ou Tag EnderecoExterior.  -->
'<!--  Endereço de tomador de serviços do Brasil  -->
'<Endereco>
'<!--  Tipo e nome do logradouro do tomador do serviço  -->
'<Endereco>?</Endereco>
'<!--  Número do imóvel do tomador do serviço  -->
'<Numero>?</Numero>
'<!--  Complemento do endereço do tomador do serviço (Opcional)  -->
'<Complemento>?</Complemento>
'<!--  Bairro do tomador do serviço  -->
'<Bairro>?</Bairro>
'<!--  Código do município do tomador do serviço (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Sigla da unidade da federação do tomador do serviço  -->
'<Uf>?</Uf>
'<!--  Número do CEP do tomador do serviço  -->
'<Cep>?</Cep>
'</Endereco>
'<!--  Endereço de tomador de serviços do exterior  -->
'<EnderecoExterior>
'<!--  Código do país do tomador do serviço (Tabela do de país do IBGE). -->
'<CodigoPais>?</CodigoPais>
'<!--  Descrição completa do endereço do exterior  -->
'<EnderecoCompletoExterior>?</EnderecoCompletoExterior>
'</EnderecoExterior>
'<!--  Opcional  -->
'<Contato>
'<!--  Número do telefone do tomador (Opcional)  -->
'<Telefone>?</Telefone>
'<!--  E-mail do tomador (Opcional)  -->
'<Email>?</Email>
'</Contato>
'</TomadorServico>
'<Intermediario>
'<IdentificacaoIntermediario>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do intermediário de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoIntermediario>
'<!--  Nome ou Razão Social de intermediário do serviço  -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Código do município onde o intermediário está estabelecido (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'</Intermediario>
'<ConstrucaoCivil>
'<!--  Número de identificação da obra. Tamanho máximo 30.  -->
'<CodigoObra>?</CodigoObra>
'<!--  Número da ART. Tamanho máximo 30.  -->
'<Art>?</Art>
'</ConstrucaoCivil>
'<!--  Tipos de Regimes especiais:
'                    1 – Microempresa Municipal;
'                    2 – Estimativa;
'                    3 – Sociedade de Profissionais;
'                    4 – Cooperativa;
'                    5 – Microempresário Individual (MEI);
'                    6 – Microempresa ou Empresa de Pequeno Porte (ME EPP).  -->
'<RegimeEspecialTributacao>?</RegimeEspecialTributacao>
'<!-- Prestador é optante pelo Simples Nacional:
'                    1 – Sim;
'                    2 – Não . -->
'<OptanteSimplesNacional>?</OptanteSimplesNacional>
'<!-- Prestador possui Incentivo Fiscal:
'                    1 – Sim;
'                    2 – Não. -->
'<IncentivoFiscal>?</IncentivoFiscal>
'<!--  Opcional  -->
'<Evento>
'<!--  Identificação do evento (Obrigatório se DescricaoEvento não informado)  -->
'<IdentificacaoEvento>?</IdentificacaoEvento>
'<!--  Descrição do evento (Obrigatório se IdentificacaoEvento não informado)  -->
'<DescricaoEvento>?</DescricaoEvento>
'</Evento>
'<InformacoesComplementares>?</InformacoesComplementares>
'<Deducao>
'<!--  Identificação da dedução
'                        1 – Materiais;
'                        2 – Subempreitada de mão de obra;
'                        3 – Serviços;
'                        4 – Produção externa;
'                        5 – Alimentação e bebidas/frigobar;
'                        6 – Reembolso de despesas;
'                        7 – Repasse consorciado;
'                        8 – Repasse plano de saúde
'                        99 – Outras deduções  -->
'<TipoDeducao>?</TipoDeducao>
'<!--  Informar o tipo da dedução no caso da opção 99 – Outras Deduções  -->
'<DescricaoDeducao>?</DescricaoDeducao>
'<IdentificacaoDocumentoDeducao>
'<IdentificacaoNfse>
'<!--  Município de geração da NFS-e  -->
'<CodigoMunicipioGerador>?</CodigoMunicipioGerador>
'<!--  Número da NFS-e  -->
'<NumeroNfse>?</NumeroNfse>
'<!--  Código de verificação da NFS-e  -->
'<CodigoVerificacao>?</CodigoVerificacao>
'</IdentificacaoNfse>
'<IdentificacaoNfe>
'<!--  Número da NF-e  -->
'<NumeroNfe>?</NumeroNfe>
'<!--  Estado de geração da NF-e  -->
'<UfNfe>?</UfNfe>
'<!--  Chave da NF-e  -->
'<ChaveAcessoNfe>?</ChaveAcessoNfe>
'</IdentificacaoNfe>
'<OutroDocumento>
'<!--  Identificação de documento diferente de NFS-e e NF-e  -->
'<IdentificacaoDocumento>?</IdentificacaoDocumento>
'</OutroDocumento>
'</IdentificacaoDocumentoDeducao>
'<DadosFornecedor>
'<IdentificacaoFornecedor>
'<!--  CNPJ ou CPF do fornecedor do Brasil.  -->
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'</IdentificacaoFornecedor>
'<FornecedorExterior>
'<!--  NIF do fornecedor do exterior  -->
'<NifFornecedor>?</NifFornecedor>
'<!--  Código do país do fornecedor do exterior  -->
'<CodigoPais>?</CodigoPais>
'</FornecedorExterior>
'</DadosFornecedor>
'<!--  Data de Emissão do Documento Fiscal  -->
'<DataEmissao>?</DataEmissao>
'<!--  Valor dedutível do documento fiscal  -->
'<ValorDedutivel>?</ValorDedutivel>
'<!--  Valor utilizado na dedução da NFS-e. Deve ser menor ou igual ao ValorDedutivel.  -->
'<ValorUtilizadoDeducao>?</ValorUtilizadoDeducao>
'</Deducao>
'</InfDeclaracaoPrestacaoServico>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</Rps>
'</ListaRps>
'</LoteRps>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#" Id="lote01">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</EnviarLoteRpsSincronoEnvio>
        Case Is = "SubstituirNfse"
'            Compor_MensagemXML = ""
'            <SubstituirNfseEnvio xmlns="http://www.abrasf.org.br/nfse.xsd">
'<SubstituicaoNfse>
'<Pedido>
'<InfPedidoCancelamento Id="s01">
'<IdentificacaoNfse>
'<!-- Obrigatório.  -->
'<Numero>?</Numero>
'<CpfCnpj>
'<!-- Obrigatório. CPF ou CNPJ. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!-- Obrigatório.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'<!-- Obrigatório.  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'</IdentificacaoNfse>
'<!-- Obrigatório. Código de cancelamento com base na tabela de Erros e alertas.
'                1 – Erro na emissão
'                2 – Serviço não prestado
'                3 – Erro de assinatura
'                4 – Duplicidade da nota
'                5 – Erro de processamento
'                Importante: Os códigos 3 (Erro de assinatura) e 5(Erro de processamento) são de uso restrito da Administração Tributária Municipal
'                 -->
'<CodigoCancelamento>?</CodigoCancelamento>
'</InfPedidoCancelamento>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#" Id="s01">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</Pedido>
'<Rps>
'<InfDeclaracaoPrestacaoServico>
'<!--  Representa dados informativos do Recibo Provisório de Serviço (RPS)  -->
'<Rps>
'<IdentificacaoRps>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</IdentificacaoRps>
'<!--  Data de emissão do RPS. Formato:(AAAA-MM-DD)  -->
'<DataEmissao>?</DataEmissao>
'<!--  Situação do RPS (1 – Normal ou 2 – Cancelado)  -->
'<Status>?</Status>
'<!--  IDENTIFICAÇÃO DO RPS SUBSTITUÍDO (OPCIONAL)  -->
'<RpsSubstituido>
'<!--  Número do RPS  -->
'<Numero>?</Numero>
'<!--  Série do RPS  -->
'<Serie>?</Serie>
'<!--  Tipo do RPS informar 1 – Recibo Provisório de Serviços;  -->
'<Tipo>1</Tipo>
'</RpsSubstituido>
'</Rps>
'<!--  Dia, mês e ano da prestação de serviço. Formato: (AAAA-MM-DD)  -->
'<Competencia>?</Competencia>
'<Servico>
'<Valores>
'<!--  Valor dos serviços em R$  -->
'<ValorServicos>?</ValorServicos>
'<!--  Valor das deduções para Redução da Base de Cálculo em R$  -->
'<ValorDeducoes>?</ValorDeducoes>
'<!--  Valor da retenção do PIS em R$ Informação declaratória  -->
'<ValorPis>?</ValorPis>
'<!--  Valor da retenção do COFINS em R$ Informação declaratória  -->
'<ValorCofins>?</ValorCofins>
'<!--  Valor da retenção do INSS em R$ Informação declaratória  -->
'<ValorInss>?</ValorInss>
'<!--  Valor da retenção do IR em R$ Informação declaratória  -->
'<ValorIr>?</ValorIr>
'<!--  Valor da retenção do CSLL em R$ Informação declaratória  -->
'<ValorCsll>?</ValorCsll>
'<!--  Outras retenções na Fonte. Informação declaratória  -->
'<OutrasRetencoes>?</OutrasRetencoes>
'<!--  Valor total aproximado dos tributos federais, estaduais e municipais, em conformidade com o artigo 1o da Lei no 12.741/2012  -->
'<ValTotTributos>?</ValTotTributos>
'<!--  Valor do ISS devido em R$  -->
'<ValorIss>?</ValorIss>
'<!--  Alíquota do serviço prestado  -->
'<Aliquota>?</Aliquota>
'<!--  Valor do desconto incondicionado  -->
'<DescontoIncondicionado>?</DescontoIncondicionado>
'<!--  Valor do desconto condicionado  -->
'<DescontoCondicionado>?</DescontoCondicionado>
'</Valores>
'<!--  ISS é retido na fonte
'                    1 – Sim;
'                    2 – Não.  -->
'<IssRetido>?</IssRetido>
'<!--  Informado somente se IssRetido igual a "1 – Sim".
'                    A opção "2 – Intermediário" somente poderá ser selecionada se "CpfCnpjIntermediario" informado.
'                    1 – Tomador;
'                    2 – Intermediário.  -->
'<ResponsavelRetencao>?</ResponsavelRetencao>
'<!--  Subitem do serviço prestado conforme LC 116/2003. Formato NN.NN  -->
'<ItemListaServico>?</ItemListaServico>
'<!--  Código CNAE  -->
'<CodigoCnae>?</CodigoCnae>
'<!--  Código do serviço prestado próprio do município  -->
'<CodigoTributacaoMunicipio>?</CodigoTributacaoMunicipio>
'<!--  CodigoNbs  -->
'<CodigoNbs>?</CodigoNbs>
'<!--  Discriminação dos serviços.  -->
'<Discriminacao>?</Discriminacao>
'<!--  Código do município onde o serviço foi prestado (tabela do IBGE), se exterior colocar 9999999  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Código do país onde o serviço foi prestado (Tabela de país do IBGE). Preencher somente se MunicipioPrestacaoServico igual 9999999  -->
'<CodigoPais>?</CodigoPais>
'<!--  Exigibilidades possíveis
'                    1 – Exigível;
'                    2 – Não incidência;
'                    3 – Isenção;
'                    4 – Exportação;
'                    5 – Imunidade;
'                    6 – Exigibilidade Suspensa por Decisão Judicial;
'                    7 – Exigibilidade Suspensa por Processo Administrativo. -->
'<ExigibilidadeISS>?</ExigibilidadeISS>
'<!--  Identificação da não exigibilidade do ISSQN – somente para os casos de benefício fiscal  -->
'<IdentifNaoExigibilidade>?</IdentifNaoExigibilidade>
'<!--  Código do município onde é a incidência do imposto (Tabela do IBGE)  -->
'<MunicipioIncidencia>?</MunicipioIncidencia>
'<!--  Número do processo da suspensão da exigibilidade  -->
'<NumeroProcesso>?</NumeroProcesso>
'</Servico>
'<!--  Identificação do prestador do serviço  -->
'<Prestador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do prestador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</Prestador>
'<!--  Dados do tomador do serviço  -->
'<TomadorServico>
'<IdentificacaoTomador>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do tomador de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoTomador>
'<!--  Este elemento só deverá ser preenchido para tomadores não residentes no Brasil  -->
'<NifTomador>?</NifTomador>
'<!--  Nome / Razão Social do tomador. -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Informar apenas uma das Tags. Ou tag Endereco ou Tag EnderecoExterior.  -->
'<!--  Endereço de tomador de serviços do Brasil  -->
'<Endereco>
'<!--  Tipo e nome do logradouro do tomador do serviço  -->
'<Endereco>?</Endereco>
'<!--  Número do imóvel do tomador do serviço  -->
'<Numero>?</Numero>
'<!--  Complemento do endereço do tomador do serviço (Opcional)  -->
'<Complemento>?</Complemento>
'<!--  Bairro do tomador do serviço  -->
'<Bairro>?</Bairro>
'<!--  Código do município do tomador do serviço (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'<!--  Sigla da unidade da federação do tomador do serviço  -->
'<Uf>?</Uf>
'<!--  Número do CEP do tomador do serviço  -->
'<Cep>?</Cep>
'</Endereco>
'<!--  Endereço de tomador de serviços do exterior  -->
'<EnderecoExterior>
'<!--  Código do país do tomador do serviço (Tabela do de país do IBGE). -->
'<CodigoPais>?</CodigoPais>
'<!--  Descrição completa do endereço do exterior  -->
'<EnderecoCompletoExterior>?</EnderecoCompletoExterior>
'</EnderecoExterior>
'<!--  Opcional  -->
'<Contato>
'<!--  Número do telefone do tomador (Opcional)  -->
'<Telefone>?</Telefone>
'<!--  E-mail do tomador (Opcional)  -->
'<Email>?</Email>
'</Contato>
'</TomadorServico>
'<Intermediario>
'<IdentificacaoIntermediario>
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'<!--  Número de inscrição municipal do intermediário de serviço. Numérico de tamanho máximo 15.  -->
'<InscricaoMunicipal>?</InscricaoMunicipal>
'</IdentificacaoIntermediario>
'<!--  Nome ou Razão Social de intermediário do serviço  -->
'<RazaoSocial>?</RazaoSocial>
'<!--  Código do município onde o intermediário está estabelecido (Tabela do IBGE)  -->
'<CodigoMunicipio>?</CodigoMunicipio>
'</Intermediario>
'<ConstrucaoCivil>
'<!--  Número de identificação da obra. Tamanho máximo 30.  -->
'<CodigoObra>?</CodigoObra>
'<!--  Número da ART. Tamanho máximo 30.  -->
'<Art>?</Art>
'</ConstrucaoCivil>
'<!--  Tipos de Regimes especiais:
'                1 – Microempresa Municipal;
'                2 – Estimativa;
'                3 – Sociedade de Profissionais;
'                4 – Cooperativa;
'                5 – Microempresário Individual (MEI);
'                6 – Microempresa ou Empresa de Pequeno Porte (ME EPP).  -->
'<RegimeEspecialTributacao>?</RegimeEspecialTributacao>
'<!-- Prestador é optante pelo Simples Nacional:
'                1 – Sim;
'                2 – Não . -->
'<OptanteSimplesNacional>?</OptanteSimplesNacional>
'<!-- Prestador possui Incentivo Fiscal:
'                1 – Sim;
'                2 – Não. -->
'<IncentivoFiscal>?</IncentivoFiscal>
'<!--  Opcional  -->
'<Evento>
'<!--  Identificação do evento (Obrigatório se DescricaoEvento não informado)  -->
'<IdentificacaoEvento>?</IdentificacaoEvento>
'<!--  Descrição do evento (Obrigatório se IdentificacaoEvento não informado)  -->
'<DescricaoEvento>?</DescricaoEvento>
'</Evento>
'<InformacoesComplementares>?</InformacoesComplementares>
'<Deducao>
'<!--  Identificação da dedução
'                    1 – Materiais;
'                    2 – Subempreitada de mão de obra;
'                    3 – Serviços;
'                    4 – Produção externa;
'                    5 – Alimentação e bebidas/frigobar;
'                    6 – Reembolso de despesas;
'                    7 – Repasse consorciado;
'                    8 – Repasse plano de saúde
'                    99 – Outras deduções  -->
'<TipoDeducao>?</TipoDeducao>
'<!--  Informar o tipo da dedução no caso da opção 99 – Outras Deduções  -->
'<DescricaoDeducao>?</DescricaoDeducao>
'<IdentificacaoDocumentoDeducao>
'<IdentificacaoNfse>
'<!--  Município de geração da NFS-e  -->
'<CodigoMunicipioGerador>?</CodigoMunicipioGerador>
'<!--  Número da NFS-e  -->
'<NumeroNfse>?</NumeroNfse>
'<!--  Código de verificação da NFS-e  -->
'<CodigoVerificacao>?</CodigoVerificacao>
'</IdentificacaoNfse>
'<IdentificacaoNfe>
'<!--  Número da NF-e  -->
'<NumeroNfe>?</NumeroNfe>
'<!--  Estado de geração da NF-e  -->
'<UfNfe>?</UfNfe>
'<!--  Chave da NF-e  -->
'<ChaveAcessoNfe>?</ChaveAcessoNfe>
'</IdentificacaoNfe>
'<OutroDocumento>
'<!--  Identificação de documento diferente de NFS-e e NF-e  -->
'<IdentificacaoDocumento>?</IdentificacaoDocumento>
'</OutroDocumento>
'</IdentificacaoDocumentoDeducao>
'<DadosFornecedor>
'<IdentificacaoFornecedor>
'<!--  CNPJ ou CPF do fornecedor do Brasil.  -->
'<CpfCnpj>
'<!--  CPF ou CNPJ da empresa/pessoa. Não enviar ambas as tags.  -->
'<Cnpj>?</Cnpj>
'<Cpf>?</Cpf>
'</CpfCnpj>
'</IdentificacaoFornecedor>
'<FornecedorExterior>
'<!--  NIF do fornecedor do exterior  -->
'<NifFornecedor>?</NifFornecedor>
'<!--  Código do país do fornecedor do exterior  -->
'<CodigoPais>?</CodigoPais>
'</FornecedorExterior>
'</DadosFornecedor>
'<!--  Data de Emissão do Documento Fiscal  -->
'<DataEmissao>?</DataEmissao>
'<!--  Valor dedutível do documento fiscal  -->
'<ValorDedutivel>?</ValorDedutivel>
'<!--  Valor utilizado na dedução da NFS-e. Deve ser menor ou igual ao ValorDedutivel.  -->
'<ValorUtilizadoDeducao>?</ValorUtilizadoDeducao>
'</Deducao>
'</InfDeclaracaoPrestacaoServico>
'<Signature xmlns="http://www.w3.org/2000/09/xmldsig#">
'<SignedInfo>
'<CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
'<SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
'<Reference URI="">
'<Transforms>
'<Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
'</Transforms>
'<DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
'<DigestValue>?</DigestValue>
'</Reference>
'</SignedInfo>
'<SignatureValue>?</SignatureValue>
'<KeyInfo>
'<X509Data>
'<X509Certificate>?</X509Certificate>
'</X509Data>
'</KeyInfo>
'</Signature>
'</Rps>
'</SubstituicaoNfse>
'</SubstituirNfseEnvio>
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Numero")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
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
