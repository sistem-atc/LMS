<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface EntryPointInterface
{

    public function entryPoint(Model $model): void;

}
