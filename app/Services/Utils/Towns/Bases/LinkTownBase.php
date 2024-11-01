<?php

namespace App\Services\Utils\Towns\Bases;

use App\Services\Utils\Towns\Helpers\Connection;
use App\Services\Utils\Towns\Helpers\LinksTowns;
use App\Services\Utils\Towns\Helpers\XmlSigner;

class LinkTownBase
{

    protected $linkTowns;

    public function __construct(LinksTowns $linkTowns)
    {
        $this->linkTowns = $linkTowns;
    }

    protected function getLinkForIbge($codeIbge)
    {
        return $this->linkTowns->getLinkTown($codeIbge);
    }

    protected static function Sign_XML(string $xmlNoSigned): string
    {
        return XmlSigner::Sign_XML($xmlNoSigned);
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
