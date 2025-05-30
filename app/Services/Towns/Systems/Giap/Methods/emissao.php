<?php

namespace App\Services\Towns\Systems\Giap\Methods;

use Illuminate\Support\Facades\Validator;

trait emissao
{

    private static string $operation;
    private static string $endpoint;

    public function emissao($data): string|int|array
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
        self::$endpoint = "v2/";
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->cnpj = $data['cnpj'];
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->dictNotas = $data['dictNotas'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

}
