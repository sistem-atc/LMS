<?php

namespace App\Services\Towns\Systems\eCity\Methods;

trait ConsultarNfseRps
{

    private string $operation;

    public function ConsultarNfseRps(array $data): string|int|array
    {

        $this->operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(type: $this->operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = $this->Sign_XML(xmlNoSigned: $dataMsg);

        $this->mountMensage(
            dataMsg: $dataMsg,
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
