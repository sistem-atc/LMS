<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Enums\VehicleType;
use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;
    use Blameable;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $casts = [
        'type' => VehicleType::class,
        'status' => VehicleStatus::class,
    ];

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }
}
