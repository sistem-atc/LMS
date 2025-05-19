<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentTerm extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PaymentTermFactory> */
    use HasFactory;

    protected $casts = [
        'weekday' => 'array',
        'type_freight' => 'array',
        'especific_date' => 'array',
    ];

    public function Customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
