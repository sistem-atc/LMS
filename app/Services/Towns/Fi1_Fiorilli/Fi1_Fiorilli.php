<?php

namespace App\Services\Towns\Fi1_Fiorilli;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Fi1_Fiorilli extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::consultarNfsePorFaixa($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::RecepcionarLoteRps($data);
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

    public static function cancelarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function consultarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function consultarNfsePorFaixa($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function consultarNfsePorRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function consultarNfseServicoPrestado($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function gerarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function recepcionarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function recepcionarLoteRpsSincrono($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function substituirNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = __FUNCTION__;
        $dataMsg = parent::composeMessage($operacao);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {

        self::$mountMessage = parent::assembleMessage();

        self::$mountMessage = Str::replace("[Username]", parent::getUsername(), self::$mountMessage);
        self::$mountMessage = Str::replace("[Password]", parent::getPassword(), self::$mountMessage);

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
