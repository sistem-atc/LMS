<?php

namespace App\Services\Towns\Systems\Betha\Methods;

use Illuminate\Validation\Rule;
use App\Enums\TypeDocumentTransportEnum;
use Illuminate\Support\Facades\Validator;

trait GerarNfse
{

    private string $endPoint;
    private string $operation;

    public function GerarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'infoId' => ['required', 'string'],
            'numeroRps' => 'required',
            'serieRps' => 'required',
            'tipo_RPS' => ['required', Rule::in(TypeDocumentTransportEnum::cases())],
            'dataEmissao' => ['required', 'date'],
            'status' => ['required', 'integer'],
            'competencia' => ['required', 'date'],
            'valorServicos' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorDeducoes' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorPis' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorCofins' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorInss' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorIr' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorCsll' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'valorOutraRetencoes' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'descontoIncodicionado' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'descontoCodicionado' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'issRetido' => ['required', 'integer'],
            'itemListaServico' => 'required',
            'codigoTributacao' => ['required'],
            'discriminacao' => ['required'],
            'codigoMunicipio' => ['required'],
            'exigibilidadeIss' => 'integer',
            'municipioIncidencia' => 'long',
            'prestador.cnpj' => ['required'],
            'prestador.inscricaoMunicipal' => ['required'],
            'tomador.cnpj' => ['required'],
            'tomador.razaoSocial' => ['required'],
            'tomador.endereco' => ['required'],
            'tomador.numero' => ['required'],
            'tomador.complemento' => ['required'],
            'tomador.bairro' => ['required'],
            'tomador.codigoMunicipio' => ['required'],
            'tomador.uf' => ['required'],
            'tomador.cep' => ['required'],
            'tomador.contato' => ['required'],
            'tomador.email' => ['required'],
            'regimeEspecialTributacao' => 'required',
            'optanteSimplesNacional' => 'required',
            'incentivoFiscal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }
        ;

        $this->operation = __FUNCTION__;
        $dataMsg = $this->composeMessage($this->operation);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        $this->mountMensage($this->headMsg, $this->operation, $dataMsg);

        $response = $this->http()
            ->setBaseUrl($this->getUrl())
            ->setHeaders($this->getHeaders())
            ->post($this->endPoint, $this->mountMessage->asXML());

        return $this->parseXmlToArray($response, '');
    }

}
