<?php

namespace App\Models;

use App\Enums\TypeTransportationEnum;
use App\Enums\TypeDocumentTransportEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportDocument extends BaseModel
{
    /** @use HasFactory<\Database\Factories\TransportDocumentFactory> */
    use HasFactory;

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
