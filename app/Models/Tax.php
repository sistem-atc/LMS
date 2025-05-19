<?php

namespace App\Models;

use App\Enums\CalcMode;
use App\Enums\RegimeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tax extends BaseModel
{
    /** @use HasFactory<\Database\Factories\TaxFactory> */
    use HasFactory;

    protected $casts = [
        'value' => 'float',
        'active' => 'boolean',
        'regime_type' => RegimeType::class,
        'calc_mode' => CalcMode::class,
    ];
}
