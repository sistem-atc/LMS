<?php

namespace App\Models;

use App\Enums\TypeBranchEnum;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    protected $fillable = [
        'abbreviation', 'name', 'cnpj', 'type_branche', 'municipal_registration', 'state_registration',
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
