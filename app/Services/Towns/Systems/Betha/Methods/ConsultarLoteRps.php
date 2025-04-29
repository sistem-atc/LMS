<?php

namespace App\Services\Towns\Betha\Methods;

use SimpleXMLElement;
use Illuminate\Support\Facades\Validator;

trait ConsultarLoteRps
{
    private static SimpleXMLElement $headMsg;
    private static string $operation;
    public static function ConsultarLoteRps($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'Protocolo' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);
        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->Protocolo = $data['protocolo'];

        self::mountMensage(self::$headMsg, $dataMsg);

        return self::connection();
    }

}
