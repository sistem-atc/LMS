<?php

use App\Models\Bank;
use App\Models\Nature;
use App\Models\Customer;
use App\Models\Situation;
use App\Models\ReceivingType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Nature::class)->constrained();
            $table->foreignIdFor(Bank::class)->constrained();
            $table->foreignIdFor(Customer::class)->constrained();
            $table->json('transport_document_id')->nullable();
            $table->date('emission_date');
            $table->date('due_date');
            $table->float('total_value');
            $table->float('discount_value')->nullable();
            $table->float('liquid_value');
            $table->float('irrf_base');
            $table->float('irrf_tax');
            $table->float('irrf_value');
            $table->float('iss_base');
            $table->float('iss_tax');
            $table->float('iss_value');
            $table->date('writeoff_date')->nullable();
            $table->foreignIdFor(ReceivingType::class)->constrained();
            $table->string('historic')->nullable();
            $table->foreignIdFor(Situation::class)->constrained();
            $table->float('fine');
            $table->float('interests');
            $table->string('boleto_number')->nullable();
            $table->string('barr_code')->nullable();
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
