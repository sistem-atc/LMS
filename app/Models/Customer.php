<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'cpf_or_cnpj', 'company_name', 'type_person', 'fantasy_name', 'postal_code', 'street',
        'complement', 'number', 'district', 'city', 'state', 'ibge', 'gia', 'ddd', 'siafi',
        'region', 'branche_id', 'nature_id', 'phone_number', 'cellphone', 'vendor_id',
        'bank_standard_id', 'priority', 'risc', 'municipal_registration', 'state_registration',
        'mail_operational', 'mail_financial', 'BaseEndpoint', 'Token', 'group_customer_id',

    ];

    public function bank_standard(): BelongsTo
    {
        return $this->BelongsTo(Bank::class);
    }

    public function branch(): BelongsTo
    {
        return $this->BelongsTo(Branch::class);
    }
    public function nature(): BelongsTo
    {
        return $this->BelongsTo(Nature::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->BelongsTo(Vendor::class);
    }

    public function group_customer(): BelongsTo
    {
        return $this->BelongsTo(GroupCustomer::class);
    }

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }
}
