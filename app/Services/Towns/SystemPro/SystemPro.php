<?php

namespace App\Services\Towns\SystemPro;


class SystemPro
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
    Links_Prefeituras.Add "ERM", "https://www.nfse.erechim.rs.gov.br:8182/NfseService/NfseService|2.01" 'Prefeitura Erechim

End Sub


Public Function ConsultarNfseFaixa(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Nota_Inicial As String, _
                                   ByVal Nota_Final As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "ConsultarNfseFaixa"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_FINAL]", Nota_Final)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function EnviarLoteRpsSincrono(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "EnviarLoteRpsSincrono"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    EnviarLoteRpsSincrono = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function GerarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "GerarNfse"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)

End Function

Public Function SubstituirNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, CabecMsg As String, DadosMsg As String

    Operacao = "SubstituirNfse"
    CabecMsg = Compor_CabecalhoXML(Versao_Cabecalho)
    DadosMsg = Compor_MensagemXML(Operacao)
    Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[CabecMsg]", CabecMsg)
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

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:nfse=""http://NFSe.wsservices.systempro.com.br/"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<nfse:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "<nfseCabecMsg><![CDATA[[CabecMsg]]]></nfseCabecMsg>"
    Message_Assemble = Message_Assemble & "<nfseDadosMsg><![CDATA[[DadosMsg]]]></nfseDadosMsg>"
    Message_Assemble = Message_Assemble & "</nfse:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

    Case Is = "CancelarNfse"

        MensagemXML = "<CancelarNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
        MensagemXML = MensagemXML & "<Pedido>"
        MensagemXML = MensagemXML & "<InfPedidoCancelamento Id=""pedidoCancelamento_908687870001096038247"">"
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

     Case Is = "ConsultarNfseFaixa"

        MensagemXML = "<ConsultarNfseFaixaEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
        MensagemXML = MensagemXML & "<Prestador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</Prestador>"
        MensagemXML = MensagemXML & "<Faixa>"
        MensagemXML = MensagemXML & "<NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</NumeroNfseInicial>"
        MensagemXML = MensagemXML & "<NumeroNfseFinal>[CAMPO_NOTA_FINAL]</NumeroNfseFinal>"
        MensagemXML = MensagemXML & "</Faixa>"
        MensagemXML = MensagemXML & "<Pagina>1</Pagina>"
        MensagemXML = MensagemXML & "</ConsultarNfseFaixaEnvio>"

    Case Is = "EnviarLoteRpsSincrono"

        MensagemXML = "<EnviarLoteRpsSincronoEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
        MensagemXML = MensagemXML & "<LoteRps Id=""Lote_19"">"
        MensagemXML = MensagemXML & "<NumeroLote>19</NumeroLote>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>90868787000109</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>6038</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "<QuantidadeRps>2</QuantidadeRps>"
        MensagemXML = MensagemXML & "<ListaRps>"
        MensagemXML = MensagemXML & "<Rps>"
        MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico Id=""0000013165"">"
        MensagemXML = MensagemXML & "<Rps>"
        MensagemXML = MensagemXML & "<IdentificacaoRps>"
        MensagemXML = MensagemXML & "<Numero>10399</Numero>"
        MensagemXML = MensagemXML & "<Serie>1</Serie>"
        MensagemXML = MensagemXML & "<Tipo>1</Tipo>"
        MensagemXML = MensagemXML & "</IdentificacaoRps>"
        MensagemXML = MensagemXML & "<DataEmissao>2013-10-25</DataEmissao>"
        MensagemXML = MensagemXML & "<Status>1</Status>"
        MensagemXML = MensagemXML & "</Rps>"
        MensagemXML = MensagemXML & "<Competencia>2013-10-25</Competencia>"
        MensagemXML = MensagemXML & "<Servico>"
        MensagemXML = MensagemXML & "<Valores>"
        MensagemXML = MensagemXML & "<ValorServicos>1830.48</ValorServicos>"
        MensagemXML = MensagemXML & "<ValorIss>54.91</ValorIss>"
        MensagemXML = MensagemXML & "<Aliquota>3.00</Aliquota>"
        MensagemXML = MensagemXML & "</Valores>"
        MensagemXML = MensagemXML & "<IssRetido>2</IssRetido>"
        MensagemXML = MensagemXML & "<ItemListaServico>01.03</ItemListaServico>"
        MensagemXML = MensagemXML & "<Discriminacao>Discriminacao Servico</Discriminacao>"
        MensagemXML = MensagemXML & "<CodigoMunicipio>4307005</CodigoMunicipio>"
        MensagemXML = MensagemXML & "<ExigibilidadeISS>1</ExigibilidadeISS>"
        MensagemXML = MensagemXML & "<MunicipioIncidencia>4307005</MunicipioIncidencia>"
        MensagemXML = MensagemXML & "</Servico>"
        MensagemXML = MensagemXML & "<Prestador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>90868787000109</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>6038</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</Prestador>"
        MensagemXML = MensagemXML & "<Tomador>"
        MensagemXML = MensagemXML & "<IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>92639988000151</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>345</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<RazaoSocial>TOMADOR TESTE LTDA</RazaoSocial>"
        MensagemXML = MensagemXML & "<Endereco>"
        MensagemXML = MensagemXML & "<Endereco>XV DE NOVEMBRO</Endereco>"
        MensagemXML = MensagemXML & "<Numero>231</Numero>"
        MensagemXML = MensagemXML & "<Complemento>PRIMEIRO ANDAR</Complemento>"
        MensagemXML = MensagemXML & "<Bairro>CENTRO</Bairro>"
        MensagemXML = MensagemXML & "<CodigoMunicipio>4307005</CodigoMunicipio>"
        MensagemXML = MensagemXML & "<Uf>RS</Uf>"
        MensagemXML = MensagemXML & "<CodigoPais>1058</CodigoPais>"
        MensagemXML = MensagemXML & "<Cep>99700000</Cep>"
        MensagemXML = MensagemXML & "</Endereco>"
        MensagemXML = MensagemXML & "<Contato>"
        MensagemXML = MensagemXML & "<Telefone>449999999</Telefone>"
        MensagemXML = MensagemXML & "<Email>tomador@gmail.com</Email>"
        MensagemXML = MensagemXML & "</Contato>"
        MensagemXML = MensagemXML & "</Tomador>"
        MensagemXML = MensagemXML & "<ConstrucaoCivil>"
        MensagemXML = MensagemXML & "<Art>ART 9999</Art>"
        MensagemXML = MensagemXML & "</ConstrucaoCivil>"
        MensagemXML = MensagemXML & "<OptanteSimplesNacional>2</OptanteSimplesNacional>"
        MensagemXML = MensagemXML & "<IncentivoFiscal>2</IncentivoFiscal>"
        MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
        MensagemXML = MensagemXML & "</Rps>"
        MensagemXML = MensagemXML & "<Rps>"
        MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico Id=""0000013166"">"
        MensagemXML = MensagemXML & "<Competencia>2013-10-25</Competencia>"
        MensagemXML = MensagemXML & "<Servico>"
        MensagemXML = MensagemXML & "<Valores>"
        MensagemXML = MensagemXML & "<ValorServicos>1830.48</ValorServicos>"
        MensagemXML = MensagemXML & "<ValorDeducoes>0.00</ValorDeducoes>"
        MensagemXML = MensagemXML & "<ValorPis>0.00</ValorPis>"
        MensagemXML = MensagemXML & "<ValorCofins>0.00</ValorCofins>"
        MensagemXML = MensagemXML & "<ValorInss>0.00</ValorInss>"
        MensagemXML = MensagemXML & "<ValorIr>0.00</ValorIr>"
        MensagemXML = MensagemXML & "<ValorCsll>0.00</ValorCsll>"
        MensagemXML = MensagemXML & "<OutrasRetencoes>0.00</OutrasRetencoes>"
        MensagemXML = MensagemXML & "<ValorIss>54.91</ValorIss>"
        MensagemXML = MensagemXML & "<Aliquota>3.00</Aliquota>"
        MensagemXML = MensagemXML & "<DescontoIncondicionado>0.00</DescontoIncondicionado>"
        MensagemXML = MensagemXML & "<DescontoCondicionado>0.00</DescontoCondicionado>"
        MensagemXML = MensagemXML & "</Valores>"
        MensagemXML = MensagemXML & "<IssRetido>2</IssRetido>"
        MensagemXML = MensagemXML & "<ItemListaServico>01.03</ItemListaServico>"
        MensagemXML = MensagemXML & "<Discriminacao>Discriminacao Servico novo</Discriminacao>"
        MensagemXML = MensagemXML & "<CodigoMunicipio>4307005</CodigoMunicipio>"
        MensagemXML = MensagemXML & "<ExigibilidadeISS>1</ExigibilidadeISS>"
        MensagemXML = MensagemXML & "<MunicipioIncidencia>4307005</MunicipioIncidencia>"
        MensagemXML = MensagemXML & "</Servico>"
        MensagemXML = MensagemXML & "<Prestador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>90868787000109</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>6038</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</Prestador>"
        MensagemXML = MensagemXML & "<Tomador>"
        MensagemXML = MensagemXML & "<IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>92639988000151</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>345</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<RazaoSocial>TOMADOR TESTE LTDA</RazaoSocial>"
        MensagemXML = MensagemXML & "<Endereco>"
        MensagemXML = MensagemXML & "<Endereco>XV DE NOVEMBRO</Endereco>"
        MensagemXML = MensagemXML & "<Numero>231</Numero>"
        MensagemXML = MensagemXML & "<Complemento>PRIMEIRO ANDAR</Complemento>"
        MensagemXML = MensagemXML & "<Bairro>CENTRO</Bairro>"
        MensagemXML = MensagemXML & "<CodigoMunicipio>4307005</CodigoMunicipio>"
        MensagemXML = MensagemXML & "<Uf>RS</Uf>"
        MensagemXML = MensagemXML & "<Cep>99700000</Cep>"
        MensagemXML = MensagemXML & "</Endereco>"
        MensagemXML = MensagemXML & "<Contato>"
        MensagemXML = MensagemXML & "<Telefone>449999999</Telefone>"
        MensagemXML = MensagemXML & "<Email>tomador@gmail.com</Email>"
        MensagemXML = MensagemXML & "</Contato>"
        MensagemXML = MensagemXML & "</Tomador>"
        MensagemXML = MensagemXML & "<ConstrucaoCivil>"
        MensagemXML = MensagemXML & "<Art>ART 9999</Art>"
        MensagemXML = MensagemXML & "</ConstrucaoCivil>"
        MensagemXML = MensagemXML & "<OptanteSimplesNacional>2</OptanteSimplesNacional>"
        MensagemXML = MensagemXML & "<IncentivoFiscal>2</IncentivoFiscal>"
        MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
        MensagemXML = MensagemXML & "</Rps>"
        MensagemXML = MensagemXML & "</ListaRps>"
        MensagemXML = MensagemXML & "</LoteRps>"
        MensagemXML = MensagemXML & "</Signature>"
        MensagemXML = MensagemXML & "</EnviarLoteRpsSincronoEnvio>"

     Case Is = "GerarNfse"

        MensagemXML = "<GerarNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
        MensagemXML = MensagemXML & "<Rps>"
        MensagemXML = MensagemXML & "<InfDeclaracaoPrestacaoServico Id=""0000013165"">"
        MensagemXML = MensagemXML & "<Servico>"
        MensagemXML = MensagemXML & "<Valores>"
        MensagemXML = MensagemXML & "<ValorServicos>55.00</ValorServicos>"
        MensagemXML = MensagemXML & "<ValorDeducoes>0.00</ValorDeducoes>"
        MensagemXML = MensagemXML & "<ValorIss>1.65</ValorIss>"
        MensagemXML = MensagemXML & "<Aliquota>3.00</Aliquota>"
        MensagemXML = MensagemXML & "<BaseCalculo>55.00</BaseCalculo>"
        MensagemXML = MensagemXML & "<ValorPis>0.00</ValorPis>"
        MensagemXML = MensagemXML & "<ValorCofins>0.00</ValorCofins>"
        MensagemXML = MensagemXML & "<ValorInss>0.00</ValorInss>"
        MensagemXML = MensagemXML & "<ValorIr>0.00</ValorIr>"
        MensagemXML = MensagemXML & "<ValorCsll>0.00</ValorCsll>"
        MensagemXML = MensagemXML & "</Valores>"
        MensagemXML = MensagemXML & "<IssRetido>2</IssRetido>"
        MensagemXML = MensagemXML & "<ItemListaServico>01.03</ItemListaServico>"
        MensagemXML = MensagemXML & "<Discriminacao>19 - Implementacoes e Customizacoes</Discriminacao>"
        MensagemXML = MensagemXML & "<CodigoMunicipio>4307005</CodigoMunicipio>"
        MensagemXML = MensagemXML & "<ExigibilidadeISS>1</ExigibilidadeISS>"
        MensagemXML = MensagemXML & "<MunicipioIncidencia>4307005</MunicipioIncidencia>"
        MensagemXML = MensagemXML & "</Servico>"
        MensagemXML = MensagemXML & "<Competencia>2014-02-13</Competencia>"
        MensagemXML = MensagemXML & "<Prestador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>90868787000109</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "<InscricaoMunicipal>6038</InscricaoMunicipal>"
        MensagemXML = MensagemXML & "</Prestador>"
        MensagemXML = MensagemXML & "<Tomador>"
        MensagemXML = MensagemXML & "<IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<CpfCnpj>"
        MensagemXML = MensagemXML & "<Cnpj>92639988000151</Cnpj>"
        MensagemXML = MensagemXML & "</CpfCnpj>"
        MensagemXML = MensagemXML & "</IdentificacaoTomador>"
        MensagemXML = MensagemXML & "<RazaoSocial>Tomador Teste Ltda</RazaoSocial>"
        MensagemXML = MensagemXML & "<Endereco>"
        MensagemXML = MensagemXML & "<Endereco>Avenida Sete de Setembro</Endereco>"
        MensagemXML = MensagemXML & "<Numero>825</Numero>"
        MensagemXML = MensagemXML & "<Bairro>Centro</Bairro>"
        MensagemXML = MensagemXML & "<CodigoMunicipio>4307005</CodigoMunicipio>"
        MensagemXML = MensagemXML & "<Uf>RS</Uf>"
        MensagemXML = MensagemXML & "<Cep>99700000</Cep>"
        MensagemXML = MensagemXML & "</Endereco>"
        MensagemXML = MensagemXML & "<Contato>"
        MensagemXML = MensagemXML & "<Telefone>05433212030</Telefone>"
        MensagemXML = MensagemXML & "<Email>tomador@empresa.com.br</Email>"
        MensagemXML = MensagemXML & "</Contato>"
        MensagemXML = MensagemXML & "</Tomador>"
        MensagemXML = MensagemXML & "<OptanteSimplesNacional>2</OptanteSimplesNacional>"
        MensagemXML = MensagemXML & "<IncentivoFiscal>2</IncentivoFiscal>"
        MensagemXML = MensagemXML & "</InfDeclaracaoPrestacaoServico>"
        MensagemXML = MensagemXML & "</Rps>"
        MensagemXML = MensagemXML & "</GerarNfseEnvio>"

     Case Is = "SubstituirNfse"

        MensagemXML = "<SubstituirNfseEnvio xmlns=""http://www.abrasf.org.br/nfse.xsd"">"
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

    Case Else

        Stop 'Tipo Não Cadastrado!

    End Select

    Compor_MensagemXML = MensagemXML

    MensagemXML = ""

End Function

Private Function Compor_CabecalhoXML(Tipo As String) As String

   Select Case Tipo

   Case Is = "2.01"

    Compor_CabecalhoXML = "<cabecalho xmlns=""http://www.abrasf.org.br/nfse.xsd"" versao=""2.01""><versaoDados>2.01</versaoDados></cabecalho>"

   Case Else

    MsgBox "Tipo Não Cadastrado!"
    Stop

   End Select

End Function

}
