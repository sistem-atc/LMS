<?php

namespace App\Services\Towns\Systems\NFSe_Portal;


class NFSe_Portal
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
    Links_Prefeituras.Add "MOC", "http://nota.montesclaros.mg.gov.br/NFSe.Portal.Integracao/Services.svc|2.02" 'Prefeitura Montes Claros
    Links_Prefeituras.Add "SQR", "http://sistemas.saquarema.rj.gov.br/NFSe.Portal.Integracao/Services.svc|2.02" 'Prefeitura Saquarema
    Links_Prefeituras.Add "IJU", "http://ijui-portais.govcloud.com.br/NFSe.Portal.Integracao/Services.svc|1.00" 'Prefeitura Ijui
    Links_Prefeituras.Add "URG", "http://uruguaiana-portais.govcloud.com.br/NFSe.Portal.Integracao/Services.svc|2.03" 'Prefeitura Uruguaiana

End Sub

Public Function ConsultarCartaCorrecao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarCartaCorrecao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarCartaCorrecao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                              ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function consultarNfsePorFaixa(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfsePorFaixa": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfsePorFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfsePorRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfseServicoPrestado(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                             ByVal Data_Final As Date, ByVal Used_Companny As String, Optional Pagina As Integer = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseServicoPrestado": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Pagina)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNfseServicoTomado(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseServicoTomado": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoTomado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function CancelarCartaCorrecao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarCartaCorrecao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarCartaCorrecao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarDeclaracaoNota(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarDeclaracaoNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarDeclaracaoNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EntregarDeclaracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EntregarDeclaracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EntregarDeclaracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EntregarDeclaracaoNota(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EntregarDeclaracaoNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EntregarDeclaracaoNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarLoteDeclaracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarLoteDeclaracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteDeclaracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarLoteDeclaracaoNota(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarLoteDeclaracaoNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteDeclaracaoNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarLoteRpsSincrono(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarLoteRpsSincrono": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarReceitaBrutaAcumulada(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarReceitaBrutaAcumulada": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarReceitaBrutaAcumulada = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarRegimeApuracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarRegimeApuracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarRegimeApuracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function GerarCartaCorrecao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "GerarCartaCorrecao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarCartaCorrecao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function GerarManifestacao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "GerarManifestacao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarManifestacao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function GerarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "GerarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function SubstituirNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "SubstituirNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarProtocoloDeclaracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarProtocoloDeclaracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarProtocoloDeclaracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarDeclaracaoAbertura(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarDeclaracaoAbertura": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarDeclaracaoAbertura = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarDeclaracaoEntrega(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarDeclaracaoEntrega": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarDeclaracaoEntrega = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarDeclaracaoNota(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarDeclaracaoNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarDeclaracaoNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarDeclaracaoNotaConsulta(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarDeclaracaoNotaConsulta": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarDeclaracaoNotaConsulta = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarDeclaracaoNumeracaoInutilizado(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarDeclaracaoNumeracaoInutilizado": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarDeclaracaoNumeracaoInutilizado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarDeclaracaoPlanoContas(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarDeclaracaoPlanoContas": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarDeclaracaoPlanoContas = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function EnviarDeclaracaoSimplificada(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarDeclaracaoSimplificada": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarDeclaracaoSimplificada = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNFSeDEISS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNFSeDEISS": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNFSeDEISS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNotasFaltantesNFSeDEISS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNotasFaltantesNFSeDEISS": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNotasFaltantesNFSeDEISS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarNotasPorServico(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNotasPorServico": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNotasPorServico = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ConsultarTodasNotasPorPeriodo(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarTodasNotasPorPeriodo": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarTodasNotasPorPeriodo = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ObterNotasDEISS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ObterNotasDEISS": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ObterNotasDEISS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Public Function ObterNotasIntermediadas(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ObterNotasIntermediadas": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ObterNotasIntermediadas = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Operacao)

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, ByVal Operation As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        Headers.Add "SOAPAction", "http://tempuri.org/INFSEConsultas/" & Operation

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble(Optional V2 As Boolean = False) As String

    If V2 Then

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:tem=""http://tempuri.org/"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<tem:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "<tem:xml><![CDATA[[DadosMsg]]]></tem:xml>"
        Message_Assemble = Message_Assemble & "</tem:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    Else

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:tem=""http://tempuri.org/"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header>"
        Message_Assemble = Message_Assemble & "<tem:cabecalho versao=""?"">"
        Message_Assemble = Message_Assemble & "<tem:versaoDados>" & Versao_Cabecalho & "</tem:versaoDados>"
        Message_Assemble = Message_Assemble & "</tem:cabecalho>"
        Message_Assemble = Message_Assemble & "</soapenv:Header>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<tem:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "<tem:xmlEnvio><![CDATA[[DadosMsg]]]></tem:xmlEnvio>"
        Message_Assemble = Message_Assemble & "</tem:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    End If

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "ConsultarCartaCorrecao"

        Case Is = "ConsultarLoteRps"

        Case Is = "ConsultarNfse"

            MensagemXML = "<ConsultarNfseEnvio>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "</ConsultarNfseEnvio>"

        Case Is = "ConsultarNfsePorFaixa"

        Case Is = "ConsultarNfsePorRps"

        Case Is = "ConsultarNfseServicoPrestado"

            MensagemXML = "<ConsultarNfseServicoPrestadoEnvio>"
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

        Case Is = "ConsultarSituacaoLoteRps"

        Case Is = "CancelarCartaCorrecao"

        Case Is = "CancelarNfse"

        Case Is = "ConsultarDeclaracaoNota"

        Case Is = "EntregarDeclaracao"

        Case Is = "EntregarDeclaracaoNota"

        Case Is = "EnviarLoteDeclaracao"

        Case Is = "EnviarLoteDeclaracaoNota"

        Case Is = "EnviarLoteRpsSincrono"

        Case Is = "EnviarReceitaBrutaAcumulada"

        Case Is = "EnviarRegimeApuracao"

        Case Is = "GerarCartaCorrecao"

        Case Is = "GerarManifestacao"

        Case Is = "GerarNfse"

        Case Is = "RecepcionarLoteRps"

        Case Is = "SubstituirNfse"

        Case Is = "ConsultarProtocoloDeclaracao"

        Case Is = "EnviarDeclaracaoAbertura"

        Case Is = "EnviarDeclaracaoEntrega"

        Case Is = "EnviarDeclaracaoNota"

        Case Is = "EnviarDeclaracaoNotaConsulta"

        Case Is = "EnviarDeclaracaoNumeracaoInutilizado"

        Case Is = "EnviarDeclaracaoPlanoContas"

        Case Is = "EnviarDeclaracaoSimplificada"

        Case Is = "ConsultarNFSeDEISS"

        Case Is = "ConsultarNotasFaltantesNFSeDEISS"

        Case Is = "ConsultarNotasPorServico"

        Case Is = "ConsultarTodasNotasPorPeriodo"

        Case Is = "ObterNotasDEISS"

        Case Is = "ObterNotasIntermediadas"

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

    Dim htmlDoc As Object, Nodo As Object, ArrayDescricao As Variant, Data() As Variant, DictUF As Object, Cod_Mun As String
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Url As String, ReturnCNPJ As String

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    If Dict_Xml.Exists("Endereco.CodigoMunicipio") Then
        Cod_Mun = Dict_Xml.Item("Endereco.CodigoMunicipio")
    Else
        Cod_Mun = Dict_Xml.Item("TomadorServico.Endereco.CodigoMunicipio")
    End If

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("ItemListaServico"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Cod_Mun)
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = Dict_Xml.Item("OutrasInformacoes")
    'CInt(Dict_Xml.Item("Status")) <> 1 Tag Cancelamento

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = UCase(Array_Dados_TNT(11))
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
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("IdentificacaoTomador.CpfCnpj.Cnpj") Then
                    Nodo.innerHTML = Format(Dict_Xml.Item("IdentificacaoTomador.CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Format(Dict_Xml.Item("IdentificacaoTomador.CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
                Else
                    Nodo.innerHTML = Format(Dict_Xml.Item("CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Format(Dict_Xml.Item("CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
                End If
            End If
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("Tomador.RazaoSocial") Then
                    Nodo.innerHTML = Dict_Xml.Item("Tomador.RazaoSocial")
                Else
                    Nodo.innerHTML = Dict_Xml.Item("TomadorServico.RazaoSocial")
                End If
            End If
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("TomadorServico.Endereco.Numero") Then
                    Nodo.innerHTML = Dict_Xml.Item("TomadorServico.Endereco.Numero")
                Else
                    Nodo.innerHTML = Dict_Xml.Item("Tomador.Endereco.Numero")
                End If
            End If
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Endereco")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = UCase(DictUF.Item("Nome Municipio"))
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("Endereco.Bairro"), 20)
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
