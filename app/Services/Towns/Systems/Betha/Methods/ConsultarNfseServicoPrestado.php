<?php

namespace App\Services\Towns\Betha\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfseServicoPrestado
{

    private static SimpleXMLElement $headMsg;
    private static string $operation;
    public static function ConsultarNfseServicoPrestado($data): string|int|array
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

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Prestador->Cnpj = $data['Prestador']['cnpj'];
        $dataMsg->Prestador->InscricaoMunicipal = $data['Prestador']['inscricaoMunicipal'];
        $dataMsg->PeriodoEmissao->DataInicial = $data['PeriodoEmissao']['dataInicial'];
        $dataMsg->PeriodoEmissao->DataFinal = $data['PeriodoEmissao']['dataFinal'];
        $dataMsg->Pagina = $data['pagina'] ?? 1;

        self::mountMensage(self::$headMsg, $dataMsg);

        return self::connection();
    }

}
