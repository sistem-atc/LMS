<?php

namespace App\Models;

use App\Enums\TypeBranchEnum;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends BaseModel
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    protected $casts = [
        'type_branch' => TypeBranchEnum::class,
    ];

    public function user(): HasMany
    {
        return $this->hasMany(user::class);
    }

    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function branch_matriz(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }
}
