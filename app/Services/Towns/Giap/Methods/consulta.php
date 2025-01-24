<?php

namespace App\Services\Towns\Giap\Methods;

use Illuminate\Support\Facades\Validator;

trait consulta
{

    private static string $operation;

    public function consulta($data): string|int|array
    {

        $validator = Validator::make($data, [
            'inscricaoMunicipal' => 'required',
            'codigoVerificacao' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->codigoVerificacao = $data['codigoVerificacao'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

}
