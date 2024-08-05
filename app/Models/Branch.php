<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Enums\TypeBranchEnum;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;
    use Blameable;

    protected $fillable = [
        'abbreviation', 'name', 'cnpj', 'type_branche', 'branch_matriz', 'municipal_registration', 'state_registration',
        'postal_code', 'street', 'complement', 'number', 'district', 'city', 'state', 'ibge', 'gia', 'ddd',
        'siafi', 'certificatePFX', 'password_certificate', 'phantasy_name'
    ];

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
}
