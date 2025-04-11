<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Bank extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\BankFactory> */
    use HasFactory;

    use SoftDeletes;

    use Blameable;

    use \OwenIt\Auditing\Auditable;

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
