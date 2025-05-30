<?php

namespace App\Services\Towns\Systems\DBSeller\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfse
{
    private string $endPoint;
    private string $operation;

    public function ConsultarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'DataInicial' => 'required|date',
            'DataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Cnpj = $data['Cnpj'];
        $dataMsg->InscricaoMunicipal = $data['InscricaoMunicipal'];
        $dataMsg->DataInicial = $data['DataInicial'];
        $dataMsg->DataFinal = $data['DataFinal'];
        $dataMsg = $this->Sign_XML($dataMsg);

        $this->mountMensage($dataMsg, $this->operation, $this->version ?? null);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
