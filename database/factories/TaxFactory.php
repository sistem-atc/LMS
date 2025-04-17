<?php

namespace Database\Factories;

use App\Models\Tax;
use App\Enums\CalcMode;
use App\Enums\RegimeType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxFactory extends Factory
{

    protected $model = Tax::class;

    public function definition(): array
    {
        $regimes = RegimeType::cases();
        $calcModes = CalcMode::cases();

        return [
            'code' => strtoupper($this->faker->unique()->lexify('???')),
            'name' => $this->faker->randomElement(['ICMS', 'PIS', 'COFINS', 'IPI', 'ISS']),
            'description' => $this->faker->optional()->sentence(),
            'regime_type' => $this->faker->randomElement($regimes),
            'calc_mode' => $this->faker->randomElement($calcModes),
            'value' => $this->faker->randomFloat(4, 0.01, 25),
            'account_code' => $this->faker->optional()->numerify('1.1.##.###'),
            'active' => $this->faker->boolean(90),
        ];
    }

}
