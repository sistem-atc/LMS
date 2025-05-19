<?php

namespace App\Models;

use App\Enums\DriverStatus;
use App\Enums\LicenseCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends BaseModel
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory;

    protected $casts = [
        'birth_date' => 'date',
        'license_expires_at' => 'date',
        'license_category' => LicenseCategory::class,
        'status' => DriverStatus::class,
    ];

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }

}
