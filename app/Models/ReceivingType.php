<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceivingType extends BaseModel
{
    /** @use HasFactory<\Database\Factories\ReceivingTypeFactory> */
    use HasFactory;

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }
}
