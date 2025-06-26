<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nature extends BaseModel
{
    /** @use HasFactory<\Database\Factories\NatureFactory> */
    use HasFactory;

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }

    public function rules_account(): HasOne
    {
        return $this->hasOne(RulesAccount::class);
    }

}
