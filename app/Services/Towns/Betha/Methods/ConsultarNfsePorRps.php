<?php

namespace App\Services\Towns\Betha\Methods;

use SimpleXMLElement;
use App\Enums\TypeRPS;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

trait ConsultarNfsePorRps
{

    private static SimpleXMLElement $headMsg;
    private static string $operation;

    public static function ConsultarNfsePorRps($data): string|int|array
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

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Numero = $data['numero_RPS'];
        $dataMsg->Serie = $data['serie_RPS'];
        $dataMsg->Tipo = $data['tipo_RPS'];

        self::mountMensage(self::$headMsg, $dataMsg);

        return self::connection();
    }

}
