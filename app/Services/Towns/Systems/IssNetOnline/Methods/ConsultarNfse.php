<?php

namespace App\Services\Towns\Systems\IssNetOnline\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfse
{

    private static string $operation;

    public static function ConsultarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|string',
            'inscricao_municipal' => 'required|string',
            'data_inicial' => 'required|date',
            'data_final' => 'required|date',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricao_municipal = $data['inscricao_municipal'];
        $dataMsg->data_inicial = $data['data_inicial'];
        $dataMsg->data_final = $data['data_final'];
        $dataMsg->numero_nota = $data['numero_nota'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
