<?php

namespace Database\Factories;

use App\Enums\VehicleType;
use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $type = fake()->randomElement(VehicleType::cases());
        $status = fake()->randomElement(VehicleStatus::cases());

        return [
            'type' => $type->value,
            'brand' => fake()->randomElement(['Scania', 'Volvo', 'Mercedes-Benz', 'Iveco', 'Volkswagen', 'Ford']),
            'model' => fake()->bothify('Model-###'),
            'license_plate' => strtoupper(fake()->bothify('???-####')),
            'renavam' => fake()->unique()->numerify('###########'),
            'chassis' => strtoupper(fake()->unique()->bothify('?????????????????')),
            'manufacture_year' => fake()->year(),
            'model_year' => fake()->year(),
            'color' => fake()->safeColorName(),
            'license_plate_state' => fake()->randomElement(['SP', 'RJ', 'MG', 'RS', 'PR', 'BA', 'SC']),
            'registration_number' => fake()->numerify('##########'),
            'acquisition_date' => fake()->date(),
            'tare_weight' => fake()->randomFloat(2, 2000, 15000),
            'max_load_kg' => fake()->randomFloat(2, 3000, 45000),
            'max_volume_m3' => fake()->randomFloat(2, 10, 100),
            'owner_name' => fake()->name(),
            'owner_document' => fake()->numerify('##.###.###/####-##'),
            'status' => $status->value,
        ];
    }
}
