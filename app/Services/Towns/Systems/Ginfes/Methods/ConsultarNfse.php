<?php

namespace App\Services\Towns\Systems\Ginfes\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfse
{

    private static string $operation;

    public static function ConsultarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricaoMunicipal' => 'required',
            'dataInicial' => 'required',
            'dataFinal' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
