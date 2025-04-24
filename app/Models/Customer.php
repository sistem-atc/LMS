<?php

namespace App\Models;

use App\Traits\Blameable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model implements Auditable
{
    use Blameable;
    use HasApiTokens;
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'cpf_or_cnpj',
        'company_name',
        'type_person',
        'fantasy_name',
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
        'region',
        'branche_id',
        'nature_id',
        'phone_number',
        'cellphone',
        'vendor_id',
        'payment_term',
        'bank_standard_id',
        'priority',
        'risc',
        'municipal_registration',
        'state_registration',
        'mail_operational',
        'mail_financial',
        'BaseEndpoint',
        'token_multisoftware',
        'group_customer_id',
        'token_api',
        'complete',
    ];

    protected $casts = [
        'complete' => 'boolean',
    ];

    public function bank(): BelongsTo
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

    public function edi_pattern(): BelongsTo
    {
        return $this->belongsTo(EdiPattern::class);
    }

    public function payment_term(): BelongsTo
    {
        return $this->BelongsTo(PaymentTerm::class);
    }

    public function bill(): HasMany
    {
        return $this->HasMany(Bill::class);
    }

    public function document_fiscal_customer(): HasMany
    {
        return $this->HasMany(DocumentFiscalCustomer::class);
    }

    public function freight_table(): BelongsTo
    {
        return $this->BelongsTo(FreightTable::class);
    }
}
