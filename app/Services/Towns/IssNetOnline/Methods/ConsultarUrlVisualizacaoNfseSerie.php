<?php

namespace App\Services\Towns\IssNetOnline\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarUrlVisualizacaoNfseSerie
{

    private static string $operation;

    public static function ConsultarUrlVisualizacaoNfseSerie(array $data): string|int|array
    {

        $validator = Validator::make($data, [
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
