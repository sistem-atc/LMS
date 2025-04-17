<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cotation>
 */
class CotationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $minWeight = $this->faker->randomFloat(3, 0, 50);
        $maxWeight = $minWeight + $this->faker->randomFloat(3, 1, 100);
        $baseKm = $this->faker->randomFloat(2, 10, 1000);
        $pricePerKm = $this->faker->randomFloat(2, 0.5, 3.5);
        $totalKm = $baseKm + $this->faker->randomFloat(2, 0, 500);

        return [
            'branch_id' => Branch::factory(),
            'origin_cep' => $this->faker->postcode(),
            'destination_cep' => $this->faker->postcode(),
            'uf_destination' => $this->faker->randomElement(['SP', 'RJ', 'MG', 'RS', 'BA', 'PR']),
            'total_value' => round($pricePerKm * $totalKm, 2),
            'weight' => $this->faker->randomFloat(3, $minWeight, $maxWeight),
            'volume' => $this->faker->randomFloat(3, 0.1, 2.0),
            'quoted_at' => now(),
            'min_weight' => $minWeight,
            'max_weight' => $maxWeight,
            'price' => $this->faker->randomFloat(2, 50, 500),
            'base_km' => $baseKm,
            'price_per_km' => $pricePerKm,
            'mode' => $this->faker->randomElement(\App\Enums\CotationMode::cases())->value,
        ];
    }
}
