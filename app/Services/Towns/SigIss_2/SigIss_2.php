<?php

namespace App\CityHall\SigIss_2;


class SigIss_2
{
    Option Explicit
    Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
    Private This As ClassType: Dim Links_Prefeituras As Object
    Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
    Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
    Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property
    
    Private Sub Class_Initialize()
        
        Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
        Links_Prefeituras.Add "GVR", "https://valadares.sigiss.com.br:443/valadares/ws/sigiss_ws.php" 'Prefeitura Governador Valadares
        Links_Prefeituras.Add "MII", "https://marilia.sigiss.com.br:443/marilia/ws/sigiss_ws.php" 'Prefeitura Marilia
    
    End Sub
    
    Public Function CancelarNota(ByVal CNPJ As String, ByVal Incricao_Municipal As String, ByVal Password As String, ByVal Numero_Nota As String, _
                                 ByVal Motivo As String, ByVal Email As String, ByVal Used_Companny As String) As Variant
    
        Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
        
        Operacao = "CancelarNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
        DadosMsg = Replace(DadosMsg, "[CAMPO_CCM]", Incricao_Municipal)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        DadosMsg = Replace(DadosMsg, "[CAMPO_PASSWORD]", Password)
        DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
        DadosMsg = Replace(DadosMsg, "[CAMPO_MOTIVO]", Motivo)
        DadosMsg = Replace(DadosMsg, "[CAMPO_EMAIL]", Email)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
        
        CancelarNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
        
    End Function
    
    Public Function ConsultarNotaPrestador(ByVal CNPJ As String, ByVal Incricao_Municipal As String, _
                                           ByVal Password As String, ByVal Numero_Nota As String, ByVal Used_Companny As String) As Variant
    
        Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
        
        Operacao = "ConsultarNotaPrestador": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Incricao_Municipal)
        DadosMsg = Replace(DadosMsg, "[CAMPO_PASSWORD]", Password)
        DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
        
        ConsultarNotaPrestador = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
        
    End Function
    
    Public Function ConsultarNotaValida(ByVal CNPJ As String, ByVal Incricao_Municipal As String, ByVal Codigo_Autenticidade As String, _
                                        ByVal Numero_Nota As String, ByVal Serie_Nota As String, ByVal Valor_Nota As String, _
                                        ByVal Used_Companny As String) As Variant
    
        Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
        
        Operacao = "ConsultarNotaValida": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
        DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
        DadosMsg = Replace(DadosMsg, "[CAMPO_SERIE_NOTA]", Serie_Nota)
        DadosMsg = Replace(DadosMsg, "[CAMPO_VALOR_NOTA]", Valor_Nota)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CCM]", Incricao_Municipal)
        DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
        DadosMsg = Replace(DadosMsg, "[CAMPO_AUTENTICIDADE]", Codigo_Autenticidade)
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
        
        ConsultarNotaValida = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
        
    End Function
    
    Public Function GerarNota(ByVal Used_Companny As String) As Variant
    
        Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
        
        Operacao = "GerarNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
        
        GerarNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
        
    End Function
    
    Public Function gerateste(ByVal Used_Companny As String) As Variant
    
        Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
        
        Operacao = "gerateste": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
        Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
        Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
        gerateste = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
        
    End Function
    
    Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant
        
        Dim Conexao As cls_Connection, Headers As Object
        
        Set Headers = CreateObject("Scripting.Dictionary")
            Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        
        Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing
        
    End Function
    
    Private Function Message_Assemble() As String
    
        Message_Assemble = "<soapenv:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:urn=""urn:sigiss_ws"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<urn:[Mount_Mensage] soapenv:encodingStyle=""http://schemas.xmlsoap.org/soap/encoding/"">[DadosMsg]</urn:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"
            
    End Function
    
    Private Function Compor_MensagemXML(Tipo As String) As String
    
        Dim MensagemXML As String
       
        Select Case Tipo
       
        Case Is = "CancelarNota"
        
            MensagemXML = "<DadosCancelaNota xsi:type=""urn:tcDadosCancelaNota"">"
            MensagemXML = MensagemXML & "<ccm xsi:type=""xsd:int"">[CAMPO_CCM]</ccm>"
            MensagemXML = MensagemXML & "<cnpj xsi:type=""xsd:string"">[CAMPO_CNPJ]</cnpj>"
            MensagemXML = MensagemXML & "<senha xsi:type=""xsd:string"">[CAMPO_PASSWORD]</senha>"
            MensagemXML = MensagemXML & "<nota xsi:type=""xsd:int"">[CAMPO_NUMERO_NOTA]</nota>"
            MensagemXML = MensagemXML & "<motivo xsi:type=""xsd:string"">[CAMPO_MOTIVO]</motivo>"
            MensagemXML = MensagemXML & "<email xsi:type=""xsd:string"">[CAMPO_EMAIL]</email>"
            MensagemXML = MensagemXML & "</DadosCancelaNota>"
        
        Case Is = "ConsultarNotaPrestador"
        
            MensagemXML = "<DadosPrestador xsi:type=""urn:tcDadosPrestador"">"
            MensagemXML = MensagemXML & "<ccm xsi:type=""xsd:int"">[CAMPO_INSCRICAO_MUNICIPAL]</ccm>"
            MensagemXML = MensagemXML & "<cnpj xsi:type=""xsd:string"">[CAMPO_CNPJ]</cnpj>"
            MensagemXML = MensagemXML & "<senha xsi:type=""xsd:string"">[CAMPO_PASSWORD]</senha>"
            MensagemXML = MensagemXML & "</DadosPrestador>"
            MensagemXML = MensagemXML & "<Nota xsi:type=""xsd:int"">[CAMPO_NUMERO_NOTA]</Nota>"
      
        Case Is = "ConsultarNotaValida"
        
            MensagemXML = "<DadosConsultaNota xsi:type=""urn:tcDadosConsultaNota"">"
            MensagemXML = MensagemXML & "<nota xsi:type=""xsd:int"">[CAMPO_NUMERO_NOTA]</nota>"
            MensagemXML = MensagemXML & "<serie xsi:type=""xsd:string"">[CAMPO_SERIE_NOTA]</serie>"
            MensagemXML = MensagemXML & "<valor xsi:type=""xsd:string"">[CAMPO_VALOR_NOTA]</valor>"
            MensagemXML = MensagemXML & "<prestador_ccm xsi:type=""xsd:int"">[CAMPO_CCM]</prestador_ccm>"
            MensagemXML = MensagemXML & "<prestador_cnpj xsi:type=""xsd:string"">[CAMPO_CNPJ]</prestador_cnpj>"
            MensagemXML = MensagemXML & "<autenticidade xsi:type=""xsd:string"">[CAMPO_AUTENTICIDADE]</autenticidade>"
            MensagemXML = MensagemXML & "</DadosConsultaNota>"
        
        Case Is = "GerarNota"
       
            MensagemXML = "<DescricaoRps xsi:type=""urn:tcDescricaoRps"">"
            MensagemXML = MensagemXML & "<ccm xsi:type=""xsd:string"">?</ccm>"
            MensagemXML = MensagemXML & "<cnpj xsi:type=""xsd:string"">?</cnpj>"
            MensagemXML = MensagemXML & "<senha xsi:type=""xsd:string"">?</senha>"
            MensagemXML = MensagemXML & "<crc xsi:type=""xsd:string"">?</crc>"
            MensagemXML = MensagemXML & "<crc_estado xsi:type=""xsd:string"">?</crc_estado>"
            MensagemXML = MensagemXML & "<aliquota_simples xsi:type=""xsd:string"">?</aliquota_simples>"
            MensagemXML = MensagemXML & "<id_sis_legado xsi:type=""xsd:string"">?</id_sis_legado>"
            MensagemXML = MensagemXML & "<servico xsi:type=""xsd:int"">?</servico>"
            MensagemXML = MensagemXML & "<situacao xsi:type=""xsd:string"">?</situacao>"
            MensagemXML = MensagemXML & "<valor xsi:type=""xsd:string"">?</valor>"
            MensagemXML = MensagemXML & "<base xsi:type=""xsd:string"">?</base>"
            MensagemXML = MensagemXML & "<descricaoNF xsi:type=""xsd:string"">?</descricaoNF>"
            MensagemXML = MensagemXML & "<tomador_tipo xsi:type=""xsd:int"">?</tomador_tipo>"
            MensagemXML = MensagemXML & "<tomador_cnpj xsi:type=""xsd:string"">?</tomador_cnpj>"
            MensagemXML = MensagemXML & "<tomador_email xsi:type=""xsd:string"">?</tomador_email>"
            MensagemXML = MensagemXML & "<tomador_ie xsi:type=""xsd:string"">?</tomador_ie>"
            MensagemXML = MensagemXML & "<tomador_im xsi:type=""xsd:string"">?</tomador_im>"
            MensagemXML = MensagemXML & "<tomador_razao xsi:type=""xsd:string"">?</tomador_razao>"
            MensagemXML = MensagemXML & "<tomador_fantasia xsi:type=""xsd:string"">?</tomador_fantasia>"
            MensagemXML = MensagemXML & "<tomador_endereco xsi:type=""xsd:string"">?</tomador_endereco>"
            MensagemXML = MensagemXML & "<tomador_numero xsi:type=""xsd:string"">?</tomador_numero>"
            MensagemXML = MensagemXML & "<tomador_complemento xsi:type=""xsd:string"">?</tomador_complemento>"
            MensagemXML = MensagemXML & "<tomador_bairro xsi:type=""xsd:string"">?</tomador_bairro>"
            MensagemXML = MensagemXML & "<tomador_CEP xsi:type=""xsd:string"">?</tomador_CEP>"
            MensagemXML = MensagemXML & "<tomador_cod_cidade xsi:type=""xsd:string"">?</tomador_cod_cidade>"
            MensagemXML = MensagemXML & "<tomador_fone xsi:type=""xsd:string"">?</tomador_fone>"
            MensagemXML = MensagemXML & "<tomador_ramal xsi:type=""xsd:string"">?</tomador_ramal>"
            MensagemXML = MensagemXML & "<tomador_fax xsi:type=""xsd:string"">?</tomador_fax>"
            MensagemXML = MensagemXML & "<rps_num xsi:type=""xsd:int"">?</rps_num>"
            MensagemXML = MensagemXML & "<rps_serie xsi:type=""xsd:string"">?</rps_serie>"
            MensagemXML = MensagemXML & "<rps_dia xsi:type=""xsd:int"">?</rps_dia>"
            MensagemXML = MensagemXML & "<rps_mes xsi:type=""xsd:int"">?</rps_mes>"
            MensagemXML = MensagemXML & "<rps_ano xsi:type=""xsd:int"">?</rps_ano>"
            MensagemXML = MensagemXML & "<outro_municipio xsi:type=""xsd:int"">?</outro_municipio>"
            MensagemXML = MensagemXML & "<cod_outro_municipio xsi:type=""xsd:int"">?</cod_outro_municipio>"
            MensagemXML = MensagemXML & "<retencao_iss xsi:type=""xsd:string"">?</retencao_iss>"
            MensagemXML = MensagemXML & "<pis xsi:type=""xsd:string"">?</pis>"
            MensagemXML = MensagemXML & "<cofins xsi:type=""xsd:string"">?</cofins>"
            MensagemXML = MensagemXML & "<inss xsi:type=""xsd:string"">?</inss>"
            MensagemXML = MensagemXML & "<irrf xsi:type=""xsd:string"">?</irrf>"
            MensagemXML = MensagemXML & "<csll xsi:type=""xsd:string"">?</csll>"
            MensagemXML = MensagemXML & "<dia_emissao xsi:type=""xsd:int"">?</dia_emissao>"
            MensagemXML = MensagemXML & "<mes_emissao xsi:type=""xsd:int"">?</mes_emissao>"
            MensagemXML = MensagemXML & "<ano_emissao xsi:type=""xsd:int"">?</ano_emissao>"
            MensagemXML = MensagemXML & "</DescricaoRps>"
        
        Case Is = "gerateste"
            
            MensagemXML = "<dado xsi:type=""xsd:int"">1</dado>"
       
        Case Else
            
            MsgBox "Tipo Não Cadastrado!"
            Stop
       
        End Select
       
        Compor_MensagemXML = MensagemXML
       
        MensagemXML = ""
       
    End Function
    
    Public Function Tratar_Data(ByVal strData As String) As Date
        
        Dim StrData_Bruto As String
        
        StrData_Bruto = Replace(strData, "  ", " ")
        StrData_Bruto = Replace(StrData_Bruto, "12:00:00:000AM", "")
        StrData_Bruto = Replace(StrData_Bruto, "12:00:00:000PM", "")
        
        If InStr(1, StrData_Bruto, "Jan") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Jan", "01"))
        ElseIf InStr(1, StrData_Bruto, "Feb") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Feb", "02"))
        ElseIf InStr(1, StrData_Bruto, "Mar") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Mar", "03"))
        ElseIf InStr(1, StrData_Bruto, "Apr") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Apr", "04"))
        ElseIf InStr(1, StrData_Bruto, "May") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "May", "05"))
        ElseIf InStr(1, StrData_Bruto, "Jun") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Jun", "06"))
        ElseIf InStr(1, StrData_Bruto, "Jul") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Jul", "07"))
        ElseIf InStr(1, StrData_Bruto, "Aug") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Aug", "08"))
        ElseIf InStr(1, StrData_Bruto, "Sep") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Sep", "09"))
        ElseIf InStr(1, StrData_Bruto, "Oct") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Oct", "10"))
        ElseIf InStr(1, StrData_Bruto, "Nov") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Nov", "11"))
        ElseIf InStr(1, StrData_Bruto, "Dec") > 0 Then
            StrData_Bruto = CDate(Replace(Replace(Trim(StrData_Bruto), " ", "/"), "Dec", "12"))
        End If
        
        Tratar_Data = StrData_Bruto
        
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
        
        Dim htmlDoc As Object, Nodo As Object, ArrayDescricao As Variant, Descricao_Servico As cls_Descricao_Servico, Url As String
        
        Set htmlDoc = CreateObject("htmlfile")
            htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")
        
        Set Descricao_Servico = New cls_Descricao_Servico
            ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("servico"))
        Set Descricao_Servico = Nothing
        
        Url = Dict_Xml.Item("LinkImpressao") & vbNewLine & "Situação: " & Dict_Xml.Item("situacao")
        'Dict_Xml.Item("StatusNFe") <> "Ativa" Tag Cancelada
              
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
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("nota")
            Set Nodo = .getElementById("data_emissao")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Tratar_Data(Dict_Xml.Item("dt_conversao")), "dd/mm/yyyy hh:mm:ss")
            Set Nodo = .getElementById("codigo_verificacao")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("autenticidade")
            Set Nodo = .getElementById("cnpj_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("cnpj_tomador"), "00"".""000"".""000""/""0000-00")
            Set Nodo = .getElementById("razao_social_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("razao_tomador")
            Set Nodo = .getElementById("numero_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("numero_tomador")
            Set Nodo = .getElementById("endereco_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("endereco_tomador")
            Set Nodo = .getElementById("municipio_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("cidade_tomador")
            Set Nodo = .getElementById("bairro_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("bairro_tomador"), 17)
            Set Nodo = .getElementById("cep_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("cep_tomador"), "00000""-""000")
            Set Nodo = .getElementById("uf_tomador")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("estado_tomador")
            Set Nodo = .getElementById("email_tomador")
                If Not Nodo Is Nothing Then
                    If Dict_Xml.Exists("email_tomador") Then Nodo.innerHTML = Dict_Xml.Item("email_tomador") Else Nodo.innerHTML = ""
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
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_csll")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_inss")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_irpj")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("retencao_pis")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("valor_servicos")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("valor_liquido")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("valor"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("servico_prestado_1")
                If Not Nodo Is Nothing Then Nodo.innerHTML = "Codigo do Servico: " & Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 1, 71)
            Set Nodo = .getElementById("servico_prestado_2")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(ArrayDescricao(1) & " " & ArrayDescricao(2), 72, 89)
            Set Nodo = .getElementById("base_de_calculo")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("base"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("aliquota")
                If Not Nodo Is Nothing Then Nodo.innerHTML = FormatNumber(Replace(Dict_Xml.Item("aliquota_atividade"), ".", ","), 2)
            Set Nodo = .getElementById("valor_deducoes")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("desconto_incondicionado")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("outras_retencoes")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("valor_iss")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("iss"), ".", ","), "R$ #,##0.00")
            Set Nodo = .getElementById("credito_iptu")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
            Set Nodo = .getElementById("outras_informacoes_1")
                If Not Nodo Is Nothing Then Nodo.innerHTML = Replace(Dict_Xml.Item("LinkImpressao"), "&", "&amp;")
            Set Nodo = .getElementById("outras_informacoes_2")
                If Not Nodo Is Nothing Then Nodo.innerHTML = "Situacao: " & Dict_Xml.Item("situacao")
        End With
        
        Preecher_Template = Array(Dict_Xml.Item("cnpj_tomador"), htmlDoc.Body.innerHTML)
        
    End Function
    
    
    
}