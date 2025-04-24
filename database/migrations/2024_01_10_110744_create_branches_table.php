<?php

use App\Models\Branch;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation');
            $table->string('name');
            $table->string('phantasy_name')->nullable();
            $table->string('cnpj');
            $table->string('type_branch');
            $table->foreignIdFor(Branch::class, 'branch_matriz')->default(0);
            $table->string('municipal_registration')->nullable();
            $table->string('state_registration');
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
            $table->string('serieRPS')->nullable();
            $table->string('serieCTe')->nullable();
            $table->string('certificatePFX')->nullable();
            $table->string('password_certificate')->nullable();
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
        Schema::dropIfExists('branches');
    }
};
