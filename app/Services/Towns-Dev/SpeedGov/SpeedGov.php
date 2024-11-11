<?php

namespace App\Services\Towns\SpeedGov;


class SpeedGov
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
    Links_Prefeituras.Add "HOM", "http://speedgov.com.br/wsmod/Nfes|1.0" 'Ambiente de Homologação
    Links_Prefeituras.Add "SOB", "http://speedgov.com.br/wssbr/Nfes|1.0" 'Prefeitura Sobral
    Links_Prefeituras.Add "JDO", "http://speedgov.com.br/wsjun/Nfes|1.0" 'Prefeitura Juazeiro do Norte
    Links_Prefeituras.Add "OBI", "http://speedgov.com.br/wsobi/Nfes|1.0" 'Prefeitura Obidos
    Links_Prefeituras.Add "VIC", "http://speedgov.com.br/wsvic/Nfes|1.0" 'Prefeitura Viçosa
    Links_Prefeituras.Add "ACA", "http://speedgov.com.br/wsaca/Nfes|1.0" 'Prefeitura Acarau
    Links_Prefeituras.Add "ACO", "http://speedgov.com.br/wsaco/Nfes|1.0" 'Prefeitura Acopiara
    Links_Prefeituras.Add "AMO", "http://speedgov.com.br/wsamo/Nfes|1.0" 'Prefeitura Amontada
    Links_Prefeituras.Add "ARA", "http://speedgov.com.br/wsarc/Nfes|1.0" 'Prefeitura Aracati
    Links_Prefeituras.Add "AQI", "http://speedgov.com.br/wsaqz/Nfes|1.0" 'Prefeitura Aquiraz
    Links_Prefeituras.Add "BDC", "http://speedgov.com.br/wsbar/Nfes|1.0" 'Prefeitura Barra do Corda
    Links_Prefeituras.Add "BAR", "http://speedgov.com.br/wsbco/Nfes|1.0" 'Prefeitura Barbalha
    Links_Prefeituras.Add "BEB", "http://speedgov.com.br/wsbeb/Nfes|1.0" 'Prefeitura Beberibe
    Links_Prefeituras.Add "CAN", "http://speedgov.com.br/wscac/Nfes|1.0" 'Prefeitura Caninde
    Links_Prefeituras.Add "CAC", "http://speedgov.com.br/wscas/Nfes|1.0" 'Prefeitura Cacule
    Links_Prefeituras.Add "CAS", "http://speedgov.com.br/wscau/Nfes|1.0" 'Prefeitura Cascavel
    Links_Prefeituras.Add "CAU", "http://speedgov.com.br/wscra/Nfes|1.0" 'Prefeitura Caucaia
    Links_Prefeituras.Add "CRE", "http://speedgov.com.br/wscrt/Nfes|1.0" 'Prefeitura Crateus
    Links_Prefeituras.Add "CRA", "http://speedgov.com.br/wscan/Nfes|1.0" 'Prefeitura Crato
    Links_Prefeituras.Add "EUS", "http://speedgov.com.br/wseus/Nfes|1.0" 'Prefeitura Eusebio
    Links_Prefeituras.Add "HOR", "http://speedgov.com.br/wshor/Nfes|1.0" 'Prefeitura Horizonte
    Links_Prefeituras.Add "GUA", "http://speedgov.com.br/wsgua/Nfes|1.0" 'Prefeitura Guaraciaba
    Links_Prefeituras.Add "GRA", "http://speedgov.com.br/wsgra/Nfes|1.0" 'Prefeitura Grajau
    Links_Prefeituras.Add "ITA", "http://speedgov.com.br/wsita/Nfes|1.0" 'Prefeitura Itaitinga
    Links_Prefeituras.Add "IGU", "http://speedgov.com.br/wsigu/Nfes|1.0" 'Prefeitura Iguatu
    Links_Prefeituras.Add "IPU", "http://speedgov.com.br/wsipr/Nfes|1.0" 'Prefeitura Ipueiras
    Links_Prefeituras.Add "IPO", "http://speedgov.com.br/wsitp/Nfes|1.0" 'Prefeitura Itapipoca
    Links_Prefeituras.Add "JIJ", "http://speedgov.com.br/wsjbe/Nfes|1.0" 'Prefeitura Jijoca
    Links_Prefeituras.Add "JAG", "http://speedgov.com.br/wsjij/Nfes|1.0" 'Prefeitura Jaguaribe
    Links_Prefeituras.Add "LGR", "http://speedgov.com.br/wslmn/Nfes|1.0" 'Prefeitura Lagoa Grande
    Links_Prefeituras.Add "LIM", "http://speedgov.com.br/wslag/Nfes|1.0" 'Prefeitura Limoeiro do Norte
    Links_Prefeituras.Add "MAU", "http://speedgov.com.br/wsmar/Nfes|1.0" 'Prefeitura Maracanau
    Links_Prefeituras.Add "MAR", "http://speedgov.com.br/wsmag/Nfes|1.0" 'Prefeitura Maranguape
    Links_Prefeituras.Add "TRA", "http://speedgov.com.br/wspac/Nfes|1.0" 'Prefeitura Trairi
    Links_Prefeituras.Add "PAC", "http://speedgov.com.br/wspin/Nfes|1.0" 'Prefeitura Pacajus
    Links_Prefeituras.Add "PAR", "http://speedgov.com.br/wsqxb/Nfes|1.0" 'Prefeitura Paraipaba
    Links_Prefeituras.Add "PET", "http://speedgov.com.br/wsqda/Nfes|1.0" 'Prefeitura Petrolina
    Links_Prefeituras.Add "PIN", "http://speedgov.com.br/wspet/Nfes|1.0" 'Prefeitura Pindoretama
    Links_Prefeituras.Add "QIM", "http://speedgov.com.br/wssal/Nfes|1.0" 'Prefeitura Quixeramobim
    Links_Prefeituras.Add "QUI", "http://speedgov.com.br/wstau/Nfes|1.0" 'Prefeitura Quixada
    Links_Prefeituras.Add "SAL", "http://speedgov.com.br/wstia/Nfes|1.0" 'Prefeitura Salgueiro
    Links_Prefeituras.Add "TAU", "http://speedgov.com.br/wstra/Nfes|1.0" 'Prefeitura Tauá
    Links_Prefeituras.Add "TIA", "http://speedgov.com.br/wspab/Nfes|1.0" 'Prefeitura Tiagua

End Sub

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "CancelarNfse"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarLoteRps"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfse(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Nota_Inicial As String, _
                              ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfse"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarNfsePorRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfsePorRps"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarSituacaoLoteRps"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "RecepcionarLoteRps"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=utf-8"

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:nfse=""http://www.abrasf.org.br/ABRASF/arquivos/nfse.xsd"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<nfse:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<header><![CDATA[[CabecMsg]]]></header>"
    Message_Assemble = Message_Assemble & "<parameters><![CDATA[[DadosMsg]]]></parameters>"
    Message_Assemble = Message_Assemble & "</nfse:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "CancelarNfse"

            MensagemXML = "<?xml version=""1.0"" encoding=""UTF-8""?>"
            MensagemXML = MensagemXML & "<p:CancelarNfseEnvio xmlns:ds=""http://www.w3.org/2000/09/xmldsig#"" xmlns:p=""http://ws.speedgov.com.br/cancelar_nfse_envio_v1.xsd"" xmlns:p1=""http://ws.speedgov.com.br/tipos_v1.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://ws.speedgov.com.br/cancelar_nfse_envio_v1.xsd cancelar_nfse_envio_v1.xsd "">"
            MensagemXML = MensagemXML & "<Pedido>"
            MensagemXML = MensagemXML & "<p1:InfPedidoCancelamento Id="""">"
            MensagemXML = MensagemXML & "<p1:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<p1:Numero>[CAMPO_NUMERO_NOTA]</p1:Numero>"
            MensagemXML = MensagemXML & "<p1:Cnpj>[CAMPO_CNPJ]</p1:Cnpj>"
            MensagemXML = MensagemXML & "<p1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</p1:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<p1:CodigoMunicipio>[CAMPO_CODIGO_MUNICIPIO]</p1:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</p1:IdentificacaoNfse>"
            MensagemXML = MensagemXML & "<p1:CodigoCancelamento>[CAMPO_CODIGO_CANCELAMENTO]</p1:CodigoCancelamento>"
            MensagemXML = MensagemXML & "</p1:InfPedidoCancelamento>"
            MensagemXML = MensagemXML & "</Pedido>"
            MensagemXML = MensagemXML & "</p:CancelarNfseEnvio>"

        Case Is = "ConsultarLoteRps"
            MensagemXML = "<?xml version=""1.0"" encoding=""UTF-8""?>"
            MensagemXML = MensagemXML & "<p:ConsultarLoteRpsEnvio Id="""" xmlns:ds=""http://www.w3.org/2000/09/xmldsig#"" xmlns:p=""http://ws.speedgov.com.br/consultar_lote_rps_envio_v1.xsd"" xmlns:p1=""http://ws.speedgov.com.br/tipos_v1.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://ws.speedgov.com.br/consultar_lote_rps_envio_v1.xsd consultar_lote_rps_envio_v1.xsd "">"
            MensagemXML = MensagemXML & "<p:Prestador>"
            MensagemXML = MensagemXML & "<p1:Cnpj>[CAMPO_CNPJ]</p1:Cnpj>"
            MensagemXML = MensagemXML & "<p1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</p1:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</p:Prestador>"
            MensagemXML = MensagemXML & "<p:Protocolo>[CAMPO_PROTOCOLO]</p:Protocolo>"
            MensagemXML = MensagemXML & "</p:ConsultarLoteRpsEnvio>"

        Case Is = "ConsultarNfse"

            MensagemXML = "<?xml version=""1.0"" encoding=""UTF-8""?>"
            MensagemXML = MensagemXML & "<p:ConsultarNfseEnvio xmlns:ds=""http://www.w3.org/2000/09/xmldsig#"" xmlns:p=""http://ws.speedgov.com.br/consultar_nfse_envio_v1.xsd"" xmlns:p1=""http://ws.speedgov.com.br/tipos_v1.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://ws.speedgov.com.br/consultar_nfse_envio_v1.xsd consultar_nfse_envio_v1.xsd "">"
            MensagemXML = MensagemXML & "<p:Prestador>"
            MensagemXML = MensagemXML & "<p1:Cnpj>[CAMPO_CNPJ]</p1:Cnpj>"
            MensagemXML = MensagemXML & "<p1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</p1:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</p:Prestador>"
            MensagemXML = MensagemXML & "<p:NumeroNfse>[CAMPO_NOTA_INICIAL]</p:NumeroNfse>"
            MensagemXML = MensagemXML & "</p:ConsultarNfseEnvio>"

        Case Is = "ConsultarNfsePorRps"

            MensagemXML = "<?xml version=""1.0"" encoding=""UTF-8""?>"
            MensagemXML = MensagemXML & "<p:ConsultarNfseRpsEnvio xmlns:ds=""http://www.w3.org/2000/09/xmldsig#"" xmlns:p=""http://ws.speedgov.com.br/consultar_nfse_rps_envio_v1.xsd"" xmlns:p1=""http://ws.speedgov.com.br/tipos_v1.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://ws.speedgov.com.br/consultar_nfse_rps_envio_v1.xsd consultar_nfse_rps_envio_v1.xsd "">"
            MensagemXML = MensagemXML & "<p:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<p1:Numero>[CAMPO_NUMERO_RPS]</p1:Numero>"
            MensagemXML = MensagemXML & "<p1:Serie>[CAMPO_SERIE_RPS]</p1:Serie>"
            MensagemXML = MensagemXML & "<p1:Tipo>[CAMPO_TIPO_RPS]</p1:Tipo>"
            MensagemXML = MensagemXML & "</p:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<p:Prestador>"
            MensagemXML = MensagemXML & "<p1:Cnpj>[CAMPO_CNPJ]</p1:Cnpj>"
            MensagemXML = MensagemXML & "<p1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</p1:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</p:Prestador>"
            MensagemXML = MensagemXML & "</p:ConsultarNfseRpsEnvio>"

        Case Is = "ConsultarSituacaoLoteRps"

            MensagemXML = "<?xml version=""1.0"" encoding=""UTF-8""?>"
            MensagemXML = MensagemXML & "<p:ConsultarSituacaoLoteRpsEnvio Id="""" xmlns:ds=""http://www.w3.org/2000/09/xmldsig#"" xmlns:p=""http://ws.speedgov.com.br/consultar_situacao_lote_rps_envio_v1.xsd"" xmlns:p1=""http://ws.speedgov.com.br/tipos_v1.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://ws.speedgov.com.br/consultar_situacao_lote_rps_envio_v1.xsd consultar_situacao_lote_rps_envio_v1.xsd "">"
            MensagemXML = MensagemXML & "<p:Prestador>"
            MensagemXML = MensagemXML & "<p1:Cnpj>[CAMPO_CNPJ]</p1:Cnpj>"
            MensagemXML = MensagemXML & "<p1:InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</p1:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</p:Prestador>"
            MensagemXML = MensagemXML & "<p:Protocolo>[CAMPO_PROTOCOLO]</p:Protocolo>"
            MensagemXML = MensagemXML & "</p:ConsultarSituacaoLoteRpsEnvio>"

        Case Is = "RecepcionarLoteRps"

            MensagemXML = "<?xml version=""1.0"" encoding=""UTF-8""?>"
            MensagemXML = MensagemXML & "<p:EnviarLoteRpsEnvio xmlns:ds=""http://www.w3.org/2000/09/xmldsig#"" xmlns:p=""http://ws.speedgov.com.br/enviar_lote_rps_envio_v1.xsd"" xmlns:p1=""http://ws.speedgov.com.br/tipos_v1.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://ws.speedgov.com.br/enviar_lote_rps_envio_v1.xsd enviar_lote_rps_envio_v1.xsd "">"
            MensagemXML = MensagemXML & "<p:LoteRps Id=""RPS_637923548445656012"">"
            MensagemXML = MensagemXML & "<p1:NumeroLote>2</p1:NumeroLote>"
            MensagemXML = MensagemXML & "<p1:Cnpj>95591723009337</p1:Cnpj>"
            MensagemXML = MensagemXML & "<p1:InscricaoMunicipal>1081787</p1:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "<p1:QuantidadeRps>1</p1:QuantidadeRps>"
            MensagemXML = MensagemXML & "<p1:ListaRps>"
            MensagemXML = MensagemXML & "<p1:Rps>"
            MensagemXML = MensagemXML & "<p1:InfRps Id=""inf_RPS0130332059"">"
            MensagemXML = MensagemXML & "<p1:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<p1:Numero>1</p1:Numero>"
            MensagemXML = MensagemXML & "<p1:Serie>00000</p1:Serie>"
            MensagemXML = MensagemXML & "<p1:Tipo>1</p1:Tipo>"
            MensagemXML = MensagemXML & "</p1:IdentificacaoRps>"
            MensagemXML = MensagemXML & "<p1:DataEmissao>2013-10-01T08:10:00</p1:DataEmissao>"
            MensagemXML = MensagemXML & "<p1:NaturezaOperacao>1</p1:NaturezaOperacao>"
            MensagemXML = MensagemXML & "<p1:OptanteSimplesNacional>2</p1:OptanteSimplesNacional>"
            MensagemXML = MensagemXML & "<p1:IncentivadorCultural>2</p1:IncentivadorCultural>"
            MensagemXML = MensagemXML & "<p1:Status>1</p1:Status>"
            MensagemXML = MensagemXML & "<p1:Servico>"
            MensagemXML = MensagemXML & "<p1:Valores>"
            MensagemXML = MensagemXML & "<p1:ValorServicos>500.0</p1:ValorServicos>"
            MensagemXML = MensagemXML & "<p1:ValorDeducoes>0.0</p1:ValorDeducoes>"
            MensagemXML = MensagemXML & "<p1:ValorPis>0.0</p1:ValorPis>"
            MensagemXML = MensagemXML & "<p1:ValorCofins>0.0</p1:ValorCofins>"
            MensagemXML = MensagemXML & "<p1:ValorInss>0.0</p1:ValorInss>"
            MensagemXML = MensagemXML & "<p1:ValorIr>0.0</p1:ValorIr>"
            MensagemXML = MensagemXML & "<p1:ValorCsll>0.0</p1:ValorCsll>"
            MensagemXML = MensagemXML & "<p1:IssRetido>2</p1:IssRetido>"
            MensagemXML = MensagemXML & "<p1:ValorIss>10.0</p1:ValorIss>"
            MensagemXML = MensagemXML & "<p1:ValorIssRetido>0.0</p1:ValorIssRetido>"
            MensagemXML = MensagemXML & "<p1:OutrasRetencoes>0.0</p1:OutrasRetencoes>"
            MensagemXML = MensagemXML & "<p1:BaseCalculo>500.0</p1:BaseCalculo>"
            MensagemXML = MensagemXML & "<p1:Aliquota>2.0</p1:Aliquota>"
            MensagemXML = MensagemXML & "<p1:ValorLiquidoNfse>490.0</p1:ValorLiquidoNfse>"
            MensagemXML = MensagemXML & "<p1:DescontoCondicionado>0.0</p1:DescontoCondicionado>"
            MensagemXML = MensagemXML & "<p1:DescontoIncondicionado>0.0</p1:DescontoIncondicionado>"
            MensagemXML = MensagemXML & "</p1:Valores>"
            MensagemXML = MensagemXML & "<p1:ItemListaServico>101</p1:ItemListaServico>"
            MensagemXML = MensagemXML & "<p1:CodigoCnae>6201500</p1:CodigoCnae>"
            MensagemXML = MensagemXML & "<p1:CodigoTributacaoMunicipio>620150000</p1:CodigoTributacaoMunicipio>"
            MensagemXML = MensagemXML & "<p1:Discriminacao>SERVICO TESTE</p1:Discriminacao>"
            MensagemXML = MensagemXML & "<p1:CodigoMunicipio>9999999</p1:CodigoMunicipio>"
            MensagemXML = MensagemXML & "</p1:Servico>"
            MensagemXML = MensagemXML & "<p1:Prestador>"
            MensagemXML = MensagemXML & "<p1:Cnpj>57255426000103</p1:Cnpj>"
            MensagemXML = MensagemXML & "<p1:InscricaoMunicipal>1</p1:InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</p1:Prestador>"
            MensagemXML = MensagemXML & "<p1:Tomador>"
            MensagemXML = MensagemXML & "<p1:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<p1:CpfCnpj>"
            MensagemXML = MensagemXML & "<p1:Cnpj>12477945000188</p1:Cnpj>"
            MensagemXML = MensagemXML & "</p1:CpfCnpj>"
            MensagemXML = MensagemXML & "</p1:IdentificacaoTomador>"
            MensagemXML = MensagemXML & "<p1:RazaoSocial>TESTE EUGENIO SALVIANO</p1:RazaoSocial>"
            MensagemXML = MensagemXML & "<p1:Endereco>"
            MensagemXML = MensagemXML & "<p1:Endereco>RUA VICENTE F. GOES</p1:Endereco>"
            MensagemXML = MensagemXML & "<p1:Numero>182</p1:Numero>"
            MensagemXML = MensagemXML & "<p1:Complemento>A</p1:Complemento>"
            MensagemXML = MensagemXML & "<p1:Bairro>ALTO DA MANGUEIRA</p1:Bairro>"
            MensagemXML = MensagemXML & "<p1:CodigoMunicipio>9999999</p1:CodigoMunicipio>"
            MensagemXML = MensagemXML & "<p1:Uf>CE</p1:Uf>"
            MensagemXML = MensagemXML & "<p1:Cep>61900000</p1:Cep>"
            MensagemXML = MensagemXML & "</p1:Endereco>"
            MensagemXML = MensagemXML & "<p1:Contato>"
            MensagemXML = MensagemXML & "<p1:Telefone>8512341234</p1:Telefone>"
            MensagemXML = MensagemXML & "<p1:Email>teste@fes.com.br</p1:Email>"
            MensagemXML = MensagemXML & "</p1:Contato>"
            MensagemXML = MensagemXML & "</p1:Tomador>"
            MensagemXML = MensagemXML & "</p1:InfRps>"
            MensagemXML = MensagemXML & "</p1:Rps>"
            MensagemXML = MensagemXML & "</p1:ListaRps>"
            MensagemXML = MensagemXML & "</p:LoteRps>"
            MensagemXML = MensagemXML & "</p:EnviarLoteRpsEnvio>"

        Case Else
            MsgBox "Tipo Não Cadastrado!"
            Stop

        End Select

    Compor_MensagemXML = MensagemXML

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String

    Select Case Tipo

        Case Is = "1.0"
            Compor_CabecalhoXML = "<?xml version=""1.0"" encoding=""UTF-8""?><p:cabecalho versao=""1"" xmlns:ds=""http://www.w3.org/2000/09/xmldsig#"" xmlns:p=""http://ws.speedgov.com.br/cabecalho_v1.xsd"" xmlns:p1=""http://ws.speedgov.com.br/tipos_v1.xsd"" xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xsi:schemaLocation=""http://ws.speedgov.com.br/cabecalho_v1.xsd cabecalho_v1.xsd ""><versaoDados>1</versaoDados></p:cabecalho>"

        Case Else
            MsgBox "Tipo Não Cadastrado!"
            Stop

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

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("ItemListaServico"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.CodigoMunicipio"))
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Numero")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Endereco.Endereco")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("Nome Municipio")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("Bairro"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("Cep"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("Uf")
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
