<?php

namespace App\Services\Towns\Desenvolve;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use App\Enums\HttpMethod;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Bases\LinkTownBase;
use App\Services\Utils\Towns\Interfaces\LinkTownsInterface;
use App\Services\Utils\Towns\Interfaces\DevelopInterface;

class Desenvolve extends LinkTownBase implements LinkTownsInterface, DevelopInterface
{

    protected static $verb = HttpMethod::POST;
    protected static $headers = [];
    protected static string|int|array|null $connection;
    private static SimpleXMLElement $mountMessage;

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

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
        self::$connection = self::Conection(parent::$url, self::$mountMessage->asXML(), static::$headers, self::$verb, false);
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

        return self::$connection;
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

        return self::$connection;
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

        return self::$connection;
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

        return self::$connection;
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

        return self::$connection;
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

        return self::$connection;
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

        return self::$connection;
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
