<?php

$currentAmbient = env('APP_ENV', 'local');
$currentAmbient = 'production' ? $tmAmb = 1 : $tmAmb = 2;

return [
    "atualizacao" => "2016-11-03 18:01:21",
    "tpAmb" => $currentAmbient,
    "razaosocial" => "SUA RAZAO SOCIAL LTDA",
    "cnpj" => "99999999999999",
    "siglaUF" => "RS",
    "schemes" => "PL_CTe_400",
    "versao" => '4.00',
    "tokenIBPT" => "AAAAAAA",
    "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
    "CSCid" => "000001",
    "proxyConf" => [
        "proxyIp" => "",
        "proxyPort" => "",
        "proxyUser" => "",
        "proxyPass" => ""
    ],
];
