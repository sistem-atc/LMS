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
        Schema::create('city_settings', function (Blueprint $table) {
            $table->id();
            $table->string('ibge')->unique();
            $table->string('city_name');
            $table->string('url_prod');
            $table->string('url_homolog');
            $table->string('headerversion')->nullable();
            $table->string('namespace')->nullable();
            $table->string('version')->default(0);
            $table->string('class_path');
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
        Schema::dropIfExists('city_settings');
    }
};
