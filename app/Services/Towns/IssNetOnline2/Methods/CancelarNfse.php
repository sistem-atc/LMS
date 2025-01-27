<?php

namespace App\Services\Towns\IssNetOnline2\Methods;

trait CancelarNfse
{

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
}
