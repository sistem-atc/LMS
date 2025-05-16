<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Enums\DriverStatus;
use App\Enums\LicenseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory;
    use Blameable;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

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
