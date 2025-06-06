<?php

namespace App\Services\SpedCte\DTO;

class ProxyConf
{
    public function __construct(
        public string $proxyIp,
        public string $proxyPort,
        public string $proxyUser,
        public string $proxyPass,
    ) {
    }

}
