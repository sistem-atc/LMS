<?php

namespace App\Services\Towns\Giap;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;


class Giap extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;
    private static string $operation;
    private static string $endpoint;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/xml',
            'Authorization' => parent::$password //Inscricao_Municipal & "-" & Token
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::consulta($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::emissao($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancela($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url & self::$endpoint & self::$operation, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public function hello(): string|int|array
    {

        self::$operation = __FUNCTION__;
        $dataMsg = null;
        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function consulta($data): string|int|array
    {

        $validator = Validator::make($data, [
            'inscricaoMunicipal' => 'required',
            'codigoVerificacao' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;

        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->codigoVerificacao = $data['codigoVerificacao'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function simula($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricaoMunicipal' => 'required',
            'dictNotas' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        self::$endpoint = "v2/emissao/";
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->dictNotas = $data['dictNotas'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function emissao($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricaoMunicipal' => 'required',
            'dictNotas' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        self::$endpoint = "v2/";
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->dictNotas = $data['dictNotas'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

    public function cancela($data): string|int|array
    {

        $validator = Validator::make($data, [
            'inscricaoMunicipal' => 'required',
            'motivo' => 'required',
            'numeroNota' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        self::$endpoint = "v2/";
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->motivo = $data['motivo'];
        $dataMsg->numeroNota = $data['numeroNota'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

    private static function mountMensage(?SimpleXMLElement $dataMsg): void
    {
        self::$mountMessage = parent::assembleMessage();

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }

}
