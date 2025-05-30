<?php

namespace App\Services\Towns\Systems\Dsf\Methods;

trait RecepcionarLoteRps
{
    private string $endPoint;
    private string $operation;

    public function RecepcionarLoteRps($data): string|int|array
    {

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg = $this->Sign_XML($dataMsg);

        $this->mountMensage($dataMsg, $this->operation, $this->version ?? null);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
