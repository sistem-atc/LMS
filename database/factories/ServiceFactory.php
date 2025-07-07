<?php

namespace Database\Factories;

use App\Models\GroupService;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Faker::create()->unique()->word(),
            'description' => $this->faker->sentence(),
            'group_service_id' => GroupService::factory(),
        ];
    }
}
