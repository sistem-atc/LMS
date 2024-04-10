<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Rota ' . fake()->name(),
            'active' => fake()->boolean(),
            'origin_branche_id' => fake()->numberBetween(1, 14),
            'recipient_branche_id' => fake()->numberBetween(1, 14),
            'municipal_route' => fake()->boolean(),
        ];
    }
}
