<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use NFePHP\CTe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\Common\Soap\SoapCurl;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle(): int
    {

        $arr = config('speed-cte');

        $configJson = json_encode($arr);
        $content = file_get_contents(storage_path('certificate\G2L_CTe.pfx'));

        $tools = new Tools($configJson, Certificate::readPfx($content, '123456'));
        $tools->model('57');

        $response = $tools->sefazStatus('SP');

        header('Content-type: text/xml; charset=UTF-8');

        dd($response);

        return Command::SUCCESS;
    }
}
