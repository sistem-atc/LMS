<?php

namespace App\Services\Towns\IssNetOnline2\Methods;

trait ConsultarDadosCadastrais
{

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

}
