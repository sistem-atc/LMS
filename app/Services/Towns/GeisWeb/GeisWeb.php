<?php

namespace App\Services\Towns\GeisWeb;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class GeisWeb extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [
            'Content-Type' => 'text/xml;charset=UTF-8',
        ];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultaNfse($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::EnviaLoteRps($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::CancelaNfse($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function CancelaNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;

        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroNfse = $data['numeroNF'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function ConsultaLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroLote' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroLote = $data['numeroLote'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function ConsultaNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'dataInicial' => 'required',
            'dataFinal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->DtInicial = $data['dataInicial'];
        $dataMsg->DtFinal = $data['dataFinal'];
        $dataMsg->Pagina = $data['page'] ?? 1;

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function ConsultaRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'dataInicial' => 'required',
            'dataFinal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->DtInicial = $data['dataInicial'];
        $dataMsg->DtFinal = $data['dataFinal'];
        $dataMsg->Pagina = $data['page'] ?? 1;

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function ConsultaSituacaoLoteAsync($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroLote' => 'required',
            'numeroProtocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->NumeroLote = $data['numeroLote'];
        $dataMsg->NumeroProtocolo = $data['numeroProtocolo'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function EmailNFSeTomador($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroNF' => 'required',
            'emailsEnvio' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroNfse = $data['numeroNF'];
        $dataMsg->EmailsEnvio = $data['emailsEnvio'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function EnviaLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroLote' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroLote = $data['numeroLote'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function EnviaLoteRpsAsync($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroNF' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroLote = $data['numeroLote'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function GeraPDFNFSe($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroNF' => 'required',
            'cnpjTomador' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroNfse = $data['numeroNF'];
        $dataMsg->CnpjCpfTomador = $data['cnpjTomador'];

        self::mountMensage($dataMsg);

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
