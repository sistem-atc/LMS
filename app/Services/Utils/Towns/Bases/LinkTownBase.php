<?php

namespace App\Services\Utils\Towns\Bases;

use SimpleXMLElement;
use App\Models\Branch;
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

    public function __construct($codeIbge)
    {
        self::$codeIbge = $codeIbge;
        self::$url = config('links-towns.' . $codeIbge . '.url.' . $this->getAmbient());
        self::$headerVersion = config('links-towns.' . $codeIbge . '.headerVersion');
    }

    protected static function getUrl(): ?string
    {
        return self::$url ?? null;
    }

    protected static function getHeaderVersion(): ?string
    {
        return self::$headerVersion ?? null;
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
