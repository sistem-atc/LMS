<?php

namespace App\Services\Towns\Systems\DBSeller\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarLoteRps
{
    private string $endPoint;
    private string $operation;

    public function ConsultarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'Protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Cnpj = $data['Cnpj'];
        $dataMsg->InscricaoMunicipal = $data['InscricaoMunicipal'];
        $dataMsg->Protocolo = $data['Protocolo'];
        $dataMsg = $this->Sign_XML($dataMsg);

        $this->mountMensage($dataMsg, $this->operation, $this->version ?? null);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
