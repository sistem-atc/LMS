<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use NFePHP\Common\Certificate;
use NFePHP\CTe\Tools;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle(): int
    {

        $response = Http::get('https://brasilapi.com.br/api/cep/v2/06124130')->json();

        dd($response);

        $arr = config('speed-cte');

        $configJson = json_encode($arr);
        $content = file_get_contents(storage_path('certificate/G2L_CTe.pfx'));

        $tools = new Tools($configJson, Certificate::readPfx($content, '123456'));

        $tools->model('57');

        $response = $tools->sefazStatus('SP');

        header('Content-type: text/xml; charset=UTF-8');

        dd($response);

        return Command::SUCCESS;
    }
}
