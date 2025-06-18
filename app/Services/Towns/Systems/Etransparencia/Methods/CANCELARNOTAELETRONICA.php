<?php

namespace App\Services\Towns\Systems\Etransparencia\Methods;

trait CANCELARNOTAELETRONICA
{

    private string $operation;

    public function CANCELARNOTAELETRONICA($data): string|int|array
    {

        $this->operation = __FUNCTION__;

        $dataMsg = $this->composeMessage(type: $this->operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->SerieNota = $data['serieNota'];
        $dataMsg->NumeroNota = $data['numeroNota'];
        $dataMsg->SerieRps = $data['serieRps'];
        $dataMsg->NumeroRps = $data['numeroRps'];
        $dataMsg->ValorNota = $data['valorNota'];
        $dataMsg->MotivoCancelamento = $data['motivoCancelamento'];
        $dataMsg->PodeCancelarGuia = $data['podeCancelarGuia'];

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
