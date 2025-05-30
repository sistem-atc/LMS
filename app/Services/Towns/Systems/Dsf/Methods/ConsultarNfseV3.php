<?php

namespace App\Services\Towns\Systems\Dsf\Methods;

trait ConsultarNfseV3
{
    private string $endPoint;
    private string $operation;

    public function ConsultarNfseV3($data): string|int|array
    {

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->dataInicial = date("Ymd", strtotime($data['dataInicial']));
        $dataMsg->dataFinal = date("Ymd", strtotime($data['dataFinal']));
        $dataMsg = $this->Sign_XML($dataMsg);

        $this->mountMensage($dataMsg, $this->operation, $this->version ?? null);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
