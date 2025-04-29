<?php

namespace App\Services\Towns\Betha\Methods;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

trait GerarNfse
{

    private static SimpleXMLElement $headMsg;
    private static string $operation;
    public static function GerarNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'infoId' => ['required', 'string'],
            'numeroRps' => 'required',
            'serieRps' => 'required',
            'tipo_RPS' => ['required', Rule::in(TypeRPS::cases())],
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
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        self::mountMensage(self::$headMsg, $dataMsg);

        return self::connection();
    }

}
