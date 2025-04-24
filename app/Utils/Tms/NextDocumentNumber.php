<?php

namespace App\Utils\Tms;

use App\Enums\TypeDocumentTransportEnum;

class NextDocumentNumber
{

    public static function getNextNumber(TypeDocumentTransportEnum $typeDocument): int
    {

        if ($typeDocument) {
            //Query para rastrear o proximo numero por tipo de documento
            return 2;
        }

        return 1;
    }

}
