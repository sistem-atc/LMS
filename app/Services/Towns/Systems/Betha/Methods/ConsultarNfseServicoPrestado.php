<?php

namespace App\Services\Towns\Systems\Betha\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfseServicoPrestado
{

    private string $endPoint;
    private string $operation;

    public function ConsultarNfseServicoPrestado($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Prestador.cnpj' => 'required|max:14',
            'Prestador.inscricaoMunicipal' => 'required',
            'PeriodoEmissao.dataInicial' => 'required|date',
            'PeriodoEmissao.dataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Prestador->Cnpj = $data['Prestador']['cnpj'];
        $dataMsg->Prestador->InscricaoMunicipal = $data['Prestador']['inscricaoMunicipal'];
        $dataMsg->PeriodoEmissao->DataInicial = $data['PeriodoEmissao']['dataInicial'];
        $dataMsg->PeriodoEmissao->DataFinal = $data['PeriodoEmissao']['dataFinal'];
        $dataMsg->Pagina = $data['pagina'] ?? 1;

        $this->mountMensage($this->headMsg, $this->operation, $dataMsg);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
