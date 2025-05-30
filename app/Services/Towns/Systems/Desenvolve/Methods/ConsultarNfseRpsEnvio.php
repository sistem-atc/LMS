<?php

namespace App\Services\Towns\Systems\Desenvolve\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfseRpsEnvio
{
    private string $endPoint;
    private string $operation;

    public function consultarNfseRpsEnvio($data): string|int|array
    {

        $validator = Validator::make($data, [
            //Incluir as validações
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = $this->Sign_XML($dataMsg);

        $this->mountMensage($dataMsg, $this->operation, $this->version ?? null);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
