<?php

namespace App\Services\Towns\Systems\SilTecnologia;


class SilTecnologia
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Codigo_Cidade As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Get Codigo_Cidade() As String: Codigo_Cidade = This.Codigo_Cidade: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Codigo_Cidade = Split(Links_Prefeituras.Item(Value), "|")(1): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "BAU", "https://tributario.bauru.sp.gov.br/services/|0000" 'Prefeitura Bauru
    Links_Prefeituras.Add "BIR", "http://pmbirigui02.smarapd.com.br:9999/smartb/services/|3" 'Prefeitura de Birigui
    Links_Prefeituras.Add "APA", "https://aparecida.siltecnologia.com.br/tbw/services/|0000" 'Prefeitura Aparecida

End Sub

Public Function CancelarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_NF As String, _
                             ByVal Codigo_Cancelamento As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf10?wsdl"
    Operacao = "cancelarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_NF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_MUNICIPIO]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CANCELAMENTO]", Codigo_Cancelamento)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_Protocolo As String, _
                                 ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf10?wsdl"
    Operacao = "consultarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Numero_Protocolo)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfse(ByVal Used_Companny As String) As String

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As Variant

    EndPoint = "Abrasf10?wsdl"
    Operacao = "consultarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_RPS As String, _
                                    ByVal Serie_RPS As String, ByVal Tipo_RPS As TypeRPS, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf10?wsdl"
    Operacao = "consultarNfsePorRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_RPS]", Tipo_RPS)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf10?wsdl"
    Operacao = "consultarSituacaoLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf10?wsdl"
    Operacao = "recepcionarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function cancelarNfse_23(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_NF As String, _
                                ByVal Codigo_Cancelamento As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "cancelarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NF]", Numero_NF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_MUNICIPIO]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CANCELAMENTO]", Codigo_Cancelamento)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    cancelarNfse_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function consultarLoteRps_23(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_Protocolo As String, _
                                    ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "consultarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Numero_Protocolo)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarLoteRps_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function consultarNfsePorFaixa_23(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Nota_Inicial As String, _
                                         ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "consultarNfsePorFaixa"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfsePorFaixa_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function consultarNfsePorRps_23(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_RPS As String, _
                                       ByVal Serie_RPS As String, ByVal Tipo_RPS As TypeRPS, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "consultarNfsePorRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_TIPO_RPS]", Tipo_RPS)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfsePorRps_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function consultarNfseServicoPrestado_23(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                                ByVal Data_Final As Date, ByVal Used_Companny As String, Optional ByVal Numero_Pagina As Long = 1) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "consultarNfseServicoPrestado"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_PAGINA]", Numero_Pagina)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfseServicoPrestado_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function consultarNfseServicoTomado_23(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "consultarNfseServicoTomado"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    consultarNfseServicoTomado_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function gerarNfse_23(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "gerarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    gerarNfse_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function recepcionarLoteRps_23(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "recepcionarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    recepcionarLoteRps_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function recepcionarLoteRpsSincrono_23(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "recepcionarLoteRpsSincrono"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    recepcionarLoteRpsSincrono_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function substituirNfse_23(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "Abrasf23?wsdl"
    Operacao = "substituirNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    substituirNfse_23 = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function consultarAtividades(ByVal Cpf_Usuario As String, ByVal Senha As String, ByVal Inscricao_Municipal As String, _
                                    ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Hash_Senha As String, Operacao As String

    EndPoint = "WSEntrada?wsdl"
    Operacao = "consultarAtividades"
    Hash_Senha = HashSenha(Senha)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "<nfd>[DadosMsg]</nfd>", "")
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_CPF_USUARIO]", Cpf_Usuario)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_HASH_SENHA]", Hash_Senha)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)

    consultarAtividades = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function nfdEntrada(ByVal Cpf_Usuario As String, ByVal Senha As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Hash_Senha As String, Operacao As String, DadosMsg As String

    EndPoint = "WSEntrada?wsdl"
    Operacao = "nfdEntrada"
    Hash_Senha = HashSenha(Senha)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_CPF_USUARIO]", Cpf_Usuario)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_HASH_SENHA]", Hash_Senha)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    nfdEntrada = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function nfdEntradaCancelar(ByVal Cpf_Usuario As String, ByVal Senha As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Hash_Senha As String, Operacao As String, DadosMsg As String

    EndPoint = "WSEntrada?wsdl"
    Operacao = "nfdEntradaCancelar"
    Hash_Senha = HashSenha(Senha)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", "")
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", "")
    DadosMsg = Replace(DadosMsg, "[CAMPO_MOTIVO_CANCELAMENTO]", "")
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_CANCELAMENTO]", "")
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_CPF_USUARIO]", Cpf_Usuario)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_HASH_SENHA]", Hash_Senha)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    nfdEntradaCancelar = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function execute(ByVal Cpf_Usuario As String, ByVal Senha As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Hash_Senha As String, Operacao As String, DadosMsg As String

    EndPoint = "WSInterface?wsdl"
    Operacao = "execute"
    Hash_Senha = HashSenha(Senha)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_CPF_USUARIO]", Cpf_Usuario)
    Mount_Mensage = Replace(Mount_Mensage, "[CAMPO_HASH_SENHA]", Hash_Senha)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    execute = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function nfdSaida(ByVal Cpf_Usuario As String, ByVal Senha As String, ByVal Inscricao_Municipal As String, _
                         ByVal Numero_Recibo As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Hash_Senha As String, Operacao As String, DadosMsg As String

    EndPoint = "WSSaida?wsdl"
    Operacao = "nfdSaida"
    DadosMsg = Compor_MensagemXML(Operacao)
    Hash_Senha = HashSenha(Senha)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CPF_USUARIO]", Cpf_Usuario)
    DadosMsg = Replace(DadosMsg, "[CAMPO_HASH_SENHA]", Hash_Senha)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RECIBO]", Numero_Recibo)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    nfdSaida = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Public Function urlNfd(ByVal Inscricao_Municipal As String, ByVal Numero_Nota As String, ByVal Serie_Nota As String, _
                       ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Mount_Mensage As String, Operacao As String, DadosMsg As String

    EndPoint = "WSUtil?wsdl"
    Operacao = "urlNfd"
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CIDADE]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_NOTA]", Serie_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    urlNfd = Conection(Prefeitura_Utilizada & EndPoint, Mount_Mensage, Used_Companny)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=utf-8"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing

End Function

Private Function Message_Assemble(ByVal Abrasf As Boolean) As String

    If Abrasf Then

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:nfse=""http://nfse.abrasf.org.br"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<nfse:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "<xml><![CDATA[[DadosMsg]]]></xml>"
        Message_Assemble = Message_Assemble & "</nfse:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    Else

        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:web=""http://webservices.sil.com/"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<web:[Mount_Mensage]>[DadosMsg]</web:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    End If

End Function

Private Function HashSenha(ByVal Senha As String) As String

    Dim Conexao As z_cls_WsFuncoes

    Set Conexao = New z_cls_WsFuncoes
        HashSenha = Conexao.SHA1(Senha, True)
    Set Conexao = Nothing

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "cancelarNfse"

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

        Case Is = "consultarLoteRps"
            MensagemXML = "<ConsultarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo></Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarLoteRpsEnvio>"

        Case Is = "consultarNfse"

            Stop 'Montar Mensagem

        Case Is = "consultarSituacaoLoteRps"

            Stop 'Montar Mensagem

        Case Is = "consultarAtividades"

            MensagemXML = "<cpfUsuario>[CAMPO_CPF_USUARIO]</cpfUsuario>"
            MensagemXML = MensagemXML & "<hashSenha>[CAMPO_HASH_SENHA]</hashSenha>"
            MensagemXML = MensagemXML & "<nfd></nfd>"

        Case Is = "consultarNfsePorRps"

            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Numero></Numero>"
            MensagemXML = MensagemXML & "<Serie></Serie>"
            MensagemXML = MensagemXML & "<Tipo></Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "</ConsultarNfseRpsEnvio>"

        Case Is = "consultarNfseServicoTomado"

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

        Case Is = "gerarNfse"

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

        Case Is = "recepcionarLoteRpsSincrono"

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

        Case Is = "nfdEntrada"

            MensagemXML = "<cpfUsuario>[CAMPO_CPF_USUARIO]</cpfUsuario>"
            MensagemXML = MensagemXML & "<hashSenha>[CAMPO_HASH_SENHA]</hashSenha>"
            MensagemXML = MensagemXML & "<nfd><tbnfd>"
            MensagemXML = MensagemXML & "<nfd>"
            MensagemXML = MensagemXML & "<NumEronfd>124</numEronfd>"
            MensagemXML = MensagemXML & "<codseriedocumento>8</codseriedocumento>"
            MensagemXML = MensagemXML & "<codnaturezaoperacao>511</codnaturezaoperacao>"
            MensagemXML = MensagemXML & "<codigocidade>3</codigocidade>"
            MensagemXML = MensagemXML & "<inscricaomunicipalemissor>99999</inscricaomunicipalemissor>"
            MensagemXML = MensagemXML & "<dataemissao>10/05/2010</dataemissao>"
            MensagemXML = MensagemXML & "<razaotomador>SMARapd – ltda.</razaotomador>"
            MensagemXML = MensagemXML & "<nomefantasiatomador> SMARapd </nomefantasiatomador>"
            MensagemXML = MensagemXML & "<enderecotomador>Rua Aurora</enderecotomador>"
            MensagemXML = MensagemXML & "<cidadetomador>Ribeirão Preto</cidadetomador>"
            MensagemXML = MensagemXML & "<estadotomador>SP</estadotomador>"
            MensagemXML = MensagemXML & "<paistomador>Brasil</paistomador>"
            MensagemXML = MensagemXML & "<fonetomador>21119898</fonetomador>"
            MensagemXML = MensagemXML & "<faxtomador />"
            MensagemXML = MensagemXML & "<ceptomador>79010100</ceptomador>"
            MensagemXML = MensagemXML & "<bairrotomador>Centro</bairrotomador>"
            MensagemXML = MensagemXML & "<emailtomador>teste@smarapd.com.br</emailtomador>"
            MensagemXML = MensagemXML & "<cpfcnpjtomador>30669959085741</cpfcnpjtomador>"
            MensagemXML = MensagemXML & "<inscricaoestadualtomador />"
            MensagemXML = MensagemXML & "<inscricaomunicipaltomador />"
            MensagemXML = MensagemXML & "<tbfatura>"
            MensagemXML = MensagemXML & "<fatura>"
            MensagemXML = MensagemXML & "<numfatura>10/2010</numfatura>"
            MensagemXML = MensagemXML & "<vencimentofatura>10/10/2010</vencimentofatura>"
            MensagemXML = MensagemXML & "<valorfatura>100</valorfatura>"
            MensagemXML = MensagemXML & "</fatura>"
            MensagemXML = MensagemXML & "<fatura>"
            MensagemXML = MensagemXML & "<numfatura>11/2010</numfatura>"
            MensagemXML = MensagemXML & "<vencimentofatura>10/11/2010</vencimentofatura>"
            MensagemXML = MensagemXML & "<valorfatura>100</valorfatura>"
            MensagemXML = MensagemXML & "</fatura>"
            MensagemXML = MensagemXML & "<fatura>"
            MensagemXML = MensagemXML & "<numfatura>12/2010</numfatura>"
            MensagemXML = MensagemXML & "<vencimentofatura>10/12/2010</vencimentofatura>"
            MensagemXML = MensagemXML & "<valorfatura>100</valorfatura>"
            MensagemXML = MensagemXML & "</fatura>"
            MensagemXML = MensagemXML & "</tbfatura>"
            MensagemXML = MensagemXML & "<tbservico>"
            MensagemXML = MensagemXML & "<servico>"
            MensagemXML = MensagemXML & "<quantidade>2</quantidade>"
            MensagemXML = MensagemXML & "<descricao>Serviços de Criação de Logomarca</descricao>"
            MensagemXML = MensagemXML & "<codatividade>0101</codatividade>"
            MensagemXML = MensagemXML & "<valorunitario>150</valorunitario>"
            MensagemXML = MensagemXML & "<aliquota>5,5</aliquota>"
            MensagemXML = MensagemXML & "<impostoretido>False</impostoretido>"
            MensagemXML = MensagemXML & "</servico>"
            MensagemXML = MensagemXML & "<servico>"
            MensagemXML = MensagemXML & "<quantidade>1</quantidade>"
            MensagemXML = MensagemXML & "<descricao>Serviços de Criação de Logomarca</descricao>"
            MensagemXML = MensagemXML & "<codatividade>0101</codatividade>"
            MensagemXML = MensagemXML & "<valorunitario>200</valorunitario>"
            MensagemXML = MensagemXML & "<aliquota>5,5</aliquota>"
            MensagemXML = MensagemXML & "<impostoretido>False</impostoretido>"
            MensagemXML = MensagemXML & "</servico>"
            MensagemXML = MensagemXML & "<servico>"
            MensagemXML = MensagemXML & "<quantidade>5</quantidade>"
            MensagemXML = MensagemXML & "<descricao>Serviços de Criação de Logomarca</descricao>"
            MensagemXML = MensagemXML & "<codatividade>8011000</codatividade>"
            MensagemXML = MensagemXML & "<valorunitario>150</valorunitario>"
            MensagemXML = MensagemXML & "<aliquota>5,5</aliquota>"
            MensagemXML = MensagemXML & "<impostoretido>False</impostoretido>"
            MensagemXML = MensagemXML & "</servico>"
            MensagemXML = MensagemXML & "</tbservico>"
            MensagemXML = MensagemXML & "<observacao>Pedido 3258943</observacao>"
            MensagemXML = MensagemXML & "<razaotransportadora />"
            MensagemXML = MensagemXML & "<cpfcnpjtransportadora />"
            MensagemXML = MensagemXML & "<enderecotransportadora />"
            MensagemXML = MensagemXML & "<tipofrete>0</tipofrete>"
            MensagemXML = MensagemXML & "<quantidade>0</quantidade>"
            MensagemXML = MensagemXML & "<especie />"
            MensagemXML = MensagemXML & "<pesoliquido>0</pesoliquido>"
            MensagemXML = MensagemXML & "<pesobruto>0</pesobruto>"
            MensagemXML = MensagemXML & "<pis />"
            MensagemXML = MensagemXML & "<cofins />"
            MensagemXML = MensagemXML & "<csll />"
            MensagemXML = MensagemXML & "<irrf />"
            MensagemXML = MensagemXML & "<inss />"
            MensagemXML = MensagemXML & "<descdeducoesconstrucao />"
            MensagemXML = MensagemXML & "<totaldeducoesconstrucao />"
            MensagemXML = MensagemXML & "<tributadonomunicipio>true</ tributadonomunicipio>"
            MensagemXML = MensagemXML & "<numerort />"
            MensagemXML = MensagemXML & "<codigoseriert />"
            MensagemXML = MensagemXML & "<dataemissaort />"
            MensagemXML = MensagemXML & "</nfd>"
            MensagemXML = MensagemXML & "</tbnfd></nfd>"

        Case Is = "nfdEntradaCancelar"

            MensagemXML = "<cpfUsuario>[CAMPO_CPF_USUARIO]</cpfUsuario>"
            MensagemXML = MensagemXML & "<hashSenha>[CAMPO_HASH_SENHA]</hashSenha>"
            MensagemXML = MensagemXML & "<nfd>"
            MensagemXML = MensagemXML & "<inscricaomunicipalemissor>[CAMPO_INSCRICAO_MUNICIPAL]</inscricaomunicipalemissor>"
            MensagemXML = MensagemXML & "<numeronf>[CAMPO_NUMERO_NOTA]</numeronf>"
            MensagemXML = MensagemXML & "<motivocancelamento>[CAMPO_MOTIVO_CANCELAMENTO]</motivocancelamento>"
            MensagemXML = MensagemXML & "<datacancelamento>[CAMPO_DATA_CANCELAMENTO]</datacancelamento>"
            MensagemXML = MensagemXML & "</nfd>"

        Case Is = "execute"

            MensagemXML = "<usuario>[CAMPO_CPF_USUARIO]</usuario>"
            MensagemXML = MensagemXML & "<hashSenha>[CAMPO_HASH_SENHA]</hashSenha>"
            MensagemXML = MensagemXML & "<codigoMunicipio>[CAMPO_CODIGO_CIDADE]</codigoMunicipio>"
            MensagemXML = MensagemXML & "<xml>[DadosMsg]</xml>"

        Case Is = "consultarNfsePorFaixa"

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

        Case Is = "consultarNfseServicoPrestado"

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

        Case Is = "recepcionarLoteRps"

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

        Case Is = "substituirNfse"

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

        Case Is = "urlNfd"

            MensagemXML = "<codigoMunicipio>[CAMPO_CODIGO_CIDADE]</codigoMunicipio>"
            MensagemXML = MensagemXML & "<numeroNfd>[CAMPO_NUMERO_NOTA]</numeroNfd>"
            MensagemXML = MensagemXML & "<serieNfd>[CAMPO_SERIE_NOTA]</serieNfd>"
            MensagemXML = MensagemXML & "<inscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</inscricaoMunicipal>"

        Case Is = "nfdSaida"

            MensagemXML = "<cpfUsuario>[CAMPO_CPF_USUARIO]</cpfUsuario>"
            MensagemXML = MensagemXML & "<hashSenha>[CAMPO_HASH_SENHA]</hashSenha>"
            MensagemXML = MensagemXML & "<inscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</inscricaoMunicipal>"
            MensagemXML = MensagemXML & "<recibo>[CAMPO_NUMERO_RECIBO]</recibo>"

        Case Else

            MsgBox "Tipo não cadastrado!"

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

    Dim htmlDoc As Object, Nodo As Object, ArrayDescricao As Variant, Functions As z_cls_WsFuncoes, DictUF As Object
    Dim Descricao_Servico As cls_Descricao_Servico, ReturnCNPJ As String, Url As String

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        If Dict_Xml.Item("ItemListaServico") = "185" Or Dict_Xml.Item("ItemListaServico") = "2987" Then
            ArrayDescricao = Descricao_Servico.DescrServ("1104")
        ElseIf Dict_Xml.Item("ItemListaServico") = "3045" Then
            ArrayDescricao = Descricao_Servico.DescrServ("1601")
        Else
            ArrayDescricao = Descricao_Servico.DescrServ("1602")
        End If
    Set Descricao_Servico = Nothing

    Url = ""
    'CInt(Dict_Xml.Item("Status")) <> 1 Tag Cancelada

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
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("Cpf") Then
                    Nodo.innerHTML = Format(Dict_Xml.Item("Cpf"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Dict_Xml.Item("Cpf")
                Else
                    Nodo.innerHTML = Format(Dict_Xml.Item("Cnpj"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Dict_Xml.Item("Cnpj")
                End If
            End If
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("IdentificacaoTomador.RazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Numero")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Endereco")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then
                Set Functions = New z_cls_WsFuncoes: Nodo.innerHTML = Functions.BuscarDadosEndereço(Dict_Xml.Item("Endereco.Cep"))(0): Set Functions = Nothing
            End If
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
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCofins") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCofins"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorCsll") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorCsll"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorInss") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorInss"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorIr") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIr"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("ValorPis") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorPis"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then
                If Filial_Usada = "BIR" And ReturnCNPJ = "47747969000194" Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorLiquidoNfse"), ".", ",") - Replace(Dict_Xml.Item("ValorIss"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorLiquidoNfse"), ".", ","), "R$ #,##0.00")
                End If
            End If
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
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("DescontoIncondicionado") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("DescontoIncondicionado"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("OutrasRetencoes") Then
                    Nodo.innerHTML = Format(Replace(Dict_Xml.Item("OutrasRetencoes"), ".", ","), "R$ #,##0.00")
                Else
                    Nodo.innerHTML = Format(0, "R$ #,##0.00")
                End If
            End If
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
