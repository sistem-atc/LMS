<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Itau\ItauService;
use App\Services\Utils\MultiEmbarcador\MultiEmbarcadorService;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle(): int
    {

        $Multi = new MultiEmbarcadorService;
        $Multi->BuscarCTes(strtotime('31/01/2023'), strtotime('31/01/2023'));

        /*$Itau = new ItauService;
        $return = $Itau->ConsultarBoletos();
        dd($return);*/
        return Command::SUCCESS;
    }
}
