<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf_or_cnpj' => fake()->unique()->numerify('##############'),
            'company_name' => fake()->unique()->company(),
            'type_person' => fake()->randomElements(['F', 'J'])[0],
            'fantasy_name' => fake()->unique()->company(),
            'postal_code' => fake()->postcode(),
            'street' => Str::upper(fake()->streetName()),
            'complement' => '',
            'number' => fake()->buildingNumber(),
            'district' => fake()->lastName(),
            'city' => fake()->city(),
            'state' => trim(explode('-', fake()->address())[2]),
            'ibge' => fake()->numerify('#######'),
            'gia' => fake()->numerify('####'),
            'ddd' => fake()->numerify('##'),
            'siafi' => fake()->numerify('####'),
            'region' => fake()->lastName(),
            'branch_id' => fake()->numberBetween(1, 2),
            'nature_id' => fake()->numberBetween(1, 10),
            'phone_number' => fake()->phoneNumber(),
            'cellphone' => fake()->phoneNumber(),
        ];
    }
}
