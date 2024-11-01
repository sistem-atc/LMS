<?php

namespace App\CityHall\Iss_Londrina;


class Iss_Londrina
{
    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "LDB", "https://iss.londrina.pr.gov.br:443/ws/v1_03/sigiss_ws.php" 'Prefeitura Londrina

End Sub

Public Function CancelarNota(ByVal CCM As String, ByVal CNPJ As String, ByVal CPF As String, ByVal Senha As String, _
                             ByVal Numero_Nota As String, ByVal Codigo_Cancelamento As Integer, ByVal Email As String, _
                             ByVal Used_Companny As String) As Variant

    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String

    Operacao = "CancelarNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CCM]", CCM)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CPF]", CPF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SENHA]", Senha)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CODIGO_CANCELAMENTO]", Codigo_Cancelamento)
    DadosMsg = Replace(DadosMsg, "[CAMPO_EMAIL]", Email)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CancelarNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarCadastroContribuinte(ByVal CCM As String, ByVal CNPJ As String, ByVal CPF As String, ByVal Senha As String, _
                                              ByVal CNPJ_Consulta As Integer, ByVal Used_Companny As String) As Variant

    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "ConsultarCadastroContribuinte": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CCM]", CCM)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CPF]", CPF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SENHA]", Senha)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ_CONSULTA]", CNPJ_Consulta)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarCadastroContribuinte = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfseServicoPrestado(ByVal CCM As String, ByVal CNPJ As String, ByVal CPF As String, ByVal Senha As String, _
                                             ByVal Numero_Nota As String, ByVal Used_Companny As String) As Variant

    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "ConsultarNfseServicoPrestado": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CCM]", CCM)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CPF]", CPF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SENHA]", Senha)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_NOTA]", Numero_Nota)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarNfseServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarRpsServicoPrestado(ByVal CCM As String, ByVal CNPJ As String, ByVal CPF As String, ByVal Senha As String, _
                                            ByVal Numero_RPS As String, ByVal Data_Emissao_RPS As Date, ByVal Used_Companny As String) As Variant

    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String
    
    Operacao = "ConsultarRpsServicoPrestado": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    DadosMsg = Replace(DadosMsg, "[CAMPO_CCM]", CCM)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CPF]", CPF)
    DadosMsg = Replace(DadosMsg, "[CAMPO_SENHA]", Senha)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NUMERO_RPS]", Numero_RPS)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DIA_RPS]", Format(Day(Data_Emissao_RPS), "00"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_MES_RPS]", Format(Month(Data_Emissao_RPS), "00"))
    DadosMsg = Replace(DadosMsg, "[CAMPO_ANO_RPS]", Format(Year(Data_Emissao_RPS), "0000"))
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    ConsultarRpsServicoPrestado = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function GerarNota(ByVal Used_Companny As String) As Variant

    Dim Operacao As String, DadosMsg As String, Mount_Mensage As String

    Operacao = "GerarNota": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)

    GerarNota = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant
    
    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        Headers.Add "SOAPAction", "POST"
        
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing
    
End Function

Private Function Message_Assemble() As String

    Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:v1=""http://iss.londrina.pr.gov.br/ws/v1_03"">"
    Message_Assemble = Message_Assemble & "<soapenv:Header/>"
    Message_Assemble = Message_Assemble & "<soapenv:Body>"
    Message_Assemble = Message_Assemble & "<v1:[Mount_Mensage]>[DadosMsg]</v1:[Mount_Mensage]>"
    Message_Assemble = Message_Assemble & "</soapenv:Body>"
    Message_Assemble = Message_Assemble & "</soapenv:Envelope>"
    
End Function

Private Function Compor_MensagemXML(Tipo As String) As String
    
    Dim MensagemXML As String
    
    Select Case Tipo
    
        Case Is = "CancelarNota"
        
            MensagemXML = "<DescricaoCancelaNota>"
            MensagemXML = MensagemXML & "<ccm>[CAMPO_CCM]</ccm>"
            MensagemXML = MensagemXML & "<cnpj>[CAMPO_CNPJ]</cnpj>"
            MensagemXML = MensagemXML & "<cpf>[CAMPO_CPF]</cpf>"
            MensagemXML = MensagemXML & "<senha>[CAMPO_SENHA]</senha>"
            MensagemXML = MensagemXML & "<nota>[CAMPO_NUMERO_NOTA]</nota>"
            MensagemXML = MensagemXML & "<cod_cancelamento>[CAMPO_CODIGO_CANCELAMENTO]</cod_cancelamento>"
            MensagemXML = MensagemXML & "<email>[CAMPO_EMAIL]</email>"
            MensagemXML = MensagemXML & "</DescricaoCancelaNota>"
            
        Case Is = "ConsultarCadastroContribuinte"
         
            MensagemXML = MensagemXML & "<ConsultarCadastroContribuinteEnvio>"
            MensagemXML = MensagemXML & "<ccm>[CAMPO_CCM]</ccm>"
            MensagemXML = MensagemXML & "<cnpj>[CAMPO_CNPJ]</cnpj>"
            MensagemXML = MensagemXML & "<cpf>[CAMPO_CPF]</cpf>"
            MensagemXML = MensagemXML & "<senha>[CAMPO_SENHA]</senha>"
            MensagemXML = MensagemXML & "<cnpj_cpf_cadastro>[CAMPO_CNPJ_CONSULTA]</cnpj_cpf_cadastro>"
            MensagemXML = MensagemXML & "</ConsultarCadastroContribuinteEnvio>"
    
        Case Is = "ConsultarNfseServicoPrestado"
         
            MensagemXML = MensagemXML & "<ConsultarNfseServicoPrestadoEnvio>"
            MensagemXML = MensagemXML & "<ccm>[CAMPO_CCM]</ccm>"
            MensagemXML = MensagemXML & "<cnpj>[CAMPO_CNPJ]</cnpj>"
            MensagemXML = MensagemXML & "<cpf>[CAMPO_CPF]</cpf>"
            MensagemXML = MensagemXML & "<senha>[CAMPO_SENHA]</senha>"
            MensagemXML = MensagemXML & "<numero_nfse>[CAMPO_NUMERO_NOTA]</numero_nfse>"
            MensagemXML = MensagemXML & "</ConsultarNfseServicoPrestadoEnvio>"
         
        Case Is = "ConsultarRpsServicoPrestado"
         
            MensagemXML = MensagemXML & "<ConsultarRpsServicoPrestadoEnvio>"
            MensagemXML = MensagemXML & "<ccm>[CAMPO_CCM]</ccm>"
            MensagemXML = MensagemXML & "<cnpj>[CAMPO_CNPJ]</cnpj>"
            MensagemXML = MensagemXML & "<cpf>[CAMPO_CPF]</cpf>"
            MensagemXML = MensagemXML & "<senha>[CAMPO_SENHA]</senha>"
            MensagemXML = MensagemXML & "<numero_rps>[CAMPO_NUMERO_RPS]</numero_rps>"
            MensagemXML = MensagemXML & "<dia_rps>[CAMPO_DIA_RPS]</dia_rps>"
            MensagemXML = MensagemXML & "<mes_rps>[CAMPO_MES_RPS]</mes_rps>"
            MensagemXML = MensagemXML & "<ano_rps>[CAMPO_ANO_RPS]</ano_rps>"
            MensagemXML = MensagemXML & "</ConsultarRpsServicoPrestadoEnvio>"
         
        Case Is = "GerarNota"
        
            MensagemXML = MensagemXML & "<DescricaoRps>"
            MensagemXML = MensagemXML & "<ccm>?</ccm>"
            MensagemXML = MensagemXML & "<cnpj>?</cnpj>"
            MensagemXML = MensagemXML & "<cpf>?</cpf>"
            MensagemXML = MensagemXML & "<senha>?</senha>"
            MensagemXML = MensagemXML & "<aliquota>?</aliquota>"
            MensagemXML = MensagemXML & "<servico>?</servico>"
            MensagemXML = MensagemXML & "<situacao>?</situacao>"
            MensagemXML = MensagemXML & "<valor>?</valor>"
            MensagemXML = MensagemXML & "<base>?</base>"
            MensagemXML = MensagemXML & "<ir>?</ir>"
            MensagemXML = MensagemXML & "<pis>?</pis>"
            MensagemXML = MensagemXML & "<cofins>?</cofins>"
            MensagemXML = MensagemXML & "<csll>?</csll>"
            MensagemXML = MensagemXML & "<inss>?</inss>"
            MensagemXML = MensagemXML & "<retencao_iss>?</retencao_iss>"
            MensagemXML = MensagemXML & "<incentivo_fiscal>?</incentivo_fiscal>"
            MensagemXML = MensagemXML & "<cod_municipio_prestacao_servico>?</cod_municipio_prestacao_servico>"
            MensagemXML = MensagemXML & "<cod_pais_prestacao_servico>?</cod_pais_prestacao_servico>"
            MensagemXML = MensagemXML & "<cod_municipio_incidencia>?</cod_municipio_incidencia>"
            MensagemXML = MensagemXML & "<descricaoNF>?</descricaoNF>"
            MensagemXML = MensagemXML & "<tomador_tipo>?</tomador_tipo>"
            MensagemXML = MensagemXML & "<tomador_cnpj>?</tomador_cnpj>"
            MensagemXML = MensagemXML & "<tomador_email>?</tomador_email>"
            MensagemXML = MensagemXML & "<tomador_ie>?</tomador_ie>"
            MensagemXML = MensagemXML & "<tomador_im>?</tomador_im>"
            MensagemXML = MensagemXML & "<tomador_razao>?</tomador_razao>"
            MensagemXML = MensagemXML & "<tomador_endereco>?</tomador_endereco>"
            MensagemXML = MensagemXML & "<tomador_numero>?</tomador_numero>"
            MensagemXML = MensagemXML & "<tomador_complemento>?</tomador_complemento>"
            MensagemXML = MensagemXML & "<tomador_bairro>?</tomador_bairro>"
            MensagemXML = MensagemXML & "<tomador_CEP>?</tomador_CEP>"
            MensagemXML = MensagemXML & "<tomador_cod_cidade>?</tomador_cod_cidade>"
            MensagemXML = MensagemXML & "<tomador_fone>?</tomador_fone>"
            MensagemXML = MensagemXML & "<tomador_ramal>?</tomador_ramal>"
            MensagemXML = MensagemXML & "<tomador_fax>?</tomador_fax>"
            MensagemXML = MensagemXML & "<rps_num>?</rps_num>"
            MensagemXML = MensagemXML & "<rps_serie>?</rps_serie>"
            MensagemXML = MensagemXML & "<rps_tipo>?</rps_tipo>"
            MensagemXML = MensagemXML & "<rps_dia>?</rps_dia>"
            MensagemXML = MensagemXML & "<rps_mes>?</rps_mes>"
            MensagemXML = MensagemXML & "<rps_ano>?</rps_ano>"
            MensagemXML = MensagemXML & "<nfse_substituida>?</nfse_substituida>"
            MensagemXML = MensagemXML & "<rps_substituido>?</rps_substituido>"
            MensagemXML = MensagemXML & "<obra_alvara_numero>?</obra_alvara_numero>"
            MensagemXML = MensagemXML & "<obra_alvara_ano>?</obra_alvara_ano>"
            MensagemXML = MensagemXML & "<obra_local_lote>?</obra_local_lote>"
            MensagemXML = MensagemXML & "<obra_local_quadra>?</obra_local_quadra>"
            MensagemXML = MensagemXML & "<obra_local_bairro>?</obra_local_bairro>"
            MensagemXML = MensagemXML & "</DescricaoRps>"
         
        Case Else
         
         Stop 'Tipo não cadastrado!
    
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
    
    Set htmlDoc = CreateObject("htmlfile")
        htmlDoc.Body.innerHTML = ParametersTemplate.Item("LayoutHtml")
    
    Set Descricao_Servico = New cls_Descricao_Servico
        ArrayDescricao = Descricao_Servico.DescrServ(Dict_Xml.Item("CodigoTributacaoMunicipio"))
    Set Descricao_Servico = Nothing
    
    Set DB_Connection = New cls_DB_Connection
        Data = Array("Codigo Municipio", Dict_Xml.Item("TomadorCodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing
    
    Url = Dict_Xml.Item("Observacoes")
    'CInt(Dict_Xml.Item("StatusNfse")) <> 1 Tag Cancelamento
    
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("TomadorCpfCnpj"), "00"".""000"".""000""/""0000-00")
        Set Nodo = .getElementById("razao_social_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorRazaoSocial")
        Set Nodo = .getElementById("numero_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorNumero")
        Set Nodo = .getElementById("endereco_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorEndereco")
        Set Nodo = .getElementById("municipio_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = DictUF.Item("Nome Municipio")
        Set Nodo = .getElementById("bairro_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Left(Dict_Xml.Item("TomadorBairro"), 17)
        Set Nodo = .getElementById("cep_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Dict_Xml.Item("TomadorCep"), "00000""-""000")
        Set Nodo = .getElementById("uf_tomador")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("TomadorUf")
        Set Nodo = .getElementById("email_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("TomadorEmail") Then
                    Nodo.innerHTML = Dict_Xml.Item("TomadorEmail")
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("desconto_incondicionado")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_retencoes")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("valor_iss")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Dict_Xml.Item("ValorIss"), ".", ","), "R$ #,##0.00")
        Set Nodo = .getElementById("credito_iptu")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(0, "R$ #,##0.00")
        Set Nodo = .getElementById("outras_informacoes_1")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("LinkImpressao")
        Set Nodo = .getElementById("outras_informacoes_2")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 1, 89)
        Set Nodo = .getElementById("outras_informacoes_3")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 90, 89)
        Set Nodo = .getElementById("outras_informacoes_4")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 180, 89)
        Set Nodo = .getElementById("outras_informacoes_5")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 269, 89)
        Set Nodo = .getElementById("outras_informacoes_6")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 358, 89)
        Set Nodo = .getElementById("outras_informacoes_7")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Mid(Url, 447, 89)
    End With
    
    Preecher_Template = Array(Dict_Xml.Item("TomadorCpfCnpj"), htmlDoc.Body.innerHTML)
    
End Function



}