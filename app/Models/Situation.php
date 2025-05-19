<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Situation extends BaseModel
{
    /** @use HasFactory<\Database\Factories\SituationFactory> */
    use HasFactory;

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }
}
