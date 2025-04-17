<?php

use App\Services\Towns\Pm_Cloud_EL\Pm_Cloud_EL;

$class = Pm_Cloud_EL::class;

return [

    '3205101' =>
    [
        'city_name' => 'Viana',
        'ibge'=> '3205101',
        'url_prod' => 'http://es-viana-pm-nfs.cloud.el.com.br:80/RpsService',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

    '3201506' =>
    [
        'city_name' => 'Colatina',
        'ibge'=> '3201506',
        'url_prod' => 'http://es-colatina-pm-nfs.cloud.el.com.br:80/RpsService',
        'url_homolog' => '',
        'headerversion' => null,
        'namespace' => '',
        'version' => null,
        'class_path' => $class
    ],

];
