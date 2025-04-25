<?php

namespace Database\Factories;

use App\Enums\DriverStatus;
use App\Enums\LicenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $licenseCategory = fake()->randomElement(LicenseCategory::cases());
        $status = fake()->randomElement(DriverStatus::cases());

        return [
            'name' => fake()->name(),
            'cpf' => fake()->unique()->numerify('###.###.###-##'),
            'rg' => fake()->numerify('##.###.###-#'),
            'birth_date' => fake()->date('Y-m-d', '-20 years'),
            'license_number' => fake()->unique()->numerify('###########'),
            'license_category' => $licenseCategory->value,
            'license_expires_at' => fake()->dateTimeBetween('+1 year', '+5 years'),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'status' => $status->value,
        ];
    }
}
