<?php

namespace App\Models;

use App\Enums\VehicleType;
use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends BaseModel
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $casts = [
        'type' => VehicleType::class,
        'status' => VehicleStatus::class,
    ];

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }
}
