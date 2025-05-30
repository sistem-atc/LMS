<?php

namespace App\Services\Towns\Systems\ISS_Digital\Methods;

use Illuminate\Support\Facades\Validator;

trait cancelar
{

    private static string $operation;

    public static function cancelar(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'CNPJ' => 'required|string',
            'codigo_cidade' => 'required|string',
            'Inscricao_Municipal' => 'required|string',
            'Numero_Nota' => 'required|string',
            'Codigo_Verificacao' => 'required|string',
            'Motivo_Cancelamento' => 'required|string',
            'id_nota' => 'required|string',
            'sequencia_lote' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;

        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['CNPJ'];
        $dataMsg->codigo_cidade = $data['codigo_cidade'];
        $dataMsg->inscricao_municipal = $data['Inscricao_Municipal'];
        $dataMsg->numero_nota = $data['Numero_Nota'];
        $dataMsg->codigo_verificacao = $data['Codigo_Verificacao'];
        $dataMsg->motivo_cancelamento = $data['Motivo_Cancelamento'];
        $dataMsg->id_nota = $data['id_nota'];
        $dataMsg->sequencia_lote = $data['sequencia_lote'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();

    }

}
