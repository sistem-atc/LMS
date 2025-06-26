<?php

namespace Database\Seeders;

use App\Models\RulesAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RulesAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RulesAccount::factory()->count(5)->create();
    }
}
