<?php

namespace App\Services\Towns\Equiplano;

use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Equiplano extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $codeCity;

    protected static $headers = [];

    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns);
        static::$link = $this->getLinkForIbge($codeIbge);
        self::$url = explode("|", self::$link)[0];
        self::$codeCity = explode("|", self::$link)[1] ?? null;
    }

    public static function esCancelarNfse(): string|int
    {

        $operacao = 'esCancelarNfse';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage(True);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function esConsultarLoteRps(): string|int
    {

        $operacao = 'esConsultarLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage(True);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function esConsultarNfse(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Data_Inicial,
        string $Data_Final
    ): string|int {

        $operacao = 'esConsultarNfse';
        $mountMessage = self::assembleMessage(True);
        $dataMsg = self::composeMessage($operacao);
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_INICIAL]', date("Ymd", strtotime($Data_Inicial)) . "T00:00:01", $dataMsg);
        $dataMsg = Str::replace('[CAMPO_DATA_FINAL]', date("Ymd", strtotime($Data_Final)) . "T23:59:59", $dataMsg);
        $dataMsg = Str::replace('[CAMPO_ID_ENTIDADE]', self::$codeCity, $dataMsg);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function esConsultarNfsePorRps(): string|int
    {

        $operacao = 'esConsultarNfsePorRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage(True);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function esConsultarSituacaoLoteRps(): string|int
    {

        $operacao = 'esConsultarSituacaoLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage(True);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function esRecepcionarLoteRps(): string|int
    {

        $operacao = 'esRecepcionarLoteRps';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage(True);
        $dataMsg = parent::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function esStatusWebServices(): string|int
    {

        $operacao = 'esStatusWebServices';
        $mountMessage = self::assembleMessage(False);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(bool $alterVersion): string
    {

        if ($alterVersion) {
            $assembleMessage = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:ser="http://services.enfsws.es">';
            $assembleMessage .= '<soap:Header/>';
            $assembleMessage .= '<soap:Body>';
            $assembleMessage .= '<ser:[Mount_Mensage]>';
            $assembleMessage .= '<ser:nrVersaoXml>3</ser:nrVersaoXml>';
            $assembleMessage .= '<ser:xml><![CDATA[[DadosMsg]]]></ser:xml>';
            $assembleMessage .= '</ser:[Mount_Mensage]>';
            $assembleMessage .= '</soap:Body>';
            $assembleMessage .= '</soap:Envelope>';
        } else {
            $assembleMessage = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:ser="http://services.enfsws.es">';
            $assembleMessage .= '<soap:Header/>';
            $assembleMessage .= '<soap:Body>';
            $assembleMessage .= '<ser:[Mount_Mensage]></ser:[Mount_Mensage]>';
            $assembleMessage .= '</soap:Body>';
            $assembleMessage .= '</soap:Envelope>';
        }

        return $assembleMessage;
    }

    private static function composeMessage(string $type): string
    {

        switch ($type) {

            case 'esCancelarNfse':

                $MensagemXML = '<es:esCancelarNfseEnvio xmlns:es="http://www.equiplano.com.br/esnfs" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.equiplano.com.br/enfs esCancelarNfseEnvio_v01.xsd">';
                $MensagemXML .= '<prestador>';
                $MensagemXML .= '<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>';
                $MensagemXML .= '<cnpj>12345678901234</cnpj>';
                $MensagemXML .= '<idEntidade>136</idEntidade>';
                $MensagemXML .= '</prestador>';
                $MensagemXML .= '<nrNfse>1</nrNfse>';
                $MensagemXML .= '<dsMotivoCancelamento>Cancelamento</dsMotivoCancelamento>';
                $MensagemXML .= '</es:esCancelarNfseEnvio>';

            case 'esConsultarLoteRps':

                $MensagemXML = '<es:esConsultarLoteRpsEnvio xmlns:es="http://www.equiplano.com.br/esnfs" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.equiplano.com.br/enfs esConsultarLoteRpsEnvio_v01.xsd">';
                $MensagemXML .= '<prestador>';
                $MensagemXML .= '<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>';
                $MensagemXML .= '<cnpj>12345678901234</cnpj>';
                $MensagemXML .= '<idEntidade>136</idEntidade>';
                $MensagemXML .= '</prestador>';
                $MensagemXML .= '<nrLoteRps>1</nrLoteRps>';
                $MensagemXML .= '</es:esConsultarLoteRpsEnvio>';

            case 'esConsultarNfse':

                $MensagemXML = '<es:esConsultarNfseEnvio xmlns:es="http://www.equiplano.com.br/esnfs" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.equiplano.com.br/enfs esConsultarNfseEnvio_v01.xsd">';
                $MensagemXML .= '<prestador>';
                $MensagemXML .= '<nrInscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</nrInscricaoMunicipal>';
                $MensagemXML .= '<cnpj>[CAMPO_CNPJ]</cnpj>';
                $MensagemXML .= '<idEntidade>[CAMPO_ID_ENTIDADE]</idEntidade>';
                $MensagemXML .= '</prestador>';
                $MensagemXML .= '<periodoEmissao>';
                $MensagemXML .= '<dtInicial>[CAMPO_DATA_INICIAL]</dtInicial>';
                $MensagemXML .= '<dtFinal>[CAMPO_DATA_FINAL]</dtFinal>';
                $MensagemXML .= '</periodoEmissao>';
                $MensagemXML .= '</es:esConsultarNfseEnvio>';

            case 'esConsultarNfsePorRps':

                $MensagemXML = '<es:esConsultarNfsePorRpsEnvio xmlns:es="http://www.equiplano.com.br/esnfs" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.equiplano.com.br/enfs esConsultarNfsePorRpsEnvio_v01.xsd">';
                $MensagemXML .= '<rps>';
                $MensagemXML .= '<nrRps>[CAMPO_NUMERO_RPS]</nrRps>';
                $MensagemXML .= '<nrEmissorRps>[CAMPO_EMISSOR_RPS]</nrEmissorRps>';
                $MensagemXML .= '</rps>';
                $MensagemXML .= '<prestador>';
                $MensagemXML .= '<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>';
                $MensagemXML .= '<cnpj>[CAMPO_CNPJ]</cnpj>';
                $MensagemXML .= '<idEntidade>[CAMPO_ID_ENTIDADE]</idEntidade>';
                $MensagemXML .= '</prestador>';
                $MensagemXML .= '</es:esConsultarNfsePorRpsEnvio>';

            case 'esConsultarSituacaoLoteRps':

                $MensagemXML = '<es:esConsultarSituacaoLoteRpsEnvio xmlns:es="http://www.equiplano.com.br/esnfs" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.equiplano.com.br/enfs esConsultarSituacaoLoteRpsEnvio_v01.xsd">';
                $MensagemXML .= '<prestador>';
                $MensagemXML .= '<nrInscricaoMunicipal>1234</nrInscricaoMunicipal>';
                $MensagemXML .= '<cnpj>12345678901234</cnpj>';
                $MensagemXML .= '<idEntidade>136</idEntidade>';
                $MensagemXML .= '</prestador>';
                $MensagemXML .= '<nrLoteRps>1</nrLoteRps>';
                $MensagemXML .= '</es:esConsultarSituacaoLoteRpsEnvio>';

            case 'esRecepcionarLoteRps':

                $MensagemXML = '<es:enviarLoteRpsEnvio xmlns:es="http://www.equiplano.com.br/esnfs" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.equiplano.com.br/enfs esRecepcionarLoteRpsEnvio_v01.xsd">';
                $MensagemXML .= '<lote>';
                $MensagemXML .= '<nrLote>1</nrLote>';
                $MensagemXML .= '<qtRps>1</qtRps>';
                $MensagemXML .= '<nrVersaoXml>1</nrVersaoXml>';
                $MensagemXML .= '<prestador>';
                $MensagemXML .= '<nrCnpj>99999999999999</nrCnpj>';
                $MensagemXML .= '<nrInscricaoMunicipal>123456</nrInscricaoMunicipal>';
                $MensagemXML .= '<!--  isOptanteSimplesNacional obrigatório {1=sim, 2=não}  -->';
                $MensagemXML .= '<isOptanteSimplesNacional>2</isOptanteSimplesNacional>';
                $MensagemXML .= '<!--  idEntidade obrigatório  -->';
                $MensagemXML .= '<idEntidade>136</idEntidade>';
                $MensagemXML .= '</prestador>';
                $MensagemXML .= '<listaRps>';
                $MensagemXML .= '<rps>';
                $MensagemXML .= '<!--  nrRps obrigatório  -->';
                $MensagemXML .= '<nrRps>4</nrRps>';
                $MensagemXML .= '<!--  nrEmissorRps obrigatório  -->';
                $MensagemXML .= '<nrEmissorRps>1</nrEmissorRps>';
                $MensagemXML .= '<!--  dtEmissaoRps obrigatório  -->';
                $MensagemXML .= '<dtEmissaoRps>2009-06-15T10:00:00</dtEmissaoRps>';
                $MensagemXML .= '<!--  stRps obrigatório {1=converter, 2=converter e cancelar NFS, 3=cancelar RPS} -->';
                $MensagemXML .= '<stRps>1</stRps>';
                $MensagemXML .= '<!--  tpTributacao obrigatório {1=tributado no munícipio, 2=em outro munícipio, 3=isento/imune, 4=suspenso/decisão judicial} -->';
                $MensagemXML .= '<tpTributacao>1</tpTributacao>';
                $MensagemXML .= '<!--  isIssRetido obrigatório {1=sim, 2=não} -->';
                $MensagemXML .= '<isIssRetido>2</isIssRetido>';
                $MensagemXML .= '<tomador>';
                $MensagemXML .= '<documento>';
                $MensagemXML .= '<!--  nrDocumento obrigatório  -->';
                $MensagemXML .= '<nrDocumento>38693524000188</nrDocumento>';
                $MensagemXML .= '<!--  tpDocumento obrigatório {1=cpf, 2=cnpj, 3=estrangeiro} -->';
                $MensagemXML .= '<tpDocumento>1</tpDocumento>';
                $MensagemXML .= '<!--  dsDocumentoEstrangeiro obrigatório se tpDocumento=3 -->';
                $MensagemXML .= '<dsDocumentoEstrangeiro/>';
                $MensagemXML .= '</documento>';
                $MensagemXML .= '<!--  nmTomador obrigatório  -->';
                $MensagemXML .= '<nmTomador>Gancho Serviços Marítimos</nmTomador>';
                $MensagemXML .= '<dsEmail>contato@gancho.com.br</dsEmail>';
                $MensagemXML .= '<nrInscricaoEstadual>19518744</nrInscricaoEstadual>';
                $MensagemXML .= '<nrInscricaoMunicipal>555</nrInscricaoMunicipal>';
                $MensagemXML .= '<dsEndereco>R dos Navegantes 123, 321</dsEndereco>';
                $MensagemXML .= '<nrEndereco>123</nrEndereco>';
                $MensagemXML .= '<dsComplemento>321</dsComplemento>';
                $MensagemXML .= '<nmBairro>Boa Viagem</nmBairro>';
                $MensagemXML .= '<nrCidadeIbge>261160</nrCidadeIbge>';
                $MensagemXML .= '<nmUf>PR</nmUf>';
                $MensagemXML .= '<nmCidadeEstrangeira/>';
                $MensagemXML .= '<!--  nmPais obrigatório  -->';
                $MensagemXML .= '<nmPais>Brasil</nmPais>';
                $MensagemXML .= '<nrCep>51021010</nrCep>';
                $MensagemXML .= '<nrTelefone>41 99999999</nrTelefone>';
                $MensagemXML .= '</tomador>';
                $MensagemXML .= '<listaServicos>';
                $MensagemXML .= '<servico>';
                $MensagemXML .= '<!--  nrServicoItem obrigatório  -->';
                $MensagemXML .= '<nrServicoItem>36</nrServicoItem>';
                $MensagemXML .= '<!--  nrServicoSubItem obrigatório  -->';
                $MensagemXML .= '<nrServicoSubItem>1</nrServicoSubItem>';
                $MensagemXML .= '<!--  vlServico obrigatório  -->';
                $MensagemXML .= '<vlServico>1100.32</vlServico>';
                $MensagemXML .= '<!--  vlAliquota obrigatório  -->';
                $MensagemXML .= '<vlAliquota>0.05</vlAliquota>';
                $MensagemXML .= '<deducao>';
                $MensagemXML .= '<vlDeducao>1.0</vlDeducao>';
                $MensagemXML .= '<!--  dsJustificativaDeducao obrigatório Se informado vlDeducao -->';
                $MensagemXML .= '<dsJustificativaDeducao>teste</dsJustificativaDeducao>';
                $MensagemXML .= '</deducao>';
                $MensagemXML .= '<!--  vlBaseCalculo obrigatório  -->';
                $MensagemXML .= '<vlBaseCalculo>1100.00</vlBaseCalculo>';
                $MensagemXML .= '<!--  vlIssServico obrigatório  -->';
                $MensagemXML .= '<vlIssServico>55.02</vlIssServico>';
                $MensagemXML .= '<!--  dsDiscriminacaoServico obrigatório  -->';
                $MensagemXML .= '<dsDiscriminacaoServico> Teste de RPS - Discriminação do serviço (permite caracteres especiais) </dsDiscriminacaoServico>';
                $MensagemXML .= '</servico>';
                $MensagemXML .= '</listaServicos>';
                $MensagemXML .= '<!--  vlTotalRps obrigatório  -->';
                $MensagemXML .= '<vlTotalRps>1100.32</vlTotalRps>';
                $MensagemXML .= '<!--  vlLiquidoRps obrigatório  -->';
                $MensagemXML .= '<vlLiquidoRps>1100.32</vlLiquidoRps>';
                $MensagemXML .= '<retencoes>';
                $MensagemXML .= '<vlCofins>20</vlCofins>';
                $MensagemXML .= '<vlCsll>50</vlCsll>';
                $MensagemXML .= '<vlInss>30</vlInss>';
                $MensagemXML .= '<vlIrrf>40</vlIrrf>';
                $MensagemXML .= '<vlPis>10</vlPis>';
                $MensagemXML .= '<!--  vlIss obrigatório se isIssRetido = 1  -->';
                $MensagemXML .= '<vlIss>10</vlIss>';
                $MensagemXML .= '<vlAliquotaCofins>2.0</vlAliquotaCofins>';
                $MensagemXML .= '<vlAliquotaCsll>3.0</vlAliquotaCsll>';
                $MensagemXML .= '<vlAliquotaInss>4.0</vlAliquotaInss>';
                $MensagemXML .= '<vlAliquotaIrrf>5.0</vlAliquotaIrrf>';
                $MensagemXML .= '<vlAliquotaPis>6.0</vlAliquotaPis>';
                $MensagemXML .= '</retencoes>';
                $MensagemXML .= '</rps>';
                $MensagemXML .= '</listaRps>';
                $MensagemXML .= '</lote>';
                $MensagemXML .= '</es:enviarLoteRpsEnvio>';
        }

        return $MensagemXML;
    }
}
