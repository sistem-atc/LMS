<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Enums\TypeBranchEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $company = fake()->company();

        return [
            'abbreviation' => explode(' ', $company)(0),
            'name' => $company,
            'cnpj' => fake()->numerify('##############'),
            'type_branch' => TypeBranchEnum::FILIAL,
            'municipal_registration' => fake()->numberBetween(10000, 99999),
            'state_registration' => fake()->numberBetween(1000000, 9999999999),
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
        ];
    }
}
