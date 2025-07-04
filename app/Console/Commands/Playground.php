<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class Playground extends Command
{
    protected $signature = 'play';
    protected $description = 'Playground Command';

    public function handle(): int
    {

        return SymfonyCommand::SUCCESS;
    }
}
