<?php

namespace App\Services\Towns\Betha\Methods;

use Illuminate\Support\Facades\Validator;

trait ConsultarNfseFaixa
{
    private static string $operation;

    public static function ConsultarNfseFaixa($data): string|int|array
    {

        $validator = Validator::make($data, [
            'Cnpj' => 'required',
            'InscricaoMunicipal' => 'required',
            'NumeroNfseInicial' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        };

        self::$operation = __FUNCTION__;
        $dataMsg = self::composeMessage(self::$operation);

        $dataMsg->Cnpj = $data['cnpj'];
        $dataMsg->InscricaoMunicipal = $data['inscricaoMunicipal'];
        $dataMsg->NumeroNfseInicial = $data['numeroNfInicial'];
        $dataMsg->Pagina = $data['pagina'] ?? 1;

        self::mountMensage(parent::$headMsg, $dataMsg);

        return self::connection();
    }


}
