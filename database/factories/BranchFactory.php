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

        $company = Str::upper(fake()->company());
        $siglas = ['RIO', 'SAO', 'SJP'];

        return [
            'abbreviation' => Str::upper($siglas[array_rand($siglas)]),
            'name' => $company,
            'cnpj' => fake()->numerify('##############'),
            'type_branch' => TypeBranchEnum::FILIAL,
            'branch_matriz' => '1',
            'municipal_registration' => fake()->numberBetween(10000, 99999),
            'state_registration' => fake()->numberBetween(1000000, 9999999999),
            'postal_code' => fake()->postcode(),
            'street' => Str::upper(fake()->streetName()),
            'complement' => '',
            'number' => fake()->buildingNumber(),
            'district' => Str::upper(fake()->lastName()),
            'city' => Str::upper(fake()->city()),
            'state' => Str::upper(trim(explode('-', fake()->address())[2])),
            'ibge' => fake()->numerify('#######'),
            'gia' => fake()->numerify('####'),
            'ddd' => fake()->numerify('##'),
            'siafi' => fake()->numerify('####'),
        ];
    }
}
