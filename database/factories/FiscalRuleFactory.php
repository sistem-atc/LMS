<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FiscalRule>
 */
class FiscalRuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Regra ' . $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
            'regime_type' => $this->faker->randomElement(['simples', 'lucro_presumido', 'lucro_real']),
            'uf_origin' => $this->faker->stateAbbr(),
            'uf_destination' => $this->faker->stateAbbr(),
            'ncm_code' => $this->faker->numerify('########'),
            'cfop_code' => $this->faker->numerify('5###'),
            'cst_icms' => $this->faker->numerify('1##'),
            'cst_pis' => $this->faker->numerify('0#'),
            'cst_cofins' => $this->faker->numerify('0#'),
            'cst_ipi' => $this->faker->numerify('5#'),
            'is_active' => true,
        ];
    }
}
