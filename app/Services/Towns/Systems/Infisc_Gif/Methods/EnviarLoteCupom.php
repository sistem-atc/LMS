<?php

namespace App\Services\Towns\Systems\Infisc_Gif\Methods;

use Illuminate\Support\Facades\Validator;

trait EnviarLoteCupom
{

    private static string $operation;

    public function enviarLoteCupom(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

}
