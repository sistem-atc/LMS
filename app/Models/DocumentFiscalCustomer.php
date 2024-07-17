<?php

namespace App\Models;

use App\Models\Lot;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentFiscalCustomer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cUF', 'mod', 'serie', 'nNF', 'dEmi', 'sender_customer_id', 'recipient_customer_id', 'vBC',
        'vICMS', 'vBCST', 'vST', 'vProd', 'vFrete', 'vSeg', 'vDesc', 'vIPI', 'vPIS', 'vCOFINS',
        'vOutro', 'vNF', 'modFrete', 'qVol', 'pesoL', 'pesoB', 'infAdic', 'chNFe',
    ];

    public function sender_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function recipient_customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function cUF(): BelongsTo
    {
        return $this->BelongsTo(CodeUf::class);
    }

}
