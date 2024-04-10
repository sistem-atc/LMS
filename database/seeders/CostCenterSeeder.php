<?php

namespace Database\Seeders;

use App\Models\Costcenter;
use Illuminate\Database\Seeder;

class CostCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Costcenter::factory()->count(15)->create();
    }
}
