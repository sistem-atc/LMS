<?php

namespace App\Services\Towns\Systems\DBSeller\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfsePorRps
{
    private string $endPoint;
    private string $operation;

    public function ConsultarNfsePorRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required',
            'Serie' => 'required',
            'Tipo' => 'required',
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Numero = $data['Numero'];
        $dataMsg->Serie = $data['Serie'];
        $dataMsg->Tipo = $data['Tipo'];
        $dataMsg->Cnpj = $data['Cnpj'];
        $dataMsg->InscricaoMunicipal = $data['InscricaoMunicipal'];
        $dataMsg = $this->Sign_XML($dataMsg);

        $this->mountMensage($dataMsg, $this->operation, $this->version ?? null);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
