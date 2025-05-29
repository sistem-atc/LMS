<?php

namespace App\Services\Towns\Systems\Abaco\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarLoteRps
{

    private string $endPoint;
    private string $operation;

    public function ConsultarLoteRps(array $data): string|int|array
    {

        $validator = Validator::make(
            data: $data,
            rules: [
                'cnpj' => 'required|max:14',
                'inscricaoMunicipal' => 'required',
                'protocolo' => 'required',
            ]
        );

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->endPoint = 'aconsultarloterps?wsdl';
        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $this->mountMensage(
            dataMsg: $dataMsg,
            operation: $this->operation,
            version: $this->getVersion()
        );

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '//ns:Outputxml');
    }
}
