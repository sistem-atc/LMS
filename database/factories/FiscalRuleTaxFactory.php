<?php

namespace Database\Factories;

use App\Models\FiscalRule;
use App\Models\FiscalRuleTax;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<FiscalRuleTax>
 */
class FiscalRuleTaxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fiscal_rule_id' => FiscalRule::factory(),
            'tax_type' => TaxFactory::factory(),
            'rate' => $this->faker->randomFloat(2, 0, 25),
            'base_reduction' => $this->faker->randomFloat(2, 0, 100),
            'calc_mode' => '%',
            'is_retained' => $this->faker->boolean(10),
        ];
    }
}
