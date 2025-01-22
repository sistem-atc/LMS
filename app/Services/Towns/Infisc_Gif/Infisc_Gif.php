<?php

namespace App\Services\Towns\Infisc_Gif;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;


class Infisc_Gif extends LinkTownBase
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
        return self::obterNotaFiscal($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::gerarNota($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelarNotaFiscal($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public function cancelarLote(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function cancelarNotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function enviarLoteCupom(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function enviarLoteDms(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function enviarLoteNotas(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function inutilizacao(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterCriticaLote(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterCriticaLoteDms(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterLoteNotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'nota_inicial' => 'required',
            'nota_final' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterNotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterNotaFiscalXml(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterNotasEmPDF(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterNotasEmPNG(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterNumeracao(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterReciboLote(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function obterStatusLoteDms(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

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
