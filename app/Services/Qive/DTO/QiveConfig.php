<?php

namespace App\Services\Qive\DTO;

class QiveConfig
{
    public function __construct(
        public string $apiUrl,
        public string $apiKey,
        public ?string $namespace = null,
        public ?string $headerVersion = null,
        public ?string $version = null
    ) {
    }
}
