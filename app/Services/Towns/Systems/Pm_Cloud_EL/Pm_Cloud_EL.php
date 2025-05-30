<?php

namespace App\Services\Towns\Systems\Pm_Cloud_EL;


class Pm_Cloud_EL
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Hash As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Hash() As String: Hash = This.Hash: End Property
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "VIT", "http://es-viana-pm-nfs.cloud.el.com.br:80/RpsService" 'Prefeitura Viana
    Links_Prefeituras.Add "COL", "http://es-colatina-pm-nfs.cloud.el.com.br:80/RpsService" 'Prefeitura Colatina

End Sub

Public Function autenticarContribuinte(ByVal CNPJ As String, ByVal Password As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, XmlDom As Object, objNodes As IXMLDOMNodeList

    Operacao = "autenticarContribuinte": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[PASSWORD]", Password)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    autenticarContribuinte = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

    Set XmlDom = CreateObject("MSXML2.DOMDocument")
        XmlDom.Async = False
            If Not XmlDom.LoadXML(autenticarContribuinte) Then
                Err.Raise XmlDom.parseError.ErrorCode, , XmlDom.parseError.reason
            End If

    Set objNodes = XmlDom.SelectNodes("/S:Envelope/S:Body/ns2:autenticarContribuinteResponse/return")
    This.Hash = objNodes(1).text

End Function

Public Function cancelarNfseEnvio(ByVal CNPJ As String, ByVal Numero_Nota As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfseEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    cancelarNfseEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function CancelarNfseMotivoEnvio(ByVal CNPJ As String, ByVal Password As String, ByVal Numero_Nota As String, _
                                        ByVal Motivo_Cancelamento As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfseMotivoEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[PASSWORD]", Password)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_MOTIVO_CANCELAMENTO]", Motivo_Cancelamento)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfseMotivoEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarCnae(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarCnae": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarCnae = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function consultarLoteRpsEnvio(ByVal CNPJ As String, ByVal Protocolo As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarLoteRpsEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarLoteRpsEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseEnvio(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                   ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function consultarNfseRpsEnvio(ByVal CNPJ As String, ByVal Numero_RPS As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseRpsEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfseRpsEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRpsEnvio(ByVal CNPJ As String, ByVal Protocolo As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRpsEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRpsEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarUltimaRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarUltimaRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarUltimaRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarUltimoLote(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarUltimoLote": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarUltimoLote = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function enviarLoteRpsEnvio(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarLoteRpsEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_HASH]", Hash)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    enviarLoteRpsEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function fecharConexao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "fecharConexao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    fecharConexao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function finalizarSessao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "finalizarSessao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_HASH]", Hash)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    finalizarSessao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ListarServicos116Municipal(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ListarServicos116Municipal": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ListarServicos116Municipal = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ListarServicosMunicipais(ByVal Prefeitura As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ListarServicosMunicipais": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_PREFEITURA]", Prefeitura)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ListarServicosMunicipais = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ListarServicosMunicipaisPrestador(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ListarServicosMunicipaisPrestador": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ListarServicosMunicipaisPrestador = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function requisitarAidf(ByVal CNPJ As String, ByVal Aidf_Inicial As String, ByVal Aidf_Final As String, ByVal Aidf_Tipo As String, _
                               ByVal Aidf_Quantidade As String, ByVal Aidf_Modelo_Serie As String, ByVal Aidf_Quantidade_Vias As String, _
                               ByVal Aidf_NomeGrafica As String, ByVal Aidf_CnpjGrafica As String, ByVal Aidf_Validade As String, _
                               ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "requisitarAidf": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_INICIAL]", Aidf_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_FINAL]", Aidf_Final)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_AIDF]", Aidf_Tipo)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_QUANTIDADE]", Aidf_Quantidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_SERIE]", Aidf_Modelo_Serie)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_QUANTIDADE_VIAS]", Aidf_Quantidade_Vias)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_NOME_GRAFICA]", Aidf_NomeGrafica)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_CNPJ_GRAFICA]", Aidf_CnpjGrafica)
    DadosMsg = Replace(DadosMsg, "[CAMPO_AIDF_VALIDADE]", Aidf_Validade)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    requisitarAidf = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function validarAidf(ByVal Id_Aidf As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "validarAidf": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_ID_AIDF]", Id_Aidf)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    validarAidf = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ValidarLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ValidarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ValidarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function verificarContribuinte(ByVal CNPJ As String, ByVal Password As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "verificarContribuinte": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[PASSWORD]", Password)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    verificarContribuinte = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function verificarEmpresa(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "verificarEmpresa": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    verificarEmpresa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:el=""http://des36.el.com.br:8080/el-issonline/"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<el:[Mount_Mensage]>[DadosMsg]</el:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "autenticarContribuinte"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<senha>[PASSWORD]</senha>"

        Case Is = "CancelarNfseEnvio"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<numeroNfse>[CAMPO_NUMERO_NOTA]</numeroNfse>"

        Case Is = "CancelarNfseMotivoEnvio"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<senha>[PASSWORD]</senha>"
            MensagemXML = MensagemXML & "<numeroNfse>[CAMPO_NUMERO_NOTA]</numeroNfse>"
            MensagemXML = MensagemXML & "<motivoCancelamento>[CAMPO_MOTIVO_CANCELAMENTO]</motivoCancelamento>"

        Case Is = "ConsultarCnae"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"

        Case Is = "ConsultarLoteRpsEnvio"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<numeroProtocolo>[CAMPO_PROTOCOLO]</numeroProtocolo>"

        Case Is = "ConsultarNfseEnvio"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<dataInicial>[CAMPO_DATA_INICIAL]</dataInicial>"
            MensagemXML = MensagemXML & "<dataFinal>[CAMPO_DATA_FINAL]</dataFinal>"

        Case Is = "ConsultarNfseRpsEnvio"

            MensagemXML = "<identificacaoRps>[CAMPO_NUMERO_RPS]</identificacaoRps>"
            MensagemXML = MensagemXML & "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"

        Case Is = "ConsultarSituacaoLoteRpsEnvio"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<numeroProtocolo>[CAMPO_PROTOCOLO]</numeroProtocolo>"

        Case Is = "ConsultarUltimaRps"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"

        Case Is = "ConsultarUltimoLote"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"

        Case Is = "EnviarLoteRpsEnvio"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<hashIdentificador>[CAMPO_HASH]</hashIdentificador>"
            MensagemXML = MensagemXML & "<arquivo>[ADICIONAR ARQUIVO]</arquivo>" 'Falta Arquivo

        Case Is = "fecharConexao"

            MensagemXML = ""

        Case Is = "finalizarSessao"

            MensagemXML = "<hashIdentificador>[CAMPO_HASH]</hashIdentificador>"

        Case Is = "ListarServicos116Municipal"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"

        Case Is = "ListarServicosMunicipais"

            MensagemXML = "<identificacaoPrefeitura>[CAMPO_PREFEITURA]</identificacaoPrefeitura>"

        Case Is = "ListarServicosMunicipaisPrestador"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"

        Case Is = "requisitarAidf"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<numeroInicial>[CAMPO_AIDF_INICIAL]</numeroInicial>"
            MensagemXML = MensagemXML & "<numeroFinal>[CAMPO_AIDF_FINAL]</numeroFinal>"
            MensagemXML = MensagemXML & "<tipo>[CAMPO_TIPO_AIDF]</tipo>"
            MensagemXML = MensagemXML & "<quantidade>[CAMPO_AIDF_QUANTIDADE]</quantidade>"
            MensagemXML = MensagemXML & "<modeloSerie>[CAMPO_AIDF_SERIE]</modeloSerie>"
            MensagemXML = MensagemXML & "<vias>[CAMPO_AIDF_QUANTIDADE_VIAS]</vias>"
            MensagemXML = MensagemXML & "<nomeGrafica>[CAMPO_AIDF_NOME_GRAFICA]</nomeGrafica>"
            MensagemXML = MensagemXML & "<cnpjGrafica>[CAMPO_AIDF_CNPJ_GRAFICA]</cnpjGrafica>"
            MensagemXML = MensagemXML & "<validade>[CAMPO_AIDF_VALIDADE]</validade>"

        Case Is = "validarAidf"

            MensagemXML = "<identificacaoAidf>[CAMPO_ID_AIDF]</identificacaoAidf>"

        Case Is = "ValidarLoteRps"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<arquivo>[ADICIONAR ARQUIVO]</arquivo>" 'Falta Arquivo

        Case Is = "verificarContribuinte"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"
            MensagemXML = MensagemXML & "<senha>[PASSWORD]</senha>"

        Case Is = "verificarEmpresa"

            MensagemXML = "<identificacaoPrestador>[CAMPO_CNPJ]</identificacaoPrestador>"

        Case Else

            MsgBox "Tipo Não Cadastrado!"
            Stop

    End Select

    Compor_MensagemXML = MensagemXML

    MensagemXML = ""

End Function

Private Function Tabela_Erros(ByVal Erro As String) As String

    Select Case Erro
        Case Is = "EL01": Tabela_Erros = "RPS já informado." & "-" & "Para essa Inscrição Municipal/CNPJ, já existe um RPS informado com o mesmo número."
        Case Is = "EL02": Tabela_Erros = "Número do RPS não informado." & "-" & "Informe um número da RPS."
        Case Is = "EL03": Tabela_Erros = "Tipo do RPS não informado." & "-" & "Informe o tipo do RPS"
        Case Is = "EL04": Tabela_Erros = "Campo tipo do RPS inválido." & "-" & "Utilize um dos tipos especificados: 1, 2 ou 3."
        Case Is = "EL05": Tabela_Erros = "Data da emissão do RPS não informada." & "-" & "Informe a Data da emissão do RPS no formato DateTime."
        Case Is = "EL06": Tabela_Erros = "A data da emissão do RPS não poderá ser superior a data de hoje" & "-" & "Informe uma Data da emissão do RPS válida."
        Case Is = "EL07": Tabela_Erros = "Data da emissão do RPS inválida." & "-" & "Informe a Data da emissão do RPS no formato Date."
        Case Is = "EL08": Tabela_Erros = "O valor dos serviços deverá ser superior a R$ 0,00 (zero)." & "-" & "Não é permitido envio de valor de serviços igual a zero."
        Case Is = "EL09": Tabela_Erros = "O valor líquido dos serviços deverá ser superior a R$ 0,00 (zero)." & "-" & "Não é permitido envio de valor líquido dos serviços igual a zero."
        Case Is = "EL10": Tabela_Erros = "Item da lista de Serviço inexistente." & "-" & "Consulte a legislação vigente para saber o item da lista de serviço que deverá ser informado neste campo."
        Case Is = "EL11": Tabela_Erros = "Campo Tipo de Recolhimento inválido." & "-" & "Utilize um dos tipos especificados: N = Normal ou R = Retido na Fonte."
        Case Is = "EL12": Tabela_Erros = "O código de serviço prestado não permite retenção de ISS." & "-" & "Altere o Tipo de Recolhimento."
        Case Is = "EL13": Tabela_Erros = "Item da lista de Serviço não informado para operação." & "-" & "Informe o item relacionado ao serviço prestado nessa operação."
        Case Is = "EL14": Tabela_Erros = "Contribuintes enquadrados como Microempresa Municipal, Estimativa ou Sociedade de Profissionais não podem sofrer retenção de ISS." & "-" & "Não faça a retenção do ISS nos casos de empresas enquadradas como Microempresa, Municipal, Estimativa, Sociedade de Profissionais ou Incentivador Cultural."
        Case Is = "EL15": Tabela_Erros = "Apenas empresas tomadoras de serviços inscritas neste município podem efetuar retenção de ISS." & "-" & "O CNPJ e/ou Inscrição Municipal informada do tomador não foi encontrada na base de dados do município, não sendo permitida a retenção. Acerte o CNPJ e/ou Inscrição Municipal ou altere o campo Tipo Recolhimento para Normal."
        Case Is = "EL16": Tabela_Erros = "O campo descriminação dos Serviços não foi preenchido." & "-" & "O preenchimento da descriminação dos Serviços é obrigatório por lei, devendo ser preenchido adequadamente."
        Case Is = "EL17": Tabela_Erros = "CNPJ não encontrado na base de dados." & "-" & "Confira o número do CNPJ informado. Caso esteja correto o prestador não esta inscrito no município."
        Case Is = "EL18": Tabela_Erros = "CNPJ do prestador não informado." & "-" & "Informe o CNPJ do prestador."
        Case Is = "EL19": Tabela_Erros = "CPF/CNPJ do tomador inválido." & "-" & "Informe o CPF/CNPJ correto do tomador."
        Case Is = "EL20": Tabela_Erros = "O tomador de serviços informado é o próprio prestador." & "-" & "Não é permitido que o tomador seja o mesmo prestador."
        Case Is = "EL21": Tabela_Erros = "O campo logradouro não foi preenchido para um novo tomador." & "-" & "O preenchimento do logradouro é obrigatório para um novo tomador."
        Case Is = "EL22": Tabela_Erros = "O campo localidade não foi preenchido para um novo tomador." & "-" & "O preenchimento da localidade é obrigatório para um novo tomador."
        Case Is = "EL23": Tabela_Erros = "O campo bairro não foi preenchido para um novo tomador." & "-" & "O preenchimento do bairro é obrigatório para um novo tomador."
        Case Is = "EL24": Tabela_Erros = "O preenchimento do bairro é obrigatório para um novo tomador." & "-" & "O preenchimento do uf é obrigatório para um novo tomador."
        Case Is = "EL25": Tabela_Erros = "O campo número não foi preenchido para um novo tomador." & "-" & "O preenchimento do número é obrigatório para um novo tomador."
        Case Is = "EL26": Tabela_Erros = "O campo cep não foi preenchido para um novo tomador." & "-" & "O preenchimento do cep é obrigatório para um novo tomador."
        Case Is = "EL27": Tabela_Erros = "Status do RPS inválido." & "-" & "Utilize um dos tipos: 1 - Normal; 2 - Cancelado."
        Case Is = "EL28": Tabela_Erros = "Quantidade para o serviço da RPS incorreta." & "-" & "Informe a quantidade sobre o serviço correta."
        Case Is = "EL29": Tabela_Erros = "RPS em duplicidade no arquivo enviado." & "-" & "Remova do arquivo o registro de RPS excedente."
        Case Is = "EL30": Tabela_Erros = "Número de lote não informado." & "-" & "Informe o número do lote."
        Case Is = "EL31": Tabela_Erros = "Campo número do RPS informado incorretamente." & "-" & "O campo número do RPS é numérico e deverá ter no máximo 15 caracteres."
        Case Is = "EL32": Tabela_Erros = "Campo valor dos serviços informado incorretamente." & "-" & "O campo valor dos serviços é numérico e deverá ter tamanho máximo de 15,2, ou seja, 15 números inteiros e 2 decimais.Observação: alguns municípios permitem utilizar precisão de até 4 casas decimais. Informar-se junto à Prefeitura para conhecer sua configuração"
        Case Is = "EL33": Tabela_Erros = "Campo valor bruto dos serviços informado incorretamente." & "-" & "O campo valor bruto dos serviços é numérico e deverá ter tamanho máximo de 15,2, ou seja, 15 números inteiros e 2 decimais."
        Case Is = "EL34": Tabela_Erros = "Campo descriminação do Serviço informado incorretamente." & "-" & "O preenchimento do e-mail é obrigatório para um novo tomador."
        Case Is = "EL35": Tabela_Erros = "O campo e-mail não foi preenchido para um novo tomador." & "-" & "O campo descriminação do serviço deverá ter tamanho máximo de 1000 caracteres."
        Case Is = "EL36": Tabela_Erros = "Campo Local da Prestação inválido." & "-" & "Utilize um dos tipos especificados: F = Fora Município ou M = Município."
        Case Is = "EL37": Tabela_Erros = "Campo Alíquota não informado para tributação fora do município." & "-" & "Informe a alíquota do ISS quando o local da prestação for fora do município."
        Case Is = "EL38": Tabela_Erros = "Campo CEP do tomador informado incorretamente." & "-" & "O campo CEP do tomador deverá ter tamanho máximo de 8 caracteres."
        Case Is = "EL39": Tabela_Erros = "Campo UF do tomador informado incorretamente." & "-" & "O campo UF do tomador deverá ter tamanho máximo de 2 caracteres."
        Case Is = "EL40": Tabela_Erros = "Campo E-mail do tomador informado incorretamente." & "-" & "O campo E-mail do tomador deverá ter tamanho máximo de 80 caracteres."
        Case Is = "EL41": Tabela_Erros = "Campo Telefone do tomador informado incorretamente." & "-" & "O campo Telefone do tomador deverá ter tamanho máximo de 11 caracteres."
        Case Is = "EL42": Tabela_Erros = "Campo ValorIssqn não informado para tributação fora do município." & "-" & "Informe o valor de ISS quando tributação for fora do município."
        Case Is = "EL43": Tabela_Erros = "CNPJ do prestador especificado no lote não confere com o prestador informado no RPS." & "-" & "Informe corretamente CNPJ do prestador no lote e no RPS."
        Case Is = "EL44": Tabela_Erros = "Campo Unidade do serviço informado incorretamente." & "-" & "O campo Unidade do Serviço deverá ser preenchido."
        Case Is = "EL45": Tabela_Erros = "Campo Unidade do Serviço informado incorretamente." & "-" & "O campo Unidade do serviço deverá ter tamanho máximo de 20 caracteres."
        Case Is = "EL46": Tabela_Erros = "Campo NumeroLote informado incorretamente." & "-" & "O campo NumeroLote já consta no sistema como enviado."
        Case Is = "EL47": Tabela_Erros = "Número do protocolo de recebimento do lote inexistente na base de dados." & "-" & "Confira se o lote foi enviado e informe o número correto do protocolo de recebimento."
        Case Is = "EL48": Tabela_Erros = "Não existe na base de dados uma NFS-e emitida para o número informado." & "-" & "Informe o número correto da NFS-e."
        Case Is = "EL49": Tabela_Erros = "Número do RPS inválido." & "-" & "Informe um número de RPS que corresponda à sequência utilizada pelo prestador."
        Case Is = "EL50": Tabela_Erros = "Cancelamento inválido." & "-" & "Nota não pode ser cancelada, pois já foi criada uma guia de pagamento para mesma."
        Case Is = "EL51": Tabela_Erros = "Campo Razão Social deve ser preenchido." & "-" & "Campo Razão Social obrigatório."
        Case Is = "EL52": Tabela_Erros = "HASH não informado." & "-" & "Informe o HASH de autenticação do prestador."
        Case Is = "EL53": Tabela_Erros = "HASH não autenticado." & "-" & "É necessário utilizar a autenticação do contribuinte para que seja registrado seu respectivo HASH, ou o mesmo expirou!"
        Case Is = "EL54": Tabela_Erros = "HASH Expirado." & "-" & "Tempo de sessão de seu HASH foi expirado favor autenticar-se novamente!"
        Case Is = "EL55": Tabela_Erros = "Arquivo Inválido" & "-" & "Verifique a estrutura do arquivo se esta nos padrões solicitados!"
        Case Is = "EL56": Tabela_Erros = "Campo OptanteSimplesNacional incorreto." & "-" & "O campo OptanteSimplesNacional, não corresponde com os dados pré cadastrados na prefeitura!"
        Case Is = "EL57": Tabela_Erros = "Campo NaturezaOperacao incorreto." & "-" & "O campo NaturezaOperacao, não corresponde com os dados pré cadastrados na prefeitura!"
        Case Is = "EL58": Tabela_Erros = "Campo RegimeEspecialTributacao incorreto." & "-" & "O campo RegimeEspecialTributacao, não corresponde com os dados pré cadastrados na prefeitura!"
        Case Is = "EL59": Tabela_Erros = "Campo IncentivadorCultural incorreto." & "-" & "O campo IncentivadorCultural, não corresponde com os dados pré cadastrados na prefeitura!"
        Case Is = "EL60": Tabela_Erros = "Substituição de RPS inválida." & "-" & "RPS informada para substituição, não existe ou não pode ser substituida!"
        Case Is = "EL61": Tabela_Erros = "Campo Aliquota inválido." & "-" & "Esta Alíquota não é permitida, favor informar um valo válido!"
        Case Is = "EL62": Tabela_Erros = "Campo Aliquota inválido." & "-" & "O campo Alíquota não corresponde com a Alíquota pré cadastrada na prefeitura!"
        Case Is = "EL63": Tabela_Erros = "Usuário Bloqueado." & "-" & "Seu usuário encontra-se Bloqueado, contate o administrador do Sistema!"
        Case Is = "EL64": Tabela_Erros = "Quantidade de Itens Inválido." & "-" & "Você ultrapassou a quantidade máxima permitida de itens de uma nota estabelecida pela prefeitura!"
        Case Is = "EL65": Tabela_Erros = "RazaoSocial incorreto." & "-" & "Para essa Inscrição Municipal/CNPJ, já existe um RPS informado com o mesmo número."
        Case Is = "EL66": Tabela_Erros = "Tomador incorreto." & "-" & "Tomador não configurado como substituto tributário, contate o administrador do sistema!"
        Case Is = "EL67": Tabela_Erros = "Campo OptanteSimplesNacional incorreto." & "-" & "O campo OptanteSimplesNacional, não corresponde com os dados pré cadastrados na prefeitura!"
        Case Is = "EL68": Tabela_Erros = "Aviso Lote em Processamento." & "-" & "Lote RPS encontra-se na fila de processamento de conversão para Nota Fiscal!"
        Case Is = "EL69": Tabela_Erros = "Configuração inválida." & "-" & "Sistema não está configurado para Tomador como Não Informado!"
        Case Else: Tabela_Erros = "Erro não Cadastrado!"
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

    Stop 'Necessita do Modulo E-Cold Funcionando

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("ItemListaServico"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("TomadorServico.Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = "http://visualizar.ginfes.com.br/report/consultarNota?__report=nfs_ver4&cdVerificacao=" & Dict_Xml.Item("CodigoVerificacao") & "&numNota=" & Dict_Xml.Item("Numero") & "&cnpjPrestador=null"
    'Dict_Xml.Item("situacao") <> "A" Tag Cancelamento

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("numero")
        Set Nodo = .getElementById("data_emissao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Left(Dict_Xml.Item("dataProcessamento"), 19), "T", " ", 1), "dd/mm/yyyy hh:mm:ss")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("idRps")
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
