<?php

use App\Models\User;
use App\Models\Branch;
use App\Models\Position;
use App\Models\HealthPlan;
use App\Models\Departament;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Branch::class);
            $table->string('name');
            $table->string('social_name')->nullable();
            $table->string('mother_name');
            $table->string('father_name')->nullable();
            $table->string('cpf')->unique();
            $table->string('cnh')->nullable();
            $table->string('pis')->nullable();
            $table->string('rg')->unique();
            $table->string('rg_uf');
            $table->string('eleitor_title')->nullable();
            $table->string('eleitoral_zone')->nullable();
            $table->string('selector_section')->nullable();
            $table->date('birth_date');
            $table->string('sex');
            $table->string('civil_state');
            $table->string('nationality');
            $table->string('born_city');
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
            $table->boolean('is_active')->default(true);
            $table->string('phone');
            $table->string('personalmail')->unique();
            $table->foreignIdFor(Position::class);
            $table->foreignIdFor(Departament::class);
            $table->float('salary');
            $table->date('admission_date');
            $table->string('contract_type');
            $table->string('ctps');
            $table->string('school_level');
            $table->string('bank')->nullable();
            $table->string('agency')->nullable();
            $table->string('account')->nullable();
            $table->string('account_type')->nullable();
            $table->boolean('transportation_voucher')->default(false);
            $table->boolean('meal_voucher')->default(false);
            $table->boolean('food_voucher')->default(false);
            $table->boolean('dental_plan')->default(false);
            $table->boolean('basic_cest')->default(false);
            $table->boolean('life_insurance')->default(false);
            $table->boolean('private_pension')->default(false);
            $table->boolean('health_plan')->default(false);
            $table->string('health_plan_type')->nullable();
            $table->foreignIdFor(HealthPlan::class, )->nullable();
            $table->string('social_security_regime');
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
        Schema::dropIfExists('employees');
    }
};
