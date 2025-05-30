<?php

namespace App\Services\Towns\Systems\Iss_Londrina\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarCadastroContribuinte
{

    private static string $operation;

    public function ConsultarCadastroContribuinte(array $data): string|int|array
    {

        $validator = Validator::make($data, [
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->ccm = $data['ccm'];
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->cpf = $data['cpf'];
        $dataMsg->senha = $data['senha'];
        $dataMsg->cnpj_consulta = $data['cnpj_consulta'];
        $dataMsg = self::Sign_XML($dataMsg->asXML());

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
