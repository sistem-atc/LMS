<?php

namespace App\Services\Towns\Systems\iPM\Methods;

use Illuminate\Support\Facades\Validator;

trait Consulta_NotaFiscal
{

    private static string $operation;

    public static function Consulta_NotaFiscal(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'numero_nota' => 'required|string',
            'serie_nfse' => 'required|string',
            'cadastro' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->numero_nota = $data['numero_nota'];
        $dataMsg->serie_nfse = $data['serie_nfse'];
        $dataMsg->cadastro = $data['cadastro'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
