<?php

namespace App\Services\Towns\eSiat;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use App\Enums\MotivosCancelamento;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class eSiat extends LinkTownBase implements LinkTownsInterface, DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    protected static $operation;

    protected static $headers = [
        "Content-Type" => "application/soap+xml;charset=utf-8",
    ];

    public function gerarNota(array $data): string|int|array
    {
        return '';
    }

    public function consultarNota(array $data): string|int|array
    {
        return '';
    }

    public function cancelarNota(array $data): string|int|array
    {
        return '';
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
    }

    public static function ConsultarTomador($data): string|int|array
    {
        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'CodigoMunicipio' => 'required',
            'CodigoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = 'ConsultarTomador';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);
        $codigoCancelamento = 'MC0' . MotivosCancelamento::from($data['motivoCancelamento'])->getLabel();

        $dataMsg->Numero = $data['numeroNF'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->CodigoMunicipio = $data['codigoMunicipio'];
        $dataMsg->CodigoCancelamento = $codigoCancelamento;

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarApuracaoMensalDESIF($data): string|int|array
    {

        self::$operation = 'RecepcionarApuracaoMensalDESIF';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarConsultaNotaCancelada($data): string|int|array
    {
        self::$operation = 'RecepcionarConsultaNotaCancelada';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarConsultaRPS($data): string|int|array
    {
        self::$operation = 'RecepcionarConsultaRPS';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarDeclaracaoAdministradoraCartao($data): string|int|array
    {

        self::$operation = 'RecepcionarDeclaracaoAdministradoraCartao';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteNotasCanceladas($data): string|int|array
    {
        self::$operation = 'RecepcionarLoteNotasCanceladas';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps($data): string|int|array
    {

        self::$operation = 'recepcionarLoteRps';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function RecepcionarNFSe($data): string|int|array
    {

        self::$operation = 'RecepcionarNFSe';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function VerificarExistenciaNota($data): string|int|array
    {
        self::$operation = 'VerificarExistenciaNota';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function VersaoInstalada($data): string|int|array
    {

        self::$operation = 'VerificarExistenciaNota';
        $dataMsg = parent::composeMessage(self::$operation, __DIR__);

        $dataMsg->Numero = $data['numeroNF'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(self::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): SimpleXMLElement
    {

        //<![CDATA[[DadosMsg]]]>
        $mountMessage = self::assembleMessage();

        $mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $dadosMsg = $mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

        return $mountMessage;
    }

}
