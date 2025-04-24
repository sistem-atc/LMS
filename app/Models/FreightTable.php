<?php

namespace App\Models;

use App\Models\Customer;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreightTable extends Model implements Auditable
{
    use HasFactory, SoftDeletes, Blameable;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'routes',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'routes' => 'array',
        'is_active' => 'boolean',
    ];

    public function customer(): HasMany
    {
        return $this->HasMany(Customer::class);
    }
}
