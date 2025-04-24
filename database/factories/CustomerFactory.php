<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'vendor_id' => fake()->numberBetween(1, 15),
            'bank_id' => '1',
            'payment_term_id' => '1',
            'priority' => '0',
            'risc' => fake()->randomElements(['Risco A', 'Risco B', 'Risco C', 'Risco D', 'Risco E'])[0],
            'municipal_registration' => fake()->numberBetween(10000, 99999),
            'state_registration' => fake()->numberBetween(1000000, 9999999999),
            'mail_operational' => fake()->freeEmail(),
            'mail_financial' => fake()->safeEmail(),
            'group_customer_id' => fake()->numberBetween(1, 50),
            'freight_table_id' => FreightTableFactory::factory(),
            'complete' => fake()->boolean(),
        ];
    }
}
