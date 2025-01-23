<?php

namespace App\Services\Towns\ISS_Digital;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class ISS_Digital extends LinkTownBase
{
    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'SOAPAction' => 'POST'
        ];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::enviar($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelar($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public function cancelar(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'CNPJ' => 'required|string',
            'codigo_cidade' => 'required|string',
            'Inscricao_Municipal' => 'required|string',
            'Numero_Nota' => 'required|string',
            'Codigo_Verificacao' => 'required|string',
            'Motivo_Cancelamento' => 'required|string',
            'id_nota' => 'required|string',
            'sequencia_lote' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;

        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['CNPJ'];
        $dataMsg->codigo_cidade = $data['codigo_cidade'];
        $dataMsg->inscricao_municipal = $data['Inscricao_Municipal'];
        $dataMsg->numero_nota = $data['Numero_Nota'];
        $dataMsg->codigo_verificacao = $data['Codigo_Verificacao'];
        $dataMsg->motivo_cancelamento = $data['Motivo_Cancelamento'];
        $dataMsg->id_nota = $data['id_nota'];
        $dataMsg->sequencia_lote = $data['sequencia_lote'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();

    }

    public function consultarAliquotaSimplesNacional(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'codigo_cidade' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    public function consultarLote(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'codigo_cidade' => 'required|string',
        ]);

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    public function consultarNfseRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'used_companny' => 'required|string',
        ]);

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();

    }

    public function consultarNota(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|string',
            'inscricao_municipal' => 'required|string',
            'data_inicial' => 'required|string',
            'data_final' => 'required|string',
            'codigo_cidade' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricao_municipal = $data['inscricao_municipal'];
        $dataMsg->data_inicial = $data['data_inicial'];
        $dataMsg->data_final = $data['data_final'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    public function consultarNotaTomada(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'used_companny' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    public function consultarSequencialRps(array $data): string|int|array
    {


        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    public function enviar(array $data): string|int|array
    {

        $validator = Validator::make($data, [
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    public function enviarSincrono(array $data): string|int|array
    {

        $validator = Validator::make($data, [
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    public function testeEnviar(array $data): string|int|array
    {

        $validator = Validator::make($data, [
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage();

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));
    }

}
