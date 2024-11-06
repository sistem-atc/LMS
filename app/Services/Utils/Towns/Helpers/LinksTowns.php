<?php

namespace App\Services\Utils\Towns\Helpers;

class LinksTowns
{
    public function getLinkTown($codeIbge): ?array
    {
        return config('links-towns.' . $codeIbge) ?? null;
    }
}
