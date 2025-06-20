<?php

namespace App\EntryPoints;

use App\Interfaces\EntryPointInterface;
use Illuminate\Database\Eloquent\Model;

class Bank implements EntryPointInterface
{
    public function entryPoint(Model $model): void
    {
        // Intercept model for apply business logic
        // Example: $model->status = 'pending';
    }

}
