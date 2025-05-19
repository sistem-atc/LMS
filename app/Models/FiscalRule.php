<?php

namespace App\Models;

use App\Enums\RegimeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiscalRule extends BaseModel
{
    /** @use HasFactory<\Database\Factories\FiscalRuleFactory> */
    use HasFactory;

    protected $casts = [
        'regime_type' => RegimeType::class,
    ];

    public function fiscal_rule()
    {
        return $this->hasMany(FiscalRuleTax::class);
    }
}
