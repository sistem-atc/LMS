<?php

use App\Enums\VehicleType;
use App\Enums\VehicleStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->enum('type', VehicleType::values());
            $table->string('brand');
            $table->string('model');
            $table->string('license_plate', 10)->unique();
            $table->string('renavam', 11)->unique();
            $table->string('chassis', 17)->unique();
            $table->year('manufacture_year');
            $table->year('model_year');
            $table->string('color')->nullable();
            $table->string('license_plate_state', 2);
            $table->string('registration_number')->nullable();
            $table->date('acquisition_date')->nullable();
            $table->decimal('tare_weight', 8, 2)->nullable();
            $table->decimal('max_load_kg', 8, 2)->nullable();
            $table->decimal('max_volume_m3', 8, 2)->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_document', 20)->nullable();
            $table->enum('status', VehicleStatus::values())->default(VehicleStatus::ACTIVE->value);
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
        Schema::dropIfExists('vehicles');
    }
};
