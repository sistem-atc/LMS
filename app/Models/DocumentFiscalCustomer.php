<?php

namespace App\Models;

use App\Models\Customer;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class DocumentFiscalCustomer extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use Blameable;
    use \OwenIt\Auditing\Auditable;

    public static function getAllowedFields(): array
    {
        return [];
    }

    public static function getAllowedFilters(): array
    {
        return [];
    }

    protected $fillable = [
        'cUF_id',
        'mod',
        'serie',
        'nNF',
        'dEmi',
        'sender_customer_id',
        'recipient_customer_id',
        'emit_customer_id',
        'vBC',
        'lot_id',
        'vICMS',
        'vBCST',
        'vST',
        'vProd',
        'vFrete',
        'vSeg',
        'vDesc',
        'vIPI',
        'vPIS',
        'vCOFINS',
        'vOutro',
        'vNF',
        'modFrete',
        'qVol',
        'pesoL',
        'pesoB',
        'infAdic',
        'chNFe',
        'xml',
    ];

    public function sender_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function recipient_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function emit_customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function codeuf(): BelongsTo
    {
        return $this->belongsTo(CodeUf::class);
    }

    public function lot(): BelongsTo
    {
        return $this->belongsTo(Lot::class);
    }
}
