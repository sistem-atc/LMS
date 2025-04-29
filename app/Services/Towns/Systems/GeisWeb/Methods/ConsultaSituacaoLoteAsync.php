<?php

namespace App\Services\Towns\GeisWeb\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultaSituacaoLoteAsync
{

    private static string $operation;

    public static function ConsultaSituacaoLoteAsync($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroLote' => 'required',
            'numeroProtocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->NumeroLote = $data['numeroLote'];
        $dataMsg->NumeroProtocolo = $data['numeroProtocolo'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
