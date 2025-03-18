<?php

namespace App\Models;

use App\Traits\Blameable;
use App\Enums\TypeTransportationEnum;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TypeDocumentTransportEnum;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class TransportDocument extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;
    use \OwenIt\Auditing\Auditable;

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
        'number_nfse',
        'verification_code',
        'emission_date_nfse',
    ];

    protected $casts = [
        'type_document' => TypeDocumentTransportEnum::class,
        'type_transportation' => TypeTransportationEnum::class,
    ];

    public function branch_emission(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function origin_branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }

    public function recipient_branch(): BelongsTo
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

    public function calculation_branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function debit_branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function lot(): BelongsTo
    {
        return $this->belongsTo(Lot::class);
    }

    //$table->string('role_fiscal')->nullable(); // Fazer um foreingn key para a tabela de regras fiscais
    //$table->string('last_sefaz_return_id')->nullable(); // Criar uma tabela para guardar os retornos do sefaz e associar a este campo somente o ultimo retorno evento
    //$table->string('cotation_id')->nullable(); // Criar uma tabela para guardar as cotações e associar a este campo somente a cotação do documento
}
