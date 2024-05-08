<?php

namespace App\Services\Banks\Itau\Concerns;

trait ItauClient
{

    public function __construct(
        protected ?string $environment = null,
        protected ?string $token = null,
        protected ?string $url = null,
        protected array $data = [],
    ){

        $this->environment = app()->isLocal() ? 'sandbox' : 'production';
        $this->token = config("itau.{$this->environment}.token");
        $this->url = config("itau.{$this->environment}.url");

    }

}
