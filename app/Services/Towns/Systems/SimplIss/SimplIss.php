<?php

namespace App\Services\Towns\Systems\SimplIss;


class SimplIss
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "PPB", "http://issprudente.sp.gov.br/ws_nfse/nfseservice.svc"  'Prefeitura Presidente Prudente

End Sub

Public Function CancelarNfse(ByVal Login As String, ByVal Senha As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[LOGIN]", Login)
    DadosMsg = Replace(DadosMsg, "[SENHA]", Senha)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Protocolo As String, _
                                 ByVal Login As String, ByVal Senha As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    DadosMsg = Replace(DadosMsg, "[LOGIN]", Login)
    DadosMsg = Replace(DadosMsg, "[SENHA]", Senha)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                              ByVal Data_Final As Date, ByVal Login As String, ByVal Senha As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)

    DadosMsg = Sign_XML(DadosMsg, Used_Companny, "#id=?")
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[LOGIN]", Login)
    DadosMsg = Replace(DadosMsg, "[SENHA]", Senha)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Login As String, ByVal Senha As String, _
                                    ByVal Numero_RPS As String, ByVal Used_Companny As String, Optional ByVal Serie_RPS As String = "1") As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_RPS]", Serie_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[LOGIN]", Login)
    DadosMsg = Replace(DadosMsg, "[SENHA]", Senha)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Protocolo As String, _
                                         ByVal Login As String, ByVal Senha As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_PROTOCOLO]", Protocolo)
    DadosMsg = Replace(DadosMsg, "[LOGIN]", Login)
    DadosMsg = Replace(DadosMsg, "[SENHA]", Senha)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function GerarNfse(ByVal Dados_RPS As Object, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, Dado_RPS As Variant

    Operacao = "GerarNfse"
    DadosMsg = Compor_MensagemXML(Operacao)

    For Each Dado_RPS In Dados_RPS
        DadosMsg = Replace(DadosMsg, Dado_RPS, Dados_RPS(Dado_RPS))
    Next

    DadosMsg = Sign_XML(DadosMsg, Used_Companny, "#id=?")
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps"
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function Versao(ByVal Used_Companny As String) As String

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "Versao"
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)

    Versao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String, Optional ByVal URI As String = "") As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny, URI): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Nothing): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:sis=""http://www.sistema.com.br/Sistema.Ws.Nfse"" xmlns:nfse=""http://www.sistema.com.br/Nfse/arquivos/nfse_3.xsd"" xmlns:xd=""http://www.w3.org/2000/09/xmldsig#"" xmlns:sis1=""http://www.sistema.com.br/Sistema.Ws.Nfse.Cn"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<sis:[Mount_Mensage]>[DadosMsg]</sis:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<sis:CancelarNfseEnvio>"
            MensagemXML = MensagemXML & "<nfse:Pedido>"
            MensagemXML = MensagemXML & "<nfse:InfPedidoCancelamento id=""?"">"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<nfse:CodigoCancelamento>?</nfse:CodigoCancelamento>"
            MensagemXML = MensagemXML & "</nfse:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "</nfse:Pedido>"
            MensagemXML = MensagemXML & "</sis:CancelarNfseEnvio>"
            MensagemXML = MensagemXML & "<sis:pParam>"
            MensagemXML = MensagemXML & "<sis1:P1>[LOGIN]</sis1:P1>"
            MensagemXML = MensagemXML & "<sis1:P2>[SENHA]</sis1:P2>"
            MensagemXML = MensagemXML & "</sis:pParam>"

        Case Is = "ConsultarLoteRps"

            MensagemXML = "<sis:ConsultarLoteRpsEnvio>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Protocolo>[CAMPO_PROTOCOLO]</nfse:Protocolo>"
            MensagemXML = MensagemXML & "</sis:ConsultarLoteRpsEnvio>"
            MensagemXML = MensagemXML & "<sis:pParam>"
            MensagemXML = MensagemXML & "<sis1:P1>[LOGIN]</sis1:P1>"
            MensagemXML = MensagemXML & "<sis1:P2>[SENHA]</sis1:P2>"
            MensagemXML = MensagemXML & "</sis:pParam>"

        Case Is = "ConsultarNfse"

            MensagemXML = "<sis:ConsultarNfseEnvio>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:PeriodoEmissao>"
            MensagemXML = MensagemXML & "<nfse:DataInicial>[CAMPO_DATA_INICIAL]</nfse:DataInicial>"
            MensagemXML = MensagemXML & "<nfse:DataFinal>[CAMPO_DATA_FINAL]</nfse:DataFinal>"
            MensagemXML = MensagemXML & "</nfse:PeriodoEmissao>"
            MensagemXML = MensagemXML & "</sis:ConsultarNfseEnvio>"
            MensagemXML = MensagemXML & "<sis:pParam>"
            MensagemXML = MensagemXML & "<sis1:P1>[LOGIN]</sis1:P1>"
            MensagemXML = MensagemXML & "<sis1:P2>[SENHA]</sis1:P2>"
            MensagemXML = MensagemXML & "</sis:pParam>"

        Case Is = "ConsultarNfsePorRps"

            MensagemXML = MensagemXML & "<sis:ConsultarNfseRpsEnvio>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:Numero>[CAMPO_NUMERO_RPS]</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>[CAMPO_SERIE_RPS]</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo></nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "</sis:ConsultarNfseRpsEnvio>"
            MensagemXML = MensagemXML & "<sis:pParam>"
            MensagemXML = MensagemXML & "<sis1:P1>[LOGIN]</sis1:P1>"
            MensagemXML = MensagemXML & "<sis1:P2>[SENHA]</sis1:P2>"
            MensagemXML = MensagemXML & "</sis:pParam>"

        Case Is = "ConsultarSituacaoLoteRps"

            MensagemXML = MensagemXML & "<sis:ConsultarSituacaoLoteRpsEnvio>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>[CAMPO_CNPJ]</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Protocolo>[CAMPO_PROTOCOLO]</nfse:Protocolo>"
            MensagemXML = MensagemXML & "</sis:ConsultarSituacaoLoteRpsEnvio>"
            MensagemXML = MensagemXML & "<sis:pParam>"
            MensagemXML = MensagemXML & "<sis1:P1>[LOGIN]</sis1:P1>"
            MensagemXML = MensagemXML & "<sis1:P2>[SENHA]</sis1:P2>"
            MensagemXML = MensagemXML & "</sis:pParam>"

        Case Is = "GerarNfse"

            MensagemXML = MensagemXML & "<sis:GerarNovaNfseEnvio>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:InformacaoNfse id=""?"">"
            MensagemXML = MensagemXML & "<nfse:NaturezaOperacao>?</nfse:NaturezaOperacao>"
            MensagemXML = MensagemXML & "<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<nfse:IncentivadorCultural>?</nfse:IncentivadorCultural>"
            MensagemXML = MensagemXML & "<nfse:Status>?</nfse:Status>"
            MensagemXML = MensagemXML & "<nfse:Competencia>?</nfse:Competencia>"
            MensagemXML = MensagemXML & "<nfse:NfseSubstituida>?</nfse:NfseSubstituida>"
            MensagemXML = MensagemXML & "<nfse:OutrasInformacoes>?</nfse:OutrasInformacoes>"
            MensagemXML = MensagemXML & "<nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:ValorServicos>?</nfse:ValorServicos>"
            MensagemXML = MensagemXML & "<nfse:ValorDeducoes>?</nfse:ValorDeducoes>"
            MensagemXML = MensagemXML & "<nfse:ValorPis>?</nfse:ValorPis>"
            MensagemXML = MensagemXML & "<nfse:ValorCofins>?</nfse:ValorCofins>"
            MensagemXML = MensagemXML & "<nfse:ValorInss>?</nfse:ValorInss>"
            MensagemXML = MensagemXML & "<nfse:ValorIr>?</nfse:ValorIr>"
            MensagemXML = MensagemXML & "<nfse:ValorCsll>?</nfse:ValorCsll>"
            MensagemXML = MensagemXML & "<nfse:IssRetido>?</nfse:IssRetido>"
            MensagemXML = MensagemXML & "<nfse:ValorIss>?</nfse:ValorIss>"
            MensagemXML = MensagemXML & "<nfse:ValorIssRetido>?</nfse:ValorIssRetido>"
            MensagemXML = MensagemXML & "<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>"
            MensagemXML = MensagemXML & "<nfse:BaseCalculo>?</nfse:BaseCalculo>"
            MensagemXML = MensagemXML & "<nfse:Aliquota>?</nfse:Aliquota>"
            MensagemXML = MensagemXML & "<nfse:ValorLiquidoNfse>?</nfse:ValorLiquidoNfse>"
            MensagemXML = MensagemXML & "<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>"
            MensagemXML = MensagemXML & "</nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:ItemListaServico>?</nfse:ItemListaServico>"
            MensagemXML = MensagemXML & "<nfse:CodigoCnae>?</nfse:CodigoCnae>"
            MensagemXML = MensagemXML & "<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:Discriminacao>?</nfse:Discriminacao>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:ItensServico>"
            MensagemXML = MensagemXML & "<nfse:Descricao>?</nfse:Descricao>"
            MensagemXML = MensagemXML & "<nfse:Quantidade>?</nfse:Quantidade>"
            MensagemXML = MensagemXML & "<nfse:ValorUnitario>?</nfse:ValorUnitario>"
            MensagemXML = MensagemXML & "<nfse:IssTributavel>?</nfse:IssTributavel>"
            MensagemXML = MensagemXML & "</nfse:ItensServico>"
            MensagemXML = MensagemXML & "</nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Tomador>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:InscricaoEstadual>?</nfse:InscricaoEstadual>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Endereco>?</nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Complemento>?</nfse:Complemento>"
            MensagemXML = MensagemXML & "<nfse:Bairro>?</nfse:Bairro>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:Uf>?</nfse:Uf>"
            MensagemXML = MensagemXML & "<nfse:Cep>?</nfse:Cep>"
            MensagemXML = MensagemXML & "</nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Contato>"
            MensagemXML = MensagemXML & "<nfse:Telefone>?</nfse:Telefone>"
            MensagemXML = MensagemXML & "<nfse:Email>?</nfse:Email>"
            MensagemXML = MensagemXML & "</nfse:Contato>"
            MensagemXML = MensagemXML & "</nfse:Tomador>"
            MensagemXML = MensagemXML & "<nfse:IntermediarioServico>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IntermediarioServico>"
            MensagemXML = MensagemXML & "<nfse:ContrucaoCivil>"
            MensagemXML = MensagemXML & "<nfse:CodigoObra>?</nfse:CodigoObra>"
            MensagemXML = MensagemXML & "<nfse:Art>?</nfse:Art>"
            MensagemXML = MensagemXML & "</nfse:ContrucaoCivil>"
            MensagemXML = MensagemXML & "<nfse:MotivoCancelamento>?</nfse:MotivoCancelamento>"
            MensagemXML = MensagemXML & "</nfse:InformacaoNfse>"
            MensagemXML = MensagemXML & "</sis:GerarNovaNfseEnvio>"
            MensagemXML = MensagemXML & "<sis:pParam>"
            MensagemXML = MensagemXML & "<sis1:P1>?</sis1:P1>"
            MensagemXML = MensagemXML & "<sis1:P2>?</sis1:P2>"
            MensagemXML = MensagemXML & "</sis:pParam>"

        Case Is = "RecepcionarLoteRps"

            MensagemXML = MensagemXML & "<sis:EnviarLoteRpsEnvio>"
            MensagemXML = MensagemXML & "<nfse:LoteRps id=""?"">"
            MensagemXML = MensagemXML & "<nfse:NumeroLote>?</nfse:NumeroLote>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:QuantidadeRps>?</nfse:QuantidadeRps>"
            MensagemXML = MensagemXML & "<nfse:ListaRps>"
            MensagemXML = MensagemXML & "<nfse:Rps>"
            MensagemXML = MensagemXML & "<nfse:InfRps id=""?"">"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>?</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>?</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<nfse:DataEmissao>?</nfse:DataEmissao>"
            MensagemXML = MensagemXML & "<nfse:NaturezaOperacao>?</nfse:NaturezaOperacao>"
            MensagemXML = MensagemXML & "<nfse:RegimeEspecialTributacao>?</nfse:RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<nfse:OptanteSimplesNacional>?</nfse:OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<nfse:IncentivadorCultural>?</nfse:IncentivadorCultural>"
            MensagemXML = MensagemXML & "<nfse:Status>?</nfse:Status>"
            MensagemXML = MensagemXML & "<nfse:RpsSubstituido>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Serie>?</nfse:Serie>"
            MensagemXML = MensagemXML & "<nfse:Tipo>?</nfse:Tipo>"
            MensagemXML = MensagemXML & "</nfse:RpsSubstituido>"
            MensagemXML = MensagemXML & "<nfse:OutrasInformacoes>?</nfse:OutrasInformacoes>"
            MensagemXML = MensagemXML & "<nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:ValorServicos>?</nfse:ValorServicos>"
            MensagemXML = MensagemXML & "<nfse:ValorDeducoes>?</nfse:ValorDeducoes>"
            MensagemXML = MensagemXML & "<nfse:ValorPis>?</nfse:ValorPis>"
            MensagemXML = MensagemXML & "<nfse:ValorCofins>?</nfse:ValorCofins>"
            MensagemXML = MensagemXML & "<nfse:ValorInss>?</nfse:ValorInss>"
            MensagemXML = MensagemXML & "<nfse:ValorIr>?</nfse:ValorIr>"
            MensagemXML = MensagemXML & "<nfse:ValorCsll>?</nfse:ValorCsll>"
            MensagemXML = MensagemXML & "<nfse:IssRetido>?</nfse:IssRetido>"
            MensagemXML = MensagemXML & "<nfse:ValorIss>?</nfse:ValorIss>"
            MensagemXML = MensagemXML & "<nfse:ValorIssRetido>?</nfse:ValorIssRetido>"
            MensagemXML = MensagemXML & "<nfse:OutrasRetencoes>?</nfse:OutrasRetencoes>"
            MensagemXML = MensagemXML & "<nfse:BaseCalculo>?</nfse:BaseCalculo>"
            MensagemXML = MensagemXML & "<nfse:Aliquota>?</nfse:Aliquota>"
            MensagemXML = MensagemXML & "<nfse:ValorLiquidoNfse>?</nfse:ValorLiquidoNfse>"
            MensagemXML = MensagemXML & "<nfse:DescontoIncondicionado>?</nfse:DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<nfse:DescontoCondicionado>?</nfse:DescontoCondicionado>"
            MensagemXML = MensagemXML & "</nfse:Valores>"
            MensagemXML = MensagemXML & "<nfse:ItemListaServico>?</nfse:ItemListaServico>"
            MensagemXML = MensagemXML & "<nfse:CodigoCnae>?</nfse:CodigoCnae>"
            MensagemXML = MensagemXML & "<nfse:CodigoTributacaoMunicipio>?</nfse:CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:Discriminacao>?</nfse:Discriminacao>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:ItensServico>"
            MensagemXML = MensagemXML & "<nfse:Descricao>?</nfse:Descricao>"
            MensagemXML = MensagemXML & "<nfse:Quantidade>?</nfse:Quantidade>"
            MensagemXML = MensagemXML & "<nfse:ValorUnitario>?</nfse:ValorUnitario>"
            MensagemXML = MensagemXML & "<nfse:IssTributavel>?</nfse:IssTributavel>"
            MensagemXML = MensagemXML & "</nfse:ItensServico>"
            MensagemXML = MensagemXML & "</nfse:Servico>"
            MensagemXML = MensagemXML & "<nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:Prestador>"
            MensagemXML = MensagemXML & "<nfse:Tomador>"
            MensagemXML = MensagemXML & "<nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "<nfse:Cpf>?</nfse:Cpf>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<nfse:InscricaoEstadual>?</nfse:InscricaoEstadual>"
            MensagemXML = MensagemXML & "</nfse:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Endereco>?</nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Numero>?</nfse:Numero>"
            MensagemXML = MensagemXML & "<nfse:Complemento>?</nfse:Complemento>"
            MensagemXML = MensagemXML & "<nfse:Bairro>?</nfse:Bairro>"
            MensagemXML = MensagemXML & "<nfse:CodigoMunicipio>?</nfse:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<nfse:Uf>?</nfse:Uf>"
            MensagemXML = MensagemXML & "<nfse:Cep>?</nfse:Cep>"
            MensagemXML = MensagemXML & "</nfse:Endereco>"
            MensagemXML = MensagemXML & "<nfse:Contato>"
            MensagemXML = MensagemXML & "<nfse:Telefone>?</nfse:Telefone>"
            MensagemXML = MensagemXML & "<nfse:Email>?</nfse:Email>"
            MensagemXML = MensagemXML & "</nfse:Contato>"
            MensagemXML = MensagemXML & "</nfse:Tomador>"
            MensagemXML = MensagemXML & "<nfse:IntermediarioServico>"
            MensagemXML = MensagemXML & "<nfse:RazaoSocial>?</nfse:RazaoSocial>"
            MensagemXML = MensagemXML & "<nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:Cnpj>?</nfse:Cnpj>"
            MensagemXML = MensagemXML & "</nfse:CpfCnpj>"
            MensagemXML = MensagemXML & "<nfse:InscricaoMunicipal>?</nfse:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</nfse:IntermediarioServico>"
            MensagemXML = MensagemXML & "<nfse:ContrucaoCivil>"
            MensagemXML = MensagemXML & "<nfse:CodigoObra>?</nfse:CodigoObra>"
            MensagemXML = MensagemXML & "<nfse:Art>?</nfse:Art>"
            MensagemXML = MensagemXML & "</nfse:ContrucaoCivil>"
            MensagemXML = MensagemXML & "</nfse:InfRps>"
            MensagemXML = MensagemXML & "<xd:Signature Id=""?"">"
            MensagemXML = MensagemXML & "<xd:SignedInfo Id=""?"">"
            MensagemXML = MensagemXML & "<xd:CanonicalizationMethod Algorithm=""?"">"
            MensagemXML = MensagemXML & "</xd:CanonicalizationMethod>"
            MensagemXML = MensagemXML & "<xd:SignatureMethod Algorithm=""?"">"
            MensagemXML = MensagemXML & "<xd:HMACOutputLength>?</xd:HMACOutputLength>"
            MensagemXML = MensagemXML & "</xd:SignatureMethod>"
            MensagemXML = MensagemXML & "<xd:Reference Id=""?"" URI=""?"" Type=""?"">"
            MensagemXML = MensagemXML & "<xd:Transforms>"
            MensagemXML = MensagemXML & "<xd:Transform Algorithm=""?"">"
            MensagemXML = MensagemXML & "<xd:XPath>?</xd:XPath>"
            MensagemXML = MensagemXML & "</xd:Transform>"
            MensagemXML = MensagemXML & "</xd:Transforms>"
            MensagemXML = MensagemXML & "<xd:DigestMethod Algorithm=""?"">"
            MensagemXML = MensagemXML & "</xd:DigestMethod>"
            MensagemXML = MensagemXML & "<xd:DigestValue>cid:1331989374900</xd:DigestValue>"
            MensagemXML = MensagemXML & "</xd:Reference>"
            MensagemXML = MensagemXML & "</xd:SignedInfo>"
            MensagemXML = MensagemXML & "<xd:SignatureValue Id=""?"">cid:612364478545</xd:SignatureValue>"
            MensagemXML = MensagemXML & "<xd:KeyInfo Id=""?"">"
            MensagemXML = MensagemXML & "<xd:KeyName>?</xd:KeyName>"
            MensagemXML = MensagemXML & "<xd:KeyValue>"
            MensagemXML = MensagemXML & "<xd:DSAKeyValue>"
            MensagemXML = MensagemXML & "<xd:P>cid:1327201476754</xd:P>"
            MensagemXML = MensagemXML & "<xd:Q>cid:1027982880070</xd:Q>"
            MensagemXML = MensagemXML & "<xd:G>cid:682550760670</xd:G>"
            MensagemXML = MensagemXML & "<xd:Y>cid:331369172142</xd:Y>"
            MensagemXML = MensagemXML & "<xd:J>cid:1302428792960</xd:J>"
            MensagemXML = MensagemXML & "<xd:Seed>cid:368927948045</xd:Seed>"
            MensagemXML = MensagemXML & "<xd:PgenCounter>cid:1485305377021</xd:PgenCounter>"
            MensagemXML = MensagemXML & "</xd:DSAKeyValue>"
            MensagemXML = MensagemXML & "<xd:RSAKeyValue>"
            MensagemXML = MensagemXML & "<xd:Modulus>cid:1217601618151</xd:Modulus>"
            MensagemXML = MensagemXML & "<xd:Exponent>cid:1183520153501</xd:Exponent>"
            MensagemXML = MensagemXML & "</xd:RSAKeyValue>"
            MensagemXML = MensagemXML & "</xd:KeyValue>"
            MensagemXML = MensagemXML & "<xd:MgmtData>?</xd:MgmtData>"
            MensagemXML = MensagemXML & "<xd:PGPData>"
            MensagemXML = MensagemXML & "<xd:PGPKeyID>cid:1547819261841</xd:PGPKeyID>"
            MensagemXML = MensagemXML & "<xd:PGPKeyPacket>cid:615178771587</xd:PGPKeyPacket>"
            MensagemXML = MensagemXML & "</xd:PGPData>"
            MensagemXML = MensagemXML & "<xd:RetrievalMethod URI=""?"" Type=""?"">"
            MensagemXML = MensagemXML & "<xd:Transforms>"
            MensagemXML = MensagemXML & "<xd:Transform Algorithm=""?"">"
            MensagemXML = MensagemXML & "<xd:XPath>?</xd:XPath>"
            MensagemXML = MensagemXML & "</xd:Transform>"
            MensagemXML = MensagemXML & "</xd:Transforms>"
            MensagemXML = MensagemXML & "</xd:RetrievalMethod>"
            MensagemXML = MensagemXML & "<xd:SPKIData>"
            MensagemXML = MensagemXML & "<xd:SPKISexp>cid:1396267945037</xd:SPKISexp>"
            MensagemXML = MensagemXML & "</xd:SPKIData>"
            MensagemXML = MensagemXML & "<xd:X509Data>"
            MensagemXML = MensagemXML & "<xd:X509CRL>cid:217040052326</xd:X509CRL>"
            MensagemXML = MensagemXML & "<xd:X509Certificate>cid:459192275716</xd:X509Certificate>"
            MensagemXML = MensagemXML & "<xd:X509IssuerSerial>"
            MensagemXML = MensagemXML & "<xd:X509IssuerName>?</xd:X509IssuerName>"
            MensagemXML = MensagemXML & "<xd:X509SerialNumber>?</xd:X509SerialNumber>"
            MensagemXML = MensagemXML & "</xd:X509IssuerSerial>"
            MensagemXML = MensagemXML & "<xd:X509SKI>cid:1121771627189</xd:X509SKI>"
            MensagemXML = MensagemXML & "<xd:X509SubjectName>?</xd:X509SubjectName>"
            MensagemXML = MensagemXML & "</xd:X509Data>"
            MensagemXML = MensagemXML & "</xd:KeyInfo>"
            MensagemXML = MensagemXML & "<xd:Object Id=""?"" MimeType=""?"" Encoding=""?"">"
            MensagemXML = MensagemXML & "</xd:Object>"
            MensagemXML = MensagemXML & "</xd:Signature>"
            MensagemXML = MensagemXML & "</nfse:Rps>"
            MensagemXML = MensagemXML & "</nfse:ListaRps>"
            MensagemXML = MensagemXML & "</nfse:LoteRps>"
            MensagemXML = MensagemXML & "</sis:EnviarLoteRpsEnvio>"
            MensagemXML = MensagemXML & "<sis:pParam>"
            MensagemXML = MensagemXML & "<sis1:P1>?</sis1:P1>"
            MensagemXML = MensagemXML & "<sis1:P2>?</sis1:P2>"
            MensagemXML = MensagemXML & "</sis:pParam>"

        Case Else
            MsgBox "Tipo Não Cadastrado!"
            Stop

        End Select

    Compor_MensagemXML = MensagemXML

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

    Dim Item
    For Each Item In Dict_Xml 'Revalidar os campos para preenchimento das notas.
        Debug.Print Item & " " & Dict_Xml(Item)
    Next
    Stop

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("CodigoTributacaoMunicipio"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = "http://visualizar.ginfes.com.br/report/consultarNota?__report=nfs_ver4&cdVerificacao=" & Dict_Xml.Item("CodigoVerificacao") & "&numNota=" & Dict_Xml.Item("Numero") & "&cnpjPrestador=null"

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
