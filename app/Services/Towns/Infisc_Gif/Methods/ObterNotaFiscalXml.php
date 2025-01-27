<?php

namespace App\Services\Towns\Infisc_Gif\Methods;

use Illuminate\Support\Facades\Validator;

trait ObterNotaFiscalXml
{

    private static string $operation;

    public function obterNotaFiscalXml(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
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
