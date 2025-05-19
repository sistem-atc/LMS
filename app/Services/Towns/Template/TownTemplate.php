<?php

namespace App\Services\Towns\Template;

use App\Traits\SignXml;
use App\Traits\XmlHandler;
use App\Traits\RequestSender;
use App\Interfaces\LinkTownsInterface;
use App\Utils\Services\HttpRequestService;

abstract class TownTemplate implements LinkTownsInterface
{

    use SignXml;
    use RequestSender;
    use XmlHandler;

    protected HttpRequestService $http;
    protected string $cityName;
    protected ?string $url;
    protected string $codeIbge;
    protected ?string $namespace;
    protected ?string $username;
    protected ?string $password;
    protected ?string $headerVersion;
    protected ?string $version;

    public function __construct(array $config)
    {
        self::$cityName = $config['cityName'];
        self::$url = $config['url'];
        self::$codeIbge = $config['codeIbge'];
        self::$namespace = $config['namespace'];
        self::$username = $config['username'];
        self::$password = $config['password'];
        self::$headerVersion = $config['headerVersion'];
        self::$version = $config['version'];
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

    public function makeHttpClient(): HttpRequestService
    {
        return new HttpRequestService();
    }

}
