<?php

namespace App\CityHall\Pm_Cloud_EL_2;


class Pm_Cloud_EL_2
{
    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Versao_Cabecalho As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Versao_Cabecalho() As String: Versao_Cabecalho = This.Versao_Cabecalho: End Property
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Versao_Cabecalho = Split(Links_Prefeituras.Item(Value), "|")(1): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "CIT", "https://notafse-backend.cachoeiro.es.gov.br/nfse/NfseWSService|2.04" 'Prefeitura Cachoeiro de Itapemirim
    Links_Prefeituras.Add "PNZ", "https://pe-petrolina-pm-nfs-backend.cloud.el.com.br/nfse/NfseWSService|2.04" 'Prefeitura Petrolina
    Links_Prefeituras.Add "NFR", "http://rj-novafriburgo-pm-nfs.cloud.el.com.br:80/NfseWSService|2.04" 'Prefeitura de Nova Friburgo
    Links_Prefeituras.Add "VDC", "https://nfe.pmvc.ba.gov.br:443/el-nfse/NfseWSService|2.04" 'Prefeitura de Vitoria da Conquista
    Links_Prefeituras.Add "VIT", "http://es-viana-pm-nfs.cloud.el.com.br:80/NfseWSService" 'Prefeitura Viana
    Links_Prefeituras.Add "COL", "http://es-colatina-pm-nfs.cloud.el.com.br:80/NfseWSService" 'Prefeitura Colatina

End Sub

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "CancelarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): Mount_Mensage = Message_Assemble
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "ConsultarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function consultarNfsePorFaixa(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "ConsultarNfsePorFaixa": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    consultarNfsePorFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfsePorRps(ByVal Used_Companny As String) As Variant
    
    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "ConsultarNfsePorRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfseServicoPrestado(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Data_Inicial As Date, _
                                             ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "ConsultarNfseServicoPrestado": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD"))
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarNfseServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfseServicoTomado(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "ConsultarNfseServicoTomado": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarNfseServicoTomado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function GerarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "GerarNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "RecepcionarLoteRps": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function RecepcionarLoteRpsSincrono(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "RecepcionarLoteRpsSincrono": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    RecepcionarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function SubstituirNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String, CabecMsg As String
    
    Operacao = "SubstituirNfse": CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho): DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant
    
    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing
    
End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:nfse=""http://nfse.abrasf.org.br"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<nfse:[Mount_Mensage]><nfse:[Mount_Mensage]Request>"
    Message_Assemble = Message_Assemble & "<nfseCabecMsg><![CDATA[[CabecMsg]]]></nfseCabecMsg>"
    Message_Assemble = Message_Assemble & "<nfseDadosMsg><![CDATA[[DadosMsg]]]></nfseDadosMsg>"
    Message_Assemble = Message_Assemble & "</nfse:[Mount_Mensage]Request></nfse:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String
 
    Select Case Tipo

        Case Is = "2.04"
        
            Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd""><versaoDados>2.04</versaoDados></cabecalho>"

        Case Else
        
            MsgBox "Tipo Não Cadastrado!"
            Stop

    End Select
 
End Function

Private Function Compor_MensagemXML(Tipo As String) As String
   
    Dim MensagemXML As String
   
    Select Case Tipo
   
        Case Is = "CancelarNfse"
    
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
    
        Case Is = "ConsultarLoteRps"
        
            MensagemXML = "<ConsultarLoteRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<Prestador>"
            MensagemXML = MensagemXML & "<CpfCnpj>"
            MensagemXML = MensagemXML & "<Cnpj></Cnpj>"
            MensagemXML = MensagemXML & "</CpfCnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal></InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Protocolo></Protocolo>"
            MensagemXML = MensagemXML & "</ConsultarLoteRpsEnvio>"
   
        Case Is = "ConsultarNfsePorFaixa"
   
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
   
        Case Is = "ConsultarNfsePorRps"
   
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
   
        Case Is = "ConsultarNfseServicoPrestado"
   
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
            MensagemXML = MensagemXML & "<Pagina>1</Pagina>"
            MensagemXML = MensagemXML & "</ConsultarNfseServicoPrestadoEnvio>"
   
        Case Is = "ConsultarNfseServicoTomado"
   
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
   
        Case Is = "GerarNfse"
   
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
   
        Case Is = "RecepcionarLoteRps"
   
            MensagemXML = "<ConsultarNfseRpsEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
            MensagemXML = MensagemXML & "<LoteRps  Id=""numero_lote"" versao=""2.04"">"
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
   
        Case Is = "RecepcionarLoteRpsSincrono"
   
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
   
        Case Is = "SubstituirNfse"
   
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
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Url As String, ItemListaServico As Variant

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")
    
    If Dict_Xml.Item("ItemListaServico") <> "" Then
        ItemListaServico = Dict_Xml.Item("ItemListaServico")
    ElseIf Dict_Xml.Item("CodigoTributacaoMunicipio") <> "" Then
        ItemListaServico = Dict_Xml.Item("CodigoTributacaoMunicipio")
    Else
        Stop
    End If
    
    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(ItemListaServico)
    Set Descricao_Servico = Nothing
    
    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing
    
    Url = ""
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorServicos"), ".", ","), "R$ #,##0.00") 'Dict_XML.Item("ValorLiquidoNfse") Retornando Valor Zerado, verificar como vai ficar no layout da prefeitura
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



}