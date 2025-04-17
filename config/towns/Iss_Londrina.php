<?php

use App\Services\Towns\Iss_Londrina\Iss_Londrina;

$class = Iss_Londrina::class;

return [

    '4113700' =>
    [
        'city_name' => 'Londrina',
        'ibge'=> '4113700',
        'url_prod' => 'https://iss.londrina.pr.gov.br:443/ws/v1_03/sigiss_ws.php',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
