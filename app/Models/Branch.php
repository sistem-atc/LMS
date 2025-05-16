<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Enums\TypeBranchEnum;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Branch extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    use HasRoles;

    use SoftDeletes;

    use Blameable;

    use \OwenIt\Auditing\Auditable;

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
