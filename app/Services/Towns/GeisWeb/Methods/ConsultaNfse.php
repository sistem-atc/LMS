<?php

namespace App\Services\Towns\GeisWeb\Methods;

use Illuminate\Support\Facades\Validator;

trait consultaNfse
{

    private static string $operation;

    public static function ConsultaNfse($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'dataInicial' => 'required',
            'dataFinal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->DtInicial = $data['dataInicial'];
        $dataMsg->DtFinal = $data['dataFinal'];
        $dataMsg->Pagina = $data['page'] ?? 1;

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
