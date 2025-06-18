<?php

namespace App\Services\Towns\Systems\GeisWeb\Methods;

use Illuminate\Support\Facades\Validator;

trait EmailNFSeTomador
{

    private string $operation;

    public function EmailNFSeTomador($data): string|int|array
    {

        $validator = Validator::make(
            data: $data,
            rules: [
                'cnpj' => 'required',
                'numeroNF' => 'required',
                'emailsEnvio' => 'required',
            ]
        );

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroNfse = $data['numeroNF'];
        $dataMsg->EmailsEnvio = $data['emailsEnvio'];

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
