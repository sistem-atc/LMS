<?php

namespace App\Services\Towns\Systems\eCity\Methods;

trait ConsultarLoteRps
{

    private string $operation;

    public function ConsultarLoteRps(array $data): string|int|array
    {

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);
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
