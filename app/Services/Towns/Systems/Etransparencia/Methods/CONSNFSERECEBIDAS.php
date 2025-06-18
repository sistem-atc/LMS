<?php

namespace App\Services\Towns\Systems\Etransparencia\Methods;

trait CONSNFSERECEBIDAS
{

    private string $operation;

    public function CONSNFSERECEBIDAS($data): string|int|array
    {
        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];

        $this->mountMensage(
            dataMsg: $dataMsg,
            operation: self::$operation,
            version: null
        );

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
