<?php

namespace App\Services\Towns\iPM;


class iPM
{
    /*
Private Type ClassType: Link_Prefeitura As String: Cadastro_Economico As String: Str_Boundary As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Private Property Get Cadastro_Economico() As String: Cadastro_Economico = This.Cadastro_Economico: End Property
Private Property Get Str_Boundary() As String: Str_Boundary = This.Str_Boundary: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Split(Links_Prefeituras.Item(Value), "|")(0): This.Cadastro_Economico = Split(Links_Prefeituras.Item(Value), "|")(1): This.Str_Boundary = "----=_Part_" & Random(2, False, True) & "_" & Random(24, True, False) & "": End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "CAC", "https://ws-cascavel.atende.net:7443/atende.php?pg=rest&service=WNERestServiceNFSe&cidade=padrao|3863600" 'Prefeitura Cascavel

End Sub

Public Function Consulta_NotaFiscal(ByVal Username As String, ByVal Password As String, ByVal Numero_Nota As String, _
                                    ByVal Used_Companny As String) As Variant

    Dim Authorization As String, Operacao As String, Mount_Mensage As String, DadosMsg As String

    Operacao = "Consulta_NotaFiscal": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[SERIE_NOTA]", "1")
    DadosMsg = Replace(DadosMsg, "[CADASTRO]", Cadastro_Economico)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    Consulta_NotaFiscal = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny, Array(Username, Password))

End Function

Private Function Message_Assemble() As String

    Message_Assemble = "--" & Str_Boundary
    Message_Assemble = Message_Assemble & vbNewLine & "Content-Type: text/xml; charset=Cp1252; name=CAC.xml"
    Message_Assemble = Message_Assemble & vbNewLine & "Content-Transfer-Encoding: binary"
    Message_Assemble = Message_Assemble & vbNewLine & "Content-Disposition: form-data; name=""CAC.xml""; filename=""CAC.xml"""
    Message_Assemble = Message_Assemble & vbNewLine & vbNewLine & "<?xml version=""1.0"" encoding=""ISO-8859-1""?>"
    Message_Assemble = Message_Assemble & vbNewLine & "[DadosMsg]"
    Message_Assemble = Message_Assemble & vbNewLine & "--" & Str_Boundary & "--"

End Function

Private Function Code_Authorization(ByVal Username As String, ByVal Password As String) As Variant

    Dim Conexao As cls_Connection

    Set Conexao = New cls_Connection: Code_Authorization = Conexao.EncodeBase64(Username & ":" & Password): Set Conexao = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String, ByVal Array_Data As Variant) As Variant

    Dim Conexao As cls_Connection, Headers As Object

    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "multipart/form-data; boundary=" & Str_Boundary
        Headers.Add "Authorization", "Basic " & Code_Authorization(Array_Data(0), Array_Data(1))

    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , , , , True): Set Conexao = Nothing

End Function

Private Function Compor_MensagemXML(Tipo As String) As String

    Dim MensagemXML As String

    Select Case Tipo

        Case Is = "Emitir_NotaFiscal"

            MensagemXML = "<nfse>"
            MensagemXML = MensagemXML & vbNewLine & "<rps>"
            MensagemXML = MensagemXML & vbNewLine & "<nro_recibo_provisorio></nro_recibo_provisorio>"
            MensagemXML = MensagemXML & vbNewLine & "<serie_recibo_provisorio></serie_recibo_provisorio>"
            MensagemXML = MensagemXML & vbNewLine & "<data_emissao_recibo_provisorio></data_emissao_recibo_provisorio>"
            MensagemXML = MensagemXML & vbNewLine & "<hora_emissao_recibo_provisorio></hora_emissao_recibo_provisorio>"
            MensagemXML = MensagemXML & vbNewLine & "</rps>"
            MensagemXML = MensagemXML & vbNewLine & "<pedagio>"
            MensagemXML = MensagemXML & vbNewLine & "<cod_equipamento_automatico></cod_equipamento_automatico>"
            MensagemXML = MensagemXML & vbNewLine & "</pedagio>"
            MensagemXML = MensagemXML & vbNewLine & "<nf>"
            MensagemXML = MensagemXML & vbNewLine & "<serie_nfse></serie_nfse>"
            MensagemXML = MensagemXML & vbNewLine & "<data_fato_gerador></data_fato_gerador>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_total></valor_total>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_desconto></valor_desconto>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_ir></valor_ir>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_inss></valor_inss>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_contribuicao_social></valor_contribuicao_social>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_rps></valor_rps>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_pis></valor_pis>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_cofins></valor_cofins>"
            MensagemXML = MensagemXML & vbNewLine & "<observacao></observacao>"
            MensagemXML = MensagemXML & vbNewLine & "</nf>"
            MensagemXML = MensagemXML & vbNewLine & "<prestador>"
            MensagemXML = MensagemXML & vbNewLine & "<cpfcnpj></cpfcnpj>"
            MensagemXML = MensagemXML & vbNewLine & "<cidade></cidade>"
            MensagemXML = MensagemXML & vbNewLine & "</prestador>"
            MensagemXML = MensagemXML & vbNewLine & "<tomador>"
            MensagemXML = MensagemXML & vbNewLine & "<endereco_informado></endereco_informado>"
            MensagemXML = MensagemXML & vbNewLine & "<tipo></tipo>"
            MensagemXML = MensagemXML & vbNewLine & "<identificador></identificador>"
            MensagemXML = MensagemXML & vbNewLine & "<estado></estado>"
            MensagemXML = MensagemXML & vbNewLine & "<pais></pais>"
            MensagemXML = MensagemXML & vbNewLine & "<cpfcnpj></cpfcnpj>"
            MensagemXML = MensagemXML & vbNewLine & "<ie></ie>"
            MensagemXML = MensagemXML & vbNewLine & "<nome_razao_social></nome_razao_social>"
            MensagemXML = MensagemXML & vbNewLine & "<sobrenome_nome_fantasia></sobrenome_nome_fantasia>"
            MensagemXML = MensagemXML & vbNewLine & "<logradouro></logradouro>"
            MensagemXML = MensagemXML & vbNewLine & "<email></email>"
            MensagemXML = MensagemXML & vbNewLine & "<numero_residencia></numero_residencia>"
            MensagemXML = MensagemXML & vbNewLine & "<complemento></complemento>"
            MensagemXML = MensagemXML & vbNewLine & "<ponto_referencia></ponto_referencia>"
            MensagemXML = MensagemXML & vbNewLine & "<bairro></bairro>"
            MensagemXML = MensagemXML & vbNewLine & "<cidade></cidade>"
            MensagemXML = MensagemXML & vbNewLine & "<cep></cep>"
            MensagemXML = MensagemXML & vbNewLine & "<ddd_fone_comercial></ddd_fone_comercial>"
            MensagemXML = MensagemXML & vbNewLine & "<fone_comercial></fone_comercial>"
            MensagemXML = MensagemXML & vbNewLine & "<ddd_fone_residencial></ddd_fone_residencial>"
            MensagemXML = MensagemXML & vbNewLine & "<fone_residencial></fone_residencial>"
            MensagemXML = MensagemXML & vbNewLine & "<ddd_fax></ddd_fax>"
            MensagemXML = MensagemXML & vbNewLine & "<fone_fax></fone_fax>"
            MensagemXML = MensagemXML & vbNewLine & "</tomador>"
            MensagemXML = MensagemXML & vbNewLine & "<itens>"
            MensagemXML = MensagemXML & vbNewLine & "<lista>"
            MensagemXML = MensagemXML & vbNewLine & "<tributa_municipio_prestador></tributa_municipio_prestador>"
            MensagemXML = MensagemXML & vbNewLine & "<codigo_local_prestacao_servico></codigo_local_prestacao_servico>"
            MensagemXML = MensagemXML & vbNewLine & "<unidade_codigo></unidade_codigo>"
            MensagemXML = MensagemXML & vbNewLine & "<unidade_quantidade></unidade_quantidade>"
            MensagemXML = MensagemXML & vbNewLine & "<unidade_valor_unitario></unidade_valor_unitario>"
            MensagemXML = MensagemXML & vbNewLine & "<codigo_item_lista_servico></codigo_item_lista_servico>"
            MensagemXML = MensagemXML & vbNewLine & "<codigo_atividade></codigo_atividade>"
            MensagemXML = MensagemXML & vbNewLine & "<descritivo></descritivo>"
            MensagemXML = MensagemXML & vbNewLine & "<aliquota_item_lista_servico></aliquota_item_lista_servico>"
            MensagemXML = MensagemXML & vbNewLine & "<situacao_tributaria></situacao_tributaria>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_tributavel></valor_tributavel>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_deducao></valor_deducao>"
            MensagemXML = MensagemXML & vbNewLine & "<valor_issrf></valor_issrf>"
            MensagemXML = MensagemXML & vbNewLine & "</lista>"
            MensagemXML = MensagemXML & vbNewLine & "</itens>"
            MensagemXML = MensagemXML & vbNewLine & "<genericos>"
            MensagemXML = MensagemXML & vbNewLine & "<linha>"
            MensagemXML = MensagemXML & vbNewLine & "<titulo></titulo>"
            MensagemXML = MensagemXML & vbNewLine & "<descricao></descricao>"
            MensagemXML = MensagemXML & vbNewLine & "</linha>"
            MensagemXML = MensagemXML & vbNewLine & "</genericos>"
            MensagemXML = MensagemXML & vbNewLine & "<produtos>"
            MensagemXML = MensagemXML & vbNewLine & "<descricao></descricao>"
            MensagemXML = MensagemXML & vbNewLine & "<valor></valor>"
            MensagemXML = MensagemXML & vbNewLine & "</produtos>"
            MensagemXML = MensagemXML & vbNewLine & "<forma_pagamento>"
            MensagemXML = MensagemXML & vbNewLine & "<tipo_pagamento></tipo_pagamento>"
            MensagemXML = MensagemXML & vbNewLine & "<parcelas>"
            MensagemXML = MensagemXML & vbNewLine & "<parcela>"
            MensagemXML = MensagemXML & vbNewLine & "<numero></numero>"
            MensagemXML = MensagemXML & vbNewLine & "<valor></valor>"
            MensagemXML = MensagemXML & vbNewLine & "<data_vencimento></data_vencimento>"
            MensagemXML = MensagemXML & vbNewLine & "</parcela>"
            MensagemXML = MensagemXML & vbNewLine & "</parcelas>"
            MensagemXML = MensagemXML & vbNewLine & "</forma_pagamento>"
            MensagemXML = MensagemXML & vbNewLine & "</nfse>"

        Case Is = "Consulta_NotaFiscal"

            MensagemXML = "<nfse>"
            MensagemXML = MensagemXML & vbNewLine & "<pesquisa>"
            MensagemXML = MensagemXML & vbNewLine & "<numero>[NUMERO_NOTA]</numero>"
            MensagemXML = MensagemXML & vbNewLine & "<serie_nfse>[SERIE_NOTA]</serie_nfse>"
            MensagemXML = MensagemXML & vbNewLine & "<cadastro>[CADASTRO]</cadastro>"
            MensagemXML = MensagemXML & vbNewLine & "</pesquisa>"
            MensagemXML = MensagemXML & vbNewLine & "</nfse>"

        Case Is = "Cancelar_NotaFiscal"

            MensagemXML = "<nfse>"
            MensagemXML = MensagemXML & vbNewLine & "<nf>"
            MensagemXML = MensagemXML & vbNewLine & "<numero></numero>"
            MensagemXML = MensagemXML & vbNewLine & "<serie_nfse></serie_nfse>"
            MensagemXML = MensagemXML & vbNewLine & "<situacao></situacao>"
            MensagemXML = MensagemXML & vbNewLine & "<observacao></observacao>"
            MensagemXML = MensagemXML & vbNewLine & "</nf>"
            MensagemXML = MensagemXML & vbNewLine & "<prestador>"
            MensagemXML = MensagemXML & vbNewLine & "<cpfcnpj></cpfcnpj>"
            MensagemXML = MensagemXML & vbNewLine & "<cidade></cidade>"
            MensagemXML = MensagemXML & vbNewLine & "</prestador>"
            MensagemXML = MensagemXML & vbNewLine & "</nfse>"
            MensagemXML = MensagemXML & vbNewLine & "<observacao></observacao>"

    End Select

    Compor_MensagemXML = MensagemXML

    MensagemXML = ""

End Function

Private Function Random(ByVal Length As Integer, ByVal rString As Boolean, ByVal rInteger As Boolean) As Variant

    Dim CharacterBank As Variant, LoopFor As Long, str As String

    If Length < 1 Then Exit Function

    If rString Then
        CharacterBank = Array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", _
                              "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", _
                              "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", _
                              "V", "W", "X", "Y", "Z")

        For LoopFor = 1 To Length
            Randomize
            str = str & CharacterBank(Int((UBound(CharacterBank) - LBound(CharacterBank) + 1) * Rnd + LBound(CharacterBank)))
        Next LoopFor
    ElseIf rInteger Then
        CharacterBank = Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0")
        For LoopFor = 1 To Length
            Randomize
            str = str & CharacterBank(Int((UBound(CharacterBank) - LBound(CharacterBank) + 1) * Rnd + LBound(CharacterBank)))
        Next LoopFor
    End If

    Random = str

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

    Dim htmlDoc As Object, Nodo As Object, ArrayDescricao As Variant, Url As String
    Dim Descricao_Servico As cls_Descricao_Servico, Functions As z_cls_WsFuncoes

    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")

    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("codigo_item_lista_servico"))
    Set Descricao_Servico = Nothing

    Url = Dict_Xml.Item("link_nfse")
    'CInt(Dict_Xml.Item("situacao_codigo_nfse")) <> 1 Tag Cancelamento

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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("numero_nfse")
        Set Nodo = .getElementById("data_emissao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("data_nfse"), "dd/mm/yyyy") & " " & Dict_Xml.Item("hora_nfse")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("cod_verificador_autenticidade"): Nodo.Style.FontSize = "19px"
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("tomador.cpfcnpj"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("nome_razao_social")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("numero_residencia")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("logradouro")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then
                Set Functions = New z_cls_WsFuncoes: Nodo.innerHTML = Functions.BuscarDadosEndereço(Dict_Xml.Item("cep"))(0): Set Functions = Nothing
            End If
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("bairro"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("cep"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("estado")
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = ""
        Set Nodo = .getElementById("discriminacao_servicos_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 1, 90)
        Set Nodo = .getElementById("discriminacao_servicos_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 91, 90)
        Set Nodo = .getElementById("discriminacao_servicos_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 181, 90)
        Set Nodo = .getElementById("discriminacao_servicos_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 271, 90)
        Set Nodo = .getElementById("discriminacao_servicos_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 361, 90)
        Set Nodo = .getElementById("discriminacao_servicos_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 451, 90)
        Set Nodo = .getElementById("discriminacao_servicos_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 541, 90)
        Set Nodo = .getElementById("discriminacao_servicos_8")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descritivo"), 631, 90)
        Set Nodo = .getElementById("retencao_cofins")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_cofins"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_contribuicao_social"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_inss"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_ir"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_pis"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_total"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_tributavel"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_tributavel"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("aliquota_item_lista_servico"), ".", ","), 2)
        Set Nodo = .getElementById("valor_deducoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_deducao"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("desconto_incondicionado")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_desconto"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(CDbl(Replace(Dict_Xml.Item("aliquota_item_lista_servico") / 100, ".", ",")) * Dict_Xml.Item("valor_tributavel"), "R$ #,##0.00")
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

    Preecher_Template = Array(Dict_Xml.Item("tomador.cpfcnpj"), htmlDoc.Body.innerHTML)

End Function


*/
}
