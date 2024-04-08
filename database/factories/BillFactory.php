<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Bill::class;
     public function definition(): array
    {
        return [
            'number' => fake()->numberBetween(100, 9000),
            'nature'=> fake()->numberBetween(100, 200),
            'bank' => '1',
            'customer_id' => '1',
            'issue' => fake()->date(),
            'due_date'  => fake()->date(),
            'total_value' => fake()->randomDigit(),
            'discount_value' => fake()->randomDigit(),
            'liquid_value' => fake()->randomDigit(),
            'irrf_base' => 'total_value',
            'irrf_value' => fake()->randomDigit(),
            'iss_tax' => fake()->randomDigit(),
            'iss_value' => fake()->randomDigit(),
            'writeoff_date'  => fake()->date(),
            'receiving_type' => 'Deposito',
            'historic' => fake()->text(),
            'situation' => 'CARTEIRA',
            'fine' => fake()->randomDigit(),
            'interest' => fake()->randomDigit(),
            'boleto_number' => fake()->barcode(),
            'barr_code' => fake()->barcode(),
        ];
    }
}
