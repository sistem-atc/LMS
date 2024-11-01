<?php

namespace App\CityHall\Sefaz_Cte;


class Sefaz_Cte
{
    Option Explicit
Private Type ClassType: Link_Sefaz As String: Version_Assemble As Boolean: Version_Data As String: Filial_Usada As String: End Type
Public Enum Tipos_Eventos: PRESTACAO_DESACORDO = 0: EPEC = 1: INFORMACOES_GTV = 2: CARTA_DE_CORRECAO = 3: COMPROVANTE_ENTREGA_CTE = 4: Cancelamento = 5: CANCELAMENTO_COMPROVANTE_ENTREGA = 6: REGISTRO_MULTINACIONAL = 7: End Enum
Private This As ClassType: Dim Links_Sefaz As Object
Public Property Get EndPoint_Sefaz() As String: EndPoint_Sefaz = This.Link_Sefaz: End Property
Public Property Let EndPoint_Sefaz(Value As String): This.Filial_Usada = Value: This.Link_Sefaz = Split(Links_Sefaz.Item(Value), "|")(0): This.Version_Assemble = CBool(Split(Links_Sefaz.Item(Value), "|")(1)): This.Version_Data = Split(Links_Sefaz.Item(Value), "|")(2): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Sefaz = CreateObject("Scripting.Dictionary")
    Links_Sefaz.Add "SVAN", "https://www1.cte.fazenda.gov.br/CTeDistribuicaoDFe/[ENDPOINT].asmx|True|3.00"
    Links_Sefaz.Add "SVMG", "https://cte.fazenda.mg.gov.br/cte/services/[ENDPOINT]|False|3.00"
    Links_Sefaz.Add "SVMS", "https://producao.cte.ms.gov.br:443/ws/[ENDPOINT]|False|3.00"
    Links_Sefaz.Add "SVMT", "http://www.sefaz.mt.gov.br/ctews/services/[ENDPOINT]|False|3.00"
    Links_Sefaz.Add "SVPR", "https://cte.fazenda.pr.gov.br/cte/[ENDPOINT]|False|3.00"
    Links_Sefaz.Add "SVRS", "https://cte.svrs.rs.gov.br/ws/cterecepcao/[ENDPOINT].asmx|False|3.00"
    Links_Sefaz.Add "SVSP", "https://nfe.fazenda.sp.gov.br/cteWEB/services/[ENDPOINT].asmx|False|3.00"

End Sub

Public Function CteRecepcao(ByVal Used_Companny As String)

    Dim EndPoint As String, DadosMsg As String, Mount_Mensage As String
    
    EndPoint = "CteRecepcao": DadosMsg = Compor_MensagemXML(EndPoint): Mount_Mensage = Message_Assemble(This.Version_Assemble)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CTE_VERSAO_DADOS]", This.Version_Data)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", EndPoint)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CteRecepcao = Conection(Replace(EndPoint_Sefaz, "[ENDPOINT]", EndPoint), Mount_Mensage, Used_Companny)
    
End Function

Public Function CteRetRecepcao(ByVal Used_Companny As String)

    Dim EndPoint As String, DadosMsg As String, Mount_Mensage As String
    
    EndPoint = "CteRetRecepcao": DadosMsg = Compor_MensagemXML(EndPoint): Mount_Mensage = Message_Assemble(This.Version_Assemble)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CTE_VERSAO_DADOS]", This.Version_Data)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", EndPoint)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CteRetRecepcao = Conection(Replace(EndPoint_Sefaz, "[ENDPOINT]", EndPoint), Mount_Mensage, Used_Companny)
    
End Function

Public Function CteInutilizacao(ByVal Used_Companny As String)

    Dim EndPoint As String, DadosMsg As String, Mount_Mensage As String
    
    EndPoint = "CteInutilizacao": DadosMsg = Compor_MensagemXML(EndPoint): Mount_Mensage = Message_Assemble(This.Version_Assemble)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CTE_VERSAO_DADOS]", This.Version_Data)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", EndPoint)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CteInutilizacao = Conection(Replace(EndPoint_Sefaz, "[ENDPOINT]", EndPoint), Mount_Mensage, Used_Companny)

End Function

Public Function CteConsultaProtocolo(ByVal Used_Companny As String)

    Dim EndPoint As String, DadosMsg As String, Mount_Mensage As String
    
    EndPoint = "CteConsulta": DadosMsg = Compor_MensagemXML(EndPoint): Mount_Mensage = Message_Assemble(This.Version_Assemble)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CTE_VERSAO_DADOS]", This.Version_Data)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", EndPoint)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CteConsultaProtocolo = Conection(Replace(EndPoint_Sefaz, "[ENDPOINT]", EndPoint), Mount_Mensage, Used_Companny)
    
End Function

Public Function CteStatusServico(ByVal Used_Companny As String)

    Dim EndPoint As String, DadosMsg As String, Mount_Mensage As String
    
    EndPoint = "CteStatusServico": DadosMsg = Compor_MensagemXML(EndPoint): Mount_Mensage = Message_Assemble(This.Version_Assemble)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CTE_VERSAO_DADOS]", This.Version_Data)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", EndPoint)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CteStatusServico = Conection(Replace(EndPoint_Sefaz, "[ENDPOINT]", EndPoint), Mount_Mensage, Used_Companny)
    
End Function

Public Function CteRecepcaoEvento(ByVal Evento As Tipos_Eventos, ByVal Used_Companny As String)

    Dim EndPoint As String, DadosMsg As String, Mount_Mensage As String, NameSpace As String
    
    If InStr(1, EndPoint_Sefaz, "mt") > 0 Then EndPoint_Sefaz = "https://cte.sefaz.mt.gov.br/ctews2/services/[ENDPOINT]"
    
    EndPoint = "RecepcaoEvento": NameSpace = "CteRecepcaoEvento": Mount_Mensage = Message_Assemble(This.Version_Assemble)
    DadosMsg = Compor_MensagemXML(NameSpace, Evento): DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CTE_VERSAO_DADOS]", This.Version_Data)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", NameSpace)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CteRecepcaoEvento = Conection(Replace(EndPoint_Sefaz, "[ENDPOINT]", EndPoint), Mount_Mensage, Used_Companny)

End Function

Public Function CTeRecepcaoOS(ByVal Used_Companny As String)

    Dim EndPoint As String, DadosMsg As String, Mount_Mensage As String
    
    EndPoint = "CTeRecepcaoOS": DadosMsg = Compor_MensagemXML(EndPoint): Mount_Mensage = Message_Assemble(This.Version_Assemble)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[CTE_VERSAO_DADOS]", This.Version_Data)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", EndPoint)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CTeRecepcaoOS = Conection(Replace(EndPoint_Sefaz, "[ENDPOINT]", EndPoint), Mount_Mensage, Used_Companny)
    
End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String) As String
    
    Dim SignedXml As z_cls_WsFuncoes
    
    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant
    
    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
    
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers, , True): Set Conexao = Nothing
    
End Function

Private Function Message_Assemble(ByVal Version As Boolean) As String
    
    If Version Then
    
        Message_Assemble = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:cted=""http://www.portalfiscal.inf.br/cte/wsdl/[Mount_Mensage]"">"
        Message_Assemble = Message_Assemble & "<soap:Header/>"
        Message_Assemble = Message_Assemble & "<soap:Body>"
        Message_Assemble = Message_Assemble & "<cted:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "<cted:cteDadosMsg>[DadosMsg]</cted:cteDadosMsg>"
        Message_Assemble = Message_Assemble & "</cted:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soap:Body>"
        Message_Assemble = Message_Assemble & "</soap:Envelope>"
    
    Else
    
        Message_Assemble = "<soap:Envelope xmlns:soap=""http://www.w3.org/2003/05/soap-envelope"" xmlns:cter=""http://www.portalfiscal.inf.br/cte/wsdl/[Mount_Mensage]"">"
        Message_Assemble = Message_Assemble & "<soap:Header>"
        Message_Assemble = Message_Assemble & "<cter:cteCabecMsg>"
        Message_Assemble = Message_Assemble & "<cter:cUF>[CTE_UF]</cter:cUF>"
        Message_Assemble = Message_Assemble & "<cter:versaoDados>[CTE_VERSAO_DADOS]</cter:versaoDados>"
        Message_Assemble = Message_Assemble & "</cter:cteCabecMsg>"
        Message_Assemble = Message_Assemble & "</soap:Header>"
        Message_Assemble = Message_Assemble & "<soap:Body>"
        Message_Assemble = Message_Assemble & "<cter:cteDadosMsg>[DadosMsg]</cter:cteDadosMsg>"
        Message_Assemble = Message_Assemble & "</soap:Body>"
        Message_Assemble = Message_Assemble & "</soap:Envelope>"
        
    End If
    
End Function

Private Function Compor_MensagemXML(ByVal Tipo As String, Optional ByVal Select_XML As String) As String
    
    Dim MensagemXML As String
    
    Select Case Tipo
    
        Case Is = "CteRecepcao"
        
        Case Is = "CteRetRecepcao"
        
        Case Is = "CteInutilizacao"
        
        Case Is = "CteConsulta"
        
        Case Is = "CteStatusServico"
        
        Case Is = "CadConsultaCadastro4"
        
        Case Is = "CteRecepcaoEvento"
                        
            If PRESTACAO_DESACORDO Then
                
                MensagemXML = "<descEvento>[DESCRICAO_EVENTO]</descEvento>"
                MensagemXML = MensagemXML & "<indDesacordoOper>[INDICADOR_OPERACAO]</indDesacordoOper>"
                MensagemXML = MensagemXML & "<xObs>[OBSERVACOES_TOMADOR]</xObs>"
            
            ElseIf EPEC Then
                
                MensagemXML = "<descEvento></descEvento>"
                MensagemXML = MensagemXML & "<xJust></xJust>"
                MensagemXML = MensagemXML & "<vICMS></vICMS>"
                MensagemXML = MensagemXML & "<vICMSST></vICMSST>"
                MensagemXML = MensagemXML & "<vTPrest></vTPrest>"
                MensagemXML = MensagemXML & "<vCarga></vCarga>"
                MensagemXML = MensagemXML & "<toma4></toma4>"
                MensagemXML = MensagemXML & "<modal></modal>"
                MensagemXML = MensagemXML & "<UFIni></UFIni>"
                MensagemXML = MensagemXML & "<UFFim></UFFim>"
                MensagemXML = MensagemXML & "<tpCTe></tpCTe>"
                MensagemXML = MensagemXML & "<dhEmi></dhEmi>"
            
            ElseIf INFORMACOES_GTV Then
            
                MensagemXML = "<descEvento></descEvento>"
                MensagemXML = MensagemXML & "<infGTV></infGTV>"
                
            ElseIf CARTA_DE_CORRECAO Then
            
                MensagemXML = "<descEvento></descEvento>"
                MensagemXML = MensagemXML & "<infCorrecao></infCorrecao>"
                MensagemXML = MensagemXML & "<xCondUso></xCondUso>"
            
            ElseIf COMPROVANTE_ENTREGA_CTE Then
            
                MensagemXML = "<descEvento></descEvento>"
                MensagemXML = MensagemXML & "<nProt></nProt>"
                MensagemXML = MensagemXML & "<dhEntrega></dhEntrega>"
                MensagemXML = MensagemXML & "<nDoc></nDoc>"
                MensagemXML = MensagemXML & "<xNome></xNome>"
                MensagemXML = MensagemXML & "<latitude></latitude>"
                MensagemXML = MensagemXML & "<longitude></longitude>"
                MensagemXML = MensagemXML & "<hashEntrega></hashEntrega>"
                MensagemXML = MensagemXML & "<dhHashEntrega></dhHashEntrega>"
                MensagemXML = MensagemXML & "<infEntrega></infEntrega>"
                
            ElseIf Cancelamento Then
            
                MensagemXML = "<descEvento></descEvento>"
                MensagemXML = MensagemXML & "<nProt></nProt>"
                MensagemXML = MensagemXML & "<xJust></xJust>"
            
            ElseIf CANCELAMENTO_COMPROVANTE_ENTREGA Then
            
                MensagemXML = "<descEvento></descEvento>"
                MensagemXML = MensagemXML & "<nProt></nProt>"
                MensagemXML = MensagemXML & "<nProtCE></nProtCE>"
            
            ElseIf REGISTRO_MULTINACIONAL Then
                
                MensagemXML = "<descEvento>[DESCRICAO_EVENTO_MULTIMODAL]</descEvento>"
                MensagemXML = MensagemXML & "<xRegistro>[DESCRICAO_COMPLEMENTAR]</xRegistro>"
                MensagemXML = MensagemXML & "<nDoc>[NUMERO_DOCUMENTO_MULTIMODAL]</nDoc>"
            
            End If
            
        Case Is = "CTeRecepcaoOS"
        
        Case Else
        
    End Select
    
    Compor_MensagemXML = MensagemXML
   
    MensagemXML = ""
    
End Function

Private Function Codigo_UF(ByVal UF As String) As Integer

    Select Case UF
    
        Case Is = "AC": Codigo_UF = 12
        Case Is = "AL": Codigo_UF = 27
        Case Is = "AP": Codigo_UF = 16
        Case Is = "AM": Codigo_UF = 13
        Case Is = "BA": Codigo_UF = 29
        Case Is = "CE": Codigo_UF = 23
        Case Is = "DF": Codigo_UF = 53
        Case Is = "ES": Codigo_UF = 32
        Case Is = "GO": Codigo_UF = 52
        Case Is = "MA": Codigo_UF = 21
        Case Is = "MG": Codigo_UF = 31
        Case Is = "MS": Codigo_UF = 50
        Case Is = "MT": Codigo_UF = 51
        Case Is = "PA": Codigo_UF = 15
        Case Is = "PB": Codigo_UF = 25
        Case Is = "PE": Codigo_UF = 26
        Case Is = "PI": Codigo_UF = 22
        Case Is = "PR": Codigo_UF = 41
        Case Is = "RJ": Codigo_UF = 33
        Case Is = "RN": Codigo_UF = 24
        Case Is = "RO": Codigo_UF = 11
        Case Is = "RR": Codigo_UF = 14
        Case Is = "RS": Codigo_UF = 43
        Case Is = "SC": Codigo_UF = 42
        Case Is = "SE": Codigo_UF = 28
        Case Is = "SP": Codigo_UF = 35
        Case Is = "TO": Codigo_UF = 17
        Case Else: Stop ' Estado não cadastrado!
        
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
    Dim Descricao_Servico As cls_Descricao_Servico, DB_Connection As cls_DB_Connection, Url As String, ReturnCNPJ As String
    
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
            If Not Nodo Is Nothing Then Nodo.innerHTML = Format(Replace(Left(Dict_Xml.Item("DataEmissao"), 19), "T", " ", 1), "dd/mm/yyyy")
        Set Nodo = .getElementById("codigo_verificacao")
            If Not Nodo Is Nothing Then Nodo.innerHTML = Dict_Xml.Item("CodigoVerificacao")
        Set Nodo = .getElementById("cnpj_tomador")
            If Not Nodo Is Nothing Then
                If Dict_Xml.Exists("CpfCnpj.Cnpj") Then
                    Nodo.innerHTML = Format(Dict_Xml.Item("CpfCnpj.Cnpj"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Dict_Xml.Item("CpfCnpj.Cnpj")
                ElseIf Dict_Xml.Exists("CpfCnpj.Cpf") Then
                    Nodo.innerHTML = Format(Dict_Xml.Item("CpfCnpj.Cpf"), "00"".""000"".""000""/""0000-00")
                    ReturnCNPJ = Dict_Xml.Item("CpfCnpj.Cpf")
                End If
            End If
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
    
    Preecher_Template = Array(ReturnCNPJ, htmlDoc.Body.innerHTML)
    
End Function



}
