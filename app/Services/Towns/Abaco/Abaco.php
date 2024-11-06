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
        $codigoCancelamento = 'MC0' . $data['motivoCancelamento'];
        $mountMessage = self::assembleMessage();

        $dataMsg->addChild('numeroNF', $data['numeroNF']);
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

        $dataMsg->addChild('Cnpj', $data['cnpj']);
        $dataMsg->addChild('InscricaoMunicipal', $data['inscricaoMunicipal']);
        $dataMsg->addChild('Protocolo', $data['protocolo']);

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

        $dataMsg->addChild('Numero', $data['numero_RPS']);
        $dataMsg->addChild('Serie', $data['serie_RPS']);
        $dataMsg->addChild('Tipo', $data['tipo_RPS']);
        $dataMsg->addChild('Cnpj', $data['cnpj']);
        $dataMsg->addChild('InscricaoMunicipal', $data['inscricaoMunicipal']);

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

        $dataMsg->addChild('Cnpj', $data['cnpj']);
        $dataMsg->addChild('InscricaoMunicipal', $data['inscricaoMunicipal']);
        $dataMsg->addChild('Protocolo', $data['protocolo']);

        $mountMessage = self::mountMensage($operacao, self::$headMsg, $dataMsg);

        return parent::Conection(parent::$url . $endPoint, $mountMessage, static::$headers, self::$verb, false);
    }

    public static function ConsultarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'dataInicial' => 'required|date',
            'dataFnicial' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        };

        $endPoint = 'aconsultarnfse?wsdl';
        $operacao = 'ConsultarNfse';
        $dataMsg = self::composeMessage($operacao);

        $dataMsg->addChild('Cnpj', $data['cnpj']);
        $dataMsg->addChild('InscricaoMunicipal', $data['inscricaoMunicipal']);
        $dataMsg->addChild('DataInicial', $data['dataInicial']);
        $dataMsg->addChild('DataFinal', $data['dataFnicial']);

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
        return simplexml_load_file(__DIR__ . 'schemas/AssembleMensage.xml');
    }

    private static function composeMessage(string $type): SimpleXMLElement
    {

        switch ($type) {
            case 'RecepcionarLoteRPS':
                return simplexml_load_file(__DIR__ . 'schemas/RecepcionarLoteRPS.xml');

            case 'ConsultarSituacaoLoteRps':
                return simplexml_load_file(__DIR__ . 'schemas/ConsultarSituacaoLoteRps.xml');

            case 'ConsultarNfsePorRps':
                return simplexml_load_file(__DIR__ . 'schemas/ConsultarNfsePorRps.xml');

            case 'ConsultarLoteRps':
                return simplexml_load_file(__DIR__ . 'schemas/ConsultarLoteRps.xml');

            case 'ConsultarNfse':
                return simplexml_load_file(__DIR__ . 'schemas/ConsultarNfse.xml');
        }
    }

    private static function composeHeader(string $type): SimpleXMLElement
    {

        switch ($type) {
            case '2.02':
                return simplexml_load_file(__DIR__ . 'schemas/ComposeHeader.xml');
        }
    }
}
