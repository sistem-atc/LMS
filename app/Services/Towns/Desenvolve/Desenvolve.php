<?php

namespace App\Services\Towns\Desenvolve;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use App\Enums\HttpMethod;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;

class Desenvolve extends LinkTownBase
{

    protected static $verb = HttpMethod::POST;
    private static SimpleXMLElement $mountMessage;

    public static function getHeaders(): array
    {
        return [];
    }

    public function gerarNota(array $data): string|int|array
    {
        return self::gerarNfseEnvio($data);
    }

    public function consultarNota(array $data): string|int|array
    {
        return self::consultarNfseRpsEnvio($data);
    }

    public function cancelarNota(array $data): string|int|array
    {
        return self::cancelarNfseEnvio($data);
    }

    public function __construct(array $configLoader)
    {
        parent::__construct($configLoader);
    }

    private static function connection(): string|int|array|null
    {
        return self::Conection(parent::$url, self::$mountMessage->asXML(), self::getHeaders(), self::$verb, false);
    }

    public static function cancelarNfseEnvio($data): string|int
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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function consultarLoteRpsEnvio($data): string|int
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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Protocolo = $data['protocolo'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function consultarNfseRpsEnvio($data): string|int
    {

        $validator = Validator::make($data, [
            //Incluir as validações
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function consultarNfseServicoTomadoEnvio($data): string|int
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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function enviarLoteRpsEnvio($data): string|int
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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function enviarLoteRpsSincronoEnvio($data): string|int
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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

    public static function gerarNfseEnvio($data): string|int
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
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        $dataMsg = self::composeMessage(__FUNCTION__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): void
    {
        //<![CDATA[[DadosMsg]]]>
        self::$mountMessage = parent::assembleMessage();

        self::$mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');

        $dadosMsg = self::$mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

    }
}
