<?php

namespace App\Services\Towns\WebIss;

use SimpleXMLElement;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;

class WebIss extends LinkTownBase implements LinkTownsInterface, DevelopInterface
{

    public static function CancelarNfse(ByVal Used_Companny As String): string|int {
        Operacao = "CancelarNfse"
        Mount_Mensage = Message_Assemble
        If Versao_Cabecalho <> "" Then
            CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        End If
        DadosMsg = Compor_MensagemXML(Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        If Versao_Cabecalho <> "" Then
            Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        End If
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }


    public static function ConsultarLoteRps(ByVal Used_Companny As String): string|int {
        Operacao = "ConsultarLoteRps"
        Mount_Mensage = Message_Assemble
        If Versao_Cabecalho <> "" Then
            CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        End If
        DadosMsg = Compor_MensagemXML(Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        If Versao_Cabecalho <> "" Then
            Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        End If
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function ConsultarNfseFaixa(): string|int {
        Operacao = "ConsultarNfseFaixa"
        Mount_Mensage = Message_Assemble
        CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        DadosMsg = Compor_MensagemXML(Operacao)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
        DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        ConsultarNfseFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function ConsultarNfse(): string|int{
        Operacao = "ConsultarNfse"
        Mount_Mensage = Message_Assemble
        CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        DadosMsg = Compor_MensagemXML(Operacao)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
        DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicio, "YYYY-MM-DD"))
        DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
        DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_FISCAL]", Numero_Nota)

        Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        ConsultarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

    }

    public static function ConsultarNfsePorRps(): string|int {
        Operacao = "ConsultarNfsePorRps"
        Mount_Mensage = Message_Assemble
        If Versao_Cabecalho <> "" Then
            CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        End If
        DadosMsg = Compor_MensagemXML(Operacao)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
        DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
        DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        If Versao_Cabecalho <> "" Then
            Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        End If
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function ConsultarNfseServicoPrestado(): string|int {
        Operacao = "ConsultarNfseServicoPrestado"
        Mount_Mensage = Message_Assemble
        CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        DadosMsg = Compor_MensagemXML(Operacao)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
        DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
        DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
        DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Numero_Pagina)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        ConsultarNfseServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function ConsultarNfseServicoTomado(ByVal Used_Companny As String): string|int {
        Operacao = "ConsultarNfseServicoTomado"
        Mount_Mensage = Message_Assemble
        CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        DadosMsg = Compor_MensagemXML(Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        ConsultarNfseServicoTomado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function GerarNfse(ByVal Used_Companny As String): string|int {
        Operacao = "GerarNfse"
        Mount_Mensage = Message_Assemble
        CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        DadosMsg = Compor_MensagemXML(Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function ConsultarSituacaoLoteRPS(ByVal CNPJ As String, ByVal Used_Companny As String): string|int {
        Operacao = "ConsultarSituacaoLoteRps"
        Mount_Mensage = Message_Assemble
        DadosMsg = Compor_MensagemXML(Operacao)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

    }

    public static function RecepcionarLoteRps(ByVal Used_Companny As String): string|int {
        Operacao = "RecepcionarLoteRps"
        Mount_Mensage = Message_Assemble
        If Versao_Cabecalho <> "" Then
            CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        End If
        DadosMsg = Compor_MensagemXML(Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        If Versao_Cabecalho <> "" Then
            Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        End If
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function RecepcionarLoteRpsSincrono(ByVal Used_Companny As String): string|int {
        Operacao = "RecepcionarLoteRpsSincrono"
        Mount_Mensage = Message_Assemble
        CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        DadosMsg = Compor_MensagemXML(Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        RecepcionarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    public static function SubstituirNfse(ByVal Used_Companny As String): string|int {
        Operacao = "SubstituirNfse"
        Mount_Mensage = Message_Assemble
        CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
        DadosMsg = Compor_MensagemXML(Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[NameSpace]", NameSpace)
        Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

        SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, "")

    }

    /*Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, _
                            ByVal Operation As String): string|int {

                            }

        Dim Conexao As cls_Connection, Headers As Object

        Set Headers = CreateObject("Scripting.Dictionary")
            Headers.Add "Content-Type", "text/xml;charset=utf-8"
            If Operation <> "" Then Headers.Add "SOAPAction", "http://tempuri.org/INfseServices/" & Operation

        Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing

    End Function*/

    Private Function Message_Assemble(): SimpleXMLElement | null {
        If Versao_Assemble = 0 Then

            Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""[NameSpace]"" xmlns:nfse=""http://nfse.abrasf.org.br"">"
            Message_Assemble = Message_Assemble & "<soapenv:Header/>"
            Message_Assemble = Message_Assemble & "<soapenv:Body>"
            Message_Assemble = Message_Assemble & "<nfse:[Mount_Mensage]Request>"
            Message_Assemble = Message_Assemble & "<nfseCabecMsg><![CDATA[[CabecMsg]]]></nfseCabecMsg>"
            Message_Assemble = Message_Assemble & "<nfseDadosMsg><![CDATA[[DadosMsg]]]></nfseDadosMsg>"
            Message_Assemble = Message_Assemble & "</nfse:[Mount_Mensage]Request>"
            Message_Assemble = Message_Assemble & "</soapenv:Body>"
            Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

        ElseIf Versao_Assemble = 1 Then

            Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"
            Message_Assemble = Message_Assemble & "<soapenv:Body>"
            Message_Assemble = Message_Assemble & "<ConsultarNfse xmlns=""http://tempuri.org/"">"
            Message_Assemble = Message_Assemble & "<cabec><![CDATA[[CabecMsg]]]></cabec>"
            Message_Assemble = Message_Assemble & "<msg><![CDATA[[DadosMsg]]]></msg>"
            Message_Assemble = Message_Assemble & "</ConsultarNfse>"
            Message_Assemble = Message_Assemble & "</soapenv:Body>"
            Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

        End If

    }

    Private Function Compor_MensagemXML(Tipo As String): string {
        Dim MensagemXML As String

        Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<CancelarNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Pedido>"
            MensagemXML = MensagemXML & "<InfPedidoCancelamento Id=""1"">"
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

            MensagemXML = "<ConsultarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo></Protocolo>"
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

        Case Is = "ConsultarNfse"

            MensagemXML = "<ConsultarNfseEnvio>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NOTA_FISCAL]</NumeroNfse>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "</ConsultarNfseEnvio>"

        Case Is = "ConsultarNfsePorRps"

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero>[CAMPO_NUMERO_RPS]</Numero>"
            MensagemXML = MensagemXML & "<Serie>[CAMPO_SERIE_RPS]</Serie>"
            MensagemXML = MensagemXML & "<Tipo>1</Tipo>"
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

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Consulente>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Consulente>"
            MensagemXML = MensagemXML & "<NumeroNfse></NumeroNfse>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial></DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal></DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "<PeriodoCompetencia>"
            MensagemXML = MensagemXML & "<DataInicial></DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal></DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoCompetencia>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<Intermediario>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Intermediario>"
            MensagemXML = MensagemXML & "<Pagina></Pagina>"
            MensagemXML = MensagemXML & "</ConsultarNfseServicoTomadoEnvio>"

        Case Is = "GerarNfse"

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
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
            MensagemXML = MensagemXML & "</GerarNfseEnvio>"

        Case Is = "ConsultarSituacaoLoteRps"

            MensagemXML = "<ConsultarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo>[CAMPO_PROTOCOLO]</Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarLoteRpsEnvio>"

        Case Is = "RecepcionarLoteRps"

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
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

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<LoteRps  Id=""lote"" versao=""2.02"">"
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

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
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
    }

    Private Function Compor_CabecalhoXML(Tipo As String): string {
        Select Case Tipo

        Case Is = "1.00"
            Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd"" versao=""1.00""><versaoDados>1.00</versaoDados></cabecalho>"
        Case Is = "2.01"
            Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd"" versao=""2.01""><versaoDados>2.01</versaoDados></cabecalho>"
        Case Is = "2.02"
            Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd"" versao=""2.02""><versaoDados>2.02</versaoDados></cabecalho>"
        Case Else
            Compor_CabecalhoXML = ""
        End Select

    }
}
