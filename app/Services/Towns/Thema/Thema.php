<?php

namespace App\Services\Towns\Thema;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Thema extends LinkTownBase implements LinkTownsInterface,DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    private static string|int|array|null $connection;
    private static SimpleXMLElement $mountMessage;
    private static string $endpoint;
    private static string $operation;
    protected static $headers;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8',
            'SOAPAction' => 'http://www.tinus.com.br/WSNFSE.' . self::$operation . '.' . self::$operation . ''
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return '';
    }

    public function consultarNota(array $data): string|int|array
    {
        return '';
    }

    public function cancelarNota(array $data): string|int|array
    {
        return '';
    }
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Codigo_Cidade As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Private Property Get Codigo_Cidade() As String: Codigo_Cidade = This.Codigo_Cidade: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Codigo_Cidade = Split(Links_Prefeituras.Item(Value), "|")(1): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "PFB", "http://nfse.pmpf.rs.gov.br/thema-nfse/services/|4303103" 'Prefeitura Passo Fundo
    Links_Prefeituras.Add "SCS", "http://nfse.santacruz.rs.gov.br/thema-nfse/services/|4316808" 'Prefeitura Santa Cruz do Sul
    Links_Prefeituras.Add "LJD", "http://nfse.lajeado.rs.gov.br/thema-nfse/services/|4311403" 'Prefeitura de Lageado

End Sub

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEcancelamento.NFSEcancelamentoHttpSoap12Endpoint/"
    Operacao = "cancelarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:nrVersaoXml>3</ser:nrVersaoXml>", "")
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/"
    Operacao = "consultarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                              ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/"
    Operacao = "consultarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD") & "T00:00:01")
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD") & "T23:59:59")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:nrVersaoXml>3</ser:nrVersaoXml>", "")
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/"
    Operacao = "consultarNfsePorRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEconsulta.NFSEconsultaHttpSoap12Endpoint/"
    Operacao = "consultarSituacaoLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/"
    Operacao = "recepcionarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function recepcionarLoteRpsDocumento(ByVal Numero_Documento As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/"
    Operacao = "recepcionarLoteRpsDocumento"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:nrVersaoXml>3</ser:nrVersaoXml>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[NumeroDocumento]", Numero_Documento)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    recepcionarLoteRpsDocumento = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function recepcionarLoteRpsLimitado(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEremessa.NFSEremessaHttpSoap12Endpoint/"
    Operacao = "recepcionarLoteRpsLimitado"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:nrVersaoXml>3</ser:nrVersaoXml>", "")
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    recepcionarLoteRpsLimitado = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function gerarGuiaFaturamentoPrestador(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEguias.NFSEguiasHttpSoap12Endpoint/"
    Operacao = "gerarGuiaFaturamentoPrestador"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "<ser:nrVersaoXml>3</ser:nrVersaoXml>", "")
    Mount_Mensage = Replace(Mount_Mensage, "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    gerarGuiaFaturamentoPrestador = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function retornarDadosCadastrais(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEdadosCadastrais.NFSEdadosCadastraisHttpSoap12Endpoint/"

    Mount_Mensage = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:ser=""http://server.nfse.thema.inf.br"">"
    Mount_Mensage = Mount_Mensage & "<soap:Header/>"
    Mount_Mensage = Mount_Mensage & "<soap:Body>"
    Mount_Mensage = Mount_Mensage & "<ser:cnpjCpf>" + CNPJ + "</ser:cnpjCpf>"
    Mount_Mensage = Mount_Mensage & "</soap:Body>"
    Mount_Mensage = Mount_Mensage & "</soap:Envelope>"

    retornarDadosCadastrais = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function listarMensagens(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, EndPoint As String

    EndPoint = "NFSEmensagens.NFSEmensagensHttpSoap11Endpoint/"

    Mount_Mensage = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:ser=""http://server.nfse.thema.inf.br"">"
    Mount_Mensage = Mount_Mensage & "<soap:Header/>"
    Mount_Mensage = Mount_Mensage & "<soap:Body>"
    Mount_Mensage = Mount_Mensage & "<ser:listarMensagens/>"
    Mount_Mensage = Mount_Mensage & "</soap:Body>"
    Mount_Mensage = Mount_Mensage & "</soap:Envelope>"

    listarMensagens = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Nothing, , True): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:ser=""http://server.nfse.thema.inf.br"">"
    Message_Assemble = Message_Assemble & "<soap:Header/>"
    Message_Assemble = Message_Assemble & "<soap:Body>"
    Message_Assemble = Message_Assemble & "<ser:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<ser:nrVersaoXml>3</ser:nrVersaoXml>"
    Message_Assemble = Message_Assemble & "<ser:xml><![CDATA[[DadosMsg]]]></ser:xml>"
    Message_Assemble = Message_Assemble & "<ser:numeroDocumento>[NumeroDocumento]</ser:numeroDocumento>"
    Message_Assemble = Message_Assemble & "</ser:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soap:Body>"
    Message_Assemble = Message_Assemble & "</soap:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<es:esCancelarNfseEnvio xmlns:es=""http://www.equiplano.com.br/esnfs"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://www.equiplano.com.br/enfs esCancelarNfseEnvio_v01.xsd"">"
            MensagemXML = MensagemXML & "<prestador>"
            MensagemXML = MensagemXML & "<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>"
            MensagemXML = MensagemXML & "<cnpj>12345678901234</cnpj>"
            MensagemXML = MensagemXML & "<idEntidade>136</idEntidade>"
            MensagemXML = MensagemXML & "</prestador>"
            MensagemXML = MensagemXML & "<nrNfse>1</nrNfse>"
            MensagemXML = MensagemXML & "<dsMotivoCancelamento>Cancelamento</dsMotivoCancelamento>"
            MensagemXML = MensagemXML & "</es:esCancelarNfseEnvio>"

        Case Is = "ConsultarLoteRps"

            MensagemXML = "<es:esConsultarLoteRpsEnvio xmlns:es=""http://www.equiplano.com.br/esnfs"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://www.equiplano.com.br/enfs esConsultarLoteRpsEnvio_v01.xsd"">"
            MensagemXML = MensagemXML & "<prestador>"
            MensagemXML = MensagemXML & "<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>"
            MensagemXML = MensagemXML & "<cnpj>12345678901234</cnpj>"
            MensagemXML = MensagemXML & "<idEntidade>136</idEntidade>"
            MensagemXML = MensagemXML & "</prestador>"
            MensagemXML = MensagemXML & "<nrLoteRps>1</nrLoteRps>"
            MensagemXML = MensagemXML & "</es:esConsultarLoteRpsEnvio>"

        Case Is = "consultarNfse"

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

        Case Is = "ConsultarNfsePorRps"

            MensagemXML = "<es:esConsultarNfsePorRpsEnvio xmlns:es=""http://www.equiplano.com.br/esnfs"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://www.equiplano.com.br/enfs esConsultarNfsePorRpsEnvio_v01.xsd"">"
            MensagemXML = MensagemXML & "<rps>"
            MensagemXML = MensagemXML & "<nrRps>1</nrRps>"
            MensagemXML = MensagemXML & "<nrEmissorRps>1</nrEmissorRps>"
            MensagemXML = MensagemXML & "</rps>"
            MensagemXML = MensagemXML & "<prestador>"
            MensagemXML = MensagemXML & "<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>"
            MensagemXML = MensagemXML & "<cnpj>12345678901234</cnpj>"
            MensagemXML = MensagemXML & "<idEntidade>136</idEntidade>"
            MensagemXML = MensagemXML & "</prestador>"
            MensagemXML = MensagemXML & "</es:esConsultarNfsePorRpsEnvio>"

        Case Is = "ConsultarSituacaoLoteRps"

            MensagemXML = "<es:esConsultarSituacaoLoteRpsEnvio xmlns:es=""http://www.equiplano.com.br/esnfs"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://www.equiplano.com.br/enfs esConsultarSituacaoLoteRpsEnvio_v01.xsd"">"
            MensagemXML = MensagemXML & "<prestador>"
            MensagemXML = MensagemXML & "<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>"
            MensagemXML = MensagemXML & "<cnpj>12345678901234</cnpj>"
            MensagemXML = MensagemXML & "<idEntidade>136</idEntidade>"
            MensagemXML = MensagemXML & "</prestador>"
            MensagemXML = MensagemXML & "<nrLoteRps>1</nrLoteRps>"
            MensagemXML = MensagemXML & "</es:esConsultarSituacaoLoteRpsEnvio>"

        Case Is = "RecepcionarLoteRps"

            MensagemXML = "<es:enviarLoteRpsEnvio xmlns:es=""http://www.equiplano.com.br/esnfs"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://www.equiplano.com.br/enfs esRecepcionarLoteRpsEnvio_v01.xsd"">"
            MensagemXML = MensagemXML & "<lote>"
            MensagemXML = MensagemXML & "<!--  nrLote obrigatório  -->"
            MensagemXML = MensagemXML & "<nrLote>1</nrLote>"
            MensagemXML = MensagemXML & "<!--  qtRps obrigatório  -->"
            MensagemXML = MensagemXML & "<qtRps>1</qtRps>"
            MensagemXML = MensagemXML & "<!--  nrVersaoXml obrigatório  -->"
            MensagemXML = MensagemXML & "<nrVersaoXml>1</nrVersaoXml>"
            MensagemXML = MensagemXML & "<prestador>"
            MensagemXML = MensagemXML & "<!--  nrCnpj obrigatório  -->"
            MensagemXML = MensagemXML & "<nrCnpj>99999999999999</nrCnpj>"
            MensagemXML = MensagemXML & "<!--  nrInscricaoMunicipal obrigatório  -->"
            MensagemXML = MensagemXML & "<nrInscricaoMunicipal>123456</nrInscricaoMunicipal>"
            MensagemXML = MensagemXML & "<!--  isOptanteSimplesNacional obrigatório {1=sim, 2=não}  -->"
            MensagemXML = MensagemXML & "<isOptanteSimplesNacional>2</isOptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<!--  idEntidade obrigatório  -->"
            MensagemXML = MensagemXML & "<idEntidade>136</idEntidade>"
            MensagemXML = MensagemXML & "</prestador>    "
            MensagemXML = MensagemXML & "<listaRps>"
            MensagemXML = MensagemXML & "<rps>"
            MensagemXML = MensagemXML & "<!--  nrRps obrigatório  -->"
            MensagemXML = MensagemXML & "<nrRps>4</nrRps>"
            MensagemXML = MensagemXML & "<!--  nrEmissorRps obrigatório  -->"
            MensagemXML = MensagemXML & "<nrEmissorRps>1</nrEmissorRps>"
            MensagemXML = MensagemXML & "<!--  dtEmissaoRps obrigatório  -->"
            MensagemXML = MensagemXML & "<dtEmissaoRps>2009-06-15T10:00:00</dtEmissaoRps>"
            MensagemXML = MensagemXML & "<!--  stRps obrigatório {1=converter, 2=converter e cancelar NFS, 3=cancelar RPS} -->"
            MensagemXML = MensagemXML & "<stRps>1</stRps>"
            MensagemXML = MensagemXML & "<!--  tpTributacao obrigatório {1=tributado no munícipio, 2=em outro munícipio, 3=isento/imune, 4=suspenso/decisão judicial} -->"
            MensagemXML = MensagemXML & "<tpTributacao>1</tpTributacao>"
            MensagemXML = MensagemXML & "<!--  isIssRetido obrigatório {1=sim, 2=não} -->"
            MensagemXML = MensagemXML & "<isIssRetido>2</isIssRetido>"
            MensagemXML = MensagemXML & "<tomador>"
            MensagemXML = MensagemXML & "<documento>"
            MensagemXML = MensagemXML & "<!--  nrDocumento obrigatório  -->"
            MensagemXML = MensagemXML & "<nrDocumento>38693524000188</nrDocumento>"
            MensagemXML = MensagemXML & "<!--  tpDocumento obrigatório {1=cpf, 2=cnpj, 3=estrangeiro} -->"
            MensagemXML = MensagemXML & "<tpDocumento>1</tpDocumento>"
            MensagemXML = MensagemXML & "<!--  dsDocumentoEstrangeiro obrigatório se tpDocumento=3 -->"
            MensagemXML = MensagemXML & "<dsDocumentoEstrangeiro/>"
            MensagemXML = MensagemXML & "</documento>"
            MensagemXML = MensagemXML & "<!--  nmTomador obrigatório  -->"
            MensagemXML = MensagemXML & "<nmTomador>Gancho Serviços Marítimos</nmTomador>"
            MensagemXML = MensagemXML & "<dsEmail>contato@gancho.com.br</dsEmail>"
            MensagemXML = MensagemXML & "<nrInscricaoEstadual>19518744</nrInscricaoEstadual>"
            MensagemXML = MensagemXML & "<nrInscricaoMunicipal>555</nrInscricaoMunicipal>"
            MensagemXML = MensagemXML & "<dsEndereco>R dos Navegantes 123, 321</dsEndereco>"
            MensagemXML = MensagemXML & "<nrEndereco>123</nrEndereco>"
            MensagemXML = MensagemXML & "<dsComplemento>321</dsComplemento>"
            MensagemXML = MensagemXML & "<nmBairro>Boa Viagem</nmBairro> "
            MensagemXML = MensagemXML & "<nrCidadeIbge>261160</nrCidadeIbge>"
            MensagemXML = MensagemXML & "<nmUf>PR</nmUf>"
            MensagemXML = MensagemXML & "<nmCidadeEstrangeira/>"
            MensagemXML = MensagemXML & "<!--  nmPais obrigatório  -->"
            MensagemXML = MensagemXML & "<nmPais>Brasil</nmPais>"
            MensagemXML = MensagemXML & "<nrCep>51021010</nrCep>"
            MensagemXML = MensagemXML & "<nrTelefone>41 99999999</nrTelefone>"
            MensagemXML = MensagemXML & "</tomador>"
            MensagemXML = MensagemXML & "<listaServicos>"
            MensagemXML = MensagemXML & "<servico>"
            MensagemXML = MensagemXML & "<!--  nrServicoItem obrigatório  -->"
            MensagemXML = MensagemXML & "<nrServicoItem>36</nrServicoItem>"
            MensagemXML = MensagemXML & "<!--  nrServicoSubItem obrigatório  -->"
            MensagemXML = MensagemXML & "<nrServicoSubItem>1</nrServicoSubItem>"
            MensagemXML = MensagemXML & "<!--  vlServico obrigatório  -->"
            MensagemXML = MensagemXML & "<vlServico>1100.32</vlServico>"
            MensagemXML = MensagemXML & "<!--  vlAliquota obrigatório  -->"
            MensagemXML = MensagemXML & "<vlAliquota>0.05</vlAliquota>"
            MensagemXML = MensagemXML & "<deducao>"
            MensagemXML = MensagemXML & "<vlDeducao>1.0</vlDeducao>"
            MensagemXML = MensagemXML & "<!--  dsJustificativaDeducao obrigatório Se informado vlDeducao -->"
            MensagemXML = MensagemXML & "<dsJustificativaDeducao>teste</dsJustificativaDeducao>"
            MensagemXML = MensagemXML & "</deducao>"
            MensagemXML = MensagemXML & "<!--  vlBaseCalculo obrigatório  -->"
            MensagemXML = MensagemXML & "<vlBaseCalculo>1100.00</vlBaseCalculo>"
            MensagemXML = MensagemXML & "<!--  vlIssServico obrigatório  -->"
            MensagemXML = MensagemXML & "<vlIssServico>55.02</vlIssServico>"
            MensagemXML = MensagemXML & "<!--  dsDiscriminacaoServico obrigatório  -->"
            MensagemXML = MensagemXML & "<dsDiscriminacaoServico> Teste de RPS - Discriminação do serviço (permite caracteres especiais) </dsDiscriminacaoServico>"
            MensagemXML = MensagemXML & "</servico>"
            MensagemXML = MensagemXML & "</listaServicos>"
            MensagemXML = MensagemXML & "<!--  vlTotalRps obrigatório  -->"
            MensagemXML = MensagemXML & "<vlTotalRps>1100.32</vlTotalRps>"
            MensagemXML = MensagemXML & "<!--  vlLiquidoRps obrigatório  -->"
            MensagemXML = MensagemXML & "<vlLiquidoRps>1100.32</vlLiquidoRps>"
            MensagemXML = MensagemXML & "<retencoes>"
            MensagemXML = MensagemXML & "<vlCofins>20</vlCofins>"
            MensagemXML = MensagemXML & "<vlCsll>50</vlCsll>"
            MensagemXML = MensagemXML & "<vlInss>30</vlInss>"
            MensagemXML = MensagemXML & "<vlIrrf>40</vlIrrf>"
            MensagemXML = MensagemXML & "<vlPis>10</vlPis>"
            MensagemXML = MensagemXML & "<!--  vlIss obrigatório se isIssRetido = 1  -->"
            MensagemXML = MensagemXML & "<vlIss>10</vlIss>"
            MensagemXML = MensagemXML & "<vlAliquotaCofins>2.0</vlAliquotaCofins>"
            MensagemXML = MensagemXML & "<vlAliquotaCsll>3.0</vlAliquotaCsll>"
            MensagemXML = MensagemXML & "<vlAliquotaInss>4.0</vlAliquotaInss>"
            MensagemXML = MensagemXML & "<vlAliquotaIrrf>5.0</vlAliquotaIrrf>"
            MensagemXML = MensagemXML & "<vlAliquotaPis>6.0</vlAliquotaPis>"
            MensagemXML = MensagemXML & "</retencoes>"
            MensagemXML = MensagemXML & "</rps>"
            MensagemXML = MensagemXML & "</listaRps>"
            MensagemXML = MensagemXML & "</lote>"
            MensagemXML = MensagemXML & "</es:enviarLoteRpsEnvio>"

        Case Is = "esStatusWebServices"

            MensagemXML = "?"

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
