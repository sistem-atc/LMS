<?php

namespace App\Services\Towns\Betha\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfseServicoTomado
{

    private static SimpleXMLElement $headMsg;
    private static string $operation;
    public static function ConsultarNfseServicoTomado($data): string|int|array
    {

        $validator = Validator::make($data, [
            //Incluir as validações
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

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

        self::mountMensage(self::$headMsg, $dataMsg);

        return self::connection();
    }

}
