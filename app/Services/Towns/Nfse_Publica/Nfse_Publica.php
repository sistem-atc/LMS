<?php

namespace App\CityHall\Nfse_Publica;


class Nfse_Publica
{
    Option Explicit
Private Type ClassType: Link_Prefeitura As String: Filial_Usada As String: End Type
Private This As ClassType: Dim Links_Prefeituras As Object
Public Property Get Prefeitura_Utilizada() As String: Prefeitura_Utilizada = This.Link_Prefeitura: End Property
Public Property Let Prefeitura_Utilizada(Value As String): This.Filial_Usada = Value: This.Link_Prefeitura = Links_Prefeituras.Item(Value): End Property
Public Property Get Filial_Usada() As String: Filial_Usada = This.Filial_Usada: End Property

Private Sub Class_Initialize()

    Set Links_Prefeituras = CreateObject("Scripting.Dictionary")
    Links_Prefeituras.Add "XAP", "http://nfse1.publica.inf.br:80/chapeco_nfse_integracao/Services" 'Prefeitura Chapecó

End Sub

Public Function CancelarDirEnvio(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "CancelarDirEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CancelarDirEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function CancelarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "CancelarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CancelarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function CartaCorrecaoNfseEnvio(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "CartaCorrecaoNfseEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    CartaCorrecaoNfseEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaDirCanceladasPeriodo(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaDirCanceladasPeriodo": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaDirCanceladasPeriodo = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaDirCompetenciaPrestador(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaDirCompetenciaPrestador": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaDirCompetenciaPrestador = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaDirPeriodo(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaDirPeriodo": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaDirPeriodo = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaDirPeriodoAlteracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaDirPeriodoAlteracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaDirPeriodoAlteracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaDirPeriodoPrestador(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaDirPeriodoPrestador": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaDirPeriodoPrestador = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaDirPeriodoPrestadorAlteracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaDirPeriodoPrestadorAlteracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaDirPeriodoPrestadorAlteracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaNfseCompetenciaPrestador(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaNfseCompetenciaPrestador": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaNfseCompetenciaPrestador = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaNfsePeriodo(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaNfsePeriodo": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaNfsePeriodo = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaNfsePeriodoAlteracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaNfsePeriodoAlteracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaNfsePeriodoAlteracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaNfsePeriodoPrestador(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaNfsePeriodoPrestador": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaNfsePeriodoPrestador = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultaNfsePeriodoPrestadorAlteracao(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultaNfsePeriodoPrestadorAlteracao": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultaNfsePeriodoPrestadorAlteracao = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarCadastro(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarCadastro": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(False)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarCadastro = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarDirEnvio(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarDirEnvio": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarDirEnvio = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarDirFaixa(ByVal CNPJ As String, ByVal Data_Inicial As Date, ByVal Data_Final As Date, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarDirFaixa": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_INICIAL]", Format(Data_Inicial, "YYYY-MM-DD") & "T00:00:01")
    DadosMsg = Replace(DadosMsg, "[CAMPO_DATA_FINAL]", Format(Data_Final, "YYYY-MM-DD") & "T23:59:59")
    DadosMsg = Sign_XML(DadosMsg, Used_Companny)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarDirFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarLoteDir(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarLoteDir": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarLoteDir = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfseFaixa(ByVal CNPJ As String, ByVal Inscricao_Municipal As String, ByVal Nota_Inicial As String, _
                                   ByVal Nota_Final As String, ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarNfseFaixa": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    DadosMsg = Replace(DadosMsg, "[CAMPO_CNPJ]", CNPJ)
    DadosMsg = Replace(DadosMsg, "[CAMPO_INSCRICAO_MUNICIPAL]", Inscricao_Municipal)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_INICIAL]", Nota_Inicial)
    DadosMsg = Replace(DadosMsg, "[CAMPO_NOTA_FINAL]", Nota_Final)
    DadosMsg = Sign_XML(DadosMsg, Used_Companny, "#assinar")
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarNfseFaixa = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfsePorRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarNfsePorRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarNfsePorRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarNfseRecebida(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarNfseRecebida": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarNfseRecebida = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarSituacaoLoteDir(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarSituacaoLoteDir": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarSituacaoLoteDir = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function ConsultarSituacaoLoteRPS(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "ConsultarSituacaoLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    ConsultarSituacaoLoteRPS = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function GerarNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "GerarNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    GerarNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function RecepcionarLoteDir(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "RecepcionarLoteDir": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    RecepcionarLoteDir = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function RecepcionarLoteRps(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "RecepcionarLoteRps": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    RecepcionarLoteRps = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Public Function SubstituirNfse(ByVal Used_Companny As String) As Variant

    Dim Mount_Mensage As String, Operacao As String, DadosMsg As String
    
    Operacao = "SubstituirNfse": DadosMsg = Compor_MensagemXML(Operacao): Mount_Mensage = Message_Assemble(True)
    Mount_Mensage = Replace(Mount_Mensage, "[Mount_Mensage]", Operacao)
    Mount_Mensage = Replace(Mount_Mensage, "[DadosMsg]", DadosMsg)
    
    SubstituirNfse = Conection(Prefeitura_Utilizada, Mount_Mensage, Used_Companny)
    
End Function

Private Function Sign_XML(ByVal Xml_Not_Signing As String, ByVal Used_Companny As String, Optional URI As String = "") As String
    
    Dim SignedXml As z_cls_WsFuncoes
    
    Set SignedXml = New z_cls_WsFuncoes: Sign_XML = SignedXml.Sign_XML(Xml_Not_Signing, Used_Companny, URI): Set SignedXml = Nothing

End Function

Private Function Conection(ByVal Prefeitura As String, ByVal Mensage As String, ByVal Used_Companny As String) As Variant
    
    Dim Conexao As cls_Connection, Headers As Object
    
    Set Headers = CreateObject("Scripting.Dictionary")
        Headers.Add "Content-Type", "text/xml;charset=UTF-8"
        
    Set Conexao = New cls_Connection: Conection = Conexao.Conexao(Prefeitura, Mensage, Used_Companny, Headers): Set Conexao = Nothing
    
End Function

Private Function Message_Assemble(ByVal Alter_Version As Boolean) As String
    
    If Alter_Version Then
    
        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:ser=""http://service.nfse.integracao.ws.publica/"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<ser:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "<XML><![CDATA[[DadosMsg]]]></XML>"
        Message_Assemble = Message_Assemble & "</ser:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"
    
    Else
    
        Message_Assemble = "<soapenv:Envelope xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:ser=""http://service.nfse.integracao.ws.publica/"">"
        Message_Assemble = Message_Assemble & "<soapenv:Header/>"
        Message_Assemble = Message_Assemble & "<soapenv:Body>"
        Message_Assemble = Message_Assemble & "<ser:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "<json>[CabecMsg]</json>"
        Message_Assemble = Message_Assemble & "<usuario>[Usuario]</usuario>"
        Message_Assemble = Message_Assemble & "<senha>[Senha]</senha>"
        Message_Assemble = Message_Assemble & "</ser:[Mount_Mensage]>"
        Message_Assemble = Message_Assemble & "</soapenv:Body>"
        Message_Assemble = Message_Assemble & "</soapenv:Envelope>"
    
    End If

End Function

Private Function Compor_MensagemXML(Tipo As String) As String
   
    Dim MensagemXML As String
   
    Select Case Tipo
   
        Case Is = "CancelarDirEnvio"
    
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
           
        Case Is = "CancelarNfse"
    
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
       
        Case Is = "CartaCorrecaoNfseEnvio"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
       
        Case Is = "ConsultaDirCanceladasPeriodo"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
       
        Case Is = "ConsultaDirCompetenciaPrestador"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
       
        Case Is = "ConsultaDirPeriodo"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
           
        Case Is = "ConsultaDirPeriodoAlteracao"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
           
        Case Is = "ConsultaDirPeriodoPrestador"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
       
        Case Is = "ConsultaDirPeriodoPrestadorAlteracao"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
           
        Case Is = "ConsultaNfseCompetenciaPrestador"
          
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
          
        Case Is = "ConsultaNfsePeriodo"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
       
        Case Is = "ConsultaNfsePeriodoAlteracao"
       
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
           
        Case Is = "ConsultaNfsePeriodoPrestador"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
       
        Case Is = "ConsultaNfsePeriodoPrestadorAlteracao"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "ConsultarCadastro"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "ConsultarDirEnvio"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "ConsultarDirFaixa"
            
            MensagemXML = "<ConsultarDirFaixaEnvio xmlns=""http://www.publica.inf.br/dir"">"
            MensagemXML = MensagemXML & "<Tomador>"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "</Tomador>"
            MensagemXML = MensagemXML & "<Faixa>"
            MensagemXML = MensagemXML & "<DataDeclaracaoInicial>[CAMPO_DATA_INICIAL]</DataDeclaracaoInicial>"
            MensagemXML = MensagemXML & "<DataDeclaracaoFinal>[CAMPO_DATA_FINAL]</DataDeclaracaoFinal>"
            MensagemXML = MensagemXML & "</Faixa>"
            MensagemXML = MensagemXML & "</ConsultarDirFaixaEnvio>"
            
        Case Is = "ConsultarLoteDir"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "ConsultarLoteRps"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "ConsultarNfseFaixa"
            
            MensagemXML = "<ConsultarNfseFaixaEnvio xmlns=""http://www.publica.inf.br"">"
            MensagemXML = MensagemXML & "<Prestador id=""assinar"">"
            MensagemXML = MensagemXML & "<Cnpj>[CAMPO_CNPJ]</Cnpj>"
            MensagemXML = MensagemXML & "<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>"
            MensagemXML = MensagemXML & "</Prestador>"
            MensagemXML = MensagemXML & "<Faixa>"
            MensagemXML = MensagemXML & "<NumeroNfseInicial>[CAMPO_NOTA_INICIAL]</NumeroNfseInicial>"
            MensagemXML = MensagemXML & "<NumeroNfseFinal>[CAMPO_NOTA_FINAL]</NumeroNfseFinal>"
            MensagemXML = MensagemXML & "</Faixa>"
            MensagemXML = MensagemXML & "</ConsultarNfseFaixaEnvio>"
            
        Case Is = "ConsultarNfsePorRps"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
                        
        Case Is = "ConsultarNfseRecebida"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "ConsultarSituacaoLoteDir"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "ConsultarSituacaoLoteRps"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "GerarNfse"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "RecepcionarLoteDir"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "RecepcionarLoteRps"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
        Case Is = "SubstituirNfse"
            
            MensagemXML = ""
            MensagemXML = MensagemXML & ""
            
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
        Data = Array("Codigo Municipio", Dict_Xml.Item("TomadorServico.Endereco.CodigoMunicipio"))
        Set DictUF = DB_Connection.SetQuery(Read, Municipios, Data)
    Set DB_Connection = Nothing
    
    Url = Dict_Xml.Item("OutrasInformacoes") & vbNewLine & " " & Dict_Xml.Item("LinkVisualizacaoNfse")
          
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
                If Dict_Xml.Exists("Email") Then
                    Nodo.innerHTML = Dict_Xml.Item("Email")
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



}