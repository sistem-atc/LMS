<?php

namespace Database\Factories;

use App\Enums\AccountType;
use App\Models\Costcenter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => fake()->unique()->numerify('##########'),
            'description' => fake()->text(30),
            'type' => fake()->randomElement(AccountType::cases()),
            'costcenter_id' => Costcenter::factory(),
            'is_active' => fake()->boolean(80) // 80% chance of being active,
        ];
    }
}
