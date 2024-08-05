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
            $table->foreignIdFor(Branch::class);
            $table->string('serie');
            $table->dateTime('emission_date');
            $table->float('weight');
            $table->float('weight_m3')->nullable();
            $table->float('weight_charged');
            $table->float('m3')->nullable();
            $table->float('shipping_value');
            $table->float('tax_amount');
            $table->float('total_value');
            $table->string('type_transportation');
            $table->string('lot');
            $table->foreignIdFor(Branch::class, 'origin_branch_id');
            $table->foreignIdFor(Branch::class, 'recipient_branch_id');
            $table->foreignIdFor(Branch::class, 'calculation_branch_id');
            $table->foreignIdFor(Branch::class, 'debit_branch_id');
            $table->string('shipping_table');
            $table->string('shipping_table_order');
            $table->string('shipping_type');
            $table->string('insurance');
            $table->string('insurance_contract')->nullable();
            $table->date('delivery_time');
            $table->boolean('doct_blocked');
            $table->foreignIdFor(Customer::class, 'sender_customer_id');
            $table->foreignIdFor(Customer::class, 'recipient_customer_id');
            $table->foreignIdFor(Customer::class, 'consignee_customer_id')->nullable();
            $table->foreignIdFor(Customer::class, 'debtor_customer_id');
            $table->foreignIdFor(Customer::class, 'customer_calculation_id');
            $table->foreignIdFor(Route::class, 'delivery_route_id');
            $table->date('delivery_date')->nullable();
            $table->string('cte_protocol')->nullable();
            $table->string('cte_key')->nullable();
            $table->string('cte_situation')->nullable();
            $table->string('cte_sefaz_return')->nullable();
            $table->foreignIdFor(Costcenter::class)->nullable();
            $table->string('bill')->nullable();
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
