<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('costcenters', function (Blueprint $table) {
            $table->id();
            $table->string('cost_center');
            $table->string('classification');
            $table->string('description');
            $table->boolean('blocked');
            $table->date('blocked_date')->nullable();
            $table->string('email_approver');
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
        Schema::dropIfExists('costcenters');
    }
};
