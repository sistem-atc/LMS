<?php

namespace App\Services\Towns\Systems\Abaco\Methods;

use Illuminate\Validation\Rule;
use App\Enums\TypeDocumentTransportEnum;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfsePorRps
{

    private string $endPoint;
    private string $operation;
    public function ConsultarNfsePorRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'numero_RPS' => 'required',
            'serie_RPS' => 'required',
            'tipo_RPS' => [
                'required',
                Rule::in(TypeDocumentTransportEnum::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->endPoint = 'aconsultarnfseporrps?wsdl';
        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Numero = $data['numero_RPS'];
        $dataMsg->Serie = $data['serie_RPS'];
        $dataMsg->Tipo = $data['tipo_RPS'];
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];

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
