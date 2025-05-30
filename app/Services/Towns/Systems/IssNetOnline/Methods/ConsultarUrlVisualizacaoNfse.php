<?php

namespace App\Services\Towns\Systems\IssNetOnline\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarUrlVisualizacaoNfse
{

    private static string $operation;

    public static function ConsultarUrlVisualizacaoNfse(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|string',
            'inscricao_municipal' => 'required|string',
            'numero_nota' => 'required|string',
            'codigo_tributacao' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricao_municipal = $data['inscricao_municipal'];
        $dataMsg->numero_nota = $data['numero_nota'];
        $dataMsg->codigo_tributacao = $data['codigo_tributacao'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
