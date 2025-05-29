<?php

namespace App\Services\Towns\Systems\Abaco\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarSituacaoLoteRPS
{

    private string $endPoint;
    private string $operation;
    public function ConsultarSituacaoLoteRPS(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->endPoint = 'aconsultarsituacaoloterps?wsdl';
        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $this->mountMensage($dataMsg, $this->operation, $this->getVersion());

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '//ns:Outputxml');
    }

}
