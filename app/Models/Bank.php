<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends BaseModel
{
    /** @use HasFactory<\Database\Factories\BankFactory> */
    use HasFactory;

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
