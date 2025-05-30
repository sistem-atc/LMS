<?php

namespace App\Services\Towns\Systems\GeisWeb\Methods;

use Illuminate\Support\Facades\Validator;

trait GeraPDFNFSe
{

    private static string $operation;

    public static function GeraPDFNFSe($data): string|int|array
    {

        $validator = Validator::make($data, [
            'cnpj' => 'required',
            'numeroNF' => 'required',
            'cnpjTomador' => 'required',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors(), 'response' => 422];
        }

        self::$operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CnpjCpf = $data['cnpj'];
        $dataMsg->NumeroNfse = $data['numeroNF'];
        $dataMsg->CnpjCpfTomador = $data['cnpjTomador'];

        self::mountMensage($dataMsg);

        return self::connection();
    }

}
