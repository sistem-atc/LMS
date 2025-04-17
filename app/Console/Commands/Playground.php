<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Playground extends Command
{
    protected $signature = 'play';
    protected $description = 'Playground Command';

    public function handle(): int
    {
        return Command::SUCCESS;
    }
}
