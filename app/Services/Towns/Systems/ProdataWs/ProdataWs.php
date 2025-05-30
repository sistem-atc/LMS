<?php

namespace App\Services\Towns\Systems\ProdataWs;


class ProdataWs
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
    Links_Prefeituras.Add "TLZ", "https://ws.catalao.go.gov.br/prodataws/services/NfseWSService/|2.01" 'Prefeitura Catalão

End Sub

Public Function CancelarNfse(ByVal Numero_Nota_Fiscal As String, ByVal CNPJ As String, ByVal Inscricao_Municipal As String, _
                             ByVal Codigo_Municipal As String, ByVal Codigo_Cancelamento As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "CancelarNfse": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_Nota_Fiscal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_MUNICIPIO]", Codigo_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CANCELAMENTO]", Codigo_Cancelamento)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Protocolo As String, _
                                 ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseFaixa(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Nota_Inicial As String, _
                                   ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfseFaixa": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal Numero_RPS As String, ByVal Tipo_RPS As TypeRPS, ByVal CNPJ As String, ByVal Inscricao_Municipal As String, _
                                    ByVal Used_Companny As String, Optional ByVal Serie_RPS As String = "NF") As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_RPS]", Tipo_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseServicoPrestado(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, Data_Inicial As Date, _
                                             Data_Final As Date, ByVal Used_Companny As String, Optional Pagina As Integer = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfseServicoPrestado": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Pagina)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseServicoTomado(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfseServicoTomado": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoTomado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function GerarNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "GerarNfse": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRpsSincrono(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRpsSincrono": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function SubstituirNfse(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "SubstituirNfse": Mount_Mensage = Message_Assemble(): CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

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

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:ser=""http://services.nfse"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<ser:[Mount_Mensage]Request>"
    Message_Assemble = Message_Assemble & "<nfseCabecMsg><![CDATA[[CabecMsg]]]></nfseCabecMsg>"
    Message_Assemble = Message_Assemble & "<nfseDadosMsg><![CDATA[[DadosMsg]]]></nfseDadosMsg>"
    Message_Assemble = Message_Assemble & "</ser:[Mount_Mensage]Request>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<CancelarNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Pedido>"
            MensagemXML = MensagemXML & "<InfPedidoCancelamento Id=""pedidoCancelamento_185828040001012877576"">"
            MensagemXML = MensagemXML & "<IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<Numero>[CAMPO_NUMERO_NF]</Numero>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</CodigoMunicipio>"
            MensagemXML = MensagemXML & "</IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</CodigoCancelamento>"
            MensagemXML = MensagemXML & "</InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "</Pedido>"
            MensagemXML = MensagemXML & "</CancelarNfseEnvio>"

        Case Is = "ConsultarLoteRps"

            MensagemXML = "<ConsultarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo>[CAMPO_PROTOCOLO]</Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarLoteRpsEnvio>"

        Case Is = "ConsultarNfsePorFaixa"

            MensagemXML = "<ConsultarNfseFaixaEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Faixa>"
            MensagemXML = MensagemXML & "<NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</NumeroNfseInicial>"
            MensagemXML = MensagemXML & "</Faixa>"
            MensagemXML = MensagemXML & "<Pagina>1</Pagina>"
            MensagemXML = MensagemXML & "</ConsultarNfseFaixaEnvio>"

        Case Is = "ConsultarNfsePorRps"

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>[CAMPO_NUMERO_RPS]</Numero>"
            MensagemXML = MensagemXML & "<Serie>[CAMPO_SERIE_RPS]</Serie>"
            MensagemXML = MensagemXML & "<Tipo>[CAMPO_TIPO_RPS]</Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "</ConsultarNfseRpsEnvio>"

        Case Is = "ConsultarNfseServicoPrestado"

            MensagemXML = "<ConsultarNfseServicoPrestadoEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina>"
            MensagemXML = MensagemXML & "</ConsultarNfseServicoPrestadoEnvio>"

        Case Is = "ConsultarNfseServicoTomado"

            MensagemXML = "<ConsultarNfseServicoTomadoEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Consulente>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Consulente>"
            MensagemXML = MensagemXML & "<NumeroNfse>[NUMERO_NOTA_FISCAL]</NumeroNfse>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "<PeriodoCompetencia>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoCompetencia>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<Intermediario>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Intermediario>"
            MensagemXML = MensagemXML & "<Pagina>1</Pagina>"
            MensagemXML = MensagemXML & "</ConsultarNfseServicoTomadoEnvio>"

        Case Is = "GerarNfse"

            MensagemXML = "<GerarNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico Id=""lote"">"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>[NUMERO_LOTE]</Numero>"
            MensagemXML = MensagemXML & "<Serie>[SERIE_LOTE]</Serie>"
            MensagemXML = MensagemXML & "<Tipo>[TIPO_LOTE]</Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao>[CAMPO_DATA_EMISSAO]</DataEmissao>"
            MensagemXML = MensagemXML & "<Status>[STATUS]</Status>"
            MensagemXML = MensagemXML & "<RpsSubstituido>"
            MensagemXML = MensagemXML & "<Numero>[NUMERO_NOTA_FISCAL]</Numero>"
            MensagemXML = MensagemXML & "<Serie>[SERIE_NOTA_FISCAL]</Serie>"
            MensagemXML = MensagemXML & "<Tipo>[TIPO_NOTA_FISCAL]</Tipo>"
            MensagemXML = MensagemXML & "</RpsSubstituido>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "<Competencia>[COMPETENCIA]</Competencia>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos>[VALOR_SERVICOS]</ValorServicos>"
            MensagemXML = MensagemXML & "<ValorDeducoes>[VALOR_DEDUCOES]</ValorDeducoes>"
            MensagemXML = MensagemXML & "<ValorPis>[VALOR_PIS]</ValorPis>"
            MensagemXML = MensagemXML & "<ValorCofins>[VALOR_COFINS]</ValorCofins>"
            MensagemXML = MensagemXML & "<ValorInss>[VALOR_INSS]</ValorInss>"
            MensagemXML = MensagemXML & "<ValorIr>[VALOR_IR]</ValorIr>"
            MensagemXML = MensagemXML & "<ValorCsll>[VALOR_CSLL]</ValorCsll>"
            MensagemXML = MensagemXML & "<OutrasRetencoes>[OUTRAS_RETENCOES]</OutrasRetencoes>"
            MensagemXML = MensagemXML & "<ValorIss>[VALOR_ISS]</ValorIss>"
            MensagemXML = MensagemXML & "<Aliquota>[ALIQUOTA]</Aliquota>"
            MensagemXML = MensagemXML & "<DescontoIncondicionado>[DESCONTO_INCONDICIONADO]</DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<DescontoCondicionado>[DESCONTO_CONDICIONADO]</DescontoCondicionado>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<IssRetido>[ISS_RETIDO]</IssRetido>"
            MensagemXML = MensagemXML & "<ResponsavelRetencao>[RESPONSAVEL_RETENCAO]</ResponsavelRetencao>"
            MensagemXML = MensagemXML & "<ItemListaServico>[ITENS_LISTA_SERVICO]</ItemListaServico>"
            MensagemXML = MensagemXML & "<CodigoCnae>[CODIGO_CNAE]</CodigoCnae>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio>[CODIGO_TRIBUTACAO]</CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<Discriminacao>[DESCRIMINICAO]</Discriminacao>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>[CODIGO_MUNICIPIO]</CodigoMunicipio>"
            MensagemXML = MensagemXML & "<CodigoPais>[CODIGO_PAIS]</CodigoPais>"
            MensagemXML = MensagemXML & "<ExigibilidadeIss>[EXIGIBILIDADE_ISS]</ExigibilidadeIss>"
            MensagemXML = MensagemXML & "<MunicipioIncidencia>[MUNICIPIO_INCIDENCIA]</MunicipioIncidencia>"
            MensagemXML = MensagemXML & "<NumeroProcesso>[NUMERO_PROCESSO]</NumeroProcesso>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CNPJ_PRESTADOR]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[INSCRICAO_MUNICIPAL_PRESTADOR]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CNPJ_TOMADOR]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[INSCRICAO_MUNICIPAL_TOMADOR]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial>[RAZAO_SOCIAL_TOMADOR]</RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Endereco>[ENDERECO_TOMADOR]</Endereco>"
            MensagemXML = MensagemXML & "<Numero>[NUMERO_TOMADOR]</Numero>"
            MensagemXML = MensagemXML & "<Complemento>[COMPLEMENTO_TOMADOR]</Complemento>"
            MensagemXML = MensagemXML & "<Bairro>[BAIRRO_TOMADOR]</Bairro>"
            MensagemXML = MensagemXML & "<CodigoMunicipio>[CODIGO_MUNICIPIO_TOMADOR]</CodigoMunicipio>"
            MensagemXML = MensagemXML & "<Uf>[UF_TOMADOR]</Uf>"
            MensagemXML = MensagemXML & "<CodigoPais>[CODIGO_PAIS_TOMADOR]</CodigoPais>"
            MensagemXML = MensagemXML & "<Cep>[CEP_TOMADOR]</Cep>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "<Contato>"
            MensagemXML = MensagemXML & "<Telefone>[TELEFONE_TOMADOR]</Telefone>"
            MensagemXML = MensagemXML & "<Email>[EMAIL_TOMADOR]</Email>"
            MensagemXML = MensagemXML & "</Contato>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<Intermediario>"
            MensagemXML = MensagemXML & "<IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CNPJ_INTERMEDIARIO]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[INSCRICAO_MUNICIPAL_INTERMEDIARIO]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<RazaoSocial>[RAZAO_SOCIAL_INTERMEDIARIO]</RazaoSocial>"
            MensagemXML = MensagemXML & "</Intermediario>"
            MensagemXML = MensagemXML & "<ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<CodigoObra>[CODIGO_OBRA]</CodigoObra>"
            MensagemXML = MensagemXML & "<Art>[ART]</Art>"
            MensagemXML = MensagemXML & "</ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<RegimeEspecialTributacao>[REGIME_ESPECIAL_TRIBUTACAO]</RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<OptanteSimplesNacional>[SIMPLES_NACIONAL]</OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<IncentivoFiscal>[INCENTIVO_FISCAL]</IncentivoFiscal>"
            MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</GerarNfseEnvio>"

        Case Is = "RecepcionarLoteRps"

            MensagemXML = "<RecepcionarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<LoteRps  Id=""numero_lote"" versao=""2.02"">"
            MensagemXML = MensagemXML & "<NumeroLote></NumeroLote>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<QuantidadeRps></QuantidadeRps>"
            MensagemXML = MensagemXML & "<ListaRps>"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico  Id=""numero_rps"">"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Serie></Serie>"
            MensagemXML = MensagemXML & "<Tipo></Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao></DataEmissao>"
            MensagemXML = MensagemXML & "<Status></Status>"
            MensagemXML = MensagemXML & "<RpsSubstituido>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Serie></Serie>"
            MensagemXML = MensagemXML & "<Tipo></Tipo>"
            MensagemXML = MensagemXML & "</RpsSubstituido>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "<Competencia></Competencia>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos></ValorServicos>"
            MensagemXML = MensagemXML & "<ValorDeducoes></ValorDeducoes>"
            MensagemXML = MensagemXML & "<ValorPis></ValorPis>"
            MensagemXML = MensagemXML & "<ValorCofins></ValorCofins>"
            MensagemXML = MensagemXML & "<ValorInss></ValorInss>"
            MensagemXML = MensagemXML & "<ValorIr></ValorIr>"
            MensagemXML = MensagemXML & "<ValorCsll></ValorCsll>"
            MensagemXML = MensagemXML & "<OutrasRetencoes></OutrasRetencoes>"
            MensagemXML = MensagemXML & "<ValorIss></ValorIss>"
            MensagemXML = MensagemXML & "<Aliquota></Aliquota>"
            MensagemXML = MensagemXML & "<DescontoIncondicionado></DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<DescontoCondicionado></DescontoCondicionado>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<IssRetido></IssRetido>"
            MensagemXML = MensagemXML & "<ResponsavelRetencao></ResponsavelRetencao>"
            MensagemXML = MensagemXML & "<ItemListaServico></ItemListaServico>"
            MensagemXML = MensagemXML & "<CodigoCnae></CodigoCnae>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio></CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<Discriminacao></Discriminacao>"
            MensagemXML = MensagemXML & "<CodigoMunicipio></CodigoMunicipio>"
            MensagemXML = MensagemXML & "<CodigoPais></CodigoPais>"
            MensagemXML = MensagemXML & "<ExigibilidadeISS></ExigibilidadeISS>"
            MensagemXML = MensagemXML & "<MunicipioIncidencia></MunicipioIncidencia>"
            MensagemXML = MensagemXML & "<NumeroProcesso></NumeroProcesso>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial></RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Endereco></Endereco>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Complemento></Complemento>"
            MensagemXML = MensagemXML & "<Bairro></Bairro>"
            MensagemXML = MensagemXML & "<CodigoMunicipio></CodigoMunicipio>"
            MensagemXML = MensagemXML & "<Uf></Uf>"
            MensagemXML = MensagemXML & "<CodigoPais></CodigoPais>"
            MensagemXML = MensagemXML & "<Cep></Cep>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "<Contato>"
            MensagemXML = MensagemXML & "<Telefone></Telefone>"
            MensagemXML = MensagemXML & "<Email></Email>"
            MensagemXML = MensagemXML & "</Contato>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<Intermediario>"
            MensagemXML = MensagemXML & "<IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<RazaoSocial></RazaoSocial>"
            MensagemXML = MensagemXML & "</Intermediario>"
            MensagemXML = MensagemXML & "<ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<CodigoObra></CodigoObra>"
            MensagemXML = MensagemXML & "<Art></Art>"
            MensagemXML = MensagemXML & "</ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<RegimeEspecialTributacao></RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<OptanteSimplesNacional></OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<IncentivoFiscal></IncentivoFiscal>"
            MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</ListaRps>"
            MensagemXML = MensagemXML & "</LoteRps>"
            MensagemXML = MensagemXML & "</EnviarLoteRpsEnvio>"

        Case Is = "RecepcionarLoteRpsSincrono"

            MensagemXML = "<RecepcionarLoteRpsSincronoEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<LoteRps  Id=""1"" versao=""2.01"">"
            MensagemXML = MensagemXML & "<NumeroLote></NumeroLote>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<QuantidadeRps></QuantidadeRps>"
            MensagemXML = MensagemXML & "<ListaRps>"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico  Id=""lote"">"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Serie></Serie>"
            MensagemXML = MensagemXML & "<Tipo></Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao></DataEmissao>"
            MensagemXML = MensagemXML & "<Status></Status>"
            MensagemXML = MensagemXML & "<RpsSubstituido>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Serie></Serie>"
            MensagemXML = MensagemXML & "<Tipo></Tipo>"
            MensagemXML = MensagemXML & "</RpsSubstituido>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "<Competencia></Competencia>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos></ValorServicos>"
            MensagemXML = MensagemXML & "<ValorDeducoes></ValorDeducoes>"
            MensagemXML = MensagemXML & "<ValorPis></ValorPis>"
            MensagemXML = MensagemXML & "<ValorCofins></ValorCofins>"
            MensagemXML = MensagemXML & "<ValorInss></ValorInss>"
            MensagemXML = MensagemXML & "<ValorIr></ValorIr>"
            MensagemXML = MensagemXML & "<ValorCsll></ValorCsll>"
            MensagemXML = MensagemXML & "<OutrasRetencoes></OutrasRetencoes>"
            MensagemXML = MensagemXML & "<ValorIss></ValorIss>"
            MensagemXML = MensagemXML & "<Aliquota></Aliquota>"
            MensagemXML = MensagemXML & "<DescontoIncondicionado></DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<DescontoCondicionado></DescontoCondicionado>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<IssRetido></IssRetido>"
            MensagemXML = MensagemXML & "<ResponsavelRetencao></ResponsavelRetencao>"
            MensagemXML = MensagemXML & "<ItemListaServico></ItemListaServico>"
            MensagemXML = MensagemXML & "<CodigoCnae></CodigoCnae>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio></CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<Discriminacao></Discriminacao>"
            MensagemXML = MensagemXML & "<CodigoMunicipio></CodigoMunicipio>"
            MensagemXML = MensagemXML & "<CodigoPais></CodigoPais>"
            MensagemXML = MensagemXML & "<ExigibilidadeIss></ExigibilidadeIss>"
            MensagemXML = MensagemXML & "<MunicipioIncidencia></MunicipioIncidencia>"
            MensagemXML = MensagemXML & "<NumeroProcesso></NumeroProcesso>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial></RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Endereco></Endereco>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Complemento></Complemento>"
            MensagemXML = MensagemXML & "<Bairro></Bairro>"
            MensagemXML = MensagemXML & "<CodigoMunicipio></CodigoMunicipio>"
            MensagemXML = MensagemXML & "<Uf></Uf>"
            MensagemXML = MensagemXML & "<CodigoPais></CodigoPais>"
            MensagemXML = MensagemXML & "<Cep></Cep>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "<Contato>"
            MensagemXML = MensagemXML & "<Telefone></Telefone>"
            MensagemXML = MensagemXML & "<Email></Email>"
            MensagemXML = MensagemXML & "</Contato>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<Intermediario>"
            MensagemXML = MensagemXML & "<IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<RazaoSocial></RazaoSocial>"
            MensagemXML = MensagemXML & "</Intermediario>"
            MensagemXML = MensagemXML & "<ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<CodigoObra></CodigoObra>"
            MensagemXML = MensagemXML & "<Art></Art>"
            MensagemXML = MensagemXML & "</ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<RegimeEspecialTributacao></RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<OptanteSimplesNacional></OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<IncentivoFiscal></IncentivoFiscal>"
            MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</ListaRps>"
            MensagemXML = MensagemXML & "</LoteRps>"
            MensagemXML = MensagemXML & "</EnviarLoteRpsSincronoEnvio>"

        Case Is = "SubstituirNfse"

            MensagemXML = "<SubstituirNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<SubstituicaoNfse Id=""1"">"
            MensagemXML = MensagemXML & "<Pedido>"
            MensagemXML = MensagemXML & "<InfPedidoCancelamento Id=""1"">"
            MensagemXML = MensagemXML & "<IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<CodigoMunicipio></CodigoMunicipio>"
            MensagemXML = MensagemXML & "</IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<CodigoCancelamento></CodigoCancelamento>"
            MensagemXML = MensagemXML & "</InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "</Pedido>"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico  Id=""lote"">"
            MensagemXML = MensagemXML & "<Rps>"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Serie></Serie>"
            MensagemXML = MensagemXML & "<Tipo></Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<DataEmissao></DataEmissao>"
            MensagemXML = MensagemXML & "<Status></Status>"
            MensagemXML = MensagemXML & "<RpsSubstituido>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Serie></Serie>"
            MensagemXML = MensagemXML & "<Tipo></Tipo>"
            MensagemXML = MensagemXML & "</RpsSubstituido>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "<Competencia></Competencia>"
            MensagemXML = MensagemXML & "<Servico>"
            MensagemXML = MensagemXML & "<Valores>"
            MensagemXML = MensagemXML & "<ValorServicos></ValorServicos>"
            MensagemXML = MensagemXML & "<ValorDeducoes></ValorDeducoes>"
            MensagemXML = MensagemXML & "<ValorPis></ValorPis>"
            MensagemXML = MensagemXML & "<ValorCofins></ValorCofins>"
            MensagemXML = MensagemXML & "<ValorInss></ValorInss>"
            MensagemXML = MensagemXML & "<ValorIr></ValorIr>"
            MensagemXML = MensagemXML & "<ValorCsll></ValorCsll>"
            MensagemXML = MensagemXML & "<OutrasRetencoes></OutrasRetencoes>"
            MensagemXML = MensagemXML & "<ValorIss></ValorIss>"
            MensagemXML = MensagemXML & "<Aliquota></Aliquota>"
            MensagemXML = MensagemXML & "<DescontoIncondicionado></DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<DescontoCondicionado></DescontoCondicionado>"
            MensagemXML = MensagemXML & "</Valores>"
            MensagemXML = MensagemXML & "<IssRetido></IssRetido>"
            MensagemXML = MensagemXML & "<ResponsavelRetencao></ResponsavelRetencao>"
            MensagemXML = MensagemXML & "<ItemListaServico></ItemListaServico>"
            MensagemXML = MensagemXML & "<CodigoCnae></CodigoCnae>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio></CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<Discriminacao></Discriminacao>"
            MensagemXML = MensagemXML & "<CodigoMunicipio></CodigoMunicipio>"
            MensagemXML = MensagemXML & "<CodigoPais></CodigoPais>"
            MensagemXML = MensagemXML & "<ExigibilidadeIss></ExigibilidadeIss>"
            MensagemXML = MensagemXML & "<MunicipioIncidencia></MunicipioIncidencia>"
            MensagemXML = MensagemXML & "<NumeroProcesso></NumeroProcesso>"
            MensagemXML = MensagemXML & "</Servico>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<RazaoSocial></RazaoSocial>"
            MensagemXML = MensagemXML & "<Endereco>"
            MensagemXML = MensagemXML & "<Endereco></Endereco>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Complemento></Complemento>"
            MensagemXML = MensagemXML & "<Bairro></Bairro>"
            MensagemXML = MensagemXML & "<CodigoMunicipio></CodigoMunicipio>"
            MensagemXML = MensagemXML & "<Uf></Uf>"
            MensagemXML = MensagemXML & "<CodigoPais></CodigoPais>"
            MensagemXML = MensagemXML & "<Cep></Cep>"
            MensagemXML = MensagemXML & "</Endereco>"
            MensagemXML = MensagemXML & "<Contato>"
            MensagemXML = MensagemXML & "<Telefone></Telefone>"
            MensagemXML = MensagemXML & "<Email></Email>"
            MensagemXML = MensagemXML & "</Contato>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<Intermediario>"
            MensagemXML = MensagemXML & "<IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<RazaoSocial></RazaoSocial>"
            MensagemXML = MensagemXML & "</Intermediario>"
            MensagemXML = MensagemXML & "<ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<CodigoObra></CodigoObra>"
            MensagemXML = MensagemXML & "<Art></Art>"
            MensagemXML = MensagemXML & "</ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<RegimeEspecialTributacao></RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<OptanteSimplesNacional></OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<IncentivoFiscal></IncentivoFiscal>"
            MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</Rps>"
            MensagemXML = MensagemXML & "</SubstituicaoNfse>"
            MensagemXML = MensagemXML & "</SubstituirNfseEnvio>"

        Case Else

            MsgBox "Tipo Não Cadastrado!"
            Stop

    End Select

    Compor_MensagemXML = MensagemXML

    MensagemXML = ""

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String

    Select Case Tipo

        Case Is = "2.01"
            Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd"" versao=""2.01""><versaoDados>2.01</versaoDados></cabecalho>"
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
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Url As String, ReturnCNPJ As String

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Left(Dict_Xml.Item("DataEmissao"), 19), "T", " ", 1), "dd/mm/yyyy")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao")
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("IdentificacaoTomador.CpfCnpj.Cnpj") Then
                    Nodo.innerHTML = Format(Dict_Xml.Item("IdentificacaoTomador.CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Dict_Xml.Item("IdentificacaoTomador.CpfCnpj.Cnpj")
                ElseIf Dict_Xml.Item("Cpf") Then
                    Nodo.innerHTML = Format(Dict_Xml.Item("Cpf"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Dict_Xml.Item("Cpf")
                End If
            End If
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Tomador.RazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Tomador.Endereco.Numero")
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

    Preecher_Template = Array(ReturnCNPJ, htmlDoc.Body.innerHTML)

End Function


*/
}
