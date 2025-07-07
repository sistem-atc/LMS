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
            'numero_transporte' => fake()->regexify('[A-Z]{3}-[0-9]{4}'), // Ex: ABC-1234
            'placa_veiculo' => fake()->regexify('[A-Z]{3}[0-9][A-Z][0-9]{2}'), // Ex: ABC1D23
            'transportador' => fake()->company(),
            'nome_transportador' => fake()->name(),
            'regiao' => fake()->state(),
            'itinerario' => fake()->city() . ' - ' . fake()->city(),
            'descricao_itinerario' => fake()->sentence(6),
            'cidade' => fake()->city(),
            'remessa' => fake()->regexify('[A-Z]{2}[0-9]{6}'), // Ex: AB123456
            'status_expedicao' => fake()->randomElement(['Pendente', 'Em trânsito', 'Entregue', 'Cancelada']),
            'recebedor_mercadoria' => fake()->company(),
            'nome_recebedor_mercadoria' => fake()->name(),
            'emissor_ordem' => fake()->name(),
            'material' => fake()->randomElement([
                'Material A',
                'Material B',
                'Material C',
                'Material D',
                'Material E',
            ]),
            'descricao' => fake()->text(50),
            'peso_bruto' => fake()->randomFloat(2, 10, 1000), // entre 10kg e 1000kg
            'peso_liquido' => fake()->randomFloat(2, 5, 900),
            'usuario' => fake()->userName(),
            'grupo_transporte' => fake()->randomElement(['Grupo 1', 'Grupo 2', 'Grupo 3']),
            'denominacao' => fake()->words(2, true),
            'organizacao_vendas' => fake()->randomElement(['Org. Sul', 'Org. Norte', 'Org. Nacional']),
            'setor_atividade' => fake()->randomElement(['Indústria', 'Comércio', 'Serviços']),
            'prioridade_remessa' => fake()->randomElement(['Alta', 'Média', 'Baixa']),
            'hora' => fake()->time(),
            'item' => fake()->numberBetween(1, 100),
            'denominacao_item' => fake()->words(3, true),
            'data_remessa' => fake()->date(),
            'data_criacao' => fake()->date(),
            'saida_mrc_plan' => fake()->dateTimeBetween('now', '+10 days')->format('Y-m-d'),
            'data_limite' => fake()->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'desvio' => fake()->optional()->sentence(),
            'grupo_atendimento' => fake()->randomElement(['Atendimento A', 'Atendimento B', 'Atendimento C']),
            'incoterms' => fake()->randomElement(['FOB', 'CIF', 'EXW', 'DAP']),
            'instrucoes_entrega' => fake()->address(),
        ];
    }
}
