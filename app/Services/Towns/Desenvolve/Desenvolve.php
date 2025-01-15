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
    protected static $operation;

    protected static $headers = [];

    public function gerarNota(array $data): string|int|array
    {
        return '';
    }

    public function consultarNota(array $data): string|int|array
    {
        return '';
    }

    public function cancelarNota(array $data): string|int|array
    {
        return '';
    }

    public function __construct($codeIbge)
    {
        parent::__construct($codeIbge);
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

        self::$operation = 'cancelarNfseEnvio';
        $dataMsg = self::composeMessage(self::$operation, __DIR__);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $dataMsg = self::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, static::$headers, self::$verb, false);
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

        self::$operation = 'consultarLoteRpsEnvio';
        $dataMsg = self::composeMessage(self::$operation, __DIR__);

        $dataMsg->Protocolo = $data['protocolo'];

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    public static function consultarNfseRpsEnvio($data): string|int
    {

        self::$operation = 'consultarNfseRpsEnvio';
        $dataMsg = self::composeMessage(self::$operation, __DIR__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
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

        self::$operation = 'consultarNfseServicoTomadoEnvio';
        $dataMsg = self::composeMessage(self::$operation, __DIR__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
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

        self::$operation = 'enviarLoteRpsEnvio';
        $dataMsg = self::composeMessage(self::$operation, __DIR__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
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

        self::$operation = 'enviarLoteRpsSincronoEnvio';
        $dataMsg = self::composeMessage(self::$operation, __DIR__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
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

        self::$operation = "gerarNfseEnvio";
        $dataMsg = self::composeMessage(self::$operation, __DIR__);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        $mountMessage = self::mountMensage($dataMsg);

        return parent::Conection(parent::$url, $mountMessage, self::$headers, self::$verb, false);
    }

    private static function mountMensage(SimpleXMLElement $dataMsg): SimpleXMLElement
    {
        //<![CDATA[[DadosMsg]]]>
        $mountMessage = parent::assembleMessage();

        $mountMessage->registerXPathNamespace('e', 'http://www.e-nfs.com.br');

        $dadosMsg = $mountMessage->xpath('//e:Nfsedadosmsg')[0];
        $dom = dom_import_simplexml($dadosMsg);
        $fragment = dom_import_simplexml($dataMsg);
        $dom->appendChild($dom->ownerDocument->importNode($fragment, true));

        return $mountMessage;
    }
}
