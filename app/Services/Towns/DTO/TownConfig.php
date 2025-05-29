<?php

namespace App\Services\Towns\DTO;

class TownConfig
{
    public function __construct(
        public string $cityName,
        public string $url,
        public string $codeIbge,
        public ?string $namespace = null,
        public ?string $headerVersion = null,
        public ?string $version
    ) {
    }

}
