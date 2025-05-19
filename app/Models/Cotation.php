<?php

namespace App\Models;

use App\Models\Branch;
use App\Enums\CotationMode;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cotation extends BaseModel
{
    /** @use HasFactory<\Database\Factories\CotationFactory> */
    use HasFactory;

    protected $casts = [
        'quoted_at' => 'datetime',
        'total_value' => 'float',
        'weight' => 'float',
        'volume' => 'float',
        'min_weight' => 'float',
        'max_weight' => 'float',
        'price' => 'float',
        'base_km' => 'float',
        'price_per_km' => 'float',
        'mode' => CotationMode::class,
    ];

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }
}
