<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Observers\EmployeeObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use OwenIt\Auditing\Contracts\Auditable;

#[ObservedBy([EmployeeObserver::class])]
class Employee extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'user_id',
        'branch_id',
        'name',
        'cpf',
        'personalmail',
        'postal_code',
        'street',
        'complement',
        'number',
        'district',
        'city',
        'state',
        'ibge',
        'gia',
        'ddd',
        'siafi',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }
}
