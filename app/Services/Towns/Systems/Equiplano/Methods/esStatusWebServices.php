<?php

namespace App\Services\Towns\Systems\Equiplano\Methods;

trait esStatusWebServices
{

    private string $operation;

    public function esStatusWebServices(): string|int|array
    {

        $this->operation = __FUNCTION__;
        $this->mountMensage(
            dataMsg: null,
            operation: $this->operation,
            version: null
        );

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
