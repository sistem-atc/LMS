<?php

namespace Database\Factories;

use App\Models\RulesAccount;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nature>
 */
class NatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::upper(fake()->name()),
            'rules_account_id' => RulesAccount::factory(),
        ];
    }
}
