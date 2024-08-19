<?php

use App\Models\Bank;
use App\Models\Branch;
use App\Models\EdiPattern;
use App\Models\Nature;
use App\Models\Vendor;
use App\Models\PaymentTerm;
use App\Models\GroupCustomer;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cpf_or_cnpj')->unique();
            $table->string('company_name');
            $table->string('type_person');
            $table->string('fantasy_name');
            $table->string('postal_code');
            $table->string('street');
            $table->string('complement')->nullable();
            $table->string('number')->nullable();
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('ibge')->nullable();
            $table->string('gia')->nullable();
            $table->string('ddd')->nullable();
            $table->string('siafi')->nullable();
            $table->string('region');
            $table->foreignIdFor(Branch::class)->nullable();
            $table->foreignIdFor(Nature::class);
            $table->string('phone_number')->nullable();
            $table->string('cellphone')->nullable();
            $table->foreignIdFor(Vendor::class)->nullable();
            $table->foreignIdFor(Bank::class)->nullable();
            $table->foreignIdFor(PaymentTerm::class);
            $table->string('priority')->nullable();
            $table->string('risc')->nullable();
            $table->string('municipal_registration')->nullable();
            $table->string('state_registration');
            $table->string('mail_operational')->nullable();
            $table->string('mail_financial')->nullable();
            $table->string('BaseEndpoint')->nullable();
            $table->string('token_multisoftware')->nullable();
            $table->string('token_api', 64)->unique()->nullable();
            $table->foreignIdFor(GroupCustomer::class)->nullable();
            $table->foreignIdFor(EdiPattern::class)->nullable();
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
        Schema::dropIfExists('customers');
    }
};
