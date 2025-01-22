<?php

namespace App\Services\Towns\Goiania;

use SimpleXMLElement;
use App\Enums\HttpMethod;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Helpers\EnvironmentHelper;

class Goiania extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::ConsultarNfseRps($data);
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::GerarNfse($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return 'Metodo não implementado';
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function ConsultarNfseRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricao_municipal' => 'required',
            'numero_rps' => 'required',
            'serie_rps' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);
        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function GerarNfse(array $data): string|int|array
    {
        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $operation = __FUNCTION__;
        $dataMsg = parent::composeMessage($operation);

        $dataMsg->Serie = (EnvironmentHelper::getAmbient() !== 'production') ? 'TESTE' : $data['serie_rps'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

    public static function mountMensage(SimpleXMLElement $dataMsg): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage();

        $dom = dom_import_simplexml($dataMsg);
        $fragment = dom_import_simplexml(self::$mountMessage);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));
    }
}
