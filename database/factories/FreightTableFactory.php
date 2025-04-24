<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FreightTable>
 */
class FreightTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->unique()->word(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'routes' => json_encode(
                [
                    'price' => fake()->randomFloat(2, 500, 5000),
                    'route_id' => RouteFactory::class,
                    'delivery_days' => (string) fake()->numberBetween(1, 10),
                    'maximum_weight' => (string) fake()->numberBetween(10000, 20000),
                    'minimum_weight' => (string) fake()->numberBetween(100, 5000),
                ]
            ),
            'is_active' => fake()->boolean(),
        ];
    }
}
