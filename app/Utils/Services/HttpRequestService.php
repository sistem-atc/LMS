<?php

namespace App\Utils\Services;

use App\Logs\Logging;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class HttpRequestService
{
    protected ?PendingRequest $request = null;
    protected array $headers = [];
    protected ?string $baseUrl = null;
    protected ?string $token = null;
    protected ?string $channel = 'default';
    protected ?string $certPath = null;
    protected ?string $keyPath = null;
    protected ?string $module = null;
    protected bool $shouldThrow = true;

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function setBaseUrl(string $url): self
    {
        $this->baseUrl = $url;
        return $this;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function setCerts(string $certPath, string $keyPath): self
    {
        $this->certPath = $certPath;
        $this->keyPath = $keyPath;
        return $this;
    }

    public function setChannel(string $channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function disableThrow(bool $disable = false): self
    {
        $this->shouldThrow = $disable;
        return $this;
    }

    public function setModule(string $module): self
    {
        $this->module = $module;
        return $this;
    }

    public function make(): PendingRequest
    {
        $request = Http::withOptions([
            'cert' => $this->certPath ? [realpath($this->certPath), ''] : null,
            'ssl_key' => $this->keyPath ? [realpath($this->keyPath), ''] : null,
        ])->withHeaders($this->headers);

        if ($this->token) {
            $request = $request->withToken($this->token);
        }

        if ($this->baseUrl) {
            $request = $request->baseUrl($this->baseUrl);
        }

        if (!$this->shouldThrow) {
            $request = $request->throw();
        }

        $request = tap($request, function (PendingRequest $req) {
            $req->beforeSending(
                fn($request) =>
                Logging::logRequest(
                    $request,
                    $this->module,
                    $this->channel
                )
            );
        });

        $this->request = $request;

        return $this->request;
    }
}
