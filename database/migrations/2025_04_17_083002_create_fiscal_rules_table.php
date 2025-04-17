<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fiscal_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('regime_type')->nullable();
            $table->char('uf_origin', 2)->nullable();
            $table->char('uf_destination', 2)->nullable();
            $table->string('ncm_code', 8)->nullable();
            $table->string('cfop_code', 4)->nullable();
            $table->string('cst_icms', 3)->nullable();
            $table->string('cst_pis', 2)->nullable();
            $table->string('cst_cofins', 2)->nullable();
            $table->string('cst_ipi', 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('fiscal_rule_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_rule_id')->constrained()->cascadeOnDelete();
            $table->foreignId('taxes_id')->constrained()->cascadeOnDelete();
            $table->decimal('rate', 10, 4)->default(0);
            $table->decimal('base_reduction', 10, 4)->default(0);
            $table->string('calc_mode')->default('%');
            $table->boolean('is_retained')->default(false);
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
        Schema::dropIfExists('fiscal_rule_taxes');
        Schema::dropIfExists('fiscal_rules');
    }
};
