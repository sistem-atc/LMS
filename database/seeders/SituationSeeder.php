<?php

namespace Database\Seeders;

use App\Models\Situation;
use Illuminate\Database\Seeder;

class SituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Situation::factory()->count(4)->create();
    }
}
