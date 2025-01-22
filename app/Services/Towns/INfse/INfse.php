<?php

namespace App\Services\Towns\INfse;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class INfse extends LinkTownBase
{
    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8'
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfsePorRps($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelarNfse($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function CancelarNfse(array $data): string|int|array
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

    public static function ConsultarLoteRps(array $data): string|int|array
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

    public static function ConsultarNfsePorFaixa(array $data): string|int|array
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

    public static function ConsultarNfsePorRps(array $data): string|int|array
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

    public static function ConsultarNfseServicoPrestado(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricaoMunicipal' => 'required',
            'dataInicial' => 'required',
            'dataFinal' => 'required',
            'numeroPagina' => 'required',
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

    public static function ConsultarNfseServicoTomado(array $data): string|int|array
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

    public static function GerarNfse(array $data): string|int|array
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

    public static function RecepcionarLoteRps(array $data): string|int|array
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

    public static function RecepcionarLoteRpsSincrono(array $data): string|int|array
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

    public static function SubstituirNfse(array $data): string|int|array
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

    public static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage();

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));
    }

}
