<?php

namespace App\Actions;

class SendBill implements Action
{

    public static function execute(...$args)
    {
        dd($args);
        //Instanciar Conector do banco
        //Dispatch job para a fila
        //Aguarda retorno da job
    }

}
