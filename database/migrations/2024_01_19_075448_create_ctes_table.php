<?php

use App\Models\Route;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Costcenter;
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
        Schema::create('ctes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Branch::class, 'branch_emission_id')->constrained()->cascadeOnDelete();
            $table->string('number');
            $table->string('serie');
            $table->dateTime('emission_date');
            $table->integer('total_volumes')->nullable();
            $table->float('total_weight')->nullable();
            $table->float('total_weight_m3')->nullable();
            $table->float('total_weight_charged')->nullable();
            $table->float('total_m3')->nullable();
            $table->float('shipping_value');
            $table->float('tax_amount');
            $table->float('total_value');
            $table->string('type_transportation'); //Gerar tipos de transporte Aereo, Terrestre, etc
            $table->string('type_document'); //CT-e, CT-e-OS, RPS-t, RPS-s, etc
            $table->foreignIdFor(Branch::class, 'origin_branch_id');
            $table->foreignIdFor(Branch::class, 'recipient_branch_id');
            $table->foreignIdFor(Branch::class, 'calculation_branch_id');
            $table->foreignIdFor(Branch::class, 'debit_branch_id');
            $table->string('insurance_contract')->nullable();
            $table->string('shipping_table');
            $table->string('shipping_table_order');
            $table->string('shipping_type');
            $table->dateTime('delivery_date_prevision')->nullable();
            $table->string('lot')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('delivery_time_real')->nullable();
            $table->boolean('doct_blocked');
            $table->foreignIdFor(Customer::class, 'sender_customer_id');
            $table->foreignIdFor(Customer::class, 'recipient_customer_id');
            $table->foreignIdFor(Customer::class, 'consignee_customer_id')->nullable();
            $table->foreignIdFor(Customer::class, 'debtor_customer_id');
            $table->foreignIdFor(Customer::class, 'customer_calculation_id');
            $table->foreignIdFor(Route::class, 'delivery_route_id');
            $table->string('role_fiscal')->nullable(); // Fazer um foreingn key para a tabela de regras fiscais
            $table->string('cte_situation')->nullable();
            $table->string('cte_key')->nullable();
            $table->string('last_sefaz_return_id')->nullable(); // Criar uma tabela para guardar os retornos do sefaz e associar a este campo somente o ultimo retorno evento
            $table->string('cte_protocol')->nullable();
            $table->string('cte_sefaz_return')->nullable();
            $table->string('ambient_sefaz')->nullable(); // Homologado, Produção, etc Ambiente da sefaz que foi enviado o documento
            $table->string('cotation_id')->nullable(); // Criar uma tabela para guardar as cotações e associar a este campo somente a cotação do documento
            $table->string('bill')->nullable();
            $table->foreignIdFor(Costcenter::class)->nullable();
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
        Schema::dropIfExists('ctes');
    }
};
