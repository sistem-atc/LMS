<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Costcenter extends BaseModel
{

    /** @use HasFactory<\Database\Factories\CostcenterFactory> */
    use HasFactory;

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

}
