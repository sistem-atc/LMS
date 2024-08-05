<?php

namespace App\Models;

use App\Models\Bank;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bill extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;

    protected $fillable = [
        'nature_id',
        'bank_id',
        'customer_id',
        'emission_date',
        'due_date',
        'total_value',
        'discount_value',
        'liquid_value',
        'irrf_base',
        'irrf_value',
        'iss_tax',
        'iss_value',
        'writeoff_date',
        'receiving_type',
        'historic',
        'situation',
        'fine',
        'interest',
        'boleto_number',
        'barr_code'
    ];

    protected $casts = [
        'cte_id' => 'array',
    ];

    public function bank(): BelongsTo
    {
        return $this->BelongsTo(Bank::class);
    }

    public function situation(): BelongsTo
    {
        return $this->BelongsTo(Situation::class);
    }

    public function receiving_type(): BelongsTo
    {
        return $this->BelongsTo(ReceivingType::class);
    }

    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function nature(): BelongsTo
    {
        return $this->BelongsTo(Nature::class);
    }

    public function ctes(): BelongsToMany
    {
        return $this->BelongsToMany(Cte::class);
    }

}
