<?php

namespace Database\Seeders;

use App\Models\HealthPlan;
use Illuminate\Database\Seeder;

class HealthPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HealthPlan::factory()->count(1)->create();
    }
}
