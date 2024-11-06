<?php

namespace App\Services\Utils\Towns\Bases;

use App\Models\Branch;
use App\Services\Utils\Towns\Helpers\Connection;
use App\Services\Utils\Towns\Helpers\LinksTowns;
use App\Services\Utils\Towns\Helpers\XmlSigner;
use Illuminate\Support\Facades\Auth;
use SimpleXMLElement;

class LinkTownBase
{

    protected $linkTowns;
    protected $url;
    private $codeIbge;

    public function __construct(LinksTowns $linkTowns, $codeIbge)
    {
        $this->codeIbge = $codeIbge;
        $this->linkTowns = $linkTowns;
    }

    protected function getUrl(): ?string
    {
        return $this->url = $this->linkTowns->getLinkTown($this->codeIbge)['url'] ?? null;
    }

    protected function getHeaderVersion(): ?string
    {
        return $this->url = $this->linkTowns->getLinkTown($this->codeIbge)['headerVersion'] ?? null;
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
