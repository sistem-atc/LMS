<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'local_expedicao_recebimento' => fake()->city(),
            'centro' => fake()->text(10),
            'numero_transporte' => '',
            'placa_veiculo' => '',
            'transportador' => '',
            'nome_transportador' => '',
            'regiao' => '',
            'itinerario' => '',
            'descricao_itinerario' => '',
            'cidade' => fake()->city(),
            'remessa' => '',
            'status_expedicao' => '',
            'recebedor_mercadoria' => '',
            'nome_recebedor_mercadoria' => '',
            'emissor_ordem' => '',
            'material' => fake()->randomElement([
                'Material A',
                'Material B',
                'Material C',
                'Material D',
                'Material E',
            ]),
            'descricao' => fake()->text(50),
            'peso_bruto' => '',
            'peso_liquido' => '',
            'usuario' => fake()->userName(),
            'grupo_transporte' => '',
            'denominacao' => '',
            'organizacao_vendas' => '',
            'setor_atividade' => '',
            'prioridade_remessa' => '',
            'hora' => fake()->time(),
            'item' => '',
            'denominacao_item' => '',
            'data_remessa' => fake()->date(),
            'data_criacao' => fake()->date(),
            'saida_mrc_plan' => '',
            'data_limite' => fake()->date(),
            'desvio' => '',
            'grupo_atendimento' => '',
            'incoterms' => '',
            'instrucoes_entrega' => fake()->address(),
        ];
    }
}
