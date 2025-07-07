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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();

            $table->string('cnpj');
            $table->integer('codigo');
            $table->integer('agencia');
            $table->integer('dv_agencia')->nullable();
            $table->integer('conta');
            $table->integer('dv_conta');
            $table->string('nome_banco');

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

            $table->string('contato')->nullable();
            $table->boolean('use_api')->nullable();
            $table->string('client_id_billing')->nullable();
            $table->string('client_secret_billing')->nullable();
            $table->string('client_id_extract')->nullable();
            $table->string('client_secret_extract')->nullable();
            $table->string('file_crt_billing')->nullable();
            $table->string('file_key_biling')->nullable();
            $table->string('file_crt_extract')->nullable();
            $table->string('file_key_extract')->nullable();

            $table->boolean('use_cnab')->nullable();
            $table->string('model_cnab')->nullable();

            $table->integer('fine')->default(0);
            $table->integer('interests')->default(0);
            $table->boolean('protest')->default(false);
            $table->integer('days_protest')->default(0);
            $table->integer('wallet');
            $table->string('coin_type');
            $table->string('default_message')->nullable();
            $table->string('default_message2')->nullable();
            $table->string('default_message3')->nullable();
            $table->boolean('blocked')->default(false);
            $table->date('date_blocked')->nullable();
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
        Schema::dropIfExists('banks');
    }
};
