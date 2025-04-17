<?php

use App\Services\Towns\NotaOnline\NotaOnline;

$class = NotaOnline::class;

return [

    '1200401' =>
    [
        'city_name' => 'Rio Branco',
        'ibge'=> '1200401',
        'url_prod' => 'https://nota.riobranco.ac.gov.br/ws/nfse203.wsdl',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
