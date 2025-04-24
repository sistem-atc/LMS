<?php

namespace App\Utils\Tms;

use App\Enums\TypeDocumentTransportEnum;

class SelectDocumentType
{

    public static function getType($origin, $destintation): TypeDocumentTransportEnum
    {

        if ($origin !== $destintation) {
            //Implementar Regra para Serviços como RPS_s
            return TypeDocumentTransportEnum::RPS_t;
        }

        //Implementar Regra para CT_e_Devolucao e CT_e_Subtituição
        //Verificar em que cenario é usado a CT_e_OS
        return TypeDocumentTransportEnum::CT_e_Normal;

    }

}
