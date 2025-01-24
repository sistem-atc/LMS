<?php

namespace App\Services\Towns\Giap\Methods;

use Illuminate\Support\Facades\Validator;

trait simula
{

    private static string $operation;
    private static string $endpoint;

    public function simula($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'inscricaoMunicipal' => 'required',
            'dictNotas' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        self::$endpoint = "v2/emissao/";
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->dictNotas = $data['dictNotas'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

}
