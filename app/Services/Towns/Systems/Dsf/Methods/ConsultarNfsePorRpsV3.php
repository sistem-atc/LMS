<?php

namespace App\Services\Towns\Systems\Dsf\Methods;

trait ConsultarNfsePorRpsV3
{
    private string $endPoint;
    private string $operation;

    public function ConsultarNfsePorRpsV3($data): string|int|array
    {

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->numeroRps = $data['numeroRps'];
        $dataMsg->serieRps = $data['serieRps'];
        $dataMsg->tipoRps = $data['tipoRps'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg = $this->Sign_XML($dataMsg);

        $this->mountMensage($dataMsg, $this->operation, $this->version ?? null);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
