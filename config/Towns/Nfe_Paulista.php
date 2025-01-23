<?php

use App\Services\Towns\Nfe_Paulista\Nfe_Paulista;

$class = Nfe_Paulista::class;

return [

    '3550308' =>
    [
        'city_name' => 'São Paulo',
        'ibge'=> '3550308',
        'url_prod' => 'https://nfe.prefeitura.sp.gov.br/ws/lotenfe.asmx',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
