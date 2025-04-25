<?php

use App\Enums\DriverStatus;
use App\Enums\LicenseCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf', 14)->unique();
            $table->string('rg')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('license_number')->unique();
            $table->enum('license_category', LicenseCategory::values());
            $table->date('license_expires_at');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', DriverStatus::values())->default(DriverStatus::ACTIVE->value);
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
        Schema::dropIfExists('drivers');
    }
};
