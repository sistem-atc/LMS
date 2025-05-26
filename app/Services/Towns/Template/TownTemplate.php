<?php

namespace App\Services\Towns\Template;

use SimpleXMLElement;
use App\Traits\SignXml;
use App\Traits\XmlHandler;
use App\Interfaces\LinkTownsInterface;
use App\Utils\Services\HttpRequestService;
use Illuminate\Http\Client\PendingRequest;

abstract class TownTemplate implements LinkTownsInterface
{

    use SignXml;
    use XmlHandler;

    protected PendingRequest $http;
    protected string $cityName;
    protected ?string $url;
    protected string $codeIbge;
    protected ?string $namespace;
    protected ?string $username;
    protected ?string $password;
    protected ?string $headerVersion;
    protected ?string $version;
    protected ?SimpleXMLElement $mountMessage;

    public function __construct(array $config)
    {
        $this->cityName = $config['cityName'];
        $this->url = $config['url'];
        $this->codeIbge = $config['codeIbge'];
        $this->namespace = $config['namespace'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->headerVersion = $config['headerVersion'];
        $this->version = $config['version'];
    }

    protected function getCityName(): string
    {
        return $this->cityName;
    }

    protected function getCodeIbge(): string
    {
        return $this->codeIbge;
    }

    protected function getUsername(): ?string
    {
        return $this->username ?? null;
    }

    protected function getPassword(): ?string
    {
        return $this->password ?? null;
    }

    protected function getNamespace(): ?string
    {
        return $this->namespace ?? null;
    }

    protected function getVersion(): ?string
    {
        return $this->version ?? null;
    }

    protected function getUrl(): ?string
    {
        return $this->url ?? null;
    }

    protected function getHeaderVersion(): ?string
    {
        return $this->headerVersion ?? null;
    }

    public function makeHttpClient(): PendingRequest
    {
        return $this->http = new HttpRequestService()->make();
    }

}
