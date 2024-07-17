<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_branche_id');
            $table->foreign('origin_branche_id')->references('id')->on('branches');
            $table->integer('collection_request')->nullable();
            $table->string('status');
            $table->integer('quotation')->nullable();
            $table->unsignedBigInteger('document_fiscal_customer_id');
            $table->foreign('document_fiscal_customer_id')->references('id')->on('document_fiscal_customers');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};
