<?php

namespace App\Services\Towns\Systems\Giap\Methods;

use Illuminate\Support\Facades\Validator;

trait cancela
{

    private static string $operation;
    private static string $endpoint;

    public function cancela($data): string|int|array
    {

        $validator = Validator::make($data, [
            'inscricaoMunicipal' => 'required',
            'motivo' => 'required',
            'numeroNota' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        self::$endpoint = "v2/";
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->inscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->motivo = $data['motivo'];
        $dataMsg->numeroNota = $data['numeroNota'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

}
