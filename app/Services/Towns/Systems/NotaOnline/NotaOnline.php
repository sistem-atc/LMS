<?php

namespace App\Services\Towns\Systems\NotaOnline;


class NotaOnline
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "RBR", "https://nota.riobranco.ac.gov.br/ws/nfse203.wsdl" 'Prefeitura Rio Branco

End Sub

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseFaixa(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Password As String, _
                                   ByVal Nota_Inicial As String, ByVal Used_Companny As String, Optional ByVal Nota_Final As String, _
                                   Optional ByVal Pagina As Integer = 1) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseFaixa": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[PASSWORD]", Password)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_FINAL]", Nota_Final)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PAGINA]", Pagina)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Password As String, _
                                 ByVal Numero_RPS As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[PASSWORD]", Password)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[NUMERO_RPS]", Numero_RPS)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseServicoPrestado(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Password As String, _
                                             ByVal Data_Inicial As Date, ByVal Data_Final As Date, ByVal Used_Companny As String, _
                                             Optional ByVal Pagina As Integer = 1, Optional ByVal Numero_Nota As String = "") As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseServicoPrestado": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[PASSWORD]", Password)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PAGINA]", Pagina)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfseServicoTomado(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfseServicoTomado": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoTomado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function EnviarLoteRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function EnviarLoteRpsSincrono(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "EnviarLoteRpsSincrono": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function SubstituirNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "SubstituirNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=utf-8"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:nfse=""http://nfse.webpublico.com.br/iss/nfse_v2_03.xsd"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<nfse:[Mount_Mensage]Envio>[DadosMsg]</nfse:[Mount_Mensage]Envio>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>?</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>?</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:Pedido>"
            MensagemXML = MensagemXML & "<nfse:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<nfse:ChaveAcesso>?</nfse:ChaveAcesso>"
            MensagemXML = MensagemXML & "<nfse:CodigoCancelamento>?</nfse:CodigoCancelamento>"
            MensagemXML = MensagemXML & "</nfse:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "</nfse:Pedido>"

        Case Is = "ConsultarLoteRps"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>?</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>?</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:NumeroLote>?</nfse:NumeroLote>"

        Case Is = "ConsultarNfseFaixa"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>[PASSWORD]</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>false</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:Faixa>"
            MensagemXML = MensagemXML & "<nfse:NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</nfse:NumeroNfseInicial>"
            MensagemXML = MensagemXML & "<nfse:NumeroNfseFinal>[CAMPO_NOTA_FINAL]</nfse:NumeroNfseFinal>"
            MensagemXML = MensagemXML & "</nfse:Faixa>"
            MensagemXML = MensagemXML & "<nfse:Pagina>[CAMPO_PAGINA]</nfse:Pagina>"

        Case Is = "ConsultarNfseRps"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:Numero>[NUMERO_RPS]</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>NF</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>1</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>[PASSWORD]</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>false</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"

        Case Is = "ConsultarNfseServicoPrestado"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>[PASSWORD]</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>false</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:NumeroNfse>[CAMPO_NUMERO_NOTA]</nfse:NumeroNfse>"
            MensagemXML = MensagemXML & "<nfse:PeriodoEmissao>"
            MensagemXML = MensagemXML & "<nfse:DataInicial>[CAMPO_DATA_INICIAL]</nfse:DataInicial>"
            MensagemXML = MensagemXML & "<nfse:DataFinal>[CAMPO_DATA_FINAL]</nfse:DataFinal>"
            MensagemXML = MensagemXML & "</nfse:PeriodoEmissao>"
            MensagemXML = MensagemXML & "<nfse:Pagina>[CAMPO_PAGINA]</nfse:Pagina>"

        Case Is = "ConsultarNfseServicoTomado"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>?</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>?</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:NumeroNfse>?</nfse:NumeroNfse>"
            MensagemXML = MensagemXML & "<nfse:PeriodoEmissao>"
            MensagemXML = MensagemXML & "<nfse:DataInicial>?</nfse:DataInicial>"
            MensagemXML = MensagemXML & "<nfse:DataFinal>?</nfse:DataFinal>"
            MensagemXML = MensagemXML & "</nfse:PeriodoEmissao>"
            MensagemXML = MensagemXML & "<nfse:Pagina>?</nfse:Pagina>"

        Case Is = "EnviarLoteRps"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>?</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>?</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:LoteRps versao=""?"">"
            MensagemXML = MensagemXML & "<nfse:NumeroLote>?</nfse:NumeroLote>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:QuantidadeRps>?</nfse:QuantidadeRps>"
            MensagemXML = MensagemXML & "<nfse:ListaRps>"
            MensagemXML = MensagemXML & "<nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>?</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>?</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:DataEmissao>?</nfse:DataEmissao>"
            MensagemXML = MensagemXML & "<nfse:Status>?</nfse:Status>"
            MensagemXML = MensagemXML & "</nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:Competencia>?</nfse:Competencia>"
            MensagemXML = MensagemXML & "<nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:ValorServicos>?</nfse:ValorServicos>"
            MensagemXML = MensagemXML & "<nfse:ValorDeducoes>?</nfse:ValorDeducoes>"
            MensagemXML = MensagemXML & "<nfse:AliquotaPis>?</nfse:AliquotaPis>"
            MensagemXML = MensagemXML & "<nfse:RetidoPis>?</nfse:RetidoPis>"
            MensagemXML = MensagemXML & "<nfse:ValorPis>?</nfse:ValorPis>"
            MensagemXML = MensagemXML & "<nfse:AliquotaCofins>?</nfse:AliquotaCofins>"
            MensagemXML = MensagemXML & "<nfse:RetidoCofins>?</nfse:RetidoCofins>"
            MensagemXML = MensagemXML & "<nfse:ValorCofins>?</nfse:ValorCofins>"
            MensagemXML = MensagemXML & "<nfse:AliquotaInss>?</nfse:AliquotaInss>"
            MensagemXML = MensagemXML & "<nfse:RetidoInss>?</nfse:RetidoInss>"
            MensagemXML = MensagemXML & "<nfse:ValorInss>?</nfse:ValorInss>"
            MensagemXML = MensagemXML & "<nfse:AliquotaIr>?</nfse:AliquotaIr>"
            MensagemXML = MensagemXML & "<nfse:RetidoIr>?</nfse:RetidoIr>"
            MensagemXML = MensagemXML & "<nfse:ValorIr>?</nfse:ValorIr>"
            MensagemXML = MensagemXML & "<nfse:AliquotaCsll>?</nfse:AliquotaCsll>"
            MensagemXML = MensagemXML & "<nfse:RetidoCsll>?</nfse:RetidoCsll>"
            MensagemXML = MensagemXML & "<nfse:ValorCsll>?</nfse:ValorCsll>"
            MensagemXML = MensagemXML & "<nfse:AliquotaCpp>?</nfse:AliquotaCpp>"
            MensagemXML = MensagemXML & "<nfse:RetidoCpp>?</nfse:RetidoCpp>"
            MensagemXML = MensagemXML & "<nfse:ValorCpp>?</nfse:ValorCpp>"
            MensagemXML = MensagemXML & "<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>"
            MensagemXML = MensagemXML & "<nfse:RetidoOutrasRetencoes>?</nfse:RetidoOutrasRetencoes>"
            MensagemXML = MensagemXML & "<nfse:AliquotaTotTributos>?</nfse:AliquotaTotTributos>"
            MensagemXML = MensagemXML & "<nfse:ValTotTributos>?</nfse:ValTotTributos>"
            MensagemXML = MensagemXML & "<nfse:ValorIss>?</nfse:ValorIss>"
            MensagemXML = MensagemXML & "<nfse:Aliquota>?</nfse:Aliquota>"
            MensagemXML = MensagemXML & "<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>"
            MensagemXML = MensagemXML & "</nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:IssRetido>?</nfse:IssRetido>"
            MensagemXML = MensagemXML & "<nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>"
            MensagemXML = MensagemXML & "<nfse:Discriminacao>?</nfse:Discriminacao>"
            MensagemXML = MensagemXML & "<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:CodigoNbs>?</nfse:CodigoNbs>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:CodigoPais>?</nfse:CodigoPais>"
            MensagemXML = MensagemXML & "<nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>"
            MensagemXML = MensagemXML & "<nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>"
            MensagemXML = MensagemXML & "<nfse:NumeroProcesso>?</nfse:NumeroProcesso>"
            MensagemXML = MensagemXML & "<nfse:ListaItensServico>"
            MensagemXML = MensagemXML & "<nfse:ItemServico>"
            MensagemXML = MensagemXML & "<nfse:ItemListaServico>?</nfse:ItemListaServico>"
            MensagemXML = MensagemXML & "<nfse:CodigoCnae>?</nfse:CodigoCnae>"
            MensagemXML = MensagemXML & "<nfse:Descricao>?</nfse:Descricao>"
            MensagemXML = MensagemXML & "<nfse:Unidade>?</nfse:Unidade>"
            MensagemXML = MensagemXML & "<nfse:Tributavel>?</nfse:Tributavel>"
            MensagemXML = MensagemXML & "<nfse:Quantidade>?</nfse:Quantidade>"
            MensagemXML = MensagemXML & "<nfse:ValorUnitario>?</nfse:ValorUnitario>"
            MensagemXML = MensagemXML & "<nfse:ValorDesconto>?</nfse:ValorDesconto>"
            MensagemXML = MensagemXML & "<nfse:ValorLiquido>?</nfse:ValorLiquido>"
            MensagemXML = MensagemXML & "<nfse:DadosDeducao>"
            MensagemXML = MensagemXML & "<nfse:TipoDeducao>?</nfse:TipoDeducao>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:NumeroNotaFiscalReferencia>?</nfse:NumeroNotaFiscalReferencia>"
            MensagemXML = MensagemXML & "<nfse:ValorTotalNotaFiscal>?</nfse:ValorTotalNotaFiscal>"
            MensagemXML = MensagemXML & "<nfse:PercentualADeduzir>?</nfse:PercentualADeduzir>"
            MensagemXML = MensagemXML & "<nfse:ValorADeduzir>?</nfse:ValorADeduzir>"
            MensagemXML = MensagemXML & "</nfse:DadosDeducao>"
            MensagemXML = MensagemXML & "</nfse:ItemServico>"
            MensagemXML = MensagemXML & "</nfse:ListaItensServico>"
            MensagemXML = MensagemXML & "</nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Tomador>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<nfse:NifTomador>?</nfse:NifTomador>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Endereco>?</nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Complemento>?</nfse:Complemento>"
            MensagemXML = MensagemXML & "<nfse:Bairro>?</nfse:Bairro>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:Uf>?</nfse:Uf>"
            MensagemXML = MensagemXML & "<nfse:CodigoPais>?</nfse:CodigoPais>"
            MensagemXML = MensagemXML & "<nfse:Cep>?</nfse:Cep>"
            MensagemXML = MensagemXML & "</nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Contato>"
            MensagemXML = MensagemXML & "<nfse:Telefone>?</nfse:Telefone>"
            MensagemXML = MensagemXML & "<nfse:Email>?</nfse:Email>"
            MensagemXML = MensagemXML & "</nfse:Contato>"
            MensagemXML = MensagemXML & "<nfse:InscricaoEstadual>?</nfse:InscricaoEstadual>"
            MensagemXML = MensagemXML & "</nfse:Tomador>"
            MensagemXML = MensagemXML & "<nfse:Intermediario>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</nfse:Intermediario>"
            MensagemXML = MensagemXML & "<nfse:ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<nfse:CodigoObra>?</nfse:CodigoObra>"
            MensagemXML = MensagemXML & "<nfse:NumeroAlvaraConstrucao>?</nfse:NumeroAlvaraConstrucao>"
            MensagemXML = MensagemXML & "<nfse:Art>?</nfse:Art>"
            MensagemXML = MensagemXML & "<nfse:Incorporacao>?</nfse:Incorporacao>"
            MensagemXML = MensagemXML & "</nfse:ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>"
            MensagemXML = MensagemXML & "</nfse:InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</nfse:Rps>"
            MensagemXML = MensagemXML & "</nfse:ListaRps>"
            MensagemXML = MensagemXML & "</nfse:LoteRps>"

        Case Is = "EnviarLoteRpsSincrono"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>?</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>?</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:LoteRps versao=""?"">"
            MensagemXML = MensagemXML & "<nfse:NumeroLote>?</nfse:NumeroLote>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:QuantidadeRps>?</nfse:QuantidadeRps>"
            MensagemXML = MensagemXML & "<nfse:ListaRps>"
            MensagemXML = MensagemXML & "<!--1 or more repetitions:-->"
            MensagemXML = MensagemXML & "<nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>?</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>?</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:DataEmissao>?</nfse:DataEmissao>"
            MensagemXML = MensagemXML & "<nfse:Status>?</nfse:Status>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RpsSubstituido>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>?</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>?</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:RpsSubstituido>"
            MensagemXML = MensagemXML & "</nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:Competencia>?</nfse:Competencia>"
            MensagemXML = MensagemXML & "<nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:ValorServicos>?</nfse:ValorServicos>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorDeducoes>?</nfse:ValorDeducoes>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaPis>?</nfse:AliquotaPis>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoPis>?</nfse:RetidoPis>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorPis>?</nfse:ValorPis>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaCofins>?</nfse:AliquotaCofins>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoCofins>?</nfse:RetidoCofins>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorCofins>?</nfse:ValorCofins>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaInss>?</nfse:AliquotaInss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoInss>?</nfse:RetidoInss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorInss>?</nfse:ValorInss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaIr>?</nfse:AliquotaIr>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoIr>?</nfse:RetidoIr>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorIr>?</nfse:ValorIr>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaCsll>?</nfse:AliquotaCsll>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoCsll>?</nfse:RetidoCsll>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorCsll>?</nfse:ValorCsll>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaCpp>?</nfse:AliquotaCpp>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoCpp>?</nfse:RetidoCpp>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorCpp>?</nfse:ValorCpp>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoOutrasRetencoes>?</nfse:RetidoOutrasRetencoes>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaTotTributos>?</nfse:AliquotaTotTributos>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValTotTributos>?</nfse:ValTotTributos>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorIss>?</nfse:ValorIss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Aliquota>?</nfse:Aliquota>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>"
            MensagemXML = MensagemXML & "</nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:IssRetido>?</nfse:IssRetido>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>"
            MensagemXML = MensagemXML & "<nfse:Discriminacao>?</nfse:Discriminacao>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoNbs>?</nfse:CodigoNbs>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoPais>?</nfse:CodigoPais>"
            MensagemXML = MensagemXML & "<nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>"
            MensagemXML = MensagemXML & "<nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NumeroProcesso>?</nfse:NumeroProcesso>"
            MensagemXML = MensagemXML & "<nfse:ListaItensServico>"
            MensagemXML = MensagemXML & "<!--1 or more repetitions:-->"
            MensagemXML = MensagemXML & "<nfse:ItemServico>"
            MensagemXML = MensagemXML & "<nfse:ItemListaServico>?</nfse:ItemListaServico>"
            MensagemXML = MensagemXML & "<nfse:CodigoCnae>?</nfse:CodigoCnae>"
            MensagemXML = MensagemXML & "<nfse:Descricao>?</nfse:Descricao>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Unidade>?</nfse:Unidade>"
            MensagemXML = MensagemXML & "<nfse:Tributavel>?</nfse:Tributavel>"
            MensagemXML = MensagemXML & "<nfse:Quantidade>?</nfse:Quantidade>"
            MensagemXML = MensagemXML & "<nfse:ValorUnitario>?</nfse:ValorUnitario>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorDesconto>?</nfse:ValorDesconto>"
            MensagemXML = MensagemXML & "<nfse:ValorLiquido>?</nfse:ValorLiquido>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:DadosDeducao>"
            MensagemXML = MensagemXML & "<nfse:TipoDeducao>?</nfse:TipoDeducao>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NumeroNotaFiscalReferencia>?</nfse:NumeroNotaFiscalReferencia>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorTotalNotaFiscal>?</nfse:ValorTotalNotaFiscal>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:PercentualADeduzir>?</nfse:PercentualADeduzir>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorADeduzir>?</nfse:ValorADeduzir>"
            MensagemXML = MensagemXML & "</nfse:DadosDeducao>"
            MensagemXML = MensagemXML & "</nfse:ItemServico>"
            MensagemXML = MensagemXML & "</nfse:ListaItensServico>"
            MensagemXML = MensagemXML & "</nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Tomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NifTomador>?</nfse:NifTomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Endereco>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Endereco>?</nfse:Endereco>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Complemento>?</nfse:Complemento>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Bairro>?</nfse:Bairro>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Uf>?</nfse:Uf>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoPais>?</nfse:CodigoPais>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Cep>?</nfse:Cep>"
            MensagemXML = MensagemXML & "</nfse:Endereco>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Contato>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Telefone>?</nfse:Telefone>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Email>?</nfse:Email>"
            MensagemXML = MensagemXML & "</nfse:Contato>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoEstadual>?</nfse:InscricaoEstadual>"
            MensagemXML = MensagemXML & "</nfse:Tomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Intermediario>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</nfse:Intermediario>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoObra>?</nfse:CodigoObra>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NumeroAlvaraConstrucao>?</nfse:NumeroAlvaraConstrucao>"
            MensagemXML = MensagemXML & "<nfse:Art>?</nfse:Art>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Incorporacao>?</nfse:Incorporacao>"
            MensagemXML = MensagemXML & "</nfse:ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>"
            MensagemXML = MensagemXML & "</nfse:InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</nfse:Rps>"
            MensagemXML = MensagemXML & "</nfse:ListaRps>"
            MensagemXML = MensagemXML & "</nfse:LoteRps>"

        Case Is = "SubstituirNfse"

            MensagemXML = MensagemXML & "<nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:Senha>?</nfse:Senha>"
            MensagemXML = MensagemXML & "<nfse:Homologa>?</nfse:Homologa>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRequerente>"
            MensagemXML = MensagemXML & "<nfse:SubstituicaoNfse>"
            MensagemXML = MensagemXML & "<nfse:Pedido>"
            MensagemXML = MensagemXML & "<nfse:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<nfse:ChaveAcesso>?</nfse:ChaveAcesso>"
            MensagemXML = MensagemXML & "<nfse:CodigoCancelamento>?</nfse:CodigoCancelamento>"
            MensagemXML = MensagemXML & "</nfse:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "</nfse:Pedido>"
            MensagemXML = MensagemXML & "<nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>?</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>?</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:DataEmissao>?</nfse:DataEmissao>"
            MensagemXML = MensagemXML & "<nfse:Status>?</nfse:Status>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RpsSubstituido>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>?</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>?</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:RpsSubstituido>"
            MensagemXML = MensagemXML & "</nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:Competencia>?</nfse:Competencia>"
            MensagemXML = MensagemXML & "<nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:ValorServicos>?</nfse:ValorServicos>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorDeducoes>?</nfse:ValorDeducoes>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaPis>?</nfse:AliquotaPis>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoPis>?</nfse:RetidoPis>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorPis>?</nfse:ValorPis>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaCofins>?</nfse:AliquotaCofins>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoCofins>?</nfse:RetidoCofins>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorCofins>?</nfse:ValorCofins>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaInss>?</nfse:AliquotaInss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoInss>?</nfse:RetidoInss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorInss>?</nfse:ValorInss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaIr>?</nfse:AliquotaIr>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoIr>?</nfse:RetidoIr>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorIr>?</nfse:ValorIr>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaCsll>?</nfse:AliquotaCsll>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoCsll>?</nfse:RetidoCsll>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorCsll>?</nfse:ValorCsll>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaCpp>?</nfse:AliquotaCpp>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoCpp>?</nfse:RetidoCpp>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorCpp>?</nfse:ValorCpp>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RetidoOutrasRetencoes>?</nfse:RetidoOutrasRetencoes>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:AliquotaTotTributos>?</nfse:AliquotaTotTributos>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValTotTributos>?</nfse:ValTotTributos>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorIss>?</nfse:ValorIss>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Aliquota>?</nfse:Aliquota>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>"
            MensagemXML = MensagemXML & "</nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:IssRetido>?</nfse:IssRetido>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ResponsavelRetencao>?</nfse:ResponsavelRetencao>"
            MensagemXML = MensagemXML & "<nfse:Discriminacao>?</nfse:Discriminacao>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoNbs>?</nfse:CodigoNbs>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoPais>?</nfse:CodigoPais>"
            MensagemXML = MensagemXML & "<nfse:ExigibilidadeISS>?</nfse:ExigibilidadeISS>"
            MensagemXML = MensagemXML & "<nfse:MunicipioIncidencia>?</nfse:MunicipioIncidencia>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NumeroProcesso>?</nfse:NumeroProcesso>"
            MensagemXML = MensagemXML & "<nfse:ListaItensServico>"
            MensagemXML = MensagemXML & "<!--1 or more repetitions:-->"
            MensagemXML = MensagemXML & "<nfse:ItemServico>"
            MensagemXML = MensagemXML & "<nfse:ItemListaServico>?</nfse:ItemListaServico>"
            MensagemXML = MensagemXML & "<nfse:CodigoCnae>?</nfse:CodigoCnae>"
            MensagemXML = MensagemXML & "<nfse:Descricao>?</nfse:Descricao>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Unidade>?</nfse:Unidade>"
            MensagemXML = MensagemXML & "<nfse:Tributavel>?</nfse:Tributavel>"
            MensagemXML = MensagemXML & "<nfse:Quantidade>?</nfse:Quantidade>"
            MensagemXML = MensagemXML & "<nfse:ValorUnitario>?</nfse:ValorUnitario>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorDesconto>?</nfse:ValorDesconto>"
            MensagemXML = MensagemXML & "<nfse:ValorLiquido>?</nfse:ValorLiquido>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:DadosDeducao>"
            MensagemXML = MensagemXML & "<nfse:TipoDeducao>?</nfse:TipoDeducao>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NumeroNotaFiscalReferencia>?</nfse:NumeroNotaFiscalReferencia>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorTotalNotaFiscal>?</nfse:ValorTotalNotaFiscal>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:PercentualADeduzir>?</nfse:PercentualADeduzir>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ValorADeduzir>?</nfse:ValorADeduzir>"
            MensagemXML = MensagemXML & "</nfse:DadosDeducao>"
            MensagemXML = MensagemXML & "</nfse:ItemServico>"
            MensagemXML = MensagemXML & "</nfse:ListaItensServico>"
            MensagemXML = MensagemXML & "</nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Tomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NifTomador>?</nfse:NifTomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Endereco>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Endereco>?</nfse:Endereco>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Complemento>?</nfse:Complemento>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Bairro>?</nfse:Bairro>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Uf>?</nfse:Uf>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoPais>?</nfse:CodigoPais>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Cep>?</nfse:Cep>"
            MensagemXML = MensagemXML & "</nfse:Endereco>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Contato>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Telefone>?</nfse:Telefone>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Email>?</nfse:Email>"
            MensagemXML = MensagemXML & "</nfse:Contato>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoEstadual>?</nfse:InscricaoEstadual>"
            MensagemXML = MensagemXML & "</nfse:Tomador>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Intermediario>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--You have a CHOICE of the next 2 items at this level-->"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoIntermediario>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</nfse:Intermediario>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:CodigoObra>?</nfse:CodigoObra>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:NumeroAlvaraConstrucao>?</nfse:NumeroAlvaraConstrucao>"
            MensagemXML = MensagemXML & "<nfse:Art>?</nfse:Art>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:Incorporacao>?</nfse:Incorporacao>"
            MensagemXML = MensagemXML & "</nfse:ConstrucaoCivil>"
            MensagemXML = MensagemXML & "<!--Optional:-->"
            MensagemXML = MensagemXML & "<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<nfse:IncentivoFiscal>?</nfse:IncentivoFiscal>"
            MensagemXML = MensagemXML & "</nfse:InfDeclaracaoPrestacaoServico>"
            MensagemXML = MensagemXML & "</nfse:Rps>"
            MensagemXML = MensagemXML & "</nfse:SubstituicaoNfse>"

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
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = "Outras Informacoes: " & Dict_Xml.Item("OutrasInformacoes")
    'CInt(Dict_Xml.Item("Status")) <> 0 Tag Cancelada

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("DataEmissao"), "-", " "), "dd/mm/yyyy hh:mm:ss")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao")
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("RazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Numero")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("Nome Municipio")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("Bairro"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("Cep"), "00000""-""000")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("LinkAutenticacao")
        Set Nodo = .getElementById("outras_informacoes_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Chave de Acesso: " & Dict_Xml.Item("ChaveAcesso")
        Set Nodo = .getElementById("outras_informacoes_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 1, 89)
        Set Nodo = .getElementById("outras_informacoes_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 90, 89)
        Set Nodo = .getElementById("outras_informacoes_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 179, 89)
        Set Nodo = .getElementById("outras_informacoes_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 268, 89)
        Set Nodo = .getElementById("outras_informacoes_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 357, 89)
    End With

    Preecher_Template = Array(Dict_Xml.Item("CpfCnpj.Cnpj"), htmlDoc.Body.innerHTML)

End Function


*/
}
