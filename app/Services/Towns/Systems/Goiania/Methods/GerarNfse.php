<?php

namespace App\Services\Towns\Systems\Goiania\Methods;

use Illuminate\Support\Facades\Validator;
use App\Services\Utils\Towns\Helpers\EnvironmentHelper;

trait GerarNfse
{

    private static string $operation;

    public static function GerarNfse(array $data): string|int|array
    {
        $validator = Validator::make($data, [
            'cnpj' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);

        $dataMsg->Serie = (EnvironmentHelper::getAmbient() !== 'production') ? 'TESTE' : $data['serie_rps'];

        self::mountMensage($dataMsg);

        return self::connection();

    }

}
