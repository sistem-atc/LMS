<?php

namespace App\Services\Towns\Systems\eSiat\Methods;

trait RecepcionarNFSe
{

    private string $operation;

    public function RecepcionarNFSe($data): string|int|array
    {
        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);

        $dataMsg->Numero = $data['numeroNF'];

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
