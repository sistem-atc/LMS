<?php

namespace App\Services\Towns\Systems\Fi1_Fiorilli\Methods;

use Illuminate\Support\Facades\Validator;

trait consultarNfsePorRps
{

    private string $operation;

    public function consultarNfsePorRps($data): string|int|array
    {

        $validator = Validator::make(
            data: $data,
            rules: [
                'username' => 'required',
                'password' => 'required',
                'numeroNF' => 'required',
            ]
        );

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $this->operation = __FUNCTION__;

        $dataMsg = $this->composeMessage(type: $this->operation);

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
