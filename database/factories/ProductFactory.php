<?php

namespace Database\Factories;

use App\Models\GroupProduct;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'description' => fake()->sentence(),
            'group_product_id' => GroupProduct::factory(),
        ];
    }
}
