<?php

namespace App\Services\Towns\Systems\Etransparencia\Methods;

trait IMPRESSAOLINKNFSE
{

    private string $operation;

    public function IMPRESSAOLINKNFSE($data): string|int|array
    {
        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->NumeroNota = $data['numeroNota'];
        $dataMsg->DataInicio = $data['dataInicio'];

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
