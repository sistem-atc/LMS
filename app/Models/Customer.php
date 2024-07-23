<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Bill;
use App\Models\Branch;
use App\Models\Nature;
use App\Models\Vendor;
use App\Models\PaymentTerm;
use App\Models\GroupCustomer;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, HasApiTokens, SoftDeletes;
    protected $fillable = [
        'cpf_or_cnpj', 'company_name', 'type_person', 'fantasy_name', 'postal_code', 'street',
        'complement', 'number', 'district', 'city', 'state', 'ibge', 'gia', 'ddd', 'siafi',
        'region', 'branche_id', 'nature_id', 'phone_number', 'cellphone', 'vendor_id', 'payment_term',
        'bank_standard_id', 'priority', 'risc', 'municipal_registration', 'state_registration',
        'mail_operational', 'mail_financial', 'BaseEndpoint', 'Token', 'group_customer_id', 'tokenText'

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

    public function payment_term(): BelongsTo
    {
        return $this->BelongsTo(PaymentTerm::class);
    }

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class);
    }

    public function document_fiscal_customer(): BelongsTo
    {
        return $this->BelongsTo(DocumentFiscalCustomer::class);
    }
}
