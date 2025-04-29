<?php

namespace App\Services\Towns\WebIss\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfsePorRps
{
    private static string $operation;
    private static string $endpoint;
    private static SimpleXMLElement $mountMessage;

    public static function ConsultarNfsePorRps(array $data): string|int|array
    {

        $validator = Validator::make($data, [
            'Numero' => 'required|string|max:15',
            'Serie' => 'required|string|max:3',
            'Tipo' => 'required|string|max:1',
            'Cnpj' => 'required|digits:14|regex:/^\d{14}$/',
            'InscricaoMunicipal' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        self::mountMensage($dataMsg);

        return self::connection();

    }

}
