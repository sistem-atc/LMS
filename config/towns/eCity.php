<?php

use App\Services\Towns\eCity\eCity;

$class = eCity::class;

return [

    '4115200' =>
    [
        'city_name' => 'Maringa',
        'ibge'=> '4115200',
        'url_prod' => 'https://nfse-ws.ecity.maringa.pr.gov.br/MaringaNfse.asmx',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
