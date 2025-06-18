<?php

namespace App\Services\Towns\Systems\GeisWeb\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultaSituacaoLoteAsync
{

    private string $operation;

    public function ConsultaSituacaoLoteAsync($data): string|int|array
    {

        $validator = Validator::make(
            data: $data,
            rules: [
                'cnpj' => 'required',
                'numeroLote' => 'required',
                'numeroProtocolo' => 'required',
            ]
        );

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->NumeroLote = $data['numeroLote'];
        $dataMsg->NumeroProtocolo = $data['numeroProtocolo'];

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
