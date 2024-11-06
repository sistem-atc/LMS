<?php

namespace App\Services\Towns\Abaco;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use Illuminate\Validation\Rule;
use App\Enums\MotivosCancelamento;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\LinksTowns;

class Abaco extends LinkTownBase
{

    protected static $verb = 'POST';
    private static SimpleXMLElement $headMsg;

    protected static $headers = [
        'Content-Type' => 'text/xml;charset=UTF-8'
    ];


    public function __construct(LinksTowns $linksTowns, $codeIbge)
    {
        parent::__construct($linksTowns, $codeIbge);
        self::$headMsg = self::composeHeader(parent::getHeaderVersion());
    }

    public static function recepcionarLoteRps(array $data): string|int|array
    {
        $validator = Validator::make($data, [
            'numeroNF' => 'required',
            'motivoCancelamento' => [
                'required',
                Rule::in(MotivosCancelamento::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $endPoint = 'arecepcionarloterps?wsdl';
        $operacao = 'RecepcionarLoteRPS';
        $dataMsg = self::composeMessage($operacao);
        $codigoCancelamento = 'MC0' . MotivosCancelamento::from($data['motivoCancelamento']);
        $mountMessage = self::assembleMessage();

        $dataMsg->numeroNF = $data['numeroNF'];
        $dataMsg->codigoCancelamento = $codigoCancelamento;
        $dataMsg = self::Sign_XML($dataMsg->asXML());

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(parent::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarSituacaoLoteRPS($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $endPoint = 'aconsultarsituacaoloterps?wsdl';
        $operacao = 'ConsultarSituacaoLoteRps';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(parent::$url . $endPoint, $mountMessage->asXML(), static::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'numero_RPS' => 'required',
            'serie_RPS' => 'required',
            'tipo_RPS' => [
                'required',
                Rule::in(TypeRPS::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $endPoint = 'aconsultarnfseporrps?wsdl';
        $operacao = 'ConsultarNfsePorRps';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Numero = $data['numero_RPS'];
        $dataMsg->Serie = $data['serie_RPS'];
        $dataMsg->Tipo = $data['tipo_RPS'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(parent::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $endPoint = 'aconsultarloterps?wsdl';
        $operacao = 'ConsultarLoteRps';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(parent::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'dataInicial' => 'required|date',
            'dataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $endPoint = 'aconsultarnfse?wsdl';
        $operacao = 'ConsultarNfse';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->DataInicial = $data['dataInicial'];
        $dataMsg->DataFinal = $data['dataFinal'];

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(parent::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    private static function mountMensage(string $operation, SimpleXMLElement $headMsg, SimpleXMLElement $dataMsg): SimpleXMLElement
    {

        $mountMessage = self::assembleMessage();
        $mountMessage->xpath('//e:[Mount_Mensage].Execute')[0]->getName('//e:' . $operation . '.Execute');
        $mountMessage->xpath('//e:Nfsecabecmsg')[0] = $headMsg;
        $mountMessage->xpath('//e:Nfsedadosmsg')[0] = $dataMsg;

        return $mountMessage;
    }

    private static function assembleMessage(): SimpleXMLElement
    {
        $content = file_get_contents(__DIR__ . 'schemas/AssembleMensage.xml');
        return new SimpleXMLElement($content);
    }

    private static function composeMessage(string $type): SimpleXMLElement
    {

        switch ($type) {
            case 'RecepcionarLoteRPS':
                $content = file_get_contents(__DIR__ . 'schemas/RecepcionarLoteRPS.xml');

            case 'ConsultarSituacaoLoteRps':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarSituacaoLoteRps.xml');

            case 'ConsultarNfsePorRps':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarNfsePorRps.xml');

            case 'ConsultarLoteRps':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarLoteRps.xml');

            case 'ConsultarNfse':
                $content = file_get_contents(__DIR__ . 'schemas/ConsultarNfse.xml');
        }

        return new SimpleXMLElement($content);
    }

    private static function composeHeader(string $type): SimpleXMLElement
    {

        switch ($type) {
            case '2.02':
                $content = file_get_contents(__DIR__ . 'schemas/ComposeHeader.xml');
                return new SimpleXMLElement($content);
        }
    }
}
