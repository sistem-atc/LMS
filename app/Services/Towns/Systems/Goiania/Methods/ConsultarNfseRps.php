<?php

namespace App\Services\Towns\Goiania\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfseRps
{

    private static string $operation;

    public static function ConsultarNfseRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricao_municipal' => 'required',
            'numero_rps' => 'required',
            'serie_rps' => 'required',
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
