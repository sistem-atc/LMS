<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cte extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'branche_id',
        'serie',
        'emission_date',
        'weight',
        'weight_m3',
        'weight_charged',
        'm3',
        'shipping_value',
        'tax_amount',
        'total_value',
        'type_transportation',
        'lot',
        'origin_branche_id',
        'recipient_branche_id',
        'calculation_branche_id',
        'debit_branche_id',
        'shipping_table',
        'shipping_table_order',
        'shipping_type',
        'insurance',
        'insurance_contract',
        'delivery_time',
        'doct_blocked',
        'sender_customer_id',
        'recipient_customer_id',
        'consignee_customer_id',
        'debtor_customer_id',
        'customer_calculation_id',
        'delivery_route_id',
        'delivery_date',
        'cte_protocol',
        'cte_key',
        'cte_situation',
        'cte_sefaz_return',
        'cost_center_id',
        'bill',
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
