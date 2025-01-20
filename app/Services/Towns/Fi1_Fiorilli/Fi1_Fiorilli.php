<?php

namespace App\Services\Towns\Fi1_Fiorilli;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;

class Fi1_Fiorilli extends LinkTownBase implements LinkTownsInterface
{

    protected static $verb = HttpMethod::POST;
    protected static $operation;
    protected static $headers = [];

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

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
    }

    public static function CancelarNfse($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'cancelarNfse';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function ConsultarLoteRps($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'consultarLoteRps';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function consultarNfsePorFaixa($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'consultarNfsePorFaixa';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function ConsultarNfsePorRps($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'consultarNfsePorRps';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function ConsultarNfseServicoPrestado($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'consultarNfseServicoPrestado';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function GerarNfse($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'gerarNfse';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRps($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'recepcionarLoteRps';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function RecepcionarLoteRpsSincrono($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'recepcionarLoteRpsSincrono';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    public static function SubstituirNfse($data): string | int
    {

        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operacao = 'substituirNfse';
        $dataMsg = parent::composeMessage($operacao);
        $mountMesage = self::mountMensage($dataMsg, $operacao);
        $mountMesage = Str::replace("[Username]", parent::getUsername(), $mountMesage);
        $mountMesage = Str::replace("[Password]", parent::getPassword(), $mountMesage);

        return parent::Conection(parent::$url, $mountMesage, static::$headers, self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg, string $operacao): SimpleXMLElement
    {

        $mountMessage = parent::assembleMessage();

        $dadosMsg = $mountMessage->xpath('//ws:' . $operacao)[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

        return $mountMessage;
    }

}
