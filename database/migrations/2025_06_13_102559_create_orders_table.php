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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('local_expedicao_recebimento')->nullable();
            $table->string('centro')->nullable();
            $table->string('numero_transporte')->nullable();
            $table->string('placa_veiculo')->nullable();
            $table->string('transportador')->nullable();
            $table->string('nome_transportador')->nullable();
            $table->string('regiao')->nullable();
            $table->string('itinerario')->nullable();
            $table->text('descricao_itinerario')->nullable();
            $table->string('cidade')->nullable();
            $table->string('remessa')->nullable();
            $table->string('status_expedicao')->nullable();
            $table->string('recebedor_mercadoria')->nullable();
            $table->string('nome_recebedor_mercadoria')->nullable();
            $table->string('emissor_ordem')->nullable();
            $table->string('material')->nullable();
            $table->text('descricao')->nullable();
            $table->decimal('peso_bruto', 10, 2)->nullable();
            $table->decimal('peso_liquido', 10, 2)->nullable();
            $table->string('usuario')->nullable();
            $table->string('grupo_transporte')->nullable();
            $table->string('denominacao')->nullable();
            $table->string('organizacao_vendas')->nullable();
            $table->string('setor_atividade')->nullable();
            $table->string('prioridade_remessa')->nullable();
            $table->time('hora')->nullable();
            $table->integer('item')->nullable();
            $table->string('denominacao_item')->nullable();
            $table->date('data_remessa')->nullable();
            $table->date('data_criacao')->nullable();
            $table->dateTime('saida_mrc_plan')->nullable();
            $table->date('data_limite')->nullable();
            $table->string('desvio')->nullable();
            $table->string('grupo_atendimento')->nullable();
            $table->string('incoterms')->nullable();
            $table->text('instrucoes_entrega')->nullable();

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
        Schema::dropIfExists('orders');
    }
};
