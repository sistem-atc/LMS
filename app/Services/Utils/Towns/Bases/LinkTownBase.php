<?php

namespace App\Services\Utils\Towns\Bases;

use ReflectionClass;
use SimpleXMLElement;
use App\Models\Branch;
use App\Enums\HttpMethod;
use App\Models\CitySetting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Services\Utils\HttpConnection\Connection;
use App\Services\Utils\Towns\Helpers\XmlSigner;

class LinkTownBase
{

    protected static $linkTowns;
    protected static $url;
    protected static $headerVersion;
    protected static $codeIbge;
    protected static $namespace;
    protected static $version;
    protected static $username;
    protected static $password;

    public function __construct($codeIbge)
    {

        $dataTowns = CitySetting::where('ibge', $codeIbge)->first();

        $urlAmbient = 'url_' . $this->getAmbient();

        if ($dataTowns === null) {
            throw new \InvalidArgumentException("Prefeitura Não Configurada.");
        };

        if ($dataTowns->$urlAmbient === null) {
            throw new \InvalidArgumentException("Ambiente não configurado.");
        }

        self::$codeIbge = $codeIbge;
        self::$username = $dataTowns->username;
        self::$password = $dataTowns->password;
        self::$url = $dataTowns->$urlAmbient;
        self::$headerVersion = $dataTowns->headerversion;
        self::$namespace = $dataTowns->namespace;
        self::$version = $dataTowns->version;
    }

    protected static function getUsername(): ?string
    {
        return self::$username ?? null;
    }

    protected static function getPassword(): ?string
    {
        return self::$password ?? null;
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

    protected static function composeMessage(string $type): SimpleXMLElement | null
    {
        $basedir = self::getDir();
        return new SimpleXMLElement(file_get_contents($basedir . '/schemas/' . $type . '.xml'));
    }

    protected static function assembleMessage(string $replaceOperation = null, int $version = 0): SimpleXMLElement
    {

        $baseDir = self::getDir();

        if ($version === 0) {
            $content = file_get_contents($baseDir . '/schemas/AssembleMensage.xml');
        } else {
            $content = file_get_contents($baseDir . '/schemas/AssembleMensage' . $version . '.xml');
        }

        if (strpos($content, $replaceOperation) !== false) {
            $content = Str::replace('[Mount_Mensage]', $replaceOperation, $content);
        }

        return new SimpleXMLElement($content);
    }

    private static function getDir(): ?string
    {
        $class = get_called_class();
        $reflection = new ReflectionClass($class);

        return dirname($reflection->getFileName());
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

    protected static function Conection(string $url, string $Mensage, ?array $headers, ?HttpMethod $verb): ?string
    {
        return Connection::Conexao($url, $Mensage, $headers, $verb);
    }
}
