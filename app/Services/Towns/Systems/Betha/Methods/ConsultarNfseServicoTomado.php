<?php

namespace App\Services\Towns\Systems\Betha\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfseServicoTomado
{

    private string $endPoint;
    private string $operation;
    public function ConsultarNfseServicoTomado($data): string|int|array
    {

        $validator = Validator::make($data, [
            //Incluir as validações
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        if (!isset($data['cnpjTomador'])) {
            unset($dataMsg->Intermediario);
            $dataMsg->Tomador->CpfCnpj->Cnpj = $data['cnpjTomador'];
            $dataMsg->Consulente->CpfCnpj->Cnpj = $data['cnpjTomador'];
            $dataMsg->Tomador->InscricaoMunicipal = $data['incricaoMunicialTomador'];
            $dataMsg->Consulente->InscricaoMunicipal = $data['incricaoMunicialTomador'];
        } else {
            unset($dataMsg->Tomador);
            $dataMsg->Intermediario->CpfCnpj->Cnpj = $data['cnpjIntermediario'];
            $dataMsg->Consulente->CpfCnpj->Cnpj = $data['cnpjIntermediario'];
            $dataMsg->Intermediario->InscricaoMunicipal = $data['incricaoMunicialIntermediario'];
            $dataMsg->Consulente->InscricaoMunicipal = $data['incricaoMunicialIntermediario'];
        }

        if (!isset($data['periodoEmissaoDataInicial'])) {
            unset($dataMsg->PeriodoEmissao);
            $dataMsg->PeriodoCompetencia->DataInicial = $data['periodoCompetenciaDataInicial'];
            $dataMsg->PeriodoCompetencia->DataFinal = $data['periodoCompetenciaDataFinal'];
        } else {
            unset($dataMsg->PeriodoCompetencia);
            $dataMsg->PeriodoEmissao->DataInicial = $data['periodoEmissaoDataInicial'];
            $dataMsg->PeriodoEmissao->DataFinal = $data['periodoEmissaoDataFinal'];
        }

        if (!isset($data['numeroNF'])) {
            unset($dataMsg->NumeroNfse);
        } else {
            $dataMsg->NumeroNfse = $data['numeroNF'];
        }

        $dataMsg->Protocolo = $data['pagina'] ?? 1;

        $this->mountMensage($this->headMsg, $this->operation, $dataMsg);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
