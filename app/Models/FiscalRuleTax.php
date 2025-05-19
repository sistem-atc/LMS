<?php

namespace App\Models;

use App\Enums\CalcMode;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiscalRuleTax extends BaseModel
{
    /** @use HasFactory<\Database\Factories\FiscalRuleTaxFactory> */
    use HasFactory;

    protected $casts = [
        'calc_mode' => CalcMode::class,
        'is_retained' => 'boolean',
    ];

    public function rule()
    {
        return $this->belongsTo(FiscalRule::class, 'fiscal_rule_id');
    }
}
