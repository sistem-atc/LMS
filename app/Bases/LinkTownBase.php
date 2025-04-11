<?php

namespace App\Bases;

use App\Traits\SignXml;
use App\Traits\XmlHandler;
use App\loaders\ConfigLoader;
use App\Traits\RequestSender;
use App\Interfaces\LinkTownsInterface;

abstract class LinkTownBase implements LinkTownsInterface
{

    use SignXml;
    use RequestSender;
    use XmlHandler;

    protected static string $cityName;
    protected static ?string $url;
    protected static string $codeIbge;
    protected static ?string $namespace;
    protected static ?string $username;
    protected static ?string $password;
    protected static ?string $headerVersion;
    protected static ?string $version;
    protected static ?self $instance = null;

    public function __construct(array $configLoader)
    {

        $config = ConfigLoader::loadConfig($configLoader);

        self::$cityName = $config['cityName'];
        self::$url = $config['url'];
        self::$codeIbge = $config['codeIbge'];
        self::$namespace = $config['namespace'];
        self::$username = $config['username'];
        self::$password = $config['password'];
        self::$headerVersion = $config['headerVersion'];
        self::$version = $config['version'];

    }

    public static function getInstance(array $configLoader): ?self
    {
        if (static::$instance === null) {
            static::$instance = new static($configLoader);
        }

        return static::$instance;
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

}
