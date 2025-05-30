<?php

namespace App\Services\Towns\Systems\IssNetOnline\Methods;

use Illuminate\Support\Facades\Validator;

trait CancelarNfse
{

    private static string $operation;

    public static function CancelarNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'inscricao_municipal' => 'required|string',
            'codigo_cidade' => 'required|string',
            'codigo_cancelamento' => 'required|string',
            'used_companny' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->inscricao_municipal = $data['inscricao_municipal'];
        $dataMsg->codigo_cidade = $data['codigo_cidade'];
        $dataMsg->codigo_cancelamento = $data['codigo_cancelamento'];
        $dataMsg->used_companny = $data['used_companny'];

        self::mountMensage($dataMsg);

        return self::connection();

    }
}
