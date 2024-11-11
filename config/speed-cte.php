<?php

use Carbon\Carbon;

//tpAmb sendo incluida nas configurações em tempo de execução
// atraves do registro em AppServiceProvider

return [
    "atualizacao" => Carbon::now()->format('Y-m-d H:i:s'),
    /*"razaosocial" => "SUA RAZAO SOCIAL LTDA",
    "cnpj" => "99999999999999",
    "siglaUF" => "RS",*/
    "schemes" => "PL_CTe_400",
    "versao" => '4.00',
    /*"tokenIBPT" => "AAAAAAA",
    "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
    "CSCid" => "000001",*/
    "proxyConf" => [
        "proxyIp" => "",
        "proxyPort" => "",
        "proxyUser" => "",
        "proxyPass" => ""
    ],
];
