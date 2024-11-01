<?php

namespace App\CityHall\SigIssWeb;


class SigIssWeb
{
    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Token As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object: Const SenhaWS As String = "3hMzEQ8S4"
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Get Token() As String: Token = This.Token: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Let Token(Value As String): This.Token = Value: End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()
    
    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "CPQ", "https://wssumare.sigissweb.com/rest" 'Prefeitura Sumaré

End Sub

Public Function Login(ByVal CNPJ As String, ByVal Used_Companny As String) As Variant
    
    Dim Json As String, Url As String
        
    Url = "/login"
    Json = "{""login"":""{CNPJ}"", ""senha"":""{Senha}""};"
    Json = Replace(Json, "{CNPJ}", CNPJ)
    Json = Replace(Json, "{Senha}", SenhaWS)
    Token = Conection(Prefeitura_Utilizada & Url, Json, "POST", Used_Companny)
    
End Function

Public Function Emissao_NFECliente(ByVal Used_Companny As String) As Variant
    
    Dim Url As String
    
    Url = "/nfes"
    Emissao_NFECliente = Conection(Prefeitura_Utilizada & Url, "", "PUT", Used_Companny)

End Function

Public Function Emissao_Json(ByVal Used_Companny As String) As Variant
    
    Dim Json As String, Url As String
    
    Url = "/nfes"
    Json = """cnpj_cpf_prestador"": ""CNPJ PRESTADOR"", ""exterior_dest"": ""0"", ""cnpj_cpf_destinatario"": ""CNPJ TOMADOR"", "
    Json = Json & """pessoa_destinatario"": ""J"", ""ie_destinatario"": ""1231231"", ""im_destinatario"": ""123213"", "
    Json = Json & """razao_social_destinatario"": ""AAA BBB CCCC"", ""endereco_destinatario"": ""RUA 1"", "
    Json = Json & """numero_ende_destinatario"": ""250"", ""complemento_ende_destinatario"": ""CASA"", "
    Json = Json & """bairro_destinatario"": ""CENTRO"", ""cep_destinatario"": ""13600690"", ""cidade_destinatario"": "
    Json = Json & """ARARAS"", ""uf_destinatario"": ""SP"", ""pais_destinatario"": ""Brasil"", ""fone_destinatario"": "
    Json = Json & """19 0000-0000"", ""email_destinatario"": ""email@email.com.br"", ""valor_nf"": ""1,00"", ""deducao"": "
    Json = Json & """0,00"", ""valor_servico"": ""1,00"", ""data_emissao"": ""17/10/2019"", ""forma_de_pagamento"": "
    Json = Json & """10 DDD"", ""descricao"": ""DESENVOLVIMENTO DE SOFTWARE"", ""id_codigo_servico"": ""1.07"", "
    Json = Json & """cancelada"": ""N"", ""iss_retido"": ""N"", ""aliq_iss"": ""0,00"", ""valor_iss"": ""0,00"", ""bc_pis"": "
    Json = Json & """0,00"", ""aliq_pis"": ""0,00"",            ""valor_pis"": ""0,00"", ""bc_cofins"": ""0,00"", "
    Json = Json & """aliq_cofins"": ""0,00"", ""valor_cofins"": ""0,00"", ""bc_csll"": ""0,00"", ""aliq_csll"": "
    Json = Json & """0,00"", ""valor_csll"": ""0,00"", ""bc_irrf"": ""0,00"",  ""aliq_irrf"": ""0,00"", ""valor_irrf"": "
    Json = Json & """0,00"", ""bc_inss"": ""0,00"", ""aliq_inss"": ""0,00"", ""valor_inss"": ""0,00"", ""sistema_gerador"": "
    Json = Json & """nome do erp emissor"", ""serie_rps"": ""RP"", ""rps"": ""1"""
    
    Emissao_Json = Conection(Prefeitura_Utilizada & Url, Json, "POST", Used_Companny)

End Function

Public Function ObtemPDF(ByVal Numero_NF As String, ByVal Serie_NF As String, ByVal Used_Companny As String) As Variant
    
    Dim Url As String
    
    Url = "/nfes/nfimpressa/{numeronf}/serie/{serie}"
    Url = Replace(Url, "{numeronf}", Numero_NF)
    Url = Replace(Url, "{serie}", Serie_NF)
    ObtemPDF = Conection(Prefeitura_Utilizada & Url, "", "GET", Used_Companny)

End Function

Public Function Cancelar_NF(ByVal Numero_NF As String, ByVal Serie_NF As String, ByVal Motivo As String, ByVal Used_Companny As String) As Variant
    
    Dim Url As String
    
    Url = "/nfes/cancela/{numeronf}/serie/{serie}/motivo/{motivo}"
    Url = Replace(Url, "{numeronf}", Numero_NF)
    Url = Replace(Url, "{serie}", Serie_NF)
    Url = Replace(Url, "{motivo}", Motivo)
    Cancelar_NF = Conection(Prefeitura_Utilizada & Url, "", "GET", Used_Companny)

End Function

Public Function Obtem_XML(ByVal Numero_RPS As String, ByVal Serie_RPS As String, ByVal Used_Companny As String) As Variant
    
    Dim Url As String
    
    Url = "/nfes/pegaxml/{numerorps}/serierps/{serierps}"
    Url = Replace(Url, "{numerorps}", Numero_RPS)
    Url = Replace(Url, "{serierps}", Serie_RPS)
    Obtem_XML = Conection(Prefeitura_Utilizada & Url, "", "GET", Used_Companny)

End Function

Public Function Enviar_Nota(ByVal Numero_NF As String, ByVal Serie As String, ByVal Copia_Prestador As String, ByVal Used_Companny As String) As Variant
    
    Dim Url As String
    
    Url = "/nfes/envianf/{numeronf}/serie/{serie}/comcopiaprestador/{comcopiaprestador}"
    Url = Replace(Url, "{numeronf}", Numero_NF)
    Url = Replace(Url, "{serie}", Serie)
    Url = Replace(Url, "{comcopiaprestador}", Copia_Prestador)
    Enviar_Nota = Conection(Prefeitura_Utilizada & Url, "", "GET", Used_Companny)

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal TypeSend As String, ByVal Used_Companny As String) As Variant
    
    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "application/json; charset=utf-8"
        If InStr(Prefeitura, "/login") = 0 Then Headers.Add "Authorization", This.Token
    
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, TypeSend): Set Conexao = Nothing
    
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
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("id_codigo_servico"))
    Set Descricao_Servico = Nothing
    
    Url = "https://sumare.sigissweb.com/nfecentral?oper=imprimir&cnpj=" & Array_Dados_TNT(12) & "&numeronf=" & Dict_Xml.Item("numero_nf") & "&serienf=" & Dict_Xml.Item("serie") & "&tipo=I"
    'If Dict_Xml.Item("cancelada") <> "N" Tag Cancelada
          
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("numero_nf")
        Set Nodo = .getElementById("data_emissao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("data_emissao"), "dd/mm/yyyy")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("codigo"): Nodo.Style.FontSize = "19px"
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("cnpj_cpf_destinatario"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("razao_social_destinatario")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("numero_ende_destinatario")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("endereco_destinatario")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("cidade_destinatario")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("bairro_destinatario"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("cep_destinatario"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("uf_destinatario")
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("email_destinatario") Then
                    Nodo.innerHTML = Dict_Xml.Item("email_destinatario")
                Else
                    Nodo.innerHTML = ""
                End If
            End If
        Set Nodo = .getElementById("discriminacao_servicos_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 1, 90)
        Set Nodo = .getElementById("discriminacao_servicos_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 91, 90)
        Set Nodo = .getElementById("discriminacao_servicos_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 181, 90)
        Set Nodo = .getElementById("discriminacao_servicos_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 271, 90)
        Set Nodo = .getElementById("discriminacao_servicos_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 361, 90)
        Set Nodo = .getElementById("discriminacao_servicos_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 451, 90)
        Set Nodo = .getElementById("discriminacao_servicos_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 541, 90)
        Set Nodo = .getElementById("discriminacao_servicos_8")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Dict_Xml.Item("descricao"), 631, 90)
        Set Nodo = .getElementById("retencao_cofins")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_cofins"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_csll")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_csll"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_inss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_inss"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_irpj")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_irrf"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("retencao_pis")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_pis"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_servicos")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_servico"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("valor_liquido")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_nf"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("servico_prestado_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
        Set Nodo = .getElementById("servico_prestado_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
        Set Nodo = .getElementById("base_de_calculo")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_servico"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("aliquota")
            If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("aliq_iss"), ".", ","), 2)
        Set Nodo = .getElementById("valor_deducoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("deducao"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("desconto_incondicionado")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor_iss"), ".", ","), "R$ #,##0.00")
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
    
    Preecher_Template = Array(Dict_Xml.Item("cnpj_cpf_destinatario"), htmlDoc.Body.innerHTML)
    
End Function



}