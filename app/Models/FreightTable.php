<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreightTable extends BaseModel
{
    /** @use HasFactory<\Database\Factories\FreightTableFactory> */
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'routes' => 'array',
        'is_active' => 'boolean',
    ];

    public function customer(): HasMany
    {
        return $this->HasMany(Customer::class);
    }
}
