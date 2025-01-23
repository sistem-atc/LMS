<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cte extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;

    protected $fillable = [
        'branch_emission_id',
        'number',
        'serie',
        'emission_date',
        'total_volumes',
        'total_weight',
        'total_weight_m3',
        'total_weight_charged',
        'total_m3',
        'shipping_value',
        'tax_amount',
        'total_value',
        'type_transportation',
        'type_document',
        'origin_branche_id',
        'recipient_branche_id',
        'calculation_branche_id',
        'debit_branche_id',
        'insurance_contract',
        'shipping_table',
        'shipping_table_order',
        'shipping_type',
        'delivery_date_prevision',
        'lot',
        'delivery_date',
        'delivery_time_real',
        'doct_blocked',
        'sender_customer_id',
        'recipient_customer_id',
        'consignee_customer_id',
        'debtor_customer_id',
        'customer_calculation_id',
        'delivery_route_id',
        'role_fiscal',
        'cte_situation',
        'cte_key',
        'last_sefaz_return_id',
        'cte_protocol',
        'cte_sefaz_return',
        'ambient_sefaz',
        'cotation_id',
        'bill',
        'cost_center_id',
    ];

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function customer_calculation(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function debtor_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function consignee_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function recipient_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function sender_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function bill(): BelongsTo
    {
        return $this->BelongsTo(Bill::class);
    }

    public function delivery_route(): BelongsTo
    {
        return $this->BelongsTo(Route::class);
    }

    public function cost_center(): BelongsTo
    {
        return $this->belongsTo(Costcenter::class);
    }
}
