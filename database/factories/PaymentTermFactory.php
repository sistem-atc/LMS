<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentTerm>
 */
class PaymentTermFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Vencimento as Segundas',
            'type_freight' => '["CIF","FOB"]',
            'weekday' => '["Segunda-feira"]',
            'especific_date' => '[]',
            'term' => '7',
        ];
    }
}
