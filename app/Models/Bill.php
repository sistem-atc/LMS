<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bill extends BaseModel
{
    /** @use HasFactory<\Database\Factories\BillFactory> */
    use HasFactory;

    protected $casts = [
        'transport_document_id' => 'array',
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

    public function transportDocument(): BelongsToMany
    {
        return $this->BelongsToMany(TransportDocument::class);
    }
}
