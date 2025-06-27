<?php

namespace App\Services\Qive\Template;

use App\Services\Qive\DTO\QiveConfig;

abstract class QiveTemplate
{
    protected string $apiUrl;
    protected string $apiKey;

    public function __construct(QiveConfig $config)
    {
        $this->apiUrl = $config->apiUrl;
        $this->apiKey = $config->apiKey;
    }

    protected function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    protected function getApiKey(): string
    {
        return $this->apiKey;
    }
}
