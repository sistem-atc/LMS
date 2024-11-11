<?php

namespace App\Console\Commands;

use App\Enums\TypeRPS;
use App\Services\Towns\Abaco\Abaco;
use App\Services\Utils\Towns\Helpers\LinksTowns;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle(): int
    {

        $class = Abaco::class;
        $abaco = app($class, ['codeIbge' => '1302603']);

        return Command::SUCCESS;
    }
}
