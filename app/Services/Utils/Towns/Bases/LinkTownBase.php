<?php

namespace App\Services\Utils\Towns\Bases;

use SimpleXMLElement;
use App\Models\Branch;
use App\Models\CitySetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Services\Utils\Towns\Helpers\Connection;
use App\Services\Utils\Towns\Helpers\XmlSigner;

class LinkTownBase
{

    protected static $linkTowns;
    protected static $url;
    protected static $headerVersion;
    protected static $codeIbge;
    protected static $namespace;
    protected static $version;


    public function __construct($codeIbge)
    {

        $dataTowns = CitySetting::where('ibge', $codeIbge)->first();

        if ($dataTowns === null) {
            throw new \InvalidArgumentException("Prefeitura Não Configurada.");
        };

        $urlAmbient = 'url_' . $this->getAmbient();

        self::$codeIbge = $codeIbge;
        self::$url = $dataTowns->$urlAmbient;
        self::$headerVersion = $dataTowns->headerversion;
        self::$namespace = $dataTowns->namespace;
        self::$version = $dataTowns->version;
    }

    protected static function getNamespace(): ?string
    {
        return self::$namespace ?? null;
    }

    protected static function getVersion(): ?string
    {
        return self::$version ?? null;
    }

    protected static function getUrl(): ?string
    {
        return self::$url ?? null;
    }

    protected static function getHeaderVersion(): ?string
    {
        return self::$headerVersion ?? null;
    }

    protected static function composeMessage(string $type, string $basedir): SimpleXMLElement | null
    {
        return new SimpleXMLElement(file_get_contents($basedir . '/schemas/' . $type . '.xml'));
    }

    private function getAmbient(): string
    {
        return App::environment('production') == 'production' ? 'prod' : 'homolog';
    }

    protected static function Sign_XML(string $xmlNoSigned): SimpleXMLElement
    {
        $xmlSigner = new XmlSigner(Branch::where('id', '=', Auth::user()->employee->branch['id']));
        return simplexml_load_string($xmlSigner::Sign_XML($xmlNoSigned));
    }

    protected static function Conection(
        string $url,
        string $Mensage,
        ?array $headers,
        string $verb,
        bool $useCertificate
    ): ?string {

        return Connection::Conexao($url, $Mensage, $headers, $verb, $useCertificate);
    }
}
