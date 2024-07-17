<?php

use App\Models\CodeUf;
use App\Models\Customer;
use App\Models\Lot;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_fiscal_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CodeUf::class, 'cUF_id')->nullable();
            $table->string('mod')->nullable();
            $table->string('serie')->nullable();
            $table->string('nNF')->nullable();
            $table->string('dEmi')->nullable();
            $table->foreignIdFor(Customer::class, 'sender_customer_id');
            $table->foreignIdFor(Customer::class, 'recipient_customer_id');
            $table->string('vBC')->nullable();
            $table->string('vICMS')->nullable();
            $table->string('vBCST')->nullable();
            $table->string('vST')->nullable();
            $table->string('vProd')->nullable();
            $table->string('vFrete')->nullable();
            $table->string('vSeg')->nullable();
            $table->string('vDesc')->nullable();
            $table->string('vIPI')->nullable();
            $table->string('vPIS')->nullable();
            $table->string('vCOFINS')->nullable();
            $table->string('vOutro')->nullable();
            $table->string('vNF')->nullable();
            $table->string('modFrete')->nullable();
            $table->string('qVol')->nullable();
            $table->string('pesoL')->nullable();
            $table->string('pesoB')->nullable();
            $table->longText('infAdic')->nullable();
            $table->string('chNFe')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_fiscal_customers');
    }
};
