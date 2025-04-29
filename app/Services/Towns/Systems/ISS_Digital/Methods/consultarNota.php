<?php

namespace App\Services\Towns\ISS_Digital\Methods;

use Illuminate\Support\Facades\Validator;

trait consultarNota
{
    private static string $operation;

    public static function consultarNota(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|string',
            'inscricao_municipal' => 'required|string',
            'data_inicial' => 'required|string',
            'data_final' => 'required|string',
            'codigo_cidade' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->codigo_cidade = $data['codigo_cidade'];
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricao_municipal = $data['inscricao_municipal'];
        $dataMsg->data_inicial = $data['data_inicial'];
        $dataMsg->data_final = $data['data_final'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

}
