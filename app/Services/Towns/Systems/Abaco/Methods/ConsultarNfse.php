<?php

namespace App\Services\Towns\Systems\Abaco\Methods;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

trait ConsultarNfse
{

    private string $endPoint;
    private string $operation;

    public function ConsultarNfse(array $data): string|int|array
    {

        $validator = Validator::make(
            data: $data,
            rules: [
                'Prestador.cnpj' => 'required|max:14',
                'Prestador.inscricaoMunicipal' => 'required',
                'PeriodoEmissao.dataInicial' => 'required|date',
                'PeriodoEmissao.dataFinal' => 'required|date',
            ]
        );

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->endPoint = 'aconsultarnfse';
        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage(type: $this->operation);

        if (!isset($data['tomador'])) {
            unset($dataMsg->Tomador);
        } else {
            $dataMsg->InscricaoMunicipal = $data['tomador.inscricaoMunicipal'];
            if (!isset($data['tomador.cnpj'])) {
                unset($dataMsg->xpath('//Tomador/CpfCnpj/Cpf')[0]);
                $dataMsg->Cnpj = $data['tomador.cnpj'];
            } else {
                unset($dataMsg->xpath('//Tomador/CpfCnpj/Cnpj')[0]);
                $dataMsg->Cpf = $data['tomador.Cpf'];
            }
        }

        if (!isset($data['intermediarioServico'])) {
            unset($dataMsg->IntermediarioServico);
        } else {
            $dataMsg->InscricaoMunicipal = $data['intermediarioServico.inscricaoMunicipal'];
            if (!isset($data['intermediarioServico.cnpj'])) {
                unset($dataMsg->xpath(expression: '//IntermediarioServico/CpfCnpj/Cpf')[0]);
                $dataMsg->Cnpj = $data['intermediarioServico.cnpj'];
            } else {
                unset($dataMsg->xpath(expression: '//IntermediarioServico/CpfCnpj/Cnpj')[0]);
                $dataMsg->Cpf = $data['intermediarioServico.Cpf'];
            }
        }

        $dataMsg->Prestador->Cnpj = $data['Prestador']['cnpj'];
        $dataMsg->Prestador->InscricaoMunicipal = $data['Prestador']['inscricaoMunicipal'];
        $dataMsg->PeriodoEmissao->DataInicial = Carbon::parse(
            time: $data['PeriodoEmissao']['dataInicial']
        )->format(
                format: 'Y-m-d\TH:i:s'
            );
        $dataMsg->PeriodoEmissao->DataFinal = Carbon::parse(
            time: $data['PeriodoEmissao']['dataFinal']
        )->format(
                format: 'Y-m-d\TH:i:s'
            );

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray(xmlString: $response, xpath: '//ns:Outputxml');

    }

}
