<?php

namespace App\Services\Towns\Abaco\Methods;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfse
{

    private static string $endPoint;
    private static string $operation;
    public static function ConsultarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Prestador.cnpj' => 'required|max:14',
            'Prestador.inscricaoMunicipal' => 'required',
            'PeriodoEmissao.dataInicial' => 'required|date',
            'PeriodoEmissao.dataFinal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$endPoint = 'aconsultarnfse';
        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

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
                unset($dataMsg->xpath('//IntermediarioServico/CpfCnpj/Cpf')[0]);
                $dataMsg->Cnpj = $data['intermediarioServico.cnpj'];
            } else {
                unset($dataMsg->xpath('//IntermediarioServico/CpfCnpj/Cnpj')[0]);
                $dataMsg->Cpf = $data['intermediarioServico.Cpf'];
            }
        }

        $dataMsg->Prestador->Cnpj = $data['Prestador']['cnpj'];
        $dataMsg->Prestador->InscricaoMunicipal = $data['Prestador']['inscricaoMunicipal'];
        $dataMsg->PeriodoEmissao->DataInicial = Carbon::parse($data['PeriodoEmissao']['dataInicial'])->format('Y-m-d\TH:i:s');
        $dataMsg->PeriodoEmissao->DataFinal = Carbon::parse($data['PeriodoEmissao']['dataFinal'])->format('Y-m-d\TH:i:s');

        self::mountMensage($dataMsg, self::$operation, self::getVersion());

        return self::parseXmlToArray(self::connection(), '//ns:Outputxml');

    }

}
