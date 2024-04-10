<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'cpf' => fake()->cpf(),
            'email' => explode('@', fake()->unique()->email())[0] . '@logisticag2l.com.br',
            'branch_id' => fake()->numberBetween(1, 14),
        ];
    }
}
