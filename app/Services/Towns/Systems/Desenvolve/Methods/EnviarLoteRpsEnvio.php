<?php

namespace App\Services\Towns\Desenvolve\Methods;

use App\Enums\TypeRPS;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

trait EnviarLoteRpsEnvio
{

    private static string $operation;

    public static function enviarLoteRpsEnvio($data): string|int
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required|max:14',
            'inscricaoMunicipal' => 'required',
            'numero_RPS' => 'required',
            'serie_RPS' => 'required',
            'tipo_RPS' => [
                'required',
                Rule::in(TypeRPS::cases())
            ],
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Protocolo = $data['protocolo'];
        $dataMsg = self::Sign_XML($dataMsg);

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
