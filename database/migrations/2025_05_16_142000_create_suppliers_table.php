<?php

use App\Models\Branch;
use App\Models\Nature;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
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
            $table->string('region')->nullable();
            $table->foreignIdFor(Branch::class)->nullable();
            $table->foreignIdFor(Nature::class)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('cellphone')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
};
