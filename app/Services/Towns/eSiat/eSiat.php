<?php

namespace App\Services\Towns\eSiat;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class eSiat extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;


    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/soap+xml;charset=UTF-8'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarNFSe($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::RecepcionarConsultaRPS($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteNotasCanceladas($data);
    }


    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
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

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $codigoCancelamento = 'MC0' . MotivosCancelamento::from($data['motivoCancelamento'])->getLabel();

        $dataMsg->Numero = $data['numeroNF'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->CodigoMunicipio = $data['codigoMunicipio'];
        $dataMsg->CodigoCancelamento = $codigoCancelamento;

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function RecepcionarApuracaoMensalDESIF($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function RecepcionarConsultaNotaCancelada($data): string|int|array
    {
        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function RecepcionarConsultaRPS($data): string|int|array
    {
        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function RecepcionarDeclaracaoAdministradoraCartao($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function RecepcionarLoteNotasCanceladas($data): string|int|array
    {
        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function RecepcionarLoteRps($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function RecepcionarNFSe($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function VerificarExistenciaNota($data): string|int|array
    {
        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function VersaoInstalada($data): string|int|array
    {

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Numero = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = self::assembleMessage();

        self::$mountMessage->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->createCDATASection($dom->ownerDocument->saveXML($fragment)));

    }

}
