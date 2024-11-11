<?php

namespace App\Services\Towns\GeisWeb;

use App\Services\Utils\Towns\Bases\LinkTownBase;

class GeisWeb extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $headerVersion;

    protected static $headers = [
        'Content-Type' => 'text/xml;charset=UTF-8',
    ];

    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns);
        static::$link = $this->getLinkForIbge($codeIbge);
        self::$url = explode("|", self::$link)[0];
        self::$headerVersion = explode("|", self::$link)[1] ?? null;
    }


    public static function CancelaNfse(
        string $cnpj,
        string $numeroNF,
    ): string | int {

        $operacao = 'CancelaNfse';
        $mountMessage = self::Message_Assemble();
        $dataMsg = self::Compor_MensagemXML($operacao);
        $dataMsg = Str::replace("[CAMPO_CNPJ]", $cnpj, $dataMsg);
        $dataMsg = Str::replace("[CAMPO_NUMERO_NF]", $numeroNF, $dataMsg);
        $mountMessage = Str::replace("[Mount_Mensage]", $operacao, $mountMessage);
        $mountMessage = Str::replace("[DadosMsg]", $dataMsg, $mountMessage);

        return parent::Conection(self::$url, Mount_Mensage, self::$headers, self::$verb, true);
    }

    public static function ConsultaLoteRps(
        string $cnpj,
        string $numeroLote
    ): string | int {

        $operacao = 'ConsultaLoteRps';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CNPJ]', CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_LOTE]', $numeroLote, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, true);
    }

    public static function ConsultaNfse(
        string $cnpj,
        string $dataInicial,
        string $dataFinal,
        int $page = 1
    ): string | int {

        $operacao = 'ConsultaNfse';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $cnpj, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_INICIAL]', Format($dataInicial, 'DD/MM/YYYY'), $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_FINAL]', Format($dataFinal, 'DD/MM/YYYY'), $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_PAGINA]', $page, $dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, true);
    }

    public static function ConsultaRps(
        string $cnpj,
        string $dataInicial,
        string $dataFinal,
        int $page = 1
    ): string | int {

        $operacao = 'ConsultaRps';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_CNPJ]', CNPJ);
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_DATA_INICIAL]', Format(Data_Inicial, 'DD/MM/YYYY'));
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_DATA_FINAL]', Format(Data_Final, 'DD/MM/YYYY'));
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_NUMERO_PAGINA]', Pagina);
        $mountMessage = Str::replace(Mount_Mensage, '[Mount_Mensage]', $operacao);
        $mountMessage = Str::replace(Mount_Mensage, '[DadosMsg]', DadosMsg);

        return parent::Conection(self::$url, Mount_Mensage, self::$headers, self::$verb, true);
    }

    public static function ConsultaSituacaoLoteAsync(
        string $cnpj,
        string $numeroLote,
        string $numeroProtocolo
    ): string | int {

        $operacao = 'ConsultaSituacaoLoteAsync';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_CNPJ]', CNPJ);
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_NUMERO_LOTE]', Numero_Lote);
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_NUMERO_PROTOCOLO]', Numero_Protocolo);
        $mountMessage = Str::replace(Mount_Mensage, '[Mount_Mensage]', $operacao);
        $mountMessage = Str::replace(Mount_Mensage, '[DadosMsg]', DadosMsg);

        return parent::Conection(self::$url, Mount_Mensage, self::$headers, self::$verb, true);
    }

    public static function EmailNFSeTomador(
        string $cnpj,
        string $numeroNF,
        string $emailsEnvio
    ): string | int {

        $operacao = 'EmailNFSeTomador';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_CNPJ]', CNPJ);
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_NUMERO_NF]', Numero_NF);
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_EMAIL]', Emails_Envio);
        $mountMessage = Str::replace(Mount_Mensage, '[Mount_Mensage]', $operacao);
        $mountMessage = Str::replace(Mount_Mensage, '[DadosMsg]', DadosMsg);

        return parent::Conection(self::$url, Mount_Mensage, self::$headers, self::$verb, true);
    }

    public static function EnviaLoteRps(
        string $cnpj
    ): string | int {

        $operacao = 'EnviaLoteRps';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_CNPJ]', CNPJ);
        $dataMsg = parent::Sign_XML(DadosMsg, Used_Companny);
        $mountMessage = Str::replace(Mount_Mensage, '[Mount_Mensage]', $operacao);
        $mountMessage = Str::replace(Mount_Mensage, '[DadosMsg]', DadosMsg);

        return parent::Conection(self::$url, Mount_Mensage, self::$headers, self::$verb, true);
    }

    public static function EnviaLoteRpsAsync(
        string $cnpj
    ): string | int {

        $operacao = 'EnviaLoteRpsAsync';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_CNPJ]', CNPJ);
        $dataMsg = parent::Sign_XML(DadosMsg, Used_Companny);
        $mountMessage = Str::replace(Mount_Mensage, '[Mount_Mensage]', $operacao);
        $mountMessage = Str::replace(Mount_Mensage, '[DadosMsg]', DadosMsg);

        return parent::Conection(self::$url, Mount_Mensage, self::$headers, self::$verb, true);
    }

    public static function GeraPDFNFSe(
        string $cnpj,
        string $numeroNF,
        string $cnpjTomador
    ): string | int {

        $operacao = 'GeraPDFNFSe';
        $dataMsg = self::Compor_MensagemXML($operacao);
        $mountMessage = self::Message_Assemble();
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_CNPJ]', CNPJ);
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_NUMERO_NF]', Numero_NF);
        $dataMsg = Str::replace(DadosMsg, '[CAMPO_TOMADOR]', CNPJ_Tomador);
        $mountMessage = Str::replace(Mount_Mensage, '[Mount_Mensage]', $operacao);
        $mountMessage = Str::replace(Mount_Mensage, '[DadosMsg]', DadosMsg);

        return parent::Conection(self::$url, Mount_Mensage, self::$headers, self::$verb, true);
    }

    /*private static function Message_Assemble(): string

            Message_Assemble = '<soapenv:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soapenv=""http://schemas.xmlsoap.org/soap/envelope/"" xmlns:geis=""urn:https://www.geisweb.net.br/producao/cajamar/webservice/GeisWebServiceImpl.php"">"
            Message_Assemble = Message_Assemble & "<soapenv:Header/>"
            Message_Assemble = Message_Assemble & "<soapenv:Body>"
            Message_Assemble = Message_Assemble & "<geis:[Mount_Mensage] soapenv:encodingStyle=""http://schemas.xmlsoap.org/soap/encoding/"">"
            Message_Assemble = Message_Assemble & "<[Mount_Mensage] xsi:type=""xsd:string""><![CDATA[[DadosMsg]]]></[Mount_Mensage]>"
            Message_Assemble = Message_Assemble & "</geis:[Mount_Mensage]>"
            Message_Assemble = Message_Assemble & "</soapenv:Body>"
            Message_Assemble = Message_Assemble & "</soapenv:Envelope>"

    }

    private static function Compor_MensagemXML(string $type): string
    {

        switch ($type){

            Case Is = "CancelaNfse"

                MensagemXML = "<CancelaNfse>"
                MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
                MensagemXML = MensagemXML & "<Cancela>"
                MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
                MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NUMERO_NF]</NumeroNfse>"
                MensagemXML = MensagemXML & "</Cancela>"
                MensagemXML = MensagemXML & "</CancelaNfse>"

            Case Is = "ConsultaLoteRps"

                MensagemXML = "<ConsultaLoteRps>"
                MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
                MensagemXML = MensagemXML & "<Consulta>"
                MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
                MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
                MensagemXML = MensagemXML & "</Consulta>"
                MensagemXML = MensagemXML & "</ConsultaLoteRps>"

            Case Is = "ConsultaNfse"

                MensagemXML = "<ConsultaNfse>"
                MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
                MensagemXML = MensagemXML & "<Consulta>"
                MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
                MensagemXML = MensagemXML & "<NumeroNfse/>"
                MensagemXML = MensagemXML & "<DtInicial>[CAMPO_DATA_INICIAL]</DtInicial>"
                MensagemXML = MensagemXML & "<DtFinal>[CAMPO_DATA_FINAL]</DtFinal>"
                MensagemXML = MensagemXML & "<NumeroInicial/>"
                MensagemXML = MensagemXML & "<NumeroFinal/>"
                MensagemXML = MensagemXML & "<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina>"
                MensagemXML = MensagemXML & "</Consulta>"
                MensagemXML = MensagemXML & "</ConsultaNfse>"

            Case Is = "ConsultaRps"

                MensagemXML = "<ConsultaRps>"
                MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
                MensagemXML = MensagemXML & "<Consulta>"
                MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
                MensagemXML = MensagemXML & "<NumeroRps/>"
                MensagemXML = MensagemXML & "<DtInicial>[CAMPO_DATA_INICIAL]</DtInicial>"
                MensagemXML = MensagemXML & "<DtFinal>[CAMPO_DATA_FINAL]</DtFinal>"
                MensagemXML = MensagemXML & "<NumeroInicial/>"
                MensagemXML = MensagemXML & "<NumeroFinal/>"
                MensagemXML = MensagemXML & "<Pagina>[CAMPO_NUMERO_PAGINA]</Pagina>"
                MensagemXML = MensagemXML & "</Consulta>"
                MensagemXML = MensagemXML & "</ConsultaRps>"

            Case Is = "ConsultaSituacaoLoteAsync"

                MensagemXML = "<ConsultaSituacaoLoteAsync>"
                MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
                MensagemXML = MensagemXML & "<Consulta>"
                MensagemXML = MensagemXML & "<CnpjCpfPrestador>[CAMPO_CNPJ]</CnpjCpfPrestador>"
                MensagemXML = MensagemXML & "<NumeroLote>[CAMPO_NUMERO_LOTE]</NumeroLote>"
                MensagemXML = MensagemXML & "<NumeroProtocolo>[CAMPO_NUMERO_PROTOCOLO]</NumeroProtocolo>"
                MensagemXML = MensagemXML & "</Consulta>"
                MensagemXML = MensagemXML & "</ConsultaSituacaoLoteAsync>"

            Case Is = "EmailNFSeTomador"

                MensagemXML = "<EmailNFSeTomador>"
                MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
                MensagemXML = MensagemXML & "<Envia>"
                MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NUMERO_NF]</NumeroNfse>"
                MensagemXML = MensagemXML & "<EmailTomador>[CAMPO_EMAIL]</EmailTomador>"
                MensagemXML = MensagemXML & "</Envia>"
                MensagemXML = MensagemXML & "</EmailNFSeTomador>"

            Case Is = "EnviaLoteRps"

                MensagemXML = "<EnviaLoteRps xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps.xsd"">"
                MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
                MensagemXML = MensagemXML & "<NumeroLote>1A1A</NumeroLote>"
                MensagemXML = MensagemXML & "<Rps xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps.xsd"">"
                MensagemXML = MensagemXML & "<IdentificacaoRps>"
                MensagemXML = MensagemXML & "<NumeroRps>1</NumeroRps>"
                MensagemXML = MensagemXML & "</IdentificacaoRps>"
                MensagemXML = MensagemXML & "<DataEmissao>10/02/2020</DataEmissao>"
                MensagemXML = MensagemXML & "<Servico>"
                MensagemXML = MensagemXML & "<Valores>"
                MensagemXML = MensagemXML & "<ValorServicos>10000.00</ValorServicos>"
                MensagemXML = MensagemXML & "<BaseCalculo>2.00</BaseCalculo>"
                MensagemXML = MensagemXML & "<Aliquota>2.45678</Aliquota>"
                MensagemXML = MensagemXML & "</Valores>"
                MensagemXML = MensagemXML & "<CodigoServico>101</CodigoServico>"
                MensagemXML = MensagemXML & "<TipoLancamento>P</TipoLancamento>"
                MensagemXML = MensagemXML & "<Discriminacao/>"
                MensagemXML = MensagemXML & "<MunicipioPrestacaoServico>BOTUCATU</MunicipioPrestacaoServico>"
                MensagemXML = MensagemXML & "</Servico>"
                MensagemXML = MensagemXML & "<PrestadorServico>"
                MensagemXML = MensagemXML & "<IdentificacaoPrestador>"
                MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
                MensagemXML = MensagemXML & "<InscricaoMunicipal>A</InscricaoMunicipal>"
                MensagemXML = MensagemXML & "<Regime>1</Regime>"
                MensagemXML = MensagemXML & "</IdentificacaoPrestador>"
                MensagemXML = MensagemXML & "</PrestadorServico>"
                MensagemXML = MensagemXML & "<TomadorServico>"
                MensagemXML = MensagemXML & "<IdentificacaoTomador>"
                MensagemXML = MensagemXML & "<CnpjCpf>34485304841</CnpjCpf>"
                MensagemXML = MensagemXML & "</IdentificacaoTomador>"
                MensagemXML = MensagemXML & "<RazaoSocial>MARCIO DE OLIVEIRA JUNQUEIRA</RazaoSocial>"
                MensagemXML = MensagemXML & "<Endereco>"
                MensagemXML = MensagemXML & "<Rua>Rua Veneras Benzema</Rua>"
                MensagemXML = MensagemXML & "<Numero>888</Numero>"
                MensagemXML = MensagemXML & "<Bairro>RIBAS KOMEN</Bairro>"
                MensagemXML = MensagemXML & "<Cidade>BOTUCATU</Cidade>"
                MensagemXML = MensagemXML & "<Estado>SP</Estado>"
                MensagemXML = MensagemXML & "<Cep/>"
                MensagemXML = MensagemXML & "</Endereco>"
                MensagemXML = MensagemXML & "</TomadorServico>"
                MensagemXML = MensagemXML & "<OrgaoGerador>"
                MensagemXML = MensagemXML & "<CodigoMunicipio/>"
                MensagemXML = MensagemXML & "<Uf/>"
                MensagemXML = MensagemXML & "</OrgaoGerador>"
                MensagemXML = MensagemXML & "<OutrosImpostos>"
                MensagemXML = MensagemXML & "<Pis>1.00</Pis>"
                MensagemXML = MensagemXML & "<Cofins>11.00</Cofins>"
                MensagemXML = MensagemXML & "<Csll>111.00</Csll>"
                MensagemXML = MensagemXML & "<Irrf>1111.00</Irrf>"
                MensagemXML = MensagemXML & "<Inss>11111.11</Inss>"
                MensagemXML = MensagemXML & "</OutrosImpostos>"
                MensagemXML = MensagemXML & "</Rps>"
                MensagemXML = MensagemXML & "</EnviaLoteRps>"

            Case Is = "EnviaLoteRpsAsync"

                MensagemXML = "<EnviaLoteRpsAsync xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps_async.xsd"">"
                MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
                MensagemXML = MensagemXML & "<NumeroLote>1A1A</NumeroLote>"
                MensagemXML = MensagemXML & "<Rps xmlns=""http://www.geisweb.com.br/xsd/envio_lote_rps_async.xsd"">"
                MensagemXML = MensagemXML & "<IdentificacaoRps>"
                MensagemXML = MensagemXML & "<NumeroRps>1</NumeroRps>"
                MensagemXML = MensagemXML & "</IdentificacaoRps>"
                MensagemXML = MensagemXML & "<DataEmissao>10/02/2020</DataEmissao>"
                MensagemXML = MensagemXML & "<Servico>"
                MensagemXML = MensagemXML & "<Valores>"
                MensagemXML = MensagemXML & "<ValorServicos>10000.00</ValorServicos>"
                MensagemXML = MensagemXML & "<BaseCalculo>2.00</BaseCalculo>"
                MensagemXML = MensagemXML & "<Aliquota>2.45678</Aliquota>"
                MensagemXML = MensagemXML & "</Valores>"
                MensagemXML = MensagemXML & "<CodigoServico>101</CodigoServico>"
                MensagemXML = MensagemXML & "<TipoLancamento>P</TipoLancamento>"
                MensagemXML = MensagemXML & "<Discriminacao/>"
                MensagemXML = MensagemXML & "<MunicipioPrestacaoServico>BOTUCATU</MunicipioPrestacaoServico>"
                MensagemXML = MensagemXML & "</Servico>"
                MensagemXML = MensagemXML & "<PrestadorServico>"
                MensagemXML = MensagemXML & "<IdentificacaoPrestador>"
                MensagemXML = MensagemXML & "<CnpjCpf>05198313000110</CnpjCpf>"
                MensagemXML = MensagemXML & "<InscricaoMunicipal>A</InscricaoMunicipal>"
                MensagemXML = MensagemXML & "<Regime>1</Regime>"
                MensagemXML = MensagemXML & "</IdentificacaoPrestador>"
                MensagemXML = MensagemXML & "</PrestadorServico>"
                MensagemXML = MensagemXML & "<TomadorServico>"
                MensagemXML = MensagemXML & "<IdentificacaoTomador>"
                MensagemXML = MensagemXML & "<CnpjCpf>34485304841</CnpjCpf>"
                MensagemXML = MensagemXML & "</IdentificacaoTomador>"
                MensagemXML = MensagemXML & "<RazaoSocial>MARCIO DE OLIVEIRA JUNQUEIRA</RazaoSocial>"
                MensagemXML = MensagemXML & "<Endereco>"
                MensagemXML = MensagemXML & "<Rua>Rua Veneras Benzema</Rua>"
                MensagemXML = MensagemXML & "<Numero>888</Numero>"
                MensagemXML = MensagemXML & "<Bairro>RIBAS KOMEN</Bairro>"
                MensagemXML = MensagemXML & "<Cidade>BOTUCATU</Cidade>"
                MensagemXML = MensagemXML & "<Estado>SP</Estado>"
                MensagemXML = MensagemXML & "<Cep/>"
                MensagemXML = MensagemXML & "</Endereco>"
                MensagemXML = MensagemXML & "</TomadorServico>"
                MensagemXML = MensagemXML & "<OrgaoGerador>"
                MensagemXML = MensagemXML & "<CodigoMunicipio/>"
                MensagemXML = MensagemXML & "<Uf/>"
                MensagemXML = MensagemXML & "</OrgaoGerador>"
                MensagemXML = MensagemXML & "<OutrosImpostos>"
                MensagemXML = MensagemXML & "<Pis>1.00</Pis>"
                MensagemXML = MensagemXML & "<Cofins>11.00</Cofins>"
                MensagemXML = MensagemXML & "<Csll>111.00</Csll>"
                MensagemXML = MensagemXML & "<Irrf>1111.00</Irrf>"
                MensagemXML = MensagemXML & "<Inss>11111.11</Inss>"
                MensagemXML = MensagemXML & "</OutrosImpostos>"
                MensagemXML = MensagemXML & "</Rps>"
                MensagemXML = MensagemXML & "</EnviaLoteRpsAsync>"

            Case Is = "GeraPDFNFSe"

                MensagemXML = "<GeraPDFNFSe>"
                MensagemXML = MensagemXML & "<CnpjCpf>[CAMPO_CNPJ]</CnpjCpf>"
                MensagemXML = MensagemXML & "<Baixa>"
                MensagemXML = MensagemXML & "<NumeroNfse>[CAMPO_NUMERO_NF]</NumeroNfse>"
                MensagemXML = MensagemXML & "<Tomador>[CAMPO_TOMADOR]</Tomador>"
                MensagemXML = MensagemXML & "</Baixa>"
                MensagemXML = MensagemXML & "</GeraPDFNFSe>"

        }

        return MensagemXML;

    }*/
}
