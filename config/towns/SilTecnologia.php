<?php

use App\Services\Towns\SilTecnologia\SilTecnologia;

$class = SilTecnologia::class;

return [

    '3506003' =>
    [
        'city_name' => 'Bauru',
        'ibge'=> '3506003',
        'url_prod' => 'https://tributario.bauru.sp.gov.br/services/',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '3506508' =>
    [
        'city_name' => 'Birigui',
        'ibge'=> '3506508',
        'url_prod' => 'http://pmbirigui02.smarapd.com.br:9999/smartb/services/',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '3502507' =>
    [
        'city_name' => 'Aparecida',
        'ibge'=> '3502507',
        'url_prod' => 'https://aparecida.siltecnologia.com.br/tbw/services/',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
