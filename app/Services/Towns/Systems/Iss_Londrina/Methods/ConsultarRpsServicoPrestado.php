<?php

namespace App\Services\Towns\Systems\Iss_Londrina\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarRpsServicoPrestado
{

    private static string $operation;

    public function ConsultarRpsServicoPrestado(array $data): string|int|array
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
        $dataMsg->numero_rps = $data['numero_rps'];
        $dataMsg->data_emissao_rps = $data['data_emissao_rps'];

        self::mountMensage($dataMsg);

        $dataMsg = self::Sign_XML($dataMsg->asXML());

        return self::connection();
    }

}
