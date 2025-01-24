<?php

namespace App\Services\Towns\Infisc_Gif\Methods;

use Illuminate\Support\Facades\Validator;

trait ObterLoteNotaFiscal
{

    private static string $operation;

    public function obterLoteNotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'nota_inicial' => 'required',
            'nota_final' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }
}
