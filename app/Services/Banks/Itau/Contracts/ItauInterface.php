<?php

declare(strict_types=1);

namespace App\Services\Banks\Itau\Contracts;

interface ItauInterface
{
    public function handle(): array;

}
