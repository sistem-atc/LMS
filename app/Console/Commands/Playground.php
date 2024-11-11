<?php

namespace App\Console\Commands;

use App\Enums\TypeRPS;
use App\Services\Towns\Abaco\Abaco;
use App\Services\Utils\Towns\Helpers\LinksTowns;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle(): int
    {

        $arrayData = [
            'cnpj' => '18575072000122',
            'inscricaoMunicipal' => 854776,
            'dataInicial' => Carbon::now()->format('Y-m-d H:i:s'),
            'dataFinal' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $class = Abaco::class;
        $abaco = app($class, ['codeIbge' => '1302603']);
        dd($abaco->ConsultarNfse($arrayData));

        return Command::SUCCESS;
    }
}
