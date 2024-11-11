<?php

namespace App\Services\Towns\IssNetOnline;


class IssNetOnline
{
    /*Private Type ClassType: Link_Prefeitura As String: Codigo_Cidade As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Get Codigo_Cidade() As String: Codigo_Cidade = This.Codigo_Cidade: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Codigo_Cidade = Split(Links_Prefeituras.Item(Value), "|")(1): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "RIB", "https://abrasf.issnetonline.com.br/webserviceabrasf/ribeiraopreto/servicos.asmx|3543402" 'Prefeitura Ribeirão Preto
    Links_Prefeituras.Add "CGB", "https://wscuiaba.issnetonline.com.br/webserviceabrasf/cuiaba/servicos.asmx|5103403" 'Prefeitura Cuiabá
    Links_Prefeituras.Add "RIO", "https://abrasf.issnetonline.com.br/webserviceabrasf/duquedecaxias/servicos.asmx|3301702" 'Prefeitura Duque de Caxias
    Links_Prefeituras.Add "VRE", "https://abrasf.issnetonline.com.br/webserviceabrasf/barramansa/servicos.asmx|3300407" 'Prefeitura Volta Redonda (Barra Mansa)
    Links_Prefeituras.Add "DOU", "https://abrasf.issnetonline.com.br/webserviceabrasf/dourados/servicos.asmx|5003702" 'Prefeitura Dourados

End Sub

Public Function CancelarNfse(ByVal Numero_NF As String, ByVal CNPJ As String, ByVal Inscricao_Municipal As String, _
                             ByVal Codigo_Cancelamento As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "CancelarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO]", Numero_NF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_MUNICIPIO]", Codigo_Cidade)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CANCELAMENTO]", Codigo_Cancelamento)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultaNFSePorRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultaNFSePorRPS": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultaNFSePorRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarDadosCadastrais(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarDadosCadastrais": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarDadosCadastrais = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal DataInicial As Date, _
                              ByVal DataFinal As Date, ByVal Used_Companny As String, Optional ByVal Numero_Nota As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    If Numero_Nota = "" Then DadosMsg = Replace(DadosMsg, "<NumeroNfse>[CAMPO_NUMERO_NOTA]</NumeroNfse>", "") Else DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(DataInicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(DataFinal, "YYYY-MM-DD"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRPS": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarUrlVisualizacaoNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Numero_Nota As String, _
                                             ByVal Used_Companny As String, Optional ByVal Codigo_Tributacao As String = 2) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarUrlVisualizacaoNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_TRIBUTACAO]", Codigo_Tributacao)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarUrlVisualizacaoNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarUrlVisualizacaoNfseSerie(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "ConsultarUrlVisualizacaoNfseSerie": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarUrlVisualizacaoNfseSerie = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String

    Dim SignedXml As z_cls_WsFuncoes

    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "application/soap+xml;charset=UTF-8"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:nfd=""http://www.issnetonline.com.br/webservice/nfd"">"
    Message_Assemble = Message_Assemble & "<soap:Header/>"
    Message_Assemble = Message_Assemble & "<soap:Body>"
    Message_Assemble = Message_Assemble & "<nfd:[Mount_Mensage]><nfd:xml><![CDATA[[DadosMsg]]]></nfd:xml></nfd:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soap:Body>"
    Message_Assemble = Message_Assemble & "</soap:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<p1:CancelarNfseEnvio xmlns:p1=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_cancelar_nfse_envio.xsd"" xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"" xmlns:ts=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_simples.xsd"">"
            MensagemXML = MensagemXML & "<Pedido>"
            MensagemXML = MensagemXML & "<tc:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "<tc:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<tc:Numero>15</tc:Numero>"
            MensagemXML = MensagemXML & "<tc:Cnpj>02956773000171</tc:Cnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>1998010</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<tc:CodigoMunicipio>999</tc:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</tc:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<tc:CodigoCancelamento>5</tc:CodigoCancelamento>"
            MensagemXML = MensagemXML & "</tc:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "Signature"
            MensagemXML = MensagemXML & "</Pedido>"
            MensagemXML = MensagemXML & "</p1:CancelarNfseEnvio>"

        Case Is = "ConsultaNFSePorRPS"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<ConsultarNfseRpsEnvio xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_consultar_nfse_rps_envio.xsd"" xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"" xmlns:ts=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_simples.xsd"">"
            MensagemXML = MensagemXML & "<IdentificacaoRps>"
            MensagemXML = MensagemXML & "<tc:Numero>210</tc:Numero>"
            MensagemXML = MensagemXML & "<tc:Serie>10</tc:Serie>"
            MensagemXML = MensagemXML & "<tc:Tipo>1</tc:Tipo>"
            MensagemXML = MensagemXML & "</IdentificacaoRps>"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cpf>97004731120</tc:Cpf>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>812005</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "</ConsultarNfseRpsEnvio>"

        Case Is = "ConsultarDadosCadastrais"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<ConsultarDadosCadastraisEnvio xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"" xmlns:ts=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_simples.xsd"" xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_consultar_dados_cadastrais_envio.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cnpj>08695055000175</tc:Cnpj>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>6729700</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "</ConsultarDadosCadastraisEnvio>"

        Case Is = "ConsultarLoteRps"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<ConsultarLoteRpsEnvio xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_consultar_lote_rps_envio.xsd"" xmlns:ts=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_simples.xsd"" xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cpf>97004731120</tc:Cpf>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>812005</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo>5afd8f42-cc1e-4657-9249-8fbc3f133ebf</Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarLoteRpsEnvio>"

        Case Is = "ConsultarNfse"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<ConsultarNfseEnvio xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_consultar_nfse_envio.xsd"" xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cnpj>[CAMPO_CNPJ]</tc:Cnpj>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NUMERO_NOTA]</NumeroNfse>"
            MensagemXML = MensagemXML & "<PeriodoEmissao>"
            MensagemXML = MensagemXML & "<DataInicial>[CAMPO_DATA_INICIAL]</DataInicial>"
            MensagemXML = MensagemXML & "<DataFinal>[CAMPO_DATA_FINAL]</DataFinal>"
            MensagemXML = MensagemXML & "</PeriodoEmissao>"
            MensagemXML = MensagemXML & "</ConsultarNfseEnvio>"

        Case Is = "ConsultarSituacaoLoteRPS"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<ConsultarSituacaoLoteRpsEnvio xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_consultar_situacao_lote_rps_envio.xsd"" xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cpf>97004731120</tc:Cpf>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>812005</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo>5e798c53-ec97-44e0-a048-aaa35966afcf</Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarSituacaoLoteRpsEnvio>"

        Case Is = "ConsultarUrlVisualizacaoNfse"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<ConsultarUrlVisualizacaoNfseEnvio xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_consultar_url_visualizacao_nfse_envio.xsd"" xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cnpj>[CAMPO_CNPJ]</tc:Cnpj>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Numero>[CAMPO_NUMERO_NOTA]</Numero>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio>[CAMPO_CODIGO_TRIBUTACAO]</CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "</ConsultarUrlVisualizacaoNfseEnvio>"

        Case Is = "ConsultarUrlVisualizacaoNfseSerie"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<ConsultarUrlVisualizacaoNfseSerieEnvio xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"" xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_consultar_url_visualizacao_nfse_serie_envio.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cnpj>03746864000145</tc:Cnpj>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>812005</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Numero>2748</Numero>"
            MensagemXML = MensagemXML & "<CodigoTributacaoMunicipio>2</CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<CodigoSerie>8</CodigoSerie>"
            MensagemXML = MensagemXML & "</ConsultarUrlVisualizacaoNfseSerieEnvio>"

        Case Is = "RecepcionarLoteRps"

            MensagemXML = "<?xml version=""1.0"" encoding=""utf-8""?>"
            MensagemXML = MensagemXML & "<EnviarLoteRpsEnvio xmlns=""http://www.issnetonline.com.br/webserviceabrasf/vsd/servico_enviar_lote_rps_envio.xsd"" xmlns:tc=""http://www.issnetonline.com.br/webserviceabrasf/vsd/tipos_complexos.xsd"">"
            MensagemXML = MensagemXML & "<LoteRps>"
            MensagemXML = MensagemXML & "<tc:NumeroLote>1</tc:NumeroLote>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cnpj>11006269000100</tc:Cnpj>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>812005</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<tc:QuantidadeRps>1</tc:QuantidadeRps>"
            MensagemXML = MensagemXML & "<tc:ListaRps>"
            MensagemXML = MensagemXML & "<tc:Rps>"
            MensagemXML = MensagemXML & "<tc:InfRps>"
            MensagemXML = MensagemXML & "<tc:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<tc:Numero>215</tc:Numero>"
            MensagemXML = MensagemXML & "<tc:Serie>10</tc:Serie>"
            MensagemXML = MensagemXML & "<tc:Tipo>1</tc:Tipo>"
            MensagemXML = MensagemXML & "</tc:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<tc:DataEmissao>2009-07-24T10:00:00</tc:DataEmissao>"
            MensagemXML = MensagemXML & "<tc:NaturezaOperacao>1</tc:NaturezaOperacao>"
            MensagemXML = MensagemXML & "<tc:OptanteSimplesNacional>2</tc:OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<tc:IncentivadorCultural>2</tc:IncentivadorCultural>"
            MensagemXML = MensagemXML & "<tc:Status>1</tc:Status>"
            MensagemXML = MensagemXML & "<tc:RegimeEspecialTributacao>1</tc:RegimeEspecialTributacao>"
            MensagemXML = MensagemXML & "<tc:Servico>"
            MensagemXML = MensagemXML & "<tc:Valores>"
            MensagemXML = MensagemXML & "<tc:ValorServicos>1100</tc:ValorServicos>"
            MensagemXML = MensagemXML & "<tc:ValorPis>10</tc:ValorPis>"
            MensagemXML = MensagemXML & "<tc:ValorCofins>20</tc:ValorCofins>"
            MensagemXML = MensagemXML & "<tc:ValorInss>30</tc:ValorInss>"
            MensagemXML = MensagemXML & "<tc:ValorIr>40</tc:ValorIr>"
            MensagemXML = MensagemXML & "<tc:ValorCsll>50</tc:ValorCsll>"
            MensagemXML = MensagemXML & "<tc:IssRetido>2</tc:IssRetido>"
            MensagemXML = MensagemXML & "<tc:ValorIss>50</tc:ValorIss>"
            MensagemXML = MensagemXML & "<tc:BaseCalculo>1000</tc:BaseCalculo>"
            MensagemXML = MensagemXML & "<tc:Aliquota>5.00</tc:Aliquota>"
            MensagemXML = MensagemXML & "<tc:ValorLiquidoNfse>850</tc:ValorLiquidoNfse>"
            MensagemXML = MensagemXML & "<tc:DescontoIncondicionado>0</tc:DescontoIncondicionado>"
            MensagemXML = MensagemXML & "<tc:DescontoCondicionado>0</tc:DescontoCondicionado>"
            MensagemXML = MensagemXML & "</tc:Valores>"
            MensagemXML = MensagemXML & "<tc:ItemListaServico>12</tc:ItemListaServico>"
            MensagemXML = MensagemXML & "<tc:CodigoCnae>6311900</tc:CodigoCnae>"
            MensagemXML = MensagemXML & "<tc:CodigoTributacaoMunicipio>45217023</tc:CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<tc:Discriminacao>Teste de RPS - Discriminação com vários caracteres especiais:!@#$%K*()-_=+|\,;:/???</tc:Discriminacao>"
            MensagemXML = MensagemXML & "<tc:MunicipioPrestacaoServico>999</tc:MunicipioPrestacaoServico>"
            MensagemXML = MensagemXML & "</tc:Servico>"
            MensagemXML = MensagemXML & "<tc:Prestador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cnpj>11006269000100</tc:Cnpj>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:InscricaoMunicipal>812005</tc:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</tc:Prestador>"
            MensagemXML = MensagemXML & "<tc:Tomador>"
            MensagemXML = MensagemXML & "<tc:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<tc:CpfCnpj>"
            MensagemXML = MensagemXML & "<tc:Cnpj>38693524000188</tc:Cnpj>"
            MensagemXML = MensagemXML & "</tc:CpfCnpj>"
            MensagemXML = MensagemXML & "</tc:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<tc:RazaoSocial>Empresa do Recife</tc:RazaoSocial>"
            MensagemXML = MensagemXML & "<tc:Endereco>"
            MensagemXML = MensagemXML & "<tc:Endereco>R dos Navegantes 123, 321</tc:Endereco>"
            MensagemXML = MensagemXML & "<tc:Numero>123</tc:Numero>"
            MensagemXML = MensagemXML & "<tc:Complemento>321</tc:Complemento>"
            MensagemXML = MensagemXML & "<tc:Bairro>Boa Viagem</tc:Bairro>"
            MensagemXML = MensagemXML & "<tc:Cidade>261160</tc:Cidade>"
            MensagemXML = MensagemXML & "<tc:Estado>PE</tc:Estado>"
            MensagemXML = MensagemXML & "<tc:Cep>51021010</tc:Cep>"
            MensagemXML = MensagemXML & "</tc:Endereco>"
            MensagemXML = MensagemXML & "</tc:Tomador>"
            MensagemXML = MensagemXML & "</tc:InfRps>"
            MensagemXML = MensagemXML & "</tc:Rps>"
            MensagemXML = MensagemXML & "</tc:ListaRps>"
            MensagemXML = MensagemXML & "</LoteRps>"
            MensagemXML = MensagemXML & "</EnviarLoteRpsEnvio>"

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
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.Cidade"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing

    Url = ""
    'Dict_Xml.Exists("NumeroNfse") Tag Cancelamento

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Estado")
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

    Preecher_Template = Array(Dict_Xml.Item("CpfCnpj.Cnpj"), htmlDoc.Body.innerHTML)

End Function


*/
}
