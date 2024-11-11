<?php

namespace App\Services\Towns\Desenvolve;

use App\Enums\TypeRPS;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Desenvolve extends LinkTownBase
{

    protected static $link;
    protected static $verb = 'POST';
    private static $url;
    private static $headerVersion;

    protected static $headers = [];

    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns);
        static::$link = $this->getLinkForIbge($codeIbge);
        self::$url = explode("|", self::$link)[0];
        self::$headerVersion = explode("|", self::$link)[1] ?? null;
    }

    public static function cancelarNfseEnvio(): string|int
    {

        $operacao = 'cancelarNfseEnvio';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function consultarLoteRpsEnvio(): string|int
    {

        $operacao = 'consultarLoteRpsEnvio';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function consultarNfseRpsEnvio(
        string $CNPJ,
        string $Inscricao_Municipal,
        string $Numero_RPS,
        string $Serie_RPS,
        TypeRPS $Tipo_RPS
    ): string|int {

        $operacao = 'consultarNfseRpsEnvio';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $dataMsg = Str::replace('[CAMPO_CNPJ]', $CNPJ, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_INSCRICAO_MUNICIPAL]', $Inscricao_Municipal, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_NUMERO_RPS]', $Numero_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_SERIE_RPS]', $Serie_RPS, $dataMsg);
        $dataMsg = Str::replace('[CAMPO_TIPO_RPS]', $Tipo_RPS[0], $dataMsg);
        $dataMsg = self::Sign_XML($dataMsg);
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function consultarNfseServicoTomadoEnvio(): string|int
    {

        $operacao = 'consultarNfseServicoTomadoEnvio';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function enviarLoteRpsEnvio(): string|int
    {

        $operacao = 'enviarLoteRpsEnvio';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function enviarLoteRpsSincronoEnvio(): string|int
    {

        $operacao = 'enviarLoteRpsSincronoEnvio';
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function gerarNfseEnvio(): string|int
    {

        $operacao = "gerarNfseEnvio";
        $dataMsg = self::composeMessage($operacao);
        $mountMessage = self::assembleMessage();
        $mountMessage = Str::replace('[Mount_Mensage]', $operacao, $mountMessage);
        $mountMessage = Str::replace('[DadosMsg]', $dataMsg, $mountMessage);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function assembleMessage(): string
    {

        $assembleMessage = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.integracao.nfsd.desenvolve/">';
        $assembleMessage .= '<soapenv:Header/>';
        $assembleMessage .= '<soapenv:Body>';
        $assembleMessage .= '<ws:[Mount_Mensage]>';
        $assembleMessage .= '<xml><![CDATA[[DadosMsg]]]></xml>';
        $assembleMessage .= '</ws:[Mount_Mensage]>';
        $assembleMessage .= '</soapenv:Body>';
        $assembleMessage .= '</soapenv:Envelope>';

        return $assembleMessage;
    }

    private static function composeMessage(string $Tipo): string
    {

        $MensagemXML = '';

        switch ($Tipo) {

            case 'cancelarNfseEnvio':

                $MensagemXML = '';

            case 'consultarLoteRpsEnvio':

                $MensagemXML = '';

            case 'consultarNfseRpsEnvio':

                $MensagemXML = '<ConsultarNfseRpsEnvio xmlns="http://www.abrasf.org.br/nfse.xsd">';
                $MensagemXML .= '<IdentificacaoRps>';
                $MensagemXML .= '<Numero>[CAMPO_NUMERO_RPS]</Numero>';
                $MensagemXML .= '<Serie>[CAMPO_SERIE_RPS]</Serie>';
                $MensagemXML .= '<Tipo>[CAMPO_TIPO_RPS]</Tipo>';
                $MensagemXML .= '</IdentificacaoRps>';
                $MensagemXML .= '<Prestador>';
                $MensagemXML .= '<CpfCnpj>';
                $MensagemXML .= '<Cnpj>[CAMPO_CNPJ]</Cnpj>';
                $MensagemXML .= '</CpfCnpj>';
                $MensagemXML .= '<InscricaoMunicipal>[CAMPO_INSCRICAO_MUNICIPAL]</InscricaoMunicipal>';
                $MensagemXML .= '</Prestador>';
                $MensagemXML .= '</ConsultarNfseRpsEnvio>';

            case 'consultarNfseServicoTomadoEnvio':

                $MensagemXML = '';

            case 'enviarLoteRpsEnvio':

                $MensagemXML = '';

            case 'enviarLoteRpsSincronoEnvio':

                $MensagemXML = '';

            case 'gerarNfseEnvio':

                $MensagemXML = '';
        }

        return $MensagemXML;
    }
}
