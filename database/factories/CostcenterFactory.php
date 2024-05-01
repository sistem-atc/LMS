<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Costcenter>
 */
class CostcenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cost_center' => fake()->unique()->numerify('##########'),
            'classification' => 'Prioritario',
            'description' => fake()->text(30),
            'blocked' => fake()->boolean(),
            'email_approver' => 'kleber.patti@logisticag2l.com.br',
        ];
    }
}
