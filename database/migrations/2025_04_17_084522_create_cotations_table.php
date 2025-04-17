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
        Schema::create('cotations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Branch::class);
            $table->string('origin_cep', 9)->nullable();
            $table->string('destination_cep', 9)->nullable();
            $table->string('uf_destination', 2)->nullable();
            $table->decimal('total_value', 10, 2)->default(0);
            $table->decimal('weight', 10, 3)->default(0);
            $table->decimal('volume', 10, 3)->default(0);
            $table->timestamp('quoted_at')->nullable();
            $table->decimal('min_weight', 10, 3)->nullable();
            $table->decimal('max_weight', 10, 3)->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('base_km', 10, 2)->nullable();
            $table->decimal('price_per_km', 10, 2)->nullable();
            $table->string('mode')->default('simulation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotations');
    }
};
