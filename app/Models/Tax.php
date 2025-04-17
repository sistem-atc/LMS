<?php

namespace App\Models;

use App\Enums\CalcMode;
use App\Enums\RegimeType;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tax extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;
    use \OwenIt\Auditing\Auditable;

    protected $casts = [
        'value' => 'float',
        'active' => 'boolean',
        'regime_type' => RegimeType::class,
        'calc_mode' => CalcMode::class,
    ];
}
