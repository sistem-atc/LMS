<?php

namespace App\Services\Towns\Giap;


class Giap
{
    /*    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Inscricao_Municipal As String: Filial_Usada As String: End Type
Public Enum Type_Motivos: MES_COMPETENCIA = 8: LOCAL_DA_PRESTACAO = 9: Aliquota = 10: BASE_DE_CALCULO = 11: DESCRICAO_DOS_SERVICOS = 12: DIVERGENCIA_CADASTRAL = 13: DADOS_DO_TOMADOR = 14: End Enum
Private This As ClassType: Dim Links_Prefeituras As Object: Private Const Token = "DEUS78W82B2U73LU3A6MJR5JGOMDIBII"
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Get Inscricao_Municipal() As String: Inscricao_Municipal = This.Inscricao_Municipal: End Property
Public Property Let Inscricao_Municipal(Value As String): This.Inscricao_Municipal = Inscricao_Municipal: End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "SCA", "http://webservice.giap.com.br/WSNfsesScarlos02/nfseresources/ws/" 'Prefeitura São Carlos

End Sub

Public Function hello(ByVal Used_Companny As String) As Variant

    Dim Operacao As String, DadosMsg As String

    Operacao = "hello"
    hello = Conection(Prefeitura_Utilizada & Operacao, "", Used_Companny, "")

End Function

Public Function consulta(ByVal Inscricao_Municipal As String, ByVal Codigo_Verificacao As String, ByVal Used_Companny As String) As Variant

    Dim Operacao As String, DadosMsg As String

    Operacao = "consulta": DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_VERIFICACAO]", Codigo_Verificacao)

    consulta = Conection(Prefeitura_Utilizada & Operacao, DadosMsg, Used_Companny, "")

End Function

Public Function simula(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, Dict_Notas As Object, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Operacao As String, DadosMsg As String, Dict_Nota As Variant

    EndPoint = "v2/emissao/": Operacao = "simula"
    DadosMsg = Compor_MensagemXML(Operacao)

    For Each Dict_Nota In Dict_Notas
        DadosMsg = Replace(DadosMsg, Dict_Nota, Dict_Notas.Item(Dict_Nota))
    Next Dict_Nota

    simula = Conection(Prefeitura_Utilizada & EndPoint & Operacao, DadosMsg, Used_Companny, Inscricao_Municipal)

End Function

Public Function emissao(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, Dict_Notas As Object, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Operacao As String, DadosMsg As String, Dict_Nota As Variant

    EndPoint = "v2/": Operacao = "emissao"
    DadosMsg = Compor_MensagemXML(Operacao)

    For Each Dict_Nota In Dict_Notas
        DadosMsg = Replace(DadosMsg, Dict_Nota, Dict_Notas.Item(Dict_Nota))
    Next Dict_Nota

    emissao = Conection(Prefeitura_Utilizada & EndPoint & Operacao, DadosMsg, Used_Companny, Inscricao_Municipal)

End Function

Public Function cancela(ByVal Inscricao_Municipal As String, ByRef Motivo As Type_Motivos, ByVal Numero_Nota As String, ByVal Used_Companny As String) As Variant

    Dim EndPoint As String, Operacao As String, DadosMsg As String

    EndPoint = "v2/": Operacao = "cancela": DadosMsg = Compor_MensagemXML(Operacao)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_MOTIVO]", Motivo)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    cancela = Conection(Prefeitura_Utilizada & EndPoint & Operacao, DadosMsg, Used_Companny, Inscricao_Municipal)

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, ByVal Inscricao_Municipal As String) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "application/xml"
        If Inscricao_Municipal <> "" Then Headers.Add "Authorization", Inscricao_Municipal & "-" & Token

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "consulta"

            MensagemXML = "<consulta>"
            MensagemXML = MensagemXML & "<inscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</inscricaoMunicipal>"
            MensagemXML = MensagemXML & "<codigoVerificacao>[CAMPO_CODIGO_VERIFICACAO]</codigoVerificacao>"
            MensagemXML = MensagemXML & "</consulta>"

        Case Is = "simula"

            MensagemXML = "<nfe>"
            MensagemXML = MensagemXML & "<notaFiscal>"
            MensagemXML = MensagemXML & "<dadosPrestador>"
            MensagemXML = MensagemXML & "<dataEmissao>[CAMPO_DATA_EMISSAO]</dataEmissao>"
            MensagemXML = MensagemXML & "<im>[CAMPO_INSCRICAO_MUNICIPAL_PRESTADOR]</im>"
            MensagemXML = MensagemXML & "<numeroRps>[CAMPO_NUMERO_RPS]</numeroRps>"
            MensagemXML = MensagemXML & "</dadosPrestador>"
            MensagemXML = MensagemXML & "<dadosServico>"
            MensagemXML = MensagemXML & "<bairro>[CAMPO_BAIRRO_PRESTADOR]</bairro>"
            MensagemXML = MensagemXML & "<cep>[CAMPO_CEP_PRESTADOR]</cep>"
            MensagemXML = MensagemXML & "<cidade>[CAMPO_CIDADE_PRESTADOR]</cidade>"
            MensagemXML = MensagemXML & "<complemento>[CAMPO_COMPLEMENTO_PRESTADOR]</complemento>"
            MensagemXML = MensagemXML & "<logradouro>[CAMPO_LOGRADOURO_PRESTADOR]</logradouro>"
            MensagemXML = MensagemXML & "<numero>[CAMPO_NUMERO_PRESTADOR]</numero>"
            MensagemXML = MensagemXML & "<pais>[CAMPO_PAIS_PRESTADOR]</pais>"
            MensagemXML = MensagemXML & "<uf>[CAMPO_UF_PRESTADOR]</uf>"
            MensagemXML = MensagemXML & "</dadosServico>"
            MensagemXML = MensagemXML & "<dadosTomador>"
            MensagemXML = MensagemXML & "<bairro>[CAMPO_BAIRRO_TOMADOR]</bairro>"
            MensagemXML = MensagemXML & "<cep>[CAMPO_CEP_TOMADOR]</cep>"
            MensagemXML = MensagemXML & "<cidade>[CAMPO_CIDADE_TOMADOR]</cidade>"
            MensagemXML = MensagemXML & "<complemento>[CAMPO_COMPLEMENTO_TOMADOR]</complemento>"
            MensagemXML = MensagemXML & "<documento>[CAMPO_DOCUMENTO_TOMADOR]</documento>"
            MensagemXML = MensagemXML & "<email>[CAMPO_EMAIL_TOMADOR]</email>"
            MensagemXML = MensagemXML & "<ie>[CAMPO_IE_TOMADOR]</ie>"
            MensagemXML = MensagemXML & "<logradouro>[CAMPO_LOGRADOURO_TOMADOR]</logradouro>"
            MensagemXML = MensagemXML & "<nomeTomador>[CAMPO_NOME_TOMADOR]</nomeTomador>"
            MensagemXML = MensagemXML & "<numero>[CAMPO_NUMERO_TOMADOR]</numero>"
            MensagemXML = MensagemXML & "<pais>[CAMPO_PAIS_TOMADOR]</pais>"
            MensagemXML = MensagemXML & "<tipoDoc>[CAMPO_TIPO_TOMADOR]</tipoDoc>"
            MensagemXML = MensagemXML & "<uf>[CAMPO_UF_TOMADOR]</uf>"
            MensagemXML = MensagemXML & "</dadosTomador>"
            MensagemXML = MensagemXML & "<detalheServico>"
            MensagemXML = MensagemXML & "<cofins>[CAMPO_COFINS]</cofins>"
            MensagemXML = MensagemXML & "<csll>[CAMPO_CSLL]</csll>"
            MensagemXML = MensagemXML & "<deducaoMaterial>[CAMPO_DEDUCAO]</deducaoMaterial>"
            MensagemXML = MensagemXML & "<descontoIncondicional>[CAMPO_DESCONTO_INCONDICIONAL]</descontoIncondicional>"
            MensagemXML = MensagemXML & "<inss>[CAMPO_INSS]</inss>"
            MensagemXML = MensagemXML & "<ir>[CAMPO_IR]</ir>"
            MensagemXML = MensagemXML & "<issRetido>[CAMPO_ISS_RETIDO]</issRetido>"
            MensagemXML = MensagemXML & "<item>"
            MensagemXML = MensagemXML & "<aliquota>[CAMPO_ALIQUOTA]</aliquota>"
            MensagemXML = MensagemXML & "<codigo>[CAMPO_CODIGO]</codigo>"
            MensagemXML = MensagemXML & "<descricao>[CAMPO_DESCRICAO]</descricao>"
            MensagemXML = MensagemXML & "<valor>[CAMPO_VALOR]</valor>"
            MensagemXML = MensagemXML & "</item>"
            MensagemXML = MensagemXML & "<obs>[CAMPO_OBSERVACOES]</obs>"
            MensagemXML = MensagemXML & "<pisPasep>[CAMPO_PIS_PASEP]</pisPasep>"
            MensagemXML = MensagemXML & "</detalheServico>"
            MensagemXML = MensagemXML & "</notaFiscal>"
            MensagemXML = MensagemXML & "<notaFiscal>"
            MensagemXML = MensagemXML & "</nfe>"

        Case Is = "emissao"

            MensagemXML = "<nfe>"
            MensagemXML = MensagemXML & "<notaFiscal>"
            MensagemXML = MensagemXML & "<dadosPrestador>"
            MensagemXML = MensagemXML & "<dataEmissao>[CAMPO_DATA_EMISSAO]</dataEmissao>"
            MensagemXML = MensagemXML & "<im>[CAMPO_INSCRICAO_MUNICIPAL_PRESTADOR]</im>"
            MensagemXML = MensagemXML & "<numeroRps>[CAMPO_NUMERO_RPS]</numeroRps>"
            MensagemXML = MensagemXML & "</dadosPrestador>"
            MensagemXML = MensagemXML & "<dadosServico>"
            MensagemXML = MensagemXML & "<bairro>[CAMPO_BAIRRO_PRESTADOR]</bairro>"
            MensagemXML = MensagemXML & "<cep>[CAMPO_CEP_PRESTADOR]</cep>"
            MensagemXML = MensagemXML & "<cidade>[CAMPO_CIDADE_PRESTADOR]</cidade>"
            MensagemXML = MensagemXML & "<complemento>[CAMPO_COMPLEMENTO_PRESTADOR]</complemento>"
            MensagemXML = MensagemXML & "<logradouro>[CAMPO_LOGRADOURO_PRESTADOR]</logradouro>"
            MensagemXML = MensagemXML & "<numero>[CAMPO_NUMERO_PRESTADOR]</numero>"
            MensagemXML = MensagemXML & "<pais>[CAMPO_PAIS_PRESTADOR]</pais>"
            MensagemXML = MensagemXML & "<uf>[CAMPO_UF_PRESTADOR]</uf>"
            MensagemXML = MensagemXML & "</dadosServico>"
            MensagemXML = MensagemXML & "<dadosTomador>"
            MensagemXML = MensagemXML & "<bairro>[CAMPO_BAIRRO_TOMADOR]</bairro>"
            MensagemXML = MensagemXML & "<cep>[CAMPO_CEP_TOMADOR]</cep>"
            MensagemXML = MensagemXML & "<cidade>[CAMPO_CIDADE_TOMADOR]</cidade>"
            MensagemXML = MensagemXML & "<complemento>[CAMPO_COMPLEMENTO_TOMADOR]</complemento>"
            MensagemXML = MensagemXML & "<documento>[CAMPO_DOCUMENTO_TOMADOR]</documento>"
            MensagemXML = MensagemXML & "<email>[CAMPO_EMAIL_TOMADOR]</email>"
            MensagemXML = MensagemXML & "<ie>[CAMPO_IE_TOMADOR]</ie>"
            MensagemXML = MensagemXML & "<logradouro>[CAMPO_LOGRADOURO_TOMADOR]</logradouro>"
            MensagemXML = MensagemXML & "<nomeTomador>[CAMPO_NOME_TOMADOR]</nomeTomador>"
            MensagemXML = MensagemXML & "<numero>[CAMPO_NUMERO_TOMADOR]</numero>"
            MensagemXML = MensagemXML & "<pais>[CAMPO_PAIS_TOMADOR]</pais>"
            MensagemXML = MensagemXML & "<tipoDoc>[CAMPO_TIPO_TOMADOR]</tipoDoc>"
            MensagemXML = MensagemXML & "<uf>[CAMPO_UF_TOMADOR]</uf>"
            MensagemXML = MensagemXML & "</dadosTomador>"
            MensagemXML = MensagemXML & "<detalheServico>"
            MensagemXML = MensagemXML & "<cofins>[CAMPO_COFINS]</cofins>"
            MensagemXML = MensagemXML & "<csll>[CAMPO_CSLL]</csll>"
            MensagemXML = MensagemXML & "<deducaoMaterial>[CAMPO_DEDUCAO]</deducaoMaterial>"
            MensagemXML = MensagemXML & "<descontoIncondicional>[CAMPO_DESCONTO_INCONDICIONAL]</descontoIncondicional>"
            MensagemXML = MensagemXML & "<inss>[CAMPO_INSS]</inss>"
            MensagemXML = MensagemXML & "<ir>[CAMPO_IR]</ir>"
            MensagemXML = MensagemXML & "<issRetido>[CAMPO_ISS_RETIDO]</issRetido>"
            MensagemXML = MensagemXML & "<item>"
            MensagemXML = MensagemXML & "<aliquota>[CAMPO_ALIQUOTA]</aliquota>"
            MensagemXML = MensagemXML & "<codigo>[CAMPO_CODIGO]</codigo>"
            MensagemXML = MensagemXML & "<descricao>[CAMPO_DESCRICAO]</descricao>"
            MensagemXML = MensagemXML & "<valor>[CAMPO_VALOR]</valor>"
            MensagemXML = MensagemXML & "</item>"
            MensagemXML = MensagemXML & "<obs>[CAMPO_OBSERVACOES]</obs>"
            MensagemXML = MensagemXML & "<pisPasep>[CAMPO_PIS_PASEP]</pisPasep>"
            MensagemXML = MensagemXML & "</detalheServico>"
            MensagemXML = MensagemXML & "</notaFiscal>"
            MensagemXML = MensagemXML & "<notaFiscal>"
            MensagemXML = MensagemXML & "</nfe>"

        Case Is = "cancela"

             MensagemXML = "<nfe>"
             MensagemXML = MensagemXML & "<cancelaNota>"
             MensagemXML = MensagemXML & "<codigoMotivo>[CAMPO_CODIGO_MOTIVO]</codigoMotivo>"
             MensagemXML = MensagemXML & "<numeroNota>[CAMPO_NUMERO_NOTA]</numeroNota>"
             MensagemXML = MensagemXML & "</cancelaNota>"
             MensagemXML = MensagemXML & "</nfe>"

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

    Dim Item
    For Each Item In Dict_Xml 'Revalidar os campos para preenchimento das notas.
        Debug.Print Item & " " & Dict_Xml(Item)
    Next
    Stop

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("ItemListaServico"))
    Set Descricao_Servico = Nothing

    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("TomadorServico.Endereco.CodigoMunicipio"))
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
